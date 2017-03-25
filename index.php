<!DOCTYPE html>
<?php
require_once("model/CustomSession.php");
$session = CustomSession::getInstance();
/** @var User $currentUser */
$currentUser = $session->getCurrentUser();
?>
<html>
<?php include_once "header/header.php"; ?>
<body>

<!-- Navbar (sit on top) -->
<div class="top">
  <div class="bar card-2 " id="myNavbar">
    <a href="#home" class="bar-item button wide"><img src="images/logo_icon.png" class="logo"/>AudioCity</a>
    <!-- Right-sided navbar links -->
    <div class="right hide-small">
      <a href="#about" class="bar-item button">ABOUT</a>
      <a href="#discover" class="bar-item button"><i class="fa fa-search"></i>DISCOVER</a>
      <a href="#music" class="bar-item button"><i class="fa fa-th"></i>MUSIC</a>
      <!--<a href="#pricing" class="bar-item button"><i class="fa fa-usd"></i> PRICING</a>-->
<!--      <a href="#login" class="bar-item button"><i class="fa fa-sign-in"></i> LOGIN</a>-->
      <a href="#login" class="bar-item button"><i <?= $currentUser != null ? " class=\"fa fa-sign-out\"" : " class=\"fa fa-sign-in\"" ?> ></i> <?= $currentUser != null ? "LOGOUT" : "LOGIN" ?></a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="bar-item button right hide-large hide-medium" onclick="menu_open()"/>
      <i class="fa fa-bars padding-right padding-left"></i>
    </a>
  </div>
</div>

<!-- Sidenav on small screens when clicking the menu icon -->
<nav class="sidenav black card-2 animate-left hide-medium hide-large" style="display:none" id="mySidenav">
    <a href="javascript:void(0)" onclick="menu_close()" class="large padding-16"><i class="fa fa-times"></i> Close </a>
    <a href="#about" onclick="menu_close()">ABOUT</a>
    <a href="#discover" onclick="menu_close()">DISCOVER</a>
    <a href="#music" onclick="menu_close()">MUSIC</a>
    <a href="#login" onclick="menu_close()"><?= $currentUser != null ? "LOGOUT" : "LOGIN" ?></a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 display-container grayscale-min" id="home">
  <div class="display-left padding-xxlarge text-white fadein ">
    <span class="jumbo hide-small">Discover Music in a new way</span><br>
    <span class="xxlarge hide-large hide-medium">AudioCity</span><br>
  </div> 
  <div class="display-bottomleft padding-xxlarge text-white large">
    <a href="#" class="hover-text-white"><i class="fa fa-facebook-official hover-text-indigo"></i></a>
    <a href="#" class="hover-text-white"><i class="fa fa-instagram hover-text-purple"></i></a>
    <a href="#" class="hover-text-white"><i class="fa fa-twitter hover-text-light-blue"></i></a>
  </div>
</header>

<!-- About Section -->
<div class="container padding-128" id="about">
  <h3 class="center">ABOUT AUDIOCITY</h3>
  <p class="center large">Discover Music in a new way</p>
  <div class="row-padding center" style="margin-top:64px">
    <div class="third padding-left padding-right">
      <i class="fa fa-desktop margin-bottom jumbo center"></i>
      <p class="large">Responsive</p>
      <p>Mit AudioCity ist es ganz einfach die richtige Musik für jeden Augenblick zu finden – auf deinem Handy, Computer, Tablet und anderen Geräten.</p>
    </div>
    <div class="third padding-left padding-right">
      <i class="fa fa-heart margin-bottom jumbo"></i>
      <p class="large">Passion</p>
      <p>Auf AudioCity findest Du unzählige Songs. Hör Dir Deine Lieblingssongs an, entdecke neue Titel und bau Dir so Deine ganz persönliche Musiksammlung auf.</p>
    </div>
    <div class="third padding-left padding-right">
      <i class="fa fa-globe margin-bottom jumbo"></i>
      <p class="large">Discover</p>
      <p>Entdecke die aktuellen Charts, Neuerscheinungen und die besten Playlists für jeden Moment.</p>
    </div>
  </div>
</div>
<!-- Promo Section "Statistics" -->
<div class="container row center dark-grey padding-64">
    <div class="quarter">
        <span class="xxlarge">100+</span>
        <br>Genre
    </div>
    <div class="quarter">
        <span class="xxlarge">1'200+</span>
        <br>Alben
    </div>
    <div class="quarter">
        <span class="xxlarge">15'000+</span>
        <br>Lieder
    </div>
    <div class="quarter">
        <span class="xxlarge">25'100'000+</span>
        <br>Glückliche Hörer
    </div>
</div>
<!-- Discovr Section -->
<div class="container light-grey padding-64" id="discover">
  <h3 class="center">DISCOVER</h3>
  <p class="center large">TOP 4</p>
  <div class="  row-padding " style="margin-top:64px">
      <?php include_once 'controller/TopSongs.php';
        $top = new TopSongs();
      foreach ($top->getToplist() as $item) {
        $htmlitem = $top->getHtmlItem();
        $htmlitem = str_replace("{id}", $item->getId(), $htmlitem);
        $htmlitem = str_replace("{album}", $item->getAlbum() == null ? "&nbsp;" : $item->getAlbum(), $htmlitem);
        $htmlitem = str_replace("{piclink}", $item->getPiclink(), $htmlitem);
        $htmlitem = str_replace("{titel}", $item->getName(), $htmlitem);
        $htmlitem = str_replace("{artist}", $item->getArtist(), $htmlitem);
        $htmlitem = str_replace("{duration}", $item->getLengthFormatted(), $htmlitem);
        $htmlitem = str_replace("{release}", $item->getDate(), $htmlitem);
        echo $htmlitem;
      } ?>
  </div>
</div>

<?php /*
<!-- Work Section --> 
<div class="container padding-128" id="work">
  <h3 class="center">OUR WORK</h3>
  <p class="center large">What we've done for people</p>

  <div class="row-padding" style="margin-top:64px">
    <div class="col l3 m6">
      <img src="images/tech_mic.jpg" style="width:100%" onclick="onClick(this)" class="hover-opacity" alt="A microphone">
    </div>
    <div class="col l3 m6">
      <img src="images/tech_phone.jpg" style="width:100%" onclick="onClick(this)" class="hover-opacity" alt="A phone">
    </div>
    <div class="col l3 m6">
      <img src="images/tech_drone.jpg" style="width:100%" onclick="onClick(this)" class="hover-opacity" alt="A drone">
    </div>
    <div class="col l3 m6">
      <img src="images/tech_sound.jpg" style="width:100%" onclick="onClick(this)" class="hover-opacity" alt="Soundbox">
    </div>
  </div>

  <div class="row-padding section">
    <div class="col l3 m6">
      <img src="images/tech_tablet.jpg" style="width:100%" onclick="onClick(this)" class="hover-opacity" alt="A tablet">
    </div>
    <div class="col l3 m6">
      <img src="images/tech_camera.jpg" style="width:100%" onclick="onClick(this)" class="hover-opacity" alt="A camera">
    </div>
    <div class="col l3 m6">
      <img src="images/tech_typewriter.jpg" style="width:100%" onclick="onClick(this)" class="hover-opacity" alt="A typewriter">
    </div>
    <div class="col l3 m6">
      <img src="images/tech_tableturner.jpg" style="width:100%" onclick="onClick(this)" class="hover-opacity" alt="A tableturner">
    </div>
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="modal black" onclick="this.style.display='none'">
  <span class="closebtn text-white opacity hover-opacity-off xxlarge container display-topright" title="Close Modal Image">&times;</span>
  <div class="modal-content animate-zoom center transparent padding-64">
    <img id="img01" class="image">
    <p id="caption" class="opacity large"></p>
  </div>
</div>

<!-- Skills Section -->
<div class="container light-grey padding-64">
  <div class="row-padding">
    <div class="col m6">
      <h3>Our Skills.</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>
      tempor incididunt ut labore et dolore.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>
      tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="col m6">
      <p class="wide"><i class="fa fa-camera margin-right"></i>Photography</p>
      <div class="grey">
        <div class="container dark-grey center" style="width:90%">90%</div>
      </div>
      <p class="wide"><i class="fa fa-desktop margin-right"></i>Web Design</p>
      <div class="grey">
        <div class="container dark-grey center" style="width:85%">85%</div>
      </div>
      <p class="wide"><i class="fa fa-photo margin-right"></i>Photoshop</p>
      <div class="grey">
        <div class="container dark-grey center" style="width:75%">75%</div>
      </div>
    </div>
  </div>
</div>
 */ ?>
<!-- Pricing Section -->
<div class="container padding-128 center dark-grey" id="pricing">
  <h3>PRICING</h3>
  <p class="large">Kostenloser Musikgenuss. Oder hole Dir AudioCity Premium, um Songs direkt abzuspielen. Immer und überall.</p>
  <div class="row-padding" style="margin-top:64px">
    <div class="third section">
      <ul class="ul white hover-shadow text-dark-blue">
        <li class="xlarge padding-32">Free</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> 1 Benutzer</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> eigene Playlist</li>
        <li class="padding-16"><b><i class="fa fa-close"></i></b> Keine Werbung</li>
        <li class="padding-16"><b><i class="fa fa-close"></i></b> Musik offline hören</li>
        <li class="padding-16">
          <h2 class="wide">Fr. 0</h2>
          <span class="opacity">pro Monat</span>
        </li>
        <li class="light-grey padding-24">
          <button class="button black padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="third">
      <ul class="ul white hover-shadow text-dark-blue">
        <li class="red xlarge padding-48">Premium</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> 1 Benutzer</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> eigene Playlist</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> Keine Werbung</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> Musik offline hören</li>
        <li class="padding-16">
          <h2 class="wide">Fr. 10</h2>
          <span class="opacity">pro Monat</span>
        </li>
        <li class="light-grey padding-24">
          <button class="button black padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="third section">
      <ul class="ul white hover-shadow text-dark-blue">
        <li class="xlarge padding-32">Family</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> 5 Benutzer</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> eigene Playlist</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> Keine Werbung</li>
        <li class="padding-16"><b><i class="fa fa-check"></i></b> Musik offline hören</li>
        <li class="padding-16">
          <h2 class="wide">Fr. 20</h2>
          <span class="opacity">pro Monat</span>
        </li>
        <li class="light-grey padding-24">
          <button class="button black padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- Footer -->
<footer class="center padding-64">
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

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidenav when clicking the menu icon
var mySidenav = document.getElementById("mySidenav");

function menu_open() {
    if (mySidenav.style.display === 'block') {
        mySidenav.style.display = 'none';
    } else {
        mySidenav.style.display = 'block';
    }
}

// Close the sidenav with the close button
function menu_close() {
    mySidenav.style.display = "none";
}
</script>



</body>
</html>