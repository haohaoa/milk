<!-- xóa người dùng bằng id -->
<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        include_once __DIR__.'/../backend/ketnoi.php';
    
        $sql = "DELETE FROM nguoidung WHERE  MaNguoiDung= $id";
    
        if(mysqli_query($conn, $sql)){
            echo '<script>window.location.href = "/quantri/quantriNguoiDung.php";</script>';
        } else {
            echo "Lỗi trong quá trình xóa dữ liệu: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
?>