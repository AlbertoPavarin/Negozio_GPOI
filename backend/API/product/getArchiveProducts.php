<?php
require("../../MODEL/product.php");

header("Content-type: application/json; charset=UTF-8");

$product = Product::getInstance();

$result = $product::getArchiveProducts();

if ($result->num_rows > 0)
{
    $products = array();
    while ($row = $result->fetch_assoc())
    {
        $products[] = $row;
    }
    echo json_encode($products, JSON_PRETTY_PRINT);
}
else
{
    echo json_encode(array("Message" => "No record"));
    die();
}
?>