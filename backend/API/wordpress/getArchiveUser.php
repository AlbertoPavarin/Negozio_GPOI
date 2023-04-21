<?php
include_once dirname(__FILE__) . '/../../MODEL/wordpress.php';
header("Content-type: application/json; charset=UTF-8");

$user = User::getInstance();
$stmt = $user->getArchiveUser();
$user_arr = array();

if ($stmt->num_rows > 0) {
    while ($row = $stmt->fetch_assoc()) {
        $userRole = $row["role"];
        $roles = explode(':"', $userRole, 3);

        $userRole = explode('";', $roles[1])[0];
        if ($userRole == "administrator")
            $bitRole = 1;
        else
            $bitRole = 0;

        extract($row);
        
        $user = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "alias" => $alias,
            "role" => $userRole,
            "bit_role" => $bitRole
        );
        array_push($user_arr, $user);
    }
}

http_response_code(200);
echo json_encode($user_arr, JSON_PRETTY_PRINT);
