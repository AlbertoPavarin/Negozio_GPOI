<?php
require_once('page.php');

if (empty($_GET["id"]))
{
    die("Errore nel caricamento del catalogo");
}
?>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/CategoryProducts/getActiveProductsByCategory.js"></script>

<script>
    let products = getActiveProductsByCategory(<?php echo $_GET["id"] ?>);
</script>

<div class="container">
    <div class="row prods-cont">
        <script>
            let i = 0;
            products.forEach((product) => {
                const catDiv = document.createElement('div');
                catDiv.classList = "col-md-5 product-container mt-3 mb-4 p-3";
                catDiv.innerHTML = `<a class="a-cat" href="/Negozio_GPOI/prodotto?id=${product.id}">${product.nome}</a>
                                    <p>${product.price}€</p>`;
                catDiv.onclick = () => {
                    location.href = `/Negozio_GPOI/prodotto?id=${product.id}`;
                };
                document.querySelector('.prods-cont').appendChild(catDiv);
                if (i % 2 == 0) {
                    const catDivc = document.createElement('div');
                    catDivc.classList = "col-md-2";
                    document.querySelector('.prods-cont').appendChild(catDivc);
                }
                i += 1;
            })
        </script>
    </div> 
</div>
