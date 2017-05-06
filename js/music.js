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
function addToLib(musicid) {
    $.ajax({
        type: 'POST',
        url: 'input/AddToLibInput.php',
        data:  "id="+musicid ,
        cache: false,
        processData: false,
        success: function (data) {
            if (data){
                $('#'+musicid).find(".add-to-list").attr("onclick", "delFromLib("+musicid+")");
                $('#'+musicid).find(".fa-plus-square").toggleClass('fa-plus-square fa-trash');
                $('#'+musicid).find(".fa-plus-square-o").toggleClass('fa-plus-square-o fa-trash-o');
            }
        },
        error: function (request, status, error) {

        }
    });
}

function delFromLib(musicid) {
    $.ajax({
        type: 'POST',
        url: 'input/DelFromLibInput.php',
        data:  "id="+musicid ,
        cache: false,
        processData: false,
        success: function (data) {
            if (data){
                $('#'+musicid).find(".add-to-list").attr("onclick", "addToLib("+musicid+")");
                $('#'+musicid).find(".fa-trash").toggleClass('fa-trash fa-plus-square');
                $('#'+musicid).find(".fa-trash-o").toggleClass('fa-trash-o fa-plus-square-o');
            }
        },
        error: function (request, status, error) {

        }
    });
}