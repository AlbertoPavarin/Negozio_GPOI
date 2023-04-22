function setCart(user, prod)
{
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/cart/setCart.php`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        async: false,
        data: 
           JSON.stringify({
                user: user,
                product: prod,
                quantity: document.querySelector(`#text-${prod}`).innerHTML
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