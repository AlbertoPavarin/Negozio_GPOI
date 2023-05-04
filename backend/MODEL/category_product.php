<?php
require("../../COMMON/connect.php");
class CategoryProduct 
{
    protected static $category_product = false;
    protected static $conn;

    protected function __construct() {
        self::$conn = Database::connect();
     }

    public static function getInstance()
    {
        if (!self::$category_product)
        {
            self::$category_product = new static();
            return self::$category_product;
        }
        return self::$category_product;
    }

    public static function getArchiveProductsCategories()
    {
        $sql = "SELECT * FROM category_product WHERE 1=1";

        return self::$conn->query($sql);
    }

    public static function getActiveProductsByCategory($id_cat)
    {
        $sql = "SELECT cp.category, p.id, p.nome, p.description, p.quantity, p.price, p.img_name
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
        $stmt->bind_param('ii', $category, $product);
        return $stmt->execute();
    }
}