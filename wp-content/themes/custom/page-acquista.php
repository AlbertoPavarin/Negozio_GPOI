<?php
require_once('page.php');

if (!is_user_logged_in())
{
    echo ('<script>
        location.href = "/Negozio_GPOI/login"
    </script>');
}
?>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/getUserCart.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Order/setOrder.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/deleteUserCart.js"></script>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Errore</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Errore nell'ordinazione
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-modal" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<!-- ErrorCart Modal -->
<div class="modal fade" id="errorCartModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Errore</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            Inserisci tutti i dati
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="returnToHome()"></button>
      </div>
      <div class="modal-body">
        Grazie per l'acquisto
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-modal" data-bs-dismiss="modal" onclick="returnToHome()">Chiudi</button>
      </div>
    </div>
  </div>
</div>

<div class="mb-4">
    <div class="col-12 title-img d-flex align-items-center justify-content-center">
        <h2 class="title">Cassa</h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <h6>Dettagli di fatturazione</h6>
        <div class="col-12 col-md-5 mb-5">
            <form action="" class="">
                <label for="via" class="mt-3">Via e numero civico</label>
                <input type="text" class="form-control input-cassa via" required name="via">
                <label for="cap" class="mt-3">C.A.P</label>
                <input type="number" class="form-control input-cassa cap" required name="cap">
                <label for="city" class="mt-3">Città</label>
                <input type="text" class="form-control input-cassa city" required name="city">
                <label for="provincia" class="mt-3">Provincia</label>
                <input type="text" class="form-control input-cassa provincia" required name="provincia">
            </form>
        </div>
        <div class="col-12 col-md-3"></div>
        <div class="col-12 col-md-4">
            <div class="col-12 mb-3 total-div">
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
    });

    document.querySelector('#shop-btn').onclick = () => {
        let via = document.querySelector('.via');
        let cap = document.querySelector('.cap');
        let citta = document.querySelector('.city');
        let prov = document.querySelector('.provincia');

        if (via.value.length == 0, cap.value.length == 0, citta.value.length == 0, prov.value.length == 0)
        {
            var myModal = new bootstrap.Modal(document.getElementById('errorCartModal'));
            myModal.show();
        }
        else
        {
            let res = setOrder(<?php echo $user->id ?>, via.value, cap.value, citta.value, prov.value);

            if (res == "" || res == "404")
            {
                var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
                myModal.show();
            }
            else
            {
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                myModal.show();
            }
        }
    }

    document.querySelector('.cart-price').innerHTML = `${total.toFixed(2)}€`;

    checkPrice();

    document.querySelector('.shipment-price').innerHTML = `${shipment}€`;

    function returnToHome()
    {
        location.href = "/Negozio_GPOI";
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