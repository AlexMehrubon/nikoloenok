<?php

class basket
{

    private ?PDO $conn;
    private string $table_name = "basket_content";
    public int $basket_id;
    public int $product_id;
    public int $quantity;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT
        p.id, p.basket_id, p.product_id, p.quantity
        FROM
            " . $this->table_name ." p";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function create(){

        $this->setBasketID();
        $query = "INSERT INTO
        ".$this->table_name."
        SET
            basket_id =:basket_id, product_id =:product_id, quantity =:quantity;
        ";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(":basket_id", $this->basket_id);
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":quantity", $this->quantity);

        if($stmt->execute())
            return true;

        return false;
    }


    private function setBasketID(): void
    {

        $query = "SELECT * FROM baskets WHERE user_id =:user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();

        $basket = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->basket_id = $basket['user_id'];
        var_dump($_SESSION['user_id']);
    }
}