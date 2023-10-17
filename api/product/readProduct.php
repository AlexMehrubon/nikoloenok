<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/database.php";
include_once "../objects/product.php";



$product = new Product((new Database())->getConnection());

$stmt = $product->read();
$num = $stmt->rowCount();

if($num > 0){
    $products_arr = array();
    $products_arr["records"] = array();


    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $product_item = array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "weight" => $weight,
            "photo_path" => $photo_path
        );

        $products_arr["records"][] = $product_item;

    }

    http_response_code(200);
    echo json_encode($products_arr);
}else{
    http_response_code(404);
    echo json_encode(array("message" => "Product hasn't been found "), JSON_UNESCAPED_UNICODE);
}