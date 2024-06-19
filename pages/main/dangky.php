<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký</title>
    <script>
        function validateForm() {
            var newPassword = document.getElementById("new-password").value;
            var confirmPassword = document.getElementById("confirm-password").value;
            var phoneNumber = document.getElementById("new-phone").value;
            var pass = document.getElementById("new-password").value;



            if (newPassword !== confirmPassword) {
                alert("Mật khẩu và xác nhận mật khẩu không khớp!");
                return false;
            }else if(phoneNumber.length < 10) {
                alert("Số điện thoại phải đúng định dạng");
                return false;
            }
            else if(pass.length < 6) {
                alert("Mật khẩu phải từ 6 ký tự");
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="acount">
        <div class="container">
            <h2>Đăng ký</h2>
            <form method="POST" action="pages/main/xuly/xulydangky.php" onsubmit="return validateForm();">
                <div class="form-group">
                    <label for="new-username">Tên đăng nhập:</label>
                    <input type="text" id="new-username" name="new-username" required>
                </div>
                <div class="form-group">
                    <label for="new-email">Email:</label>
                    <input type="email" id="new-email" name="new-email" required>
                </div>
                <div class="form-group">
                    <label for="new-phone">Số điện thoại:</label>
                    <input type="tel" id="new-phone" name="new-phone" required>
                </div>
                <div class="form-group">
                    <label for="new-password">Mật khẩu:</label>
                    <input type="password" id="new-password" name="new-password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Xác nhận mật khẩu:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>