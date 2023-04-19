<?php
require("../../COMMON/connect.php");
class Product 
{
    protected static $product = false;
    protected static $conn;

    protected function __construct() {
        self::$conn = Database::connect();
     }

    public static function getInstance()
    {
        if (!self::$product)
        {
            self::$product = new static();
            return self::$product;
        }
        return self::$product;
    }

    public static function getArchiveProducts()
    {
        $sql = "SELECT * FROM product WHERE 1=1";

        return self::$conn->query($sql);
    } 

    public static function getProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id = " . self::$conn->real_escape_string($id);

        return self::$conn->query($sql);
    }

    public static function getActiveProducts()
    {
        $sql = "SELECT * FROM product WHERE active = 1";

        return self::$conn->query($sql);
    }

    public static function getProductsByName($name)
    {
        $sql = "SELECT * FROM product WHERE nome = '" . self::$conn->real_escape_string($name) . "'";

        return self::$conn->query($sql);
    }

    public static function getProductsByLikeName($name)
    {
        $sql = "SELECT * FROM product WHERE nome LIKE '%" . self::$conn->real_escape_string($name) . "%'";

        return self::$conn->query($sql);
    }
}
?>