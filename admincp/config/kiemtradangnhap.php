

<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (isset($_SESSION['username'])) {
    // Người dùng đã đăng nhập, chuyển hướng đến trang admin hoặc trang chính

} else {
    // Người dùng chưa đăng nhập, hiển thị biểu mẫu đăng nhập
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Xử lý thông tin đăng nhập
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kết nối CSDL và kiểm tra kết nối
        $mysqli = new mysqli("localhost", "root", "", "shopnuochoa");
        if ($mysqli->connect_errno) {
            echo "Lỗi không thể kết nối CSDL " . $mysqli->connect_error;
            exit();
        }
        include('config.php');

         // Mã hóa mật khẩu bằng MD5
         $password = md5($password);

        // Truy vấn CSDL để kiểm tra thông tin đăng nhập
        $stmt = $mysqli->prepare("SELECT * FROM tbl_admin WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Đăng nhập thành công, lưu tên đăng nhập vào session
            $_SESSION['username'] = $username;
            header("Location:../index.php"); // Chuyển hướng đến trang chính
            exit();
        } else {
            // Đăng nhập không thành công
            echo ' "<script>
            alert("Tên đăng nhập hoặc mật khẩu không đúng!");
            // Chuyển hướng người dùng đến trang khác (nếu cần)
            window.location.href = "../index.php";
        </script>"';
        }

        // Đóng kết nối và giải phóng tài nguyên
        $stmt->close();
        $mysqli->close();
    } else {
        // Hiển thị biểu mẫu đăng nhập
        header("Location:dangnhapadmin.php");
    }
}
?>