function getUserCart(id) {
    let result = "";
    
    $.ajax({
        url: `/Negozio_GPOI/backend/API/cart/getUserCart.php?user_id=${id}`,
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
