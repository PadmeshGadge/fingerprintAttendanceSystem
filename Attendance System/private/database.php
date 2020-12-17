<?php
  require_once('db_credentials.php');
  function db_connect(){
    $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
    return $conn;
  }
  function db_disconnect(){
    if(isset($conn)){
      $conn->close();
    }
  }
?>
