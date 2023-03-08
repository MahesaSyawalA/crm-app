<?php

use App\Http\Controllers\Hods\ApprovalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::middleware(['auth', 'role:hod'])->prefix('hod')
    ->group(function () {
    Route::resource('approvals', ApprovalController::class);
});
