@extends('layouts.layout')

@section('content')
<div class="max-w-7xl mx-auto">

    <div class="mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Household Records</h1>
            <p class="text-gray-500 mt-1">View and manage all household data collected by staff.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white border border-gray-200 rounded-2xl p-4 shadow-sm">
            <div class="text-sm text-gray-500">Total Households</div>
            <div class="text-2xl font-bold text-gray-900 mt-1">{{ $totalHouseholds }}</div>
        </div>
        <div class="bg-green-50 border border-green-200 rounded-2xl p-4 shadow-sm">
            <div class="text-sm text-green-700">Prepared</div>
            <div class="text-2xl font-bold text-green-600 mt-1">{{ $prepared }}</div>
        </div>
        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4 shadow-sm">
            <div class="text-sm text-yellow-700">Partially Prepared</div>
            <div class="text-2xl font-bold text-yellow-600 mt-1">{{ $partiallyPrepared }}</div>
        </div>
        <div class="bg-red-50 border border-red-200 rounded-2xl p-4 shadow-sm">
            <div class="text-sm text-red-700">Not Prepared</div>
            <div class="text-2xl font-bold text-red-600 mt-1">{{ $notPrepared }}</div>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <h2 class="text-base font-semibold text-gray-800">Household List</h2>
                <form method="GET" action="{{ route('admin.households') }}" class="flex flex-col gap-3 md:flex-row md:items-center">
                    <label for="search" class="sr-only">Search households</label>
                    <input
                        id="search"
                        name="search"
                        type="search"
                        value="{{ old('search', $search ?? '') }}"
                        placeholder="Search household #, head, sitio, street"
                        class="border border-gray-300 rounded-lg px-3 py-2 w-full md:w-72 focus:border-blue-500 focus:ring-blue-500"
                    />
                    <label for="sitio" class="sr-only">Filter by sitio</label>
                    <select id="sitio" name="sitio" class="border border-gray-300 rounded-lg px-3 py-2 w-full md:w-56 focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Sitios</option>
                        @foreach($sitios as $sitio)
                            <option value="{{ $sitio }}" {{ isset($selectedSitio) && $selectedSitio === $sitio ? 'selected' : '' }}>{{ $sitio }}</option>
                        @endforeach
                    </select>
                    <label for="preparedness" class="sr-only">Filter by preparedness</label>
                    <select id="preparedness" name="preparedness" class="border border-gray-300 rounded-lg px-3 py-2 w-full md:w-56 focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Preparedness Levels</option>
                        <option value="Prepared" {{ isset($selectedPreparedness) && $selectedPreparedness === 'Prepared' ? 'selected' : '' }}>Prepared</option>
                        <option value="Partially Prepared" {{ isset($selectedPreparedness) && $selectedPreparedness === 'Partially Prepared' ? 'selected' : '' }}>Partially Prepared</option>
                        <option value="Not Prepared" {{ isset($selectedPreparedness) && $selectedPreparedness === 'Not Prepared' ? 'selected' : '' }}>Not Prepared</option>
                    </select>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Filter</button>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto text-sm">
            <table class="w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-3 py-2 text-left text-[11px] font-semibold text-gray-600 uppercase tracking-wide">Household #</th>
                        <th class="px-3 py-2 text-left text-[11px] font-semibold text-gray-600 uppercase tracking-wide">Head of Family</th>
                        <th class="px-3 py-2 text-left text-[11px] font-semibold text-gray-600 uppercase tracking-wide">Address</th>
                        <th class="px-3 py-2 text-left text-[11px] font-semibold text-gray-600 uppercase tracking-wide">Evacuation Area</th>
                        <th class="px-3 py-2 text-left text-[11px] font-semibold text-gray-600 uppercase tracking-wide">Members</th>
                        <th class="px-3 py-2 text-left text-[11px] font-semibold text-gray-600 uppercase tracking-wide">Preparedness</th>
                        <th class="px-3 py-2 text-left text-[11px] font-semibold text-gray-600 uppercase tracking-wide">Score</th>
                        <th class="px-3 py-2 text-left text-[11px] font-semibold text-gray-600 uppercase tracking-wide">Last Assessed</th>
                        <th class="px-3 py-2 text-center text-[11px] font-semibold text-gray-600 uppercase tracking-wide">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($households as $household)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-2 text-sm text-gray-700">{{ $household->household_number }}</td>
                        <td class="px-3 py-2 text-sm text-gray-700">{{ $household->household_head }}</td>
                        <td class="px-3 py-2 text-sm text-gray-700">{{ $household->sitio }} {{ $household->street_name }}</td>
                        <td class="px-3 py-2 text-sm text-gray-700">{{ $household->evacuation_area ?? 'Not set' }}</td>
                        <td class="px-3 py-2 text-sm text-gray-700">{{ $household->total_family_members }}</td>
                        <td class="px-3 py-2 text-sm font-semibold @if($household->preparedness_status === 'Prepared') text-green-600 @elseif($household->preparedness_status === 'Partially Prepared') text-yellow-600 @elseif($household->preparedness_status === 'Not Prepared') text-red-600 @else text-gray-500 @endif">{{ $household->preparedness_status ?? '-' }}</td>
                        <td class="px-3 py-2 text-sm text-gray-700">{{ $household->score !== null ? $household->score.'%' : '-' }}</td>
                        <td class="px-3 py-2 text-sm text-gray-700">{{ $household->last_assessed ?? '-' }}</td>
                        <td class="px-3 py-2 text-center text-sm">
                            <div class="flex justify-center items-center gap-2 whitespace-nowrap">
                                <a href="{{ route('admin.households.show', $household->household_id) }}" class="inline-flex items-center justify-center rounded-full bg-blue-600 px-3 py-1.5 text-xs font-semibold text-white shadow-sm transition hover:bg-blue-700">View</a>
                                <a href="{{ url('/households/'.$household->household_id.'/edit') }}" class="inline-flex items-center justify-center rounded-full bg-amber-500 px-3 py-1.5 text-xs font-semibold text-white shadow-sm transition hover:bg-amber-600">Edit</a>
                                <form action="{{ route('admin.households.destroy', $household->household_id) }}" method="POST" class="inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center rounded-full bg-red-500 px-3 py-1.5 text-xs font-semibold text-white shadow-sm transition hover:bg-red-600" onclick="return confirm('Delete this household?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-6 text-center text-sm text-gray-500">No households found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-white border-t border-gray-200">
            {{ $households->withQueryString()->links() }}
        </div>
    </div>

</div>
@endsection