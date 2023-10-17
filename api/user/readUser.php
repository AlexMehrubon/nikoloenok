<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/user.php";


$user = new User((new Database())->getConnection());

$stmt = $user->read();
$num = $stmt->rowCount();

if($num > 0){
    $users_arr = array();
    $users_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $user_item = array(
            "id" => $row["id"],
            "login"=> $row["login"],
            "password" =>$row["password"],
            "rights" =>$row["rights"],
        );

        $users_arr["records"][] = $user_item;
    }

    http_response_code(200);
    echo json_encode($users_arr);
}else{
    http_response_code(404);
}