-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2020 at 10:10 PM
-- Server version: 10.2.27-MariaDB-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telenor_insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `car_register_no` varchar(20) DEFAULT NULL,
  `car_make` varchar(25) DEFAULT NULL,
  `car_year_register` varchar(10) DEFAULT NULL,
  `car_year_manufacture` varchar(10) DEFAULT NULL,
  `policy_id` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `is_claim` varchar(1) DEFAULT NULL,
  `accident_date` date DEFAULT NULL,
  `damage` varchar(25) DEFAULT NULL,
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `client_id`, `car_register_no`, `car_make`, `car_year_register`, `car_year_manufacture`, `policy_id`, `date_added`, `is_claim`, `accident_date`, `damage`, `last_updated`) VALUES
(4, 4, 'idc-345', 'honda', '2015', '2014', 1, '2020-05-27', 'y', NULL, NULL, '2020-05-27'),
(5, 4, 'idc-346', 'honda', '2015', '2014', 2, '2020-05-27', 'n', NULL, NULL, NULL),
(6, 5, 'Leb1234', 'Toyota', '2012', '2009', 4, '2020-05-27', 'y', NULL, NULL, '2020-05-27'),
(7, 3, 'ACD-1408', 'Honda', '2015', '2015', 1, '2020-05-28', 'y', NULL, NULL, '2020-05-27'),
(8, 3, 'DYE-7650', 'Honda', '2016', '2015', 3, '2020-05-28', 'y', NULL, NULL, '2020-05-27'),
(9, 3, 'JYE-784', 'Suzuki', '2013', '2012', 2, '2020-05-28', 'y', NULL, NULL, '2020-05-27'),
(10, 3, 'HSA-4391', 'Honda', '2017', '2016', 4, '2020-05-28', 'y', NULL, NULL, '2020-05-27'),
(11, 3, 'KJR-900', 'Toyota', '2009', '2008', 3, '2020-05-28', 'n', NULL, NULL, '2020-05-28'),
(12, 3, 'KIR-9030', 'Honda', '2017', '2017', 3, '2020-05-28', 'n', NULL, NULL, NULL),
(13, 3, 'MSD-6548', 'Toyota', '2017', '2017', 4, '2020-05-28', 'n', NULL, NULL, '2020-05-28'),
(14, 3, 'HGR-5453', 'Honda', '2015', '2014', 2, '2020-05-28', 'n', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `accident_date` date DEFAULT NULL,
  `damage` varchar(25) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `claim_status` varchar(1) DEFAULT 'n' COMMENT 'a for accepted, r for rejected, n for processing',
  `claim_assign_to` int(11) DEFAULT NULL COMMENT 'inspector_id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `car_id`, `accident_date`, `damage`, `date_added`, `claim_status`, `claim_assign_to`) VALUES
(2, 4, '2020-05-01', '50', '2020-05-27', 'n', 1),
(3, 6, '2020-05-13', '20%', '2020-05-27', 'n', 1),
(7, 7, '2020-05-05', '30%', '2020-05-27', 'n', 6),
(8, 8, '2020-04-29', '20%', '2020-05-27', 'n', 1),
(9, 9, '2020-05-20', '25%', '2020-05-27', 'n', 1),
(10, 10, '2020-05-15', '29%', '2020-05-27', 'n', 6);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `client_phone` varchar(25) DEFAULT NULL,
  `client_email` varchar(100) DEFAULT NULL,
  `client_type` varchar(25) DEFAULT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_phone`, `client_email`, `client_type`, `date_added`) VALUES
(1, 'Inspector', '123456789', 'inspector@claims.com', 'inspector', NULL),
(3, 'mik', '890890', 'mik@yah.com', 'client', '2020-05-27'),
(4, 'Malik Asad Majeed', '09148266472', 'asad@mega-tronix.com', 'client', '2020-05-27'),
(5, 'Abdullah Nasim', '0304-0082552', 'Balli@gmail.com', 'client', '2020-05-27'),
(6, 'Inspector 2', '999000333', 'inspector2@claims.com', 'inspector', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `policy_detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `policy_detail`) VALUES
(1, 'Liability Coverage'),
(2, 'Uninsured and Underinsured Motorist Coverage'),
(3, 'Comprehensive Coverage'),
(4, 'Collision Coverage');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
