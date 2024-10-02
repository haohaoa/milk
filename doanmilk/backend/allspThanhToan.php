<!-- lấy tất cả các sản phẩm thanh toán  -->
<?php 
    include_once __DIR__.'/ketnoi.php';
    
    $sql = "SELECT * FROM thanhtoan ORDER BY MaThanhToan DESC;";
    $ketqua = mysqli_query($conn , $sql);
    $data=[];
    while ($phu = mysqli_fetch_array($ketqua, MYSQLI_ASSOC)){
        $data[]=array(
            'MaThanhToan'=>$phu['MaThanhToan'],
            'NgayThanhToan'=>$phu['NgayThanhToan'],
            'MaNguoiDung'=>$phu['MaNguoiDung'],
            'hoten'=>$phu['hoten'],
            'diachi'=>$phu['diachi'],
            'DienThoai'=>$phu['DienThoai'],
            'email'=>$phu['email'],
            'tongtien'=>$phu['tongtien'],
            'tensanpham'=>$phu['tensanpham'],
            'soluong'=>$phu['soluong'],
            'linkanh'=>$phu['linkanh'],
            'giasp'=>$phu['giasp'],
            'masanpham'=>$phu['masanpham'],
            'TrangThai'=>$phu['TrangThai'],

        
        );
    }
?>