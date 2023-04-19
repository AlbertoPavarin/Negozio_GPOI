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
}