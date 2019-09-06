<?php
include('includes/config.php');
if (isset($_SESSION['userLogged'])) {
  $userLogged = $_SESSION['userLogged'];
} else {
  header('LOCATION: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | SpotMusic</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
  <!-- Styles -->
  <link href="assets/css/app.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
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
              <a class="nav-link text-secondary" href="/projects/SpotMusic/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary" href="/projects/SpotMusic/profile.php"><?php echo $userLogged ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- main content -->
    <main class="py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">Songs U may liks</div>
              <div class="card-body">
                <div class="albums">
                  <div class="div-album">
                    <img src="#" alt="" class="img-thumbnail">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div id="play" class="row justify-content-center m-auto">
      <div class="card w-100">
        <div class="container-fluid">
          <div class="card-body d-flex p-3">
            <!-- {{-- title & desc --}} -->
            <div class="left">
              <div class="card mx-3 d-none d-lg-block d-xl-block" style="max-width:250px;font-family:'Dosis',sans-serif">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="assets/img/music_girl.png" class="card-img img-thumbnail" alt="Responsive image">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body p-1 px-4">
                      <h5 class="card-title">Song title</h5>
                      <p class="card-text">Artist <small class="text-muted"></small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- {{-- now playing --}} -->
            <div class="center">
              <div class="play-navigate d-flex justify-content-center">
                <button class="shuffle">
                  <img src="assets/img/nowPlaying/shuffle.svg" style="width:calc(0.5vw + 15px)">
                </button>
                <button class="back">
                  <img src="assets/img/nowPlaying/back.svg" style="width:calc(0.5vw + 15px)">
                </button>
                <button style="padding:5px" class="playing" onclick="pauseSong()">
                  <img src="assets/img/nowPlaying/play-button.svg" style="width:calc(1.5vw + 15px)">
                </button>
                <button class="next">
                  <img src="assets/img/nowPlaying/next.svg" style="width:calc(0.5vw + 15px)">
                </button>
                <button class="return">
                  <img src="assets/img/nowPlaying/return.svg" style="width:calc(0.5vw + 15px)">
                </button>
              </div>
              <div class="play-progress d-flex mx-2">
                <span style="color:#adadad"><small class="text-muted">0.00</small></span>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span style="color:#adadad"><small class="text-muted">0.00</small></span>
              </div>
            </div>
            <!-- {{-- sound & mute --}} -->
            <div class="right">
              <button class="sound" style="height: 40px;margin: auto 1px;">
                <img src="assets/img/nowPlaying/speaker.svg" width="25px" height="25px">
              </button>
              <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- <script src="js/app.js"></script>
  <script src="js/script.js"></script> -->
</body>

</html>