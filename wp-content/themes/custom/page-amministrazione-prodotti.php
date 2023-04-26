<?php
require_once('page.php');

if (!isAdmin()) :
    echo ('<script>
        location.href = "/Negozio_GPOI"
    </script>');
    die();
endif;
?>

<div class="prods-cont container">
    <h5>Prodotti</h5>
</div>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/getActiveProducts.js"></script>

<script>
    let products = getActiveProducts();

    products.forEach((product) => {
        const prodDiv = document.createElement('div');
        prodDiv.classList = 'col-12 product-container mt-3 mb-4 p-3';
        prodDiv.innerHTML = `<div class="p-cont">
                                    <a class="a-cat" href="/Negozio_GPOI/modifica-prodotto?id=${product.id}">${product.nome}</a>
                                    <div>
                                        <span id="price-${product.id}">${product.price}</span>€
                                    </div>
                                </div>
                                <div class="p-2 prod">
                                    <span id="text-${product.id}" class="">Quantità: ${product.quantity}</span>
                                </div>`;
        document.querySelector('.prods-cont').appendChild(prodDiv);
    });
</script>