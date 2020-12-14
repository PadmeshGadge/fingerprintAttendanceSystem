<?php
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH.'/public');
  define("SHARED_PATH", PROJECT_PATH.'/private/shared');
  // define("WWW_ROOT", 'Attendance%20System/public');
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);
  require_once('functions.php');
?>
