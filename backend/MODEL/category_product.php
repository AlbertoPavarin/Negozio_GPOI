<?php
require("../../COMMON/connect.php");
class CategoryProduct 
{
    protected static $category = false;
    protected static $conn;

    protected function __construct() {
        self::$conn = Database::connect();
     }

    public static function getInstance()
    {
        if (!self::$category)
        {
            self::$category = new static();
            return self::$category;
        }
        return self::$category;
    }

    public static function getArchiveProductsCategories()
    {
        $sql = "SELECT * FROM category_product WHERE 1=1";

        return self::$conn->query($sql);
    }

    public static function getActiveProductsByCategory($id_cat)
    {
        $sql = "SELECT cp.category, p.id, p.nome, p.description, p.quantity, p.price
                FROM category_product cp
                INNER JOIN product p ON p.id = cp.product
                WHERE cp.category = " . self::$conn->real_escape_string($id_cat) . " AND p.active = 1;";

        return self::$conn->query($sql);
    }

    public static function setProductCategory($product, $category)
    {
        $sql = "INSERT INTO category_product (category, product)
                VALUES (?, ?);";

        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('ii', $product, $category);
        return $stmt->execute();
    }
}