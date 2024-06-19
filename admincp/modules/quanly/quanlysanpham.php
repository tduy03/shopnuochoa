
<?php
//include("../../config/config.php");

// Xử lý xóa sản phẩm
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa sản phẩm từ CSDL
    $deleteQuery = "DELETE FROM tbl_sanpham WHERE id = '$id'";
    mysqli_query($mysqli, $deleteQuery);

    // Chuyển hướng người dùng trở lại trang danh sách sản phẩm
    header("Location:index.php?action=quanlysanpham");
    exit();
}

// Truy vấn CSDL để lấy danh sách sản phẩm
$sql = "SELECT * FROM tbl_sanpham";
$result = mysqli_query($mysqli, $sql);


?>

<!-- Nút thêm sản phẩm -->
<div style="margin:20px ;margin-left:18%" class="admin-prd">
    <a class="form-submit-button" href="index.php?action=themsanphammoi">Thêm sản phẩm</a>
</div>
<!-- Danh sách sản phẩm -->
<div style="padding-top: 0px;" class="admin-user admin-main">
    <table style="width: 80%;" border="1">
        <tr>
            <th class="th">ID Sản phẩm</th>
            <th>Hình Ảnh</th>
            <th>Tên Sản phẩm</th>
            <th>Giá</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Số lượng</th>
            <th>Kích cỡ</th>
            <th>Hành động</th>
        </tr>
     <?php   if (mysqli_num_rows($result) > 0) {
    // Duyệt qua từng sản phẩm và xuất ra các trường
    while ($row = mysqli_fetch_assoc($result)) {

?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img style="width: 100px;" src="modules/xuly/<?php echo $row['anhsp']; ?>" alt=""></td>
            <td><?php echo  $row['tensp']; ?></td>
            <td><?php echo $row['giasp'] ?></td>
            <td><?php echo $row['danhmucsp'] ?></td>
            <td><?php  echo $row['thuonghieusp'] ?></td>
            <?php 
            if($row['soluongsp'] < 1){
                echo "<td>Hết hàng</td>";
            }else{
                ?><td><?php echo $row['soluongsp'] ?></td><?php
            }
            ?>
            
            <td><?php  echo $row['kichcosp'] ?></td>
            <td><a class='action-btn-adm' href="index.php?action=suasanpham&id=<?php echo $row['id']?>">Chỉnh sửa</a> | <a class='action-btn-adm' href="index.php?action=delete&id=<?php echo $row['id'] ?>">Xóa</a></td>
        </tr>

<?php }
} else {
    echo "Không có sản phẩm nào.";
} ?>


       
    </table>
</div>
