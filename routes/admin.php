<?php

use App\Http\Controllers\System\AdminLoginController;
use Illuminate\Support\Facades\Route;

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



Route::prefix('admin')->group(function () {

    // Route group for AdminLoginController
    Route::controller(AdminLoginController::class)->group(function () {

        // Route to show login page (accessible to guests)
        Route::get('login', 'showLoginPage')
            ->middleware('guest')
            ->name('admin.login');

        // Route to handle login form submission (accessible to guests)
        Route::post('login', 'submitLoginForm')
            ->middleware('guest:admin')
            ->name('admin.login.submit');

        // Route to show forget password page (accessible to guests)
        Route::get('forgot-password', 'showForgetPasswordPage')
            ->middleware('guest')
            ->name('admin.password.request');

        // Route to handle password reset request form submission (accessible to guests)
        Route::post('forgot-password', 'submitForgetPasswordForm')
            ->middleware('guest')
            ->name('admin.password.email');

        // Route to show reset password form (accessible to guests)
        Route::get('reset-password/{token}', 'showResetPasswordPage')
            ->middleware('guest')
            ->name('admin.password.reset');

        // Route to handle password reset form submission (accessible to guests)
        Route::post('reset-password', 'submitResetPasswordForm')
            ->middleware('guest')
            ->name('admin.password.update');

        // Route to show insert OTP code page (accessible to guests)
        Route::get('otp', 'showInsertOtpPage')
            ->middleware('guest')
            ->name('admin.otp.show');

        // Route to handle OTP code submission (accessible to guests)
        Route::post('otp', 'submitOtpCode')
            ->middleware('guest')
            ->name('admin.otp.submit');

        // Protected routes that require admin authentication
        Route::middleware('auth:admin')->group(function () {

            // Route to show dashboard (only for authenticated admins)
            Route::get('dashboard', 'dashboard')
                ->name('admin.dashboard');

            // Add other protected routes here...

        });
    });
});
