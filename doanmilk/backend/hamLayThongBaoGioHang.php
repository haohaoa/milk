<!-- lấy ra số thông báo của khách hàng đã thêm sản phẩm vào giỏ hàng  -->
<?php
    if(isset($_SESSION['MaNguoiDung'])){
        $id = $_SESSION['MaNguoiDung'];
        include_once __DIR__.'/../backend/ketnoi.php';
        $sql = "SELECT COUNT(*) AS count FROM chitietdonhang WHERE MaNguoiDung='$id'";
        $ketqua = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($ketqua);
        $count = $data['count'];
        $thongbao = '';
        if ($count > 0) {
            $thongbao = '<div class="thongbao">' . $count . '</div>';
        }
    }
   
?>  