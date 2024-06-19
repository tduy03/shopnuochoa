<?php 
 if(isset($_SESSION['cart'])){
if (isset($_SESSION['taikhoan'])){
?>

<div class="cart-details">
    <h3>Thanh Toán Đơn Hàng</h3>
    <div class="main-cart">
        <div style="width: 100%" class="cart-left">
            <div class="cart-header-flex">
                <h4>Thông tin giao hàng</h4>
            </div>

            <form method="POST" action="pages/main/xuly/xulyhoantatthanhtoan.php">

                <input type="text" id="fullname" name="fullname" placeholder="Họ và tên" required>
                <div class="email-phone-flex">

                <input type="email" id="email" name="email" placeholder="Email" required>

                    <input type="tel" id="phone" name="phone" placeholder="Số điện thoại" required>

                </div>
                

                <div class="selects">
                    <select id="city" name="city">

                        <option  value="" selected>Chọn tỉnh thành</option>
                    </select>

                    <select id="district" name="district">
                        <option value="" selected>Chọn quận huyện</option>
                    </select>

                    <select id="ward" name="ward">
                        <option value="" selected>Chọn phường xã</option>
                    </select>
                </div>
                <input type="text" id="address" name="address" placeholder="Địa chỉ chi tiết" required>

                <h5 id="result"></h5>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                <script>
                    const host = "https://provinces.open-api.vn/api/";
                    var callAPI = (api) => {
                        return axios.get(api)
                            .then((response) => {
                                renderData(response.data, "city");
                            });
                    }
                    callAPI('https://provinces.open-api.vn/api/?depth=1');
                    var callApiDistrict = (api) => {
                        return axios.get(api)
                            .then((response) => {
                                renderData(response.data.districts, "district");
                            });
                    }
                    var callApiWard = (api) => {
                        return axios.get(api)
                            .then((response) => {
                                renderData(response.data.wards, "ward");
                            });
                    }

                    var renderData = (array, select) => {
                        let row = ' <option disable value="">Chọn</option>';
                        array.forEach(element => {
                            row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
                        });
                        document.querySelector("#" + select).innerHTML = row
                    }

                    $("#city").change(() => {
                        callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
                        printResult();
                    });
                    $("#district").change(() => {
                        callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
                        printResult();
                    });
                    $("#ward").change(() => {
                        printResult();
                    })

                    var printResult = () => {
                        if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
                            $("#ward").find(':selected').data('id') != "") {
                            let result = $("#city option:selected").text() +
                                " | " + $("#district option:selected").text() + " | " +
                                $("#ward option:selected").text();
                            $("#result").text(result)
                        }
                    }
                </script>

                <h3>Ghi chú đơn hàng</h3>
                <div class="note-box">
                    <input type="text">
                </div>
                <div class="pay-continue">
                    <a >Tiếp tục mua sắm</a>
                        <input style="width: 50%;" class="pay-btn" type="submit" value="Hoàn tất thanh toán">
                      
                        <input type="hidden" name="redirect" >

                    </a>
                </div>
            </div>
            
            <div style="padding-left: 0; width: 100%;background-color: rgba(204, 204, 204, 0.2);margin-left: 50px;" class="cart-right">
                <?php $tong_gia = 0;
                    foreach ($_SESSION['cart'] as $product_id => $quantity) {  
                        // Truy vấn CSDL để lấy thông tin sản phẩm dựa trên product_id
                        $stmt = $mysqli->prepare("SELECT * FROM tbl_sanpham WHERE id = ?");
                        $stmt->bind_param("s", $product_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $product = $result->fetch_assoc();
                        $anh_sp = $product['anhsp'];
                        $ten_sp = $product['tensp'];
                        $gia_sp = $product['giasp'];
                        $danh_muc = $product['danhmucsp'];
                        $kich_co = $product['kichcosp'];
                        $thuonghieusp = $product['thuonghieusp'];
                        $gia = $gia_sp * $quantity;                   
                        $tong_gia += $gia;
                        
                        ?>  
  <input type="hidden" name="amount" value="<?php echo $tong_gia?>">
<div class="cart-product">
    <div style="display:flex; border-bottom: solid rgba(0, 0, 0, 0.2) 1px ; box-sizing: boder-box;" >
        <div class="cart-product-image">
            <img style="margin:10px 20px 0 20px ;width: 100px "  src="admincp/modules/xuly/<?php echo $product['anhsp']; ?>" alt="<?php echo $product['tensp']; ?>">
        </div>
        <div  class="cart-product-details">
            <h5 style="margin-top: 10px; margin-bottom: 0px"><?php echo $product['tensp']; ?></h5>
            <p >Giá: <?php echo number_format($product['giasp'],0,'','.'); ?></p>
            <p >Số lượng: <?php echo $quantity; ?></p>
        </div>
    </div>
    <?php
                    $stmt->close();
                }?>
            <div style="    padding-left: 0px; margin: 0; padding-top: 1px;background-color: rgba(0,0,0,0   )" class="cart-right">
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
                <div class="payment-method">
                    <h3 class="decs">Chọn phương thức thanh toán</h3>
                    <div>
                    <label>
                        <input type="radio" name="payment-method" value="tienmat" required> Thanh toán khi nhận hàng
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="payment-method" value="vnpay" required> <img style="width:120px;height:100%"  src="images/VNPAY_Logo.webp" alt=""> VNPAY
                    </label>
                    <br>
                    <label>
                        <input  type="radio" name="payment-method" value="momo" required> <img style="width:50px; height:100%"  src="images/MoMo_Logo.png" alt=""> MOMO
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="payment-method" value="paypal" required> <img style="width:50px; height:100%" src="images/Paypal_2014_logo.png" alt=""> PAYPAL
                    </label>
                    <br>
                    </div>
                </div>

            </form>
            </div>
            <?php
            }
                else{
                    echo "<script>
            window.location.href = 'index.php?action=dangnhap';</script>";
            exit();
                }}
                else{
                    echo "<script>
            window.location.href = 'index.php?action=giohang';</script>";
                }
                ?>
        </div>        </div>        </div> </div></div>