<?php


    $sql_lietke_danhmuc = "SELECT thuonghieusp FROM tbl_sanpham ORDER BY id ASC";
    $query_lietke_danhmuc = mysqli_query($mysqli,"$sql_lietke_danhmuc");  

    $sql_kichcosp = "SELECT kichcosp FROM tbl_sanpham ORDER BY id ASC";
    $query_kichcosp = mysqli_query($mysqli,"$sql_kichcosp");  
?>

<div class="side-bar">
<form action="index.php?action=timkiem" method="POST">
            <div class="side-box">
                <h3>Lọc theo giá</h3>
                <input style="margin-top: -60px;position: absolute;padding: 7px 14px;margin-left: 269px; border: none;" type="submit" name="timkiem" value="Lọc">
                <div class="price-box">
                    <div class="rows rows-fill">
                        <p>Từ</p>
                        <input name="tukhoa" type="text">
                    </div>
                    <div class="rows rows-fill">
                        <p>Đến</p>
                        <input name="tukhoa"  type="text">
                    </div>
                </div>
            </div>
            <div class="side-box">
                <h3>Lọc theo thương hiệu</h3>
                <div class="brand-box">
                <?php 
               $i = 0;
               $brandList = array(); // Mảng lưu trữ các tên thương hiệu đã xuất hiện
               
               while ($row = mysqli_fetch_array($query_lietke_danhmuc)) {
                   $i++;
                   $brand = $row['thuonghieusp'];
               
                   if (!in_array($brand, $brandList)) {
                       $brandList[] = $brand; // Thêm tên thương hiệu vào mảng
               
                       ?>
                       <div class="rows">
                           <input type="checkbox" name="tukhoa" value="<?php echo $brand; ?>">
                           <p><?php echo $brand; ?></p>
                       </div>
                   <?php
                   }
               }
               ?>
                    
                </div>
            </div>
            <div class="side-box">
                <h3>Lọc theo kích thước</h3>
                <div class="size-box">
                <?php 
                $i=0;
                $tam=0;
                while($row = mysqli_fetch_array($query_kichcosp)){
                $i++;
                ?> 
                 <?php
                if($row['kichcosp']!= $tam){
                     ?>
                     <div class="rows">
                        <input type="checkbox" name="tukhoa" value="<?php echo $row['kichcosp']; ?>">
                        <p><?php echo $row['kichcosp'];$tam=$row['kichcosp']; ?> </p>
                    </div>     
                    <?php }
                    }?>
 </form>
                </div>
            </div>
        </div>
