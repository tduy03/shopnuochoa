



<div class="header">
            <a href="index.php" class="shop-name">
                <img src="./images/images.png" alt="" class="logo-img">
            </a>
            
            <div class="header-content">
                <div class="search-box">
                    <span class="input-icon">
                        <form action="index.php?action=timkiem" method="POST">
                            <button type="submit" name="timkiem" class="icon ti-search search-header"></button>
                            <input type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm" class="search-btn">
                        </form>
                    </span>
                </div>
        
                <div class="menu-section menu-left">
                    <a href="" class="button">
                        <span class="icon ti-home"></span>
                        <a href="index.php?action=hethongcuahang" class="content"> Hệ thống cửa hàng</a>
                    </a>

                    <a href="" class="button">
                        <span class="icon ti-world"></span>
                        <a href="index.php?action=bloglamdep" class="content"> Blog làm đẹp</a>
                    </a>


                </div>

                <span class="menu-icon-center icon ti-shift-right-alt ">
                    <span class=""></span>
                </span>
                
                <div class="menu-section menu-right">
                        <p style="line-height: 30px;"  class="content"><?php
                            session_start();
                            // Kiểm tra xem người dùng đã đăng nhập hay chưa
                            if (isset($_SESSION['taikhoan'])) {
                                $tendangnhap = $_SESSION['taikhoan'];
                                // Người dùng đã đăng nhập, chuyển hướng đến trang admin hoặc trang chính
                                echo ' <span class="icon ti-user"></span>';
                                echo'Xin chào '; echo $tendangnhap;
                                ?>
                        </p>
                        <a style="line-height: 30px;" href="index.php?action=dangxuat"><?php echo'Đăng xuất';?></a><?php
                             
                            }else{?>
                                <a href="index.php?action=dangnhap" class="">
                                    <span class="icon ti-user"></span>
                                    Đăng nhập
                                </a>
                           <?php }
                        ?>
                    <a href="index.php?action=giohang&query=gio"class="icon ti-shopping-cart"></a> 
                </div>
            </div>
            



        </div>

