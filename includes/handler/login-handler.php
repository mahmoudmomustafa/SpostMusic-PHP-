<?php
if (isset($_POST['login-btn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $log_success = $account->login($email, $password);

  if ($log_success) {
    header('Location: index.php');
  }
}
