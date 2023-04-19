<?php
require("../../COMMON/connect.php");
class Order 
{
    protected static $order = false;
    protected static $conn;

    protected function __construct() {
        self::$conn = Database::connect();
    }

    public static function getInstance()
    {
        if (!self::$order)
        {
            self::$order = new static();
            return self::$order;
        }
        return self::$order;
    }

    public static function getOrder($id)
    {
        $sql = "SELECT * FROM `order` WHERE id = " . self::$conn->real_escape_string($id);

        return self::$conn->query($sql);
    }

    public static function getArchiveOrders()
    {
        $sql = "SELECT * FROM `order` WHERE 1=1;";

        return self::$conn->query($sql);
    }

    public static function getOrdersByStatus($status)
    {
        $sql = "SELECT * FROM `order` WHERE status = " . self::$conn->real_escape_string($status);

        return self::$conn->query($sql);
    }

    public static function setOrder($user)
    {
        return 0;
    }

    public static function updateOrderStatus()
    {
        return 0;
    }
}