<?php

require("../../MODEL/product.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->quantity) || empty($data->id))
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

$product = Product::getInstance();

if ($product->subtractProductQuantity($data->id, $data->quantity))
{
    echo json_encode(array("Message" => "Product updated", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}
?>