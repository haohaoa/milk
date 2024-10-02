<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa</title>
</head>
<body>
            <div class="dau">
                    <?php 
                        include_once __DIR__ .'/../index/dau.php'; 
                    ?>
            <div class="nhanbiet"></div>
            <style>
        .nhanbiet{
            width: 85px;
            height: 7px;
            border-radius: 4px;
            background-color: #7171db;
            margin-left: 409px;
        }
 
        </style> 
        <style>
            .form {
                background-color: lightgray;
                width: 96%;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .tendn {
                font-weight: bold;
            }

            .tendangnhap {
                
                padding: 10px;
                margin: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .tendangnhap:focus {
                border-color: #007BFF; /* Màu viền khi input được focus */
            }

            .radio-label {
                display: inline-block;
                margin-right: 10px;
            }

            .ptn {
                display: block;
               
                padding: 10px 20px;
                margin: 20px 0;
                background-color: #007BFF;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
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
        </style>
            <?php
            include_once __DIR__.'/../backend/ketnoi.php'; // Kết nối đến cơ sở dữ liệu

            // Kiểm tra nếu có tham số 'id' trên URL
            if (isset($_GET['id_SP'])) {
                $id = $_GET['id_SP'];
                
                // Tìm kiếm phim dựa trên id
                $sql = "SELECT * FROM sanpham WHERE MaSanPham = $id";
                $chay = mysqli_query($conn, $sql);

                if ($chay && mysqli_num_rows($chay) > 0) {
                    $ketqua = mysqli_fetch_array($chay, MYSQLI_ASSOC);
                    // Lấy dữ liệu bỏ vào biến kết quả

                    // Xử lý biểu mẫu sửa
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Xử lý nếu yêu cầu là POST
                        
                        $TenSanPham = $_POST['TenSanPham'];
                        $hangSanPham = $_POST['hangSanPham'];
                        $loaiSanPham = $_POST['loaiSanPham'];
                        $Gia = $_POST['Gia'];
                        $TrongLuong = $_POST['TrongLuong'];
                        $ThanhPhanDinhDuong = $_POST['ThanhPhanDinhDuong'];
                        $LoiIch = $_POST['LoiIch'];
                        $linkanh = $_POST['linkanh'];

                        // Cập nhật thông tin phim trong cơ sở dữ liệu
                        $updateSql = "UPDATE sanpham SET 
                        TenSanPham = '$TenSanPham',
                        hangSanPham = '$hangSanPham', 
                        loaiSanPham = '$loaiSanPham', 
                        Gia = '$Gia',
                        TrongLuong = '$TrongLuong',
                        ThanhPhanDinhDuong = '$ThanhPhanDinhDuong',
                        LoiIch = '$LoiIch',
                        linkanh ='$linkanh' 
                        WHERE MaSanPham = $id";
                        $updatechay = mysqli_query($conn, $updateSql);

                        if ($updatechay) {
                            echo '<script>window.location.href = "/quantri/quantri.php";</script>';
                        } else {
                            echo 'Có lỗi xảy ra khi cập nhật dữ liệu: ' . mysqli_error($conn);
                        }
                        
                    }

                    // Hiển thị biểu mẫu sửa
                    ?>
                    <form name="formdannhap" class="form" method="POST" style="background-color: lightgray;">
                        
                        <label class="tendn" for="dao_dien">Tên Sản Phẩm:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="TenSanPham" value="<?php echo $ketqua['TenSanPham']; ?>">
                        <br>
                    
                        <label class="tendn" for="dao_dien">Hãng Sản Phẩm:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="hangSanPham" value="<?php echo $ketqua['hangSanPham']; ?>">
                        <br>

                        <label class="tendn" for="link_anh_bia">Loại Sản Phẩm:</label>
                        <br>
                        <select class="tendangnhap" style="width: 97%; margin: 10px;" name="loaiSanPham">
                            <option value="t" <?php echo ($ketqua['loaiSanPham'] == 't') ? 'selected' : ''; ?>>Sữa Tươi</option>
                            <option value="b" <?php echo ($ketqua['loaiSanPham'] == 'b') ? 'selected' : ''; ?>>Sữa Bột</option>
                        </select>
                        <br>


                        <label class="tendn" for="link_video">Giá:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="Gia" value="<?php echo $ketqua['Gia']; ?>">
                        <br>
                        
                        <label class="tendn" for="link_video">Trọng Lượng:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="TrongLuong" value="<?php echo $ketqua['TrongLuong']; ?>" >
                        <br>
                        
                        <label class="tendn" for="loai_phim">Thành Phần Dinh Dưỡng:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="ThanhPhanDinhDuong" value="<?php echo $ketqua['ThanhPhanDinhDuong']; ?>">
                        <br>

                        <label class="tendn" for="phim_bo_le">Lợi Ích:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="LoiIch" value="<?php echo $ketqua['LoiIch']; ?>">
                        <br>
                        
                        <label class="tendn" for="ma_phimbo">Link ảnh:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="linkanh" value="<?php echo $ketqua['linkanh']; ?>">
                        <br>

                        <input type="submit" value="Lưu" class="ptn">
                    </form>
                    <ul class="quanly">
                        <li>
                            <a style="background-color: aquamarine; color: #000;" href="/quantri/quantri.php">Quản Lý Sản Phẩm</a>
                        </li>
                        <li>
                            <a  href="/quantri/quantriNguoiDung.php">Quản Lý Người Dùng</a>
                        </li>  
                        <li>
                            <a  href="/quantri/quantriBoster.php">Quản Lý boster</a>
                        </li>       
                    </ul>  
                    <?php
                   
                } else {
                    echo 'Không tìm thấy phim với id đã cho.';
                }

                mysqli_close($conn); // Đóng kết nối
            }
            ?>  

            <?php
            include_once __DIR__.'/../backend/ketnoi.php'; // Kết nối đến cơ sở dữ liệu

            // Kiểm tra nếu có tham số 'id' trên URL
            if (isset($_GET['id_NguoiDung'])) {
                $id_NguoiDung = $_GET['id_NguoiDung'];
                
                // Tìm kiếm phim dựa trên id
                $sqlND = "SELECT * FROM nguoidung WHERE MaNguoiDung = $id_NguoiDung";
                $chayND = mysqli_query($conn, $sqlND);

                if ($chayND && mysqli_num_rows($chayND) > 0) {
                    $ketquaND = mysqli_fetch_array($chayND, MYSQLI_ASSOC);
                    // Lấy dữ liệu bỏ vào biến kết quả

                    // Xử lý biểu mẫu sửa
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Xử lý nếu yêu cầu là POST
                        
                        $TenNguoiDung = $_POST['TenNguoiDung'];
                        $Email = $_POST['Email'];
                        $MatKhau = $_POST['MatKhau'];
                        $DienThoai = $_POST['DienThoai'];
                        $QuanTri = $_POST['QuanTri'];
                

                        // Cập nhật thông tin phim trong cơ sở dữ liệu
                        $updateSqlND = "UPDATE nguoidung SET 
                        TenNguoiDung = '$TenNguoiDung',
                        Email = '$Email', 
                        MatKhau = '$MatKhau', 
                        DienThoai = '$DienThoai',
                        QuanTri = '$QuanTri'
                        WHERE MaNguoiDung = $id_NguoiDung";
                        $updatechayND = mysqli_query($conn, $updateSqlND);

                        if ($updatechayND) {
                            echo '<script>window.location.href = "/quantri/quantriNguoiDung.php";</script>';
                        } else {
                            echo 'Có lỗi xảy ra khi cập nhật dữ liệu: ' . mysqli_error($conn);
                        }
                        
                    }

                    // Hiển thị biểu mẫu sửa
                    ?>
                    <form name="formdannhap" class="form" method="POST" style="background-color: lightgray;">
                        
                        <label class="tendn" for="dao_dien">Tên Người Dùng:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="TenNguoiDung" value="<?php echo $ketquaND['TenNguoiDung']; ?>">
                        <br>
                    
                        <label class="tendn" for="dao_dien">Email:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="Email" value="<?php echo $ketquaND['Email']; ?>">
                        <br>

                        <label class="tendn" for="link_anh_bia">Mật Khẩu:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="MatKhau" value="<?php echo $ketquaND['MatKhau']; ?>">
                        <br>

                        <label class="tendn" for="link_video">Điện Thoại:</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="DienThoai" value="<?php echo $ketquaND['DienThoai']; ?>">
                        <br>

                        <label class="tendn" for="loai_phim">Quản Trị:</label>
                        <br>
                        <input class="tendangnhap" style="margin: 10px;" type="radio" name="QuanTri" value="1" <?php if($ketquaND['QuanTri'] == 1) echo 'checked'; ?>>
                        <label for="1">1</label>
                        <input class="tendangnhap" style="margin: 10px;" type="radio" name="QuanTri" value="0" <?php if($ketquaND['QuanTri'] == 0) echo 'checked'; ?>>
                        <label for="0">0</label>
                        <br>
                        <input type="submit" value="Lưu" class="ptn">
                    </form>
                    <ul class="quanly">
                        <li>
                            <a  href="/quantri/quantri.php">Quản Lý Sản Phẩm</a>
                        </li>
                        <li>
                            <a style="background-color: aquamarine; color: #000;" href="/quantri/quantriNguoiDung.php">Quản Lý Người Dùng</a>
                        </li>  
                        <li>
                            <a  href="/quantri/quantriBoster.php">Quản Lý boster</a>
                        </li>       
                    </ul> 
                    <?php
                } else {
                    echo 'Không tìm thấy phim với id đã cho.';
                }

                mysqli_close($conn); // Đóng kết nối
            }
            ?>  

             <?php
            include_once __DIR__.'/../backend/ketnoi.php'; // Kết nối đến cơ sở dữ liệu

            // Kiểm tra nếu có tham số 'id' trên URL
            if (isset($_GET['id_Boster'])) {
                $id_Boster = $_GET['id_Boster'];
                
                // Tìm kiếm phim dựa trên id
                $sqlbt = "SELECT * FROM boster WHERE maboster = $id_Boster";
                $chaybt = mysqli_query($conn, $sqlbt);

                if ($chaybt && mysqli_num_rows($chaybt) > 0) {
                    $ketquabt = mysqli_fetch_array($chaybt, MYSQLI_ASSOC);
                    // Lấy dữ liệu bỏ vào biến kết quả

                    // Xử lý biểu mẫu sửa
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Xử lý nếu yêu cầu là POST
                        
                        $linkboster = $_POST['linkboster'];
                       
                

                        // Cập nhật thông tin phim trong cơ sở dữ liệu
                        $updateSqlbt = "UPDATE boster SET 
                        linkboster = '$linkboster'
                        WHERE maboster = $id_Boster";
                        $updatechaybt = mysqli_query($conn, $updateSqlbt);

                        if ($updatechaybt) {
                            echo '<script>window.location.href = "/quantri/quantriBoster.php";</script>';
                        } else {
                            echo 'Có lỗi xảy ra khi cập nhật dữ liệu: ' . mysqli_error($conn);
                        }
                        
                    }

                    // Hiển thị biểu mẫu sửa
                    ?>
                    <form name="formdannhap" class="form" method="POST" style="background-color: lightgray;">
                        
                        <label class="tendn" for="dao_dien">Boster :</label>
                        <br>
                        <input class="tendangnhap" style="width: 97%; margin: 10px;" type="text" name="linkboster" value="<?php echo $ketquabt['linkboster']; ?>">
                        <br>
                    
                        <input type="submit" value="Lưu" class="ptn">
                    </form>
                    <ul class="quanly">
                        <li>
                            <a  href="/quantri/quantri.php">Quản Lý Sản Phẩm</a>
                        </li>
                        <li>
                            <a style="background-color: aquamarine; color: #000;" href="/quantri/quantriNguoiDung.php">Quản Lý Người Dùng</a>
                        </li>  
                        <li>
                            <a  href="/quantri/quantriBoster.php">Quản Lý boster</a>
                        </li>       
                    </ul> 
                    <?php
                } else {
                    echo 'Không tìm thấy phim với id đã cho.';
                }

                mysqli_close($conn); // Đóng kết nối
            }
            ?>  


    <div class="duoi">
        <?php 
            include_once __DIR__ .'/../index/cuoi.php'; 
        ?>
    </div>
       
</body>
</html>
