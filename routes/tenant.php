<?php

use App\Http\Controllers\Tenants\InvoiceTenantController;
use App\Http\Controllers\Tenants\ReceiptController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::prefix('tenant')->group(function () {
    Route::resource('invoicestenant', InvoiceTenantController::class);
    Route::resource('receipts', ReceiptController::class);
});
