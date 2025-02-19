<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Map with Saved Routes</title>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <!-- Leaflet Routing Machine CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
  <style>
    #map { height: 80vh; }
  </style>
</head>
<body>

<div id="map"></div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<!-- Leaflet Routing Machine JS -->
<script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
<script>
  // Fetch saved coordinates from the server
  fetch('http://localhost/fyp/Api/route/fetch_route.php?DestinationID=' + <?php echo isset($_GET['DestinationID']) ? $_GET['DestinationID'] : 'null'; ?> )
  .then(response => {
      if (!response.ok) {
          throw new Error('Failed to fetch coordinates');
      }
      return response.json();
  })
  .then(coordinates => {
      // Check if coordinates is null or empty array
      if (!coordinates || coordinates.length === 0) {
          console.log('No coordinates found');
          return;
      }

      // Initialize map
      var map = L.map('map').setView([41.4583, 12.7059], 5);

      // Add tile layer
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
      }).addTo(map);

      // Initialize routing control
      var routingControl = L.Routing.control({
          waypoints: coordinates.map(coord => L.latLng(coord[0], coord[1])),
          routeWhileDragging: true
      }).addTo(map);
  })
  .catch(error => {
      console.error('Error fetching coordinates:', error);
  });
</script>

</body>
</html>
