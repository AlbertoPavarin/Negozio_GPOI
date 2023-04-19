<?php
class Database
{
    private static $server_local = "localhost";
    private static $user_local = "root";
    private static $passwd_local = "";
    private static $db_local = "shop_db";

    private static $port = "3306";
    protected static $conn = false;



    private function __construct() { }

    public static function connect()
    {
        if (!self::$conn)
        {
            self::$conn = new mysqli(self::$server_local, self::$user_local, self::$passwd_local, self::$db_local, self::$port);
            return self::$conn;
        }
        return self::$conn;

    }
}
?>