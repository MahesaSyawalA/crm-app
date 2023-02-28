<?php

use App\Http\Controllers\Admins\FloorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Table Routes
|--------------------------------------------------------------------------
 */

Route::get('/admin/floors/table', [FloorController::class, 'table'])->name('floors.table');
