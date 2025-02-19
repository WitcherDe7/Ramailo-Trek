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
    <style>
        .card-margin {
    margin-bottom: 1.875rem;
}

.card {
    border: 0;
    box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #ffffff;
    background-clip: border-box;
    border: 1px solid #e6e4e9;
    border-radius: 8px;
}

.card .card-header.no-border {
    border: 0;
}
.card .card-header {
    background: none;
    padding: 0 0.9375rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    min-height: 50px;
}
.card-header:first-child {
    border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
}

.widget-49 .widget-49-title-wrapper {
  display: flex;
  align-items: center;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-primary {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #edf1fc;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-day {
  color: #4e73e5;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-month {
  color: #4e73e5;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-secondary {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #fcfcfd;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day {
  color: #dde1e9;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month {
  color: #dde1e9;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-success {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #e8faf8;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day {
  color: #17d1bd;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month {
  color: #17d1bd;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-info {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #ebf7ff;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day {
  color: #36afff;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month {
  color: #36afff;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-warning {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: floralwhite;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day {
  color: #FFC868;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month {
  color: #FFC868;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-danger {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #feeeef;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day {
  color: #F95062;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month {
  color: #F95062;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-light {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #fefeff;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day {
  color: #f7f9fa;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month {
  color: #f7f9fa;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-dark {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #ebedee;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day {
  color: #394856;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month {
  color: #394856;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-base {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #f0fafb;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {
  color: #68CBD7;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {
  color: #68CBD7;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-meeting-info {
  display: flex;
  flex-direction: column;
  margin-left: 1rem;
}

.widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {
  color: #3c4142;
  font-size: 14px;
}

.widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {
  color: #B1BAC5;
  font-size: 13px;
}

.widget-49 .widget-49-meeting-points {
  font-weight: 400;
  font-size: 13px;
  margin-top: .5rem;
}

.widget-49 .widget-49-meeting-points .widget-49-meeting-item {
  display: list-item;
  color: #727686;
}

.widget-49 .widget-49-meeting-points .widget-49-meeting-item span {
  margin-left: .5rem;
}

.widget-49 .widget-49-meeting-action {
  text-align: right;
}

.widget-49 .widget-49-meeting-action a {
  text-transform: uppercase;
}
    </style>
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
                            <a class="nav-link" href="userdash.php">
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
                            <a class="nav-link active" href="chats.php">
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

                    <div class="container">
                        <div class="row">

                            <div class="col-lg-12">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Groups</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-3">
                                    <form id="createGroupForm" action="process_form.php" method="post">
                                        <div class="input-group mb-3">
                                            <div class="input-group input-group-seamless">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">person</i>
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" id="form1-username" name="group_name" placeholder="Enter Group Name">
                                            </div>
                                        </div>

                                        <button type="button" id="publish" class="btn btn-sm btn-accent">
                                            <i class="material-icons">groups</i> Create
                                        </button>
                                    </form>
                                    <script>
                                    $(document).ready(function() {
                                        $("#publish").click(function() {
                                            var formData = $("#createGroupForm").serialize();

                                            $.ajax({
                                                type: "POST",
                                                url: "http://localhost/fyp/Api/chat/creategroup.php",
                                                data: formData,
                                                success: function(response) {
                                                    console.log(response);
                                                    $('#posted').html('<div class="alert alert-accent alert-dismissible fadeIn show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="open"><span aria-hidden="true">×</span></button>Group Created Successfully</div>');
                                                }
                                            });
                                        });
                                    });
                                    </script>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>

                        <div class="page-header row no-gutters py-4">
                            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                                <span class="text-uppercase page-subtitle">Manage My Group</span>
                            </div>
                        </div>

                        <div id="cardContainer" class="row" style="text-align: right;">
                        
                        </div>

                        <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Joined Groups</span>
                        </div>
                        </div>

                        <div id="cardContainer2" class="row" style="text-align: right;">

                        </div>
                        </div>

                        <script>
                        $(document).ready(function(){
                            function fetchUserGroups() {
                                $.ajax({
                                    url: 'http://localhost/fyp/Api/chat/joinedgroups.php?id=' + <?php echo $id; ?>, 
                                    success: function(response) {
                                        // Clear existing content
                                        $('#cardContainer2').html("");

                                        var data = JSON.parse(response);

                                        data.forEach(function(item) {
                                            var cardHtml = createGroupCardHtml(item);
                                            $('#cardContainer2').append(cardHtml);
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(xhr.responseText);
                                        alert('An error occurred while fetching user groups. Please try again.');
                                    }
                                });
                            }

                            // Function to create HTML for group card
                            function createGroupCardHtml(item) {
                                return `
                                    <div class="col-lg-4">
                                        <div class="card card-margin">
                                            <div class="card-header no-border">
                                                <h5 class="card-title"></h5>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="widget-49">
                                                    <div class="widget-49-title-wrapper">
                                                        <div class="widget-49-date-primary">
                                                            <span class="widget-49-date-day">${item.GroupID}</span>
                                                            <span class="widget-49-date-month"></span>
                                                        </div>
                                                        <div class="widget-49-meeting-info">
                                                            <span class="widget-49-pro-title">${item.GroupName}</span>
                                                            <span class="widget-49-meeting-time"></span>
                                                        </div>
                                                    </div>
                                                    <div class="widget-49-meeting-action">
                                                        <a class="btn btn-sm btn-primary" href="http://localhost/fyp/chatroom.php?group=${item.GroupID}">View Chat</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            }

                            fetchUserGroups();
                            setInterval(fetchUserGroups, 5000);
                        });
                    </script>



                        </div>

                        <script>
                        $(document).ready(function(){
                            $(document).on('click', '#joingrp', function(e){
                                e.preventDefault(); 
                                var groupId = $(this).closest('.widget-49').find('.grpid').val();
                                var userId = $(this).closest('.widget-49').find('.userid').val();

                                console.log(groupId);
                                console.log(userId);
                                
                                $.ajax({
                                    url: 'http://localhost/fyp/Api/chat/joingroup.php',
                                    method: 'POST',
                                    data: { 
                                        chat: 1,
                                        groupid: groupId,
                                        userid: userId
                                    },
                                    success: function(response) {
                                        console.log(response);
                                        // Handle the response as needed
                                        if (response == 'success') {
                                            $('#posted').html('<div class="alert alert-accent alert-dismissible fadeIn show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="open"><span aria-hidden="true">×</span></button>Group Joined Successfully</div>');
                                        }else if(response == 'already_joined'){
                                            $('#posted').html('<div class="alert alert-danger alert-dismissible fadeIn show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="open"><span aria-hidden="true">×</span></button>Already Joined</div>');
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(xhr.responseText);
                                        $('#posted').html('<div class="alert alert-danger alert-dismissible fadeIn show mb-0" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="open"><span aria-hidden="true">×</span></button>Error Joining Group</div>');
                                    }
                                });
                            });
                        });
                    </script>

                    <script>
                        function fetchDataAndUpdate() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'http://localhost/fyp/Api/chat/groupinfo.php', true);

                            xhr.onload = function() {
                                if (xhr.status == 200) {
                                    var data = JSON.parse(xhr.responseText);
                                    var cardContainer = document.getElementById('cardContainer');
                                    cardContainer.innerHTML = ""; 

                                    data.forEach(function(item) {
                                        var cardHtml = createCardHtml(item);
                                        cardContainer.innerHTML += cardHtml;
                                    });
                                }
                            };

                            xhr.send();
                        }

                        function createCardHtml(item) {
                            return `
                                <div class="col-lg-4">
                                    <div class="card card-margin">
                                        <div class="widget-49-meeting-action">
                                            <h5 class="card-title"><button id="copylink" style="text-align: left;margin: .5rem;" class="btn btn-sm"><i class="material-icons">content_copy</i></button></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="widget-49">
                                                <div class="widget-49-title-wrapper">
                                                    <div class="widget-49-date-primary">
                                                        <span class="widget-49-date-day">${item.GroupID}</span>
                                                        <span class="widget-49-date-month"></span>
                                                    </div>
                                                    <div class="widget-49-meeting-info">
                                                        <span class="widget-49-pro-title">${item.GroupName}</span>
                                                        <span class="widget-49-meeting-time"></span>
                                                    </div>
                                                </div>
                                                <div class="widget-49-meeting-action">
                                                    <form method="POST">
                                                        <input type="hidden" class="grpid" name="groupid" value="${item.GroupID}">
                                                        <input type="hidden" class="userid" name="userid" value="<?php echo $id; ?>">
                                                        <button id="joingrp" class="btn btn-sm btn-primary"><i class="far fa-bookmark mr-1"></i> Join Group </button>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }

                        setInterval(fetchDataAndUpdate, 100000);
                        fetchDataAndUpdate();
                    </script>
                    <script>

                    </script>
                        

                    
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