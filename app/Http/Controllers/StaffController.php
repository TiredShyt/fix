<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * DASHBOARD VIEW
     * Gipang-ihap nato ang records base sa kinsa ang naka-login (Staff)
     */
    public function dashboard()
    {
        // 1. Kuhaon ang ID sa user nga naka-login karon
        $userId = Auth::id();

        // 2. Statistics: Ihapon ang records base sa preparedness_status
        // Siguraduha nga 'preparedness_status' ang column name sa imong DB
        $totalHouseholds = Household::where('recorded_by', $userId)->count();
        
        $prepared = Household::where('recorded_by', $userId)
            ->where('preparedness_status', 'Prepared')
            ->count();
            
        $partiallyPrepared = Household::where('recorded_by', $userId)
            ->where('preparedness_status', 'Partially Prepared')
            ->count();
            
        $notPrepared = Household::where('recorded_by', $userId)
            ->where('preparedness_status', 'Not Prepared')
            ->count();

        // 3. Recent Activity: 5 ka pinaka-ulahing gi-add nga household
        $recentHouseholds = Household::where('recorded_by', $userId)
            ->latest() // Mao ni shortcut sa orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // 4. I-pasa ang data sa view
        return view('staff.dashboard', compact(
            'totalHouseholds',
            'prepared',
            'partiallyPrepared',
            'notPrepared',
            'recentHouseholds'
        ));
    }

    /**
     * MAP VIEW
     * Para sa pag-display sa households sa mapa nga naay filters
     */
    public function map(Request $request)
    {
        $query = Household::query();

        // Filter: Search Name o Number
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('household_head', 'like', "%{$search}%")
                  ->orWhere('household_number', 'like', "%{$search}%");
            });
        }

        // Filter: Per Sitio
        if ($request->filled('sitio')) {
            $query->where('sitio', $request->input('sitio'));
        }

        // Filter: Per Status
        if ($request->filled('status')) {
            $query->where('preparedness_status', $request->input('status'));
        }

        $households = $query->get();

        // Counters para sa Map (Ihap sa tibuok barangay)
        $preparedCount = Household::where('preparedness_status', 'Prepared')->count();
        $partiallyCount = Household::where('preparedness_status', 'Partially Prepared')->count();
        $notPreparedCount = Household::where('preparedness_status', 'Not Prepared')->count();

        // Kuhaon ang listahan sa mga Sitio para sa dropdown filter
        $sitios = Household::distinct()->pluck('sitio')->filter()->sort()->values();

        return view('staff.map', compact(
            'households',
            'sitios',
            'preparedCount',
            'partiallyCount',
            'notPreparedCount'
        ));
    }
}