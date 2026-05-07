@extends('layouts.layout')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<style>
    #map {
        height: 350px;
        width: 100%;
        border-radius: 1rem;
    }
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Barangay Preparedness Map</h1>
        <p class="text-sm text-gray-500">Admin View (Same as User Map)</p>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">

        <!-- Map -->
        <div class="relative">

            <div id="map"></div>

        </div>

    </div>
</div>
@endsection

@push('scripts')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // =========================
    // SAME CENTER AS USER MAP
    // =========================
    const barangayHallLat = 10.3210;
    const barangayHallLng = 123.9007;

    // =========================
    // MAP INIT (MATCH USER MAP)
    // =========================
    var map = L.map('map').setView([barangayHallLat, barangayHallLng], 17);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // =========================
    // BARANGAY HALL (BLUE DEFAULT MARKER)
    // =========================
    L.marker([barangayHallLat, barangayHallLng])
        .addTo(map)
        .bindPopup("Barangay Kamputhaw Hall");

    // =========================
    // GREY HOUSEHOLD ICON
    // =========================
    const greyIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-grey.png',
        shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    // =========================
    // HOUSEHOLDS FROM DB
    // =========================
    @foreach($households as $household)
        L.marker(
            [{{ $household->latitude }}, {{ $household->longitude }}],
            { icon: greyIcon }
        )
        .addTo(map)
        .bindPopup(`
            <b>{{ $household->household_head }}</b><br>
            {{ $household->street_name }}<br>
            Sitio: {{ $household->sitio }}
        `);
    @endforeach

});
</script>

@endpush