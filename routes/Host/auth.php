<?php

use App\Http\Controllers\Host\AuthenticatedSessionController;
use App\Http\Controllers\Host\ConfirmablePasswordController;
use App\Http\Controllers\Host\EmailVerificationNotificationController;
use App\Http\Controllers\Host\EmailVerificationPromptController;
use App\Http\Controllers\Host\NewPasswordController;
use App\Http\Controllers\Host\PasswordResetLinkController;
use App\Http\Controllers\Host\RegisteredUserController;
use App\Http\Controllers\Host\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    
    
    // Route::get('register', [RegisteredUserController::class, 'create']);

    Route::post('register', [RegisteredUserController::class, 'store'])
                ->name('host_post_register');

    // Route::get('login', [AuthenticatedSessionController::class, 'create']);

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('host_password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('host_password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('host_password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('host_password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('host_verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('host_verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('host_verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('host_password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('host_logout');
});
