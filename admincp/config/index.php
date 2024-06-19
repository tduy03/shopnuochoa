<!DOCTYPE html>
<html>
<head>
    <title>Form nhập thông tin đăng nhập</title>
</head>
<body>
    <h2>Form nhập thông tin đăng nhập</h2>
    <form method="POST" action="/process.php">
        <label for="username">Tên người dùng:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Đăng ký">
    </form>
</body>
</html>