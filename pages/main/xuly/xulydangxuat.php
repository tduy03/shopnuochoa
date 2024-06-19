<?php


// Hủy phiên làm việc hiện tại
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập
echo "<script>
            window.location.href = 'index.php?action=dangnhap';</script>";
            exit();

?>