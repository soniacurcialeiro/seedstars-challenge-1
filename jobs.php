<?php
// class for jobs
class Jobs{

  private $_name;
  private $_status;
  private $_db;

  public function __construct( $db, $name, $status )
  {
    $this->_db = $db;
    $this->_name = $name;
    $this->_status = $status;
  }

  // Save a job
  public function save(){
    $this->_db->exec("INSERT OR REPLACE INTO jobs (name, status, checked_date)
      VALUES ('" . $this->_name . "',
              '" . $this->_status . "',
              '" . date("Y-m-d H:i:s") . "')");
  }

  // Get all jobs
  public static function findAll( $db ){
    $stmt = $db->prepare('SELECT name, status, checked_date FROM jobs ORDER BY name');
    return $stmt->execute();
  }
}
