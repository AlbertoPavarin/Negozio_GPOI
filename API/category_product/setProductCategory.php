<?php

require("../../MODEL/category_product.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->product) || empty($data->category))
{
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$product_order = CategoryProduct::getInstance();

if ($product_order->setProductCategory($data->product, $data->category))
{
    echo json_encode(array("Message" => "Product inserted into category", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}
?>