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
        <a class="navbar-brand font-weight-bold" href="/"><i class="fas fa-headphones-alt pr-1 fa-lg"></i>SPOT<span>Music</span></a>
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
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">Register</div>
              <div class="card-body">
                <form method="POST" action="register.php" id="register-form">
                  <!-- Name -->
                  <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                      <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" required autofocus>
                      <!-- name error -->
                      <?php echo $account->getError(Constants::$nameChar) ?>
                    </div>
                  </div>
                  <!-- User mail-->
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-6">
                      <input id="email" type="email" class="form-control" placeholder="ex@test.com" name="email" required>
                      <!-- mail error -->
                      <?php echo $account->getError(Constants::$emailInvaild) ?>
                      <?php echo $account->getError(Constants::$emailTaken) ?>
                    </div>
                  </div>
                  <!--user password -->
                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                      <input id="password" type="password" class="form-control" placeholder="********" name="password" required autocomplete="none">
                      <!-- pass error -->
                      <?php echo $account->getError(Constants::$passChar) ?>
                      <?php echo $account->getError(Constants::$passInvaild) ?>
                      <?php echo $account->getError(Constants::$passwordNotMatch) ?>
                    </div>
                  </div>
                  <!-- confirm password -->
                  <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                    <div class="col-md-6">
                      <input id="password-confirm" type="password" class="form-control" placeholder="********" name="password_confirmation" required autocomplete="none">
                    </div>
                  </div>
                  <!-- submit btn -->
                  <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary" name="register-btn">
                        Register
                      </button>
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