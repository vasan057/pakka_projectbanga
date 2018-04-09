-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2018 at 08:49 PM
-- Server version: 10.0.34-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iztcustomer`
--

-- --------------------------------------------------------

--
-- Table structure for table `agmarknet`
--

CREATE TABLE `agmarknet` (
  `id` int(10) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `agmark_master_id` int(11) DEFAULT NULL,
  `state_name` varchar(100) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `market_center_name` varchar(100) NOT NULL,
  `variety` varchar(100) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `arrival` varchar(100) NOT NULL,
  `ag_min` float NOT NULL,
  `ag_max` float NOT NULL,
  `modal` varchar(100) NOT NULL,
  `date_arrival` date NOT NULL,
  `commodity` varchar(400) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `grade` varchar(20) NOT NULL,
  `is_old` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agmarknet`
--

INSERT INTO `agmarknet` (`id`, `mandi_id`, `agmark_master_id`, `state_name`, `district_name`, `market_center_name`, `variety`, `group_name`, `arrival`, `ag_min`, `ag_max`, `modal`, `date_arrival`, `commodity`, `created_at`, `updated_at`, `created_by`, `updated_by`, `grade`, `is_old`) VALUES
(1, 0, 5, '', 'Ajmer', 'Beawar', 'Deshi', '', '', 1450, 1455, '1452', '2018-03-12', 'Barley (Jau)', '2018-03-13 08:41:19', '2018-03-13 14:11:19', NULL, NULL, 'FAQ', 0),
(2, 0, 6, '', 'Ajmer', 'Bijay Nagar', 'Deshi', '', '', 1400, 1450, '1400', '2018-03-10', 'Barley (Jau)', '2018-03-13 08:41:20', '2018-03-13 14:11:20', NULL, NULL, 'FAQ', 0),
(3, 0, 4, '', 'Banswara', 'Banswara', 'Local', '', '', 1375, 1375, '1375', '2018-03-10', 'Barley (Jau)', '2018-03-13 08:41:20', '2018-03-13 14:11:20', NULL, NULL, 'FAQ', 0),
(4, 0, 2, '', 'Bagru', 'Bagru', 'Deshi', '', '', 1250, 1350, '1325', '2018-03-13', 'Barley (Jau)', '2018-03-13 08:41:20', '2018-03-13 14:11:20', NULL, NULL, 'FAQ', 0),
(5, 0, 1, '', 'Alwar', 'Alwar', 'Local', '', '', 1400, 1500, '1450', '2018-03-01', 'Barley (Jau)', '2018-03-13 08:41:20', '2018-03-13 14:11:20', NULL, NULL, 'FAQ', 0),
(6, 0, 2, '', 'Banswara', 'Bagru', 'Local', '', '', 1375, 1375, '1375', '2018-03-10', 'Barley (Jau)', '2018-03-13 08:45:50', '2018-03-15 13:33:00', NULL, NULL, 'FAQ', 0),
(7, 0, 7, '', 'Patan', 'Sikar', 'Deshi', '', '', 1450, 1455, '1452', '2018-03-10', 'Barley (Jau)', '2018-03-14 09:01:30', '2018-03-14 14:31:30', NULL, NULL, 'FAQ', 0),
(8, 0, 7, '', 'Agra', 'Sikar', 'Dara', '', '', 1420, 1460, '1440', '2018-03-09', 'Barley (Jau)', '2018-03-14 09:01:30', '2018-03-14 14:31:30', NULL, NULL, 'FAQ', 0),
(9, 0, 7, '', 'Bagalkot', 'Sikar', 'Local', '', '', 1400, 1500, '1450', '2018-03-08', 'Barley (Jau)', '2018-03-14 09:01:30', '2018-03-14 14:31:30', NULL, NULL, 'FAQ', 0),
(10, 0, 7, '', 'Bagalkot', 'Sikar', 'Local', '', '', 1500, 1600, '1550', '2018-03-07', 'Barley (Jau)', '2018-03-14 09:01:30', '2018-03-14 14:31:30', NULL, NULL, 'FAQ', 0),
(11, 0, 2, '', 'Azamgarh', 'Bagru', 'Dara', '', '', 1600, 1700, '1640', '2018-03-09', 'Barley (Jau)', '2018-03-14 09:01:30', '2018-03-14 14:31:30', NULL, NULL, 'FAQ', 0),
(12, 0, 2, '', 'Azamgarh', 'Bagru', 'Dara', '', '', 1610, 1700, '1650', '2018-03-08', 'Barley (Jau)', '2018-03-14 09:01:30', '2018-03-14 14:31:30', NULL, NULL, 'FAQ', 0),
(13, 0, 2, '', 'Azamgarh', 'Bagru', 'Dara', '', '', 1600, 1705, '1650', '2018-03-07', 'Barley (Jau)', '2018-03-14 09:01:30', '2018-03-14 14:31:30', NULL, NULL, 'FAQ', 0),
(14, 0, 1, '', 'Azamgarh', 'Alwar', 'Dara', '', '', 1600, 1690, '1640', '2018-03-10', 'Barley (Jau)', '2018-03-14 09:01:31', '2018-03-14 14:31:31', NULL, NULL, 'FAQ', 0),
(15, 0, 1, '', 'Etawah', 'Alwar', 'Dara', '', '', 1420, 1600, '1510', '2018-03-09', 'Barley (Jau)', '2018-03-14 09:01:31', '2018-03-14 14:31:31', NULL, NULL, 'FAQ', 0),
(16, 0, 1, '', 'Etawah', 'Alwar', 'Dara', '', '', 1430, 1610, '1520', '2018-03-08', 'Barley (Jau)', '2018-03-14 09:01:31', '2018-03-14 14:31:31', NULL, NULL, 'FAQ', 0),
(17, 0, 1, '', 'Etawah', 'Alwar', 'Dara', '', '', 1420, 1610, '1510', '2018-03-07', 'Barley (Jau)', '2018-03-14 09:01:31', '2018-03-14 14:31:31', NULL, NULL, 'FAQ', 0),
(18, 0, 1, '', 'Firozabad', 'Alwar', 'Dara', '', '', 1660, 1700, '1680', '2018-03-06', 'Barley (Jau)', '2018-03-14 09:01:31', '2018-03-14 14:31:31', NULL, NULL, 'FAQ', 0),
(19, 0, 1, '', 'Firozabad', 'Alwar', 'Dara', '', '', 1640, 1680, '1650', '2018-03-05', 'Barley (Jau)', '2018-03-14 09:01:31', '2018-03-14 14:31:31', NULL, NULL, 'FAQ', 0),
(20, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1420, 1450, '9.5', '2017-04-29', 'Barley (Jau)', '2018-03-15 08:14:47', '2018-03-15 14:17:38', NULL, NULL, 'FAQ', 0),
(21, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 900, 1000, '1400', '2017-04-28', 'Barley (Jau)', '2018-03-15 08:14:47', '2018-03-15 14:17:39', NULL, NULL, 'FAQ', 0),
(22, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1050, 1250, '1430', '2017-04-27', 'Barley (Jau)', '2018-03-15 08:14:47', '2018-03-15 14:21:48', NULL, NULL, 'FAQ', 0),
(23, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1410, 1450, '1425', '2017-04-26', 'Barley (Jau)', '2018-03-15 08:14:47', '2018-03-15 13:44:47', NULL, NULL, 'FAQ', 0),
(24, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1420, 1450, '1435', '2017-04-25', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(25, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1410, 1450, '1425', '2017-04-24', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(26, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1410, 1450, '1430', '2017-04-22', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(27, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1410, 1450, '1430', '2017-04-21', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(28, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1420, 1460, '1440', '2017-04-20', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(29, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1420, 1460, '1440', '2017-04-19', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(30, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1440, 1475, '1460', '2017-04-18', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(31, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1440, 1470, '1450', '2017-04-17', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(32, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1430, 1470, '1450', '2017-04-15', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(33, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1430, 1470, '1450', '2017-04-14', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(34, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1440, 1480, '1460', '2017-04-13', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(35, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1420, 1460, '1440', '2017-04-12', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(36, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1410, 1450, '1435', '2017-04-11', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(37, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1420, 1460, '1440', '2017-04-10', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(38, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1460, 1490, '1475', '2017-04-08', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(39, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1460, 1490, '1475', '2017-04-07', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(40, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1450, 1475, '1465', '2017-04-06', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(41, 0, 1, '', 'Alwar', 'Alwar', 'Other', '', '', 1450, 1480, '1465', '2017-04-05', 'Barley (Jau)', '2018-03-15 08:14:48', '2018-03-15 13:44:48', NULL, NULL, 'FAQ', 0),
(42, 0, 9, '', 'Alwar', 'Bansur', 'Other', '', '', 1420, 1450, '9.5', '2017-04-29', 'Barley (Jau)', '2018-03-15 08:30:56', '2018-03-15 14:14:57', NULL, NULL, 'FAQ', 0),
(43, 0, 2, '', 'Jaipur', 'Bagru', 'Other', '', '', 900, 1000, '1400', '2017-04-28', 'Barley (Jau)', '2018-03-15 08:30:56', '2018-03-15 14:14:57', NULL, NULL, 'FAQ', 0),
(44, 0, 10, '', 'Alwar', 'Laxmangarh', 'Other', '', '', 1000, 900, '8.75', '2017-04-27', 'Barley (Jau)', '2018-03-15 08:30:56', '2018-03-15 14:14:57', NULL, NULL, 'FAQ', 0),
(45, 0, 8, '', 'Alwar', 'Mohan Nagar Mandi', 'Other', '', '', 1250, 1500, '1435', '2017-04-28', 'Barley (Jau)', '2018-03-15 08:33:42', '2018-03-15 14:19:40', NULL, NULL, 'FAQ', 0),
(46, 0, 8, '', 'Alwar', 'Mohan Nagar Mandi', 'Other', '', '', 1050, 1500, '1635', '2017-04-27', 'Barley (Jau)', '2018-03-15 08:51:48', '2018-03-15 14:21:48', NULL, NULL, 'FAQ', 0),
(47, 0, 10, '', 'Delhi', 'Laxmangarh', 'Other', '', '', 1210, 1250, '1230', '2018-03-29', 'Barley (Jau)', '2018-03-30 08:09:13', '2018-03-30 13:39:13', NULL, NULL, 'FAQ', 0),
(48, 0, 1, '', 'Delhi', 'Alwar', 'Other', '', '', 1240, 1280, '1260', '2018-03-28', 'Barley (Jau)', '2018-03-30 08:09:13', '2018-03-30 13:39:13', NULL, NULL, 'FAQ', 0),
(49, 0, 4, '', 'Delhi', 'Banswara', 'Other', '', '', 1230, 1275, '1250', '2018-03-27', 'Barley (Jau)', '2018-03-30 08:09:13', '2018-03-30 13:39:13', NULL, NULL, 'FAQ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `agmark_master`
--

CREATE TABLE `agmark_master` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `market_name` varchar(45) NOT NULL,
  `active` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agmark_master`
--

INSERT INTO `agmark_master` (`id`, `location_id`, `mandi_id`, `market_name`, `active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 0, 'Alwar', '1', '2018-03-12 14:25:08', '2018-03-12 14:25:37', '', ''),
(2, 3, 0, 'Bagru', '1', '2018-03-12 14:25:23', '2018-03-12 14:26:19', '', ''),
(3, 9, 0, 'Dausa', '1', '2018-03-12 14:27:04', '2018-03-12 14:27:04', '', ''),
(4, 10, 0, 'Banswara', '1', '2018-03-12 14:27:41', '2018-03-12 14:27:41', '', ''),
(5, 11, 0, 'Beawar', '1', '2018-03-12 14:28:14', '2018-03-12 14:28:14', '', ''),
(6, 11, 0, 'Bijay Nagar1', '1', '2018-03-12 14:28:46', '2018-04-07 17:23:31', '36', '36'),
(7, 2, 0, 'Sikar', '0', '2018-03-12 14:42:43', '2018-03-12 14:42:43', '', ''),
(8, 5, 0, 'Mohan Nagar Mandi', '1', '2018-03-15 12:43:45', '2018-03-15 12:43:45', '', ''),
(9, 1, 0, 'Bansur', '1', '2018-03-15 14:00:26', '2018-03-15 14:00:26', '', ''),
(10, 9, 0, 'Laxmangarh', '1', '2018-03-15 14:00:44', '2018-03-15 14:00:44', '', ''),
(11, 6, 0, 'Revari Nayi Mandi', '1', '2018-03-16 07:58:37', '2018-03-16 08:02:23', '', ''),
(12, 2, 0, '123', '1', '2018-04-07 17:14:19', '2018-04-07 17:14:19', '36', '36'),
(13, 2, 0, 'sreenivasan', '1', '2018-04-09 18:11:24', '2018-04-09 18:11:24', '36', '36'),
(14, 2, 0, 'arun', '1', '2018-04-09 18:12:00', '2018-04-09 18:12:00', '36', '36'),
(15, 4, 0, 'check123', '1', '2018-04-09 18:13:36', '2018-04-09 18:13:36', '36', '36'),
(16, 15, 0, 'Hello', '1', '2018-04-09 18:14:24', '2018-04-09 18:14:43', '36', '36');

-- --------------------------------------------------------

--
-- Table structure for table `competitors`
--

CREATE TABLE `competitors` (
  `id` int(11) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `other_detail` varchar(100) NOT NULL,
  `short_code` varchar(100) NOT NULL,
  `short_order` varchar(100) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competitors`
--

INSERT INTO `competitors` (`id`, `buyer_name`, `other_detail`, `short_code`, `short_order`, `updated_at`, `created_at`, `created_by`, `updated_by`) VALUES
(1, 'Barmalt', '', 'Barmalt', '2', '0000-00-00', '2018-04-09 18:15:48', NULL, NULL),
(2, 'Patanjali', '', 'Patanjali', '1', '0000-00-00', '2018-04-09 18:15:48', NULL, NULL),
(3, 'SABMiller', '', 'SABMiller', '3', '0000-00-00', '2018-04-09 18:15:48', NULL, NULL),
(4, 'Carlsburg', '', 'Carlsburg', '4', '0000-00-00', '2018-04-09 18:15:48', NULL, NULL),
(5, 'sre', 'asd', 'RH', '3', '0000-00-00', '2018-04-09 18:15:48', NULL, NULL),
(6, 'asd', 'asd12', '12asdasas', '123', '2018-04-07', '2018-04-09 18:15:48', NULL, NULL),
(7, 'check sreeni', 'check sreeni', '06', '51', '2018-04-09', '2018-04-09 18:20:22', 36, 36);

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `delivery_type` varchar(45) NOT NULL,
  `delivery_name` varchar(200) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  `address_1` varchar(250) NOT NULL,
  `address_2` varchar(250) NOT NULL,
  `pincode` varchar(45) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(200) NOT NULL,
  `state` varchar(50) NOT NULL,
  `mobile_1` varchar(45) NOT NULL,
  `mobile_2` varchar(45) NOT NULL,
  `email_1` varchar(45) NOT NULL,
  `email_2` varchar(45) NOT NULL,
  `gstin` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `delivery_type`, `delivery_name`, `short_name`, `address_1`, `address_2`, `pincode`, `city`, `district`, `state`, `mobile_1`, `mobile_2`, `email_1`, `email_2`, `gstin`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Maltster', 'PMV MALTING PLANT', 'PMV Malt, Patuadi', 'Regd. Address under GST: Village Joniawas, Ma', 'C/o 7th Km., Pataudi Rewari Road, PMV Chowk, ', '122503', 'Pataudi', 'Pataudi', 'Haryana', '1234567890', '', 'reddy@gmail.com', '', '06AAACU6053C1ZP', '2018-03-12 14:53:55', '2018-03-12 15:07:16', NULL, NULL),
(2, 'Maltster', 'BARMALT PLANT', 'Barmalt, Dharuhera', 'Regd. Address under GST: Village Joniawas, Ma', 'C/o Barmalt Malting (India) Private Limited, ', '122100', 'Dharuhera', 'Dharuhera', 'Haryana', '1234567890', '', 'reddy@gmail.com', '', '06AAACU6053C1ZP', '2018-03-12 15:01:18', '2018-03-12 15:03:09', NULL, NULL),
(3, 'sa', 'asd', 'asd', 'asdasdjgjhg,sadfapsdfu', 'asd', '560093', 'ikuhiughkj', 'das', 'sdfgh', '1231231231', '1231231231', 'asdas@gmail.com', 'sasa@gmail.com', '123', '2018-04-07 14:50:10', '2018-04-07 14:57:01', NULL, NULL),
(4, 'asd', 'asd', '1asd', 'asdasdjgjhg,sadfapsdfua', 'asdasd', '560093', 'ikuhiughkj', 'asdas', 'Delhi', '1232345465', '1233453453', 'sadas@gmail.com', 'asdas@gmailc.om', '123', '2018-04-07 14:51:17', '2018-04-07 14:56:55', NULL, NULL),
(5, 'asd', 'asd', '23asd', 'asdasdjgjhg,sadfapsdfu', 'asd', '560093', 'ikuhiughkj', 'asd', 'sdfgh', '1231231231', '1231231231', 'asdasdas@gmail.com', 'assdas!@gmail.com', 'asdas', '2018-04-07 14:52:04', '2018-04-07 14:52:04', NULL, NULL),
(6, 'asdassd', 'asdasd', 'asdasd', 'asdasdasd', 'asdasdads', '123123', 'asdasd', 'asdads', 'Rajasthan', '1231231231', '1231231212', '', '', '123', '2018-04-07 14:52:41', '2018-04-07 14:52:41', NULL, NULL),
(7, 'check', 'check', '09', 'chekc check cehck', 'check', '123456', 'chennai', 'tamilnadu', 'Rajasthan', '9876543210', '9876543210', 'check@gmail.com', 'check1@gmail.com', '234567', '2018-04-09 18:25:07', '2018-04-09 18:25:41', 36, 36);

-- --------------------------------------------------------

--
-- Table structure for table `fortablemaster`
--

CREATE TABLE `fortablemaster` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `for_freight`
--

CREATE TABLE `for_freight` (
  `id` int(11) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `gid` varchar(10) NOT NULL,
  `freight_value` decimal(10,2) NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `for_freight`
--

INSERT INTO `for_freight` (`id`, `mandi_id`, `destination_id`, `gid`, `freight_value`, `valid_from`, `valid_to`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 'G2', '324.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-04-09 15:25:19', '2018-04-09 15:25:19', '', ''),
(2, 2, 1, 'G2', '123.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-04-09 15:31:54', '2018-04-09 15:31:54', '', ''),
(3, 8, 4, 'G2', '60569.00', '2018-10-04 00:00:00', '2018-11-04 00:00:00', '2018-04-09 15:36:21', '2018-04-09 15:40:53', '', ''),
(4, 6, 3, 'jhghjghj', '324.00', '2018-04-09 00:00:00', '2018-04-10 00:00:00', '2018-04-09 15:38:54', '2018-04-09 15:54:25', '', ''),
(5, 1, 5, 'G1', '555.00', '2018-04-20 00:00:00', '2018-04-21 00:00:00', '2018-04-09 15:41:31', '2018-04-09 15:41:42', '', ''),
(6, 4, 1, 'G1', '234.00', '2018-04-10 00:00:00', '2018-04-19 00:00:00', '2018-04-09 15:53:51', '2018-04-09 15:53:51', '', ''),
(7, 2, 2, 'G1', '5678.00', '2018-04-10 00:00:00', '2018-04-11 00:00:00', '2018-04-09 18:32:16', '2018-04-09 18:32:34', '36', '36');

-- --------------------------------------------------------

--
-- Table structure for table `for_line_items`
--

CREATE TABLE `for_line_items` (
  `id` int(11) NOT NULL,
  `parameter` varchar(50) NOT NULL,
  `group` varchar(10) NOT NULL,
  `data_type` varchar(45) NOT NULL,
  `sequence` int(11) NOT NULL,
  `base_type` varchar(100) DEFAULT NULL,
  `base` varchar(45) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `for_line_items`
--

INSERT INTO `for_line_items` (`id`, `parameter`, `group`, `data_type`, `sequence`, `base_type`, `base`, `value`, `valid_from`, `valid_to`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Gunny Bag', 'G1', 'Flat', 1, NULL, '', '44.00', '2018-03-01 00:00:00', '2018-04-30 00:00:00', '2018-03-12 09:33:44', '2018-03-12 15:05:11', NULL, NULL),
(2, 'Market Fees', 'G1', 'perc', 2, NULL, '', '1.60', '2018-03-01 00:00:00', '2018-07-31 00:00:00', '2018-03-12 09:36:23', '2018-03-12 15:08:41', NULL, NULL),
(3, 'Tulai', 'G1', 'Flat', 3, NULL, '', '3.25', '2018-03-01 00:00:00', '2018-06-21 00:00:00', '2018-03-12 09:36:59', '2018-03-12 15:06:59', NULL, NULL),
(4, 'Kacha Commisssion ', 'G1', 'perc', 4, NULL, '', '2.00', '2018-03-01 00:00:00', '2018-07-31 00:00:00', '2018-03-12 09:37:57', '2018-03-12 15:08:49', NULL, NULL),
(5, 'Mudat', 'G1', 'perc', 5, NULL, '', '0.50', '2018-03-01 00:00:00', '2018-07-31 00:00:00', '2018-03-12 09:39:42', '2018-03-12 15:09:42', NULL, NULL),
(6, 'Dharmada', 'G1', 'perc', 6, NULL, '', '0.15', '2018-03-01 00:00:00', '2018-06-30 00:00:00', '2018-03-12 09:40:29', '2018-03-12 15:10:29', NULL, NULL),
(7, 'Labour Packing & unloading', 'G1', 'Flat', 7, NULL, '', '14.60', '2018-03-01 00:00:00', '2018-07-31 00:00:00', '2018-03-12 09:41:07', '2018-03-12 15:11:07', NULL, NULL),
(8, 'Total', 'G1', 'total', 8, NULL, '0+1+2+3+4+5+6+7', '0.00', '2018-03-01 00:00:00', '2018-07-31 00:00:00', '2018-03-12 09:43:36', '2018-03-12 15:40:02', NULL, NULL),
(9, 'Pakka Commission ', 'G1', 'perc', 9, NULL, '8', '1.00', '2018-03-01 00:00:00', '2018-07-31 00:00:00', '2018-03-12 09:47:58', '2018-03-14 15:41:22', NULL, NULL),
(10, 'Total', 'G1', 'total', 10, NULL, '8+9', '0.00', '2018-03-01 00:00:00', '2018-07-31 00:00:00', '2018-03-12 09:50:35', '2018-03-12 15:21:23', NULL, NULL),
(11, 'Gunny Bag', 'G2', 'Flat', 1, NULL, '', '50.00', '2018-03-01 00:00:00', '2018-07-31 00:00:00', '2018-03-12 09:53:58', '2018-03-15 05:20:59', NULL, NULL),
(12, 'Dharmada', 'G2', 'flat', 212, NULL, '', '10.00', '2018-04-12 00:00:00', '2018-04-19 00:00:00', '2018-03-15 06:51:36', '2018-04-09 12:57:04', NULL, NULL),
(13, 'Kacha Commisssion', 'G2', 'Perc', 3, NULL, '', '1.25', '2018-03-01 00:00:00', '2018-03-31 00:00:00', '2018-03-15 06:52:25', '2018-03-15 12:22:25', NULL, NULL),
(14, 'Total', 'G2', 'total', 4, NULL, '1+2+3', '0.00', '2018-03-01 00:00:00', '2018-03-31 00:00:00', '2018-03-15 06:54:09', '2018-03-15 12:24:09', NULL, NULL),
(15, 'Labour Packing & unloading', 'G2', 'Flat', 5, NULL, '', '60.00', '2018-03-01 00:00:00', '2018-03-31 00:00:00', '2018-03-15 06:58:35', '2018-03-15 12:28:35', NULL, NULL),
(16, 'Total', 'G2', 'total', 6, NULL, '0+4+5', '0.00', '2018-03-01 00:00:00', '2018-03-31 00:00:00', '2018-03-15 07:02:27', '2018-03-15 12:32:27', NULL, NULL),
(17, 'hhjghjg', 'jhghjghj', 'flat', 878, NULL, 'jghg', '98789.00', '2018-03-14 00:00:00', '2018-03-24 00:00:00', '2018-03-28 12:57:53', '2018-03-28 18:34:58', NULL, NULL),
(18, 'www', 'w2', 'perc', 8782, NULL, '12', '98789.00', '2018-04-12 00:00:00', '2018-04-19 00:00:00', '2018-03-28 13:04:41', '2018-04-07 16:25:31', NULL, NULL),
(19, 'asd23', 'asd', 'perc', 123123, NULL, '', '123.00', '2018-04-26 00:00:00', '2018-04-27 00:00:00', '2018-04-07 10:42:05', '2018-04-09 18:36:36', NULL, 36),
(20, 'asd', 'asd', 'perc', 213, NULL, '123', '123.00', '2018-04-10 00:00:00', '2018-04-11 00:00:00', '2018-04-09 13:06:22', '2018-04-09 18:36:22', 36, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `State` varchar(45) NOT NULL,
  `state_id` int(11) NOT NULL,
  `District` varchar(45) NOT NULL,
  `Town_City` varchar(45) NOT NULL,
  `MarketName` varchar(45) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `State`, `state_id`, `District`, `Town_City`, `MarketName`, `is_active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Rajasthan', 1, 'Alwar', 'Alwarasdasdasd', '', 0, '2018-03-12 08:36:47', '2018-03-12 14:06:47', NULL, NULL),
(2, 'Rajasthan', 1, 'Alwar', 'Alwarasdasdasd', '', 1, '2018-03-12 08:39:27', '2018-03-12 14:09:27', NULL, NULL),
(3, 'Rajasthan', 1, 'Jaipur', 'Jaipur', '', 1, '2018-03-12 08:39:56', '2018-03-12 14:09:56', NULL, NULL),
(4, 'Rajasthan', 1, 'dasdasd', 'asdasd', '', 1, '2018-03-12 08:40:21', '2018-03-12 14:10:21', NULL, NULL),
(5, 'Rajasthan1', 8, 'Delhi1123', '12213sdfsd', '', 1, '2018-03-12 08:40:43', '2018-04-09 18:37:34', NULL, 36),
(6, 'Haryana', 2, 'Gurgaon', 'Halimandi', '', 1, '2018-03-12 08:41:10', '2018-03-12 14:11:10', NULL, NULL),
(7, 'Haryana', 2, 'Rewari', 'Rewari', '', 0, '2018-03-12 08:43:09', '2018-04-06 23:32:40', NULL, NULL),
(8, 'Rajasthan', 1, 'asdasd1', 'asdasdasd1', '', 1, '2018-03-12 08:43:17', '2018-04-06 23:14:59', NULL, NULL),
(9, 'Rajasthan', 1, 'Dausa', 'Dausa', '', 1, '2018-03-12 08:56:43', '2018-03-12 14:26:43', NULL, NULL),
(10, 'Rajasthan', 1, 'Banswaraasdasd', 'Banswara', '', 1, '2018-03-12 08:57:26', '2018-03-12 14:27:26', NULL, NULL),
(11, 'Rajasthan', 1, 'Ajmer', 'Ajmer', '', 1, '2018-03-12 08:57:59', '2018-03-12 14:27:59', NULL, NULL),
(12, 'Delhi', 3, 'Delhi112', 'Naya Bazar112', '', 0, '2018-03-15 07:16:29', '2018-04-07 12:25:16', NULL, NULL),
(13, 'Delhi', 3, 'Rewari', 'Rewari1', '', 0, '2018-03-16 03:28:08', '2018-04-06 23:32:30', NULL, NULL),
(14, 'Rajasthan', 1, 'sreeni', 'vasan', '', 1, '2018-04-06 07:13:47', '2018-04-06 12:43:47', NULL, NULL),
(15, 'Haryana', 2, 'asd', 'asd', '', 1, '2018-04-06 17:52:10', '2018-04-06 23:29:41', NULL, NULL),
(16, 'Rajasthan', 1, 'vasazn', 'vasan', '', 0, '2018-04-06 17:52:28', '2018-04-06 23:26:21', NULL, NULL),
(17, 'Haryana', 2, 'sree', 'vas', '', 1, '2018-04-06 17:53:03', '2018-04-06 23:23:25', NULL, NULL),
(18, 'Haryana', 2, 'asdqw', 'asdqw', '', 1, '2018-04-07 11:04:16', '2018-04-07 16:34:16', NULL, NULL),
(19, 'Delhi', 3, 'sdf', 'gsdfvcxv', '', 1, '2018-04-09 13:07:46', '2018-04-09 18:37:46', 36, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mandidestinationmapping`
--

CREATE TABLE `mandidestinationmapping` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `active` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandidestinationmapping`
--

INSERT INTO `mandidestinationmapping` (`id`, `destination_id`, `mandi_id`, `active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 3, 7, '0', '2018-04-07 19:38:46', '2018-04-07 19:42:00', '', ''),
(2, 6, 12, '1', '2018-04-07 19:41:33', '2018-04-09 18:40:01', '', '36'),
(3, 4, 14, '1', '2018-04-09 18:39:52', '2018-04-09 18:39:52', '36', '');

-- --------------------------------------------------------

--
-- Table structure for table `mandilocationmapping`
--

CREATE TABLE `mandilocationmapping` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `active` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mandis`
--

CREATE TABLE `mandis` (
  `id` int(11) NOT NULL,
  `mandi_name` varchar(100) NOT NULL,
  `agmark_market_id` int(11) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `short_name` varchar(45) NOT NULL,
  `address_1` varchar(200) NOT NULL,
  `address_2` varchar(200) NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandis`
--

INSERT INTO `mandis` (`id`, `mandi_name`, `agmark_market_id`, `location_id`, `destination_id`, `short_name`, `address_1`, `address_2`, `pincode`, `city`, `district`, `state`, `user_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Aeran Oil & Flour Mill', 1, 1, 0, 'Bansur', '123', '456', 301404, 'Alwar', 'Alwar', 'Rajasthan', 37, '2018-03-12 09:02:38', '2018-03-12 14:33:09', NULL, NULL),
(2, 'Kishan', 2, 3, 0, 'Bagru', 'Ling Road,', 'Bagru', 303007, 'Jaipur', 'Jaipur', 'Rajasthan', 2, '2018-03-12 09:05:26', '2018-04-03 13:20:48', NULL, NULL),
(3, 'Aggarwal Daal Mile, Laxmangarh', 7, 2, 0, 'Laxmangarh', 'Sikar Road,', 'Laxmangarh', 332311, 'Sikar', 'Sikar', 'Rajasthan', 37, '2018-03-12 09:13:45', '2018-03-12 14:43:45', NULL, NULL),
(4, 'Anaj Mandi', 8, 12, 0, 'Mohan Nagar Mandi', 'Mohan Nagar, New Delhi', 'Mohan Nagar, New Delhi', 110066, 'Delhi', 'Delhi', 'Delhi', 31, '2018-03-15 07:17:48', '2018-03-15 12:47:48', NULL, NULL),
(5, 'Nai Anaj Mandi', 11, 7, 0, 'Rewari Nai Mandi', 'Rewari', 'Haryana', 432123, 'Rewari', 'Rewari', 'Haryana', 31, '2018-03-16 02:30:41', '2018-03-16 08:00:41', NULL, NULL),
(6, 'ABC', 2, 3, 0, 'abcdk', 'shfjd', '', 123452, 'Banswara', 'Dausa', 'Rajasthan', 38, '2018-03-19 10:36:34', '2018-03-19 16:06:34', NULL, NULL),
(7, 'abc1', 2, 2, 0, '322dd', '23', '', 232213, 'Ajmer', 'Banswara', 'Rajasthan', 36, '2018-03-19 10:37:25', '2018-03-19 16:07:25', NULL, NULL),
(8, 'asd', 2, 1, 0, '123', '123', 'sdf', 123123, '', '', '', 1, '2018-04-06 09:48:23', '2018-04-06 15:18:23', NULL, NULL),
(9, 'asd', 4, 4, 0, 'asd', 'asdasdjgjhg,sadfapsdfu', 'dasdas', 560093, '', '', '', 1, '2018-04-06 09:50:33', '2018-04-06 15:20:33', NULL, NULL),
(10, 'sreeni', 4, 2, 0, 'sdasd', 'asdasdjgjhg,sadfapsdfu', 'asdasd', 560093, '', '', '', 1, '2018-04-06 09:51:32', '2018-04-06 15:21:32', NULL, NULL),
(11, 'dddddddddddddd', 2, 9, 0, 'sdfsd', 'sdfsd', 'sdfsd', 123123, '', '', '', 1, '2018-04-06 09:56:56', '2018-04-06 15:26:56', NULL, NULL),
(12, 'sdf', 6, 1, 0, 'fsd', 'sdf', 'sdf', 234234, '', '', '', 1, '2018-04-06 10:05:26', '2018-04-06 15:35:26', NULL, NULL),
(13, 'TestLenovo', 5, 7, 0, 'TestLenovo', 'gfhg', 'hjgjh', 123456, '', '', '', 1, '2018-04-06 10:09:55', '2018-04-06 15:39:55', NULL, NULL),
(14, 'asdasd', 1, 3, 2, 'asd', 'asdasdjgjhg,sadfapsdfu', 'asdsad', 560093, '  ', '   ', '  ', 36, '2018-04-09 10:19:45', '2018-04-09 15:49:45', NULL, NULL),
(15, 'sreeeeeeeeeeee', 1, 2, 2, 'SREE', 'asdasdjgjhg,sadfapsdfu', 'asdasd', 560093, '  ', '   ', '  ', 36, '2018-04-09 10:20:16', '2018-04-09 15:50:16', NULL, NULL),
(16, 'asdasd', 1, 2, 1, '213', 'aasghfdsdfbgfd', 'asdasd', 123254, '', '', '', 36, '2018-04-09 13:12:42', '2018-04-09 18:42:54', 36, 36);

-- --------------------------------------------------------

--
-- Table structure for table `mandi_ceiling_price_daily`
--

CREATE TABLE `mandi_ceiling_price_daily` (
  `id` int(11) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `ceiling_price` float NOT NULL,
  `mandi_daily_price_id` int(11) DEFAULT NULL,
  `notified` tinyint(1) NOT NULL DEFAULT '0',
  `notified_time` datetime DEFAULT NULL,
  `date_key` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandi_ceiling_price_daily`
--

INSERT INTO `mandi_ceiling_price_daily` (`id`, `mandi_id`, `ceiling_price`, `mandi_daily_price_id`, `notified`, `notified_time`, `date_key`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 2000, 1, 0, NULL, '0000-00-00', '2018-03-13 14:16:07', '2018-03-13 14:16:07', '36', '36'),
(2, 2, 2000, 2, 0, NULL, '0000-00-00', '2018-03-13 14:16:07', '2018-03-13 14:16:08', '36', '36'),
(3, 3, 2000, 3, 0, NULL, '0000-00-00', '2018-03-13 14:16:08', '2018-03-13 14:16:08', '36', '36'),
(4, 1, 23.33, 4, 1, NULL, '0000-00-00', '2018-03-14 11:34:28', '2018-03-14 11:39:27', '38', '38'),
(5, 2, 20, 5, 1, NULL, '0000-00-00', '2018-03-14 11:34:28', '2018-03-14 11:58:50', '38', '38'),
(6, 1, 1000, 7, 1, NULL, '0000-00-00', '2018-03-15 07:49:45', '2018-03-15 15:22:19', '38', '38'),
(7, 2, 1000, 8, 1, NULL, '0000-00-00', '2018-03-15 07:49:45', '2018-03-15 15:22:19', '38', '38'),
(8, 3, 1000, 9, 1, NULL, '0000-00-00', '2018-03-15 07:49:45', '2018-03-15 15:22:19', '38', '38'),
(9, 4, 1000, 10, 1, NULL, '0000-00-00', '2018-03-15 15:20:16', '2018-03-15 15:22:27', '38', '38'),
(10, 1, 1209, 11, 1, NULL, '0000-00-00', '2018-03-16 13:41:51', '2018-03-17 20:16:28', '38', '38'),
(11, 2, 1209, 13, 1, NULL, '0000-00-00', '2018-03-16 13:42:54', '2018-03-17 20:16:28', '38', '38'),
(12, 3, 1209, 12, 1, NULL, '0000-00-00', '2018-03-16 13:42:54', '2018-03-17 20:16:28', '38', '38'),
(13, 4, 1209, 15, 1, NULL, '0000-00-00', '2018-03-16 13:42:54', '2018-03-17 20:16:28', '38', '38'),
(14, 5, 1210, 16, 1, NULL, '0000-00-00', '2018-03-17 19:16:22', '2018-03-17 22:23:45', '38', '38'),
(15, 1, 1141, 17, 1, NULL, '0000-00-00', '2018-03-18 08:42:02', '2018-03-18 08:41:28', '38', '38'),
(16, 2, 1141, 18, 1, NULL, '0000-00-00', '2018-03-18 08:42:02', '2018-03-18 08:41:28', '38', '38'),
(17, 3, 1141, 19, 1, NULL, '0000-00-00', '2018-03-18 08:42:02', '2018-03-18 08:41:28', '38', '38'),
(18, 1, 1111, 29, 0, NULL, '0000-00-00', '2018-03-22 18:31:22', '2018-03-22 18:31:22', '38', '38'),
(19, 2, 1111, 27, 1, NULL, '0000-00-00', '2018-03-22 18:31:22', '2018-03-22 18:33:02', '38', '31'),
(20, 3, 1111, 28, 0, NULL, '0000-00-00', '2018-03-22 18:31:22', '2018-03-22 18:31:45', '38', '31'),
(21, 1, 12, 33, 1, '2018-03-24 17:40:39', '0000-00-00', '2018-03-24 14:50:53', '2018-03-24 17:40:39', '38', '38'),
(22, 3, 16, 32, 1, '2018-03-24 17:40:39', '0000-00-00', '2018-03-24 14:50:53', '2018-03-24 17:40:39', '38', '38'),
(23, 0, 40, 34, 1, '2018-03-26 21:27:11', '0000-00-00', '2018-03-26 20:46:00', '2018-03-26 21:27:11', '', '38'),
(24, 1, 47, 36, 0, '2018-03-27 15:27:28', '0000-00-00', '2018-03-27 14:58:13', '2018-03-27 17:23:09', '38', '38'),
(25, 3, 12, 37, 1, '2018-03-27 16:47:40', '0000-00-00', '2018-03-27 15:17:30', '2018-03-27 16:47:40', '38', '38'),
(26, 4, 43, 38, 1, '2018-03-27 16:44:41', '0000-00-00', '2018-03-27 15:18:01', '2018-03-27 16:44:41', '38', '38'),
(27, 0, 2212, 39, 1, '2018-04-03 13:00:59', '0000-00-00', '2018-04-03 11:50:37', '2018-04-03 13:00:59', '', '38'),
(28, 0, 37, 40, 1, '2018-04-04 19:01:54', '0000-00-00', '2018-04-04 19:01:48', '2018-04-04 19:01:54', '', '38'),
(29, 0, 2, 41, 1, '2018-04-04 19:35:41', '0000-00-00', '2018-04-04 19:33:11', '2018-04-04 19:35:41', '', '38'),
(30, 0, 15, 42, 1, '2018-04-04 19:35:05', '0000-00-00', '2018-04-04 19:35:01', '2018-04-04 19:35:05', '', '38'),
(31, 0, 51, 43, 1, '2018-04-08 11:54:04', '0000-00-00', '2018-04-08 11:53:05', '2018-04-08 11:54:04', '', '38');

-- --------------------------------------------------------

--
-- Table structure for table `mandi_ceiling_price_daily_history`
--

CREATE TABLE `mandi_ceiling_price_daily_history` (
  `id` int(11) NOT NULL,
  `mandi_name` varchar(255) DEFAULT NULL,
  `ceiling_price` decimal(10,2) DEFAULT NULL,
  `avg_buying` decimal(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_by` varchar(45) NOT NULL,
  `modal` decimal(10,2) DEFAULT NULL,
  `suggest` decimal(10,2) DEFAULT NULL,
  `min_price` decimal(10,2) DEFAULT NULL,
  `max_price` decimal(10,2) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `mandi_daily_price_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandi_ceiling_price_daily_history`
--

INSERT INTO `mandi_ceiling_price_daily_history` (`id`, `mandi_name`, `ceiling_price`, `avg_buying`, `created_at`, `updated_at`, `created_by`, `updated_by`, `modal`, `suggest`, `min_price`, `max_price`, `quantity`, `mandi_daily_price_id`) VALUES
(2, 'Bansur', '4.00', '65709.95', '2018-03-26 20:47:45', '2018-03-26 20:47:45', '38', '38', '1565.71', '3.00', '3.00', '3.00', '11.00', 34),
(3, 'Bansur', '4.00', '65709.95', '2018-03-26 20:47:53', '2018-03-26 20:47:53', '38', '38', '1565.71', '3.00', '3.00', '3.00', '11.00', 34),
(4, 'Bansur', '50.00', '65709.95', '2018-03-26 20:48:27', '2018-03-26 20:48:27', '38', '38', '1565.71', '3.00', '3.00', '3.00', '11.00', 34),
(5, 'Bansur', '15.00', '65709.95', '2018-03-26 20:52:27', '2018-03-26 20:52:27', '38', '38', '1565.71', '3.00', '3.00', '3.00', '11.00', 34),
(6, 'Bansur', '40.00', '65709.95', '2018-03-26 21:14:30', '2018-03-26 21:14:30', '38', '38', '1565.71', '3.00', '3.00', '3.00', '11.00', 34),
(7, 'Bansur', '40.00', '65709.95', '2018-03-26 21:22:56', '2018-03-26 21:22:56', '38', '38', '1565.71', '3.00', '3.00', '3.00', '11.00', 34),
(8, 'Bansur', '40.00', '65709.95', '2018-03-26 21:27:10', '2018-03-26 21:27:10', '38', '38', '1565.71', '3.00', '3.00', '3.00', '11.00', 34),
(9, 'Bansur', '21.00', '65709.95', '2018-03-27 15:08:16', '2018-03-27 15:08:16', '38', '38', '1565.71', '22.00', '323.00', '2323.00', '23.00', 36),
(10, 'Bansur', '45.00', '65709.95', '2018-03-27 15:22:40', '2018-03-27 15:22:40', '38', '38', '1565.71', '22.00', '323.00', '2323.00', '23.00', 36),
(11, 'Laxmangarh', '45.00', '519.01', '2018-03-27 15:22:40', '2018-03-27 15:22:40', '38', '38', '1473.00', '22.00', '23.00', '33.00', '2.00', 37),
(12, 'Mohan Nagar Mandi', '45.00', '0.00', '2018-03-27 15:22:40', '2018-03-27 15:22:40', '38', '38', '1535.00', '22.00', '22.00', '44.00', '1.00', 38),
(13, 'Bansur', '47.00', '65709.95', '2018-03-27 15:25:26', '2018-03-27 15:25:26', '38', '38', '1565.71', '22.00', '323.00', '2323.00', '23.00', 36),
(14, 'Laxmangarh', '47.00', '519.01', '2018-03-27 15:25:26', '2018-03-27 15:25:26', '38', '38', '1473.00', '22.00', '23.00', '33.00', '2.00', 37),
(15, 'Mohan Nagar Mandi', '47.00', '0.00', '2018-03-27 15:25:26', '2018-03-27 15:25:26', '38', '38', '1535.00', '22.00', '22.00', '44.00', '1.00', 38),
(16, 'Mohan Nagar Mandi', '43.00', '0.00', '2018-03-27 16:44:40', '2018-03-27 16:44:40', '38', '38', '1535.00', '22.00', '22.00', '44.00', '1.00', 38),
(17, 'Laxmangarh', '12.00', '519.01', '2018-03-27 16:47:39', '2018-03-27 16:47:39', '38', '38', '1473.00', '22.00', '23.00', '33.00', '2.00', 37),
(18, 'Bagru', '2322.00', '953.29', '2018-04-03 12:02:20', '2018-04-03 12:02:20', '38', '38', '1506.67', '23.00', '23.00', '233.00', '23.00', 39),
(19, 'Bagru', '2322.00', '953.29', '2018-04-03 12:52:13', '2018-04-03 12:52:13', '38', '38', '1506.67', '23.00', '23.00', '233.00', '23.00', 39),
(20, 'Bagru', '22.00', '953.29', '2018-04-03 12:52:22', '2018-04-03 12:52:22', '38', '38', '1506.67', '23.00', '23.00', '233.00', '23.00', 39),
(21, 'Bagru', '2212.00', '953.29', '2018-04-03 13:00:37', '2018-04-03 13:00:37', '38', '38', '1506.67', '23.00', '23.00', '233.00', '23.00', 39),
(22, 'Bagru', '2212.00', '953.29', '2018-04-03 13:00:56', '2018-04-03 13:00:56', '38', '38', '1506.67', '23.00', '23.00', '233.00', '23.00', 39),
(23, 'Bagru', '37.00', '953.29', '2018-04-04 19:01:51', '2018-04-04 19:01:51', '38', '38', '1506.67', '23.00', '23.00', '3444.00', '34.00', 40),
(24, 'Bansur', '21.00', '65709.95', '2018-04-04 19:33:24', '2018-04-04 19:33:24', '38', '38', '1538.57', '23.00', '334.00', '2333.00', '67.00', 41),
(25, 'Laxmangarh', '15.00', '411.01', '2018-04-04 19:35:03', '2018-04-04 19:35:03', '38', '38', '1473.00', '23.00', '34.00', '234.00', '23.00', 42),
(26, 'Bansur', '2.00', '65709.95', '2018-04-04 19:35:39', '2018-04-04 19:35:39', '38', '38', '1538.57', '23.00', '334.00', '2333.00', '67.00', 41),
(27, 'Bagru', '61.00', '953.29', '2018-04-08 11:53:12', '2018-04-08 11:53:12', '38', '38', '0.00', '50.00', '50.00', '60.00', '12.00', 43),
(28, 'Bagru', '36.00', '953.29', '2018-04-08 11:53:21', '2018-04-08 11:53:21', '38', '38', '0.00', '50.00', '50.00', '60.00', '12.00', 43),
(29, 'Bagru', '51.00', '953.29', '2018-04-08 11:54:03', '2018-04-08 11:54:03', '38', '38', '0.00', '50.00', '50.00', '60.00', '12.00', 43);

-- --------------------------------------------------------

--
-- Table structure for table `mandi_daily_price`
--

CREATE TABLE `mandi_daily_price` (
  `id` int(11) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `save_min` int(11) NOT NULL,
  `save_max` float NOT NULL,
  `save_qty` float NOT NULL,
  `min` float NOT NULL,
  `max` float NOT NULL,
  `isFrozen` tinyint(1) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` float NOT NULL,
  `isSubmit` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandi_daily_price`
--

INSERT INTO `mandi_daily_price` (`id`, `mandi_id`, `save_min`, `save_max`, `save_qty`, `min`, `max`, `isFrozen`, `Status`, `updated_at`, `created_at`, `updated_by`, `created_by`, `date`, `quantity`, `isSubmit`) VALUES
(1, 1, 100, 1420, 100, 1450, 1420, 1, '', '2018-03-13 15:01:51', '2018-03-13 15:01:51', 36, 0, '2018-03-13', 100, 1),
(2, 2, 1100, 1000, 80, 1100, 1000, 1, '', '2018-03-13 15:01:51', '2018-03-13 15:01:51', 36, 0, '2018-03-13', 80, 1),
(3, 3, 3000, 1225, 200, 3000, 1225, 1, '', '2018-03-13 15:01:51', '2018-03-13 15:01:51', 36, 0, '2018-03-13', 200, 1),
(4, 1, 23, 24, 25, 23, 24, 0, '', '2018-03-14 14:34:44', '2018-03-14 14:34:44', 36, 0, '2018-03-14', 25, 1),
(5, 2, 120, 140, 23, 120, 140, 0, '', '2018-03-14 14:33:46', '2018-03-14 14:33:46', 36, 0, '2018-03-14', 23, 1),
(6, 3, 100, 150, 100, 100, 150, 0, '', '2018-03-14 14:33:46', '2018-03-14 14:33:46', 0, 0, '2018-03-14', 100, 1),
(7, 1, 1400, 1498, 400, 1400, 1498, 1, '', '2018-03-15 15:29:12', '2018-03-15 15:29:12', 40, 31, '2018-03-15', 400, 1),
(8, 2, 1402, 1459, 102, 1402, 1459, 1, '', '2018-03-15 15:29:12', '2018-03-15 15:29:12', 37, 31, '2018-03-15', 102, 1),
(9, 3, 1359, 1439, 200, 1359, 1439, 1, '', '2018-03-15 15:29:12', '2018-03-15 15:29:12', 37, 31, '2018-03-15', 200, 1),
(10, 4, 1400, 1435, 250, 1400, 1435, 1, '', '2018-03-15 15:29:12', '2018-03-15 15:29:12', 0, 0, '2018-03-15', 250, 1),
(11, 1, 1107, 1203, 15, 1107, 1203, 1, '', '2018-03-17 19:15:43', '2018-03-17 13:45:43', 31, 31, '2018-03-17', 15, 1),
(12, 3, 1223, 1225, 10, 1223, 1225, 1, '', '2018-03-17 19:15:43', '2018-03-17 13:45:43', 31, 31, '2018-03-17', 10, 1),
(13, 2, 1125, 1250, 150, 1125, 1250, 1, '', '2018-03-17 19:15:43', '2018-03-17 13:45:43', 31, 31, '2018-03-17', 150, 1),
(14, 5, 133, 1250, 15, 133, 1250, 0, '', '2018-03-01 18:38:44', '2018-03-01 13:08:44', 31, 0, '2018-03-01', 15, 1),
(15, 4, 1333, 1444, 50, 1333, 1444, 1, '', '2018-03-17 19:15:43', '2018-03-17 13:45:43', 31, 31, '2018-03-17', 50, 1),
(16, 5, 1450, 1500, 100, 1450, 1500, 1, '', '2018-03-17 19:15:43', '2018-03-17 13:45:43', 31, 31, '2018-03-17', 100, 1),
(17, 1, 1212, 1249, 41, 1212, 1249, 0, '', '2018-03-18 14:56:35', '2018-03-18 09:26:35', 31, 31, '2018-03-18', 41, 1),
(18, 2, 1150, 1152, 123, 1150, 1152, 0, '', '2018-03-18 14:56:35', '2018-03-18 09:26:35', 31, 31, '2018-03-18', 123, 1),
(19, 3, 750, 1112, 65, 750, 1112, 0, '', '2018-03-18 14:56:35', '2018-03-18 09:26:35', 31, 31, '2018-03-18', 65, 1),
(20, 1, 34, 67, 3, 34, 67, 1, '', '2018-03-19 13:58:31', '2018-03-19 08:28:31', 31, 31, '2018-03-19', 3, 1),
(21, 2, 87, 99, 6, 87, 99, 0, '', '2018-03-19 13:56:40', '2018-03-19 08:26:40', 0, 31, '2018-03-19', 6, 0),
(22, 3, 89, 90, 8, 89, 90, 0, '', '2018-03-19 13:57:23', '2018-03-19 08:27:23', 0, 0, '2018-03-19', 8, 0),
(23, 4, 11, 12, 0, 0, 0, 0, '', '0000-00-00 00:00:00', '2018-03-19 10:06:21', 0, 31, '2018-03-19', 0, 0),
(24, 1, 22, 22, 22, 22, 22, 0, '', '2018-03-20 14:07:44', '2018-03-20 08:37:44', 0, 0, '2018-03-20', 22, 0),
(25, 1, 231, 25, 2, 231, 25, 0, '', '2018-03-21 16:15:24', '2018-03-21 10:45:24', 31, 0, '2018-03-21', 2, 1),
(26, 2, 444, 25, 2, 444, 25, 0, '', '2018-03-22 15:22:40', '2018-03-22 09:52:40', 31, 31, '2018-03-21', 2, 1),
(27, 2, 23, 26, 23, 23, 26, 1, '', '2018-03-22 18:31:14', '2018-03-22 13:01:14', 31, 31, '2018-03-22', 23, 1),
(28, 3, 23, 12, 12, 23, 12, 1, '', '2018-03-22 18:31:14', '2018-03-22 13:01:14', 31, 31, '2018-03-22', 12, 1),
(29, 1, 22, 2, 22, 22, 2, 1, '', '2018-03-22 18:31:14', '2018-03-22 13:01:14', 31, 31, '2018-03-22', 22, 0),
(30, 2, 1, 23, 0, 1, 23, 0, '', '2018-03-23 18:57:41', '2018-03-23 13:27:41', 31, 31, '2018-03-23', 0, 1),
(31, 1, 22, 22222, 1, 22, 22222, 0, '', '2018-03-23 18:57:41', '2018-03-23 13:27:41', 31, 31, '2018-03-23', 1, 1),
(32, 3, 23, 244, 23, 23, 244, 1, '', '2018-03-24 17:32:18', '2018-03-24 12:02:18', 31, 31, '2018-03-24', 23, 1),
(33, 1, 122, 222, 22, 122, 222, 1, '', '2018-03-24 17:32:18', '2018-03-24 12:02:18', 31, 31, '2018-03-24', 22, 1),
(34, 1, 3, 3, 11, 3, 3, 1, '', '2018-03-26 21:22:51', '2018-03-26 15:52:51', 31, 31, '2018-03-26', 11, 1),
(35, 3, 3434, 3434340, 43, 3434, 3434340, 1, '', '2018-03-26 21:22:51', '2018-03-26 15:52:51', 31, 31, '2018-03-26', 43, 1),
(36, 1, 323, 2323, 23, 323, 2323, 0, '', '2018-03-27 17:23:13', '2018-03-27 11:53:13', 31, 31, '2018-03-27', 23, 1),
(37, 3, 23, 33, 2, 23, 33, 0, '', '2018-03-27 17:23:13', '2018-03-27 11:53:13', 31, 31, '2018-03-27', 2, 1),
(38, 4, 22, 44, 1, 22, 44, 0, '', '2018-03-27 17:23:13', '2018-03-27 11:53:13', 31, 31, '2018-03-27', 1, 1),
(39, 2, 23, 233, 23, 23, 233, 1, '', '2018-04-03 12:11:31', '2018-04-03 07:21:26', 31, 31, '2018-04-03', 23, 1),
(40, 2, 23, 3444, 34, 23, 3444, 1, '', '2018-04-04 19:01:35', '2018-04-04 13:31:35', 31, 31, '2018-04-04', 34, 1),
(41, 1, 334, 2333, 67, 334, 2333, 1, '', '2018-04-04 19:01:35', '2018-04-04 13:31:35', 31, 31, '2018-04-04', 67, 1),
(42, 3, 34, 234, 23, 34, 234, 1, '', '2018-04-04 19:01:35', '2018-04-04 13:31:35', 31, 31, '2018-04-04', 23, 1),
(43, 2, 50, 60, 12, 50, 60, 1, '', '2018-04-08 11:52:53', '2018-04-08 06:22:53', 31, 31, '2018-04-08', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mandi_daily_price_history`
--

CREATE TABLE `mandi_daily_price_history` (
  `id` int(11) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `min` float NOT NULL,
  `max` float NOT NULL,
  `quality` float NOT NULL,
  `previous_day_min` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2018_03_23_113702_create_order_sequences_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notificationevent`
--

CREATE TABLE `notificationevent` (
  `id` int(11) NOT NULL,
  `event_id` varchar(255) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `template_email` varchar(1000) DEFAULT NULL,
  `template_sms` varchar(100) DEFAULT NULL,
  `template_push` varchar(100) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificationevent`
--

INSERT INTO `notificationevent` (`id`, `event_id`, `description`, `template_email`, `template_sms`, `template_push`, `active`, `created_at`, `updated_at`, `created_by`, `modified_by`) VALUES
(1, 'Notify', NULL, NULL, 'SAMPLE text', NULL, NULL, '2018-03-15 13:42:22', '2018-03-15 13:42:22', NULL, '38'),
(2, 'Notify', NULL, NULL, 'SAMPLE text', NULL, NULL, '2018-03-15 13:44:15', '2018-03-15 13:44:15', NULL, '38'),
(3, 'Notify', NULL, NULL, 'SAMPLE text', NULL, NULL, '2018-03-15 15:20:29', '2018-03-15 15:20:29', NULL, '38'),
(4, 'Notify', NULL, NULL, 'SAMPLE text', NULL, NULL, '2018-03-15 15:22:27', '2018-03-15 15:22:27', NULL, '38'),
(5, 'Notify', NULL, NULL, 'SAMPLE text', NULL, NULL, '2018-03-15 15:24:18', '2018-03-15 15:24:18', NULL, '38'),
(6, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:29:22 pm is 1000', NULL, '2018-03-15 15:29:22', '2018-03-15 15:29:22', NULL, '38'),
(7, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:25 pm is 1000', NULL, '2018-03-15 15:50:25', '2018-03-15 15:50:25', NULL, '38'),
(8, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:48 pm is 1000', NULL, '2018-03-15 15:50:48', '2018-03-15 15:50:48', NULL, '38'),
(9, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:51:54 pm is 1000', NULL, '2018-03-15 15:51:54', '2018-03-15 15:51:54', NULL, '38'),
(10, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:13 pm is 1000', NULL, '2018-03-15 15:52:13', '2018-03-15 15:52:13', NULL, '38'),
(11, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:26 pm is 1000', NULL, '2018-03-15 15:52:26', '2018-03-15 15:52:26', NULL, '38'),
(12, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:52:28 pm is 1000', NULL, '2018-03-15 15:52:28', '2018-03-15 15:52:28', NULL, '38'),
(13, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:52:29 pm is 1000', NULL, '2018-03-15 15:52:29', '2018-03-15 15:52:29', NULL, '38'),
(14, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 15-03-2018 03:52:31 pm is 1000', NULL, '2018-03-15 15:52:31', '2018-03-15 15:52:31', NULL, '38'),
(15, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:05 pm is 1000', NULL, '2018-03-15 15:53:05', '2018-03-15 15:53:05', NULL, '38'),
(16, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:44 pm is 1000', NULL, '2018-03-15 15:53:44', '2018-03-15 15:53:44', NULL, '38'),
(17, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:55 pm is 1000', NULL, '2018-03-15 15:53:55', '2018-03-15 15:53:55', NULL, '38'),
(18, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:56 pm is 1000', NULL, '2018-03-15 15:53:56', '2018-03-15 15:53:56', NULL, '38'),
(19, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:53:58 pm is 1000', NULL, '2018-03-15 15:53:58', '2018-03-15 15:53:58', NULL, '38'),
(20, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 15-03-2018 03:53:59 pm is 1000', NULL, '2018-03-15 15:53:59', '2018-03-15 15:53:59', NULL, '38'),
(21, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price notification', NULL, '2018-03-16 13:37:28', '2018-03-16 13:37:28', NULL, '38'),
(22, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price notification', NULL, '2018-03-16 13:41:20', '2018-03-16 13:41:20', NULL, '38'),
(23, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:41:57 pm is 34', NULL, '2018-03-16 13:41:57', '2018-03-16 13:41:57', NULL, '38'),
(24, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:43:52 pm is 22', NULL, '2018-03-16 13:43:52', '2018-03-16 13:43:52', NULL, '36'),
(25, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:43:53 pm is 22', NULL, '2018-03-16 13:43:53', '2018-03-16 13:43:53', NULL, '36'),
(26, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 01:43:55 pm is 22', NULL, '2018-03-16 13:43:55', '2018-03-16 13:43:55', NULL, '36'),
(27, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 16-03-2018 01:43:56 pm is 22', NULL, '2018-03-16 13:43:56', '2018-03-16 13:43:56', NULL, '36'),
(28, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:45:45 pm is 22', NULL, '2018-03-16 13:45:45', '2018-03-16 13:45:45', NULL, '36'),
(29, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:45:57 pm is 22', NULL, '2018-03-16 13:45:57', '2018-03-16 13:45:57', NULL, '36'),
(30, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:48:03 pm is 22', NULL, '2018-03-16 13:48:03', '2018-03-16 13:48:03', NULL, '36'),
(31, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:27 pm is 22', NULL, '2018-03-16 18:35:27', '2018-03-16 18:35:27', NULL, '38'),
(32, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:33 pm is 22', NULL, '2018-03-16 18:35:33', '2018-03-16 18:35:33', NULL, '38'),
(33, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:54 pm is 22', NULL, '2018-03-16 18:35:54', '2018-03-16 18:35:54', NULL, '38'),
(34, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:36:09 pm is 22', NULL, '2018-03-16 18:36:09', '2018-03-16 18:36:09', NULL, '38'),
(35, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:16 pm is 22', NULL, '2018-03-16 18:38:16', '2018-03-16 18:38:16', NULL, '38'),
(36, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:17 pm is 22', NULL, '2018-03-16 18:38:17', '2018-03-16 18:38:17', NULL, '38'),
(37, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:18 pm is 22', NULL, '2018-03-16 18:38:18', '2018-03-16 18:38:18', NULL, '38'),
(38, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:20 pm is 22', NULL, '2018-03-16 18:38:20', '2018-03-16 18:38:20', NULL, '38'),
(39, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:40 pm is 1200', NULL, '2018-03-16 18:38:40', '2018-03-16 18:38:40', NULL, '38'),
(40, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:41 pm is 1200', NULL, '2018-03-16 18:38:41', '2018-03-16 18:38:41', NULL, '38'),
(41, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:43 pm is 1200', NULL, '2018-03-16 18:38:43', '2018-03-16 18:38:43', NULL, '38'),
(42, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:44 pm is 1200', NULL, '2018-03-16 18:38:44', '2018-03-16 18:38:44', NULL, '38'),
(43, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:24:06 pm is 1202', NULL, '2018-03-17 19:24:06', '2018-03-17 19:24:06', NULL, '38'),
(44, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:35:29 pm is 1204', NULL, '2018-03-17 19:35:29', '2018-03-17 19:35:29', NULL, '38'),
(45, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:35:30 pm is 1202', NULL, '2018-03-17 19:35:30', '2018-03-17 19:35:30', NULL, '38'),
(46, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:35:31 pm is 1202', NULL, '2018-03-17 19:35:31', '2018-03-17 19:35:31', NULL, '38'),
(47, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 17-03-2018 07:35:33 pm is 1202', NULL, '2018-03-17 19:35:33', '2018-03-17 19:35:33', NULL, '38'),
(48, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:35:35 pm is 1202', NULL, '2018-03-17 19:35:35', '2018-03-17 19:35:35', NULL, '38'),
(49, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:38:35 pm is 1204', NULL, '2018-03-17 19:38:35', '2018-03-17 19:38:35', NULL, '38'),
(50, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:38:36 pm is 1202', NULL, '2018-03-17 19:38:36', '2018-03-17 19:38:36', NULL, '38'),
(51, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:38:37 pm is 1202', NULL, '2018-03-17 19:38:37', '2018-03-17 19:38:37', NULL, '38'),
(52, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 17-03-2018 07:38:39 pm is 1202', NULL, '2018-03-17 19:38:39', '2018-03-17 19:38:39', NULL, '38'),
(53, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:38:41 pm is 1202', NULL, '2018-03-17 19:38:41', '2018-03-17 19:38:41', NULL, '38'),
(54, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:43 pm is 1204', NULL, '2018-03-17 19:39:43', '2018-03-17 19:39:43', NULL, '38'),
(55, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:50 pm is 1204', NULL, '2018-03-17 19:39:50', '2018-03-17 19:39:50', NULL, '38'),
(56, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:39:51 pm is 1202', NULL, '2018-03-17 19:39:51', '2018-03-17 19:39:51', NULL, '38'),
(57, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:39:53 pm is 1202', NULL, '2018-03-17 19:39:53', '2018-03-17 19:39:53', NULL, '38'),
(58, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 17-03-2018 07:39:55 pm is 1202', NULL, '2018-03-17 19:39:55', '2018-03-17 19:39:55', NULL, '38'),
(59, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:39:56 pm is 1202', NULL, '2018-03-17 19:39:56', '2018-03-17 19:39:56', NULL, '38'),
(60, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:40:53 pm is 1204', NULL, '2018-03-17 19:40:53', '2018-03-17 19:40:53', NULL, '38'),
(61, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:40:58 pm is 1202', NULL, '2018-03-17 19:40:58', '2018-03-17 19:40:58', NULL, '38'),
(62, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price notification', NULL, '2018-03-18 08:41:57', '2018-03-18 08:41:57', NULL, '38'),
(63, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price notification', NULL, '2018-03-18 08:41:58', '2018-03-18 08:41:58', NULL, '38'),
(64, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price notification', NULL, '2018-03-18 08:42:00', '2018-03-18 08:42:00', NULL, '38'),
(65, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 08:41:36 am is 1141', NULL, '2018-03-18 08:41:36', '2018-03-18 08:41:36', NULL, '38'),
(66, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 11:38:45 am is 1141', NULL, '2018-03-18 11:38:45', '2018-03-18 11:38:45', NULL, '38'),
(67, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 22-03-2018 06:31:44 pm is 1111', NULL, '2018-03-22 18:31:44', '2018-03-22 18:31:44', NULL, '31'),
(68, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 22-03-2018 06:33:01 pm is 1111', NULL, '2018-03-22 18:33:01', '2018-03-22 18:33:01', NULL, '31'),
(69, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price notification', NULL, '2018-03-24 13:23:26', '2018-03-24 13:23:26', NULL, '38'),
(70, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price notification', NULL, '2018-03-24 13:23:31', '2018-03-24 13:23:31', NULL, '38'),
(71, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price notification', NULL, '2018-03-24 13:23:32', '2018-03-24 13:23:32', NULL, '38'),
(72, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:50:57 pm is 12', NULL, '2018-03-24 14:50:57', '2018-03-24 14:50:57', NULL, '38'),
(73, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:52:39 pm is 12', NULL, '2018-03-24 14:52:39', '2018-03-24 14:52:39', NULL, '38'),
(74, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:55:23 pm is 12', NULL, '2018-03-24 14:55:23', '2018-03-24 14:55:23', NULL, '38'),
(75, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:55:24 pm is 12', NULL, '2018-03-24 14:55:24', '2018-03-24 14:55:24', NULL, '38'),
(76, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 05:32:21 pm is 12', NULL, '2018-03-24 17:32:21', '2018-03-24 17:32:21', NULL, '38'),
(77, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 05:40:36 pm is 12', NULL, '2018-03-24 17:40:36', '2018-03-24 17:40:36', NULL, '38'),
(78, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 05:40:38 pm is 16', NULL, '2018-03-24 17:40:38', '2018-03-24 17:40:38', NULL, '38'),
(79, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:46:03 pm is 4', NULL, '2018-03-26 20:46:03', '2018-03-26 20:46:03', NULL, '38'),
(80, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:47:45 pm is 4', NULL, '2018-03-26 20:47:45', '2018-03-26 20:47:45', NULL, '38'),
(81, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:47:53 pm is 4', NULL, '2018-03-26 20:47:53', '2018-03-26 20:47:53', NULL, '38'),
(82, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:48:27 pm is 50', NULL, '2018-03-26 20:48:27', '2018-03-26 20:48:27', NULL, '38'),
(83, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:52:27 pm is 15', NULL, '2018-03-26 20:52:27', '2018-03-26 20:52:27', NULL, '38'),
(84, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:14:30 pm is 40', NULL, '2018-03-26 21:14:30', '2018-03-26 21:14:30', NULL, '38'),
(85, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:22:56 pm is 40', NULL, '2018-03-26 21:22:56', '2018-03-26 21:22:56', NULL, '38'),
(86, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:23:58 pm is 40', NULL, '2018-03-26 21:23:58', '2018-03-26 21:23:58', NULL, '38'),
(87, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price notification', NULL, '2018-03-26 21:24:00', '2018-03-26 21:24:00', NULL, '38'),
(88, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:27:10 pm is 40', NULL, '2018-03-26 21:27:10', '2018-03-26 21:27:10', NULL, '38'),
(89, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:08:16 pm is 21', NULL, '2018-03-27 15:08:16', '2018-03-27 15:08:16', NULL, '38'),
(90, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:18:05 pm is 45', NULL, '2018-03-27 15:18:05', '2018-03-27 15:18:05', NULL, '38'),
(91, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:18:06 pm is 45', NULL, '2018-03-27 15:18:06', '2018-03-27 15:18:06', NULL, '38'),
(92, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 27-03-2018 03:18:08 pm is 45', NULL, '2018-03-27 15:18:08', '2018-03-27 15:18:08', NULL, '38'),
(93, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:22:36 pm is 45', NULL, '2018-03-27 15:22:36', '2018-03-27 15:22:36', NULL, '38'),
(94, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:22:37 pm is 45', NULL, '2018-03-27 15:22:37', '2018-03-27 15:22:37', NULL, '38'),
(95, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 27-03-2018 03:22:39 pm is 45', NULL, '2018-03-27 15:22:39', '2018-03-27 15:22:39', NULL, '38'),
(96, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:22:51 pm is 45', NULL, '2018-03-27 15:22:51', '2018-03-27 15:22:51', NULL, '38'),
(97, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:22:52 pm is 45', NULL, '2018-03-27 15:22:52', '2018-03-27 15:22:52', NULL, '38'),
(98, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 27-03-2018 03:22:53 pm is 45', NULL, '2018-03-27 15:22:53', '2018-03-27 15:22:53', NULL, '38'),
(99, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:23:37 pm is 45', NULL, '2018-03-27 15:23:37', '2018-03-27 15:23:37', NULL, '38'),
(100, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:23:38 pm is 45', NULL, '2018-03-27 15:23:38', '2018-03-27 15:23:38', NULL, '38'),
(101, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 27-03-2018 03:23:40 pm is 45', NULL, '2018-03-27 15:23:40', '2018-03-27 15:23:40', NULL, '38'),
(102, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:24:28 pm is 45', NULL, '2018-03-27 15:24:28', '2018-03-27 15:24:28', NULL, '38'),
(103, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:24:29 pm is 45', NULL, '2018-03-27 15:24:29', '2018-03-27 15:24:29', NULL, '38'),
(104, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 27-03-2018 03:24:31 pm is 45', NULL, '2018-03-27 15:24:31', '2018-03-27 15:24:31', NULL, '38'),
(105, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:25:23 pm is 47', NULL, '2018-03-27 15:25:23', '2018-03-27 15:25:23', NULL, '38'),
(106, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:25:24 pm is 47', NULL, '2018-03-27 15:25:24', '2018-03-27 15:25:24', NULL, '38'),
(107, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 27-03-2018 03:25:25 pm is 47', NULL, '2018-03-27 15:25:25', '2018-03-27 15:25:25', NULL, '38'),
(108, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:27:27 pm is 47', NULL, '2018-03-27 15:27:27', '2018-03-27 15:27:27', NULL, '38'),
(109, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Anaj Mandifor 27-03-2018 04:44:40 pm is 43', NULL, '2018-03-27 16:44:40', '2018-03-27 16:44:40', NULL, '38'),
(110, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 04:47:39 pm is 12', NULL, '2018-03-27 16:47:39', '2018-03-27 16:47:39', NULL, '38'),
(111, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:02:20 pm is 2322', NULL, '2018-04-03 12:02:20', '2018-04-03 12:02:20', NULL, '38'),
(112, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:08 pm is 2322', NULL, '2018-04-03 12:52:08', '2018-04-03 12:52:08', NULL, '38'),
(113, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:23 pm is 22', NULL, '2018-04-03 12:52:23', '2018-04-03 12:52:23', NULL, '38'),
(114, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:29 pm is 22', NULL, '2018-04-03 12:52:29', '2018-04-03 12:52:29', NULL, '38'),
(115, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:38 pm is 22', NULL, '2018-04-03 12:52:38', '2018-04-03 12:52:38', NULL, '38'),
(116, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:56:31 pm is 22', NULL, '2018-04-03 12:56:31', '2018-04-03 12:56:31', NULL, '38'),
(117, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:57:41 pm is 22', NULL, '2018-04-03 12:57:41', '2018-04-03 12:57:41', NULL, '38'),
(118, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:32 pm is 2212', NULL, '2018-04-03 13:00:32', '2018-04-03 13:00:32', NULL, '38'),
(119, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:56 pm is 2212', NULL, '2018-04-03 13:00:56', '2018-04-03 13:00:56', NULL, '38'),
(120, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Kishanfor 04-04-2018 07:01:51 pm is 37', NULL, '2018-04-04 19:01:51', '2018-04-04 19:01:51', NULL, '38'),
(121, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 04-04-2018 07:33:24 pm is 21', NULL, '2018-04-04 19:33:24', '2018-04-04 19:33:24', NULL, '38'),
(122, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 04-04-2018 07:35:03 pm is 15', NULL, '2018-04-04 19:35:03', '2018-04-04 19:35:03', NULL, '38'),
(123, 'Notify', NULL, NULL, 'SAMPLE text', 'Ceiling price for Aeran Oil & Flour Millfor 04-04-2018 07:35:39 pm is 2', NULL, '2018-04-04 19:35:39', '2018-04-04 19:35:39', NULL, '38'),
(124, 'Notify', NULL, NULL, 'SAMPLE text', 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:12 am is 61', NULL, '2018-04-08 11:53:12', '2018-04-08 11:53:12', NULL, '38'),
(125, 'Notify', NULL, NULL, 'SAMPLE text', 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:21 am is 36', NULL, '2018-04-08 11:53:21', '2018-04-08 11:53:21', NULL, '38'),
(126, 'Notify', NULL, NULL, 'SAMPLE text', 'Dear user Kishan you have successfully been registered with 08-04-2018 11:54:04 am is 51', NULL, '2018-04-08 11:54:04', '2018-04-08 11:54:04', NULL, '38');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_queue`
--

CREATE TABLE `notifications_queue` (
  `id` bigint(10) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mode` int(11) DEFAULT NULL,
  `actual_message` varchar(1000) DEFAULT NULL,
  `sent_date_time` varchar(45) DEFAULT NULL,
  `processed` tinyint(4) DEFAULT NULL,
  `received_read` datetime DEFAULT NULL,
  `read` tinyint(4) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications_queue`
--

INSERT INTO `notifications_queue` (`id`, `notification_id`, `user_id`, `mode`, `actual_message`, `sent_date_time`, `processed`, `received_read`, `read`, `mobile`, `email`, `status`, `fcm_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 08:12:22', '2018-03-15 08:12:22'),
(2, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 08:12:22', '2018-03-15 08:12:22'),
(3, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 08:12:22', '2018-03-15 08:12:22'),
(4, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 08:12:22', '2018-03-15 08:12:22'),
(5, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 08:14:15', '2018-03-15 08:14:15'),
(6, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 08:14:15', '2018-03-15 08:14:15'),
(7, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 08:14:15', '2018-03-15 08:14:15'),
(8, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 08:14:15', '2018-03-15 08:14:15'),
(9, 3, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 09:50:29', '2018-03-15 09:50:29'),
(10, 3, NULL, 1, NULL, NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 09:50:29', '2018-03-15 09:50:29'),
(11, 3, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 09:50:29', '2018-03-15 09:50:29'),
(12, 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 09:52:27', '2018-03-15 09:52:27'),
(13, 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 09:52:27', '2018-03-15 09:52:27'),
(14, 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 09:52:27', '2018-03-15 09:52:27'),
(15, 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 09:52:27', '2018-03-15 09:52:27'),
(16, 4, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 09:52:27', '2018-03-15 09:52:27'),
(17, 5, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 09:54:19', '2018-03-15 09:54:19'),
(18, 5, NULL, 1, NULL, NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 09:54:19', '2018-03-15 09:54:19'),
(19, 5, NULL, 1, NULL, NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 09:54:19', '2018-03-15 09:54:19'),
(20, 6, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:29:22 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 09:59:22', '2018-03-15 09:59:22'),
(21, 6, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:29:22 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 09:59:22', '2018-03-15 09:59:22'),
(22, 6, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:29:22 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 09:59:22', '2018-03-15 09:59:22'),
(23, 6, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:29:22 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 09:59:22', '2018-03-15 09:59:22'),
(24, 6, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:29:22 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 09:59:22', '2018-03-15 09:59:22'),
(25, 7, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:25 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:20:25', '2018-03-15 10:20:25'),
(26, 7, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:25 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:20:26', '2018-03-15 10:20:26'),
(27, 7, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:25 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:20:26', '2018-03-15 10:20:26'),
(28, 7, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:25 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:20:26', '2018-03-15 10:20:26'),
(29, 7, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:25 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:20:26', '2018-03-15 10:20:26'),
(30, 8, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:48 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:20:48', '2018-03-15 10:20:48'),
(31, 8, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:48 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:20:48', '2018-03-15 10:20:48'),
(32, 8, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:48 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:20:48', '2018-03-15 10:20:48'),
(33, 8, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:48 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:20:48', '2018-03-15 10:20:48'),
(34, 8, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:50:48 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:20:48', '2018-03-15 10:20:48'),
(35, 9, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:51:54 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:21:54', '2018-03-15 10:21:54'),
(36, 9, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:51:54 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:21:55', '2018-03-15 10:21:55'),
(37, 9, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:51:54 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:21:55', '2018-03-15 10:21:55'),
(38, 9, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:51:54 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:21:55', '2018-03-15 10:21:55'),
(39, 9, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:51:54 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:21:55', '2018-03-15 10:21:55'),
(40, 9, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:51:54 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:21:55', '2018-03-15 10:21:55'),
(41, 10, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:13 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:22:14', '2018-03-15 10:22:14'),
(42, 10, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:13 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:22:14', '2018-03-15 10:22:14'),
(43, 10, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:13 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:22:14', '2018-03-15 10:22:14'),
(44, 10, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:13 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:22:14', '2018-03-15 10:22:14'),
(45, 10, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:13 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:22:14', '2018-03-15 10:22:14'),
(46, 10, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:13 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:22:14', '2018-03-15 10:22:14'),
(47, 11, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:26 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:22:27', '2018-03-15 10:22:27'),
(48, 11, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:26 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:22:27', '2018-03-15 10:22:27'),
(49, 11, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:26 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:22:27', '2018-03-15 10:22:27'),
(50, 11, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:26 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:22:27', '2018-03-15 10:22:27'),
(51, 11, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:26 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:22:27', '2018-03-15 10:22:27'),
(52, 11, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:52:26 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:22:27', '2018-03-15 10:22:27'),
(53, 12, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:52:28 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:22:28', '2018-03-15 10:22:28'),
(54, 12, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:52:28 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:22:28', '2018-03-15 10:22:28'),
(55, 12, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:52:28 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:22:28', '2018-03-15 10:22:28'),
(56, 12, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:52:28 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:22:28', '2018-03-15 10:22:28'),
(57, 12, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:52:28 pm is 1000', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 10:22:28', '2018-03-15 10:22:28'),
(58, 12, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:52:28 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:22:28', '2018-03-15 10:22:28'),
(59, 12, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:52:28 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:22:28', '2018-03-15 10:22:28'),
(60, 12, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:52:28 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'flPLl-6anBY:APA91bGw9fWkLJsCFTPHgCJqvA--TEzM0f0DhvO_qO1GEvI0hVg2_z0MAG8jLtppD589k86s2BnV4xbXeiyj171zznGBezfjhq8qGU0PoU7TMRa4Vly9JewB61k1kxN2ZttzACO3FtiS', '2018-03-15 10:22:29', '2018-03-15 10:22:29'),
(61, 13, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:52:29 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:22:29', '2018-03-15 10:22:29'),
(62, 13, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:52:29 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:22:30', '2018-03-15 10:22:30'),
(63, 13, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:52:29 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:22:30', '2018-03-15 10:22:30'),
(64, 13, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:52:29 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:22:30', '2018-03-15 10:22:30'),
(65, 13, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:52:29 pm is 1000', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 10:22:30', '2018-03-15 10:22:30'),
(66, 13, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:52:29 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:22:30', '2018-03-15 10:22:30'),
(67, 13, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:52:29 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:22:30', '2018-03-15 10:22:30'),
(68, 13, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:52:29 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'flPLl-6anBY:APA91bGw9fWkLJsCFTPHgCJqvA--TEzM0f0DhvO_qO1GEvI0hVg2_z0MAG8jLtppD589k86s2BnV4xbXeiyj171zznGBezfjhq8qGU0PoU7TMRa4Vly9JewB61k1kxN2ZttzACO3FtiS', '2018-03-15 10:22:31', '2018-03-15 10:22:31'),
(69, 14, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:52:31 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:22:31', '2018-03-15 10:22:31'),
(70, 14, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:52:31 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:22:31', '2018-03-15 10:22:31'),
(71, 14, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:52:31 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:22:31', '2018-03-15 10:22:31'),
(72, 14, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:52:31 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:22:31', '2018-03-15 10:22:31'),
(73, 14, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:52:31 pm is 1000', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 10:22:31', '2018-03-15 10:22:31'),
(74, 14, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:52:31 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:22:31', '2018-03-15 10:22:31'),
(75, 14, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:52:31 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:22:32', '2018-03-15 10:22:32'),
(76, 14, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:52:31 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'flPLl-6anBY:APA91bGw9fWkLJsCFTPHgCJqvA--TEzM0f0DhvO_qO1GEvI0hVg2_z0MAG8jLtppD589k86s2BnV4xbXeiyj171zznGBezfjhq8qGU0PoU7TMRa4Vly9JewB61k1kxN2ZttzACO3FtiS', '2018-03-15 10:22:32', '2018-03-15 10:22:32'),
(77, 15, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:05 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:23:05', '2018-03-15 10:23:05'),
(78, 15, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:05 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:23:05', '2018-03-15 10:23:05'),
(79, 15, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:05 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:23:05', '2018-03-15 10:23:05'),
(80, 15, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:05 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:23:05', '2018-03-15 10:23:05'),
(81, 15, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:05 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:23:05', '2018-03-15 10:23:05'),
(82, 15, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:05 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:23:05', '2018-03-15 10:23:05'),
(83, 16, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:44 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:23:45', '2018-03-15 10:23:45'),
(84, 16, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:44 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:23:45', '2018-03-15 10:23:45'),
(85, 16, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:44 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:23:45', '2018-03-15 10:23:45'),
(86, 16, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:44 pm is 1000', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 10:23:45', '2018-03-15 10:23:45'),
(87, 16, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:44 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:23:45', '2018-03-15 10:23:45'),
(88, 16, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:44 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:23:45', '2018-03-15 10:23:45'),
(89, 16, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:44 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'flPLl-6anBY:APA91bGw9fWkLJsCFTPHgCJqvA--TEzM0f0DhvO_qO1GEvI0hVg2_z0MAG8jLtppD589k86s2BnV4xbXeiyj171zznGBezfjhq8qGU0PoU7TMRa4Vly9JewB61k1kxN2ZttzACO3FtiS', '2018-03-15 10:23:46', '2018-03-15 10:23:46'),
(90, 17, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:55 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:23:55', '2018-03-15 10:23:55'),
(91, 17, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:55 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:23:55', '2018-03-15 10:23:55'),
(92, 17, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:55 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:23:55', '2018-03-15 10:23:55'),
(93, 17, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:55 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:23:55', '2018-03-15 10:23:55'),
(94, 17, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:55 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:23:55', '2018-03-15 10:23:55'),
(95, 17, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 15-03-2018 03:53:55 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:23:55', '2018-03-15 10:23:55'),
(96, 18, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:56 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:23:56', '2018-03-15 10:23:56'),
(97, 18, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:56 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:23:56', '2018-03-15 10:23:56'),
(98, 18, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:56 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:23:56', '2018-03-15 10:23:56'),
(99, 18, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:56 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:23:56', '2018-03-15 10:23:56'),
(100, 18, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:56 pm is 1000', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 10:23:56', '2018-03-15 10:23:56'),
(101, 18, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:56 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:23:56', '2018-03-15 10:23:56'),
(102, 18, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:56 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:23:57', '2018-03-15 10:23:57'),
(103, 18, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 15-03-2018 03:53:56 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'flPLl-6anBY:APA91bGw9fWkLJsCFTPHgCJqvA--TEzM0f0DhvO_qO1GEvI0hVg2_z0MAG8jLtppD589k86s2BnV4xbXeiyj171zznGBezfjhq8qGU0PoU7TMRa4Vly9JewB61k1kxN2ZttzACO3FtiS', '2018-03-15 10:23:57', '2018-03-15 10:23:57'),
(104, 19, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:53:58 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:23:58', '2018-03-15 10:23:58'),
(105, 19, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:53:58 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:23:58', '2018-03-15 10:23:58'),
(106, 19, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:53:58 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:23:58', '2018-03-15 10:23:58'),
(107, 19, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:53:58 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:23:58', '2018-03-15 10:23:58'),
(108, 19, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:53:58 pm is 1000', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 10:23:58', '2018-03-15 10:23:58'),
(109, 19, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:53:58 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:23:58', '2018-03-15 10:23:58'),
(110, 19, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:53:58 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:23:58', '2018-03-15 10:23:58'),
(111, 19, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 15-03-2018 03:53:58 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'flPLl-6anBY:APA91bGw9fWkLJsCFTPHgCJqvA--TEzM0f0DhvO_qO1GEvI0hVg2_z0MAG8jLtppD589k86s2BnV4xbXeiyj171zznGBezfjhq8qGU0PoU7TMRa4Vly9JewB61k1kxN2ZttzACO3FtiS', '2018-03-15 10:23:59', '2018-03-15 10:23:59'),
(112, 20, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:53:59 pm is 1000', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-15 10:23:59', '2018-03-15 10:23:59'),
(113, 20, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:53:59 pm is 1000', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-15 10:23:59', '2018-03-15 10:23:59'),
(114, 20, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:53:59 pm is 1000', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-15 10:24:00', '2018-03-15 10:24:00'),
(115, 20, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:53:59 pm is 1000', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-15 10:24:00', '2018-03-15 10:24:00'),
(116, 20, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:53:59 pm is 1000', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-15 10:24:00', '2018-03-15 10:24:00'),
(117, 20, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:53:59 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cgMMqreb57E:APA91bHwRZNic3L7to_3saJUXGYK_XsuE6pEM8_K-XyBo7u46jDYx4Ylk87emVOeXioAZUo8vEgVFNq8GkFEXsggveuavAK_iohr1BHWyaoucvL2EASAVyR_vR8W3Tn2cayeCIS_4mpY', '2018-03-15 10:24:00', '2018-03-15 10:24:00'),
(118, 20, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:53:59 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cUo7dqkpO0A:APA91bH7N1N6syVs3_oFLqkvUgj3sEfEiVytt5bkCEJahKfH-dprpKnfOS22lQBzAkw6yBBG1PVbbyrmTExG6YI4k5toACh-7qm_ATdwZlStZ2gQmGgF_LjJrC4Zs7K7HKqAQNRduLh_', '2018-03-15 10:24:00', '2018-03-15 10:24:00'),
(119, 20, NULL, 1, 'Ceiling price for Anaj Mandifor 15-03-2018 03:53:59 pm is 1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'flPLl-6anBY:APA91bGw9fWkLJsCFTPHgCJqvA--TEzM0f0DhvO_qO1GEvI0hVg2_z0MAG8jLtppD589k86s2BnV4xbXeiyj171zznGBezfjhq8qGU0PoU7TMRa4Vly9JewB61k1kxN2ZttzACO3FtiS', '2018-03-15 10:24:01', '2018-03-15 10:24:01'),
(120, 21, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:07:28', '2018-03-16 08:07:28'),
(121, 21, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 08:07:28', '2018-03-16 08:07:28'),
(122, 21, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:07:28', '2018-03-16 08:07:28'),
(123, 21, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 08:07:28', '2018-03-16 08:07:28'),
(124, 21, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:07:28', '2018-03-16 08:07:28'),
(125, 21, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:07:29', '2018-03-16 08:07:29'),
(126, 22, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:11:20', '2018-03-16 08:11:20'),
(127, 22, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:11:20', '2018-03-16 08:11:20'),
(128, 22, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 08:11:20', '2018-03-16 08:11:20'),
(129, 22, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:11:20', '2018-03-16 08:11:20'),
(130, 22, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:11:20', '2018-03-16 08:11:20'),
(131, 23, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:41:57 pm is 34', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:11:57', '2018-03-16 08:11:57'),
(132, 23, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:41:57 pm is 34', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 08:11:57', '2018-03-16 08:11:57'),
(133, 23, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:41:57 pm is 34', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:11:57', '2018-03-16 08:11:57'),
(134, 23, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:41:57 pm is 34', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 08:11:57', '2018-03-16 08:11:57'),
(135, 23, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:41:57 pm is 34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:11:57', '2018-03-16 08:11:57'),
(136, 23, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:41:57 pm is 34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:11:58', '2018-03-16 08:11:58'),
(137, 24, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:43:52 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:13:52', '2018-03-16 08:13:52'),
(138, 24, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:43:52 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 08:13:52', '2018-03-16 08:13:52'),
(139, 24, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:43:52 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:13:52', '2018-03-16 08:13:52'),
(140, 24, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:43:52 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 08:13:52', '2018-03-16 08:13:52'),
(141, 24, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:43:52 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:13:52', '2018-03-16 08:13:52'),
(142, 24, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:43:52 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:13:53', '2018-03-16 08:13:53'),
(143, 25, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:43:53 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:13:53', '2018-03-16 08:13:53'),
(144, 25, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:43:53 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 08:13:53', '2018-03-16 08:13:53'),
(145, 25, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:43:53 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:13:53', '2018-03-16 08:13:53'),
(146, 25, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:43:53 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 08:13:54', '2018-03-16 08:13:54'),
(147, 25, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:43:53 pm is 22', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 08:13:54', '2018-03-16 08:13:54'),
(148, 25, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:43:53 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:13:54', '2018-03-16 08:13:54'),
(149, 25, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:43:53 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:13:54', '2018-03-16 08:13:54'),
(150, 26, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 01:43:55 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:13:55', '2018-03-16 08:13:55'),
(151, 26, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 01:43:55 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 08:13:55', '2018-03-16 08:13:55'),
(152, 26, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 01:43:55 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:13:55', '2018-03-16 08:13:55'),
(153, 26, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 01:43:55 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 08:13:55', '2018-03-16 08:13:55'),
(154, 26, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 01:43:55 pm is 22', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 08:13:55', '2018-03-16 08:13:55'),
(155, 26, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 01:43:55 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:13:55', '2018-03-16 08:13:55'),
(156, 26, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 01:43:55 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:13:55', '2018-03-16 08:13:55'),
(157, 27, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 01:43:56 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:13:56', '2018-03-16 08:13:56'),
(158, 27, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 01:43:56 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 08:13:56', '2018-03-16 08:13:56'),
(159, 27, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 01:43:56 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:13:56', '2018-03-16 08:13:56'),
(160, 27, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 01:43:56 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 08:13:56', '2018-03-16 08:13:56'),
(161, 27, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 01:43:56 pm is 22', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 08:13:56', '2018-03-16 08:13:56'),
(162, 27, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 01:43:56 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:13:56', '2018-03-16 08:13:56'),
(163, 27, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 01:43:56 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:13:57', '2018-03-16 08:13:57'),
(164, 28, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:45:45 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:15:45', '2018-03-16 08:15:45'),
(165, 28, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:45:45 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 08:15:45', '2018-03-16 08:15:45'),
(166, 28, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:45:45 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:15:45', '2018-03-16 08:15:45'),
(167, 28, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:45:45 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 08:15:45', '2018-03-16 08:15:45'),
(168, 28, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:45:45 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:15:45', '2018-03-16 08:15:45'),
(169, 28, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:45:45 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:15:46', '2018-03-16 08:15:46'),
(170, 29, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:45:57 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:15:57', '2018-03-16 08:15:57'),
(171, 29, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:45:57 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 08:15:57', '2018-03-16 08:15:57'),
(172, 29, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:45:57 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:15:57', '2018-03-16 08:15:57'),
(173, 29, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:45:57 pm is 22', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 08:15:57', '2018-03-16 08:15:57'),
(174, 29, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:45:57 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:15:57', '2018-03-16 08:15:57'),
(175, 29, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 01:45:57 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:15:58', '2018-03-16 08:15:58'),
(176, 30, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:48:03 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 08:18:03', '2018-03-16 08:18:03'),
(177, 30, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:48:03 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 08:18:03', '2018-03-16 08:18:03'),
(178, 30, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:48:03 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 08:18:03', '2018-03-16 08:18:03'),
(179, 30, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:48:03 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 08:18:03', '2018-03-16 08:18:03'),
(180, 30, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:48:03 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eOaDC8HgKCk:APA91bHSP4MfICMORzjO8ta_FIEE4lBlsjFk_iRFjRDmJ99_K6fcA0rKkkflFNrz1mHtqpC_6qSEg2BM3bVa2NswWPXp1W7Ro32NnnTnm3ch6SF9BMa8nO7ry3tc49UDFqfYpI2Ool50', '2018-03-16 08:18:03', '2018-03-16 08:18:03'),
(181, 30, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 01:48:03 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 08:18:04', '2018-03-16 08:18:04'),
(182, 31, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:27 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:05:27', '2018-03-16 13:05:27'),
(183, 31, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:27 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:05:27', '2018-03-16 13:05:27'),
(184, 31, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:27 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:05:27', '2018-03-16 13:05:27'),
(185, 31, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:27 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:05:27', '2018-03-16 13:05:27'),
(186, 31, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:27 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:05:27', '2018-03-16 13:05:27'),
(187, 31, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:27 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:05:28', '2018-03-16 13:05:28'),
(188, 32, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:33 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:05:33', '2018-03-16 13:05:33'),
(189, 32, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:33 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:05:33', '2018-03-16 13:05:33'),
(190, 32, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:33 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:05:33', '2018-03-16 13:05:33'),
(191, 32, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:33 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:05:33', '2018-03-16 13:05:33'),
(192, 32, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:33 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:05:33', '2018-03-16 13:05:33'),
(193, 32, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:33 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:05:34', '2018-03-16 13:05:34'),
(194, 33, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:54 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:05:55', '2018-03-16 13:05:55'),
(195, 33, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:54 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:05:55', '2018-03-16 13:05:55'),
(196, 33, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:54 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:05:55', '2018-03-16 13:05:55'),
(197, 33, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:54 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:05:55', '2018-03-16 13:05:55'),
(198, 33, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:54 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:05:55', '2018-03-16 13:05:55'),
(199, 33, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:35:54 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:05:55', '2018-03-16 13:05:55'),
(200, 34, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:36:09 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:06:09', '2018-03-16 13:06:09'),
(201, 34, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:36:09 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:06:09', '2018-03-16 13:06:09'),
(202, 34, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:36:09 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:06:09', '2018-03-16 13:06:09'),
(203, 34, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:36:09 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:06:09', '2018-03-16 13:06:09'),
(204, 34, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:36:09 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:06:09', '2018-03-16 13:06:09'),
(205, 34, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:36:09 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:06:09', '2018-03-16 13:06:09'),
(206, 35, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:16 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:08:16', '2018-03-16 13:08:16'),
(207, 35, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:16 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:08:16', '2018-03-16 13:08:16'),
(208, 35, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:16 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:08:16', '2018-03-16 13:08:16'),
(209, 35, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:16 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:08:16', '2018-03-16 13:08:16'),
(210, 35, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:16 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:08:16', '2018-03-16 13:08:16'),
(211, 35, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:16 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:08:16', '2018-03-16 13:08:16'),
(212, 36, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:17 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:08:17', '2018-03-16 13:08:17'),
(213, 36, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:17 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:08:17', '2018-03-16 13:08:17'),
(214, 36, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:17 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:08:17', '2018-03-16 13:08:17'),
(215, 36, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:17 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:08:17', '2018-03-16 13:08:17'),
(216, 36, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:17 pm is 22', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 13:08:17', '2018-03-16 13:08:17');
INSERT INTO `notifications_queue` (`id`, `notification_id`, `user_id`, `mode`, `actual_message`, `sent_date_time`, `processed`, `received_read`, `read`, `mobile`, `email`, `status`, `fcm_token`, `created_at`, `updated_at`) VALUES
(217, 36, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:17 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:08:17', '2018-03-16 13:08:17'),
(218, 36, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:17 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:08:18', '2018-03-16 13:08:18'),
(219, 37, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:18 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:08:19', '2018-03-16 13:08:19'),
(220, 37, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:18 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:08:19', '2018-03-16 13:08:19'),
(221, 37, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:18 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:08:19', '2018-03-16 13:08:19'),
(222, 37, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:18 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:08:19', '2018-03-16 13:08:19'),
(223, 37, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:18 pm is 22', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 13:08:19', '2018-03-16 13:08:19'),
(224, 37, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:18 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:08:19', '2018-03-16 13:08:19'),
(225, 37, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:18 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:08:19', '2018-03-16 13:08:19'),
(226, 38, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:20 pm is 22', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:08:20', '2018-03-16 13:08:20'),
(227, 38, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:20 pm is 22', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:08:21', '2018-03-16 13:08:21'),
(228, 38, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:20 pm is 22', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:08:21', '2018-03-16 13:08:21'),
(229, 38, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:20 pm is 22', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:08:21', '2018-03-16 13:08:21'),
(230, 38, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:20 pm is 22', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 13:08:21', '2018-03-16 13:08:21'),
(231, 38, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:20 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:08:21', '2018-03-16 13:08:21'),
(232, 38, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:20 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:08:21', '2018-03-16 13:08:21'),
(233, 39, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:40 pm is 1200', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:08:40', '2018-03-16 13:08:40'),
(234, 39, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:40 pm is 1200', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:08:41', '2018-03-16 13:08:41'),
(235, 39, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:40 pm is 1200', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:08:41', '2018-03-16 13:08:41'),
(236, 39, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:40 pm is 1200', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:08:41', '2018-03-16 13:08:41'),
(237, 39, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:40 pm is 1200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:08:41', '2018-03-16 13:08:41'),
(238, 39, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 16-03-2018 06:38:40 pm is 1200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:08:41', '2018-03-16 13:08:41'),
(239, 40, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:41 pm is 1200', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:08:42', '2018-03-16 13:08:42'),
(240, 40, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:41 pm is 1200', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:08:42', '2018-03-16 13:08:42'),
(241, 40, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:41 pm is 1200', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:08:42', '2018-03-16 13:08:42'),
(242, 40, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:41 pm is 1200', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:08:42', '2018-03-16 13:08:42'),
(243, 40, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:41 pm is 1200', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 13:08:42', '2018-03-16 13:08:42'),
(244, 40, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:41 pm is 1200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:08:42', '2018-03-16 13:08:42'),
(245, 40, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 16-03-2018 06:38:41 pm is 1200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:08:42', '2018-03-16 13:08:42'),
(246, 41, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:43 pm is 1200', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:08:43', '2018-03-16 13:08:43'),
(247, 41, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:43 pm is 1200', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:08:43', '2018-03-16 13:08:43'),
(248, 41, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:43 pm is 1200', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:08:43', '2018-03-16 13:08:43'),
(249, 41, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:43 pm is 1200', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:08:43', '2018-03-16 13:08:43'),
(250, 41, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:43 pm is 1200', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 13:08:43', '2018-03-16 13:08:43'),
(251, 41, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:43 pm is 1200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:08:43', '2018-03-16 13:08:43'),
(252, 41, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 16-03-2018 06:38:43 pm is 1200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:08:43', '2018-03-16 13:08:43'),
(253, 42, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:44 pm is 1200', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-16 13:08:44', '2018-03-16 13:08:44'),
(254, 42, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:44 pm is 1200', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-16 13:08:44', '2018-03-16 13:08:44'),
(255, 42, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:44 pm is 1200', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-16 13:08:44', '2018-03-16 13:08:44'),
(256, 42, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:44 pm is 1200', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-16 13:08:44', '2018-03-16 13:08:44'),
(257, 42, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:44 pm is 1200', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-16 13:08:44', '2018-03-16 13:08:44'),
(258, 42, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:44 pm is 1200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cDe_wxzDe-w:APA91bHDzNWLqu1MaH3LH2y681wvPCI-1pMCE5uZIFpWFHm86ZsTCx59R_UW4YCUz7WKP3y8jMy2eYIylNp9YXU_gR_ZyUQcrbN_yaoepYZDwCsfJB4ArVRqxp5S0M1kxe5i9lp_2HYb', '2018-03-16 13:08:44', '2018-03-16 13:08:44'),
(259, 42, NULL, 1, 'Ceiling price for Anaj Mandifor 16-03-2018 06:38:44 pm is 1200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-16 13:08:44', '2018-03-16 13:08:44'),
(260, 43, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:24:06 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 13:54:06', '2018-03-17 13:54:06'),
(261, 43, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:24:06 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 13:54:06', '2018-03-17 13:54:06'),
(262, 43, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:24:06 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 13:54:06', '2018-03-17 13:54:06'),
(263, 43, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:24:06 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 13:54:06', '2018-03-17 13:54:06'),
(264, 43, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:24:06 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 13:54:06', '2018-03-17 13:54:06'),
(265, 43, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:24:06 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 13:54:07', '2018-03-17 13:54:07'),
(266, 44, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:35:29 pm is 1204', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:05:29', '2018-03-17 14:05:29'),
(267, 44, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:35:29 pm is 1204', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:05:29', '2018-03-17 14:05:29'),
(268, 44, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:35:29 pm is 1204', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:05:29', '2018-03-17 14:05:29'),
(269, 44, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:35:29 pm is 1204', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:05:29', '2018-03-17 14:05:29'),
(270, 44, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:35:29 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:05:29', '2018-03-17 14:05:29'),
(271, 44, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:35:29 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:05:29', '2018-03-17 14:05:29'),
(272, 45, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:35:30 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:05:30', '2018-03-17 14:05:30'),
(273, 45, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:35:30 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:05:30', '2018-03-17 14:05:30'),
(274, 45, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:35:30 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:05:30', '2018-03-17 14:05:30'),
(275, 45, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:35:30 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:05:30', '2018-03-17 14:05:30'),
(276, 45, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:35:30 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:05:30', '2018-03-17 14:05:30'),
(277, 45, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:35:30 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:05:30', '2018-03-17 14:05:30'),
(278, 45, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:35:30 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:05:30', '2018-03-17 14:05:30'),
(279, 45, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:35:30 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:05:31', '2018-03-17 14:05:31'),
(280, 46, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:35:31 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:05:31', '2018-03-17 14:05:31'),
(281, 46, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:35:31 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:05:31', '2018-03-17 14:05:31'),
(282, 46, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:35:31 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:05:31', '2018-03-17 14:05:31'),
(283, 46, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:35:31 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:05:31', '2018-03-17 14:05:31'),
(284, 46, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:35:31 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:05:31', '2018-03-17 14:05:31'),
(285, 46, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:35:31 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:05:31', '2018-03-17 14:05:31'),
(286, 46, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:35:31 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:05:32', '2018-03-17 14:05:32'),
(287, 46, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:35:31 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:05:32', '2018-03-17 14:05:32'),
(288, 47, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:35:33 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:05:33', '2018-03-17 14:05:33'),
(289, 47, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:35:33 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:05:33', '2018-03-17 14:05:33'),
(290, 47, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:35:33 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:05:33', '2018-03-17 14:05:33'),
(291, 47, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:35:33 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:05:33', '2018-03-17 14:05:33'),
(292, 47, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:35:33 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:05:33', '2018-03-17 14:05:33'),
(293, 47, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:35:33 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:05:33', '2018-03-17 14:05:33'),
(294, 47, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:35:33 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:05:34', '2018-03-17 14:05:34'),
(295, 47, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:35:33 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:05:34', '2018-03-17 14:05:34'),
(296, 48, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:35:35 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:05:35', '2018-03-17 14:05:35'),
(297, 48, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:35:35 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:05:35', '2018-03-17 14:05:35'),
(298, 48, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:35:35 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:05:35', '2018-03-17 14:05:35'),
(299, 48, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:35:35 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:05:35', '2018-03-17 14:05:35'),
(300, 48, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:35:35 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:05:35', '2018-03-17 14:05:35'),
(301, 48, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:35:35 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:05:35', '2018-03-17 14:05:35'),
(302, 48, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:35:35 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:05:35', '2018-03-17 14:05:35'),
(303, 48, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:35:35 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:05:36', '2018-03-17 14:05:36'),
(304, 49, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:38:35 pm is 1204', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:08:35', '2018-03-17 14:08:35'),
(305, 49, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:38:35 pm is 1204', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:08:35', '2018-03-17 14:08:35'),
(306, 49, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:38:35 pm is 1204', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:08:35', '2018-03-17 14:08:35'),
(307, 49, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:38:35 pm is 1204', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:08:35', '2018-03-17 14:08:35'),
(308, 49, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:38:35 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:08:35', '2018-03-17 14:08:35'),
(309, 49, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:38:35 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:08:35', '2018-03-17 14:08:35'),
(310, 50, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:38:36 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:08:36', '2018-03-17 14:08:36'),
(311, 50, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:38:36 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:08:36', '2018-03-17 14:08:36'),
(312, 50, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:38:36 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:08:36', '2018-03-17 14:08:36'),
(313, 50, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:38:36 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:08:36', '2018-03-17 14:08:36'),
(314, 50, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:38:36 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:08:36', '2018-03-17 14:08:36'),
(315, 50, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:38:36 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:08:36', '2018-03-17 14:08:36'),
(316, 50, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:38:36 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:08:36', '2018-03-17 14:08:36'),
(317, 50, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:38:36 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:08:37', '2018-03-17 14:08:37'),
(318, 51, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:38:37 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:08:37', '2018-03-17 14:08:37'),
(319, 51, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:38:37 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:08:37', '2018-03-17 14:08:37'),
(320, 51, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:38:37 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:08:37', '2018-03-17 14:08:37'),
(321, 51, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:38:37 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:08:37', '2018-03-17 14:08:37'),
(322, 51, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:38:37 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:08:38', '2018-03-17 14:08:38'),
(323, 51, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:38:37 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:08:38', '2018-03-17 14:08:38'),
(324, 51, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:38:37 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:08:38', '2018-03-17 14:08:38'),
(325, 51, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:38:37 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:08:39', '2018-03-17 14:08:39'),
(326, 52, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:38:39 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:08:39', '2018-03-17 14:08:39'),
(327, 52, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:38:39 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:08:39', '2018-03-17 14:08:39'),
(328, 52, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:38:39 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:08:39', '2018-03-17 14:08:39'),
(329, 52, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:38:39 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:08:39', '2018-03-17 14:08:39'),
(330, 52, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:38:39 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:08:39', '2018-03-17 14:08:39'),
(331, 52, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:38:39 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:08:39', '2018-03-17 14:08:39'),
(332, 52, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:38:39 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:08:40', '2018-03-17 14:08:40'),
(333, 52, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:38:39 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:08:40', '2018-03-17 14:08:40'),
(334, 53, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:38:41 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:08:41', '2018-03-17 14:08:41'),
(335, 53, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:38:41 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:08:41', '2018-03-17 14:08:41'),
(336, 53, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:38:41 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:08:41', '2018-03-17 14:08:41'),
(337, 53, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:38:41 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:08:41', '2018-03-17 14:08:41'),
(338, 53, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:38:41 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:08:41', '2018-03-17 14:08:41'),
(339, 53, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:38:41 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:08:41', '2018-03-17 14:08:41'),
(340, 53, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:38:41 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:08:41', '2018-03-17 14:08:41'),
(341, 53, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:38:41 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:08:42', '2018-03-17 14:08:42'),
(342, 54, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:43 pm is 1204', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:09:44', '2018-03-17 14:09:44'),
(343, 54, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:43 pm is 1204', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:09:44', '2018-03-17 14:09:44'),
(344, 54, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:43 pm is 1204', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:09:44', '2018-03-17 14:09:44'),
(345, 54, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:43 pm is 1204', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:09:44', '2018-03-17 14:09:44'),
(346, 54, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:43 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:09:44', '2018-03-17 14:09:44'),
(347, 54, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:43 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:09:44', '2018-03-17 14:09:44'),
(348, 55, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:50 pm is 1204', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:09:50', '2018-03-17 14:09:50'),
(349, 55, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:50 pm is 1204', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:09:50', '2018-03-17 14:09:50'),
(350, 55, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:50 pm is 1204', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:09:50', '2018-03-17 14:09:50'),
(351, 55, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:50 pm is 1204', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:09:50', '2018-03-17 14:09:50'),
(352, 55, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:50 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:09:50', '2018-03-17 14:09:50'),
(353, 55, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:39:50 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:09:51', '2018-03-17 14:09:51'),
(354, 56, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:39:51 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:09:51', '2018-03-17 14:09:51'),
(355, 56, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:39:51 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:09:51', '2018-03-17 14:09:51'),
(356, 56, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:39:51 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:09:51', '2018-03-17 14:09:51'),
(357, 56, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:39:51 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:09:51', '2018-03-17 14:09:51'),
(358, 56, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:39:51 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:09:51', '2018-03-17 14:09:51'),
(359, 56, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:39:51 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:09:51', '2018-03-17 14:09:51'),
(360, 56, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:39:51 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:09:52', '2018-03-17 14:09:52'),
(361, 56, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:39:51 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:09:53', '2018-03-17 14:09:53'),
(362, 57, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:39:53 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:09:53', '2018-03-17 14:09:53'),
(363, 57, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:39:53 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:09:53', '2018-03-17 14:09:53'),
(364, 57, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:39:53 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:09:53', '2018-03-17 14:09:53'),
(365, 57, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:39:53 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:09:53', '2018-03-17 14:09:53'),
(366, 57, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:39:53 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:09:53', '2018-03-17 14:09:53'),
(367, 57, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:39:53 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:09:53', '2018-03-17 14:09:53'),
(368, 57, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:39:53 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:09:54', '2018-03-17 14:09:54'),
(369, 57, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 17-03-2018 07:39:53 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:09:54', '2018-03-17 14:09:54'),
(370, 58, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:39:55 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:09:55', '2018-03-17 14:09:55'),
(371, 58, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:39:55 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:09:55', '2018-03-17 14:09:55'),
(372, 58, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:39:55 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:09:55', '2018-03-17 14:09:55'),
(373, 58, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:39:55 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:09:55', '2018-03-17 14:09:55'),
(374, 58, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:39:55 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:09:55', '2018-03-17 14:09:55'),
(375, 58, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:39:55 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:09:55', '2018-03-17 14:09:55'),
(376, 58, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:39:55 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:09:55', '2018-03-17 14:09:55'),
(377, 58, NULL, 1, 'Ceiling price for Anaj Mandifor 17-03-2018 07:39:55 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:09:56', '2018-03-17 14:09:56'),
(378, 59, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:39:56 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:09:56', '2018-03-17 14:09:56'),
(379, 59, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:39:56 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:09:57', '2018-03-17 14:09:57'),
(380, 59, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:39:56 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:09:57', '2018-03-17 14:09:57'),
(381, 59, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:39:56 pm is 1202', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:09:57', '2018-03-17 14:09:57'),
(382, 59, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:39:56 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:09:57', '2018-03-17 14:09:57'),
(383, 59, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:39:56 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:09:57', '2018-03-17 14:09:57'),
(384, 59, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:39:56 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:09:57', '2018-03-17 14:09:57'),
(385, 59, NULL, 1, 'Ceiling price for Nai Anaj Mandifor 17-03-2018 07:39:56 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:09:58', '2018-03-17 14:09:58'),
(386, 60, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:40:53 pm is 1204', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:10:53', '2018-03-17 14:10:53'),
(387, 60, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:40:53 pm is 1204', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:10:53', '2018-03-17 14:10:53'),
(388, 60, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:40:53 pm is 1204', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:10:53', '2018-03-17 14:10:53'),
(389, 60, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:40:53 pm is 1204', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-17 14:10:53', '2018-03-17 14:10:53'),
(390, 60, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:40:53 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:10:54', '2018-03-17 14:10:54'),
(391, 60, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 17-03-2018 07:40:53 pm is 1204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:10:54', '2018-03-17 14:10:54'),
(392, 61, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:40:58 pm is 1202', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-17 14:10:58', '2018-03-17 14:10:58'),
(393, 61, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:40:58 pm is 1202', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-17 14:10:58', '2018-03-17 14:10:58'),
(394, 61, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:40:58 pm is 1202', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-17 14:10:58', '2018-03-17 14:10:58'),
(395, 61, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:40:58 pm is 1202', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-17 14:10:58', '2018-03-17 14:10:58'),
(396, 61, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:40:58 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-17 14:10:58', '2018-03-17 14:10:58'),
(397, 61, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:40:58 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-17 14:10:59', '2018-03-17 14:10:59'),
(398, 61, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 17-03-2018 07:40:58 pm is 1202', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdIPlXUJF40:APA91bGT1hRIZSF-7gsvtYG0kvwFIaO7p0pEu3jMXWQNfvWVtRoUL1C44brdyLPpM-7lqh891t99HU8BcfC5EOdXhg28-Qjk0bo1KiSj3H52BKrlSNpZxvuaXCpYSzyVetIHlRvMLK4K', '2018-03-17 14:10:59', '2018-03-17 14:10:59'),
(399, 62, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-18 03:11:57', '2018-03-18 03:11:57'),
(400, 62, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-18 03:11:57', '2018-03-18 03:11:57'),
(401, 62, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-18 03:11:57', '2018-03-18 03:11:57'),
(402, 62, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-18 03:11:57', '2018-03-18 03:11:57'),
(403, 62, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-18 03:11:57', '2018-03-18 03:11:57'),
(404, 62, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-18 03:11:58', '2018-03-18 03:11:58'),
(405, 63, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-18 03:11:58', '2018-03-18 03:11:58'),
(406, 63, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-18 03:11:58', '2018-03-18 03:11:58'),
(407, 63, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-18 03:11:58', '2018-03-18 03:11:58'),
(408, 63, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-18 03:11:58', '2018-03-18 03:11:58'),
(409, 63, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-18 03:11:58', '2018-03-18 03:11:58'),
(410, 63, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-18 03:11:58', '2018-03-18 03:11:58'),
(411, 63, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-18 03:11:59', '2018-03-18 03:11:59'),
(412, 63, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-03-18 03:11:59', '2018-03-18 03:11:59'),
(413, 64, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-18 03:12:00', '2018-03-18 03:12:00'),
(414, 64, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-18 03:12:00', '2018-03-18 03:12:00'),
(415, 64, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-18 03:12:00', '2018-03-18 03:12:00'),
(416, 64, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-18 03:12:00', '2018-03-18 03:12:00'),
(417, 64, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-18 03:12:00', '2018-03-18 03:12:00'),
(418, 64, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-18 03:12:00', '2018-03-18 03:12:00'),
(419, 64, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-18 03:12:01', '2018-03-18 03:12:01'),
(420, 64, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-03-18 03:12:02', '2018-03-18 03:12:02'),
(421, 65, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 08:41:36 am is 1141', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-18 03:11:36', '2018-03-18 03:11:36');
INSERT INTO `notifications_queue` (`id`, `notification_id`, `user_id`, `mode`, `actual_message`, `sent_date_time`, `processed`, `received_read`, `read`, `mobile`, `email`, `status`, `fcm_token`, `created_at`, `updated_at`) VALUES
(422, 65, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 08:41:36 am is 1141', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-18 03:11:36', '2018-03-18 03:11:36'),
(423, 65, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 08:41:36 am is 1141', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-18 03:11:36', '2018-03-18 03:11:36'),
(424, 65, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 08:41:36 am is 1141', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-18 03:11:36', '2018-03-18 03:11:36'),
(425, 65, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 08:41:36 am is 1141', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-18 03:11:37', '2018-03-18 03:11:37'),
(426, 65, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 08:41:36 am is 1141', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-18 03:11:37', '2018-03-18 03:11:37'),
(427, 66, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 11:38:45 am is 1141', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-18 06:08:46', '2018-03-18 06:08:46'),
(428, 66, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 11:38:45 am is 1141', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-18 06:08:46', '2018-03-18 06:08:46'),
(429, 66, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 11:38:45 am is 1141', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-18 06:08:46', '2018-03-18 06:08:46'),
(430, 66, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 11:38:45 am is 1141', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-18 06:08:46', '2018-03-18 06:08:46'),
(431, 66, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 11:38:45 am is 1141', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eFk6LWj01bE:APA91bHEI3pd1H-mQJpdTiEDusH6DjXR6jMNJqo-iNvYGjsqIHZt8nGJWv0ImlmAfg8_mMJ3Norgh7Ccby5kBOmVdsDXeQPz5QF9CikmTJeJik9nxKJAlRWCMkEESk0pUiUI1MYS0BKj', '2018-03-18 06:08:46', '2018-03-18 06:08:46'),
(432, 66, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 18-03-2018 11:38:45 am is 1141', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-18 06:08:46', '2018-03-18 06:08:46'),
(433, 67, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 22-03-2018 06:31:44 pm is 1111', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-22 13:01:44', '2018-03-22 13:01:44'),
(434, 67, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 22-03-2018 06:31:44 pm is 1111', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-22 13:01:44', '2018-03-22 13:01:44'),
(435, 67, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 22-03-2018 06:31:44 pm is 1111', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-22 13:01:44', '2018-03-22 13:01:44'),
(436, 67, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 22-03-2018 06:31:44 pm is 1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-22 13:01:44', '2018-03-22 13:01:44'),
(437, 67, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 22-03-2018 06:31:44 pm is 1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fnkiJfEAm6s:APA91bECj5-EL66ett2Yzu-LLWexO9VFYo6mAVK8jJk7AV263htyDVHP1xLCG1X6B4kb1rhyw5bbN6pq25VdqfjssRS6TTzghIfnsxCUY65lKFI00-gL3nKhUMhRq1XSXpwdn9GDD3Xd', '2018-03-22 13:01:45', '2018-03-22 13:01:45'),
(438, 68, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 22-03-2018 06:33:01 pm is 1111', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-22 13:03:01', '2018-03-22 13:03:01'),
(439, 68, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 22-03-2018 06:33:01 pm is 1111', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-22 13:03:01', '2018-03-22 13:03:01'),
(440, 68, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 22-03-2018 06:33:01 pm is 1111', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-22 13:03:01', '2018-03-22 13:03:01'),
(441, 68, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 22-03-2018 06:33:01 pm is 1111', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-22 13:03:01', '2018-03-22 13:03:01'),
(442, 68, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 22-03-2018 06:33:01 pm is 1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-22 13:03:01', '2018-03-22 13:03:01'),
(443, 68, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 22-03-2018 06:33:01 pm is 1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-03-22 13:03:01', '2018-03-22 13:03:01'),
(444, 68, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 22-03-2018 06:33:01 pm is 1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fnkiJfEAm6s:APA91bECj5-EL66ett2Yzu-LLWexO9VFYo6mAVK8jJk7AV263htyDVHP1xLCG1X6B4kb1rhyw5bbN6pq25VdqfjssRS6TTzghIfnsxCUY65lKFI00-gL3nKhUMhRq1XSXpwdn9GDD3Xd', '2018-03-22 13:03:02', '2018-03-22 13:03:02'),
(445, 69, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-24 07:53:26', '2018-03-24 07:53:26'),
(446, 69, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-24 07:53:26', '2018-03-24 07:53:26'),
(447, 69, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-24 07:53:26', '2018-03-24 07:53:26'),
(448, 69, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-24 07:53:26', '2018-03-24 07:53:26'),
(449, 69, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 07:53:26', '2018-03-24 07:53:26'),
(450, 69, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 07:53:27', '2018-03-24 07:53:27'),
(451, 70, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-24 07:53:31', '2018-03-24 07:53:31'),
(452, 70, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-24 07:53:31', '2018-03-24 07:53:31'),
(453, 70, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-24 07:53:31', '2018-03-24 07:53:31'),
(454, 70, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-24 07:53:31', '2018-03-24 07:53:31'),
(455, 70, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 07:53:31', '2018-03-24 07:53:31'),
(456, 70, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 07:53:31', '2018-03-24 07:53:31'),
(457, 71, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-24 07:53:32', '2018-03-24 07:53:32'),
(458, 71, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-24 07:53:32', '2018-03-24 07:53:32'),
(459, 71, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-24 07:53:32', '2018-03-24 07:53:32'),
(460, 71, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-24 07:53:32', '2018-03-24 07:53:32'),
(461, 71, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-24 07:53:32', '2018-03-24 07:53:32'),
(462, 71, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 07:53:32', '2018-03-24 07:53:32'),
(463, 71, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 07:53:33', '2018-03-24 07:53:33'),
(464, 72, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:50:57 pm is 12', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-24 09:20:57', '2018-03-24 09:20:57'),
(465, 72, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:50:57 pm is 12', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-24 09:20:57', '2018-03-24 09:20:57'),
(466, 72, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:50:57 pm is 12', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-24 09:20:57', '2018-03-24 09:20:57'),
(467, 72, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:50:57 pm is 12', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-24 09:20:57', '2018-03-24 09:20:57'),
(468, 72, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:50:57 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 09:20:57', '2018-03-24 09:20:57'),
(469, 72, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:50:57 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 09:20:57', '2018-03-24 09:20:57'),
(470, 73, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:52:39 pm is 12', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-24 09:22:39', '2018-03-24 09:22:39'),
(471, 73, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:52:39 pm is 12', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-24 09:22:39', '2018-03-24 09:22:39'),
(472, 73, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:52:39 pm is 12', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-24 09:22:39', '2018-03-24 09:22:39'),
(473, 73, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:52:39 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 09:22:39', '2018-03-24 09:22:39'),
(474, 73, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:52:39 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 09:22:40', '2018-03-24 09:22:40'),
(475, 74, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:55:23 pm is 12', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-24 09:25:23', '2018-03-24 09:25:23'),
(476, 74, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:55:23 pm is 12', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-24 09:25:23', '2018-03-24 09:25:23'),
(477, 74, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:55:23 pm is 12', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-24 09:25:23', '2018-03-24 09:25:23'),
(478, 74, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:55:23 pm is 12', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-24 09:25:23', '2018-03-24 09:25:23'),
(479, 74, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:55:23 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 09:25:23', '2018-03-24 09:25:23'),
(480, 74, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 02:55:23 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 09:25:24', '2018-03-24 09:25:24'),
(481, 75, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:55:24 pm is 12', NULL, NULL, NULL, NULL, '7760141133', NULL, NULL, NULL, '2018-03-24 09:25:24', '2018-03-24 09:25:24'),
(482, 75, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:55:24 pm is 12', NULL, NULL, NULL, NULL, '9900633600', NULL, NULL, NULL, '2018-03-24 09:25:25', '2018-03-24 09:25:25'),
(483, 75, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:55:24 pm is 12', NULL, NULL, NULL, NULL, '9108791326', NULL, NULL, NULL, '2018-03-24 09:25:25', '2018-03-24 09:25:25'),
(484, 75, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:55:24 pm is 12', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-03-24 09:25:25', '2018-03-24 09:25:25'),
(485, 75, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:55:24 pm is 12', NULL, NULL, NULL, NULL, '9876579876', NULL, NULL, NULL, '2018-03-24 09:25:25', '2018-03-24 09:25:25'),
(486, 75, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:55:24 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 09:25:25', '2018-03-24 09:25:25'),
(487, 75, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 02:55:24 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 09:25:25', '2018-03-24 09:25:25'),
(488, 76, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 05:32:21 pm is 12', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-24 12:02:21', '2018-03-24 12:02:21'),
(489, 76, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 05:32:21 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 12:02:22', '2018-03-24 12:02:22'),
(490, 76, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 05:32:21 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 12:02:22', '2018-03-24 12:02:22'),
(491, 77, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 05:40:36 pm is 12', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-24 12:10:36', '2018-03-24 12:10:36'),
(492, 77, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 05:40:36 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 12:10:37', '2018-03-24 12:10:37'),
(493, 77, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 24-03-2018 05:40:36 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 12:10:37', '2018-03-24 12:10:37'),
(494, 78, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 05:40:38 pm is 16', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-24 12:10:38', '2018-03-24 12:10:38'),
(495, 78, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 05:40:38 pm is 16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-24 12:10:38', '2018-03-24 12:10:38'),
(496, 78, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 24-03-2018 05:40:38 pm is 16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-24 12:10:38', '2018-03-24 12:10:38'),
(497, 79, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:46:03 pm is 4', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:16:03', '2018-03-26 15:16:03'),
(498, 79, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:46:03 pm is 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:16:03', '2018-03-26 15:16:03'),
(499, 79, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:46:03 pm is 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:16:04', '2018-03-26 15:16:04'),
(500, 80, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:47:45 pm is 4', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:17:45', '2018-03-26 15:17:45'),
(501, 80, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:47:45 pm is 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:17:45', '2018-03-26 15:17:45'),
(502, 80, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:47:45 pm is 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:17:46', '2018-03-26 15:17:46'),
(503, 81, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:47:53 pm is 4', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:17:53', '2018-03-26 15:17:53'),
(504, 81, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:47:53 pm is 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:17:53', '2018-03-26 15:17:53'),
(505, 81, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:47:53 pm is 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:17:54', '2018-03-26 15:17:54'),
(506, 82, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:48:27 pm is 50', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:18:27', '2018-03-26 15:18:27'),
(507, 82, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:48:27 pm is 50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:18:27', '2018-03-26 15:18:27'),
(508, 82, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:48:27 pm is 50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:18:28', '2018-03-26 15:18:28'),
(509, 83, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:52:27 pm is 15', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:22:27', '2018-03-26 15:22:27'),
(510, 83, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:52:27 pm is 15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:22:27', '2018-03-26 15:22:27'),
(511, 83, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 08:52:27 pm is 15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:22:28', '2018-03-26 15:22:28'),
(512, 84, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:14:30 pm is 40', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:44:30', '2018-03-26 15:44:30'),
(513, 84, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:14:30 pm is 40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:44:30', '2018-03-26 15:44:30'),
(514, 84, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:14:30 pm is 40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:44:30', '2018-03-26 15:44:30'),
(515, 85, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:22:56 pm is 40', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:52:56', '2018-03-26 15:52:56'),
(516, 85, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:22:56 pm is 40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:52:56', '2018-03-26 15:52:56'),
(517, 85, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:22:56 pm is 40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:52:57', '2018-03-26 15:52:57'),
(518, 86, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:23:58 pm is 40', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:53:58', '2018-03-26 15:53:58'),
(519, 86, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:23:58 pm is 40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:53:58', '2018-03-26 15:53:58'),
(520, 86, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:23:58 pm is 40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:53:59', '2018-03-26 15:53:59'),
(521, 87, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:54:00', '2018-03-26 15:54:00'),
(522, 87, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:54:00', '2018-03-26 15:54:00'),
(523, 87, NULL, 1, 'Ceiling price notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:54:01', '2018-03-26 15:54:01'),
(524, 88, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:27:10 pm is 40', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-26 15:57:10', '2018-03-26 15:57:10'),
(525, 88, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:27:10 pm is 40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-26 15:57:10', '2018-03-26 15:57:10'),
(526, 88, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 26-03-2018 09:27:10 pm is 40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-26 15:57:11', '2018-03-26 15:57:11'),
(527, 89, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:08:16 pm is 21', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:38:16', '2018-03-27 09:38:16'),
(528, 89, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:08:16 pm is 21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:38:16', '2018-03-27 09:38:16'),
(529, 89, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:08:16 pm is 21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:38:18', '2018-03-27 09:38:18'),
(530, 90, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:18:05 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:48:05', '2018-03-27 09:48:05'),
(531, 90, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:18:05 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:48:05', '2018-03-27 09:48:05'),
(532, 90, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:18:05 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:48:06', '2018-03-27 09:48:06'),
(533, 91, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:18:06 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:48:06', '2018-03-27 09:48:06'),
(534, 91, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:18:06 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:48:06', '2018-03-27 09:48:06'),
(535, 91, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:18:06 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:48:07', '2018-03-27 09:48:07'),
(536, 92, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:18:08 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:48:08', '2018-03-27 09:48:08'),
(537, 92, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:18:08 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:48:08', '2018-03-27 09:48:08'),
(538, 92, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:18:08 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:48:08', '2018-03-27 09:48:08'),
(539, 93, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:22:36 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:52:36', '2018-03-27 09:52:36'),
(540, 93, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:22:36 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:52:36', '2018-03-27 09:52:36'),
(541, 93, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:22:36 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:52:36', '2018-03-27 09:52:36'),
(542, 94, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:22:37 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:52:37', '2018-03-27 09:52:37'),
(543, 94, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:22:37 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:52:37', '2018-03-27 09:52:37'),
(544, 94, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:22:37 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:52:38', '2018-03-27 09:52:38'),
(545, 95, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:22:39 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:52:39', '2018-03-27 09:52:39'),
(546, 95, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:22:39 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:52:39', '2018-03-27 09:52:39'),
(547, 95, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:22:39 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:52:39', '2018-03-27 09:52:39'),
(548, 96, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:22:51 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:52:51', '2018-03-27 09:52:51'),
(549, 96, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:22:51 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:52:51', '2018-03-27 09:52:51'),
(550, 96, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:22:51 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:52:52', '2018-03-27 09:52:52'),
(551, 97, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:22:52 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:52:52', '2018-03-27 09:52:52'),
(552, 97, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:22:52 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:52:52', '2018-03-27 09:52:52'),
(553, 97, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:22:52 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:52:53', '2018-03-27 09:52:53'),
(554, 98, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:22:53 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:52:53', '2018-03-27 09:52:53'),
(555, 98, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:22:53 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:52:54', '2018-03-27 09:52:54'),
(556, 98, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:22:53 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:52:54', '2018-03-27 09:52:54'),
(557, 99, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:23:37 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:53:37', '2018-03-27 09:53:37'),
(558, 99, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:23:37 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:53:37', '2018-03-27 09:53:37'),
(559, 99, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:23:37 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:53:38', '2018-03-27 09:53:38'),
(560, 100, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:23:38 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:53:38', '2018-03-27 09:53:38'),
(561, 100, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:23:38 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:53:38', '2018-03-27 09:53:38'),
(562, 100, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:23:38 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:53:39', '2018-03-27 09:53:39'),
(563, 101, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:23:40 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:53:40', '2018-03-27 09:53:40'),
(564, 101, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:23:40 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:53:40', '2018-03-27 09:53:40'),
(565, 101, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:23:40 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:53:40', '2018-03-27 09:53:40'),
(566, 102, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:24:28 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:54:28', '2018-03-27 09:54:28'),
(567, 102, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:24:28 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:54:28', '2018-03-27 09:54:28'),
(568, 102, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:24:28 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:54:29', '2018-03-27 09:54:29'),
(569, 103, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:24:29 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:54:30', '2018-03-27 09:54:30'),
(570, 103, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:24:29 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:54:30', '2018-03-27 09:54:30'),
(571, 103, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:24:29 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:54:30', '2018-03-27 09:54:30'),
(572, 104, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:24:31 pm is 45', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:54:31', '2018-03-27 09:54:31'),
(573, 104, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:24:31 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:54:31', '2018-03-27 09:54:31'),
(574, 104, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:24:31 pm is 45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:54:32', '2018-03-27 09:54:32'),
(575, 105, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:25:23 pm is 47', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:55:23', '2018-03-27 09:55:23'),
(576, 105, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:25:23 pm is 47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:55:23', '2018-03-27 09:55:23'),
(577, 105, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:25:23 pm is 47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:55:23', '2018-03-27 09:55:23'),
(578, 106, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:25:24 pm is 47', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:55:24', '2018-03-27 09:55:24'),
(579, 106, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:25:24 pm is 47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:55:24', '2018-03-27 09:55:24'),
(580, 106, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 03:25:24 pm is 47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:55:25', '2018-03-27 09:55:25'),
(581, 107, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:25:25 pm is 47', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:55:25', '2018-03-27 09:55:25'),
(582, 107, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:25:25 pm is 47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:55:25', '2018-03-27 09:55:25'),
(583, 107, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 03:25:25 pm is 47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:55:26', '2018-03-27 09:55:26'),
(584, 108, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:27:27 pm is 47', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 09:57:27', '2018-03-27 09:57:27'),
(585, 108, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:27:27 pm is 47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 09:57:27', '2018-03-27 09:57:27'),
(586, 108, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 27-03-2018 03:27:27 pm is 47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 09:57:28', '2018-03-27 09:57:28'),
(587, 109, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 04:44:40 pm is 43', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 11:14:40', '2018-03-27 11:14:40'),
(588, 109, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 04:44:40 pm is 43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 11:14:40', '2018-03-27 11:14:40'),
(589, 109, NULL, 1, 'Ceiling price for Anaj Mandifor 27-03-2018 04:44:40 pm is 43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 11:14:40', '2018-03-27 11:14:40'),
(590, 110, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 04:47:39 pm is 12', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-03-27 11:17:39', '2018-03-27 11:17:39'),
(591, 110, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 04:47:39 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-03-27 11:17:39', '2018-03-27 11:17:39'),
(592, 110, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 27-03-2018 04:47:39 pm is 12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-03-27 11:17:40', '2018-03-27 11:17:40'),
(593, 111, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:02:20 pm is 2322', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-03 06:32:20', '2018-04-03 06:32:20'),
(594, 111, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:02:20 pm is 2322', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-03 06:32:20', '2018-04-03 06:32:20'),
(595, 111, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:02:20 pm is 2322', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-03 06:32:22', '2018-04-03 06:32:22'),
(596, 111, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:02:20 pm is 2322', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-03 06:32:23', '2018-04-03 06:32:23'),
(597, 112, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:08 pm is 2322', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-03 07:22:08', '2018-04-03 07:22:08'),
(598, 112, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:08 pm is 2322', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-03 07:22:08', '2018-04-03 07:22:08'),
(599, 112, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:08 pm is 2322', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-03 07:22:09', '2018-04-03 07:22:09'),
(600, 112, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:08 pm is 2322', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-03 07:22:10', '2018-04-03 07:22:10'),
(601, 113, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:23 pm is 22', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-03 07:22:23', '2018-04-03 07:22:23'),
(602, 113, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:23 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-03 07:22:23', '2018-04-03 07:22:23'),
(603, 113, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:23 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-03 07:22:24', '2018-04-03 07:22:24'),
(604, 113, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:23 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-03 07:22:25', '2018-04-03 07:22:25'),
(605, 114, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:29 pm is 22', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-03 07:22:29', '2018-04-03 07:22:29'),
(606, 114, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:29 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-03 07:22:29', '2018-04-03 07:22:29'),
(607, 114, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:29 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-03 07:22:30', '2018-04-03 07:22:30'),
(608, 114, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:29 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-03 07:22:31', '2018-04-03 07:22:31'),
(609, 115, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:38 pm is 22', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-03 07:22:38', '2018-04-03 07:22:38'),
(610, 115, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:38 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-03 07:22:38', '2018-04-03 07:22:38'),
(611, 115, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:38 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-03 07:22:41', '2018-04-03 07:22:41'),
(612, 115, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:52:38 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-03 07:22:42', '2018-04-03 07:22:42'),
(613, 116, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:56:31 pm is 22', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-03 07:26:31', '2018-04-03 07:26:31'),
(614, 116, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:56:31 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-03 07:26:32', '2018-04-03 07:26:32'),
(615, 116, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:56:31 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-03 07:26:33', '2018-04-03 07:26:33'),
(616, 116, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:56:31 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-03 07:26:35', '2018-04-03 07:26:35'),
(617, 117, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:57:41 pm is 22', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-03 07:27:41', '2018-04-03 07:27:41'),
(618, 117, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:57:41 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-03 07:27:41', '2018-04-03 07:27:41'),
(619, 117, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:57:41 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-03 07:27:42', '2018-04-03 07:27:42'),
(620, 117, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 12:57:41 pm is 22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-03 07:27:44', '2018-04-03 07:27:44'),
(621, 118, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:32 pm is 2212', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-03 07:30:32', '2018-04-03 07:30:32'),
(622, 118, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:32 pm is 2212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-03 07:30:32', '2018-04-03 07:30:32'),
(623, 118, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:32 pm is 2212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-03 07:30:33', '2018-04-03 07:30:33'),
(624, 118, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:32 pm is 2212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-03 07:30:35', '2018-04-03 07:30:35'),
(625, 119, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:56 pm is 2212', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-03 07:30:56', '2018-04-03 07:30:56'),
(626, 119, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:56 pm is 2212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-03 07:30:56', '2018-04-03 07:30:56');
INSERT INTO `notifications_queue` (`id`, `notification_id`, `user_id`, `mode`, `actual_message`, `sent_date_time`, `processed`, `received_read`, `read`, `mobile`, `email`, `status`, `fcm_token`, `created_at`, `updated_at`) VALUES
(627, 119, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:56 pm is 2212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-03 07:30:57', '2018-04-03 07:30:57'),
(628, 119, NULL, 1, 'Ceiling price for Kishan Trading Co., Bagrufor 03-04-2018 01:00:56 pm is 2212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-03 07:30:58', '2018-04-03 07:30:58'),
(629, 120, NULL, 1, 'Ceiling price for Kishanfor 04-04-2018 07:01:51 pm is 37', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-04 13:31:51', '2018-04-04 13:31:51'),
(630, 120, NULL, 1, 'Ceiling price for Kishanfor 04-04-2018 07:01:51 pm is 37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-04 13:31:51', '2018-04-04 13:31:51'),
(631, 120, NULL, 1, 'Ceiling price for Kishanfor 04-04-2018 07:01:51 pm is 37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '2018-04-04 13:31:52', '2018-04-04 13:31:52'),
(632, 120, NULL, 1, 'Ceiling price for Kishanfor 04-04-2018 07:01:51 pm is 37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-04 13:31:53', '2018-04-04 13:31:53'),
(633, 121, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 04-04-2018 07:33:24 pm is 21', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-04 14:03:24', '2018-04-04 14:03:24'),
(634, 121, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 04-04-2018 07:33:24 pm is 21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-04 14:03:24', '2018-04-04 14:03:24'),
(635, 121, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 04-04-2018 07:33:24 pm is 21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-04 14:03:25', '2018-04-04 14:03:25'),
(636, 122, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 04-04-2018 07:35:03 pm is 15', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-04 14:05:04', '2018-04-04 14:05:04'),
(637, 122, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 04-04-2018 07:35:03 pm is 15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-04 14:05:04', '2018-04-04 14:05:04'),
(638, 122, NULL, 1, 'Ceiling price for Aggarwal Daal Mile, Laxmangarhfor 04-04-2018 07:35:03 pm is 15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-04 14:05:04', '2018-04-04 14:05:04'),
(639, 123, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 04-04-2018 07:35:39 pm is 2', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-04 14:05:39', '2018-04-04 14:05:39'),
(640, 123, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 04-04-2018 07:35:39 pm is 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '2018-04-04 14:05:39', '2018-04-04 14:05:39'),
(641, 123, NULL, 1, 'Ceiling price for Aeran Oil & Flour Millfor 04-04-2018 07:35:39 pm is 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdfsdfsdfsdfsdf', '2018-04-04 14:05:39', '2018-04-04 14:05:39'),
(642, 124, 36, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:12 am is 61', NULL, NULL, NULL, 1, '9740355593', NULL, NULL, NULL, '2018-04-08 06:23:12', '2018-04-09 10:23:13'),
(643, 124, 37, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:12 am is 61', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-04-08 06:23:12', '2018-04-08 06:23:12'),
(644, 124, 38, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:12 am is 61', NULL, NULL, NULL, 1, '9740355593', NULL, NULL, NULL, '2018-04-08 06:23:12', '2018-04-09 15:15:40'),
(645, 124, 31, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:12 am is 61', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-08 06:23:12', '2018-04-08 06:23:12'),
(646, 124, 39, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:12 am is 61', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-08 06:23:12', '2018-04-08 06:23:12'),
(647, 125, 36, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:21 am is 36', NULL, NULL, NULL, 1, '9740355593', NULL, NULL, NULL, '2018-04-08 06:23:21', '2018-04-09 10:23:13'),
(648, 125, 37, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:21 am is 36', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-04-08 06:23:21', '2018-04-08 06:23:21'),
(649, 125, 38, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:21 am is 36', NULL, NULL, NULL, 1, '9740355593', NULL, NULL, NULL, '2018-04-08 06:23:22', '2018-04-09 15:15:40'),
(650, 125, 31, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:21 am is 36', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-08 06:23:22', '2018-04-08 06:23:22'),
(651, 125, 39, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:53:21 am is 36', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-08 06:23:22', '2018-04-08 06:23:22'),
(652, 126, 36, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:54:04 am is 51', NULL, NULL, NULL, 1, '9740355593', NULL, NULL, NULL, '2018-04-08 06:24:04', '2018-04-09 10:23:13'),
(653, 126, 37, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:54:04 am is 51', NULL, NULL, NULL, NULL, '1234567890', NULL, NULL, NULL, '2018-04-08 06:24:04', '2018-04-08 06:24:04'),
(654, 126, 38, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:54:04 am is 51', NULL, NULL, NULL, 1, '9740355593', NULL, NULL, NULL, '2018-04-08 06:24:04', '2018-04-09 15:15:40'),
(655, 126, 31, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:54:04 am is 51', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-08 06:24:04', '2018-04-08 06:24:04'),
(656, 126, 39, 1, 'Dear user Kishan you have successfully been registered with 08-04-2018 11:54:04 am is 51', NULL, NULL, NULL, NULL, '9740355593', NULL, NULL, NULL, '2018-04-08 06:24:04', '2018-04-08 06:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `orderfordetail`
--

CREATE TABLE `orderfordetail` (
  `id` int(11) NOT NULL,
  `orderid` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_type` varchar(10) NOT NULL,
  `order_number` int(11) DEFAULT NULL,
  `ref_num` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_quantity` float NOT NULL,
  `order_price` float DEFAULT NULL,
  `order_other_rate` float DEFAULT NULL,
  `order_for_price` float DEFAULT NULL,
  `order_total_price` float DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `counter_price` double DEFAULT NULL,
  `offer_number` bigint(10) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_type`, `order_number`, `ref_num`, `user_id`, `mandi_id`, `destination_id`, `order_date`, `order_quantity`, `order_price`, `order_other_rate`, `order_for_price`, `order_total_price`, `status`, `counter_price`, `offer_number`, `approved_by`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Auction', 18100001, '123', 39, 3, 2, '2018-03-13 20:24:29', 100, 1375, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-13 20:24:29', '2018-03-13 14:54:52', 37, 37),
(2, 'Auction', 18100002, '45', 39, 3, 2, '2018-03-13 20:28:24', 200, 1300, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-13 20:28:24', '2018-03-13 15:00:18', 37, NULL),
(3, 'Auction', 18100003, '5', 39, 2, 1, '2018-03-13 20:28:45', 100, 1275, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-13 20:28:45', '2018-03-13 15:00:18', 37, NULL),
(4, 'Auction', 18100004, '5', 39, 3, 2, '2018-03-13 20:29:00', 200, 1250, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-13 20:29:00', '2018-03-13 15:00:18', 37, NULL),
(5, 'Auction', 18100005, '5', 39, 3, 2, '2018-03-13 20:29:19', 100, 1275, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-13 20:29:19', '2018-03-13 15:00:18', 37, NULL),
(6, 'Auction', 18100006, '5', 39, 3, 2, '2018-03-13 20:29:51', 100, 1275, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-13 20:29:51', '2018-03-13 15:00:18', 37, NULL),
(7, 'Auction', 18100007, '5', 39, 3, 2, '2018-03-13 20:30:47', 200, 1280, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-13 20:30:47', '2018-03-13 15:01:31', 37, NULL),
(8, 'Auction', 18100008, '5', 39, 3, 2, '2018-03-13 20:31:07', 50, 1310, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-13 20:31:07', '2018-03-13 15:01:31', 37, NULL),
(9, 'FOR', 18200001, 'Zas', 39, 1, 1, '2018-03-14 13:21:56', 10, NULL, NULL, 1550, NULL, 2, NULL, 18000001, NULL, '2018-03-14 13:21:56', '2018-03-14 11:56:30', 37, NULL),
(10, 'Auction', 18100009, 'Abhi Testing1', 39, 1, 1, '2018-03-14 11:44:05', 10, 10, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-14 11:44:05', '2018-03-14 11:46:25', 31, 31),
(11, 'Auction', 18100010, 'Abhi Testing2', 39, 3, 2, '2018-03-14 11:44:29', 20, 10, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-14 11:44:29', '2018-03-14 11:49:21', 31, 31),
(12, 'Auction', 18100011, 'Abhi Testing 3', 39, 3, 2, '2018-03-14 11:48:04', 11, 11, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-14 11:48:04', '2018-03-15 14:25:39', 31, 31),
(13, 'FOR', 18200003, 'Abhi Testing 5', 39, 2, 1, '2018-03-14 11:52:33', 100, NULL, NULL, 100, NULL, 2, 90, 18000002, NULL, '2018-03-14 11:52:33', '2018-03-14 15:49:30', 39, 38),
(14, 'Auction', 18100012, 'order_test_1', 39, 2, 1, '2018-03-14 12:01:01', 190, 150, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-14 12:01:01', '2018-03-16 15:47:02', 39, 39),
(15, 'Auction', 18100013, 'Abhi testing 6', 39, 1, 1, '2018-03-14 17:44:39', 18, 19, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-14 17:44:39', '2018-03-16 15:47:08', 36, 36),
(16, 'FOR', NULL, 'offer_test_1', 39, 3, 2, '2018-03-14 12:22:42', 120, NULL, NULL, 400, NULL, 1, NULL, 18000003, NULL, '2018-03-14 12:22:42', '2018-03-14 18:23:03', 31, 31),
(17, 'Auction', 18100014, '433333', 39, 1, 1, '2018-03-14 18:22:55', 10, 10, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-14 18:22:55', '2018-03-24 15:49:45', 31, 31),
(18, 'Auction', 18100015, 'Luck Test 1', 39, 1, 1, '2018-03-14 18:45:24', 10, 10, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-14 18:45:24', '2018-03-24 16:37:05', 31, 31),
(19, 'Auction', 18100016, 'Bhoopal Test', 39, 1, 1, '2018-03-14 13:24:46', 10, 1450, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-14 13:24:46', '2018-03-24 16:37:03', 31, 31),
(20, 'Auction', 18100017, 'Bhoopal Test 1', 39, 1, 1, '2018-03-14 13:32:46', 10, 1450, 5, 1455, 14550, 2, NULL, NULL, NULL, '2018-03-14 13:32:46', '2018-03-15 14:25:42', 31, 31),
(21, 'Auction', 18100018, 'Bhoopal Test2', 39, 1, 1, '2018-03-14 13:38:27', 10, 1450, 144.21, 1594.21, 15942, 2, NULL, NULL, NULL, '2018-03-14 13:38:27', '2018-03-24 16:36:58', 31, 38),
(22, 'Auction', 18100019, 'genune', 39, 1, 1, '2018-03-14 13:51:24', 10, 1450, 144.21, 1594.21, 15942, 0, NULL, NULL, NULL, '2018-03-14 13:51:24', '2018-03-14 14:11:53', 31, 31),
(23, 'FOR', 18200003, 'Bhoopal Test 3', 40, 2, 1, '2018-03-14 14:50:44', 10, 1408.01, NULL, 1594.21, NULL, 2, 1550, 18000004, NULL, '2018-03-14 14:50:44', '2018-03-15 14:33:19', 31, 38),
(24, 'FOR', NULL, 'Bhoopal Test 4', 40, 1, 1, '2018-03-14 15:34:00', 10, 1384.27, NULL, 1594.21, NULL, 3, 1525, 18000005, NULL, '2018-03-14 15:34:00', '2018-03-15 14:33:29', 31, 38),
(25, 'FOR', NULL, 'Bhoopal Test 5', 39, 1, 1, '2018-03-14 15:42:46', 10, 1450, NULL, 1594.21, NULL, 3, NULL, 18000006, NULL, '2018-03-14 15:42:46', '2018-03-15 05:16:39', 31, 31),
(26, 'FOR', 18200002, 'Bhoopal Test6', 39, 2, 1, '2018-03-14 15:45:36', 10, 1450, NULL, 100, NULL, 2, 1594.21, 18000007, NULL, '2018-03-14 15:45:36', '2018-03-14 15:49:27', 39, 38),
(27, 'Auction', 18200003, 'Abhi Test1', 39, 2, 1, '2018-03-15 13:20:57', 100, 9, 63.44, 72.44, 7244.48, 2, NULL, NULL, NULL, '2018-03-15 13:20:57', '2018-03-15 08:21:51', 31, 31),
(28, 'Auction', 18200004, 'Abhi Test 2', 39, 3, 2, '2018-03-15 13:23:09', 200, 9, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-03-15 13:23:09', NULL, 31, NULL),
(29, 'Auction', 18200005, 'Abhi Test 3', 39, 3, 2, '2018-03-15 07:56:16', 200, 9, 63.19, 72.19, 14439, 0, NULL, NULL, NULL, '2018-03-15 07:56:16', '2018-03-15 07:56:16', 31, 31),
(30, 'FOR', 18200001, 'Abho', 39, 2, 1, '2018-03-15 14:06:13', 100, NULL, NULL, 1594.21, NULL, 2, NULL, 18000008, NULL, '2018-03-15 14:06:13', '2018-03-18 11:39:20', 31, 38),
(31, 'Auction', 18200006, 'qa', 40, 1, 1, '2018-03-15 12:59:21', 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-03-15 12:59:21', '2018-03-15 12:59:21', 40, 40),
(32, 'Auction', 18200007, 'qa', 40, 1, 1, '2018-03-15 12:59:29', 0, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-03-15 12:59:29', '2018-03-15 12:59:29', 40, 40),
(33, 'Auction', 18200008, 'qa', 40, 1, 1, '2018-03-15 12:59:36', 0, 10, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-03-15 12:59:36', '2018-03-15 12:59:36', 40, 40),
(34, 'Auction', 18200009, 'qa', 40, 1, 1, '2018-03-15 12:59:38', 0, 10, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-03-15 12:59:38', '2018-03-15 12:59:38', 40, 40),
(35, 'Auction', 18200010, 'qa', 40, 1, 1, '2018-03-15 12:59:46', 100, 1325, 133.09, 1458.09, 145809, 0, NULL, NULL, NULL, '2018-03-15 12:59:46', '2018-03-15 12:59:46', 40, 40),
(36, 'Auction', 18200011, '12', 39, 2, 1, '2018-03-15 13:28:46', 100, 1330, 133.36, 1463.36, 146336, 2, NULL, NULL, NULL, '2018-03-15 13:28:46', '2018-03-24 16:33:07', 39, 39),
(37, 'Auction', 18200012, '23', 39, 3, 2, '2018-03-15 13:29:33', 100, 1415, 137.86, 1552.86, 155286, 2, NULL, NULL, NULL, '2018-03-15 13:29:33', '2018-03-17 13:13:01', 39, 38),
(38, 'FOR', NULL, '1091', 39, 2, 1, '2018-03-15 14:46:07', -100, -153.83, NULL, -100, NULL, 0, -200, 18000009, NULL, '2018-03-15 14:46:07', '2018-03-15 14:58:14', 39, 38),
(39, 'FOR', NULL, '1091', 39, 3, 2, '2018-03-15 14:47:52', 101, 1270.78, NULL, 1401, NULL, 3, NULL, 18000010, NULL, '2018-03-15 14:47:52', '2018-03-15 14:57:48', 39, 39),
(40, 'FOR', NULL, '1212', 39, 3, 2, '2018-03-15 15:02:45', 1212, 1365.24, NULL, 1212, NULL, 0, 1500, 18000011, NULL, '2018-03-15 15:02:45', '2018-03-15 15:04:06', 39, 38),
(41, 'FOR', NULL, 'Qak', 40, 1, 1, '2018-03-16 11:33:18', 1800, NULL, NULL, 1453, NULL, 0, NULL, 18000012, NULL, '2018-03-16 11:33:18', NULL, 31, NULL),
(42, 'Auction', 18200013, '24f', 39, 3, 2, '2018-03-16 19:22:25', 10, 150, 75.41, 225.41, 2254.07, 2, NULL, NULL, NULL, '2018-03-16 19:22:25', '2018-03-16 15:57:08', 31, NULL),
(43, 'Auction', 18200014, '5656', 39, 2, 1, '2018-03-16 15:54:15', 10, 1450, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-16 15:54:15', '2018-03-17 13:13:11', 31, 38),
(44, 'Auction', 18200015, '11111', 39, 3, 2, '2018-03-16 15:55:26', 10, 1450, -1445, 5, 50, 0, NULL, NULL, NULL, '2018-03-16 15:55:26', '2018-03-20 16:02:21', 31, 31),
(45, 'Auction', 18200016, 'TESTREFERENCE', 39, 2, 1, '2018-03-19 12:51:24', 10, 876, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-19 12:51:24', '2018-03-19 13:26:47', 39, 39),
(46, 'FOR', 18200002, 'TESTRefer', 39, 2, 1, '2018-03-19 13:28:43', 12, NULL, NULL, 456, NULL, 2, 3444, 18000013, NULL, '2018-03-19 13:28:43', '2018-03-19 13:31:27', 39, 38),
(47, 'FOR', 18200004, 'sdfdgdf', 39, 2, 1, '2018-03-19 13:33:37', 345, NULL, NULL, 57898, NULL, 2, 3489, 18000014, NULL, '2018-03-19 13:33:37', '2018-03-24 16:33:00', 39, 39),
(48, 'Auction', 18200017, 'Testdfghj', 40, 1, 1, '2018-03-19 13:49:21', 122, 456876, 24242.6, 481119, 58696500, 2, NULL, NULL, NULL, '2018-03-19 13:49:21', '2018-03-24 16:33:04', 31, 31),
(49, 'Auction', 18200018, 'sdfghj', 39, 2, 1, '2018-03-19 14:07:05', 67, 98765, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-03-19 14:07:05', '2018-03-19 14:07:05', 39, 39),
(50, 'FOR', 18200003, '', 39, 1, 1, '2018-03-19 14:08:11', 20, 154.63, NULL, 25, NULL, 2, 222, 18000015, NULL, '2018-03-19 14:08:11', '2018-03-24 16:32:48', 39, 39),
(51, 'Auction', 18200019, 'ssdsdsd', 21, 2, 20011, '2018-03-20 15:55:53', 23, 2222, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-03-20 15:55:53', '2018-03-20 15:55:53', 31, 31),
(52, 'Auction', 18200020, 'ssdsdsd', 21, 2, 1, '2018-03-20 15:57:34', 23, 2222, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-03-20 15:57:34', '2018-03-20 15:57:34', 31, 31),
(53, 'Auction', 18200021, 'ssdsdsd', 39, 3, 2, '2018-03-20 15:59:29', 10, 4444, -4439, 5, 50, 2, NULL, NULL, NULL, '2018-03-20 15:59:29', '2018-04-04 18:49:34', 31, 31),
(54, 'Auction', 18200022, 'ssdsdsd', 39, 3, 2, '2018-03-22 12:09:17', 15, 1450, -1446.67, 3.33, 50, 0, NULL, NULL, NULL, '2018-03-20 16:03:51', '2018-03-22 12:09:17', 31, 31),
(55, 'Auction', 18100023, 'ssdsdsd', 39, 3, 2, '2018-03-20 16:17:15', 101, 1450, -1449.5, 0.5, 50, 0, NULL, NULL, NULL, '2018-03-20 16:17:15', '2018-03-20 16:17:15', 31, 31),
(56, 'Auction', 18200024, 'ssdsdsd', 39, 3, 2, '2018-03-20 16:18:43', 101, 1450, -1449.5, 0.5, 50, 0, NULL, NULL, NULL, '2018-03-20 16:18:43', '2018-03-20 16:18:43', 31, 31),
(57, 'FOR', NULL, '-', 39, 1, 1, '2018-03-21 18:56:05', 20, -32.47, NULL, 25, NULL, 0, NULL, 18000016, NULL, '2018-03-21 18:56:05', '2018-03-21 18:56:06', 38, 38),
(58, 'FOR', NULL, '-', 39, 1, 1, '2018-03-21 18:57:53', 20, -32.47, NULL, 25, NULL, 0, NULL, 18000017, NULL, '2018-03-21 18:57:53', '2018-03-21 18:57:53', 31, 31),
(59, 'Auction', 18100024, 'ssdsdsd', 39, 3, 1, '2018-03-22 12:02:46', 101, 1450, -1449.5, 0.5, 50, 2, NULL, NULL, NULL, '2018-03-22 12:02:46', '2018-03-24 16:36:55', 31, 31),
(60, 'FOR', 18200005, '', 0, 0, 0, '2018-03-22 14:59:40', 122, NULL, NULL, 0, NULL, 2, 111, 18000018, NULL, '2018-03-22 14:59:40', '2018-03-22 18:47:48', 31, 31),
(61, 'FOR', NULL, 'wewe', 40, 1, 1, '2018-03-22 16:43:20', 2333, 316578000, NULL, 23, NULL, 0, 333333333, 18000019, NULL, '2018-03-22 16:43:20', '2018-03-22 16:43:44', 31, 38),
(62, 'FOR', 18200006, '1212', 39, 2, 1, '2018-03-22 18:48:12', 12, NULL, NULL, 1212, NULL, 2, NULL, 18000020, NULL, '2018-03-22 18:48:12', '2018-03-22 19:05:27', 31, 38),
(63, 'FOR', NULL, '32324', 39, 3, 2, '2018-03-22 18:50:19', 23434, 154.63, NULL, 223, NULL, 0, 222, 18000021, NULL, '2018-03-22 18:50:19', '2018-03-22 19:22:04', 31, 38),
(64, 'FOR', NULL, '11221', 39, 3, 1, '2018-03-22 19:22:32', 22, NULL, NULL, 12, NULL, 0, NULL, 18000022, NULL, '2018-03-22 19:22:32', '2018-03-22 19:22:32', 31, 31),
(65, 'FOR', 18200005, '1212', 39, 3, 2, '2018-03-24 15:58:54', 122, 365.08, NULL, 222, NULL, 2, 444, 18000030, NULL, '2018-03-24 15:58:54', '2018-03-24 15:59:36', 31, 38),
(66, 'FOR', NULL, 'sdfs', 40, 1, 1, '2018-03-24 16:16:19', 23, -38.33, NULL, 23, NULL, 0, 21, 18000031, NULL, '2018-03-24 16:16:19', '2018-03-24 16:21:54', 31, 38),
(67, 'Auction', 18100010, 'dsda', 39, 3, 1, '2018-03-24 16:31:41', 232, 232, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-24 16:31:41', '2018-03-24 16:33:53', 31, 31),
(68, 'Auction', 18100011, 'wsss', 39, 3, 1, '2018-03-24 16:38:31', 12, 111, NULL, NULL, NULL, 2, NULL, NULL, NULL, '2018-03-24 16:38:31', '2018-04-04 18:56:40', 31, 31),
(69, 'FOR', NULL, 'ssfsf', 40, 1, 1, '2018-03-29 12:34:28', 224, 173.41, NULL, 242, NULL, 0, NULL, 18000032, NULL, '2018-03-29 12:34:28', '2018-03-29 12:34:29', 31, 31),
(70, 'FOR', NULL, 'sddsf', 39, 3, 2, '2018-03-29 12:34:47', 33, 4162.97, NULL, 4444, NULL, 0, NULL, 18000033, NULL, '2018-03-29 12:34:48', '2018-03-29 12:34:48', 31, 31),
(71, 'FOR', NULL, 'sdsds', 39, 3, 2, '2018-03-29 12:35:18', 23, 152.57, NULL, 222, NULL, 0, NULL, 18000034, NULL, '2018-03-29 12:35:18', '2018-03-29 12:35:19', 39, 39),
(72, 'Auction', 18100012, '111111', 39, 3, 2, '2018-03-29 15:28:16', 67, 98765, -98764.2, 0.75, 50, 0, NULL, NULL, NULL, '2018-03-29 15:28:16', '2018-03-29 15:28:16', 39, 39),
(73, 'FOR', NULL, 'fdgdfg', 40, 1, 1, '2018-03-30 15:59:51', 234, 3022.63, NULL, 3242, NULL, 0, NULL, 18000035, NULL, '2018-03-30 15:59:51', '2018-03-30 15:59:51', 31, 31),
(74, 'FOR', NULL, 'asdasd', 39, 2, 1, '2018-04-02 13:37:47', 23, NULL, NULL, 2323, NULL, 0, NULL, 18000036, NULL, '2018-04-02 13:37:47', '2018-04-02 13:37:48', 31, 31),
(75, 'FOR', NULL, 'sdfdsf', 39, 2, 1, '2018-04-03 11:39:11', 12, NULL, NULL, 233, NULL, 0, NULL, 18000037, NULL, '2018-04-03 11:39:11', '2018-04-03 11:39:11', 31, 31),
(76, 'Auction', 18100013, 'dfgdfg', 39, 3, 2, '2018-04-03 16:01:17', 45, 565, -563.89, 1.11, 50, 2, NULL, NULL, NULL, '2018-04-03 16:01:17', '2018-04-04 18:54:11', 31, 31),
(77, 'FOR', NULL, 'ffsfsd231', 40, 1, 1, '2018-04-04 18:02:25', 12, NULL, NULL, 34, NULL, 0, NULL, 18000038, NULL, '2018-04-04 18:02:25', '2018-04-04 18:02:25', 31, 31),
(78, 'FOR', 18200007, 'dsfsd', 39, 3, 2, '2018-04-04 18:19:23', 42233, -25.82, NULL, 34, NULL, 2, 32, 18000039, NULL, '2018-04-04 18:19:23', '2018-04-04 18:32:56', 31, 31),
(79, 'Auction', 18100014, 'fwerwe345', 39, 3, 2, '2018-04-04 18:56:04', 234, 22, -21.79, 0.21, 50, 2, NULL, NULL, NULL, '2018-04-04 18:56:04', '2018-04-04 18:59:09', 31, 31),
(80, 'Auction', 18100015, 'qqqqq', 39, 3, 2, '2018-04-04 18:59:47', 12, 132, -127.83, 4.17, 50, 2, NULL, NULL, NULL, '2018-04-04 18:59:47', '2018-04-04 19:00:16', 31, 31),
(81, 'FOR', 18200008, 'test123', 39, 3, 2, '2018-04-04 20:41:24', 123, -24.31, NULL, 234, NULL, 2, 34, 18000040, NULL, '2018-04-04 20:41:24', '2018-04-04 20:43:08', 39, 39),
(82, 'Auction', 18100016, 'teeest234', 39, 3, 2, '2018-04-04 20:55:14', 100, 1200, -4433.59, 0.41, 50, 1, NULL, NULL, NULL, '2018-04-04 20:55:14', '2018-04-04 20:58:34', 39, 39),
(83, 'Auction', 18100017, 'cs', 39, 3, 2, '2018-04-05 16:26:41', 100, 1200, -1449.85, 2218.32, 50, 0, NULL, NULL, NULL, '2018-04-05 16:26:41', '2018-04-05 16:26:41', 39, 39),
(84, 'FOR', NULL, 'ddf', 39, 3, 1, '2018-04-05 17:42:21', 343, NULL, NULL, 2218.32, NULL, 0, NULL, 18000041, NULL, '2018-04-05 17:42:21', '2018-04-05 17:42:21', 39, 39),
(85, 'FOR', NULL, 'sdsd', 39, 3, 2, '2018-04-05 17:42:49', 343, 2000, NULL, 2218.32, NULL, 0, NULL, 18000042, NULL, '2018-04-05 17:42:49', '2018-04-05 17:42:49', 39, 39);

-- --------------------------------------------------------

--
-- Table structure for table `order_sequences`
--

CREATE TABLE `order_sequences` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_sequence` bigint(20) DEFAULT NULL,
  `next_order_sequence` bigint(20) DEFAULT NULL,
  `offer_sequence` bigint(20) DEFAULT NULL,
  `next_offer_sequence` bigint(20) DEFAULT NULL,
  `offerorder_sequence` bigint(20) DEFAULT NULL,
  `next_offerorder_sequence` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_sequences`
--

INSERT INTO `order_sequences` (`id`, `order_sequence`, `next_order_sequence`, `offer_sequence`, `next_offer_sequence`, `offerorder_sequence`, `next_offerorder_sequence`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 17100001, 18100001, 18000001, 18000001, 18200001, 18200001, '2018-03-29 15:28:43', '2018-03-29 15:32:39', '2018-03-29 21:02:39'),
(3, 16100001, 18100001, 18000001, 18000001, 18200001, 18200001, '2018-03-29 15:32:39', '2018-03-29 15:33:06', '2018-03-29 21:03:06'),
(4, 18100016, 18100017, 18000041, 18000042, 18200007, 18200008, '2018-03-29 15:33:06', '2018-04-05 12:12:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `created_at`, `updated_at`, `token`) VALUES
(3, 'bgopsen@ubmail.com', '2018-03-12 07:27:50', '2018-03-12 12:57:50', NULL),
(4, '9740355593', '2018-03-28 10:24:22', '2018-03-28 15:56:04', NULL),
(5, 'bhoopal.t@inputzero.com', '2018-04-09 14:03:41', '2018-04-09 19:33:41', 'jIA87YiqOplY1NHmx1ux');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(45) NOT NULL,
  `active` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Admin', '1', '2018-04-09 18:56:51', NULL, NULL, NULL),
(2, 'Pukka Arthiya', '1', '2018-04-09 18:56:51', NULL, NULL, NULL),
(3, 'Facilitator', '1', '2018-04-09 18:56:51', NULL, NULL, NULL),
(4, 'UBP', '1', '2018-04-09 18:56:51', NULL, NULL, NULL),
(5, 'assign', '1', '2018-04-09 18:59:46', NULL, 36, 36);

-- --------------------------------------------------------

--
-- Table structure for table `role_alias`
--

CREATE TABLE `role_alias` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_parent` tinyint(1) DEFAULT NULL,
  `middle_ware` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `upated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_mapping`
--

CREATE TABLE `role_mapping` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `alias_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `device_type` enum('M','W') NOT NULL DEFAULT 'W'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_mappings`
--

CREATE TABLE `role_mappings` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `device_type` enum('M','W') NOT NULL DEFAULT 'W',
  `parent_menu` varchar(100) DEFAULT NULL,
  `links` varchar(500) DEFAULT NULL,
  `views` varchar(100) DEFAULT NULL,
  `middleware` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_mappings`
--

INSERT INTO `role_mappings` (`id`, `role_id`, `menu`, `created_at`, `updated_at`, `created_by`, `updated_by`, `device_type`, `parent_menu`, `links`, `views`, `middleware`, `is_active`) VALUES
(1, 2, 'View Ceiling', '2018-03-16 04:25:20', '2018-03-16 09:49:35', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(2, 3, 'Arrival Data', '2018-03-16 04:41:13', '2018-03-16 09:50:23', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(3, 2, 'Manage Order', '2018-03-16 04:50:06', '2018-03-16 09:49:59', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(4, 3, 'ceiling-price-web.ts', '2018-03-16 09:17:33', '2018-03-19 06:49:50', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(5, 1, 'Arrival Data', '2018-03-16 09:41:19', '2018-04-09 11:57:41', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(6, 1, 'Mandi User Mapping', '2018-03-16 09:41:41', '2018-03-16 09:41:41', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(7, 1, 'User Master', '2018-03-16 09:42:41', '2018-03-16 09:42:41', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(8, 1, 'Agmark Master', '2018-03-16 09:43:26', '2018-03-16 09:43:26', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(9, 1, 'Locations Master', '2018-03-16 09:45:39', '2018-03-16 09:45:39', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(10, 1, 'Mandi Destination Master', '2018-03-16 09:45:53', '2018-03-16 09:45:53', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(11, 1, 'FOR Line Items', '2018-03-16 09:46:14', '2018-03-16 09:46:14', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(12, 1, 'FOR Freight', '2018-03-16 09:46:30', '2018-03-16 09:46:30', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(13, 1, 'Destination Master', '2018-03-16 09:47:19', '2018-03-16 09:47:19', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(14, 1, 'States Master', '2018-03-16 09:47:49', '2018-03-16 09:47:49', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(15, 1, 'Roles Master', '2018-03-16 09:48:02', '2018-03-16 09:48:02', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(16, 1, 'Mandi Master', '2018-03-16 09:48:16', '2018-03-16 09:48:16', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(17, 2, 'Manage Offer', '2018-03-16 09:50:46', '2018-03-16 09:50:46', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(18, 4, 'View Ceiling', '2018-03-16 09:52:55', '2018-03-16 09:52:55', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(19, 4, 'Agmarknet Upload', '2018-03-16 09:54:06', '2018-03-16 09:54:06', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(20, 4, 'Manage Offer', '2018-03-16 09:54:28', '2018-03-16 09:55:29', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(21, 4, 'Manage Order', '2018-03-16 09:54:50', '2018-03-16 09:54:50', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(22, 3, 'View Ceiling', '2018-03-16 09:56:58', '2018-03-23 12:10:54', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(23, 3, 'Manage Order', '2018-03-16 09:57:10', '2018-03-16 09:57:10', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(24, 3, 'Manage Offer', '2018-03-16 09:57:21', '2018-03-16 09:57:21', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(25, 3, 'offer-approver-view.ts', '2018-03-16 10:31:41', '2018-03-19 10:41:47', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 0),
(26, 2, 'offer-creation.ts', '2018-03-16 10:32:03', '2018-03-19 07:10:49', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(27, 3, 'home.ts', '2018-03-16 10:32:20', '2018-03-19 07:11:02', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(28, 3, 'order-creation.ts', '2018-03-16 10:34:09', '2018-03-19 07:11:08', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(29, 3, 'orders-dashboard.ts', '2018-03-16 10:34:22', '2018-03-19 07:11:21', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(30, 3, 'counter-offer-creator-view.ts', '2018-03-16 10:34:50', '2018-03-19 07:12:26', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(31, 2, 'counter-offer-approver-view.ts', '2018-03-16 10:36:28', '2018-03-19 07:12:39', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(32, 4, 'ceiling-price.ts', '2018-03-16 10:37:34', '2018-03-19 07:12:47', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(33, 4, 'orders-dashboard-view-two.ts', '2018-03-16 10:37:56', '2018-03-19 07:12:54', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(34, 4, 'offer-approver-view.ts', '2018-03-16 10:38:09', '2018-03-19 07:13:02', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(35, 4, 'counter-offer-creator-view.ts', '2018-03-16 10:38:27', '2018-03-19 07:13:15', NULL, NULL, 'M', NULL, NULL, NULL, NULL, 1),
(36, 1, 'Competitors Master', '2018-03-19 10:43:15', '2018-03-19 10:43:15', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(37, 1, 'View Ceiling', '2018-04-09 12:19:23', '2018-04-09 12:19:23', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1),
(38, 1, 'Role Manager', '2018-04-09 12:19:33', '2018-04-09 12:19:33', NULL, NULL, 'W', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `statelocationmapping`
--

CREATE TABLE `statelocationmapping` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `active` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `sort_order` varchar(100) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_by` text NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `sort_order`, `short_name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Rajasthan', '23', 'RJ1', '1', '', NULL, '2018-03-26 11:21:45', '2018-04-07 12:05:04'),
(2, 'Haryana', '2', 'HR', '1', '', NULL, '2018-03-26 11:21:45', NULL),
(3, 'Delhi', '3', 'DL', '1', '', NULL, '2018-03-26 11:21:45', NULL),
(4, 'sdfgh', '45678', 'sdfghj', '1', '', NULL, '2018-03-26 11:21:45', NULL),
(5, 'sdfghjk', '00000', 'sdftghujk', '1', '', NULL, '2018-03-26 11:21:45', NULL),
(6, 'asd', '11', '2asd', '1', '36', NULL, '2018-04-06 14:04:30', '2018-04-07 15:47:42'),
(7, 'aasd', '1', 'asd', '1', '36', NULL, '2018-04-06 14:05:19', '2018-04-06 19:35:19'),
(8, 'Rajasthan1', '5', 'RJN', '1', '36', NULL, '2018-04-06 14:24:06', '2018-04-06 19:54:06'),
(9, 'asd212', '12', 'asda', '1', '', NULL, '2018-04-07 06:30:39', '2018-04-07 12:00:39'),
(10, 'asdas', '6', 'sdf', '1', '', NULL, '2018-04-07 10:29:29', '2018-04-07 15:59:29'),
(11, 'checked', '31', 'check button', '1', '36', 36, '2018-04-09 13:37:29', '2018-04-09 19:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `usermandimapping`
--

CREATE TABLE `usermandimapping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mandi_id` int(11) NOT NULL,
  `active` int(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermandimapping`
--

INSERT INTO `usermandimapping` (`id`, `user_id`, `mandi_id`, `active`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 36, 1, 1, '2018-04-09 17:12:04', '2018-04-09 17:15:14', '36', '36'),
(2, 38, 2, 0, '2018-04-09 17:15:21', '2018-04-09 17:15:26', '36', '36');

-- --------------------------------------------------------

--
-- Table structure for table `userrolemapping`
--

CREATE TABLE `userrolemapping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `remember_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_basic`
--

CREATE TABLE `users_basic` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile_1` varchar(45) NOT NULL,
  `mobile_2` varchar(45) NOT NULL,
  `address_1` varchar(45) NOT NULL,
  `address_2` varchar(45) NOT NULL,
  `pincode` varchar(45) NOT NULL,
  `fcm_token` varchar(900) DEFAULT NULL,
  `gstin` varchar(45) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `email_1` varchar(45) NOT NULL,
  `email_2` varchar(45) NOT NULL,
  `active` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `remember_token` varchar(200) NOT NULL,
  `roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_basic`
--

INSERT INTO `users_basic` (`id`, `user_id`, `password`, `mobile_1`, `mobile_2`, `address_1`, `address_2`, `pincode`, `fcm_token`, `gstin`, `roles_id`, `email_1`, `email_2`, `active`, `created_at`, `updated_at`, `created_by`, `updated_by`, `remember_token`, `roles`) VALUES
(31, 'UAT01', '$2y$10$8i1VgQMmmEU3H0DfbofKLeA2aqpBDRVCRIf9NeM9v9LJDnhV1amCG', '9740355593', '9108791326', 'Bangalore', 'Bangalore1', '229010', 'sdfsdfsdfsdfsdfsdf', '1234', 3, 'sharmaabhijeet79@gmail.com', 'sharmaabhijeet79@gmail.com', '1', '0000-00-00 00:00:00', '2018-04-09 12:07:15', 0, 0, 'IgEwvJBur2XsoQARuQlvOR8TOPnI3Rv6rPwZvuwBdAE0Pgol1lM2h1t5Qrth', ''),
(36, 'bgopsen', '$2y$10$1zFbPuLfikRrmWh4eB2hGOiWvXcFMpBiKM9MjiHB5amrx8EEO.ZTa', '9740355593', '9900633600', 'Blore', 'Blore', '560062', 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '12345', 1, 'basawareddy@gmail.com', 'bgopsen@ubmail.com', '1', '0000-00-00 00:00:00', '2018-04-09 19:19:56', 0, 0, 'DXTm1miBKrFpvHH2Ib2BjtbD3os67N880iEax8XzycLqTQliLjCfaSgJMPbs', ''),
(37, 'zakir', '$2y$10$RoD3ALb9MCIfi3eS4f1FNO8Bjc37OBsx5B4kconY9S9bFoqlvLECi', '1234567890', '0987654321', 'UB IT office', 'UB IT office', '560001', 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '12jhkkj', 1, 'zakirhusen@ubmail.com', 'zakirhusen@ubmail.com', '1', '0000-00-00 00:00:00', '2018-04-06 18:25:08', 0, 0, 'ForOCMl2EyXb5BrJkVI80aCfB1qMzOhvNOsdpU1MwqAqlS80rpZOZ8gDR8wf', ''),
(38, 'bhoopal', '$2y$10$13xK/N70b0EZBcIOmcwqiuPRs4d.sQpGXQ7koHIzWZKKSxklY1NkS', '9740355593', '7760141133', 'UB IT office', 'UB IT office', '560001', 'cggw2RsWGFs:APA91bFdxrrlnV9Pj679gRf8ZatdoGzVGTY4_oETDo-xA8DcOPj6YnVFxWlMam9as7FZE0Q79OhtTUp1-5neFDjf4uVitADrQnQqFvwNVJvKyG636aoOrtJXf0QyXRyWcLbcCmFPnMZd', '123', 4, 'sreenivasan.m@inputzero.com', 'zakirhusen@ubmail.com', '1', '0000-00-00 00:00:00', '2018-04-09 20:49:11', 0, 0, 'KFmlheLdCStZHOtqkiTv5x9rnrzXDLGqgaLyLJPw6OjVQkg3P95uDIfQ6sSs', ''),
(39, 'SP2', '$2y$10$nL3tVc4AYdzCKfXy2uNOHOid5qCZzBymIYd9pAlTS62jgAYk54EAm', '9740355593', '1248764573', 'Outer Ring', 'Bangalore', '767483', 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '12345', 2, 'sweta.pillai@inputzero.com', 'abc@123.com', '1', '0000-00-00 00:00:00', '2018-04-06 18:58:58', 0, 0, 'gLcILV67RKizmie9SBef8CrnNDVZbtD0hecJXCsCDjuAgRh3t5swGnAOsxsg', ''),
(40, 'PA', '$2y$10$4FzRpSY2naUm0Zu1IpFI2.FOy34JbR0DGF0AB6NYHRlJB3tfn3FSG', '9740355593', '1234567890', '1234567890', '1234567890', '123456', 'fSknDuABzeI:APA91bG4Zof16ZOazKbs2eT1rf2i0FsovEobu2lRCVCZJnS1G_8rTswWzJLuJ-4QSnUXPYqfBpEoZXWuiXL3BjEJlKqUgMph3_CneM_cP8Xu1Au56C-sKOBkjTzFTUbUiSiM9fdnE0lM', '1234567890', 2, 'zakirhushen@gmail.com', 'zakirhushen@gmail.com', 'active', '0000-00-00 00:00:00', '2018-03-15 13:24:50', 0, 0, '7NpVZELj1wg7veieDJtPmHfV9xx3njgbOoNSpXOIrZs3vphwDvJT2XE4ovKA', ''),
(41, 'dsfgh', '$2y$10$JcAkLDCvv2hZyVx.8R3AbeGIMYd5.DlD7.1f4HgzY/rG6wQoTWYam', '9740355593', '1234567890', 'fgh', 'fgh', '123456', NULL, '', 2, 'fdfd2gv@hbv.com', 'fdfd2g@vhbv.com', '1', '2018-03-19 16:08:41', '2018-03-19 16:08:41', 0, 0, '', ''),
(42, 'SDFGH_23243', '$2y$10$BYtAdzanUEiXzkNGS.GKmeplIh.wpMxtiT1xEYSR1uF0P7MCn8QZa', '9740355593', '1234567890', 'sdfdsf', 'sdfdsf', '123456', NULL, '', 1, 'fdf@hmail.com', 'fdf@hmail.com', '1', '2018-03-19 16:12:58', '2018-03-19 16:12:58', 0, 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agmarknet`
--
ALTER TABLE `agmarknet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agmark_master`
--
ALTER TABLE `agmark_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitors`
--
ALTER TABLE `competitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fortablemaster`
--
ALTER TABLE `fortablemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `for_freight`
--
ALTER TABLE `for_freight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `for_line_items`
--
ALTER TABLE `for_line_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mandidestinationmapping`
--
ALTER TABLE `mandidestinationmapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mandilocationmapping`
--
ALTER TABLE `mandilocationmapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mandis`
--
ALTER TABLE `mandis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mandi_ceiling_price_daily`
--
ALTER TABLE `mandi_ceiling_price_daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mandi_ceiling_price_daily_history`
--
ALTER TABLE `mandi_ceiling_price_daily_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mandi_daily_price`
--
ALTER TABLE `mandi_daily_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mandi_daily_price_history`
--
ALTER TABLE `mandi_daily_price_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificationevent`
--
ALTER TABLE `notificationevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_queue`
--
ALTER TABLE `notifications_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderfordetail`
--
ALTER TABLE `orderfordetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_sequences`
--
ALTER TABLE `order_sequences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_alias`
--
ALTER TABLE `role_alias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_mapping`
--
ALTER TABLE `role_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_mappings`
--
ALTER TABLE `role_mappings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statelocationmapping`
--
ALTER TABLE `statelocationmapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermandimapping`
--
ALTER TABLE `usermandimapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrolemapping`
--
ALTER TABLE `userrolemapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_basic`
--
ALTER TABLE `users_basic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agmarknet`
--
ALTER TABLE `agmarknet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `agmark_master`
--
ALTER TABLE `agmark_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `competitors`
--
ALTER TABLE `competitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fortablemaster`
--
ALTER TABLE `fortablemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `for_freight`
--
ALTER TABLE `for_freight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `for_line_items`
--
ALTER TABLE `for_line_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mandidestinationmapping`
--
ALTER TABLE `mandidestinationmapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mandilocationmapping`
--
ALTER TABLE `mandilocationmapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mandis`
--
ALTER TABLE `mandis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mandi_ceiling_price_daily`
--
ALTER TABLE `mandi_ceiling_price_daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `mandi_ceiling_price_daily_history`
--
ALTER TABLE `mandi_ceiling_price_daily_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `mandi_daily_price`
--
ALTER TABLE `mandi_daily_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `mandi_daily_price_history`
--
ALTER TABLE `mandi_daily_price_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notificationevent`
--
ALTER TABLE `notificationevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `notifications_queue`
--
ALTER TABLE `notifications_queue`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657;
--
-- AUTO_INCREMENT for table `orderfordetail`
--
ALTER TABLE `orderfordetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `order_sequences`
--
ALTER TABLE `order_sequences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `role_alias`
--
ALTER TABLE `role_alias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_mapping`
--
ALTER TABLE `role_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_mappings`
--
ALTER TABLE `role_mappings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `statelocationmapping`
--
ALTER TABLE `statelocationmapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `usermandimapping`
--
ALTER TABLE `usermandimapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userrolemapping`
--
ALTER TABLE `userrolemapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_basic`
--
ALTER TABLE `users_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
