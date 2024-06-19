<?php
   


?>

<div class="cart-details">
    <h3>Danh sách giỏ hàng</h3>
    <div class="main-cart">
        <div class="cart-left">
        <div class="content-prd-oder" style="border-top:0px ;">
                    <div class="content-prd-flex">
                        <div style="width:100px">
                       
                        </div>
                    </div>
                <div style="display: flex;">
                    <div class="content-prd-flex">
                        <div>
                            <div >Sản phẩm</div>
                        </div>
                    </div>
                    <div class="content-prd-flex">

                        <div>
                            Số lượng
                        </div>
                    </div>
                    <div class="content-prd-flex">
                        <div class="sale-price">
                       Giá
                        </div>
                    </div>
                    <div class="content-prd-flex">
                        <div class="sum-cart">
                           Tổng giá
                        </div>   
                    </div>
                    <a style="color: black;" href="index.php?action=giohang&query=gio&cart=unset">
                            <i style="position:absolute" class="ti-trash"></i>
                        </a>
                    </div>
                </div>
           
     
            <?php
             $tong_gia=0;
            if(isset($_SESSION['cart']))
            
            {
            foreach ($_SESSION['cart'] as $product_id => $quantity): ?>
                <?php
                // Chuẩn bị truy vấn
                $stmt = $mysqli->prepare("SELECT id, anhsp, tensp, motasp, danhmucsp, thuonghieusp, giasp, kichcosp
                                        FROM tbl_sanpham
                                        WHERE id = ?");
                $stmt->bind_param("i", $product_id);
                $stmt->execute();
                $result = $stmt->get_result();
               

                if ($result->num_rows > 0) {
                    $product = $result->fetch_assoc();
                    $anh_sp = $product['anhsp'];
                    $ten_sp = $product['tensp'];
                    $gia_sp = $product['giasp'];
                    $danh_muc = $product['danhmucsp'];
                    $kich_co = $product['kichcosp'];
                    $thuonghieusp = $product['thuonghieusp'];

                }
                ?>

                <div class="content-prd-oder">
                    <div class="content-prd-flex">
                        <div>
                        <img style="width:100px;" src="admincp/modules/xuly/<?php echo $anh_sp; ?>" alt="" class="item-img">
                    </div>
                    </div>
                <div style="display: flex;">
                    <div class="content-prd-flex">
                        <div>
                            <div style="font-size: 14px;"><?php echo $thuonghieusp ?></div>
                        </div>

                        <div>
                            <div><?php echo $ten_sp ?></div>
                        </div>
                        <div>
                            <strong><?php echo $kich_co ?></strong>
                        </div>
                        <div>
                            <a href="index.php?action=giohang&query=gio&update=xoagio&id=<?php echo $product_id ?>">Xoá</a>
                        </div>
                    </div>
                    <div class="content-prd-flex">

                        <div>
                            <input type="number" value="<?php echo $quantity ?>" required>
                        </div>
                    </div>
                    <div class="content-prd-flex">
                        <div class="sale-price">
                            <span><?php echo number_format($gia_sp,0,'','.') ?></span>
                        </div>
                    </div>
                    <div class="content-prd-flex">
                        <div class="sum-cart">
                            <?php echo number_format($gia_sp * $quantity,0,'','.'); ?>
                        </div>
                    </div>
                    </div>
                </div>
                <?php  $gia = $gia_sp * $quantity;
                    
                        $tong_gia += $gia;

        endforeach;}
        else{
            
            echo "<div class='note-box'>
            
            <div style='height: 100px; text-align:center'; > Chưa có sản phẩm được thêm vào giỏ hàng</div>
        </div>
                    ";
        } ?>
            <h3 style="    border-top: solid rgba(0, 0, 0, 0.2) 1px; padding: 20px; margin:0px;">Ghi chú đơn hàng</h3>
            <div class="note-box">
                <input type="text">
            </div>
            <div class="pay-continue">
                <a href="">Tiếp tục mua sắm</a><?php
                if (isset($_SESSION['taikhoan'])) {
                                $tendangnhap = $_SESSION['taikhoan'];
                                // Người dùng đã đăng nhập, chuyển hướng đến trang admin hoặc trang chính
                                echo" <a href='index.php?action=hoantatthanhtoan&id=' class='pay-btn'>
                                Tiếp tục thanh toán
                            </a> ";                                                   
                            }else{
                                echo "<a href='index.php?action=dangnhap' class='pay-btn'>
                                   Đăng ký thanh toán
                            </a>";
                             } ?>
               
            </div>
        </div>

        <div class="cart-right">
            <h3 style="text-align:center" >Tổng đơn hàng</h3>
            <div class="bill-prd">
                <div class="decs">Tạm tính</div>
                <div class="decs"></div>
                <strong class="price-prd"><?php echo number_format($tong_gia,0,'','.') ?></strong>
            </div>

            <div class="price-oder">
                <div class="decs">Khuyến mãi</div>
                <div class="decs"></div>
                <strong class="price-prd"><?php echo '0' ?></strong>
            </div>

            <div class="price-oder">
                <div class="decs">Tổng</div>
                <div class="decs"></div>
                <strong class="price-prd"><?php echo number_format($tong_gia,0,'','.') ?></strong>
            </div>
        </div>
    </div>
</div>  