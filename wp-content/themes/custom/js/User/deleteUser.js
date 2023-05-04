function deleteUser(id)
{
    let res = "";
    $.ajax({
        url: `/Negozio_GPOI/backend/API/wordpress/deleteUser.php?id=${id}`,
        type: 'POST',
        headers : {'Content-Type':'application/json; charset=utf-8'},
        dataType: 'json',
        success: function (data) {
            res = data;
        },
        error: function (error) {
            res = "400";
        }
    });
    return res;
}