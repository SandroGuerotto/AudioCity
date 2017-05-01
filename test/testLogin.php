<?php
require_once "../controller/LoginController.php";
$controller = new Login();
$controller->loginPerson("test", "test");
if( http_response_code() == 500){
    echo 'error';
}else{
    echo 'ok';
}