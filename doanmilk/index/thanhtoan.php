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
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin-top: 20px;
        }

        .nut_thanh_toan:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    
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
                margin-left: 317px;
            }
        </style>
    </div>
    <div class="kien_truc">
        <div class="tieu_de">
            <h2>Hóa đơn thanh toán</h2>
        </div>
        <?php if(isset($_SESSION['dadangnhap'])){
            $ten = $_SESSION['TenNguoiDung'];
            $emal = $_SESSION['username'];
            $MaNguoiDung = $_SESSION['MaNguoiDung'];
        }else{
            echo '<script>location.href ="/index/index.php";</script>';

        }?>
        <form  method="post" class="thong_tin">
            <input type="text" name="hoten" placeholder="Nhập tên người mua" value="<?php echo  $ten; ?>"> 
            <input type="text" name="diachi" placeholder="Nhập địa chỉ người mua">
            <input type="text" name="email" placeholder="Nhập email người mua" value="<?php echo  $emal; ?>">
            <input type="text" name="sdt" placeholder="Nhập số điện thoại người mua">
        
        <table class="bang_hoa_don">
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng cộng</th>
            </tr>
            <?php $tong = 0; ?>
            <?php include_once __DIR__.'/../backend/giohang.php';?>
            <?php foreach($data as $gh){
                $thanhTien = $gh['SoLuong'] * $gh['Gia'];
                $tong = $tong + $thanhTien;
            ?>
                <tr>
                    <td><?php echo $gh['TenSanPham']?></td>
                    <td><?php echo $gh['SoLuong']?></td>
                    <td><?php echo number_format($gh['Gia'], 0, ',', '.'); ?></td>
                    <td><?php echo number_format($thanhTien, 0, ',', '.'); ?></td>
                </tr>
                 
            <?php }?>
        
            <tr>
                <td colspan="3">Tổng cộng</td>
                <td><?php echo $tong?></td>
            </tr>
        </table>
        <div class="tong_cong">
            <p><strong>Tổng cộng: </strong><?php echo number_format($tong, 0, ',', '.'); ?> VND</p>
        </div>
        
        <button name="thanhtoan" class="nut_thanh_toan">Thanh toán</button>

        </form>
        <div class="footer">
            <p>Cảm ơn bạn đã mua hàng!</p>
        </div>
    </div>
    <div class="duoi">
        <?php 
            include_once __DIR__ .'/cuoi.php'; 
        ?>
    </div>  
</body>
</html>
<!-- xử lý thanh toán và các iuput  -->
<?php
    if (isset($_POST['thanhtoan'])) {
        $hoten = $_POST["hoten"];
        $email = $_POST["email"];
        $diachi = $_POST["diachi"];
        $sdt = $_POST["sdt"];
        $ngayHienTai = date("Y-m-d H:i:s"); // Thêm thời gian phút
        
        if (strlen($ten) < 3 || strlen($ten) > 20) {
            echo '<script>alert("Tên phải có ít nhất 3 ký tự và không được vượt quá 20 ký tự.")</script>';
            die;
        }
        // Kiểm tra địa chỉ email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>
            alert("Địa chỉ Email không hợp lệ")
            </script>';
            die;
        } else {
            list($user, $domain) = explode('@', $email);
            if (!checkdnsrr($domain, 'MX')) {
                echo '<script>
                alert("Địa chỉ Email không tồn tại")
                </script>';
                die;
            }
        }
        // Kiểm tra định dạng số điện thoại
        if (!preg_match("/^[0-9]{10,11}$/", $sdt)) {
            echo '<script>
            alert("Số điện thoại không hợp lệ. Vui lòng nhập lại.")
            </script>';
            die;
        }

        include_once __DIR__.'/../backend/ketnoi.php';

     
    
        //lấy thồng tin thanh toán 
        foreach ($data as $gh) {
            $MaSanPham = $gh['MaSanPham'];
            $linkanh = $gh['LinkAnh'];
            $giasp = $gh['Gia'];
            $soluong = $gh['SoLuong'];
            $tensanpham = $gh['TenSanPham'];
        
            $sql1 = "INSERT INTO thanhtoan (NgayThanhToan, MaNguoiDung, hoten, diachi, DienThoai, email, tongtien, masanpham, tensanpham, soluong, linkanh, giasp) 
            VALUES ('$ngayHienTai', '$MaNguoiDung', '$ten', '$diachi', '$sdt', '$email', '$tong', '$MaSanPham', '$tensanpham', '$soluong', '$linkanh', '$giasp') ";
                                
            $chay1 = mysqli_query($conn, $sql1);
        
            if ($chay1) {
                echo '<script>
                location.href ="/index/thanhcong.php";
                </script>';
            } else {
                echo '<script>
                alert(" thanh toát thất bại")
                </script>';
            }
            
        }
    }
    ?>