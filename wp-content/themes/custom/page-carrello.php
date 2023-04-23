<?php
require_once('page.php');
?>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/getUserCart.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/addCartProductQuantity.js"></script>
<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Cart/subtractCartProductQuantity.js"></script>

<div class = "container prods-cont">
    
</div>

<script>
    let products = getUserCart(<?php echo $user->id ?>);
    console.log(products);

    products.forEach((product) => {
                const catDiv = document.createElement('div');
                catDiv.classList = "col-12 product-container mt-3 mb-4 p-3";
                catDiv.innerHTML = `<div class="p-cont" onclick=changeLocation(${product.id})>
                                        <a class="a-cat" href="/Negozio_GPOI/prodotto?id=${product.id}">${product.nome}</a>
                                        <p>${product.total_price}€</p>
                                    </div>
                                    <div class="p-2">
                                        <span id="minus-btn-${product.id}" class="minus-btn" onclick=subtractCartProductQuantity(${product.id}, <?php echo $user->id ?>)>-</span>
                                        <span id="text-${product.id}" class="">${product.quantity}</span>
                                        <span id="plus-btn-${product.id}" class="plus-btn" onclick="addCartProductQuantity(${product.id}, <?php echo $user->id ?>)">+</span>
                                    </div>`;
                document.querySelector('.prods-cont').appendChild(catDiv);
            });

    function changeLocation(id)
    {
        location.href = `/Negozio_GPOI/prodotto?id=${id}`;
    }
</script>