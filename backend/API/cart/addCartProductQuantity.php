<?php

require("../../MODEL/cart.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->user) || empty($data->product) || empty($data->quantity))
{
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

if ($data->quantity <= 0)
{
    echo json_encode(["message" => "Type valid quantity and price"]);
    die();
}

$cart = Cart::getInstance();

if ($cart->addCartProductQuantity($data->user, $data->product, $data->quantity))
{
    echo json_encode(array("Message" => "Product update in cart", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}
?>