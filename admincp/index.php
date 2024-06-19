<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Nước Hoa Chính Hãng</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/themify-icons/themify-icons.css">
</head>
<body>  
    <div class="wrapper">
        <div class="top-header">
                <span>Trang quản trị viên  ˆ-ˆ</span>
        </div>
        
    <?php
    
        include("config/config.php");
        include("config/kiemtradangnhap.php");
        $taikhoan = $_SESSION['username'];
        $sql_tk = "SELECT quyen FROM tbl_admin WHERE username = '$taikhoan'";
        $sql_query_quyen = mysqli_query($mysqli,$sql_tk);
        $row = mysqli_fetch_assoc($sql_query_quyen);
        $quyen = $row['quyen'];
        include("modules/header.php");
        include("modules/menu.php");
        include("modules/main.php");
        
        
       
    ?>
       
        
    </div>
    
</body>
</html>