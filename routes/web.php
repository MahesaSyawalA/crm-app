<?php

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

# Auth routes
require_once __DIR__ . '/auth.php';

# Admin routes
require_once __DIR__ . '/admin.php';
// require_once __DIR__ . '/ajax.php';

# Marketing routes
// Route::prefix('marketing')->group(function () {
//     Route::prefix('lead-management')->group(function () {
//         Route::get('/', fn () => view('marketings.leadmanagements.index'))->name('leadManagements');
//         Route::get('create', fn () => view('marketings.leadmanagements.create'))->name('createLeadManagements');
//     });
//     Route::prefix('tenant')->group(function () {
//         Route::get('/', fn () => view('marketings.tenants.index'))->name('tenants');
//         Route::get('create', fn () => view('marketings.tenants.create'))->name('createTenants');
//     });
//     Route::prefix('kontrak')->group(function () {
//         Route::get('/', fn () => view('marketings.contracts.index'))->name('contracts');
//         Route::get('create', fn () => view('marketings.contracts.create'))->name('createContracts');
//     });

//     Route::get('billing', fn () => view('marketings.billings.index'))->name('billings');
// });

# Kepala Divisi routes
// Route::prefix('kepala-divisi')->group(function () {
//     Route::get('approval', fn () => view('hods.approvals.index'))->name('approvals');
// });

# Teknik routes
// Route::prefix('teknik')->group(function () {
//     Route::get('cater', fn () => view('technicians.caters.index'))->name('caters');
//     Route::get('listrik', fn () => view('technicians.electricities.index'))->name('electricities');
//     Route::get('daya', fn () => view('technicians.powers.index'))->name('powers');
//     Route::prefix('standmeter')->group(function () {
//         Route::get('/', fn () => view('technicians.standmeters.index'))->name('standmeters');
//         Route::get('create', fn () => view('technicians.standmeters.create'))->name('createStandmeters');
//     });
// });

# Keuangan routes
// Route::prefix('keuangan')->group(function () {
//     Route::get('rekening', fn () => view('finances.accounts.index'))->name('accounts');
//     Route::get('invoice', fn () => view('finances.invoices.index'))->name('invoices-fn');
// });

# Tenant routes
// Route::prefix('tenant')->group(function () {
//     Route::get('invoice', fn () => view('tenants.invoices.index'))->name('invoices-tn');
//     Route::get('kwitansi', fn () => view('tenants.receipts.index'))->name('receipts');
// });
