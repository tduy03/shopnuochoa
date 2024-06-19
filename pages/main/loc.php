
<div class="main">
<h1 style="text-align: center; margin-top:10px; margin-bottom: 0px;">Tìm Kiếm : <?php echo $_POST['tukhoa'];?></h1>

<div class="main-content">
<?php 
       //side bar
       include('pages/main/sidebar-prd.php')
       ?>
       <div class="fist-main">
              <!--San Pham -->
<?php
             
           if(isset($_POST['filter'])){  
              $tukhoa = $_POST['tukhoa'];

              $sql = "SELECT * FROM tbl_sanpham WHERE tensp LIKE '%$tukhoa%' OR danhmucsp LIKE '%$tukhoa%' OR thuonghieusp LIKE '%$tukhoa%' OR motasp LIKE '%$tukhoa%'";
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
<?php
           }
           else{
              echo 'Không có sản phẩm nào';
           }
       
       ?>

</div>

<!-- lọc-->

<?php
             
           if(isset($_POST['timkiem'])){  
              $tukhoa = $_POST['tukhoa'];

              $sql = "SELECT * FROM tbl_sanpham WHERE tensp LIKE '%$tukhoa%' OR danhmucsp LIKE '%$tukhoa%' OR thuonghieusp LIKE '%$tukhoa%' OR motasp LIKE '%$tukhoa%'";
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
<?php
           }
           else{
              echo 'Không có sản phẩm nào';
           }
       
       ?>

</div>
<div class="last-main">
<a href="index.php?action=sanpham" class="more-button">Xem tất cả</a>
</div>



       

       