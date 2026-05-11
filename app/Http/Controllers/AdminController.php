<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $households = Household::all();

        $totalHouseholds = $households->count();
        $prepared = $households->where('preparedness_status', 'Prepared')->count();
        $partiallyPrepared = $households->where('preparedness_status', 'Partially Prepared')->count();
        $notPrepared = $households->where('preparedness_status', 'Not Prepared')->count();

        return view('admin.dashboard', compact(
            'households',
            'totalHouseholds',
            'prepared',
            'partiallyPrepared',
            'notPrepared'
        ));
    }

    public function households(Request $request)
    {
        $search = $request->input('search');
        $selectedSitio = $request->input('sitio');
        $selectedPreparedness = $request->input('preparedness');

        $householdQuery = Household::query();

        if (!empty($search)) {
            $householdQuery->where(function ($query) use ($search) {
                $query->where('household_number', 'like', "%{$search}%")
                    ->orWhere('household_head', 'like', "%{$search}%")
                    ->orWhere('sitio', 'like', "%{$search}%")
                    ->orWhere('street_name', 'like', "%{$search}%")
                    ->orWhere('evacuation_area', 'like', "%{$search}%");
            });
        }

        if (!empty($selectedSitio)) {
            $householdQuery->where('sitio', $selectedSitio);
        }

        if (!empty($selectedPreparedness)) {
            $householdQuery->where('preparedness_status', $selectedPreparedness);
        }

        $sitios = Household::select('sitio')->distinct()->orderBy('sitio')->pluck('sitio');
        $households = $householdQuery->orderBy('household_id', 'desc')->paginate(10);

        $allHouseholds = Household::all();
        $totalHouseholds = $allHouseholds->count();
        $prepared = $allHouseholds->where('preparedness_status', 'Prepared')->count();
        $partiallyPrepared = $allHouseholds->where('preparedness_status', 'Partially Prepared')->count();
        $notPrepared = $allHouseholds->where('preparedness_status', 'Not Prepared')->count();

        return view('admin.households', compact(
            'households',
            'totalHouseholds',
            'prepared',
            'partiallyPrepared',
            'notPrepared',
            'search',
            'sitios',
            'selectedSitio',
            'selectedPreparedness'
        ));
    }

    public function map()
    {
        $households = Household::all();
        return view('admin.map', compact('households'));
    }
}
