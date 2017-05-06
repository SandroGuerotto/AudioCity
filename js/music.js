	
var musiclist = new Array();
var data_new_img;	


function startmusic(e) {
 var audiostream = $('#music').get(0);
	var time = $('tracktime');

	musiclist = [];
	time.css("margin-top",(time.parent()
            .height() - time.parent().height())/2 - 20 + 'px' )
    // init global infos
    var src = e.target.attributes.getNamedItem("data-src").nodeValue;
    var data_new = src.split(';');
	for (i = 0; i < $("div.playlist-control").length; i++) { 
	var mssrc = $("div.playlist-control")[i].getAttribute( "data-src" ).split(';');
    musiclist.push(mssrc[0]);
	}
	

    // reset
    $('div.playlist-control').css('backgroundImage',"url(images/play.png)");

    if (data_new[0] != $("#music").attr("src")){
        $("#musicimage").attr("src", data_new[1] + "?" + new Date().getTime() ); // set cover
        $('#music').attr("src", data_new[0]);   // set source path
        $('#music').attr("current", data_new[3]); // set id
        $('#songname').text(data_new[2]); // set song name
    }

   

    $('#controlMusic').show();

    if(audiostream.paused){
        audiostream.play();
        e.target.style.backgroundImage="url(images/pause.png)";
		$("#playicon").removeClass("fa fa-play-circle-o");
		$("#playicon").addClass("fa fa-stop-circle-o");
    }else{
        audiostream.pause();
        e.target.style.backgroundImage="url(images/play.png)";
		$("#playicon").removeClass("fa fa-stop-circle-o");
		$("#playicon").addClass("fa fa-play-circle-o");
    }

    var width = audiostream.currentTime / audiostream.duration;
    var id = setInterval(frame, 1);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width = (audiostream.currentTime / audiostream.duration) * 100;
            $('#musicbar').width( width + '%');
			document.getElementById('tracktime').innerHTML = formatTime(audiostream.currentTime) + " / " + formatTime(audiostream.duration);
        }
    }
}

function gotoTime(e){
	var audiostream = $('#music').get(0);
	var musicbar = $('#musicbar');
	console.log(audiostream.duration);
	console.log(audiostream.currentTime * (e.offsetX / musicbar.get(0).clientWidth));
	audiostream.currentTime = audiostream.currentTime * (e.offsetX / musicbar.get(0).clientWidth);
}

function playmusic(){
    var audiostream = $('#music').get(0);
    if(audiostream.paused){
        audiostream.play();
        $('#overlay-' + $('#music').attr("current")).css('backgroundImage',"url(images/pause.png)");
		$("#playicon").removeClass("fa fa-play-circle-o");
		$("#playicon").addClass("fa fa-stop-circle-o");
    }else{
        audiostream.pause();
        $('#overlay-' + $('#music').attr("current")).css('backgroundImage',"url(images/play.png)");
		$("#playicon").removeClass("fa fa-stop-circle-o");
		$("#playicon").addClass("fa fa-play-circle-o");
    }
}
function formatTime(seconds) {
    minutes = Math.floor(seconds / 60);
    minutes = (minutes >= 10) ? minutes : "0" + minutes;
    seconds = Math.floor(seconds % 60);
    seconds = (seconds >= 10) ? seconds : "0" + seconds;
    return minutes + ":" + seconds;
  }
function secondsback(){
	$('#music').get(0).currentTime = $('#music').get(0).currentTime - 10;
}

function secondsforward(){
	$('#music').get(0).currentTime = $('#music').get(0).currentTime + 10;
}
  
function next(){
   $('div.playlist-control').css('backgroundImage',"url(images/play.png)");
   $('#overlay-' + $('#music').attr("current")).css('backgroundImage',"url(images/pause.png)");
   $('#music').get(0).pause();
   var musicindex = musiclist.indexOf($('#music').get(0).getAttribute('src'));
   console.log(musicindex);
   console.log(musiclist.length);
  if(musicindex == musiclist.length - 1){
  var musicimage = $("div.playlist-control")[0].getAttribute( "data-src" ).split(';');
   $("#musicimage").attr("src", musicimage[1] + "?" + new Date().getTime() );
  $('#music').get(0).setAttribute("src", musiclist[0]);
  $('#music').get(0).play();
  $("#playicon").removeClass("fa fa-play-circle-o");
  $("#playicon").addClass("fa fa-stop-circle-o");
  }else{
  var musicimage = $("div.playlist-control")[musicindex + 1].getAttribute( "data-src" ).split(';');
  console.log(musicimage);
  $('#music').get(0).setAttribute("src", musiclist[musicindex + 1]);
  $("#musicimage").attr("src", musicimage[1] + "?" + new Date().getTime() );
  $('#music').get(0).play();
  $("#playicon").removeClass("fa fa-play-circle-o");
  $("#playicon").addClass("fa fa-stop-circle-o");
  }
}

function previous(){
$('div.playlist-control').css('backgroundImage',"url(images/play.png)");
   $('#overlay-' + $('#music').attr("current")).css('backgroundImage',"url(images/pause.png)");
   $('#music').get(0).pause();
   var musicindex = musiclist.indexOf($('#music').get(0).getAttribute('src'));
  if(musicindex == 0){
  var musicimage = $("div.playlist-control")[musiclist.length - 1].getAttribute( "data-src" ).split(';');
   $("#musicimage").attr("src", musicimage[1] + "?" + new Date().getTime() );
  $('#music').get(0).setAttribute("src", musiclist[musiclist.length - 1]);
  $('#music').get(0).play();
  $("#playicon").removeClass("fa fa-play-circle-o");
  $("#playicon").addClass("fa fa-stop-circle-o");
  }else{
  var musicimage = $("div.playlist-control")[musicindex - 1].getAttribute( "data-src" ).split(';');
  $('#music').get(0).setAttribute("src", musiclist[musicindex - 1]);
  $("#musicimage").attr("src", musicimage[1] + "?" + new Date().getTime() );
  $('#music').get(0).play();
  $("#playicon").removeClass("fa fa-play-circle-o");
  $("#playicon").addClass("fa fa-stop-circle-o");
  }

}


function close_player(){
    $('#controlMusic').hide();
    $('#music').attr("src",null);
}