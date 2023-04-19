<?php

require("../../MODEL/product.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->id))
{
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$product = Product::getInstance();

if ($product->deleteProduct($data->id))
{
    echo json_encode(array("Message" => "Product eliminated", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}
?>