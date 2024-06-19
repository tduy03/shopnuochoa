<?php
    include("../../config/config.php");
    $tenDanhMuc = $_POST["tendanhmuc"];
    $thuTuDanhMuc = $_POST["thutudanhmuc"];
    if (isset($_POST["themdanhmuc"])) {
        $sql_them = "INSERT INTO tbl_danhmuc(danhmuc, thutu) VALUES ('".$tenDanhMuc."','".$thuTuDanhMuc."')";
        mysqli_query($mysqli, $sql_them);
        echo '<script>
            // Hiển thị thông báo cảnh báo
            alert("Thông tin đã được gửi thành công!");
            // Chuyển hướng người dùng đến trang khác
            window.location.href = "../../index.php?action=quanlydanhmuc&id=4";
        </script>';
    }
    if (isset($_GET['action']) && isset($_GET['iddanhmuc'])) {
        $hanh_dong = $_GET['action'];
        $id_danh_muc = $_GET['iddanhmuc'];

        if ($hanh_dong == 'xoa') {
            $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id = $id_danh_muc";
            mysqli_query($mysqli, $sql_xoa);
            echo '<script>
                // Hiển thị thông báo cảnh báo
                alert("Bạn đã xoá thành công một danh mục!");
                // Chuyển hướng người dùng đến trang khác 
                window.location.href = "../../index.php?action=quanlydanhmuc&id=4";
            </script>';
        }
    } else {
        $hanh_dong = '';
        $id_danh_muc = '';
    }
?>