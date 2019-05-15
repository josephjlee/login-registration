<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

session_start();
require_once 'classes/user.php';

$objUser = new User();

// If user is logged in send to home page
if ($objUser->is_loggedin() != "") {
    $objUser->redirect('index.php');
}

// POST
if (isset($_POST['btnSave'])) {
  $name = strip_tags($_POST['inputName']);
  $email = strip_tags($_POST['inputEmail']);
  $password = strip_tags($_POST['inputPassword']);

  try {
    if ($objUser->insert($name, $email, $password)) {
      $objUser->redirect('login.php?registered');
    } else {
      $objUser->redirect('registration.php?error');
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PHP Login Session Sample</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" method="post">
    <h2>Login Registration</h2>
    <p>All the fields are required.</p>
    <?php
    // Show message if any issues happens
    if (isset($error)) {
      print('<div class="alert alert-danger"><div>' . $error . '</div></div>');
    }
    ?>
    <label for="inputName" class="sr-only">Full Name</label>
    <input type="text" name="inputName" class="form-control"
      placeholder="Full Name" required autofocus>

    <label for="inputEmail" class="sr-only">E-mail</label>
    <input type="email" name="inputEmail" class="form-control"
      placeholder="E-mail" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="inputPassword" class="form-control"
      placeholder="Password" required>

    <input class="btn btn-lg btn-primary btn-block" type="submit"
      name="btnSave" value="Save">
    <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
  </form>
</body>
</html>
