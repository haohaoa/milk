<!-- lấy ra tất cả sản phẩm khách hàng đã mua -->
<?php 
   
    if(isset($_SESSION['MaNguoiDung'])){
        $MaNguoiDung= $_SESSION['MaNguoiDung'];
        include_once __DIR__.'/ketnoi.php';
        
        $sql = "SELECT * FROM thanhtoan WHERE MaNguoiDung = '$MaNguoiDung' ORDER BY MaThanhToan DESC";
        $ketqua = mysqli_query($conn , $sql);
        $data=[];
        while ($phu = mysqli_fetch_array($ketqua, MYSQLI_ASSOC)){
            $data[]=array(
                'tensanpham'=>$phu['tensanpham'],
                'soluong'=>$phu['soluong'],
                'linkanh'=>$phu['linkanh'],
                'giasp'=>$phu['giasp'],
                'masanpham'=>$phu['masanpham'],
                'TrangThai'=>$phu['TrangThai'],
            );
        }
    } else {
        echo "Không tìm thấy mã người dùng!";
    }
?>
