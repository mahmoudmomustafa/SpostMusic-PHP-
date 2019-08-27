<?php include('includes/handler/login-handler.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LogIn | SpotMusic</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!-- Styles -->
  <link href="css/app.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div id="app">
    <main class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">Login</div>
              <div class="card-body">
                <form method="POST" action="login.php" id="login-form">
                  <!-- email -->
                  <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-6">
                      <input id="email" placeholder="ex@test.com" type="email" class="form-control" name="email" required autofocus>
                      <!-- email error -->
                      <span class="invalid-feedback" role="alert">
                        <strong></strong>
                      </span>
                    </div>
                  </div>
                  <!--password -->
                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-6">
                      <input id="password" placeholder="********" type="password" class="form-control" name="password" required autocomplete="none">
                      <!-- password error -->
                      <span class="invalid-feedback" role="alert">
                        <strong></strong>
                      </span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                          Remember Me
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- login submit -->
                  <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary" name="login-btn">
                        Login
                      </button>
                      <a class="btn btn-link" href="#" style="color:#E91E63">
                        Forgot Your Password?
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
  <script src="js/app.js"></script>
  <script src="js/script.js"></script>
</body>

</html>