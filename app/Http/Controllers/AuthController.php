<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Siguruha nga Auth::attempt ang gamit
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        // I-check kung admin ba o staff
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('staff.dashboard');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput($request->only('email'));
}

    public function register(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contactNumber' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|string'
        ]);

        // Auto-generate a unique user_id
        $latestUser = User::latest('id')->first();
        $nextId = $latestUser ? $latestUser->id + 1 : 1;
        $userId = 'USR-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'contactNumber' => $request->contactNumber,
            'user_id' => $userId,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'bhw',
        ]);

        Auth::login($user);

        // Redirect base sa bag-ong role
        return ($user->role === 'admin') 
            ? redirect()->route('admin.dashboard') 
            : redirect()->route('staff.dashboard');
    }
}