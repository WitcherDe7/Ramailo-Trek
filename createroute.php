<!doctype html>
<html class="no-js h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Shards Dashboard Lite - Free Bootstrap Admin Template – DesignRevision</title>
  <meta name="description"
    content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
  <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

  <!-- Leaflet Routing Machine CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    #map-container {
      padding-top: 60px;
    }

    #map {
      position: relative;
      border: 1px solid black;
      border-radius: 8px;
      height: 400px;
      width: 100%;
    }
    #elevation-chart {
      border: 1px solid black;
      border-radius: 8px;
      height: 400px;
      width: 100%;
    }
    .elevation-chart-container {
      display: block;
      box-sizing: border-box;
    }
  </style>
</head>

<body>

  <div id="map-container">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div id="elevation-div" class="elevation-chart-container">
            <canvas id="elevation-chart" width="100%" height="114"></canvas>
          </div>
        </div>

        <div class="col-md-8">
          <div id="map"></div>

          <div class="card card-small mb-4 mt-4">
              <div class="p-3">
                  <form id="mapform">
                      <div class="form-group">
                          <select class="form-control" name="destination" id="destinationSelect">
                              <option selected="">Select Destination...</option>
                          </select>
                      </div>

                      <div class="form-group right">
                      <button class="btn btn-sm btn-dark mt-3" style="width: 100%;">Save Route</button>
                      </div>
                  </form>
                  
              </div>
          </div>

          
        </div>

      </div>

    </div>
  </div>

  </div>

  <div class="main-content-container container-fluid px-4">
      <?php
        $api_url = 'http://localhost/fyp/Api/route/all.php'; // Replace with your API endpoint for routes
        $response = file_get_contents($api_url);

        // Step 2: Parse the JSON response
        $routes = json_decode($response, true);

        // Step 3: Populate the table with the fetched data
        echo '<div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">S.N</th>
                                <th scope="col" class="border-0">Destination Name</th>
                                <th scope="col" class="border-0">Trekking Difficulty</th>
                                <th scope="col" class="border-0">Location</th>
                                <th scope="col" class="border-0">Elevation</th>
                                <th scope="col" class="border-0">Action</th>

                            </tr>
                        </thead>
                        <tbody>';

        foreach ($routes as $route) {
            echo '<tr>
                    <td>' . $route['id'] . '</td>
                    <td>' . $route['Name'] . '</td>
                    <td>' . $route['TrekkingDifficulty'] . '</td>
                    <td>' . $route['Location'] . '</td>
                    <td>' . $route['Elevation'] . '</td>
                    <td>
                      <a href="http://localhost/fyp/route.php?DestinationID=' . $route['DestinationID'] . '" class="mb-2 btn btn-dark mr-2" ><i class="material-icons">visibility</i></a>
                      <button class="mb-2 btn btn-danger mr-2" data-toggle="modal" data-target="#deleteModal"  data-id="' . $route['id'] . '"><i class="material-icons">delete_forever</i></button>
                    </td>
                </tr>';
        }

        echo '</tbody>
            </table>
        </div>
        </div>
        </div>
        </div>';

    ?>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Destination</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this destination?</p>
                                    <form action="/fyp/api/destination.php" method="post">
                                        <input type="hidden" id="deleteDestinationId" name="destinationId">
                                        <button type="submit" class="btn btn-danger" id="deleteBtn">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

  <script>
    fetch('http://localhost/fyp/Api/destination_select.php')
            .then(response => response.json())
            .then(destinations => {
                var select = document.getElementById('destinationSelect');

                        destinations.forEach(function (destination) {
                            var option = document.createElement('option');
                            option.value = destination.DestinationID;
                            option.text = destination.Name;
                            select.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching destinations:', error));
  </script>


  

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <!-- Leaflet Routing Machine JS -->
  <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

  <script>
  var routeCoordinates = [];
  var map = L.map('map', { mapTypeId: 'terrain', center: [28.3949, 84.1240], zoom: 7 });

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

  var routingControl = L.Routing.control({
    waypoints: routeCoordinates.map(coord => L.latLng(coord[0], coord[1])),
    routeWhileDragging: true
  }).addTo(map);

  map.on('click', function (e) {
    getElevationData(e.latlng.lat, e.latlng.lng)
      .then(altitude => {
        routeCoordinates.push([e.latlng.lat, e.latlng.lng, altitude]);
        routingControl.setWaypoints(routeCoordinates.map(coord => L.latLng(coord[0], coord[1])));
        updateElevationChart();
        
        
      })
      .catch(error => console.error('Error fetching elevation:', error));
  });

  document.getElementById('mapform').addEventListener('submit', function(event) {
    event.preventDefault();

    // Create GPX data
    var gpxData = '<?xml version="1.0" encoding="UTF-8" standalone="no" ?>' +
        '<gpx xmlns="http://www.topografix.com/GPX/1/1" creator="Leaflet GPX" version="1.1" ' +
        'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' +
        'xsi:schemaLocation="http://www.topografix.com/GPX/1/1 ' +
        'http://www.topografix.com/GPX/1/1/gpx.xsd">' +
        '<trk>' +
        '<name>Route</name>' +
        '<trkseg>';

    routeCoordinates.forEach(function(coord) {
        gpxData += '<trkpt lat="' + coord.lat + '" lon="' + coord.lng + '"></trkpt>';
    });

    gpxData += '</trkseg></trk></gpx>';

    // Create GPX file blob
    var blob = new Blob([gpxData], { type: 'application/gpx+xml' });

    // Create download link
    var downloadLink = document.createElement('a');
    downloadLink.download = 'route.gpx';
    downloadLink.href = window.URL.createObjectURL(blob);
    downloadLink.click();

    var selectedValue = document.getElementById("destinationSelect").value;
    
    var routeData = {
      coordinates: routeCoordinates,
      destinationid: selectedValue
    };

    // Send the data to the server
    fetch('http://localhost/fyp/Api/route/save_route.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(routeData)
    })
      .then(response => {
        if (!response.ok) {
          throw new Error('Failed to save route');
        }
        return response.json();
      })
      .then(data => {
        console.log('Route saved successfully:', data);
      })
      .catch(error => {
        console.error('Error saving route:', error);
      });
  });

  function getElevationData(lat, lng) {
    // Using Open Elevation API (Replace with your own API key if required)
    const apiKey = 'abcd';
    const apiUrl = `https://api.open-elevation.com/api/v1/lookup?locations=${lat},${lng}&key=${apiKey}`;

    return fetch(apiUrl)
      .then(response => response.json())
      .then(data => data.results[0].elevation)
      .catch(error => {
        console.error('Error fetching elevation data:', error);
        throw error;
      });
  }

  var elevationChart;

  function updateElevationChart() {
    var elevationData = routeCoordinates.map(coord => ({
      x: routeCoordinates.indexOf(coord) + 1,
      y: coord[2] || 0
    }));

    elevationData.sort((a, b) => b.x - a.x);

    if (!elevationChart) {
      var ctx = document.getElementById('elevation-chart').getContext('2d');
      elevationChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: elevationData.map(point => point.x),
          datasets: [{
            label: 'Elevation',
            data: elevationData.map(point => point.y),
            borderColor: 'rgba(54, 162, 235, 1)', // Blue color
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Light blue fill color
            fill: true,
            borderWidth: 2,
            tension: 0.4 // Set the tension for a curvy line
          }]
        },
        options: {
          scales: {
            x: {
              title: {
                display: true,
                text: 'Waypoint',
                font: {
                  size: 14
                }
              },
              reverse: true, // Reverse the x-axis
              ticks: {
                font: {
                  size: 12
                }
              }
            },
            y: {
              title: {
                display: true,
                text: 'Elevation',
                font: {
                  size: 14
                }
              },
              ticks: {
                font: {
                  size: 12
                }
              }
            }
          },
          plugins: {
            legend: {
              display: false
            }
          }
        }
      });
    } else {
      elevationChart.data.labels = elevationData.map(point => point.x);
      elevationChart.data.datasets[0].data = elevationData.map(point => point.y);
      elevationChart.update();
    }
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-components-overview.1.1.0.js"></script>

</body>

</html>