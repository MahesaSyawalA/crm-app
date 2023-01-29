<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', fn () => view('home'));
Route::prefix('admin')->group(function () {
        Route::get('gedung', fn () => view('admins.places.buildings.index'))->name('buildings');
        Route::get('lantai', fn () => view('admins.places.floors.index'))->name('floors');
        Route::get('ruang', fn () => view('admins.places.rooms.index'))->name('rooms');
        Route::get('posisi-ruang', fn () => view('admins.places.rpositions.index'))->name('rpositions');
        Route::get('marketing', fn () => view('admins.users.marketings.index'))->name('marketings');
        Route::get('teknik', fn () => view('admins.users.technicians.index'))->name('technicians');
        Route::get('keuangan', fn () => view('admins.users.finances.index'))->name('finances');
        Route::get('grade', fn () => view('admins.grades.index'))->name('grades');
        Route::get('servis', fn () => view('admins.services.index'))->name('services');
});

Route::prefix('marketing')->group(function () {
    Route::get('lead-management', fn () => view('marketings.leadmanagements.index'))->name('leadmanagements');
    Route::get('tenant', fn () => view('marketings.tenants.index'))->name('tenants');
    Route::get('kontrak', fn () => view('marketings.contracts.index'))->name('contracts');
    Route::get('billing', fn () => view('marketings.billings.index'))->name('billings');
});

Route::prefix('kepala-divisi')->group(function () {
    Route::get('approval', fn () => view('hods.approvals.index'))->name('approvals');
});

Route::prefix('teknik')->group(function () {
    Route::get('cater', fn () => view('technicians.caters.index'))->name('caters');
    Route::get('listrik', fn () => view('technicians.electricities.index'))->name('electricities');
    Route::get('daya', fn () => view('technicians.powers.index'))->name('powers');
    Route::get('standmeter', fn () => view('technicians.standmeters.index'))->name('standmeters');
});


Route::get('/login', fn () => view('auth.login'));
Route::get('/register', fn () => view('auth.register'));
Route::get('/register', fn () => view('auth.register'));
