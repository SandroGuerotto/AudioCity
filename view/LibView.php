<div class="padding-128 center" id="lib">
    <div class="container padding-32 white">
        <div class="third">&nbsp;</div>
        <div class="row-padding third center" style="margin-top:64px">
            <h3>Musik Bibliothek</h3>
            <form onsubmit="searchByText(); return false;" method="get" action="javascript:void(0);" name="searchForm" id="searchForm">
                <p><input type="search" name="search" id="search" class="input border" placeholder="Suche" ></p>
            </form>
        </div>
        <div class="third">&nbsp;</div>

    </div>
    <div class="left-align">
        <div id="grid" class="container padding-32 white">
            <?php include_once '../controller/SearchSongs.php';
            $search = new SearchSongs();
            $search->getGenre();
            foreach ($search->getGenreList() as $genre) {
                $songs = $search->getSong($genre);
                if (count($songs) == 0){
                    continue;
                }
                echo ' <div class="row-padding ">';
                echo '<h2 class="margin-left">'.$genre->getName().'</h2>';

                foreach ($songs as $song){
                    echo $search->getHtmlItem2($song, 'sixth');
                }
                echo '</div>';
            }
            $search->close()?>

    </div>
    </div>
</div>

<!-- Footer -->
<footer class="center padding-64">
    <a href="#lib" class="button"><i class="fa fa-arrow-up margin-right"></i>To the top</a>
    <div class="xlarge text-white section">
        <i class="fa fa-facebook-official hover-text-indigo"></i>
        <i class="fa fa-instagram hover-text-purple"></i>
        <i class="fa fa-twitter hover-text-light-blue"></i>
    </div>
</footer>


