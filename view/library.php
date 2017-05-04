<!-- Music Section -->
<div class="container padding-128 white" style="margin-left: 6em; margin-right: 6em; " id="work">	
  <h3 class="center">MY MUSIC</h3>
	 <?php include_once '../controller/LibrarySongs.php';
        $top = new LibrarySongs();
      foreach ($top->getToplist() as $item) {
	  echo'<p>';
        $htmlitem = $top->getHtmlItem();
        $htmlitem = str_replace("{id}", $item->getId(), $htmlitem);
        $htmlitem = str_replace("{album}", $item->getAlbum() == null ? "&nbsp;" : $item->getAlbum(), $htmlitem);
        $htmlitem = str_replace("{piclink}", $item->getPiclink(), $htmlitem);
        $htmlitem = str_replace("{titel}", $item->getName(), $htmlitem);
        $htmlitem = str_replace("{artist}", $item->getArtist(), $htmlitem);
        $htmlitem = str_replace("{duration}", $item->getLengthFormatted(), $htmlitem);
        $htmlitem = str_replace("{release}", $item->getDate(), $htmlitem);
        echo $htmlitem;
		
     echo'</p>';
      } ?>
</div>
<div id="controlMusic" class="bottom" style="background-color:white;">
	<div class="bar" style="float: left;"><img src="music/Chantaje/cover.jpg" id="musicimage" class="music-container" style="margin: 5px"></img>
		<div style="margin-left: 6px; float: left; width:60%;  margin-right: 20px"> <p id="songname">Name of the song</p>
		<div id="musicdiv" class="musicprogress"><div id="musicbar"></div></div></div>
		<div style="margin-top:35px" class="center">
		<i class="fa fa-step-backward" style="font-size: 40px;"></i> 
		<i class="fa fa-backward" style="font-size: 40px;"></i> 
		<i class="fa fa-play-circle-o" style="font-size: 50px;"></i> 
		<i class="fa fa-forward" style="font-size: 40px;"></i> 
		<i class="fa fa-step-forward" style="font-size: 40px;"></i> 
		</div>
	</div>
</div>
