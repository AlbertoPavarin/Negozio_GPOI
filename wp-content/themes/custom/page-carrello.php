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
        <button type="button" class="btn btn-modal" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/getUserCart.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/addCartProductQuantity.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/subtractCartProductQuantity.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Order/setOrder.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/deleteUserCart.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/deleteCartProduct.js"></script>

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
    <div class="row info-cart-price">
        <div class="col-12 col-md-5 offset-md-7 mb-3 total-div">
            <div class="col-12 mb-2">
                <b>Totale carrello</b>
            </div>
            <div class="row total-price-div p-2">
                <div class="col-6">
                    Prezzo 
                </div>
                <div class="col-6 cart-price">
                     
                </div>
            </div>
            <div class="row shipment-div p-2">
                <div class="col-6">
                    Spedizione 
                </div>
                <div class="col-6 cart-price shipment-price">
                    Prezzo 
                </div>
            </div>
            <div class="row total-price-div p-2 mb-3">
                <div class="col-6">
                    Totale 
                </div>
                <div class="col-6 cart-price cart-total-price-value">
                    Prezzo 
                </div>
            </div>
            <div class="col-12">
                <button id="shop-btn" type="submit" class="btn w-100">Acquista</button>
            </div>
        </div>
    </div>
</div>

<script>
    let products = getUserCart(<?php echo $user->id ?>);
    if (products["Message"] == 'No record'){
        document.querySelector('.prods-cont').innerHTML = "<br><h4>Nessun prodotto nel carrello</h4>";
        $("#shop-btn").hide();
        $(".info-cart-price").hide();
        throw new Error("Nessun prodotto");
    }

    let total = 0;
    let shipment = 0;
    let totalCart = 0;

    products.forEach((product) => {
        total += product.price * product.quantity;
        const catDiv = document.createElement('div');
        catDiv.innerHTML = `<div class="row product-container mt-3 mb-4 p-3">
                                <div class = "col-12 col-md-1 mt-4 delete-btn" onclick="deleteCartProduct(${product.id}, <?php echo $user->id ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>  
                                </div>
                                <div class="p-cont col-12 col-md-2" onclick=changeLocation(${product.id})>
                                    <img src="https://bioapinatura.com/wp-content/uploads/2020/02/LAGO-DI-GARDA-LIMONE.jpg" class="cart-img-prod" alt="">
                                </div>
                                <div class="p-cont col-12 col-md-3 mt-4" onclick=changeLocation(${product.id})>
                                    <a class="a-cat prod-name-cart" href="/Negozio_GPOI/prodotto?id=${product.id}">${product.nome}</a>
                                </div>
                                <div class="col-12 col-md-3 mt-4 prod-price-cont">
                                    <span id="price-${product.id}" class="">${product.total_price}</span>€
                                </div>
                                <div class="prod col-12 col-md-3 mt-4">
                                    <span id="minus-btn-${product.id}" class="minus-btn">-</span>
                                    <span id="text-${product.id}" class="quant-cont p-3">${product.quantity}</span>
                                    <span id="plus-btn-${product.id}" class="plus-btn" onclick="addCartProductQuantity(${product.id}, <?php echo $user->id ?>, ${product.price})">+</span>
                                </div>
                            </div>
                            <hr>`;

        document.querySelector('.prods-cont').appendChild(catDiv);

        document.querySelector(`#minus-btn-${product.id}`).onclick = () => {
            subtractCartProductQuantity(product.id, <?php echo $user->id ?>, product.price);
            total -= product.price;
            checkPrice(total);
            document.querySelector('.cart-price').innerHTML = `${total.toFixed(2)}€`;
        };

        document.querySelector(`#plus-btn-${product.id}`).onclick = () => {
            addCartProductQuantity(product.id, <?php echo $user->id ?>, product.price);
            total += parseFloat(product.price);
            checkPrice(total);
            document.querySelector('.cart-price').innerHTML = `${total.toFixed(2)}€`;
        };
    });

    document.querySelector('.cart-price').innerHTML = `${total.toFixed(2)}€`;

    checkPrice();

    document.querySelector('.shipment-price').innerHTML = `${shipment}€`;

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

    function checkPrice()
    {
        totalCart = total;
        if (total < 50)
        {
            shipment = 2;
            document.querySelector('.shipment-price').innerHTML = `${shipment}€`;
            totalCart += 2;
            document.querySelector('.cart-total-price-value').innerHTML = `${totalCart.toFixed(2)}€`;
        }
        else
        {
            shipment = 0;
            document.querySelector('.shipment-price').innerHTML = `${shipment}€`;
            document.querySelector('.cart-total-price-value').innerHTML = `${total.toFixed(2)}€`;
        }
    }
</script>