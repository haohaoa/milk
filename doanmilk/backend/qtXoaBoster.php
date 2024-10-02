<!-- xóa boster quảng cáo -->
<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        include_once __DIR__.'/../backend/ketnoi.php';
    
        $sqlngdung = "DELETE FROM boster WHERE  maboster= $id";
    
        if(mysqli_query($conn, $sqlngdung)){
            echo '<script>window.location.href = "/quantri/quantriBoster.php";</script>';
        } else {
            echo "Lỗi trong quá trình xóa dữ liệu: " . mysqli_error($conn);
        }
    
        mysqli_close($conn);
    }
?>