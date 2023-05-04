<?php

require("../../MODEL/order.php");
require("../../MODEL/product_order.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->user) || empty($data->products) || empty($data->city) || empty($data->province) || empty($data->route) || empty($data->cap)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$order = Order::getInstance();
if ($res = $order::setOrder($data->user, $data->city, $data->province, $data->route, $data->cap))
{
    $prod_ord = ProductOrder::getInstance();
    $prod_ord::setProductOrder($data->products, $res->insert_id);
    echo json_encode(array("Message" => "Order created", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}