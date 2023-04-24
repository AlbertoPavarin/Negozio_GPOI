<?php
require("../../COMMON/connect.php");
class Cart 
{
    protected static $cart = false;
    protected static $conn;

    protected function __construct() {
        self::$conn = Database::connect();
     }

    public static function getInstance()
    {
        if (!self::$cart)
        {
            self::$cart = new static();
            return self::$cart;
        }
        return self::$cart;
    }

    public static function getArchiveCarts()
    {
        $sql = "SELECT * FROM cart WHERE 1=1;";

        return self::$conn->query($sql);
    } 

    public static function getUserCart($id_user)
    {
        $sql = "SELECT c.user, p.id, p.nome, p.description, p.price * c.quantity as 'total_price', p.price, c.quantity
                FROM cart c
                INNER JOIN product p ON p.id = c.product
                WHERE c.user = " . self::$conn->real_escape_string($id_user);

        return self::$conn->query($sql);
    }

    public static function setCart($id_user, $id_prod, $quantity)
    {
        $sql = "INSERT INTO cart (`user`, product, quantity)
                VALUES (?, ?, ?);";
        
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('iii', $id_user, $id_prod, $quantity);
        return $stmt->execute();
    }

    public static function addCartProductQuantity($id_user, $id_prod, $quantity)
    {
        $sql = "UPDATE cart
                SET 
                    quantity = (SELECT quantity WHERE product = ? AND user = ? ) + ?
                WHERE product = ? AND user = ?;";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('iiiii', $id_prod, $id_user, $quantity, $id_prod, $id_user);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    public static function subtractCartProductQuantity($id_user, $id_prod, $quantity)
    {
        $sql = "UPDATE cart
                SET 
                    quantity = (SELECT quantity WHERE product = ? AND user = ? ) - ?
                WHERE product = ? AND user = ?;";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('iiiii', $id_prod, $id_user, $quantity, $id_prod, $id_user);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    public static function deleteCartProduct($id_user, $id_prod)
    {
        $sql = "DELETE FROM cart
                WHERE product = ? AND user = ?;";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('ii', $id_prod, $id_user);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }

    public static function deleteUserCart($id_user)
    {
        $sql = "DELETE FROM cart
                WHERE user = ?;";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('i', $id_user);
        if ($stmt->execute() && $stmt->affected_rows > 0)
            return $stmt;
        else
            return "";
    }
}