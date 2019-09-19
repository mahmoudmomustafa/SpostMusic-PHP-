<?php
if (isset($_POST['login-btn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $log_success = $account->login($email, $password);

  if ($log_success) {
    session_start();
    $_SESSION['userLogged'] = $email;
    header('Location: index.php');
  }
}
