<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Product;
use Framework\Controller;
use Framework\Exceptions\PageNotFoundException;

class Products extends Controller
{
    public function __construct(private Product $model)
    {
    }

    private function getProduct(string $id): array
    {
        $product = $this->model->find($id);

        if ($product === false) {
            throw new PageNotFoundException("Product not found");
        }

        return $product;
    }

    public function index()
    {
        $products = $this->model->findAll();

        $this->response->setBody($this->viewer->render("Products/index.mvc.php", [
          "products" => $products,
          "total" => $this->model->getTotal()
        ]));

        $this->response->send();
    }

    public function show(string $id)
    {
        $product = $this->getProduct($id);

        echo $this->viewer->render("Products/show.mvc.php", [
            "product" => $product
        ]);
    }

    public function edit(string $id)
    {
        $product = $this->getProduct($id);

        echo $this->viewer->render("Products/edit.mvc.php", [
            "product" => $product
        ]);
    }

    public function showPage(string $title, string $id, string $page)
    {
        echo $title, " ", $id, " ", $page;
    }

    public function new()
    {
        echo $this->viewer->render("Products/new.mvc.php");

    }

    public function create()
    {
        $data = [
            "name" => $this->request->post["name"],
            "description" => empty($this->request->post["description"]) ? null : $this->request->post["description"]
        ];

        if ($this->model->insert($data)) {
            header("Location: /products/show/{$this->model->getInsertId()}");
            exit;
        } else {
            echo $this->viewer->render("Products/new.mvc.php", [
              "errors" => $this->model->getErrors(),
              "product" => $data
            ]);
        }
    }

    public function update(string $id)
    {
        $product = $this->getProduct($id);

        $product["name"] = $this->request->post["name"];
        $product["description"] = empty($this->request->post["description"]) ? null : $this->request->post["description"];

        if ($this->model->update($id, $product)) {
            header("Location: /products/show/{$id}");
            exit;
        } else {
            echo $this->viewer->render("Products/edit.mvc.php", [
              "errors" => $this->model->getErrors(),
              "product" => $product
            ]);
        }
    }

    public function delete(string $id)
    {
        $product = $this->getProduct($id);

        echo $this->viewer->render("Products/delete.mvc.php", [
            "product" => $product
        ]);
    }

    public function destroy(string $id)
    {
        $product = $this->getProduct($id);

        $this->model->delete($id);
        header("Location: /products/index");
        exit;
    }
}
