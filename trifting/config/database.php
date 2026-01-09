<?php
class Database {
    public static function connect(){
        try {
            $db = new PDO("mysql:host=localhost;dbname=trifting","root","");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch(PDOException $e){
            die("Connection failed: " . $e->getMessage());
        }
    }
}
