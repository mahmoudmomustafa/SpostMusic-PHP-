<?php
$songQuery = mysqli_query($con, 'SELECT id FROM songs ORDER BY RAND() LIMIT 10');
$resultArray = array();
while ($row = mysqli_fetch_array($songQuery)) {
  array_push($resultArray, $row['id']);
}
$jsonArray = json_encode($resultArray);
?>

<script>
  $(function() {
    currentPlaylist = <?php echo $jsonArray ?>;
    audioElement = new Audio();
    setTrack(currentPlaylist[0], currentPlaylist, false);
  });

  // function prevSong() {
  //   if (audioElement.audio.currentTime =3 || currentIndex = 0) {
  //     audioElement.audio.currentTime = 0;
  //   } else {
  //     currentIndex--
  //   }

  //   var trackToPlay = currentPlaylist[currentIndex];
  //   setTrack(trackToPlay, currentPlaylist, true)
  // }

  function nextSong() {
    console.log(currentIndex);
    if (repeat == true) {
      audioElement.audio.currentTime = 0;
      playSong();
      return;
    }

    if (currentIndex == currentPlaylist.length - 1) {
      currentIndex = 0
    } else {
      currentIndex++;
    }

    var trackToPlay = currentPlaylist[currentIndex];
    setTrack(trackToPlay, currentPlaylist, true);
    console.log(currentIndex);
  }

  function repeatSong() {
    repeat = !repeat;
    repeat ? $('.return').addClass('repeat') : $('.return').removeClass('repeat');
  }

  function setTrack(trackId, newPlaylist, play) {
    currentIndex = currentPlaylist.indexOf(trackId);
    pauseSong();
    // get song ajax
    $.post('includes/handler/ajax/getSong.php', {
      songId: trackId
    }, function(data) {

      var track = JSON.parse(data);
      $('.song-title').text(track.title);
      // get artist
      $.post('includes/handler/ajax/getArtist.php', {
        artistId: track.artist
      }, function(data) {
        var track = JSON.parse(data);
        $('.song-artist small').text(track.name);
      });
      // get album
      $.post('includes/handler/ajax/getAlbum.php', {
        albumId: track.album
      }, function(data) {
        var track = JSON.parse(data);
        $('.song-album').attr('src', track.artPath);
      });
      audioElement.setTrack(track);
      playSong();
      if (play) {
        audioElement.play();
      }
    });
  }

  function playSong() {
    if (audioElement.audio.currentTime == 0) {
      $.post('includes/handler/ajax/updatePlays.php', {
        songId: audioElement.currentlyPlaying.id
      });
    }
    audioElement.play();
  }

  function pauseSong() {
    audioElement.pause();
  }
</script>

<div id="play" class="row justify-content-center m-auto">
  <div class="card w-100">
    <div class="container-fluid">
      <div class="card-body d-flex p-1">
        <!-- {{-- title & desc --}} -->
        <div class="left mt-1">
          <div class="card mx-3 d-none d-lg-block d-xl-block info-card shadow" style="max-width:225px;font-family:'Dosis',sans-serif">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="" class="img-thumbnail song-album" alt="Responsive image" width="80%">
              </div>
              <div class="col-md-8">
                <div class="card-body p-1 pl-3 mt-1">
                  <h6 class="card-title song-title m-0"></h6>
                  <p class="card-text song-artist"><small class="text-muted"></small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- {{-- now playing --}} -->
        <div class="center d-flex">
          <div class="play-navigate d-flex m-3 align-items-center">
            <!-- <button class="shuffle" data-toggle="tooltip" data-placement="left" title="Shuffle">
              <img src="assets/img/nowPlaying/shuffle.svg" style="width:calc(0.5vw + 8px)">
            </button> -->
            <button class="back" data-toggle="tooltip" data-placement="left" title="Back" onclick="prevSong()">
              <img src="assets/img/nowPlaying/back.svg" style="width:calc(0.5vw + 8px)">
            </button>
            <button class="playing p-1" onclick="pauseSong()" data-toggle="tooltip" data-placement="left" title="Play/Pause">
              <img src="assets/img/nowPlaying/play-button.svg" style="width:calc(1.5vw + 8px)">
            </button>
            <button class="next" data-toggle="tooltip" data-placement="left" title="Next" onclick="nextSong()">
              <img src="assets/img/nowPlaying/next.svg" style="width:calc(0.5vw + 8px)">
            </button>
            <!-- <button class="return" data-toggle="tooltip" data-placement="left" title="Repeat" onclick="repeatSong()">
              <img src="assets/img/nowPlaying/return.svg" style="width:calc(0.5vw + 8px)">
            </button> -->
          </div>
          <div class="play-progress d-flex m-3 align-items-center w-100">
            <span class="text-muted song-progress" style="width:6%;font-size:10px;">0 : 0 0</span>
            <div class="progress">
              <div class="song-prog progress-bar progress-bar-striped bg-danger rounded" role="progressbar" style="width:0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <span class="text-muted song-remaining" style="width:6%;font-size:10px;"></span>
          </div>
        </div>
        <!-- {{-- sound & mute --}} -->
        <div class="right align-items-center">
          <button class="sound p-2" data-toggle="tooltip" data-placement="left" title="Sound">
            <img src="assets/img/nowPlaying/speaker.svg" width="20px" height="20px">
          </button>
          <!-- <div class="progress">
            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>