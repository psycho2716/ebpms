-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 08:04 AM
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
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `barangay_captain` varchar(50) NOT NULL,
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
  `sk_chairman` varchar(50) NOT NULL,
  `barangay_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `barangay_name`, `address`, `barangay_captain`, `treasurer`, `secretary`, `kagawad_1`, `kagawad_2`, `kagawad_3`, `kagawad_4`, `kagawad_5`, `kagawad_6`, `kagawad_7`, `bhw`, `sk_chairman`, `barangay_id`) VALUES
(1, 'Lonos', 'Brgy. Lonos, Romblon, Romblon, Philippines', 'Editha Atanoc', 'Aldrin Mindo', 'Ricardo Capispisan', 'Archie Mindo', 'Reynald Miñon', 'Dominador Madeja', 'Armenda Ramos', 'Jessie Fortu', 'Annie Doblas', 'Bebe Maestro', 'Minchie Arcillas', 'Margie Fortu', 2184),
(2, 'Mapula', 'Brgy. Mapula, Romblon, Romblon, Philippines', 'Editha Atanoc', 'Aldrin Mindo', 'Ricardo Capispisan', 'Archie Mindo', 'Reynald Miñon', 'Dominador Madeja', 'Armenda Ramos', 'Jessie Fortu', 'Annie Doblas', 'Bebe Maestro', 'Minchie Arcillas', 'Margie Fortu', 3950);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `certificate_name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `barangay_id` int(50) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `certificate_name`, `img`, `barangay_id`, `file`) VALUES
(5, 'Business Clearance', 'Romblon-00.jpg', 2184, 'certification.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(50) NOT NULL,
  `barangay_captain` varchar(50) NOT NULL,
  `treasurer` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `secretary` varchar(50) NOT NULL,
  `kagawad_1` varchar(50) NOT NULL,
  `kagawad_2` varchar(50) NOT NULL,
  `kagawad_3` varchar(50) NOT NULL,
  `kagawad_4` varchar(50) NOT NULL,
  `kagawad_5` varchar(50) NOT NULL,
  `kagawad_6` varchar(50) NOT NULL,
  `kagawad_7` varchar(50) NOT NULL,
  `bhw` varchar(50) NOT NULL,
  `sk_kagawad` varchar(50) NOT NULL,
  `barangay_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purok`
--

CREATE TABLE `purok` (
  `id` int(11) NOT NULL,
  `purok_name` varchar(50) NOT NULL,
  `purok_id` int(50) NOT NULL,
  `barangay_id` int(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `purok_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purok`
--

INSERT INTO `purok` (`id`, `purok_name`, `purok_id`, `barangay_id`, `img`, `purok_address`) VALUES
(9, 'Suwa', 2065, 2184, 'mapula.png', 'Brgy. Lonos, Sitio Suwa, Romblon, Romblon'),
(10, 'Ipil', 3687, 2184, 'logo.png', 'Brgy. Lonos, Sitio Ipil, Romblon, Romblon'),
(11, 'Lusod', 3414, 2184, 'logo_copy.png', 'Brgy. Lonos, Sitio Lusod, Romblon, Romblon'),
(12, 'Parayan', 6320, 2184, 'seal.png', 'Brgy. Lonos, Sitio Parayan, Romblon, Romblon'),
(14, 'Matiniison', 7448, 3950, '', 'Brgy. cabugaw, Sitio Batiano, Romblon, Romblon');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `residents_address` varchar(50) NOT NULL,
  `purok_id` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `barangay_id` varchar(50) NOT NULL,
  `civil_status` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `school_attainment` varchar(50) NOT NULL,
  `skills` varchar(50) NOT NULL,
  `blood_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `first_name`, `residents_address`, `purok_id`, `dob`, `gender`, `barangay_id`, `civil_status`, `citizenship`, `last_name`, `middle_name`, `occupation`, `school_attainment`, `skills`, `blood_type`) VALUES
(14, 'Ricardo', 'Brgy. Lonos, Sitio Ipil, Romblon, Romblon', '3687', '1994-08-18', 'Male', '2184', 'Single', 'Filipino', 'Dalisay', 'E.', '', '', '', ''),
(22, 'Eric John ', 'Brgy. Lonos, Sitio Suwa, Romblon, Romblon', '2065', '1997-08-18', 'Male', '2184', 'Single', 'Filipino', 'Manzo', 'M.', 'Web Developer', 'College Graduate', 'Variety', 'Type A'),
(23, 'Jake', 'Brgy. Lonos, Sitio Ipil, Romblon, Romblon', '3687', '1997-08-18', 'Male', '2184', 'Single', 'Filipino', 'Cuenca', 'E.', '', '', '', ''),
(25, 'Alvin Delos Angeles', 'Brgy. Lonos, Sitio Suwa, Romblon, Romblon', '2065', '1992-08-18', 'Male', '2184', 'Single', 'Filipino', '', '', '', '', '', ''),
(26, 'Carlo Mutia', 'Brgy. Lonos, Sitio Parayan, Romblon, Romblon', '6320', '1999-11-29', 'Male', '2184', 'Single', 'Filipino', '', '', '', '', '', ''),
(27, 'John Kevin', 'Brgy. Lonos, Sitio Lusod, Romblon, Romblon', '3414', '1995-11-29', 'Male', '2184', 'Single', 'Filipino', 'Manzo', 'M.', 'Branch Manager', 'College Graduate', 'Housekeeping', 'A'),
(28, 'johnclentbaloco', 'Brgy. cabugaw, Sitio Batiano, Romblon, Romblon', '7448', '2022-08-24', 'Male', '3950', 'Single', 'Filipino', '', '', '', '', '', ''),
(30, 'Jonna', 'Brgy. Lonos, Sitio Suwa, Romblon, Romblon', '2065', '1999-02-24', 'Female', '2184', 'Single', 'Filipino', 'Esquilona', 'M.', 'Branch Manager', 'College Graduate', 'Computing', 'Type O'),
(32, 'John Kevin', 'Romblon, Philippines', '9857', '2022-08-22', 'Male', '2184', 'Single', 'Filipino', 'Manzo', 'E.', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `barangay_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `img`, `barangay_id`) VALUES
(17, 'lonos', '30151e8fda60d374e68bafa69cbac983', '', 2184),
(18, 'mapula', 'ed5f273a63ab07653a70f79e85635acd', '', 3950);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purok`
--
ALTER TABLE `purok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
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
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purok`
--
ALTER TABLE `purok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
