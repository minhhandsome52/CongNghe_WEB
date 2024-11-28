<?php 
include 'header.php'; 

include 'sanpham.php'; 

?>
<main class="container mt-4">
    <a href="#" class="btn btn-success mb-3">Thêm mới</a>
    <?php if (empty($products)): ?>
        <p>Không có sản phẩm nào.</p>
    <?php else: ?>
        <table class="table table-bordered border-dark">
            <thead >
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['price']) ?> VND</td>
                        <td>
                            
                            <a href="#" >
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            
                            <a href="#" >
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
   
</main>
<hr class="mt-5">

<?php 
include 'footer.php'; 
?>
