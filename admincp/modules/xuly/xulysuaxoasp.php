<?php
//include("../../config/config.php");
// Xử lý xóa sản phẩm
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa sản phẩm từ CSDL
    $deleteQuery = "DELETE FROM tbl_sanpham WHERE id = '$id'";
    mysqli_query($mysqli, $deleteQuery);

    // Chuyển hướng người dùng trở lại trang danh sách sản phẩm
    header("Location: quanlysanpham.php");
    exit();
}
// Xử lý xóa sản phẩm
elseif (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa sản phẩm từ CSDL
    $deleteQuery = "DELETE FROM tbl_sanpham WHERE id = '$id'";
    mysqli_query($mysqli, $deleteQuery);

    // Chuyển hướng người dùng trở lại trang danh sách sản phẩm
    header("Location: quanlysanpham.php");
    exit();
}else {
    
}


?>