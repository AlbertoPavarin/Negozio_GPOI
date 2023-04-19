<?php

require("../../MODEL/category.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->name) || empty($data->description))
{
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$category = Category::getInstance();

if ($category->setCategory($data->name, $data->description))
{
    echo json_encode(array("Message" => "Category created", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}
?>