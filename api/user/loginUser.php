<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


require_once "../config/boot.php";
include_once "../config/database.php";
include_once "../objects/user.php";




$data = json_decode(file_get_contents("php://input"));

$user = new User((new Database())->getConnection());

if(
    !(empty($data->login))&&
    !(empty($data->password))
){
    $user->login = $data->login;
    $user->password = $data->password; //password_hash($data->password, PASSWORD_DEFAULT);

    if($user->Authorize()){
        http_response_code(200);
        echo json_encode(array("message" => "User has been authorized"),JSON_UNESCAPED_UNICODE);
        exit();
    }else{
        http_response_code(401);
        json_encode(array("message" =>"It's impossible to authorize a user"), JSON_UNESCAPED_UNICODE);
    }

}else{
    http_response_code(400);
    json_encode(array("message" =>"Error Data"), JSON_UNESCAPED_UNICODE);
}

header("Location: ../config/boot.php");