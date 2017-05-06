<?php
require_once "../controller/LibrarySongs.php";

$controller = new LibrarySongs();
echo $controller->delete($_POST['id']);
