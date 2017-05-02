<?php

/**
 * Created by PhpStorm.
 * User: Toshiki
 * Date: 21.03.2017
 * Time: 21:19
 */
include_once "model/Song.php";
class LibrarySongs
{
    private $toplist = array();

    /**
     * TopSongs constructor.
     */
    public function __construct()
    {

        $db_link = CustomSession::getInstance()->db_link->getDb_link();
        /* create a prepared statement */
        $stmt = $db_link->prepare("SELECT * FROM musicfull GROUP BY id LIMIT 4");

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist );

        /* fetch value */
        while ($stmt->fetch()){
            $song = new Song($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist);
            array_push($this->toplist, $song);
        }

        /* close connection */
        $db_link->close();
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


    /**
     * @return mixed
     */
    public function getToplist()
    {
        return $this->toplist;
    }

    public function getHtmlItem(){
        $htmlitem = '<p><audio id="music" src="test.mp3"></audio><div style="padding-left: 6em; padding-right: 6em"><div class="lineBorderImage"><div class="image-container"><img id="image" src="{piclink}" class="library-img" alt="{album} Cover"></img><div id="playdiv" class="after"  onclick="startmusic(event)"><div id="myBar"></div></div></div><div class="container" style="display: inline-block;"><h3>{titel} - {artist}</h3><p class="opacity">{album}</p><p><span>Länge: {duration}</span><span class="discover-date" style="margin-left: 1em;">Erscheinung: {release}</span></p></div></div></div></p>';
        return$htmlitem;
    }
	
	public function getmusicitem(){
		$musicitem = '<div id="controlMusic" class="bottom" style="background-color:white">
		<div class="bar" style="float: left;"><img src="music/Chantaje/cover.jpg" id="musicimage" class="music-container" style="margin: 5px"></img>
		<div style="margin-left: 6px; float: left; width:90%;"> <p>Name of the song</p><div id="musicdiv" class="musicprogress"><div id="musicbar"></div></div></div>
		</div>
		</div>';
		return$musicitem;
	}
}?>

<script>

function startmusic(e)
{
	var dv = document.getElementById('playdiv');
	var audio = document.getElementById('music');
	var elem = document.getElementById("myBar"); 	
	var element = document.getElementById("musicbar"); 
	
	 element.style.width = "20%";  
	 element.style.background = "red";
	 alert($('#musicimage'));
	 $('#musicimage').hide();
  var width = audio.currentTime / audio.duration;
  var id = setInterval(frame, 1000);
  music();
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width = (audio.currentTime / audio.duration) * 100;
      elem.style.width = width + '%';  
	  d = new Date();
	//$("#musicimage").attr("src", "play.png?"+d.getTime() );
	    
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