<?php

class User{
    private ?PDO $conn;
    private string $table_name = "users";
    public int $id;
    public string $login;
    public string $password;
    public array $orders;
    public string $rights = "customer";
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read(): bool|PDOStatement
    {
        $query = "SELECT
         p.id, p.login, p.password, p.rights
         FROM 
             " . $this->table_name ." p ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }

    public function create(): bool
    {
        //Проверка, не занят ли логин пользователя
        $query = "SELECT * FROM users WHERE login =:login";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':login', $this->login);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return false;
        }



        $query = "INSERT INTO 
        ". $this->table_name ."
        SET
            login =:login, password =:password, rights =:rights";

        $stmt = $this->conn->prepare($query);

        $this->login = htmlspecialchars(strip_tags($this->login));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(":login", $this->login);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":rights", $this->rights);
        if($stmt->execute()){
            return true;
        }

        return false;

    }

    public function Authorize():bool
    {
        $query = "SELECT * FROM users WHERE login =:login";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':login', $this->login);
        $stmt->execute();

        if(!$stmt->rowCount()){
            return false;
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($this->password === $user['password']){
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }
}