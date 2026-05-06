<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
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


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/households', function () {
        return view('admin.households');
    })->name('admin.households');
    Route::get('/admin/map', function () {
        return view('admin.map');
    })->name('admin.map');
});


Route::middleware(['auth', 'role:bhw,fhw'])->group(function () {
    Route::get('/dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');

    Route::get('/households', function () {
        return view('staff.households');
    })->name('staff.households');

    Route::get('/map', function () {
        return view('staff.map');
    })->name('staff.map');
});