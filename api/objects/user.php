<?php

class User{
    private ?PDO $conn;
    private string $table_name = "users";
    public $id;
    public $login;
    public $password;
    public $orders;
    public $rights;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read(){
        $query = "SELECT
         p.id, p.login, p.password, p.rights
         FROM 
             " . $this->table_name ." p ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }
}