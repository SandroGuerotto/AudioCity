<!DOCTYPE html>
<html>
<head>
	<title>AudioCity</title>
	
	<!-- Meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Icon -->
	<link rel="icon" type="image/png"href="images/logo_icon.png">

	<!-- CSS -->
	<link rel="stylesheet" href="css/querries.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/scroll.js"></script>
	
</head>
<body>
<?php
require_once("model/CustomSession.php");
$session = CustomSession::getInstance();
/** @var User $currentUser */
$currentUser = $session->getCurrentUser();
?>
<!-- Navbar (sit on top) -->
<div class="top">
  <div class="bar card-2" id="myNavbar">
    <a href="#work" class="bar-item button wide">AudioCity</a>
    <!-- Right-sided navbar links -->
    <div class="right hide-small">
      <a href="#about" class="bar-item button">ABOUT</a>
      <a href="#home" class="bar-item button"><i class="fa fa-search"></i> DISCOVER</a>
      <a href="#work" class="bar-item button"><i class="fa fa-th"></i> MUSIC</a>
      <!--<a href="#pricing" class="bar-item button"><i class="fa fa-usd"></i> PRICING</a>-->
      <a href="#contact" class="bar-item button"><i class="fa fa-sign-in"></i> LOGIN</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="bar-item button right hide-large hide-medium" onclick="w3_open()">
      <i class="fa fa-bars padding-right padding-left"></i>
    </a>
  </div>
</div>

<!-- Sidenav on small screens when clicking the menu icon -->
<nav class="sidenav black card-2 animate-left hide-medium hide-large" style="display:none" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()" class="large padding-16">Close &times;</a>
  <a href="#about" onclick="w3_close()">ABOUT</a>
  <a href="#team" onclick="w3_close()">TEAM</a>
  <a href="#work" onclick="w3_close()">WORK</a>
  <a href="#pricing" onclick="w3_close()">PRICING</a>
  <a href="#contact" onclick="w3_close()">CONTACT</a>
</nav>






<!-- Music Section -->
<div class="container padding-128" id="work">
  <h3 class="center">MY MUSIC</h3>
	 <?php include_once 'controller/LibrarySongs.php';
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








<div id="modal01" class="modal black" onclick="this.style.display='none'">
  <span class="closebtn text-white opacity hover-opacity-off xxlarge container display-topright" title="Close Modal Image">&times;</span>
  <div class="modal-content animate-zoom center transparent padding-64">
    <img id="img01" class="image">
    <p id="caption" class="opacity large"></p>
  </div>
</div>

<!-- Footer -->
<footer class="center black padding-64">
  <a href="#home" class="button"><i class="fa fa-arrow-up margin-right"></i>To the top</a>
  <div class="xlarge section">
    <i class="fa fa-facebook-official hover-text-indigo"></i>
    <i class="fa fa-flickr hover-text-red"></i>
    <i class="fa fa-instagram hover-text-purple"></i>
    <i class="fa fa-twitter hover-text-light-blue"></i>
    <i class="fa fa-linkedin hover-text-indigo"></i>
  </div>
</footer>
 
<!-- Add Google Maps -->
<script> 

function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidenav when clicking the menu icon
var mySidenav = document.getElementById("mySidenav");

function w3_open() {
    if (mySidenav.style.display === 'block') {
        mySidenav.style.display = 'none';
    } else {
        mySidenav.style.display = 'block';
    }
}

// Close the sidenav with the close button
function w3_close() {
    mySidenav.style.display = "none";
}
</script>

<!--
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>