<?php
    if(isset($_POST['themquanly'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $password = md5($pass);
        $quyen = $_POST['quyen'];
        $sql = "INSERT INTO tbl_admin (username, password, quyen) VALUE ('$user', '$password', '$quyen') ";
        $sql_query = mysqli_query($mysqli,$sql);
        header("Location:index.php?action=quanlynguoidung");
    exit();
}

    
    ?>

<div class="admin-prd">
    <h2>Thêm User Quản Lý</h2>
    <form class="form-container" action="index.php?action=themquanly" method="POST" enctype="multipart/form-data">
    

        <label class="form-label" for="tenSanPham">Tên người dùng:</label>
        <input class="form-input" type="text" id="tenSanPham" name="username" required>

        <label class="form-label" for="thuongHieu">Mật khẩu:</label>
        <input class="form-input" type="password" id="thuongHieu" name="password" required>

        <label class="form-label" for="danhMuc">Quyền Hạn:</label>
        <select style="width: 200px;height: 30px;border: 1px solid #ccc;border-radius: 4px;padding: 5px;font-size: 14px;color: #333;background-color: #fff;" name="quyen"  required>
            <option value="admin">Quản trị viên</option>
            <option value="Nhân Viên Quản Lý">Nhân viên quản lý</option>
        </select><br/>

        <input class="form-submit-button" type="submit" value="Thêm" name="themquanly">
    </form>

</div>