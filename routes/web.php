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

# Table routes
require_once __DIR__ . '/table.php';

# Auth routes
require_once __DIR__ . '/auth.php';

# Admin routes
require_once __DIR__ . '/admin.php';

# Marketing routes
require_once __DIR__ . '/marketing.php';

# Hod routes
require_once __DIR__ . '/hod.php';

# Technicians routes
require_once __DIR__ . '/technician.php';

# Tenant routes
require_once __DIR__ . '/finance.php';

# Tenant routes
require_once __DIR__ . '/tenant.php';

# Ajax routes
require_once __DIR__ . '/ajax.php';
