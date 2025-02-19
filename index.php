<?php
  include 'controllers/authController.php';
  require 'fetchdata.php';
  require 'Api/dashboard/users.php';
  if ($role == 'user') {
    echo " 404 Page Not Found";
  }else{


?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}

?>


<!DOCTYPE html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>THIS IS WEBSITE</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
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
                <a class="nav-link active" href="index.php">
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
                  <a class="nav-link" href="createroute.php">
                  <i class="material-icons">edit</i>
                  <span>Add Map</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="add-accomodation.php">
                  <i class="material-icons">edit</i>
                  <span>Add Accomodation</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="view-accomodation.php">
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
          <?php if (isset($_SESSION['message'])): ?>
                <div class="alert <?php echo $_SESSION['type'] ?>">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    unset($_SESSION['type']);
                ?>
                </div>
                <?php endif;?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Overview</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
            <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Users</span>
                        <h6 class="stats-small__value count my-3"><?php echo $row['total_users'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Destinations</span>
                        <h6 class="stats-small__value count my-3"><?php echo $row2['total_destinations'] ?></h6>
                      </div>
        
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Reviews</span>
                        <h6 class="stats-small__value count my-3"><?php echo $row3['total_rating'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Small Stats Blocks -->
            <div class="row">
              <!-- Users Stats -->
              <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Users</h6>
                  </div>
                  <div class="card-body pt-0">
                    <canvas height="130" style="max-width: 100% !important;" id="userCountChart"></canvas>
                    

                  </div>
                </div>
              </div>
              <!-- End Users Stats -->
              <!-- Users By Device Stats -->
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Average Ratings for Top Destinations</h6>
                  </div>
                  <div class="card-body d-flex py-0">
                    <canvas height="220" id="myPieChart"></canvas>
                  </div>
                </div>
              </div>
              <!-- End Users By Device Stats -->
              <!-- Discussions Component -->
              <div class="col-lg-7 col-md-12 col-sm-12 mb-4">
                <div class="card card-small blog-comments">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Reported Reviews</h6>
                  </div>
                  <div class="card-body p-0">
                    <canvas id="barChart" width="400" height="200"></canvas>
                  </div>

                </div>
              </div>
              <!-- End Discussions Component -->
              <!-- Top Referrals Component -->
              <!-- <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Top Referrals</h6>
                  </div>
                  <div class="card-body p-0">
                    <ul class="list-group list-group-small list-group-flush">
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">GitHub</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">19,291</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Stack Overflow</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">11,201</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Hacker News</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">9,291</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Reddit</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">8,281</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">The Next Web</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">7,128</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Tech Crunch</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">6,218</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">YouTube</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">1,218</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Adobe</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">827</span>
                      </li>
                    </ul>
                  </div>
                  <div class="card-footer border-top">
                    <div class="row">
                      <div class="col">
                        <select class="custom-select custom-select-sm">
                          <option selected>Last Week</option>
                          <option value="1">Today</option>
                          <option value="2">Last Month</option>
                          <option value="3">Last Year</option>
                        </select>
                      </div>
                      <div class="col text-right view-report">
                        <a href="#">Full report &rarr;</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- End Top Referrals Component -->
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
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          // Fetch data from the API
          fetch('http://localhost/fyp/api/canvas_api.php')
              .then(response => response.json())
              .then(apiResponse => {
                  // Extracting data from the API response
                  const months = apiResponse.map(entry => entry.month);
                  const counts = apiResponse.map(entry => entry.count);

                  // Creating a line chart
                  const ctx = document.getElementById('userCountChart').getContext('2d');
                  const userCountChart = new Chart(ctx, {
                      type: 'line',
                      data: {
                          labels: months,
                          datasets: [{
                              label: 'Users By Month',
                              data: counts,
                              borderColor: 'blue',
                              borderWidth: 2,
                              fill: false
                          }]
                      },
                      options: {
                          scales: {
                              x: {
                                  type: 'time',
                                  time: {
                                      unit: 'month',
                                      stepSize: 1,
                                      displayFormats: {
                                          month: 'MMM YYYY'
                                      }
                                  },
                                  title: {
                                      display: true,
                                      text: 'Month'
                                  }
                              },
                              y: {
                                  title: {
                                      display: true,
                                      text: 'User Count'
                                  }
                              }
                          }
                      }
                  });
              })
              .catch(error => console.error('Error fetching data:', error));

              fetch('http://localhost/fyp/Api/topdestination.php')
                .then(response => response.json())
                .then(data => {
                    // Assuming the API returns data in the same format as before
                    var labels = data.map(item => item.Name);
                    var values = data.map(item => parseFloat(item.AvgRating));

                    // Get the canvas element
                    var ctx = document.getElementById('myPieChart').getContext('2d');

                    // Create a pie chart
                    var myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: values,
                                backgroundColor: ['blue', 'green', 'red', 'yellow', 'purple'], // Customize colors
                            }]
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching data from the API:', error);
                });

                fetch('http://localhost/fyp/api/reviewapi.php')
                .then(response => response.json())
                .then(data => {
                    // Extracting usernames and total reviews from the data
                    var usernames = data.map(item => item.Username);
                    var totalReviews = data.map(item => parseInt(item.TotalReviews));

                    // Creating a bar chart
                    var ctx = document.getElementById('barChart').getContext('2d');
                    var barChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: usernames,
                            datasets: [{
                                label: 'Reported Reviews',
                                data: totalReviews,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
      });
  </script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
  </body>
</html>

<?php
        }
    ?>