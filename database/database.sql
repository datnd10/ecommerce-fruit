-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 12:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_color_id`, `quantity`) VALUES
(22, 51, 1),
(22, 49, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`, `is_active`, `created_at`) VALUES
(7, 'Iphone', 'đẹp', 1, '2024-01-16 02:24:52'),
(8, 'SAMSUNG', 'Sang trọng', 1, '2024-01-16 02:51:05'),
(9, 'VIVO', 'Mượt mà', 1, '2024-01-16 03:03:33'),
(10, 'OPPO', 'đẹp', 1, '2024-01-16 03:18:05'),
(11, 'XIAOMI', 'đẹp', 1, '2024-01-16 03:18:44'),
(12, 'realme', 'đẹp', 1, '2024-01-16 03:20:52'),
(13, 'NOKIA', 'đẹp', 1, '2024-01-16 03:21:19'),
(14, 'Mobell', 'đẹp', 1, '2024-01-16 05:46:52');

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
(10, 28010000, 'hà thị thùy', 'to 36, Xa Xa Bang, Huyen Chau Duc, Tinh Ba Ria - Vung Tau', '0987654321', 'giao hàng chủ nhật', 'cod', 'paid', '2024-01-16 13:21:03', 'received', 20000, 16),
(11, 28015000, 'ngọc trinh', '34, Phuong Vinh Phuc, Quan Ba Dinh, Thanh pho Ha Noi', '0852963741', 'giao tại dưới chung cư cho bảo vệ cổng 1', 'cod', 'not paid', '2024-01-16 17:31:35', 'canceled', 25000, 16),
(12, 12000000, '', '', '0987654321', '', 'banking', 'paid', '2024-01-16 17:37:25', 'received', 20000, 16),
(13, 9510000, 'hà thị thùy', '12, Phuong Thang Tam, Thanh pho Vung Tau, Tinh Ba Ria - Vung Tau', '0987654321', '', 'cod', 'not paid', '2024-01-16 19:35:00', 'canceled', 20000, 16),
(14, 19010000, 'Ha Thi Thuy Trang', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '0354875415', '', 'cod', 'paid', '2024-01-17 02:16:59', 'received', 20000, 15),
(15, 1125000, 'dac dat', '45, Phuong Vinh Phuc, Quan Ba Dinh, Thanh pho Ha Noi', '0789456123', 'giao sớm giúp e ạ', 'cod', 'paid', '2024-01-21 01:20:02', 'received', 25000, 18),
(16, 20520000, 'dac dat', '45, Phuong Vinh Phuc, Quan Ba Dinh, Thanh pho Ha Noi', '0789456123', '', 'cod', 'paid', '2024-01-21 01:20:46', 'received', 20000, 18),
(17, 7010000, 'nam nam', '220, Phuong 12, Quan Binh Thanh, Thanh pho Ho Chi Minh', '0258147369', '', 'cod', 'paid', '2024-01-21 01:24:15', 'received', 20000, 20),
(18, 19000000, 'hà thị thùy', '12, Phuong Thang Tam, Thanh pho Vung Tau, Tinh Ba Ria - Vung Tau', '0987654321', 'giao thứ 7 với chủ nhật', 'cod', 'paid', '2024-01-22 00:05:34', 'received', 20000, 16),
(19, 16120000, 'dac dat', '45, Phuong Vinh Phuc, Quan Ba Dinh, Thanh pho Ha Noi', '0789456123', '', 'cod', 'paid', '2024-01-22 00:18:18', 'received', 20000, 18),
(20, 45010000, 'Ha Thi Thuy Trang', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '0354875415', '', 'cod', 'not paid', '2024-01-22 00:33:00', 'canceled', 20000, 15),
(21, 570000, 'dac dat', '45, Phuong Vinh Phuc, Quan Ba Dinh, Thanh pho Ha Noi', '0789456123', '', 'cod', 'not paid', '2024-01-24 00:34:45', 'pending', 20000, 18),
(22, 1120000, 'Ha Thi Thuy Trang', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '0354875415', '', 'cod', 'not paid', '2024-01-24 00:36:26', 'pending', 20000, 15),
(23, 13780000, 'Ha Thi Thuy Trang', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '0354875415', '', 'cod', 'not paid', '2024-01-24 00:39:46', 'pending', 20000, 15),
(24, 1610000, 'Ha Thi Thuy Trang', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '0354875415', '', 'cod', 'not paid', '2024-01-24 00:40:32', 'pending', 20000, 15),
(25, 1610000, 'Ha Thi Thuy Trang', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '0354875415', '', 'cod', 'not paid', '2024-01-24 00:42:00', 'pending', 20000, 15),
(26, 1610000, 'Ha Thi Thuy Trang', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '0354875415', '', 'cod', 'not paid', '2024-01-24 00:43:01', 'pending', 20000, 15),
(27, 16120000, 'Ha Thi Thuy Trang', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '0354875415', '', 'cod', 'not paid', '2024-01-24 00:43:14', 'pending', 20000, 15),
(28, 16120000, 'Ha Thi Thuy Trang', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '0354875415', '', 'cod', 'not paid', '2024-01-24 00:52:36', 'pending', 20000, 15),
(29, 570000, 'dac dat', '45, Phuong Vinh Phuc, Quan Ba Dinh, Thanh pho Ha Noi', '0789456123', '', 'cod', 'not paid', '2024-01-24 00:53:46', 'pending', 20000, 18),
(30, 10310000, 'dac dat', '45, Phuong Vinh Phuc, Quan Ba Dinh, Thanh pho Ha Noi', '0789456123', '', 'banking', 'paid', '2024-01-24 01:08:02', 'received', 20000, 18),
(31, 11010000, 'dac dat', '45, Phuong Vinh Phuc, Quan Ba Dinh, Thanh pho Ha Noi', '0789456123', '', 'banking', 'paid', '2024-01-24 01:10:31', 'pending', 20000, 18),
(32, 10310000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'cod', 'not paid', '2024-01-24 01:23:42', 'canceled', 20000, 22),
(33, 11010000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'banking', 'paid', '2024-01-24 01:28:31', 'pending', 20000, 22),
(34, 16120000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'cod', 'not paid', '2024-01-24 02:57:27', 'pending', 20000, 22),
(35, 16120000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'cod', 'not paid', '2024-01-24 02:57:30', 'pending', 20000, 22),
(36, 45010000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'banking', 'paid', '2024-01-24 02:58:50', 'received', 20000, 22),
(37, 9610000, 'thẻo', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852569637', '', 'cod', 'not paid', '2024-01-24 03:10:23', 'pending', 20000, 22),
(38, 570000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'cod', 'not paid', '2024-01-24 03:12:18', 'pending', 20000, 22),
(39, 1610000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'cod', 'not paid', '2024-01-24 03:12:46', 'pending', 20000, 22),
(40, 1610000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'banking', 'paid', '2024-01-24 03:13:44', 'pending', 20000, 22),
(41, 7010000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'cod', 'not paid', '2024-01-24 07:16:03', 'pending', 20000, 22),
(42, 16120000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'banking', 'paid', '2024-01-24 07:17:57', 'received', 20000, 22),
(43, 3200000, 'dịch dương thiên tỷ', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '0852963741', '', 'banking', 'paid', '2024-01-24 08:28:26', 'pending', 20000, 22);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_color_id`, `quantity`, `price`) VALUES
(11, 10, 43, 1, 27990000),
(12, 11, 44, 1, 27990000),
(13, 12, 48, 2, 5990000),
(14, 13, 49, 1, 9490000),
(15, 14, 40, 1, 18990000),
(16, 15, 64, 2, 550000),
(17, 16, 70, 1, 20500000),
(18, 17, 57, 1, 6990000),
(19, 18, 49, 2, 9490000),
(20, 19, 66, 1, 16100000),
(21, 20, 54, 1, 44990000),
(22, 21, 64, 1, 550000),
(23, 22, 64, 2, 550000),
(24, 23, 61, 2, 1590000),
(25, 23, 51, 2, 5290000),
(26, 24, 61, 1, 1590000),
(27, 25, 61, 1, 1590000),
(28, 27, 65, 1, 16100000),
(29, 29, 64, 1, 550000),
(30, 30, 53, 1, 10290000),
(31, 31, 59, 1, 10990000),
(32, 32, 53, 1, 10290000),
(33, 33, 60, 1, 10990000),
(34, 34, 65, 1, 16100000),
(35, 36, 54, 1, 44990000),
(36, 37, 50, 1, 9590000),
(37, 38, 64, 1, 550000),
(38, 39, 62, 1, 1590000),
(39, 40, 61, 1, 1590000),
(40, 41, 57, 1, 6990000),
(41, 42, 66, 1, 16100000),
(42, 43, 62, 2, 1590000);

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
  `is_active` tinyint(1) DEFAULT 1,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `rate`, `created_at`, `is_active`, `category_id`) VALUES
(11, 'Iphone 14', 'THÔNG TIN CHUNG\r\n\r\n- Thiết kế: Nguyên khối\r\n- Chất liệu: Khung nhôm & Mặt lưng kính cường lực\r\n- Kích thước, khối lượng:\r\n- Dài 146.7 mm - Ngang 71.5 mm - Dày 7.8 mm - Nặng 172 g\r\n- Thời điểm ra mắt: 09/2022\r\n- Hãng: iPhone (Apple). Xem thông tin hãng', 5, '2024-01-16 02:26:04', 1, 7),
(12, 'Samsung - Galaxy S23 Ultra', 'ĐẶC ĐIỂM NỔI BẬT\r\n- Thoả sức chụp ảnh, quay video chuyên nghiệp - Camera đến 200MP, chế độ chụp đêm cải tiến, bộ xử lí ảnh thông minh\r\n- Chiến game bùng nổ - chip Snapdragon 8 Gen 2 8 nhân tăng tốc độ xử lí, màn hình 120Hz, pin 5.000mAh\r\n- Nâng cao hiệu suất làm việc với Siêu bút S Pen tích hợp, dễ dàng đánh dấu sự kiện từ hình ảnh hoặc video\r\n- Thiết kế bền bỉ, thân thiện - Màu sắc lấy cảm hứng từ thiên nhiên, chất liệu kính và lớp phim phủ PET tái chế', 0, '2024-01-16 03:08:08', 1, 8),
(13, 'Iphone 15 Pr', 'CẤU HÌNH ĐIỆN THOẠI IPHONE 15 PR MAX\r\n- Màn hình: OLED6.7\"Super Retina XDR\r\n- Hệ điều hành: iOS 17\r\n- Camera sau: Chính 48 MP & Phụ 12 MP, 12 MP\r\n- Camera trước: 12 MP\r\n- Chip: Apple A17 Pro 6 nhân\r\n- RAM: 8 GB\r\n- Dung lượng lưu trữ: 256 GB\r\n\r\n', 5, '2024-01-16 03:24:47', 1, 7),
(14, 'Samsung Galaxy A15', 'THÔNG SỐ KỸ THUẬT\r\n- Kích thước màn hình: 6.5 inches\r\n- Công nghệ màn hình: Super AMOLED\r\n- Camera sau: Chính 50 MP & Phụ 5 MP, 2 MP\r\n- Camera trước: 13MP\r\n- Chipset: MediaTek Helio G99 8 nhân\r\n- Dung lượng RAM: 8 GB\r\n', 5, '2024-01-16 04:19:11', 1, 8),
(15, 'VIVO V29e', 'THÔNG SỐ KỸ THUẬT\r\n- Pin khủng kèm sạc siêu siêu tốc 44W \r\n- Kích thước màn hình: 6.67 inches\r\n- Công nghệ màn hình: AMOLED\r\n- Dung lượng RAM: 8 GB\r\n- Bộ nhớ trong: 256 GB\r\n- Pin: 4800 mAh\r\n- Thẻ SIM: 2 SIM (Nano-SIM)\r\n- Hệ điều hành: Android 13\r\n', 0, '2024-01-16 04:40:43', 1, 9),
(16, 'VIVO Y36', 'THÔNG SỐ KỸ THUẬT\r\n- Kích thước màn hình: 6.64 inches\r\n- Công nghệ màn hình: IPS LCD\r\n- Camera sau: Camera chính: 50 MP, f/1.8; Camera phụ: 2 MP, f/2.4\r\n- Camera trước: 16 MP, f/2.45\r\n- Chipset: Snapdragon 680 8 nhân\r\n- Dung lượng RAM: 8 GB\r\n', 0, '2024-01-16 04:49:00', 1, 9),
(17, 'OPPO Reno 10', 'THÔNG SỐ KỸ THUẬT\r\n- Kích thước màn hình: 6.7 inches\r\n- Công nghệ màn hình: AMOLED\r\n- Camera sau\r\nCamera góc rộng: 64MP; f/1.7, PDAF\r\nChụp Telephoto chân dung: 32 MP, f/2.0\r\nCamera góc siêu rộng: 8 MP, f/2.2, Zoom quang lai 2X× và Xoom kỹ thuật số 20X\r\n- Camera trước\r\nCamera góc rộng: 32 MP, f/2.4\r\n', 5, '2024-01-16 05:01:11', 1, 10),
(18, 'OPPO Find N3', 'THÔNG SỐ KỸ THUẬT\r\n- Kích thước màn hình: 7.82 inches\r\n- Công nghệ màn hình: OLED\r\n- Camera sau\r\nCamera chính: 48MP, f/1.7, OIS\r\nCamera góc rộng: 48MP, f/2.2\r\nCamera Tele: 64MP, f/2.6\r\n- Camera trước\r\nMàn hình chính: 20MP, f/2.2\r\nMàn hình ngoài: 32MP, f/2.4\r\n', 0, '2024-01-16 05:07:16', 1, 10),
(19, 'realme 11', 'CẤU HÌNH ĐIỆN THOẠI\r\n- Màn hình: Super AMOLED6.4\"Full HD+\r\n- Hệ điều hành: Android 13\r\n- Camera sau: Chính 108 MP & Phụ 2 MP\r\n- Camera trước: 16 MP\r\n- Chip: MediaTek Helio G99\r\n- RAM: 8 GB\r\n- Dung lượng lưu trữ: 256 GB\r\n', 4, '2024-01-16 05:20:43', 1, 12),
(20, 'realme 11 Pr', '\r\n CẤU HÌNH ĐIỆN THOẠI REALME 11 PRO\r\n\r\n- Màn hình: AMOLED6.7\"Full HD+\r\n- Hệ điều hành: Android 13\r\n- Camera sau: Chính 200 MP & Phụ 8 MP, 2 MP\r\n- Camera trước: 32 MP\r\n- Chip: MediaTek Dimensity 7050 5G 8 nhân\r\n- RAM: 12 GB\r\n- Dung lượng lưu trữ: 512 GB\r\n\r\n', 0, '2024-01-16 05:26:42', 1, 12),
(21, 'Xiaomi 13T', ' CẤU HÌNH ĐIỆN THOẠI XIAOMI 13T\r\n- Màn hình: AMOLED6.67\"1.5K\r\n- Hệ điều hành: Android 13\r\n- Camera sau: Chính 50 MP & Phụ 50 MP, 12 MP\r\n- Camera trước: 20 MP\r\n- Chip: MediaTek Dimensity 8200-Ultra\r\n- RAM: 8 GB\r\n- Dung lượng lưu trữ: 256 GB\r\n', 0, '2024-01-16 05:32:53', 1, 11),
(22, 'Nokia 8210', 'THÔNG TIN SẢN PHẨM\r\n- Nokia 8210 4G có lẽ là một lựa chọn phù hợp với những ai cần cho mình một chiếc điện thoại phổ thông phục vụ cho nhu cầu nghe gọi. Máy có giá thành rẻ và vừa có độ bền cao, giúp cho người dùng có thể tiết kiệm được kha khá số tiền bỏ ra ban đầu cũng như không cần quá lo lắng đến vấn đề hỏng hóc trong lúc sử dụng.\r\n- Hoàn thiện tỉ mỉ cho đến từng chi tiết nhỏ\r\n- Nokia 8210 4G sở hữu một mặt lưng và bộ khung được làm từ nhựa Polycarbonate, có các màu sắc trẻ trung. Với thân hình của một chiếc điện thoại nhỏ gọn dễ cầm giúp cho người dùng có thể bỏ túi một cách dễ dàng mà không sợ bị cấn như trên những chiếc smartphone có kích thước lớn.\r\n\r\n', 0, '2024-01-16 05:39:41', 1, 13),
(23, 'Mobell M331', 'CẤU HÌNH ĐIỆN THOẠI MOBELL M331\r\n- Màn hình: TFT LCD2.4\"262.000 màu\r\n- SIM: 2 Nano SIMHỗ trợ 4G VoLTE\r\n- Danh bạ: 2000 số\r\n- Thẻ nhớ: MicroSD, hỗ trợ tối đa 64 GB\r\n- Camera sau: 0.8 MP\r\n- Pin: 1000 mAh\r\n', 5, '2024-01-16 05:48:31', 1, 14),
(24, 'Iphone 13', 'Cấu hình Điện thoại iPhone 13 128GB\r\n- Màn hình: OLED6.1\"Super Retina XDR\r\n- Hệ điều hành: iOS 15\r\n- Camera sau: 2 camera 12 MP\r\n- Camera trước: 12 MP\r\n- Chip: Apple A15 Bionic\r\n- RAM: 4 GB\r\n- Dung lượng lưu trữ: 128 GB\r\n\r\n', 0, '2024-01-16 05:52:54', 1, 7),
(25, 'Samsung Galaxy Z Flip5', 'CẤU HÌNH ĐIỆN THOẠI - Samsung Galaxy Z Flip5 5G\r\n\r\n- Đặc biệt với chip mạnh, người dùng có thể trải nghiệm các tính năng như duyệt web nhanh chóng, quay video chất lượng cao và thậm chí là sử dụng công nghệ trí tuệ nhân tạo để tối ưu hóa trải nghiệm người dùng.\r\n\r\n- Galaxy Z Flip5 được trang bị 8 GB RAM, đây là một dung lượng RAM lớn đủ để đáp ứng nhu cầu xử lý đa nhiệm và chạy các ứng dụng nặng. Điện thoại cũng có khả năng chạy các trò chơi 3D yêu cầu nhiều bộ nhớ một cách mượt mà và ổn định.\r\n\r\n- Đa dạng phong cách chụp với 2 camera\r\nSamsung Galaxy Z Flip5 được trang bị hệ thống camera đa dạng và mạnh mẽ. Ở mặt sau, điện thoại này sở hữu một bộ đôi camera chính với cảm biến chất lượng cao có độ phân giải đều là 12 MP. Trong đó bao gồm một camera chính chụp ảnh và một camera góc siêu rộng, giúp bạn chụp được nhiều loại hình khác nhau và tạo ra những bức ảnh đẹp mắt.\r\n\r\n', 5, '2024-01-16 06:02:12', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `product_color_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` float NOT NULL DEFAULT 0,
  `sold_quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`product_color_id`, `color`, `quantity`, `price`, `sold_quantity`, `created_at`, `is_active`, `product_id`) VALUES
(40, 'Tím', 19, 18990000, 1, '2024-01-16 02:26:40', 1, 11),
(41, 'Xanh dương', 30, 18890000, 0, '2024-01-16 03:06:55', 1, 11),
(42, 'Đen', 20, 25490000, 0, '2024-01-16 03:09:17', 1, 12),
(43, 'Titan đen', 19, 27990000, 1, '2024-01-16 03:28:58', 1, 13),
(44, 'Titan trắng', 20, 27990000, 0, '2024-01-16 03:38:18', 1, 13),
(45, 'Titan xanh', 20, 27990000, 0, '2024-01-16 03:42:15', 1, 13),
(46, 'Kem', 20, 25490000, 0, '2024-01-16 04:13:37', 1, 12),
(47, 'Xanh dương nhạt', 20, 5990000, 0, '2024-01-16 04:33:33', 1, 14),
(48, 'Đen', 18, 5990000, 2, '2024-01-16 04:35:54', 1, 14),
(49, 'Xanh dương nhạt', 18, 9490000, 2, '2024-01-16 04:42:13', 1, 15),
(50, 'Đen', 19, 9590000, 1, '2024-01-16 04:44:40', 1, 15),
(51, 'Đen', 18, 5290000, 2, '2024-01-16 04:50:36', 1, 16),
(52, 'Xanh', 20, 5190000, 0, '2024-01-16 04:56:08', 1, 16),
(53, 'Xanh nhạt', 19, 10290000, 1, '2024-01-16 05:03:11', 1, 17),
(54, 'Vàng đồng', 19, 44990000, 1, '2024-01-16 05:08:25', 1, 18),
(55, 'Đen', 20, 44990000, 0, '2024-01-16 05:09:27', 1, 18),
(56, 'Vàng', 20, 6990000, 0, '2024-01-16 05:22:10', 1, 19),
(57, 'Đen ', 18, 6990000, 2, '2024-01-16 05:23:10', 1, 19),
(58, 'Trắng', 10, 13490000, 0, '2024-01-16 05:28:15', 1, 20),
(59, 'Xanh dương', 9, 10990000, 1, '2024-01-16 05:36:44', 1, 21),
(60, 'Xanh lá', 9, 10990000, 1, '2024-01-16 05:37:52', 1, 21),
(61, 'Trắng', 15, 1590000, 5, '2024-01-16 05:42:31', 1, 22),
(62, 'Đỏ', 17, 1590000, 3, '2024-01-16 05:43:33', 1, 22),
(63, 'Xanh', 20, 1590000, 0, '2024-01-16 05:44:20', 1, 22),
(64, 'Xanh', 3, 550000, 7, '2024-01-16 05:49:58', 1, 23),
(65, 'Xanh dương', 18, 16100000, 2, '2024-01-16 05:55:39', 1, 24),
(66, 'Hồng', 18, 16100000, 2, '2024-01-16 05:56:27', 1, 24),
(67, 'Xanh lá', 20, 16000000, 0, '2024-01-16 05:57:28', 1, 11),
(68, 'Trắng', 20, 16500000, 0, '2024-01-16 05:58:20', 1, 11),
(69, 'Đen', 20, 16250000, 0, '2024-01-16 05:59:11', 1, 11),
(70, 'Xám', 19, 20500000, 1, '2024-01-16 06:03:35', 1, 25),
(71, 'Xanh mint', 20, 20500000, 0, '2024-01-16 06:04:37', 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `image`, `product_color_id`) VALUES
(208, 'aTplyAqV1705431106.png', 42),
(209, 'HOEw82811705431106.png', 42),
(210, '7SPArsrm1705431106.png', 42),
(211, 'rHQNUi5T1705431159.png', 46),
(212, 'dN9Yn8wN1705431159.png', 46),
(213, 'Kg6pIZvc1705431159.png', 46),
(214, 'g9HBIJrR1705432316.png', 40),
(215, 'h98ZXdfU1705432316.png', 40),
(216, '24W3EC4k1705432316.png', 40),
(217, 'JdOXjrmC1705432435.png', 41),
(218, 'ZstOy5Jm1705432435.png', 41),
(219, 'AoOoD4k31705432435.png', 41),
(220, '1BbPQwcT1705433391.png', 66),
(221, 'Yr8weSsz1705433391.png', 66),
(222, 'zuEi4PZD1705433391.png', 66),
(223, '4EmOzSZw1705433475.png', 67),
(224, 'le2HzMiw1705433475.png', 67),
(225, '6nfyCLOC1705433475.png', 67),
(226, 'EOUxyNXS1705433597.png', 68),
(227, 'tTfZOTCm1705433597.png', 68),
(228, 'NvUHtP8U1705433597.png', 68),
(229, 'xJw9n0oF1705433647.png', 69),
(230, 'setXC7Dg1705433647.png', 69),
(231, 'b1H3JihS1705433647.png', 69),
(235, 'KSoLmdG41705436770.png', 43),
(236, 'Fsnmj8GY1705436770.png', 43),
(237, 'DBRAEXD91705436800.png', 44),
(238, 'TZIG810a1705436800.png', 44),
(239, 'TzjIcGA31705436830.png', 45),
(240, 'XiQCSLtu1705436830.png', 45),
(241, 'v9T0WFGU1705436912.png', 65),
(242, 'jPGzxoY61705436912.png', 65),
(243, 'lfXVBZeP1705436912.png', 65),
(244, 'agpS3Vdc1705437009.png', 48),
(245, 'UQWdtuRZ1705437009.png', 48),
(246, 'MJY0Eowc1705437070.png', 47),
(247, '2hgsosFB1705437070.png', 47),
(248, 'Qrq3QFNd1705437070.png', 47),
(249, 'XYyFgoDO1705437140.png', 70),
(250, '8o18R6cP1705437140.png', 70),
(251, 'lgNOHlUs1705437140.png', 70),
(252, 'hR6GhhXh1705437180.png', 71),
(253, 'SFbRWWCq1705437180.png', 71),
(254, 'GRj1KOpR1705437180.png', 71),
(255, 'isccEs8z1705437252.png', 49),
(256, 'oZxOQBjq1705437252.png', 49),
(257, 'H1Js4pNT1705437252.png', 49),
(258, 'akscvKgR1705437302.png', 50),
(259, 'ivo7sgC11705437302.png', 50),
(260, 'Cgth2b4K1705437302.png', 50),
(261, 'nbgPVWxb1705437387.png', 51),
(262, 'ahuQ62141705437387.png', 51),
(263, '2dhPse2J1705437387.png', 51),
(264, 'xIqHF2GB1705437439.png', 52),
(265, 'VUNa3YeJ1705437439.png', 52),
(266, 'YFHFKkBb1705437439.png', 52),
(267, 'zrJF03bg1705437558.png', 53),
(268, 'qJWB4E6Q1705437558.png', 53),
(269, 'wHymrwQo1705437558.png', 53),
(270, 'oFJwlfCE1705437558.png', 53),
(271, '2btoyoES1705437558.png', 53),
(272, 'aLJMrurM1705437641.png', 54),
(273, 'UcNwPDAj1705437641.png', 54),
(274, 'lDdoIQr71705437641.png', 54),
(275, 'mGPcHzai1705437727.png', 55),
(276, 'mEhltEn61705437727.png', 55),
(277, '2TTXXvIL1705437727.png', 55),
(278, 'nPkCFk8h1705437865.png', 59),
(279, 'tonKOKce1705437865.png', 59),
(280, 'L6KO7kZM1705437865.png', 59),
(281, 'oooeQvmJ1705437909.png', 60),
(282, 'eiKJaDFb1705437909.png', 60),
(283, '9D2ELG6l1705437909.png', 60),
(284, '6fq7ZTOf1705437966.png', 56),
(285, 'V2EUgYik1705437966.png', 56),
(286, 'Bommsy2t1705437966.png', 56),
(287, '0UGxHiR41705438003.png', 57),
(288, '17c8Spsp1705438003.png', 57),
(289, 'pEoakY8Y1705438003.png', 57),
(295, 'YhEbOuIS1705438106.png', 58),
(296, 'f8zCiXUs1705438106.png', 58),
(297, 'o7F6Zd1q1705438106.png', 58),
(298, 'k7E90I0W1705438106.png', 58),
(299, 'cqfMRVXZ1705438106.png', 58),
(300, 'uiFToS7L1705438106.png', 58),
(301, 'X9J8dxR71705438156.png', 61),
(302, 'kcImliCx1705438156.png', 61),
(303, 'qWFFXFv51705438182.png', 62),
(304, 'AfCOItig1705438182.png', 62),
(305, 'puGoxss21705438211.png', 63),
(306, 'oRw9lEcn1705438211.png', 63),
(307, '5J8mOGrq1705438280.png', 64),
(308, 'DiWk1Mlt1705438280.png', 64),
(309, 'qVQV6Klf1705438280.png', 64),
(310, 'kJhGWSZH1705438280.png', 64),
(311, '0Kf1bJlQ1705438280.png', 64);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `content` varchar(999) NOT NULL,
  `star` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `content`, `star`, `created_at`, `user_id`, `product_color_id`) VALUES
(5, 'sang sịn mịn', 5, '2024-01-16 13:28:31', 16, 43),
(6, 'nhận hàng rất nhanh', 5, '2024-01-16 17:57:13', 16, 48),
(7, 'đẹp ', 5, '2024-01-17 02:18:36', 15, 40),
(8, 'mượt mà', 5, '2024-01-21 01:07:01', 16, 48),
(9, '', 5, '2024-01-21 01:08:15', 16, 44),
(10, '5 cho shop giao rất nhanh', 5, '2024-01-21 01:28:37', 18, 64),
(11, 'sịn lắm nha shop mk ơi', 5, '2024-01-21 01:30:04', 18, 70),
(12, 'giao hàng hơi lâu', 4, '2024-01-21 01:33:17', 20, 57),
(13, '', 5, '2024-01-21 01:35:53', 16, 48),
(14, 'rất ổn và đpẹ', 5, '2024-01-24 01:24:33', 22, 53);

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
(10, 'byAVMGXx1705432716.png', 7),
(11, '74EKuHfH1705432716.png', 7),
(12, 'EyetYryU1705432716.png', 7),
(13, 'RelkVwLS1705774021.png', 8),
(14, 'VHOlUPOK1705774095.png', 9),
(15, 'MQbhj1Ti1705774095.png', 9),
(16, 'fkVN8a6t1705775317.png', 10),
(17, 'gQs5dk4C1705775404.png', 11),
(18, 'EH7KLBlo1705775597.png', 12),
(19, 'y3rBBmgc1705775753.png', 13);

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
  `is_active` tinyint(1) DEFAULT 1,
  `token` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `username`, `fullname`, `phone`, `address`, `avatar`, `role`, `created_at`, `is_active`, `token`, `status`) VALUES
(15, 'hathithuytrang2112@gmail.com', '$2y$10$gRq3yB57Cg7G7kdfZHobG.VU1oT08qGP.lPNEfz0kmsBkxB/7Z5Be', 'Chen', 'Ha Thi Thuy Trang', '0354875415', '566/299, Phuong 6, Quan Go Vap, Thanh pho Ho Chi Minh', '6zxWTOwN1705429130.jpg', 0, '2024-01-16 01:42:11', 1, '113688', 1),
(16, 'thuytrang21022001@gmail.com', '$2y$10$v5A23cLmbAlL55xxOk1Sp.0apOqRVxNlXJf8MwdYPEFz8QomIBShq', 'Thùy', 'hà thị thùy', '0987654321', '12, Phuong Thang Tam, Thanh pho Vung Tau, Tinh Ba Ria - Vung Tau', 'bDVIm4Nr1705773913.jpg', 1, '2024-01-16 13:17:15', 1, '175240', 1),
(17, 'nguyendacdat300303@gmail.com', '$2y$10$kPODMS7v2lqtRxhl.0W7fOZWhRiSnvEaXaOkEQxbLVAms3vDUipPy', 'đạt', '', '0987456123', '', 'guest.png', 1, '2024-01-17 02:23:34', 1, '449223', 1),
(18, 'nguyendacdat7890@gmail.com', '$2y$10$nnN3sowPD.3ZKZofvRrGOO9xHn1T9jySzhRiQec2lbaVDUnexoDLm', 'đắc đạt', 'dac dat', '0789456123', '45, Phuong Vinh Phuc, Quan Ba Dinh, Thanh pho Ha Noi', 'kzF07Bng1705774775.jpg', 1, '2024-01-17 02:25:28', 1, '351836', 1),
(19, 'huylonggg123@gmail.com', '$2y$10$PXtqRA6rgAF2JU9U271NzuTQ8sf/PwECZMZktN/hKjBYfHoUpb5Si', 'long', '', '0963852741', '', 'guest.png', 1, '2024-01-17 02:26:59', 1, '105075', 1),
(20, 'monstervtn@gmail.com', '$2y$10$vaKiqhxt7k2PqduAJi79Quz0yF5OQUsUpq/XbOqNYwPxppHuURsj2', 'nam', '', '0258147369', '', 'guest.png', 1, '2024-01-17 14:40:25', 1, '431018', 1),
(21, 'hathithuytrang2156612@gmail.com', '$2y$10$csfMY/UCEudbo9.mRFFuYO9h.RjDc6XtUfwLdebM.ELTf7M4YMhha', 'hà', '', '1234569870', '', 'guest.png', 1, '2024-01-21 23:49:59', 1, '140372', 0),
(22, 'hatranghoha123@gmail.com', '$2y$10$kUdSCB/f1IG6WNJUzN4/H.0HC52dbrcJY.TA3mzAvIj10aEIDr.le', 'thiên tỷ', 'dịch dương thiên tỷ', '0852963741', '55, Phuong Trang Tien, Quan Hoan Kiem, Thanh pho Ha Noi', '5toAamFU1706034046.jpg', 1, '2024-01-24 01:16:20', 1, '704153', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_color_id` (`product_color_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

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
  ADD KEY `product_color_id` (`product_color_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`product_color_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_color_id` (`product_color_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_color_id` (`product_color_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `product_color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `review_image`
--
ALTER TABLE `review_image`
  MODIFY `review_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`);

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
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`);

--
-- Constraints for table `review_image`
--
ALTER TABLE `review_image`
  ADD CONSTRAINT `review_image_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
