<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function dashboard()
    {
        $households = Household::where('recorded_by', auth()->id())->get();

        $totalHouseholds = $households->count();
        $prepared = $households->where('preparedness_status', 'Prepared')->count();
        $partiallyPrepared = $households->where('preparedness_status', 'Partially Prepared')->count();
        $notPrepared = $households->where('preparedness_status', 'Not Prepared')->count();

        $recentHouseholds = $households->sortByDesc('last_assessed')->take(5);

        return view('staff.dashboard', compact(
            'households',
            'totalHouseholds',
            'prepared',
            'partiallyPrepared',
            'notPrepared',
            'recentHouseholds'
        ));
    }

    public function map()
    {
        return view('staff.map');
    }
}