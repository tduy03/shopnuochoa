-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2024 lúc 07:48 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopnuochoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `quyen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `quyen`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) DEFAULT NULL,
  `taikhoan` varchar(100) NOT NULL,
  `tensp` varchar(255) DEFAULT NULL,
  `giasp` decimal(10,2) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `kichcosp` varchar(50) DEFAULT NULL,
  `pttt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`id`, `id_donhang`, `taikhoan`, `tensp`, `giasp`, `soluong`, `kichcosp`, `pttt`) VALUES
(26, 92, 'hoangdz', 'Chanel Allure Eau de Parfum', '3500000.00', 1, '100ml', 'Thanh toán khi nhận hàng'),
(27, 93, 'hoangdz', 'Chanel Allure Eau de Parfum', '3500000.00', 1, '100ml', 'Đã thanh toán thành công VNPAY'),
(28, NULL, 'hoangdz', 'Chanel Allure Eau de Parfum', '3500000.00', 1, '100ml', 'Đã thanh toán VNPAY'),
(29, 94, 'hoangdz', 'Parfums de Marly Galloway', '5900000.00', 1, '125ml', 'Đã thanh toán thành công VNPAY'),
(31, 96, 'duy', 'Chloe Atelier Des Fleurs Verbena', '6700000.00', 1, '150ml', 'Thanh toán khi nhận hàng'),
(32, 96, 'duy', 'Initio Parfums Prives High Frequency', '6500000.00', 1, '90ml', 'Thanh toán khi nhận hàng'),
(33, 97, 'duy', 'Parfums de Marly Galloway', '5900000.00', 1, '125ml', 'Đang xử lý thanh toán VNPAY');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id` int(11) NOT NULL,
  `danhmuc` varchar(100) NOT NULL,
  `thutu` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id`, `danhmuc`, `thutu`) VALUES
(2, 'Nước Hoa Nam', 1),
(3, 'Nước Hoa Nữ', 2),
(0, 'Nước hp', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `ward` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `ngay_dathang` datetime DEFAULT NULL,
  `trangthai` varchar(50) NOT NULL DEFAULT 'Chưa xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id`, `fullname`, `email`, `phone`, `city`, `district`, `ward`, `address`, `ngay_dathang`, `trangthai`) VALUES
(92, 'Việt Hoàng', 'hoangboytq@gmail.com', '0343103614', 'Thành phố Hà Nội', 'Quận Ba Đình', 'Phường Phúc Xá', 'Chợ Xuân Vân', '2023-11-18 14:12:25', 'Chưa xử lý'),
(93, 'Việt Hoàng', 'hoangboytq@gmail.com', '0343103614', 'Thành phố Hà Nội', 'Quận Ba Đình', 'Phường Trúc Bạch', 'Chợ Xuân Vân', '2023-11-18 14:19:21', 'Chưa xử lý'),
(94, 'Việt Hoàng', 'hoangboytq@gmail.com', '0343103614', 'Tỉnh Hà Giang', 'Huyện Yên Minh', 'Xã Thắng Mố', 'Chợ Xuân Vân', '2023-11-18 15:08:22', 'Chưa xử lý'),
(96, 'Đinh Tuấn Duy', 'dinhtuanduy1@gmail.com', '0392861103', 'Tỉnh Ninh Bình', 'Huyện Gia Viễn', 'Xã Gia Lập', 'Lãng Nội', '2023-12-20 06:07:33', 'Chưa xử lý'),
(97, 'duy', 'dinhtuanduy01@gmail.com', '0392861103', '', '', '', 'Ninh Bình', '2024-06-13 21:25:54', 'Chưa xử lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id` int(255) NOT NULL,
  `anhsp` varchar(255) DEFAULT NULL,
  `tensp` varchar(255) DEFAULT NULL,
  `motasp` text DEFAULT NULL,
  `danhmucsp` varchar(255) DEFAULT NULL,
  `thuonghieusp` varchar(255) DEFAULT NULL,
  `soluongsp` int(11) DEFAULT NULL,
  `giasp` decimal(10,2) DEFAULT NULL,
  `kichcosp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id`, `anhsp`, `tensp`, `motasp`, `danhmucsp`, `thuonghieusp`, `soluongsp`, `giasp`, `kichcosp`) VALUES
(34, 'uploads/d392dcf0e05d3b02d46634d3894e69e3_584d55ab4ce4cbe3fac0c823c555b6cc.jpg', 'Parfums de Marly Galloway', 'Mã hàng\r\n110100203336\r\nThương hiệu\r\nParfums De Marly\r\nXuất xứ\r\nPháp\r\nNăm phát hành\r\n2014\r\nNhóm hương\r\nXạ hương trắng, Hương cam chanh, Hoa cam\r\nPhong cách\r\nMạnh mẽ, Tươi mát, Hiện đại\r\nHương đầu: Hương cam chanh, Tiêu đen.\r\nHương giữa: Hoa cam, Diên vĩ (Iris).\r\nHương cuối: Xạ hương, Nhựa Amber.', 'Nước Hoa Nam', 'Parfums De Marly', 199, '5900000.00', '125ml'),
(35, 'uploads/22a832b20f2cf042db25f45d216527d6_724b543f61ee4fd2d1568b6e23536741.webp', 'Marc Jacobs Daisy Eau So Fresh Mini Size', 'Thương hiệu\r\nMarc Jacobs\r\nXuất xứ\r\nTây Ban Nha, Pháp, Mỹ\r\nNăm phát hành\r\n2011\r\nNhóm hương\r\nGreen notes, Phúc bồn tử, Hoa tím, Quả lê\r\nPhong cách\r\nTrẻ trung , Tươi mới, Gợi cảm\r\nHương đầu: bưởi, mâm xôi, lê\r\nHương giữa: hoa nhài, hoa hồng, violet, vải, hoa táo\r\nHương cuối: cây tuyết tùng, xạ hương, mận', 'Nước Hoa Nữ', 'Marc Jacobs', 98, '288000.00', '90ml'),
(36, 'uploads/af5a59101dfa34197a97c320cfe74ca5_7283842b0040d1729fe4b4e16cf7bb0f.webp', 'Chloe Atelier Des Fleurs Verbena', 'Thương hiệu\r\nChloe\r\nXuất xứ\r\nPháp, Tây Ban Nha\r\nNăm phát hành\r\n2019\r\nNhóm hương\r\nHương Chanh cỏ roi ngựa\r\nPhong cách\r\nĐơn giản, Tươi mới, Tinh tế\r\nHương chính: Cỏ roi ngựa', 'Nước Hoa Unisex', 'Chloe', 122, '6700000.00', '150ml'),
(38, 'uploads/18a4a5aea517afd8269c59954116bdfa_8f6ba373307d41c54b588ecd889ef9a0.png', 'chanel', '123', 'Nước Hoa Nam', '123', 123, '13.00', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id` int(11) NOT NULL,
  `tenthuonghieu` varchar(100) NOT NULL,
  `soluong` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `taikhoan`, `matkhau`, `so_dien_thoai`, `email`) VALUES
(21, 'duy', '202cb962ac59075b964b07152d234b70', '0123456789', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD CONSTRAINT `tbl_chitietdonhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `tbl_donhang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
