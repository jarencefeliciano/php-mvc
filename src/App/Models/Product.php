<?php

declare(strict_types=1);

namespace App\Models;

use PDO;
use App\Database;

class Product
{
    public function __construct(private Database $database)
    {
    }

    public function getProducts(): array
    {
        $pdo = $this->database->getConnection();

        $stmt = $pdo->query("SELECT * FROM products");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(string $id): array|bool
    {
        $conn = $this->database->getConnection();

        $sql = "SELECT *
                FROM products
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
