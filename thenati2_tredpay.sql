-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2022 at 11:16 AM
-- Server version: 5.7.37
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thenati2_tredpay`
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `replied` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `fid` int(11) NOT NULL
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(41, 13, 'admin', 'Note Added.', '2022-01-22 19:23:06'),
(42, 16, 'admin', 'Note Added.', '2022-01-22 19:23:28'),
(43, 11, 'admin', 'Profile Updated.', '2022-01-23 19:19:46'),
(44, 11, 'admin', 'Profile Updated.', '2022-01-23 19:20:33'),
(45, 11, 'admin', 'Profile Updated.', '2022-01-23 19:20:58'),
(46, 11, 'admin', 'Profile Updated.', '2022-01-26 21:34:11'),
(47, 11, 'admin', 'Profile Updated.', '2022-01-26 21:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `itemName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sellerToken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `itemDesc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `uid`, `itemName`, `price`, `sellerToken`, `itemDesc`, `created_at`, `updated_at`) VALUES
(18, 11, 'adsense', '6000', 'jg0NePiScTY34VYfBiIxOgumr16QBi', 'verified adsense', '2022-01-22 14:53:31', '2022-01-22 14:53:31'),
(19, 11, 'H', '67', 'zDKBDBfXwCZm6rvi1PpnQBJ8CiiQpr', 'Hh', '2022-01-22 17:37:18', '2022-01-22 17:37:18'),
(20, 12, 'Cad fff', '788', 'sGvvawhrk3VsLeF7ku9XRelPIllW8s', 'Hhh', '2022-01-22 17:40:48', '2022-01-22 17:40:48'),
(21, 13, 'Verified Naija Adsense With Domain', '200000', 'x7dsfQZWqWtpO2tGXgF0uoeDRxD0cp', 'Domain From Domainking\r\n2years Old\r\n15 posts\r\nNo Ads Limit', '2022-01-22 19:23:06', '2022-01-22 19:23:06'),
(22, 16, 'Yes', '500', 'M5574jVIDCQyn3AAf6dA6atEuXxu01', 'Free ads', '2022-01-22 19:23:28', '2022-01-22 19:23:28');

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
  `followers` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `wallet` decimal(11,2) NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `dob`, `photo`, `address`, `city`, `state`, `zip_code`, `country`, `followers`, `following`, `wallet`, `token`, `token_expire`, `created_at`, `verified`, `deleted`) VALUES
(11, 'Raphael Trust', 'blizywap@gmail.com', '$2y$10$H/y8EIVW3hfvColDb5ES/e63yrNF1xmvAsCJokyo9/ssZFFg3Nn1i', '08162446498', 'Male', '2002-04-13', 'uploads/3E8617F0-6BCF-484B-B5F8-81A46F9F6419.jpeg', '12 Willie street', 'Warri', 'Delta', '332211', 'Nigeria', 0, 0, 0.00, '28e6f5561d3d5', '2022-01-26 21:35:15', '2022-01-22 13:42:00', 0, 0),
(12, 'emma', 'emma@gmail.com', '$2y$10$3CoiCJA43efHQXzWESVQ0udgkhA8cTe7dY6iLPE53yrM8.TVKTA0e', '', '', '', '', '', '', '', '', '', 0, 0, 0.00, 'ea1a9e6fc1cb5', '2022-01-22 15:05:54', '2022-01-22 14:55:54', 0, 0),
(13, 'Usama Musa Yahya', 'usamamusayahya@gmail.com', '$2y$10$2Vzmlw9PPFRl0wwSKVWNB.aN/nW0XV.vTDhTlQDpB9EpVZeRrUy6y', '08134464751', '', '2002-01-06', 'uploads/b54ad031c99bafc251f6a5ed0aa63475.jpg', 'Upper Benue Opposite NNPC Filling Station', 'Yola', 'Adamawa State', '640001', 'Nigeria', 0, 0, 0.00, '6071ed594cbac', '2022-01-22 19:20:48', '2022-01-22 19:15:38', 0, 0),
(14, 'Musa yaro', 'musa@gmail.com', '$2y$10$JRbmpj5YGfU9Qik3inquge/nkqO/GxNLwWCmUtsLisfkEE9jw.ZMq', '', '', '', '', '', '', '', '', '', 0, 0, 0.00, '1857e6a8cdd1c', '2022-01-22 19:25:40', '2022-01-22 19:15:40', 0, 0),
(15, 'Mohammad Mubarak', 'techfx101@gmail.com', '$2y$10$46hZB6WhAuI8sC9R/.eoH.vXH1vB98n1gkk.ucI/gXn3ErTBe2eQm', '', '', '', '', '', '', '', '', '', 0, 0, 0.00, '5cbe5ef681882', '2022-01-22 19:26:56', '2022-01-22 19:16:56', 0, 0),
(16, 'Bilibilee', 'nathansammy887@gmail.com', '$2y$10$LUMTywVUaO.1AoEyLOQc3ulXmLdxJljTeUv60vzx.s5SdowWJsH7e', '', '', '', '', '', '', '', '', '', 0, 0, 0.00, '4ee618556c3a6', '2022-01-22 19:27:46', '2022-01-22 19:17:46', 0, 0),
(17, 'bello', 'bello@gmail.com', '$2y$10$3EYRhlZIgmG5XoLylAB/AuUM3JMgkX5Zza6cQSJ6YAp0dEWpf60im', '', '', '', '', '', '', '', '', '', 0, 0, 0.00, 'c3595d1de5a46', '2022-01-23 13:29:15', '2022-01-23 13:19:15', 0, 0),
(18, 'trednix', 'trednixnetwork@gmail.com', '$2y$10$AW4vIM5SS5GUvAdwHLqY9e3V7pEJ35w5DlmOuIcpV4yCAPETp7K0q', '', '', '', '', '', '', '', '', '', 0, 0, 0.00, '64658c68ee1bd', '2022-01-23 13:32:20', '2022-01-23 13:22:18', 0, 0);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
