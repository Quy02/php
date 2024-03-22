<?php
require_once("db.class.php");

class Product {
    public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture) {
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
    }

    // Save product
    public function save() {
        // Initialize $db object with class Db from file db.class.php
        $db = new Db();
        
        // Escape values to prevent SQL injection
        $pro_name = mysqli_real_escape_string($db->connect(), $this->productName);
        $desc = mysqli_real_escape_string($db->connect(), $this->description);
        $picture = mysqli_real_escape_string($db->connect(), $this->picture);
        
        // Create $sql variable to insert products
        $sql = "INSERT INTO product (ProductName, CateID, Price, Quantity, Description, Picture) 
                VALUES ('$pro_name', '$this->cateID', '$this->price', '$this->quantity', '$desc', '$picture')";
        
        // query_execute is a function from class Db
        $result = $db->query_execute($sql); // Return results
        return $result;
    }

    // List of products
    public static function list_product() {
        $db = new Db();
        $sql = "SELECT * FROM product";
        
        // select_to_array is a function of class Db, used to output an array
        $rs = $db->select_to_array($sql);
        return $rs;
    }
}
?>
