function cancel() {
    window.location.href = '/';
}

document.addEventListener('DOMContentLoaded', function () {
    function showAttributes() {
        var productType = document.getElementById('productType').value;
        var attributeDivs = document.querySelectorAll('.attributes');

        attributeDivs.forEach(function (div) {
            div.style.display = 'none';
        });

        var attributeDiv = document.getElementById(productType.toLowerCase() + 'Attributes');
        if (attributeDiv) {
            attributeDiv.style.display = 'block';
        }
    }

    document.getElementById('productType').addEventListener('change', showAttributes);

    $(document).ready(function () {

        $("#productType").change(function() {
            let type = $(this).val();
            let message = '';
    
            if (type === 'DVD') {
                message = "Please, provide size!";
            } else if (type === 'Book') {
                message = "Please, provide weight!";
            } else if (type === 'Furniture') {
                message = "Please, provide dimensions in HxWxL!";
            }
    
            $("#message").html(message);
        });

        $("#product_form").submit(function (event) {
            event.preventDefault();

            let sku = $("#sku").val();
            let name = $("#name").val();
            let price = $("#price").val();
            let type = $("#productType").val();
            let special_attribute = [];

            $("input[name='special_attribute[]']").each(function () {
                special_attribute.push($(this).val());
            });

            $.ajax({
                url: '/validateProduct.php',
                type: 'POST',
                data: {
                    "sku": sku,
                    "name": name,
                    "price": price,
                    "type": type,
                    "special_attribute": special_attribute
                },
                dataType: "text",
                success: function (response) {
                    $("#message").html(response);
                    console.log(response);
                    if (response === '') {
                        $("#product_form")[0].submit();
                    }
                }
            });
        });
    });
})

