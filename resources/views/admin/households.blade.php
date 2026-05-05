@extends('layouts.layout')
@section('content')
    <div class="max-w-7xl mx-auto">

    <!-- Title -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Barangay Preparedness Map
        </h1>
        <p class="text-gray-500 mt-1">
            Household Disaster Preparedness Monitoring System
        </p>
    </div>

    <!-- Map Container -->
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm h-[500px]">
        <div id="map" class="w-full h-full rounded-lg"></div>
    </div>
    @endsection