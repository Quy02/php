<?php
require_once('db.class.php'); // Đảm bảo rằng bạn đã có file db.class.php

class Category {
    public static function list_category() {
        $db = new Db(); // Khởi tạo kết nối đến cơ sở dữ liệu
        $sql = "SELECT * FROM category";
        $result = $db->select_to_array($sql); // Giả sử rằng bạn đã có phương thức select_to_array trong lớp Db

        return $result;
    }
}
?>
