<?php
include('includes/config.php');
include('includes/classes/account.php');
include('includes/classes/Constants.php');
$account = new Account($con);
include('includes/handler/login-handler.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | SpotMusic</title>
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
    <main class="py-4 h-100 mt-5 m-3 d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="content row justify-content-center rounded shadow">
          <div class="col-md-7 py-4">
            <div class="img position-relative h-100 d-flex flex-column text-center w-100">
              <h1 class="p-3 rounded">
                <span class="font-weight-bold brand">Spot<span>Music</span></span>
              </h1>
              <img src="assets/img/log.svg" class="img-fluid m-auto log-img" alt="Responsive image" width="300" height="80">
              <p class="p-3 rounded fade-out">
                Login now to Listen to your Music
              </p>
            </div>
          </div>
          <div class="col-md-5 my-lg-5 my-3">
            <div class="card h-100 fade-out">
              <div class="card-header font-weight-bold border-0 p-4">
                <img src="assets/img/login.svg" alt="login" width="50">
                Login ..</div>
              <div class="card-body">
                <form method="POST" action="login.php" id="login-form">
                  <!-- email -->
                  <div class="form-group row mb-4">
                    <div class="col-md-9 m-auto d-flex">
                      <img src="assets/img/arroba.svg" alt="login" width="35" class="mr-2 p-1 log">
                      <input id="email" placeholder="E-mail Address" type="email" class="form-control shadow" name="email" required autofocus>
                    </div>
                  </div>
                  <!--password -->
                  <div class="form-group row mb-4">
                    <div class="col-md-9 m-auto d-flex">
                      <img src="assets/img/fingerprint.svg" alt="login" width="35" class="mr-2 p-1 log">
                      <input id="password" placeholder="Password" type="password" class="form-control shadow" name="password" required autocomplete="none">
                    </div>
                    <?php echo $account->getError(Constants::$loginErr) ?>
                  </div>
                  <!-- login submit -->
                  <div class="form-group row mb-3">
                    <div class="col-md-9 m-auto d-flex">
                      <button type="submit" class="btn font-weight-bold btn-primary w-100" name="login-btn">
                        Login
                      </button>
                    </div>
                    <a href="register.php" class="m-auto pt-2" style="color:#f00942">Or Make new account?</a>
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