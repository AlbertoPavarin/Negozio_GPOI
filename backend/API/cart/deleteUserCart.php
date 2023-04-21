<?php

require("../../MODEL/cart.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->user))
{
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$cart = Cart::getInstance();

if ($cart->deleteUserCart($data->user))
{
    echo json_encode(array("Message" => "Cart deleted", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}
?>