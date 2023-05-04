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
        "name": "Vetril",
        "img_name": "sa"
    }*/

    public static function setProduct($description, $quantity, $price, $name, $img_name)
    {
        $sql = "INSERT INTO product (description, quantity, price, nome, img_name)
                VALUES (?, ?, ?, ?, ?);";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('sidss', $description, $quantity, $price, $name, $img_name);
        if ($stmt->execute())
            return $stmt;
        else
            return "";
    } 

    /*{
        "description": "Sapone per vetri",
        "quantity": 10,
        "price": 5,
        "name": "Vetril",
        "id": 1
    }*/
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

    /*{
        "id":1
    }*/
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

    /*{
        "id":1
    }*/
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

    public static function subtractProductQuantity($id, $amount)
    {
        $sql = "UPDATE product
                SET
                    quantity = (SELECT quantity WHERE id = ? ) - ?
                WHERE id = ?;";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('iii', $id, $amount, $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    /*
    {
        "id": 1,
        "quantity": 2
    }
    */

    public static function addProductQuantity($id, $amount)
    {
        $sql = "UPDATE product
                SET
                    quantity = (SELECT quantity WHERE id = ? ) + ?
                WHERE id = ?;";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('iii', $id, $amount, $id);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }
}
?>