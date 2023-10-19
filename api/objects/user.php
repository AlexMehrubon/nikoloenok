<?php

class User{
    private ?PDO $conn;
    private string $table_name = "users";
    private string $basket_table_name = "baskets";
    public int $id;
    public string $login;
    public string $password;
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
        $stmt = $this->getUserStmtByLogin();
        if($stmt->rowCount() > 0)
            return false;


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

        if(!$stmt->execute())
            return false;


        //Получение ID юзера для внесения данных в baskets
        $stmt = $this->getUserStmtByLogin();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $user['id'];

        $queryBasket = "INSERT INTO
        ".$this->basket_table_name."
        SET
            user_id =:user_id;
        ";
        $stmtBasket = $this->conn->prepare($queryBasket);
        $stmtBasket->bindParam(":user_id", $this->id);

        if(!$stmtBasket->execute())
            return false;

        return true;

    }

    public function authorize():bool
    {
        $stmt = $this->getUserStmtByLogin();
        if(!$stmt->rowCount())
            return false;

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($this->password === $user['password']){
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    private function getUserStmtByLogin(): bool|PDOStatement
    {
        $query = "SELECT * FROM users WHERE login =:login";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':login', $this->login);
        $stmt->execute();

        return $stmt;
    }
}