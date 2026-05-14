<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HouseholdController;

// 1. HOME ROUTE
Route::get('/', function () {
    return view('home'); 
})->name('home');

// 2. AUTHENTICATION ROUTES
Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/register', 'showRegister')->name('register');
    
    // GIBULAG NA NATO ANG DUHA KA ROTA ARON MASIGURO NGA MAKIT-AN ANG 'login.process'
    Route::post('/login', 'login')->name('login.post'); 
    Route::post('/login-process', 'login')->name('login.process'); // <--- KINI ANG GIPANGITA SA IMONG ERROR!
    
    Route::post('/register', 'register')->name('register.post');
});

// 3. ADMIN ROUTES
Route::middleware(['auth', 'role:admin'])->controller(AdminController::class)->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/admin/households', 'households')->name('admin.households');
    Route::get('/admin/map', 'map')->name('admin.map');
    Route::get('/admin/households/{household}', [HouseholdController::class, 'show'])->name('admin.households.show');
    Route::delete('/admin/households/{household}', [HouseholdController::class, 'destroy'])->name('admin.households.destroy');
});

// 4. STAFF ROUTES
Route::middleware(['auth', 'role:bhw,fhw'])->controller(StaffController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('staff.dashboard');
    Route::get('/map', 'map')->name('staff.map');
    Route::resource('households', HouseholdController::class);
});

// 5. LOGOUT ROUTE
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');