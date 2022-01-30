-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 02:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employe_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HR', 'active', '2022-01-29 11:29:03', NULL),
(2, 'PHP', 'active', '2022-01-29 11:29:03', NULL),
(3, 'Android', 'active', '2022-01-29 11:29:14', NULL),
(4, 'IOS', 'active', '2022-01-29 11:29:14', NULL),
(5, 'Graphics Designer', 'active', '2022-01-29 11:29:41', NULL),
(6, 'UI/UX Designer', 'active', '2022-01-29 11:29:41', NULL),
(7, 'SEO', 'active', '2022-01-29 11:29:55', NULL),
(8, 'Business Analyst', 'active', '2022-01-29 11:29:55', NULL),
(9, 'BDM', 'active', '2022-01-29 11:30:06', NULL),
(10, 'QA', 'active', '2022-01-29 11:30:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `photo` varchar(100) NOT NULL,
  `salery` decimal(16,2) NOT NULL DEFAULT 0.00,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employes`
--

INSERT INTO `employes` (`id`, `department_id`, `name`, `email`, `phone`, `dob`, `photo`, `salery`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'BL Mandawaliya', 'b.mandawaliya@gmail.com', '9770543137', '1991-03-13', 'quarantine-shopping_1643461973.jpg', '55000.00', 'active', '2022-01-29 06:10:01', '2022-01-29 07:42:53'),
(2, 5, 'ABCD', 'sheryajaiswal@yopmail.com', '9770543137', '1991-02-13', 'adverstisement-Ram_1643457560.jpg', '65400.00', 'deleted', '2022-01-29 06:29:20', '2022-01-29 07:57:14'),
(3, 3, 'BLM', 'b.mandawaliya@gmail.com', '9770543137', '1991-02-13', 'unnamed_1643461878.jpg', '25000.00', 'active', '2022-01-29 06:31:14', '2022-01-29 07:41:18'),
(4, 9, 'BL Mandawaliya', 'b.mandawaliya@gmail.com', '9770543137', '1994-02-10', 'screencapture-localhost-bagisto-public-customer-account-profile-2021-01-19-09_28_14_1643458277.png', '65002.00', 'active', '2022-01-29 06:41:17', '2022-01-29 06:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mailinator.com', '987410563', '$2y$10$Bcnn3hh5pBiBmkzcfvVnW.X/ZoaEuqSWF81qHjD.HdvdOCLp6WSYi', '2021-10-12 23:33:11', '2021-10-12 23:33:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
