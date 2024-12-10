<?php
class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Thêm sản phẩm mới
    public function createProduct($name, $price) {
        $sql = "INSERT INTO products (name, price) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sd", $name, $price);  // "s" cho string, "d" cho double (giá trị số)
        return $stmt->execute();
    }

    // Xóa sản phẩm
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id); // "i" cho integer
        return $stmt->execute();
    }

}
?>
