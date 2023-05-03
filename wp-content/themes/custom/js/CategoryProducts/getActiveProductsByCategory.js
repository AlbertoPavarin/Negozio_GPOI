function getActiveProductsByCategory(id_cat) {
    let result = "";

    $.ajax({
        url: `/Negozio_GPOI/backend/API/category_product/getProductsByCategory.php?category_id=${id_cat}`,
        type: 'GET',
        dataType: 'json',
        async: false,
        success: (data) => {
            result = data;
            console.log(data);
        },
        error: () => {
            result = "404";
        }
    });

    return result;
}