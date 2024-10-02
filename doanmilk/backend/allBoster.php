<!-- lấy ra tất cả boster quản cáo -->
<?php 
    include_once __DIR__.'/ketnoi.php';
    
    $sql = "SELECT * FROM boster;";
    $ketqua = mysqli_query($conn , $sql);
    $data=[];
    while ($phu = mysqli_fetch_array($ketqua, MYSQLI_ASSOC)){
        $data[]=array(
            'maboster'=>$phu['maboster'],
            'linkboster'=>$phu['linkboster'],
        );
    }
?>