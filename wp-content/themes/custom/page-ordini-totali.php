<?php
require_once('page.php');

if (!isAdmin()) :
    echo ('<script>
        location.href = "/Negozio_GPOI"
    </script>');
    die();
endif;

?>

<div class="orders-cont container">
    
</div>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Order/getArchiveOrders.js"></script>

<script>
    let orders = getArchiveOrders();

    orders.forEach((order) => {
        let orderDiv = document.createElement('div');
        orderDiv.classList = 'col-12 order-container mt-3 mb-4 p-3';
        orderDiv.innerHTML = `<div class="p-cont" onclick=changeLocation(${order.id})>
                                <a class="a-cat" href="/Negozio_GPOI/amministrazione-ordine?id=${order.id}">Numero Ordine: ${order.id}</a>
                                <div>
                                    <span>Data: ${order.date_order}</span>
                                </div>
                            </div>`;
        document.querySelector('.orders-cont').appendChild(orderDiv);
    });

    function changeLocation(id)
    {
        location.href = `/Negozio_GPOI/amministrazione-ordine?id=${id}`;
    }    
</script>