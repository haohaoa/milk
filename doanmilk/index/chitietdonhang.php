<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn thanh toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .kien_truc {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .tieu_de {
            text-align: center;
            margin-bottom: 20px;
        }

        .thong_tin {
            margin-bottom: 20px;
        }

        .thong_tin p {
            margin: 5px;
        }

        .thong_tin input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .bang_hoa_don {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .bang_hoa_don th, .bang_hoa_don td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .tong_cong {
            text-align: right;
            font-weight: bold;
        }

        .nut_thanh_toan {
            display: block;
            width: 200px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }
        .nut{
            display: flex;
            justify-content: space-between;
        }
        .nut_hủy{
            display: block;
            width: 200px;
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }
        .nut_thanh_toan:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- lấy id từ đường get  -->
    <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        include_once __DIR__.'/../backend/ketnoi.php';
        // dùng id để tìm ra thông tin sản phẩm
        $sql = "SELECT * FROM thanhtoan where MaThanhToan = $id;";

        $ketqua = mysqli_query($conn, $sql);
        
        $data = mysqli_fetch_array($ketqua , MYSQLI_ASSOC);
        $NgayThanhToan = $data['NgayThanhToan'];
        $MaNguoiDung = $data['MaNguoiDung'];
        $hoten = $data['hoten'];
        $diachi = $data['diachi'];
        $DienThoai = $data['DienThoai'];
        $tongtien = $data['tongtien'];
        $tensanpham = $data['tensanpham'];
        $soluong = $data['soluong'];
        $linkanh = $data['linkanh'];
        $giasp = $data['giasp'];
        $masanpham = $data['masanpham'];
        $email = $data['email'];
        // chạy câu lệnh sql để cập nhật trạng thái đã xem vào sql 
        $sqlUpdate = "UPDATE thanhtoan SET TrangThai = 'Đã Xem' WHERE MaThanhToan = $id";
        mysqli_query($conn, $sqlUpdate);
        // cập nhật huy 
        if (isset($_POST['huy'])) {
            include_once __DIR__.'/../backend/ketnoi.php';
        
            $sqlhuy = "UPDATE thanhtoan SET TrangThai = 'Đã Hủy' WHERE MaThanhToan = $id";
            // Kiểm tra và thực hiện truy vấn
            if (!mysqli_query($conn, $sqlhuy)) {
                die("Lỗi: " . mysqli_error($conn));
            }
            echo ' <script>
            location.href = "/index/donhangkhachdat.php";
            </script>';
        }
        // cập nhật đã giao
        if (isset($_POST['giao'])) {
            include_once __DIR__.'/../backend/ketnoi.php';
        
            $sqlgiao = "UPDATE thanhtoan SET TrangThai = 'Đã giao' WHERE MaThanhToan = $id";
            // Kiểm tra và thực hiện truy vấn
            if (!mysqli_query($conn, $sqlgiao)) {
                die("Lỗi: " . mysqli_error($conn));
            }
            echo ' <script>
            location.href = "/index/donhangkhachdat.php";
            </script>';
        }
    ?>
    <div class="dau">
        <?php 
            include_once __DIR__ .'/dau.php'; 
            
        ?>
        <div class="nhanbiet"></div>
        <style>
            .nhanbiet{
                width: 98px;
                height: 7px;
                border-radius: 4px;
                background-color: #7171db;
                margin-left: 308px;
            }
        </style>
    </div>
    <div class="kien_truc">
        <div class="tieu_de">
            <h2>Hóa đơn đã thanh toán</h2>
       
      
        <h3> Tên khách hàng: <?php echo $hoten?></h3>
        <h5>Địa chỉ: <?php echo $diachi?></h5>
        <h5>Email: <?php echo $email?></h5>
        <h5>SDT: <?php echo $DienThoai?></h5>
       

        <table class="bang_hoa_don">
            <tr>
                <th>Sản phẩm</th>
                <th>tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng cộng</th>
            </tr>
             
            <tr>
                <td>
                    <img src="<?php echo $linkanh?>" alt="sản phâm" style="width: 100px; display: block;margin: 0 auto;">
                </td>
                <td><?php echo $tensanpham?></td>
                <td><?php echo $soluong?></td>
                <td><?php echo number_format($giasp, 0, ',', '.'); ?></td>
                <td><?php echo number_format($tongtien, 0, ',', '.'); ?></td>
            </tr>
                 
            <tr>
                <td colspan="4">Tổng cộng</td>
                <td><?php echo number_format($tongtien, 0, ',', '.'); ?> VND</td>
            </tr>

        </table>
        <div class="tong_cong">
            <p><strong>Tổng cộng: </strong><?php echo number_format($tongtien, 0, ',', '.'); ?> VND</p>
        </div>
        
        <form method="post" class="nut">
                <button  class="nut_hủy" name="huy" >Hủy đơn</button>
                <button  class="nut_thanh_toan" name="giao">Giao hàng </button>
        </form>
    </div>
    <div class="duoi">
        <?php 
            include_once __DIR__ .'/cuoi.php'; 
        ?>
    </div>  
</body>
</html>
