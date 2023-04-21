<?php
require("../../MODEL/category.php");

header("Content-type: application/json; charset=UTF-8");

$category = Category::getInstance();

$result = $category::getArchiveCategories();

if ($result->num_rows > 0)
{
    $categories = array();
    while ($row = $result->fetch_assoc())
    {
        $categories[] = $row;
    }
    echo json_encode($categories, JSON_PRETTY_PRINT);
}
else
{
    echo json_encode(array("Message" => "No record"));
    die();
}
?>