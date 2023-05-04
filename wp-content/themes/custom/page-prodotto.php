<?php
require_once('page.php');

if (empty($_GET["id"]))
{
    die("Errore nel caricamento del prodotto");
}
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
        Prodotto già presente nel carrello
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-modal" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Successo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Prodotto inserito nel carrello
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-modal" data-bs-dismiss="modal">Chiudi</button>
        <button type="button" class="btn btn-modal" data-bs-dismiss="modal" onclick="goToCart()">Vai al carrello</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/getProduct.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/updateProductQuantity.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/setCart.js"></script>

<div class="container">
    <div class="row prod-container">
        <div class="col-12 col-md-12 col-lg-5 d-flex align-items-center img-div">
        </div>
        <div class="col-12 col-md-12 col-lg-7 col-xl-7 name-cart-prod mt-5">
          <div class="prod-name"></div>
          <div class="col-12 col-md-4 prod-price mt-4 mb-4"></div>
          <div class="row">
            <div class="col-12 col-md-12 prod-cart"></div>
              <div class="col-12 col-md-12 cart-btn d-flex align-items-center ml-2 mt-3 mb-5"></div>
          </div>
        </div>
    </div>
</div>

<script>
    let product = getProduct(<?php echo $_GET["id"] ?>);

    document.querySelector('.prod-name').innerHTML = `<div class="col-12">
                                                          <h3>${product.nome}</h3>
                                                      </div>`;

    const imgDiv = document.createElement('div');
    imgDiv.innerHTML = `<img src="/Negozio_GPOI/wp-content/themes/custom/assets/img/img_product/${product.img_name}" alt="" srcset="" class="img-prod">`;
    document.querySelector('.img-div').appendChild(imgDiv);

    const descDiv = document.createElement('div');
    descDiv.classList = "mt-4";
    descDiv.innerHTML = `${product.description}<hr>`;
    document.querySelector('.prod-container').appendChild(descDiv);

    const priceDiv = document.createElement('div');
    priceDiv.innerHTML = `<h6>${product.price}€</h6>
                          <p class="mt-5">Quantità: ${product.quantity}</p>`;
    document.querySelector('.prod-price').appendChild(priceDiv);


    const amountDiv = document.createElement('div');
    amountDiv.classList = "d-flex align-items-center justify-content-center mt-4"
    amountDiv.innerHTML = `<div id="minus-btn-${product.id}" class="col-4 d-flex justify-content-center align-items-center minus-btn" onclick=deleteItem(${product.id})>-</div>
                           <div id="text-${product.id}" class="col-4 d-flex justify-content-center align-items-center quant-cont">1</div>
                           <div id="plus-btn-${product.id}" class="col-4 pr-2 d-flex justify-content-center align-items-center plus-btn" onclick="addItem(${product.id}, ${product.quantity})">+</div>`;
    document.querySelector('.prod-cart').appendChild(amountDiv);
    <?php if(is_user_logged_in()): ?>
      if (product.quantity > 0) {
        const cartBtn = document.createElement('button');
        cartBtn.classList = "btn col-12 col-md-12 cart-prod-btn";
        cartBtn.innerHTML = `Aggiungi al carrello`;
        cartBtn.onclick = () => {
            res = setCart(<?php echo $user->id ?>, product.id);
            if (res == "400")
            {
                var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
                console.log(myModal);
                myModal.show();
            }
            else
            {
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                console.log(myModal);
                myModal.show();
            }
        }
        document.querySelector('.cart-btn').appendChild(cartBtn);
      }
      else
      {
        const notAvDiv = document.createElement('div');
        notAvDiv.classList = "mt-2";
        notAvDiv.innerHTML = "Prodotto non disponibile";
        document.querySelector('.cart-btn').appendChild(notAvDiv);
      }
    <?php endif; ?>

    function goToCart() {
      location.href = "/Negozio_GPOI/carrello";
    }
</script>