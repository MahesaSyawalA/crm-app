<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('marketing')->group(function () {
    Route::resource('leadmanagements', BuildingController::class);
    Route::resource('tenants', FloorController::class);
    Route::resource('contracts', RoomController::class);
    Route::resource('billings', RoomPositionController::class);
});
