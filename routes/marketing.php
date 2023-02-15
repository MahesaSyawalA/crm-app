<?php

use App\Http\Controllers\Marketings\BillingController;
use App\Http\Controllers\Marketings\ContractController;
use App\Http\Controllers\Marketings\LeadManagementController;
use App\Http\Controllers\Marketings\TenantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::prefix('marketing')->group(function () {
    Route::resource('leadmanagements', LeadManagementController::class);
    Route::resource('tenants', TenantController::class);
    Route::resource('contracts', ContractController::class);
    Route::resource('billings', BillingController::class);
});
