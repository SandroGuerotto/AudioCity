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

<!-- Navbar (sit on top) -->
<div class="top">
  <div class="bar card-2" id="myNavbar">
    <a href="#home" class="bar-item button wide"><img src="images/logo_icon.png" class="logo"/>AudioCity</a>
    <!-- Right-sided navbar links -->
    <div class="right hide-small">
      <a href="#about" class="bar-item button">ABOUT</a>
      <a href="#team" class="bar-item button"><i class="fa fa-search"></i> DISCOVER</a>
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

<!-- Header with full-height image -->
<header class="bgimg-1 display-container grayscale-min" id="home">
  <div class="display-left padding-xxlarge text-white fadein ">
    <span class="jumbo hide-small">Discover Music in a new way</span><br>
    <span class="xxlarge hide-large hide-medium">AudioCity</span><br>
    <!--<span class="large">Discover music in a new way</span>
    <p><a href="#about" class="button white padding-large large margin-top opacity hover-opacity-off">Learn more and start today</a></p>-->
  </div> 
  <div class="display-bottomleft padding-xxlarge text-white large">
    <a href="#" class="hover-text-white"><i class="fa fa-facebook-official hover-text-indigo"></i></a>
    <!--<a href="#" class="hover-text-white"><i class="fa fa-flickr hover-text-red"></i></a>-->
    <a href="#" class="hover-text-white"><i class="fa fa-instagram hover-text-purple"></i></a>
    <a href="#" class="hover-text-white"><i class="fa fa-twitter hover-text-light-blue"></i></a>
    <!--<a href="#" class="hover-text-white"><i class="fa fa-linkedin hover-text-indigo"></i></a>-->
  </div>
</header>

<!-- About Section -->
<div class="container padding-128" id="about">
  <h3 class="center">ABOUT AUDIOCITY</h3>
  <p class="center large">Discover Music in a new way</p>
  <div class="row-padding center" style="margin-top:64px">
    <div class="quarter">
      <i class="fa fa-desktop margin-bottom jumbo center"></i>
      <p class="large">Responsive</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="quarter">
      <i class="fa fa-heart margin-bottom jumbo"></i>
      <p class="large">Passion</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="quarter">
      <i class="fa fa-diamond margin-bottom jumbo"></i>
      <p class="large">Design</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="quarter">
      <i class="fa fa-cog margin-bottom jumbo"></i>
      <p class="large">Support</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
  </div>
</div>

<!-- Promo Section - "We know design" -->
<div class="container light-grey padding-64">
  <div class="row-padding">
    <div class="col m6">
      <h3>We know design.</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore.</p>
      <p><a href="#work" class="button black"><i class="fa fa-th">&nbsp;</i> View Our Works</a></p>
    </div>
    <div class="col m6">
      <img class="image round-large" src="images/phone_buildings.jpg" alt="Buildings" width="700" height="394">
    </div>
  </div>
</div>

<!-- Team Section -->
<!--
<div class="container padding-128" id="team">
  <h3 class="center">THE TEAM</h3>
  <p class="center large">The ones who runs this company</p>
  <div class="row-padding grayscale" style="margin-top:64px">
    <div class="col l3 m6 margin-bottom">
      <div class="card-2">
        <img src="images/team2.jpg" alt="John" style="width:100%">
        <div class="container">
          <h3>John Doe</h3>
          <p class="opacity">CEO & Founder</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="button block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col l3 m6 margin-bottom">
      <div class="card-2">
        <img src="images/team1.jpg" alt="Jane" style="width:100%">
        <div class="container">
          <h3>Anja Doe</h3>
          <p class="opacity">Art Director</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="button block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col l3 m6 margin-bottom">
      <div class="card-2">
        <img src="images/team3.jpg" alt="Mike" style="width:100%">
        <div class="container">
          <h3>Mike Ross</h3>
          <p class="opacity">Web Designer</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="button block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="col l3 m6 margin-bottom">
      <div class="card-2">
        <img src="images/team4.jpg" alt="Dan" style="width:100%">
        <div class="container">
          <h3>Dan Star</h3>
          <p class="opacity">Designer</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="button block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
  </div>
</div>
-->
<!-- Promo Section "Statistics" --> <!--
<div class="container row center dark-grey padding-64">
  <div class="quarter">
    <span class="xxlarge">14+</span>
    <br>Partners
  </div>
  <div class="quarter">
    <span class="xxlarge">55+</span>
    <br>Projects Done
  </div>
  <div class="quarter">
    <span class="xxlarge">89+</span>
    <br>Happy Clients
  </div>
  <div class="quarter">
    <span class="xxlarge">150+</span>
    <br>Meetings
  </div>
</div> -->

<!-- Work Section --> <!--
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
-->
<!-- Modal for full size images on click-->
<div id="modal01" class="modal black" onclick="this.style.display='none'">
  <span class="closebtn text-white opacity hover-opacity-off xxlarge container display-topright" title="Close Modal Image">&times;</span>
  <div class="modal-content animate-zoom center transparent padding-64">
    <img id="img01" class="image">
    <p id="caption" class="opacity large"></p>
  </div>
</div>

<!-- Skills Section --><!--
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
</div>-->

<!-- Pricing Section --> <!--
<div class="container padding-128 center dark-grey" id="pricing">
  <h3>PRICING</h3>
  <p class="large">Choose a pricing plan that fits your needs.</p>
  <div class="row-padding" style="margin-top:64px">
    <div class="third section">
      <ul class="ul white hover-shadow">
        <li class="black xlarge padding-32">Basic</li>
        <li class="padding-16"><b>10GB</b> Storage</li>
        <li class="padding-16"><b>10</b> Emails</li>
        <li class="padding-16"><b>10</b> Domains</li>
        <li class="padding-16"><b>Endless</b> Support</li>
        <li class="padding-16">
          <h2 class="wide">$ 10</h2>
          <span class="opacity">per month</span>
        </li>
        <li class="light-grey padding-24">
          <button class="button black padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="third">
      <ul class="ul white hover-shadow">
        <li class="red xlarge padding-48">Pro</li>
        <li class="padding-16"><b>25GB</b> Storage</li>
        <li class="padding-16"><b>25</b> Emails</li>
        <li class="padding-16"><b>25</b> Domains</li>
        <li class="padding-16"><b>Endless</b> Support</li>
        <li class="padding-16">
          <h2 class="wide">$ 25</h2>
          <span class="opacity">per month</span>
        </li>
        <li class="light-grey padding-24">
          <button class="button black padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
    <div class="third section">
      <ul class="ul white hover-shadow">
        <li class="black xlarge padding-32">Premium</li>
        <li class="padding-16"><b>50GB</b> Storage</li>
        <li class="padding-16"><b>50</b> Emails</li>
        <li class="padding-16"><b>50</b> Domains</li>
        <li class="padding-16"><b>Endless</b> Support</li>
        <li class="padding-16">
          <h2 class="wide">$ 50</h2>
          <span class="opacity">per month</span>
        </li>
        <li class="light-grey padding-24">
          <button class="button black padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
  </div>
</div> -->

<!-- Contact Section --><!--
<div class="container padding-128 light-grey" id="contact">
  <h3 class="center">CONTACT</h3>
  <p class="center large">Lets get in touch. Send us a message:</p>
  <div class="row-padding" style="margin-top:64px">
    <div class="half">
      <p><i class="fa fa-map-marker fa-fw xxlarge margin-right"></i> Chicago, US</p>
      <p><i class="fa fa-phone fa-fw xxlarge margin-right"></i> Phone: +00 151515</p>
      <p><i class="fa fa-envelope fa-fw xxlarge margin-right"> </i> Email: mail@mail.com</p>
      <br>
      <form action="/action_page.php" target="_blank">
        <p><input class="input border" type="text" placeholder="Name" required name="Name"></p>
        <p><input class="input border" type="text" placeholder="Email" required name="Email"></p>
        <p><input class="input border" type="text" placeholder="Subject" required name="Subject"></p>
        <p><input class="input border" type="text" placeholder="Message" required name="Message"></p>
        <p>
          <button class="button black" type="submit">
            <i class="fa fa-paper-plane"></i> SEND MESSAGE
          </button>
        </p>
      </form>
    </div>
    <div class="half">-->
      <!-- Add Google Maps --> <!--
      <div id="googleMap" class="greyscale-max" style="width:100%;height:510px;"></div>
    </div>
  </div>
</div>
-->
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
function myMap()
{/*
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map); */
}
// Modal Image Gallery
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