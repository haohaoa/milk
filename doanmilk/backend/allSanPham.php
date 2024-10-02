<!-- lấy tất cả các sản phẩm trong bản sản phẩm -->
<?php 
    include_once __DIR__.'/ketnoi.php';
    
    $sql = "SELECT * FROM sanpham;";
    $ketqua = mysqli_query($conn , $sql);
    $data=[];
    while ($phu = mysqli_fetch_array($ketqua, MYSQLI_ASSOC)){
        $data[]=array(
            'MaSanPham'=>$phu['MaSanPham'],
            'TenSanPham'=>$phu['TenSanPham'],
            'hangSanPham'=>$phu['hangSanPham'],
            'loaiSanPham'=>$phu['loaiSanPham'],
            'Gia'=>$phu['Gia'],
            'TrongLuong'=>$phu['TrongLuong'],
            'ThanhPhanDinhDuong'=>$phu['ThanhPhanDinhDuong'],
            'linkanh'=>$phu['linkanh'],
            'LoiIch'=>$phu['LoiIch'],
        
        );
    }
?>