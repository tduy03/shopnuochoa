<?php
session_start();


// Kiểm tra xem giỏ hàng đã tồn tại trong session chưa
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Kiểm tra xem nút "Thêm vào giỏ hàng" đã được nhấn hay chưa
if (isset($_POST['themvaogio'])) {
    $product_id = $_GET['id']; // ID của sản phẩm cần thêm vào giỏ hàng

    // Kết nối CSDL
    $mysqli = new mysqli("localhost", "root", "", "shopnuochoa");

    // Kiểm tra kết nối
    if ($mysqli->connect_errno) {
        echo "Lỗi không thể kết nối CSDL " . $mysqli->connect_error;
        exit();
    }

    // Truy vấn CSDL để lấy thông tin sản phẩm
    $stmt = $mysqli->prepare("SELECT * FROM tbl_sanpham WHERE id = ?");
    $stmt->bind_param("s", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($_SESSION['cart'][$product_id])) {
            // Nếu đã tồn tại, tăng số lượng lên tương ứng với số lượng thêm vào giỏ hàng
            if (isset($_POST['quantity']) && $_POST['quantity'] > 1) {
                $sp = $_POST['quantity'];  
                $_SESSION['cart'][$product_id] += $sp;
            } else {
                $_SESSION['cart'][$product_id]++;
            }
        } else {
            // Nếu chưa tồn tại, thêm sản phẩm vào giỏ hàng với số lượng là 1
            $_SESSION['cart'][$product_id] = 1;
        }

        // Chuyển hướng đến trang giao diện giỏ hàng
        header("Location: ../../index.php?action=giohang&query=gio");
        exit();
    } else {
        echo "Không tìm thấy sản phẩm";
    }

    // Đóng kết nối
    $stmt->close();
    $mysqli->close();
}
?>