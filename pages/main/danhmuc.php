<?php
if (isset($_GET['id'])) {
    $tam = $_GET['id'];
    if ($tam == 'nuochoanam') {
        $danhmuc = 'Nước Hoa Nam';
    } elseif ($tam == 'nuochoanu') {
        $danhmuc = 'Nước Hoa Nữ';
    } elseif ($tam == 'nuochoaunisex') {
        $danhmuc = 'Nước Hoa Unisex';
    } elseif ($tam == 'quatang') {
        $danhmuc = 'Quà Tặng';
    } else {
        $danhmuc = ''; // Nếu không khớp với bất kỳ giá trị nào, đặt $danhmuc thành rỗng
    }
} else {
    $tam = '';
}

?>
<?php
$sql_sanpham = "SELECT * FROM tbl_sanpham WHERE danhmucsp = '$danhmuc'";
$query_sanpham = mysqli_query($mysqli, $sql_sanpham);
?>
<div class="main">
    <h1 style="text-align: center; margin-top:10px; margin-bottom: 0px;"><?php echo $danhmuc; ?></h1>

    <div class="main-content">
    <?php 
       //side bar
       include('pages/main/sidebar-prd.php')
       ?>
        <div class="fist-main">
              <?php if (mysqli_num_rows($query_sanpham) > 0) {
    // Duyệt qua từng sản phẩm và xuất ra các trường
    while ($sanpham = mysqli_fetch_assoc($query_sanpham)){
                   
               ?>
            <!--San Pham -->
            <div class="box-item">
            <a href="index.php?action=chitietsanpham&id=<?php echo $sanpham['id'] ?>" class="item">
                    <div class="box-img">
                        <img src="admincp/modules/xuly/<?php echo $sanpham['anhsp'] ?>" alt="" class="item-img">
                    </div>
                    <div class="content-item">
                        <h5 class="content"><?php echo $sanpham['thuonghieusp'] ?></h5>
                        <p class="content" class=""><?php echo $sanpham['tensp'] ?></p>
                        <p class="content"><?php echo number_format($sanpham['giasp'],0,'','.') ?> VNĐ</p>
                        <div class="buy-now">
                        Mua ngay
                     </div>
                    </div>
                </a>
            </div>
            <?php } }
       else {
              echo "Không có sản phẩm nào.";
           }
           
           // Giải phóng bộ nhớ của kết quả truy vấn
           mysqli_free_result($query_sanpham);
           
           // Đóng kết nối đến CSDL
           $mysqli->close();?>
            <!--San Pham End -->
        </div>
    </div>

    <div class="last-main">
        <a href="index.php?quanly=sanpham" class="more-button">Xem tất cả</a>
    </div>

</div>