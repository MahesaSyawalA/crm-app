<?php

use App\Http\Controllers\Finances\AccountController;
use App\Http\Controllers\Finances\InvoiceFinanceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::middleware(['auth', 'role:finance'])->prefix('finance')
    ->group(function () {
    Route::resource('accounts', AccountController::class);
    Route::resource('invoicesfinance', InvoiceFinanceController::class);
});
