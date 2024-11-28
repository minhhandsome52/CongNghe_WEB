<?php
session_start();
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['name' => 'Sản phẩm 1', 'price' => '1000 VND'],
        ['name' => 'Sản phẩm 2', 'price' => '2000 VND'],
        ['name' => 'Sản phẩm 3', 'price' => '3000 VND'],
        ['name' => 'Sản phẩm 4', 'price' => '4000 VND']
    ];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Administration</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Trang ngoài</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Thể loại</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tác giả</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Bài viết</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Thêm mới</button>
        <table class="table table-striped" id="productTable">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['products'] as $product) {
                    echo "<tr>";
                    echo "<td>{$product['name']}</td>";
                    echo "<td>{$product['price']}</td>";
                    echo "<td><a href='edit.php?name={$product['name']}' class='text-warning'><i class='material-icons'>edit</i></a></td>";
                    echo "<td><a href='delete.php?name={$product['name']}' class='text-danger'><i class='material-icons'>delete</i></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div id="addModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addForm" method="POST" action="add.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm sản phẩm</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="addName" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Giá thành</label>
                            <input type="text" name="addPrice" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-success">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <footer class="text-center mt-5">
        <strong>TLU'S MUSIC GARDEN</strong>
    </footer>
</body>
</html>
