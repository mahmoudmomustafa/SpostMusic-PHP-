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