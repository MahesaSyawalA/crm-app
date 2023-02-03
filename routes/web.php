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

Route::get('/', fn () => view('home'))->name('home');
Route::prefix('admin')->group(function () {
        Route::get('gedung', fn () => view('admins.places.buildings.index'))->name('buildings');
        Route::prefix('lantai')->group(function () {
            Route::get('/', fn () => view('admins.places.floors.index'))->name('floors');
            Route::get('create', fn () => view('admins.places.floors.create'))->name('createFloors');
        });
        Route::prefix('ruang')->group(function () {
            Route::get('/', fn () => view('admins.places.rooms.index'))->name('rooms');
            Route::get('create', fn () => view('admins.places.rooms.create'))->name('createRooms');
        });
        Route::get('posisi-ruang', fn () => view('admins.places.room-positions.index'))->name('roomPositions');
        Route::get('marketing', fn () => view('admins.users.marketings.index'))->name('marketings');
        Route::get('teknik', fn () => view('admins.users.technicians.index'))->name('technicians');
        Route::get('keuangan', fn () => view('admins.users.finances.index'))->name('finances');
        Route::get('grade', fn () => view('admins.grades.index'))->name('grades');
        Route::get('service', fn () => view('admins.services.index'))->name('services');
});

Route::prefix('marketing')->group(function () {
    Route::prefix('lead-management')->group(function () {
        Route::get('/', fn () => view('marketings.leadmanagements.index'))->name('leadManagements');
        Route::get('create', fn () => view('marketings.leadmanagements.create'))->name('createLeadManagements');
    });
    Route::prefix('tenant')->group(function () {
        Route::get('/', fn () => view('marketings.tenants.index'))->name('tenants');
        Route::get('create', fn () => view('marketings.tenants.create'))->name('createTenants');
    });
    Route::prefix('kontrak')->group(function () {
        Route::get('/', fn () => view('marketings.contracts.index'))->name('contracts');
        Route::get('create', fn () => view('marketings.contracts.create'))->name('createContracts');
    });

    Route::get('billing', fn () => view('marketings.billings.index'))->name('billings');
});

Route::prefix('kepala-divisi')->group(function () {
    Route::get('approval', fn () => view('hods.approvals.index'))->name('approvals');
});

Route::prefix('teknik')->group(function () {
    Route::get('cater', fn () => view('technicians.caters.index'))->name('caters');
    Route::get('listrik', fn () => view('technicians.electricities.index'))->name('electricities');
    Route::get('daya', fn () => view('technicians.powers.index'))->name('powers');
    Route::prefix('standmeter')->group(function () {
        Route::get('/', fn () => view('technicians.standmeters.index'))->name('standmeters');
        Route::get('create', fn () => view('technicians.standmeters.create'))->name('createStandmeters');
    });
});

Route::prefix('keuangan')->group(function () {
    Route::get('rekening', fn () => view('finances.accounts.index'))->name('accounts');
    Route::get('invoice', fn () => view('finances.invoices.index'))->name('invoices-fn');
});

Route::prefix('tenant')->group(function () {
    Route::get('invoice', fn () => view('tenants.invoices.index'))->name('invoices-tn');
    Route::get('kwitansi', fn () => view('tenants.receipts.index'))->name('receipts');
});



Route::get('/login', fn () => view('auth.login'));
Route::get('/register', fn () => view('auth.register'));
Route::get('/register', fn () => view('auth.register'));
