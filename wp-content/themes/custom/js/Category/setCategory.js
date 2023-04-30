function setCategory(name, desc)
{
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/category/setCategory.php`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        async: false,
        data: 
           JSON.stringify({
                name: name,
                description: desc,
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