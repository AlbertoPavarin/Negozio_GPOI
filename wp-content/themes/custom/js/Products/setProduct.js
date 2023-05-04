function setProduct(name, desc, price, quantity, img)
{
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/product/setProduct.php`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        async: false,
        data: 
           JSON.stringify({
                name: name,
                description: desc,
                price: price, 
                quantity: quantity,
                img_name: img
            }),
        success: function (data) {
            res = data;
        },
        error: function (error) {
            res = "400";
        }
    });
    return res;
}