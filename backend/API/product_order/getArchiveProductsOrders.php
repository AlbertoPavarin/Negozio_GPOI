<?php
require("../../MODEL/product_order.php");

header("Content-type: application/json; charset=UTF-8");

$prod_ord = ProductOrder::getInstance();

$result = $prod_ord::getArchiveProductsOrders();

if ($result->num_rows > 0)
{
    $prods_ords = array();
    while ($row = $result->fetch_assoc())
    {
        $prods_ords[] = $row;
    }
    echo json_encode($prods_ords, JSON_PRETTY_PRINT);
}
else
{
    echo json_encode(array("Message" => "No record"));
    die();
}
?>