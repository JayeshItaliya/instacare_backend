<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\PeopleController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\ShiftsController;
use App\Http\Controllers\Api\AvailabilityController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ReminderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Define your protected API routes here
Route::middleware(['api.validate'])->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('sendresetlinkemail', 'sendResetLinkEmail');
    });
    Route::middleware('auth.sanctum')->group(function () {
        Route::get('logout', [AuthenticationController::class, 'logout']);
        Route::get('news-list', [DashboardController::class, 'newslist']);
        Route::controller(UserController::class)->group(function () {
            Route::post('changestatus', 'changestatus');
            Route::post('changepassword', 'changepassword');
        });
        Route::controller(ProfileController::class)->group(function () {
            Route::get('edit-profile', 'edit_profile');
            Route::post('edit-profile', 'update_profile');
        });
        Route::controller(PeopleController::class)->group(function () {
            Route::get('people-list', 'index');
            Route::get('get-people/{id}', 'show');
        });
        Route::controller(SupportController::class)->group(function () {
            Route::get('reason-list', 'index');
            Route::post('support', 'store');
        });
        Route::controller(ShiftsController::class)->group(function () {
            Route::get('facilities-list', 'facilities');
            Route::get('employees-list', 'employees');
            Route::post('single-shift', 'store');
            Route::post('recurring-shift', 'storerecurring');
            Route::post('sheet-shift', 'storesheet');
        });
        Route::controller(AvailabilityController::class)->group(function () {
            Route::post('availability', 'store');
        });
        Route::controller(ReminderController::class)->group(function () {
            Route::post('reminder/{type}', 'index');
            Route::post('reminder', 'store');
        });
        // Route::controller(MessageController::class)->group(['prefix' => 'messaging'], function () {
        //     Route::post('reminder/{type}', 'index');
        //     Route::post('get-conact-list', 'getConactList');
        //     Route::post('get-facility-users', 'getFacilityUsers');
        //     Route::post('store-compose', 'storeCompose');
        //     Route::post('show-user-chat', 'showUserChat');
        //     Route::post('send-new-message', 'sendNewMessage');
        // });
        Route::group(['prefix' => 'messaging'], function () {
            Route::post('get-conact-list', [MessageController::class, 'getConactList']);

            Route::post('get-facility-users', [MessageController::class, 'getFacilityUsers']);

            Route::post('store-compose', [MessageController::class, 'storeCompose']);

            Route::post('show-user-chat', [MessageController::class, 'showUserChat']);
            Route::post('send-new-message', [MessageController::class, 'sendNewMessage']);
        });
    });
});
