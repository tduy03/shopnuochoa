<?php
    $sql_lietke_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmuc = mysqli_query($mysqli,"$sql_lietke_danhmuc");  
?>


</br>

<h2 style="text-align:center; margin-top: 0; ">Danh sách danh mục sản phẩm</h2>

<div style="padding: 0;"  class="admin-user admin-main ">
<table  border="1">
    <tr>
      <th class="th">ID</th>
      <th>Danh mục</th>
      <th>Thứ tự</th>
      <th>Hành Động</th>
    </tr>

    <?php 
        $i=0;
        while($row = mysqli_fetch_array($query_lietke_danhmuc)){
          $i++;
        

      ?>

    
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['danhmuc'] ?></td>
      <td><?php echo $row['thutu'] ?></td>
     <td>
          <a class='action-btn-adm' href="modules/xuly/xulythemdanhmuc.php?action=xoa&iddanhmuc=<?php echo $row['id']; ?> ">Xoá</a></td>
    </tr>
    <?php }?>
</table>
</div>