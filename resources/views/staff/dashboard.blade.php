@extends('layouts.layout')

@section('content')
<div class="w-full">
    {{-- Dashboard Title --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">BHW Dashboard</h1>
        <p class="text-gray-500 mt-2">Manage your households and monitor preparedness.</p>
    </div>

    {{-- 4 Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
            <div class="text-sm text-gray-400 font-bold uppercase tracking-tight">Total Households</div>
            <div class="mt-4 text-4xl font-black text-gray-900">{{ $totalHouseholds ?? 0 }}</div>
        </div>
        <div class="bg-green-50 p-6 rounded-3xl shadow-sm border border-green-100">
            <div class="text-sm text-green-600 font-bold uppercase tracking-tight">Prepared</div>
            <div class="mt-4 text-4xl font-black text-green-600">{{ $prepared ?? 0 }}</div>
        </div>
        <div class="bg-yellow-50 p-6 rounded-3xl shadow-sm border border-yellow-100">
            <div class="text-sm text-yellow-600 font-bold uppercase tracking-tight">Partially Prepared</div>
            <div class="mt-4 text-4xl font-black text-yellow-600">{{ $partiallyPrepared ?? 0 }}</div>
        </div>
        <div class="bg-red-50 p-6 rounded-3xl shadow-sm border border-red-100">
            <div class="text-sm text-red-600 font-bold uppercase tracking-tight">Not Prepared</div>
            <div class="mt-4 text-4xl font-black text-red-600">{{ $notPrepared ?? 0 }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Quick Actions --}}
        <div class="lg:col-span-2 bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Quick Actions</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="#" class="p-6 rounded-3xl bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg shadow-blue-100">
                    <div class="text-xs font-bold uppercase opacity-80">Add Household</div>
                    <div class="mt-2 text-2xl font-bold">Go to Form</div>
                </a>
                <a href="{{ route('admin.map') }}" class="p-6 rounded-3xl bg-green-600 text-white hover:bg-green-700 transition shadow-lg shadow-green-100">
                    <div class="text-xs font-bold uppercase opacity-80">Map View</div>
                    <div class="mt-2 text-2xl font-bold">Open Map</div>
                </a>
            </div>
        </div>

        {{-- Recent Records --}}
        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Recent Records</h2>
            @if(isset($recentHouseholds) && $recentHouseholds->count() > 0)
                <div class="space-y-4">
                    @foreach($recentHouseholds as $row)
                        <div class="pb-4 border-b border-gray-50 last:border-0">
                            <div class="font-bold text-gray-800">{{ $row->household_head }}</div>
                            <div class="text-xs text-gray-400">Sitio {{ $row->sitio }}</div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-400 text-sm italic text-center py-10">No recent records found.</p>
            @endif
        </div>
    </div>
</div>
@endsection