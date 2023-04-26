function updateOrderStatus(order_id, status_id)
{
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/order/updateOrderStatus.php`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        async: false,
        data: 
           JSON.stringify({
                id: order_id,
                status: status_id
            }),
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            res = "400";
        }
    });
    return res;
}