<?php
    include 'controllers/authController.php';
    require 'fetchdata.php';
    $url = 'http://localhost/fyp/Api/accomodation.php';
    $jsonData = file_get_contents($url);
    $dataArray = json_decode($jsonData, true);
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
                        <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
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
                        
                        </div>
                    </div>
                    </div>
                </form>
                <div class="nav-wrapper">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                        <i class="material-icons">grid_view</i>
                        <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="add-new-post.php">
                        <i class="material-icons">edit</i>
                        <span>Add New Destination</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="view-all-destination.php">
                        <i class="material-icons">view_module</i>
                        <span>View All Destination</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-accomodation.php">
                        <i class="material-icons">edit</i>
                        <span>Add Accomodation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="view-accomodation.php">
                        <i class="material-icons">view_module</i>
                        <span>View Accomodation</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="reported-reviews.php">
                        <i class="material-icons">error</i>
                        <span>Reported Reviews</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="manage-users.php">
                        <i class="material-icons">manage_accounts</i>
                        <span>Manage Users</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="profile.php">
                        <i class="material-icons">person</i>
                        <span>Profile</span>
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
                            <li class="nav-item border-right dropdown notifications">
                
                            
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle mr-2" src="<?php echo $img; ?>" alt="User Avatar">
                                <span class="d-none d-md-inline-block"><?php echo $username; ?></span>
                            </a>
                            
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                            <i class="material-icons">&#xE5D2;</i>
                            </a>
                        </nav>
                    </nav>
                </div>
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Destination</span>
                        </div>
                    </div>
                    <!-- End Page Header -->

                    <script>
                        $(document).ready(function() {
    var deleteId; // Variable to store the accommodation ID

    // Event listener for opening the delete modal
    $('.btn-danger[data-toggle="modal"]').on('click', function() {
        // Get the accommodation ID from the data-id attribute
        deleteId = $(this).data('id');

        // Update the modal content with a confirmation message
        var deleteMessage = 'Are you sure you want to delete accommodation with ID ' + deleteId + '?';
        $('#deleteModal .modal-body p').text(deleteMessage);

        // Show the modal
        $('#deleteModal').modal('show');
    });

    // Event listener for the modal's Delete button
    $('#deleteModal .btn-danger').on('click', function() {
        // Send a DELETE request to the server
        fetch('http://localhost/fyp/Api/delete/deleteaccommodation.php', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ accommodationId: deleteId }),
        })
        .then(response => {
            if (response.ok) {
                $('#deleteModal').modal('hide');
                $('#posted').html('<div class="alert alert-accent alert-dismissible fadeIn show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="open"><span aria-hidden="true">×</span></button>Deleted successfully</div>');
                setTimeout(function() {
                            location.reload();
                }, 1000);
            } else {
                throw new Error('Failed to delete accommodation');
            }
        })
        .catch(error => {
            alert(error.message);
        });
    });
});

                    </script>
                    

                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4">
                                <div class="card-body p-0 pb-3 text-center">
                                    <table class="table mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="border-0">S.N</th>
                                                <th scope="col" class="border-0">Name</th>
                                                <th scope="col" class="border-0">Price</th>
                                                <th scope="col" class="border-0">Destination</th>
                                                <th scope="col" class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($dataArray as $item) {
                                                    echo '<tr>';
                                                    echo '<td>' . $item['AccommodationID'] . '</td>';
                                                    echo '<td>' . $item['AccommodationName'] . '</td>';
                                                    echo '<td>' . $item['Price'] . '</td>';
                                                    echo '<td>' . $item['DestinationName'] . '</td>';
                                                    echo '<td>
                                                            <a href="/fyp/add-accomodation.php?id='. $item['AccommodationID'].'"><button class="mb-2 btn btn-dark mr-2" data-toggle="modal" >Edit</button></a>
                                                            <button class="mb-2 btn btn-danger mr-2" data-target="#deleteModal" data-toggle="modal" data-id="' . $item['AccommodationID'] . '">Delete</button>
                                                        </td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Accommodation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this accommodation?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger">Delete</button> <!-- Trigger the delete request -->
                            </div>
                        </div>
                    </div>
                </div>


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