-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 04:12 PM
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
-- Database: `alef_massage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `super_admin` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `status` int(10) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `shift_from` time DEFAULT NULL,
  `shift_to` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `super_admin`, `name`, `email`, `password`, `published`, `status`, `admin_id`, `created_at`, `updated_at`, `mobile`, `profile_img`, `role_id`, `shift_from`, `shift_to`) VALUES
(1, 1, 'Admin4', 'admin@admin.com', '$2y$10$f4NyRW5goSPTFT0MNLc3keOXURphttKRJhf9nNHMGsElfKiAb1LXe', 1, 1, 16, '2022-02-08 14:18:34', '2022-11-27 13:12:57', '01234567890', '1.jpg', 1, NULL, NULL),
(16, 1, 'mahmoud albaroody', 'mahmoud@alef.com', '$2y$10$PV0xzpW2PZVOS/CE66XbM.47YnRTafpW3DNoISd1nBRxhVMEKHUi.', 1, 1, 1, '2022-02-08 14:18:34', '2022-06-05 16:02:53', '01234567891', '1654437773.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `readed` int(11) NOT NULL DEFAULT 0,
  `relation_id` int(11) DEFAULT NULL,
  `relation_object` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`id`, `admin_id`, `message`, `created_at`, `updated_at`, `readed`, `relation_id`, `relation_object`, `message_ar`, `link`) VALUES
(1, 1, 'You have new message', '2022-06-09 11:35:03', '2022-06-09 11:35:03', 0, 2, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(2, 1, 'You have new message', '2022-06-09 16:20:35', '2022-06-09 16:20:35', 0, 2, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(3, 1, 'You have new message', '2022-06-09 16:21:31', '2022-06-09 16:21:31', 0, 2, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(4, 1, 'You have new Product', '2022-06-09 16:40:02', '2022-06-09 16:40:02', 0, 1, 'New_Product', 'لديك منتج جديدة', NULL),
(5, 1, 'You have new message', '2022-06-13 13:59:17', '2022-06-13 13:59:17', 0, 49, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(6, 1, 'You have new message', '2022-06-13 13:59:29', '2022-06-13 13:59:29', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(7, 1, 'You have new message', '2022-06-13 14:00:03', '2022-06-13 14:00:03', 0, 49, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(8, 1, 'You have new message', '2022-06-13 14:01:40', '2022-06-13 14:01:40', 0, 49, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(9, 1, 'You have new message', '2022-06-13 14:02:32', '2022-06-13 14:02:32', 0, 48, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(10, 1, 'You have new message', '2022-06-13 14:03:35', '2022-06-13 14:03:35', 0, 27, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(11, 1, 'You have new message', '2022-06-13 14:04:58', '2022-06-13 14:04:58', 0, 2, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(12, 1, 'You have new message', '2022-06-13 14:05:06', '2022-06-13 14:05:06', 0, 30, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(13, 1, 'You have new message', '2022-06-13 14:05:25', '2022-06-13 14:05:25', 0, 49, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(14, 1, 'You have new message', '2022-06-13 14:11:31', '2022-06-13 14:11:31', 0, 49, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(15, 1, 'You have new message', '2022-06-13 14:13:07', '2022-06-13 14:13:07', 0, 49, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(16, 1, 'You have new message', '2022-06-13 16:40:05', '2022-06-13 16:40:05', 0, 100, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(17, 1, 'You have new message', '2022-06-14 11:03:40', '2022-06-14 11:03:40', 0, 55, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(18, 1, 'You have new message', '2022-06-14 12:27:00', '2022-06-14 12:27:00', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(19, 1, 'You have new message', '2022-06-14 12:27:12', '2022-06-14 12:27:12', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(20, 1, 'You have new message', '2022-06-14 12:31:58', '2022-06-14 12:31:58', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(21, 1, 'You have new message', '2022-06-14 12:32:03', '2022-06-14 12:32:03', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(22, 1, 'You have new message', '2022-06-14 12:32:05', '2022-06-14 12:32:05', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(23, 1, 'You have new message', '2022-06-14 12:32:20', '2022-06-14 12:32:20', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(24, 1, 'You have new message', '2022-06-14 12:32:24', '2022-06-14 12:32:24', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(25, 1, 'You have new message', '2022-06-14 12:32:39', '2022-06-14 12:32:39', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(26, 1, 'You have new message', '2022-06-14 12:32:49', '2022-06-14 12:32:49', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(27, 1, 'You have new message', '2022-06-14 12:33:23', '2022-06-14 12:33:23', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(28, 1, 'You have new message', '2022-06-14 12:35:00', '2022-06-14 12:35:00', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(29, 1, 'You have new message', '2022-06-14 12:35:31', '2022-06-14 12:35:31', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(30, 1, 'You have new message', '2022-06-14 12:35:35', '2022-06-14 12:35:35', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(31, 1, 'You have new message', '2022-06-14 12:35:39', '2022-06-14 12:35:39', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(32, 1, 'You have new message', '2022-06-14 12:35:46', '2022-06-14 12:35:46', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(33, 1, 'You have new message', '2022-06-14 12:35:55', '2022-06-14 12:35:55', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(34, 1, 'You have new message', '2022-06-14 12:37:16', '2022-06-14 12:37:16', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(35, 1, 'You have new message', '2022-06-15 01:03:30', '2022-06-15 01:03:30', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(36, 1, 'You have new message', '2022-06-15 01:03:41', '2022-06-15 01:03:41', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(37, 1, 'You have new message', '2022-06-15 01:07:34', '2022-06-15 01:07:34', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(38, 1, 'You have new message', '2022-06-15 01:07:44', '2022-06-15 01:07:44', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(39, 1, 'You have new message', '2022-06-15 01:07:50', '2022-06-15 01:07:50', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(40, 1, 'You have new message', '2022-06-15 01:13:12', '2022-06-15 01:13:12', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(41, 1, 'You have new message', '2022-06-15 01:13:17', '2022-06-15 01:13:17', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(42, 1, 'You have new message', '2022-06-15 01:13:21', '2022-06-15 01:13:21', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(43, 1, 'You have new message', '2022-06-15 01:13:27', '2022-06-15 01:13:27', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(44, 1, 'You have new message', '2022-06-15 01:13:32', '2022-06-15 01:13:32', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(45, 1, 'You have new message', '2022-06-15 10:57:56', '2022-06-15 10:57:56', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(46, 1, 'You have new message', '2022-06-15 12:24:49', '2022-06-15 12:24:49', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(47, 1, 'You have new message', '2022-06-15 12:32:59', '2022-06-15 12:32:59', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(48, 1, 'You have new message', '2022-06-15 12:35:24', '2022-06-15 12:35:24', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(49, 1, 'You have new message', '2022-06-15 14:37:46', '2022-06-15 14:37:46', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL),
(50, 1, 'You have new message', '2022-06-15 14:37:50', '2022-06-15 14:37:50', 0, 34, 'New_Message_Customer', 'لديك رسالة جديدة', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `from` timestamp NULL DEFAULT NULL,
  `to` timestamp NULL DEFAULT NULL,
  `total` double DEFAULT NULL,
  `prof_id` int(11) DEFAULT NULL,
  `special_prof_id` int(11) DEFAULT NULL,
  `special_from` timestamp NULL DEFAULT NULL,
  `special_to` timestamp NULL DEFAULT NULL,
  `is_first` tinyint(4) DEFAULT NULL,
  `is_prof` tinyint(4) DEFAULT NULL,
  `is_gift` tinyint(4) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `is_canceled` tinyint(1) NOT NULL DEFAULT 0,
  `is_paid` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `package_id`, `user_id`, `from`, `to`, `total`, `prof_id`, `special_prof_id`, `special_from`, `special_to`, `is_first`, `is_prof`, `is_gift`, `full_name`, `email`, `phone`, `gender`, `birth_date`, `is_canceled`, `is_paid`, `created_at`, `updated_at`) VALUES
(9, 2, 9, '2022-10-17 14:00:00', '2022-10-17 15:00:00', 122, 3, 7, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-04', 0, NULL, '2022-10-12 14:03:44', '2022-10-12 14:03:44'),
(10, 2, 1, '2022-10-18 10:00:00', '2022-10-18 11:00:00', 122, 1, NULL, NULL, NULL, 1, 1, 1, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-18', 1, NULL, '2022-10-17 13:30:44', '2022-10-17 15:07:58'),
(11, 2, 1, '2022-10-19 10:00:00', '2022-10-19 11:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-02', 0, NULL, '2022-10-18 10:23:28', '2022-10-18 10:23:28'),
(12, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:08:09', '2022-10-18 12:08:09'),
(13, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:08:12', '2022-10-18 12:08:12'),
(14, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:08:44', '2022-10-18 12:08:44'),
(15, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:09:26', '2022-10-18 12:09:26'),
(16, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:14:21', '2022-10-18 12:14:21'),
(17, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:15:37', '2022-10-18 12:15:37'),
(18, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:16:03', '2022-10-18 12:16:03'),
(19, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:18:06', '2022-10-18 12:18:06'),
(20, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:21:39', '2022-10-18 12:21:39'),
(21, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:25:05', '2022-10-18 12:25:05'),
(22, 2, 1, '2022-10-19 11:00:00', '2022-10-19 12:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:34:21', '2022-10-18 12:34:21'),
(23, 2, 1, '2022-10-19 12:00:00', '2022-10-19 13:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 1, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-10', 0, NULL, '2022-10-18 12:34:54', '2022-10-18 12:34:54'),
(24, 2, 1, '2022-10-19 12:00:00', '2022-10-19 13:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 1, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-10', 0, NULL, '2022-10-18 12:35:49', '2022-10-18 12:35:49'),
(25, 2, 1, '2022-10-19 12:00:00', '2022-10-19 13:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 1, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-10', 0, NULL, '2022-10-18 12:38:35', '2022-10-18 12:38:35'),
(26, 2, 1, '2022-10-19 13:00:00', '2022-10-19 14:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-11', 0, NULL, '2022-10-18 12:40:56', '2022-10-18 12:40:56'),
(27, 2, 1, '2022-10-19 10:00:00', '2022-10-19 11:00:00', 122, 3, NULL, NULL, NULL, 1, 1, 1, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-03', 0, NULL, '2022-10-18 12:42:22', '2022-10-18 12:42:22'),
(28, 2, 1, '2022-10-20 10:00:00', '2022-10-20 11:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 1, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 12:43:11', '2022-10-18 12:43:11'),
(29, 2, 1, '2022-10-19 14:00:00', '2022-10-19 15:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 1, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Female', '2022-10-10', 0, NULL, '2022-10-18 12:44:48', '2022-10-18 12:44:48'),
(30, 2, 1, '2022-10-19 15:00:00', '2022-10-19 16:00:00', 122, 1, NULL, NULL, NULL, 1, 0, 1, 'mohamed nabil', 'admin@admin.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 14:22:10', '2022-10-18 14:22:10'),
(31, 2, 1, '2022-10-19 15:00:00', '2022-10-19 16:00:00', 122, 1, NULL, NULL, NULL, 1, 0, 1, 'mohamed nabil', 'admin@admin.com', '0102233455', 'Male', '2022-10-19', 0, NULL, '2022-10-18 14:22:10', '2022-10-18 14:22:10'),
(32, 2, 1, '2022-11-02 11:00:00', '2022-11-02 12:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-10-02', 0, NULL, '2022-10-31 13:06:51', '2022-10-31 13:06:51'),
(33, 2, 1, '2022-11-27 15:00:00', '2022-11-27 16:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 1, 'mohamed nabil', 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-11-01', 0, NULL, '2022-11-27 14:56:11', '2022-11-27 14:56:11'),
(34, 3, 1, '2022-12-07 11:00:00', '2022-12-07 12:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-11-27', 0, NULL, '2022-12-06 13:13:47', '2022-12-06 13:13:47'),
(35, 3, 1, '2022-12-07 11:00:00', '2022-12-07 12:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-11-27', 0, NULL, '2022-12-06 13:18:30', '2022-12-06 13:18:30'),
(36, 3, 1, '2022-12-07 12:00:00', '2022-12-07 13:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, 'mohamednabilfarouk@gmail.com', '0102233455', 'Male', '2022-12-01', 0, NULL, '2022-12-06 13:19:15', '2022-12-06 13:19:15'),
(39, 2, 1, '2022-12-08 08:00:00', '2022-12-08 09:00:00', 122, 1, NULL, NULL, NULL, 1, 1, 0, NULL, 'mohamed@g.com', '01011941903', 'Male', '2022-12-08', 0, NULL, '2022-12-07 15:03:07', '2022-12-07 15:03:07'),
(40, 3, 1, '2022-12-09 09:00:00', '2022-12-09 10:00:00', 122, 1, NULL, NULL, NULL, 1, 0, 0, NULL, 'mohamednabilfarouk@gmail.com', '0102233455', 'Female', '2022-12-09', 0, NULL, '2022-12-08 08:06:44', '2022-12-08 08:06:44'),
(41, 3, 11, '2022-12-13 08:00:00', '2022-12-13 09:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 'Male', '2022-12-04', 0, NULL, '2022-12-12 12:40:38', '2022-12-12 12:40:38'),
(42, 2, 11, '2022-12-13 13:00:00', '2022-12-13 14:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-11-28', 0, NULL, '2022-12-13 14:52:30', '2022-12-13 14:52:30'),
(43, 2, 11, '2022-12-13 16:00:00', '2022-12-13 17:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-12-05', 0, NULL, '2022-12-13 15:09:01', '2022-12-13 15:09:01'),
(44, 2, 11, '2022-12-13 15:00:00', '2022-12-13 16:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-12-05', 0, NULL, '2022-12-13 15:11:09', '2022-12-13 15:11:09'),
(45, 2, 11, '2022-12-13 15:00:00', '2022-12-13 16:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-11-28', 0, NULL, '2022-12-13 15:19:43', '2022-12-13 15:19:43'),
(46, 2, 11, '2022-12-13 17:00:00', '2022-12-13 18:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-11-28', 0, NULL, '2022-12-13 15:23:15', '2022-12-13 15:23:15'),
(47, 2, 11, '2022-12-13 16:00:00', '2022-12-13 17:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-12-05', 1, NULL, '2022-12-13 15:26:16', '2023-01-18 11:38:32'),
(48, 2, 11, '2022-12-13 18:00:00', '2022-12-13 19:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-11-27', 1, NULL, '2022-12-13 15:47:51', '2023-01-18 11:38:10'),
(49, 2, 11, '2022-12-13 19:00:00', '2022-12-13 20:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-12-05', 1, NULL, '2022-12-13 15:49:00', '2023-01-18 11:37:36'),
(50, 3, 11, '2022-12-14 10:00:00', '2022-12-14 11:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-11-28', 1, NULL, '2022-12-14 07:19:53', '2023-01-18 11:37:30'),
(51, 3, 11, '2022-12-14 10:00:00', '2022-12-14 11:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-11-28', 1, NULL, '2022-12-14 07:19:57', '2023-01-18 11:37:23'),
(52, 2, 11, '2022-12-14 11:00:00', '2022-12-14 12:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-12-06', 1, NULL, '2022-12-14 07:22:08', '2023-01-18 11:34:37'),
(53, 2, 11, '2023-01-02 10:00:00', '2023-01-02 11:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2022-12-25', 1, NULL, '2023-01-01 13:00:44', '2023-01-18 11:29:50'),
(58, 2, 11, '2023-01-02 11:00:00', '2023-01-02 12:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2023-01-03', 0, NULL, '2023-01-02 07:40:15', '2023-01-02 07:40:15'),
(60, 2, 11, '2023-01-02 12:00:00', '2023-01-02 13:00:00', 122, 1, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-02 07:50:33', '2023-01-02 07:50:33'),
(61, 2, 11, '2023-01-03 12:00:00', '2023-01-03 13:00:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-03 11:37:46', '2023-01-03 11:37:46'),
(62, 3, 11, '2023-01-12 22:00:00', '2023-01-12 23:00:00', 122, 5, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 'Male', '2023-01-02', 0, NULL, '2023-01-12 12:27:35', '2023-01-12 12:28:32'),
(63, 2, 11, '2023-01-12 22:10:00', '2023-01-12 23:10:00', 122, 5, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-12 12:31:45', '2023-01-12 13:08:19'),
(64, 2, 11, '2023-01-16 09:40:00', '2023-01-16 10:40:00', 122, 1, NULL, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-15 14:05:38', '2023-01-15 14:05:38'),
(74, 3, 11, '2023-01-17 10:00:00', '2023-01-17 10:20:00', 122, 1, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 'Male', '2022-12-25', 1, NULL, '2023-01-17 08:46:24', '2023-01-18 12:28:23'),
(75, 2, 11, '2023-01-23 14:00:00', '2023-01-23 16:30:00', 122, 1, 7, '2023-01-17 09:20:00', '2023-01-17 10:00:00', 0, 0, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-17 10:52:11', '2023-01-18 12:15:39'),
(77, 3, 11, '2023-01-23 17:00:00', '2023-01-23 19:30:00', 122, 1, 7, '2023-01-17 14:40:00', '2023-01-17 15:20:00', 0, 0, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-17 11:12:52', '2023-01-18 12:14:47'),
(78, 2, 11, NULL, NULL, 122, NULL, 7, '2023-01-24 09:20:00', '2023-01-24 10:00:00', 0, 0, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-23 09:24:11', '2023-01-23 09:24:11'),
(80, 2, 11, NULL, NULL, 122, NULL, 7, '2023-01-24 10:00:00', '2023-01-24 10:40:00', 0, 0, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-23 09:36:58', '2023-01-23 09:36:58'),
(81, 3, 11, '2023-01-24 09:00:00', '2023-01-24 11:30:00', 122, 1, 7, '2023-01-24 10:40:00', '2023-01-24 11:20:00', 0, 0, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-23 09:39:29', '2023-01-23 09:39:29'),
(82, 3, 11, '2023-01-26 12:00:00', '2023-01-26 14:30:00', 122, 1, 0, NULL, NULL, 0, 1, 0, NULL, NULL, NULL, 'Male', '2023-01-01', 0, NULL, '2023-01-23 10:26:29', '2023-01-24 08:15:27'),
(83, 3, 11, '2023-01-25 10:00:00', '2023-01-25 12:30:00', 122, 1, 7, '2023-01-25 10:00:00', '2023-01-25 10:40:00', 0, 0, 0, NULL, NULL, NULL, 'Male', NULL, 1, NULL, '2023-01-24 08:24:59', '2023-01-24 13:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `value_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `viewed` tinyint(1) DEFAULT 0,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`, `viewed`, `phone_number`) VALUES
(1, 'mm', 'mm@mm.mm', 'subject 1', 'message', '2017-01-09 12:53:14', '2017-03-07 13:10:44', 1, NULL),
(2, 'aa', 'aa@aa.aa', 'Subject 2', 'Message 2', '2017-01-09 12:53:14', '2017-03-07 13:13:36', 1, NULL),
(3, 'Mahmoud Naguib', 'nagooba@gmail.com', 'Test Subject', 'test message', '2017-03-01 11:32:57', '2017-03-07 13:13:40', 1, NULL),
(4, 'sdfjldskf', 'skjdlf@sdsd.com', 'sdfsdf', 'sdfsdf', '2022-04-11 22:51:46', '2022-04-12 03:21:07', 1, '23279823'),
(5, 'احمد سليم', 'starslive2022@gmail.com', 'تطوير تطبيق', 'ارغب في تطوير تطبيق تواصل اجتماعي شبيه بتطبيق تيك توك', '2022-06-10 05:48:06', '2022-08-22 10:23:16', 1, '01022002788'),
(6, 'Ahmed', 'starslive2022@gmail.com', 'تطوير تطبيق', 'تنفيذ تطبيق لايف ستريم', '2022-06-14 06:15:52', '2022-08-22 10:27:23', 1, '01022002788'),
(7, 'Mariam Mostafa', 'mariammostafa9777@gmail.com', 'find job', 'Are there job opportunities for junior Android or flutter?', '2022-07-13 22:35:04', '2022-09-04 15:32:49', 1, '201020273870'),
(8, 'maha', 'alef.software.saudi@gmail.com', 'test', 'this is a test message', '2022-08-01 13:22:56', '2022-08-01 13:48:22', 1, '010078882898'),
(9, 'mohamed', 'mohamednabilfarouk@gmail.com', NULL, 'TEST', '2022-09-04 12:03:53', '2022-09-04 12:06:18', 1, NULL),
(10, 'mohamed', 'mohamednabilfarouk@gmail.com', NULL, 'test des', '2022-09-05 11:38:35', '2022-09-05 11:38:58', 1, NULL),
(11, 'mohamed Nabil', 'mohamednabilfarouk@gmail.com', 'test subj', 'sadaadadasdasdadsa', '2022-09-26 11:33:05', '2022-09-26 11:33:05', 0, '0101223324'),
(12, 'mohamed', 'mohamednabilfarouk@gmail.com', 'test', 'asdasdasd', '2022-09-26 14:33:23', '2022-09-26 14:33:23', 0, '01921903123');

-- --------------------------------------------------------

--
-- Table structure for table `group_permissions`
--

CREATE TABLE `group_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `permission_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_permissions`
--

INSERT INTO `group_permissions` (`id`, `role_id`, `permission_id`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 3),
(4, 4, 4),
(5, 1, 1),
(6, 1, 2),
(7, 1, 3),
(8, 1, 4),
(9, 5, 1),
(10, 5, 2),
(11, 5, 4),
(12, 6, 25),
(13, 7, 31),
(14, 8, 17),
(15, 8, 18),
(16, 8, 19),
(17, 8, 20),
(18, 8, 21),
(19, 8, 22),
(20, 8, 23),
(21, 8, 33),
(22, 8, 34),
(23, 8, 32),
(24, 8, 30),
(25, 8, 31),
(26, 8, 28),
(27, 8, 27),
(28, 8, 26),
(29, 8, 25),
(30, 9, 7),
(31, 10, 1),
(32, 10, 2),
(33, 10, 3),
(34, 10, 4),
(43, 11, 1),
(44, 11, 2),
(45, 11, 3),
(46, 11, 4),
(47, 11, 5),
(48, 11, 6),
(49, 11, 7),
(50, 11, 8),
(51, 11, 9),
(52, 11, 10),
(53, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_id` bigint(20) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `image_name`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`, `admin_id`) VALUES
(16, 'Our News', '2jzf6aSua61661166804.jpg', NULL, NULL, '2022-08-22 11:13:24', '2022-08-22 11:13:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_10_18_110745_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `published` tinyint(1) DEFAULT 0,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_id` bigint(11) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title_ar` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `summary_ar` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `content_ar` longtext CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `summary`, `content`, `main_image`, `post_date`, `published`, `meta_description`, `meta_keywords`, `admin_id`, `created_at`, `updated_at`, `title_ar`, `summary_ar`, `content_ar`) VALUES
(8, 'Sed ullamcorper. Aliquam yo massa a sure', 'sed-ullamcorper-aliquam-yo-massa-a-sure', 'Sed ullamcorper. Aliquam yo massa a sure. Vestibulizzle ante dope primizzle bow wow wow faucibus izzle luctizzle fo shizzle pizzle shizzlin dizzle cubilia Break', 'Sed ullamcorper. Aliquam yo massa a sure. Vestibulizzle ante dope primizzle bow wow wow faucibus izzle luctizzle fo shizzle pizzle shizzlin dizzle cubilia Break it down; Mammasay mammasa mamma oo sa the bizzle. Pellentesque habitant morbi tristique shizznit yippiyo netus phat daahng dawg check out this izzle sure egestas. Fo shizzle my nizzle tempor phat velit. Aliquam erizzle funky fresh. Vivamizzle shiznit enizzle, owned izzle, dignissim a, fringilla vizzle, arcu. Nulla gangster. I&#39;m in the shizzle my shizz, est shizzle my nizzle crocodizzle aliquet, rizzle yo ultricies neque, nizzle mah nizzle urna dolizzle quizzle boofron. Stuff tellus neque, dawg ut, ornare izzle, vulputate non, brizzle. Praesent you son of a bizzle sem, fo shizzle mah nizzle fo rizzle, mah home g-dizzle shit amizzle, crunk for sure, dignissizzle , break yo neck, yall. Doggy eget ghetto sheezy est dizzle tincidunt. Check out this bizzle. Uhuh ... yih! cool my shizz, tempizzle izzle, scelerisque venenatizzle, sodalizzle nec, felizzle. Etizzle funky fresh.', '1.jpg', '2017-02-26', 1, '', 'Sed', 3, '2017-02-26 13:07:31', '2022-05-16 15:29:36', 'ايجار سيارات', 'هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت ', 'هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص'),
(9, 'Things ante ipsizzle fizzle in shizzle', 'things-ante-ipsizzle-fizzle-in-shizzle', 'hings ante ipsizzle fizzle in shizzle my nizzle crocodizzle orci luctizzle shiz my shizz posuere dizzle Curae; You son of a bizzle vitae shut the shizzle', 'Things ante ipsizzle fizzle in shizzle my nizzle crocodizzle orci luctizzle shiz my shizz posuere dizzle Curae; You son of a bizzle vitae shut the shizzle up quis doggy ornare aliquizzle. Phasellizzle break it down erizzle. Yo volutpizzle for sure velit. Praesent diam sheezy, adipiscing yo mamma, black sizzle, interdizzle fo shizzle, ante. Crazy malesuada bibendum mauris. Sheezy izzle elizzle et augue porta boofron. Nizzle fo shizzle augue. Gangsta sagittizzle. Yo mammasay mammasa mamma oo sa shiznit shit fo shizzle posuere adipiscing. Donec id dizzle sizzle felizzle dang mollizzle. Integer odio. Nam scelerisque. Boofron magna erizzle, dignissim , porttitor fo shizzle mah nizzle fo rizzle, mah home g-dizzle, break yo neck, yall egestas, we gonna chung. Integizzle commodo sizzle away. Fo shizzle i&#39;m in the shizzle tristique sizzle. Yo mamma mi erizzle, convallizzle ass, pellentesque vel, ultricies in, gangsta. Fusce erizzle yo, facilisizzle fo shizzle, sollicitudizzle eu, aliquet shut the shizzle up, lectus. Fusce mauris risizzle, varizzle dang, fo shizzle mah nizzle fo rizzle, mah home g-dizzle ut, blandit bow wow wow amet, enim.', '2.jpg', '2017-02-26', 1, '', '', 3, '2017-02-26 13:08:27', '2022-05-16 15:29:42', 'اخر عروضنا الترفيهية', 'هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت ', 'هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص'),
(12, 'Praesent crunk mi non maurizzle posuere bibendizzle', 'praesent-crunk-mi-non-maurizzle-posuere-bibendizzl...', '<p>yih! lacinia mah nizzle izzle. I saw beyonces tizzles and my pizzle went crizzle uhuh ... yih! enim izzle fo shizzle sodales test news</p>', '<p><strong>Praesent crunk mi non maurizzle posuere bibendizzle. Uhuh ... yih! lacinia mah nizzle izzle. I saw beyonces tizzles and my pizzle went crizzle uhuh ... yih! enim izzle fo shizzle sodales . Aliquizzle crackalackin, mauris fo dapibus convallizzle, nulla owned bibendizzle shiz, izzle venenatis yippiyo own yo\' izzle arcu. Shut the shizzle up gravida lacus id bizzle. Fo shizzle my nizzle arcu nizzle, fermentum break yo neck, yall amizzle, owned izzle, placerizzle izzle, rizzle. Dawg shit laoreet nibh. Vestibulizzle fizzle dizzle, hendrerit break yo neck, yall, fo shizzle izzle, fo shizzle my nizzle a, shizzlin dizzle. Morbi aliquizzle fo shizzle mah the</strong></p><p>&nbsp;</p><p>&nbsp;</p><p><em>fo rizzle, mah home g-dizzle nulla. Maecenizzle izzle go to hizzle we gonna chung da bomb. Fusce metizzle cool, mammasay mammasa mamma oo sa eu, check out this shizzlin dizzle, rizzle egizzle, sure. Mofo iaculizzle bling bling a orci tincidunt sodalizzle. Fusce bizzle, nulla eget sollicitudizzle crackalackin, lacizzle quam luctizzle shizzle my nizzle crocodizzle, fo shizzle mah nizzle fo rizzle, mah home g-dizzle fo shizzle my nizzle augue bizzle vitae pot. Etiam vehicula lacus. Crazy break yo neck, yall mi. Dizzle fo shizzle mah nizzle fo rizzle, mah home g-dizzle turpizzle. Shiz a magna. Brizzle turpis erizzle, consectetuer id, tempor ac, facilisis izzle, hizzle. Nunc tellizzle. Nulla crunk erizzle, tristique sizzle that\'s the shizzle, ultricies at, tincidunt gangster, augue.</em></p>', '2tu63mAWsy1669553384.jpg', '2017-02-22', 1, NULL, NULL, 1, '2017-02-28 12:22:03', '2022-11-30 09:47:08', 'اضف وجبات', '<p>فاخرة سيارات نظيفة. حجوزات مرنة. عدادات الإيجار المتباعدة اجتماعيا. نحن نعمل مع شركائنا للحفاظ على سلامتك وفي مقعد السائق. </p>', '<p>سيارات نظيفة. حجوزات مرنة. عدادات الإيجار المتباعدة اجتماعيا. نحن نعمل مع شركائنا للحفاظ على سلامتك وفي مقعد السائق.</p>'),
(13, 'Praesent crunk mi non maurizzle posuere bibendizzle', 'praesent-crunk-mi-non-maurizzle-posuere-bibendizzl...', '<p>yih! lacinia mah nizzle izzle. I saw beyonces tizzles and my pizzle went crizzle uhuh ... yih! enim izzle fo shizzle sodales</p>', '<p><strong>Praesent crunk mi non maurizzle posuere bibendizzle. Uhuh ... yih! lacinia mah nizzle izzle. I saw beyonces tizzles and my pizzle went crizzle uhuh ... yih! enim izzle fo shizzle sodales . Aliquizzle crackalackin, mauris fo dapibus convallizzle, nulla owned bibendizzle shiz, izzle venenatis yippiyo own yo\' izzle arcu. Shut the shizzle up gravida lacus id bizzle. Fo shizzle my nizzle arcu nizzle, fermentum break yo neck, yall amizzle, owned izzle, placerizzle izzle, rizzle. Dawg shit laoreet nibh. Vestibulizzle fizzle dizzle, hendrerit break yo neck, yall, fo shizzle izzle, fo shizzle my nizzle a, shizzlin dizzle. Morbi aliquizzle fo shizzle mah </strong></p><p><br></p><p><br></p><p><em>fo rizzle, mah home g-dizzle nulla. Maecenizzle izzle go to hizzle we gonna chung da bomb. Fusce metizzle cool, mammasay mammasa mamma oo sa eu, check out this shizzlin dizzle, rizzle egizzle, sure. Mofo iaculizzle bling bling a orci tincidunt sodalizzle. Fusce bizzle, nulla eget sollicitudizzle crackalackin, lacizzle quam luctizzle shizzle my nizzle crocodizzle, fo shizzle mah nizzle fo rizzle, mah home g-dizzle fo shizzle my nizzle augue bizzle vitae pot. Etiam vehicula lacus. Crazy break yo neck, yall mi. Dizzle fo shizzle mah nizzle fo rizzle, mah home g-dizzle turpizzle. Shiz a magna. Brizzle turpis erizzle, consectetuer id, tempor ac, facilisis izzle, hizzle. Nunc tellizzle. Nulla crunk erizzle, tristique sizzle that\'s the shizzle, ultricies at, tincidunt gangster, augue.</em></p>', '3.jpg', '2017-02-22', 0, NULL, NULL, 2, '2017-02-28 12:22:03', '2022-11-30 09:49:27', 'اضف وجبات', 'سيارات نظيفة. حجوزات مرنة. عدادات الإيجار المتباعدة اجتماعيا. نحن نعمل مع شركائنا للحفاظ على سلامتك وفي مقعد السائق.', 'سيارات نظيفة. حجوزات مرنة. عدادات الإيجار المتباعدة اجتماعيا. نحن نعمل مع شركائنا للحفاظ على سلامتك وفي مقعد السائق.');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0250c9dd-8867-46e4-ab01-bf7032b77c41', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', NULL, '2022-11-30 08:40:51', '2022-11-30 08:40:51'),
('04930fbd-0832-41bb-b1d9-2838f5f15838', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', '2022-12-11 08:30:49', '2022-11-30 08:40:50', '2022-12-11 08:30:49'),
('0c2ca043-87a6-4d6b-9c48-c560f793d979', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"time\":\"2022-10-18 15:42:17\"}', '2022-12-08 12:52:40', '2022-10-18 13:42:17', '2022-10-18 13:42:17'),
('11ca32ee-620a-4d0c-8e55-bf9e866ba1dd', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  \\u0634\\u0645\\u0639\\u0629\",\"id\":1}', '2022-12-08 12:52:40', '2022-11-20 15:30:49', '2022-11-20 15:30:49'),
('16ac6746-5d66-4b12-a1fd-52a658cf3160', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":48}', NULL, '2022-12-13 15:47:53', '2022-12-13 15:47:53'),
('1769a504-6010-46c8-b1e3-ece91d47f9d8', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":65}', NULL, '2023-01-16 09:00:05', '2023-01-16 09:00:05'),
('17aa01bd-59bb-49da-aec5-682a41639c94', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":42}', NULL, '2022-12-13 14:52:34', '2022-12-13 14:52:34'),
('1eec14d5-fa20-4a91-9108-82f107be8bfa', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":46}', NULL, '2022-12-13 15:23:18', '2022-12-13 15:23:18'),
('2027e00e-2ad8-4244-8c03-ff82e7f12f56', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  morocco bath\",\"id\":75}', NULL, '2023-01-17 10:52:15', '2023-01-17 10:52:15'),
('21bde50e-b090-468b-9022-3a0f53adb42a', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', NULL, '2022-12-05 12:59:11', '2022-12-05 12:59:11'),
('21dfa190-b8c6-4d8a-b61d-b98016b7e5ff', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":33}', '2022-12-11 08:31:14', '2022-11-27 14:56:14', '2022-12-11 08:31:14'),
('2468e913-17a9-4260-8918-d41320649320', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  \\u0634\\u0645\\u0639\\u0629\",\"id\":1}', '2022-12-08 13:13:57', '2022-11-20 15:30:49', '2022-12-08 13:13:57'),
('2817c90b-d47a-42d2-8fac-d67dc95752c2', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":61}', NULL, '2023-01-03 11:37:50', '2023-01-03 11:37:50'),
('2a6d2f2d-1d9b-474f-b3d1-4141c071b41e', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', NULL, '2022-11-21 08:58:55', '2022-11-21 08:58:55'),
('2ec34336-cfe1-44b3-89aa-92f0201022e8', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  morocco bath\",\"id\":79}', NULL, '2023-01-23 09:34:20', '2023-01-23 09:34:20'),
('32d111a0-da84-4eb0-b55e-a968de497392', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":72}', NULL, '2023-01-17 07:59:22', '2023-01-17 07:59:22'),
('366dcc20-928f-4f81-b507-8c5375fe9a1b', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', '2022-12-08 13:40:21', '2022-11-22 13:41:59', '2022-12-08 13:40:21'),
('393fcd4b-00d8-4481-ba74-dbc6e995edab', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":44}', NULL, '2022-12-13 15:11:12', '2022-12-13 15:11:12'),
('3eae28a3-6a8a-486b-bc62-3536dbcdfe2f', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', '2022-12-08 13:40:16', '2022-11-30 08:40:49', '2022-12-08 13:40:16'),
('3fcd8981-dfea-4b0e-827b-468eff109262', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":62}', NULL, '2023-01-12 12:27:42', '2023-01-12 12:27:42'),
('41934fec-d997-40d0-a00a-99575c71611a', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":63}', NULL, '2023-01-12 12:31:48', '2023-01-12 12:31:48'),
('42dd4bab-da83-4f07-b8c8-3ef17314c917', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":53}', NULL, '2023-01-01 13:00:48', '2023-01-01 13:00:48'),
('49a6ef0e-d785-46f2-8bea-baacc29315ed', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":73}', NULL, '2023-01-17 08:27:41', '2023-01-17 08:27:41'),
('49eee447-27fa-41de-9a44-83c10ce2030f', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":60}', NULL, '2023-01-02 07:50:36', '2023-01-02 07:50:36'),
('4a0518a1-0278-4cf9-804a-5879896e40d1', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":50}', NULL, '2022-12-14 07:19:57', '2022-12-14 07:19:57'),
('4e162b0c-59d0-43b0-a0e1-fc7d9ac5f292', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', NULL, '2022-11-30 08:40:49', '2022-11-30 08:40:49'),
('4e33ca0d-39ea-4af9-a4b3-b6dc36d689cc', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":53}', NULL, '2023-01-01 13:00:48', '2023-01-01 13:00:48'),
('4e826a8f-b740-4c52-b808-83a656a9e078', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  morocco bath\",\"id\":79}', NULL, '2023-01-23 09:34:20', '2023-01-23 09:34:20'),
('50e9712b-c7c2-451b-af2e-a39efb1e15be', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":58}', NULL, '2023-01-02 07:40:18', '2023-01-02 07:40:18'),
('542fdac0-ba98-4d18-9b12-cc7d03fbd0c5', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  package with moroco bath\",\"id\":81}', NULL, '2023-01-23 09:39:32', '2023-01-23 09:39:32'),
('54d340be-6f46-484a-b6f1-23bb0d5ec593', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', NULL, '2022-11-21 08:35:56', '2022-11-21 08:35:56'),
('5aa675ea-c112-40e8-a556-f247e11cbcea', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":46}', NULL, '2022-12-13 15:23:18', '2022-12-13 15:23:18'),
('5b68c76a-38a9-45ec-8570-a8ee8e87b3bd', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  \\u0628\\u0627\\u0642\\u0629 VIP Plus\",\"id\":32}', '2022-12-08 14:25:19', '2022-10-31 13:06:51', '2022-12-08 14:25:19'),
('5bea3546-04a2-4659-b761-eb133e06b39f', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":39}', NULL, '2022-12-07 15:03:11', '2022-12-07 15:03:11'),
('5e87bd3d-5fb1-405c-8641-0092efa01582', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":52}', NULL, '2022-12-14 07:22:11', '2022-12-14 07:22:11'),
('687538d4-5a3a-4c74-b395-811e7ee7266b', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":45}', NULL, '2022-12-13 15:19:46', '2022-12-13 15:19:46'),
('692ad459-b0d3-4814-bdb7-0e4a8863202d', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  package with moroco bath\",\"id\":84}', NULL, '2023-01-24 12:10:13', '2023-01-24 12:10:13'),
('6b707e97-803d-48b8-930a-29ca7c19dc68', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":82}', NULL, '2023-01-23 10:26:31', '2023-01-23 10:26:31'),
('6f1672c6-49b8-4c13-bfd1-ad252dc6ff62', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":51}', NULL, '2022-12-14 07:20:00', '2022-12-14 07:20:00'),
('72320507-896a-4eb4-b663-fa9625bd68bd', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  \\u0634\\u0645\\u0639\\u0629\",\"id\":1}', '2022-12-08 14:40:14', '2022-11-20 15:24:39', '2022-12-08 14:40:14'),
('74615d44-3999-4452-8ddf-569be787ab1e', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":61}', NULL, '2023-01-03 11:37:50', '2023-01-03 11:37:50'),
('784994cd-018f-468b-9205-031689965fc2', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":58}', NULL, '2023-01-02 07:40:18', '2023-01-02 07:40:18'),
('7ea44810-c148-4df7-b702-a72896082e1d', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  package with moroco bath\",\"id\":77}', NULL, '2023-01-17 11:12:54', '2023-01-17 11:12:54'),
('80dc9b01-29ca-4112-bd3c-829b230d3b7f', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":48}', NULL, '2022-12-13 15:47:53', '2022-12-13 15:47:53'),
('84e5bfcf-4370-45d7-a054-27408c0148e6', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  morocco bath\",\"id\":75}', NULL, '2023-01-17 10:52:15', '2023-01-17 10:52:15'),
('8609ec15-eb13-4463-a75e-13062a64b7ee', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  morocco bath\",\"id\":78}', NULL, '2023-01-23 09:24:15', '2023-01-23 09:24:15'),
('86b6f0dd-ace5-4490-a42b-b9231f970b0b', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":47}', NULL, '2022-12-13 15:26:19', '2022-12-13 15:26:19'),
('87dd3e25-ebd8-4703-9fb5-f2750395fcdd', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":43}', NULL, '2022-12-13 15:09:04', '2022-12-13 15:09:04'),
('9146b519-3012-46d0-ae5e-962d2f3f4846', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', '2022-12-08 14:40:35', '2022-11-21 08:58:55', '2022-12-08 14:40:35'),
('9380e4fb-2bb6-493e-b782-79af10fb0969', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', NULL, '2022-11-29 15:41:21', '2022-11-29 15:41:21'),
('95398896-4968-4826-a6e1-661082ef8a87', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":41}', NULL, '2022-12-12 12:40:45', '2022-12-12 12:40:45'),
('95b55528-7196-47e8-b550-e7ae31a32f8f', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  \\u0634\\u0645\\u0639\\u0629\",\"id\":1}', NULL, '2022-12-06 14:07:52', '2022-12-06 14:07:52'),
('977f7703-52fc-4970-adae-b58fed178069', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  \\u0628\\u0627\\u0642\\u0629 VIP Plus\",\"id\":32}', NULL, '2022-10-31 13:06:51', '2022-10-31 13:06:51'),
('97f037aa-419b-4638-bc8a-864be9d2df80', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":39}', '2022-12-08 12:51:11', '2022-12-07 15:03:11', '2022-12-08 12:51:11'),
('984b3643-ebc5-4310-9d4d-d7757baafa91', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  package with moroco bath\",\"id\":77}', NULL, '2023-01-17 11:12:54', '2023-01-17 11:12:54'),
('986cf02c-57e9-414e-b207-2b7306904ab7', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":50}', NULL, '2022-12-14 07:19:57', '2022-12-14 07:19:57'),
('9ac955e3-0347-426d-b3ab-cc01a6aa3234', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', '2022-12-08 14:40:57', '2022-11-21 08:35:52', '2022-12-08 14:40:57'),
('a16404b3-c233-48bf-981f-c5dcf580b856', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":70}', NULL, '2023-01-17 03:44:07', '2023-01-17 03:44:07'),
('a38b71a1-95b3-4315-8209-534034d070c3', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  \\u0634\\u0645\\u0639\\u0629\",\"id\":1}', NULL, '2022-11-20 15:24:39', '2022-11-20 15:24:39'),
('a48181ee-36d1-4ac3-b575-c2a8c8ebc0f5', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":47}', NULL, '2022-12-13 15:26:19', '2022-12-13 15:26:19'),
('a7be6f94-3fa6-4c31-9ae3-11b0dbcccaf0', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":44}', NULL, '2022-12-13 15:11:12', '2022-12-13 15:11:12'),
('a8afe37f-7b9f-4d59-b0ee-fbf19d55552f', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  morocco bath\",\"id\":80}', NULL, '2023-01-23 09:37:03', '2023-01-23 09:37:03'),
('a9f1ce5f-49f0-452a-b6d7-9a48c7f21a80', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  package with moroco bath\",\"id\":81}', NULL, '2023-01-23 09:39:32', '2023-01-23 09:39:32'),
('a9f772b5-aafd-4dd9-bcf7-85f42ee74415', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":83}', NULL, '2023-01-24 08:25:03', '2023-01-24 08:25:03'),
('afcedda4-747e-41f1-b657-d6a814efdd1f', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', '2022-12-08 13:10:53', '2022-11-29 15:41:21', '2022-12-08 13:10:53'),
('b0a9f158-e685-41bf-8ac7-624238a50827', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  package with moroco bath\",\"id\":76}', NULL, '2023-01-17 10:54:25', '2023-01-17 10:54:25'),
('b81e6a4f-066b-4ec4-a4fc-361d7f5062b7', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":70}', NULL, '2023-01-17 03:44:08', '2023-01-17 03:44:08'),
('b8a52133-05be-45b2-a383-dc26a13c973f', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":43}', NULL, '2022-12-13 15:09:04', '2022-12-13 15:09:04'),
('bae14b54-3bb9-46a0-a2cb-bcf0ead361f0', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":64}', NULL, '2023-01-15 14:05:43', '2023-01-15 14:05:43'),
('bd114b06-ca81-4a22-b232-4a690d1618ac', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":65}', NULL, '2023-01-16 09:00:05', '2023-01-16 09:00:05'),
('be2f8af3-dac6-470f-8e4d-ee323e90d390', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  morocco bath\",\"id\":80}', NULL, '2023-01-23 09:37:03', '2023-01-23 09:37:03'),
('be7ef661-55ef-4c30-aec7-2f39d43dc04c', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":72}', NULL, '2023-01-17 07:59:22', '2023-01-17 07:59:22'),
('bf163a7a-5877-42a5-a020-1c680fede999', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":52}', NULL, '2022-12-14 07:22:11', '2022-12-14 07:22:11'),
('c3744e5d-b547-4596-b14d-118bd769351b', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":82}', NULL, '2023-01-23 10:26:31', '2023-01-23 10:26:31'),
('cf4e3fa1-da35-4847-9777-5052add41e9e', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":83}', NULL, '2023-01-24 08:25:03', '2023-01-24 08:25:03'),
('d23b5864-018f-4562-aba7-3136da9fa6c8', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":41}', NULL, '2022-12-12 12:40:45', '2022-12-12 12:40:45'),
('d5de66f0-818b-43c4-b31e-453118544220', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  package with moroco bath\",\"id\":76}', NULL, '2023-01-17 10:54:25', '2023-01-17 10:54:25'),
('d6d63906-792d-414d-9bad-34979081d645', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":62}', NULL, '2023-01-12 12:27:42', '2023-01-12 12:27:42'),
('dc5b84c2-5aa3-4d9f-a1d3-1fdacc909d5d', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":64}', NULL, '2023-01-15 14:05:43', '2023-01-15 14:05:43'),
('e3410d80-301b-4069-a2f3-7898fc2334f6', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  morocco bath\",\"id\":78}', NULL, '2023-01-23 09:24:15', '2023-01-23 09:24:15'),
('e5ed7b50-6b64-4c07-ad8c-194ff12dbcda', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":30}', NULL, '2022-10-18 14:22:10', '2022-10-18 14:22:10'),
('e75b96d3-d496-44c9-b0ad-938b5a719d3d', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":42}', NULL, '2022-12-13 14:52:34', '2022-12-13 14:52:34'),
('e822a20f-3c8b-4604-a4df-b22fc2d99c18', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', '2022-12-08 12:45:49', '2022-12-05 12:59:11', '2022-12-08 12:45:49'),
('e836109b-a910-49aa-955e-ace1f28a6d59', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', NULL, '2022-11-22 13:41:59', '2022-11-22 13:41:59'),
('e98e4d39-e9c1-4a7a-b5ea-3d8054d11041', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":74}', NULL, '2023-01-17 08:46:27', '2023-01-17 08:46:27'),
('ed9fa900-2adb-4f99-afc2-c63f1d8caf45', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":31}', NULL, '2022-10-18 14:22:10', '2022-10-18 14:22:10'),
('ee8a076e-2bf5-4034-bc38-13380dc7522f', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":73}', NULL, '2023-01-17 08:27:41', '2023-01-17 08:27:41'),
('eefb6c63-93ab-40f6-bb26-20a70b025835', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":33}', NULL, '2022-11-27 14:56:14', '2022-11-27 14:56:14'),
('ef5a7cff-8128-492d-8a83-1f43c384311a', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":49}', NULL, '2022-12-13 15:49:03', '2022-12-13 15:49:03'),
('efc08d7d-cf41-45e3-a2ca-d250172a2b34', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":45}', NULL, '2022-12-13 15:19:46', '2022-12-13 15:19:46'),
('efcc3aeb-b9f2-4ec8-98e2-2e87f8e737d9', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":74}', NULL, '2023-01-17 08:46:27', '2023-01-17 08:46:27'),
('f5295726-d6a8-466a-a7a2-53c91a631966', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":40}', NULL, '2022-12-08 08:06:48', '2022-12-08 08:06:48'),
('f56b51a7-097a-4fab-a1e5-f63213669260', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":49}', NULL, '2022-12-13 15:49:03', '2022-12-13 15:49:03'),
('f598956d-1977-4995-bf16-10b999db760d', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":60}', NULL, '2023-01-02 07:50:36', '2023-01-02 07:50:36'),
('f59db0ff-c13d-497d-b357-a3d37da67a51', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Booking For  package with moroco bath\",\"id\":84}', NULL, '2023-01-24 12:10:13', '2023-01-24 12:10:13'),
('fb742147-1e1e-463b-bf98-1397a92d038c', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":63}', NULL, '2023-01-12 12:31:48', '2023-01-12 12:31:48'),
('fd01e914-1d42-43ad-ab4c-e8414d841206', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', '2022-12-08 14:40:52', '2022-11-21 08:35:56', '2022-12-08 14:40:52'),
('ff51873c-c85c-47f7-964b-40a173a97aa9', 'App\\Notifications\\NewBookingNotification', 'App\\Models\\Admin', 1, '{\"title\":\"New Booking For  VIP PLUS Package\",\"id\":51}', NULL, '2022-12-14 07:20:00', '2022-12-14 07:20:00'),
('ffd256dc-9d9a-40ca-af90-830b8b7cf86d', 'App\\Notifications\\NewOrderNotification', 'App\\Models\\Admin', 16, '{\"title\":\"New Order Request For  Relaxation Massage Candle\",\"id\":1}', NULL, '2022-11-21 08:35:52', '2022-11-21 08:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `is_paid` tinyint(2) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `reference`, `total`, `is_paid`, `created_at`, `updated_at`, `phone`, `email`, `name`, `address`) VALUES
(1, 9, 1, NULL, 100, 0, '2022-10-02 10:53:07', '2022-10-02 10:53:07', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', NULL),
(2, 1, 1, NULL, 100, 0, '2022-10-02 10:57:15', '2022-10-02 10:57:15', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', NULL),
(4, 1, 1, NULL, 100, 0, '2022-10-18 12:58:39', '2022-10-18 12:58:39', '0102233455', 'alef@gmail.com', 'mohamed Nabil', 'asdad sdasd'),
(5, 1, 1, NULL, 100, 0, '2022-10-18 13:40:11', '2022-10-18 13:40:11', '0102233455', 'alef@gmail.com', 'mohamed Nabil', 'asdad sdasd'),
(6, 1, 1, NULL, 100, 0, '2022-10-18 13:40:48', '2022-10-18 13:40:48', '0102233455', 'alef@gmail.com', 'mohamed Nabil', 'asdad sdasd'),
(7, 1, 1, NULL, 100, 0, '2022-10-18 13:41:21', '2022-10-18 13:41:21', '0102233455', 'alef@gmail.com', 'mohamed Nabil', 'asdad sdasd'),
(8, 1, 1, NULL, 100, 0, '2022-10-18 13:41:30', '2022-10-18 13:41:30', '0102233455', 'alef@gmail.com', 'mohamed Nabil', 'asdad sdasd'),
(9, 1, 1, NULL, 100, 0, '2022-10-18 13:42:02', '2022-10-18 13:42:02', '0102233455', 'alef@gmail.com', 'mohamed Nabil', 'asdad sdasd'),
(10, 1, 1, NULL, 100, 0, '2022-10-18 13:42:17', '2022-10-18 13:42:17', '0102233455', 'alef@gmail.com', 'mohamed Nabil', 'asdad sdasd'),
(11, 1, 1, NULL, 100, 0, '2022-11-20 15:07:51', '2022-11-20 15:07:51', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(12, 1, 1, NULL, 100, 0, '2022-11-20 15:07:55', '2022-11-20 15:07:55', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(13, 1, 1, NULL, 100, 0, '2022-11-20 15:19:45', '2022-11-20 15:19:45', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(14, 1, 1, NULL, 100, 0, '2022-11-20 15:19:56', '2022-11-20 15:19:56', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(15, 1, 1, NULL, 100, 0, '2022-11-20 15:20:03', '2022-11-20 15:20:03', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(16, 1, 1, NULL, 100, 0, '2022-11-20 15:20:14', '2022-11-20 15:20:14', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(17, 1, 1, NULL, 100, 0, '2022-11-20 15:20:29', '2022-11-20 15:20:29', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(18, 1, 1, NULL, 100, 0, '2022-11-20 15:21:11', '2022-11-20 15:21:11', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(19, 1, 1, NULL, 100, 0, '2022-11-20 15:24:31', '2022-11-20 15:24:31', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(20, 1, 1, NULL, 100, 0, '2022-11-20 15:30:45', '2022-11-20 15:30:45', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(21, 1, 1, NULL, 100, 0, '2022-11-21 08:35:48', '2022-11-21 08:35:48', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(22, 1, 1, NULL, 100, 0, '2022-11-21 08:35:51', '2022-11-21 08:35:51', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(23, 1, 1, NULL, 100, 0, '2022-11-21 08:58:50', '2022-11-21 08:58:50', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(24, 1, 1, NULL, 100, 0, '2022-11-22 13:41:55', '2022-11-22 13:41:55', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(25, 1, 1, NULL, 100, 0, '2022-11-29 15:41:18', '2022-11-29 15:41:18', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(26, 1, 1, NULL, 100, 0, '2022-11-30 08:40:45', '2022-11-30 08:40:45', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(27, 1, 1, NULL, 100, 0, '2022-11-30 08:40:48', '2022-11-30 08:40:48', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(28, 1, 1, NULL, 100, 0, '2022-12-05 12:06:27', '2022-12-05 12:06:27', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(29, 1, 1, NULL, 100, 0, '2022-12-05 12:52:07', '2022-12-05 12:52:07', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(30, 1, 1, NULL, 100, 0, '2022-12-05 12:59:07', '2022-12-05 12:59:07', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(35, 1, 1, NULL, 100, 0, '2022-12-06 14:00:23', '2022-12-06 14:00:23', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha'),
(39, 1, 1, NULL, 100, 0, '2022-12-06 14:07:48', '2022-12-06 14:07:48', '0102233455', 'mohamednabilfarouk@gmail.com', 'mohamed Nabil', '36 elnozha');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `des_en` text DEFAULT NULL,
  `des_ar` text DEFAULT NULL,
  `price` double DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `home_page` tinyint(1) DEFAULT 0,
  `is_special` tinyint(4) NOT NULL DEFAULT 0,
  `with_special` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `slug`, `title_en`, `title_ar`, `des_en`, `des_ar`, `price`, `duration`, `home_page`, `is_special`, `with_special`, `created_at`, `updated_at`) VALUES
(2, 'VIP-PLUS-Package', 'morocco bath', 'باقة VIP Plus', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 Minutes&nbsp;Change clothes and Sterilize the room</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Jacuzzi</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Sauna</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Full body stone massage</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Moroccan Bath</p>\r\n</div>', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 دقايق&nbsp;تبديل ملابس وتعقيم الغرفة</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;جاكوزي</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;سونا</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق تدليك كامل الجسم بالأحجار</p>\r\n<p>20 دقايق حمام مغربى</p>\r\n</div>', 122, '40', NULL, 1, 0, '2022-10-04 08:28:36', '2022-10-04 09:19:18'),
(3, 'VIP-PLUS-Package-2', 'package with moroco bath', 'باقة VIP Plus', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 Minutes&nbsp;Change clothes and Sterilize the room</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Jacuzzi</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Sauna</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Full body stone massage</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Moroccan Bath</p>\r\n</div>', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 دقايق&nbsp;تبديل ملابس وتعقيم الغرفة</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;جاكوزي</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;سونا</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق تدليك كامل الجسم بالأحجار</p>\r\n<p>20 دقايق حمام مغربى</p>\r\n</div>', 122, '150', NULL, 0, 1, '2022-10-04 08:28:36', '2022-10-04 09:19:18'),
(4, 'VIP-PLUS-Package-3', 'VIP PLUS Package', 'باقة VIP Plus', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 Minutes&nbsp;Change clothes and Sterilize the room</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Jacuzzi</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Sauna</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Full body stone massage</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Moroccan Bath</p>\r\n</div>', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 دقايق&nbsp;تبديل ملابس وتعقيم الغرفة</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;جاكوزي</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;سونا</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق تدليك كامل الجسم بالأحجار</p>\r\n<p>20 دقايق حمام مغربى</p>\r\n</div>', 122, '30', NULL, 0, 0, '2022-10-04 08:28:36', '2022-10-04 09:19:18'),
(5, 'VIP-PLUS-Package-4', 'VIP PLUS Package', 'باقة VIP Plus', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 Minutes&nbsp;Change clothes and Sterilize the room</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Jacuzzi</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Sauna</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Full body stone massage</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Moroccan Bath</p>\r\n</div>', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 دقايق&nbsp;تبديل ملابس وتعقيم الغرفة</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;جاكوزي</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;سونا</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق تدليك كامل الجسم بالأحجار</p>\r\n<p>20 دقايق حمام مغربى</p>\r\n</div>', 122, '140', 1, 0, 0, '2022-10-04 08:28:36', '2022-10-17 14:35:40'),
(6, 'VIP-PLUS-Package-5', 'VIP PLUS Package', 'باقة VIP Plus', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 Minutes&nbsp;Change clothes and Sterilize the room</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Jacuzzi</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Sauna</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Full body stone massage</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Moroccan Bath</p>\r\n</div>', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 دقايق&nbsp;تبديل ملابس وتعقيم الغرفة</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;جاكوزي</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;سونا</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق تدليك كامل الجسم بالأحجار</p>\r\n<p>20 دقايق حمام مغربى</p>\r\n</div>', 122, '140', NULL, 0, 0, '2022-10-04 08:28:36', '2022-10-04 09:19:18'),
(7, 'VIP-PLUS-Package-6', 'VIP PLUS Package', 'باقة VIP Plus', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 Minutes&nbsp;Change clothes and Sterilize the room</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Jacuzzi</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Sauna</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Full body stone massage</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Moroccan Bath</p>\r\n</div>', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 دقايق&nbsp;تبديل ملابس وتعقيم الغرفة</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;جاكوزي</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;سونا</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق تدليك كامل الجسم بالأحجار</p>\r\n<p>20 دقايق حمام مغربى</p>\r\n</div>', 122, '140', 1, 0, 0, '2022-10-04 08:28:36', '2022-10-17 14:34:58'),
(8, 'VIP-PLUS-Package-7', 'VIP PLUS Package', 'باقة VIP Plus', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 Minutes&nbsp;Change clothes and Sterilize the room</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Jacuzzi</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Sauna</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Full body stone massage</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Moroccan Bath</p>\r\n</div>', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 دقايق&nbsp;تبديل ملابس وتعقيم الغرفة</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;جاكوزي</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;سونا</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق تدليك كامل الجسم بالأحجار</p>\r\n<p>20 دقايق حمام مغربى</p>\r\n</div>', 122, '140', 1, 0, 0, '2022-10-04 08:28:36', '2022-10-17 14:34:48'),
(9, 'VIP-PLUS-Package-8', 'VIP PLUS Package', 'باقة VIP Plus', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 Minutes&nbsp;Change clothes and Sterilize the room</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Jacuzzi</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Sauna</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Full body stone massage</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 Minutes&nbsp;Moroccan Bath</p>\r\n</div>', '<div class=\"sf-listing-con-timeing\">\r\n<p>10 دقايق&nbsp;تبديل ملابس وتعقيم الغرفة</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;جاكوزي</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق&nbsp;سونا</p>\r\n</div>\r\n<div class=\"sf-listing-con-timeing\">\r\n<p>20 دقايق تدليك كامل الجسم بالأحجار</p>\r\n<p>20 دقايق حمام مغربى</p>\r\n</div>', 122, '140', 1, 0, 0, '2022-10-04 08:28:36', '2022-10-17 14:34:36'),
(20, 'asasd', 'asasd', 'aasa', '<p>asdasd</p>', '<p>asdasd</p>', 222, '22', NULL, 0, 1, '2023-01-18 14:52:47', '2023-01-18 14:59:56'),
(21, 'asdsad', 'asdsad', 'asdasdasdsa', '<p>sadsad</p>', '<p>asdasd</p>', 22, '50', NULL, 1, 0, '2023-01-23 08:35:09', '2023-01-29 13:42:26'),
(22, 'ssss', 'ssss', 'aasd', '<p>asdasd</p>', '<p>asdasd</p>', 400, '100', NULL, 0, 0, '2023-01-29 13:49:25', '2023-01-30 12:57:29'),
(23, 'aaaaaa', 'aaaaaa', 'tetsss', '<p>asdasd</p>', '<p>sdsad</p>', 23333, '10', NULL, 0, 0, '2023-01-30 10:11:23', '2023-01-30 15:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `package_service`
--

CREATE TABLE `package_service` (
  `id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_service`
--

INSERT INTO `package_service` (`id`, `package_id`, `service_id`, `created_at`, `updated_at`) VALUES
(13, 23, 1, '2023-01-30 12:19:19', '2023-01-30 12:19:19'),
(20, 22, 17, '2023-01-30 12:33:51', '2023-01-30 12:33:51'),
(21, 22, 2, '2023-01-30 12:57:29', '2023-01-30 12:57:29'),
(22, 22, 3, '2023-01-30 12:57:29', '2023-01-30 12:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_id` bigint(11) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title_ar` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `head` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `main_image`, `meta_description`, `meta_keywords`, `admin_id`, `created_at`, `updated_at`, `title_ar`, `head`) VALUES
(1, 'home', 'Home', NULL, '<p>تتخصص شركة ألف في برمجة وتصميم مواقع الويب، وتطبيقات الجوال، والانظمة المتعددة وخدمات الاستضافة والتسويق بأيدي أمهر المهندسين المحترفين تواصل معنا 01100777759</p>', '<p>Alef,  Software,  Software company,  mobile apps,  e-marketing apps,  e-marketing website,  developing mobile app,  website developer,  e-marketing services,  branding,  SEO service,  تصميم مواقع,  تطبيقات الجوال,  تصميم تطبيقات جوال,  تصميم الهوية التجارية,  برمجة ,  برمجة المواقع,  انظمة الشركات,  الفوترة الالكترونية,  تطوير الانظمة الداخلية</p>', 1, '2017-02-26 09:46:35', '2022-10-12 09:22:07', 'الرئيسية', NULL),
(2, 'about-us', 'About Us', '945495762457161488367167.jpg', 'Alef Software is Saudi/Egyptian company, specializes in programming and designing mobile applications, websites, designs, hosting, and marketing services', 'software company,  mobile app developer,  website developer, emarketing services, branding designs, free web hosting', 2, '2017-02-26 09:46:56', '2022-04-18 09:44:41', 'من نحن', 'About Alef Software'),
(3, 'contact-us', 'Contact us', '709092137261351488367218.png', 'Contact us', '', 2, '2017-02-26 09:47:17', '2022-04-18 12:59:39', 'تواصل معنا', NULL),
(4, 'news', 'News', '39089952266221488370901.png', NULL, '', 1, '2017-03-01 12:21:41', '2022-11-27 10:33:27', 'اخبارنا', NULL),
(5, 'packages', 'Packages', '407558281167231488376253.jpg', NULL, '', 1, '2017-03-01 13:50:53', '2022-08-22 11:12:58', 'Our News', NULL),
(9, 'shop', 'Shop', 'mySLTD0sxf1669032092.png', '<p>shop</p>', '<p>Shop</p>', 1, '2022-10-12 10:01:07', '2022-11-21 12:01:32', 'المتجر', NULL),
(10, 'book_now', 'Book Now', NULL, '<p>booking</p>', '<p>book</p>', 1, '2022-10-12 10:01:07', '2022-11-27 13:30:47', 'احجز الان', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `slug`, `category`, `created_at`, `updated_at`) VALUES
(1, 'عرض الموظفين', 'index-employees', 'إدارة الموظفين', '2022-03-16 16:34:27', '2022-03-16 16:34:27'),
(2, 'عرض موظف', 'view-employees', 'إدارة الموظفين', '2022-03-16 16:34:27', '2022-03-16 16:34:27'),
(3, 'انشاء موظف', 'create-employees', 'إدارة الموظفين', '2022-03-16 16:34:27', '2022-03-16 16:34:27'),
(4, 'تعديل موظف', 'edit-employees', 'إدارة الموظفين', '2022-03-16 16:34:27', '2022-03-16 16:34:27'),
(5, 'مسح موظف', 'delete-employees', 'إدارة الموظفين', '2022-03-16 16:34:27', '2022-03-16 16:34:27'),
(6, 'تفعيل موظف', 'publish-employees', 'إدارة الموظفين', '2022-03-16 16:34:27', '2022-03-16 16:34:27'),
(7, 'عرض الوظائف و الصلاحيات', 'index-roles', 'ادارة الوظائف و الصلاحيات', '2022-01-17 22:52:14', '2022-01-17 22:52:20'),
(8, 'اضافة وظيفة', 'create-roles', 'ادارة الوظائف و الصلاحيات', '2022-01-17 22:52:14', '2022-01-17 22:52:20'),
(9, 'تعديل وظيفة', 'edit-roles', 'ادارة الوظائف و الصلاحيات', '2022-01-17 22:52:14', '2022-01-17 22:52:20'),
(10, 'صلاحيات الوظيفة', 'permissions-roles', 'ادارة الوظائف و الصلاحيات', '2022-01-17 22:52:14', '2022-01-17 22:52:20'),
(11, 'مسح وظيفة', 'delete-roles', 'ادارة الوظائف و الصلاحيات', '2022-01-17 22:52:14', '2022-01-17 22:52:20'),
(12, 'عرض العملاء', 'index-customers', 'ادارة العملاء', '2022-01-17 22:52:14', '2022-01-17 22:52:20'),
(13, 'اضافة عميل', 'create-customers', 'ادارة العملاء', '2022-01-17 22:52:14', '2022-01-17 22:52:20'),
(14, 'تعديل عميل', 'edit-customers', 'ادارة العملاء', '2022-01-17 22:52:14', '2022-01-17 22:52:20'),
(15, 'مسح عميل', 'delete-customers', 'ادارة العملاء', '2022-01-17 22:52:14', '2022-01-17 22:52:20'),
(16, 'تفعيل عميل', 'publish-customers', 'ادارة العملاء', '2022-01-17 22:52:14', '2022-01-17 22:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `des_en` text DEFAULT NULL,
  `des_ar` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `slug`, `title_en`, `title_ar`, `des_en`, `des_ar`, `main_image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Relaxation-Massage-Candle', 'Relaxation Massage Candle', 'شمعة', '<p>Ut tristique et egestas quis ipsum suspendisse ultrices gravida. Porttitor rhoncus dolor purus non. Eros donec ac odio tempor orci dapibus. Varius vel pharetra vel turpis nunc eget lorem dolor. Tristique nulla aliquet enim tortor at auctor odio pellentesque diam.</p>\n<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>', '<p>الشمعة هي وسيلة للأنارة قديمة جدًا لم تفقد أهميتها مع مرور الزمن، وهي عبارة عن عمود من الشمع يمر في وسطه خيط قطني، فعند أشعال الخيط تأخذ النار بأذابة الشمع من حول الخيط وتستمر النار مشتعلة دون أتلاف الخيط وبذلك تشع النار في أضاءة ما حولها</p>\n<p>أستخدمت الشموع لعصور طويلة للأنارة حيث هناك حاملات للشموع تسمى الشمعدان بأشكال مختلفة بعضها من البلور أو من الفضة أو من الذهب ذو قيمة فنية وأثارية قيمة للغاية.</p>', '1664285886-pic1.jpg', 100, '2022-09-27 13:38:06', '2022-09-27 13:38:06'),
(2, 'private-Majid-Massage’s-organic-oil-100percentage', 'private Majid Massage’s organic oil 100%', 'زيت مساج ماجد طبيعي 100%', '<p>Ut tristique et egestas quis ipsum suspendisse ultrices gravida. Porttitor rhoncus dolor purus non. Eros donec ac odio tempor orci dapibus. Varius vel pharetra vel turpis nunc eget lorem dolor. Tristique nulla aliquet enim tortor at auctor odio pellentesque diam.</p>', '<p>Ut tristique et egestas quis ipsum suspendisse ultrices gravida. Porttitor rhoncus dolor purus non. Eros donec ac odio tempor orci dapibus. Varius vel pharetra vel turpis nunc eget lorem dolor. Tristique nulla aliquet enim tortor at auctor odio pellentesque diam.</p>', '1664286986-pic3.jpg', 25, '2022-09-27 13:52:19', '2022-09-27 13:56:26'),
(3, 'compresses', 'compresses', 'الكمادات', '<p>Ut tristique et egestas quis ipsum suspendisse ultrices gravida. Porttitor rhoncus dolor purus non. Eros donec ac odio tempor orci dapibus. Varius vel pharetra vel turpis nunc eget lorem dolor. Tristique nulla aliquet enim tortor at auctor odio pellentesque diam.</p>', '<p>Ut tristique et egestas quis ipsum suspendisse ultrices gravida. Porttitor rhoncus dolor purus non. Eros donec ac odio tempor orci dapibus. Varius vel pharetra vel turpis nunc eget lorem dolor. Tristique nulla aliquet enim tortor at auctor odio pellentesque diam.</p>', '1664286948-pic2.jpg', 30, '2022-09-27 13:52:19', '2022-09-27 13:55:48'),
(4, 'organic-oil-100percentag', 'organic oil 100%', 'زيت طبيعي 100%', '<p>Ut tristique et egestas quis ipsum suspendisse ultrices gravida. Porttitor rhoncus dolor purus non. Eros donec ac odio tempor orci dapibus. Varius vel pharetra vel turpis nunc eget lorem dolor. Tristique nulla aliquet enim tortor at auctor odio pellentesque diam.</p>', '<p>Ut tristique et egestas quis ipsum suspendisse ultrices gravida. Porttitor rhoncus dolor purus non. Eros donec ac odio tempor orci dapibus. Varius vel pharetra vel turpis nunc eget lorem dolor. Tristique nulla aliquet enim tortor at auctor odio pellentesque diam.</p>', '1665585982-pic3.jpg', 200, '2022-09-27 13:52:19', '2022-10-12 14:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '1664360516-1.jpg', 4, '2022-09-28 10:21:56', '2022-09-28 10:21:56'),
(2, '1664360516-2.jpg', 4, '2022-09-28 10:21:56', '2022-09-28 10:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) NOT NULL,
  `room_service` int(11) DEFAULT NULL,
  `staff` int(11) DEFAULT NULL,
  `comfort` int(11) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `free_wifi` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `overall` int(11) DEFAULT NULL,
  `published` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `room_service`, `staff`, `comfort`, `location`, `free_wifi`, `comment`, `overall`, `published`, `user_id`, `booking_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 3, 3, 5, 'Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make specimen', 5, 1, 1, 12, '2022-09-13 14:45:47', '2022-09-21 13:53:53'),
(2, 4, 1, 5, 4, 5, 'Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make specimen', 5, 1, 1, 12, '2022-09-15 08:08:08', '2022-09-21 13:53:50'),
(3, 4, 1, 4, 4, 5, 'Best service are provide us. simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make specimen', 4, 1, 1, 12, '2022-09-15 14:41:40', '2022-09-21 13:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `description`) VALUES
(1, 'مدير عام', 1, 1, '2022-03-13 12:19:51', '2022-03-13 12:19:51', ''),
(2, 'خدمة عملاء', 1, 1, '2022-03-13 12:19:51', '2022-03-13 12:19:51', ''),
(3, 'موارد بشرية', 1, 1, '2022-03-13 12:19:51', '2022-03-13 12:19:51', ''),
(11, 'مسؤل علاقات', NULL, NULL, '2022-06-21 23:29:15', '2022-06-21 23:29:15', 'وذاك');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `des_en` text DEFAULT NULL,
  `des_ar` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT 0,
  `duration` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title_en`, `title_ar`, `des_en`, `des_ar`, `main_image`, `price`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Sauna', 'سونا', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</p>', '<p>asdasd</p>', '1_2.png', 0, 10, '2022-09-14 13:06:20', '2022-09-14 13:11:18'),
(2, 'Jacuzzi', 'جاكوزي', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</p>', '<p>asdasd</p>', '2_2.png', 0, 20, '2022-09-14 13:06:20', '2022-09-14 13:11:18'),
(3, 'Moroccan Bath', 'حمام مغربي', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</p>', '<p>asdasd</p>', '6.png', 0, 30, '2022-09-14 13:06:20', '2022-09-14 13:11:18'),
(4, 'Full body massage under steam', 'تدليك كامل الجسم بالبخار', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</p>', '<p>asdasd</p>', '7.png', 0, 0, '2022-09-14 13:06:20', '2022-09-14 13:11:18'),
(5, 'Foot massage with stone', 'تدليك القدمين بالحجارة', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</p>', '<p>asdasd</p>', '8.png', 0, 0, '2022-09-14 13:06:20', '2022-09-14 13:11:18'),
(6, 'Foot massage', 'تدليك القدمين', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</p>', '<p>asdasd</p>', '9.png', 0, 0, '2022-09-14 13:06:20', '2022-09-14 13:11:18'),
(7, 'Full body massage with stone', 'تدليك كامل الجسم بالحجارة', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</p>', '<p>asdasd</p>', '10.png', 0, 0, '2022-09-14 13:06:20', '2022-09-14 13:11:18'),
(8, 'Full body massage (60 Minutes)', 'تدليك كامل الجسم', '<p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in</p>', '<p>asdasd</p>', '11.png', 0, 0, '2022-09-14 13:06:20', '2022-09-14 13:11:18'),
(17, 'asdasd', 'asdaasdasd', '<p>aasdsad</p>', '<p>asdasdasd</p>', '1669025892-bg-ar.jpg', 12, 50, '2022-11-21 10:18:12', '2023-01-29 13:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'favicon.png',
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_subtext` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_subtext_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_text_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_checkin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_checkout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_cancellation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_children_and_bed` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_age_restriction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_pets` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_card` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_cancellation_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_children_and_bed_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_age_restriction_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_pets_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rules_card_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transportation_fees` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `phone`, `email`, `logo`, `favicon`, `address_en`, `address_ar`, `map`, `home_text`, `home_subtext`, `home_subtext_ar`, `mission`, `home_text_ar`, `mission_ar`, `rules_checkin`, `rules_checkout`, `rules_cancellation`, `rules_children_and_bed`, `rules_age_restriction`, `rules_pets`, `rules_card`, `rules_cancellation_ar`, `rules_children_and_bed_ar`, `rules_age_restriction_ar`, `rules_pets_ar`, `rules_card_ar`, `meta_title_en`, `meta_title_ar`, `meta_description_en`, `meta_description_ar`, `meta_keyword_en`, `meta_keyword_ar`, `created_at`, `updated_at`, `transportation_fees`) VALUES
(1, '+41 232 525 5257 +41 856 525 5369', 'info@massagemajed.com', 'https://sevenfoods.app/images/site/https://sevenfoods.app/images/site/https://sevenfoods.app/images/site/https://sevenfoods.app/images/site/default.png', 'https://sevenfoods.app/images/site/https://sevenfoods.app/images/site/https://sevenfoods.app/images/site/https://sevenfoods.app/images/site/favicon.png', '121 King Street, Melbourne Victoria 3000 Australia', 'عثمان بن عفان مسجد الدرع ,المدينة 423131, السعودية', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3705.644834281364!2d39.14680001476554!3d21.75529066795457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3ce876fba758f%3A0xed34a92c0837e24a!2sMassage%20Majid!5e0!3m2!1sen!2seg!4v1672837930775!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '<h2 class=\"aon-banner2-heading\">Your Trust is Our Greatest Incentive !</h2>', '<h5 class=\"aon-banner2-heading1\">Ready to feel so much better?</h5>', '<p>على استعداد للشعور بتحسن كبير ؟</p>\r\n<section class=\"aon-med-how-work\"></section>', '<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">Mauris vel quam vel felis maximus bibendum vel quis erat. Duis accumsan posuere est quis egestas. Donec nec odio non tellus convallis mattis a nec purus. Duis quis tortor elit.</p>\r\n<div>&nbsp;</div>\r\n<div>\r\n<div>\r\n<div style=\"text-align: center;\">Mauris vel quam vel felis maximus bibendum vel quis erat. Duis accumsan posuere est quis egestas. Donec nec odio non tellus convallis mattis a nec purus. Duis quis tortor elit</div>\r\n<div style=\"text-align: center;\">&nbsp;</div>\r\n</div>\r\n</div>', '<h2 class=\"aon-banner2-heading\">&nbsp;ثقتكم هي أعظم حافز لنا</h2>', '<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><span class=\"Y2IQFc\" lang=\"ar\">تتمثل مهمة مساج ماجد في إضافة قيمة من خلال توفير أفضل بيئة رعاية وشفاء في صناعة السبا حتى يغادر ضيوفنا بتوازن وجمال متجدد.</span></p>', '5:00 PM - 6:00 PM', '12:00 PM - 12:30 PM', '<p>Cancellation and prepayment policies vary according to accommodations type. Please enter the dates of your stay and check what conditions apply to your preferred room.</p>', '<p>- Children of all ages are welcome.</p>\r\n<p>- To see correct prices and occupancy info, add the number and ages of children in your group to your search.</p>\r\n<p>- Cribs and extra beds aren\'t available at this property.</p>', '<div class=\"col-xs-7\">\r\n<h4>There\'s no age requirement for check-in</h4>\r\n</div>', '<div class=\"col-xs-7\">\r\n<h4>Pets are not allowed.</h4>\r\n</div>', '<p>we accepts these cards and reserves the right to temporarily hold an amount prior to arrival</p>', '<div id=\"tw-target-text-container\" class=\"tw-ta-container F0azHf tw-lfl\" tabindex=\"0\">\r\n<p id=\"tw-target-text\" class=\"tw-data-text tw-text-large tw-ta\" dir=\"rtl\" data-placeholder=\"Translation\">تتباين سياسة إلغاء الحجز والدفع المسبق وفقاً لنوع مكان الإقامة المحجوز. يرجى التحقق من الشروط التي قد يتم تطبيقها على كل خيار عند تحديد اختيارك.</p>\r\n</div>\r\n<div id=\"tw-target-rmn-container\" class=\"tw-target-rmn tw-ta-container F0azHf tw-nfl\"></div>', '<p>- يرحب بالأطفال أياً كانت أعمارهم.</p>\r\n<p>- لرؤية معلومات الأسعار والإشغال الصحيحة، يرجى إضافة عدد الأطفال في مجموعتك وأعمارهم إلى بحثك.</p>\r\n<p>- لا يوجد متّسع لأسرّة الأطفال في مكان الإقامة هذا.</p>', '<div id=\"tw-target-text-container\" class=\"tw-ta-container F0azHf tw-lfl\" tabindex=\"0\">\r\n<h4 id=\"tw-target-text\" class=\"tw-data-text tw-text-large tw-ta\" dir=\"rtl\" data-placeholder=\"Translation\"><span class=\"Y2IQFc\" lang=\"ar\">لا يوجد عمر محدد لتسجيل الوصول</span></h4>\r\n</div>\r\n<div id=\"tw-target-rmn-container\" class=\"tw-target-rmn tw-ta-container F0azHf tw-nfl\"></div>', '<div id=\"tw-target-text-container\" class=\"tw-ta-container F0azHf tw-lfl\" tabindex=\"0\">\r\n<h4 id=\"tw-target-text\" class=\"tw-data-text tw-text-large tw-ta\" dir=\"rtl\" data-placeholder=\"Translation\"><span class=\"Y2IQFc\" lang=\"ar\">غير مسموح بالحيوانات الاليفة.</span></h4>\r\n</div>\r\n<div id=\"tw-target-rmn-container\" class=\"tw-target-rmn tw-ta-container F0azHf tw-nfl\"></div>', '<div id=\"tw-target-text-container\" class=\"tw-ta-container F0azHf tw-lfl\" tabindex=\"0\">\r\n<p id=\"tw-target-text\" class=\"tw-data-text tw-text-large tw-ta\" dir=\"rtl\" data-placeholder=\"Translation\"><span class=\"Y2IQFc\" lang=\"ar\" style=\"font-size: 10pt;\">نقبل هذه البطاقات ونحتفظ بالحق في احتجاز مبلغ بشكل مؤقت قبل الوصول</span></p>\r\n</div>\r\n<div id=\"tw-target-rmn-container\" class=\"tw-target-rmn tw-ta-container F0azHf tw-nfl\"></div>', 'test', 'test_ar', 'test', 'test_ar', 'test', 'test_ar', '2021-07-14 08:07:54', '2022-11-21 12:11:27', 20);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` tinyint(1) DEFAULT 0,
  `order_field` bigint(255) DEFAULT 1,
  `admin_id` bigint(11) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title_ar` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `summary_ar` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `summary`, `main_image`, `published`, `order_field`, `admin_id`, `created_at`, `updated_at`, `title_ar`, `summary_ar`) VALUES
(8, 'Image 1', 'Image 1', 'yffXSDrW9Y1661165917.jpg', 0, 1, 1, '2017-02-26 09:59:41', '2022-08-22 10:58:37', 'Image 1', 'Image 1'),
(9, 'Image 2', 'Image 2', 'D2zDfTsIHo1662389819.jpg', 1, 1, 1, '2017-02-28 10:18:20', '2022-09-05 14:56:59', 'Image 2', 'Image 2'),
(10, 'Image 3', 'Image 3', 'RZTAfkJvg91662389634.jpg', 1, 1, 1, '2022-04-20 11:53:53', '2022-09-05 14:53:54', 'Image 3', 'Image 3');

-- --------------------------------------------------------

--
-- Table structure for table `social_settings`
--

CREATE TABLE `social_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_settings`
--

INSERT INTO `social_settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'https://www.facebook.com', '2021-07-14 08:07:54', '2022-09-19 15:47:33'),
(2, 'twitter', 'https://www.twitter.com/', '2021-07-14 08:07:55', '2022-10-31 12:46:36'),
(6, 'instagram', 'https://www.instagram.com/', '2021-07-14 08:07:55', '2022-09-19 15:47:21'),
(7, 'youtube', 'https://www.youtube.com/', '2021-07-14 08:07:55', '2022-10-31 12:46:36'),
(8, 'google_review_link', 'https://www.google.com/search?q=massage+majed+%D8%A7%D9%84%D8%B3%D8%B9%D9%88%D8%AF%D9%8A%D8%A9&sxsrf=ALiCzsZVy-rvle3zQVDibN_P2XlfoKt1qA%3A1667219072428&ei=gL5fY6jkGYjgkgXZyYawDg&ved=0ahUKEwiopMyEu4r7AhUIsKQKHdmkAeYQ4dUDCA8&uact=5&oq=massage+majed+%D8%A7%D9%84%D8%B3%D8%B9%D9%88%D8%AF%D9%8A%D8%A9&gs_lcp=Cgxnd3Mtd2l6LXNlcnAQAzIFCAAQogQyBQgAEKIEMgUIABCiBDIFCAAQogQ6CwgAEAgQHhCwAxAKOggIABCGAxCwAzoFCCEQoAE6BggAEBYQHkoECEEYAUoECEYYAFDaBFjhOWDZPWgDcAB4AIABpgGIAf4MkgEEMC4xMZgBAKABAcgBAsABAQ&sclient=gws-wiz-serp#lrd=0x15c3ce876fba758f:0xed34a92c0837e24a,1', NULL, '2022-10-31 12:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT 0,
  `admin_id` bigint(11) UNSIGNED DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `published`, `admin_id`, `created_at`, `updated_at`) VALUES
(62, 'mnaguib@ads.com', 0, 0, '2022-09-22 06:19:58', '2022-08-22 10:23:04'),
(63, 'hossam.t.hussein@gmail.com', 1, 0, '2022-09-22 10:20:09', '2022-08-22 10:20:09'),
(64, 'mohamednabilfarouk@gmail.com', 0, 0, '2022-09-20 14:53:56', '2022-09-20 14:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `des_en` text DEFAULT NULL,
  `des_ar` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_special` tinyint(4) NOT NULL DEFAULT 0,
  `off_day` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `title_en`, `title_ar`, `des_en`, `des_ar`, `image`, `is_special`, `off_day`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mohamed Nabil farouk Amin', 'Foot Massage Specialest', 'متخصص مساج', NULL, NULL, '1664711302-6.jpg', 0, '2023-01-28', 1, '2022-10-02 11:48:22', '2022-10-02 12:25:38'),
(3, 'Ahmed Ali', 'Foot Massage Specialest', 'متخصص مساج', NULL, NULL, '1664795947-doctor.png', 0, NULL, 1, '2022-10-02 11:48:22', '2022-10-03 11:19:07'),
(4, 'Omar karem', 'Foot Massage Specialest', 'متخصص مساج', NULL, NULL, '1664795921-video.jpg', 0, NULL, 1, '2022-10-02 11:48:22', '2022-10-03 11:18:41'),
(5, 'Mohamed Amin', 'Foot Massage Specialest', 'متخصص مساج', NULL, NULL, '1664795910-gallery.jpg', 0, NULL, 1, '2022-10-02 11:48:22', '2022-10-03 11:18:30'),
(6, 'Ahmed Osama', 'Foot Massage Specialest', 'متخصص مساج', NULL, NULL, '1664795898-doctor.png', 0, NULL, 1, '2022-10-02 11:48:22', '2022-10-03 11:18:18'),
(7, 'karem Tarek', 'hmam ma8reby Specialest', 'متخصص حمام مغربي', NULL, NULL, '1669549459-avatar.jpg', 1, '2023-01-28', 1, '2022-10-02 11:48:22', '2023-01-17 20:51:34'),
(8, 'virsual', 'hmam ma8reby Specialest', 'متخصص حمام مغربي', NULL, NULL, '1669549459-avatar.jpg', 1, NULL, 0, '2022-10-02 11:48:22', '2023-01-23 08:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `balance` double DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `password`, `role`, `balance`, `remember_token`, `address`, `lat`, `lng`, `fcm_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed Nabil', 'mohamednabilfarouk@gmail.com', NULL, '123123123', '$2y$10$Pv0zb.RF/EK4TO/M8kW5jO2v8BWBYIwgiyoEwV6XQqK3wTgbUxND2', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-07 08:39:40', '2022-12-08 08:06:11'),
(2, 'mohamed', 'aa@a.com', NULL, '01011941903', '$2y$10$SqYn0DNM9XpMgPeLHMKTNulLKJcO5NYzBwNrfEdDt5eVD0d73X4Yi', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-07 09:08:27', '2022-09-07 09:08:27'),
(3, 'aaa', 'a@a.com', NULL, NULL, '$2y$10$pT0.e67y5jDkzICoaYszdeW3jrA7.AstNqP98Y2Lz2ikGznDj5kmK', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-07 09:33:34', '2022-09-07 09:33:34'),
(4, 'asdsad', 'ss@ss.com', NULL, NULL, '$2y$10$bV2rV9EFi4pFABW/j.8I2uQjdTPjbDsq1qvtxvWqniQiC0u2GjzE6', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-07 11:02:25', '2022-09-07 11:02:25'),
(5, 'asdasd', 'ss@ssss.com', NULL, NULL, '$2y$10$VdiKUcom6sbKuzS9lZ1vdO5UbeGuJ6YDDkPz47OsTWPjKarG7ZGIi', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-07 11:04:20', '2022-09-07 11:04:20'),
(6, 'ahmed', 'ss@ssa.com', NULL, NULL, '$2y$10$I8v62uRACRxbUJWihLBcR.SmsSge/WTtW0CNrlsgMpvS64WIPYNYy', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-07 11:05:05', '2022-09-07 11:05:05'),
(7, '0102233455', 'aaa@aaa.com', NULL, NULL, '$2y$10$/uIEVdrxkE0RzeJJBu2m5OtT5F3oIGWzcDKhrZKKBCC.8B2ebsowK', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-07 11:11:25', '2022-09-07 11:11:25'),
(8, 'ahmed', 'ss@ssas.com', NULL, '0102233455', '$2y$10$9ylaEzqGWPSPiOmQ6ePjcOV8wMRVETKB.USFCsPWTIDbpX4wRLVyC', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-06 11:13:06', '2022-09-07 11:13:06'),
(9, 'asaass', 'alef@gmail.com', NULL, '0102233455', '$2y$10$k1QclTz.wCCb/AudBkUjMuvUonU0DvAS2msXjx7uNpEalNLPFS2iq', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-09-27 10:07:39', '2022-09-27 10:07:39'),
(11, 'mohamed', 'mohamednabilfarouk@gmail.com', NULL, '01111748937', '$2y$10$Wh28GO3IBFxBvci9j7zZhePtNR5RWVmQX.4h48V1Xohrk3ha9cCTu', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-12-12 10:05:52', '2023-01-23 06:03:16'),
(12, 'maaaaa', 'aaa@aasdasd.com', NULL, '011111111', '$2y$10$fYOikoVBP2xPp.I/CxWV8un3.5menPuAgfK9fUEnIqcJb8cHzRCbO', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2022-12-13 09:08:02', '2022-12-13 09:08:02'),
(13, 'hh', 'hh@g.com', NULL, '01011941905', '$2y$10$ltVxluxZeMzWX0fuvntG/OnATgixYrt..nl/SzglLiMGnj71U.VB.', 'customer', 0, NULL, NULL, NULL, NULL, NULL, '2023-01-02 08:41:29', '2023-01-02 08:41:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `configs_field_name_unique` (`field_name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `group_permissions`
--
ALTER TABLE `group_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_imageable_id_imageable_type_index` (`imageable_id`,`imageable_type`),
  ADD KEY `image_name` (`image_name`),
  ADD KEY `imageable_id` (`imageable_id`),
  ADD KEY `imageable_type` (`imageable_type`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `published` (`published`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_service`
--
ALTER TABLE `package_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `published` (`published`);

--
-- Indexes for table `social_settings`
--
ALTER TABLE `social_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `group_permissions`
--
ALTER TABLE `group_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `package_service`
--
ALTER TABLE `package_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `social_settings`
--
ALTER TABLE `social_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
