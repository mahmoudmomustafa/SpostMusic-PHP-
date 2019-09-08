$(document).ready(function () {
    // setting page JS
    $('#setting-page .card .card-body .setting-side .nav-item').click(function () {
        $('#setting-page .card .card-body .setting-side .nav-item').removeClass('active');
        $(this).addClass('active');
    });
    //now playing functions
    //play & pause
    $('#play .card .card-body .center .play-navigate .playing').on('click', function () {
        if ($('#play .card .card-body .center .play-navigate .playing img').attr('src') == 'assets/img/nowPlaying/play-button.svg') {
            $('#play .card .card-body .center .play-navigate .playing img').attr('src', 'assets/img/nowPlaying/pause.svg');
            $(this).attr('onclick', 'pauseSong()');
        } else {
            $('#play .card .card-body .center .play-navigate .playing img').attr('src', 'assets/img/nowPlaying/play-button.svg');
            $(this).attr('onclick', 'playSong()');
        }
    });
    //mute & unmute
    $('#play .card .card-body .right .sound').on('click', function () {
        if ($('#play .card .card-body .right .sound img').attr('src') == 'assets/img/nowPlaying/speaker.svg') {
            // change icon
            $('#play .card .card-body .right .sound img').attr('src', 'assets/img/nowPlaying/mute.svg');
            //change bar
            $('#play .card .card-body .right .progress .progress-bar').css('width', '0');
        } else {
            $('#play .card .card-body .right .sound img').attr('src', 'assets/img/nowPlaying/speaker.svg');
            $('#play .card .card-body .right .progress .progress-bar').css('width', '100%');
        }
    });
});

var currentPlaying = [];
var audioElement;

function Audio() {
    this.currentPlaying;
    this.audio = document.createElement('audio');
    this.setTrack = function (src) {
        this.audio.src = src;
    };
    // play function
    this.play = function () {
        this.audio.play();
    };
    // pause function
    this.pause = function () {
        this.audio.pause();
    }
}