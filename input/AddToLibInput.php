<?php
require_once "../controller/LibrarySongs.php";

$controller = new LibrarySongs();
echo $controller->add($_POST['id']);
