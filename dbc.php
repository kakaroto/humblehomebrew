<?php

require_once 'config.php';

$con = mysql_connect($MYSQL_SERVER, $MYSQL_USERNAME, $MYSQL_PASSWORD);
if (!$con) {
  // TODO
  //echo "Error opening database connection";
  //die();
}
mysql_select_db($MYSQL_DATABASE, $con);

?>