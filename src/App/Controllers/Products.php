<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Viewer;
use App\Models\Product;
use Framework\Exceptions\PageNotFoundException;

class Products
{
    public function __construct(private Viewer $viewer, private Product $model)
    {
    }

    public function index()
    {
        $products = $this->model->findAll();

        echo $this->viewer->render("shared/header.php", [
            "title" => "Products"
        ]);

        echo $this->viewer->render("Products/index.php", [
          "products" => $products
        ]);

        echo $this->viewer->render("shared/footer.php");
    }

    public function show(string $id)
    {
        $product = $this->model->find($id);

        if ($product === false) {
            throw new PageNotFoundException("Product not found");
        }

        echo $this->viewer->render("shared/header.php", [
            "title" => "Product"
        ]);

        echo $this->viewer->render("Products/show.php", [
            "product" => $product
        ]);

        echo $this->viewer->render("shared/footer.php");
    }

    public function edit(string $id)
    {
        $product = $this->model->find($id);

        if ($product === false) {
            throw new PageNotFoundException("Product not found");
        }

        echo $this->viewer->render("shared/header.php", [
            "title" => "Edit Product"
        ]);

        echo $this->viewer->render("Products/edit.php", [
            "product" => $product
        ]);

        echo $this->viewer->render("shared/footer.php");
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }

    public function new()
    {
        echo $this->viewer->render("shared/header.php", [
            "title" => "New Product"
        ]);

        echo $this->viewer->render("Products/new.php");

        echo $this->viewer->render("shared/footer.php");
    }

    public function create()
    {
        $data = [
            "name" => $_POST["name"],
            "description" => empty($_POST["description"]) ? null : $_POST["description"]
        ];

        if ($this->model->insert($data)) {
            header("Location: /products/show/{$this->model->getInsertId()}");
            exit;
        } else {
            echo $this->viewer->render("shared/header.php", [
                "title" => "New Product"
            ]);

            echo $this->viewer->render("Products/new.php", [
              "errors" => $this->model->getErrors()
            ]);

            echo $this->viewer->render("shared/footer.php");
        }
    }
}
