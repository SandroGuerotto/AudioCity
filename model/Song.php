<?php

/**
 * Created by PhpStorm.
 * User: Sandro
 * Date: 21.03.2017
 * Time: 21:15
 */
class Song
{

    private  $id;
    private $name;
    private $album;
    private $length;
    private $date;
    private $piclink;
    private $filelink;
    private $genre;
    private $artist;

    /**
     * Song constructor.
     * @param $id
     * @param $name
     * @param $album
     * @param $length
     * @param $date
     * @param $iclink
     * @param $filelink
     * @param $genre
     * @param $artistname
     * @param $artistforename
     */
    public function __construct($id, $name, $album, $length, $date, $piclink, $filelink, $genre, $artist)
    {
        $this->id = $id;
        $this->name = $name;
        $this->album = $album;
        $this->length = $length;
        $this->date = date_format(new DateTime($date), 'd.m.Y');;
        $this->piclink = $piclink;
        $this->filelink = $filelink;
        $this->genre = $genre;
        $this->artist = $artist;
    }

    /**
     * @return mixed
     */
    public function getId() : int
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

    /**
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @return mixed
     */
    public function getLength() :string
    {
        return $this->length;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getPiclink()
    {
        return $this->piclink;
    }

    /**
     * @return mixed
     */
    public function getFilelink()
    {
        return $this->filelink;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @return string
     */
    public function getLengthFormatted(){
        return sprintf('%2d', (int) $this->length / 60) ."". sprintf(':%02d', (int) $this->length % 60);
    }
}