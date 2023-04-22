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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/getProduct.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/updateProductQuantity.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/setCart.js"></script>

<div class="container">
    <div class="row prod-container">
        <div class="col-4 col-md-4 d-flex align-items-center">
            <img src="https://bioapinatura.com/wp-content/uploads/2020/02/LAGO-DI-GARDA-LIMONE.jpg" alt="" srcset="" class="img-prod">
        </div>
        <div class="col-12 col-md-5 d-flex align-items-center prod-name"></div>
    </div>
</div>

<script>
    let product = getProduct(<?php echo $_GET["id"] ?>);

    document.querySelector('.prod-name').innerHTML = `<div class="col-12">
                                                          <h3>${product.nome}</h3>
                                                      </div>`;
    const descDiv = document.createElement('div');
    descDiv.innerHTML = `${product.description}<hr>`;
    document.querySelector('.prod-container').appendChild(descDiv);

    const priceDiv = document.createElement('div');
    priceDiv.innerHTML = `<h6>${product.price}€</h6><hr><h6>Quantity: ${product.quantity}</h6>`;
    document.querySelector('.prod-container').appendChild(priceDiv);

    const amountDiv = document.createElement('div');
    amountDiv.classList = "d-flex align-items-center justify-content-center mt-4"
    amountDiv.innerHTML = `<div id="minus-btn-${product.id}" class="col-4 d-flex justify-content-center align-items-center minus" onclick=deleteItem(${product.id})>-</div>
                           <div id="text-${product.id}" class="col-4 d-flex justify-content-center align-items-center">1</div>
                           <div id="plus-btn-${product.id}" class="col-4 pr-2 d-flex justify-content-center align-items-center plus" onclick="addItem(${product.id}, ${product.quantity})">+</div>`;
    document.querySelector('.prod-container').appendChild(amountDiv);

    const cartBtn = document.createElement('button');
    cartBtn.classList = "btn btn-secondary mt-3";
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
    document.querySelector('.prod-container').appendChild(cartBtn);
</script>