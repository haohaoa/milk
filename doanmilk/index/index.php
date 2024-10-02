<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Mart</title>
</head>
<body>
    <div class="dau">
        <?php 
            include_once __DIR__ .'/dau.php'; 
        ?>
        <div class="nhanbiet"></div>
    </div>
    <div class="poster">
        <?php include_once __DIR__.'/poster.php';?>
    </div>
    <div class="than">
    <style>
        .nhanbiet{
            width: 143px;
            height: 7px;
            border-radius: 4px;
            background-color: #7171db;
         
        }
    </style> 
    <h2> Sản Phẩm</h3>   
    <?php 
        include_once __DIR__ .'/than.php'; 
    ?>
    </div>
    <div class="duoi">
    <?php 
        include_once __DIR__ .'/cuoi.php'; 
    ?>
    </div>
    
</body>
</html>
<style>
    .poster{
     height: 800px;
    }
</style>