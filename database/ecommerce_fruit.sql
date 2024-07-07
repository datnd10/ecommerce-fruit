-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 05:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_fruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `quantity`) VALUES
(1, 1, 1),
(6, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Trái cây nhập khẩu', 1, '2024-05-06 23:50:47', '2024-05-06 23:50:47'),
(2, 'Trái cây nội địa', 1, '2024-05-15 22:13:12', '2024-05-15 22:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `fruit_type`
--

CREATE TABLE `fruit_type` (
  `fruit_type_id` int(11) NOT NULL,
  `fruit_type_name` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fruit_type`
--

INSERT INTO `fruit_type` (`fruit_type_id`, `fruit_type_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'táo', 1, '2024-05-06 23:39:28', '2024-05-06 23:39:28'),
(2, 'dứa', 1, '2024-05-06 23:44:53', '2024-05-06 23:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `total_money` float NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'pending',
  `shipping` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `total_money`, `name`, `address`, `phone`, `message`, `payment_method`, `payment_status`, `created_at`, `status`, `shipping`, `user_id`) VALUES
(1, 10222, 'meo meo', 'Ha Noi', '0397917086', 'ronaldo test', 'cod', 'paid', '2024-06-08 20:45:50', 'received', 3, 1),
(4, 10001, 'meo meo', 'Ha Noi', '0397917086', '', 'banking', 'paid', '2024-06-08 21:05:36', 'canceled', 1, 1),
(5, 10112, 'meo meo', 'Ha Noi', '0397917086', '', 'banking', 'paid', '2024-06-08 21:07:23', 'canceled', 1, 1),
(6, 10001, 'meo meo', 'Ha Noi', '0397917086', '', 'banking', 'paid', '2024-06-08 21:18:04', 'received', 1, 1),
(7, 10001, '2134', '312321', '0987654321', 'á', 'cod', 'paid', '2024-06-13 22:11:49', 'received', 1, 6),
(8, 60.111, 'cacsa', '2123, Xa Duc Hanh, Huyen Bao Lam, Tinh Cao Bang', '0987654321', '', 'cod', 'not paid', '2024-06-15 20:50:20', 'pending', 50000, 6),
(9, 70, 'cá', '2123, Thi tran Pac Miau, Huyen Bao Lam, Tinh Cao Bang', '0987654321', '', 'cod', 'not paid', '2024-06-15 21:10:08', 'pending', 40000, 6),
(10, 60222, 'a', 'aaa, Xa Nam Cao, Huyen Bao Lam, Tinh Cao Bang', '0987654321', '', 'cod', 'paid', '2024-06-15 21:12:06', 'received', 40000, 6),
(11, 50000, 'cacs', '123, Phuong Nguyen Trai, Thanh pho Ha Giang, Tinh Ha Giang', '0987654321', '', 'banking', 'paid', '2024-06-15 21:43:16', 'pending', 30000, 6),
(12, 60111, 'cacs', '123, Phuong Nguyen Trai, Thanh pho Ha Giang, Tinh Ha Giang', '0987654321', 'csacsacascccccccccaaaaaaaaaa', 'cod', 'not paid', '2024-06-15 22:50:05', 'pending', 50000, 6),
(13, 40000, 'cacs', '123, Phuong Nguyen Trai, Thanh pho Ha Giang, Tinh Ha Giang', '0987654321', 'Thanh toan don hang', 'cod', 'not paid', '2024-06-15 22:58:10', 'pending', 30000, 6),
(14, 40000, 'cacs', '123, Phuong Nguyen Trai, Thanh pho Ha Giang, Tinh Ha Giang', '0987654321', 'Thanh toan don hang', 'cod', 'not paid', '2024-06-15 22:58:15', 'pending', 30000, 6),
(15, 40000, 'cacs', '123, Phuong Nguyen Trai, Thanh pho Ha Giang, Tinh Ha Giang', '0987654321', 'Thanh toan don hang', 'cod', 'not paid', '2024-06-15 22:58:19', 'pending', 30000, 6),
(16, 60000, 'cacs', '123, Phuong Nguyen Trai, Thanh pho Ha Giang, Tinh Ha Giang', '0987654321', 'easc', 'banking', 'paid', '2024-06-15 23:04:54', 'pending', 50000, 6),
(17, 60000, 'cacs', '123, Phuong Nguyen Trai, Thanh pho Ha Giang, Tinh Ha Giang', '0987654321', 'cacsacsa', 'banking', 'paid', '2024-06-15 23:05:44', 'received', 50000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 3, 83, 10),
(2, 1, 1, 1, 10),
(5, 4, 1, 1, 10000),
(6, 5, 2, 1, 10000),
(7, 5, 1, 1, 10000),
(8, 6, 1, 1, 10000),
(9, 7, 1, 1, 10000),
(10, 8, 1, 1, 111),
(11, 8, 2, 1, 111),
(12, 9, 1, 3, 10000),
(13, 10, 2, 2, 10000),
(14, 10, 1, 2, 10000),
(15, 11, 1, 2, 10000),
(16, 12, 2, 1, 10000),
(17, 12, 1, 1, 10000),
(18, 13, 1, 1, 10000),
(19, 16, 1, 1, 10000),
(20, 17, 1, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` float NOT NULL DEFAULT 0,
  `sold_quantity` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `fruit_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `rate`, `created_at`, `updated_at`, `is_active`, `quantity`, `price`, `sold_quantity`, `category_id`, `fruit_type_id`) VALUES
(1, 'Táo mĩ', 'Fresh and juicy apple', 5, '2024-05-08 00:00:00', '2024-05-08 00:00:00', 1, 1593, 10000, 103, 1, 1),
(2, 'tao1', 'cascsa', 0, '2024-05-08 22:19:37', '2024-05-08 22:19:37', 1, 110, 111, 2, 1, 1),
(3, 'tao2', 'ccc', 3, '2024-05-08 22:29:27', '2024-05-08 22:29:27', 1, 123, 123, 0, 1, 1),
(4, 'cam 123', 'cam ngon ', 0, '2024-06-16 22:33:35', '2024-06-16 22:33:35', 1, 1000, 20000, 0, 2, 2),
(5, 'cam test', 'dâcs', 0, '2024-06-16 22:35:37', '2024-06-16 22:35:37', 1, 1000, 20000, 0, 2, 2),
(6, 'cam test 2', 'cacsa', 0, '2024-06-16 22:38:13', '2024-06-16 22:38:13', 1, 2000, 30000, 0, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `image`, `product_id`) VALUES
(18, 'GbKRNHJE1717950870.jpg', 1),
(19, 'jFRPExwp1717950870.jpg', 1),
(20, 'FSYmSsFu1717950870.jpg', 1),
(21, 'X7sO9Wch1717950878.jpg', 2),
(22, 'q6HAtpYN1717950884.jpg', 3),
(23, 'pSVNpT3g1718552015.jpg', 4),
(24, '3O0cSWdb1718552015.jpg', 4),
(25, 'm0hqv6tp1718552015.jpg', 4),
(26, 'Xg1yY9iK1718552015.jpg', 4),
(27, 'WHPczGbo1718552015.jpg', 4),
(28, '1AwOUH4D1718552015.jpg', 4),
(29, 'LpkATvQI1718552015.jpg', 4),
(30, 'LfmU6r2H1718552137.jpg', 5),
(31, 'lYwbyjqA1718552137.jpg', 5),
(32, 'z0ldkE8f1718552137.jpg', 5),
(33, 'UFMiBRT91718552137.jpg', 5),
(34, 'tpVTj4iP1718552293.jpg', 6),
(35, 'mDbAB1Uz1718552293.jpg', 6),
(36, 'tifCYGDE1718552293.jpg', 6),
(37, 'C2WdVxN71718552293.jpg', 6),
(38, 'hzJuIfaB1718552293.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `content` varchar(999) NOT NULL,
  `star` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--
-- --------------------------------------------------------

--
-- Table structure for table `review_image`
--

CREATE TABLE `review_image` (
  `review_image_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_image`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `token` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `username`, `fullname`, `phone`, `address`, `avatar`, `role`, `created_at`, `updated_at`, `is_active`, `token`, `status`) VALUES
(1, 'datnd10.dev@gmail.com', '$2y$10$1q7LW/NiSsUcDf827G5gD.H3XZ.8qYaIUxbeueTPMEKm6Rl95J3f6', 'datnd10', 'meo meo2', '0397917086', '3, Thi tran Meo Vac, Huyen Meo Vac, Tinh Ha Giang', 'scu1N1nY1717866912.jpg', 0, '2024-05-04 22:53:44', '2024-05-04 22:53:44', 1, '732018', 1),
(3, 'datnd10.dev@gmail.com.vn', '$2y$10$9M/RvMu1kL/bGbv2foMu5.66x7q/Zond4hn1EpWi4yal8g/Clez9C', 'dat122', 'Nguyễn Đắc Đạt', '0397917081', 'Hà Đông Hà Nội', 'yn5qjKo91714838923.jpg', 1, '2024-05-04 23:05:04', '2024-05-04 18:14:12', 1, '', 1),
(4, 'datnd10.dev@gmail.com.vn.uy', '$2y$10$/fTOmcf3KDYWFcIE/eUtle9fv0F064M5Rt6csac6waLwPfxSm1sNy', 'dat', 'Nguyễn Đắc Đạt', '0397917082', 'Hà Đông Hà Nội', 'DP567TYA1714841138.jpg', 1, '2024-05-04 23:14:43', '2024-05-04 23:54:46', 1, '', 1),
(5, 'runaldi@gmail.com', '$2y$10$ibx714ZrmCI2CFOZMSFs.uN6ttthQvG.YeP5hrRyOwStkOvca5Qeq', 'runaldo1', '123', '0397917065', '123', 'guest.png', 0, '2024-05-04 23:48:12', '2024-05-04 18:48:29', 1, '', 1),
(6, 'datndhe172134@fpt.edu.vn', '$2y$10$qRvJvHwq3zvrvM4NWbHCeeZHqvmCCqoifuOGf3nIw/qAoaLaEfBNi', 'datkkk', 'cacs', '0987654321', 'cacs, Phuong Thoi An, Quan 12, Thanh pho Ho Chi Minh', 'guest.png', 1, '2024-05-12 23:24:33', '2024-05-12 23:24:33', 1, '871990', 1),
(7, 'nguyendacdat7890@gmail.com', '$2y$10$kUo0Kd7on4/UEwXdVRHEm.vhhZHfOBnA2OX2xvGNfi95ZJfggSwDi', '2222', '', '0987651234', '', 'guest.png', 1, '2024-06-08 21:33:20', '2024-06-08 21:33:20', 1, '833069', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `fruit_type`
--
ALTER TABLE `fruit_type`
  ADD PRIMARY KEY (`fruit_type_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `fruit_type_id` (`fruit_type_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `review_image`
--
ALTER TABLE `review_image`
  ADD PRIMARY KEY (`review_image_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fruit_type`
--
ALTER TABLE `fruit_type`
  MODIFY `fruit_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review_image`
--
ALTER TABLE `review_image`
  MODIFY `review_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`fruit_type_id`) REFERENCES `fruit_type` (`fruit_type_id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `review_image`
--
ALTER TABLE `review_image`
  ADD CONSTRAINT `review_image_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
