-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 15, 2019 lúc 07:36 PM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webdemo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_title` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_id`, `cate_title`) VALUES
(1, 'Ốp silicon'),
(2, 'Tai Nghe'),
(3, 'Điện thoại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `items`
--

CREATE TABLE `items` (
  `items_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(25) NOT NULL,
  `branch` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `items`
--

INSERT INTO `items` (`items_id`, `name`, `image`, `introduce`, `price`, `quantity`, `branch`, `cate_id`) VALUES
(1, 'Tai nghe iphone X', 'taingheAirPort.png', 'Tai nghe iphone là sản phẩm tuyệt vời', 150000, 255, 'CN1', 2)
(2, 'Điện thoại Oppo F7', 'oppo_f7.png', 'Điện thoại Oppo F7    ', 10000000, 100, 'CN1', 3)
(3, 'Tai nghe iphone X', 'taingheAirPort.png', 'Tai nghe iphone là sản phẩm tuyệt vời', 150000, 255, 'CN1', 2),
(4, 'Điện thoại Oppo F7', 'oppo_f7.png', 'Điện thoại Oppo F7    ', 10000000, 100, 'CN1', 3),
(5, 'Điện thoại Redmi 5', 'redmi_5.png', 'Điện thoại Redmi 5', 3200000, 150, 'CN2', 3),
(6, 'SamSung Galaxy Note 8', 'note_8.png', 'SamSung Galaxy Note 8', 8000000, 50, 'CN2', 3),
(8, 'Ốp silicon Iphone XS', 'Ốp Slc X.jpg', 'Ốp silicon Iphone X  ', 100000, 100, 'CN1', 1),
(9, 'Tai Sam Sung', 'tai5.jpg', 'La san phan chat luong', 150000, 2, 'CN1', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `quantity_item` int(10) NOT NULL,
  `total` int(25) NOT NULL,
  `branch` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `quantity_item`, `total`, `branch`, `time`) VALUES
(1, 'phong', 2, 350000, 'CN1', '2019-03-15 17:33:14'),
(2, 'phu', 2, 8150000, 'CN2', '2019-03-15 17:33:35'),
(3, 'trang', 1, 10000000, 'CN2', '2019-03-15 18:30:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`order_id`, `item_id`, `item_name`, `quantity`, `price`, `time`) VALUES
(1, 8, 'Ốp silicon Iphone ', 2, 100000, '2019-03-15 17:33:14'),
(1, 9, 'Tai Sam Sung', 1, 150000, '2019-03-15 17:33:14'),
(2, 6, 'SamSung Galaxy Note ', 1, 8000000, '2019-03-15 17:33:35'),
(2, 3, 'Tai nghe iphone X', 1, 150000, '2019-03-15 17:33:36'),
(3, 4, 'Điện thoại Oppo', 1, 10000000, '2019-03-15 18:30:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` int(1) NOT NULL,
  `level` int(1) NOT NULL,
  `branch` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `birthday`, `gender`, `level`, `branch`) VALUES
(1, 'phong', '1234', 'abc', '2002-01-13', 1, 1, 'CN1'),
(3, 'admin', '1234', 'admin@gmail.com', '1997-10-11', 1, 2, ''),
(4, 'phu', '1234', 'lequangphu@gmail.com', '2002-01-13', 1, 1, 'CN2'),
(6, 'tung', '1234', 'dfdf', '1991-01-01', 2, 1, 'CN1'),
(7, 'adminCN1', '1234', 'admincn1@gmail.com', '1999-10-11', 1, 3, 'CN1'),
(8, 'adminCN2', '1234', 'admincn2@gmail.com', '1997-12-12', 1, 4, 'CN2'),
(9, 'trang', '1234', 'tráº¡nhuyentrangjvb@gmail.com', '2004-11-15', 2, 1, 'CN2');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`items_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
