<?php
  include 'controllers/authController.php';
  require 'fetchdata.php';
  $sessionId = $_SESSION['id'];

// Assuming $_GET['group'] contains the group ID
$groupId = isset($_GET['group']) ? $_GET['group'] : null;
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
        .chat-box {
    height: 100%;
    width: 100%;
    background-color: #fff;
    overflow: hidden
}

.chats {
    padding: 30px 15px
}

.chat-avatar {
    float: right
}

.chat-avatar .avatar {
    width: 30px;
        -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.2),0 6px 10px 0 rgba(0,0,0,0.3);
}

.chat-body {
    display: block;
    margin: 10px 30px 0 0;
    overflow: hidden
}

.chat-body:first-child {
    margin-top: 0
}

.chat-content {
    position: relative;
    display: block;
    float: right;
    padding: 8px 15px;
    margin: 0 20px 10px 0;
    clear: both;
    color: #fff;
    background-color: #62a8ea;
    border-radius: 4px;
        -webkit-box-shadow: 0 1px 4px 0 rgba(0,0,0,0.37);
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.37);
}

.chat-content:before {
    position: absolute;
    top: 10px;
    right: -10px;
    width: 0;
    height: 0;
    content: '';
    border: 5px solid transparent;
    border-left-color: #62a8ea
}

.chat-content>p:last-child {
    margin-bottom: 0
}

.chat-content+.chat-content:before {
    border-color: transparent
}

.chat-time {
    display: block;
    margin-top: 8px;
    color: rgba(255, 255, 255, .6)
}

.chat-left .chat-avatar {
    float: left
}

.chat-left .chat-body {
    margin-right: 0;
    margin-left: 30px
}

.chat-left .chat-content {
    float: left;
    margin: 0 0 10px 20px;
    color: #76838f;
    background-color: #dfe9ef
}

.chat-left .chat-content:before {
    right: auto;
    left: -10px;
    border-right-color: #dfe9ef;
    border-left-color: transparent
}

.chat-left .chat-content+.chat-content:before {
    border-color: transparent
}

.chat-left .chat-time {
    color: #a3afb7
}

.panel-footer {
    padding: 0 30px 15px;
    background-color: transparent;
    border-top: 1px solid transparent;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
.avatar img {
    width: 100%;
    max-width: 100%;
    height: auto;
    border: 0 none;
    border-radius: 1000px;
}
.chat-avatar .avatar {
    width: 30px;
}
.avatar {
    position: relative;
    display: inline-block;
    width: 40px;
    white-space: nowrap;
    border-radius: 1000px;
    vertical-align: bottom;
}

.chat-container {
    height: 400px; /* Adjust height as needed */
    overflow-y: auto;
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
                                <i class="material-icons">chat</i>
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
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        
                    </div>
                    <!-- End Page Header -->


                        <div class="col-lg-12">
                            <div class="card card-small mb-4 pt-3">
                                <div class="col-md-12 col-xs-12 col-md-offset-2">
                                <!-- Panel Chat -->
                                <div class="panel" id="chat">
                                    <div class="panel-heading">
                                    <h3 class="panel-title" style="background: #007bff;font-size: 12px;border-radius: 5px;padding-left: 20px;text-align: center;color: white;">
                                    <?php
                                    if (isset($_GET['group'])) {
                                        $groupId = $_GET['group'];
                                        $sql = "SELECT * FROM groups WHERE GroupID = '$groupId'";
                                    } else {
                                        $sql = "SELECT * FROM groups";
                                    }
                                    
                                    $result = $conn->query($sql);
                                    
                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "Group Name: " . $row['GroupName'];
                                        }
                                    } else {
                                        // Handle case where no results were found
                                        echo "No results found.";
                                    }
                                
                                    ?>
                                    </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="chats chat-container" id="chat-container">
                                            
                                        </div>
                                    <div class="panel-footer">
                                    <form id="messageForm">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="messageInput" placeholder="Say something">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button" id="sendMessageBtn">Send</button>
                                            </span>
                                        </div>
                                    </form>

                                    </div>
                                </div>
                                <!-- End Panel Chat -->
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
        $(document).ready(function () {
            // Replace this URL with your actual message sending API URL
            const sendMessageUrl = "http://localhost/fyp/api/chat/send_message.php";

            // Event listener for the send message button
            $("#sendMessageBtn").on("click", function () {
                // Get the message input value
                const message = $("#messageInput").val();


                // Check if the message is not empty
                if (message.trim() !== "") {
                    // Make an AJAX request to send the message
                    $.ajax({
                        url: sendMessageUrl,
                        method: 'POST',
                        data: {
                            group_id: <?php echo isset($_GET['group']) ? $_GET['group'] : 'null'; ?>, 
                            user_id: <?php echo $_SESSION['id'] ?>,
                            message: message
                        },
                        dataType: 'json',
                        success: function (response) {
                            // Assuming your API returns a success message or updated chat data
                            if (response.success) {
                                // Update the chat container with the new message
                                updateChatContainer([response.message]);
                                // Clear the message input
                                $("#messageInput").val('');
                                
                            } else {
                                console.error('Error sending message:', response.message);
                            }
                        },
                        error: function (error) {
                            console.error('Error sending message:', error);
                        }
                    });
                }
            });
        });
    </script>
    <script>
    const apiUrl = "http://localhost/fyp/api/chat/chatapi.php?group_id=";

    // Replace 'your_session_id' with the actual session ID
    const sessionId = <?php echo $sessionId; ?>;

    // Function to fetch chat data from the API
    function fetchChatData(groupId) {
        $.ajax({
            url: apiUrl + groupId,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Process the retrieved data and update the chat container
                updateChatContainer(data);
            },
            error: function(error) {
                console.error('Error fetching chat data:', error);
            }
        });
    }

    // Function to update the chat container with dynamic content
    function updateChatContainer(data) {
        const chatContainer = $('#chat-container');

        // Clear previous chat content
        chatContainer.html('');

        // Iterate through the data and append chat elements
        data.forEach(item => {
            const isCurrentUser = item.UserID == sessionId;
            const chatElement = `<div class="chat ${isCurrentUser ? '' : 'chat-left'}">
                                    <div class="chat-avatar">
                                        <a class="avatar avatar-online" data-toggle="tooltip" href="#" data-placement="${isCurrentUser ? 'right' : 'left'}" title="" data-original-title="${item.Username}">
                                            <img src="http://localhost/fyp/profile/profile.png" alt="${item.Username}">
                                            <i></i>
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content">
                                            <p>${item.message}</p>
                                        </div>
                                    </div>
                                </div>`;
            chatContainer.append(chatElement);
        });

        chatContainer.scrollTop(chatContainer[0].scrollHeight);
    }

    const groupId = <?php echo $groupId; ?>;

    // Fetch initial chat data
    fetchChatData(groupId);

    setInterval(function() {
        fetchChatData(groupId);
    }, 1000);
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