<?php

use App\Http\Controllers\Admins\BuildingController;
use App\Http\Controllers\Admins\FloorController;
use App\Http\Controllers\Admins\RoomController;
use App\Http\Controllers\Admins\RoomPositionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::prefix('admin')->group(function () {
    Route::resource('buildings', BuildingController::class);
    Route::resource('floors', FloorController::class);
    Route::resource('rooms', RoomController::class);
    Route::get('rooms/create/ajax/{id}', [RoomController::class, 'getFloors']);
    Route::resource('roompositions', RoomPositionController::class);
});
