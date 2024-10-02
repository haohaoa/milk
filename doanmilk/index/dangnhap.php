<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dang nhap</title>
    <link rel="stylesheet" href="path_to_your_stylesheet.css">
</head>
<body>
    <div class="login-container">
        <form class="form-dang-nhap" action="#" method="post">
            <h2>Đăng Nhập</h2>
            <input type="text" name="username" placeholder="Email Đăng Nhập" required>
            <input type="password" name="password" placeholder="Mật Khẩu" required>
            <button type="submit" name="nutdangnhap">Đăng Nhập</button>
        </form>
        <div class="lien-ket-dang-ky">
            <p>Bạn chưa có tài khoản? <a href="/index/dangky.php">Đăng Ký Tài Khoản</a></p>
        </div>
        
    </div>
</body>
<?php
// lấy dử liệu từ đường post 
    if(isset($_POST['nutdangnhap'])){
        $email= $_POST['username'];
        $matkhau = $_POST['password'];
        $thatbai ='';
        include_once __DIR__ .'/../backend/ketnoi.php';
// tìm emal và mật khẩu đăng nhập
        $sql = "  SELECT * from nguoidung where Email = '$email'
        and  matkhau = '$matkhau';";
        $ketqua = mysqli_query($conn, $sql);
        $data=[];
        $data = mysqli_fetch_array($ketqua ,MYSQLI_ASSOC);
// nếu có thì in thi lưu thôgn tin vào session sai thì thồn báo lênh màng hình
        if(!empty($data)){
            $_SESSION['MaNguoiDung']= $data['MaNguoiDung'];
            $_SESSION['dadangnhap']= true;
            $_SESSION['username']= $email;
            $_SESSION['password']= $matkhau;
            $_SESSION['TenNguoiDung']= $data['TenNguoiDung'];
            $_SESSION['QuanTri']=$data['QuanTri']; 
            $_SESSION['DienThoai']=$data['DienThoai']; 
            echo 'dang nhap thanh cong';
            echo '<script>location.href ="/index/index.php";</script>';
        }else{
            echo '<script>
            alert("đăng nhập thất bai")
            </script>';
        }
    }
?>




<style>
    body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.login-container {
    width: 300px;
    padding: 40px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-dang-nhap h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-dang-nhap input {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-dang-nhap button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.form-dang-nhap button:hover {
    background-color: #45a049;
}

.lien-ket-dang-ky {
    text-align: center;
}

.lien-ket-dang-ky a {
    text-decoration: none;
    color: #4CAF50;
    font-weight: bold;
}

</style>
</html>
