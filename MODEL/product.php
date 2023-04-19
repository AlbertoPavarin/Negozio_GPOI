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


    /*{
        "description": "Sapone per vetri",
        "quantity": 10,
        "price": 5,
        "name": "Vetril"
    }*/

    public static function setProduct($description, $quantity, $price, $name)
    {
        $sql = "INSERT INTO product (description, quantity, price, nome)
                VALUES (?, ?, ?, ?);";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('sids', $description, $quantity, $price, $name);
        return $stmt->execute();
    } 

    public static function updateProduct($description, $quantity, $price, $name, $id) 
    {
        $sql = "UPDATE product
                SET 
                    description = ?,
                    quantity = ?, 
                    price = ?,
                    nome = ?
                WHERE id = ?;";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('sidsi', $description, $quantity, $price, $name, $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    public static function deleteProduct($id)
    {
        $sql = "UPDATE product
                SET
                    active = 0
                WHERE id = ?;";
        
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('i', $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    public static function reactiveProduct($id)
    {
        $sql = "UPDATE product
                SET
                    active = 1
                WHERE id = ?;";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('i', $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }
}
?>