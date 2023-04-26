<?php
require_once('page.php');

if (empty($_GET["id"]))
{
    die("Errore nel caricamento dell'ordine");
}

if (!isAdmin()) :
    echo ('<script>
        location.href = "/Negozio_GPOI"
    </script>');
    die();
endif;
?>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Order/getOrder.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Status/getStatus.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/ProductsOrder/getProductsByOrder.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Status/updateOrderStatus.js"></script>

<div class="order-cont container">
    <div class="row">
        <div class="col-12"><h4>Numero ordine: <?php echo $_GET["id"] ?></h4></div>
        <div class="col-12"><p class="timestamp">Data: </p><hr></div>
        <div class="col-12"><p class="status">Stato ordine: </p></div>
    </div>
    <div class="prods-cont">
        <h5>Prodotti</h5>
    </div>
    <hr>
    <div class="btn-cont">

    </div>
</div>

<script>
    let order = getOrder(<?php echo $_GET['id'] ?>);
    document.querySelector('.timestamp').innerHTML += order.date_order;
    document.querySelector('.status').innerHTML += getStatus(order.status).description;

    if (order.status != 2)
        document.querySelector('.btn-cont').innerHTML = `<input type="submit" class="btn btn-primary btn-block col-12" value="Concludi" onclick='updateOrderStatus(<?php echo $_GET["id"] ?>, 2)'></input>`;
    else
        document.querySelector('.btn-cont').innerHTML = `<h4>Ordine già concluso</h4>`;

    let products = getProductsByOrder(<?php echo $_GET["id"] ?>);

    products.forEach((product) => {
        const prodDiv = document.createElement('div');
        prodDiv.classList = 'col-12 product-container mt-3 mb-4 p-3';
        prodDiv.innerHTML = `<div class="p-cont">
                                    <a class="a-cat" href="/Negozio_GPOI/prodotto?id=${product.id}">${product.nome}</a>
                                    <div>
                                        <span id="price-${product.id}">${product.total_price}</span>€
                                    </div>
                                </div>
                                <div class="p-2 prod">
                                    <span id="text-${product.id}" class="">Quantità: ${product.quantity}</span>
                                </div>`;
        document.querySelector('.prods-cont').appendChild(prodDiv);
    });
</script>