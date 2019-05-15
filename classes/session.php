<?php
// Set the cookies and begin the session
session_set_cookie_params(0);
session_start();

require_once 'user.php';

$objUser = new User();

// If the user is not logged in redirect him to login page
if (!$objUser->is_loggedin()) {
  $objUser->redirect('login.php');
}
?>
