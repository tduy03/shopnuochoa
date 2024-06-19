<?php
// Kết nối tới cơ sở dữ liệu
if (isset($_GET['action']) && $_GET['action'] == 'xoadonhang' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa sản phẩm từ CSDL
    $deleteQueryD = "DELETE FROM tbl_chitietdonhang WHERE id_donhang = '$id'";
    mysqli_query($mysqli, $deleteQueryD);
    $deleteQueryCTD = "DELETE FROM tbl_donhang WHERE id = '$id'";
    mysqli_query($mysqli, $deleteQueryCTD);

    // Chuyển hướng người dùng trở lại trang danh sách sản phẩm
    header("Location:index.php?action=quanlydonhang");
    exit();
}
// Kết nối tới cơ sở dữ liệu

// Lấy giá trị id_don_hang từ URL


// Truy vấn dữ liệu từ bảng tbl_donhang dựa trên id_don_hang
$sql_donhang = "SELECT * FROM tbl_donhang ORDER BY id DESC";
$result_donhang = mysqli_query($mysqli, $sql_donhang);
?>

<h2>Thông tin đơn hàng</h2>
<div style="padding: 20px 10px" class="admin-user admin-main">
    <table style="width:100%" border="1">
        <th>Mã Đơn Hàng</th>
        <th>Họ và tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Thành phố</th>
        <th>Quận/Huyện</th>
        <th>Phường/Xã</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt hàng</th>
        <th>Thông tin</th>
        <th>Trạng thái</th>
        <th>Hành động</th>

    </tr>
    <?php
    // Hiển thị dữ liệu từ bảng tbl_donhang
    if (mysqli_num_rows($result_donhang) > 0) {
        while ($row_donhang = mysqli_fetch_assoc($result_donhang)) {
            echo "<tr>";
            echo "<td>" . $row_donhang['id'] . "</td>";
            echo "<td>" . $row_donhang['fullname'] . "</td>";
            echo "<td>" . $row_donhang['email'] . "</td>";
            echo "<td>" . $row_donhang['phone'] . "</td>";
            echo "<td>" . $row_donhang['city'] . "</td>";
            echo "<td>" . $row_donhang['district'] . "</td>";
            echo "<td>" . $row_donhang['ward'] . "</td>";
            echo "<td>" . $row_donhang['address'] . "</td>";
            echo "<td>" . $row_donhang['ngay_dathang'] . "</td>";?>
            <td><a href="index.php?action=chitietdonhang&id_don_hang=<?php echo $row_donhang['id']?>">Chi tiết</a></td>
            <?php
             echo "<td>" . $row_donhang['trangthai'] . "</td>";
             if($quyen == 'admin'){
             ?>
             
             
            <td> <a class='action-btn-adm' href="index.php?action=xoadonhang&id=<?php echo $row_donhang['id'] ?>">Xóa</a></td>

             <?php
             }else{
                echo'<td>Không có quyền</td>';
             }
        }

    } else {
        echo "<tr><td colspan='10'>Không có dữ liệu</td></tr>";
    }
    ?>
</table></div>
<?php
// Đóng kết nối
mysqli_close($mysqli);
?>

