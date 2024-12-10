<?php
// routes.php - Quản lý các route của ứng dụng
require_once '../app/controllers/productsController.php';

function routes($url) {
    // Route mặc định, khi không có bất kỳ đường dẫn nào trong URL
    if ($url == "" || $url == "/") {
        // Hiển thị danh sách sản phẩm
        showProducts();
    }
    // Route thêm sản phẩm
    elseif ($url == "add") {
        addProduct();
    }
    // Route xóa sản phẩm
    elseif (strpos($url, "delete=") === 0) {
        $id = substr($url, 7); // Lấy ID sản phẩm từ URL
        deleteProduct($id);
    } else {
        // Nếu không có route hợp lệ
        echo "Trang không tồn tại!";
    }
}

function showProducts() {
    global $productModel;
    $products = $productModel->getAllProducts();
    require_once '../app/views/index/index.php';
}

function addProduct() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        global $productModel;
        $productModel->createProduct($name, $price);
        header("Location: /");
        exit();
    }
    // Hiển thị giao diện thêm sản phẩm
    require_once '../app/views/index/index.php';
}

function deleteProduct($id) {
    global $productModel;
    $productModel->deleteProduct($id);
    header("Location: /");
    exit();
}
?>
