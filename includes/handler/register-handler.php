<?php
if (isset($_POST['register-btn'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rePassword = $_POST['password_confirmation'];

  $reg_success = $account->register($name, $email, $password, $rePassword);

  if ($reg_success) {
    session_start();
    $_SESSION['userLogged'] = $name;
    header('Location: index.php');
  }
}
