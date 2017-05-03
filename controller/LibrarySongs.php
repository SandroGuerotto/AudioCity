<?php

include_once "../model/Song.php";
include_once "../model/CustomSession.php";
include_once "../model/User.php";

class LibrarySongs{

    private $list = array();
    /**
     * My Library constructor.
     */
    public function __construct() {
        $db_link = CustomSession::getInstance()->db_link->getDb_link();
        /* create a prepared statement */
        $stmt = $db_link->prepare("SELECT * FROM userlib WHERE userid = ?");

        $param =  CustomSession::getInstance()->getCurrentUser()->getId();
        $stmt->bind_param("i", $param);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist, $libid, $inserdate, $userid );

        /* fetch value */
        while ($stmt->fetch()){
            $song = new Song($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist);
            array_push($this->list, $song);
        }

        /* close connection */
        $db_link->close();
    }

    /**
     * @return array
     */
    public function getToplist() : array {
        return $this->list;
    }
	
	public function playSound()
	{
		/*var embed = document.getElementById("embed");
              if (!embed) {
                  var embed = document.createElement("embed");
                      embed.id= "embed";
                      embed.setAttribute("src", soundfile);
                      embed.setAttribute("hidden", "true");
                  el.appendChild(embed);
              } else {
                  embed.parentNode.removeChild(embed);
              }*/
	}
    public function getHtmlItem(){
        $htmlitem = '<p><div style="padding-left: 6em; padding-right: 6em"><div class="lineBorderImage"><div class="image-container"><audio id="music" src="test.mp3"></audio><img id="image" src="{piclink}" class="library-img" alt="{album} Cover"></img><div id="playdiv" class="after"  onclick="startmusic(event)"><div id="myBar"></div></div></div><div class="container" style="display: inline-block;"><h3 id="texttitle">{titel} - {artist}</h3><p class="opacity">{album}</p><p><span>Länge: {duration}</span><span class="discover-date" style="margin-left: 1em;">Erscheinung: {release}</span></p></div></div></div></p>';
        return$htmlitem;
    }

}?>

<script>
$('.image-container').on('click', function () {
  var imageaudio = $(this).parent().find('img').get(0);

	d = new Date();  // if you restructure your HTML this has to change
  $("#musicimage").attr("src", imageaudio.src + "?"+d.getTime() );

});


function startmusic(e)
{
	var dv = document.getElementById('playdiv');
	var audio = document.getElementById('music');
	var elem = document.getElementById("myBar"); 	
	var element = document.getElementById("musicbar"); 
	
	 
  var width = audio.currentTime / audio.duration;
  var id = setInterval(frame, 1);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width = (audio.currentTime / audio.duration) * 100;
      elem.style.width = width + '%';  
	 element.style.width = width + '%';  
	   
    }
  }
	 if(audio.paused){
        audio.play();
		e.target.style.backgroundImage="url(images/pause.png)";
		
    }else{
		audio.pause();
		e.target.style.backgroundImage="url(images/play.png)";
	}
	
}

function music(){
	var element = document.getElementById("musicbar"); 
	var image = document.getElementById("musicimage");
	image.src = document.getElementById("image").src;
	 element.style.width = "20%";  
	  element.style.background = "red";

}

</script>