<?php
// Admin ROUTES


use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\EventBookings;
use App\Http\Controllers\Admin\EventCategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth', 'can:access-admin-dashboard')->group(function () {

    Route::get('dashboard', [AdminDashboardController::class, 'adminDashboard'])->name('dashboard');

    Route::get('/event-categories/archived', [EventCategoryController::class, 'archived'])->name
    ('event-categories.archived');


    Route::patch('/event-categories/{id}/restore', [EventCategoryController::class, 'restore'])
    ->name('event-categories.restore');

       Route::put('/event-categories/{id}/force-delete', [EventCategoryController::class, 'forceDelete'])
    ->name('event-categories.force-delete');

    Route::resource('event-categories', EventCategoryController::class);
  

    // event routes 
        // Route for archived events
        Route::get('events/archived', [EventController::class, 'archived'])->name('events.archived');

        // Events Resource Routes
        Route::resource('events', EventController::class);

        // restore and force delete (Events)
        Route::patch('events/{id}/restore', [EventController::class, 'restore'])->name('events.restore');
        Route::put('events/{id}/force-delete', [EventController::class, 'forceDelete'])->name('events.force-delete');

        //Route for Event Bookings
        Route::get('pending_events', [EventBookings::class, 'pending'])->name('pending.events');
         Route::get('completed_events', [EventBookings::class, 'completed'])->name('completed.events');
         Route::get('all_events', [EventBookings::class, 'all'])->name('all.events');
         Route::get('events_transaction', [EventBookings::class, 'transaction'])->name('transaction');



// profile management route
Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/', 'updateProfile')->name('update');
    Route::patch('/password', 'updatePassword')->name('password');
});


// User Routes
Route::prefix('user')->name('user.')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('user.info');
});

});
?>