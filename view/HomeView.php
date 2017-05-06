<!-- About Section -->
<div class="container white padding-128" id="about">
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
<div class="container row center text-white padding-64">
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
<!-- Discover Section -->
<div class="container light-grey padding-64" id="discover">
  <h3 class="center">DISCOVER</h3>
  <p class="center large">TOP 4</p>
  <div class="  row-padding " style="margin-top:64px">
      <?php include_once '../controller/TopSongs.php';
        $top = new TopSongs();
      foreach ($top->getToplist() as $item) {
//          $htmlitem = $top->getHtmlItem($item, '12');
//          $htmlitem = str_replace("{id}", $item->getId(), $htmlitem);
//          $htmlitem = str_replace("{album}", $item->getAlbum() == null ? "&nbsp;" : $item->getAlbum(), $htmlitem);
//          $htmlitem = str_replace("{piclink}", $item->getPiclink(), $htmlitem);
//          $htmlitem = str_replace("{titel}", $item->getName(), $htmlitem);
//          $htmlitem = str_replace("{artist}", $item->getArtist(), $htmlitem);
//          $htmlitem = str_replace("{duration}", $item->getLengthFormatted(), $htmlitem);
//          $htmlitem = str_replace("{release}", $item->getDate(), $htmlitem);
//          echo $htmlitem;
          echo $top->getHtmlItem($item, '12');
      } ?>
</div>
</div>

<!-- Pricing Section -->
<div class="container padding-128 center text-white " id="pricing">
    <h3>PRICING</h3>
    <p class="large">Kostenloser Musikgenuss. Oder hole Dir AudioCity Premium, um Songs direkt abzuspielen. Immer und überall.</p>
    <div class="row-padding" style="margin-top:64px">
        <div class="third section">
            <ul class="ul white hover-shadow text-black">
                <li class="xlarge padding-32">Free</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> 1 Benutzer</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> eigene Playlist</li>
                <li class="padding-16"><b><i class="fa fa-close"></i></b> Keine Werbung</li>
                <li class="padding-16"><b><i class="fa fa-close"></i></b> Musik offline hören</li>
                <li class="padding-16">
                    <h2 class="wide">Fr. 0.-</h2>
                    <span class="opacity">pro Monat</span>
                </li>
                <li class="light-grey padding-24">
                    <button  onclick="activateTab('view/RegisterView.php')" class="button black padding-large">Jetzt anmelden</button>
                </li>
            </ul>
        </div>
        <div class="third">
            <ul class="ul white hover-shadow text-black">
                <li class="red xlarge padding-48">Premium</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> 1 Benutzer</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> eigene Playlist</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> Keine Werbung</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> Musik offline hören</li>
                <li class="padding-16">
                    <h2 class="wide">Fr. 10.-</h2>
                    <span class="opacity">pro Monat</span>
                </li>
                <li class="light-grey padding-24">
                    <button onclick="activateTab('view/RegisterView.php')" class="button black padding-large">Jetzt anmelden</button>
                </li>
            </ul>
        </div>
        <div class="third section">
            <ul class="ul white hover-shadow text-black">
                <li class="xlarge padding-32">Family</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> 5 Benutzer</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> eigene Playlist</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> Keine Werbung</li>
                <li class="padding-16"><b><i class="fa fa-check"></i></b> Musik offline hören</li>
                <li class="padding-16">
                    <h2 class="wide">Fr. 20.-</h2>
                    <span class="opacity">pro Monat</span>
                </li>
                <li class="light-grey padding-24">
                    <button onclick="activateTab('view/RegisterView.php')" class="button black padding-large">Jetzt anmelden</button>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="center padding-64">
    <a href="#home" class="button"><i class="fa fa-arrow-up margin-right"></i>To the top</a>
    <div class="xlarge text-white section">
        <i class="fa fa-facebook-official hover-text-indigo"></i>
        <i class="fa fa-instagram hover-text-purple"></i>
        <i class="fa fa-twitter hover-text-light-blue"></i>
    </div>
</footer>
