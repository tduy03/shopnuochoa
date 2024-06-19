<?php
    include('admincp/config/config.php');
    if(isset($_GET['action'])){
        $tam = $_GET['action'];
    }
    else{
        $tam = '';
    }

    if($tam == 'thuonghieu'){
        include("pages/main/thuonghieu.php");
    }
    elseif($tam == 'sanpham'){
        include("pages/main/sanpham.php");
    }
    elseif($tam == 'danhmuc'){
        include("pages/main/danhmuc.php");
    }   
    elseif($tam == 'giohang'){
        include("pages/main/giohang.php");
    }
    elseif($tam == 'themgiohang'){
        include("pages/main/themgiohang.php");
    }
    elseif($tam == 'quatang'){
        include("pages/main/quatang.php");
    }
    elseif($tam == 'thanhtoan'){
        include("pages/main/thanhtoan.php");

    }
    elseif($tam == 'timkiem'){
        include("pages/main/timkiem.php");

    }
    elseif($tam == 'loc'){
        include("pages/main/loc.php");

    }
    elseif($tam == 'hoantatthanhtoan'){
        include("pages/main/hoantatthanhtoan.php");
    }
    elseif($tam == 'chitietsanpham'){
        include("pages/main/chitietsanpham.php");
    }
    elseif($tam == 'dangnhap'){
        include("pages/main/dangnhap.php");
    }
    elseif($tam == 'dangky'){
        include("pages/main/dangky.php");
    }elseif($tam == 'dangxuat'){
        include("pages/main/xuly/xulydangxuat.php");
    }
    else{
        include("pages/main/index.php");
    }
?>