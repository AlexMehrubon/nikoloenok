<?php

class Database{
    private string $host = "localhost";
    private string $db_name = "productsdb";
    private string $username = "root";
    private string $password = "1354213542";
    public ?PDO $conn;

    public function getConnection(): ?PDO
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=3305" . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch (PDOException $exception){
            echo "CONNECTION DATABASE ERROR: " . $exception->getMessage();
        }

        return $this->conn;
    }
}