function getArchiveOrders()
{
    let result = "";
    
    $.ajax({
        url: `/Negozio_GPOI/backend/API/order/getArchiveOrders.php`,
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