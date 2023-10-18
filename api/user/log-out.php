<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


require_once "../config/boot.php";

$_SESSION['user_id'] = null;



http_response_code(200);