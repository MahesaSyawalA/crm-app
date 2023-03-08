<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\RoomController;
use App\Http\Controllers\Admins\FloorController;
use App\Http\Controllers\Admins\GradeController;
use App\Http\Controllers\Admins\FinanceController;
use App\Http\Controllers\Admins\ServiceController;
use App\Http\Controllers\Admins\BuildingController;
use App\Http\Controllers\Admins\MarketingController;
use App\Http\Controllers\Admins\TechnicianController;
use App\Http\Controllers\Admins\RoomPositionController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::middleware(['auth', 'role:admin'])->prefix('admin')
    ->group(function () {
    Route::resource('buildings', BuildingController::class);
    Route::resource('floors', FloorController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('roompositions', RoomPositionController::class);
    Route::resource('marketings', MarketingController::class);
    Route::resource('technicians', TechnicianController::class);
    Route::resource('finances', FinanceController::class);
    Route::resource('grades', GradeController::class);
    Route::resource('services', ServiceController::class);
});
