<?php 
include 'controllers/authController.php'
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
  <title>Registration</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png">

  <!--plugins-->
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css">
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />


</head>

<body>
  <!--authentication-->

  <div class="mx-3 mx-lg-0">

    <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden border-3 p-4">
      <div class="row g-4">
        <div class="col-lg-6 d-flex">
          <div class="card-body">
            <img src="assets/images/logo1.png" class="mb-4" width="145" alt="">
            <h4 class="fw-bold">Get Started Now</h4>
            <p class="mb-0">Register your account</p>
            <div class="row gy-2 gx-0 my-4">
              <div class="col-12 col-lg-12">
                <!-- <button
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
              <form class="row g-3" method="POST">
                <div class="col-12">
                  <label for="inputUsername" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Jhon" value="<?php echo $username; ?>" required>
                </div>
                <div class="col-12">
                  <label for="inputEmailAddress" class="form-label">Email Address</label>
                  <input type="email" name="email" class="form-control" id="inputEmailAddress" value="<?php echo $email; ?>" placeholder="example@user.com"
                    >
                </div>
                <div class="col-12">
                  <label for="inputChoosePassword" class="form-label">Password</label>
                  <div class="input-group" id="show_hide_password">
                    <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword"
                      placeholder="Enter Password" >
                    <a href="javascript:;" class="input-group-text bg-transparent"><i
                        class="bi bi-eye-slash-fill"></i></a>
                  </div>
                </div>
                <div class="col-12">
                  <label for="inputSelectCountry" class="form-label">Country</label>
                  <select class="form-select" name="Country" id="inputSelectCountry" aria-label="Default select example" >
                  </select>
                </div>
                <div class="col-12">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                    <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms &amp;
                      Conditions</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button type="submit" name="signup-btn" class="btn btn-primary" onclick="register(event)">Register</button>
                  </div>
                </div>
                <div class="col-12">
                  <div class="text-start">
                    <p class="mb-0">Already have an account? <a href="login.php">Sign in here</a></p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6 d-lg-flex d-none">
          <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-light">
            <img src="assets/images/auth/register1.png" class="img-fluid" alt="">
          </div>
        </div>
      </div><!--end row-->
    </div>

  </div>

  <script>
    fetch('https://restcountries.com/v3.1/all')
      .then(response => response.json())
      .then(countries => {
        const countrySelect = document.getElementById('inputSelectCountry');

        countries.forEach((country, index) => {
          const option = document.createElement('option');
          option.value = country.name.common;
          option.textContent = country.name.common;

          if (country.name.common === 'Nepal') {
            option.selected = true;
          }

          countrySelect.appendChild(option);
        });
      })
      .catch(error => {
        console.error('Error fetching countries:', error);
      });
  </script>


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