<?php

require("../../MODEL/product.php");

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['name']) || empty($name = $_GET['name']))
{
    echo json_encode(array("Message" => "No name passed"));
    die();
}

$product = Product::getInstance();

$result = $product::getProductsByLikeName($name);

if ($result->num_rows > 0)
{
    $products = array();
    while ($row = $result->fetch_assoc())
    {
        $products[] = $row;
    }
    echo json_encode($products, JSON_PRETTY_PRINT);
    die();
}
else
{
    echo json_encode(array("Message" => "No record"));
    die();
}
?>