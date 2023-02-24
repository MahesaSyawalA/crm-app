<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
 */

Route::get('/ajax/buildings/{id}/floors', [AjaxController::class, 'getFloors']);
Route::get('/ajax/floors/{id}/rooms', [AjaxController::class, 'getRooms']);
Route::get('/ajax/floors/{id}/getprices', [AjaxController::class, 'getPrices']);
