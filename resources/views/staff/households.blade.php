@extends('layouts.user')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-4">

    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-md overflow-hidden">

        <!-- Header -->
        <div class="p-8 border-b border-gray-200 text-center">
            <div class="flex justify-center mb-4">
                <div class="w-14 h-14 bg-gray-600 text-white flex items-center justify-center rounded-xl text-xl font-semibold">
                    H
                </div>
            </div>

            <h2 class="text-3xl font-semibold text-gray-800">
                Add New Household
            </h2>

            <p class="text-gray-500 mt-2 text-sm">
                Fill in the household details and pin the exact location on the map
            </p>
        </div>

        <!-- Form -->
        <form action="{{ route('households.store') }}" method="POST" class="p-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- LEFT SIDE -->
                <div>

                    <!-- Basic Info -->
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        Basic Information
                    </h3>

                    <!-- Recorded By (Hidden) -->
                    <input type="hidden"
                        name="recorded_by"
                        value="{{ Auth::user()->id }}"
                        required>

                    <!-- Household Head -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Household Head
                        </label>

                        <input type="text"
                            name="household_head"
                            placeholder="Enter full name"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    </div>

                    <!-- House No + Sitio -->
                    <div class="grid grid-cols-2 gap-4 mb-5">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                House No.
                            </label>

                            <input type="text"
                                name="house_no"
                                placeholder="123"
                                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Sitio
                            </label>

                            <input type="text"
                                name="sitio"
                                placeholder="e.g. Centro"
                                required
                                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>

                    </div>

                    <!-- Street -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Street Name
                        </label>

                        <input type="text"
                            name="street_name"
                            placeholder="Street Name"
                            required
                            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    </div>

                    <!-- Contact Number -->
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Contact Number
                        </label>

                        <input type="tel"
                            name="contact_number"
                            placeholder="+63..."
                            class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    </div>

                    <!-- Vulnerability -->
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        Vulnerability Counts
                    </h3>

                    <div class="grid grid-cols-2 gap-4 mb-4">

                        <!-- Total Family Members -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Total Family Members
                            </label>

                            <input type="number"
                                name="total_family_members"
                                value="0"
                                min="0"
                                required
                                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>

                        <!-- Placeholder for grid alignment -->
                        <div></div>

                    </div>

                    <div class="grid grid-cols-2 gap-4">

                        <!-- PWD -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                PWDs
                            </label>

                            <input type="number"
                                name="total_pwd"
                                value="0"
                                min="0"
                                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>

                        <!-- Seniors -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Seniors
                            </label>

                            <input type="number"
                                name="total_seniors"
                                value="0"
                                min="0"
                                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>

                        <!-- Infants -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Infants (0-5)
                            </label>

                            <input type="number"
                                name="total_infants"
                                value="0"
                                min="0"
                                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        </div>

                        <!-- Pregnant -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Pregnant Member
                            </label>

                            <select name="has_pregnant_member"
                                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">

                                <option value="0">No</option>
                                <option value="1">Yes</option>

                            </select>
                        </div>

                    </div>

                </div>

                <!-- RIGHT SIDE -->
                <div>

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        Pin Location
                    </h3>

            <div class="relative">

                <!-- Locate Button -->
                <button type="button"
                    id="locateBtn"
                    class="absolute top-3 right-3 z-[1000] bg-white shadow-md border border-gray-200 rounded-lg px-3 py-2 text-sm font-medium hover:bg-gray-100 transition">

                    📍 My Location
                </button>

                <!-- Map -->
                <div id="map"
                    class="w-full h-[350px] rounded-2xl shadow-sm border border-gray-200">
                </div>

            </div>

                    <!-- Coordinates -->
                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Latitude
                            </label>

                            <input type="text"
                                name="latitude"
                                id="lat"
                                readonly
                                required
                                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Longitude
                            </label>

                            <input type="text"
                                name="longitude"
                                id="lng"
                                readonly
                                required
                                class="w-full px-4 py-2 rounded-lg bg-gray-100 border border-gray-200">
                        </div>

                    </div>

                    <p class="text-sm text-blue-500 mt-3">
                        Click anywhere on the map to pin the household location.
                    </p>

                </div>

            </div>

            <!-- Buttons -->
            <div class="mt-10">

                <button type="submit"
                    class="w-full bg-gray-600 hover:bg-gray-700 text-white py-3 rounded-xl flex items-center justify-center gap-2 transition font-medium">

                    <!-- Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 16l4 4 14-14" />
                    </svg>

                    Save Household Data
                </button>

                <a href="{{ route('households.index') }}"
                    class="block text-center mt-4 text-gray-500 hover:text-gray-700 text-sm">
                    Cancel and Go Back
                </a>

            </div>

        </form>

    </div>

</div>

<!-- Leaflet -->
<link rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

    // Kamputhaw Barangay Hall Coordinates
    const barangayHallLat = 10.3210;
    const barangayHallLng = 123.9007;

    // Create map centered at Kamputhaw
    var map = L.map('map').setView([barangayHallLat, barangayHallLng], 17);

    // OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Barangay Hall blue marker
    // Barangay Hall default blue marker
const barangayHallMarker = L.marker([barangayHallLat, barangayHallLng])
    .addTo(map);

barangayHallMarker.bindPopup("Barangay Kamputhaw Hall");

    barangayHallMarker.bindPopup("Barangay Kamputhaw Hall");
// Grey household marker icon
const greyIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-grey.png',
    shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',

    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
    let marker;
    let userMarker;

    // Locate button
    document.getElementById('locateBtn').addEventListener('click', function () {

        if (!navigator.geolocation) {
            alert("Geolocation is not supported.");
            return;
        }

        navigator.geolocation.getCurrentPosition(

            function(position) {

                let userLat = position.coords.latitude;
                let userLng = position.coords.longitude;

                // Smooth move to user location
                map.flyTo([userLat, userLng], 19, {
                    animate: true,
                    duration: 1.5
                });

                // Remove old marker
                if (userMarker) {
                    map.removeLayer(userMarker);
                }

                // User location marker
                userMarker = L.circleMarker([userLat, userLng], {
                    radius: 6,
                    color: '#2563eb',
                    fillColor: '#3b82f6',
                    fillOpacity: 1
                }).addTo(map);

                userMarker.bindPopup("Current Location");

            },

            function(error) {
                alert("Unable to retrieve location.");
            }

        );

    });

    // Household marker
    map.on('click', function(e) {

        let lat = e.latlng.lat.toFixed(8);
        let lng = e.latlng.lng.toFixed(8);

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng, {
    icon: greyIcon
}).addTo(map);
        }

        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;

    });

</script>
@endsection