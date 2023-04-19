<?php
require("../../COMMON/connect.php");
class Category 
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

    public static function getArchiveCategories()
    {
        $sql = "SELECT * FROM category WHERE 1=1";

        return self::$conn->query($sql);
    }

    public static function getCategory($id)
    {
        $sql = "SELECT * FROM category WHERE id = " . self::$conn->real_escape_string($id);

        return self::$conn->query($sql);
    }

    public static function setCategory($name, $descrption)
    {
        $sql = "INSERT INTO category (name, description)
                VALUES (?, ?);";
        
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('ss', $name, $descrption);
        return $stmt->execute();
    }

    public static function updateCategory($description, $name, $id)
    {
        $sql = "UPDATE category
                SET 
                    name = ?,
                    description = ?
                WHERE id = ?";
        
        $stmt = self::$conn->prepare($sql);
        $stmt->bind_param('ssi', $name, $description, $id);
        if ($stmt->execute())
        {
            return $stmt;
        }
        else
        {
            return "";
        }
    }
}