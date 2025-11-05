<?php

use App\Http\Controllers\Paystack\PaymentStatusController;
use App\Http\Controllers\Paystack\PaystackCallbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\EventController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// callback method


// Controller method
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');
// payment route
//  Route::post('events/{event}/pay', [EventController::class, 'pay'])->name('events.pay');

 Route::middleware(['auth'])->group(function () {
    // Initialize payment
    Route::post('/events/{event}/pay', [EventController::class, 'pay'])->name('events.pay');

    // Paystack callback (where Paystack redirects after payment)
    Route::get('/payment/callback/paystack', [PaystackCallbackController::class, 'callback'])->name('user.payment.callback.paystack');

    // Payment success page
    Route::get('/payment/success/{booking}', [PaymentStatusController::class, 'success'])->name('user.payment.success');

    // User's bookings list
    Route::get('/my-bookings', [PaymentStatusController::class, 'index'])->name('user.bookings.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/admin.php';

