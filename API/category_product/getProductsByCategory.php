<?php
require("../../MODEL/category_product.php");

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['category_id']) || empty($id = $_GET['category_id']))
{
    echo json_encode(array("Message" => "No order id passed"));
    die();
}

$prod_ord = CategoryProduct::getInstance();

$result = $prod_ord::getActiveProductsByCategory($id);

if ($result->num_rows > 0)
{
    $prods_cats = array();
    while ($row = $result->fetch_assoc())
    {
        $prods_cats[] = $row;
    }
    echo json_encode($prods_cats, JSON_PRETTY_PRINT);
}
else
{
    echo json_encode(array("Message" => "No record"));
    die();
}
?>