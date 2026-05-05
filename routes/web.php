<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/households', function () {
    return view('admin.households');
})->name('households');

Route::get('/map', function () {
    return view('admin.map');
})->name('map');