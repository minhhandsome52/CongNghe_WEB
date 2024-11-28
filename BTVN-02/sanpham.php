<?php
foreach ($_SESSION['products'] as $product) {
    echo "<tr>";
    echo "<td>{$product['name']}</td>";
    echo "<td>{$product['price']}</td>";
    echo "<td><a href='#' data-name='{$product['name']}' class='text-warning edit-product'><i class='material-icons'>edit</i></a></td>";
    echo "<td><a href='delete.php?delete={$product['name']}' class='text-danger delete-product' data-name='{$product['name']}'><i class='material-icons'>delete</i></a></td>";
    echo "</tr>";
}
?>

