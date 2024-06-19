<?php
    $mysqli = new mysqli("localhost","root","","shopnuochoa");

    // Check connection
    if ($mysqli->connect_errno) {
    echo "Lỗi không thể kết nối CSDL " . $mysqli->connect_error;
    exit();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>