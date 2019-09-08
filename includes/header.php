<?php
include('includes/config.php');
include('includes/classes/Album.php');
include('includes/classes/Artist.php');
include('includes/classes/Song.php');

if (isset($_SESSION['userLogged'])) {
  $userLogged = $_SESSION['userLogged'];
} else {
  header('LOCATION: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | SpotMusic</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- <link href="assets/css/app.css" rel="stylesheet"> -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="assets/js/script.js"></script>
</head>

<body>
  <div id="app">
    <!-- nav bar -->
    <?php include('includes/navBar.php') ?>