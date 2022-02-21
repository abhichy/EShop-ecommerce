-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2020 at 05:30 PM
-- Server version: 5.7.32
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadgetoy_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(12) NOT NULL,
  `vendor_id` int(12) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `brand_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `vendor_id`, `admin_id`, `brand_name`, `created_at`, `updated_at`) VALUES
(16, NULL, 1, 'Power Guard', '2020-07-01 22:44:27', '2020-07-01 22:44:27'),
(17, NULL, 1, 'Apollo', '2020-07-02 02:50:26', '2020-07-02 02:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `root_id` int(11) UNSIGNED DEFAULT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_page` int(11) DEFAULT '0',
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `root_id`, `category_name`, `short_name`, `home_page`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 0, 'Computer', '', NULL, 'public/category_image/open.jpg', '2020-07-01 23:15:15', '2020-07-01 23:15:15'),
(2, 1, 'Desktop Component', '', NULL, 'public/category_image/open.jpg', '2020-07-01 23:15:15', '2020-07-01 23:15:15'),
(3, 2, 'UPS', '', NULL, 'public/category_image/open.jpg', '2020-07-01 23:15:15', '2020-07-01 23:15:15'),
(4, 3, 'windows os', '', NULL, 'public/category_image/download (4).jpg', '2020-07-01 23:47:01', '2020-07-01 23:47:01'),
(5, 0, 'Monitor', '', NULL, 'public/category_image/open.jpg', '2020-07-02 00:34:26', '2020-07-02 00:34:26'),
(6, 5, 'hp monitor', '', 1, 'public/category_image/download (4).jpg', '2020-07-02 01:25:36', '2020-07-02 01:25:36'),
(7, 5, 'LG monitor', '', NULL, 'public/category_image/04-macbook-pro-2019.webp', '2020-07-02 01:29:58', '2020-07-02 01:29:58'),
(8, 0, 'bike', 'bk', NULL, 'public/category_image/logo.png', '2020-07-04 00:38:50', '2020-07-04 00:38:50'),
(9, 8, 'motor bike', 'mtbk', NULL, 'public/category_image/logo.png', '2020-07-04 00:39:43', '2020-07-04 00:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` int(20) DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `password`, `full_name`, `first_name`, `last_name`, `email`, `varify_token`, `status`, `contact_no`, `nid`, `present_address`, `permanent_address`, `activity`, `created_at`, `updated_at`) VALUES
(2, '$2y$10$iJfPdKM7mSOATMbpqLkDB.1hALcAp0udjmHXAqv/WYbAhxKru.1Bi', 'cursor', NULL, NULL, 'mdismail_2008@yahoo.com', 'DZVSuLQ8Oyu43YPETXvHECSW1ob7M0NvkPlKXQiH', 1, '123', NULL, NULL, NULL, 1, '2020-07-13 22:52:05', '2020-07-13 22:52:05'),
(3, '$2y$10$mLbrms7ddKQlhoEUnyovleIW4zqutAODNOB3h/bdpKZ7nlBM6SnT6', 'niloy barua', NULL, NULL, 'niloy@gmail.com', '6AIWOkVqZgaAVYL7J8MctPX9KPWeGL2cu4nJ5F9t', 1, '123456', NULL, NULL, NULL, 1, '2020-07-19 04:00:03', '2020-07-19 04:00:03'),
(4, '$2y$10$4hTQ3scPELbUfCAbqLwxHue8JO8qs15bDNzdojvJfYrYjsXjytSCi', 'sudipto', NULL, NULL, 'sudiptoshil@outlook.com', 'gvra7oJuDNTZmwfH8YLJd3VaLM35BxZvkMZHrGI8', 0, '123456', NULL, NULL, NULL, 1, '2020-08-27 00:43:16', '2020-08-27 00:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `color_sizes`
--

CREATE TABLE `color_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL,
  `min_amount` float NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `availability` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heading`
--

CREATE TABLE `heading` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `serial` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heading`
--

INSERT INTO `heading` (`id`, `heading`, `serial`, `created_at`, `updated_at`) VALUES
(7, 'Model', 1, '2020-07-08 23:29:41', '2020-07-13 02:47:38'),
(9, 'c', 3, '2020-07-13 03:27:49', '2020-07-13 03:27:49'),
(8, 'Type', 2, '2020-07-13 02:50:00', '2020-07-13 02:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_unit_price` double NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `unit_x_quantity` double DEFAULT NULL,
  `invoice_discount` double NOT NULL,
  `invoice_after_discount` double DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=pending;2=processing;3=cancelled;4=adminAccept;5=delivered',
  `pdf` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_24_133745_create_categories_table', 2),
(5, '2020_03_26_133428_create_sliders_table', 3),
(6, '2020_03_26_153428_create_types_table', 4),
(7, '2020_03_28_043013_create_products_table', 5),
(8, '2020_03_28_050921_create_vendor_auths_table', 6),
(9, '2020_03_28_112944_create_color_sizes_table', 7),
(10, '2020_03_28_130236_create_product_images_table', 8),
(11, '2020_03_29_111717_create_brands_table', 9),
(12, '2020_04_04_112209_create_notifications_table', 10),
(13, '2020_04_16_210240_create_clients_table', 11),
(16, '2020_04_18_095227_create_orders_table', 12),
(17, '2020_04_18_100917_create_payments_table', 12),
(18, '2020_04_20_171428_create_invoices_table', 13),
(19, '2020_04_24_203801_create_product_reviews_table', 14),
(20, '2020_05_07_094557_create_contact_us_table', 15),
(21, '2020_05_07_101122_create_contact_us_table', 16),
(22, '2020_05_11_081735_create_coupons_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` float NOT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alphonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = pending; 2=processing; 3=cancelled;4=delivered',
  `delivered` tinyint(4) DEFAULT '0' COMMENT 'no=0 ; yes=1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sudiptoshil@outlook.com', '$2y$10$UZ7LMKheLDHAjpzFN4yw5O2T4D3JwJfLuu2j/ETWJJPHnPQgVK7Y.', '2020-05-27 22:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` int(255) NOT NULL,
  `card_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` int(10) UNSIGNED DEFAULT NULL,
  `expireDate` date DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `subcategory_id` int(10) UNSIGNED DEFAULT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_specification` text COLLATE utf8mb4_unicode_ci,
  `product_price` int(11) NOT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percent` int(255) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popularity` int(255) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'active = 1 and inactive = 2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `type_id`, `brand_id`, `vendor_id`, `product_name`, `product_description`, `product_specification`, `product_price`, `model_number`, `sell_unit`, `product_quantity`, `discount`, `discount_percent`, `currency`, `product_image`, `popularity`, `status`, `created_at`, `updated_at`) VALUES
(145, 0, NULL, 3, 16, 65, 'Test Product', '<h2>Additional Information</h2>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<h2>Additional Information</h2>\r\n\r\n			<table>\r\n				<tbody>\r\n					<tr>\r\n						<td>Model</td>\r\n						<td>Apollo 1065A 650VA</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Type</td>\r\n						<td>Offline UPS</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Input Voltage (V)</td>\r\n						<td>150-275 VAC</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Output Voltage (V)</td>\r\n						<td>220-230 VAC +/-10%</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Frequency (Hz - KHz)</td>\r\n						<td>50/60Hz +/-1%</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Load Capacity</td>\r\n						<td>300 W</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Transfer Rate</td>\r\n						<td>2 ms typical</td>\r\n					</tr>\r\n					<tr>\r\n						<td>LED Display</td>\r\n						<td>Yes</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Fuse</td>\r\n						<td>Yes</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Stabilizer</td>\r\n						<td>Yes</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Battery.</td>\r\n						<td>1 pc with 12V &amp; 7Ah</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Back up time(Full load)</td>\r\n						<td>10-15 Minutes (1PC &amp; 1 Monitor)</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Cable Length (Meter)</td>\r\n						<td>1 Meter</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Output connection (Back side)</td>\r\n						<td>3 Port</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Body Material</td>\r\n						<td>Full Plastic</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Specialty</td>\r\n						<td>No Load auto shutdown,Line interactive design with Boost &amp; Buck AVR -25%+25%,RJ11 Jack for internet protection, Cold start function, High/Low voltage protection,Overload/short-circuit protection,Communication port for smart UPS monitoring and controlling, LED display &amp; Frequency selection automatically.</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Dimensions</td>\r\n						<td>110 x 325 x 140 mm</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Weight (Kg)</td>\r\n						<td>4 Kg</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Warranty</td>\r\n						<td>1 year</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Made in/ Assemble</td>\r\n						<td>China</td>\r\n					</tr>\r\n					<tr>\r\n						<td>Country Of Origin</td>\r\n						<td>Taiwan</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL, 500, 'Test Product', 'Pc', 1, '0', 0, 'BDT', 'public/product_image/Test Product _145.jpg', 0, 1, '2020-07-13 06:39:39', '2020-07-13 06:41:07'),
(146, 5, 6, 3, 16, 65, 'Test Product', '<h2>Additional Information</h2>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>Apollo 1065A 650VA</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Type</td>\r\n			<td>Offline UPS</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Input Voltage (V)</td>\r\n			<td>150-275 VAC</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Output Voltage (V)</td>\r\n			<td>220-230 VAC +/-10%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Frequency (Hz - KHz)</td>\r\n			<td>50/60Hz +/-1%</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Load Capacity</td>\r\n			<td>300 W</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Transfer Rate</td>\r\n			<td>2 ms typical</td>\r\n		</tr>\r\n		<tr>\r\n			<td>LED Display</td>\r\n			<td>Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fuse</td>\r\n			<td>Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Stabilizer</td>\r\n			<td>Yes</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Battery.</td>\r\n			<td>1 pc with 12V &amp; 7Ah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Back up time(Full load)</td>\r\n			<td>10-15 Minutes (1PC &amp; 1 Monitor)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cable Length (Meter)</td>\r\n			<td>1 Meter</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Output connection (Back side)</td>\r\n			<td>3 Port</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Body Material</td>\r\n			<td>Full Plastic</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Specialty</td>\r\n			<td>No Load auto shutdown,Line interactive design with Boost &amp; Buck AVR -25%+25%,RJ11 Jack for internet protection, Cold start function, High/Low voltage protection,Overload/short-circuit protection,Communication port for smart UPS monitoring and controlling, LED display &amp; Frequency selection automatically.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dimensions</td>\r\n			<td>110 x 325 x 140 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Weight (Kg)</td>\r\n			<td>4 Kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Warranty</td>\r\n			<td>1 year</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Made in/ Assemble</td>\r\n			<td>China</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Country Of Origin</td>\r\n			<td>Taiwan</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 500, 'Test Product', 'Pc', 1, '0', 0, 'BDT', 'public/product_image/Test Product _146.jpg', 0, 1, '2020-07-13 07:38:04', '2020-07-13 07:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` tinyint(4) NOT NULL,
  `client_id` tinyint(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `rating` tinyint(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `specification` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `heading`, `product_id`, `specification`, `created_at`, `updated_at`) VALUES
(123, 'a', 144, '1', '2020-07-09 10:30:11', '2020-07-09 10:30:11'),
(122, 'a', 143, '1', '2020-07-09 10:22:49', '2020-07-09 10:22:49'),
(121, 'a', 142, '12', '2020-07-09 08:21:39', '2020-07-09 08:21:39'),
(120, 'a', 141, '2', '2020-07-09 08:05:41', '2020-07-09 08:05:41'),
(119, 'a', 140, '2', '2020-07-09 07:59:23', '2020-07-09 07:59:23'),
(117, 'a', 138, '2', '2020-07-09 07:27:51', '2020-07-09 07:27:51'),
(118, 'a', 139, '2', '2020-07-09 07:39:40', '2020-07-09 07:39:40'),
(116, 'a', 137, '3', '2020-07-09 07:18:30', '2020-07-09 07:18:30'),
(115, 'a', 136, '3', '2020-07-09 07:12:12', '2020-07-09 07:12:12'),
(114, 'a', 135, '1', '2020-07-09 06:58:18', '2020-07-09 06:58:18'),
(113, 'a', 134, '2', '2020-07-09 06:55:03', '2020-07-09 06:55:03'),
(112, 'a', 133, '12', '2020-07-09 06:53:13', '2020-07-09 06:53:13'),
(111, 'a', 132, '2', '2020-07-09 06:50:35', '2020-07-09 06:50:35'),
(110, 'a', 131, '2', '2020-07-09 06:49:12', '2020-07-09 06:49:12'),
(109, 'a', 130, '12', '2020-07-09 06:47:19', '2020-07-09 06:47:19'),
(108, 'a', 129, '12', '2020-07-09 06:42:41', '2020-07-09 06:42:41'),
(107, 'a', 128, '12', '2020-07-09 06:41:41', '2020-07-09 06:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(3, 'Electronics', '2020-07-01 23:52:18', '2020-07-01 23:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sudipto kumar shil', 'sudiptoshil@outlook.com', NULL, '$2y$10$zIsvycR6p3Rj0Kp.bmvSAOAwh6t8iIQAATM2Wo7h28EqECA1GG986', 'Om6OmzW8RIoCpQ5I2n9PQ5TFQdN8vndMxWJGXe0CkHCBaA3o5bgfuVScUnLD', '2020-03-24 03:19:54', '2020-03-24 03:19:54'),
(2, 'niloy', 'niloy.barua74@gmail.com', NULL, '$2y$10$TBrokoCknshHHwiOl2r.leA0AgYBJbdnscnK2golBtCyZ7L3VOTwS', NULL, '2020-03-29 02:37:17', '2020-03-29 02:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_auths`
--

CREATE TABLE `vendor_auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity` tinyint(4) NOT NULL DEFAULT '0',
  `nid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_auths`
--

INSERT INTO `vendor_auths` (`id`, `vendor_name`, `password`, `email`, `phone`, `location`, `email_verification`, `activity`, `nid`, `created_at`, `updated_at`) VALUES
(65, 'Cursor', '1234', '', '', '', NULL, 1, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `color_sizes`
--
ALTER TABLE `color_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heading`
--
ALTER TABLE `heading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_auths`
--
ALTER TABLE `vendor_auths`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendor_auths_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `color_sizes`
--
ALTER TABLE `color_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heading`
--
ALTER TABLE `heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_auths`
--
ALTER TABLE `vendor_auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
