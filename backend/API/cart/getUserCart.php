<?php
require("../../MODEL/cart.php");

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['user_id']) || empty($id = $_GET['user_id']))
{
    echo json_encode(array("Message" => "No user id passed"));
    die();
}

$cart = Cart::getInstance();

$result = $cart::getUserCart($id);

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