

<?php
    session_start();
if (isset($_SESSION['taikhoan'])) {
    $tendangnhap = $_SESSION['taikhoan'];
    // Người dùng đã đăng nhập, chuyển hướng đến trang admin hoặc trang chính
    echo'Xin chào '; echo $tendangnhap;
 
}else{


// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['taikhoan'])) {
    // Người dùng đã đăng nhập, chuyển hướng đến trang admin hoặc trang chính

} else {
    // Người dùng chưa đăng nhập, hiển thị biểu mẫu đăng nhập
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Xử lý thông tin đăng nhập
        $username = $_POST['taikhoan'];
        $password = $_POST['matkhau'];

        // Kết nối CSDL và kiểm tra kết nối
        include('../../../admincp/config/config.php');

         // Mã hóa mật khẩu bằng MD5
         $password = md5($password);

        // Truy vấn CSDL để kiểm tra thông tin đăng nhập
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE taikhoan=? AND matkhau=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Đăng nhập thành công, lưu tên đăng nhập vào session
            $_SESSION['taikhoan'] = $username;
            header("Location:../../../index.php"); // Chuyển hướng đến trang chính
            exit();
        } else {
            echo "<script>alert('Tên tài khoản hoặc mật khẩu không đúng'); 
            window.location.href = '../../../index.php?action=dangnhap';</script>";
            exit();
        }
         
        // Đóng kết nối và giải phóng tài nguyên
        $stmt->close();
        $mysqli->close();
    } else {
        // Hiển thị biểu mẫu đăng nhập
        header("Location:../dangnhap.php");
    }
}
}
?>