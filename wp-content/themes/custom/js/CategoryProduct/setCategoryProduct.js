function setCategoryProduct(prod, cat)
{
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/category_product/setProductCategory.php`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        async: false,
        data: 
           JSON.stringify({
                category: cat,
                product: prod,
            }),
        success: function (data) {
            res = data;
            console.log(data);
        },
        error: function (error) {
            res = "400";
            console.log(error);
        }
    });
    return res;
}