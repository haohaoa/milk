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
                width: 141px;
                height: 7px;
                border-radius: 4px;
                background-color: #7171db;
                margin-left: 418px;
            }
        </style>
    </div>
    <div class="container">
    <h2>Đơn Hàng đã Đặt</h2>
    <!-- lấy tất cả dử liệu từ giỏ hàng  -->
    <?php include_once __DIR__.'/../backend/damua.php';?>
    
    <table class="giohang" id="giohang">
        <tr>
            <th>Ảnh sản phẩm</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Trạng Thái</th>
         
        </tr>
        <?php
        $tong = 0; // Khởi tạo biến tổng
        foreach($data as $gh){
            $thanhTien = $gh['soluong'] * $gh['giasp']; // Tính giá trị của cột "Thành tiền"
        ?>
            <tr>
                <td><img src="<?php echo $gh['linkanh'];?>" alt="Product 1" style="max-width: 50px; height: auto;"></td>
                <td><?php echo $gh['tensanpham'];?></td>
                <td><?php echo number_format($gh['giasp'], 0, ',', '.'); ?></td>
                <td><?php echo $gh['soluong'];?></td>
                <td><?php echo number_format($thanhTien, 0, ',','.');?> VND</td>
                <td style="color: red;"><?php echo $gh['TrangThai']?></td>
            </tr>
            
                    
             <?php $tong += $thanhTien; // Tính tổng ?>
        <?php }?>
        <tr>
            <td colspan="5">Tổng cộng</td>
            <td><?php echo number_format($tong , 0,',','.') ;?> VND</td>
            
        </tr>
    </table>
    <div class="tongtien">
        <p><?php echo number_format($tong , 0,',','.') ;?> VND</p>
    </div>
</div>

    <div class="duoi">
        <?php 
            include_once __DIR__ .'/cuoi.php'; 
        ?>
      
       
    </div>  
</body>
</html>
<
