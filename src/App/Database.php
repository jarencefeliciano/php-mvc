<?php

namespace App;

use PDO;

class Database
{
    public function getConnection(): PDO
    {
        $dsn = "mysql:host=localhost;dbname=php_mvc;charset=utf8mb4;port=3306";

        return new PDO($dsn, "jarence", "@nd7srmu2!", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}
