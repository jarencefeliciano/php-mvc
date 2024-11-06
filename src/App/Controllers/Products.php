<?php

namespace App\Controllers;

class Products
{
    public function index()
    {
        $model = new \App\Models\Product;

        $products = $model->getProducts();

        require "../src/views/products_index.php";
    }

    public function show()
    {
        require "../src/views/products_show.php";
    }
}
