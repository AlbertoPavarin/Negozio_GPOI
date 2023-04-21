<?php
require("../../MODEL/order.php");

header("Content-type: application/json; charset=UTF-8");

$order = Order::getInstance();

$result = $order::getArchiveOrders();

if ($result->num_rows <= 0)
{
    echo json_encode(array("Message" => "No record", "response" => false));
    die();
}

$orders = [];

while ($row = $result->fetch_assoc())
{
    $orders[] = $row;
}

echo json_encode($orders, JSON_PRETTY_PRINT);