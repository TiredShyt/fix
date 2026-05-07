<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ADD THIS IMPORT

class StaffController extends Controller
{
   public function dashboard() {
    return view('staff.dashboard');
   }
    public function map() {
    return view('staff.map');
    }
}