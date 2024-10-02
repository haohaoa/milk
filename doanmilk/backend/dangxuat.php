<!-- xóa đi tất cả các biết đã lấy được từ session  -->
<?php 
    
    session_start();
    //xóa dử liệu trong SESSION
    unset($_SESSION['MaNguoiDung']);
    unset($_SESSION['dadangnhap']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['TenNguoiDung']);
    unset($_SESSION['QuanTri']);
   
    // điều khiển 
     echo ' <script> location.href="/index/index.php"</script>';
    
?>