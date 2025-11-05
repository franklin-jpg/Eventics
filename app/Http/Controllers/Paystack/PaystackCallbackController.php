<?php

namespace App\Http\Controllers\Paystack;

use App\Http\Controllers\Controller;
use App\Models\EventBooking;
use App\Models\Transaction;
use App\Services\Paystack;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaystackCallbackController extends Controller
{
    /**
     * Handle Paystack payment callback
     * This is called when user returns from Paystack after payment
     * Paystack sends transaction reference in the URL
     */
    public function callback(Request $request): RedirectResponse
    {
        try {
            // Validate that Paystack sent the required data
            $validated = $request->validate([
                'trxref' => 'required|string',   // Transaction reference
                'reference' => 'required|string', // Same as trxref (Paystack sends both)
            ]);

            // Verify the transaction with Paystack
            $responseData = Paystack::verifyTransaction($validated['reference']);

            // Check if payment was successful
            if (!$this->isTransactionSuccessful($responseData)) {
                return $this->handleFailedPayment($responseData);
            }

            // Extract transaction details from Paystack response
            $transactionDetails = $this->extractTransactionDetails($responseData);

            // Process the successful payment
            return $this->processSuccessfulPayment($transactionDetails);
        } catch (Exception $e) {
            Log::error('Paystack Callback Error: ' . $e->getMessage());

            return redirect()->route('user.bookings.index')
                ->with('error', 'An error occurred while processing your payment. Please contact support.');
        }
    }

    /**
     * Check if the Paystack transaction was successful
     */
    protected function isTransactionSuccessful(array $responseData): bool
    {
        return $responseData['status'] == 1 && $responseData['data']['status'] === 'success';
    }


    /**
     * Extract relevant transaction details from Paystack response
     */
    protected function extractTransactionDetails(array $responseData): array
    {
        $data = $responseData['data'];
        $metadata = $data['metadata'] ?? [];

        return [
            'reference' => $data['reference'],
            'channel' => $data['channel'], // card, bank, ussd, etc
            'amount' => $data['amount'] / 100, // Convert from kobo to naira
            'booking_id' => $metadata['booking_id'] ?? null,
            'event_id' => $metadata['event_id'] ?? null,
        ];
    }


    /**
     * Process successful payment
     * Updates booking status and creates transaction record
     */
    protected function processSuccessfulPayment(array $transactionDetails): RedirectResponse
    {
        DB::beginTransaction();

        try {
            // Get the booking
            $booking = EventBooking::findOrFail($transactionDetails['booking_id']);

            // Update booking status to confirmed
            $booking->update([
                'status' => 'confirmed',
            ]);

            // Create transaction record
            Transaction::create([
                'user_id' => $booking->user_id,
                'event_booking_id' => $booking->id,
                'transaction_reference' => $transactionDetails['reference'],
                'payment_method' => 'Paystack',
                'channel' => $transactionDetails['channel'],
                'amount' => $transactionDetails['amount'],
                'status' => 'completed',
                'metadata' => json_encode($transactionDetails),
            ]);

            DB::commit();

            // Clear session data
            session()->forget('pending_booking_id');

            // Redirect to success page
            return redirect()->route('user.payment.success', $booking->id)
                ->with('success', 'Payment successful! Your booking has been confirmed.');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            Log::error('Payment processing failed', [
                'error' => $e->getMessage(),
                'transaction_details' => $transactionDetails,
            ]);

            return redirect()->route('user.bookings.index')
                ->with('error', 'Payment verified but booking confirmation failed. Please contact support.');
        }
    }


    /**
     * Handle failed payment
     */
    protected function handleFailedPayment(array $responseData): RedirectResponse
    {
        $metadata = $responseData['data']['metadata'] ?? [];
        $bookingId = $metadata['booking_id'] ?? null;

        // Update booking status to cancelled if we have the booking ID
        if ($bookingId) {
            try {
                $booking = EventBooking::find($bookingId);
                if ($booking) {
                    $booking->update(['status' => 'cancelled']);
                }
            } catch (Exception $e) {
                Log::error('Failed to update booking status: ' . $e->getMessage());
            }
        }

        $message = $responseData['message'] ?? 'Payment verification failed.';

        return redirect()->route('user.bookings.index')->with('error', $message);
    }
}
