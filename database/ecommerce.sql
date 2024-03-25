-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 06:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'DELL', 'dell', 0, '2023-03-11 12:39:03', '2023-03-22 05:24:40', 8),
(2, 'iPhone', 'iphone', 0, '2023-03-11 13:06:08', '2023-03-22 05:24:32', 10),
(3, 'CANON', 'canon', 0, '2023-03-11 13:09:43', '2023-03-22 05:24:25', 9),
(5, 'MI', 'mi', 0, '2023-03-22 03:53:23', '2023-03-22 05:24:07', 10),
(6, 'HP', 'hp', 0, '2023-03-27 10:25:32', '2023-03-27 10:27:43', 8),
(7, 'Micropack', 'micropack', 0, '2023-03-31 09:29:43', '2023-03-31 09:29:43', 11);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Laptop', 'laptop', 'Laptop', 'uploads/categories/1680250600.jpg', 'Laptop', 'Laptop', 'Laptop', 0, '2023-03-02 10:32:13', '2023-03-31 02:16:40'),
(9, 'Digital Camera', 'camera', 'Digital Camera', 'uploads/categories/1677774885.jpg', 'Digital Camera', 'Digital Camera', 'Digital Camera', 0, '2023-03-02 10:34:45', '2023-03-22 03:05:08'),
(10, 'Mobile', 'mobile', 'Smart Phones', 'uploads/categories/1680250538.jpg', 'Mobile Phone', 'Mobile Phone', 'Mobile Phone', 0, '2023-03-11 13:14:49', '2023-03-31 02:15:38'),
(11, 'Headphone', 'headphone', 'Headphone', 'uploads/categories/1680276552.png', 'Headphone', 'Headphone', 'Headphone', 0, '2023-03-31 09:29:12', '2023-03-31 09:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'red', 0, '2023-03-16 11:38:27', '2023-03-16 11:38:27'),
(2, 'Green', 'green', 0, '2023-03-16 11:39:09', '2023-03-16 11:39:09'),
(3, 'Blue', 'blue', 0, '2023-03-16 11:39:18', '2023-03-16 11:39:18'),
(4, 'Black', 'black', 0, '2023-03-16 11:57:07', '2023-03-16 12:20:07'),
(6, 'Yellow', 'yellow', 0, '2023-03-17 02:33:28', '2023-03-17 02:33:28'),
(7, 'Purple', 'purple', 0, '2023-03-17 02:33:48', '2023-03-17 02:33:48'),
(8, 'Gray', 'gray', 0, '2023-03-17 11:22:06', '2023-03-17 11:22:06');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2023_02_28_154127_add_details_to_users_table', 2),
(7, '2023_03_01_133937_create_categories_table', 3),
(8, '2023_03_11_162656_create_brands_table', 4),
(9, '2023_03_15_075721_create_products_table', 5),
(10, '2023_03_15_081542_create_product_images_table', 5),
(12, '2023_03_16_160053_create_colors_table', 6),
(13, '2023_03_17_091354_create_product_colors_table', 7),
(14, '2023_03_20_071120_create_sliders_table', 8),
(15, '2023_03_22_111625_add_category_id_to_brands_table', 9),
(16, '2023_03_23_172051_create_wishlists_table', 10),
(17, '2023_03_25_140156_create_carts_table', 11),
(18, '2023_03_26_174648_create_orders_table', 12),
(19, '2023_03_26_180103_create_order_items_table', 12),
(21, '2023_04_04_185929_create_settings_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_msg` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_msg`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nayem-qZ5cQmmcLU', 'Nayem Md', 'nayemmd.cse21@gmail.com', '15623850698', '310018', '928 Second Avenue, Xiasha Higher Education Zone', 'In Progress', 'Cash On Delivery', NULL, '2023-03-29 09:25:20', '2023-03-27 09:25:20'),
(2, 2, 'Nayem-2LDgOsUrjZ', 'Nayem Md', 'nayemmd.cse21@gmail.com', '13071806078', '310018', '928 Second Avenue, Xiasha Higher Education Zone', 'In Progress', 'Cash On Delivery', NULL, '2023-03-30 09:41:36', '2023-03-27 09:41:36'),
(3, 2, 'Nayem-MnlXkwQVfw', 'Nayem Md', 'nayemmd.cse21@gmail.com', '13071806078', '310018', '928 Second Avenue, Xiasha Higher Education Zone', 'In Progress', 'Cash On Delivery', NULL, '2023-03-31 12:36:36', '2023-03-31 11:55:56'),
(4, 1, 'Nayem-yKWjDBGXAL', 'Md Nayem', 'mdnayem.cse21@gmail.com', '15623850698', '430025', 'Nanhu Campus, Wuhan University of Technology', 'Completed', 'Cash On Delivery', NULL, '2023-03-31 09:36:57', '2023-03-31 14:09:34'),
(5, 2, 'Nayem-WiqgTodEI9', 'Nayem Md', 'nayemmd.cse21@gmail.com', '01999791578', '1234', '4t34g', 'Completed', 'Cash On Delivery', NULL, '2023-06-02 13:43:06', '2023-06-02 13:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, 1, 449, '2023-03-27 09:25:20', '2023-03-27 09:25:20'),
(2, 2, 3, 1, 1, 1399, '2023-03-27 09:41:36', '2023-03-27 09:41:36'),
(3, 3, 5, 12, 1, 329, '2023-03-29 12:36:36', '2023-03-29 12:36:36'),
(4, 3, 2, 16, 1, 489, '2023-03-29 12:36:36', '2023-03-29 12:36:36'),
(5, 4, 6, 21, 1, 99, '2023-03-31 09:36:57', '2023-03-31 09:36:57'),
(6, 5, 6, 21, 1, 99, '2023-06-02 13:43:06', '2023-06-02 13:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` float NOT NULL,
  `selling_price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=trending,0=not-trending',
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=featured,0=not-featured',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(2, 8, 'Dell Inspiron 1400 Series Laptop', 'dell1400', 'dell', 'Dell Inspiron 1400 Series Laptop', 'Dell Inspiron 1400 Series Laptop', 500, 489, 9, 1, 1, 0, 'Dell Inspiron 1400 Series Laptop', 'Dell Inspiron 1400 Series Laptop', 'Dell Inspiron 1400 Series Laptop', '2023-03-15 10:22:32', '2023-04-02 12:45:40'),
(3, 10, 'iPhone 14 Pro Max', 'iphone_14', 'iphone', 'iPhone 14 Pro Max 256 GB', 'iPhone 14 Pro Max 256 GB', 1500, 1399, 9, 1, 1, 0, 'iPhone 14 Pro Max', 'iPhone 14 Pro Max', 'iPhone 14 Pro Max 256 GB', '2023-03-17 03:37:49', '2023-04-02 12:44:50'),
(4, 9, 'Canon 365d Digital Camera', 'canon365', 'canon', 'Canon 365d Digital Camera', 'Canon 365d Digital Camera', 500, 449, 4, 1, 0, 0, 'Canon 365d Digital Camera', 'Canon 365d Digital Camera', 'Canon 365d Digital Camera', '2023-03-22 02:38:52', '2023-04-01 12:15:56'),
(5, 10, 'MI Note 10', 'mi_note_10', 'mi', 'MI Note 10, 8GB 256GB', 'MI Note 10, 8GB 256GB', 450, 329, 9, 1, 0, 0, 'MI Note 10', 'MI Note 10', 'MI Note 10, 8GB 256GB', '2023-03-22 03:55:34', '2023-04-01 12:15:26'),
(6, 11, 'Headphone Stereo Headphone', 'micropack_stereo', 'micropack', 'Headphone Stereo Headphone Wireless/Wire', 'Headphone Stereo Headphone Wireless/Wire', 150, 99, 18, 1, 1, 0, 'Headphone Stereo Headphone', 'Headphone Stereo Headphone', 'Headphone Stereo Headphone Wireless/Wire', '2023-03-31 09:31:46', '2023-06-02 13:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 5, '2023-03-17 03:37:50', '2023-03-27 09:41:36'),
(11, 5, 3, 3, '2023-03-23 04:24:58', '2023-03-23 04:24:58'),
(12, 5, 4, 4, '2023-03-23 04:24:58', '2023-03-29 12:36:36'),
(13, 5, 8, 2, '2023-03-23 04:24:58', '2023-03-23 04:24:58'),
(14, 3, 8, 4, '2023-03-23 10:10:34', '2023-03-27 08:37:28'),
(16, 2, 4, 4, '2023-03-27 09:23:12', '2023-03-29 12:36:36'),
(17, 2, 8, 5, '2023-03-27 09:23:12', '2023-03-27 09:23:12'),
(19, 6, 4, 10, '2023-03-31 09:32:47', '2023-03-31 09:32:47'),
(20, 6, 8, 5, '2023-03-31 09:32:47', '2023-03-31 09:32:47'),
(21, 6, 6, 3, '2023-03-31 09:35:35', '2023-06-02 13:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(19, 2, 'uploads/products/16802512491.jpg', '2023-03-31 02:27:29', '2023-03-31 02:27:29'),
(20, 3, 'uploads/products/16802513741.jpg', '2023-03-31 02:29:34', '2023-03-31 02:29:34'),
(21, 3, 'uploads/products/16802513742.jpg', '2023-03-31 02:29:34', '2023-03-31 02:29:34'),
(22, 3, 'uploads/products/16802513743.jpg', '2023-03-31 02:29:34', '2023-03-31 02:29:34'),
(23, 2, 'uploads/products/16802515501.jpeg', '2023-03-31 02:32:30', '2023-03-31 02:32:30'),
(24, 2, 'uploads/products/16802515502.jpeg', '2023-03-31 02:32:30', '2023-03-31 02:32:30'),
(25, 2, 'uploads/products/16802515503.jpeg', '2023-03-31 02:32:30', '2023-03-31 02:32:30'),
(26, 4, 'uploads/products/16802516061.jpeg', '2023-03-31 02:33:26', '2023-03-31 02:33:26'),
(27, 4, 'uploads/products/16802516062.jpeg', '2023-03-31 02:33:26', '2023-03-31 02:33:26'),
(28, 4, 'uploads/products/16802516063.jpeg', '2023-03-31 02:33:26', '2023-03-31 02:33:26'),
(29, 4, 'uploads/products/16802516064.jpg', '2023-03-31 02:33:26', '2023-03-31 02:33:26'),
(30, 5, 'uploads/products/16802516681.jpg', '2023-03-31 02:34:28', '2023-03-31 02:34:28'),
(31, 5, 'uploads/products/16802516682.jpg', '2023-03-31 02:34:28', '2023-03-31 02:34:28'),
(32, 5, 'uploads/products/16802516683.jpg', '2023-03-31 02:34:28', '2023-03-31 02:34:28'),
(33, 5, 'uploads/products/16802516684.jpg', '2023-03-31 02:34:28', '2023-03-31 02:34:28'),
(34, 6, 'uploads/products/16802767671.jpg', '2023-03-31 09:32:47', '2023-03-31 09:32:47'),
(35, 6, 'uploads/products/16802767672.jpeg', '2023-03-31 09:32:47', '2023-03-31 09:32:47'),
(36, 6, 'uploads/products/16802767673.png', '2023-03-31 09:32:47', '2023-03-31 09:32:47'),
(37, 3, 'uploads/products/16804564601.jpeg', '2023-04-02 11:27:40', '2023-04-02 11:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `meta_description` varchar(500) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone1` varchar(255) NOT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `email1` varchar(255) NOT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `title`, `meta_keyword`, `meta_description`, `address`, `phone1`, `phone2`, `email1`, `email2`, `facebook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'N@yem\'s Ecommerce', 'nayemsecom.com', 'N@yem\'s Ecom', 'N@yem\'s Ecom', 'Our community is supporting brands & businesses through innovative, omnichannel solutions. N@yem\'s E-commerce was named a leader in the latest Gartner magic quadrant for digital commerce. Personalization at Scale. Digital Transformation. Artificial Intelligence.', 'Nanhu Campus, Wuhan University of Technology, Hongshan, Wuhan, Hubei, China-430038', '+86 15623850698', '01999791578', 'mdnayem.cse21@gmail.com', 'nayemmd.cse21@gmail.com', 'https://www.facebook.com/mdnayem.mollah', 'https://www.twitter.com/mdnayem.mollah', 'https://www.instagram.com/mdnayem.mollah', 'https://www.youtube.com/mdnayem.mollah', '2023-04-07 11:46:37', '2023-04-07 12:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '<span>Best Ecommerce Solutions 2 </span>to Boost your Brand Name &amp; Sales', 'We offer an industry-driven and successful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/slider/1680250365.jpg', 0, '2023-03-20 03:26:32', '2023-03-31 02:12:45'),
(2, '<span>Best Ecommerce Solutions 2 </span>to Boost your Brand Name &amp; Sales', 'We offer an industry-driven and successful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/slider/1680250374.jpg', 0, '2023-03-20 03:41:42', '2023-03-31 02:12:54'),
(3, '<span>Best Ecommerce Solutions 2 </span>to Boost your Brand Name &amp; Sales', 'We offer an industry-driven and successful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/slider/1680250383.jpg', 0, '2023-03-20 03:42:11', '2023-03-31 02:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'Md Nayem', 'mdnayem.cse21@gmail.com', NULL, '$2y$10$i/Zh6HJ2E2hwA8JqQCNzmuwvcWXlwe8YcgqUcnI91zv9ADhi6XUMa', 1, NULL, '2023-02-27 12:12:03', '2023-02-27 12:12:03', 0),
(2, 'Nayem Md', 'nayemmd.cse21@gmail.com', NULL, '$2y$10$/hVwlQsKVkRI5A61vpSG2u7Ynn72sYZfIUSGYaKlAT1N4L0NojFhK', 0, NULL, '2023-02-28 11:22:25', '2023-02-28 11:22:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`),
  ADD KEY `product_colors_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
