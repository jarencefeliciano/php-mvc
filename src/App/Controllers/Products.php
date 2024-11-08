<?php

namespace App\Controllers;

use App\Models\Product;
use Framework\Viewer;

class Products
{
    public function index()
    {
        $model = new Product;

        $products = $model->getProducts();

        $viewer = new Viewer;

        $viewer->render("products_index.php", [
          "products" => $products
        ]);
    }

    public function show(string $id)
    {
        var_dump($id);
        require "../src/views/products_show.php";
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }
}
