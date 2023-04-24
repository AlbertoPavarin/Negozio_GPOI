function getArchiveOrdersByUser(user)
{
    let result = "";
    
    $.ajax({
        url: `/Negozio_GPOI/backend/API/order/getArchiveOrdersByUser.php?user_id=${user}`,
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