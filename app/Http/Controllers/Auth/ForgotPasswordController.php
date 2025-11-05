<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetOtpMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Str;

class ForgotPasswordController extends Controller
{
    public function ShowEmailForm()
    {
        return view('auth.passwords.ForgotPassword');
    }

    public function submitEmail(Request $request)
    {

        try {
            $request->validate(
                [
                    'email' => ['required', 'email']
                ],
                [
                    'email.required' => 'email field cannot be emepty',

                ]
            );
            DB::beginTransaction();
            $user = User::where('email', $request->email)->first();

            // dd($user);

            if (!$user) {
                return redirect()->back()->withErrors(['email' => 'we could not find a user with 
                    this email address']);
            }
            $resetToken = Str::random(40);
            $otp = rand(100000, 999999);

            $user->password_reset_token = $resetToken;
            $user->password_reset_otp = $otp;
            $user->password_reset_token_expires_at = now()->addMinutes(15);

            Mail::to($user->email)->send(new PasswordResetOtpMail($otp));
            DB::commit();

            $user->save();

            return redirect()->route('confirm.code', ['token' => $resetToken])->with('success', 'we
                 have sent an otp to your email to reset your password');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('forgot password error:' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'email' => $request->email,
            ]);
            dd($e->getMessage());
            return redirect()->back()->with('error', ' something went wrong, please try again later');
        }
    }

    public function showConfirmationCode(Request $request, $token)
    {

        $user = User::where('password_reset_token', $token)
            ->where('password_reset_token_expires_at', '>', now())->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid or expired token');
        }


        $maskedEmail = $this->maskedEmail($user->email);

        return view('auth.passwords.confirm-code', [
            'token' => $token,
            'email' => $maskedEmail,
            'ExpiresAt' => $user->password_reset_token_expires_at
        ]);
    }


    public function verifyPasswordOtp(Request $request, $token)
    {

        // dd('hi');
        try {
            $request->validate([
                'token' => 'required',
                'otp' => 'required|numeric|digits:6'
            ], [
                'otp.required' => 'please enter the verification code',
            ]);


            $user = User::where('password_reset_token', $token)
                ->where('password_reset_token_expires_at', '>', now())->first();


            // dd($user);

            if (!$user) {
                return redirect()->back()->with('error', 'Invalid verification token');
            }


            if ($user->password_reset_otp != $request->otp) {
                return redirect()->back()->with('error', 'Invailed otp');
            }



            return redirect()->route('password_reset_form', ['token' => $token]);
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

  




    public function showResetPasswordForm($token)
    {
        $user = User::where('password_reset_token', $token)
            ->where('password_reset_token_expires_at', '>', now())->first();
        // dd('user');


        if (!$user) {
            return redirect()->back()->with('error', 'Invalid or expired token');
        }
        // return view('auth.passwords.reset-password', ['token' => $token]);
        return view('auth.passwords.reset-password', compact('token'));


    }

public function resendOtp($token)
{
    try {
        $user = User::where('password_reset_token', $token)
            ->where('password_reset_token_expires_at', '>', now())
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found or token expired.');
        }

        $otp = rand(100000, 999999);

        $user->password_reset_otp = $otp;
        $user->password_reset_token_expires_at = now()->addMinutes(15);
        $user->save();

        Mail::to($user->email)->send(new PasswordResetOtpMail($otp));

        return redirect()->back()->with('success', 'A new verification code has been sent to your email.');
    } catch (Exception $e) {
        Log::error('Resend OTP Error: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString(),
            'token' => $token,
        ]);
        return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
    }
}


// reset password controller
    public function submitResetPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|min:8|max:40|confirmed',
        ]);

        $user = User::where('password_reset_token', $token)
            ->where('password_reset_token_expires_at', '>', now())
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid or expired password reset token.');
        }

        try {
            // Using DB::transaction with a closure
            DB::transaction(function () use ($user, $request) {
                $user->password = Hash::make($request->password);
                $user->password_reset_token = null;
                $user->password_reset_otp = null;
                $user->password_reset_token_expires_at = null;
                $user->save();
            });

            return redirect()->route('login')->with('success', 'Password successfully reset. You can now login with your new password.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while resetting your password. Please try again.' . $e->getMessage());
        }
    }





    // email masking 
    private function maskedEmail($email): string
    {
        $emailParts = explode("@", $email);
        $name = $emailParts[0];
        $domain = $emailParts[1];

        $maskedName = substr($name, 0, 2) . str_repeat('*', max(0, strlen($name) - 2));

        return $maskedName . '@' . $domain;
    }
}
