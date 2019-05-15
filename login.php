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
if (isset($_POST['btnLogin'])) {
  $email = strip_tags($_POST['inputEmail']);
  $password = strip_tags($_POST['inputPassword']);

  if ($objUser->doLogin($email, $password)) {
    $objUser->redirect('index.php');
  } else {
    $error = "<strong>Alert!</strong> Wrong user or password.";
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
    <h2>Login Session</h2>
    <p>
      If you don't have an account <a href="registration.php">register here</a>
    </p>
    <?php
    // GET from register form success result and show message
    if (isset($_GET['registered'])) {
      echo '<div class="alert alert-success"><div>
        <strong>User!</strong> Created with success. Please try to login
        </div></div>';
    }
    // Checks any error
    if (isset($error)) {
      print('<div class="alert alert-danger"><div>' . $error . '</div></div>');
    }
    ?>
    <label for="inputEmail" class="sr-only">E-mail</label>
    <input type="email" name="inputEmail" class="form-control"
      placeholder="E-mail" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="inputPassword" class="form-control"
      placeholder="Password" required>

    <input class="btn btn-lg btn-primary btn-block" type="submit"
      name="btnLogin" value="Login">
    <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
  </form>
</body>
</html>
