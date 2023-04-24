function getProductsByOrder(id)
{
    let result = "";
    
    $.ajax({
        url: `/Negozio_GPOI/backend/API/product_order/getProductsByOrder.php?order_id=${id}`,
        type: 'GET',
        dataType: 'json',
        async: false,
        success: (data) => {
            result = data;
        },
        error: () => {
            result = "404";
        }
    });

    return result;
}