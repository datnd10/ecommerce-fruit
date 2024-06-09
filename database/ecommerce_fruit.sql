-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 06:45 PM
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
(6, 1, 1),
(1, 1, 1);

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
(2, 'cam', 1, '2024-05-06 23:44:53', '2024-05-06 23:46:04');

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
(6, 10001, 'meo meo', 'Ha Noi', '0397917086', '', 'banking', 'paid', '2024-06-08 21:18:04', 'received', 1, 1);

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
(8, 6, 1, 1, 10000);

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
(1, 'Táo mĩ', 'Fresh and juicy apple', 5, '2024-05-08 00:00:00', '2024-05-08 00:00:00', 1, 1608, 10000, 88, 1, 1),
(2, 'tao1', 'cascsa', 0, '2024-05-08 22:19:37', '2024-05-08 22:19:37', 1, 112, 111, 0, 1, 1),
(3, 'tao2', 'ccc', 3, '2024-05-08 22:29:27', '2024-05-08 22:29:27', 1, 123, 123, 0, 1, 1);

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
(22, 'q6HAtpYN1717950884.jpg', 3);

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
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `content`, `star`, `created_at`, `updated_at`, `user_id`, `product_id`) VALUES
(1, 'rat ngon', 4, '2024-06-09 20:58:44', '2024-06-09 20:58:44', 1, 1),
(2, 'rat dep', 5, '2024-06-09 20:59:15', '2024-06-09 20:59:15', 1, 1),
(3, 'ww', 3, '2024-06-09 20:59:24', '2024-06-09 20:59:24', 1, 3);

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

INSERT INTO `review_image` (`review_image_id`, `image`, `review_id`) VALUES
(1, 'FYtpReBz1717941524.jpg', 1),
(2, 'FTFKgBw01717941524.jpg', 1),
(3, 'TbjEWwxS1717941524.jpg', 1),
(4, 'qYEwDnpP1717941524.jpg', 1),
(5, 'AUu6kx701717941555.jpg', 2),
(6, 'QueOczoF1717941555.jpg', 2),
(7, 'EGuO6jJ91717941555.jpg', 2),
(8, '5t0ZwNJE1717941555.jpg', 2),
(9, 'IDyUE73G1717941564.jpg', 3),
(10, 'lrGqAQM51717941564.jpg', 3);

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
(6, 'datndhe172134@fpt.edu.vn', '$2y$10$qRvJvHwq3zvrvM4NWbHCeeZHqvmCCqoifuOGf3nIw/qAoaLaEfBNi', 'datkkk', '', '0987654321', '', 'guest.png', 1, '2024-05-12 23:24:33', '2024-05-12 23:24:33', 1, '871990', 1),
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
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `review_image`
--
ALTER TABLE `review_image`
  ADD CONSTRAINT `review_image_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
