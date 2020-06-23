-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 10:56 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `b_name` varchar(15) NOT NULL,
  `country` varchar(10) NOT NULL DEFAULT 'India'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `Registration_Number` bigint(15) NOT NULL,
  `model` varchar(15) NOT NULL,
  `COST` float NOT NULL,
  `version` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `b_n` varchar(15) NOT NULL,
  `c_u` varchar(15) NOT NULL,
  `e_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cus_username` varchar(15) NOT NULL,
  `cus_pass` varchar(15) NOT NULL,
  `cus_name` varchar(15) NOT NULL,
  `cus_email` varchar(15) NOT NULL,
  `cus_contact` int(10) NOT NULL,
  `cus_addr` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `r_no` bigint(10) NOT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_no`
--

CREATE TABLE `contact_no` (
  `E_ID` int(15) NOT NULL,
  `CONTACT_NO` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `emp_sex` varchar(1) NOT NULL,
  `emp_name` varchar(50) DEFAULT NULL,
  `emp_email` varchar(50) DEFAULT NULL,
  `emp_salary` int(10) NOT NULL,
  `emp_dept` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_sex`, `emp_name`, `emp_email`, `emp_salary`, `emp_dept`) VALUES
(1, 'M', 'Dhruvin Shah', 'dhruvinshah12@gmail.com', 10000, 'Finance'),
(2, 'M', 'b', 'b@gmail.com', 2000, 'service'),
(3, 'F', 'c', 'c@gmail.com', 3000, 'service'),
(4, 'F', 'd', 'd@gmail.com', 4000, 'service'),
(5, 'M', 'e', 'e@gmail.com', 5000, 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `b_n` varchar(15) NOT NULL,
  `car_m` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `carmodel` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cost` int(10) NOT NULL,
  `availability` varchar(1) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` varchar(2) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `e_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_quotes`
--

CREATE TABLE `request_quotes` (
  `c_u` varchar(15) NOT NULL,
  `car_m` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request_service`
--

CREATE TABLE `request_service` (
  `c_u` varchar(15) NOT NULL,
  `car_n` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `car_name` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `provision` varchar(10) NOT NULL,
  `e_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`car_name`, `type`, `date`, `provision`, `e_id`) VALUES
('ferrari', 'wash', '2027-08-20', 'yes', 2),
('porshe', 'oiling', '2018-02-09', 'yes', 3),
('santro', ' wash', '2018-02-09', 'yes', 3),
('swift', ' wash', '2018-02-09', 'yes', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`b_name`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Registration_Number`),
  ADD KEY `b_n` (`b_n`),
  ADD KEY `c_u` (`c_u`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cus_username`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD KEY `r_no` (`r_no`);

--
-- Indexes for table `contact_no`
--
ALTER TABLE `contact_no`
  ADD KEY `E_ID` (`E_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`carmodel`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`car_name`),
  ADD KEY `f1` (`e_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`b_n`) REFERENCES `brands` (`b_name`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`c_u`) REFERENCES `client` (`cus_username`),
  ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`e_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`r_no`) REFERENCES `car` (`Registration_Number`);

--
-- Constraints for table `contact_no`
--
ALTER TABLE `contact_no`
  ADD CONSTRAINT `contact_no_ibfk_1` FOREIGN KEY (`E_ID`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `f1` FOREIGN KEY (`e_id`) REFERENCES `employee` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
