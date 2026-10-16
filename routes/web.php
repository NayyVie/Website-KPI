<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerifikasiUnitController;


// AUTHENTICATION
Route::get('/', function () {
    return view('Auth.login');
});

// UNIT
Route::get('/dashboardUnit', function () {
    return view('Unit.dashboard');
})->name('dashboardUnit');

// ADMIN
Route::get('/dashboardAdmin', function () {
    return view('Admin.dashboardAdmin');
})->name('dashboardAdmin');


Route::get('/admin/unit/{unit}/verifikasi', [
    VerifikasiUnitController::class,
    'show'
])->name('admin.unit.verifikasi');
