$(document).ready(function () {
    $("body").niceScroll({
        cursorcolor:"#515151",
        cursorborder:'0',
        cursorwidth:'4px'
    });
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
            audioElement.audio.muted = true;
            $('#play .card .card-body .right .sound img').attr('src', 'assets/img/nowPlaying/mute.svg');
        } else {
            audioElement.audio.muted = false;
            $('#play .card .card-body .right .sound img').attr('src', 'assets/img/nowPlaying/speaker.svg');
        }
    });
});

var currentPlaying = [];
var tempPlaylist = [];
var audioElement;
var currentIndex = 0;
var repeat = false;
// var shuffle = false;

function formatTime(seconds) {
    var time = Math.round(seconds);
    var min = Math.floor(time / 60);
    var seconds = time - (min * 60);
    var extraXero = (seconds < 10) ? '0' : '';
    return `${min} : ${extraXero} ${seconds}`;
}

function updateTimeProgressBar(audio) {
    $('.song-progress').text(formatTime(audio.currentTime));
    $('.song-remaining').text(formatTime(audio.duration - audio.currentTime));

    var progress = audio.currentTime / audio.duration * 100;
    $('.song-prog').css('width', progress + '%');
}

function Audio() {
    this.currentPlaying;
    this.audio = document.createElement('audio');
    this.audio.addEventListener('canplay', function () {
        $('.song-remaining').text(formatTime(this.duration));
    });
    this.audio.addEventListener('ended',function() {
        nextSong();
    })
    this.audio.addEventListener('timeupdate', function () {
        if (this.duration) {
            updateTimeProgressBar(this);
        }
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