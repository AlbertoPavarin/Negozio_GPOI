<?php

require("../../MODEL/order.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->id) || empty($data->status)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$order = Order::getInstance();
if ($order::updateOrderStatus($data->id, $data->status))
{
    echo json_encode(array("Message" => "Order updated", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}