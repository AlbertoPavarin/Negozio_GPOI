<?php
require("../../MODEL/order.php");

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['id']) || empty($id = $_GET['id']))
{
    echo json_encode(array("Message" => "No id passed"));
    die();
}

$order = Order::getInstance();

$result = $order::getOrder($id);

if ($result->num_rows > 0)
{
    echo json_encode($result->fetch_assoc(), JSON_PRETTY_PRINT);
    die();
}
else
{
    echo json_encode(array("Message" => "No record", "response" => false));
    die();
}