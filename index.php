<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

// Check sessions
require_once 'check_user_session.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PHP Login Session Sample</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>
  <!-- Import the header from components -->
  <?php require_once 'components/header.php'; ?>
  <div class="container-fluid">
    <div class="row">
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap
          align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Home</h1>
          <div class="btn-toolbar mb-2 mb-md-0"></div>
        </div>
        <h5>Welcome!</h5>
        <p>PHP Login Session Sample.</p>
      </main>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>
</html>
