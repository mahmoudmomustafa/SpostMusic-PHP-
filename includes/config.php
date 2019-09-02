<?php
$timezone = date_default_timezone_set('Africa/Cairo');

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'spotmusic';
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$con) {
  echo 'Sql Error' . mysqli_error($connection);
}