<?php
// Kết nối tới cơ sở dữ liệu MySQL
$host = "localhost";         // Địa chỉ máy chủ
$dbname = "ProductsDB";      // Tên cơ sở dữ liệu
$username = "root";          // Tên người dùng
$password = "";              // Mật khẩu (để trống nếu sử dụng mặc định)

$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
