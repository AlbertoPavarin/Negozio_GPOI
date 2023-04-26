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

<div class="container-fluid">
    <div class="row justify-content-center text-center">
        <div class="col-6 insert-form">
            <form class="justify-content-center mt-3" id="form-insert-device">

                <div class="justify-content-center insert-input">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="justify-content-center insert-input mt-3">
                    <label for="description">Descrizione</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>

                <label class="mt-3" for="name">Categoria</label>
                <div class="d-flex justify-content-center insert-input">
                    <select name="classs" id="class-select" class="form-select"></select>
                </div>

                <div id="cont-sel"></div>
                <input type="button" value="Modifica prodotto" id="create-dev" class="btn btn-primary mt-3 w-100" onclick="">
                <p id="error-msg"></p>
            </form>
        </div>
    </div>
</div>

<script>
    let product = getProduct(<?php echo $_GET["id"] ?>);
    console.log(product);
</script>