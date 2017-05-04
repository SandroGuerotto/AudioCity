function startmusic(e) {


    // init global infos
    var src = e.target.attributes.getNamedItem("data-src").nodeValue;
    var data_new = src.split(';');

    // reset
    $('div.playlist-control').css('backgroundImage',"url(images/play.png)");

    if (data_new[0] != $("#music").attr("src")){
        $("#musicimage").attr("src", data_new[1] + "?" + new Date().getTime() ); // set cover
        $('#music').attr("src", data_new[0]);   // set source path
        $('#music').attr("current", data_new[3]); // set id
        $('#songname').text(data_new[2]); // set song name
    }

    var audiostream = $('#music').get(0);

    $('#controlMusic').show();

    if(audiostream.paused){
        audiostream.play();
        e.target.style.backgroundImage="url(images/pause.png)";
    }else{
        audiostream.pause();
        e.target.style.backgroundImage="url(images/play.png)";
    }

    var width = audiostream.currentTime / audiostream.duration;
    var id = setInterval(frame, 1);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width = (audiostream.currentTime / audiostream.duration) * 100;
            $('#musicbar').width( width + '%');
        }
    }
}

function playmusic(){
    var audiostream = $('#music').get(0);
    if(audiostream.paused){
        audiostream.play();
        $('#overlay-' + $('#music').attr("current")).css('backgroundImage',"url(images/pause.png)");
    }else{
        audiostream.pause();
        $('#overlay-' + $('#music').attr("current")).css('backgroundImage',"url(images/play.png)");
    }
}
function next(){
    console.log(test);
}
function close_player(){
    $('#controlMusic').hide();
    $('#music').attr("src",null);
}