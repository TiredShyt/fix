<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ADD THIS IMPORT

class StaffController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Use the Facade here too
        $role = $user->role; 
        
        return view('staff.dashboard', [
            'title' => strtoupper($role) . " Dashboard"
        ]);
    }
}