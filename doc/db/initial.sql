-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 12:20 PM
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
  `have_appstore` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=>no,1=>yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `stripe_key`, `stripe_secret`, `paypal_client_id`, `paypal_client_secret`, `paypal_mode`, `order_status`, `app_store_url`, `play_store_url`, `delivery_charges`, `facebook_id`, `twitter_id`, `linkedin_id`, `google_plus_id`, `whatsapp`, `address`, `email`, `phone`, `created_at`, `updated_at`, `timezone`, `stripe_active`, `paypal_active`, `is_web`, `logo`, `main_banner`, `second_sec_img`, `secong_icon_img`, `footer_up_img`, `footer_img`, `web_color`, `have_playstore`, `have_appstore`) VALUES
(1, 'pk_test_yFUNiYsEESF7QBY0jcZoYK9j00yHumvXho', 'sk_test_H4cvZ6S2eX8vFFDdZCk4oNvt00RMnplVS4', 'AaT793pjARjOWkXpWaOd45lGARUMRN9pr8seE5c-AJpQBSJS1H6Z44rUPSEWYPpO7J7iF1Hu0N-MqnPx', 'ECRNnl-2t-Rli34RbdQiMHOHkyzwomvbo8mdj3kGrTL8N5lvlfPjSq7DfuArz4zksW0T9TxB5ifjY4HC', '0', '1', 'dgfdg', 'gdfg', '10', 'fdgfd', 'fdgf', 'fdgfd', 'https://www.infosys.com/about/alliances/Pages/google.aspxfdgfdgf', 'fdgfd', 'No 40 Baria Sreet 133/2, New York, USA.', 'info@restaurant.com', '+234-25415-5417', '2019-09-09 16:10:55', '2020-09-04 07:17:46', '326', '1', '1', '2', 'logo.jpg', 'main_banner.png', 'sec-img.png', 'sec-icon.png', 'footer-up.png', 'footer.png', '#dc3545', '1', '1');

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
(1, 'admin@gmail.com', '1', 'admin.jpg', '$2y$10$1oqNKAooPEYGmM7yAWrqkekRj3HQCP3m3xS0Opi4UcjmvH5ef95GG', NULL, '2020-09-04 15:48:46', 'Admin', NULL, '2020-09-04 15:48:46', '8980083337', '1', 'EUR - €', 'Admin');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fooddelivery_food_desc`
--
ALTER TABLE `fooddelivery_food_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_city`
--
ALTER TABLE `food_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_delivery_boy`
--
ALTER TABLE `food_delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_ingredients`
--
ALTER TABLE `food_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_notification`
--
ALTER TABLE `food_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food_order_response`
--
ALTER TABLE `food_order_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
