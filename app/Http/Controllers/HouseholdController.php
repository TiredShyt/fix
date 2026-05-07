<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;

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
            'has_pregnant_member' => 'required|boolean'
        ]);

        Household::create($validatedData);

        return redirect()->route('households.index')->with('success', 'Household added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Household $household)
    {
        //
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
        //
    }
}
