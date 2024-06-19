

<div class="header">
            
<div style="margin-left:0%"; class="header-content">
               
        
               <span class="menu-icon-center icon ti-shift-right-alt ">
                   <span class=""></span>
               </span>

               <div class="menu-section menu-right">
                   <a href="" class="">
                       <span class="icon ti-user"></span>
                       <a href="" class="content">Xin Chào <?php echo $_SESSION['username'] ?>, Chào mừng đến với trang quản trị </a>
                    

               </div>
           </div>

            <a style="margin-left:9.2%;" href= "index.php" class="shop-name">
            
                <img  style="height: 40px"; src="../images/images.png" alt="" class="logo-img">
            </a> 
           <?php if (isset($_SESSION['username'])) {
                echo '            <div style="margin-left: 35%;">
                <a  style=" text-decoration:none;" href="index.php?action=xulydangxuat" class="content">Đăng Xuất</a>

            </div>';
            } 
            ?>
        </div>

