<?php
// Kết nối tới cơ sở dữ liệu

// Lấy giá trị id_don_hang từ URL
$id_don_hang = $_GET['id_don_hang'];

// Truy vấn dữ liệu từ bảng tbl_donhang dựa trên id_don_hang
$sql_donhang = "SELECT * FROM tbl_donhang WHERE id = '$id_don_hang'";
$result_donhang = mysqli_query($mysqli, $sql_donhang);
?>

<h2>Thông tin đơn hàng</h2>
<div class="admin-user admin-main">
    <table border="1">
        <th>Mã Đơn Hàng</th>
        <th>Họ và tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Thành phố</th>
        <th>Quận/Huyện</th>
        <th>Phường/Xã</th>
        <th>Địa chỉ</th>
        <th>Ngày đặt hàng</th>
        <th>Trạng thái</th>
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
            echo "<td>" . $row_donhang['ngay_dathang'] . "</td>";
            echo "<td>" . $row_donhang['trangthai'] . "</td>";


            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>Không có dữ liệu</td></tr>";
    }
    ?>
</table></div>
<?php
// Kết nối tới cơ sở dữ liệu


// Truy vấn dữ liệu từ bảng tbl_donhang


// Truy vấn dữ liệu từ bảng tbl_chitietdonhang
$sql_chitietdonhang = "SELECT * FROM tbl_chitietdonhang WHERE id_donhang = $id_don_hang";
$result_chitietdonhang = mysqli_query($mysqli, $sql_chitietdonhang);
?>

    <h2>Thông tin sản phẩm đặt hàng</h2>
    <div class="admin-user admin-main">
    <table border="1">
        <tr>
       
            <th>Mã Đơn hàng</th>
            <th>Tài khoản</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
            <th>Kích cỡ</th>
            <th>Thành tiền</th>
            <th> PTTT</th>
        </tr>
        <?php
        // Hiển thị dữ liệu từ bảng tbl_chitietdonhang
        if (mysqli_num_rows($result_chitietdonhang) > 0){   $tongdon = 0;
            while ($row_chitietdonhang = mysqli_fetch_assoc($result_chitietdonhang)) {
               $giasp = $row_chitietdonhang['giasp'];
               $soluong = $row_chitietdonhang['soluong'];
                echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td>" . $row_chitietdonhang['tensp'] . "</td>";
                echo "<td>" . number_format($giasp,0,'','.') . " VNĐ</td>";
                echo "<td>" . $soluong . "</td>";
                echo "<td>" . $row_chitietdonhang['kichcosp'] . "</td>";
                $thanhtien = $giasp * $soluong;
                echo "<td>" .number_format($thanhtien,0,'','.')  . " VNĐ</td>";
                echo "</tr>";
                $madon = $row_chitietdonhang['id_donhang'];
                $taikhoan = $row_chitietdonhang['taikhoan'];
                $tongdon = $tongdon + $thanhtien;
                $pttt = $row_chitietdonhang['pttt'] ;
            }
            echo "<tr>";
            echo "<td>" . $madon . "</td>";
            echo "<td>" . $taikhoan . "</td>";
            echo "<td> </td>";
            echo "<td> </td>";
            echo "<td> </td>";
            echo "<td> </td>";
            echo "<td> <h4>Tổng Cộng : </h1>" .number_format($tongdon,0,'','.')  . " VNĐ</td>";
            echo "<td>" . $pttt . "</td>";

            echo "</tr>";

        } else {
            echo "<tr><td colspan='6'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table></div>
</form>

<?php
// Đóng kết nối
mysqli_close($mysqli);
?>