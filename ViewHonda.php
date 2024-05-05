<?php

require_once ('db_connect.php');

class ViewHonda {

    protected PDO $db;
    private static ?ViewHonda $honda = null;
    
    public function __construct()
    {
        $this->db = DatabaseConnection::connect();
    }

    public static function instance(): ViewHonda
    {
        if (self::$honda === null) {
            self::$honda = new ViewHonda();
        }
        return self::$honda;
    }

    public function readHonda() {
        $sql = "SELECT * FROM honda";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
        
}