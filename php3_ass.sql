-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2022 lúc 11:20 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php3_ass`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 11', '2022-11-23 18:25:28', '2022-11-23 18:25:28'),
(2, 'Iphone 12', '2022-11-23 18:25:42', '2022-11-23 18:25:42'),
(3, 'Iphone 13', '2022-11-23 18:25:48', '2022-11-23 18:25:48'),
(26, 'Iphone 14', '2022-11-26 19:48:52', '2022-11-26 19:48:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_banner`
--

CREATE TABLE `images_banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images_banner`
--

INSERT INTO `images_banner` (`id`, `name`, `url`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Tưng bừng ra mắt sản phẩm mới', 'image/1669687652_slider20.jpg', 1, '2022-11-28 19:07:32', '2022-11-28 19:07:32'),
(8, 'Sale sốc black friday', 'image/1669689519_slider1.jpg', 1, '2022-11-28 19:09:11', '2022-11-28 19:09:11'),
(9, 'apple iphone 6s', 'image/1669690355_slider12.jpg', 1, '2022-11-28 19:50:04', '2022-11-28 19:50:04'),
(10, 'Sale sốc black friday 2022', 'image/1669719065_slider10.jpg', 1, '2022-11-29 03:51:05', '2022-11-29 03:51:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_product`
--

CREATE TABLE `images_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date_` date NOT NULL,
  `total_money` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `status`, `order_date`, `delivery_date_`, `total_money`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-11-12', '2022-11-16', 9800000, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_11_21_140403_create_roles_table', 1),
(18, '2022_11_21_140452_create_categories_table', 1),
(19, '2022_11_21_140548_create_products_table', 1),
(20, '2022_11_21_141013_create_promotions_table', 1),
(21, '2022_11_21_141344_create_images_product_table', 1),
(22, '2022_11_21_141457_create_invoices_table', 1),
(23, '2022_11_21_141836_create_invoice_detail_table', 1),
(24, '2022_11_21_142112_create_images_banner_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `main_image`, `quantity`, `detail`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 12 demo 001321', 8900000, 'image/1669784861_product13.jpg', 4, 'mota chi tiet hihihihahaha', 0, 2, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(2, 'Iphone 13 pro max like new 99%', 8900000, 'image/1669691471_productbig4.jpg', 4, 'mota chi tiet hihihihahaha', 0, 3, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(3, 'Iphone 13 pro max like new 99%', 8900000, 'image/1669691487_product2.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(4, 'Iphone 13 pro max like new 99%', 8900000, 'image/1669692112_productbig3.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(5, 'Iphone 13 pro max like new 99%', 8900000, 'image/1669692620_product9.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(6, 'Iphone 12 pro max like new 99%', 18900000, 'image/1669692629_product15.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:21:52', '2022-11-23 18:21:52'),
(7, 'Iphone 12 pro max like new 99%', 18900000, 'image/1669692641_product28.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:21:52', '2022-11-23 18:21:52'),
(8, 'Iphone 12 pro max like new 99%', 18900000, 'image/1669692649_product15.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:21:52', '2022-11-23 18:21:52'),
(9, 'Iphone 12 pro max like new 99%', 18900000, 'image/1669692688_product9.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:21:52', '2022-11-23 18:21:52'),
(10, 'Iphone 12 pro max like new 99%', 18900000, 'image/1669692702_product17.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:21:52', '2022-11-23 18:21:52'),
(11, 'Iphone 11 like new 99%', 8900000, 'image/1669692714_product19.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:23:10', '2022-11-23 18:23:10'),
(12, 'Iphone 11 like new 99%', 8900000, 'image/1669692726_product25.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:23:10', '2022-11-23 18:23:10'),
(13, 'Iphone 11 like new 99%', 8900000, 'image/1669692735_product5.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:23:10', '2022-11-23 18:23:10'),
(14, 'Iphone 11 like new 99%', 8900000, 'image/1669692750_product21.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:23:10', '2022-11-23 18:23:10'),
(15, 'Iphone 11 like new 99%', 8900000, 'image/1669692762_product23.jpg', 4, 'mota chi tiet hihihihahaha', 1, 3, '2022-11-23 18:23:10', '2022-11-23 18:23:10'),
(18, 'sp1', 1000000, 'image/1669704752_product15.jpg', 11111, 'mt1', 1, 26, '2022-11-28 23:52:32', '2022-11-28 23:52:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `status` int(11) DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `start_time`, `end_time`, `status`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'sale 20%', '2022-11-20', '2022-11-24', 1, 5, NULL, NULL),
(2, 'Nam đặng', '2022-11-21', '2022-12-21', 1, 1, '2022-11-25 21:07:37', '2022-11-25 21:07:37'),
(4, 'test', '2122-12-21', '2123-12-21', 0, 1, '2022-11-26 21:22:43', '2022-11-26 21:22:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-11-23 18:24:20', '2022-11-23 18:24:20'),
(2, 'Nhân viên', '2022-11-23 18:24:37', '2022-11-23 18:24:37'),
(3, 'Khách hàng', '2022-11-23 18:24:57', '2022-11-23 18:24:57'),
(6, 'admin123hic hihc sdfsdf as', '2022-11-26 20:25:42', '2022-11-26 20:25:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `status`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dang trung nam1212', 'namdt1@gmail.com', NULL, '$2y$10$pjDOZQL2LnB3wMl11wcLPe8rZD7lneiyA8O4eyq5jOHT5/9lyyKQC', 963926738, '22 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(2, 'Dang trung nam2', 'namdt2@gmail.com', NULL, '$2y$10$mutEHRRhpLNXwlC.fbtZ9..XT.aVefyaIu221DUeGrFhuU/mlPtRa', 963926732, '5 đường trịnh văn bô nam từ liêm hà nội', 0, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(3, 'Dang trung nam3', 'namdt3@gmail.com', NULL, '$2y$10$JJ4cixSABp22WFp6kWP.fuzZBCeJRy2CEPJg5b.BbmlAj0gRSbdUi', 963926772, '96 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(4, 'Dang trung nam4', 'namdt4@gmail.com', NULL, '$2y$10$ZMWj6P2lNRQOyG12br3IEOFYzB3CkQL6cVGgZDsqVaHBqjh/csXW2', 963926770, '39 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(5, 'Dang trung nam5', 'namdt5@gmail.com', NULL, '$2y$10$aPF5evPsIwR.6WyDMRRi1exNI9BfYWJuD.MyOMBDO7mtEPusXFnDG', 963926798, '70 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(6, 'Dang trung nam6', 'namdt6@gmail.com', NULL, '$2y$10$uWR3IcaEuYK2ZyDG5UXtku2cKQz71PYtTPz9LIyDUs7bIeikuC1VK', 963926721, '21 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(7, 'Dang trung nam7', 'namdt7@gmail.com', NULL, '$2y$10$/5RuNWSjNtKdEN35L0ZobeRin69zvLj.cIt6ijhVuXkU4wpppv8XW', 963926716, '4 đường trịnh văn bô nam từ liêm hà nội', 0, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(8, 'Dang trung nam8', 'namdt8@gmail.com', NULL, '$2y$10$g4/oNVcAci7MEa1gcbJF2OXrG921fVW4BNIJjSKy02.3aycWnVi9O', 963926777, '12 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(9, 'Dang trung nam9', 'namdt9@gmail.com', NULL, '$2y$10$BopIJF2PWsskBZApf4Dp4eYn5DDWZCmZ5ut1V.62wvcGy4Unb0HWm', 963926716, '69 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(10, 'Dang trung nam10', 'namdt10@gmail.com', NULL, '$2y$10$I9PpKRGCwPu4Z7XgkIwA4uv7yEGn2MKtNKVZ9xInzaJG.ZFiDov/e', 963926738, '46 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(11, 'Dang trung nam11', 'namdt11@gmail.com', NULL, '$2y$10$LviLSVXiTTVHznsQV8965uyFSYlzz5QbBudyUeNXeM3Dh.4L.xkrm', 963926766, '84 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(12, 'Dang trung nam12', 'namdt12@gmail.com', NULL, '$2y$10$v6lpayEPn5FV5INwL57YQOT1Ox6ewZnClU.583YFPH/gANyL7GSnK', 963926748, '90 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(13, 'Dang trung nam13', 'namdt13@gmail.com', NULL, '$2y$10$gmUgzC3PVRLgX4etfDEDqeFXMZ9Km4GmivwBK9n7V.95Fm/sOWFVO', 963926782, '68 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(14, 'Dang trung nam14', 'namdt14@gmail.com', NULL, '$2y$10$IPAvJAhv..SW1pUGQSQCY.L05V8kdjtrnOlrx7I/mkdwIFkgUEx9G', 963926737, '53 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(15, 'Dang trung nam15', 'namdt15@gmail.com', NULL, '$2y$10$57qn/Zvqz33qEWhKbkANVujbGZ7Sd6dbEeWJhnQM9SQB16qpNuGi6', 963926790, '83 đường trịnh văn bô nam từ liêm hà nội', 0, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(16, 'Dang trung nam16', 'namdt16@gmail.com', NULL, '$2y$10$.KSahtfz358TKhZiAsN5yeGYLYw.dVwKr1OMDBWdhIBYsYO8iUJda', 963926747, '84 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(17, 'Dang trung nam17', 'namdt17@gmail.com', NULL, '$2y$10$L0Qlnmt4TDxCFWiYcBdQHulxLX9buK9Mfxl.9RwXmVUWl.1YDfyke', 963926746, '28 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(18, 'Dang trung nam18', 'namdt18@gmail.com', NULL, '$2y$10$KrrNBX.Cc6jvp1boVRzT/.W8r4agweW4fkyRncLIcMT2c1UMbD4SK', 963926769, '14 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:01', '2022-11-23 18:20:01'),
(19, 'Dang trung nam19', 'namdt19@gmail.com', NULL, '$2y$10$dtsKOgtxOkzSQfUM5/fyxueA4vJDwLiMqwqCi3PsKxk9VMwPILfQK', 963926765, '85 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(20, 'Dang trung nam20', 'namdt20@gmail.com', NULL, '$2y$10$YXy7Mo73ryySqPm7oASr.eDPiKBHgu6s3G5zyJyy0pM3P98LptHgi', 963926716, '37 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(21, 'Dang trung nam21', 'namdt21@gmail.com', NULL, '$2y$10$cKMJkkrKWK6RFbSGpkeeQu2mnXQkBHk3oyVLaXcxGKgKgvTXDnuvm', 963926733, '11 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(22, 'Dang trung nam22', 'namdt22@gmail.com', NULL, '$2y$10$5BDk4Pss6F6L309pqSTBl.6oNU3mfkQL88AWBvsjUtQPpH27qBg3y', 963926737, '62 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(23, 'Dang trung nam23', 'namdt23@gmail.com', NULL, '$2y$10$lOzkpFGeRNVBA2rXLuoDL.3dmSmr0dqJXvzsIKoamLr8V21oBzhiO', 963926748, '50 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(24, 'Dang trung nam24', 'namdt24@gmail.com', NULL, '$2y$10$yD.Ql9WfirSqhLgumAyyAuDMfmtjiceDYkoTeYPHgomVX01r/QSw6', 963926783, '42 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(25, 'Dang trung nam25', 'namdt25@gmail.com', NULL, '$2y$10$Q3SlRtXVAE7ikcyZ.2uU9uIXeoUHMLYx3rc9kbBexi0MLUIwu59ei', 963926763, '73 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(26, 'Dang trung nam26', 'namdt26@gmail.com', NULL, '$2y$10$l4TyznLLxyc9d3t/H211tuP4cxhySjHP8vkyq.CGferV9pSCbCdSm', 963926725, '72 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(27, 'Dang trung nam27', 'namdt27@gmail.com', NULL, '$2y$10$ZCbGERxGhKmyRf9xTglhb.jkXwWWJaluiPswFjbxEdLVNwRgbk3wu', 963926745, '55 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(28, 'Dang trung nam28', 'namdt28@gmail.com', NULL, '$2y$10$t.nwRuGT5Fwqh9Tv0Myl1O./tGzRx8oYO./862ck0gAVvK.x6kCX2', 963926736, '40 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(29, 'Dang trung nam29', 'namdt29@gmail.com', NULL, '$2y$10$jn5e8pC4TddDtRdJvd756.PJrTeDZ8/v.QJhKxPhvM9Lihq9XqOAG', 963926739, '70 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(30, 'Dang trung nam30', 'namdt30@gmail.com', NULL, '$2y$10$mY.7pTUSOVN8nJ.83ZHYdOWwd4O650V3KyjmphqU0xXKbRFBbbY/u', 963926766, '1 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(31, 'Dang trung nam31', 'namdt31@gmail.com', NULL, '$2y$10$8o/drMiEjZ9ojDqLfBPBmuEI06cvFfN2D2rXoCHE7L8QVuTQDdzRC', 963926796, '47 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(32, 'Dang trung nam32', 'namdt32@gmail.com', NULL, '$2y$10$3AJIi10FPi1X6KTvqfmn/uOmfZLXBRQ0CPjh1uOTiA6oO.NaJjLga', 963926722, '84 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(33, 'Dang trung nam33', 'namdt33@gmail.com', NULL, '$2y$10$OooK8ENShE.t33CjEx3an.MfFPDzCjs3eGYXMfBk7FhoN7TxIn2Ym', 963926744, '3 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(34, 'Dang trung nam34', 'namdt34@gmail.com', NULL, '$2y$10$0Xp.QWCbnXaUdb.cHN528OclkXPahNY2kELn838WAmip0AzV2aNvu', 963926719, '28 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(35, 'Dang trung nam35', 'namdt35@gmail.com', NULL, '$2y$10$iQqMbUe1eSfxApCQs85VzuflBd4x8nwj6Thws6LVIeRaNdmwQ5K8a', 963926717, '31 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(36, 'Dang trung nam36', 'namdt36@gmail.com', NULL, '$2y$10$yjXopGAtinpvN5IZ3wBwy.6qE8rqbZc.UktyOHPKsJ8KLV1hMoRzW', 963926737, '14 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(37, 'Dang trung nam37', 'namdt37@gmail.com', NULL, '$2y$10$ICtqL3zAIhxBVGEbrPnP7elNiGGo/WX1YlZ2f2oIK2Sfc9Qwou9hy', 963926720, '75 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(38, 'Dang trung nam38', 'namdt38@gmail.com', NULL, '$2y$10$MBE1vvoANA/33tEiqcLgTOvV6RG9reg/xltO2Wo4Ow.CJTVLJiZF2', 963926757, '27 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:02', '2022-11-23 18:20:02'),
(39, 'Dang trung nam39', 'namdt39@gmail.com', NULL, '$2y$10$r.WzXqCdlOjh5dHasgrJueIDaD3o78va419fBlU68SttREYB1NJ6S', 963926712, '89 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(40, 'Dang trung nam40', 'namdt40@gmail.com', NULL, '$2y$10$mEy0dwpJAwgQAxc9QVXMxOSz7BZgMNhpibHNeZQj2clSZyV3Rz/wS', 963926713, '2 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(41, 'Dang trung nam41', 'namdt41@gmail.com', NULL, '$2y$10$gSHISYcJkdwrPlbOpzJnL.PKnqvV3FcLTWgXuplXKO/HjHPZ9nZd.', 963926746, '75 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(42, 'Dang trung nam42', 'namdt42@gmail.com', NULL, '$2y$10$OMdYBZC7Es85f.JzvGxhnueT5JQMHZy/Q8Dh5n7/1ncVacFOXBWm2', 963926721, '77 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(43, 'Dang trung nam43', 'namdt43@gmail.com', NULL, '$2y$10$CEPlz6KCnnCJPb2Bs2191elbIG3wCxP3b.X1umREfMZxR.art7iEu', 963926739, '16 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(44, 'Dang trung nam44', 'namdt44@gmail.com', NULL, '$2y$10$iOxtZmJ9YWbTMEwz79VWh.udz9euLKEcc8HTP8x9BR9sk71lDi9cK', 963926793, '37 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(45, 'Dang trung nam45', 'namdt45@gmail.com', NULL, '$2y$10$tZwcRwR/S7DZqIt3L8ZL3O0eOiNYfV4uud/hQWJZnbpr0HcWoVM8m', 963926724, '3 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(46, 'Dang trung nam46', 'namdt46@gmail.com', NULL, '$2y$10$baoTU93fVpocEnm.2unmh.J4HVAJOPAaQfWqE3I3WQSBsLqSMlcmG', 963926738, '39 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(47, 'Dang trung nam47', 'namdt47@gmail.com', NULL, '$2y$10$gtVjK9mjeTi8176YthOVlO2re2eYMcRIIaq5abcMmRsnsoYIuiyrO', 963926723, '9 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(48, 'Dang trung nam48', 'namdt48@gmail.com', NULL, '$2y$10$65cij.o142oyC1BP.LNiXeFaPmpaEg3zCZfARCz6hAwObqOPT7Vwe', 963926796, '17 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(49, 'Dang trung nam49', 'namdt49@gmail.com', NULL, '$2y$10$NMCqoQ9SasCNorhlvfXMfOejSZUkELwG94UguX8t4GAnrFVn9HMFq', 963926741, '67 đường trịnh văn bô nam từ liêm hà nội', 1, 1, NULL, '2022-11-23 18:20:03', '2022-11-23 18:20:03'),
(53, 'Nam  ádadasd', 'dangtrungnampt@gmail.com', NULL, '$2y$10$IynMhRq5piyX64paN0Q4JuyfM1KSk0Lw8f36l8ukHkNGcQ8r7Pfm2', 879759666, '173 phương canh nam từ liêm', 1, 2, NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `images_banner`
--
ALTER TABLE `images_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images_product`
--
ALTER TABLE `images_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images_banner`
--
ALTER TABLE `images_banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `images_product`
--
ALTER TABLE `images_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
