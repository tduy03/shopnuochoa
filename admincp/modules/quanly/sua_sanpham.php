<?php


    $mysqli = new mysqli("localhost","root","","shopnuochoa");

    // Check connection
    if ($mysqli->connect_errno) {
    echo "Lỗi không thể kết nối CSDL " . $mysqli->connect_error;
    exit();
}
// Kiểm tra xem người dùng đã gửi dữ liệu thông qua phương thức POST chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin sản phẩm từ form chỉnh sửa
    $id = $_POST['id'];
    $tensp = $_POST['tensp'];
    $motasp = $_POST['motasp'];
    $danhmucsp = $_POST['danhmucsp'];
    $thuonghieusp = $_POST['thuonghieusp'];
    $soluongsp = $_POST['soluongsp'];
    $giasp = $_POST['giasp'];
    $kichcosp = $_POST['kichcosp'];

    // Cập nhật thông tin sản phẩm trong CSDL
    $updateQuery = "UPDATE tbl_sanpham SET 
                    tensp = '$tensp',
                    motasp = '$motasp',
                    danhmucsp = '$danhmucsp',
                    thuonghieusp = '$thuonghieusp',
                    soluongsp = '$soluongsp',
                    giasp = '$giasp',
                    kichcosp = '$kichcosp'
                    WHERE id = '$id'";
    mysqli_query($mysqli, $updateQuery);

    // Chuyển hướng người dùng trở lại trang danh sách sản phẩm
    header("Location:../../index.php?action=quanlysanpham");
    exit();
}

// Kiểm tra xem có tham số `id` được truyền từ URL hay không
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Truy vấn CSDL để lấy thông tin sản phẩm cần chỉnh sửa
    $selectQuery = "SELECT * FROM tbl_sanpham WHERE id = '$id'";
    $result = mysqli_query($mysqli, $selectQuery);

    // Kiểm tra xem sản phẩm có tồn tại hay không
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
       
        <body>
        <div class="admin-prd">
            <h2>Chỉnh sửa sản phẩm</h2>
            <form class="form-container" method="POST" action="modules/quanly/sua_sanpham.php">
                <input class="form-input form-file-input" type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label class="form-label"> Tên sản phẩm:</label>
                <input class="form-input form-file-input" type="text" name="tensp" value="<?php echo $row['tensp']; ?>">
                <label class="form-label"> Mô tả sản phẩm:</label>
                <textarea name="motasp"><?php echo $row['motasp']; ?></textarea>
                <label class="form-label"> Danh mục sản phẩm:</label>
                <select style="width: 200px;height: 30px;border: 1px solid #ccc;border-radius: 4px;padding: 5px;font-size: 14px;color: #333;background-color: #fff;" name="danhmucsp"  required>
                    <option value="<?php echo $row['danhmucsp']; ?>">Mặc định : <?php echo $row['danhmucsp']; ?></option>
                <option value="Nước Hoa Nam">Nước Hoa Nam</option>
               <option value="Nước Hoa Nữ">Nước Hoa Nữ</option>
               <option value="Nước Hoa Unisex">Nước Hoa Unisex</option>
              </select>
                <label class="form-label"> Thương hiệu sản phẩm:</label>
                <input class="form-input form-file-input" type="text" name="thuonghieusp" value="<?php echo $row['thuonghieusp']; ?>">
                <label class="form-label"> Số lượng sản phẩm:</label>
                <input class="form-input form-file-input" type="number" name="soluongsp" value="<?php echo $row['soluongsp']; ?>">
                <label class="form-label"> Giá sản phẩm:</label>
                <input class="form-input form-file-input" type="number" name="giasp" value="<?php echo $row['giasp']; ?>">
                <label class="form-label"> Kích cỡ sản phẩm:</label>
                <input class="form-input form-file-input" type="text" name="kichcosp" value="<?php echo $row['kichcosp']; ?>">
                <input class="form-submit-button"  type="submit" value="Lưu">
            </form>
        </div>
        </body>
        <?php
    } else {
        echo "Không tìm thấy sản phẩm.";
    }

    // Giải phóng bộ nhớ của kết quả truy vấn
    mysqli_free_result($result);
} else {
    echo "Không tìm thấy sản phẩm.";
}

// Đóng kết nối đến CSDL
$mysqli->close();
?>