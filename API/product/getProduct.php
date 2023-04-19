<?php
require("../../MODEL/product.php");

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['id']) || empty($id = $_GET['id']))
{
    echo json_encode(array("Message" => "No id passed"));
    die();
}

$product = Product::getInstance();

$result = $product::getProduct($id);

if ($result->num_rows > 0)
{
    echo json_encode($result->fetch_assoc(), JSON_PRETTY_PRINT);
}
else
{
    echo json_encode(array("Message" => "No record"));
    die();
}
?>