<?php


 $sql_admin = "SELECT * FROM tbl_admin ";
 $sql_query_admin = mysqli_query($mysqli,$sql_admin);?>

 <div class="admin-user admin-main">
      <h1>Quản lý quản trị, nhân viên</h1>
<div class="admin-user admin-main">
  <?php if($quyen == 'admin'){
    echo ' <div style="margin:20px ;margin-left:18%" class="admin-prd">
    <a class="form-submit-button" href="index.php?action=themquanly">Thêm User Quản Lý</a>
    </div>';
  }
  ?>
<table border="1">
    <tr>
      <th class="th">Mã Quản Lý</th>
      <th>Tài Khoản</th>
      <th>Quyền Hạn</th>
      <th>Hành động</th>
    </tr>
 <?php
  if(mysqli_num_rows($sql_query_admin) > 0 ){
    while($row_admin = mysqli_fetch_assoc($sql_query_admin)){
      ?>
      <tr>
      <td><?php echo $row_admin['id'] ?></td>
      <td><?php echo $row_admin['username'] ?></td>
      <td><?php echo $row_admin['quyen'] ?></td>
      <?php if($quyen == 'admin'){
     echo'      <td>
     <a class="action-btn-adm" href="index.php?action=xoanguoidung&idxoa=<?php echo $row_admin["id"]?>Xoá người dùng</a>
   </td>';}
   else{
    echo '<td>Không có quyền </td>';
   }
 ?>
        

    </tr>
      <?php
  }
  }
  else{
    echo 'Hiện chưa có dữ liệu người dùng';
  }
  ?>
  </table>
</div>
<?php


 $sql = "SELECT * FROM users ";
 $sql_query = mysqli_query($mysqli,$sql);


?>
  <h1>Quản lý người dùng</h1>
<table border="1">
    <tr>
      <th class="th">Mã Người Dùng</th>
      <th>Tài Khoản</th>
      <th>Số Điện Thoại</th>
      <th>Hành động</th>
    </tr>
  <?php
  
  if(mysqli_num_rows($sql_query) > 0 ){
    while($row = mysqli_fetch_assoc($sql_query)){
      ?>
      <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['taikhoan'] ?></td>
      <td><?php echo $row['so_dien_thoai'] ?></td>
      <?php
      if($quyen == 'admin'){
             ?>
             
             <td>
               <a class='action-btn-adm' href="index.php?action=xoanguoidung&idxoa=<?php echo $row['id']?>">Xoá người dùng</a>
             </td>
             

             <?php
             }else{
                echo'<td>Không có quyền</td>';
             }?>
    </tr>
      <?php
    }
  }
  else{
    echo 'Hiện chưa có dữ liệu người dùng';
  }
  ?>
    
</table>
</div>

