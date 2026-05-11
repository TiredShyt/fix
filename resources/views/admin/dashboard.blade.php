@extends('layouts.layout')

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Title -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Barangay Preparedness Dashboard</h1>
        <p class="text-gray-500 mt-1">Household Disaster Preparedness Monitoring System</p>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <!-- Total Households -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-gray-700 font-medium">Total Households</h2>
                <span class="text-gray-400 text-xl">👥</span>
            </div>
            <h3 class="text-4xl font-bold text-gray-900">{{ $totalHouseholds }}</h3>
            <p class="text-gray-500 mt-2">Registered in system</p>
        </div>

        <!-- Prepared -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-gray-700 font-medium">Prepared</h2>
                <span class="text-green-500 text-xl">✔️</span>
            </div>
            <h3 class="text-4xl font-bold text-green-600">{{ $prepared }}</h3>
            <p class="text-gray-500 mt-2">{{ round(($prepared / max($totalHouseholds, 1)) * 100) }}% of total</p>
        </div>

        <!-- Partially Prepared -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-gray-700 font-medium">Partially Prepared</h2>
                <span class="text-yellow-500 text-xl">⚠️</span>
            </div>
            <h3 class="text-4xl font-bold text-yellow-600">{{ $partiallyPrepared }}</h3>
            <p class="text-gray-500 mt-2">Need improvement</p>
        </div>

        <!-- Not Prepared -->
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-gray-700 font-medium">Not Prepared</h2>
                <span class="text-red-500 text-xl">❌</span>
            </div>
            <h3 class="text-4xl font-bold text-red-600">{{ $notPrepared }}</h3>
            <p class="text-gray-500 mt-2">Requires immediate action</p>
        </div>
    </div>

</div>
@endsection