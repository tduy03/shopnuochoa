<?php
session_start();

// Hủy phiên làm việc hiện tại
session_destroy();

// Chuyển hướng người dùng đến trang đăng nhập
header("Location:index.php");
exit();

?>