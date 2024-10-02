<!-- lấy ra tất cả các đơn hàng trong giỏ hàng
bằng id của khách hàng  -->
<?php 
   
    if(isset($_SESSION['MaNguoiDung'])){
        $MaNguoiDung= $_SESSION['MaNguoiDung'];
        include_once __DIR__.'/ketnoi.php';
        
        $sql = "SELECT * FROM chitietdonhang WHERE MaNguoiDung = '$MaNguoiDung'";
        $ketqua = mysqli_query($conn , $sql);
        $data=[];
        while ($phu = mysqli_fetch_array($ketqua, MYSQLI_ASSOC)){
            $data[]=array(
                'SoLuong'=>$phu['SoLuong'],
                'Gia'=>$phu['Gia'],
                'MaNguoiDung'=>$phu['MaNguoiDung'],
                'NgayDatHang'=>$phu['NgayDatHang'],
                'MaChiTietDonHang'=>$phu['MaChiTietDonHang'],
                'MaSanPham'=>$phu['MaSanPham'],
                'LinkAnh'=>$phu['LinkAnh'],
                'TenSanPham'=>$phu['TenSanPham'],
            );
        }
    } else {
        echo "Không tìm thấy mã người dùng!";
    }
?>
