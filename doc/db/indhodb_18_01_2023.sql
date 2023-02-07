-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 11:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indhodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'BmFTUQA57zF832HyXbiv30VexUQ1bAG8', 1, NULL, '2019-08-04 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `id` int(11) NOT NULL,
  `profile_pic` varchar(500) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `create_at` varchar(30) DEFAULT NULL,
  `mob_number` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>is_not_deleted,1=>is_deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`id`, `profile_pic`, `name`, `email`, `password`, `create_at`, `mob_number`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, NULL, 'Rony', 'ronymia.tech@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2023-01-16', '01990572321', '2023-01-16 09:17:41', '2023-01-16 09:17:41', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fooddelivery_food_desc`
--

CREATE TABLE `fooddelivery_food_desc` (
  `id` int(11) NOT NULL,
  `ingredients_id` varchar(255) NOT NULL,
  `item_amt` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `ItemTotalPrice` varchar(50) NOT NULL,
  `set_order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fooddelivery_food_desc`
--

INSERT INTO `fooddelivery_food_desc` (`id`, `ingredients_id`, `item_amt`, `item_id`, `item_qty`, `ItemTotalPrice`, `set_order_id`, `created_at`, `updated_at`) VALUES
(1, '', '420', 17, 1, '420.00', 1, '2023-01-16 15:05:59', '2023-01-16 15:05:59'),
(2, '', '230', 19, 1, '230.00', 1, '2023-01-16 15:05:59', '2023-01-16 15:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) NOT NULL,
  `cat_icon` varchar(1000) NOT NULL,
  `cat_name` varchar(5000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>not_delete,1=>delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`id`, `cat_icon`, `cat_name`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'QXlAPPuZ6Z1673776226.png', 'Hamburger', '2023-01-15 03:50:26', '2023-01-15 03:50:26', '0'),
(2, 'gK8Y7zVacc1673777081.png', 'chicken Sandwiches', '2023-01-15 04:01:43', '2023-01-15 04:04:59', '1'),
(3, 'ZANf0fNtuV1673777121.png', 'chicken sandwiches', '2023-01-15 04:05:21', '2023-01-15 04:05:21', '0'),
(4, 'aCnYoaokEJ1673777162.png', 'Roadsides Hotdogs', '2023-01-15 04:06:02', '2023-01-15 04:06:02', '0'),
(5, 'tkquhG66L71673777212.png', 'French Fries', '2023-01-15 04:06:52', '2023-01-15 04:06:52', '0'),
(6, 'rleyBXJRdR1673777285.png', 'Green Salad', '2023-01-15 04:08:05', '2023-01-15 04:08:05', '0'),
(7, 'pAs2rkexJB1673777315.png', 'Drinkup', '2023-01-15 04:08:35', '2023-01-15 04:08:35', '0'),
(8, '5EfOD8QFLz1673777343.png', 'shakes', '2023-01-15 04:09:03', '2023-01-15 04:09:03', '0'),
(9, 'a3vWjTx6cp1673778122.jpg', 'white apple', '2023-01-15 04:22:02', '2023-01-15 04:22:02', '0'),
(10, 'ukPcskiGqP1673778385.jpg', 'cheese Dressing', '2023-01-15 04:26:25', '2023-01-15 04:26:25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `food_city`
--

CREATE TABLE `food_city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(500) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>not_delete,1=>delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_city`
--

INSERT INTO `food_city` (`id`, `city_name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Mogadishu', '0', '2023-01-16 09:18:27', '2023-01-16 09:18:27'),
(2, 'Galkayo', '0', '2023-01-16 09:18:37', '2023-01-16 09:18:37'),
(3, 'Mogadishu Pop. 2.0 million Galkayo Baidoa Pop. 950,000 Baidoa', '1', '2023-01-16 09:18:55', '2023-01-16 09:18:58'),
(4, 'Baidoa', '0', '2023-01-16 09:19:46', '2023-01-16 09:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `food_delivery_boy`
--

CREATE TABLE `food_delivery_boy` (
  `id` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `profile` varchar(250) DEFAULT NULL,
  `attendance` varchar(10) DEFAULT 'No',
  `create_at` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `vehicle_no` varchar(30) NOT NULL,
  `vehicle_type` varchar(30) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL COMMENT '0=>not_delete,1=>delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_delivery_boy`
--

INSERT INTO `food_delivery_boy` (`id`, `action`, `profile`, `attendance`, `create_at`, `email`, `mobile_no`, `name`, `password`, `vehicle_no`, `vehicle_type`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'No', NULL, 'kamrul@gmail.com', '01990572321', 'Kamrul', '12345678', '12', 'bike', '0', '2023-01-17 23:13:59', '2023-01-17 23:13:59'),
(2, 0, NULL, 'No', NULL, 'jakir@gmail.com', '01990572321', 'Jakir', '12345678', '12', 'bike', '0', '2023-01-17 23:15:52', '2023-01-17 23:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `food_ingredients`
--

CREATE TABLE `food_ingredients` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `price` varchar(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=>paid,0=>free',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>not_delete,1=>delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_ingredients`
--

INSERT INTO `food_ingredients` (`id`, `category`, `item_name`, `menu_id`, `price`, `type`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 3, 'Kapchika Hotdogs', 2, '220.00', 1, '2023-01-15 04:17:42', '2023-01-15 05:36:08', '0'),
(2, 6, 'Salad taste', 21, '250.00', 1, '2023-01-15 04:19:37', '2023-01-15 05:34:00', '0'),
(3, 9, 'BriApple', 5, '220.00', 1, '2023-01-15 04:24:05', '2023-01-15 04:24:05', '0'),
(4, 10, 'cheeps', 6, '220.00', 1, '2023-01-15 04:27:09', '2023-01-15 04:27:09', '0'),
(5, 1, 'Basic', 1, '290.00', 1, '2023-01-15 05:31:32', '2023-01-15 05:34:16', '0'),
(6, 4, 'SAMPLE', 30, '0.00', 1, '2023-01-15 05:37:12', '2023-01-15 05:37:12', '0'),
(7, 4, 'Basic', 30, '0', 0, '2023-01-15 05:37:54', '2023-01-15 05:37:54', '0'),
(8, 3, 'Cheeps', 15, '290.00', 1, '2023-01-15 05:38:51', '2023-01-15 05:38:51', '0'),
(9, 5, 'Deshi frie', 19, '0.00', 1, '2023-01-15 05:40:15', '2023-01-15 05:40:15', '0'),
(10, 5, 'Relish', 19, '290.00', 1, '2023-01-15 05:41:27', '2023-01-15 05:41:27', '0'),
(11, 5, 'Tarqui', 19, '0', 0, '2023-01-15 05:41:55', '2023-01-15 05:41:55', '0'),
(12, 5, 'Pastry', 18, '280.00', 1, '2023-01-15 05:42:25', '2023-01-15 05:42:25', '0'),
(13, 5, 'Masala', 18, '0', 0, '2023-01-15 05:42:58', '2023-01-15 05:42:58', '0'),
(14, 6, 'Soaos', 20, '250.00', 1, '2023-01-15 05:45:01', '2023-01-15 05:45:01', '0'),
(15, 1, 'Greensalad', 1, '220.00', 1, '2023-01-15 05:46:05', '2023-01-15 05:46:05', '0'),
(16, 1, 'Chicken Salad', 1, '0', 0, '2023-01-15 05:46:35', '2023-01-15 05:46:35', '0'),
(17, 3, 'Chepsky', 15, '0', 0, '2023-01-15 05:47:23', '2023-01-15 05:47:23', '0'),
(18, 3, 'Garlis', 16, '0', 0, '2023-01-15 05:47:52', '2023-01-15 05:47:52', '0'),
(19, 3, 'Chicks', 16, '220.00', 1, '2023-01-15 05:48:21', '2023-01-15 05:48:21', '0'),
(20, 3, 'Mashroom chicks', 26, '220.00', 1, '2023-01-15 05:48:52', '2023-01-15 05:48:52', '0'),
(21, 3, 'Mashroom', 26, '0', 0, '2023-01-15 05:49:08', '2023-01-15 05:49:08', '0'),
(22, 3, 'Mutton pastory', 28, '230.00', 1, '2023-01-15 05:50:06', '2023-01-15 05:50:06', '0'),
(23, 3, 'Garlic', 28, '0', 0, '2023-01-15 05:50:28', '2023-01-15 05:50:28', '0'),
(24, 4, 'Hotysoas', 2, '230.00', 1, '2023-01-15 05:51:05', '2023-01-15 05:51:05', '0'),
(25, 4, 'Speik', 29, '0', 0, '2023-01-15 05:51:25', '2023-01-15 05:51:25', '0'),
(26, 4, 'Rodisi', 2, '0', 0, '2023-01-15 05:51:48', '2023-01-15 05:51:48', '0'),
(27, 4, 'Mullus', 17, '290.00', 1, '2023-01-15 05:52:18', '2023-01-15 05:52:18', '0'),
(28, 4, 'Mulus', 17, '0', 0, '2023-01-15 05:52:42', '2023-01-15 05:52:42', '0'),
(29, 4, 'Hosfar', 17, '0', 0, '2023-01-15 05:53:09', '2023-01-15 05:53:09', '0'),
(30, 4, 'Speik', 29, '0', 0, '2023-01-15 05:53:37', '2023-01-15 05:53:37', '0'),
(31, 4, 'Speik', 29, '230.00', 1, '2023-01-15 05:54:01', '2023-01-15 05:54:01', '0'),
(32, 6, 'Salasi', 21, '0', 0, '2023-01-15 05:54:54', '2023-01-15 05:54:54', '0'),
(33, 6, 'Garlic mixed', 20, '230.00', 1, '2023-01-15 05:55:30', '2023-01-15 05:55:30', '0'),
(34, 6, 'Mixed', 20, '0', 0, '2023-01-15 05:55:49', '2023-01-15 05:55:49', '0'),
(35, 7, 'Lemon PAPS', 3, '0', 0, '2023-01-15 05:56:24', '2023-01-15 05:56:24', '0');

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `description` text NOT NULL,
  `menu_image` varchar(70) NOT NULL,
  `menu_name` varchar(70) NOT NULL,
  `price` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>not_delete,1=>delete',
  `facebook_share` varchar(500) DEFAULT NULL,
  `twitter_share` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`id`, `category`, `description`, `menu_image`, `menu_name`, `price`, `created_at`, `updated_at`, `is_deleted`, `facebook_share`, `twitter_share`) VALUES
(1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the', 'EBA6QZ28ly1673779561.jpg', 'Salad', '250.00', '2023-01-15 04:09:49', '2023-01-16 09:15:11', '0', NULL, NULL),
(2, 4, 'Its item tasty', 'djkKLA72xo1673780016.png', 'Hotdogs', '280.00', '2023-01-15 04:10:40', '2023-01-15 04:53:36', '0', NULL, NULL),
(3, 7, 'feel better', 'dSlZFoJ5ZW1673777700.png', 'Lemon Juice', '120.00', '2023-01-15 04:15:00', '2023-01-15 04:15:00', '0', NULL, NULL),
(4, 1, 'This is evergrow', 'DZ0XhXemm91673777827.jpg', 'Hotdogs', '220.00', '2023-01-15 04:17:07', '2023-01-15 04:42:05', '0', NULL, NULL),
(5, 9, 'its good', 'QditRx0dOc1673778158.jpg', 'apple', '340.00', '2023-01-15 04:22:38', '2023-01-15 04:22:38', '0', NULL, NULL),
(6, 10, 'its good', 'IOBNA3jbVp1673778411.jpg', 'cheese', '150.00', '2023-01-15 04:26:51', '2023-01-15 04:26:51', '0', NULL, NULL),
(7, 1, 'its better', 'CQB2nBVZv41673779598.jpg', 'Rosela', '220.00', '2023-01-15 04:46:38', '2023-01-15 04:47:00', '0', NULL, NULL),
(8, 1, 'Its totally Goods', 'un1ok663Mv1673779688.jpg', 'king Burger', '250.00', '2023-01-15 04:48:08', '2023-01-15 04:48:08', '0', NULL, NULL),
(9, 1, 'its look gorgeous', 'QjOhC5GWz31673779778.jpg', 'KingFish burger', '230.00', '2023-01-15 04:49:09', '2023-01-15 04:49:38', '0', NULL, NULL),
(10, 1, 'SWEETY AND TASTY', 'kyNDm0KhWi1673779849.jpg', 'Argi Burger', '250.00', '2023-01-15 04:50:49', '2023-01-15 04:50:49', '0', NULL, NULL),
(11, 1, 'its good something tasty', 'zzHt1iossN1673779897.png', 'KIPROSAKY', '260.00', '2023-01-15 04:51:37', '2023-01-15 04:51:37', '0', NULL, NULL),
(12, 1, 'good', 'Mkg57jYnIC1673779962.jpg', 'Fish Burger', '210.00', '2023-01-15 04:52:42', '2023-01-15 04:52:42', '0', NULL, NULL),
(13, 1, 'Vegeterian foods', 'bsP6o8iaoq1673780003.jpg', 'VEGETABLE BURGER', '250.00', '2023-01-15 04:53:23', '2023-01-15 04:53:23', '0', NULL, NULL),
(14, 1, 'Tasty', 'f18v9ZHfS51673780063.jpg', 'Sweet Burger', '280.00', '2023-01-15 04:54:23', '2023-01-15 04:54:23', '0', NULL, NULL),
(15, 3, 'Big mutton', 'v9WAN3OEZM1673780150.jpg', 'Deshi chickens', '120.00', '2023-01-15 04:55:50', '2023-01-15 04:55:50', '0', NULL, NULL),
(16, 3, 'tasty', 'OGvq0QChEv1673780196.jpg', 'Garlic Nun', '230.00', '2023-01-15 04:56:36', '2023-01-15 04:56:36', '0', NULL, NULL),
(17, 4, 'crypasky', 'nB24C3pCnf1673780292.jpg', 'Mullus Hotdogs', '420.00', '2023-01-15 04:58:12', '2023-01-15 04:58:12', '0', NULL, NULL),
(18, 5, 'its good', 'Y08RAXyfAh1673780337.jpg', 'pastori French frie', '256.00', '2023-01-15 04:58:57', '2023-01-15 04:58:57', '0', NULL, NULL),
(19, 5, 'better good', 'SzsEncUL7v1673780401.png', 'Thir French frie', '230.00', '2023-01-15 05:00:01', '2023-01-15 05:00:01', '0', NULL, NULL),
(20, 6, 'good', 'MWgmdiK8tj1673780470.jpg', 'Garlic salad', '560.00', '2023-01-15 05:01:10', '2023-01-15 05:01:10', '0', NULL, NULL),
(21, 6, 'Mixture', '0neK6A9Cro1673780520.jpg', 'Mixed Salad', '270.00', '2023-01-15 05:02:00', '2023-01-15 05:02:00', '0', NULL, NULL),
(22, 7, 'Refreshness every moment', 'ifiaMQg16O1673780592.jpg', 'Fruit Juice', '180.00', '2023-01-15 05:03:12', '2023-01-15 05:03:12', '0', NULL, NULL),
(23, 8, 'Effect refresh for human body', 'MxGFp7O4J31673780678.jpg', 'Fruit shakes', '190.00', '2023-01-15 05:04:38', '2023-01-15 05:04:38', '0', NULL, NULL),
(24, 8, 'Evergreen item', 'zxv2Ds8gTa1673780770.jpg', 'Cool shakes', '170.00', '2023-01-15 05:06:10', '2023-01-15 05:06:10', '0', NULL, NULL),
(25, 9, 'Tasty Fruit', '19EbT6c0Je1673780885.jpg', 'Green Apple', '200.00', '2023-01-15 05:08:05', '2023-01-15 05:08:05', '0', NULL, NULL),
(26, 3, 'Tasty', 'bseUVxNDtU1673781097.png', 'Mashroom', '260.00', '2023-01-15 05:10:52', '2023-01-15 05:11:37', '0', NULL, NULL),
(27, 8, 'best productivity', 'Fwez5XQwlz1673781814.jpg', 'White shakes', '230.00', '2023-01-15 05:23:34', '2023-01-15 05:23:34', '0', NULL, NULL),
(28, 3, 'Tasty and sweety', 'HnP1ai9dTr1673782013.jpg', 'Mutton servey', '180.00', '2023-01-15 05:26:53', '2023-01-15 05:26:53', '0', NULL, NULL),
(29, 4, 'Best', 'MUpAxs9Hg21673782080.jpg', 'speik Hotdogs', '130.00', '2023-01-15 05:28:00', '2023-01-15 05:28:00', '0', NULL, NULL),
(30, 4, 'Reasonable price', 'BmgeVgRJ641673782167.jpg', 'Mirchik Hotdogs', '180.00', '2023-01-15 05:29:27', '2023-01-15 05:29:27', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_notification`
--

CREATE TABLE `food_notification` (
  `id` int(11) NOT NULL,
  `android_key` varchar(255) NOT NULL,
  `ios_key` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_notification`
--

INSERT INTO `food_notification` (`id`, `android_key`, `ios_key`, `created_at`, `updated_at`) VALUES
(1, 'AAAAzfOzFf4:APA91bGDYxjaXRFePTRG0AnHW624nG7xaRzgtQWdTf-a_yGw3NZ9X0y8PoInegJUxxxFgTXta_VpbgqWw4yoHaOLsYR_u6xGvptgwYhiBuxqpx4s0XsLVn-AwQKo1wq8CX-Or6bNiIcJ', '1234546', '2019-08-30 16:47:57', '2020-03-11 11:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `food_order_response`
--

CREATE TABLE `food_order_response` (
  `id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_order_response`
--

INSERT INTO `food_order_response` (`id`, `desc`, `order_id`, `created_at`, `updated_at`) VALUES
(1, '{\"Order\":[{\"ItemId\":17,\"ItemName\":\"Mullus Hotdogs\",\"ItemQty\":\"1\",\"ItemAmt\":\"420\",\"ItemTotalPrice\":\"420.00\",\"Ingredients\":[]},{\"ItemId\":19,\"ItemName\":\"Thir French frie\",\"ItemQty\":\"1\",\"ItemAmt\":\"230\",\"ItemTotalPrice\":\"230.00\",\"Ingredients\":[]}]}', 1, '2023-01-16 15:05:59', '2023-01-16 15:05:59'),
(2, '{\"Order\":[]}', 2, '2023-01-18 04:41:50', '2023-01-18 04:41:50'),
(3, '{\"Order\":[]}', 3, '2023-01-18 04:41:50', '2023-01-18 04:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `food_send_notification`
--

CREATE TABLE `food_send_notification` (
  `id` int(11) NOT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_tokandata`
--

CREATE TABLE `food_tokandata` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `delivery_boyid` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_user`
--

CREATE TABLE `food_user` (
  `userid` int(11) NOT NULL,
  `currency` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(150) DEFAULT NULL,
  `page_desc` text DEFAULT NULL,
  `page_img` varchar(100) DEFAULT NULL,
  `page_name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `upated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `page_desc`, `page_img`, `page_name`, `created_at`, `upated_at`, `created_by`, `updated_by`) VALUES
(1, 'about us', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown', 'about.jpg', 'about-us', '2023-01-16 11:28:52', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(250) DEFAULT NULL,
  `charges` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, '8XE5XikWFBYIKL1bQZcKUsbpzk3XqpxH', '2023-01-15 00:56:22', '2023-01-15 00:56:22'),
(2, 1, 'rJEgR8sqQEQLfbYhismcAG2cxadU7s3m', '2023-01-15 03:48:22', '2023-01-15 03:48:22'),
(3, 1, 'jng0w3s9PtRbNXqIh7MX6jVhXmSNqtAq', '2023-01-15 06:39:55', '2023-01-15 06:39:55'),
(4, 1, 'zfOarhK7Z7u5kTbNlfWipC00wD2HIq8n', '2023-01-16 09:14:45', '2023-01-16 09:14:45'),
(5, 1, 'vTxGbIMfHIwQ3xBT0oVbx3SqNyRmlbIs', '2023-01-16 22:37:06', '2023-01-16 22:37:06'),
(6, 1, 'r1Y9jx9roy9KJAG0dJL8rFGFnFfLIdTq', '2023-01-17 21:32:48', '2023-01-17 21:32:48'),
(7, 1, 'fTA8TRNAPE8TUgMwDg7wGrMp0W5UZZxc', '2023-01-18 04:26:31', '2023-01-18 04:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `stripe_key` varchar(250) DEFAULT NULL,
  `stripe_secret` varchar(250) DEFAULT NULL,
  `paypal_client_id` varchar(250) DEFAULT NULL,
  `paypal_client_secret` varchar(250) DEFAULT NULL,
  `paypal_mode` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0=>sandbox,1=>live',
  `order_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>offline,1=>online',
  `app_store_url` varchar(250) DEFAULT NULL,
  `play_store_url` varchar(250) DEFAULT NULL,
  `delivery_charges` varchar(250) DEFAULT NULL,
  `facebook_id` varchar(250) DEFAULT NULL,
  `twitter_id` varchar(250) DEFAULT NULL,
  `linkedin_id` varchar(250) DEFAULT NULL,
  `google_plus_id` varchar(250) DEFAULT NULL,
  `whatsapp` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `timezone` varchar(250) DEFAULT NULL,
  `stripe_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>no,1=>yes',
  `paypal_active` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>no,1=>yes',
  `is_web` enum('0','1','2') DEFAULT '1' COMMENT '0=>app,1=>web,2=>web+admin',
  `logo` varchar(100) DEFAULT NULL,
  `main_banner` varchar(100) DEFAULT NULL,
  `second_sec_img` varchar(100) DEFAULT NULL,
  `secong_icon_img` varchar(100) DEFAULT NULL,
  `footer_up_img` varchar(100) DEFAULT NULL,
  `footer_img` varchar(100) DEFAULT NULL,
  `web_color` varchar(250) DEFAULT NULL,
  `have_playstore` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>no,1=>yes',
  `have_appstore` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>no,1=>yes',
  `instragram_id` varchar(100) DEFAULT NULL,
  `tiktok_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `stripe_key`, `stripe_secret`, `paypal_client_id`, `paypal_client_secret`, `paypal_mode`, `order_status`, `app_store_url`, `play_store_url`, `delivery_charges`, `facebook_id`, `twitter_id`, `linkedin_id`, `google_plus_id`, `whatsapp`, `address`, `email`, `phone`, `created_at`, `updated_at`, `timezone`, `stripe_active`, `paypal_active`, `is_web`, `logo`, `main_banner`, `second_sec_img`, `secong_icon_img`, `footer_up_img`, `footer_img`, `web_color`, `have_playstore`, `have_appstore`, `instragram_id`, `tiktok_id`) VALUES
(1, 'pk_test_yFUNiYsEESF7QBY0jcZoYK9j00yHumvXho', 'sk_test_H4cvZ6S2eX8vFFDdZCk4oNvt00RMnplVS4', 'AaT793pjARjOWkXpWaOd45lGARUMRN9pr8seE5c-AJpQBSJS1H6Z44rUPSEWYPpO7J7iF1Hu0N-MqnPx', 'ECRNnl-2t-Rli34RbdQiMHOHkyzwomvbo8mdj3kGrTL8N5lvlfPjSq7DfuArz4zksW0T9TxB5ifjY4HC', '0', '1', 'dgfdg', 'gdfg', '10', 'fdgfd', 'fdgf', 'fdgfd', 'https://www.infosys.com/about/alliances/Pages/google.aspxfdgfdgf', 'fdgfd', 'Somalia', 'info@indhosnacks.com', '527799', '2019-09-09 16:10:55', '2023-01-18 04:33:30', '326', '1', '1', '2', 'SUzyy140VK1674012817.png', 'main_banner.png', 'sec-img.png', 'sec-icon.png', 'footer-up.png', 'footer.png', '#af191a', '1', '1', 'asdf', 'asfd');

-- --------------------------------------------------------

--
-- Table structure for table `set_order_detail`
--

CREATE TABLE `set_order_detail` (
  `id` int(11) NOT NULL,
  `assign_date_time` varchar(30) DEFAULT NULL,
  `assign_status` varchar(225) DEFAULT NULL,
  `delivered_date_time` varchar(30) DEFAULT NULL,
  `delivered_status` varchar(11) DEFAULT NULL,
  `dispatched_date_time` varchar(30) DEFAULT NULL,
  `dispatched_status` varchar(11) DEFAULT NULL,
  `is_assigned` varchar(11) DEFAULT NULL,
  `order_placed_date` varchar(30) DEFAULT NULL,
  `cancel_date_time` varchar(50) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `preparing_date_time` varchar(30) DEFAULT NULL,
  `preparing_status` varchar(225) DEFAULT NULL,
  `total_price` varchar(225) DEFAULT NULL,
  `latlong` varchar(155) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone_no` varchar(250) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `payment_type` varchar(225) DEFAULT NULL,
  `notes` varchar(225) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `notify` int(11) DEFAULT NULL,
  `shipping_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=>home delivery,2=>local pickup',
  `subtotal` double DEFAULT NULL,
  `delivery_charges` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `charges_id` varchar(250) DEFAULT NULL,
  `pay_pal_paymentId` varchar(250) DEFAULT NULL,
  `pay_pal_token` varchar(250) DEFAULT NULL,
  `pay_pal_PayerID` varchar(250) DEFAULT NULL,
  `delivery_mode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>home delivery,1=>pickup',
  `pickup_order_time` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `set_order_detail`
--

INSERT INTO `set_order_detail` (`id`, `assign_date_time`, `assign_status`, `delivered_date_time`, `delivered_status`, `dispatched_date_time`, `dispatched_status`, `is_assigned`, `order_placed_date`, `cancel_date_time`, `order_status`, `preparing_date_time`, `preparing_status`, `total_price`, `latlong`, `user_id`, `phone_no`, `name`, `address`, `email`, `payment_type`, `notes`, `city`, `notify`, `shipping_type`, `subtotal`, `delivery_charges`, `created_at`, `updated_at`, `charges_id`, `pay_pal_paymentId`, `pay_pal_token`, `pay_pal_PayerID`, `delivery_mode`, `pickup_order_time`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16-01-2023 21:05', NULL, 0, NULL, NULL, '660.00', '21.229043149741543,72.89469169046019', 1, '01990572321', 'Rony', '', 'ronymia.tech@gmail.com', 'Cash', '', 'Mogadishu', 1, '', 650, '10.00', '2023-01-16 15:05:59', '2023-01-16 15:05:59', NULL, NULL, NULL, NULL, '0', NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18-01-2023 10:41', NULL, 0, NULL, NULL, '10.00', '21.2284231,72.896816', 1, '01990572321', 'Rony', '7, Varachha Main Rd, Mani Nagar Society, Nana Varachha, Surat, Gujarat 395006, India', 'ronymia.tech@gmail.com', 'Cash', '', 'Galkayo', 1, '', 0, '10.00', '2023-01-18 04:41:50', '2023-01-18 04:41:50', NULL, NULL, NULL, NULL, '0', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18-01-2023 10:41', NULL, 1, '18-01-2023 10:43', '1', '10.00', '21.2284231,72.896816', 1, '01990572321', 'Rony', '7, Varachha Main Rd, Mani Nagar Society, Nana Varachha, Surat, Gujarat 395006, India', 'ronymia.tech@gmail.com', 'Cash', '', 'Galkayo', 1, '', 0, '10.00', '2023-01-18 04:41:50', '2023-01-18 04:43:18', NULL, NULL, NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2023-01-15 00:54:47', '2023-01-15 00:54:47'),
(2, NULL, 'ip', '::1', '2023-01-15 00:54:47', '2023-01-15 00:54:47'),
(3, 1, 'user', NULL, '2023-01-15 00:54:47', '2023-01-15 00:54:47'),
(4, NULL, 'global', NULL, '2023-01-15 00:55:52', '2023-01-15 00:55:52'),
(5, NULL, 'ip', '::1', '2023-01-15 00:55:52', '2023-01-15 00:55:52'),
(6, 1, 'user', NULL, '2023-01-15 00:55:52', '2023-01-15 00:55:52'),
(7, NULL, 'global', NULL, '2023-01-15 00:55:57', '2023-01-15 00:55:57'),
(8, NULL, 'ip', '::1', '2023-01-15 00:55:57', '2023-01-15 00:55:57'),
(9, 1, 'user', NULL, '2023-01-15 00:55:57', '2023-01-15 00:55:57'),
(10, NULL, 'global', NULL, '2023-01-15 03:45:09', '2023-01-15 03:45:09'),
(11, NULL, 'ip', '::1', '2023-01-15 03:45:09', '2023-01-15 03:45:09'),
(12, 1, 'user', NULL, '2023-01-15 03:45:09', '2023-01-15 03:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_demo` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>demo,1=>live',
  `profile_pic` varchar(250) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `permissions` text DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `user_type` enum('1','2') NOT NULL DEFAULT '2',
  `currency` varchar(250) DEFAULT NULL,
  `user_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `is_demo`, `profile_pic`, `password`, `permissions`, `last_login`, `name`, `created_at`, `updated_at`, `mobile_number`, `user_type`, `currency`, `user_name`) VALUES
(1, 'admin@gmail.com', '1', 'admin.jpg', '$2y$10$rwN4cgHaDixDZ..bUOoxXOabOfF/c2qVuXd.cM3TI8T7v4DipD5qS', NULL, '2023-01-18 04:26:31', 'Admin', NULL, '2023-01-18 04:26:31', '8980083337', '1', 'USD - $', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fooddelivery_food_desc`
--
ALTER TABLE `fooddelivery_food_desc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_city`
--
ALTER TABLE `food_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_delivery_boy`
--
ALTER TABLE `food_delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_notification`
--
ALTER TABLE `food_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_order_response`
--
ALTER TABLE `food_order_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_send_notification`
--
ALTER TABLE `food_send_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_tokandata`
--
ALTER TABLE `food_tokandata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_user`
--
ALTER TABLE `food_user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_order_detail`
--
ALTER TABLE `set_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fooddelivery_food_desc`
--
ALTER TABLE `fooddelivery_food_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food_city`
--
ALTER TABLE `food_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_delivery_boy`
--
ALTER TABLE `food_delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `food_notification`
--
ALTER TABLE `food_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_order_response`
--
ALTER TABLE `food_order_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_send_notification`
--
ALTER TABLE `food_send_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_tokandata`
--
ALTER TABLE `food_tokandata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_user`
--
ALTER TABLE `food_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `set_order_detail`
--
ALTER TABLE `set_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
