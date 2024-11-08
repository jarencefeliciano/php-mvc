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

        echo $viewer->render("shared/header.php", [
            "title" => "Products"
        ]);

        echo $viewer->render("Products/index.php", [
          "products" => $products
        ]);

        echo $viewer->render("shared/footer.php");
    }

    public function show(string $id)
    {
        $viewer = new Viewer;

        echo $viewer->render("shared/header.php", [
            "title" => "Product"
        ]);

        echo $viewer->render("Products/show.php", [
            "id" => $id
        ]);

        echo $viewer->render("shared/footer.php");
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }
}
