<?php

class Product{
    private ?PDO $conn;
    private string $table_name = "products";

    public $id;
    public $name;
    public $description;
    public  $price;
    public  $weight;
    public $photo_path;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT
        p.id, p.name, p.description, p.price, p.weight, p.photo_path
        FROM
            " . $this->table_name ." p";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
}
