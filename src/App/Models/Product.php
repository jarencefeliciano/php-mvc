<?php

namespace App\Models;

use PDO;
use App\Database;

class Product
{
    public function getProducts(): array
    {
        $database = new Database;

        $pdo = $database->getConnection();

        $stmt = $pdo->query("SELECT * FROM products");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
