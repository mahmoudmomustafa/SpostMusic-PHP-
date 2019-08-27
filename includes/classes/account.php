<?php

class Account
{
  private $errorArray;
  public function __construct()
  {
    $this->errorArray = array();
  }
  public function register($name, $email, $password, $rePassword)
  {
    $this->VaildateName($name);
    $this->VaildateEmail($email);
    $this->VaildatePassword($password, $rePassword);

    if (empty($this->errorArray)) {
      //insert to db
      return true;
    } else {
      return false;
    }
  }
  public function getError($error)
  {
    if (!in_array($error, $this->errorArray)) {
      $error = '';
    }
    if (!empty($error)) {
      return '<div class="alert alert-danger p-2 my-1" role="alert"><strong>'.$error.'</strong></div>';
    }
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
