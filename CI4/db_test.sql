-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2021 at 07:25 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_urls`
--

CREATE TABLE `tbl_urls` (
  `id` bigint(10) NOT NULL,
  `original_url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_urls`
--

INSERT INTO `tbl_urls` (`id`, `original_url`, `short_code`, `created_at`) VALUES
(1, 'http://qrhealing-asia.com', 'TK5VgdXt', '2021-05-12 10:41:41'),
(2, 'https://www.facebook.com/Beauty-No-Vat-101176366611598', 'hJUsIAMp', '2021-05-12 10:46:28'),
(3, 'http://www.soccersuck.com/boards/topic/2001895', 'Of65gu2g', '2021-05-12 11:35:46'),
(4, 'https://reg.neu.ac.th/main/?p=4300', 'rcgRmFTG', '2021-05-12 12:00:31'),
(5, 'https://www.samsung.com/th/', 'zAf0m0in', '2021-05-12 12:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_no` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_urls`
--
ALTER TABLE `tbl_urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_urls`
--
ALTER TABLE `tbl_urls`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
