<div class="main-admin">
   <?php
    if(isset($_GET['action'])){
        $tam = $_GET['action'];
    }
    else{
        $tam = '';
    }

    if($tam == 'quanlythuonghieu'){
        include("modules/quanly/quanlythuonghieu.php");
    }
    elseif($tam == 'quanlydanhmuc'){
        include("modules/quanly/quanlydanhmuc.php");
        include("modules/quanly/lietkedanhmuc.php");
    }
    elseif($tam == 'quanlydonhang'){
        include("modules/quanly/quanlydonhang.php");
    }
    elseif($tam == 'xoadonhang'){
        include("modules/quanly/quanlydonhang.php");
    }
    elseif($tam == 'xoanguoidung'){
        include("modules/xuly/xulyxoanguoidung.php");
    }
    elseif($tam == 'delete'){
        include("modules/quanly/quanlysanpham.php");
    }
    elseif($tam == 'suasanpham'){
        include("modules/quanly/sua_sanpham.php");
    }
    elseif($tam == 'chitietdonhang'){
        include("modules/quanly/chitietdonhang.php");
    }
    elseif($tam == 'quanlynguoidung'){
        include("modules/quanly/quanlynguoidung.php");
    }
    elseif($tam == 'quanlysanpham'){
        include("modules/quanly/quanlysanpham.php");  
    }
    elseif($tam == 'xulydangxuat'){
        include("modules/xuly/xulydangxuat.php");  
    }
    elseif($tam == 'themsanphammoi'){
        include("modules/quanly/themsanphammoi.php");     
    }
    elseif($tam == 'themquanly'){
        include("modules/quanly/themquanly.php");     
    }
    elseif($tam == 'dangnhapadmin'){
        include("dangnhapadmin.php");     
    }
    else{
        include("modules/bangdieukhien.php");
    }
   
?>
</div>