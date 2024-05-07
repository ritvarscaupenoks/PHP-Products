<!DOCTYPE html>
<html>

<head>
    <title>Product Add</title>
    <link rel="stylesheet" href="/style.css">
    <script src="/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <body>
        <div class="header">
            <h2>Product Add</h2>
            <div class="btn-group">
                <button class="btn-save" form="product_form" type="submit">Save</button>
                <button class="btn-cancel" onclick="cancel()">Cancel</button>
            </div>
        </div>
        <hr>

        <div class="form-container">
            <form id="product_form" action="/" method="POST">
                <label for="sku">SKU</label>
                <input id="sku" type="text" name="sku"><br>

                <label for="name">Name</label>
                <input id="name" type="text" name="name"><br>

                <label for="price">Price ($)</label>
                <input id="price" type="text" name="price"><br>

                <label for="productType">Type switcher</label>
                <select id="productType" name="type">
                    <option value="">Select Type</option>
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>

                <div class="attributes" id="dvdAttributes" style="display: none;">
                    <label for="size">Size (MB)</label>
                    <input id="size" type="text" name="special_attribute[]">
                </div>

                <div class="attributes" id="bookAttributes" style="display: none;">
                    <label for="weight">Weight (KG)</label>
                    <input id="weight" type="text" name="special_attribute[]">
                </div>

                <div class="attributes" id="furnitureAttributes" style="display: none;">
                    <label for="length">Length (CM)</label>
                    <input id="length" type="text" name="special_attribute[]"><br>
                    <label for="width">Width (CM)</label>
                    <input id="width" type="text" name="special_attribute[]"><br>
                    <label for="height">Height (CM)</label>
                    <input id="height" type="text" name="special_attribute[]"><br>
                </div>
                <p id="message" class="errors"></p>
            </form>
        </div>
    </body>

</html>