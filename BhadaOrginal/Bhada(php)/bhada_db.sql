-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2018 at 01:50 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhada_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adm_id` int(11) NOT NULL,
  `adm_username` varchar(50) NOT NULL,
  `adm_pass` varchar(50) NOT NULL,
  `adm_firstname` varchar(50) NOT NULL,
  `adm_middlename` varchar(50) DEFAULT NULL,
  `adm_lastname` varchar(50) NOT NULL,
  `adm_gender` enum('Male','Female') NOT NULL,
  `adm_address` varchar(50) NOT NULL,
  `adm_contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adm_id`, `adm_username`, `adm_pass`, `adm_firstname`, `adm_middlename`, `adm_lastname`, `adm_gender`, `adm_address`, `adm_contact`) VALUES
(1, 'admin', 'admin', 'Anil', 'Bapan', 'Shakya', 'Male', 'Swoyambhu', 9843711115);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bhada`
--

CREATE TABLE `tbl_bhada` (
  `bha_id` int(11) NOT NULL,
  `bha_km` double NOT NULL,
  `bha_fare` double NOT NULL,
  `adm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bhada`
--

INSERT INTO `tbl_bhada` (`bha_id`, `bha_km`, `bha_fare`, `adm_id`) VALUES
(1, 3, 152, 1),
(2, 5, 25, 1),
(4, 10, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complain`
--

CREATE TABLE `tbl_complain` (
  `com_id` int(11) NOT NULL,
  `com_title` varchar(50) NOT NULL,
  `com_description` varchar(2000) NOT NULL,
  `com_date` datetime NOT NULL,
  `com_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_complain`
--

INSERT INTO `tbl_complain` (`com_id`, `com_title`, `com_description`, `com_date`, `com_status`) VALUES
(1, 'Bus Fare', 'City Yatayat \r\n', '2018-01-04 02:00:00', '0'),
(6, 'asw', 'asd', '2018-01-05 04:11:14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traffic`
--

CREATE TABLE `tbl_traffic` (
  `tra_id` int(11) NOT NULL,
  `tra_username` varchar(50) NOT NULL,
  `tra_password` varchar(50) NOT NULL,
  `tra_firstname` varchar(50) NOT NULL,
  `tra_middlename` varchar(50) DEFAULT NULL,
  `tra_lastname` varchar(50) NOT NULL,
  `tra_gender` enum('Male','Female') NOT NULL,
  `tra_address` varchar(50) NOT NULL,
  `tra_contact` bigint(10) NOT NULL,
  `adm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_traffic`
--

INSERT INTO `tbl_traffic` (`tra_id`, `tra_username`, `tra_password`, `tra_firstname`, `tra_middlename`, `tra_lastname`, `tra_gender`, `tra_address`, `tra_contact`, `adm_id`) VALUES
(3, 'admin', 'admin', 'chiran', '', 'adminw', 'Female', 'a', 232, 1),
(7, 'admin', 'admin', 'ads', 'ads', 'admin', 'Male', 'sda', 3, 1),
(8, 'admin', 'ads', 'chiran', 'ad', 'ads', 'Male', 'das', 3, 1),
(9, 'admin', 'ads', 'chiran', 'ad', 'ads', 'Male', 'ads', 34345, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `tbl_bhada`
--
ALTER TABLE `tbl_bhada`
  ADD PRIMARY KEY (`bha_id`),
  ADD KEY `adm_id` (`adm_id`);

--
-- Indexes for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tbl_traffic`
--
ALTER TABLE `tbl_traffic`
  ADD PRIMARY KEY (`tra_id`),
  ADD KEY `fk_admId` (`adm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bhada`
--
ALTER TABLE `tbl_bhada`
  MODIFY `bha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_traffic`
--
ALTER TABLE `tbl_traffic`
  MODIFY `tra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bhada`
--
ALTER TABLE `tbl_bhada`
  ADD CONSTRAINT `tbl_bhada_ibfk_1` FOREIGN KEY (`adm_id`) REFERENCES `tbl_admin` (`adm_id`);

--
-- Constraints for table `tbl_traffic`
--
ALTER TABLE `tbl_traffic`
  ADD CONSTRAINT `fk_admId` FOREIGN KEY (`adm_id`) REFERENCES `tbl_admin` (`adm_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
