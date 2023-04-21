<?php
include_once dirname(__FILE__) . '/../../MODEL/wordpress.php';

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['id']) || empty($id = $_GET['id'])) {
    echo json_encode(array("Message" => "No id passed"));
    die();
}

$user = User::getInstance();

if ($user->reactiveUser($id)) {
    echo json_encode(array("Message" => "User updated", "Response" => true));
} else {
    echo json_encode(array("Message" => "Update failed", "Response" => false));
}
die();
