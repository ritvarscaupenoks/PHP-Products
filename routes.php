<?php

$router->get('/', 'Controllers/ProductsController.php', "index");
$router->get('/addproduct', 'Controllers/ProductsController.php', "create");
$router->post('/', 'Controllers/ProductsController.php', "store");
$router->post('/delete', 'Controllers/ProductsController.php', "delete");










