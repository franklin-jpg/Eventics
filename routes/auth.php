<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('redirect.if.authenticated')->group(function () {
    // route for registration view
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
// route to create or register or submit user
    Route::post('register', [RegisteredUserController::class, 'store'])->name('user.create');

    // route to show verification form
  Route::get('verify-otp/{token}', [RegisteredUserController::class, 'showVerificationForm'])->name('verify.otp');

  // route to submit otp
  Route::post('/verify-otp/{token}', [RegisteredUserController::class, 'verifyOtp'])->name('user.verify-otp');

  // resend otp
Route::post('/resend-otp/{token}', [RegisteredUserController::class, 'resendOtp'])
    ->name('user.resend-otp');

    // login route
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // forget password route
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('forgot-password', 'ShowEmailForm')->name('password.reset');

        Route::post('/forgot-password', 'submitEmail')->name('email.submit');
        //route to show the otp form
         Route::get('confirm-code/{token}', 'showConfirmationCode')->name('confirm.code');
         // route to submit the verify-password-otp
         Route::post('/verify-password-otp/{token}', 'verifyPasswordOtp')->name('user.verify-password-otp');
         
         // route to return reset_password view
         Route::get('reset-password/{token}', 'showResetPasswordForm')->name('password_reset_form');
        //  route to submit reset-password
        Route::post('/reset-password/{token}', 'submitResetPassword')->name('reset.password.submit');
        /// route to resend code
         Route::get('/resend-code/{token}', 'resendOtp')->name('resend.code');

        


         



    });


  
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
