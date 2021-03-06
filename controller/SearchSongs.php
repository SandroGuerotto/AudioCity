<?php

include_once "../model/Song.php";
include_once "../model/CustomSession.php";
include_once "../controller/LibrarySongs.php";
class SearchSongs{

    private $db_link = null;
    private $genreList = array();
    private $playlist = array();
    private $exclude = array(0);

    /**
     * TopSongs constructor.
     */
    public function __construct() {

        $this->db_link = CustomSession::getInstance()->db_link->getDb_link();
        if (CustomSession::getInstance()->getCurrentUser() != null){
            $this->getPlaylist();
        }
    }

    /**
     * load genre list
     */
    public function getGenre(){
        /* create a prepared statement */
        $stmt = $this->db_link->prepare("SELECT gen.id, gen.name, COUNT(*) as cnt FROM genremusic INNER JOIN genre as gen on gen.id = Genre_id GROUP BY Genre_id ORDER by cnt DESC LIMIT 5");

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $cnt );

        /* fetch value */
        while ($stmt->fetch()){
            $genre = new Genre($id, $name);
            array_push($this->genreList, $genre);
        }
    }

    /**
     * @param Genre $genre
     * @return array
     */
    public function getSong(Genre $genre) :array {
        $list = array();

        /* create a prepared statement */
        $stmt = $this->db_link->prepare("SELECT * FROM musicfull WHERE genre_id = ? AND id NOT IN (" .implode(',', $this->exclude). ") LIMIT 6");

        $sel_genre_id =  $genre->getId();
        $stmt->bind_param('s',$sel_genre_id);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre_id, $genre, $artist );

        /* fetch value */
        while ($stmt->fetch()){
            $song = new Song($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist);
            /* put song into returning array */
            array_push($list, $song);
            /* put song id into exclude array for selection */
            array_push($this->exclude, $id);
        }
        return $list;
    }
    private function getPlaylist() {
        $obj = new LibrarySongs();
        $this->playlist = $obj->getList();
    }

    /**
     * @return mixed
     */
    public function getGenreList() : array{
        return $this->genreList;
    }

    public function getHtmlItem(Song $song, String $size) : string {
        // wenn Titel und Artist grösser als 25 Zeichen ist, dann muss der marquee tag eingefügt werden (scroll)
        $titel =  strlen($song->getName()) + strlen($song->getArtist()) <= 25 ? $song->getName() .' - '.$song->getArtist() : '<marquee scrolldelay="3" >'.$song->getName() .' - '.$song->getArtist().'</marquee>';

        // Add to my libary knopf
        if (CustomSession::getInstance()->getCurrentUser() != null && !$this->hasInPlaylist($song->getId())){
            $button = '<span class="add-to-list pointer" onclick="addToLib('.$song->getId().')"><i class="fa fa-plus-square-o"></i><i class="fa fa-plus-square"></i></span> ';
        }else if( CustomSession::getInstance()->getCurrentUser() != null && $this->hasInPlaylist($song->getId())){
            $button = '<span class="add-to-list pointer" onclick="delFromLib('.$song->getId().')"><i class="fa fa-trash-o"></i><i class="fa fa-trash"></i></span> ';
        }else{
            $button = '<span class="add-to-list pointer" onclick="activateTab(\'view/LoginView.php\')"><i class="fa fa-plus-square-o"></i><i class="fa fa-plus-square"></i></span> ';
        }


        $titel = CustomSession::getInstance()->getCurrentUser() != null ? $titel .$button : $titel;

        $htmlitem = '<div id="'.$song->getId().'" class="col '.$size.' margin-bottom"><div class="card-2 grayscale-40"><img src="'.$song->getPiclink().'" class="discover-img" alt="{album} Cover"><div class="container"><h4>'.$titel.'</h4><p class="opacity">{album}</p><p><span>Länge: '.$song->getLengthFormatted().'</span><span class="discover-date">Erschien: '.$song->getDate().'</span></p></div></div></div>';
        $htmlitem = str_replace("{album}", $song->getAlbum() == null ? "&nbsp;" : $song->getAlbum(), $htmlitem);
        return $htmlitem;
    }
    /**
     * close current db connection
     */
    public function close(){
        /* close connection */
        $this->db_link->close();
    }

    private function hasInPlaylist(int $id): bool{
        foreach ($this->playlist as $item){
            if ($item->getId() == $id){
                return true;
            }

        }
        return false;
    }

    /**
     * @param string $input
     * @return array
     */
    public function search(string $input) :array {
        $list = array();
        $search = '%'.$input.'%';

        /* create a prepared statement */
        $stmt = $this->db_link->prepare("SELECT DISTINCT * FROM musicfull WHERE 
         ( id LIKE ? OR name LIKE ? OR album LIKE ? OR length LIKE ? OR date LIKE ? OR genre LIKE ? OR artistname LIKE ? ) GROUP BY id");

        $stmt->bind_param('sssssss',$search,$search,$search,$search,$search,$search,$search);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre_id, $genre, $artist );

        /* fetch value */
        while ($stmt->fetch()){
            $song = new Song($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist);
            /* put song into returning array */
            array_push($list, $song);
        }
        return $list;
    }
    /**
     * @param int $input
     * @return array
     */
    public function searchByID(int $input) :array {
        $list = array();

        /* create a prepared statement */
        $stmt = $this->db_link->prepare("SELECT DISTINCT * FROM musicfull WHERE id = ?  GROUP BY id");

        $stmt->bind_param('i',$input);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($id, $name, $album, $length, $date, $piclink, $filelink, $genre_id, $genre, $artist );

        /* fetch value */
        while ($stmt->fetch()){
            $song = new Song($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist);
            /* put song into returning array */
            array_push($list, $song);
        }
        return $list;
    }
}
class Genre{
    private $id;
    private $name;

    /**
     * Genre constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() :string
    {
        return $this->name;
    }


}