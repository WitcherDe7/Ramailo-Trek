<?php
  include 'controllers/authController.php';
  
  $getid = $_GET['DestinationID'];
  if ($getid == '') {
    header("location: errors.html");
  }else if (isset($_GET['DestinationID'])) {
        $destinationId = $_GET['DestinationID'];

        $sql = "SELECT * FROM destinations where DestinationID = $destinationId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();

            // Fetch rows and add to the data array
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }else{
            header("location: errors.html");
        }
    }else{
        header("location: errors.html");
    }

// Function to count visits for a specific destination ID and user ID
function countVisits($destinationID, $userID) {
    // Connect to your MySQL database (replace these values with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ramailotrek";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to update visit count
    $sql = "INSERT INTO visitcounts (DestinationID, UserID, VisitCount) VALUES (?, ?, 1) ON DUPLICATE KEY UPDATE VisitCount = VisitCount + 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $destinationID, $userID);
    
    // Execute statement
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
}

// Function to get the visit count for a specific destination ID
function getVisitCount($destinationID, $userID) {
    // Connect to your MySQL database (replace these values with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "ramailotrek";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to get visit count
    $sql = "SELECT VisitCount FROM visitcounts WHERE DestinationID = ? AND UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $destinationID, $userID);
    
    // Execute statement
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }
    
    // Bind result variables
    $stmt->bind_result($visitCount);
    
    // Fetch result
    $stmt->fetch();
    
    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();

    return $visitCount;
}

// Assuming you receive the destination ID from the URL parameters
if (isset($_GET['DestinationID'])) {
    // Sanitize input data
    $destinationID = intval($_GET['DestinationID']);
    // Get user ID from session (replace 'id' with the actual session variable containing the user ID)
    $userID = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
    countVisits($destinationID, $userID);
}

$destinationID = isset($_GET['DestinationID']) ? intval($_GET['DestinationID']) : 0;
$userID = isset($_SESSION['id']) ? $_SESSION['id'] : 0;

?>
<?php



// redirect user to login page if they're not logged in
// if (empty($_SESSION['id'])) {
//     
// }

// $userId = $_SESSION['id'];
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $username; ?> | Blog and News Minimal Responsive HTML Template</title>
    <meta name="description" content="Author: AxilTheme, Template: HTML, Category: Blog, Price: $13.00,
    Length: 23 pages">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assetslanding/media/favicon.svg">
    <link rel="stylesheet" href="assetslanding/css/fonts/icomoon.css">
    <link rel="stylesheet" href="assetslanding/css/vendor/slick/slick.css">
    <link rel="stylesheet" href="assetslanding/css/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="assetslanding/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="assetslanding/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        input.star {
            display: none;
        }

        label.star {

            float: right;

            padding: 10px;

            font-size: 36px;

            color: #4A148C;

            transition: all .2s;

        }



        input.star:checked~label.star:before {

            content: '\f005';

            color: #FD4;

            transition: all .25s;

        }


        input.star-5:checked~label.star:before {

            color: #FE7;

            text-shadow: 0 0 20px #952;

        }



        input.star-1:checked~label.star:before {
            color: #F62;
        }



        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }



        label.star:before {

            content: '\f006';

            font-family: FontAwesome;

        }
    </style>


    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="assetslanding/css/app.css">

</head>

<body class="mobilemenu-active">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->


    <a href="#main-wrapper" id="backto-top" class="back-to-top" aria-label="Back To Top">
        <i class="regular-direction-up"></i>
    </a>

    <div id="main-wrapper" class="main-wrapper">
        <header class="header header1 sticky-on">

            <div id="sticky-placeholder"></div>
            <div id="navbar-wrap" class="navbar-wrap">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-md-block d-none">
                            <a href="index.html" class="link-wrap desktop-logo img-height-100"
                                aria-label="Site Logo"><img width="131" height="47"
                                    src="http://localhost/fyp/assets/images/logo1.png" alt="logo"></a>
                        </div>
                        <div class="d-md-none d-block">
                            <a href="index.html" class="link-wrap mobile-logo img-height-100"
                                aria-label="Site Logo"><img width="86" height="31"
                                    src="http://localhost/fyp/assets/images/logo1.png" alt="logo"></a>
                        </div>
                        <!-- Start Mainmenu Nav -->
                        <div id="mobilemenu-popup" class="mobile-menu-wrap">
                            <div class="mobile-logo-wrap d-lg-none d-block">
                                <div class="logo-holder">
                                    <a href="index.html" class="link-wrap single-logo light-mode img-height-100"
                                        aria-label="Site Logo"><img width="131" height="47"
                                            src="http://localhost/fyp/assets/images/logo1.png" alt="logo"></a>
                                    <a href="index.html" class="link-wrap single-logo dark-mode img-height-100"
                                        aria-label="Site Logo"><img width="131" height="47"
                                            src="http://localhost/fyp/assets/images/logo1.png" alt="logo"
                                            aria-label="Site Logo"></a>
                                </div>
                                <button aria-label="Offcanvas" type="button" class="mobile-close"
                                    data-bs-dismiss="offcanvas"><i class="regular-multiply-circle"></i></button>
                            </div>
                            <nav id="dropdown" class="template-main-menu">
                                <ul class="menu">
                                    <li class="menu-item menu-item-has-children">
                                        <a href="#">Home</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="index.html">Home Default</a></li>
                                            <li class="menu-item"><a href="home-modern.html">Home Modern</a></li>
                                            <li class="menu-item"><a href="home-standard.html">Home Standard</a></li>
                                            <li class="menu-item"><a href="home-news.html">Home News</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="about.html">About</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="contact.html">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- End Mainmanu Nav -->
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-lg-block d-none">
                                <div class="search-trigger-wrap">
                                    <a href="#search-trigger" title="search">
                                        <i class="regular-search-02"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-lg-block d-none">
                                <div class="profile-wrap dropdown-item-wrap">
                                    <div class="navbar navbar-expand-md">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                aria-label="Profile">
                                                <!-- <span class="thumble-holder img-height-100"><img width="40" height="40"
                                                        src="assetslanding/media/blog/profile4.webp"
                                                        alt="Profile"></span> -->
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end animate slideIn"
                                                aria-labelledby="navbarDropdown2">
                                                <!-- <div class="dropdown-menu-inner">
                                                    <div class="profile-content with-icon">
                                                        <ul>
                                                            <li><a href="author.html">
                                                                    <div class="icon-holder"><i
                                                                            class="regular-user"></i></div>Profile
                                                                </a></li>
                                                            <li><a href="author.html">
                                                                    <div class="icon-holder"><i
                                                                            class="regular-activity"></i></div>Activity
                                                                    Log
                                                                </a></li>
                                                            <li><a href="author.html">
                                                                    <div class="icon-holder"><i
                                                                            class="regular-plus-rectangle"></i></div>
                                                                    Library
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="profile-content">
                                                        <ul>
                                                            <li><a href="author.html">Become a Member</a></li>
                                                            <li><a href="author.html">Apply for author verification</a>
                                                            </li>
                                                            <li><a href="author.html">Settings</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="mt-3">
                                                        <a href="#"
                                                            class="w-100 axil-btn axil-btn-ghost btn-color-alter axil-btn-small">Sign
                                                            Out</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-lg-none d-block">
                                <div class="my_switcher">
                                    <ul>
                                        <li title="Light Mode">
                                            <button type="button" aria-label="Light" class="setColor light"
                                                data-theme="light">
                                                <i class="solid-light-mode"></i>
                                            </button>
                                        </li>
                                        <li title="Dark Mode">
                                            <button type="button" aria-label="Dark" class="setColor dark"
                                                data-theme="dark">
                                                <i class="solid-half-moon"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mobile-menu-btn d-lg-none d-block">
                                <button aria-label="Offcanvas" class="btn-wrap" data-bs-toggle="offcanvas"
                                    data-bs-target="#mobilemenu-popup">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="space-top-60 space-bottom-60 single-blog-wrap1 bg-color-light-1 transition-default">
            <div class="container">
                <div class="row sticky-coloum-wrap">
                    <div class="col-lg-8 sticky-coloum-item">
                        <div class="single-blog-content content-layout1 pe-lg-4">
                        <?php
                            // Check if $data is set
                            if (isset($data)) {
                                foreach ($data as $row) {
                        ?>
                                    <h1 class="entry-title color-dark-1"><?php echo $row['Name']; ?></h1>
                                    <ul class="entry-meta color-dark-1">
                                        <h3>Difficulty <?php echo $row['TrekkingDifficulty']; ?></h3>
                                    </ul>
                                    <div class="mb-4 box-border-dark-1 radius-default transition-default">
                                        <div class="figure-holder img-height-100 radius-medium">
                                            <img width="810" height="490" src="<?php echo $row['ImageURL']; ?>" alt="Post">
                                            
                                        </div>
                                    </div>
                                    <!----POST----->
                                    <?php echo $row['Description']; ?>
                        

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Weather</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Accommodation</button>
                                    </li>
                                    <!-- <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                                    </li> -->
                                    </ul>
                    

                                    <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <?php
                                    function getWeatherForecast($lat, $lon, $apiKey) {
                                        $url = "http://api.openweathermap.org/data/2.5/forecast?lat={$lat}&lon={$lon}&appid={$apiKey}&units=metric";
                                        $response = file_get_contents($url);

                                        if ($response) {
                                            return json_decode($response, true);
                                        } else {
                                            return false;
                                        }
                                    }

                                    $apiKey = '50f2751fa3760552e5fd16ce874a4a6f';
                                    $lat = $row['Lat'];
                                    $lon = $row['Lon'];
                                    $weatherForecast = getWeatherForecast($lat, $lon, $apiKey);

                                    if ($weatherForecast) {
                                        $dailyData = [];
                                        foreach ($weatherForecast['list'] as $forecast) {
                                            $date = date('Y-m-d', strtotime($forecast['dt_txt']));
                                            $dailyData[$date]['temperature'][] = $forecast['main']['temp'];
                                            $dailyData[$date]['weatherDescription'] = $forecast['weather'][0]['description'];
                                            $dailyData[$date]['icon'] = $forecast['weather'][0]['icon'];
                                        }
                                    }
                                    ?>
                                    <div class="card shadow-0 text-dark" style="border-radius: 10px;">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-around align-items-center mb-3">
                                                <div class="flex-column">
                                                    <i class="fa fa-minus"></i>
                                                </div>

                                                <?php
                                                // Loop through the days and display weather forecast dynamically
                                                foreach ($dailyData as $date => $data) {
                                                    $day = date('D', strtotime($date));
                                                    $temperature = reset($data['temperature']);
                                                ?>
                                                    <div class="flex-column">
                                                        <p class="small mb-1"><?php echo $day; ?></p>
                                                        <p class="small mb-1"><strong><?php echo $temperature . '°C'; ?></strong></p>
                                                        
                                                        <p class="small mb-1 text-sm"><?php echo  $dailyData[$date]['weatherDescription']; ?></p>

                                                        <img src="http://openweathermap.org/img/w/<?php echo $dailyData[$date]['icon']; ?>.png" />
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <div class="flex-column">
                                                    <i class="fa fa-minus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <div id="accommodation-info"></div>
                                        <script>
                                            var xhr = new XMLHttpRequest();
                                            var destinationID = <?php echo isset($_GET['DestinationID']) ? $_GET['DestinationID'] : 'null'; ?>;
                                            var url = 'http://localhost/fyp/api/accommodationinfo.php?DestinationID=' + destinationID;
                                            
                                            xhr.open('GET', url, true);
                                            xhr.setRequestHeader('Content-Type', 'application/json');
                                            
                                            xhr.onload = function () {
                                                if (xhr.status >= 200 && xhr.status < 300) {
                                                    var data = JSON.parse(xhr.responseText);
                                                    var html = '';
                                                    // Loop through each item in the data array
                                                    data.forEach(function(item) {
                                                        html += '<div>';
                                                        html += '<h3>Name: ' + item.AccommodationName + '</h3>';
                                                        html += '<p>Description: ' + item.Description + '</p>';
                                                        html += '<p>NPR: ' + item.Price + '</p>';
                                                        // Add more data fields here as needed
                                                        html += '</div>';
                                                    });
                                                    document.getElementById('accommodation-info').innerHTML = html;
                                                } else {
                                                    console.error('Error fetching accommodation info:', xhr.statusText);
                                                    document.getElementById('accommodation-info').innerHTML = '<p>Error fetching accommodation info. Please try again later.</p>';
                                                }
                                            };
                                            
                                            xhr.onerror = function () {
                                                console.error('Request failed');
                                                document.getElementById('accommodation-info').innerHTML = '<p>Error fetching accommodation info. Please try again later.</p>';
                                            };
                                            
                                            xhr.send();
                                        </script>


                                    </div>

                                    

                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        
                                    </div>
                                    </div>
                            <br>
                            <br>
                            <hr>

                            <div class="post-comment">
                                <div class="section-heading heading-style-7">
                                    <h3 class="title h3-regular">Reviews</h3>
                                </div>
                                <?php
                                $destinationID = $getid; // Replace with the actual DestinationID from your page or URL parameter


                                $apiUrl = "http://localhost/fyp/api/ratings.php?destinationID=" . $destinationID;
                                $ratings = json_decode(file_get_contents($apiUrl), true);

                                foreach ($ratings as $singleRating) {
                                ?>

                                    <ul class="comment-list">
                                        <li>
                                            <div class="each-comment">
                                                <div class="comment-figure img-height-100">
                                                    <img width="500" height="500" src="<?php echo $singleRating['image']; ?>" alt="image">
                                                </div>
                                                <div class="comment-content">
                                                    <h4 class="comment-title"><?php echo $singleRating['userName']; ?></h4>
                                                    <div class="comment-meta"><span class="post-date"><?php echo $singleRating['datePosted']; ?></span>
                                                    </div>
                                                    <div class="comment-rating" style="display: table;">
                                                    <?php
                                                        $currentRating = $singleRating['rating']; 

                                                        // Start the PHP loop for filled stars
                                                        for ($i = $currentRating; $i >= 1; $i--) {
                                                            // Define the style based on the 'checked' condition
                                                            $style = ($i <= $currentRating) ? 'color: orange;' : '';
                                                        
                                                            // Echo the filled star with the inline style
                                                            echo '<span class="fa fa-star" style="' . $style . '"></span>';
                                                        }
                                                        
                                                        // Start the PHP loop for unfilled stars
                                                        for ($i = 5 - $currentRating; $i >= 1; $i--) {
                                                            // Echo the unfilled star
                                                            echo '<span class="fa fa-star"></span>';
                                                        }

                                                        ?>
                                                    </div>
                                                    <p class="comment-comment"><?php echo $singleRating['feedback']; ?></p>
                                                    
                                                    <?php if (empty($_SESSION['id']) || $_SESSION['id'] == $singleRating['reviewerid']): ?>
                                                        <!-- If session id is empty or matches reviewer id, do nothing -->
                                                    <?php else: ?>
                                                        <a href='/fyp/api/report.php?reviewid=<?php echo $singleRating['reviewID'].'&&userid='. $_SESSION['id']; ?>' class="item-btn">Report</a>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                <?php
                                }
                                ?>
                            </div>

                            <?php if (empty($_SESSION['id'])): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                You need to login to comment
                            </div>
                            <?php else: ?>
                            <div class="leave-comment">
                                <div class="section-heading heading-style-7">
                                    <h3 class="title h3-regular">Post A Comment</h3>
                                </div>

                                <form class="leave-form-box" id="reviewForm" method="POST">
                                    <div class="row g-2">
                                        <div class="col-6 form-group">
                                            <h5 class="title h3-regular">Overall Rating</h5>
                                            <h3 class="title h3-regular">4.5</h3>

                                        </div>
                                        <input class="star star-5" id="userid" type="radio" name="UserID" value="<?php echo $_SESSION['id'];  ?>" />
                                       
                                        <div class="col-6 form-group">
                                            <input class="star star-5" id="star-5" type="radio" name="star" value="5" />

                                            <label class="star star-5" for="star-5"></label>

                                            <input class="star star-4" id="star-4" type="radio" name="star" value="4" />

                                            <label class="star star-4" for="star-4"></label>

                                            <input class="star star-3" id="star-3" type="radio" name="star" value="3" />

                                            <label class="star star-3" for="star-3"></label>

                                            <input class="star star-2" id="star-2" type="radio" name="star" value="2" />

                                            <label class="star star-2" for="star-2"></label>

                                            <input class="star star-1" id="star-1" type="radio" name="star" value="1" />

                                            <label class="star star-1" for="star-1"></label>
                                        </div>

                                        <div class="col-12 form-group">
                                            <textarea class="textarea form-control" placeholder="Write review"
                                                name="message" id="leave-message" rows="5" cols="20"
                                                data-error="Message field is required" required=""></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group mt-2">
                                            <button type="submit" data-toggle="modal" data-target="#exampleModalCenter"
                                                class="axil-btn axil-btn-fill btn-color-alter axil-btn-large"><span><span>Post
                                                    </span></span></button>
                                        </div>
                                    </div>
                                </form>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                    var userId = document.getElementById('userid').value;

                                    document.getElementById("reviewForm").addEventListener("submit", function (event) {
                                        event.preventDefault(); // Prevent the form from submitting in the traditional way

                                        // Count the number of stars selected
                                        var selectedStars = document.querySelector('input[name="star"]:checked');
                                        var numberOfStars = selectedStars ? parseInt(selectedStars.value) : 0;

                                        // Validate the form here if needed

                                        // Collect form data
                                        var formData = new FormData(this);
                                        formData.append("userId", userId);
                                        formData.append("destinationid", <?php echo $getid; ?>);


                                        // Make an AJAX request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open("POST", "http://localhost/fyp/Api/store_review.php", true);
                                        xhr.onload = function () {
                                            if (xhr.status == 200) {
                                                // Handle the response from the server, if needed
                                                console.log(xhr.responseText);
                                            }
                                        };
                                        xhr.send(formData);
                                    });
                                });


                                </script>
                            </div>
                            
                             <?php endif;?>



                        </div>
                    </div>
                    <div class="col-lg-4 sticky-coloum-item">
                        <div class="sidebar-global sidebar-layout4">
                            <div class="sidebar-widget">
                                <div
                                    class="widget-category category-layout1 bg-color-tidal radius-default box-border-dark-1">
                                    <ul class="category-list">
                                        <li>
                                            <a>Location</a><?php echo $row['Location']; ?>
                                        </li>
                                        <li>
                                        <a>Trekking Difficulty</a><?php echo $row['TrekkingDifficulty']; ?>
                                        </li>
                                        <li>
                                        <a>Maximum Days</a><?php echo $row['MaximumDays']; ?>
                                        </li>
                                        <li>
                                        <a>Elevation</a><?php echo $row['Elevation']; ?>
                                        </li>
                                        <li>
                                        <a>Latitude </a><?php echo $row['Lat']; ?>° N
                                        </li>
                                        <li>
                                        <a>Longitude</a><?php echo $row['Lon']; ?>° E
                                        </li>
                                    </ul>
                                </div>
                            </div>

                    
                            <div class="sidebar-widget">
                                <div class="widget-banner banner-layout2">
                                    <div class="figure-holder radius-default box-border-dark-1">
                                        <a href="http://localhost/fyp/route.php?DestinationID=<?php echo $row['DestinationID']; ?>" class="link-wrap img-height-100">View The full map</a>
                                    </div>
                                </div>
                                <p>suggest an edit</p>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </section>
        
        <!-- <section class="space-top-50 space-bottom-60 bg-color-light-2">
            <div class="container">
                <div class="section-heading heading-style-1">
                    <h2 class="title">Recommended Trekks</h2>
                </div>
                <div class="position-relative">
                    <div id="post-slider-3" class="post-slider-3 gutter-30 outer-top-5 initially-none">
                        <div class="single-slide">
                            <div
                                class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-scandal box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660"
                                            height="470" src="assetslanding/media/blog/post7.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">FOOD</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a
                                            href="post-format-default.html" class="link-wrap">Underwater Exercise Is
                                            Used Strengthen Muscles</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="assetslanding/media/blog/profile2.webp" alt="Author">
                                                Kristin Watson
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>5 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>9k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div
                                class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-mimosa box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660"
                                            height="470" src="assetslanding/media/blog/post8.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">SPORTS</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a
                                            href="post-format-default.html" class="link-wrap">Beauty Of Deep Space.
                                            Billions Of In The Universe</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="assetslanding/media/blog/profile3.webp" alt="Author">
                                                Jenny Wilson
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>9 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>9k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div
                                class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-selago box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660"
                                            height="470" src="assetslanding/media/blog/post9.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">TECH</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a
                                            href="post-format-default.html" class="link-wrap">Air Pods Pro With Wireless
                                            Used Strengthen Weak</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="assetslanding/media/blog/profile1.webp" alt="Author">
                                                Esther Howard
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>3 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>9k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div
                                class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-old-lace box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660"
                                            height="470" src="assetslanding/media/blog/post11.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">HISTORY</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a
                                            href="post-format-default.html" class="link-wrap">Millions Of Book Are
                                            Written By Jhon Abraham</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="assetslanding/media/blog/profile2.webp" alt="Author">
                                                John Philipe
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>7 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>9k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div
                                class="post-box-layout6 box-border-dark-1 radius-default padding-20 bg-color-mimosa box-shadow-large shadow-style-2 transition-default">
                                <div class="figure-holder radius-default">
                                    <a href="post-format-default.html" class="link-wrap img-height-100"><img width="660"
                                            height="470" src="assetslanding/media/blog/post12.webp" alt="Post"></a>
                                </div>
                                <div class="content-holder">
                                    <div class="entry-category style-2 color-dark-1-fixed">
                                        <ul>
                                            <li>
                                                <a href="archive-layout1.html">TECH</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="entry-title color-dark-1-fixed underline-animation"><a
                                            href="post-format-default.html" class="link-wrap">Air Pods Pro With Wireless
                                            Charging Case That Make</a></h3>
                                    <ul class="entry-meta color-dark-1-fixed">
                                        <li class="post-author">
                                            <a href="author.html">
                                                <img src="assetslanding/media/blog/profile5.webp" alt="Author">
                                                Alisa Michaels
                                            </a>
                                        </li>
                                        <li>
                                            <i class="regular-clock-circle"></i>9 min read
                                        </li>
                                        <li>
                                            <i class="regular-eye"></i>9k
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="slider-navigation-layout1 position-layout2 color-light-1 nav-size-large">
                        <li id="post-prev-3" class="prev"><i class="regular-arrow-left"></i></li>
                        <li id="post-next-3" class="next"><i class="regular-arrow-right"></i></li>
                    </ul>
                </div>
            </div>
        </section> -->
        <section class="newsletter-wrap-layout1 space-top-60 space-bottom-60 bg-color-light-1 transition-default">
            <div class="container">
                <div class="newsletter-box-layout1 box-border-dark-1 radius-default bg-color-perano">
                    <h2 class="entry-title h2-medium f-w-700 color-dark-1-fixed">SUBSCRIBE TO OUR NEWSLETTER</h2>
                    <p class="entry-description color-dark-1-fixed">Location, Nepal</p>
                    <form action="#"
                        class="newsletter-form box-border-dark-1 box-shadow-large shadow-style-2 shadow-fixed transition-default radius-default">
                        <input type="email" class="email-input" placeholder="Email Address">
                        <button type="submit" class="axil-btn">
                            Subscribe<i class="solid-navigation"></i>
                        </button>
                    </form>
                    <ul class="elements-wrap img-height-100">
                        <li><img width="57" height="53" src="assetslanding/media/elements/element1.webp" alt="Element">
                        </li>
                        <li><img width="120" height="186" src="assetslanding/media/elements/element2.webp"
                                alt="Element"></li>
                    </ul>
                </div>
            </div>
        </section>

        <footer class="footer footer1">
            <div class="footer-main">
                <div class="container">
                    <div class="row g-3">
                        <div class="col-lg-4 col-12">
                            <div class="footer-widget">
                                <div class="footer-about pe-lg-5">
                                    <div class="logo-holder">
                                        <a href="index.html" class="link-wrap img-height-100"
                                            aria-label="Site Logo"><img width="131" height="47"
                                                src="http://localhost/fyp/assets/images/logo1.png" alt="logo"></a>
                                    </div>
                                    <p class="description">Expert insights, industry trends, and inspiring stories that
                                        help you live and work on your own terms. Expert insights, industry trends.</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-2 col-md-6 col-12">
                            <div class="footer-widget">
                                <h3 class="widget-title h3-small">About</h3>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="author.html">Author</a></li>
                                        <li><a href="archive-layout5.html">Culture Foram</a></li>
                                        <li><a href="archive.html">Culture Foram</a></li>
                                        <li><a href="archive.html">United Kingdom</a></li>
                                        <li><a href="archive.html">Media</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="footer-widget">
                                <h3 class="widget-title h3-small">Features</h3>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="archive-layout1.html">Technology</a></li>
                                        <li><a href="archive-layout2.html">Politics</a></li>
                                        <li><a href="archive-layout3.html">Middle East</a></li>
                                        <li><a href="archive-layout4.html">Culture Foram</a></li>
                                        <li><a href="archive-layout5.html">United Kingdom</a></li>
                                        <li><a href="archive-layout6.html">Features</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="footer-widget">
                                <h3 class="widget-title h3-small">Categories</h3>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="archive-layout1.html">Business Leaders</a></li>
                                        <li><a href="archive-layout2.html">Markets</a></li>
                                        <li><a href="archive-layout3.html">Australia</a></li>
                                        <li><a href="archive-layout4.html">Celebrity News</a></li>
                                        <li><a href="archive-layout5.html">Culture Foram</a></li>
                                        <li><a href="archive-layout6.html">TV News</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="footer-widget">
                                <h3 class="widget-title h3-small">Support</h3>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="archive-layout1.html">Music News</a></li>
                                        <li><a href="archive-layout2.html">Style News</a></li>
                                        <li><a href="archive-layout3.html">Entertainment</a></li>
                                        <li><a href="archive-layout4.html">Executive</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <!-- <div class="footer-additional-info">
                        <div class="left-box">
                            <div class="thumble-holder">
                                <a target="_blank" href="https://www.apple.com/app-store/"
                                    class="link-wrap img-height-100"><img width="135" height="40"
                                        src="assetslanding/media/elements/element3.webp" alt="Element"></a>
                            </div>
                            <div class="thumble-holder">
                                <a target="_blank" href="https://play.google.com/store/apps"
                                    class="link-wrap img-height-100"><img width="135" height="40"
                                        src="assetslanding/media/elements/element4.webp" alt="Element"></a>
                            </div>
                        </div>
                        <div class="right-box">
                            <div class="dropdown">
                                <button class="dropdown-btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="flag-holder img-height-100">
                                        <img width="19" height="18" src="assetslanding/media/elements/element5.webp"
                                            alt="Element">
                                    </span>
                                    <span class="language-name">English</span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="index.html">
                                            <span class="flag-holder img-height-100">
                                                <img width="19" height="18"
                                                    src="assetslanding/media/elements/element5.webp" alt="Element">
                                            </span>
                                            <span class="language-name">English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index.html">
                                            <span class="flag-holder img-height-100">
                                                <img width="19" height="18"
                                                    src="assetslanding/media/elements/element6.webp" alt="Element">
                                            </span>
                                            <span class="language-name">Spanish </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="index.html">
                                            <span class="flag-holder img-height-100">
                                                <img width="19" height="18"
                                                    src="assetslanding/media/elements/element7.webp" alt="Element">
                                            </span>
                                            <span class="language-name">French</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="footer-copyright">
                    <span class="copyright-text">© 2023. All rights reserved</span>
                </div>
            </div>
        </footer>

        <?php
                                }
                            } else {
                                // Handle the case when data is not available
                                echo '<p>Data not available</p>';
                            }
                        ?>




    </div>
    <!-- Search Start -->
    <div id="search-trigger" class="search-input-wrap">
        <div class="container">
            <button type="button" class="close">×</button>
            <form class="search-form">
                <input type="search" value="" placeholder="Search">
                <button type="submit" class="search-btn">
                    <i class="regular-search-02"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- Search End -->


    <!-- Jquery Js -->
    <script src="assetslanding/js/vendor/jquery.min.js"></script>
    <script src="assetslanding/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assetslanding/js/vendor/isotope.pkgd.min.js"></script>
    <script src="assetslanding/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="assetslanding/js/vendor/slick.min.js"></script>
    <script src="assetslanding/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="assetslanding/js/vendor/js.cookie.js"></script>
    <script src="assetslanding/js/vendor/jquery.style.switcher.js"></script>
    <script src="assetslanding/js/vendor/jquery.mb.YTPlayer.min.js"></script>
    <script src="assetslanding/js/vendor/theia-sticky-sidebar.min.js"></script>
    <script src="assetslanding/js/vendor/resize-sensor.min.js"></script>


    <!-- Site Scripts -->
    <script src="assetslanding/js/app.js"></script>


</body>

</html>