-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 06:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tredpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `replied` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `uid`, `type`, `message`, `created_at`) VALUES
(30, 11, 'admin', 'Note Added.', '2022-01-22 14:14:41'),
(31, 11, 'admin', 'Note Added.', '2022-01-22 14:17:40'),
(32, 11, 'admin', 'Note Added.', '2022-01-22 14:22:50'),
(33, 11, 'admin', 'Transaction Deleted.', '2022-01-22 14:24:43'),
(34, 11, 'admin', 'Note Deleted.', '2022-01-22 14:24:43'),
(35, 11, 'admin', 'Note Added.', '2022-01-22 14:24:57'),
(36, 11, 'admin', 'Note Added.', '2022-01-22 14:53:31'),
(37, 11, 'admin', 'Profile Updated.', '2022-01-22 14:59:24'),
(38, 11, 'admin', 'Note Added.', '2022-01-22 17:37:18'),
(39, 12, 'admin', 'Note Added.', '2022-01-22 17:40:48'),
(40, 13, 'admin', 'Profile Updated.', '2022-01-22 19:20:48'),
(45, 11, 'admin', 'Profile Updated.', '2022-01-23 19:20:58'),
(46, 11, 'admin', 'Profile Updated.', '2022-01-26 21:34:11'),
(47, 11, 'admin', 'Profile Updated.', '2022-01-26 21:35:31'),
(48, 11, 'admin', 'Profile Updated.', '2022-01-29 10:32:22'),
(49, 11, 'admin', 'Profile Updated.', '2022-01-29 19:21:24'),
(50, 11, 'admin', 'Profile Updated.', '2022-01-29 22:09:24'),
(51, 11, 'admin', 'Profile Updated.', '2022-01-29 22:09:43'),
(52, 11, 'admin', 'Profile Updated.', '2022-01-29 22:10:02'),
(53, 11, 'admin', 'Profile Updated.', '2022-01-29 22:10:16'),
(54, 11, 'admin', 'New transaction initiated.', '2022-01-30 09:55:02'),
(55, 11, 'admin', 'Transaction Deleted.', '2022-01-30 09:55:42'),
(56, 11, 'admin', 'Note Deleted.', '2022-01-30 09:55:42'),
(57, 11, 'admin', 'Transaction approved.', '2022-01-30 10:39:39'),
(58, 11, 'admin', 'Transaction approved.', '2022-01-30 10:39:42'),
(59, 11, 'admin', 'Transaction approved.', '2022-01-30 10:40:50'),
(60, 11, 'admin', 'New transaction initiated.', '2022-01-30 10:41:12'),
(61, 11, 'admin', 'Transaction approved.', '2022-01-30 10:44:27'),
(62, 11, 'admin', 'Transaction approved.', '2022-01-30 10:45:04'),
(63, 11, 'admin', 'Transaction approved.', '2022-01-30 10:46:03'),
(64, 11, 'admin', 'Transaction approved.', '2022-01-30 11:02:56'),
(65, 11, 'admin', 'Transaction approved.', '2022-01-30 11:04:57'),
(66, 14, 'admin', 'New transaction initiated.', '2022-01-30 11:40:02'),
(67, 14, 'admin', 'New transaction initiated.', '2022-01-30 11:49:15'),
(68, 11, 'admin', 'Transaction approved.', '2022-01-30 11:49:41'),
(69, 14, 'admin', 'Transaction approved.', '2022-01-30 11:50:29'),
(70, 14, 'admin', 'Transaction Deleted.', '2022-01-30 11:55:24'),
(71, 14, 'admin', 'Note Deleted.', '2022-01-30 11:55:24'),
(72, 11, 'admin', 'Transaction approved.', '2022-01-30 12:02:24'),
(73, 11, 'admin', 'Transaction approved.', '2022-01-30 12:11:46'),
(74, 14, 'admin', 'Transaction approved.', '2022-01-30 12:14:04'),
(75, 11, 'admin', 'Transaction Deleted.', '2022-01-30 18:53:16'),
(76, 11, 'admin', 'Note Deleted.', '2022-01-30 18:53:16'),
(77, 11, 'admin', 'Transaction Deleted.', '2022-01-30 19:52:22'),
(78, 11, 'admin', 'Note Deleted.', '2022-01-30 19:52:22'),
(79, 11, 'admin', 'New transaction initiated.', '2022-01-30 19:53:58'),
(80, 14, 'admin', 'New payment.', '2022-01-30 22:52:21'),
(81, 14, 'admin', 'New payment.', '2022-01-30 23:37:16'),
(82, 14, 'admin', 'New payment.', '2022-01-30 23:39:23'),
(83, 14, 'admin', 'New payment.', '2022-01-31 18:28:28'),
(84, 14, 'admin', 'New payment.', '2022-01-31 18:31:04'),
(85, 14, 'admin', 'New payment.', '2022-01-31 18:34:40'),
(86, 14, 'admin', 'Transaction approved.', '2022-01-31 18:39:06'),
(87, 11, 'admin', 'New transaction initiated.', '2022-01-31 18:57:33'),
(88, 11, 'admin', 'Transaction approved.', '2022-01-31 19:07:44'),
(89, 11, 'admin', 'New transaction initiated.', '2022-01-31 19:12:33'),
(90, 14, 'admin', 'New payment.', '2022-01-31 19:12:52'),
(91, 14, 'admin', 'Transaction approved.', '2022-01-31 19:13:26'),
(92, 11, 'admin', 'Transaction approved.', '2022-01-31 19:21:37'),
(93, 14, 'admin', 'Transaction approved.', '2022-01-31 19:29:07'),
(94, 11, 'admin', 'Transaction approved.', '2022-01-31 19:29:41'),
(95, 14, 'admin', 'Transaction approved.', '2022-01-31 20:00:33'),
(96, 11, 'admin', 'Transaction approved.', '2022-01-31 20:00:56'),
(97, 11, 'admin', 'New transaction initiated.', '2022-02-02 14:17:02'),
(98, 14, 'admin', 'New payment.', '2022-02-02 14:24:30'),
(99, 11, 'admin', 'New transaction initiated.', '2022-02-02 14:27:47'),
(100, 14, 'admin', 'New payment.', '2022-02-02 14:28:21'),
(101, 14, 'admin', 'Transaction approved.', '2022-02-02 14:28:51'),
(102, 11, 'admin', 'Transaction approved.', '2022-02-02 14:29:03'),
(103, 11, 'admin', 'New transaction initiated.', '2022-02-02 16:27:27'),
(104, 11, 'admin', 'New transaction initiated.', '2022-02-02 16:28:10'),
(105, 11, 'admin', 'Transaction Deleted.', '2022-02-02 16:52:26'),
(106, 11, 'admin', 'Note Deleted.', '2022-02-02 16:52:26'),
(107, 11, 'admin', 'Transaction Deleted.', '2022-02-02 16:52:30'),
(108, 11, 'admin', 'Note Deleted.', '2022-02-02 16:52:30'),
(109, 11, 'admin', 'New transaction initiated.', '2022-02-03 12:30:32'),
(110, 11, 'admin', 'New transaction initiated.', '2022-02-03 12:34:34'),
(111, 11, 'admin', 'New transaction initiated.', '2022-02-03 12:36:18'),
(112, 11, 'admin', 'Transaction Deleted.', '2022-02-03 12:37:11'),
(113, 11, 'admin', 'Note Deleted.', '2022-02-03 12:37:11'),
(114, 11, 'admin', 'Transaction Deleted.', '2022-02-03 12:37:13'),
(115, 11, 'admin', 'Note Deleted.', '2022-02-03 12:37:13'),
(116, 11, 'admin', 'Transaction Deleted.', '2022-02-03 12:37:15'),
(117, 11, 'admin', 'Note Deleted.', '2022-02-03 12:37:15'),
(118, 11, 'admin', 'Transaction Deleted.', '2022-02-03 12:37:19'),
(119, 11, 'admin', 'Note Deleted.', '2022-02-03 12:37:19'),
(120, 11, 'admin', 'New transaction initiated.', '2022-02-03 12:37:37'),
(121, 11, 'admin', 'Transaction Deleted.', '2022-02-03 12:42:40'),
(122, 11, 'admin', 'Note Deleted.', '2022-02-03 12:42:40'),
(123, 11, 'admin', 'New transaction initiated.', '2022-02-03 12:50:26'),
(124, 11, 'admin', 'Transaction Deleted.', '2022-02-03 12:52:01'),
(125, 11, 'admin', 'Note Deleted.', '2022-02-03 12:52:01'),
(126, 11, 'admin', 'New transaction initiated.', '2022-02-03 12:52:19'),
(127, 11, 'admin', 'Transaction Deleted.', '2022-02-03 12:53:30'),
(128, 11, 'admin', 'Note Deleted.', '2022-02-03 12:53:30'),
(129, 11, 'admin', 'New transaction initiated.', '2022-02-03 12:56:02'),
(130, 11, 'admin', 'Transaction Deleted.', '2022-02-03 12:57:42'),
(131, 11, 'admin', 'Note Deleted.', '2022-02-03 12:57:42'),
(132, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:00:27'),
(133, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:01:22'),
(134, 11, 'admin', 'Note Deleted.', '2022-02-03 13:01:22'),
(135, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:05:17'),
(136, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:05:44'),
(137, 11, 'admin', 'Note Deleted.', '2022-02-03 13:05:44'),
(138, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:05:55'),
(139, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:07:42'),
(140, 11, 'admin', 'Note Deleted.', '2022-02-03 13:07:42'),
(141, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:07:55'),
(142, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:11:21'),
(143, 11, 'admin', 'Note Deleted.', '2022-02-03 13:11:21'),
(144, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:11:34'),
(145, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:16:02'),
(146, 11, 'admin', 'Note Deleted.', '2022-02-03 13:16:02'),
(147, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:16:19'),
(148, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:21:11'),
(149, 11, 'admin', 'Note Deleted.', '2022-02-03 13:21:11'),
(150, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:21:24'),
(151, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:27:39'),
(152, 11, 'admin', 'Note Deleted.', '2022-02-03 13:27:39'),
(153, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:41:57'),
(154, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:51:44'),
(155, 11, 'admin', 'Note Deleted.', '2022-02-03 13:51:44'),
(156, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:51:50'),
(157, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:52:08'),
(158, 11, 'admin', 'Note Deleted.', '2022-02-03 13:52:08'),
(159, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:52:33'),
(160, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:58:22'),
(161, 11, 'admin', 'New transaction initiated.', '2022-02-03 13:58:31'),
(162, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:58:36'),
(163, 11, 'admin', 'Note Deleted.', '2022-02-03 13:58:36'),
(164, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:58:38'),
(165, 11, 'admin', 'Note Deleted.', '2022-02-03 13:58:38'),
(166, 11, 'admin', 'Transaction Deleted.', '2022-02-03 13:58:40'),
(167, 11, 'admin', 'Note Deleted.', '2022-02-03 13:58:40'),
(168, 11, 'admin', 'New transaction initiated.', '2022-02-03 14:16:34'),
(169, 11, 'admin', 'Transaction Deleted.', '2022-02-03 14:19:56'),
(170, 11, 'admin', 'Note Deleted.', '2022-02-03 14:19:56'),
(171, 11, 'admin', 'New transaction initiated.', '2022-02-03 14:20:31'),
(172, 11, 'admin', 'New transaction initiated.', '2022-02-03 14:53:52'),
(173, 11, 'admin', 'Transaction Deleted.', '2022-02-03 14:55:43'),
(174, 11, 'admin', 'Note Deleted.', '2022-02-03 14:55:43'),
(175, 11, 'admin', 'Transaction Deleted.', '2022-02-03 14:55:45'),
(176, 11, 'admin', 'Note Deleted.', '2022-02-03 14:55:45'),
(177, 11, 'admin', 'Transaction Deleted.', '2022-02-03 14:57:17'),
(178, 11, 'admin', 'Note Deleted.', '2022-02-03 14:57:17'),
(179, 11, 'admin', 'Transaction Deleted.', '2022-02-03 14:59:26'),
(180, 11, 'admin', 'Note Deleted.', '2022-02-03 14:59:26'),
(181, 14, 'admin', 'Transaction approved.', '2022-02-03 15:08:35'),
(182, 11, 'admin', 'Transaction approved.', '2022-02-03 15:09:44'),
(183, 11, 'admin', 'Transaction Deleted.', '2022-02-03 15:27:08'),
(184, 11, 'admin', 'Note Deleted.', '2022-02-03 15:27:08'),
(185, 11, 'admin', 'New transaction initiated.', '2022-02-03 15:27:42'),
(186, 14, 'admin', 'New payment.', '2022-02-03 15:39:47'),
(187, 14, 'admin', 'New payment.', '2022-02-03 15:41:12'),
(188, 11, 'admin', 'New transaction initiated.', '2022-02-03 15:48:11'),
(189, 14, 'admin', 'New payment.', '2022-02-03 15:48:50'),
(190, 14, 'admin', 'New payment.', '2022-02-03 15:51:49'),
(191, 14, 'admin', 'Transaction approved.', '2022-02-03 16:10:46'),
(192, 11, 'admin', 'Transaction approved.', '2022-02-03 16:10:57'),
(193, 14, 'admin', 'New payment.', '2022-02-03 18:15:20'),
(194, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:32:20'),
(195, 14, 'admin', 'New payment.', '2022-02-03 18:36:44'),
(196, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:37:22'),
(197, 11, 'admin', 'Note Deleted.', '2022-02-03 18:37:22'),
(198, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:37:33'),
(199, 14, 'admin', 'New payment.', '2022-02-03 18:38:09'),
(200, 14, 'admin', 'Transaction approved.', '2022-02-03 18:38:41'),
(201, 11, 'admin', 'Transaction approved.', '2022-02-03 18:38:54'),
(202, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:41:21'),
(203, 11, 'admin', 'Note Deleted.', '2022-02-03 18:41:21'),
(204, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:41:30'),
(205, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:42:20'),
(206, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:43:05'),
(207, 11, 'admin', 'Note Deleted.', '2022-02-03 18:43:05'),
(208, 14, 'admin', 'New payment.', '2022-02-03 18:43:40'),
(209, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:45:10'),
(210, 14, 'admin', 'New payment.', '2022-02-03 18:45:58'),
(211, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:47:29'),
(212, 14, 'admin', 'New payment.', '2022-02-03 18:47:44'),
(213, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:51:22'),
(214, 11, 'admin', 'Note Deleted.', '2022-02-03 18:51:22'),
(215, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:51:24'),
(216, 11, 'admin', 'Note Deleted.', '2022-02-03 18:51:24'),
(217, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:51:30'),
(218, 14, 'admin', 'New payment.', '2022-02-03 18:51:48'),
(219, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:54:18'),
(220, 14, 'admin', 'New payment.', '2022-02-03 18:55:33'),
(221, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:55:58'),
(222, 11, 'admin', 'Note Deleted.', '2022-02-03 18:55:58'),
(223, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:56:08'),
(224, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:56:22'),
(225, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:56:48'),
(226, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:56:56'),
(227, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:57:01'),
(228, 11, 'admin', 'Note Deleted.', '2022-02-03 18:57:01'),
(229, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:57:04'),
(230, 11, 'admin', 'Note Deleted.', '2022-02-03 18:57:04'),
(231, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:57:07'),
(232, 11, 'admin', 'Note Deleted.', '2022-02-03 18:57:07'),
(233, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:57:10'),
(234, 11, 'admin', 'Note Deleted.', '2022-02-03 18:57:10'),
(235, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:57:13'),
(236, 11, 'admin', 'Note Deleted.', '2022-02-03 18:57:13'),
(237, 11, 'admin', 'Transaction Deleted.', '2022-02-03 18:57:25'),
(238, 11, 'admin', 'Note Deleted.', '2022-02-03 18:57:25'),
(239, 11, 'admin', 'New transaction initiated.', '2022-02-03 18:57:37'),
(240, 14, 'admin', 'New payment.', '2022-02-03 18:58:02'),
(241, 11, 'admin', 'New transaction initiated.', '2022-02-03 19:02:43'),
(242, 11, 'admin', 'New transaction initiated.', '2022-02-03 19:04:22'),
(243, 14, 'admin', 'New payment.', '2022-02-03 19:04:55'),
(244, 14, 'admin', 'Transaction approved.', '2022-02-03 19:05:23'),
(245, 11, 'admin', 'Transaction approved.', '2022-02-03 19:05:54'),
(246, 14, 'admin', 'Transaction approved.', '2022-02-03 19:08:12'),
(247, 11, 'admin', 'Transaction approved.', '2022-02-03 19:22:19'),
(248, 11, 'admin', 'New transaction initiated.', '2022-02-03 19:58:29'),
(249, 14, 'admin', 'New payment.', '2022-02-03 19:58:53'),
(250, 14, 'admin', 'Transaction approved.', '2022-02-03 19:59:19'),
(251, 11, 'admin', 'Transaction approved.', '2022-02-03 19:59:41'),
(252, 11, 'admin', 'New transaction initiated.', '2022-02-03 20:02:11'),
(253, 14, 'admin', 'New payment.', '2022-02-03 20:02:59'),
(254, 14, 'admin', 'Transaction approved.', '2022-02-03 20:03:28'),
(255, 11, 'admin', 'Transaction approved.', '2022-02-03 20:05:51'),
(256, 11, 'admin', 'New transaction initiated.', '2022-02-03 20:46:50'),
(257, 14, 'admin', 'New payment.', '2022-02-03 20:47:50'),
(258, 14, 'admin', 'Transaction approved.', '2022-02-03 20:48:09'),
(259, 11, 'admin', 'Transaction approved.', '2022-02-03 20:48:36'),
(260, 11, 'admin', 'New transaction initiated.', '2022-02-04 07:46:18'),
(261, 14, 'admin', 'New payment.', '2022-02-04 07:46:31'),
(262, 14, 'admin', 'Transaction approved.', '2022-02-04 07:46:41'),
(263, 11, 'admin', 'Transaction approved.', '2022-02-04 07:47:03'),
(264, 11, 'admin', 'New transaction initiated.', '2022-02-04 08:15:35'),
(265, 14, 'admin', 'New payment.', '2022-02-04 08:16:48'),
(266, 14, 'admin', 'Transaction approved.', '2022-02-04 08:17:27'),
(267, 11, 'admin', 'Transaction approved.', '2022-02-04 08:17:51'),
(268, 11, 'admin', 'New transaction initiated.', '2022-02-04 08:28:11'),
(269, 14, 'admin', 'New payment.', '2022-02-04 08:28:35'),
(270, 14, 'admin', 'Transaction approved.', '2022-02-04 08:28:48'),
(271, 11, 'admin', 'Transaction approved.', '2022-02-04 08:28:59'),
(272, 14, 'admin', 'New transaction initiated.', '2022-02-04 08:31:49'),
(273, 11, 'admin', 'New payment.', '2022-02-04 08:32:30'),
(274, 11, 'admin', 'Transaction approved.', '2022-02-04 08:34:36'),
(275, 14, 'admin', 'Transaction approved.', '2022-02-04 08:35:06'),
(276, 11, 'admin', 'New transaction initiated.', '2022-02-04 09:35:13'),
(277, 14, 'admin', 'New payment.', '2022-02-04 10:03:34'),
(278, 11, 'admin', 'Buyer Removed', '2022-02-04 10:22:11'),
(279, 11, 'admin', 'Buyer Removed', '2022-02-04 10:26:15'),
(280, 11, 'admin', 'Buyer Removed', '2022-02-04 10:31:49'),
(281, 11, 'admin', 'Buyer Removed', '2022-02-04 10:32:19'),
(282, 14, 'admin', 'New payment.', '2022-02-04 10:41:28'),
(283, 11, 'admin', 'Buyer Removed', '2022-02-04 10:43:34'),
(284, 14, 'admin', 'New payment.', '2022-02-04 11:01:45'),
(285, 11, 'admin', 'Buyer Removed', '2022-02-04 11:02:02'),
(286, 11, 'admin', 'Buyer Removed', '2022-02-04 11:09:33'),
(287, 14, 'admin', 'New payment.', '2022-02-04 11:12:29'),
(288, 11, 'admin', 'Buyer Removed', '2022-02-04 11:12:44'),
(289, 14, 'admin', 'New payment.', '2022-02-04 11:14:54'),
(290, 11, 'admin', 'New transaction initiated.', '2022-02-04 12:02:12'),
(291, 11, 'admin', 'Buyer Removed', '2022-02-04 14:29:18'),
(292, 11, 'admin', 'Transaction Deleted.', '2022-02-04 14:34:35'),
(293, 11, 'admin', 'Note Deleted.', '2022-02-04 14:34:35'),
(294, 11, 'admin', 'Transaction Deleted.', '2022-02-04 14:34:38'),
(295, 11, 'admin', 'Note Deleted.', '2022-02-04 14:34:38'),
(296, 11, 'admin', 'New transaction initiated.', '2022-02-04 14:37:20'),
(297, 11, 'admin', 'Transaction Deleted.', '2022-02-04 14:39:05'),
(298, 11, 'admin', 'Note Deleted.', '2022-02-04 14:39:05'),
(299, 11, 'admin', 'New transaction initiated.', '2022-02-04 14:40:46'),
(300, 14, 'admin', 'New payment.', '2022-02-04 14:41:13'),
(301, 14, 'admin', 'Transaction approved.', '2022-02-04 14:41:45'),
(302, 11, 'admin', 'Transaction approved.', '2022-02-04 14:42:00'),
(303, 11, 'admin', 'New transaction initiated.', '2022-02-04 14:45:55'),
(304, 14, 'admin', 'New payment.', '2022-02-04 14:46:17'),
(306, 11, 'admin', 'Transaction approved.', '2022-02-04 14:46:54'),
(307, 11, 'admin', 'New transaction initiated.', '2022-02-04 16:26:32'),
(310, 11, 'admin', 'Note Deleted.', '2022-02-06 11:28:06'),
(311, 14, 'admin', 'New transaction initiated.', '2022-02-07 12:36:22'),
(312, 11, 'admin', 'New transaction initiated.', '2022-02-08 11:57:43'),
(313, 11, 'admin', 'Profile Updated.', '2022-02-08 20:21:23'),
(314, 11, 'admin', 'Profile Updated.', '2022-02-09 15:47:52'),
(315, 19, 'admin', 'Profile Updated.', '2022-02-09 16:23:18'),
(316, 19, 'admin', 'Profile Updated.', '2022-02-09 16:23:59'),
(317, 19, 'admin', 'New transaction initiated.', '2022-02-09 16:30:06'),
(318, 19, 'admin', 'Profile Updated.', '2022-02-09 16:31:12'),
(319, 11, 'admin', 'New payment.', '2022-02-09 16:34:09'),
(320, 11, 'admin', 'Transaction approved.', '2022-02-09 16:35:14'),
(321, 19, 'admin', 'Buyer Removed', '2022-02-09 16:37:27'),
(322, 11, 'admin', 'New payment.', '2022-02-09 16:38:20'),
(323, 19, 'admin', 'Transaction approved.', '2022-02-09 16:39:55'),
(324, 19, 'admin', 'New transaction initiated.', '2022-02-10 16:49:08'),
(325, 11, 'admin', 'New payment.', '2022-02-10 16:50:14'),
(326, 11, 'admin', 'Transaction approved.', '2022-02-10 16:51:11'),
(327, 19, 'admin', 'Transaction approved.', '2022-02-10 16:51:24'),
(328, 11, 'admin', 'New transaction initiated.', '2022-02-11 14:54:07'),
(329, 14, 'admin', 'New payment.', '2022-02-13 14:47:46'),
(330, 11, 'admin', 'Buyer Removed', '2022-02-13 14:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `itemName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `sellerToken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `itemDesc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `buyer` int(11) NOT NULL,
  `buyer_approve` int(11) NOT NULL,
  `serviceKey` varchar(102) COLLATE utf8_unicode_ci NOT NULL,
  `sellerAccept` int(11) NOT NULL,
  `list` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `uid`, `itemName`, `price`, `sellerToken`, `itemDesc`, `image`, `buyer`, `buyer_approve`, `serviceKey`, `sellerAccept`, `list`, `created_at`, `updated_at`) VALUES
(4, 11, 'Test', '1000.00', 'GhN9S1QwHwuUYlC0PMoli3g1V2sEVN', 'Testing', '', 14, 1, '1qcBcEpbnK0fAYVH7UUrYONnUv0RvzXQGT3ZRgi6xm5o07vJY0VYP0N6iCqPFT6lXcj7nDZAdMe9bk9insLDg81U9zrkWWX4xyFXxC', 1, 1, '2022-02-04 14:40:46', '2022-02-04 14:40:46'),
(5, 11, 'Test', '1000.00', '2UbwzLEGcpce0xzHiSNqLV2b9MvTz2', 'Testing', '', 14, 1, '50cPQ5oXj6YXkaDM9jS1PgbJmpJbX61NdOcHAnipuCxx6iBIIDvgLZD9lUhGQQcKODB1509HgOuaFqQmlm4icl9vbhP3Z6SZdo7YwC', 1, 1, '2022-02-04 14:45:55', '2022-02-04 14:45:55'),
(6, 11, 'Hip pop beat', '1800.00', 'POHCk0eCye9NnIt4g8AdZgdtWdxLwF', 'Hard hip hop beat', '', 0, 0, '76OAsMi0qWC6uBsUwcHZm1jadftLpFIXsuSiz33j9hFm70P0hCsL47uGvsjAlG8itvPshtvnXLjxSJ6O3iVZyRIvv7rlxBrHc1b4HO', 0, 1, '2022-02-04 16:26:32', '2022-02-04 16:26:32'),
(7, 14, 'Adsense', '500.00', 'hWNQW73tVLDuNRpAmHbunmcC4KwOEs', 'No use', '', 0, 0, 'pMjLT5fPy2lO7WpvFGLTMQzvneHcyEgSS7OWaDydSpqPxo5f14GaIohmmROV5VoRZpSB0rlpxAh7vIOuBSiuWHaYd8rYdrPxaTqbt5', 0, 1, '2022-02-07 12:36:22', '2022-02-07 12:36:22'),
(8, 11, 'Tramp', '5000.00', '6jvTJCY678kqBKkFGq5obVnwjGwhQj', 'Bzhxgz', '', 0, 0, 'lwdAHtC6lxcicPp1Qzgt136TvkBkN9k1wiwMs4NcMfk6eajfxHwU8xouaeusaWihAUNdOEroslLPfvaOEKufM0GjVlVrERZXtIRdOA', 0, 1, '2022-02-08 11:57:43', '2022-02-08 11:57:43'),
(9, 19, 'brema', '100.00', '20Kgw44KPrjvJuUkH4mR7myhTvX8em', 'testing', '', 11, 1, 'xXYipTCMyoYvdK9YQzoOmYjhYNIeABavPuH5baqTLlUYEjhRXYRJUL6o9Jgrbf8gS1NRPK4rSAmJsn0TPwcK3eEmU9iABzfKzVL39l', 1, 1, '2022-02-09 16:30:06', '2022-02-09 16:30:06'),
(10, 19, 'wordpress theme', '500.00', 'KKjDyuSMpVYRtiTOXp0oEgP7hWFImA', 'news wordpress theme', '', 11, 1, 'VqCQwXbHLGC2CvCda251hChPo31dhPI4zgSy1m0ezTjnmeNzseNtd2kLbmB6tS9dCLGokcQu5UCpRGjlb0hpR3NKlKpXROSUy4JRxC', 1, 1, '2022-02-10 16:49:08', '2022-02-10 16:49:08'),
(11, 11, 'wordpress school plugin', '566.00', 'wbcai5EDapXn9I90MW3yTynfaCjL4Q', 'plugin for school', '', 0, 0, 'XJOCEGIBkUprclxVPcC1m3a8SeRuTJwGBK9ZrmfQd0xwoFrr7obZTCoLDzS5AfpFjeeZkDriApiagJDC656M1nvP017Z9v2Dmnwgpw', 0, 1, '2022-02-11 14:54:07', '2022-02-11 14:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `wallet` decimal(11,2) NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `badge` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `dob`, `photo`, `address`, `city`, `state`, `zip_code`, `country`, `wallet`, `token`, `token_expire`, `created_at`, `verified`, `badge`, `deleted`) VALUES
(11, 'Raphael Akpofure', 'blizywap@gmail.com', '$2y$10$H/y8EIVW3hfvColDb5ES/e63yrNF1xmvAsCJokyo9/ssZFFg3Nn1i', '08162446498', 'Male', '2002-04-13', 'uploads/3E8617F0-6BCF-484B-B5F8-81A46F9F6419.jpeg', '12 Willie street', 'Warri', 'Delta', '332211', 'Nigeria', '372.00', '28e6f5561d3d5', '2022-02-10 16:50:14', '2022-01-22 13:42:00', 1, 1, 0),
(12, 'emma', 'emma@gmail.com', '$2y$10$3CoiCJA43efHQXzWESVQ0udgkhA8cTe7dY6iLPE53yrM8.TVKTA0e', '', '', '', '', '', '', '', '', '', '0.00', 'ea1a9e6fc1cb5', '2022-01-22 15:05:54', '2022-01-22 14:55:54', 0, 0, 0),
(13, 'Usama Musa Yahya', 'usamamusayahya@gmail.com', '$2y$10$2Vzmlw9PPFRl0wwSKVWNB.aN/nW0XV.vTDhTlQDpB9EpVZeRrUy6y', '08134464751', '', '2002-01-06', 'uploads/b54ad031c99bafc251f6a5ed0aa63475.jpg', 'Upper Benue Opposite NNPC Filling Station', 'Yola', 'Adamawa State', '640001', 'Nigeria', '0.00', '6071ed594cbac', '2022-02-09 16:16:34', '2022-01-22 19:15:38', 0, 1, 0),
(14, 'Musa yaro', 'musa@gmail.com', '$2y$10$JRbmpj5YGfU9Qik3inquge/nkqO/GxNLwWCmUtsLisfkEE9jw.ZMq', '', '', '', '', '', '', '', '', '', '3937.36', '1857e6a8cdd1c', '2022-02-13 14:54:39', '2022-01-22 19:15:40', 0, 0, 0),
(15, 'Mohammad Mubarak', 'techfx101@gmail.com', '$2y$10$46hZB6WhAuI8sC9R/.eoH.vXH1vB98n1gkk.ucI/gXn3ErTBe2eQm', '', '', '', '', '', '', '', '', '', '0.00', '5cbe5ef681882', '2022-01-22 19:26:56', '2022-01-22 19:16:56', 0, 0, 0),
(16, 'Bilibilee', 'nathansammy887@gmail.com', '$2y$10$LUMTywVUaO.1AoEyLOQc3ulXmLdxJljTeUv60vzx.s5SdowWJsH7e', '', '', '', '', '', '', '', '', '', '0.00', '4ee618556c3a6', '2022-01-22 19:27:46', '2022-01-22 19:17:46', 0, 0, 0),
(17, 'bello', 'bello@gmail.com', '$2y$10$3EYRhlZIgmG5XoLylAB/AuUM3JMgkX5Zza6cQSJ6YAp0dEWpf60im', '', '', '', '', '', '', '', '', '', '0.00', 'c3595d1de5a46', '2022-01-23 13:29:15', '2022-01-23 13:19:15', 0, 0, 0),
(18, 'trednix', 'trednixnetwork@gmail.com', '$2y$10$AW4vIM5SS5GUvAdwHLqY9e3V7pEJ35w5DlmOuIcpV4yCAPETp7K0q', '', '', '', '', '', '', '', '', '', '0.00', '64658c68ee1bd', '2022-01-23 13:32:20', '2022-01-23 13:22:18', 0, 0, 0),
(19, 'David', 'david@gmail.com', '$2y$10$UpwSZGwwvKer9euU8swBU.VQMlUhAwFaS6lXg1yWNn3vRZQ5jKILi', '', 'Male', '1997-11-09', 'uploads/Desert.jpg', '', 'Yabaleft', 'Lagos', '', 'Nigeria', '600.00', '3aa0123922691', '2022-02-10 16:51:24', '2022-02-07 14:52:19', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_follow`
--

CREATE TABLE `user_follow` (
  `follow_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_follow`
--

INSERT INTO `user_follow` (`follow_id`, `following_id`, `follower_id`) VALUES
(14, 11, 19),
(6, 19, 11),
(12, 14, 11),
(10, 14, 19);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(2) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_follow`
--
ALTER TABLE `user_follow`
  ADD PRIMARY KEY (`follow_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_follow`
--
ALTER TABLE `user_follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
