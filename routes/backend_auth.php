<?php

use App\Http\Controllers\Backend_auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend_auth\NewPasswordController;
use App\Http\Controllers\Backend_auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin", "middleware" =>[ "guest:admin"], "as" => "admin."],function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::group(["prefix" => "admin", "middleware" => ["auth:admin"], "as" => "admin."],function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
