<?php

require_once "../controller/LoginController.php";

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING) ?? "";
$password = filter_input(INPUT_POST, 'password') ?? "";
$controller = new Login();
$controller->loginPerson($username, $password);