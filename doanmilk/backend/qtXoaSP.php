<!-- xóa sản phẩm bằng id của sản phẩm -->
<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        include_once __DIR__.'/../backend/ketnoi.php';
    
        $sqlngdung = "DELETE FROM sanpham WHERE  MaSanPham= $id";
    
        if(mysqli_query($conn, $sqlngdung)){
            echo '<script>window.location.href = "/quantri/quantri.php";</script>';
        } else {
            echo "Lỗi trong quá trình xóa dữ liệu: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
?>