	
var musiclist = new Array();
var imagelist = new Array();
var musicidlist = new Array();
var musicnamelist = new Array();

function startmusic(e) {
	var audiostream = $('#music').get(0);
	var time = $('tracktime');
	musiclist = [];
	imagelist = [];
	musicidlist = [];
	musicnamelist = [];
	time.css("margin-top",(time.parent()
            .height() - time.parent().height())/2 - 20 + 'px' )
    // init global infos
    var src = e.target.attributes.getNamedItem("data-src").nodeValue;
    var data_new = src.split(';');
	for (i = 0; i < $("div.playlist-control").length; i++) { 
	var mssrc = $("div.playlist-control")[i].getAttribute( "data-src" ).split(';');
        musiclist.push(mssrc[0]);
		imagelist.push(mssrc[1]);
		musicidlist.push(mssrc[3]);
		musicnamelist.push(mssrc[2]);
		
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
        $("#controlMusic").find(".fa-play-circle").addClass("fa-pause-circle").removeClass("fa-play-circle");
    }else{
        audiostream.pause();
        e.target.style.backgroundImage="url(images/play.png)";
        $("#controlMusic").find(".fa-pause-circle").addClass("fa-play-circle").removeClass("fa-pause-circle");
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
		
	arrowfadein();
	
}

function gotoTime(e){
	var audiostream = $('#music').get(0);
	var musicbar = $('#musicbar');
	audiostream.currentTime = audiostream.currentTime * (e.offsetX / musicbar.get(0).clientWidth);
}

function playmusic(){
	$('div.playlist-control').css('backgroundImage',"url(images/play.png)");
    var audiostream = $('#music').get(0);
    if(audiostream.paused){
        audiostream.play();
        $('#overlay-' + $('#music').attr("current")).css('backgroundImage',"url(images/pause.png)");
        $("#controlMusic").find(".fa-play-circle").addClass("fa-pause-circle").removeClass("fa-play-circle");
    }else{
        audiostream.pause();
        $('#overlay-' + $('#music').attr("current")).css('backgroundImage',"url(images/play.png)");
        $("#controlMusic").find(".fa-pause-circle").addClass("fa-play-circle").removeClass("fa-pause-circle");
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
	$('#music').get(0).currentTime = $('#music').get(0).currentTime - 5;
}

function secondsforward(){
	$('#music').get(0).currentTime = $('#music').get(0).currentTime + 5;
}

function pausemusic(){
$('#music').get(0).pause();
$('div.playlist-control').css('backgroundImage',"url(images/play.png)");
}
  
function next(){
try{
$('div.playlist-control').css('backgroundImage',"url(images/play.png)");
}catch(err){

}
    $('div.playlist-control').css('backgroundImage',"url(images/play.png)");
    $('#music').get(0).pause();
    var musicindex = musiclist.indexOf($('#music').get(0).getAttribute('src').replace("/audiocity/", ""));
	console.log("grösse von array: " + musiclist.length);
	console.log( musiclist);
	console.log("index" + musicindex);
    if(musicindex == musiclist.length - 1){
		var imagepath = window.location.pathname == '/audiocity'? '/audiocity/' + imagelist[0]:  imagelist[0];
		var musicpath = window.location.pathname == '/audiocity'? '/audiocity/' + musiclist[0]:  musiclist[0];
		$("#songname").text(musicnamelist[0]);
		$("#overlay-" + musicidlist[0]).css('backgroundImage',"url(images/pause.png)");
		$("#musicimage").attr("src", imagepath + "?" + new Date().getTime());
        $('#music').get(0).setAttribute("src", musicpath);
        $('#music').get(0).play();
        // $("#controlMusic").find(".fa-pause-circle-o").addClass("fa-play-circle-o").removeClass("fa-pause-circle-o");
    }else{
		var imagepath = window.location.pathname == '/audiocity'? '/audiocity/' + imagelist[musicindex + 1]:  imagelist[musicindex + 1];
		var musicpath = window.location.pathname == '/audiocity'? '/audiocity/' + musiclist[musicindex + 1]:  musiclist[musicindex + 1];
		$("#songname").text(musicnamelist[musicindex + 1]);
		$("#overlay-" + musicidlist[musicindex + 1]).css('backgroundImage',"url(images/pause.png)");
        $('#music').get(0).setAttribute("src", musicpath);
        $("#musicimage").attr("src", imagepath + "?" + new Date().getTime() );
        $('#music').get(0).play();
        $("#controlMusic").find(".fa-play-circle").addClass("fa-pause-circle").removeClass("fa-play-circle");
    }
}

function previous(){
    pausemusic();
    $('#overlay-' + $('#music').attr("current")).css('backgroundImage',"url(images/pause.png)");
    var musicindex = musiclist.indexOf($('#music').get(0).getAttribute('src').replace('/audiocity/', ''));
    console.log(musicindex);
    if(musicindex == 0){
		var imagepath = window.location.pathname == '/audiocity'? '/audiocity/' + imagelist[musiclist.length - 1]:  imagelist[musiclist.length - 1];
		var musicpath = window.location.pathname == '/audiocity'? '/audiocity/' + musiclist[musiclist.length - 1]:  musiclist[musiclist.length - 1];
		$("#songname").text(musicnamelist[musiclist.length - 1]);
		$("#overlay-" + musicidlist[musiclist.length - 1]).css('backgroundImage',"url(images/pause.png)");
        $("#musicimage").attr("src", imagepath + "?" + new Date().getTime() );
        $('#music').get(0).setAttribute("src", musicpath);
        $('#music').get(0).play();
        // $("#playicon").removeClass("fa fa-play-circle-o");
        // $("#playicon").addClass("fa fa-stop-circle-o");
    }else{
		var imagepath = window.location.pathname == '/audiocity'? '/audiocity/' + imagelist[musicindex - 1]:  imagelist[musicindex - 1];
		var musicpath = window.location.pathname == '/audiocity'? '/audiocity/' + musiclist[musicindex - 1]:  musiclist[musicindex - 1];
		$("#songname").text(musicnamelist[musicindex - 1]);
		$("#overlay-" + musicidlist[musicindex - 1]).css('backgroundImage',"url(images/pause.png)");
        $('#music').get(0).setAttribute("src", musicpath);
        $("#musicimage").attr("src", imagepath + "?" + new Date().getTime() );
        $('#music').get(0).play();
        $("#controlMusic").find(".fa-play-circle").addClass("fa-pause-circle").removeClass("fa-play-circle");
    }

}


function close_player(){
	pausemusic();
    $('#controlMusic').hide();
    $('#music').attr("src",null);
	$("#hidearrow").css("display","none");
}
function addToLib(musicid) {
    $.ajax({
        type: 'POST',
        url: 'input/AddToLibInput.php',
        data:  "id="+musicid ,
        cache: false,
        processData: false,
        dataType: "json",
        success: function (data) {
            console.log(data);
                $('#'+musicid).find(".add-to-list").attr("onclick", "delFromLib("+musicid+")");
                $('#'+musicid).find(".fa-plus-square").toggleClass('fa-plus-square fa-trash');
                $('#'+musicid).find(".fa-plus-square-o").toggleClass('fa-plus-square-o fa-trash-o');
            musiclist.push(data[0]);
            imagelist.push(data[1]);
            musicidlist.push(data[3]);
            musicnamelist.push(data[2]);
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

function arrowfadein() {
if ( $('#controllBar').is(':visible')) {
			$("#hidearrow").css("bottom",$("#controllBar").height() + 2 +"px");
			$("#hidearrow").fadeIn(800, function() { $(this).show(); })
		}
	
	
}

function showorhide(){
   if($('#controllBar').is(':visible')){
    $('#controllBar').slideUp(800, function() { $(this).hide();
   $("#hidearrow").css("bottom", "5px"); 
   $("#controlarrow").find(".fa-arrow-down").toggleClass('fa-arrow-down fa-arrow-up');})
   }else{
    $("#controlarrow").find(".fa-arrow-up").addClass("fa-arrow-down").removeClass("fa-arrow-up");
    $('#controllBar').slideDown(800, function() { $(this).show();
   $("#hidearrow").css("bottom",  $('#controlMusic').height() + "px"); 
  })
   }
  
}


function removeFromList(musicid) {
    console.log(musicid);
    var mssrc = $('#overlay-'+musicid).attr( "data-src" ).split(';');
    musiclist.splice(musiclist.indexOf(mssrc[0]) ,1);
    imagelist.splice(imagelist.indexOf(mssrc[1]), 1);
    musicidlist.splice(musicidlist.indexOf(mssrc[3]), 1);
    musicnamelist.splice(musicnamelist.indexOf(mssrc[2]) ,1);
    $('#main-container-'+musicid).fadeOut(800, function() { $(this).remove(); })
}
