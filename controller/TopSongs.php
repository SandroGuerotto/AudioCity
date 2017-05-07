<?php

/**
 * Created by PhpStorm.
 * User: Sandro
 * Date: 21.03.2017
 * Time: 21:19
 */
include_once "../model/Song.php";
include_once "../model/CustomSession.php";
class TopSongs
{

    private $toplist = array();

    /**
     * TopSongs constructor.
     */
    public function __construct() {

        $db_link = CustomSession::getInstance()->db_link->getDb_link();
        /* create a prepared statement */
        $stmt = $db_link->prepare("SELECT * FROM musicfull GROUP BY id LIMIT 4");

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre_id, $genre, $artist );

        /* fetch value */
        while ($stmt->fetch()){
            $song = new Song($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist);
            array_push($this->toplist, $song);
        }

        /* close connection */
        $db_link->close();
    }

    /**
     * @return mixed
     */
    public function getToplist() : array{
        return $this->toplist;
    }
//    public function getHtmlItem() : string {
//        $htmlitem = '<div class="col l2 m6 margin-bottom"><sapn class="pointer" onclick="activateTab(\'view/DiscoverView.php\')"><div class="card-2 grayscale-40"><img src="audiocity/{piclink}" class="discover-img" alt="{album} Cover"><div class="container"><h3>{titel} - {artist}</h3><p class="opacity">{album}</p><p><span>Länge: {duration}</span><span class="discover-date">Erschien: {release}</span></p></div></div></sapn></div>';
//        return $htmlitem;
//    }
//
    public function getHtmlItem(Song $song, String $size) : string {
        // wenn Titel und Artist grösser als 25 Zeichen ist, dann muss der marquee tag eingefügt werden (scroll)
        $titel =  strlen($song->getName()) + strlen($song->getArtist()) <= 25 ? $song->getName() .' - '.$song->getArtist() : '<marquee scrolldelay="3" >'.$song->getName() .' - '.$song->getArtist().'</marquee>';
        $htmlitem = '<div class="col 12 m2 margin-bottom"><span class="pointer" onclick="activateTab(\'view/DiscoverView.php\');searchById('.$song->getId().')"><div class="card-2 grayscale-40"><img src="audiocity/'.$song->getPiclink().'" class="discover-img" alt="{album} Cover"><div class="container"><h4>'.$titel.'</h4><p class="opacity">{album}</p><p><span>Länge: '.$song->getLengthFormatted().'</span><span class="discover-date">Erschien: '.$song->getDate().'</span></p></div></div></span></div>';
        $htmlitem = str_replace("{album}", $song->getAlbum() == null ? "&nbsp;" : $song->getAlbum(), $htmlitem);
        return $htmlitem;
    }
}