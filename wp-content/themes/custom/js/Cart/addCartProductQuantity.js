function addCartProductQuantity(user, prod)
{
    // manca cambio valore quantità e prezzo nella pagina
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/cart/addCartProductQuantity.php`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        async: false,
        data: 
           JSON.stringify({
                user: user,
                product: prod,
                quantity: 1
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