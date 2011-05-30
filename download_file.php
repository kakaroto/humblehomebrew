<?php

require_once 'dbc.php';
require_once 'config.php';
require_once 'functions.php';

$type = get_value('type');

if($type == "SGTPUZZLES-PS3-3.55") {
  $ip = $_SERVER['REMOTE_ADDR'];
  mysql_query("INSERT INTO downloads (ip, app, os) VALUES ('". $ip. "', 'SGTPuzzles', 'PS3-3.55')", $con);
  header("Location: ". $SGTPUZZLES_PS3_3_55_URL);
} else if($type == "SGTPUZZLES-PS3-3.41") {
  $ip = $_SERVER['REMOTE_ADDR'];
  mysql_query("INSERT INTO downloads (ip, app, os) VALUES ('". $ip ."', 'SGTPuzzles', 'PS3-3.41')", $con);
  header("Location: ". $SGTPUZZLES_PS3_3_41_URL);
} else if($type == 'SGTPUZZLES-Android') {
  $ip = $_SERVER['REMOTE_ADDR'];
  mysql_query("INSERT INTO downloads (ip, app, os) VALUES ('". $ip ."', 'SGTPuzzles', 'Android')", $con);
  header("Location: ". $SGTPUZZLES_ANDROID_URL);
} else if($type == 'SGTPUZZLES-Windows') {
  $ip = $_SERVER['REMOTE_ADDR'];
  mysql_query("INSERT INTO downloads (ip, app, os) VALUES ('". $ip ."', 'SGTPuzzles', 'Windows')", $con);
  header("Location: ". $SGTPUZZLES_WINDOWS_URL);
} else if($type == 'SGTPUZZLES-Mac') {
  $ip = $_SERVER['REMOTE_ADDR'];
  mysql_query("INSERT INTO downloads (ip, app, os) VALUES ('". $ip ."', 'SGTPuzzles', 'Mac')", $con);
  header("Location: ". $SGTPUZZLES_MAC_URL);
} else if($type == 'SGTPUZZLES-Linux') {
  $ip = $_SERVER['REMOTE_ADDR'];
  mysql_query("INSERT INTO downloads (ip, app, os) VALUES ('". $ip ."', 'SGTPuzzles', 'Linux')", $con);
  header("Location: ". $SGTPUZZLES_LINUX_URL);
} else if($type == 'SGTPUZZLES-Source') {
  $ip = $_SERVER['REMOTE_ADDR'];
  mysql_query("INSERT INTO downloads (ip, app, os) VALUES ('". $ip ."', 'SGTPuzzles', 'Source')", $con);
  header("Location: ". $SGTPUZZLES_SOURCE_URL);
} else {
  header("Location: download.php");
}

mysql_close($con);

?>