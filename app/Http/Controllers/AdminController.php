<?php

namespace App\Http\Controllers;
use App\Models\Household;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
    return view('admin.dashboard');
}
    public function households() {
    return view('admin.households');
    }
    public function map() {
      $households = Household::all();

    return view('admin.map', compact('households'));
    }
}
