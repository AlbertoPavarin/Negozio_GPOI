function subtractProductQuantity(id, quantity)
{
    const text = document.querySelector(`#text-${id}`);
    if (text.innerHTML > 1)
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
}