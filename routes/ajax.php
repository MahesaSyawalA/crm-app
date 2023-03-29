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
Route::get('/ajax/rooms/{id}/roompositions', [AjaxController::class, 'getRoomPositions']);
Route::get('/ajax/floors/{id}/getdetails', [AjaxController::class, 'getFloorDetails']);
Route::get('/ajax/rooms/{id}/getdetails', [AjaxController::class, 'getRoomDetails']);
Route::get('/ajax/users/{id}/getdetails', [AjaxController::class, 'getUserDetails']);
Route::get('/ajax/grades/{id}', [AjaxController::class, 'getGrade']);
Route::get('/ajax/services/{id}', [AjaxController::class, 'getService']);
Route::get('/ajax/tenants/{id}/getleadmanagements', [AjaxController::class, 'getLeadManagements']);
