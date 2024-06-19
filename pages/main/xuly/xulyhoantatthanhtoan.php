<?php

session_start(); // Khởi tạo phiên làm việc

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ các trường form
    $payment_method = $_POST['payment-method'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $address = $_POST['address'];
    $taikhoan = $_SESSION['taikhoan'];

    // Kết nối CSDL
    $mysqli = new mysqli("localhost","root","","shopnuochoa");

    // Lưu thông tin đơn hàng vào CSDL
    $stmt = $mysqli->prepare("INSERT INTO tbl_donhang (fullname, email, phone, city, district, ward, address, ngay_dathang) VALUES (?, ?, ?, ?, ?, ?, ?, NOW() )");
    $stmt->bind_param("sssssss", $fullname, $email, $phone, $city, $district, $ward, $address);
    $stmt->execute();

    // Lấy ID đơn hàng vừa được tạo
    $id_donhang = $stmt->insert_id;
    
    if($payment_method == 'tienmat'){
    // Lưu thông tin chi tiết đơn hàng vào CSDL
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        // Lấy thông tin sản phẩm từ CSDL
        $stmt = $mysqli->prepare("SELECT tensp, giasp, kichcosp, soluongsp FROM tbl_sanpham WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $sanpham = $result->fetch_assoc();
            $ten_sp = $sanpham['tensp'];
            $gia_sp = $sanpham['giasp'];
            $kichco = $sanpham['kichcosp'];
            $soluong_hientai = $sanpham['soluongsp'];

        if ($quantity > $soluong_hientai) {

            echo("Số lượng đặt hàng vượt quá số lượng còn lại trong kho ! Bạn chỉ có thể đặt tối đa: $soluong_hientai sản phẩm");
            exit();
        }

        // Cập nhật số lượng sản phẩm
        $soluong_conlai = $soluong_hientai - $quantity;

        $stmt = $mysqli->prepare("UPDATE tbl_sanpham SET soluongsp = ? WHERE id = ?");
        $stmt->bind_param("ii", $soluong_conlai, $product_id);
        $stmt->execute();

            // Lưu thông tin chi tiết đơn hàng
            $stmt = $mysqli->prepare("INSERT INTO tbl_chitietdonhang (id_donhang, taikhoan, tensp, giasp, soluong,kichcosp,pttt) VALUES (?, ?, ?, ?, ?, ?, 'Thanh toán khi nhận hàng' )");
            $stmt->bind_param("isssis", $id_donhang, $taikhoan, $ten_sp, $gia_sp, $quantity, $kichco);
            $stmt->execute();
        }
    } 
    }
    
    elseif($payment_method == 'vnpay'){    
        

    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    
    $vnp_TmnCode = "HDGLW83M"; //Mã định danh merchant kết nối (Terminal Id)
    $vnp_HashSecret = "MMWWGRYAGEJYLZMJCZSVVEUFBYWDUSIJ"; //Secret key
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "https://localhost/shopnuochoa/index.php?action=chuyenhuong";
    $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
    $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
    //Config input format
    //Expire
    $startTime = date("YmdHis");
    $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
    
    $vnp_TxnRef =  $id_donhang; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
    $vnp_OrderInfo =   'mua' ;
    $vnp_OrderType = '2500';
    $vnp_Amount = $_POST['amount'] * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = '';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    $vnp_ExpireDate = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
    //Billing
   
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        "vnp_ExpireDate"=>$expire,
        
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            foreach ($_SESSION['cart'] as $product_id => $quantity) {
        // Lấy thông tin sản phẩm từ CSDL
        $stmt = $mysqli->prepare("SELECT tensp, giasp, kichcosp, soluongsp FROM tbl_sanpham WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $sanpham = $result->fetch_assoc();
            $ten_sp = $sanpham['tensp'];
            $gia_sp = $sanpham['giasp'];
            $kichco = $sanpham['kichcosp'];
            $soluong_hientai = $sanpham['soluongsp'];

        if ($quantity > $soluong_hientai) {

            echo("Số lượng đặt hàng vượt quá số lượng còn lại trong kho ! Bạn chỉ có thể đặt tối đa: $soluong_hientai");
            exit();
        }

        // Cập nhật số lượng sản phẩm
        $soluong_conlai = $soluong_hientai - $quantity;
    
            $stmt = $mysqli->prepare("UPDATE tbl_sanpham SET soluongsp = ? WHERE id = ?");
            $stmt->bind_param("ii", $soluong_conlai, $product_id);
            $stmt->execute();
            // Lưu thông tin chi tiết đơn hàng
            $stmt = $mysqli->prepare("INSERT INTO tbl_chitietdonhang (id_donhang, taikhoan, tensp, giasp, soluong,kichcosp,pttt) VALUES (?, ?, ?, ?, ?, ?, 'Đang xử lý thanh toán VNPAY' )");
            $stmt->bind_param("isssis", $id_donhang, $taikhoan, $ten_sp, $gia_sp, $quantity, $kichco);
            $stmt->execute();
        }
    } 
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    
    }
    elseif($payment_method == 'momo'){

    }elseif($payment_method == 'paypal'){

    }

    //

// Xóa giỏ hàng sau khi đã lưu đơn hàng
    unset($_SESSION['cart']);

    // Chuyển hướng người dùng đến trang xác nhận đơn hàng
    header("Location:../../../index.php?action=chuyenhuong&pttt=thanhtoankhinhanhang");
    exit();
}
?>