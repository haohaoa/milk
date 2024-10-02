<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="dau">
    <?php include_once __DIR__ .'/dau.php'; ?>
    </div>
        <!-- lấy dử liệu từ đường get -->
            <?php include_once __DIR__.'/../backend/ketnoi.php';
            if(isset($_GET['dulieu'])){
                $dulieu = $_GET['dulieu'];
            }

            $sql = "SELECT * FROM sanpham WHERE TenSanPham LIKE '%$dulieu%'";

            $chay = mysqli_query($conn, $sql);

            $data=[];
            while ($phu = mysqli_fetch_assoc($chay)) {
                $data[] = array(
                    'TenSanPham' => $phu['TenSanPham'],
                    'MaSanPham' => $phu['MaSanPham'],
                    'hangSanPham' => $phu['hangSanPham'],
                    'loaiSanPham' => $phu['loaiSanPham'],
                    'Gia' => $phu['Gia'],
                    'TrongLuong' => $phu['TrongLuong'],
                    'ThanhPhanDinhDuong' => $phu['ThanhPhanDinhDuong'],
                    'LoiIch' => $phu['LoiIch'],
                    'linkanh' => $phu['linkanh'],
                );
            }
            ?>
    <div id="danh-sach-san-pham" class="than">

        <?php foreach( $data as $sp) {?>
        <a href="/index/sanpham.php?id=<?php echo $sp['MaSanPham'];?>" class="danh-sach-san-pham">
            <div class="san-pham">
                <img src="<?php echo $sp['linkanh'];?>" alt="San pham 1" class="hinh-anh-san-pham">
                <h2> <?php echo $sp['TenSanPham']?></h2>
                <p>Giá: <?php echo number_format($sp['Gia'], 0, ',', '.'); ?> VND</p>
                <p>Hãng: <?php echo $sp['hangSanPham']?></p>
                <p>Loại: <?php 
                        if($sp['loaiSanPham'] == 'b') {
                            echo 'sữa bột';
                        } else {
                            echo 'sữa tuơi';
                        }
                        ?>
                </p>         
            </div>
        </a>
        <?php }?>
    </div>
    <div class="cuoi">
    <?php include_once __DIR__ .'/cuoi.php'; ?>
    </div>
</body>
</html>