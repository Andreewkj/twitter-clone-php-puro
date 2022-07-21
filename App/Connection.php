<?php

namespace App;

class Connection {

    public static function getDb(): \PDO
    {
        try {
            $dbInfo = "mysql:host=mariadb;port=3306;dbname=mvc;charset=utf8";
            $conn = new \PDO($dbInfo,'root','secret');

        return $conn;
        
        } catch(\Throwable $e) {
            throw new \Exception($e->getMessage(), 500);
        }
    }

}

?>