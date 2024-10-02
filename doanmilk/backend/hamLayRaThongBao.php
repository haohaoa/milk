<!-- lấy ra số thông báo của khách hàng đã đặt  -->
<?php
    include_once __DIR__.'/../backend/ketnoi.php';
    $sql = "SELECT COUNT(*) AS count FROM thanhtoan WHERE TrangThai='Chưa Xem'";
    $ketqua = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($ketqua);
    $count = $data['count'];
    $thongbaoqt = '';
    if ($count > 0) {
        $thongbaoqt = '<div class="thongbao">' . $count . '</div>';
    }
?>