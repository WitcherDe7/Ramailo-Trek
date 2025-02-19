<?php
  include 'controllers/authController.php';
  require 'fetchdata.php';
  if ($role == 'admin') {
    echo "Admin Not allowed";
  }else{
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
                            <a class="nav-link active" href="userdash.php">
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
                            <a class="nav-link " href="browse.php">
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
                                <a class="nav-link text-nowrap px-3" data-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle mr-2" src="<?php echo $img; ?>"
                                        alt="User Avatar">
                                    <span class="d-none d-md-inline-block"><?php echo $username; ?></span>
                                </a>
                                
                            </li>
                        </ul>
                        <nav class="nav">
                            <a href="#"
                                class="nav-link toggle-sidebar d-md-inline d-lg-none text-center border-left"
                                data-toggle="collapse" data-target=".header-navbar" aria-expanded="false"
                                aria-controls="header-navbar">
                                
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
                        
                    </div>
                    <!-- End Page Header -->

                    <div class="container">
                        <div class="row justify-content-center">
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <div class="card card-small blog-comments">
                                  <div class="card-header border-bottom">
                                    <h6 class="m-0">My Reviews</h6>
                                  </div>
                                  <div class="card-body p-0">

                                  
                                  <?php
                                    $uid = $_SESSION['id'];
                                    $url = 'http://localhost/fyp/Api/user/rating-user.php?userid=' . $uid;
                                    $jsonData = file_get_contents($url);
                                    $reviews = json_decode($jsonData, true);

                                    ?>

                                    <?php if (!empty($reviews)) : ?>
                                        <?php foreach ($reviews as $review) : ?>
                                            <?php
                                            $feedback = $review['Feedback'];
                                            $destinationname = $review['Name'];
                                            $datePosted = $review['DatePosted'];
                                            $rating = $review['Rating'];
                                            $image = $review['ImageURL'];
                                            ?>

                                            <div class="blog-comments__item d-flex p-3">
                                                <div class="blog-comments__avatar mr-3">
                                                    <img src="<?php echo $image; ?>" alt="User avatar">
                                                </div>
                                                <div class="blog-comments__avatar mr-3"></div>
                                                <div class="blog-comments__content">
                                                    <div class="blog-comments__meta text-muted">
                                                        <a class="text-secondary" href="#"><?= $feedback ?></a>
                                                        <span class="mx-2">•</span>
                                                        <span class="text-muted"><?= $datePosted ?></span>
                                                    </div>
                                                    <div class="rating">
                                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                            <?php if ($i <= $rating) : ?>
                                                                <i class="fas fa-star"></i>
                                                            <?php else : ?>
                                                                <i class="far fa-star"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </div>
                                                    <span class="text-muted">Destination: <?= $destinationname ?></span>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p class="text-center p-3">You haven't reviewed any Destination yet</p>
                                    <?php endif; ?>



                                  </div>
                                </div>
                              </div>

                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-small mb-4 pt-3">
                                <div class="card-header border-bottom text-center">
                                    <div class="mb-3 mx-auto">
                                        <img class="rounded-circle" src="images/avatars/0.jpg" alt="User Avatar"
                                            width="110">
                                    </div>
                                    <h4 class="mb-0">Sierra Brooks</h4>
                                    <span class="text-muted d-block mb-2">Project Manager</span>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-4">
                                        <div class="progress-wrapper">
                                            <strong class="text-muted d-block mb-2">Workload</strong>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                    aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 74%;">
                                                    <span class="progress-value">74%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item p-4">
                                        <strong class="text-muted d-block mb-2">Description</strong>
                                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque,
                                            quidem, commodi soluta qui quae minima obcaecati quod dolorum sint alias,
                                            possimus illum assumenda eligendi cumque?</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div> -->
                    
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

<?php
  }
?>