<?php
$servername = "localhost";
$username = "root"; // Thay đổi nếu cần
$password = "";     // Thay đổi nếu cần
$dbname = "QuizDB";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem người dùng đã gửi file chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
    $questions = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $current_question = [];
    foreach ($questions as $line) {
        if (strpos($line, "Câu") === 0) {
            if (!empty($current_question)) {
                saveQuestion($conn, $current_question);
            }
            $current_question = [];
        }
        $current_question[] = $line;
    }

    if (!empty($current_question)) {
        saveQuestion($conn, $current_question);
    }

    echo "<div class='alert alert-success mt-4'>Dữ liệu đã được tải lên và lưu trữ thành công!</div>";
}

function saveQuestion($conn, $questionArray) {
    $question = $questionArray[0];
    $option_a = substr($questionArray[1], 3);
    $option_b = substr($questionArray[2], 3);
    $option_c = substr($questionArray[3], 3);
    $option_d = substr($questionArray[4], 3);
    $answer = strtoupper($questionArray[5][0]);

    $stmt = $conn->prepare("INSERT INTO tbQuestions (question, option_a, option_b, option_c, option_d, answer) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $question, $option_a, $option_b, $option_c, $option_d, $answer);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Upload File Quiz</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="file" class="form-label">Chọn file Quiz (txt):</label>
            <input type="file" name="file" class="form-control" id="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload và Lưu</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
