<?php

require("../../MODEL/product.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->name) || empty($data->description) || empty($data->price) || empty($data->quantity))
{
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

if ($data->quantity <= 0 || $data->price <= 0)
{
    echo json_encode(["message" => "Type valid quantity and price"]);
    die();
}

$product = Product::getInstance();

if ($res = $product->setProduct($data->description, $data->quantity, $data->price, $data->name))
{
    echo json_encode(array("Message" => "Product created", "product_id" => $res->insert_id, "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}
?>