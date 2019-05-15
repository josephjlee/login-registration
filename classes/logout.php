<?php
require_once 'session.php';
require_once 'user.php';

$objUser = new User();

// Check if I'm logged in if OK send to home page
if ($objUser->is_loggedin() != "") {
  $objUser->redirect('index.php');
}

// Do the logout and send to login page
if (isset($_GET['logout']) && $_GET['logout'] == "true") {
  $objUser->doLogout();
  $objUser->redirect('../login.php');
}
?>
