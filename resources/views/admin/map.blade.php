@extends('layouts.layout')

@push('styles')
    {{-- Pointing to public/css/leaflet.css --}}
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}" />
    <style>
        #map { 
            height: 600px; 
            width: 100%; 
            border-radius: 1rem; 
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
        }
    </style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Barangay Preparedness Map</h1>
        <p class="text-sm text-gray-500">Local Resource Mode: Offline Ready</p>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <div id="map"></div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/leaflet.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Precise coordinates for Brgy. Camputhaw Hall (Molave St.)
            var brgyHallCoords = [10.3182, 123.8935];
            
            // Tightened boundaries based on image_77d9b1.jpg
            var southWest = L.latLng(10.3090, 123.8860);
            var northEast = L.latLng(10.3280, 123.9060);
            var bounds = L.latLngBounds(southWest, northEast);

                var map = L.map('map', {
            center: [10.3182, 123.8935], // Corrected Hall location
            zoom: 17,
            minZoom: 15,    // Keeps it at the barangay level
            maxZoom: 18,    // Prevents the "Gray Screen" by stopping at the last available tile
            maxBounds: bounds,
            maxBoundsViscosity: 1.0
        });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Updated Marker for the actual Hall location
            L.marker(brgyHallCoords).addTo(map)
                .bindPopup('<b>Brgy. Camputhaw Hall</b><br>Official Command Center')
                .openPopup();

            setTimeout(function() {
                map.invalidateSize();
            }, 500);
        });
    </script>
@endpush