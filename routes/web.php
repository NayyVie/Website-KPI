<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/dashboardAdmin', function () {
    return view('Admin.dashboardAdmin');
})->name('dashboardAdmin');