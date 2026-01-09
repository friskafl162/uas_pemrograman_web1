<?php
class User {
    private $conn;
    private $table = "users";

    public function __construct($db){ $this->conn = $db; }

    public function findByUsername($username){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE username=:username");
        $stmt->execute([':username'=>$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
