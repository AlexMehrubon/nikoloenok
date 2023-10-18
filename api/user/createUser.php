<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization,X-Requested-With");
header("Access-Control-Allow-Origin, Access-Control-Allow-Methods, Access-Control-Allow-Headers");

require_once "../config/boot.php";
include_once "../config/database.php";
include_once "../objects/user.php";


$user = new User((new Database())->getConnection());

$data = json_decode(file_get_contents("php://input"));


if(
    !empty($data->login) &&
    !empty($data->password)
){
    $user->login = $data->login;
    $user->password = $data->password;

    if($user->create()){
        http_response_code(201);
        echo json_encode(array("message" => "User has been created"),JSON_UNESCAPED_UNICODE);
        exit();
    }else{
        http_response_code(503);
        echo json_encode(array("message" =>"It's impossible to create a user"), JSON_UNESCAPED_UNICODE);
    }
}else{
    http_response_code(400);

}
