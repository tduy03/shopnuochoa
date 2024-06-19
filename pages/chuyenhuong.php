
<style>
        .countdown-container {
            text-align: center;
            font-size: 24px;
            margin-top: 100px;
        }
    </style>

    <?php 
    include('pages/main/xuly/config_vnpay.php');
    if(isset($_GET['vnp_SecureHash'])){
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }
    
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

$product_id = $_GET['vnp_TxnRef'];

/// tiến hành cập nhật thông tin thanh toán thành côgn sau khi 

    if ($secureHash == $vnp_SecureHash) {
        if ($_GET['vnp_ResponseCode'] == '00') {

            $stmt = $mysqli->prepare("UPDATE tbl_chitietdonhang SET pttt = 'Đã thanh toán thành công VNPAY' WHERE id_donhang = '$product_id'");
            $stmt->execute();
            $stmt->close();
            unset($_SESSION['cart']);


           echo'   
           <h1 style="text-align: center;">Giao dịch thành công</h1>
           
           <img style="margin-left: 40%; height: 300px;" src="https://sablanca.vn/Images/icon/tick-iconblue.png" alt="">
           <div id="countdown" class="countdown-container"></div>';
        } 
        else {  
            echo'   
            <h1 style="text-align: center;">Giao dịch không thành công. Vui lòng thử lại !</h1>
            <img style="margin-left: 40%; height: 300px;" src="https://sablanca.vn/Images/icon/tick-iconblue.png" alt="">
            
            <div id="countdown" class="countdown-container"></div>';
            }
    } else {
        echo "Chữ ký không hợp lệ";
        }
       }   ?>

    <?php if(isset($_GET['pttt']) && $_GET['pttt']== 'thanhtoankhinhanhang'){

echo'   
<h1 style="text-align: center;">Đặt hàng thành công</h1>

<img style="margin-left: 40%; height: 300px;" src="https://sablanca.vn/Images/icon/tick-iconblue.png" alt="">
<div id="countdown" class="countdown-container"></div>';

    }
    else{
        echo'<div id="countdown" class="countdown-container"></div>';
    }
?>
    <script>
        // Thời gian đếm ngược (tính bằng giây)
        var countdownTime = 5;

        // ID của trang mà bạn muốn chuyển hướng đến
        var redirectPage = "index.php";

        // Lấy đối tượng countdown từ DOM
        var countdownElement = document.getElementById("countdown");

        // Hàm đếm ngược và chuyển hướng
        function countdownRedirect() {
            countdownElement.innerHTML = "Bạn sẽ trở về trang chủ sau " + countdownTime + " giây";
            countdownTime--;

            if (countdownTime >= 0) {
                setTimeout(countdownRedirect, 1000);
            } else {
                window.location.href = redirectPage;
            }
        }

        // Bắt đầu đếm ngược và chuyển hướng
        countdownRedirect();
    </script>
