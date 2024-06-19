<?php
include("../../config/config.php");
if (isset($_POST['themSanPham'])) {
    // Thư mục lưu trữ hình ảnh
    $targetDir = "uploads/";

    // Kiểm tra thư mục lưu trữ hình ảnh
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Xác định và kiểm tra đường dẫn tệp tin
    $extension = strtolower(pathinfo($_FILES["hinhAnh"]["name"], PATHINFO_EXTENSION));
    $filename = md5(uniqid()) . '_' . md5(basename($_FILES["hinhAnh"]["name"])) . '.' . $extension;
    $targetFile = $targetDir . $filename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra nếu hình ảnh đã tồn tại
    if (file_exists($targetFile)) {
        echo "Hình ảnh đã tồn tại.";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước tệp hình ảnh
    if ($_FILES["hinhAnh"]["size"] > 500000) {
        echo "Kích thước hình ảnh quá lớn.";
        $uploadOk = 0;
    }

    // Chỉ cho phép một số định dạng hình ảnh cụ thể
    $allowedExtensions = array("jpg", "jpeg", "png", "gif","webp");
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Chỉ cho phép tải lên các tệp JPG, JPEG, PNG và GIF.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Không thể tải lên hình ảnh.";
    } else {
        // Di chuyển tệp tin hình ảnh vào thư mục lưu trữ
        if (move_uploaded_file($_FILES["hinhAnh"]["tmp_name"], $targetFile)) {
            // Cấp quyền ghi cho tệp tin hình ảnh
            chmod($targetFile, 0777);

            // Lấy thông tin từ biểu mẫu
            $tenSanPham = $_POST['tenSanPham'];
            $moTaSanPham = $_POST['moTaSanPham'];
            $danhMuc = $_POST['danhMuc'];
            $thuongHieu = $_POST['thuongHieu'];
            $soLuong = $_POST['soLuong'];
            $gia = $_POST['gia'];
            $kichCo = $_POST['kichCo'];

            // Tạo câu truy vấn để thêm dữ liệu vào CSDL
            $sql = "INSERT INTO tbl_sanpham (anhsp, tensp, motasp, danhmucsp, thuonghieusp, soluongsp, giasp, kichcosp)
            VALUES ('$targetFile', '$tenSanPham', '$moTaSanPham', '$danhMuc', '$thuongHieu', '$soLuong', '$gia', '$kichCo')";
        //    mysqli_query($mysqli, $sql);
            if ($mysqli && $mysqli->query($sql) === TRUE) {
                echo '<script>
                // Hiển thị thông báo cảnh báo
                alert("Thêm sản phẩm thành công!");
                // Chuyển hướng người dùng đến trang khác 
                window.location.href = "../../index.php?action=quanlysanpham";
            </script>';
            } else {
                echo "Lỗi thêm sản phẩm: " . $mysqli->error;
            }

            // Đóng kết nối đến CSDL```php
        } else {
            echo "Có lỗi xảy ra khi tải lên hình ảnh.";
        }
    }
    $mysqli->close();
}
?>