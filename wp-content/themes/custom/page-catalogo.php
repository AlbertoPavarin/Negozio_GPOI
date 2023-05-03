<?php
require_once('page.php');

if (empty($_GET["id"]))
{
    die("Errore nel caricamento del catalogo");
}
?>

<div class="">
    <div class="col-12 title-img d-flex align-items-center justify-content-center">
        <h2 class="title"></h2>
    </div>
</div>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/CategoryProducts/getActiveProductsByCategory.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Category/getCategory.js"></script>

<script>
    let category = getCategory(<?php echo $_GET["id"] ?>);
    document.querySelector('.title').innerHTML = category.name.charAt(0).toUpperCase() + category.name.slice(1);
    let products = getActiveProductsByCategory(<?php echo $_GET["id"] ?>);
</script>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-4 col-xl-4 col-12 order-sm-2 order-2 order-md-1 mt-5 most-vote">
            <h5>Il più votato</h5>
        </div>
        <div class="col-md-8 col-xl-8 col-12 order-sm-1 order-1 order-md-2">
            <div class="row prods-cont">
                <script>
                    let votedDiv = document.createElement('div');
                    votedDiv.classList = "voted-div"
                    votedDiv.innerHTML += `<div class="col-md-5 col-xl-5 col-12 container-img-prod">
                                                <img src="https://bioapinatura.com/wp-content/uploads/2020/02/LAGO-DI-GARDA-LIMONE.jpg" class="img-prod-voted" alt="">
                                            </div>
                                            <div class="product-cont col-md-8 col-xl-8 col-12">
                                                ${products[0].nome.toUpperCase()}
                                                <hr>
                                            </div>
                                            `;
                    votedDiv.onclick = () => {
                        location.href = `/Negozio_GPOI/prodotto?id=${products[0].id}`;
                    }
                    document.querySelector('.most-vote').appendChild(votedDiv);
                    products.forEach((product) => {
                        const catDiv = document.createElement('div');
                        catDiv.classList = "product-container col-xl-4 col-md-4 mb-3";
                        catDiv.innerHTML = `<img src="https://bioapinatura.com/wp-content/uploads/2020/02/LAGO-DI-GARDA-LIMONE.jpg" class="img-prod-cat col-12" alt="">
                                            <a class="a-cat" href="/Negozio_GPOI/prodotto?id=${product.id}">${product.nome}</a>
                                            <p>${product.price}€</p>`;
                        if (product.quantity <= 0)
                        {
                            catDiv.innerHTML += "<p>Non disponibile</p>";
                        }
                        catDiv.onclick = () => {
                            location.href = `/Negozio_GPOI/prodotto?id=${product.id}`;
                        };
                        document.querySelector('.prods-cont').appendChild(catDiv);
                    });
                </script>
            </div>
        </div> 
    </div>
</div>