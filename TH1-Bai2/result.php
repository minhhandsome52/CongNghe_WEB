<?php
$filename = "Quiz.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$answers = [];
foreach ($questions as $line) {
    if (strpos($line, "Đáp án:") !== false) {
        $answers[] = trim(substr($line, strpos($line, ":") + 1)); // Lấy đáp án từ dòng
    }
}

// Tính điểm của người dùng
$score = 0;
foreach ($_POST as $key => $userAnswer) {
    $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
    if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
        $score++;
    }
}

$totalQuestions = count($answers);
$percentage = ($score / $totalQuestions) * 100;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <?php
    if ($percentage >= 70) {
        $alertClass = "alert-success";
        $message = "TỐT";
    } elseif ($percentage >= 50) {
        $alertClass = "alert-warning";
        $message = "KHÁ";
    } else {
        $alertClass = "alert-danger";
        $message = "KÉM";
    }
    ?>
    <div class="alert <?php echo $alertClass; ?> text-center">
        <h2><?php echo $message; ?></h2>
        <h3>Bạn đã trả lời đúng <strong><?php echo $score; ?></strong> / <?php echo $totalQuestions; ?> câu.</h3>
    </div>
    <a href="index.php" class="btn btn-primary">LÀM LẠI</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
