-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 01:22 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--
CREATE DATABASE IF NOT EXISTS `student_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `student_db`;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_no` int(4) NOT NULL,
  `bank_name` varchar(40) NOT NULL,
  `place` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gr_list`
--

CREATE TABLE `gr_list` (
  `gr_no` int(10) NOT NULL,
  `sid` int(8) DEFAULT NULL,
  `admission_date` date NOT NULL,
  `school_leaving_date` date DEFAULT NULL,
  `std` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(8) NOT NULL,
  `name` varchar(70) NOT NULL,
  `mother_name` varchar(25) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `birthdate` date NOT NULL,
  `cast` varchar(10) NOT NULL,
  `bank_no` varchar(5) DEFAULT NULL,
  `bank_ac_no` varchar(20) DEFAULT NULL,
  `aadhar_no` varchar(12) DEFAULT NULL,
  `uid_no` varchar(18) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `rashan_no` varchar(15) DEFAULT NULL,
  `apl_bpl` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_no`);

--
-- Indexes for table `gr_list`
--
ALTER TABLE `gr_list`
  ADD PRIMARY KEY (`gr_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
