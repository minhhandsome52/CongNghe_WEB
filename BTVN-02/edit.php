<?php
session_start();
if (isset($_GET['name'])) {
    $nameToEdit = $_GET['name'];
    $productToEdit = null;
    foreach ($_SESSION['products'] as &$product) {
        if ($product['name'] == $nameToEdit) {
            $productToEdit = $product;
            break;
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editName'], $_POST['editPrice'])) {
    foreach ($_SESSION['products'] as &$product) {
        if ($product['name'] == $_POST['editName']) {
            $product['price'] = $_POST['editPrice'];
            break;
        }
    }
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h4>Sửa sản phẩm</h4>
        <form method="POST" action="edit.php">
            <input type="hidden" name="editName" value="<?php echo $productToEdit['name']; ?>">
            <div class="mb-3">
                <label>Tên sản phẩm</label>
                <input type="text" name="editName" value="<?php echo $productToEdit['name']; ?>" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label>Giá thành</label>
                <input type="text" name="editPrice" value="<?php echo $productToEdit['price']; ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning">Cập nhật</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
