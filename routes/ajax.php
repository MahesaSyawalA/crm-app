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
Route::get('/ajax/users/{id}/getdetails', [AjaxController::class, 'getUserDetails']);
Route::get('/ajax/grades/{id}', [AjaxController::class, 'getGrade']);
Route::get('/ajax/services/{id}', [AjaxController::class, 'getService']);
Route::get('/ajax/tenants/{id}/getleadmanagements', [AjaxController::class, 'getLeadManagements']);
