<?php

namespace App\Controllers;

use App\Core\Database;
use App\Traits\Validation;

class ProductsController
{
    use Validation;

    public function index()
    {
        $query = Database::getConnection()->prepare("SELECT * FROM products");
        $query->execute();

        $products = [];

        foreach ($query->fetchAll() as $productData) {


            $class = "App\\Models\\" . $productData["type"];
            $products[] = new $class(
                $productData["id"],
                $productData["sku"],
                $productData["name"],
                $productData["price"],
                $productData["type"],
                $productData["special_attribute"]
            );
        }
        return view("product_list.php", [
            "products" => $products
        ]);
    }

    public function store()
    {

        $store = Database::getConnection()->prepare("INSERT INTO products (sku, name, price, type, special_attribute) values (?,?,?,?,?)");
        $store->execute([
            $_POST["sku"],
            $_POST["name"],
            $_POST["price"],
            $_POST["type"],
            $this->getSpecialAttribute()
        ]);

        return redirect();
    }

    public function create()
    {
        return view("product_add.php");
    }

    public function delete()
    {
        if (isset($_POST["delete"])) {
            $products = $_POST["delete"];
            $delete = Database::getConnection()->prepare("DELETE FROM products WHERE id = ?");

            foreach ($products as $productId) {
                $delete->execute([$productId]);
            }
        }
        return redirect();
    }

    private function getSpecialAttribute()
    {
        $specialAttribute = [];

        foreach ($_POST["special_attribute"] as $attribute) {
            if (!empty($attribute)) {
                $specialAttribute[] = $attribute;
            }
        }

        return implode('x', $specialAttribute);
    }
}
