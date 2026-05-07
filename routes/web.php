<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HouseholdController;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/register', 'register')->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');


Route::middleware(['auth', 'role:admin'])->controller(AdminController::class)->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/admin/households', 'households')->name('admin.households');
    Route::get('/admin/map', 'map')->name('admin.map');
});


Route::middleware(['auth', 'role:bhw,fhw'])->controller(StaffController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('staff.dashboard');
    Route::get('/map', 'map')->name('staff.map');
    Route::resource('households', HouseholdController::class);
});