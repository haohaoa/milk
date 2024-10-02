
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
   
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }

        .dangky-container {
            width: 300px;
            padding: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dangky-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .dangky-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .dangky-form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .dangky-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="dangky-container">
        <form class="dangky-form" action="#" method="post">
            <h2>Đăng ký</h2>
            <label style="font-size: 10px; color: red; margin-left: 5px;">Mật khẩu không ít hơn 3 kí tự.</label>
            <input type="text" name="hoten" placeholder="Họ và tên" required>
            <label style="font-size: 10px; color: red; margin-left: 5px;">Nhập đúng định dạng email.</label>
            <input type="text" name="email" placeholder="Email" required>
            <label style="font-size: 10px; color: red; margin-left: 5px;">Nhập số điện thoại của bạn.</label>
            <input type="text" name="sdt" placeholder="Số điện thoại" required>
            <label style="font-size: 10px; color: red; margin-left: 5px;">Mật khẩu không ít hơn 3 kí tự.</label>
            <input type="password" name="matkhau" placeholder="Mật khẩu" required>
            <label style="font-size: 10px; color: red; margin-left: 5px;">Nhập đúng mật khẩu trên.</label>
            <input type="password" name="nhaplaimatkhau" placeholder="Xác nhận mật khẩu" required>
            <button type="submit" name="dangky">Đăng ký</button>
        </form>
    </div>

    <?php
    // lấy thông tin tù đường post
    if (isset($_POST['dangky'])) {
        $hoten = $_POST["hoten"];
        $email = $_POST["email"];
        $matkhau = $_POST["matkhau"];
        $nhaplaimatkhau = $_POST["nhaplaimatkhau"];
        $sdt = $_POST["sdt"];

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

        // Kiểm tra mật khẩu có trên 3 ký tự hay không
        if (strlen($matkhau) < 3) {
            echo '<script>
            alert("Mật khẩu không được ít hơn 3 ký tự")
            </script>';
            die;
        }

        // Kiểm tra xác nhận mật khẩu
        if ($matkhau !== $nhaplaimatkhau) {
            echo '<script>
            alert("Mật khẩu nhập lại không đúng")
            </script>';
            die;
        }

        // Kiểm tra định dạng số điện thoại
        if (!preg_match("/^[0-9]{10,11}$/", $sdt)) {
            echo '<script>
            alert("Số điện thoại không hợp lệ. Vui lòng nhập lại.")
            </script>';
            die;
        }

        include_once __DIR__.'/../backend/ketnoi.php';

        $sql = " INSERT INTO nguoidung (TenNguoiDung, Email, MatKhau, DienThoai,QuanTri) 
        VALUES ('$hoten', '$email', '$matkhau', '$sdt', '0');";

        $chay = mysqli_query($conn,$sql);
        if(isset($chay)){
            echo '<script>
            var result = confirm("bạn đã đăng ký thành công, quay về trang đăng nhập");
            if (result == true) {
               location.href ="/index/dangnhap.php";
    
            } 
            </script>';
        }else{
            echo '<script>
            alert(" đăng ký thất bại")
            </script>';
 
        }
    }
    ?>
</body>
</html>
