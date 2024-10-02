<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siêu thị Sữa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="/css/milk.css">
</head>
<body>  
    <header>
        <div class="header-container">
            <div class="logo">
                <img style="margin-right: 10px;" src="/img/OIG (1).jpg" alt="Siêu thị Sữa">
            </div>
            <div onclick="navbar()" class="icon">
                    <i class="fas fa-bars"></i>
            </div>
            <div class="navbar ">
            <div onclick="tat()" class="tat hien "></div>

            <nav>
                <ul >
                    <?php include_once __DIR__ .'/../backend/hamLayRaThongBao.php'; ?> 
                    <?php include_once __DIR__ .'/../backend/hamLayThongBaoGioHang.php'; ?> 
                    <?php if(isset($_SESSION['dadangnhap'])) {
                        $TenNguoiDung = $_SESSION['TenNguoiDung']; 
                        if(isset($_SESSION['QuanTri']) && $_SESSION['QuanTri'] == 1) { ?>
                            <li><a href="/index/index.php">Trang chủ</a></li>
                            <li><a href="/index/suatuoi.php">Sữa Tươi</a></li>
                            <li><a href="/index/suabot.php">Sữa Bột</a></li>
                            <li> <a  class="donhang" href="/index/donhangkhachdat.php">
                                Đơn Hàng
                                <?php echo $thongbaoqt; ?>
                                </a>
                            </li>
                            <li><a href="/quantri/quantri.php">Quản Trị</a></li>
                            <li><a  class="dangxuat" style="color: red;  cursor: pointer ;" onclick="xuly()">Đăng Xuất</a></li> 
                        <?php } else { ?>
                            <li><a href="/index/index.php">Trang chủ</a></li>
                            <li><a href="/index/suatuoi.php">Sữa Tươi</a></li>
                            <li><a href="/index/suabot.php">Sữa Bột</a></li>
                            <li><a  class="donhang" href="/index/giohang.php">Giỏ Hàng
                                
                                <?php echo $thongbao; ?>
                            </a></li>
                            <li><a href="/index/dadat.php">Đơn Hàng Đã Đặt</a></li>
                            <li><a class="dangxuat" style="color: red ;  cursor: pointer ;" onclick="xuly()">Đăng Xuất</a></li> 
                    <?php }
                    } else { ?>
                        <li><a href="/index/index.php">Trang chủ</a></li>
                        <li><a href="/index/suatuoi.php">Sữa Tươi</a></li>
                        <li><a href="/index/suabot.php">Sữa Bột</a></li>
                        <li><a href="/index/dangnhap.php" style="color: red;">Đăng Nhập</a></li> 
                        <a  href="/index/dangnhap.php" class="thong-bao-dang-nhap">
                            Bạn cần đăng nhập để thực hiện đầy đủ chức năng này!
                        </a>
                        <style>
                            .dangxuat {
                                cursor: pointer ;
                            }
                            .thong-bao-dang-nhap {
                                padding: 20px;
                                background-color: #f44336;
                                color: white;
                                font-size: 20px;
                                text-align: center;
                                border-radius: 3px;
                                position: fixed;
                                bottom: 0;
                                left: 0;
                                text-decoration: none;
                                z-index: 10;
                            }
                        </style>
                    <?php } ?>
                </ul>
            </nav>
            </div>
      
            <div class="search-container">
                <?php if(isset($_SESSION['dadangnhap'])) { ?>
                    <h3 style="margin-right: 20px; line-height: 2px;"><?php echo $TenNguoiDung; ?></h3> 
                <?php } ?>
                <div onclick="timkiem()" class="icon-tim icon_tim"> <i class="fas fa-search"></i> </div>
                <form class="timkiem " method="get">
                    <input type="text" name="tentk" placeholder="Tìm kiếm...">
                    <button type="submit" name="tim">Tìm</button>
                </form>
                <?php if(isset($_GET['tim'])) {
                  $dulieu = $_GET['tentk']; 
                  echo '<script>  location.href="/index/timkiem.php?dulieu='.$dulieu.'";
                  </script>';     
                }?>
            </div>
        </div>
        <script>
            function xuly(){
                var bien = confirm("Bạn có muốn đăng xuất hay không?");
                if (bien == true){
                     location.href="/backend/dangxuat.php";
                }
            }
        </script>
    </header>
</body>
</html>
 

<!-- css thông báo -->
<style>
    .donhang{
       
        position: relative;
    }
    .thongbao{
        position: absolute;
        width: 30px;
        text-align: center;
        border-radius: 8px;
        background-color: #f44336;
        top: -15px;
        color: #ffff;
        right: -10px;
       
    }
</style>
<script>
    function navbar() {
        var element = document.querySelector(".navbar");
        element.classList.toggle("hien");
    }
    function tat() {
    var element = document.querySelector(".navbar");
    element.classList.remove("hien");
    }
    function timkiem() {
        var element = document.querySelector(".timkiem");
        element.classList.toggle("hien");
    }

</script>