-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 03, 2024 at 07:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinemarketingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aff_customers`
--

CREATE TABLE `aff_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `NIC` varchar(255) DEFAULT NULL,
  `contactno` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aff_customers`
--

INSERT INTO `aff_customers` (`id`, `name`, `address`, `district`, `DOB`, `gender`, `NIC`, `contactno`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manushi Weerasinghe', 'No.124, \"Sisilasa\"', 'Kurunegala', '2000-08-19', 'female', '200070203633', '0716280393', 'manuw2819@gmail.com', '$2y$12$Gf8hS4dy4gEAifJ.g6Jzru92UHWKII6y/JnpZki85KoPqM.qSOZp6', 'approved', '2024-09-25 04:55:25', '2024-09-25 04:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_category`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dress', '1727847980_3b3d90c124b6068924150ab38492b4c1.jpg_720x720q80.jpg', '2024-09-22 22:02:53', '2024-10-02 00:16:20'),
(2, 'Baby Things', '1727062379_baby.png', '2024-09-22 22:02:59', '2024-09-22 22:02:59'),
(3, 'Cosmetics', '1727062385_cosmetics.png', '2024-09-22 22:03:05', '2024-09-22 22:03:05'),
(4, 'Fashion', '1727062392_fashion.png', '2024-09-22 22:03:12', '2024-09-22 22:03:12'),
(5, 'Food', '1727062399_food.png', '2024-09-22 22:03:19', '2024-09-22 22:03:19'),
(6, 'Gift Items', '1727062407_gift.png', '2024-09-22 22:03:27', '2024-09-22 22:03:27'),
(7, 'House Hold Goods', '1727062415_house.png', '2024-09-22 22:03:35', '2024-09-22 22:03:35'),
(8, 'Jewellary', '1727062423_jewellary.png', '2024-09-22 22:03:43', '2024-09-22 22:03:43'),
(9, 'Phone Accessories', '1727062432_phone.png', '2024-09-22 22:03:52', '2024-09-22 22:03:52'),
(10, 'School Equipment', '1727062440_school.png', '2024-09-22 22:04:00', '2024-09-22 22:04:00'),
(11, 'Sports', '1727062447_sports.png', '2024-09-22 22:04:07', '2024-09-22 22:04:41'),
(12, 'Toys', '1727062467_toy.png', '2024-09-22 22:04:27', '2024-09-22 22:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_lname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `total_cost` decimal(15,2) NOT NULL,
  `status` enum('Pending','Paid','In Progress','Shipped','Delivered','Cancelled','Returned') NOT NULL DEFAULT 'Pending',
  `discount` decimal(15,2) DEFAULT NULL,
  `vat` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `order_code`, `user_id`, `customer_fname`, `customer_lname`, `phone`, `email`, `company_name`, `address`, `apartment`, `city`, `postal_code`, `date`, `total_cost`, `status`, `discount`, `vat`, `created_at`, `updated_at`) VALUES
(23, 'ORD-d3702419', 1, 'Manushi', 'Weerasinghe', '0716280393', 'manuw2819@gmail.com', NULL, 'No.124', '\"Sisilasa\"', 'Ridigama, Kurunegala', '60040', '2024-10-01', 2750.00, 'Shipped', 0.00, 0.00, '2024-10-01 04:09:34', '2024-10-02 01:46:16'),
(24, 'ORD-5e61ee5a', 1, 'Manushi', 'Weerasinghe', '0716280393', 'manuw2819@gmail.com', NULL, 'No.124', '\"Sisilasa\"', 'Ridigama, Kurunegala', '60040', '2024-10-02', 8250.00, 'Pending', 0.00, 0.00, '2024-10-02 04:25:17', '2024-10-02 04:25:17'),
(25, 'ORD-a02ca652', 1, 'Manushi', 'Weerasinghe', '0716280393', 'manuw2819@gmail.com', NULL, 'No.124', '\"Sisilasa\"', 'Ridigama, Kurunegala', '60040', '2024-10-02', 10349.99, 'Pending', 0.00, 0.00, '2024-10-02 04:26:13', '2024-10-02 04:26:13'),
(26, 'ORD-bb4ff6f9', 1, 'Manushi', 'Weerasinghe', '0716280393', 'manuw2819@gmail.com', NULL, 'No.124', '\"Sisilasa\"', 'Ridigama, Kurunegala', '60040', '2024-10-02', 3450.00, 'Pending', 0.00, 0.00, '2024-10-02 05:16:37', '2024-10-02 05:16:37'),
(27, 'ORD-57769c13', 1, 'Manushi', 'Weerasinghe', '0716280393', 'manuw2819@gmail.com', NULL, 'No.124', '\"Sisilasa\"', 'Ridigama, Kurunegala', '60040', '2024-10-02', 1850.00, 'Pending', 0.00, 0.00, '2024-10-02 05:22:51', '2024-10-02 05:22:51'),
(29, 'ORD-43779085', 1, 'Manushi', 'Weerasinghe', '0716280393', 'manuw2819@gmail.com', NULL, 'No.124', '\"Sisilasa\"', 'Ridigama, Kurunegala', '60040', '2024-10-03', 2902.00, 'Delivered', 0.00, 0.00, '2024-10-02 23:57:49', '2024-10-03 00:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_items`
--

CREATE TABLE `customer_order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `cost` decimal(15,2) NOT NULL,
  `reviewed` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_order_items`
--

INSERT INTO `customer_order_items` (`id`, `order_code`, `product_id`, `quantity`, `size`, `color`, `date`, `cost`, `reviewed`, `created_at`, `updated_at`) VALUES
(26, 'ORD-d3702419', 'PRODUCT-NOMJYP', 1, 'M', 'Violet', '2024-10-01', 2500.00, 'yes', '2024-10-01 04:09:34', '2024-10-02 00:53:16'),
(27, 'ORD-5e61ee5a', 'PRODUCT-XRKDVR', 1, 'S', 'Pink', '2024-10-02', 2600.00, 'no', '2024-10-02 04:25:17', '2024-10-02 04:25:17'),
(28, 'ORD-5e61ee5a', 'PRODUCT-ED2YBU', 1, NULL, NULL, '2024-10-02', 5400.00, 'no', '2024-10-02 04:25:17', '2024-10-02 04:25:17'),
(29, 'ORD-a02ca652', 'PRODUCT-NOMJYP', 1, 'S', 'Maroon', '2024-10-02', 2500.00, 'no', '2024-10-02 04:26:13', '2024-10-02 04:26:13'),
(30, 'ORD-a02ca652', 'PRODUCT-RFKSUV', 1, 'M', NULL, '2024-10-02', 4500.00, 'no', '2024-10-02 04:26:13', '2024-10-02 04:26:13'),
(31, 'ORD-a02ca652', 'PRODUCT-QH8IU8', 1, NULL, NULL, '2024-10-02', 1500.00, 'no', '2024-10-02 04:26:13', '2024-10-02 04:26:13'),
(32, 'ORD-a02ca652', 'PRODUCT-WXWVEG', 1, NULL, NULL, '2024-10-02', 1599.99, 'no', '2024-10-02 04:26:13', '2024-10-02 04:26:13'),
(33, 'ORD-bb4ff6f9', 'PRODUCT-CTOUNS', 2, NULL, NULL, '2024-10-02', 1600.00, 'no', '2024-10-02 05:16:37', '2024-10-02 05:16:37'),
(34, 'ORD-57769c13', 'PRODUCT-CTOUNS', 1, NULL, NULL, '2024-10-02', 1600.00, 'no', '2024-10-02 05:22:51', '2024-10-02 05:22:51'),
(37, 'ORD-43779085', 'PRODUCT-XRKDVR', 1, 'S', 'Purple', '2024-10-03', 2600.00, 'yes', '2024-10-02 23:57:49', '2024-10-03 00:17:15'),
(38, 'ORD-43779085', 'PRODUCT-E9LOUH', 1, NULL, '#26c07d', '2024-10-03', 52.00, 'yes', '2024-10-02 23:57:49', '2024-10-03 00:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '0001_01_01_000000_create_users_table', 1),
(15, '0001_01_01_000001_create_cache_table', 1),
(16, '0001_01_01_000002_create_jobs_table', 1),
(17, '2024_08_08_102036_create_customer_order_table', 1),
(18, '2024_08_08_102906_create_customer_order_items_table', 1),
(19, '2024_08_15_040608_create_products_table', 1),
(20, '2024_08_22_062004_create_aff_customer_table', 1),
(21, '2024_09_04_051949_create_product_images_table', 1),
(22, '2024_09_05_095923_create_subcategories_table', 1),
(23, '2024_09_05_100000_create_sub_subcategories_table', 1),
(24, '2024_09_05_100616_create_categories_table', 1),
(25, '2024_09_09_045718_create_cart_items_table', 1),
(26, '2024_09_13_053100_create_variations_table', 1),
(27, '2024_09_23_093128_create_system_users_table', 2),
(28, '2024_09_23_054125_add_birthday_to_users_table', 3),
(29, '2024_09_23_055048_add_gender_to_users_table', 3),
(42, '2024_09_25_082015_create_reviews_table', 4),
(43, '2024_09_27_034534_create_review_media_table', 4),
(44, '2024_09_30_050222_create_special_offers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_category` varchar(255) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `sub_subcategory` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `normal_price` decimal(8,2) NOT NULL,
  `is_affiliate` tinyint(1) NOT NULL DEFAULT 0,
  `affiliate_price` decimal(8,2) DEFAULT NULL,
  `commission_percentage` decimal(5,2) DEFAULT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_description`, `product_category`, `subcategory`, `sub_subcategory`, `quantity`, `tags`, `normal_price`, `is_affiliate`, `affiliate_price`, `commission_percentage`, `total_price`, `created_at`, `updated_at`) VALUES
(2, 'PRODUCT-XRKDVR', 'Yara Floral Printed Black Dress', '<p>Browse our collection of popular makeup, skin care and bath products, all from your favorite brands.</p>', 'Dress', '', '', 14, NULL, 2600.00, 1, 3100.00, 10.00, 3410.00, '2024-09-24 22:03:00', '2024-10-02 23:57:49'),
(3, 'PRODUCT-CBRPQ4', 'Sara Off White Strape Dress', '<p>Browse our collection of popular makeup, skin care and bath products, all from your favorite brands.</p>', 'Dress', '', '', 18, NULL, 1500.00, 0, NULL, NULL, 1500.00, '2024-09-25 00:10:18', '2024-09-30 04:23:34'),
(4, 'PRODUCT-ED2YBU', 'Dress 01', '<p>Browse our collection of popular makeup, skin care and bath products, all from your favorite brands.</p>', 'Dress', '', '', 9, NULL, 5400.00, 0, NULL, NULL, 5400.00, '2024-09-27 00:18:10', '2024-10-02 04:25:17'),
(5, 'PRODUCT-CTOUNS', 'Baby Toys', '<p>Browse our collection of popular makeup, skin care and bath products, all from your favorite brands.</p>', 'Baby Things', '', '', 9, NULL, 1600.00, 0, NULL, NULL, 1600.00, '2024-09-30 02:36:15', '2024-10-02 05:22:51'),
(6, 'PRODUCT-RFKSUV', 'Sara Off White Strape Dress', '<p>Browse our collection of popular makeup, skin care and bath products, all from your favorite brands.</p>', 'Dress', '', '', 9, NULL, 4500.00, 0, NULL, NULL, 4500.00, '2024-09-30 03:37:16', '2024-10-02 04:26:13'),
(12, 'PRODUCT-NOMJYP', 'Sara Off Red Strape Dressa', '<p><span style=\"color: rgb(0, 0, 0);\">Browse our collection of popular makeup</span></p>', 'Dress', 'Ladies', '', 37, 'dress,fashion,white', 2500.00, 1, 3200.00, 9.00, 3488.00, '2024-10-01 03:09:57', '2024-10-02 04:26:13'),
(13, 'PRODUCT-WXWVEG', 'Phone covers', '<p>Browse our collection of popular makeup, skin care and bath products, all from your favorite brands.</p>', 'Phone Accessories', '', '', 14, 'phone covers,phone accessories', 1599.99, 1, NULL, NULL, 1599.99, '2024-10-01 21:40:48', '2024-10-02 21:49:48'),
(30, 'PRODUCT-F1QAHK', 'd', '<p>d</p>', 'Cosmetics', '', '', NULL, '', 4.99, 0, NULL, NULL, 4.99, '2024-10-02 23:23:32', '2024-10-02 23:23:32'),
(31, 'PRODUCT-E9LOUH', 'htrsht', '<p>htrshtrsht</p>', 'Baby Things', '', '', 1, NULL, 52.00, 1, NULL, NULL, 52.00, '2024-10-02 23:24:43', '2024-10-02 23:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(4, 'PRODUCT-XRKDVR', 'product_images/1727235180_dress2.png', '2024-09-24 22:03:00', '2024-09-24 22:03:00'),
(5, 'PRODUCT-XRKDVR', 'product_images/1727235180_dress4.png', '2024-09-24 22:03:00', '2024-09-24 22:03:00'),
(6, 'PRODUCT-CBRPQ4', 'product_images/1727242818_dress3.png', '2024-09-25 00:10:18', '2024-09-25 00:10:18'),
(7, 'PRODUCT-ED2YBU', 'product_images/1727416090_dress5.jpg', '2024-09-27 00:18:10', '2024-09-27 00:18:10'),
(8, 'PRODUCT-CTOUNS', 'product_images/1727683575_baby4.jpg', '2024-09-30 02:36:15', '2024-09-30 02:36:15'),
(9, 'PRODUCT-RFKSUV', 'product_images/1727687236_dress1.png', '2024-09-30 03:37:16', '2024-09-30 03:37:16'),
(12, 'PRODUCT-NOMJYP', 'product_images/1727771997_d (2).png', '2024-10-01 03:09:57', '2024-10-01 03:09:57'),
(13, 'PRODUCT-NOMJYP', 'product_images/1727771997_d (3).png', '2024-10-01 03:09:57', '2024-10-01 03:09:57'),
(14, 'PRODUCT-NOMJYP', 'product_images/1727771997_d (1).png', '2024-10-01 03:09:57', '2024-10-01 03:09:57'),
(15, 'PRODUCT-WXWVEG', 'product_images/1727838648_ass1.jpg', '2024-10-01 21:40:49', '2024-10-01 21:40:49'),
(16, 'PRODUCT-WXWVEG', 'product_images/1727838649_ass2.jpg', '2024-10-01 21:40:49', '2024-10-01 21:40:49'),
(24, 'PRODUCT-F1QAHK', 'product_images/1727931212_aff5.png', '2024-10-02 23:23:32', '2024-10-02 23:23:32'),
(25, 'PRODUCT-E9LOUH', 'product_images/1727931283_aff6.png', '2024-10-02 23:24:43', '2024-10-02 23:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status` enum('pending','published','rejected') NOT NULL DEFAULT 'pending',
  `is_anonymous` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `order_code`, `rating`, `comment`, `status`, `is_anonymous`, `created_at`, `updated_at`) VALUES
(6, 1, 'PRODUCT-NOMJYP', 'ORD-d3702419', '4', 'Nice Dress!!', 'published', 0, '2024-10-02 00:53:16', '2024-10-02 00:53:28'),
(7, 1, 'PRODUCT-XRKDVR', 'ORD-43779085', '4', 'fes', 'pending', 1, '2024-10-03 00:17:15', '2024-10-03 00:17:15'),
(8, 1, 'PRODUCT-E9LOUH', 'ORD-43779085', '4', 'grd', 'pending', 1, '2024-10-03 00:17:56', '2024-10-03 00:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `review_media`
--

CREATE TABLE `review_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `media_type` enum('image','video') NOT NULL,
  `media_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review_media`
--

INSERT INTO `review_media` (`id`, `review_id`, `media_type`, `media_path`, `created_at`, `updated_at`) VALUES
(10, 6, 'image', 'reviews/images/vaxcsTQYUUJMoYGNECIUOJa3o7rKt59AChrqltUG.png', '2024-10-02 00:53:16', '2024-10-02 00:53:16'),
(11, 6, 'image', 'reviews/images/8hKPgYgqWBv58lldytoK3Hk2NwhDXhvw1cDVFduR.png', '2024-10-02 00:53:16', '2024-10-02 00:53:16'),
(12, 7, 'image', 'reviews/images/JlYQA91ZP0KMeBzmLVlY6L0RavChhvG7mQ3uAdOr.png', '2024-10-03 00:17:15', '2024-10-03 00:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_offers`
--

CREATE TABLE `special_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `normal_price` decimal(8,2) NOT NULL,
  `offer_rate` decimal(5,2) NOT NULL,
  `offer_price` decimal(8,2) NOT NULL,
  `month` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `special_offers`
--

INSERT INTO `special_offers` (`id`, `product_id`, `normal_price`, `offer_rate`, `offer_price`, `month`, `status`, `created_at`, `updated_at`) VALUES
(2, 'PRODUCT-XRKDVR', 2600.00, 9.00, 2366.00, '2024-10', 'active', '2024-09-30 00:46:38', '2024-09-30 04:32:58'),
(3, 'PRODUCT-ED2YBU', 5400.00, 10.00, 4860.00, '2024-10', 'active', '2024-09-30 00:46:38', '2024-09-30 01:29:16'),
(6, 'PRODUCT-CBRPQ4', 1500.00, 15.00, 1275.00, '2024-09', 'active', '2024-09-30 02:01:33', '2024-09-30 02:01:33'),
(7, 'PRODUCT-CTOUNS', 1600.00, 15.00, 1360.00, '2024-09', 'active', '2024-09-30 02:36:26', '2024-09-30 02:36:26'),
(8, 'PRODUCT-RFKSUV', 4500.00, 35.00, 2925.00, '2024-09', 'active', '2024-09-30 03:50:48', '2024-09-30 03:50:48'),
(9, 'PRODUCT-WXWVEG', 1599.99, 35.00, 1039.99, '2024-10', 'active', '2024-10-01 22:06:25', '2024-10-01 22:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory`, `created_at`, `updated_at`) VALUES
(4, 1, 'Ladies', '2024-10-02 00:16:20', '2024-10-02 00:16:20'),
(5, 1, 'Gents', '2024-10-02 00:16:20', '2024-10-02 00:16:20'),
(6, 1, 'Baby', '2024-10-02 00:16:20', '2024-10-02 00:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `sub_subcategories`
--

CREATE TABLE `sub_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `sub_subcategory` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_subcategories`
--

INSERT INTO `sub_subcategories` (`id`, `subcategory_id`, `sub_subcategory`, `created_at`, `updated_at`) VALUES
(6, 4, 'Skirt', '2024-10-02 00:16:20', '2024-10-02 00:16:20'),
(7, 4, 'Tops', '2024-10-02 00:16:20', '2024-10-02 00:16:20'),
(8, 5, 'Trouser', '2024-10-02 00:16:20', '2024-10-02 00:16:20'),
(9, 5, 'T shirt', '2024-10-02 00:16:20', '2024-10-02 00:16:20'),
(10, 6, 'Night Kit', '2024-10-02 00:16:20', '2024-10-02 00:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`id`, `name`, `email`, `contact`, `password`, `role`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Manushi Weerasinghe', 'manuw2819@gmail.com', '0716280393', '$2y$12$hOstMDthin1hQrRSzqK6fOeAODmKdff6AxU3AquFr0iKsNvELYjhi', 'admin', 'user.png', 0, '2024-10-02 02:40:21', '2024-10-02 03:34:50'),
(4, 'Ruvidi Weerasinghe', 'manuww2819@gmail.com', '0716280393', '$2y$12$mmFl56ri505sed6gVTsLT.YdNQMMaIaE7hEihVjGZcl/NffSB4eVa', 'admin', 'p1.jpg', 1, '2024-10-02 03:04:41', '2024-10-02 03:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone_num` varchar(255) DEFAULT NULL,
  `acc_no` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `district`, `date_of_birth`, `gender`, `phone_num`, `acc_no`, `bank_name`, `branch`, `last_login`, `role`, `profile_image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Manushi Weerasinghe', 'manuw2819@gmail.com', NULL, '$2y$12$MTE9hujSK.FR8rCT.mzOJOJLlYf2FR9GHfVO7NIvax7bBjeW8iJsu', 'No.124, \"Sisilasa\"', 'Kurunegala', '2000-08-18', 'female', '0716280395', NULL, NULL, NULL, '2024-10-02 22:40:12', 'customer', 'profile_image/5GrDjFHSIa7Pn79E9BzNH5jnsSZwBvM12u6ZC2Zq.jpg', NULL, NULL, '2024-09-22 22:02:05', '2024-10-02 22:40:12'),
(2, 'Ruvidi Weerasinghe', 'manuww2819@gmail.com', NULL, '$2y$12$VkODlhLtookyIxEWiLTBseKZXCYQvRtf/PlSKmCjbrsh8NPvl5ek.', 'No.124, \"Sisilasa\"', 'Kurunegala', '2000-08-19', NULL, '0716280393', NULL, NULL, NULL, '2024-09-25 03:18:26', 'customer', NULL, NULL, NULL, '2024-09-25 03:18:15', '2024-09-25 03:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `hex_value` varchar(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `product_id`, `type`, `value`, `hex_value`, `quantity`, `created_at`, `updated_at`) VALUES
(63, 'PRODUCT-RFKSUV', 'Size', 'M', NULL, 1, '2024-10-01 03:24:40', '2024-10-02 04:26:13'),
(64, 'PRODUCT-RFKSUV', 'Size', 'Brown', NULL, 5, '2024-10-01 03:24:40', '2024-10-01 03:24:40'),
(71, 'PRODUCT-NOMJYP', 'Size', 'M', NULL, 0, '2024-10-01 04:30:42', '2024-10-01 04:30:42'),
(72, 'PRODUCT-NOMJYP', 'Size', 'L', NULL, 5, '2024-10-01 04:30:42', '2024-10-01 04:30:42'),
(73, 'PRODUCT-NOMJYP', 'Size', 'S', NULL, 3, '2024-10-01 04:30:42', '2024-10-02 04:26:13'),
(74, 'PRODUCT-NOMJYP', 'Color', 'White', NULL, 5, '2024-10-01 04:30:42', '2024-10-01 04:30:42'),
(75, 'PRODUCT-NOMJYP', 'Color', 'Black', NULL, 5, '2024-10-01 04:30:42', '2024-10-01 04:30:42'),
(76, 'PRODUCT-NOMJYP', 'Color', 'Maroon', NULL, 4, '2024-10-01 04:30:42', '2024-10-02 04:26:13'),
(77, 'PRODUCT-NOMJYP', 'Color', 'Violet', NULL, 3, '2024-10-01 04:30:42', '2024-10-01 04:30:42'),
(78, 'PRODUCT-NOMJYP', 'Color', 'Pink', NULL, 5, '2024-10-01 04:30:42', '2024-10-01 04:30:42'),
(79, 'PRODUCT-NOMJYP', 'Color', 'Yellow', NULL, 4, '2024-10-01 04:30:42', '2024-10-01 04:30:42'),
(86, 'PRODUCT-XRKDVR', 'Size', 'S', NULL, 3, '2024-10-02 05:32:26', '2024-10-02 23:57:49'),
(87, 'PRODUCT-XRKDVR', 'Color', 'Pink', NULL, 4, '2024-10-02 05:32:26', '2024-10-02 05:32:26'),
(88, 'PRODUCT-XRKDVR', 'Color', 'Purple', NULL, 4, '2024-10-02 05:32:26', '2024-10-02 23:57:49'),
(123, 'PRODUCT-WXWVEG', 'Color', 'Blue', NULL, 5, '2024-10-02 21:49:48', '2024-10-02 21:49:48'),
(124, 'PRODUCT-WXWVEG', 'Color', 'Pink', NULL, 5, '2024-10-02 21:49:48', '2024-10-02 21:49:48'),
(125, 'PRODUCT-WXWVEG', 'Color', 'Purple', NULL, 5, '2024-10-02 21:49:48', '2024-10-02 21:49:48'),
(126, 'PRODUCT-WXWVEG', 'Color', 'Sky Blue', NULL, 5, '2024-10-02 21:49:48', '2024-10-02 21:49:48'),
(127, 'PRODUCT-WXWVEG', 'Color', 'Green', NULL, 5, '2024-10-02 21:49:48', '2024-10-02 21:49:48'),
(128, 'PRODUCT-WXWVEG', 'Color', 'DarkYellow', NULL, 2, '2024-10-02 21:49:48', '2024-10-02 21:49:48'),
(157, 'PRODUCT-F1QAHK', 'Color', 'Rusty Red', '#d32727', 5, '2024-10-02 23:23:34', '2024-10-02 23:23:34'),
(167, 'PRODUCT-E9LOUH', 'Color', 'Thunderbird', '#ca1c1c', 2, '2024-10-02 23:41:16', '2024-10-02 23:41:16'),
(168, 'PRODUCT-E9LOUH', 'Color', 'Coffee Bean', '#2c0c0c', 2, '2024-10-02 23:41:16', '2024-10-02 23:41:16'),
(169, 'PRODUCT-E9LOUH', 'Color', 'Wedgewood', '#44829c', 2, '2024-10-02 23:41:16', '2024-10-02 23:41:16'),
(170, 'PRODUCT-E9LOUH', 'Color', 'Jungle Green', '#26c07d', 5, '2024-10-02 23:41:17', '2024-10-02 23:41:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aff_customers`
--
ALTER TABLE `aff_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aff_customers_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_order_user_id_foreign` (`user_id`),
  ADD KEY `customer_order_order_code_index` (`order_code`);

--
-- Indexes for table `customer_order_items`
--
ALTER TABLE `customer_order_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_order_items_id_unique` (`id`),
  ADD KEY `customer_order_items_order_code_index` (`order_code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_id_unique` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `review_media`
--
ALTER TABLE `review_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_media_review_id_foreign` (`review_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_subcategories`
--
ALTER TABLE `sub_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `system_users_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variations_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aff_customers`
--
ALTER TABLE `aff_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customer_order_items`
--
ALTER TABLE `customer_order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review_media`
--
ALTER TABLE `review_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_subcategories`
--
ALTER TABLE `sub_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review_media`
--
ALTER TABLE `review_media`
  ADD CONSTRAINT `review_media_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variations`
--
ALTER TABLE `variations`
  ADD CONSTRAINT `variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
