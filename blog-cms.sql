-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2026 at 10:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'c21a28ee3ac17ed7a89eebade523f17f'),
(2, 'admin2', 'c21a28ee3ac17ed7a89eebade523f17f');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `category`, `image`, `content`, `created_at`) VALUES
(2, 'Laravel Developer', 'testbologone', 'Latest Jobs', 'banner.jpg', '<ul>\r\n	<li>Internship certificate will be provided on successfull completion of Intenship.</li>\r\n	<li>Duration upto 6months available</li>\r\n	<li>Internship certificate will be provided on successfull completion of Intenship.</li>\r\n	<li>Duration upto 6months available</li>\r\n</ul>\r\n', '2026-05-12 07:43:19'),
(3, 'PHP Results', 'test-kkaksdf', 'Results', 'banner3.jpg', '<ul>\r\n	<li>We genuinely value work-life balance! We work in a hybrid model, giving you quiet days at home, free from traffic, and&nbsp;<strong>two in-office days a week</strong>&nbsp;to meet your fabulous team face-to-face.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '2026-05-12 07:43:38'),
(4, 'PHP Intership', 'test-job-php', 'Latest Jobs', 'banner1.jpg', '<ul>\r\n	<li>We genuinely value work-life balance! We work in a hybrid model, giving you quiet days at home, free from traffic, and&nbsp;<strong>two in-office days a week</strong>&nbsp;to meet your fabulous team face-to-face.</li>\r\n	<li>We believe that employees who get better make us all better. We strive for professional development and continuous learning. Alongside career support and guidance,&nbsp;<strong>you&rsquo;ll receive an annual training budget</strong>&nbsp;for personal and professional development.</li>\r\n	<li>We don&rsquo;t just offer jobs&mdash;we offer a stake in something bigger. As part of Freightos,&nbsp;<strong>you&rsquo;ll be eligible to receive equity incentive grants that vest over time</strong>, aligning your success with the company&rsquo;s long-term growth. The more we build together, the more you benefit.</li>\r\n</ul>\r\n', '2026-05-12 07:44:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
