-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 07:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_ip`) VALUES
(1, 'admin', 'admin@email.com', '$2y$10$zUecnDzMjyJRnCQMQjfwkez.Ss.JOf1M4dTyNuxfLlejX060tPWNa', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(69) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(3, 'Shell'),
(7, 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `prod_total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `user_id`, `product_name`, `product_desc`, `price`, `ip_address`, `quantity`, `prod_total`) VALUES
(23, 0, 'pasldp', 'qweqwe', 235, '::1', 1, 235);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(69) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category_name`) VALUES
(40, 'Christmas Light'),
(45, 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(28, 5, 1546024798, 21, 9, 'pending'),
(29, 5, 1206294972, 22, 10, 'pending'),
(30, 5, 933609387, 22, 8, 'pending'),
(31, 5, 1832676217, 24, 20, 'pending'),
(32, 5, 1104526097, 24, 6, 'pending'),
(33, 5, 599489919, 24, 2, 'pending'),
(34, 5, 281254387, 24, 8, 'pending'),
(35, 5, 1948837942, 23, 2, 'pending'),
(36, 5, 1004177028, 24, 3, 'pending'),
(37, 5, 526118836, 24, 18, 'pending'),
(38, 5, 421061027, 24, 1, 'pending'),
(39, 5, 2022615320, 23, 1, 'pending'),
(40, 5, 1859583522, 24, 1, 'pending'),
(41, 5, 1887359563, 23, 1, 'pending'),
(42, 5, 1392501683, 21, 1, 'pending'),
(43, 5, 1566765813, 24, 1, 'pending'),
(44, 4, 164240587, 23, 1, 'pending'),
(45, 4, 756623106, 25, 5, 'pending'),
(46, 4, 2079572259, 25, 4, 'pending'),
(47, 4, 1686037765, 25, 5, 'pending'),
(48, 4, 2056279289, 25, 4, 'pending'),
(49, 4, 643738225, 24, 5, 'pending'),
(50, 4, 2036384016, 24, 4, 'pending'),
(51, 4, 10455289, 24, 6, 'pending'),
(52, 4, 1904078228, 24, 4, 'pending'),
(53, 4, 326167586, 21, 3, 'pending'),
(54, 4, 1044671924, 23, 5, 'pending'),
(55, 4, 481368549, 22, 10, 'pending'),
(56, 4, 119439035, 22, 3, 'pending'),
(57, 4, 489547097, 25, 3, 'pending'),
(58, 4, 1363083235, 25, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(100) NOT NULL,
  `product_key` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `stock` int(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_key`, `cat_id`, `stock`, `brand_id`, `product_img`, `product_price`, `date`, `status`) VALUES
(21, 'asdsa', 'asdads', 'sadsad', 40, 1190, 3, 'shell.webp', '2133', '2023-12-15 15:06:01', 'true'),
(22, 'asdawf', 'asdsad', '213', 45, 390, 7, 'IMG_8665.jpg', '789', '2023-12-15 15:06:01', 'true'),
(23, 'pasldp', 'qweqwe', 'csaww', 45, 30, 7, 'download.png', '235', '2023-12-15 15:06:01', 'true'),
(24, 'lasdjlk', 'asdlasc', 'msadmask', 45, 180, 7, 'Nami_Anime_Post_Ellipse_Infobox.webp', '2893', '2023-12-15 14:53:07', 'true'),
(25, 'mksadkaskdm', 'ksandknasdk', 'kasmc', 45, 1, 7, 'Untitled-1.png', '24', '2023-12-15 17:52:56', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(3, 'sample', 'sampeleeee', '2023-12-11 00:00:00', '2023-12-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `order_sample` int(255) NOT NULL,
  `item_number` varchar(50) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_price` float(10,2) DEFAULT NULL,
  `item_price_currency` varchar(10) DEFAULT NULL,
  `payer_id` varchar(50) DEFAULT NULL,
  `payer_name` varchar(50) DEFAULT NULL,
  `payer_email` varchar(50) DEFAULT NULL,
  `payer_country` varchar(20) DEFAULT NULL,
  `merchant_id` varchar(255) DEFAULT NULL,
  `merchant_email` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) NOT NULL,
  `payment_source` varchar(50) DEFAULT NULL,
  `payment_status` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_sample`, `item_number`, `item_name`, `item_price`, `item_price_currency`, `payer_id`, `payer_name`, `payer_email`, `payer_country`, `merchant_id`, `merchant_email`, `order_id`, `transaction_id`, `paid_amount`, `paid_amount_currency`, `payment_source`, `payment_status`, `created`, `modified`) VALUES
(2, 0, 'DP12345', 'Demo Product', 75.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '20C63026WN616444Y', '7AM63609UF2548549', 75.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 05:45:28', '2023-12-15 12:46:48'),
(3, 0, 'sad', '47', 95711.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '7BH875985B791042P', '1HJ0998294094491U', 95711.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 07:47:08', '2023-12-15 14:47:47'),
(4, 0, 'sad', '47', 95711.00, 'PHP', 'UWZZALAMK6GHY', '', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '7EK948922B825681U', '6SC049714J945315H', 95711.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 07:52:54', '2023-12-15 14:52:57'),
(5, 0, 'sad', '47', 95711.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '581301117V392814P', '8KC487819A741154X', 95711.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 08:30:53', '2023-12-15 15:31:01'),
(6, 321, 'sad', '47', 95711.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '7PC11865LU826640W', '98V5821383759153L', 95711.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 08:32:09', '2023-12-15 15:32:13'),
(7, 23, 'sad', '47', 95711.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '1NA98019WN5726111', '91W71880AL0351948', 95711.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 08:39:22', '2023-12-15 15:39:26'),
(8, 23, 'sad', '47', 95711.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '32K20682W2246460B', '89908881T7050163T', 95711.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 08:47:45', '2023-12-15 15:47:50'),
(9, 23, 'sad', '47', 95711.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '2MV86411MA5040154', '1SR65457WE657291L', 95711.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 08:52:23', '2023-12-15 15:52:28'),
(10, 22, 'sad', '47', 95711.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '7FF83516W6430451M', '7X940307NM291701N', 95711.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 09:12:43', '2023-12-15 16:12:52'),
(15, 24, 'sad', '2', 5026.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '0LL27911C9446474C', '99242650B64773847', 5026.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 09:45:25', '2023-12-15 16:45:30'),
(17, 25, 'sad', '1', 235.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '87T955939M304153U', '89V80890MV496221E', 235.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 09:49:31', '2023-12-15 16:49:34'),
(18, 25, 'sad', '1', 235.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '3AV86172LY138354A', '374715267N935040V', 235.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 09:51:12', '2023-12-15 16:51:16'),
(20, 27, 'sad', '1', 235.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '9WP662390W115245X', '7SS0443737369914X', 235.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 10:02:41', '2023-12-15 17:02:45'),
(21, 26, 'sad', '1', 2893.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '2PV4118070297914V', '8GU19153L2032073E', 2893.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 10:43:05', '2023-12-15 17:43:19'),
(22, 28, 'sad', '1', 2133.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '8ND6712029187543Y', '6G353583XL245771N', 2133.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 10:46:57', '2023-12-15 17:47:07'),
(23, 29, 'sad', '1', 2893.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '7HX143889W000531B', '92P3874898341183M', 2893.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 10:54:23', '2023-12-15 17:54:32'),
(24, 30, 'sad', '1', 235.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '7LG23551FK303625F', '91966264K8901732R', 235.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 14:20:50', '2023-12-15 21:21:26'),
(25, 46, 'sad', '1', 24.00, 'PHP', 'UWZZALAMK6GHY', 'John Doe', 'sb-ogkht28782961@personal.example.com', 'GB', 'FDJBUTBGHYHXY', 'sb-gxhgz28782679@business.example.com', '3R049306EX431930J', '68V23117CG467891D', 24.00, 'PHP', 'paypal', 'COMPLETED', '2023-12-15 18:54:53', '2023-12-16 01:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `product_name`, `total_products`, `order_date`, `order_status`) VALUES
(22, 5, 28228, 1004177028, '', 12, '2023-12-15 08:22:48', 'Complete'),
(23, 5, 95711, 526118836, '', 47, '2023-12-15 07:50:38', 'Complete'),
(24, 5, 5026, 421061027, '', 2, '2023-12-15 08:42:43', 'Complete'),
(25, 5, 235, 2022615320, '', 1, '2023-12-15 08:51:03', 'Complete'),
(26, 5, 2893, 1859583522, '', 1, '2023-12-15 09:42:57', 'Complete'),
(27, 5, 235, 1887359563, '', 1, '2023-12-15 09:02:28', 'Complete'),
(28, 5, 2133, 1392501683, '', 1, '2023-12-15 09:46:45', 'Complete'),
(29, 5, 2893, 1566765813, '', 1, '2023-12-15 09:54:16', 'Complete'),
(30, 4, 235, 164240587, '', 1, '2023-12-15 13:20:17', 'Complete'),
(31, 4, 16523, 756623106, '', 10, '2023-12-15 14:36:01', 'pending'),
(32, 4, 20960, 2079572259, '', 3, '2023-12-15 14:38:59', 'pending'),
(33, 4, 28167, 1686037765, '', 17, '2023-12-15 14:41:14', 'pending'),
(34, 4, 22333, 2056279289, '', 13, '2023-12-15 14:43:24', 'pending'),
(35, 4, 25130, 643738225, '', 10, '2023-12-15 14:45:48', 'pending'),
(36, 4, 22237, 1078414749, '', 9, '2023-12-15 14:48:40', 'pending'),
(37, 4, 22237, 1189672825, '', 9, '2023-12-15 14:49:51', 'pending'),
(38, 4, 22237, 2036384016, '', 9, '2023-12-15 14:50:20', 'pending'),
(39, 4, 20514, 10455289, '', 10, '2023-12-15 14:51:50', 'pending'),
(40, 4, 32093, 1904078228, '', 23, '2023-12-15 14:53:06', 'pending'),
(41, 4, 6399, 326167586, '', 3, '2023-12-15 14:53:51', 'pending'),
(42, 4, 15785, 1044671924, '', 15, '2023-12-15 14:54:31', 'pending'),
(43, 4, 35619, 481368549, '', 23, '2023-12-15 14:55:22', 'pending'),
(44, 4, 23697, 119439035, '', 13, '2023-12-15 15:04:06', 'pending'),
(45, 4, 31642, 489547097, '', 33, '2023-12-15 15:06:01', 'pending'),
(46, 4, 24, 1363083235, '', 1, '2023-12-15 17:53:17', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(7, 1, 0, 95711, 'PayPal', '2023-12-15 07:50:38'),
(10, 22, 7, 95711, 'PayPal', '2023-12-15 08:22:48'),
(11, 24, 7, 5026, 'PayPal', '2023-12-15 08:42:43'),
(12, 87, 87, 235, 'PayPal', '2023-12-15 08:51:02'),
(13, 1887359563, 1887359563, 235, 'PayPal', '2023-12-15 09:02:28'),
(14, 1859583522, 1859583522, 2893, 'PayPal', '2023-12-15 09:42:57'),
(15, 1392501683, 1392501683, 2133, 'PayPal', '2023-12-15 09:46:45'),
(16, 1566765813, 1566765813, 2893, 'PayPal', '2023-12-15 09:54:16'),
(17, 164240587, 164240587, 235, 'PayPal', '2023-12-15 13:20:17'),
(18, 1363083235, 1363083235, 24, 'PayPal', '2023-12-15 17:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'ghie', 'ghie@email.com', '$2y$10$4D8h8tO0pPuh.eidVItIBeG3UD/IOkMHERRgAB49Yvt05TRQ3Am/a', 'download.png', '::1', 'house', '01920912'),
(2, 'cyrille', 'cj@gmail.com', '$2y$10$lI3vCxOSuizBhykFffalru.5iAW10U28c8FfrUX.9qMK6Lsrj1gNW', '1701689669311.jpg', '::1', 'asdsad', 'assas'),
(3, 'cj', 'cj1@gmail.com', '$2y$10$10MLU4CHlgyEx5Nf8mFewu5I8SaSEa/X5SQz4sbY8GTG1CvUokfjC', '1701689669311.jpg', '::1', 'cj', 'cjh'),
(4, 'admin', 'admin@email.com', '$2y$10$C3002pMdRce5fgEVxoja6OTBM4hMncK16kZMrlh/NccsRKlwP5tM.', 'IMG_8665.jpg', '::1', 'asasd', '123214'),
(5, 'Apolinario', 'apo@email.com', '$2y$10$yt06AjiXBLFsH9xezV7ehe1oIVbYAwHePug3702jByLNqlPr3yMZW', '385534310_555164090133028_2510084600134479220_n.jpg', '::1', 'matrix ville sub', '092589639');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
