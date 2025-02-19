<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map with Elevation</title>
    <style>
        html, body, #map, #elevation-div { height: 100%; width: 100%; padding: 0; margin: 0; }
        #map { height: 75%; }
        #elevation-div { height: 20%; font: 12px/1.5 "Helvetica Neue", Arial, Helvetica, sans-serif; }
    </style>
    
    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>

    <!-- leaflet-ui -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-ui@0.6.0/dist/leaflet-ui.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-ui@0.6.0/dist/leaflet-ui.js"></script>
    
    <!-- leaflet-elevation -->
    <link rel="stylesheet" href="https://unpkg.com/@raruto/leaflet-elevation/dist/leaflet-elevation.css" />
    <script src="https://unpkg.com/@raruto/leaflet-elevation/dist/leaflet-elevation.js"></script>
</head>
<body>
<div id="map"></div>
<div id="elevation-div"></div>

<script>

var elevation_options = {
        theme: "lime-theme",
        detached: true,
        elevationDiv: "#elevation-div",
        autohide: false,
        collapsed: false,
        position: "topright",
        closeBtn: true,
        followMarker: true,
        autofitBounds: true,
        imperial: false,
        reverseCoords: false,
        acceleration: false,
        slope: false,
        speed: false,
        altitude: true,
        time: true,
        distance: true,
        summary: 'inline',
        downloadLink: false,
        ruler: true,
        legend: true,
        almostOver: true,
        distanceMarkers: false,
        edgeScale: false,
        hotline: true,
        timestamps: false,
        waypoints: true,
        wptIcons: {
            '': L.divIcon({
                className: 'elevation-waypoint-marker',
                html: '<i class="elevation-waypoint-icon"></i>',
                iconSize: [30, 30],
                iconAnchor: [8, 30],
            }),
        },
        wptLabels: true,
        preferCanvas: true,
    };

    var map = L.map('map', { center: [28.3949, 84.1240], zoom: 7 });


    var controlElevation = L.control.elevation(elevation_options).addTo(map);

    function arrayToGPX(data) {
        let gpx = `<?xml version="1.0" encoding="UTF-8"?>
<gpx version="1.1" xmlns="http://www.topografix.com/GPX/1/1">
  <trk>
    <name>Track</name>
    <trkseg>\n`;

        let totalLength = 0;
        let totalTimeInSeconds = 0;
        let minElevation = Number.POSITIVE_INFINITY;
        let maxElevation = Number.NEGATIVE_INFINITY;
        let totalElevation = 0;

        for (let i = 1; i < data.length; i++) {
            const point1 = data[i - 1];
            const point2 = data[i];

            const lat1 = point1[0];
            const lon1 = point1[1];
            const ele1 = point1[2];

            const lat2 = point2[0];
            const lon2 = point2[1];
            const ele2 = point2[2];

            const R = 6371;
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = R * c;

            totalTimeInSeconds += 1;
            totalLength += distance;

            totalElevation += ele1;
            minElevation = Math.min(minElevation, ele1);
            maxElevation = Math.max(maxElevation, ele1);

            gpx += `      <trkpt lat="${lat1}" lon="${lon1}">
        <ele>${ele1}</ele>
      </trkpt>\n`;
        }

        const avgElevation = totalElevation / data.length;

        gpx += `    </trkseg>
  </trk>
</gpx>`;

        const totalTime = formatTime(totalTimeInSeconds);
        return gpx;
    }

    function formatTime(totalSeconds) {
        const hours = Math.floor(totalSeconds / 3600);
        const minutes = Math.floor((totalSeconds % 3600) / 60);
        const seconds = totalSeconds % 60;
        return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }

    fetch('http://localhost/fyp/Api/route/fetch_route.php?DestinationID='+ <?php echo isset($_GET['DestinationID']) ? $_GET['DestinationID'] : 'null'; ?>)
        .then(response => response.json())
        .then(data => {
            const gpxString = arrayToGPX(data);
            console.log(gpxString);
            controlElevation.load(gpxString);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
</script>
</body>
</html>
