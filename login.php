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
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg shadow">
      <div class="container">
        <!-- navbar brand -->
        <a class="navbar-brand font-weight-bold" href="/"><i class="lni-music size-xs pr-1"></i>SPOT<span>Music</span></a>
        <!-- nav side -->
        <div class="right-div" id="right-nav">
          <ul class="nav ml-auto justify-content-end">
            <li class="nav-item">
              <a class="nav-link text-secondary" href="/projects/SpotMusic/login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary" href="/projects/SpotMusic/register.php">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- main content -->
    <main class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 my-5">
            <div class="img position-relative w-100">
              <img src="assets/img/log2.svg" class="img-fluid" alt="Responsive image">
              <div class="headings">
                <h1 class="p-3 rounded fade-out">
                  Welcome To <span class="font-weight-bold text-primary brand"><i class="lni-music size-md pr-1"></i>Spot<span>Music</span></span>
                </h1>
                <h2 class="p-3 rounded fade-out">
                  Login Or Register Now to listen to your Music<i class="size-sm pl-3 lni-fade-right-effect lni-angle-double-right"></i>
                </h2>
              </div>
            </div>
          </div>
          <div class="col-md-5 my-lg-5 mt-3">
            <div class="card h-100 shadow fade-out">
              <div class="card-header font-weight-bold border-0 p-4">Login</div>
              <div class="card-body">
                <form method="POST" action="login.php" id="login-form">
                  <!-- email -->
                  <div class="form-group row mb-3">
                    <div class="col-md-9 m-auto">
                      <input id="email" placeholder="E-mail Address" type="email" class="form-control shadow rounded" name="email" required autofocus>
                    </div>
                  </div>
                  <!--password -->
                  <div class="form-group row mb-3">
                    <div class="col-md-9 m-auto">
                      <input id="password" placeholder="Password" type="password" class="form-control shadow rounded" name="password" required autocomplete="none">
                      <?php echo $account->getError(Constants::$loginErr) ?>
                    </div>
                  </div>
                  <!-- login submit -->
                  <div class="form-group row mb-3">
                    <div class="col-md-8 m-auto">
                      <button type="submit" class="btn btn-primary w-100" name="login-btn">
                        Login <i class="pl-2 fas fa-sign-in-alt"></i>
                      </button>
                      <a class="btn btn-link" href="#" style="color:#E91E63">
                        Forgot?
                      </a>
                    </div>
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