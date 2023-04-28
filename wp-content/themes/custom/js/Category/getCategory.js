function getCategory(id) {
    let result = "";

    $.ajax({
        url: `/Negozio_GPOI/backend/API/category/getCategory.php?id=${id}`,
        type: 'GET',
        dataType: 'json',
        async: false,
        success: (data) => {
            result = data;
        },
        error: () => {
            result = "404";
        }
    });

    return result;
}