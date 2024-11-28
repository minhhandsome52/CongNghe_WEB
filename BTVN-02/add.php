<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addName'], $_POST['addPrice'])) {
    $newProduct = [
        'name' => $_POST['addName'],
        'price' => $_POST['addPrice']
    ];
    $_SESSION['products'][] = $newProduct;
    header('Location: index.php');
    exit;
}
?>
