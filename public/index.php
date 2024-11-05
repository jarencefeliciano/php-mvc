<?php

$dsn = "mysql:host=localhost;dbname=php_mvc;charset=utf8mb4;port=3306";

$pdo = new PDO($dsn, "jarence", "@nd7srmu2!", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$stmt = $pdo->query("SELECT * FROM products");

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($products);
