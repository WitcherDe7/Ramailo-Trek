<?php
  include 'controllers/authController.php';
  require 'fetchdata.php';
  if ($role == 'user') {
    echo "404 Page Not Found";
  }else{
?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shards Dashboard Lite - Free Bootstrap Admin Template – DesignRevision</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"> 
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <style>
      .blur {
    filter: blur(4px); /* Adjust the blur strength as needed */
    pointer-events: none; /* Allow clicks to pass through to the modal */
}

.modal-blur {
    filter: none !important; /* Remove blur effect for modal */
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
                <a class="nav-link active" href="add-new-post.php">
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
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Destination</span>
                <h3 class="page-title">Add New Destination</h3>
              </div>
            </div>
            <!-- End Page Header -->

            <div class="row">
              <div class="col-lg-9 col-md-12">
                <!-- Add New Post Form -->
                <div class="card card-small mb-3">
                  <div class="card-body">
                    <div class="add-new-post">
                      <input name="postTitle" id="postTitle" class="form-control form-control-lg mb-3" type="text" placeholder="Destination">
                      <strong class="text-muted d-block">Difficulty</strong>
                      <div id="slider-example-1" class="slider-success my-4">
                        <input type="hidden" id="difficulty" class="custom-slider-input">
                      </div>
                      <div class="form-row mt-5">
                        <div class="form-group col-md-3">
                          <input type="number" class="form-control" id="maxdays" min="1" placeholder="Maximum Days" required>
                        </div>
                        <div class="form-group col-md-9">
                        <input type="text" class="form-control" id="location" placeholder="Location" required>
                        </div>
                        <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="lat" placeholder="Latitude Ex: 80.00" required>
                        </div>
                        <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="lon" placeholder="Longtitude Ex: 88.00" required>
                        </div>
                        <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="elevation" placeholder="Elevation Ex: 1800 Meters" required>
                        </div>
                        <div class="form-group col-md-6">
                        <input type="file" id="imageInput" accept="image/*" class="form-control">

                        </div>
                      </div>
                      <div name="post" id="editor-container" class="add-new-post__editor mb-1"></div>
                      <div class="quill-textarea"></div>
                      <textarea style="display: none" id="detail" name="detail"></textarea>
                    </div>
                  </div>
                </div>
                <!-- / Add New Post Form -->
              </div>
              <div class="col-lg-3 col-md-12">

                <!-- Post Overview -->
                <div class='card card-small mb-3'>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Actions</h6>
                  </div>
                  <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item p-3">
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">sort</i>
                          <strong class="mr-1">Words Count: </strong>
                          <sm id="counter"></sm>
                        </span>
                        <span class="d-flex">
                          <i class="material-icons mr-1">score</i>
                          <strong class="mr-1">Readability:</strong>
                          <strong id="readcount"></strong>
                        </span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <button id="draft" class="btn btn-sm btn-outline-accent">
                          <i class="material-icons">save</i> Save Draft</button>
                        <button name="publish" id="publish" class="btn btn-sm btn-accent ml-auto">
                          <i class="material-icons">file_copy</i> Publish</button>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- / Post Overview -->

                <!-- Post Overview -->
                <div class='card card-small mb-3'>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Image</h6>
                  </div>
                  <div class='card-body p-0'>
                  <img id="imagePreview" src="https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image.png" style="max-width: 80%;flex: auto;align-items: center;justify-content:center;margin-left: auto;margin-right: auto;display:block;margin-bottom: 20px;margin-top: 20px;" alt="Image Preview">
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex px-3">
                        <button id="removeImage"  class="btn btn-sm btn-outline-danger text-center">
                          <i class="material-icons">delete</i> Remove</button>
                      </li>
                    </ul>
                  </div> 
                </div>
                <!-- / Post Overview -->
                

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


        <div class="modal fade" id="validationModal" tabindex="-1" role="dialog" aria-labelledby="validationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="validationModalLabel">Validation Error</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p id="validationMessage"></p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>



      </div>
    </div>
    <script>
      $(document).ready(function () {
        //////////////////Publish post////////////////
        $('#editor-container').keyup(function () {
          var rText = $('#detail').val();
          console.log(rText);
          var rWords = rText.trim().replace(/\s+/gi, ' ').split(' ').length
          // console.log(rWords);
          if (rWords <= 100) {
            $('#readcount').html('<strong class="text-danger">Low</strong');
          }
          if (rWords > 100 && rWords <= 300) {
            $('#readcount').html('<strong class="text-warning">Easy</strong');
          }
          if (rWords > 300 && rWords <= 600) {
            $('#readcount').html('<strong class="text-primary">Medium</strong');
          }
          if (rWords > 600 && rWords <= 900) {
            $('#readcount').html('<strong class="text-success">Good</strong');
          }
          if (rWords > 900) {
            $('#readcount').html('<strong class="text-info">Excellent</strong');
          }

        })

            $('#imageInput').change(function () {
                // Get the selected image file
                var image = this.files[0];

                // Display image preview
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(image);
            });

            $('#removeImage').click(function () {
                $('#imageInput').val(''); // Clear the file input
                $('#imagePreview').attr('src', 'https://t4.ftcdn.net/jpg/01/43/42/83/360_F_143428338_gcxw3Jcd0tJpkvvb53pfEztwtU9sxsgT.jpg') // Hide the image preview
            });

// Function to show validation modal
function showModalMessage(title, message, isError) {
    var modal = $('#validationModal');
    modal.find('.modal-title').text(title);
    modal.find('.modal-body').text(message);
    if (isError) {
        modal.find('.modal-header').addClass('bg-danger text-white');
    } else {
        modal.find('.modal-header').removeClass('bg-danger text-white');

    }
    modal.modal('show');

    // Blur everything inside the body except the modal
    $('aside').addClass('blur');
    $('main').addClass('blur');

    modal.addClass('modal-blur');
}

// Function to hide validation modal
function hideModalMessage() {
    $('#validationModal').modal('hide');
}

// When modal is hidden
$('#validationModal').on('hidden.bs.modal', function () {
    // Remove blur effect from everything inside the body
    $('aside').removeClass('blur');
    $('main').removeClass('blur');

    $('.modal').removeClass('modal-blur');
});





// Regular expressions for validation
var integerRegex = /^\d+$/;
var textRegex = /^[a-zA-Z\s]+$/;

// Variable to track if there are validation errors
var validationError = false;

// Bind validation to the change event of each input field
$('#postTitle, #detail, #maxdays, #difficulty, #lat, #lon, #elevation').change(function () {
    var id = $(this).attr('id'); // Get the ID of the changed input field
    var value = $(this).val(); // Get the value of the changed input field

    // Perform validation based on the ID of the input field
    switch (id) {
        case 'postTitle':
            if (value.trim() === '') {
                validationError = true;
                showModalMessage('Validation Error', 'Please enter a post title.', true);
            } else if (!value.match(textRegex)) {
                validationError = true;
                showModalMessage('Validation Error', 'Post title must contain only alphabetic characters and spaces.', true);
            } else {
                validationError = false;
            }
            break;
        case 'detail':
            if (value.trim() === '') {
                validationError = true;
                showModalMessage('Validation Error', 'Please enter a post.', true);
            } else {
                validationError = false;
            }
            break;
        case 'maxdays':
        case 'difficulty':
        case 'lat':
        case 'lon':
        case 'elevation':
            if (!value.match(integerRegex)) {
                validationError = true;
                showModalMessage('Validation Error', 'Please enter a valid integer for ' + id + '.', true);
            } else {
                validationError = false;
            }
            break;
        default:
            // Do nothing for other input fields
            break;
    }
});

// Function to handle form submission
$('#publish').click(function () {
    // Check if there are validation errors
    if (validationError) {
        // Show modal if there are validation errors
        showModalMessage('Validation Error', 'Please fix validation errors before submitting.', true);
        return; // Prevent form submission
    }

    // Proceed with form submission
    var postTitle = $('#postTitle').val();
    var post = $('#detail').val();
    var maxdays = $('#maxdays').val();
    var location = $('#location').val();
    var difficulty = $('#difficulty').val();
    var lat = $('#lat').val();
    var lon = $('#lon').val();
    var elevation = $('#elevation').val();

    // Get the image file from the input
    var image = $('#imageInput')[0].files[0];

    // Use FormData to handle file upload
    var formData = new FormData();
    formData.append('publish', 1);
    formData.append('title', postTitle);
    formData.append('description', post);
    formData.append('maxdays', maxdays);
    formData.append('location', location);
    formData.append('difficulty', difficulty);
    formData.append('lat', lat);
    formData.append('lon', lon);
    formData.append('elevation', elevation);
    formData.append('image', image);

    $.ajax({
        url: "post.php",
        method: "POST",
        data: formData,
        processData: false,  // Important: tell jQuery not to process the data
        contentType: false,  // Important: tell jQuery not to set contentType
        success: function (response) {
            // Display feedback to the user
            console.log(response)
            if (response === 's') {
                showModalMessage('Success', 'Destination Added Successfully', false);
            } else {
                showModalMessage('Error', 'Unable to publish post', true);
            }
        }
    });
});




        //////////////////Draft post//////////////////

        $('#draft').click(function () {
          // console.log('clicked');
          var postTitle = $('#postTitle').val();
          var post = $('#detail').val();
           console.log('Draft: ' + postTitle, post);

          var maxdays = $('#maxdays').val();
          var location = $('#location').val();
          var difficulty = $('#difficulty').val();
          console.log(maxdays, location,difficulty);
        });
        ////////////////Count Words////////////////

        function count(){
          var txtVal = $('#detail').val();
          var words = txtVal.trim().replace(/\s+/gi, ' ').split(' ').length;
          $('#counter').html(words);
        }

        count();
        $('#editor-container').on('keydown', function(){ 
            count();
        });

        ///////////////////////////////
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
    <script src="https://cdn.rawgit.com/kensnyder/quill-image-resize-module/3411c9a7/image-resize.min.js"></script>
    <script src="scripts/app/image-drop.js"></script>
    <script src="scripts/app/app-blog-new-post.1.1.0.js"></script>
    <script src="scripts/app/app-components-overview.1.1.0.js"></script>
  </body>
</html>
<?php
        }
    ?>