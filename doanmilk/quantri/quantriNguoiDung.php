<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị</title>
</head>
<body>
    <div class="dau">
        <?php 
            include_once __DIR__ .'/../index/dau.php'; 
        ?>
        <div class="nhanbiet"></div>
    </div>
    <div class=" trang chủ">
        <ul class="quanly">
            <li>
                <a href="/quantri/quantri.php">Quản Lý Sản Phẩm</a>
            </li>
            <li>
                <a style="background-color: limegreen; color: #000;"  href="/quantri/quantriNguoiDung.php">Quản Lý Người Dùng</a>
            </li>  
            <li>
                <a  href="/quantri/quantriBoster.php">Quản Lý boster</a>
            </li>       
</ul>
        <h2>Trang quản trị</h2>
        <div class="them">
            <a id="qtthem" href="/quantri/them.php?2">Thêm Người Dùng</a>

        </div>
        <table>
            <tr>
                <th>Mã người dùng</th>
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Điện thoại</th>
                <th>Quản trị</th>
                <th>chỉnh sửa</th>
            </tr>
            <?php 
            include_once __DIR__. '/../backend/allNguoidung';
            foreach($data as $sp){?>
            <tr>
                <td><?php echo $sp['MaNguoiDung']?></td>
                
                <td><?php echo $sp['TenNguoiDung']?></td>
                <td><?php echo $sp['Email']?></td>
                <td><?php echo $sp['MatKhau']?></td>
                <td><?php echo $sp['DienThoai']?></td>
                <td><?php echo $sp['QuanTri']?></td>
                <td>
                    <button onclick="xuly(<?php echo $sp['MaNguoiDung']?>)">Xóa</button>
                    <a href="/quantri/suaSP.php?id_NguoiDung=<?php echo $sp['MaNguoiDung']?>"><button>Sửa</button></a>
                </td>
            </tr>
            <?php }?>  
        </table>
    </div> 
   
    
      
   
    
    <div class="duoi">
    <?php 
        include_once __DIR__ .'/../index/cuoi.php'; 
    ?>
    </div>
    
</body>
</html>
    <style>
        .nhanbiet{
            width: 85px;
            height: 7px;
            border-radius: 4px;
            background-color: #7171db;
            margin-left: 415px;
        }
    </style> 
    <style>
        .quanly{
            display: flex;
            list-style-type: none;
            padding:  20px ;
            position: fixed;
            bottom: -11px;
            left: 0;
            background-color: darkgray;
           
        }
        .quanly li a:hover{
            background-color: aquamarine;
            color: #000;
            transition: all ease-in-out 0.5s;
        }
        .quanly li a{
            text-decoration: none;
            padding: 20px;
            color: #f2f2f2;
        }
        /* CSS cho bảng hiển thị sản phẩm */
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
    </style>
    <style>
        .them{
            display: flex;
            width: 100%;
            height: 60px;
            margin-bottom: 10px;
        }
         #qtthem{
            justify-content: center;
            text-decoration: none;
            color: aliceblue;
            padding: 20px;
            background-color: limegreen;
            margin-left: 20px;
            border-radius: 2px;
        }
        #qtthem:hover{
            background-color: mediumseagreen;
        }
    </style>
    <script>
            function xuly(id) {
                if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")) {
                    window.location.href = "/backend/qtXoaNguoiDung.php?id=" + id;
                }
            }
    </script>