<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Leaflet Map</title>
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
</head>
<body>
    <!-- Create a div element for the map -->
    <div id="map" style="height: 100vh"></div>

    <!-- Include Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script type="text/javascript">
        // Initialize the map
        var map = L.map('map', {
            attributionControl: false, // Disable attribution control
        }).setView([70, -100], 4);

        url = 'https://www.thirdrockadventures.com/visual-map/trek-to-ebc/';
        // Define the custom tile URL (replace with your desired tile source)
        var customTileURL = url + '/{z}/{x}/{y}.png';

        // Add the custom tile layer to the map
        L.tileLayer(customTileURL, {
            maxZoom: 5,
            minZoom: 2,
            noWrap: true,
            zoom: 2
        }).addTo(map);

        // Handle map click event
        map.on('click', function (e) {
            var clickedURL = getTileURL(e.latlng.lat, e.latlng.lng, map.getZoom());
            console.log('Clicked tile URL:', clickedURL);
            // You can use the clickedURL as needed (e.g., update UI, fetch additional data, etc.)
        });

        // Helper function to get tile URL based on lat, lon, and zoom
        function getTileURL(lat, lon, zoom) {
            var xtile = parseInt(Math.floor((lon + 180) / 360 * (1 << zoom)));
            var ytile = parseInt(Math.floor((1 - Math.log(Math.tan(lat.toRad()) + 1 / Math.cos(lat.toRad())) / Math.PI) / 2 * (1 << zoom)));
            return customTileURL.replace('{z}', zoom).replace('{x}', xtile).replace('{y}', ytile);
        }

        // Helper function to convert degrees to radians
        if (typeof (Number.prototype.toRad) === "undefined") {
            Number.prototype.toRad = function () {
                return this * Math.PI / 180;
            };
        }
    </script>
</body>
</html>
