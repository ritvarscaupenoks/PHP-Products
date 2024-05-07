<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Product List</title>
</head>

<body>

    <div class="header">
        <h2>Product List</h2>
        <div class="btn-group">
            <a href="/addproduct">
                <button class="btn-add">ADD</button>
            </a>
            <button class="btn-delete" form="delete_product" type="submit" id="delete_product_btn">MASS DELETE</button>
        </div>
    </div>

    <hr>

    <form id="delete_product" action="/delete" method="POST">
    <div class="products">
        <?php foreach ($products as $product) : ?>
            <div class="product">
                <input class="delete-checkbox" type="checkbox" name="delete[]" value="<?= $product->getid() ?>">
                <p><?= $product->getSku() ?></p>
                <p><?= $product->getName() ?></p>
                <p><?= $product->getPrice() ?></p>
                <p><?= $product->getType() ?></p>
                <p><?= $product->getSpecialAttribute() ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    </form>
</body>

</html>