<?php

/**
 * Created by PhpStorm.
 * User: Sandro
 * Date: 21.03.2017
 * Time: 21:19
 */
include_once "model/Song.php";
class LibrarySongs
{

    private $toplist = array();

    /**
     * TopSongs constructor.
     */
    public function __construct()
    {

        $db_link = CustomSession::getInstance()->db_link->getDb_link();
        /* create a prepared statement */
        $stmt = $db_link->prepare("SELECT * FROM musicfull GROUP BY id LIMIT 4");

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist );

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
    public function getToplist()
    {
        return $this->toplist;
    }

    public function getHtmlItem(){
        $htmlitem = '<p><div><a href="lib/?id={id}"><div class="card-2 grayscale-40"><img src="{piclink}" class="library-img" alt="{album} Cover"><div class="container"><h3>{titel} - {artist}</h3><p class="opacity">{album}</p><p><span>Länge: {duration}</span><span class="discover-date">Erscheinung: {release}</span></p></div></div></a></div></p>';
        return$htmlitem;
    }
}