<?php

use App\Http\Controllers\Technicians\CaterController;
use App\Http\Controllers\Technicians\ElectricityController;
use App\Http\Controllers\Technicians\PowerController;
use App\Http\Controllers\Technicians\StandmeterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::middleware(['auth', 'role:technician'])->prefix('technician')
    ->group(function () {
    Route::resource('caters', CaterController::class);
    Route::resource('electricities', ElectricityController::class);
    Route::resource('powers', PowerController::class);
    Route::resource('standmeters', StandmeterController::class)->middleware(['auth', 'role:technician|cater']);
});
