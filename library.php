

<!-- Music Section -->
<div class="container padding-128" style="margin-left: 6em; margin-right: 6em; " id="work">
  <h3 class="center">MY MUSIC</h3>
	 <?php include_once 'controller/LibrarySongs.php';
        $top = new LibrarySongs();
      foreach ($top->getToplist() as $item) {
	  echo'<p>';
		$musicitem = $top->getmusicitem();
        $htmlitem = $top->getHtmlItem();
        $htmlitem = str_replace("{id}", $item->getId(), $htmlitem);
        $htmlitem = str_replace("{album}", $item->getAlbum() == null ? "&nbsp;" : $item->getAlbum(), $htmlitem);
        $htmlitem = str_replace("{piclink}", $item->getPiclink(), $htmlitem);
        $htmlitem = str_replace("{titel}", $item->getName(), $htmlitem);
        $htmlitem = str_replace("{artist}", $item->getArtist(), $htmlitem);
        $htmlitem = str_replace("{duration}", $item->getLengthFormatted(), $htmlitem);
        $htmlitem = str_replace("{release}", $item->getDate(), $htmlitem);
        echo $htmlitem;
		echo $musicitem;
     echo'</p>';
      } ?>
</div>

