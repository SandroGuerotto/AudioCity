<?php

include_once "../model/Song.php";
include_once "../model/CustomSession.php";
include_once "../model/User.php";

class LibrarySongs{

    private $list = array();
    /**
     * My Library constructor.
     */
    public function __construct() {
        $db_link = CustomSession::getInstance()->db_link->getDb_link();
        /* create a prepared statement */
        $stmt = $db_link->prepare("SELECT * FROM userlib WHERE userid = ?");

        $param =  CustomSession::getInstance()->getCurrentUser()->getId();
        $stmt->bind_param("i", $param);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist, $libid, $inserdate, $userid );

        /* fetch value */
        while ($stmt->fetch()){
            $song = new Song($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist);
            array_push($this->list, $song);
        }

        /* close connection */
        $db_link->close();
    }

    /**
     * @return array
     */
    public function getToplist() : array {
        return $this->list;
    }

    public function getHtmlItem(){
        $htmlitem = '<p><div><a href="lib/?id={id}"><div class="card-2 grayscale-40"><img src="{piclink}" class="library-img" alt="{album} Cover"><div class="container"><h3>{titel} - {artist}</h3><p class="opacity">{album}</p><p><span>Länge: {duration}</span><span class="discover-date">Erscheinung: {release}</span></p></div></div></a></div></p>';
        return $htmlitem;
    }
}