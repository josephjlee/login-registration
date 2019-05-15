<?php
require_once 'database.php';

class User {
  private $conn;

  // Constructor
  public function __construct() {
    $database = new Database();
    $db = $database->dbConnection();
    $this->conn = $db;
  }

  // Execute queries SQL
  public function runQuery($sql) {
    $stmt = $this->conn->prepare($sql);
    return $stmt;
  }

  // Function to check if I'm logged in on session
  public function is_loggedin() {
    if (isset($_SESSION['user_session'])) {
      return true;
    }
  }

  // Function that destroy the session
  public function doLogout() {
    session_destroy();
    unset($_SESSION['user_session']);
    return true;
  }

  // Function that checks if the user exists on database and set session
  public function doLogin($email, $password) {
    try {
      // Hash the password with SHA1
      $newPassword = sha1($password);
      $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->execute(array(':email' => $email));
      $rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($stmt->rowCount() == 1) {
        if ($newPassword == $rowUser['password']) {
          $_SESSION['user_session'] = $rowUser['id'];
          return true;
        } else {
          return false;
        }
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  // Insert new user
  public function insert($name, $email, $password) {
    try {
      $stmt = $this->conn->prepare("
        INSERT INTO users (name, email, password)
        VALUES (:name, :email, :password)");

      $stmt->bindparam(":name", $name);
      $stmt->bindparam(":email", $email);
      // Hash the password SHA1
      $stmt->bindparam(":password", sha1($password));
      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  // Redirect URL method
  public function redirect($url) {
    header("Location: $url");
  }
}
?>
