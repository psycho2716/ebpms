-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 12:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
(2, 'Mapula', 'Brgy. Mapula, Romblon, Romblon, Philippines', 'Editha Atanoc', 'Aldrin Mindo', 'Ricardo Capispisan', 'Archie Mindo', 'Reynald Miñon', 'Dominador Madeja', 'Armenda Ramos', 'Jessie Fortu', 'Annie Doblas', 'Bebe Maestro', 'Minchie Arcillas', 'Margie Fortu', 3950),
(3, 'Agbaluto', 'Brgy. Agnipa, Romblon, Romblon, Philippines', 'Ignacio pacio', 'Aldrin D. Mindo', 'Ricardo M. Capispisan', 'Archie Mindo', 'Reynald Miñon', 'Dominador Madeja', 'Armenda Ramos', 'Jessie M. Fortu', 'Annie Doblas', 'Bebe Maestro', 'Minchie R. Arcillas', 'Jake R. Miñon', 6970),
(4, 'Lonos', 'Brgy, Lonos Romblon, Romblon', 'Eric Manzo', 'Jimwell Magramo', 'John Clent Baloco', 'ipin', 'upin', 'w', 'e', 'r', 't', 'y', 'q', 'q', 4353),
(5, 'Lunas', 'Brgy. Lunas, Romblon, Romblon, Philippines', 'Editha Atanoc', 'Aldrin D. Mindo', 'Ricardo M. Capispisan', 'Archie M. Mindo', 'Reynald S. Miñon', 'Dominador Madeja', 'Armenda Ramos', 'Jessie M. Fortu', 'Annie Doblas', 'Bebe Maestro', 'Minchie R. Arcillas', 'Jake R. Miñon', 919);

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
(6, 'Barangay Clearance', 'clearance.png', 2184, 'CLEARANCE 2022.docx'),
(7, 'Barangay Certification', 'Certification.png', 2184, 'CERTIFICATION CY 2022.doc');

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
(19, ' matatag', 2604, 4353, '', 'Baranggay. Lonos Romblon, Romblon ');

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
  `blood_type` varchar(50) NOT NULL,
  `household_type` varchar(50) NOT NULL,
  `4p_s` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `senior` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(18, 'mapula', 'ed5f273a63ab07653a70f79e85635acd', '', 3950),
(19, 'agnipa', '5f3daf3137d6add65e47599e0e944c95', '', 6970),
(20, 'Cocomelon', '81dc9bdb52d04dc20036dbd8313ed055', '', 4353),
(21, 'lunas', '910cf1aed4ed2477bae688c32644f522', '', 919);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purok`
--
ALTER TABLE `purok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
