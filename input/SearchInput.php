<?php
require_once "../controller/SearchSongs.php";

$controller = new SearchSongs();

if (isset($_POST['id'])){
    $search = $_POST['id'];
    $list = $controller->searchByID($search);
}else{
    $search = filter_input(INPUT_POST, 'search') ?? "";

    $list = $controller->search($search);
}


$hits = count($list) == 0 ? 'Ups, kein Treffer gefunden!' : 'Treffer: ' .count($list) ;
echo '<h2 class="margin-left">'.$hits.'</h2>';

$counter = 0;
foreach ($list as $song) {
    if ($counter == 0) {
        echo '<div class="row-padding ">';
    }

    echo $controller->getHtmlItem($song, 'sixth');
    $counter++;
    if ($counter == 6) {
        echo '</div>';
        $counter = 0;
    }
}

if ($counter != 0) {
    echo '</div>';
}

