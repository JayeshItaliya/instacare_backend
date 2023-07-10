<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReminderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('login', [AuthenticationController::class, 'index']);
Route::post('login', [AuthenticationController::class, 'login']);
Route::get('logout', [AuthenticationController::class, 'logout']);
Route::get('password/reset', [AuthenticationController::class, 'forgot_password']);
Route::post('password/email', [AuthenticationController::class, 'sendResetLinkEmail']);
Route::get('password/reset/{token}', [AuthenticationController::class, 'showResetForm']);
Route::post('password/reset/{token}', [AuthenticationController::class, 'reset']);
Route::get('reset-password', function () {
    return view('admin.auth.reset_password');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('who-on', function () {
        return view('admin.whos_on.index');
    });
    Route::get('people/details', function () {
        return view('admin.people.details');
    });
    Route::get('facilities', function () {
        return view('admin.facilities.index');
    });
    Route::get('facilities/add', function () {
        return view('admin.facilities.add');
    });
    Route::get('facilities/details', function () {
        return view('admin.facilities.show');
    });
    Route::get('timecards', function () {
        return view('admin.timecards.index');
    });
    Route::get('timecards/add', function () {
        return view('admin.timecards.add');
    });
    Route::get('schedules', function () {
        return view('admin.schedules.index');
    });
    Route::get('payroll', function () {
        return view('admin.payroll.index');
    });
    Route::get('messaging', function () {
        return view('admin.messaging.index');
    });
    Route::get('reports', function () {
        return view('admin.reports.index');
    });
    Route::get('notifications', function () {
        return view('admin.notifications.index');
    });
    Route::get('marketplace', function () {
        return view('admin.marketplace.index');
    });

    Route::post('form', [UserController::class, 'form']);
    Route::post('set-signature', [UserController::class, 'set_signature']);

    Route::get('emp-dashboard', function () {
        return view('admin.dashboard.emp_dashboard');
    });
    Route::get('bulletin', function () {
        return view('admin.bulletin.index');
    });
    Route::get('total-billing', function () {
        return view('admin.totalbilling.index');
    });


    // Template settings
    Route::resource('settings', SettingsController::class);
    Route::post('manage-templates', [SettingsController::class, 'managetemplates'])->name('manage.template.settings');
    Route::post('manage-etemplates', [SettingsController::class, 'manageemailtemplates'])->name('manage.email.template.settings');
    Route::delete('delete-templates/{id}', [SettingsController::class, 'destroytemplate'])->name('template.settings.delete');
    // News settings
    Route::post('manage-news', [SettingsController::class, 'managenews'])->name('manage.news.settings');
    Route::delete('manage-news/{id}', [SettingsController::class, 'destroynews'])->name('news.settings.delete');
    // Points settings
    Route::post('manage-points', [SettingsController::class, 'managepoints'])->name('manage.points.settings');
    Route::delete('manage-points/{id}', [SettingsController::class, 'destroypoints'])->name('points.settings.delete');
    // billing settings
    Route::post('manage-billing', [SettingsController::class, 'managebilling'])->name('manage.billing.settings');
    // user settings
    Route::post('manage-user', [SettingsController::class, 'manageuser'])->name('manage.user.settings');
    // reason settings
    Route::post('manage-reason', [SettingsController::class, 'managereason'])->name('manage.reason.settings');
    Route::delete('manage-reason/{id}', [SettingsController::class, 'destroyreason'])->name('reason.settings.delete');
    // users
    Route::post('users/changestatus', [UserController::class, 'changestatus'])->name('users.changestatus');
    // Messages
    Route::group(['prefix' => 'messaging', 'as' => 'messaging.'], function() {
        Route::get('/', [MessageController::class, 'index'])->name('index');
        Route::get('show-compose', [MessageController::class, 'showCompose'])->name('show-compose');
        Route::get('show-user-chat', [MessageController::class, 'showUserChat'])->name('show-user-chat');

        Route::post('store', [MessageController::class, 'sendNewMessage'])->name('store');
        Route::post('get-receiver-message', [MessageController::class, 'showReceiverMessage'])->name('get-receiver-message');
        Route::post('get-facility-users', [MessageController::class, 'getFacilityUsers'])->name('get-facility-users');
        Route::post('compose', [MessageController::class, 'storeCompose'])->name('compose.store');

        Route::post('mark-as-read', [MessageController::class, 'markAsRead'])->name('mark-as-read');
    });

    Route::resource('my-availability', AvailabilityController::class);
    Route::resource('support', SupportController::class);
    Route::resource('people', PeopleController::class);
    Route::post('people/changepassword/{id}', [PeopleController::class, 'changepassword']);
    Route::post('people/submitdoc/{id}', [PeopleController::class, 'submitdoc']);
    Route::resource('profile', ProfileController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('shifts', ShiftsController::class);
    Route::post('storerecurring', [ShiftsController::class,'storerecurring'])->name('recurring.shifts.store');
    Route::post('storesheet', [ShiftsController::class,'storesheet'])->name('sheet.shifts.store');
    Route::post('supervisors', [ShiftsController::class,'supervisors']);
    Route::get('employees', [ShiftsController::class,'employees'])->name('shift.employees');

    Route::get('/', [DashboardController::class, 'dashboard']);
    Route::post('reminder/{type}', [ReminderController::class, 'fetchdata']);
    Route::post('reminder', [ReminderController::class, 'store'])->name('reminder.store');

    Route::post('update-password', [ProfileController::class, 'updatepassword'])->name('password.update');
});
