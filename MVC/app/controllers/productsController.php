<?php
require_once '../app/config/connectionDB.php';
require_once '../app/models/product.php';

$productModel = new Product($conn);

// Lấy tất cả sản phẩm
$products = $productModel->getAllProducts();
// Sửa đường dẫn trong header để định tuyến chính xác sau khi xóa hoặc thêm sản phẩm
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $productModel->createProduct($name, $price);
    header("Location: http://localhost/BTAPVN/MVC/public/"); // Đảm bảo URL chính xác
    exit();
}

// Xử lý yêu cầu xóa sản phẩm
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $productModel->deleteProduct($id);
    header("Location: http://localhost/BTAPVN/MVC/public/"); // Đảm bảo URL chính xác
    exit();
}
?>
