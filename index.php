<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VH Perfume</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/themify-icons/themify-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    


</head>
<body>  

    <div class="wrapper">
        <div class="top-header">
                <span>Giao hàng 24h - Giảm 15k đơn 299k - 50k cho đơn 399k  ˆ-ˆ</span>
        </div>

        
    <?php
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

        include("admincp/config/config.php");
         if(isset($_GET['action'])){
            $tam = $_GET['action'];
        }
        else{
            $tam = '';
        }

    
        if($tam == 'chuyenhuong'){
        include("pages/chuyenhuong.php");
        }
        else{
        include("pages/header.php");
        include("pages/menu.php");
        include("pages/main.php");
        include("pages/footer.php");
        }
        
    ?>
       
        
    </div>
    
</body>
</html>