-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2023 lúc 10:18 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bidspirit`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `commune` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`addressId`, `zipcode`, `province`, `district`, `commune`, `address`, `createDate`, `updateDate`) VALUES
(1, 420000, 'Nam Dinh', 'Xuan Truong', 'Xuan Kien', 'Xom 12b', '2022-08-25 23:37:44', '2022-08-26 14:55:18'),
(2, 17717, 'Nam Dinh', 'Xuan Truong', 'hoàng mai', '87/337 định công', '2022-09-10 02:34:43', NULL),
(3, 17717, 'Nam Dinh', 'Xuan Truong', 'hoàng mai', '87/337 định công', '2022-09-17 05:29:51', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminId` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `keypass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminId`, `pass`, `keypass`) VALUES
('admin', '7fe411063a262862bd99475511aceb1e', '321@tseT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auction`
--

CREATE TABLE `auction` (
  `auctionId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `auctionTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `auction`
--

INSERT INTO `auction` (`auctionId`, `userId`, `productId`, `price`, `status`, `auctionTime`) VALUES
(1, 1, 5, 200, 0, '2022-08-25 23:37:45'),
(2, 1, 6, 500, 1, '2022-08-25 23:37:45'),
(3, 1, 7, 250, 1, '2022-08-25 23:37:45'),
(4, 1, 12, 300, 0, '2022-08-25 23:37:45'),
(5, 1, 10, 112, 0, '2022-08-26 07:44:41'),
(6, 1, 8, 112, 0, '2022-08-26 07:49:22'),
(7, 1, 1, 112, 1, '2022-08-26 07:49:36'),
(8, 1, 10, 134, 1, '2022-08-26 07:49:51'),
(9, 1, 2, 112, 1, '2022-08-26 07:53:17'),
(10, 1, 8, 124, 0, '2022-09-10 04:13:37'),
(11, 2, 8, 146, 0, '2022-09-10 04:14:20'),
(12, 1, 8, 154, 1, '2022-09-18 04:49:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryname` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`categoryId`, `categoryname`, `description`, `createDate`, `updateDate`) VALUES
(1, 'mirror', NULL, '2022-08-25 23:37:44', NULL),
(2, 'chair', NULL, '2022-08-25 23:37:44', NULL),
(3, 'speaker', NULL, '2022-08-25 23:37:44', NULL),
(4, 'telephone', NULL, '2022-08-25 23:37:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `merchantaddress`
--

CREATE TABLE `merchantaddress` (
  `merchantId` int(11) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `merchantaddress`
--

INSERT INTO `merchantaddress` (`merchantId`, `addressId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `merchants`
--

CREATE TABLE `merchants` (
  `merchantId` int(11) NOT NULL,
  `merchantname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `keypass` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `merchants`
--

INSERT INTO `merchants` (`merchantId`, `merchantname`, `email`, `phone`, `pass`, `keypass`, `type`, `createDate`, `updateDate`) VALUES
(1, 'trinhanh', 'phungbaokimanh@gmail.com', '0941147009', '521974bd639eae5548b42b567b5873c9', '321@tnahcreM', NULL, '2022-08-25 23:37:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderauction`
--

CREATE TABLE `orderauction` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderauction`
--

INSERT INTO `orderauction` (`orderId`, `userId`, `productId`, `status`, `payment`, `price`, `createDate`) VALUES
(1, 1, 5, 0, NULL, 200, '2022-08-25 23:37:45'),
(2, 1, 6, 1, NULL, 500, '2022-08-25 23:37:45'),
(3, 1, 7, 1, NULL, 250, '2022-08-25 23:37:45'),
(4, 1, 12, 0, NULL, 300, '2022-08-25 23:37:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `merchantId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `description` varchar(2500) DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `basePrice` int(11) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) DEFAULT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `endDate` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productId`, `merchantId`, `categoryId`, `productname`, `description`, `productImage1`, `productImage2`, `productImage3`, `basePrice`, `createDate`, `updateDate`, `startDate`, `endDate`, `status`) VALUES
(1, 1, 1, 'ANTIQUE MIRROR 1', 'Ref 7991 - Antique French Mirror - Large silver on black Louis Philippe antique mirror. Finished in original two tone silver worn through to black bole in places. Original glass. New plywood back. Circa 1880. Size (inches) - 71\"h x 43\"w. Price - £1500', 'antique_mirror1.jpg', 'antique_mirror1.jpg', 'antique_mirror1.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-08-04 0:0:0', '2022-10-15 23:59:59', -1),
(2, 1, 1, 'ANTIQUE MIRROR 2', 'Ref 7991 - Antique French Mirror - Large silver on black Louis Philippe antique mirror. Finished in original two tone silver worn through to black bole in places. Original glass. New plywood back. Circa 1880. Size (inches) - 71\"h x 43\"w. Price - £1500', 'antique_mirror2.jpg', 'antique_mirror2.jpg', 'antique_mirror2.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-08-04 0:0:0', '2022-10-15 23:59:59', -1),
(3, 1, 2, 'ART CHAIR 1', 'The Frida lounge chair is a real eye-catcher for any terrace, designed by Vincent Sheppard, this lounge chair is a statement piece in its own right.\nWith a choice of Natural Untreated Teak or Black Teak frame.\nThe natural teak frame used outdoors will turn into a soft, silvery grey which will contrast beautifully with the anthracite acrylic rope.', 'chair1.jpg', 'chair1.jpg', 'chair1.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-10-15 23:59:59', '2022-12-15 23:59:59', -1),
(4, 1, 2, 'ART CHAIR 2', 'The Frida lounge chair is a real eye-catcher for any terrace, designed by Vincent Sheppard, this lounge chair is a statement piece in its own right.\nWith a choice of Natural Untreated Teak or Black Teak frame.\nThe natural teak frame used outdoors will turn into a soft, silvery grey which will contrast beautifully with the anthracite acrylic rope.', 'chair2.jpg', 'chair2.jpg', 'chair2.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-10-15 23:59:59', '2022-12-15 23:59:59', -1),
(5, 1, 2, 'ART CHAIR 3', 'The Frida lounge chair is a real eye-catcher for any terrace, designed by Vincent Sheppard, this lounge chair is a statement piece in its own right.\nWith a choice of Natural Untreated Teak or Black Teak frame.\nThe natural teak frame used outdoors will turn into a soft, silvery grey which will contrast beautifully with the anthracite acrylic rope.', 'chair3.jpg', 'chair3.jpg', 'chair3.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-08-20 0:0:0', '2022-08-22 23:59:59', -1),
(6, 1, 3, 'CLASSIC SPEAKER 1', '-These gorgeous style gramophone record players are portable, require no electricity and make an impressive and memorable gift.\n-Full working order (sound quality sound) ready to play 78RPM recordings \n- Sturdy Seasonal wooden cabinet / base with authentic antique signs and Brass Horn', 'classicSpeakers1.jpg', 'classicSpeakers1.jpg', 'classicSpeakers1.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-08-01 0:0:0', '2022-08-03 23:59:59', -1),
(7, 1, 3, 'CLASSIC SPEAKER 2', '-These gorgeous style gramophone record players are portable, require no electricity and make an impressive and memorable gift.\n-Full working order (sound quality sound) ready to play 78RPM recordings \n- Sturdy Seasonal wooden cabinet / base with authentic antique signs and Brass Horn', 'classicSpeakers2.jpg', 'classicSpeakers2.jpg', 'classicSpeakers2.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-08-01 0:0:0', '2022-08-03 23:59:59', -1),
(8, 1, 3, 'CLASSIC SPEAKER 3', '-These gorgeous style gramophone record players are portable, require no electricity and make an impressive and memorable gift.\n-Full working order (sound quality sound) ready to play 78RPM recordings \n- Sturdy Seasonal wooden cabinet / base with authentic antique signs and Brass Horn', 'classicSpeakers3.jpg', 'classicSpeakers3.jpg', 'classicSpeakers3.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-09-10 0:0:0', '2022-10-15 23:59:59', -1),
(9, 1, 3, 'CLASSIC SPEAKER 4', '-These gorgeous style gramophone record players are portable, require no electricity and make an impressive and memorable gift.\n-Full working order (sound quality sound) ready to play 78RPM recordings \n- Sturdy Seasonal wooden cabinet / base with authentic antique signs and Brass Horn', 'classicSpeakers4.jpg', 'classicSpeakers4.jpg', 'classicSpeakers4.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-10-15 23:59:59', '2022-12-15 23:59:59', -1),
(10, 1, 4, 'OLD TELEPHONE 1', 'Product Name: Antique Style Wooden TelephoneModel\n Number: HS-801Place of Origin: ChinaFeatures:\n1) Real wood telephone with antique brass accent\n2) Wooden base and handset\n3) Push button dialing flat\n4) rotary way of last number redial\n5) Pulse/switchableInner packings tone: 1pc/color boxColor box dimensions: 20.0 x 18.0 x 23.0cm outer packing: 8pcs/ctnCarton dimensions: 73.5 x 23.5 x 40.5cmWeight: NW : 1.14kg/pcG.W.: 1.45kg/pcN . W.: 9.06kg/ctnG.W.: 11.60kg/ctn', 'oldtelephone1.jpg', 'oldtelephone1.jpg', 'oldtelephone1.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-09-10 0:0:0', '2022-10-15 23:59:59', -1),
(11, 1, 4, 'OLD TELEPHONE 2', 'Product Name: Antique Style Wooden TelephoneModel\n Number: HS-801Place of Origin: ChinaFeatures:\n1) Real wood telephone with antique brass accent\n2) Wooden base and handset\n3) Push button dialing flat\n4) rotary way of last number redial\n5) Pulse/switchableInner packings tone: 1pc/color boxColor box dimensions: 20.0 x 18.0 x 23.0cm outer packing: 8pcs/ctnCarton dimensions: 73.5 x 23.5 x 40.5cmWeight: NW : 1.14kg/pcG.W.: 1.45kg/pcN . W.: 9.06kg/ctnG.W.: 11.60kg/ctn', 'oldtelephone2.jpg', 'oldtelephone2.jpg', 'oldtelephone2.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-10-15 23:59:59', '2022-12-15 23:59:59', -1),
(12, 1, 4, 'OLD TELEPHONE 3', 'Product Name: Antique Style Wooden TelephoneModel\n Number: HS-801Place of Origin: ChinaFeatures:\n1) Real wood telephone with antique brass accent\n2) Wooden base and handset\n3) Push button dialing flat\n4) rotary way of last number redial\n5) Pulse/switchableInner packings tone: 1pc/color boxColor box dimensions: 20.0 x 18.0 x 23.0cm outer packing: 8pcs/ctnCarton dimensions: 73.5 x 23.5 x 40.5cmWeight: NW : 1.14kg/pcG.W.: 1.45kg/pcN . W.: 9.06kg/ctnG.W.: 11.60kg/ctn', 'oldtelephone3.jpg', 'oldtelephone3.jpg', 'oldtelephone3.jpg', 100, '2022-08-25 23:37:44', NULL, '2022-08-01 0:0:0', '2022-08-15 23:59:59', -1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tracking`
--

CREATE TABLE `tracking` (
  `trackingId` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `tracking` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tracking`
--

INSERT INTO `tracking` (`trackingId`, `orderId`, `tracking`, `remark`, `createDate`) VALUES
(1, 1, 'in Process', 'Order has been Shipped', '2022-08-25 23:37:45'),
(2, 2, 'Delivered', 'Order Has been delivered', '2022-08-25 23:37:45'),
(3, 3, 'Delivered', 'Product delivered successfully', '2022-08-25 23:37:45'),
(4, 4, 'in Process', 'Product ready for Shipping', '2022-08-25 23:37:45'),
(5, 1, 'In Process', 'this is anh test order', '2022-08-26 02:54:55'),
(6, 1, 'In Process', 'this is anh test order', '2022-08-26 02:54:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `useraddress`
--

CREATE TABLE `useraddress` (
  `userId` int(11) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `useraddress`
--

INSERT INTO `useraddress` (`userId`, `addressId`) VALUES
(1, 1),
(2, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `keypass` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userId`, `username`, `email`, `phone`, `pass`, `keypass`, `company`, `payment`, `createDate`, `updateDate`) VALUES
(1, 'trinhanh', 'phungbaokimanh@gmail.com', '0941147009', 'daafee6a917f8f52c16bca726d6ab541', '321@resU', NULL, NULL, '2022-08-25 23:37:44', '2022-08-26 14:55:18'),
(2, 'admin', 'anh.tt.2035@aptechlearning.edu.vn', '0941147008', '2c0987a108e26b579f47da153b7a469b', '321hna', 'MBL', 'MOMO', '2022-09-10 02:34:43', NULL),
(6, 'anh123', 'anh123@gmail.com', '0941147090', 'adf88e0387e33ac9e8579fb080deacf2', 'hna', 'MBL', 'MOMO', '2022-09-17 05:29:51', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auctionId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Chỉ mục cho bảng `merchantaddress`
--
ALTER TABLE `merchantaddress`
  ADD KEY `addressId` (`addressId`),
  ADD KEY `merchantId` (`merchantId`);

--
-- Chỉ mục cho bảng `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`merchantId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `orderauction`
--
ALTER TABLE `orderauction`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `merchantId` (`merchantId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Chỉ mục cho bảng `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`trackingId`),
  ADD KEY `orderId` (`orderId`);

--
-- Chỉ mục cho bảng `useraddress`
--
ALTER TABLE `useraddress`
  ADD KEY `addressId` (`addressId`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `auction`
--
ALTER TABLE `auction`
  MODIFY `auctionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `merchants`
--
ALTER TABLE `merchants`
  MODIFY `merchantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orderauction`
--
ALTER TABLE `orderauction`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tracking`
--
ALTER TABLE `tracking`
  MODIFY `trackingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `auction_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`);

--
-- Các ràng buộc cho bảng `merchantaddress`
--
ALTER TABLE `merchantaddress`
  ADD CONSTRAINT `merchantaddress_ibfk_1` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`),
  ADD CONSTRAINT `merchantaddress_ibfk_2` FOREIGN KEY (`merchantId`) REFERENCES `merchants` (`merchantId`);

--
-- Các ràng buộc cho bảng `orderauction`
--
ALTER TABLE `orderauction`
  ADD CONSTRAINT `orderauction_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `orderauction_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`merchantId`) REFERENCES `merchants` (`merchantId`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`);

--
-- Các ràng buộc cho bảng `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orderauction` (`orderId`);

--
-- Các ràng buộc cho bảng `useraddress`
--
ALTER TABLE `useraddress`
  ADD CONSTRAINT `useraddress_ibfk_1` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`),
  ADD CONSTRAINT `useraddress_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
