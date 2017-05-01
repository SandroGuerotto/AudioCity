<?php
require_once "../controller/SearchSongs.php";
$controller = new SearchSongs();
$val = $controller->search("Test");
var_dump($val);