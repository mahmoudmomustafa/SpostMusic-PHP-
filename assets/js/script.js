$(document).ready(function () {
    // setting page JS
    $('#setting-page .card .card-body .setting-side .nav-item').click(function () {
        $('#setting-page .card .card-body .setting-side .nav-item').removeClass('active');
        $(this).addClass('active');
    });
    // index
    $('.album').on('mouseover', function () {
        $(this).find(".card-body").removeClass('d-none');
    });
    $('.album').on('mouseleave', function () {
        $(this).find(".card-body").addClass('d-none');
    });
    //now playing functions
    if ($('#play .card .card-body .center .play-navigate .playing img').attr('src') == 'assets/img/nowPlaying/play-button.svg') {
        $('#play .card .card-body .center .play-navigate .playing img').attr('src', 'assets/img/nowPlaying/pause.svg');
        $(this).attr('onclick', 'pauseSong()');
    } else {
        $('#play .card .card-body .center .play-navigate .playing img').attr('src', 'assets/img/nowPlaying/play-button.svg');
        $(this).attr('onclick', 'playSong()');
    }
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
function formatTime(seconds){
    var time = Math.round(seconds);
    var min = Math.floor(time / 60);
    var seconds = time - (min * 60);
    var extraXero = (seconds < 10) ? '0' : '';
    return `${min} : ${extraXero} ${seconds}`;
}
function Audio() {
    this.currentPlaying;
    this.audio = document.createElement('audio');
    this.audio.addEventListener('canplay',function(){
        $('.song-remaining').text(formatTime(this.duration));
    })
    this.setTrack = function (track) {
        this.currentlyPlaying = track;
        this.audio.src = track.path;
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