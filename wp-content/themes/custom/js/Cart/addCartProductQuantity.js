function addCartProductQuantity(prod, user, price)
{

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
            console.log(price);
            let quantity = document.querySelector(`#text-${prod}`);
            quantity.innerHTML = parseFloat(quantity.innerHTML) + 1;

            let pricePar = document.querySelector(`#price-${prod}`)
            pricePar.innerHTML = (parseFloat(pricePar.innerHTML) + price).toFixed(2);
            console.log(pricePar);
        },
        error: function (error) {
            res = "400";
        }
    });
    return res;
}