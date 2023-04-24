function getOrder(id)
{
    let result = "";
    
    $.ajax({
        url: `/Negozio_GPOI/backend/API/order/getOrder.php?id=${id}`,
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