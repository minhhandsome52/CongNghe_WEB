<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StudentDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Biến chứa thông báo kết quả
$message = "";

// Xử lý khi người dùng upload file
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $filename = $_FILES['file']['tmp_name'];

    if ($_FILES['file']['size'] > 0) {
        $file = fopen($filename, "r");

        // Đọc dòng tiêu đề
        $headers = fgetcsv($file);

        // Đọc và lưu từng dòng dữ liệu vào CSDL
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            $username = $data[0];
            $password = $data[1];
            $lastname = $data[2];
            $firstname = $data[3];
            $city = $data[4];
            $email = $data[5];
            $course = $data[6];

            $sql = "INSERT INTO students (username, password, lastname, firstname, city, email, course) 
                    VALUES ('$username', '$password', '$lastname', '$firstname', '$city', '$email', '$course')";

            if (!$conn->query($sql)) {
                $message = "Lỗi: " . $conn->error;
                break;
            } else {
                $message = "Upload và lưu dữ liệu thành công!";
            }
        }

        fclose($file);
    }
}

// Lấy dữ liệu từ bảng students
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File CSV và Hiển thị Danh sách Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Upload File CSV và Hiển thị Danh sách Sinh viên</h1>

    <!-- Form Upload File -->
    <form action="" method="POST" enctype="multipart/form-data" class="mb-5">
        <div class="mb-3">
            <label for="file" class="form-label">Chọn file CSV</label>
            <input class="form-control" type="file" name="file" id="file" accept=".csv" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload và Lưu vào CSDL</button>
    </form>

    <!-- Hiển thị thông báo -->
    <?php if (!empty($message)): ?>
        <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <!-- Hiển thị dữ liệu sinh viên từ CSDL -->
    <h2 class="text-center">Danh sách Sinh viên</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>City</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['password'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['firstname'] ?></td>
                        <td><?= $row['city'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['course'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Không có dữ liệu</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
