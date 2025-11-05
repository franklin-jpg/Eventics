<?php

use App\Http\Controllers\User\EventController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Support\Facades\Route;

// USER ROUTE


Route::prefix('user')
->name('user.')
->middleware('auth', 'can:access-user-dashboard')
->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'userDashboard'])->name('dashboard');
});