<?php
require_once('page.php');

?>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Errore</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Prodotto non disponibile
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/getUserCart.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/addCartProductQuantity.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/subtractCartProductQuantity.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Order/setOrder.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/deleteUserCart.js"></script>

<div class="container">
    <div class = "prods-cont">
        <div class="row info-cart">
            <div class="col-6 text-center">
                <h5>Prodotto</h5>
            </div>
            <div class="col-3 text-center">
                <h5>Prezzo</h5>
            </div>
            <div class="col-3 text-center">
                <h5>Quantità</h5>
            </div>
        </div>
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <button id="shop-btn" type="submit" class="btn btn-primary w-100">Acquista</button>
        </div>
    </div>
</div>

<script>
    let products = getUserCart(<?php echo $user->id ?>);
    if (products["Message"] == 'No record'){
        document.querySelector('.prods-cont').innerHTML = "<h4>Nessun prodotto nel carrello</h4>";
        $("#shop-btn").hide();
        throw new Error("Nessun prodotto");
    }

    products.forEach((product) => {
        const catDiv = document.createElement('div');
        catDiv.innerHTML = `<div class="row product-container mt-3 mb-4 p-3">
                                <div class="p-cont col-12 col-md-6" onclick=changeLocation(${product.id})>
                                    <img src="https://bioapinatura.com/wp-content/uploads/2020/02/LAGO-DI-GARDA-LIMONE.jpg" class="cart-img-prod" alt="">
                                    <a class="a-cat" href="/Negozio_GPOI/prodotto?id=${product.id}">${product.nome}</a>
                                </div>
                                <div class="col-12 col-md-3 mt-4">
                                    <span id="price-${product.id}">${product.total_price}</span>€
                                </div>
                                <div class="prod col-12 col-md-3 mt-4">
                                    <span id="minus-btn-${product.id}" class="minus-btn" onclick="subtractCartProductQuantity(${product.id}, <?php echo $user->id ?>, ${product.price})">-</span>
                                    <span id="text-${product.id}" class="quant-cont p-1">${product.quantity}</span>
                                    <span id="plus-btn-${product.id}" class="plus-btn" onclick="addCartProductQuantity(${product.id}, <?php echo $user->id ?>, ${product.price})">+</span>
                                </div>
                            </div>
                            <hr>`;
        document.querySelector('.prods-cont').appendChild(catDiv);
    });

    document.querySelector('#shop-btn').onclick = () => {
        if (setOrder(<?php echo $user->id ?>, products) == "")
        {
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
            myModal.show();
        }
    }

    function changeLocation(id)
    {
        location.href = `/Negozio_GPOI/prodotto?id=${id}`;
    }
</script>