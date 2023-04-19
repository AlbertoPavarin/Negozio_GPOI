<?php

require("../../MODEL/status.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents('php://input'));

if (empty($data->description) || empty($data->id))
{
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$status = Status::getInstance();

if ($status->updateStatus($data->description, $data->id))
{
    echo json_encode(array("Message" => "Status created", "Response" => true));
    die();
}
else
{
    echo json_encode(array("Message" => "Error", "Response" => false));
    die();
}
?>