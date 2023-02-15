<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Lead Management Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('leadmanagements', [LeadManagementController::class, 'index'])->name('leadmanagements');
    // Route::get('', [RoomPositionController::class, 'store'])->name('createRoomPositions');
});
