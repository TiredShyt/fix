@extends('layouts.user')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">BHW Dashboard</h1>
        <p class="text-gray-500 mt-2">Manage your households, add new records, and monitor preparedness.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-200">
            <div class="text-sm text-gray-500">Total Households</div>
            <div class="mt-4 text-4xl font-bold text-gray-900">{{ $totalHouseholds ?? 0 }}</div>
        </div>
        <div class="bg-green-50 p-6 rounded-3xl shadow-sm border border-green-200">
            <div class="text-sm text-green-700">Prepared</div>
            <div class="mt-4 text-4xl font-bold text-green-700">{{ $prepared ?? 0 }}</div>
        </div>
        <div class="bg-yellow-50 p-6 rounded-3xl shadow-sm border border-yellow-200">
            <div class="text-sm text-yellow-700">Partially Prepared</div>
            <div class="mt-4 text-4xl font-bold text-yellow-700">{{ $partiallyPrepared ?? 0 }}</div>
        </div>
        <div class="bg-red-50 p-6 rounded-3xl shadow-sm border border-red-200">
            <div class="text-sm text-red-700">Not Prepared</div>
            <div class="mt-4 text-4xl font-bold text-red-700">{{ $notPrepared ?? 0 }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 bg-white rounded-3xl border border-gray-200 shadow-sm p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ route('households.index') }}" class="block p-5 rounded-3xl bg-blue-600 text-white hover:bg-blue-700 transition">
                    <div class="text-sm uppercase tracking-wide">Add Household</div>
                    <div class="mt-3 text-2xl font-semibold">Go to Form</div>
                </a>
                <a href="{{ route('staff.map') }}" class="block p-5 rounded-3xl bg-green-600 text-white hover:bg-green-700 transition">
                    <div class="text-sm uppercase tracking-wide">Map View</div>
                    <div class="mt-3 text-2xl font-semibold">Open Map</div>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Households</h2>
            @if(isset($recentHouseholds) && $recentHouseholds->count())
                <ul class="divide-y divide-gray-200">
                    @foreach($recentHouseholds as $household)
                    <li class="py-4">
                        <div class="font-semibold text-gray-800">{{ $household->household_head }}</div>
                        <div class="text-sm text-gray-500">{{ $household->sitio }} — {{ $household->household_number }}</div>
                    </li>
                    @endforeach
                </ul>
            @else
                <p class="text-sm text-gray-500">No recent household records yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection