console.log("Starting Online Map Test...");

// We use a small timeout to ensure the 'map' div is fully rendered in the DOM
setTimeout(function () {
    if (typeof L === "undefined") {
        console.error(
            "ERROR: Leaflet library failed to load from the internet!",
        );
        alert(
            "Leaflet library failed to load. Check your internet connection.",
        );
    } else {
        console.log("Leaflet is loaded! Initializing map for Camputhaw...");

        try {
            // Coordinates for Barangay Camputhaw
            var map = L.map("map").setView([10.3175, 123.8981], 16);

            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: "© OpenStreetMap",
            }).addTo(map);

            L.marker([10.3175, 123.8981])
                .addTo(map)
                .bindPopup("<b>Brgy. Camputhaw</b><br>Online Mode")
                .openPopup();

            console.log("Map is now visible!");
        } catch (e) {
            console.error("Initialization Error:", e);
        }
    }
}, 500);
