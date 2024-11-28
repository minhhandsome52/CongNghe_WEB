<?php
session_start();
if (isset($_GET['name'])) {
    $nameToDelete = $_GET['name'];
    $_SESSION['products'] = array_filter($_SESSION['products'], function ($product) use ($nameToDelete) {
        return $product['name'] !== $nameToDelete;
    });
    header('Location: index.php');
    exit;
}
?>
