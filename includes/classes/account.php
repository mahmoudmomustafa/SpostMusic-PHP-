<?php

class Account
{
  private $con;
  private $errorArray;
  public function __construct($con)
  {
    $this->con = $con;
    $this->errorArray = array();
  }
  public function register($name, $email, $password, $rePassword)
  {
    $this->VaildateName($name);
    $this->VaildateEmail($email);
    $this->VaildatePassword($password, $rePassword);

    if (empty($this->errorArray)) {
      //insert to db
      return $this->insertUserData($name, $email, $password);
    } else {
      return false;
    }
  }
  public function login($email, $password)
  {
    $password = md5($password);
    $query = mysqli_query($this->con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($query) == 1) {
      return true;
    } else {
      array_push($this->errorArray, Constants::$loginErr);
      return false;
    }
  }
  public function getError($error)
  {
    if (!in_array($error, $this->errorArray)) {
      $error = '';
    }
    if (!empty($error)) {
      return '<strong class="text-danger">' . $error . '</strong>';
    }
  }
  private function insertUserData($name, $email, $password)
  {
    $encryptPass = md5($password); //hash password user
    $date = date("Y-m-d");
    $result = mysqli_query($this->con, "INSERT INTO users " .
      "(name,email,password) " . "VALUES " .
      "('$name','$email','$encryptPass')");
    return $result;
  }
  private function VaildateName($name)
  {
    if (strlen($name) > 25 || strlen($name) < 5) {
      array_push($this->errorArray, Constants::$nameChar);
      return;
    }
  }
  private function VaildateEmail($email)
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errorArray, Constants::$emailInvaild);
      return;
    }
    //check if email isnt exists
    $sqlEmail = mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($sqlEmail) != 0) {
      array_push($this->errorArray, Constants::$emailTaken);
      return;
    }
  }
  private function VaildatePassword($password, $rePassword)
  {
    // passwords match
    if ($password != $rePassword) {
      array_push($this->errorArray, Constants::$passwordNotMatch);
      return;
    }
    // invaild password
    if (preg_match('/[^A-Za-z0-9]/', $password)) {
      array_push($this->errorArray, Constants::$passInvaild);
      return;
    }
    //password length
    if (strlen($password) > 25 || strlen($password) < 5) {
      array_push($this->errorArray, Constants::$passChar);
      return;
    }
  }
}
