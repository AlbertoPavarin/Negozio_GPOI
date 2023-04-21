<?php
include_once dirname(__FILE__) . '/../../MODEL/wordpress.php';

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['id']) || empty($id = $_GET['id'])) {
    echo json_encode(array("Message" => "No id passed"));
    die();
}

$user = User::getInstance();
$result = $user->getUser($id);

if ($result->num_rows > 0) {
    $record = $result->fetch_assoc();
    $userRole = $record["role"];
    $roles = explode(':"', $userRole, 3);

    $userRole = explode('";', $roles[1])[0];
    if ($userRole == "administrator")
        $bitRole = 1;
    else
        $bitRole = 0;

    extract($record);
    
    $user = array(
        "id" => $id,
        "name" => $name,
        "email" => $email,
        "alias" => $alias,
        "role" => $userRole,
        "bit_role" => $bitRole
    );
    echo json_encode($user, JSON_PRETTY_PRINT);
} else {
    echo json_encode(array("Message" => "No record"));
}
die();
