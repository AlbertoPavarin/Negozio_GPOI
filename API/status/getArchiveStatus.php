<?php
require("../../MODEL/status.php");

header("Content-type: application/json; charset=UTF-8");

$status = Status::getInstance();

$result = $status::getArchiveStatusses();

if ($result->num_rows > 0)
{
    $statusses = array();
    while ($row = $result->fetch_assoc())
    {
        $statusses[] = $row;
    }
    echo json_encode($statusses, JSON_PRETTY_PRINT);
}
else
{
    echo json_encode(array("Message" => "No record"));
    die();
}
?>