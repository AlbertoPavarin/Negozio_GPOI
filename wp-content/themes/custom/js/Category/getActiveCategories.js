function getActiveCategories() {
    let result = "";

    $.ajax({
        url: `/Negozio_GPOI/backend/API/category/getActiveCategories.php`,
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