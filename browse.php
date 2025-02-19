<?php
  include 'controllers/authController.php';
  require 'fetchdata.php';
?>
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
</head>

<body class="h-100">
    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                <div class="main-navbar">
                    <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                        <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                            <div class="d-table m-auto">
                                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                                    src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                                <span class="d-none d-md-inline ml-1">Dashboard</span>
                            </div>
                        </a>
                        <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                            <i class="material-icons">&#xE5C4;</i>
                        </a>
                    </nav>
                </div>
                <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                    <div class="input-group input-group-seamless ml-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                            aria-label="Search">
                    </div>
                </form>
                <div class="nav-wrapper">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="userdash.php">
                                <i class="material-icons">reviews</i>
                                <span>Reviews</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="myprofile.php">
                                <i class="material-icons">person</i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="browse.php">
                                <i class="material-icons">travel_explore</i>
                                <span>Browse More</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="chats.php">
                                <i class="material-icons">chat</i>
                                <span>Community Chat</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="reset-password.php">
                                <i class="material-icons">lock</i>
                                <span>Change Password</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="logout.php?logout=1">
                                <i class="material-icons">logout</i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </aside>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <div id="posted"></div>
                    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                            <div class="input-group input-group-seamless ml-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">

                                    </div>
                                </div>

                            </div>
                        </form>
                        <ul class="navbar-nav border-left flex-row ">

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-nowrap px-3" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle mr-2" src="<?php echo $img; ?>"
                                        alt="User Avatar">
                                    <span class="d-none d-md-inline-block">
                                        <?php echo $username; ?>
                                    </span>
                                </a>

                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#" class="nav-link toggle-sidebar d-md-inline d-lg-none text-center border-left"
                                data-toggle="collapse" data-target=".header-navbar" aria-expanded="false"
                                aria-controls="header-navbar">

                            </a>
                        </nav>
                    </nav>
                </div>
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">

                    </div>
                    <!-- End Page Header -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group ">
                                    <input id="searchInput" type="text" class="form-control" placeholder="1234 Main St" >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <select id="difficultyLevel" class="form-control" >
                                            <option selected>Difficulty Level</option>
                                            <option>Low</option>
                                            <option>Moderate</option>
                                            <option>High</option>
                                        </select>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <select id="region" class="form-control" >
                                            <option selected>Region</option>
                                            <option>Annapurna</option>
                                            <option>Everest</option>
                                            <option>Other</option>
                                            
                                        </select>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group ">
                                        <select id="maxDays" class="form-control" >
                                            <option selected>Maximum Days</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                            <option>13</option>
                                            <option>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                        </select>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                    <button id="searchButton" type="button" class="btn btn-dark">Search Routes</button>
                                </div>
                            </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <script>
                    $(document).ready(function(){
                        $('#searchButton').click(function(){
                            // Get search parameters
                            var searchInput = $('#searchInput').val();
                            var difficultyLevel = $('#difficultyLevel').val();
                            var region = $('#region').val();
                            var maxDays = $('#maxDays').val();

                            // AJAX request
                            $.ajax({
                                type: 'GET',
                                url: 'search.php', // PHP script to handle the request
                                data: {
                                    searchInput: searchInput,
                                    difficultyLevel: difficultyLevel,
                                    region: region,
                                    maxDays: maxDays
                                },
                                success: function(response){
                                    $('#myDIV').html(response); // Update content of #myDIV with search results
                                }
                            });
                        });
                    });
                </script>

                        <div id="wry" class="page-header row no-gutters py-4">
                            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                                <span class="text-uppercase page-subtitle">We Recommend for You</span>
                            </div>
                        </div>
                
                    <div id="recommendations" class="row mt-3">
                        
                    </div>

                    <script>
                        async function fetchRecommendations(DestinationName) {
                            try {
                                const response = await fetch('http://127.0.0.1:5000/recommendations?name=' + encodeURIComponent(DestinationName));
                                const data = await response.json();
                                return data.recommendations;
                            } catch (error) {
                                console.error('Error fetching recommendations:', error);
                                return [];
                            }
                        }

                        async function renderRecommendations() {
                            try {
                                var id = <?php echo isset($_SESSION['id']) ? $_SESSION['id'] : 'null'; ?>;
                                const response = await fetch('http://localhost/fyp/Api/visits.php?UserID='+ id);
                                const data = await response.json();
                                const DestinationName = data.DestinationName;

                                const recommendations = await fetchRecommendations(DestinationName);
                                const recommendationsContainer = document.getElementById('recommendations');

                                recommendations.forEach(recommendation => {
                                    const card = document.createElement('div');
                                    card.classList.add('col-lg-3', 'col-sm-12', 'mb-4');
                                    card.innerHTML = `
                                        <div class="card card-small card-post card-post--aside card-post--1">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a class="text-fiord-blue">${recommendation.Name}</a>
                                                </h5>
                                                <span class="text-muted">
                                                    <a class="btn btn-sm btn-white" onclick="performXHRRequest('${recommendation.Name}')">
                                                        <i class="material-icons">travel_explore</i> View
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    `;
                                    recommendationsContainer.appendChild(card);
                                });
                            } catch (error) {
                                console.error('Error rendering recommendations:', error);
                            }
                        }

                        function performXHRRequest(name) {
                            var searchInput = name;
                            var difficultyLevel = document.getElementById('difficultyLevel').value;
                            var region = document.getElementById('region').value;
                            var maxDays = document.getElementById('maxDays').value;
                            document.getElementById('recommendations').style.display = 'none';
                            document.getElementById('wry').style.display = 'none';

                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.status === 200) {
                                        document.getElementById('myDIV').innerHTML = xhr.responseText;
                                    } else {
                                        console.error('Request failed: ' + xhr.status);
                                    }
                                }
                            };

                            var url = 'search.php' +
                                '?searchInput=' + encodeURIComponent(searchInput) +
                                '&difficultyLevel=' + encodeURIComponent(difficultyLevel) +
                                '&region=' + encodeURIComponent(region) +
                                '&maxDays=' + encodeURIComponent(maxDays);

                            xhr.open('GET', url, true);
                            xhr.send();
                        }

                        window.onload = function() {
                            renderRecommendations();
                        };
                    </script>
                    <div id="myDIV" class="row mt-3">
                    </div>
                    <script>
                    $(document).ready(function(){
                        $('#searchButton').click(function(){
                            var searchInput = $('#searchInput').val();
                            var difficultyLevel = $('#difficultyLevel').val();
                            var region = $('#region').val();
                            var maxDays = $('#maxDays').val();

                            $('#recommendations').hide();
                            $('#wry').hide();

                            $.ajax({
                                type: 'GET',
                                url: 'search.php',
                                data: {
                                    searchInput: searchInput,
                                    difficultyLevel: difficultyLevel,
                                    region: region,
                                    maxDays: maxDays
                                },
                                success: function(response){
                                    $('#myDIV').html(response);
                                }
                            });
                        });
                    });
                </script>
                <script>
                $(document).ready(function() {
                    $('#bookmark').click(function(e) {
                        e.preventDefault();
                        
                        var destinationID = "1";
                        console.log(destinationID)
                        
                        $.ajax({
                            url: 'save_destination.php', 
                            type: 'POST',
                            data: { destinationID: destinationID }, 
                            success: function(response) {
                                alert('Destination bookmarked successfully!');
                            },
                            error: function(xhr, status, error) {
                                alert('Failed to bookmark destination. Please try again later.');
                                console.error(xhr.responseText);
                            }
                        });
                    });
                });
            </script>


                </div>
        </div>
    </div>
    </div>
    </div>

    </div>
    <!-- Edit Modal -->


    <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
        </ul>
    </footer>
    </main>
    </div>
    </div>
    <script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
                $("#myDIV *").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
    <script>
    // Function to calculate distance
    function calculateDistance(lat1, lon1, lat2, lon2) {
        // The radius of the Earth in kilometers
        const R = 6371;

        // Convert latitude and longitude from degrees to radians
        const radLat1 = (lat1 * Math.PI) / 180;
        const radLon1 = (lon1 * Math.PI) / 180;
        const radLat2 = (lat2 * Math.PI) / 180;
        const radLon2 = (lon2 * Math.PI) / 180;

        // Calculate the differences between the coordinates
        const deltaLat = radLat2 - radLat1;
        const deltaLon = radLon2 - radLon1;

        // Haversine formula to calculate distance
        const a =
            Math.sin(deltaLat / 2) * Math.sin(deltaLat / 2) +
            Math.cos(radLat1) * Math.cos(radLat2) * Math.sin(deltaLon / 2) * Math.sin(deltaLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        const distance = R * c;

        return distance;
    }

    // Check if the browser supports Geolocation
    if (navigator.geolocation) {
    // Get the current position
    navigator.geolocation.getCurrentPosition(
        function(position) {
        // Access the user's latitude and longitude
        const userLatitude = position.coords.latitude;
        const userLongitude = position.coords.longitude;

        // Array of target coordinates
        const targetCoordinates = [
            { latitude: 28.5300, longitude: 83.8780 },
            { latitude: 35.6895, longitude: 139.6917 },
            // Add more target coordinates as needed
        ];

        // Calculate distances for each target location
        targetCoordinates.forEach((target) => {
            const targetLatitude = target.latitude;
            const targetLongitude = target.longitude;

            // Calculate distance
            const distance = calculateDistance(userLatitude, userLongitude, targetLatitude, targetLongitude);

            // Check if the distance is within the range of 300 - 400 km
            if (distance >= 300 && distance <= 400) {
            // Display the relevant information
            console.log("User's Location - Latitude:", userLatitude, "Longitude:", userLongitude);
            console.log(`Distance to target location (${targetLatitude}, ${targetLongitude}):`, distance.toFixed(2), "kilometers");
            }
        });
        },
        function(error) {
        // Handle errors, if any
        console.error("Error getting location:", error.message);
        }
    );
    } else {
    // Geolocation is not supported by this browser
    console.error("Geolocation is not supported by your browser");
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