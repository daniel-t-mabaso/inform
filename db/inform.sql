-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 04:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inform`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `name` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

CREATE TABLE `communities` (
  `cid` int(11) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `com_interest`
--

CREATE TABLE `com_interest` (
  `email` varchar(100) NOT NULL,
  `interest_cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `filters`
--

CREATE TABLE `filters` (
  `filter_code` varchar(2) NOT NULL,
  `filter_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filters`
--

INSERT INTO `filters` (`filter_code`, `filter_name`) VALUES
('c', 'crime'),
('g', 'general'),
('k', 'kids'),
('p', 'pets'),
('s', 'goods and services'),
('t', 'traffic');

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `email` varchar(100) NOT NULL,
  `start` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `pid` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `media_url` varchar(300) NOT NULL,
  `type` enum('alert','event') NOT NULL,
  `cid` int(11) NOT NULL,
  `filter_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `base_cid` int(11) NOT NULL,
  `type` enum('com_mem','organ','local_admin','glob_admin') NOT NULL,
  `filters` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `com_interest`
--
ALTER TABLE `com_interest`
  ADD PRIMARY KEY (`email`,`interest_cid`);

--
-- Indexes for table `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`filter_code`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
