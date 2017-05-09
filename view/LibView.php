<!-- Music Section -->
<div class="container padding-128 white margin-6" id="work">
    <h3 class="center">MY MUSIC</h3>
    <?php include_once '../controller/LibrarySongs.php';
          include_once "../model/CustomSession.php";

    if (CustomSession::getInstance()->getCurrentUser() == null){ ?>
    <p class="center"> Um eine eingene Playlist zu erstellen musst Du angemeldet sein. <span class="text-dark-blue link opacity" onclick="activateTab('view/LoginVIew.php')">Jetzt anmelden</span></p>
    <?php return; }

    $lib = new LibrarySongs();
    foreach ($lib->getList() as $item) {
        $htmlitem = $lib->getHtmlItem();
        // wenn Titel und Artist grösser als 25 Zeichen ist, dann muss der marquee tag eingefügt werden (scroll)
//        $titel =  strlen($item->getName()) + strlen($item->getArtist()) <= 20 ? $item->getName() .' - '.$item->getArtist() : '<marquee scrolldelay="3" >'.$item->getName() .' - '.$item->getArtist().'</marquee>';


        $htmlitem = str_replace("{id}", $item->getId(), $htmlitem);
        $htmlitem = str_replace("{album}", $item->getAlbum() == null ? "&nbsp;" : $item->getAlbum(), $htmlitem);
        $htmlitem = str_replace("{piclink}", $item->getPiclink(), $htmlitem);
        $htmlitem = str_replace("{audiolink}", $item->getFilelink(), $htmlitem);
        $htmlitem = str_replace("{titel}", $item->getName(), $htmlitem);
//        $htmlitem = str_replace("{titel2}", $titel, $htmlitem);
        $htmlitem = str_replace("{artist}", $item->getArtist(), $htmlitem);
//        $htmlitem = str_replace("{artist}", "", $htmlitem);
        $htmlitem = str_replace("{duration}", $item->getLengthFormatted(), $htmlitem);
        $htmlitem = str_replace("{release}", $item->getDate(), $htmlitem);
        echo $htmlitem;

    }
    $lib->close();
    ?>
</div>
