<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/basket.php";


$basket = new Basket((new Database())->getConnection());

$stmt = $basket->read();

$num = $stmt->rowCount();

if($num > 0){
    $basket_arr = array();
    $basket_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $basket_item = array(
            "id" => $row["id"],
            "basket_id"=> $row["basket_id"],
            "product_id" =>$row["product_id"],
            "quantity" =>$row["quantity"],
        );

        $basket_arr["records"][] = $basket_item;
    }

    http_response_code(200);
    echo json_encode($basket_arr);
}else{
    http_response_code(404);
}