

<?php
    $sql_lietke_danhmuc = "SELECT thuonghieusp FROM tbl_sanpham ORDER BY id ASC";
    $query_lietke_danhmuc = mysqli_query($mysqli,"$sql_lietke_danhmuc");  
?>




<h2 style="text-align:center;  ">Danh sách danh thương hiệu </h2>

<div style="padding: 0;"  class="admin-user admin-main ">
<table  border="1">
    <tr>
      <th class="th">STT</th>
      <th>Thương hiệu</th>
      
    </tr>

    <?php 
        $i=0;
        $tam = '';


        while($row = mysqli_fetch_array($query_lietke_danhmuc)){
          $i++;
      ?> 
    <tr>
      <?php
      if($row['thuonghieusp']!= $tam){
        ?>
       <td><?php echo $i ?></td> 
      <td><?php echo $row['thuonghieusp'];$tam=$row['thuonghieusp'];?></td>
      <?php } ?>
    </tr>
          
    <?php }?>
</table>
</div>

