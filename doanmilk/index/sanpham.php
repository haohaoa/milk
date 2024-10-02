<?php if(isset($_GET['id'])){
    $id = $_GET['id'];
    include_once __DIR__ .'/../backend/ketnoi.php';
    $sql = "SELECT * FROM sanpham WHERE MaSanPham = '$id';";
    $ketqua = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($ketqua,MYSQLI_ASSOC);
    $MaSanPham = $data['MaSanPham'];
    $TenSanPham = $data['TenSanPham'];
    $hangSanPham =  $data['hangSanPham'];
    $Gia= $data['Gia'];
    $TrongLuong= $data['TrongLuong'];
    $loaiSanPham= $data['loaiSanPham'];
    $ThanhPhanDinhDuong= $data['ThanhPhanDinhDuong'];
    $LoiIch= $data['LoiIch'];
    $linkanh= $data['linkanh'];
 }?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $TenSanPham;?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .sanpham {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .hinhanh {
            flex: 1;
        }

        .hinhanh img {
            max-width: 100%;
            height: auto;
        }

        .chitiet {
            flex: 1;
            padding: 0 20px;
        }

        .tieude {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .mota {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .gia {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .nut {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="dau">
        <?php 
            include_once __DIR__ .'/dau.php'; 
        ?>
    </div>
    <div class="container">
        <div class="sanpham">
            <div class="hinhanh">
                <img src="<?php echo $linkanh;?>" alt="Product Image">
            </div>
            <div class="chitiet">
                <h1 class="tieude"><?php echo $TenSanPham;?></h1>
                <p class="mota"><?php echo $LoiIch;?> <br> Chất dinh dưỡng: <?php echo $ThanhPhanDinhDuong;?> <br> Loại: <?php 
                        if($loaiSanPham == 'b') {
                            echo 'sữa bột';
                        } else {
                            echo 'sữa tươi';
                        }
                        ?>
                </p>
                <p class="gia"><?php echo number_format($Gia, 0, ',', '.'); ?>/VND</p>
                <div class="nut">
                    <form method="post">
                        <label for="quantity">Số lượng:</label> 
                        <input type="number" id="quantity" name="soluong" min="1" max="100" value="1"> <br> <br>
                        <?php if(isset($_SESSION['dadangnhap'])){?>
                        <button class="btn" name="giohang">Thêm vào giỏ hàng</button>
                        <button class="btn" name="muangay">Mua ngay</button>
                        <?php }else{?>
                        <button class="btn" onclick="xulydangnhap()">Thêm vào giỏ hàng</button>
                        <button class="btn" onclick="xulydangnhap()" >Mua ngay</button>
                        <?php }?>
                        <script>
                            function xulydangnhap(){
                              var tam =  confirm("Bạn cần phải đăng nhập trước khi mua ");
                              if(tam == true){
                                location.href ="dangnhap.php";
                              }
                            }
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="sanphamlienquan">
        <h2 style="margin-left: 45px;">Sản Phẩm Liên Quan</h2>
        <div class="than">
              <?php if($loaiSanPham == 'Sữa tươi'){
                $tam = 'allSuatuoi';
                }
                else {
                $tam = 'suabot';
                }?>
                <?php include_once __DIR__ . "/../backend/{$tam}.php"; ?>
                <?php foreach( $data as $sp) {?>
                    <a href="/index/sanpham.php?id=<?php echo $sp['MaSanPham'];?>" class="danh-sach-san-pham">
                    <div class="san-pham">
                        <img src="<?php echo $sp['linkanh'];?>" alt="San pham 1" class="hinh-anh-san-pham">
                        <h2> <?php echo $sp['TenSanPham']?></h2>
                        <p>Gia: <?php echo $sp['Gia']?></p>
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
       
    </div>
    <div class="duoi">
        <?php 
            include_once __DIR__ .'/cuoi.php'; 
        ?>
    </div>
    <?php if(isset($_SESSION['dadangnhap'])){
         $MaNguoiDung = $_SESSION['MaNguoiDung'];
    }?>
    <!-- them vào giỏ hàng  -->
    <?php
 
    $ngayHienTai = date("Y-m-d H:i:s"); // Thêm thời gian phút
    if(isset($_POST['giohang'])){
        $soluong = $_POST['soluong'];
        $sqlgio = "INSERT INTO chitietdonhang (SoLuong, Gia, MaNguoiDung, NgayDatHang, MaSanPham, LinkAnh, TenSanPham) 
        VALUES ($soluong, $Gia, '$MaNguoiDung', '$ngayHienTai', '$id', '$linkanh', '$TenSanPham');";

        if(mysqli_query($conn, $sqlgio)){
            echo '<script>alert("Đã thêm vào giỏ hàng")</script>';
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
    ?>

    <!-- mua ngay  -->
    <?php
  
    $ngayHienTai = date("Y-m-d H:i:s"); // Thêm thời gian phút
    if(isset($_POST['muangay'])){
        $soluong = $_POST['soluong'];
        $sqlgio = "INSERT INTO chitietdonhang (SoLuong, Gia, MaNguoiDung, NgayDatHang, MaSanPham, LinkAnh, TenSanPham) 
        VALUES ($soluong, $Gia, '$MaNguoiDung', '$ngayHienTai', '$id', '$linkanh', '$TenSanPham');";

        if(mysqli_query($conn, $sqlgio)){
            echo '<script>location.href ="/index/giohang.php";</script>';
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    }
?>


</body>
</html>
