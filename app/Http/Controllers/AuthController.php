<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function showRegister(){
        return view('auth.register');
    }

    public function login(Request $request){
        $validated=$request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('staff.dashboard');
            }
        }

        throw ValidationException::withMessages([
            'email' => 'Invalid email or password',
            'password' => 'Invalid email or password',
        ]);
    }

    public function register(Request $request){
        $validated=$request->validate([
            'firstName'=>'required|string|max:50',
            'lastName'=>'required|string|max:50',
            'email'=>'required|email|unique:users',
            'contactNumber'=>'required|string|max:15',
            'password'=>'required|string|min:8|confirmed',
            'user_id'=>'required|string|unique:users',
            'role'=>'required|string|in:bhw,fhw,admin'
        ]);

        $user= User::create([
            'firstName' => $validated['firstName'],
            'lastName' => $validated['lastName'],
            'email' => $validated['email'],
            'contactNumber' => $validated['contactNumber'],
            'password' => bcrypt($validated['password']),
            'user_id' => $validated['user_id'],
            'role' => $validated['role']
        ]);

        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('staff.dashboard');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
