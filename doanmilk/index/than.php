<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thân</title>
    <link rel="stylesheet" href="path_to_your_stylesheet.css">
</head>
<body>
   <div id="danh-sach-san-pham" class="than">

   <?php include_once __DIR__.'/../backend/allSanPham.php'; ?>
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
                            echo 'sữa tươi';
                        }
                        ?>
            </p>
        </div>
    </a>
    <?php }?>
   </div>
   <div id="phan-trang" style="text-align: center; margin-top: 20px;"></div>
  <!-- <script>
      const sanPhamTrenMotTrang =   ; // Số sản phẩm trên mỗi trang
      const danhSachSanPham = document.getElementById('danh-sach-san-pham');
      const phanTrang = document.getElementById('phan-trang');

      // Danh sách tất cả các sản phẩm
      const tatCaSanPham = [...danhSachSanPham.querySelectorAll('.danh-sach-san-pham')];

      function hienThiDanhSach(items, wrapper, rowsPerPage, page) {
        wrapper.innerHTML = '';
        page--;

        let batDau = rowsPerPage * page;
        let ketThuc = batDau + rowsPerPage;
        let cacSanPhamTheoTrang = items.slice(batDau, ketThuc);

        for (let i = 0; i < cacSanPhamTheoTrang.length; i++) {
          let sanPham = cacSanPhamTheoTrang[i];
          wrapper.appendChild(sanPham);
        }
      }

      function thietLapPhanTrang(items, wrapper, rowsPerPage) {
        wrapper.innerHTML = '';

        let soTrang = Math.ceil(items.length / rowsPerPage);
        for (let i = 1; i <= soTrang; i++) {
          let btn = document.createElement('button');
          btn.innerText = i;

          btn.addEventListener('click', function() {
            hienThiDanhSach(items, danhSachSanPham, sanPhamTrenMotTrang, i);
          });

          wrapper.appendChild(btn);
        }

        const cacNut = document.querySelectorAll('#phan-trang button');
        cacNut.forEach((nut, index) => {
            nut.addEventListener('click', function() {
                for (let j = 0; j < cacNut.length; j++) {
                    if (j === index) {
                        cacNut[j].classList.add('active');
                    } else {
                        cacNut[j].classList.remove('active');
                    }
                }
            });
        });
      }

      hienThiDanhSach(tatCaSanPham, danhSachSanPham, sanPhamTrenMotTrang, 1);
      thietLapPhanTrang(tatCaSanPham, phanTrang, sanPhamTrenMotTrang);
   </script>
     <style>
        /* Thêm CSS cho số trang */
        #phan-trang {
            text-align: center;
            margin-top: 20px;
            clear: both;
        }

        #phan-trang button {
            background-color: #4CAF50; /* Màu nền */
            border: none;
            color: white;
            padding: 10px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 12px;
        }

        #phan-trang button:hover {
            background-color: white; /* Màu nền khi rê chuột vào */
            color: black;
        }

        #phan-trang button.active {
            background-color: #45a049; /* Màu nền khi được chọn */
        }
    </style> -->
   
</body>
</html>
