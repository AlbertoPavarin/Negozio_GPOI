/*
    {
        "user": 1,
        "products": [
            {"id": 1, "quantity": 2},
            {"id": 2, "quantity": 1}
        ]
    }
*/
function setOrder(user)
{
    cart = getUserCart(user);
    let products = [];
    cart.forEach(product => {
        products.push({"id": product.id, "quantity": product.quantity})
    });

    console.log(JSON.stringify(products));
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/order/setOrder.php`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        async: false,
        data: 
           JSON.stringify({
                user: user,
                products: products
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