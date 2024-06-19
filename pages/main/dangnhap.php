<div class="acount">
  <div class="container">
    <h2>Đăng nhập</h2>
    <form method="POST" action="pages/main/xuly/xulydangnhap.php" onsubmit="return validateForm();">
      <div class="form-group">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="taikhoan" required>
      </div>
      <div class="form-group">
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="matkhau" required>
      </div>
      <div class="form-group">
        <button type="submit">Đăng nhập</button>
      </div>
      <div class="form-group">
        <a class="btn" href="index.php?action=dangky">Chưa có tài khoản : Đăng ký ngay</a>
      </div>
    </form>
  </div>
</div>