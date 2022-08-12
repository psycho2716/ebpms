-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 03:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `barangay_name` varchar(50) NOT NULL,
  `barangay_captain` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `treasurer` varchar(50) NOT NULL,
  `secretary` varchar(50) NOT NULL,
  `kagawad_1` varchar(50) NOT NULL,
  `kagawad_2` varchar(50) NOT NULL,
  `kagawad_3` varchar(50) NOT NULL,
  `kagawad_4` varchar(50) NOT NULL,
  `kagawad_5` varchar(50) NOT NULL,
  `kagawad_6` varchar(50) NOT NULL,
  `kagawad_7` varchar(50) NOT NULL,
  `bhw` varchar(50) NOT NULL,
  `sk_kagawad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `barangay_name`, `barangay_captain`, `address`, `treasurer`, `secretary`, `kagawad_1`, `kagawad_2`, `kagawad_3`, `kagawad_4`, `kagawad_5`, `kagawad_6`, `kagawad_7`, `bhw`, `sk_kagawad`) VALUES
(3, 'eric', 'c6388979247bfa077409e0e8bf926dd8', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
