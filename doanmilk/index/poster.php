<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trình chiếu ảnh</title>
    <style>
        .hien-thi {
            position: relative;
            max-width: 100%;
        }

        .hien-thi img {
            width: 100%;
            position: absolute;
            opacity: 0;
            transition: opacity 1s ease;
        }

        .hien-thi img.hien {
            opacity: 1;
        }
    </style>
</head>

<body>
    <?php 
     include_once __DIR__.'/../backend/ketnoi.php';
     $sql = "SELECT * FROM boster;";
     $chay = mysqli_query($conn, $sql);
     $data = [];
     while ($phu = mysqli_fetch_assoc($chay)) {
        $data[]=array(
            'linkboster'=>$phu['linkboster'],
            'maboster'=>$phu['maboster'],
        );
    }
    ?>

    <div class="hien-thi">
        <?php foreach($data as $bt){?>
            <img class="anh-hien" src="<?php echo $bt['linkboster']; ?>" alt="">
        <?php }?>
    </div>

    <script>
        var viTriHienTai = 0;
        chayTrinhChieu();

        function chayTrinhChieu() {
            var i;
            var anhHien = document.getElementsByClassName("anh-hien");
            for (i = 0; i < anhHien.length; i++) {
                anhHien[i].style.opacity = "0";
            }
            viTriHienTai++;
            if (viTriHienTai > anhHien.length) {
                viTriHienTai = 1
            }
            anhHien[viTriHienTai - 1].style.opacity = "1";
            setTimeout(chayTrinhChieu, 3000); // Thay đổi ảnh sau mỗi 3 giây
        }
    </script>
</body>

</html>
