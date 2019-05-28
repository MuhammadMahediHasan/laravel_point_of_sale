-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2019 at 09:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `point_of_sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_email`, `brand_phone`, `brand_address`, `brand_logo`, `brand_status`, `created_at`, `updated_at`) VALUES
(15, 'Pran', 'pran@gmail.com', '0132324323', 'Dhaka,Bangladesh', 'backend_asset/images/brand/1555257521.jpeg', 'Active', '2019-04-14 09:58:41', '2019-04-14 09:58:41'),
(16, 'Fresh', 'fresh@gmail.com', '0191787871', 'Dhaka, Bangladesh', 'backend_asset/images/brand/1555257719.png', 'Active', '2019-04-14 10:01:59', '2019-04-14 10:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_code`, `category_description`, `category_status`, `created_at`, `updated_at`) VALUES
(19, 'Chal', '101', 'Chal', 'Active', '2019-04-14 09:39:28', '2019-04-14 09:43:29'),
(20, 'Dal', '102', 'Dal', 'Active', '2019-04-14 09:43:51', '2019-04-14 09:43:51'),
(21, 'Oil', '103', 'Oil', 'Active', '2019-04-14 09:45:48', '2019-04-14 09:53:43'),
(22, 'Water', '1434', 'Water', 'Active', '2019-04-28 12:29:19', '2019-04-28 12:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_opening_balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_taxable` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UnTaxable',
  `customer_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_account_no`, `customer_opening_balance`, `customer_taxable`, `customer_image`, `created_at`, `updated_at`) VALUES
(2, 'Niloy', 'niloy@gamil.com', '0178363632', 'Mirpur,Dhaka', '3523757287', '*****', 'Taxable', 'http://127.0.0.1:8000/backend_asset/images/customer/1553631600.jpg', '2019-03-26 14:20:00', '2019-04-14 10:46:43'),
(6, 'Shakil Ahmmed', 'shakil@gmail.com', '0183773737', 'Mirpur,Dhaka', '73823895923', '*****', 'Taxable', 'http://127.0.0.1:8000/backend_asset/images/customer/1553774229.jpg', '2019-03-28 05:57:09', '2019-04-14 10:47:34');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_20_183600_create_category', 1),
(4, '2019_03_22_050358_create_sub_category', 2),
(5, '2019_03_23_162617_create_brand', 3),
(6, '2019_03_26_155914_create_product_template', 4),
(8, '2019_03_26_184757_create_customer', 5),
(9, '2019_03_27_135023_create_suplier', 6),
(10, '2014_10_12_000000_create_users_table', 7),
(13, '2019_04_08_182107_create_purchase_product', 10),
(14, '2019_04_08_182607_create_purchase_pricing', 11),
(15, '2019_04_08_181946_create_purchase_main', 12),
(16, '2019_04_10_143511_create_purchase_stock', 13),
(17, '2019_04_14_190713_create_sales_main', 14),
(19, '2019_04_14_191537_create_sales_product_pricing', 16),
(20, '2019_04_17_121034_create_sales_product', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_template`
--

CREATE TABLE `product_template` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_mrp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_template`
--

INSERT INTO `product_template` (`product_id`, `product_name`, `product_code`, `category_name`, `sub_category_name`, `brand_name`, `product_cost`, `product_mrp`, `product_tax`, `product_description`, `product_status`, `product_image`, `created_at`, `updated_at`) VALUES
(8, 'Minicate Chal', '101-1', '19', 'Minicate', '15', '200', '250', '0', 'Minicate Chal', 'Active', 'backend_asset/images/product/1555257913.png', '2019-04-14 10:05:13', '2019-04-14 10:05:13'),
(9, 'Cinigura Chal', '101-3', '19', 'Cinigura', '15', '250', '300', '0', 'Cinigura Chal', 'Active', 'backend_asset/images/product/1555258292.jpeg', '2019-04-14 10:11:32', '2019-04-14 10:11:32'),
(10, 'Moshur Dal', '102-1', '20', 'Moshur Dhal', '15', '80', '100', '0', 'Moshur Dal', 'Active', 'backend_asset/images/product/1555258781.jpeg', '2019-04-14 10:19:41', '2019-04-14 10:19:41'),
(11, 'Mug Dhal', '102-2', '20', 'Moshur Dhal', '15', '90', '120', '0', 'Mug Dhal', 'Active', 'backend_asset/images/product/1555260045.jpeg', '2019-04-14 10:28:06', '2019-04-14 10:40:45'),
(12, 'Soybean Oil', '103-1', '21', 'Soybean Oil', '15', '80', '110', '0', 'Soybean Oil', 'Active', 'backend_asset/images/product/1555259933.jpeg', '2019-04-14 10:33:19', '2019-04-14 10:38:53'),
(13, 'Sorisa Oil', '103-2', '21', 'Sorisa Oil', '15', '180', '200', '0', 'Sorisa Oil', 'Active', 'backend_asset/images/product/1555259832.jpeg', '2019-04-14 10:37:12', '2019-04-14 10:37:12'),
(14, 'Mum Water', '201-4', '22', 'Mum Water', '16', '25', '30', '0', 'Water', 'Active', 'backend_asset/images/product/1556476347.jpeg', '2019-04-28 12:32:27', '2019-04-28 12:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_main`
--

CREATE TABLE `purchase_main` (
  `product_main_id` bigint(20) UNSIGNED NOT NULL,
  `product_main_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_main_suplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_main`
--

INSERT INTO `purchase_main` (`product_main_id`, `product_main_date`, `product_main_suplier`, `created_at`, `updated_at`) VALUES
(32, '2019-04-22', '1', '2019-04-22 03:13:32', '2019-04-22 03:13:32'),
(33, '2019-04-29', '1', '2019-04-28 12:33:00', '2019-04-28 12:33:00'),
(34, '2019-05-04', '1', '2019-05-04 00:00:16', '2019-05-04 00:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_pricing`
--

CREATE TABLE `purchase_pricing` (
  `purchase_pricing_id` bigint(20) UNSIGNED NOT NULL,
  `product_main_id` int(11) NOT NULL,
  `purchase_product_id` int(11) NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_pricing`
--

INSERT INTO `purchase_pricing` (`purchase_pricing_id`, `product_main_id`, `purchase_product_id`, `total`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(16, 32, 21, '32500', '30000', '2500', '2019-04-22 03:13:44', '2019-04-22 03:13:44'),
(17, 33, 22, '250', '250', '0', '2019-04-28 12:33:01', '2019-04-28 12:33:01'),
(18, 34, 23, '2000', '2000', '0', '2019-05-04 00:00:17', '2019-05-04 00:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `purchase_product_id` bigint(20) UNSIGNED NOT NULL,
  `product_main_id` int(191) NOT NULL,
  `purchase_product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_product_unit_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_product_sub_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_product`
--

INSERT INTO `purchase_product` (`purchase_product_id`, `product_main_id`, `purchase_product_name`, `purchase_product_quantity`, `purchase_product_unit_cost`, `purchase_product_sub_total`, `created_at`, `updated_at`) VALUES
(16, 32, '8', '50', '200', '10000', '2019-04-22 03:13:32', '2019-04-22 03:13:32'),
(17, 32, '9', '40', '250', '10000', '2019-04-22 03:13:35', '2019-04-22 03:13:35'),
(18, 32, '10', '30', '80', '2400', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(19, 32, '11', '20', '90', '1800', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(20, 32, '12', '25', '80', '2000', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(21, 32, '13', '35', '180', '6300', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(22, 33, '14', '10', '25', '250', '2019-04-28 12:33:00', '2019-04-28 12:33:00'),
(23, 34, '8', '10', '200', '2000', '2019-05-04 00:00:16', '2019-05-04 00:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_stock`
--

CREATE TABLE `purchase_stock` (
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_stock_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_stock`
--

INSERT INTO `purchase_stock` (`stock_id`, `purchase_id`, `product_id`, `product_stock_code`, `stock_status`, `created_at`, `updated_at`) VALUES
(162, '16', '8', 'Minicate Chal-15559244120', 'Inactive', '2019-04-22 03:13:32', '2019-04-22 12:54:14'),
(163, '16', '8', 'Minicate Chal-15559244121', 'Inactive', '2019-04-22 03:13:32', '2019-04-22 13:36:05'),
(164, '16', '8', 'Minicate Chal-15559244122', 'Inactive', '2019-04-22 03:13:32', '2019-04-22 13:36:05'),
(165, '16', '8', 'Minicate Chal-15559244123', 'Inactive', '2019-04-22 03:13:32', '2019-04-22 13:36:05'),
(166, '16', '8', 'Minicate Chal-15559244124', 'Inactive', '2019-04-22 03:13:32', '2019-04-22 13:36:06'),
(167, '16', '8', 'Minicate Chal-15559244125', 'Inactive', '2019-04-22 03:13:32', '2019-04-22 13:36:06'),
(168, '16', '8', 'Minicate Chal-15559244126', 'Inactive', '2019-04-22 03:13:32', '2019-04-22 13:36:06'),
(169, '16', '8', 'Minicate Chal-15559244137', 'Inactive', '2019-04-22 03:13:33', '2019-04-22 13:36:06'),
(170, '16', '8', 'Minicate Chal-15559244138', 'Inactive', '2019-04-22 03:13:33', '2019-04-22 13:36:06'),
(171, '16', '8', 'Minicate Chal-15559244139', 'Inactive', '2019-04-22 03:13:33', '2019-04-22 13:36:06'),
(172, '16', '8', 'Minicate Chal-155592441310', 'Inactive', '2019-04-22 03:13:33', '2019-04-22 13:36:06'),
(173, '16', '8', 'Minicate Chal-155592441311', 'Inactive', '2019-04-22 03:13:33', '2019-04-23 15:21:55'),
(174, '16', '8', 'Minicate Chal-155592441312', 'Inactive', '2019-04-22 03:13:33', '2019-04-23 15:21:55'),
(175, '16', '8', 'Minicate Chal-155592441313', 'Inactive', '2019-04-22 03:13:33', '2019-04-23 15:21:55'),
(176, '16', '8', 'Minicate Chal-155592441314', 'Inactive', '2019-04-22 03:13:33', '2019-04-23 15:21:55'),
(177, '16', '8', 'Minicate Chal-155592441315', 'Inactive', '2019-04-22 03:13:33', '2019-04-23 15:43:35'),
(178, '16', '8', 'Minicate Chal-155592441316', 'Inactive', '2019-04-22 03:13:33', '2019-04-23 15:43:35'),
(179, '16', '8', 'Minicate Chal-155592441317', 'Inactive', '2019-04-22 03:13:33', '2019-04-23 15:43:36'),
(180, '16', '8', 'Minicate Chal-155592441318', 'Inactive', '2019-04-22 03:13:33', '2019-04-23 15:43:36'),
(181, '16', '8', 'Minicate Chal-155592441319', 'Inactive', '2019-04-22 03:13:33', '2019-04-23 15:43:36'),
(182, '16', '8', 'Minicate Chal-155592441320', 'Inactive', '2019-04-22 03:13:33', '2019-04-24 10:33:08'),
(183, '16', '8', 'Minicate Chal-155592441321', 'Inactive', '2019-04-22 03:13:33', '2019-04-24 10:33:08'),
(184, '16', '8', 'Minicate Chal-155592441322', 'Inactive', '2019-04-22 03:13:33', '2019-04-28 13:47:37'),
(185, '16', '8', 'Minicate Chal-155592441323', 'Inactive', '2019-04-22 03:13:33', '2019-04-28 13:47:37'),
(186, '16', '8', 'Minicate Chal-155592441324', 'Inactive', '2019-04-22 03:13:33', '2019-05-03 23:34:39'),
(187, '16', '8', 'Minicate Chal-155592441325', 'Inactive', '2019-04-22 03:13:33', '2019-05-03 23:34:39'),
(188, '16', '8', 'Minicate Chal-155592441326', 'Inactive', '2019-04-22 03:13:33', '2019-05-04 00:01:27'),
(189, '16', '8', 'Minicate Chal-155592441427', 'Inactive', '2019-04-22 03:13:34', '2019-05-04 00:01:27'),
(190, '16', '8', 'Minicate Chal-155592441428', 'Inactive', '2019-04-22 03:13:34', '2019-05-04 00:01:27'),
(191, '16', '8', 'Minicate Chal-155592441429', 'Inactive', '2019-04-22 03:13:34', '2019-05-04 00:01:27'),
(192, '16', '8', 'Minicate Chal-155592441430', 'Inactive', '2019-04-22 03:13:34', '2019-05-04 00:01:27'),
(193, '16', '8', 'Minicate Chal-155592441431', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(194, '16', '8', 'Minicate Chal-155592441432', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(195, '16', '8', 'Minicate Chal-155592441433', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(196, '16', '8', 'Minicate Chal-155592441434', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(197, '16', '8', 'Minicate Chal-155592441435', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(198, '16', '8', 'Minicate Chal-155592441436', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(199, '16', '8', 'Minicate Chal-155592441437', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(200, '16', '8', 'Minicate Chal-155592441438', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(201, '16', '8', 'Minicate Chal-155592441439', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(202, '16', '8', 'Minicate Chal-155592441440', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(203, '16', '8', 'Minicate Chal-155592441441', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(204, '16', '8', 'Minicate Chal-155592441442', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(205, '16', '8', 'Minicate Chal-155592441443', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(206, '16', '8', 'Minicate Chal-155592441444', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(207, '16', '8', 'Minicate Chal-155592441445', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(208, '16', '8', 'Minicate Chal-155592441446', 'Active', '2019-04-22 03:13:34', '2019-04-22 03:13:34'),
(209, '16', '8', 'Minicate Chal-155592441547', 'Active', '2019-04-22 03:13:35', '2019-04-22 03:13:35'),
(210, '16', '8', 'Minicate Chal-155592441548', 'Active', '2019-04-22 03:13:35', '2019-04-22 03:13:35'),
(211, '16', '8', 'Minicate Chal-155592441549', 'Active', '2019-04-22 03:13:35', '2019-04-22 03:13:35'),
(212, '17', '9', 'Cinigura Chal-15559244150', 'Inactive', '2019-04-22 03:13:35', '2019-04-22 13:34:37'),
(213, '17', '9', 'Cinigura Chal-15559244151', 'Inactive', '2019-04-22 03:13:35', '2019-04-22 13:34:37'),
(214, '17', '9', 'Cinigura Chal-15559244152', 'Inactive', '2019-04-22 03:13:35', '2019-04-22 13:36:06'),
(215, '17', '9', 'Cinigura Chal-15559244153', 'Inactive', '2019-04-22 03:13:35', '2019-04-22 13:36:06'),
(216, '17', '9', 'Cinigura Chal-15559244154', 'Inactive', '2019-04-22 03:13:35', '2019-04-22 13:36:06'),
(217, '17', '9', 'Cinigura Chal-15559244155', 'Inactive', '2019-04-22 03:13:35', '2019-04-22 13:36:06'),
(218, '17', '9', 'Cinigura Chal-15559244156', 'Inactive', '2019-04-22 03:13:35', '2019-04-22 13:36:06'),
(219, '17', '9', 'Cinigura Chal-15559244167', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:06'),
(220, '17', '9', 'Cinigura Chal-15559244168', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:06'),
(221, '17', '9', 'Cinigura Chal-15559244169', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:06'),
(222, '17', '9', 'Cinigura Chal-155592441610', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(223, '17', '9', 'Cinigura Chal-155592441611', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(224, '17', '9', 'Cinigura Chal-155592441612', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(225, '17', '9', 'Cinigura Chal-155592441613', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(226, '17', '9', 'Cinigura Chal-155592441614', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(227, '17', '9', 'Cinigura Chal-155592441615', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(228, '17', '9', 'Cinigura Chal-155592441616', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(229, '17', '9', 'Cinigura Chal-155592441617', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(230, '17', '9', 'Cinigura Chal-155592441618', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(231, '17', '9', 'Cinigura Chal-155592441619', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(232, '17', '9', 'Cinigura Chal-155592441620', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(233, '17', '9', 'Cinigura Chal-155592441621', 'Inactive', '2019-04-22 03:13:36', '2019-04-22 13:36:07'),
(234, '17', '9', 'Cinigura Chal-155592441722', 'Inactive', '2019-04-22 03:13:37', '2019-04-24 10:33:08'),
(235, '17', '9', 'Cinigura Chal-155592441723', 'Inactive', '2019-04-22 03:13:37', '2019-04-24 10:33:08'),
(236, '17', '9', 'Cinigura Chal-155592441724', 'Inactive', '2019-04-22 03:13:37', '2019-04-24 10:33:08'),
(237, '17', '9', 'Cinigura Chal-155592441725', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(238, '17', '9', 'Cinigura Chal-155592441726', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(239, '17', '9', 'Cinigura Chal-155592441727', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(240, '17', '9', 'Cinigura Chal-155592441728', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(241, '17', '9', 'Cinigura Chal-155592441729', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(242, '17', '9', 'Cinigura Chal-155592441730', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(243, '17', '9', 'Cinigura Chal-155592441731', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(244, '17', '9', 'Cinigura Chal-155592441732', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(245, '17', '9', 'Cinigura Chal-155592441733', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(246, '17', '9', 'Cinigura Chal-155592441734', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(247, '17', '9', 'Cinigura Chal-155592441735', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(248, '17', '9', 'Cinigura Chal-155592441736', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(249, '17', '9', 'Cinigura Chal-155592441737', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(250, '17', '9', 'Cinigura Chal-155592441738', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(251, '17', '9', 'Cinigura Chal-155592441739', 'Active', '2019-04-22 03:13:37', '2019-04-22 03:13:37'),
(252, '18', '10', 'Moshur Dal-15559244180', 'Inactive', '2019-04-22 03:13:38', '2019-04-22 13:34:37'),
(253, '18', '10', 'Moshur Dal-15559244181', 'Inactive', '2019-04-22 03:13:38', '2019-04-22 13:34:37'),
(254, '18', '10', 'Moshur Dal-15559244182', 'Inactive', '2019-04-22 03:13:38', '2019-04-22 13:34:37'),
(255, '18', '10', 'Moshur Dal-15559244183', 'Inactive', '2019-04-22 03:13:38', '2019-04-24 10:33:08'),
(256, '18', '10', 'Moshur Dal-15559244184', 'Inactive', '2019-04-22 03:13:38', '2019-04-24 10:33:08'),
(257, '18', '10', 'Moshur Dal-15559244185', 'Inactive', '2019-04-22 03:13:38', '2019-04-24 10:33:08'),
(258, '18', '10', 'Moshur Dal-15559244186', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(259, '18', '10', 'Moshur Dal-15559244187', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(260, '18', '10', 'Moshur Dal-15559244188', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(261, '18', '10', 'Moshur Dal-15559244189', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(262, '18', '10', 'Moshur Dal-155592441810', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(263, '18', '10', 'Moshur Dal-155592441811', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(264, '18', '10', 'Moshur Dal-155592441812', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(265, '18', '10', 'Moshur Dal-155592441813', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(266, '18', '10', 'Moshur Dal-155592441814', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(267, '18', '10', 'Moshur Dal-155592441815', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(268, '18', '10', 'Moshur Dal-155592441816', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(269, '18', '10', 'Moshur Dal-155592441817', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(270, '18', '10', 'Moshur Dal-155592441818', 'Active', '2019-04-22 03:13:38', '2019-04-22 03:13:38'),
(271, '18', '10', 'Moshur Dal-155592441919', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(272, '18', '10', 'Moshur Dal-155592441920', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(273, '18', '10', 'Moshur Dal-155592441921', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(274, '18', '10', 'Moshur Dal-155592441922', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(275, '18', '10', 'Moshur Dal-155592441923', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(276, '18', '10', 'Moshur Dal-155592441924', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(277, '18', '10', 'Moshur Dal-155592441925', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(278, '18', '10', 'Moshur Dal-155592441926', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(279, '18', '10', 'Moshur Dal-155592441927', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(280, '18', '10', 'Moshur Dal-155592441928', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(281, '18', '10', 'Moshur Dal-155592441929', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(282, '19', '11', 'Mug Dhal-15559244190', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(283, '19', '11', 'Mug Dhal-15559244191', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(284, '19', '11', 'Mug Dhal-15559244192', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(285, '19', '11', 'Mug Dhal-15559244193', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(286, '19', '11', 'Mug Dhal-15559244194', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(287, '19', '11', 'Mug Dhal-15559244195', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(288, '19', '11', 'Mug Dhal-15559244196', 'Active', '2019-04-22 03:13:39', '2019-04-22 03:13:39'),
(289, '19', '11', 'Mug Dhal-15559244207', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(290, '19', '11', 'Mug Dhal-15559244208', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(291, '19', '11', 'Mug Dhal-15559244209', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(292, '19', '11', 'Mug Dhal-155592442010', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(293, '19', '11', 'Mug Dhal-155592442011', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(294, '19', '11', 'Mug Dhal-155592442012', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(295, '19', '11', 'Mug Dhal-155592442013', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(296, '19', '11', 'Mug Dhal-155592442014', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(297, '19', '11', 'Mug Dhal-155592442015', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(298, '19', '11', 'Mug Dhal-155592442016', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(299, '19', '11', 'Mug Dhal-155592442017', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(300, '19', '11', 'Mug Dhal-155592442018', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(301, '19', '11', 'Mug Dhal-155592442019', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(302, '20', '12', 'Soybean Oil-15559244200', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(303, '20', '12', 'Soybean Oil-15559244201', 'Active', '2019-04-22 03:13:40', '2019-04-22 03:13:40'),
(304, '20', '12', 'Soybean Oil-15559244212', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(305, '20', '12', 'Soybean Oil-15559244213', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(306, '20', '12', 'Soybean Oil-15559244214', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(307, '20', '12', 'Soybean Oil-15559244215', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(308, '20', '12', 'Soybean Oil-15559244216', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(309, '20', '12', 'Soybean Oil-15559244217', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(310, '20', '12', 'Soybean Oil-15559244218', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(311, '20', '12', 'Soybean Oil-15559244219', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(312, '20', '12', 'Soybean Oil-155592442110', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(313, '20', '12', 'Soybean Oil-155592442111', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(314, '20', '12', 'Soybean Oil-155592442112', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(315, '20', '12', 'Soybean Oil-155592442113', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(316, '20', '12', 'Soybean Oil-155592442114', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(317, '20', '12', 'Soybean Oil-155592442115', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(318, '20', '12', 'Soybean Oil-155592442116', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(319, '20', '12', 'Soybean Oil-155592442117', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(320, '20', '12', 'Soybean Oil-155592442118', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(321, '20', '12', 'Soybean Oil-155592442119', 'Active', '2019-04-22 03:13:41', '2019-04-22 03:13:41'),
(322, '20', '12', 'Soybean Oil-155592442220', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(323, '20', '12', 'Soybean Oil-155592442221', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(324, '20', '12', 'Soybean Oil-155592442222', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(325, '20', '12', 'Soybean Oil-155592442223', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(326, '20', '12', 'Soybean Oil-155592442224', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(327, '21', '13', 'Sorisa Oil-15559244220', 'Inactive', '2019-04-22 03:13:42', '2019-04-24 10:28:22'),
(328, '21', '13', 'Sorisa Oil-15559244221', 'Inactive', '2019-04-22 03:13:42', '2019-04-24 10:28:22'),
(329, '21', '13', 'Sorisa Oil-15559244222', 'Inactive', '2019-04-22 03:13:42', '2019-04-24 10:28:22'),
(330, '21', '13', 'Sorisa Oil-15559244223', 'Inactive', '2019-04-22 03:13:42', '2019-04-24 10:28:22'),
(331, '21', '13', 'Sorisa Oil-15559244224', 'Inactive', '2019-04-22 03:13:42', '2019-04-24 10:28:22'),
(332, '21', '13', 'Sorisa Oil-15559244225', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(333, '21', '13', 'Sorisa Oil-15559244226', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(334, '21', '13', 'Sorisa Oil-15559244227', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(335, '21', '13', 'Sorisa Oil-15559244228', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(336, '21', '13', 'Sorisa Oil-15559244229', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(337, '21', '13', 'Sorisa Oil-155592442210', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(338, '21', '13', 'Sorisa Oil-155592442211', 'Active', '2019-04-22 03:13:42', '2019-04-22 03:13:42'),
(339, '21', '13', 'Sorisa Oil-155592442312', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(340, '21', '13', 'Sorisa Oil-155592442313', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(341, '21', '13', 'Sorisa Oil-155592442314', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(342, '21', '13', 'Sorisa Oil-155592442315', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(343, '21', '13', 'Sorisa Oil-155592442316', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(344, '21', '13', 'Sorisa Oil-155592442317', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(345, '21', '13', 'Sorisa Oil-155592442318', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(346, '21', '13', 'Sorisa Oil-155592442319', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(347, '21', '13', 'Sorisa Oil-155592442320', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(348, '21', '13', 'Sorisa Oil-155592442321', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(349, '21', '13', 'Sorisa Oil-155592442322', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(350, '21', '13', 'Sorisa Oil-155592442323', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(351, '21', '13', 'Sorisa Oil-155592442324', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(352, '21', '13', 'Sorisa Oil-155592442325', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(353, '21', '13', 'Sorisa Oil-155592442326', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(354, '21', '13', 'Sorisa Oil-155592442327', 'Active', '2019-04-22 03:13:43', '2019-04-22 03:13:43'),
(355, '21', '13', 'Sorisa Oil-155592442428', 'Active', '2019-04-22 03:13:44', '2019-04-22 03:13:44'),
(356, '21', '13', 'Sorisa Oil-155592442429', 'Active', '2019-04-22 03:13:44', '2019-04-22 03:13:44'),
(357, '21', '13', 'Sorisa Oil-155592442430', 'Active', '2019-04-22 03:13:44', '2019-04-22 03:13:44'),
(358, '21', '13', 'Sorisa Oil-155592442431', 'Active', '2019-04-22 03:13:44', '2019-04-22 03:13:44'),
(359, '21', '13', 'Sorisa Oil-155592442432', 'Active', '2019-04-22 03:13:44', '2019-04-22 03:13:44'),
(360, '21', '13', 'Sorisa Oil-155592442433', 'Active', '2019-04-22 03:13:44', '2019-04-22 03:13:44'),
(361, '21', '13', 'Sorisa Oil-155592442434', 'Active', '2019-04-22 03:13:44', '2019-04-22 03:13:44'),
(362, '22', '14', 'Mum Water-15564763800', 'Inactive', '2019-04-28 12:33:00', '2019-04-30 05:55:15'),
(363, '22', '14', 'Mum Water-15564763801', 'Inactive', '2019-04-28 12:33:00', '2019-04-30 05:55:15'),
(364, '22', '14', 'Mum Water-15564763802', 'Inactive', '2019-04-28 12:33:00', '2019-05-04 00:01:27'),
(365, '22', '14', 'Mum Water-15564763803', 'Inactive', '2019-04-28 12:33:00', '2019-05-04 00:01:27'),
(366, '22', '14', 'Mum Water-15564763804', 'Inactive', '2019-04-28 12:33:00', '2019-05-04 00:01:27'),
(367, '22', '14', 'Mum Water-15564763805', 'Inactive', '2019-04-28 12:33:00', '2019-05-04 00:01:28'),
(368, '22', '14', 'Mum Water-15564763806', 'Active', '2019-04-28 12:33:00', '2019-04-28 12:33:00'),
(369, '22', '14', 'Mum Water-15564763817', 'Active', '2019-04-28 12:33:01', '2019-04-28 12:33:01'),
(370, '22', '14', 'Mum Water-15564763818', 'Active', '2019-04-28 12:33:01', '2019-04-28 12:33:01'),
(371, '22', '14', 'Mum Water-15564763819', 'Active', '2019-04-28 12:33:01', '2019-04-28 12:33:01'),
(372, '23', '8', 'Minicate Chal-15569496160', 'Active', '2019-05-04 00:00:16', '2019-05-04 00:00:16'),
(373, '23', '8', 'Minicate Chal-15569496161', 'Active', '2019-05-04 00:00:16', '2019-05-04 00:00:16'),
(374, '23', '8', 'Minicate Chal-15569496172', 'Active', '2019-05-04 00:00:17', '2019-05-04 00:00:17'),
(375, '23', '8', 'Minicate Chal-15569496173', 'Active', '2019-05-04 00:00:17', '2019-05-04 00:00:17'),
(376, '23', '8', 'Minicate Chal-15569496174', 'Active', '2019-05-04 00:00:17', '2019-05-04 00:00:17'),
(377, '23', '8', 'Minicate Chal-15569496175', 'Active', '2019-05-04 00:00:17', '2019-05-04 00:00:17'),
(378, '23', '8', 'Minicate Chal-15569496176', 'Active', '2019-05-04 00:00:17', '2019-05-04 00:00:17'),
(379, '23', '8', 'Minicate Chal-15569496177', 'Active', '2019-05-04 00:00:17', '2019-05-04 00:00:17'),
(380, '23', '8', 'Minicate Chal-15569496178', 'Active', '2019-05-04 00:00:17', '2019-05-04 00:00:17'),
(381, '23', '8', 'Minicate Chal-15569496179', 'Active', '2019-05-04 00:00:17', '2019-05-04 00:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `sales_main`
--

CREATE TABLE `sales_main` (
  `sales_main_id` bigint(20) UNSIGNED NOT NULL,
  `sales_main_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_main_customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_main`
--

INSERT INTO `sales_main` (`sales_main_id`, `sales_main_date`, `sales_main_customer`, `created_at`, `updated_at`) VALUES
(1, '2019-04-22', '2', '2019-04-22 10:40:36', '2019-04-22 10:40:36'),
(2, '2019-04-22', '2', '2019-04-22 10:42:07', '2019-04-22 10:42:07'),
(3, '2019-04-22', 'Walk On', '2019-04-22 10:43:58', '2019-04-22 10:43:58'),
(4, '2019-04-22', '2', '2019-04-22 11:02:43', '2019-04-22 11:02:43'),
(5, '2019-04-22', '2', '2019-04-22 11:03:35', '2019-04-22 11:03:35'),
(6, '2019-04-22', '2', '2019-04-22 11:04:57', '2019-04-22 11:04:57'),
(7, '2019-04-22', '2', '2019-04-22 11:05:14', '2019-04-22 11:05:14'),
(8, '2019-04-22', '2', '2019-04-22 11:11:57', '2019-04-22 11:11:57'),
(9, '2019-04-22', '2', '2019-04-22 11:12:43', '2019-04-22 11:12:43'),
(10, '2019-04-09', '2', '2019-04-22 12:29:43', '2019-04-22 12:29:43'),
(11, '2019-04-09', '2', '2019-04-22 12:30:38', '2019-04-22 12:30:38'),
(12, '2019-04-23', '2', '2019-04-22 12:31:14', '2019-04-22 12:31:14'),
(13, '2019-04-23', '2', '2019-04-22 12:32:46', '2019-04-22 12:32:46'),
(14, '2019-04-23', '2', '2019-04-22 12:33:29', '2019-04-22 12:33:29'),
(15, '2019-04-16', '2', '2019-04-22 12:40:27', '2019-04-22 12:40:27'),
(16, '2019-04-16', '2', '2019-04-22 12:40:43', '2019-04-22 12:40:43'),
(17, '2019-04-16', '2', '2019-04-22 12:41:33', '2019-04-22 12:41:33'),
(18, '2019-04-23', '2', '2019-04-22 12:47:47', '2019-04-22 12:47:47'),
(19, '2019-04-23', '2', '2019-04-22 12:51:56', '2019-04-22 12:51:56'),
(20, '2019-04-23', '2', '2019-04-22 12:54:14', '2019-04-22 12:54:14'),
(21, '2019-04-23', '2', '2019-04-22 13:00:51', '2019-04-22 13:00:51'),
(22, '2019-04-23', '2', '2019-04-22 13:01:44', '2019-04-22 13:01:44'),
(23, '2019-04-23', '2', '2019-04-22 13:02:43', '2019-04-22 13:02:43'),
(24, '2019-04-23', '2', '2019-04-22 13:22:18', '2019-04-22 13:22:18'),
(25, '2019-04-23', '2', '2019-04-22 13:25:10', '2019-04-22 13:25:10'),
(26, '2019-04-23', '2', '2019-04-22 13:25:21', '2019-04-22 13:25:21'),
(27, '2019-04-23', 'Walk On', '2019-04-22 13:26:16', '2019-04-22 13:26:16'),
(28, '2019-04-23', 'Walk On', '2019-04-22 13:28:38', '2019-04-22 13:28:38'),
(29, '2019-04-23', 'Walk On', '2019-04-22 13:28:57', '2019-04-22 13:28:57'),
(30, '2019-04-23', 'Walk On', '2019-04-22 13:29:38', '2019-04-22 13:29:38'),
(31, '2019-04-23', 'Walk On', '2019-04-22 13:30:07', '2019-04-22 13:30:07'),
(32, '2019-04-23', 'Walk On', '2019-04-22 13:30:15', '2019-04-22 13:30:15'),
(33, '2019-04-23', 'Walk On', '2019-04-22 13:31:31', '2019-04-22 13:31:31'),
(34, '2019-04-23', 'Walk On', '2019-04-22 13:32:40', '2019-04-22 13:32:40'),
(35, '2019-04-23', 'Walk On', '2019-04-22 13:33:56', '2019-04-22 13:33:56'),
(36, '2019-04-23', 'Walk On', '2019-04-22 13:34:14', '2019-04-22 13:34:14'),
(37, '2019-04-23', 'Walk On', '2019-04-22 13:34:36', '2019-04-22 13:34:36'),
(38, '2019-04-24', 'Walk On', '2019-04-22 13:36:05', '2019-04-22 13:36:05'),
(39, '2019-04-24', 'Walk On', '2019-04-23 15:21:55', '2019-04-23 15:21:55'),
(40, '2019-04-24', '2', '2019-04-23 15:43:35', '2019-04-23 15:43:35'),
(41, '2019-04-25', '2', '2019-04-24 10:28:22', '2019-04-24 10:28:22'),
(42, '2019-04-24', '2', '2019-04-24 10:33:07', '2019-04-24 10:33:07'),
(43, '2019-04-29', 'Walk On', '2019-04-28 13:47:37', '2019-04-28 13:47:37'),
(44, '2019-04-30', '2', '2019-04-30 05:55:15', '2019-04-30 05:55:15'),
(45, '2019-05-04', '2', '2019-05-03 23:34:38', '2019-05-03 23:34:38'),
(46, '2019-05-04', '2', '2019-05-04 00:01:27', '2019-05-04 00:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

CREATE TABLE `sales_product` (
  `sales_product_id` bigint(20) UNSIGNED NOT NULL,
  `sales_main_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_product`
--

INSERT INTO `sales_product` (`sales_product_id`, `sales_main_id`, `product_name`, `quantity`, `unit_cost`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, '1', '8', '5', '250', '1250', '2019-04-22 10:40:36', '2019-04-22 10:40:36'),
(2, '2', '8', '5', '250', '1250', '2019-04-22 10:42:07', '2019-04-22 10:42:07'),
(3, '3', '8', '5', '250', '1250', '2019-04-22 10:43:59', '2019-04-22 10:43:59'),
(4, '4', '8', '5', '250', '1250', '2019-04-22 11:02:43', '2019-04-22 11:02:43'),
(5, '5', '8', '5', '250', '1250', '2019-04-22 11:03:35', '2019-04-22 11:03:35'),
(6, '6', '8', '5', '250', '1250', '2019-04-22 11:04:57', '2019-04-22 11:04:57'),
(7, '7', '9', '1', '300', '300', '2019-04-22 11:05:14', '2019-04-22 11:05:14'),
(8, '8', '8', '2', '250', '500', '2019-04-22 11:11:57', '2019-04-22 11:11:57'),
(9, '9', '8', '2', '250', '500', '2019-04-22 11:12:43', '2019-04-22 11:12:43'),
(10, '9', '9', '2', '300', '600', '2019-04-22 11:12:43', '2019-04-22 11:12:43'),
(11, '9', '10', '3', '100', '300', '2019-04-22 11:12:43', '2019-04-22 11:12:43'),
(12, '9', '11', '1', '120', '120', '2019-04-22 11:12:43', '2019-04-22 11:12:43'),
(13, '10', '9', '5', '300', '1500', '2019-04-22 12:29:44', '2019-04-22 12:29:44'),
(14, '11', '9', '5', '300', '1500', '2019-04-22 12:30:38', '2019-04-22 12:30:38'),
(15, '12', '8', '3', '250', '750', '2019-04-22 12:31:14', '2019-04-22 12:31:14'),
(16, '13', '9', '5', '300', '1500', '2019-04-22 12:32:47', '2019-04-22 12:32:47'),
(17, '14', '10', '5', '100', '500', '2019-04-22 12:33:29', '2019-04-22 12:33:29'),
(18, '15', '9', '5', '300', '1500', '2019-04-22 12:40:27', '2019-04-22 12:40:27'),
(19, '16', '9', '5', '300', '1500', '2019-04-22 12:40:43', '2019-04-22 12:40:43'),
(20, '17', '9', '5', '300', '1500', '2019-04-22 12:41:33', '2019-04-22 12:41:33'),
(21, '18', '8', '5', '250', '1250', '2019-04-22 12:47:48', '2019-04-22 12:47:48'),
(22, '19', '9', '5', '300', '1500', '2019-04-22 12:51:56', '2019-04-22 12:51:56'),
(23, '20', '8', '10', '250', '2500', '2019-04-22 12:54:14', '2019-04-22 12:54:14'),
(24, '21', '8', '5', '250', '1250', '2019-04-22 13:00:51', '2019-04-22 13:00:51'),
(25, '22', '10', '5', '100', '500', '2019-04-22 13:01:44', '2019-04-22 13:01:44'),
(26, '23', '8', '5', '250', '1250', '2019-04-22 13:02:43', '2019-04-22 13:02:43'),
(27, '24', '8', '5', '250', '1250', '2019-04-22 13:22:18', '2019-04-22 13:22:18'),
(28, '26', '8', '5', '250', '1250', '2019-04-22 13:25:21', '2019-04-22 13:25:21'),
(29, '27', '9', '2', '300', '600', '2019-04-22 13:26:16', '2019-04-22 13:26:16'),
(30, '27', '10', '3', '100', '300', '2019-04-22 13:26:16', '2019-04-22 13:26:16'),
(31, '28', '9', '2', '300', '600', '2019-04-22 13:28:38', '2019-04-22 13:28:38'),
(32, '29', '9', '2', '300', '600', '2019-04-22 13:28:57', '2019-04-22 13:28:57'),
(33, '30', '9', '2', '300', '600', '2019-04-22 13:29:38', '2019-04-22 13:29:38'),
(34, '31', '9', '2', '300', '600', '2019-04-22 13:30:07', '2019-04-22 13:30:07'),
(35, '32', '9', '2', '300', '600', '2019-04-22 13:30:15', '2019-04-22 13:30:15'),
(36, '32', '10', '3', '100', '300', '2019-04-22 13:30:15', '2019-04-22 13:30:15'),
(37, '33', '9', '2', '300', '600', '2019-04-22 13:31:31', '2019-04-22 13:31:31'),
(38, '34', '9', '2', '300', '600', '2019-04-22 13:32:41', '2019-04-22 13:32:41'),
(39, '34', '10', '3', '100', '300', '2019-04-22 13:32:41', '2019-04-22 13:32:41'),
(40, '35', '9', '2', '300', '600', '2019-04-22 13:33:56', '2019-04-22 13:33:56'),
(41, '35', '10', '3', '100', '300', '2019-04-22 13:33:56', '2019-04-22 13:33:56'),
(42, '36', '9', '2', '300', '600', '2019-04-22 13:34:14', '2019-04-22 13:34:14'),
(43, '36', '10', '3', '100', '300', '2019-04-22 13:34:14', '2019-04-22 13:34:14'),
(44, '37', '9', '2', '300', '600', '2019-04-22 13:34:37', '2019-04-22 13:34:37'),
(45, '37', '10', '3', '100', '300', '2019-04-22 13:34:37', '2019-04-22 13:34:37'),
(46, '38', '8', '10', '250', '2500', '2019-04-22 13:36:05', '2019-04-22 13:36:05'),
(47, '38', '9', '20', '300', '6000', '2019-04-22 13:36:06', '2019-04-22 13:36:06'),
(48, '39', '8', '4', '250', '1000', '2019-04-23 15:21:55', '2019-04-23 15:21:55'),
(49, '40', '8', '5', '250', '1250', '2019-04-23 15:43:35', '2019-04-23 15:43:35'),
(50, '41', '13', '5', '200', '1000', '2019-04-24 10:28:22', '2019-04-24 10:28:22'),
(51, '42', '8', '2', '250', '500', '2019-04-24 10:33:08', '2019-04-24 10:33:08'),
(52, '42', '10', '3', '100', '300', '2019-04-24 10:33:08', '2019-04-24 10:33:08'),
(53, '42', '9', '3', '300', '900', '2019-04-24 10:33:08', '2019-04-24 10:33:08'),
(54, '43', '8', '2', '250', '500', '2019-04-28 13:47:37', '2019-04-28 13:47:37'),
(55, '44', '14', '2', '30', '60', '2019-04-30 05:55:15', '2019-04-30 05:55:15'),
(56, '45', '8', '2', '250', '500', '2019-05-03 23:34:39', '2019-05-03 23:34:39'),
(57, '46', '8', '5', '250', '1250', '2019-05-04 00:01:27', '2019-05-04 00:01:27'),
(58, '46', '14', '4', '30', '120', '2019-05-04 00:01:27', '2019-05-04 00:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `sales_product_pricing`
--

CREATE TABLE `sales_product_pricing` (
  `sales_product_pricing_id` bigint(20) UNSIGNED NOT NULL,
  `sales_main_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_pay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_due` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_product_pricing`
--

INSERT INTO `sales_product_pricing` (`sales_product_pricing_id`, `sales_main_id`, `sales_product_id`, `sales_total`, `sales_pay`, `sales_due`, `created_at`, `updated_at`) VALUES
(1, '2', '2', '1250', '1250', '0', '2019-04-22 10:42:08', '2019-04-22 10:42:08'),
(2, '9', '12', '1520', '1520', '0', '2019-04-22 11:12:44', '2019-04-22 11:12:44'),
(3, '14', '17', '500', '500', '0', '2019-04-22 12:33:30', '2019-04-22 12:33:30'),
(4, '18', '21', '1250', '1250', '0', '2019-04-22 12:47:48', '2019-04-22 12:47:48'),
(5, '19', '22', '1500', '1500', '0', '2019-04-22 12:51:56', '2019-04-22 12:51:56'),
(6, '20', '23', '2500', '2500', '0', '2019-04-22 12:54:14', '2019-04-22 12:54:14'),
(7, '21', '24', '1250', '1250', '0', '2019-04-22 13:00:52', '2019-04-22 13:00:52'),
(8, '22', '25', '500', '500', '0', '2019-04-22 13:01:44', '2019-04-22 13:01:44'),
(9, '23', '26', '1250', '1250', '0', '2019-04-22 13:02:43', '2019-04-22 13:02:43'),
(10, '24', '27', '1250', '1250', '0', '2019-04-22 13:22:19', '2019-04-22 13:22:19'),
(11, '26', '28', '1250', '1250', '0', '2019-04-22 13:25:21', '2019-04-22 13:25:21'),
(12, '27', '30', '900', '900', '0', '2019-04-22 13:26:16', '2019-04-22 13:26:16'),
(13, '32', '36', '900', '900', '0', '2019-04-22 13:30:15', '2019-04-22 13:30:15'),
(14, '34', '39', '900', '900', '0', '2019-04-22 13:32:41', '2019-04-22 13:32:41'),
(15, '35', '41', '900', '900', '0', '2019-04-22 13:33:56', '2019-04-22 13:33:56'),
(16, '36', '43', '900', '900', '0', '2019-04-22 13:34:14', '2019-04-22 13:34:14'),
(17, '37', '45', '900', '900', '0', '2019-04-22 13:34:37', '2019-04-22 13:34:37'),
(18, '38', '47', '8500', '8500', '0', '2019-04-22 13:36:07', '2019-04-22 13:36:07'),
(19, '39', '48', '1000', '1000', '0', '2019-04-23 15:21:56', '2019-04-23 15:21:56'),
(20, '40', '49', '1250', '1250', '0', '2019-04-23 15:43:36', '2019-04-23 15:43:36'),
(21, '41', '50', '1000', '1000', '0', '2019-04-24 10:28:23', '2019-04-24 10:28:23'),
(22, '42', '53', '1700', '1700', '0', '2019-04-24 10:33:08', '2019-04-24 10:33:08'),
(23, '43', '54', '500', '500', '0', '2019-04-28 13:47:38', '2019-04-28 13:47:38'),
(24, '44', '55', '60', '60', '0', '2019-04-30 05:55:15', '2019-04-30 05:55:15'),
(25, '45', '56', '500', '500', '0', '2019-05-03 23:34:39', '2019-05-03 23:34:39'),
(26, '46', '58', '1370', '1370', '0', '2019-05-04 00:01:28', '2019-05-04 00:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `category_name`, `sub_category_code`, `sub_category_description`, `sub_category_status`, `created_at`, `updated_at`) VALUES
(4, 'Shirt', '11', '101', 'Shirt', 'Active', '2019-04-04 12:59:02', '2019-04-04 12:59:02'),
(5, 'Minicate', '19', '101-1', 'Minicate', 'Active', '2019-04-14 09:47:15', '2019-04-14 09:47:15'),
(6, 'Pari', '19', '101-2', 'Pari', 'Active', '2019-04-14 09:47:41', '2019-04-14 09:47:41'),
(7, 'Moshur Dhal', '20', '102-1', 'Moshur Dhal', 'Active', '2019-04-14 09:48:29', '2019-04-14 09:48:29'),
(8, 'Khesari Dal', '20', '102-2', 'Khesari Dal', 'Active', '2019-04-14 09:49:13', '2019-04-14 09:49:13'),
(9, 'Mug Dal', '20', '102-3', 'Mug Dal', 'Active', '2019-04-14 09:50:01', '2019-04-14 09:50:01'),
(10, 'Soybean Oil', '21', '103-1', 'Soybean Oil', 'Active', '2019-04-14 09:54:22', '2019-04-14 09:54:22'),
(11, 'Sorisa Oil', '21', '103-2', 'Sorisa Oil', 'Active', '2019-04-14 09:55:14', '2019-04-14 09:55:14'),
(12, 'Cinigura', '19', '101-3', 'Cinigura Chal', 'Active', '2019-04-14 10:09:17', '2019-04-14 10:09:17'),
(13, 'Mum Water', '22', '4564', 'Mum Water', 'Active', '2019-04-28 12:30:06', '2019-04-28 12:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `suplier_id` bigint(20) UNSIGNED NOT NULL,
  `suplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_account_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_opening_balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`suplier_id`, `suplier_name`, `suplier_phone`, `suplier_address`, `suplier_account_no`, `suplier_opening_balance`, `suplier_image`, `created_at`, `updated_at`) VALUES
(1, 'Niloy', '0175378457', 'Mirpur,Dhaka', '8235892875', '****', 'http://127.0.0.1:8000/backend_asset/images/suplier/1553695368.png', '2019-03-27 08:02:48', '2019-04-14 10:50:08'),
(3, 'Shakil', '4892581893', 'Mirpur,Dhaka', '4892184922', '*****', 'http://127.0.0.1:8000/backend_asset/images/suplier/1553699379.png', '2019-03-27 09:05:32', '2019-04-14 10:50:53');

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
  `user_branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_branch`, `user_address`, `user_status`, `user_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Mahedi Hasan', 'mahadih727@gmail.com', NULL, '$2y$10$AsVG9EFY02iJEuO1NcvEH.KWeYy0kigHx0mvgiFcr0wy/4Bo.8ptS', '', '', '', '', 'Qvy5OlPZ4J562RBm39TIwhFDerhrd5K6wdVmG6U00h9aGg5fcs8uFGXgDpg7', '2019-04-23 11:29:08', '2019-04-23 11:29:08'),
(9, 'Shakil Ahmmed', 'shakilfci461@gmail.com', NULL, '$2y$10$VDWDQRx7qN7YuHztOyC43eDjBCGq2HbgN2w75sGUkCFQUgYgk5wCa', 'Dhaka', 'Dhaka, Bangladesh', 'Active', 'backend_asset/images/user/1556914540.jpg', NULL, '2019-05-03 14:15:40', '2019-05-03 14:15:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product_template`
--
ALTER TABLE `product_template`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase_main`
--
ALTER TABLE `purchase_main`
  ADD PRIMARY KEY (`product_main_id`);

--
-- Indexes for table `purchase_pricing`
--
ALTER TABLE `purchase_pricing`
  ADD PRIMARY KEY (`purchase_pricing_id`);

--
-- Indexes for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`purchase_product_id`);

--
-- Indexes for table `purchase_stock`
--
ALTER TABLE `purchase_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `sales_main`
--
ALTER TABLE `sales_main`
  ADD PRIMARY KEY (`sales_main_id`);

--
-- Indexes for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD PRIMARY KEY (`sales_product_id`);

--
-- Indexes for table `sales_product_pricing`
--
ALTER TABLE `sales_product_pricing`
  ADD PRIMARY KEY (`sales_product_pricing_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_template`
--
ALTER TABLE `product_template`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase_main`
--
ALTER TABLE `purchase_main`
  MODIFY `product_main_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `purchase_pricing`
--
ALTER TABLE `purchase_pricing`
  MODIFY `purchase_pricing_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchase_product`
--
ALTER TABLE `purchase_product`
  MODIFY `purchase_product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchase_stock`
--
ALTER TABLE `purchase_stock`
  MODIFY `stock_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT for table `sales_main`
--
ALTER TABLE `sales_main`
  MODIFY `sales_main_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sales_product`
--
ALTER TABLE `sales_product`
  MODIFY `sales_product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `sales_product_pricing`
--
ALTER TABLE `sales_product_pricing`
  MODIFY `sales_product_pricing_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `suplier_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
