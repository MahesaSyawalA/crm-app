<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hods\BillingController;
use App\Http\Controllers\Hods\ApprovalController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::middleware(['auth', 'role:hod'])->prefix('hod')
    ->group(function () {
    Route::get('approvals/{approval}/create-billing', [ApprovalController::class, 'createBilling'])->name('approvals.createbilling');
    Route::resource('approvals', ApprovalController::class);
    Route::resource('hodbillings', BillingController::class);
});
