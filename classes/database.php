<?php
class Database {
  // Connection variables
  private $host = "192.168.0.11";
  private $dbName = "test_samples";
  private $username = "root";
  private $password = "Srv387029";
  public $conn;

  // Method return security connection
  public function dbConnection() {
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" .
      $this->dbName, $this->username, $this->password,
        array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $exception) {
      echo "Connection error: " . $exception->getMessage();
    }
    return $this->conn;
  }
}
?>
