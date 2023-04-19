<?php
require("../../COMMON/connect.php");
class Status 
{
    protected static $status = false;
    protected static $conn;

    protected function __construct() {
        self::$conn = Database::connect();
     }

    public static function getInstance()
    {
        if (!self::$status)
        {
            self::$status = new static();
            return self::$status;
        }
        return self::$status;
    }

    public static function getArchiveStatusses()
    {
        $sql = "SELECT * FROM status WHERE 1=1";

        return self::$conn->query($sql);
    } 

    public static function getStatus($id)
    {
        $sql = "SELECT * from status WHERE id = " . self::$conn->real_escape_string($id);

        return self::$conn->query($sql);
    }

    public static function setStatus($desc)
    {
        $sql = "INSERT INTO status (description)
                VALUES (?);";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('s', $desc);
        return $stmt->execute();
    }

    public static function updateStatus($desc, $id)
    {
        $sql = "UPDATE status
                SET 
                    description = ?
                WHERE id = ?;";
            
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('si', $desc, $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }
}