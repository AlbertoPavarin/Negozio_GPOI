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

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/getProduct.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Products/updateProduct.js"></script>

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

                <label class="mt-3" for="name">Categoria</label>
                <div class="d-flex justify-content-center insert-input">
                    <select name="classs" id="class-select" class="form-select"></select>
                </div>

                <div id="cont-sel"></div>
                <input type="button" value="Modifica prodotto" id="update-prod" class="btn btn-primary mt-3 w-100">
                <p id="error-msg"></p>
            </form>
        </div>
    </div>
</div>

<script>
    let product = getProduct(<?php echo $_GET["id"] ?>);
    console.log(product);

    let inputName = document.querySelector('#name');
    inputName.value = product.nome;

    let inputDescription = document.querySelector('#description');
    inputDescription.value = product.description;

    let inputPrice = document.querySelector('#price');
    inputPrice.value = product.price;

    let btnUpdate = document.querySelector('#update-prod');
    btnUpdate.onclick = () => {
        updateProduct(product.id, inputName.value, inputDescription.value, inputPrice.value, product.quantity);
    }
</script>