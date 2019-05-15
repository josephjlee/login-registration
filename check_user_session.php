<?php
require_once 'classes/session.php';
require_once 'classes/user.php';

$objUser = new User();

// Get the session user ID if exists
$userID = $_SESSION['user_session'];

// Check if the user are logged in and fill the $rowUser
$stmt = $objUser->runQuery("SELECT * FROM users WHERE id = :id");
$stmt->execute(array(":id" => $userID));
$rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
?>
