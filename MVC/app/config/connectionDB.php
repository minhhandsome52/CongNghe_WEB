<?php
// Kết nối tới cơ sở dữ liệu MySQL
$host = "localhost";      
$dbname = "ProductsDB";     
$username = "root";          
$password = "";              

$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
