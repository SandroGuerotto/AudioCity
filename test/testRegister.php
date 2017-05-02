<?php
require_once "../controller/RegisterController.php";
require_once "../model/CustomSession.php";
$session = CustomSession::getInstance();
$db_link = $session->db_link->getDb_link();

$stmt = $db_link->prepare("DELETE FROM login WHERE id != 1");

$stmt->execute();

$controller = new Register();
$controller->registerPerson("testusedr", "1da234", "1da234", "kasdf", "asfasf", "asfd@asf.co");
if( http_response_code() == 500){
    echo 'error';
}else{
    echo 'ok';

    echo $session->getCurrentUser()->getId();
}