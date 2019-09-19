<?php
include('includes/config.php');
include('includes/classes/account.php');
include('includes/classes/Constants.php');
$account = new Account($con);
include('includes/handler/register-handler.php');

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | SpotMusic</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
  <!-- Styles -->
  <link href="assets/css/app.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <div id="app">
    <!-- main content -->
    <main class="py-2 h-100 mt-5 m-3 d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="content row justify-content-center rounded shadow">
          <div class="col-md-7 py-4">
            <div class="img position-relative h-100 d-flex flex-column text-center w-100">
              <h1 class="p-3 rounded">
                <span class="font-weight-bold brand">Spot<span>Music</span></span>
              </h1>
              <img src="assets/img/log.svg" class="img-fluid m-auto log-img" alt="Responsive image" width="300" height="80">
              <p class="p-3 rounded fade-out">
                Register now to Make your Playlist
              </p>
            </div>
          </div>
          <div class="col-md-5 my-lg-5 my-3">
            <div class="card h-100 fade-out">
              <div class="card-header font-weight-bold border-0 p-4">
                <img src="assets/img/login.svg" alt="login" width="50">
                Register ..</div>
              <div class="card-body">
                <form method="POST" action="register.php" id="register-form">
                  <!-- Name -->
                  <div class="form-group row">
                    <div class="col-md-9 m-auto d-flex">
                      <img src="assets/img/arroba.svg" alt="login" width="35" class="mr-2 p-1 log">
                      <input id="name" type="text" class="form-control shadow" name="name" placeholder="Full Name" required autofocus>
                    </div>
                    <!-- name error -->
                    <?php echo $account->getError(Constants::$nameChar) ?>
                  </div>
                  <!-- User mail-->
                  <div class="form-group row flex-column">
                    <div class="col-md-9 m-auto d-flex">
                      <img src="assets/img/arroba.svg" alt="login" width="35" class="mr-2 p-1 log">
                      <input id="email" type="email" class="form-control shadow" placeholder="E-mail Address" name="email" required>
                    </div>
                    <div class="m-auto">
                      <!-- mail error -->
                      <?php echo $account->getError(Constants::$emailInvaild) ?>
                      <?php echo $account->getError(Constants::$emailTaken) ?>
                    </div>
                  </div>
                  <!--user password -->
                  <div class="form-group row">
                    <div class="col-md-9 m-auto d-flex">
                      <img src="assets/img/fingerprint.svg" alt="login" width="35" class="mr-2 p-1 log">
                      <input id="password" type="password" class="form-control shadow" placeholder="Password" name="password" required autocomplete="none">
                    </div>
                    <!-- pass error -->
                    <?php echo $account->getError(Constants::$passChar) ?>
                    <?php echo $account->getError(Constants::$passInvaild) ?>
                    <?php echo $account->getError(Constants::$passwordNotMatch) ?>
                  </div>
                  <!-- confirm password -->
                  <div class="form-group row mb-4">
                    <div class="col-md-9 m-auto d-flex">
                      <img src="assets/img/fingerprint.svg" alt="login" width="35" class="mr-2 p-1 log">
                      <input id="password-confirm" type="password" class="form-control shadow" placeholder="Confirm Password" name="password_confirmation" required autocomplete="none">
                    </div>
                  </div>
                  <!-- submit btn -->
                  <div class="form-group row">
                    <div class="col-md-9 m-auto">
                      <button type="submit" class="btn btn-primary w-100" name="register-btn">
                        Register
                      </button>
                    </div>
                    <a href="login.php" class="m-auto pt-2" style="color:#f00942">Have an account?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- <script src="js/app.js"></script>
  <script src="js/script.js"></script> -->
</body>

</html>