
<div style="position: absolute ;width:100vw; height: calc(100vw / 2.5 );" >
<img style=" width:100%; height:100%"src="images/banner4.webp"  alt="">
</div>
<div class="main">
<div  style=" height:553px;" class="banner">
    <div class="slide-show">
        <div class="list-images">     
        <img src="images/banner1.webp" width="100%" alt="">
            <img  src="images/banner2.webp" width="100%" alt="">
            <img  src="images/banner3.webp" width="100%" alt="">
        </div>
        <div class="btns">
            <div class="btn-left btn"><i class='bx bx-chevron-left'></i></div>
            <div class="btn-right btn"><i class='bx bx-chevron-right'></i></div>
        </div>
        <div class="index-images">
            <div class="index-item index-item-0 active"></div>
            <div class="index-item index-item-1"></div>
            <div class="index-item index-item-2"></div>
            <div class="index-item index-item-3"></div>
        </div>
    </div>
    <script src="./js/main.js"></script>
            
<h1 style="text-align: center; margin-top:10px; margin-bottom: 0px;">Sản phẩm nổi bật</h1>
<div class="main">
<div class="main-content">
      
       <div class="fist-main">
              <!--San Pham -->
<?php
              $sql = "SELECT * FROM tbl_sanpham";
$result = mysqli_query($mysqli, $sql);

// Kiểm tra số lượng sản phẩm có trong danh sách
if (mysqli_num_rows($result) > 0) {
    // Duyệt qua từng sản phẩm và xuất ra các trường
    while ($row = mysqli_fetch_assoc($result)) {
        // Hiển thị hình ảnh
        // Hiển thị các trường thông tin sản phẩm

?>
              <div class="box-item">
       <a href="index.php?action=chitietsanpham&id=<?php echo $row['id'] ?>" class="item">
              <div class="box-img">
                     <img src="admincp/modules/xuly/<?php echo $row['anhsp'] ?>" alt="" class="item-img">
              </div>
              <div class="content-item">
                     <h5 class="content"><?php echo $row['thuonghieusp']  ?></h5>
                     <p class="content" class=""><?php echo $row['tensp'] ?></p>
                     <p class="content"><?php echo number_format($row['giasp'],0,'','.') ?> VNĐ</p>
                     <div class="buy-now">
                        Mua ngay
                     </div>
              </div>
       </a>
       </div> 
       <!--San Pham End -->
       <?php } }
       else {
              echo "Không có sản phẩm nào.";
           }
           
           // Giải phóng bộ nhớ của kết quả truy vấn
           mysqli_free_result($result);
           
           // Đóng kết nối đến CSDL
    ?>
       
       </div>
</div>
           

<div class="last-main">
    <a href="index.php?action=sanpham" class="more-button">Xem tất cả</a>
</div>

<div class="container">
			<div class="home-banner-block-list site-animation">
				<div class="banner-block-list">
					<a href="index.php?action=danhmuc&id=nuochoanu">
						<img class="image-reponsive" src="//theme.hstatic.net/1000340570/1000964732/14/banner-nu-desk.jpg?v=3005" alt="Nước Hoa Nữ">
						<h3 class="black">Nước hoa nữ &nbsp;<img src="//theme.hstatic.net/1000340570/1000964732/14/icon-lright-alt-black.svg?v=3005" alt="right"></h3>
					</a>
				</div>
				<div class="banner-block-list">
					<a href="index.php?action=danhmuc&id=nuochoanam">
						<img class="image-reponsive" src="//theme.hstatic.net/1000340570/1000964732/14/banner-nam-desk.jpg?v=3005" alt="Nước Hoa Nam">
						<h3 class="black">Nước hoa nam &nbsp;<img src="//theme.hstatic.net/1000340570/1000964732/14/icon-lright-alt-black.svg?v=3005" alt="right"></h3>
					</a>
				</div>
				<div class="banner-block-list">
					<a href="index.php?action=danhmuc&id=nuochoaunisex">
						<img class="image-reponsive" src="//theme.hstatic.net/1000340570/1000964732/14/banner-niche-desk.jpg?v=3005" alt="Nước Hoa Niche">
						<h3 class="black">Nước hoa Unisex &nbsp;<img src="//theme.hstatic.net/1000340570/1000964732/14/icon-lright-alt-black.svg?v=3005" alt="right"></h3>
					</a>
				</div>
			</div>
		</div>

<h1 style="text-align: center; margin-top:10px; margin-bottom: 0px;">Sản phẩm mới</h1>

<div class="main-content">
    
       <div class="fist-main">
              <!--San Pham -->
<?php
              $sql = "SELECT * FROM tbl_sanpham ORDER BY id DESC";
              $result = mysqli_query($mysqli, $sql);

// Kiểm tra số lượng sản phẩm có trong danh sách
if (mysqli_num_rows($result) > 0) {
    // Duyệt qua từng sản phẩm và xuất ra các trường
    while ($row = mysqli_fetch_assoc($result)) {
        // Hiển thị hình ảnh
        // Hiển thị các trường thông tin sản phẩm

?>
              <div class="box-item">
       <a href="index.php?action=chitietsanpham&id=<?php echo $row['id'] ?>" class="item">
              <div class="box-img">
                     <img src="admincp/modules/xuly/<?php echo $row['anhsp'] ?>" alt="" class="item-img">
              </div>
              <div class="content-item">
                     <h5 class="content"><?php echo $row['thuonghieusp']  ?></h5>
                     <p class="content" class=""><?php echo $row['tensp'] ?></p>
                     <p class="content"><?php echo number_format($row['giasp'],0,'','.') ?> VNĐ</p>
                     <div class="buy-now">
                        Mua ngay
                     </div>
              </div>
       </a>
       </div> 
       <!--San Pham End -->
       <?php } }
       else {
              echo "Không có sản phẩm nào.";
           }
           
           // Giải phóng bộ nhớ của kết quả truy vấn
           mysqli_free_result($result);
           
           // Đóng kết nối đến CSDL
           $mysqli->close();?>
       
       </div>
    </div>
    
    <div class="last-main">
 <a href="index.php?action=sanpham" class="more-button">Xem tất cả</a>
</div>


       <?php
       
       ?>