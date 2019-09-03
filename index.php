<?php 
include('includes/config.php');
if(isset($_SESSION['userLogged'])){
  $userLogged = $_SESSION['userLogged'];
}else{
  header('LOCATION: login.php');
}