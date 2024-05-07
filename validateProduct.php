<?php

require __DIR__ . "/vendor/autoload.php";

use App\Controllers\ProductsController;

$productsController = new ProductsController();

$errorMessages = $productsController->validate($_POST);

foreach ($errorMessages as $message) {
    echo $message . "<br>";
}