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
    public function getList() : array {
        return $this->list;
    }

    public function getHtmlItem(){
        $htmlitem = '<p><div style="padding-left: 6em; padding-right: 6em"><div class="lineBorderImage"><div class="image-container"><img id="image" src="{piclink}" class="library-img" alt="{album} Cover"/><div id="overlay-{id}" data-src="{audiolink};{piclink};{titel} - {artist};{id}" class="playlist-control"  onclick="startmusic(event)"></div></div><div class="container" style="display: inline-block;"><h3 id="texttitle">{titel} - {artist}</h3><p class="opacity">{album}</p><p><span>Länge: {duration}</span><span class="discover-date" style="margin-left: 1em;">Erscheinung: {release}</span></p></div></div></div></p>';
        return$htmlitem;
    }

}
