-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 10:29 AM
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
-- Database: `helpsx_tally`
--

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `collection_id` bigint(20) UNSIGNED NOT NULL,
  `customar_id` varchar(50) DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`collection_id`, `customar_id`, `payment`, `created_at`, `updated_at`) VALUES
(1, '1', '1000', '2023-12-07 07:21:42', '2023-12-07 07:21:42'),
(2, '2', '5000', '2023-12-07 07:22:54', '2023-12-07 07:22:54'),
(3, '3', '1010', '2023-12-07 07:23:25', '2023-12-07 07:23:25'),
(4, '4', '13000', '2023-12-07 07:24:32', '2023-12-07 07:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `customars`
--

CREATE TABLE `customars` (
  `customar_id` bigint(20) UNSIGNED NOT NULL,
  `customar_name` varchar(50) DEFAULT NULL,
  `customar_phone` varchar(50) DEFAULT NULL,
  `customar_address` varchar(50) DEFAULT NULL,
  `customar_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customars`
--

INSERT INTO `customars` (`customar_id`, `customar_name`, `customar_phone`, `customar_address`, `customar_status`, `created_at`, `updated_at`) VALUES
(1, 'Ali Hasan', '+8801723629080', 'Behar hat, Shibgonj-Bogura', 1, '2023-12-07 07:21:42', '2023-12-07 07:21:42'),
(2, 'Rakib', '+8801723629080', 'Behar hat, Shibgonj-Bogura', 1, '2023-12-07 07:22:54', '2023-12-07 07:22:54'),
(3, 'Miraj', '+8801723629080', 'Behar hat, Shibgonj-Bogura', 1, '2023-12-07 07:23:25', '2023-12-07 07:23:25'),
(4, 'Tanvir', '+8801723629080', 'Behar hat, Shibgonj-Bogura', 1, '2023-12-07 07:24:32', '2023-12-07 07:24:32');

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
(5, '2023_12_02_202535_create_products_table', 1),
(6, '2023_12_02_202649_create_collections_table', 1),
(7, '2023_12_02_203731_create_customars_table', 1),
(8, '2023_12_02_204115_create_sales_table', 1),
(10, '2023_12_03_042351_create_statuses_table', 2),
(11, '2023_12_04_033650_create_s_orders_table', 3);

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
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `brand_name` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_des` varchar(255) DEFAULT NULL,
  `product_sku` varchar(50) DEFAULT NULL,
  `manufacturing_cost` varchar(50) DEFAULT NULL,
  `selling_price` varchar(50) DEFAULT NULL,
  `product_quantity` varchar(50) DEFAULT NULL,
  `product_img` varchar(255) DEFAULT NULL,
  `product_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_name`, `brand_name`, `product_name`, `product_des`, `product_sku`, `manufacturing_cost`, `selling_price`, `product_quantity`, `product_img`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'Apple', 'Apple Watch', 'Apple Watch', '54QWA5', '800', '1000', '10', '1701933294.png', 1, '2023-12-07 07:14:55', '2023-12-07 07:14:55'),
(2, 'Electronics', 'Acer', 'Asus Monitor', 'Monitor 22 Inch', '54QWA6', '900', '1000', '10', '1701933460.png', 1, '2023-12-07 07:17:40', '2023-12-07 07:17:40'),
(3, 'Electronics', 'Lenovo', 'Laptop', 'Lenovo Laptop', '54QWA7', '750', '1000', '10', '1701933549.png', 1, '2023-12-07 07:19:09', '2023-12-07 07:19:09'),
(4, 'Electronics', 'Canon', 'New Camrea', 'Canon Camrea', '54QWA8', '650', '1000', '10', '1701933611.webp', 1, '2023-12-07 07:20:11', '2023-12-07 07:20:11'),
(5, 'Electronics', 'Casio', 'Calculator', 'Calculator Casio', '54QWA9', '500', '1000', '10', '1701933667.png', 1, '2023-12-07 07:21:07', '2023-12-07 07:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `customar_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `customar_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2023-12-07 07:21:42', '2023-12-07 07:21:42'),
(2, '2', '2023-12-07 07:22:54', '2023-12-07 07:22:54'),
(3, '3', '2023-12-07 07:23:25', '2023-12-07 07:23:25'),
(4, '4', '2023-12-07 07:24:32', '2023-12-07 07:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', NULL, NULL),
(2, 'Inactive', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s_orders`
--

CREATE TABLE `s_orders` (
  `s_order_id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` varchar(50) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `customar_id` varchar(50) DEFAULT NULL,
  `order_quantity` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_orders`
--

INSERT INTO `s_orders` (`s_order_id`, `sales_id`, `product_id`, `customar_id`, `order_quantity`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', '2023-12-07 07:21:42', '2023-12-07 07:21:42'),
(2, '1', '2', '1', '1', '2023-12-07 07:21:42', '2023-12-07 07:21:42'),
(3, '2', '3', '2', '2', '2023-12-07 07:22:54', '2023-12-07 07:22:54'),
(4, '2', '4', '2', '3', '2023-12-07 07:22:54', '2023-12-07 07:22:54'),
(5, '2', '2', '2', '5', '2023-12-07 07:22:54', '2023-12-07 07:22:54'),
(6, '3', '3', '3', '1', '2023-12-07 07:23:25', '2023-12-07 07:23:25'),
(7, '4', '4', '4', '2', '2023-12-07 07:24:32', '2023-12-07 07:24:32'),
(8, '4', '2', '4', '3', '2023-12-07 07:24:32', '2023-12-07 07:24:32'),
(9, '4', '1', '4', '4', '2023-12-07 07:24:32', '2023-12-07 07:24:32'),
(10, '4', '3', '4', '1', '2023-12-07 07:24:32', '2023-12-07 07:24:32'),
(11, '4', '5', '4', '2', '2023-12-07 07:24:32', '2023-12-07 07:24:32');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali Hasan', 'infoalihasanbd@gmail.com', NULL, '$2y$12$CPG4HLFKye0OJ5Knajf8.eFQg54F3YxOtYECUjMst8kLjzKXVnOCC', NULL, '2023-12-02 22:01:56', '2023-12-02 22:01:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `customars`
--
ALTER TABLE `customars`
  ADD PRIMARY KEY (`customar_id`);

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
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_orders`
--
ALTER TABLE `s_orders`
  ADD PRIMARY KEY (`s_order_id`);

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
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `collection_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customars`
--
ALTER TABLE `customars`
  MODIFY `customar_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `s_orders`
--
ALTER TABLE `s_orders`
  MODIFY `s_order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
