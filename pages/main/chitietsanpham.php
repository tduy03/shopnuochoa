<?php
// Kết nối CSDL và kiểm tra kết nối
include('admincp/config/config.php');

// Kiểm tra xem biến $_GET['id'] có tồn tại và có giá trị hay không
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Truy vấn CSDL để lấy dữ liệu từ bảng tbl_sanpham
    $sql = "SELECT * FROM tbl_sanpham WHERE id = $product_id";
    $result = $mysqli->query($sql);

    // Kiểm tra và hiển thị dữ liệu
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Lấy thông tin từng sản phẩm
        $id = $row['id'];
        $ten_sanpham = $row['tensp'];
        $mo_ta = $row['motasp'];
        $gia = $row['giasp'];
        $hinh_anh = $row['anhsp'];
        $thuong_hieu = $row['thuonghieusp'];
        $danh_muc = $row['danhmucsp'];
        $kichcosp = $row['kichcosp'];
        $soluongsp = $row['soluongsp'];
        // Các thông tin khác...

        // Hiển thị thông tin sản phẩm
        ?>
        <div class="product-details">
            <h3>Chi Tiết Sản Phẩm</h3>
            <div class="main-product">
                <div class="product-left">
                    <div class="img-product">
                        <!-- Hiển thị hình ảnh sản phẩm -->
                        <div class="main-img">
                            <img src="admincp/modules/xuly/<?php echo $hinh_anh; ?>" alt="" class="item-img">
                        </div>
                        <!-- Hiển thị các hình ảnh khác của sản phẩm -->
                        <div class="img-more">
                            <img src="admincp/modules/xuly/<?php echo $hinh_anh?>" alt="" class="img">
                            <img src="admincp/modules/xuly/<?php echo $hinh_anh; ?>" alt="" class="img">
                            <img src="../admincp/modules/xuly/<?php echo $hinh_anh; ?>" alt="" class="img">
                            <img src="admincp/modules/xuly/<?php echo $hinh_anh; ?>" alt="" class="img">
                            <img src="admincp/modules/xuly/<?php echo $hinh_anh; ?>" alt="" class="img">

                        </div>
                    </div>
                    <div class="content-product">
                        <h3 class="title">
                            Mô tả
                        </h1>
                        <div class="content">
                            <?php echo $mo_ta; ?>
                        </div>
                    </div>
                </div>
                <div class="product-right">
                    <p class="brand opacity"><?php echo $thuong_hieu; ?></p>
                    <h2 class="product-title"><?php echo $ten_sanpham; ?></h2>
                    <p class="category opacity"><?php echo $danh_muc; ?></p>
                    <p class="price-product"><?php echo number_format($gia,0,'','.'); ?> VNĐ</p>
                    <form method="POST" action="pages/main/themgiohang.php?&id=<?php echo $id; ?>">
                        <!-- Các phần khác của biểu mẫu mua hàng -->
                        <div class="size-box">
                            <p class="opacity">Chọn một tuỳ chọn</p>
                            <select name="" id="">
                                <option value=""><?php echo $kichcosp; ?></option>
                            </select>
                        </div>
                        <div class="buy-box">
                            <div class="quantity">
                            <input type="number" placeholder="Còn lại:<?php if($soluongsp > 0) { echo $soluongsp; } else { echo 'Hết hàng'; } ?>" name="quantity" id="">
                            </div>

                            <?php if($soluongsp > 0) { echo ' <div class="add-to-cart">
                            <input class="button" type="submit" name="themvaogio" value="Thêm vào giỏ">
                            </div>
                        </div>
                        <div class="buy-now">
                            <input class="button" type="submit" name="themvaogio" value="Mua hàng">
                        </div>'; } 
                        else 
                        { echo ' <div class="add-to-cart">
                            <input class="button" type="" name="themvaogio" value="Hết hàng">
                            </div>
                        </div>
                        <div class="buy-now">
                            <input class="button" type="" name="themvaogio" value="Hết hàng">
                        </div>'; } ?>
                    </form>
                    <div class="description">
                        <div class="desc-btn">
                           
<button class="decs-btn1">Hương</button>
<button class="decs-btn2">Đặc Điểm</button>
<button class="decs-btn3">Khuyên Dùng</button>
</div>
<div class="desc-content">
    <p class="more-decs1"><?php echo $mo_ta; ?></p>
        </div>
        </div>
        </div>
        </div>
        </div>
<?php
} else {
echo "Không tìm thấy sản phẩm.";
}
} else {
echo "Thiếu thông tin sản phẩm.";
}

// Đóng kết nối và giải phóng tài nguyên
$mysqli->close();
?>