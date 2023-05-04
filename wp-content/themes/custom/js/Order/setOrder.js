/*
    {
        "user": 1,
        "products": [
            {"id": 1, "quantity": 2},
            {"id": 2, "quantity": 1}
        ]
    }
*/
function setOrder(user, via, cap, citta, prov)
{
    cart = getUserCart(user);
    let products = [];
    let check = false;
    cart.forEach(product => {
        if (product.quantity > product.prod_quantity)
        {
            check = true;
            return "";
        }
        products.push({"id": product.id, "quantity": product.quantity})
    });

    let res = "";
    if (!check)
    {
        $.ajax({
            url: `/Negozio_GPOI/backend/API/order/setOrder.php`,
            type: 'POST',
            headers : {'Content-Type':'application/json; charset=utf-8'},
            dataType: 'json',
            async: false,
            data: 
               JSON.stringify({
                    user: user,
                    products: products,
                    city: citta, 
                    province: prov,
                    route: via,
                    cap: cap
                }),
            success: function (data) {
                console.log(data);
                cart.forEach(product => {
                    if (product.quantity <= product.prod_quantity)
                    {
                        subtractProductQuantity(product.id, product.quantity)
                    }
                });
                deleteUserCart(user);
                res = data;
            },
            error: function (error) {
                res = "400";
            }
        });
    }
    return res;
}

function subtractProductQuantity(id, quantity)
{
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/product/subtractProductQuantity.php`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        async: false,
        data: 
           JSON.stringify({
                id: id,
                quantity: quantity
            }),
        success: function (data) {
            res = data;
            text.innerHTML -= parseInt(quantity);
        },
        error: function (error) {
            res = "400";
        }
    });
    return res;
}