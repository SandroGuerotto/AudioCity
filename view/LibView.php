<!-- Music Section -->

<div class="container padding-128 white" id="work">
    <h3 class="center">MY MUSIC</h3>
    <?php include_once '../controller/LibrarySongs.php';
          include_once "../model/CustomSession.php";
    if (CustomSession::getInstance()->getCurrentUser() === null){?>
        <p class="center">Um deine Playlist abzurufen musst du eingeloggt sein. <br>
            Hier gehts zum Login: <span class="text-dark-blue link " onclick="activateTab('view/LoginView.php')">Anmelden</span><br>
            Noch keinen Account? <span class="text-dark-blue link " onclick="activateTab('view/RegisterView.php')">Registrieren</span>
        </p>
       <?php return;
    }

    $lib = new LibrarySongs();
    foreach ($lib->getToplist() as $item) {
        echo'<p>';
        $htmlitem = $lib->getHtmlItem();
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

<script>

    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }
</script>