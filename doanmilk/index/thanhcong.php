<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .noi-dung {
            text-align: center;
            margin-bottom: 20px;
        }

        .bieu-tuong-thanh-cong {
            color: #4CAF50;
            font-size: 64px;
            margin-bottom: 20px;
        }

        .nut-quay-ve-trang-chu {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .nut-quay-ve-trang-chu:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="noi-dung">
        <div class="bieu-tuong-thanh-cong">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm4.354 5.146a.5.5 0 0 1 0 .708l-5 5a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7 9.293l4.646-4.647a.5.5 0 0 1 .708 0z"/>
            </svg>
        </div>
        <h2>Thanh toán thành công!</h2>
    </div>
    <a class="nut-quay-ve-trang-chu" href="/index/index.php">Quay về trang chủ</a>
</body>
</html>
