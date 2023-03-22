-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2022 lúc 11:24 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(25) NOT NULL,
  `admin_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_role`) VALUES
(1, 'hieuquantrivien', '12345678', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_payment` varchar(255) NOT NULL,
  `receive_name` varchar(255) NOT NULL,
  `receive_phone` varchar(20) NOT NULL,
  `receive_address` varchar(255) NOT NULL,
  `receive_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `user_id`, `cart_status`, `cart_payment`, `receive_name`, `receive_phone`, `receive_address`, `receive_note`) VALUES
(97520, 2, 0, 'thanh toán khi nhận hàng', 'thảo', '1234567', 'Hà Nội', '2'),
(97521, 0, 1, 'thanh toán khi nhận hàng', '', '', '', ''),
(97522, 2, 0, 'thanh toán khi nhận hàng', 'thảo', '1234567', 'Hà Nội', '2'),
(97523, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97524, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97525, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97526, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97527, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97528, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97529, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97530, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97531, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97532, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97533, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97534, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97535, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97536, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97537, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97538, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97539, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97540, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97541, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97542, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97543, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97544, 7, 0, 'thanh toán khi nhận hàng', 'hiếuasf', 'dsfa', 'fsadfas', 'hi'),
(97545, 5, 1, 'thanh toán khi nhận hàng', 'jgjghjg', 'nmb,mnbnm', 'b,hhj,', 'ok'),
(97546, 5, 1, 'thanh toán khi nhận hàng', 'jgjghjg', 'nmb,mnbnm', 'b,hhj,', 'ok'),
(97547, 5, 1, 'thanh toán khi nhận hàng', 'jgjghjg', 'nmb,mnbnm', 'b,hhj,', 'ok'),
(97548, 6, 1, 'thanh toán khi nhận hàng', 'nguyễn văn thành', '012345678', 'quảng ninh', 'nhanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_detail`
--

CREATE TABLE `tbl_cart_detail` (
  `cart_detail_id` int(11) NOT NULL,
  `cart_id` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity_buy` int(50) NOT NULL,
  `product_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_detail`
--

INSERT INTO `tbl_cart_detail` (`cart_detail_id`, `cart_id`, `product_id`, `product_quantity_buy`, `product_price`) VALUES
(31, '97520', 18, 1, 5000000),
(32, '97520', 20, 2, 2000000),
(33, '97521', 18, 1, 5000000),
(34, '97521', 20, 2, 2000000),
(35, '97522', 18, 6, 5000000),
(36, '97523', 24, 24, 40990000),
(37, '97524', 27, 15, 28290000),
(38, '97525', 27, 15, 28290000),
(39, '97526', 27, 15, 28290000),
(40, '97527', 27, 15, 28290000),
(41, '97528', 21, 4, 3500000),
(42, '97528', 27, 15, 28290000),
(43, '97529', 26, 4, 15790000),
(44, '97530', 26, 4, 15790000),
(45, '97531', 26, 3, 15790000),
(46, '97531', 28, 1, 18000000),
(47, '97532', 26, 3, 15790000),
(48, '97532', 28, 1, 18000000),
(49, '97533', 26, 3, 15790000),
(50, '97533', 28, 1, 18000000),
(51, '97534', 26, 3, 15790000),
(52, '97534', 28, 1, 18000000),
(53, '97535', 26, 3, 15790000),
(54, '97535', 28, 1, 18000000),
(55, '97536', 26, 3, 15790000),
(56, '97536', 28, 1, 18000000),
(57, '97537', 26, 3, 15790000),
(58, '97537', 28, 1, 18000000),
(59, '97538', 26, 3, 15790000),
(60, '97538', 28, 1, 18000000),
(61, '97539', 26, 3, 15790000),
(62, '97539', 28, 1, 18000000),
(63, '97540', 26, 3, 15790000),
(64, '97540', 28, 1, 18000000),
(65, '97541', 26, 3, 15790000),
(66, '97541', 28, 1, 18000000),
(67, '97542', 26, 3, 15790000),
(68, '97542', 28, 1, 18000000),
(69, '97543', 26, 6, 15790000),
(70, '97543', 28, 1, 18000000),
(71, '97544', 25, 2, 19290000),
(72, '97545', 26, 1, 15790000),
(73, '97546', 28, 3, 18000000),
(74, '97547', 25, 1, 19290000),
(75, '97548', 26, 1, 15790000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(14, 'IPHONE'),
(15, 'OPPO'),
(16, 'SAMSUNG'),
(17, 'HUAWEI'),
(18, 'REALME');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `cmt_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `cmt_content` varchar(1000) NOT NULL,
  `cmt_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`cmt_id`, `user_name`, `product_id`, `product_name`, `cmt_content`, `cmt_date`, `user_id`) VALUES
(28, 'thaoxyz123', 20, '', 'fsa', '2022-12-01', 3),
(29, 'thaoxyz123', 20, 'samsung galaxy s7', 'hay', '2022-12-01', 3),
(31, 'hieudeptrai', 24, 'iphone 14 pro 1 TB vàng', 'sản phẩm này đẹp quá, mình mua 10 cái nhé shop', '2022-12-04', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_img` varchar(1000) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `product_insur` varchar(50) DEFAULT NULL,
  `product_special` int(1) DEFAULT NULL,
  `product_price` int(50) DEFAULT NULL,
  `product_buy_price` int(50) NOT NULL,
  `product_quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_img`, `product_desc`, `product_insur`, `product_special`, `product_price`, `product_buy_price`, `product_quantity`) VALUES
(18, 14, 'Iphone 8', 'iphone_8_den.jpg', 'iphone 8 ne', '5 tháng', 1, 5000000, 0, 0),
(20, 16, 'samsung galaxy s7', 'iphone_11.jfif', 'hdsfhsdjk', '12 tháng', 1, 2000000, 0, 0),
(21, 18, 'realme discover', 'iphone_11.jfif', '<p>sfdsas</p>\r\n', '12 tháng', 1, 3500000, 3000000, 1),
(23, 14, 'iphone 14 128gb trắng', 'iphone_14_128gb_trang.jfif', '<ul>\r\n	<li>\r\n	<p><span style=\"font-size:14px\"><strong>M&agrave;n h&igrave;nh</strong></span></p>\r\n\r\n	<p><em>K&iacute;ch thước m&agrave;n h&igrave;nh</em></p>\r\n\r\n	<p>6.1 inches</p>\r\n\r\n	<p><em>C&ocirc;ng nghệ m&agrave;n h&igrave;nh</em></p>\r\n\r\n	<p>OLED</p>\r\n\r\n	<p><em>T&iacute;nh năng m&agrave;n h&igrave;nh</em></p>\r\n\r\n	<p>Tần số qu&eacute;t 60Hz</p>\r\n	</li>\r\n	<li>\r\n	<p><span style=\"font-size:14px\">Camera sau</span></p>\r\n\r\n	<p><em>Camera sau</em></p>\r\n\r\n	<p>Camera g&oacute;c rộng: 12MP<br />\r\n	Camera g&oacute;c si&ecirc;u rộng: 12MP</p>\r\n	</li>\r\n	<li>\r\n	<p><strong><span style=\"font-size:14px\">Vi xử l&yacute; &amp; đồ họa</span></strong></p>\r\n\r\n	<p>Chipset</p>\r\n\r\n	<p>Apple A15 Bionic</p>\r\n	</li>\r\n	<li>\r\n	<p><span style=\"font-size:14px\"><strong>RAM &amp; lưu trữ</strong></span></p>\r\n\r\n	<p>Dung lượng RAM</p>\r\n\r\n	<p>6 GB</p>\r\n\r\n	<p>Bộ nhớ trong</p>\r\n\r\n	<p>128 GB</p>\r\n	</li>\r\n	<li>\r\n	<p><span style=\"font-size:14px\"><strong>Pin &amp; c&ocirc;ng nghệ sạc</strong></span></p>\r\n\r\n	<p>Pin</p>\r\n\r\n	<p', '12 tháng', 0, 21499000, 20199000, 10),
(24, 14, 'iphone 14 pro 1 TB vàng', 'iphone_14_pro_max_1TB_vàng.png', '<ul>\r\n	<li>\r\n	<p><span style=\"font-size:16px\"><strong>M&agrave;n h&igrave;nh</strong></span></p>\r\n\r\n	<p><em>K&iacute;ch thước m&agrave;n h&igrave;nh</em></p>\r\n\r\n	<p>6.1 inches</p>\r\n\r\n	<p><em>C&ocirc;ng nghệ m&agrave;n h&igrave;nh</em></p>\r\n\r\n	<p>OLED</p>\r\n\r\n	<p><em>Độ ph&acirc;n giải m&agrave;n h&igrave;nh</em></p>\r\n\r\n	<p>2556 x 1179 pixels</p>\r\n\r\n	<p><em>T&iacute;nh năng m&agrave;n h&igrave;nh</em></p>\r\n\r\n	<p>C&ocirc;ng nghệ ProMotion với tần số qu&eacute;t 120Hz<br />\r\n	Tỷ lệ tương phản 2.000.000: 1<br />\r\n	Độ s&aacute;ng tối đa: 1.000 nits (điển h&igrave;nh), 1.600 nits (HDR), 2.000 nits (ngo&agrave;i trời)</p>\r\n\r\n	<p>Tần số qu&eacute;t</p>\r\n\r\n	<p>120Hz</p>\r\n	</li>\r\n	<li>\r\n	<p><span style=\"font-size:16px\"><strong>Camera sau</strong></span></p>\r\n\r\n	<p><em>Camera sau</em></p>\r\n\r\n	<p>Camera ch&iacute;nh: 48 MP, f/1.8, 24mm, OIS<br />\r\n	Camera g&oacute;c si&ecirc;u rộng: 12 MP, f/2.2, 120˚, 1.4&micro;m<br />\r\n	Camera tele: 12 MP, f/2.8, PDAF, OIS, 3x optical zoom<br />\r\n	Cảm biến độ s&a', '24 tháng', 1, 40990000, 35990000, 20),
(25, 14, 'Iphone 13 128 gb đen', 'iphone_13_128gb_den.jpg', '<p>đ&acirc;y l&agrave; điện thoại đẹp</p>\r\n', '12 tháng', 1, 19290000, 16290000, 27),
(26, 14, 'Iphone 12 64 gb xanh lá', 'iphone_12_64gb_xanh_la.jpg', '<p>hello b&agrave; gi&agrave; c&ocirc; đơn ngh&egrave;o khổ</p>\r\n', '12 thang', 1, 15790000, 13790000, 2),
(27, 14, 'Iphone 13 promax 128 gb trắng', 'iphone_13_promax_128gb_trang.jpg', '<p>ok la nhaa</p>\r\n', '12 tháng', 1, 28290000, 25290000, 0),
(28, 14, 'iphone Xs 512 gb gold', 'iphone_xs_max_256gb.jpg', '<p>helloooo</p>\r\n', '5 tháng', 1, 18000000, 1500000, 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_receive`
--

CREATE TABLE `tbl_receive` (
  `receive_id` int(11) NOT NULL,
  `receive_name` varchar(50) NOT NULL,
  `receive_phone` varchar(11) NOT NULL,
  `receive_address` varchar(255) NOT NULL,
  `receive_note` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_receive`
--

INSERT INTO `tbl_receive` (`receive_id`, `receive_name`, `receive_phone`, `receive_address`, `receive_note`, `user_id`) VALUES
(21, 'jgjghjg', 'nmb,mnbnm', 'b,hhj,', 'ok', 5),
(22, 'nguyễn văn thành', '012345678', 'quảng ninh', 'nhanh', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fullname`, `user_name`, `user_password`, `user_email`, `user_phone`, `user_address`) VALUES
(3, 'Bùi Hiếu Thảo', 'thaoxyz123', '2345678', 'thao@gmail.com', '809320329', 'Quảng Ninh'),
(6, 'Vũ Trung Hiếu', 'hieudeptrai', 'vinhcon2002', 'trunghieuubhs@gmail.com', '23456789', 'Quảng Ninh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  ADD PRIMARY KEY (`cart_detail_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_receive`
--
ALTER TABLE `tbl_receive`
  ADD PRIMARY KEY (`receive_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97549;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  MODIFY `cart_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_receive`
--
ALTER TABLE `tbl_receive`
  MODIFY `receive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
