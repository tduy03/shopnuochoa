<?php
    $sql_lietke_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY thutu ASC";
    $query_danhmuc_sp = mysqli_query($mysqli,$sql_lietke_danhmuc);

?>


<div class="menu">
                <ul class="nav">
                    <li><a href="index.php">Trang chủ</a>
                        <ul class="subnav">
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                        </ul>
                    </li>
               <!--     <li><a href="index.php?action=thuonghieu&id=1">Thương hiệu</a>
                        <ul class="subnav">
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                        </ul>
                    </li> -->
                    <li><a href="index.php?action=sanpham&id=2">Sản phẩm mới</a>
                        <ul class="subnav">
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                        </ul>
                    </li>
                    <?php
                            $i=1;
                            while($row = mysqli_fetch_array($query_danhmuc_sp)){
                                $i++;
                    ?>
                <li>
                <a href="index.php?action=<?php
                    if ($row['thutu'] == '1') {
                        echo 'danhmuc&id=nuochoanam';
                    } elseif ($row['thutu'] == '2') {
                        echo 'danhmuc&id=nuochoanu';
                    } 
                    elseif ($row['thutu'] == '3') {
                        echo 'danhmuc&id=nuochoaunisex';
                    } elseif ($row['thutu'] == '4') {
                        echo 'danhmuc&id=quatang';
                    }
                ?>">
                    <?php echo $row['danhmuc']; ?>
                </a>
            </li>          
   <ul class="subnav">
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
                        </ul>
                    </li>
                    <?php }; ?>
                </ul>
        </div>