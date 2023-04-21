<?php
require("../../MODEL/cart.php");

header("Content-type: application/json; charset=UTF-8");

$cart = Cart::getInstance();

$result = $cart::getArchiveCarts();

if ($result->num_rows > 0)
{
    $carts = array();
    while ($row = $result->fetch_assoc())
    {
        $carts[] = $row;
    }
    echo json_encode($carts, JSON_PRETTY_PRINT);
}
else
{
    echo json_encode(array("Message" => "No record"));
    die();
}
?>