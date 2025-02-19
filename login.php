<?php 
include 'controllers/authController.php';
?>
<?php
// redirect user to login page if they're not logged in
if (!empty($_SESSION['id'])) {
    header('location: index.php');
}

?>

<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
  <link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css">
  <!--bootstrap css-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&amp;display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <!--main css-->
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="sass/main.css" rel="stylesheet">
  <link href="sass/dark-theme.css" rel="stylesheet">
  <link href="sass/responsive.css" rel="stylesheet">
  <!-- <meta name="google-signin-client_id"
    content="542470664184-on53of6fbte6t5ssk8prkvsc0q0v6qh8.apps.googleusercontent.com"> -->
</head>

<body>


  <!--authentication-->

  <div class="mx-3 mx-lg-0">

    <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden p-4">
      <div class="row g-4">
        <div class="col-lg-6 d-flex">
          <div class="card-body">
            <img src="assets/images/logo1.png" class="mb-4" width="145" alt="">
            <h4 class="fw-bold">Get Started Now</h4>
            <p class="mb-0">Enter your credentials to login your account</p>
            <div class="row gy-2 gx-0 my-4">
              <div class="col-12 col-lg-12">
                <!-- <button id="signingoogle"
                  class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                  <span class="auth-social-login"><img src="assets/images/apps/05.png" width="20" class="me-2"
                      alt="">Google</span>
                </button> -->
              </div>
            </div>

            <div class="separator">
              <div class="line"></div>
              <p class="mb-0 fw-bold">OR</p>
              <div class="line"></div>
            </div>

            <div class="form-body mt-4">
            <?php if (count($errors) > 0): ?>
              <div class="alert alert-danger">
                <?php foreach ($errors as $error): ?>
                <p class="mb-0">
                  <?php echo $error; ?>
                </p>
                <?php endforeach;?>
              </div>
              <?php endif;?>
              <form method="POST" name="loginForm" class="row g-3" novalidate>
                <div class="col-12">
                  <label for="inputEmailAddress" class="form-label">Email</label>
                  <input type="text"  name="username" class="form-control" id="inputEmailAddress" placeholder="jhon@example.com">
                </div>
                <div class="col-12">
                  <label for="inputChoosePassword" class="form-label">Password</label>
                  <div class="input-group" id="show_hide_password">
                    <input type="password"  name="password" class="form-control border-end-0" id="inputChoosePassword"
                      placeholder="*******" placeholder="Enter Password">
                    <a href="javascript:;" class="input-group-text bg-transparent"><i
                        class="bi bi-eye-slash-fill"></i></a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                  </div>
                </div>
                <div class="col-md-6 text-end"> <a href="forgot-password.html">Forgot Password ?</a>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button type="submit" name="loginButton" class="btn btn-primary" onclick="login(event)">Login</button>
                  </div>
                </div>
                <div class="col-12">
                  <div class="text-start">
                    <p class="mb-0">Don't have an account yet? <a href="register.php">Sign up here</a>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-lg-flex d-none">
          <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-light">
            <img src="assets/images/auth/login1.png" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </div>

  </div>

  <script>
    // var startApp = function () {
    //   gapi.load('auth2', function () {
    //     auth2 = gapi.auth2.init({
    //       client_id: '542470664184-on53of6fbte6t5ssk8prkvsc0q0v6qh8.apps.googleusercontent.com',
    //       cookiepolicy: 'single_host_origin',
    //     });
    //     attachSignin(document.getElementById('signingoogle'));
    //   });
    // };
    
  
    // function attachSignin(element) {
    //   auth2.attachClickHandler(element, {},
    //     function (googleUser) {
    //       var id_token = googleUser.getAuthResponse().id_token;
    //       // Send the id_token to the server using XHR
    //       var xhr = new XMLHttpRequest();
    //       xhr.open('POST', './api/googlelog.php');
    //       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    //       xhr.onload = function () {
    //         console.log('Signed in as: ' + xhr.responseText);
    //       };
    //       xhr.send('idtoken=' + id_token);
    //     },
    //     function (error) {
    //       if (error.error === 'popup_closed_by_user') {
    //         console.log('User closed the Google Sign-In popup.');
    //         // You can handle this case by showing a user-friendly message or taking other actions.
    //       } else {
    //         alert(JSON.stringify(error, undefined, 2));
    //       }
    //     }
    //   );
    // }
  
    // window.onload = function () {
    //   startApp();
    // };
  </script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>

  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi-eye-slash-fill");
          $('#show_hide_password i').removeClass("bi-eye-fill");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi-eye-slash-fill");
          $('#show_hide_password i').addClass("bi-eye-fill");
        }
      });
    });
  </script>
  <!----Notification-->
  <script src="assets/plugins/notifications/js/lobibox.min.js"></script>
  <script src="assets/plugins/notifications/js/notifications.min.js"></script>
  <script src="assets/plugins/notifications/js/notification-custom-script.js"></script>
</body>

</html>