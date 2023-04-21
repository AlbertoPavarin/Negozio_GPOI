<?php
require("../../COMMON/wp_connect.php");
class User 
{
    protected static $user = false;
    protected static $conn;

    protected function __construct() {
        self::$conn = WPDatabase::connect();
     }

    public static function getInstance()
    {
        if (!self::$user)
        {
            self::$user = new static();
            return self::$user;
        }
        return self::$user;
    }
    public function getArchiveUser()
    {
        $sql = "SELECT
        wp_users.ID AS id,
        wp_users.user_login AS name,
        wp_users.user_email AS email,
        wp_users.display_name AS alias,
        wp_usermeta.meta_value AS role
        FROM wp_users
        INNER JOIN wp_usermeta ON wp_users.ID = wp_usermeta.user_id
        WHERE wp_usermeta.meta_key = 'wp_capabilities'";

        return self::$conn->query($sql);
    }

    public function getUser($id)
    {
        $sql = "SELECT
                wp_users.ID AS id,
                wp_users.user_login AS name,
                wp_users.user_email AS email,
                wp_users.display_name AS alias,
                wp_usermeta.meta_value AS role
                FROM wp_users 
                INNER JOIN wp_usermeta ON wp_users.ID = wp_usermeta.user_id 
                WHERE wp_usermeta.meta_key = 'wp_capabilities'
                AND wp_users.ID = " . self::$conn->real_escape_string($id);

        return self::$conn->query($sql);
    }

    public function getUserByEmail($email)
    {
        $sql = sprintf(
            "SELECT
                wp_users.ID AS id,
                wp_users.user_login AS name,
                wp_users.user_email AS email,
                wp_users.display_name AS alias,
                wp_usermeta.meta_value AS role
                FROM wp_users 
                INNER JOIN wp_usermeta ON wp_users.ID = wp_usermeta.user_id 
                WHERE wp_usermeta.meta_key = 'wp_capabilities'
                AND wp_users.user_email = '%s';", self::$conn->real_escape_string($email)
        );

        return self::$conn->query($sql);
    }

    public function getActiveUsers()
    {
        $sql = "SELECT
        wp_users.ID AS id,
        wp_users.user_login AS name,
        wp_users.user_email AS email,
        wp_users.display_name AS alias,
        wp_usermeta.meta_value AS role
        FROM wp_users 
        INNER JOIN wp_usermeta ON wp_users.ID = wp_usermeta.user_id 
        WHERE wp_usermeta.meta_key = 'wp_capabilities'
        AND (wp_users.user_status = 0 OR wp_users.user_status = 1)";

        return self::$conn->query($sql);
    }

    public function deleteUser($id)
    {
        $sql = "UPDATE wp_users
        SET user_status = 3
        WHERE id = ?";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('i', $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    public function reactiveUser($id)
    {
        $sql = "UPDATE wp_users
        SET user_status = 1
        WHERE id = ?";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('i', $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }
}