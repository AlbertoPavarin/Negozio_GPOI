function subtractCartProductQuantity(prod, user, price)
{

    let res = "";
    let quantity = document.querySelector(`#text-${prod}`);
    if (quantity.innerHTML > 1)
    {
        $.ajax({
            url: `/Negozio_GPOI/backend/API/cart/subtractCartProductQuantity.php`,
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
            
                console.log("s");
                quantity.innerHTML = quantity.innerHTML - 1 
                let pricePar = document.querySelector(`#price-${prod}`)
                pricePar.innerHTML = parseFloat(pricePar.innerHTML - price).toFixed(2);
            },
            error: function (error) {
                res = "400";
            }
        });
        return res;
    }
}