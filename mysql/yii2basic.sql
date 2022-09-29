-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 02:36 PM
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
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `state` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `notes`, `state`) VALUES
(1, 'area1', 'notes of area1', 0),
(2, 'area2', 'notes of area2', 1),
(3, 'area3', 'area notes 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `billing_type`
--

CREATE TABLE `billing_type` (
  `id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT 0,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_type`
--

INSERT INTO `billing_type` (`id`, `area_id`, `name`, `notes`, `state`, `price`) VALUES
(1, 2, 'name of billing type', 'notes of billing type', 0, 220000),
(2, 1, 'name of Billint_type 2', 'notes of billing type 2', 0, 330000),
(3, 3, 'billing type name 3', 'billing type notes 3', 0, 220000);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `afm` varchar(20) DEFAULT NULL,
  `doy` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `at` varchar(10) DEFAULT NULL,
  `protocol_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `afm`, `doy`, `address`, `phone`, `at`, `protocol_no`) VALUES
(1, 'John', 'Blabla', '123154', '123455', 'Address1 33', '+302244052336', 'ai123455', '987654'),
(2, 'Jack', 'Rapapa', '4564413', '213345', 'Address2', '+44205589654', 'am469731', '1531454');

-- --------------------------------------------------------

--
-- Table structure for table `earth_type`
--

CREATE TABLE `earth_type` (
  `id` int(11) NOT NULL,
  `billing_type_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` text NOT NULL,
  `billing_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `earth_type`
--

INSERT INTO `earth_type` (`id`, `billing_type_id`, `name`, `notes`, `billing_type`) VALUES
(1, 1, 'earth type name 1', 'earth type notes 1', 'name of billing type'),
(2, 3, 'earth type name 1', 'earth type notes 1', 'name of Billint_type 2');

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `size` float DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`id`, `customer_id`, `type`, `size`, `area_id`, `notes`) VALUES
(1, 1, 'estae type', 225.7, 1, 'estate 1 notes'),
(2, 2, 'estate 2 type', 177.3, 2, 'estate 2 notes');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_no` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_no`, `customer_id`, `price`, `billing_id`, `type`, `date`) VALUES
(1, 1, 220000, 1, 'payment 1 type', '2021-09-15'),
(2, 2, 330000, 2, 'payment 2 type', '2021-09-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_type`
--
ALTER TABLE `billing_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_type_ibfk_1` (`area_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earth_type`
--
ALTER TABLE `earth_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `earth_type_ibfk_2` (`billing_type_id`);

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estates_ibfk_1` (`customer_id`),
  ADD KEY `estates_ibfk_2` (`area_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_no`),
  ADD KEY `payments_ibfk_1` (`customer_id`),
  ADD KEY `payments_ibfk_2` (`billing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_type`
--
ALTER TABLE `billing_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `earth_type`
--
ALTER TABLE `earth_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_type`
--
ALTER TABLE `billing_type`
  ADD CONSTRAINT `billing_type_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`);

--
-- Constraints for table `earth_type`
--
ALTER TABLE `earth_type`
  ADD CONSTRAINT `earth_type_ibfk_2` FOREIGN KEY (`billing_type_id`) REFERENCES `billing_type` (`id`);

--
-- Constraints for table `estates`
--
ALTER TABLE `estates`
  ADD CONSTRAINT `estates_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `estates_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`billing_id`) REFERENCES `billing_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
