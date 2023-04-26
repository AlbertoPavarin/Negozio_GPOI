<?php
require_once('page.php');

if (empty($_GET["id"]))
{
    die("Errore nel caricamento del prodotto");
}

if (!isAdmin()) :
    echo ('<script>
        location.href = "/Negozio_GPOI"
    </script>');
    die();
endif;

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
        Errore nella modifica del prodotto
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
        Prodotto modificato
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/getProduct.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/updateProduct.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Category/getActiveCategories.js"></script>

<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-0 insert-form">
            <form class="justify-content-center mt-3" id="form-insert-device">

                <div class="justify-content-center insert-input">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="justify-content-center insert-input mt-3">
                    <label for="description">Descrizione</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>

                <div class="justify-content-center insert-input mt-3">
                    <label for="description">Prezzo</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>

                <p class="mt-3">Categorie</p>

                <input type="button" value="Modifica prodotto" id="update-prod" class="btn btn-primary mt-3 w-100">

            </form>
        </div>
    </div>
</div>

<script>
    let product = getProduct(<?php echo $_GET["id"] ?>);

    let inputName = document.querySelector('#name');
    inputName.value = product.nome;

    let inputDescription = document.querySelector('#description');
    inputDescription.value = product.description;

    let inputPrice = document.querySelector('#price');
    inputPrice.value = product.price;

    let categories = getActiveCategories();
    console.log(categories);

    let btnUpdate = document.querySelector('#update-prod');
    btnUpdate.onclick = () => {
        let response = updateProduct(product.id, inputName.value, inputDescription.value, inputPrice.value, product.quantity);
        console.log(response);
        if (response["Response"] == false)
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
</script>