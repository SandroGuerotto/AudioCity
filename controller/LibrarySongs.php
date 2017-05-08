<?php

include_once "../model/Song.php";
include_once "../model/CustomSession.php";
include_once "../model/User.php";

class LibrarySongs{

    private $db_link;

    /**
     * My Library constructor.
     */
    public function __construct() {

    }

    /**
     * @return array
     */
    public function getList() : array {
        $list = array();

        $this->db_link = CustomSession::getInstance()->db_link->getDb_link();
        /* create a prepared statement */
        $stmt = $this->db_link->prepare("SELECT DISTINCT * FROM userlib WHERE userid = ? GROUP BY id");

        $param =  CustomSession::getInstance()->getCurrentUser()->getId();
        $stmt->bind_param("i", $param);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist, $libid, $inserdate, $userid );

        /* fetch value */
        while ($stmt->fetch()){
            $song = new Song($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist);
            array_push($list, $song);
        }


        return $list;
    }
    public function close(){
        /* close connection */
        $this->db_link->close();
    }

    public function getHtmlItem(){
        $button = '<span class="add-to-list pointer" onclick="delFromLib({id});removeFromList({id})"><i class="fa fa-trash-o"></i><i class="fa fa-trash"></i></span> ';
        $htmlitem = '<div id="main-container-{id}" class="playlist-item-wrapper"><div id="divlineborderimg" class="lineBorderImage"><div id="imgcontainer" class="image-container"><img id="image" src="{piclink}" class="library-img" alt="{album} Cover"/><div id="overlay-{id}" data-src="{audiolink};{piclink};{titel} - {artist};{id}" class="playlist-control"  onclick="startmusic(event)"></div></div>'.$button.'<div class="container" style="display: inline-block;"><h3 id="texttitle">{titel} - {artist}</h3><p class="opacity">{album}</p><p><span>Länge: {duration}</span><span class="discover-date" style="margin-left: 1em;">Erscheinung: {release}</span></p></div></div></div>';
        return$htmlitem;
    }

    public function add(int $id) {
        $db_link = CustomSession::getInstance()->db_link->getDb_link();
        /* create a prepared statement */
        $stmt = $db_link->prepare("INSERT INTO userbiblio(`Music_id`, `Login_id`, `insertdate`) VALUES (?,?,?)");

        $param =  CustomSession::getInstance()->getCurrentUser()->getId();
        $date = date("Y-m-d");
        $stmt->bind_param("iis", $id, $param, $date);

        /* execute query */
        $stmt->execute();

        /* if insert was successful, return data */
        if ( $stmt->affected_rows == -1) {
            http_response_code(500);
        }else{
            $stmt = $db_link->prepare("SELECT * FROM userlib WHERE libid = ?");
            $id = mysqli_insert_id($db_link);
            $stmt->bind_param("i", $id);
            /* execute query */
            $stmt->execute();
            /* bind result variables */
            $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist, $libid, $inserdate, $userid );
            /* fetch value */
            while ($stmt->fetch()){
                $array = array();
                $array[0] = $filelink;
                $array[1] = $piclink;
                $array[2] = $name.' - '.$artist;
                $array[3] = $id;
                echo json_encode($array);
            }
        }

        /* close connection */
        $db_link->close();


    }
    public function delete(int $id):bool {
        $db_link = CustomSession::getInstance()->db_link->getDb_link();
        /* create a prepared statement */
        $stmt = $db_link->prepare("DELETE FROM userbiblio WHERE Music_id = ? AND Login_id = ?");

        $param =  CustomSession::getInstance()->getCurrentUser()->getId();
        $stmt->bind_param("ii", $id, $param);

        /* execute query */
        $stmt->execute();

        /* if insert was successful, return true */
        $changed = $stmt->affected_rows == -1 ? false : true;

        /* close connection */
        $db_link->close();

        return $changed;
    }
}
