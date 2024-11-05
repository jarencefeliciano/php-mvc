<?php

class Products
{
    public function index()
    {
        require "../src/models/product.php";

        $model = new Product;

        $products = $model->getProducts();

        require "../src/views/products_index.php";
    }
}
