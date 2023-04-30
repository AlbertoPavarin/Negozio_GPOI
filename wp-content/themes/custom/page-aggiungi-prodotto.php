<?php
require_once('page.php');

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
        Errore nella creazione del prodotto
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
        Prodotto aggiunto
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/CategoryProduct/setCategoryProduct.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/setProduct.js"></script>
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
                    <label for="price">Prezzo</label>
                    <input class="form-control" type="text" onkeypress="return validateNumber(event)" id="price" name="price">
                </div><hr>

                <div class="justify-content-center insert-input mt-3">
                    <label for="quantity">Quantità</label>
                    <input class="form-control" type="text" onkeypress="return validateNumber(event)" id="quantity" name="quantity">
                </div><hr>

                <p class="col-12">Categorie</p>
                <div class="cats-cont"></div>

                <input type="button" value="Aggiungi prodotto" id="add-prod" class="btn btn-primary mt-3 w-100">

            </form>
        </div>
    </div>
</div>

<script>
    function validateNumber(event)
    {
      if (event.charCode > 31 && (event.charCode < 49 || event.charCode > 57))
        return false;
      else
        return true;
    }
    let inputName = document.querySelector('#name');

    let inputDescription = document.querySelector('#description');

    let inputPrice = document.querySelector('#price');

    let inputQuantity = document.querySelector('#quantity');

    let categories = getActiveCategories();
    
    categories.forEach((category) => {
    let catDiv = document.createElement('div');
    catDiv.classList = "col-12";
    catDiv.innerHTML = `<input type="checkbox" id="check-cont" name="prod-sel" value="${category.id}">
                          <label class="mb-3" for="prod-sel">${category.name}</label><br>`;

      document.querySelector('.cats-cont').appendChild(catDiv);
    });

    document.querySelector('#add-prod').onclick = () => {
      let checks = document.querySelectorAll('input[name=prod-sel]:checked');

      let response = setProduct(inputName.value, inputDescription.value, inputPrice.value, inputQuantity.value);
      if (response == "400")
      {
          var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
          myModal.show();
      }
      else
      {
        checks.forEach((check) => {
            setCategoryProduct(response["product_id"], check.value);
          });
        
          var myModal = new bootstrap.Modal(document.getElementById('successModal'));
          myModal.show();

      }
    };
</script>