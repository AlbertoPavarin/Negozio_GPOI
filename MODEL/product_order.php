<?php
include_once("../../COMMON/connect.php");
class ProductOrder 
{
    protected static $prod_ord = false;
    protected static $conn;

    protected function __construct() {
        self::$conn = Database::connect();
    }

    public static function getInstance()
    {
        if (!self::$prod_ord)
        {
            self::$prod_ord = new static();
            return self::$prod_ord;
        }
        return self::$prod_ord;
    }
    
    public static function getArchiveProductsOrders()
    {
        $sql = "SELECT * FROM product_order WHERE 1=1;";

        return self::$conn->query($sql);
    }

    public static function getProductsByOrder($order_id)
    {
        $sql = "SELECT * FROM product_order WHERE `order` = " . self::$conn->real_escape_string($order_id);

        return self::$conn->query($sql);
    }

    public static function setProductOrder($prods, $ord)
    {
        $sql = "INSERT INTO product_order (product, `order`, quantity)
                VALUES (?, ?, ?);";
        $stmt = self::$conn->prepare($sql);

        foreach($prods as $prod)
        {
            $stmt->bind_param('iii', $prod->id, $ord, $prod->quantity);
            $stmt->execute();
        }
    }
}