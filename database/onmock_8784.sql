-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 06:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onmock_8784`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `nid` int(5) NOT NULL,
  `note_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `tid` int(7) NOT NULL,
  `test_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_qust` int(4) NOT NULL,
  `pmarks` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(5) NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_qust`
--

CREATE TABLE `test_qust` (
  `qid` int(11) NOT NULL,
  `qust` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt1` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt2` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt3` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt4` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tid` int(7) NOT NULL,
  `lang` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qustimg` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `test_qust`
--
ALTER TABLE `test_qust`
  ADD PRIMARY KEY (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `nid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `tid` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_qust`
--
ALTER TABLE `test_qust`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
