<?php
  include 'controllers/authController.php';

  if (empty($_SESSION['id'])) {
      // header('location: login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>

<body>
    <h2>Forgot Password</h2>
    <form action="" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <?php if (isset($errors['email'])) echo '<p>' . $errors['email'] . '</p>'; ?>
        </div>
        <div>
            <button type="submit" name="forgotpass-btn">Submit</button>
        </div>
    </form>
</body>

</html>
