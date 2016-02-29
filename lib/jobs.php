<?php
require "lib/database.php";

// class for jobs
class Jobs{
  private $_name;
  private $_status;
  private $_conn;

  public function __construct( $name, $status )
  {
    // Get the Database instance and connection
    $db = Database::getInstance();

    $this->_conn = $db->getConnection();
    $this->_name = $name;
    $this->_status = $status;
  }

  // Save a job
  public function save(){
    $this->_conn->exec("INSERT OR REPLACE INTO jobs (name, status, checked_date)
      VALUES ('" . $this->_name . "',
              '" . $this->_status . "',
              '" . date("Y-m-d H:i:s") . "')");
  }

  // Get all jobs
  public static function findAll(){
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $stmt = $conn->prepare('SELECT name, status, checked_date FROM jobs ORDER BY name');
    return $stmt->execute();
  }
}
