<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        /* CSS for the table */
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

        .giohang {
            border-collapse: collapse;
            width: 100%;
        }

        .giohang th, .giohang td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .giohang th {
            background-color: #f2f2f2;
        }

        .giohang tr:hover {
            background-color: #f5f5f5;
        }

        .tongtien {
            text-align: right;
            margin-top: 20px;
            font-size: 20px;
        }

        .thanhtoan-btn {
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

        .thanhtoan-btn:hover {
            background-color: #45a049;
        }

        /* CSS for the delete button */
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 8px 12px;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #da190b;
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
                margin-left: 316px;
            }
        </style>
    </div>
    <div class="container">
    <h2>Giỏ hàng của bạn</h2>
    <!-- lấy tất cả dử liệu từ giỏ hàng  -->
    <?php include_once __DIR__.'/../backend/giohang.php';?>
    
    <table class="giohang" id="giohang">
        <tr>
            <th>Ảnh sản phẩm</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th></th>
        </tr>
        <?php
        $tong = 0; // Khởi tạo biến tổng
        foreach($data as $gh){
            $thanhTien = $gh['SoLuong'] * $gh['Gia']; // Tính giá trị của cột "Thành tiền"
        ?>
            <tr>
                <td><img src="<?php echo $gh['LinkAnh'];?>" alt="Product 1" style="max-width: 50px; height: auto;"></td>
                <td><?php echo $gh['TenSanPham'];?></td>
                <td><?php echo number_format($gh['Gia'], 0, ',', '.'); ?></td>
                <td><?php echo $gh['SoLuong'];?></td>
                <td><?php echo number_format($thanhTien, 0, ',','.');?> VND</td>
                <td> 
                    <button class="delete-btn" onclick="confirmDelete(<?php echo $gh['MaChiTietDonHang']; ?>)">Xóa</button>
                </td>
            </tr>
            
                    
             <?php $tong += $thanhTien; // Tính tổng ?>
        <?php }?>
        <tr>
            <td colspan="4">Tổng cộng</td>
            <td><?php echo number_format($tong , 0,',','.') ;?> VND</td>
            <td></td>
        </tr>
    </table>
    <div class="tongtien">
        <p><?php echo number_format($tong , 0,',','.') ;?> VND</p>
    </div>
    <a href="/index/thanhtoan.php" class="thanhtoan-btn">Đặt Hàng </a>
</div>

    <div class="duoi">
        <?php 
            include_once __DIR__ .'/cuoi.php'; 
        ?>
      
       
    </div>  
</body>
</html>
<!-- xử lý nút xóa -->
        <script>
            function confirmDelete(id) {
                if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
                    window.location.href = "/backend/xoasp.php?id=" + id;
                }
            }
        </script>