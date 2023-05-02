function deleteCartProduct(product, user) {
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/cart/deleteCartProduct.php`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        async: false,
        data: 
           JSON.stringify({
                user: user,
                product: product
            }),
        success: function (data) {
            console.log(data);
            location.reload();
        },
        error: function (error) {
            res = "400";
        }
    });
    return res;
}