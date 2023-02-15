<?php

use App\Http\Controllers\Hods\ApprovalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::prefix('hod')->group(function () {
    Route::resource('approvals', ApprovalController::class);
});
