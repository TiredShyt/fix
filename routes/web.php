<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HouseholdController;

/*
|--------------------------------------------------------------------------
| HOME ROUTE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('staff.dashboard');
    }
    return redirect()->route('login');
})->name('home');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN / REGISTER)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->controller(AuthController::class)->group(function () {

    // SHOW PAGES
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/register', 'showRegister')->name('register');

    // PROCESS LOGIN (IMPORTANT: ONE ONLY)
    Route::post('/login', 'login')->name('login.post');

    // PROCESS REGISTER
    Route::post('/register', 'register')->name('register.post');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->controller(AdminController::class)
    ->group(function () {

        Route::get('/admin/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/admin/households', 'households')->name('admin.households');
        Route::get('/admin/map', 'map')->name('admin.map');

        Route::get('/admin/households/{household}', [HouseholdController::class, 'show'])
            ->name('admin.households.show');

        Route::delete('/admin/households/{household}', [HouseholdController::class, 'destroy'])
            ->name('admin.households.destroy');
    });

/*
|--------------------------------------------------------------------------
| STAFF ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:bhw,fhw'])
    ->controller(StaffController::class)
    ->group(function () {

        Route::get('/dashboard', 'dashboard')->name('staff.dashboard');
        Route::get('/map', 'map')->name('staff.map');

        Route::resource('households', HouseholdController::class);
    });

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home');
})->name('logout');