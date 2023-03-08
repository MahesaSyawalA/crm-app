<?php

use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Table Routes
|--------------------------------------------------------------------------
 */

//BISA
Route::get('/admin/floors/table', [TableController::class, 'tableFloors'])->name('floors.table');
Route::get('/admin/rooms/table', [TableController::class, 'tableRooms'])->name('rooms.table');
