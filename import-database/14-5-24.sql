-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 08:01 AM
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
-- Database: `nas_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin1@gmail.com|127.0.0.1', 'i:1;', 1714652548),
('admin1@gmail.com|127.0.0.1:timer', 'i:1714652548;', 1714652548),
('raze@gmail.com|127.0.0.1', 'i:1;', 1714194840),
('raze@gmail.com|127.0.0.1:timer', 'i:1714194840;', 1714194840),
('user1@gmail.com|127.0.0.1', 'i:2;', 1714640278),
('user1@gmail.com|127.0.0.1:timer', 'i:1714640278;', 1714640278),
('user2@gmail.com|127.0.0.1', 'i:1;', 1714640301),
('user2@gmail.com|127.0.0.1:timer', 'i:1714640301;', 1714640301);

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_23_015953_create_products_table', 1),
(5, '2024_04_24_021243_alter_products_table', 1),
(6, '2024_04_25_143323_remove_prod_id_from_products', 1),
(7, '2024_04_26_085823_update__users_table', 1),
(8, '2024_04_27_072453_update_users_table2', 1),
(9, '2024_04_28_093103_create_carts_table', 1),
(10, '2024_05_07_090018_create_orders_table', 1),
(11, '2024_05_07_181342_create_order_items_table', 1),
(12, '2024_05_07_185233_create_payments_table', 1),
(13, '2024_05_11_041812_update_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_evidence` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `payment_evidence`, `created_at`, `updated_at`) VALUES
(10, 5, 1254.00, 'Payment Accepted', NULL, '2024-05-13 20:55:26', '2024-05-13 21:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `prod_title` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_per_item` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `prod_title`, `quantity`, `price_per_item`) VALUES
(5, 10, 7, 'Intel® Core™ i5-10400F / i5-10400 (6-Core/12-Threads) Intel Processor | Intel 10th Gen CPU (LGA1200)', 1, 605.00),
(6, 10, 8, 'Corsair Dominator Platinum RGB 32GB 3600Mhz AMD Ryzen DDR4 Desktop PC Ram', 1, 649.00);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_evidence` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_evidence`, `status`, `created_at`, `updated_at`) VALUES
(69, 10, 'payments/payment_69.png', 'Payment Accepted', '2024-05-13 20:57:06', '2024-05-13 21:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_title` varchar(255) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_brand` varchar(255) NOT NULL,
  `prod_type` varchar(255) NOT NULL,
  `prod_pic` varchar(255) NOT NULL,
  `prod_price` decimal(8,2) NOT NULL,
  `prod_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_title`, `prod_desc`, `prod_brand`, `prod_type`, `prod_pic`, `prod_price`, `prod_stock`) VALUES
(7, 'Intel® Core™ i5-10400F / i5-10400 (6-Core/12-Threads) Intel Processor | Intel 10th Gen CPU (LGA1200)', '==== Intel® Core™ i5-10400F ====\r\nPRODUCT LINE : 10th Generation Intel® Core™ i5 Processors\r\nCODE NAME : Comet Lake\r\nCPU CORES/THREADS : 6 Cores / 12 Threads\r\nMAX TURBO FREQ : 4.30 GHz\r\nBASE FREQ : 2.90 GHz\r\nCACHE : 12 MB Intel® Smart Cache\r\nBUS SPEED : 8 GT/s\r\nTDP : 65 W\r\nSYSTEM MEMORY : DDR4 (Up To 2666MHz / 128GB)\r\nSOCKET : LGA1200\r\nGRAPHICS : Discrete Graphics Card Required\r\n\r\n==== Intel® Core™ i5-10400 ====\r\n\r\nPRODUCT LINE : 10th Generation Intel® Core™ i5 Processors\r\nCODE NAME : Comet Lake\r\nCPU CORES/THREADS : 6 Cores / 12 Threads\r\nMAX TURBO FREQ : 4.30 GHz\r\nBASE FREQ : 2.90 GHz\r\nCACHE : 12 MB Intel® Smart Cache\r\nBUS SPEED : 8 GT/s\r\nTDP : 65 W\r\nSYSTEM MEMORY : DDR4 (Up To 2666MHz / 128GB)\r\nSOCKET : LGA1200\r\nGRAPHICS : Intel® UHD Graphics 630\r\n\r\nhttps://down-my.img.susercontent.com/file/my-11134207-7r98x-lm8er5qsgekz7f', 'intel', 'CPU', 'https://down-my.img.susercontent.com/file/my-11134207-7r98x-lm8er5qsgekz7f', 605.00, 10),
(8, 'Corsair Dominator Platinum RGB 32GB 3600Mhz AMD Ryzen DDR4 Desktop PC Ram', 'TECH SPECIFICATIONS\r\nFan Included No\r\nMemory Series DOMINATOR PLATINUM RGB\r\nMemory Type DDR4\r\nMemory Size 32GB Kit (2 x 16GB)\r\nTested Voltage 1.35V\r\nTested Speed 3600Mhz\r\nLED Lighting RGB\r\nSingle Zone / Multi-Zone Lighting Individually Addressable\r\nSPD Speed 2133MHz\r\nSPD Voltage 1.2V\r\nSpeed Rating PC4-25600 (3200MHz)/PC4-28800 (3600MHz)\r\nHeat Spreader Anodized Aluminum\r\nPackage Memory Format DIMM\r\nPerformance Profile XMP 2.0\r\nPackage Memory Pin 288\r\n\r\n\r\nPACKAGE CONTENT\r\n1x CORSAIR DOMINATOR PLATINUM RGB MEMORY MODULE', 'Corsair', 'RAM', 'https://down-my.img.susercontent.com/file/sg-11134201-7rced-lsle92yggkimd9', 649.00, 10),
(9, 'Gigabyte B760M AORUS ELITE AX D5 M-ATX Gaming Motherboard + Intel 12th & 14th Gen Processor Combo', 'B760M AORUS ELITE AX\n\n-Intel® Socket LGA 1700：Support 13th and 12th Gen Series Processors\n-Unparalleled Performance：Twin 12*+1+1 Phases Digital VRM Solution\n-Dual Channel DDR5：4*SMD DIMMs with XMP 3.0 Memory Module Support\n-Next Generation Storage：2*PCIe 4.0 x4 M.2 Connectors\n-Advanced Thermal Design & M.2 Thermal Guard ：To Ensure VRM Power Stability & M.2 SSD Performance\n-EZ-Latch Plus：M.2 Connectors with Quick Release & Screwless Design\n-Fast Networks： 2.5GbE LAN & Wi-Fi 6E 802.11ax\n-Extended Connectivity：Front USB-C® 10Gb/s, Rear USB-C® 20Gb/s, DP, HDMI\n-Smart Fan 6：Features Multiple Temperature Sensors, Hybrid Fan Headers with FAN STOP\n-Q-Flash Plus：Update BIOS Without Installing the CPU, Memory and Graphics Card\n* 6+6 phases parallel power design', 'Gigabyte', 'Motherboard', 'products/1.jpeg', 899.00, 8),
(10, 'ASUS ROG STRIX GeForce RTX4080 SUPER 16GB GDDR6X OC Edition GRAPHICS CARD ( ROG-STRIX-RTX4080S-O16G-GAMING )', 'ROG Strix GeForce RTX™ 4080 16GB GDDR6X OC Edition\r\n\r\nGraphic Engine:  NVIDIA® GeForce RTX™ 4080\r\nBus Standard:  PCI Express 4.0\r\nOpenGL: OpenGL®4.6\r\nVideo Memory: 16GB GDDR6X\r\nEngine Clock: OC mode: 2655 MHz \r\nDefault mode: 2625 MHz (Boost Clock)\r\nCUDA Core: 9728\r\nMemory Speed: 22.4 Gbps\r\nMemory Interface: 256-bit\r\nResolution: Digital Max Resolution 7680 x 4320\r\nInterface:\r\n - Yes x 2 (Native HDMI 2.1a)\r\n - Yes x 3 (Native DisplayPort 1.4a)\r\n - HDCP Support Yes (2.3)\r\nMaximum Display Support: 4\r\nNVlink/ Crossfire Support: No\r\nAccessories:\r\n - 1 x Collection Card​\r\n - 1 x Speedsetup Manual​\r\n - 1 x Adapter Cable​\r\n - 1 x ROG Graphics Card Holder\r\n - 1 x ROG Velcro Hook & Loop\r\n - 1 x Thank you Card\r\n\r\nSoftware: ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver\r\nDimensions: 357.6 x 149.3 x 70.1mm\r\nRecommended PSU: 750W\r\nPower Connectors:  1 x 16-pin\r\nSlot: 3.5 Slot', 'ROG', 'GPU', 'https://down-my.img.susercontent.com/file/my-11134207-7r98y-lrro7ger1uecd6', 6959.00, 5),
(11, 'MSI MPG Series 80+ GOLD Full Modular Power Supply - A750GF Black', '-Supports the NVIDIA GeForce RTX™ 30 Series GPUs\r\n-Full modular cable design\r\n-Flat cable equipment\r\n-10-year warranty\r\n-80 Plus Gold certified for high efficiency\r\n-100% all Japanese 105oC capacitor\r\n-Active PFC design\r\n-Industrial level protection with OVP,OCP,OPP,OTP, SCP,UVP\r\n-LLC Half Bridge Topology with DC-DC module design\r\n\r\nGPU SUPPORT FOR ALL\r\nThe MPG gaming power supply can support the NVIDIA GeForce RTX™ 30/20 Series and AMD GPUs. Prepared for the highest of requirements, the MPG power supply’s IO supports can support different and versatile ways of connection according to the power connector design of different graphics cards.\r\n\r\n80 PLUS GOLD CERTIFIED\r\nThe efficiency of your power supply directly influences your system’s performance and your power consumption. The 80 PLUS Gold certification promises lower energy consumption and higher efficiency.\r\n\r\nTRUSTWORTHY AND EFFICIENT\r\nThe MPG gaming power supply is proudly backed by a 10-year limited warranty, guaranteeing long term reliable operation.\r\n\r\n100% JAPANESE 105° C CAPACITORS\r\nAiming for unwavering product quality and performance stability, the MPG gaming power supply comes with 100% Japanese 105° C capacitors and solid capacitors.\r\n\r\nONLY WHAT YOU NEED\r\nOrganizing cables is often the most bothersome part of building a PC. With the MPG gaming power supply’s fully modular design, it means that only the connectors required by the build need to be used, significantly reducing cable clutter and simplifying the system’s overall build.\r\n\r\nALL THE MORE ORGANIZED\r\nAll of the MPG gaming power supply’s cables are flat and in black. The flat cables make cable management easier and less of headache! Thanks to the flat cables, the entire system can be more organized and has more room for unobstructed airflow. Use the cables you need, and store the rest in the included cable bag.\r\n\r\nFEELS RIGHT AT HOME\r\nThe MPG gaming power supply’s 160mm-long and 150mm-wide dimensions ensure a comfortable and easy fit in most PC cases, effectively providing more space for cable management and airflow to the rest of the system.', 'MSI', 'PSU', 'https://down-my.img.susercontent.com/file/my-11134207-7r98s-lmh5r7bzoyhid5\n', 499.00, 10),
(12, 'AIGO DarkFlash Twister DX240 240mm AIO aRGB CPU Liquid Cooler - White', '- Pure Copper Endothermic Block\n- Support 5v RGB Sync with Motherboard (aRGB) on Pump Head & Cooling Fan\n- Temperature Controlled 7 Blades Fan (800-2000RPM) with Noise Reduction Feature\n- Long Life Bearing Water Pump (2400±10%RPM) / 40,000hrs\n- High Density Sigmoidal Fins Radiator\n- Intel (LGA 775/115x/1200/1366/2011) & AMD (AM4/FM2/FM1/AM3/AM2)\n- Water Block Size: 75x75x53mm\n- Pump Speed: 2400±10%RPM\n- Pump Voltage: 12V\n- Radiator Size:274 x 120 x 27mm\n- Cooler Material:Aluminium\n- Noise Level: 23 dBA\n- Fan Size: 120x120x25mm\n- Air Flow:75.3 CFM\n- Bearing Type: Rifle Bearing\n\n2 Year Warranty', 'Aigo', 'CPU Cooler', 'products/images/12.jpg', 139.00, 10);

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nhGbz5hffVnwzZxWdsF9qoSZoNYazkQX3cia0ZkW', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia1pya29FdlhyRHFvSU15TUhoTW5DMFJ1OFAwVUxYV2ZKQ0VSZGZQVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlci9wYXltZW50LzEwL2ludm9pY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O30=', 1715666395),
('p0fh4c6ryyhtnxyfnvNtUoNAlXOT7ZF18prLtu1g', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWXN6RkUzMTE3bWlhcmlsUkUxd0k3OE8yMXZqMGJVMlFHZTFNN0FSSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vcmRlci9wYXltZW50LzEwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1715663281);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `user_type`, `phone_no`, `address`, `cart_id`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$rEolEzE8sNod2pEztFqu6u8W2wwoGdPKvNj20Mggj4ByaV3zbLf8K', NULL, 'admin', NULL, NULL, NULL, NULL, '2024-04-26 23:28:29', NULL),
(3, 'admin2@gmail.com', 'admin2@gmail.com', '$2y$12$s3xQTMyXxzsdreHTzCxnXu174d/ewFgVYEecNFAHB4ijFIQQVdPPu', NULL, 'admin', '0123456789', 'Jalan Admin 2', NULL, '2024-04-27 01:03:59', '2024-04-27 01:04:23', NULL),
(5, 'user5', 'user5@gmail.com', '$2y$12$wNPuQqn33qKSnyc59FgRv.Y9vKfiNuShViNEzN1zbnuPunMuNJLvK', NULL, 'user', '0133343212', 'U5, Jalan User 5, Shah Alam, 04800, Selangor', NULL, '2024-05-02 01:00:20', '2024-05-13 21:53:36', NULL),
(6, 'user6', 'user6@gmail.com', '$2y$12$4Xjxfw0pf53b2ktajNOTZOYr3tKfGqKIdyMZ6aFAHxXmvWjUm3nca', NULL, 'user', NULL, NULL, NULL, '2024-05-02 04:15:48', '2024-05-02 04:15:48', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
