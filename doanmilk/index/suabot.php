<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sữa bột</title>
</head>
<body>
    <div class="dau">
         <?php 
              include_once __DIR__ .'/dau.php'; 
        ?>
        <div class="nhanbiet" ></div>
        <style>
            .nhanbiet{
                margin-left: 236px;
                width: 87px;
                height: 7px;
                border-radius: 4px;
                background-color: #7171db;
            }
        </style>
    </div>
 
    
    <div class="than">
                <?php include_once __DIR__.'/../backend/suabot.php'; ?>
                <?php foreach( $data as $sp) {?>
                    <a href="/index/sanpham.php?id=<?php echo $sp['MaSanPham'];?>" class="danh-sach-san-pham">
                    <div class="san-pham">
                        <img src="<?php echo $sp['linkanh'];?>" alt="San pham 1" class="hinh-anh-san-pham">
                        <h2> <?php echo $sp['TenSanPham']?></h2>
                        <p>Giá: <?php echo number_format($sp['Gia'], 0, ',', '.'); ?> VND</p>
                        <p>Hãng: <?php echo $sp['hangSanPham']?></p>
                        <p>Loại: <?php 
                        if($sp['loaiSanPham'] == 'b') {
                            echo 'sữa bột';
                        } else {
                            echo 'sữa tuơi';
                        }
                        ?>
                          </p> 
                    </div>
                </a>
                <?php }?>
   </div>

   

    </div>
    <div class="duoi">
    <?php 
        include_once __DIR__ .'/cuoi.php'; 
    ?>
    </div>
</body>
</html>