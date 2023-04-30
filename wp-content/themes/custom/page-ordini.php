<?php
require_once('page.php');
?>

<script type="text/javascript" src="/Negozio_GPOI/wp-content/themes/custom/js/Order/getArchiveOrdersByUser.js"></script>

<div class="orders-cont container">
    
</div>

<script>
    let orders = getArchiveOrdersByUser(<?php echo $user->id ?>);

    orders.forEach((order) => {
        let orderDiv = document.createElement('div');
        orderDiv.classList = 'col-12 order-container mt-3 mb-4 p-3';
        orderDiv.innerHTML = `<div class="p-cont" onclick=changeLocation(${order.id})>
                                <a class="a-cat" href="/Negozio_GPOI/ordine?id=${order.id}">Numero Ordine: ${order.id}</a>
                                <div>
                                    <span>Data: ${order.date_order}</span>
                                </div>
                            </div>`;
        document.querySelector('.orders-cont').appendChild(orderDiv);
    });

    function changeLocation(id)
    {
        location.href = `/Negozio_GPOI/ordine?id=${id}`;
    }
</script>   