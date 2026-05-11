<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseholdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('staff.households');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'recorded_by' => 'required|integer|exists:users,id',
            'household_head' => 'required|string|max:255',
            'house_no' => 'nullable|string|max:50',
            'street_name' => 'required|string|max:255',
            'sitio' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'total_family_members' => 'required|integer|min:1',
            'total_pwd' => 'required|integer|min:0',
            'total_seniors' => 'required|integer|min:0',
            'total_infants' => 'required|integer|min:0',
            'has_pregnant_member' => 'required|boolean',
            'evacuation_area' => 'nullable|string|max:255'
        ]);

        $nextNumber = Household::count() + 1;

        $validatedData['household_number'] = 'HH-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        // Households are not yet assessed until staff training is complete.
        $validatedData['score'] = null;
        $validatedData['preparedness_status'] = null;
        $validatedData['last_assessed'] = null;

        Household::create($validatedData);

        return redirect()->route('households.index')->with('success', 'Household added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Household $household)
    {
        return view('staff.households.show', compact('household'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Household $household)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Household $household)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Household $household)
    {
        $household->delete();

        // Renumber remaining households sequentially
        $remainingHouseholds = Household::orderBy('household_id')->get();
        foreach ($remainingHouseholds as $index => $remainingHousehold) {
            $newNumber = 'HH-' . str_pad($index + 1, 3, '0', STR_PAD_LEFT);
            $remainingHousehold->update(['household_number' => $newNumber]);
        }

        if (request()->routeIs('admin.households.destroy')) {
            return redirect()->route('admin.households')->with('success', 'Household deleted successfully.');
        }

        return redirect()->route('households.index')->with('success', 'Household deleted successfully.');
    }
}
