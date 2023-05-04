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

    /*
    {
        "user": 1,
        "products": [
            {"id": 1, "quantity": 2},
            {"id": 2, "quantity": 1}
        ],
        "city": "Rovigo",
        "province": "Ro",
        "route": "via la",
        "cap": "45100"
    }
    */
    public static function setOrder($user, $city, $province, $route, $cap)
    {
        $sql = "INSERT INTO `order` (user, status, city, province, route, cap)
                VALUES (?, 1, ?, ?, ?, ?);";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('issss', $user, $city, $province, $route, $cap);
        if ($stmt->execute())
            return $stmt;
        else 
            return "";
    }

    /*
    {
        "id": 1,
        "status": 2
    }
    */
    public static function updateOrderStatus($id, $status)
    {
        $sql = "UPDATE `order`
                SET 
                    status = ?
                WHERE id = ?;";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('ii', $status, $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    public static function getArchiveOrdersByUser($user)
    {
        $sql = "SELECT * FROM `order` WHERE user = " . self::$conn->real_escape_string($user);

        return self::$conn->query($sql);
    }
}