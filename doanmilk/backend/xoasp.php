<!-- xóa sản phẩm trong giỏ hàng của khách hàng  -->
<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        include_once __DIR__.'/../backend/ketnoi.php';
    
        $sqlngdung = "DELETE FROM chitietdonhang WHERE  MaChiTietDonHang= $id";
    
        if(mysqli_query($conn, $sqlngdung)){
            echo '<script>window.location.href = "/index/giohang.php";</script>';
        } else {
            echo "Lỗi trong quá trình xóa dữ liệu: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
?>