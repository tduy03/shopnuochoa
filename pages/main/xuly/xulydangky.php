
<?php
include('../../../admincp/config/config.php');

// Lấy dữ liệu từ form
$newUsername = $_POST['new-username'];
$newEmail = $_POST['new-email'];
$newPhone = $_POST['new-phone'];
$newPassword = $_POST['new-password'];

$newPassword = md5($newPassword);

$sql = "SELECT COUNT(*) AS count FROM users WHERE taikhoan = '$newUsername'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$count = $row['count'];

if ($count > 0) {
    echo"<script>   alert(' Tên người dùng đã tồn tại. Vui lòng sử dụng tên khác');
                     window.location.href = '../../../index.php?action=dangky'; </script>
    ";
} else {
    // Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
  $sql = "INSERT INTO `users` (`id`, `taikhoan`, `matkhau`, `so_dien_thoai`,`email`) VALUES (NULL, '$newUsername', '$newPassword', '$newPhone','$newEmail')";

if ($mysqli->query($sql) === TRUE) {
    echo '
    
<style>
.countdown-container {
    text-align: center;
    font-size: 24px;
    margin-top: 100px;
}
</style>

<body>
<h1 style="text-align: center;">Đăng ký thành công</h1>
<img style="margin-left: 40%; height: 300px;" src="https://sablanca.vn/Images/icon/tick-iconblue.png" alt="">
<div id="countdown" class="countdown-container"></div>

<script>

var countdownTime = 5;
var redirectPage = "../../../index.php?action=dangnhap";
var countdownElement = document.getElementById("countdown");
function countdownRedirect() {
    countdownElement.innerHTML = "Bạn sẽ trở về trang đăng nhập sau " + countdownTime + " giây";
    countdownTime--;

    if (countdownTime >= 0) {
        setTimeout(countdownRedirect, 1000);
    } else {
        window.location.href = redirectPage;
    }
}
countdownRedirect();
</script>

    
    
    
    
    ';
} else {
    echo "Lỗi: " . $sql . "<br>" . $mysqli->error;
    echo'<style>
    <script>
    
    var countdownTime = 5;
    var redirectPage = "../../../index.php?action=dangky";
    var countdownElement = document.getElementById("countdown");    
    function countdownRedirect() {
        countdownElement.innerHTML = "Bạn sẽ trở về sau " + countdownTime + " giây";
        countdownTime--;
    
        if (countdownTime >= 0) {
            setTimeout(countdownRedirect, 1000);
        } else {
            window.location.href = redirectPage;
        }
    }
    countdownRedirect();
    </script>';
}

$mysqli->close();




}

?>