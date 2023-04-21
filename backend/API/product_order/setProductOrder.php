<?php

require("../../MODEL/product_order.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->order) || empty($data->product))
{
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$product_order = ProductOrder::getInstance();

if ($product_order->setProductOrder($data->product, $data->order))
{
    echo json_encode(array("Message" => "Product inserted into order", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}
?>