<?php



header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


require_once "../config/boot.php";




if(is_auth()){
    echo json_encode(true);
}else{
    echo json_encode(false);
}
http_response_code(200);