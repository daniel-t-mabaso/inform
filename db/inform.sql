-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 04:42 PM
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
  `code` int(11) NOT NULL,
  `suburb` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(255) NOT NULL,
  `province` varchar(100) NOT NULL
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
  `pid` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descrip` varchar(3000) NOT NULL,
  `start` varchar(20) NOT NULL,
  `end` varchar(20) NOT NULL,
  `media_url` varchar(300) NOT NULL,
  `type` enum('alert','event') NOT NULL,
  `template` enum('-','crimeOccurrence','trafficIncident','recommendations','lost','sales','general') NOT NULL,
  `cid` int(11) NOT NULL,
  `filter_code` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `title`, `descrip`, `start`, `end`, `media_url`, `type`, `template`, `cid`, `filter_code`, `user_email`) VALUES
('1567162525thami.mlotshwa@gmail.com', 'Secret Life of Pets', 'WHATEVER', '2020-04-01T14:00', '2020-04-01T15:00', '-', 'event', '-', 0, '-cps', 'thami.mlotshwa@gmail.com'),
('1567162561thami.mlotshwa@gmail.com', 'Secret Life of Pets', 'WHATEVER', '2020-04-01T14:00', '2020-04-01T15:00', '-', 'event', '-', 0, '-cps', 'thami.mlotshwa@gmail.com'),
('1567162648thami.mlotshwa@gmail.com', 'BWbda', 'dasdasd', '2010-05-05T05:05', '2010-06-06T06:06', '-', 'event', '-', 0, '-kpsg', 'thami.mlotshwa@gmail.com'),
('1567162695thami.mlotshwa@gmail.com', 'New Born', 'Raise it up ', '2010-04-01T01:01', '2010-04-01T14:02', 'assetsmediaimages021_375.jpg', 'event', '-', 0, '-tk', 'thami.mlotshwa@gmail.com'),
('1567162804thami.mlotshwa@gmail.com', 'New Born', 'Raise it up ', '2010-04-01T01:01', '2010-04-01T14:02', 'assets\\media\\images021_375.jpg', 'event', '-', 0, '-tk', 'thami.mlotshwa@gmail.com'),
('1567162915thami.mlotshwa@gmail.com', 'New Born', 'Raise it up ', '2010-04-01T01:01', '2010-04-01T14:02', 'assets\\media\\images\\021_375.jpg', 'event', '-', 0, '-tk', 'thami.mlotshwa@gmail.com'),
('1567164404thami.mlotshwa@gmail.com', 'Kids Self-Defence Classes', 'Uhhh', '2019-08-30T13:26', '2019-09-03T00:00', 'assets\\media\\images\\SamJackBackground.jpg', 'event', '-', 0, '-ck', 'thami.mlotshwa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `base_cid` int(11) NOT NULL,
  `type` enum('com_mem','organ','unveri_organ','local_admin','glob_admin') NOT NULL,
  `filters` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `media_url` varchar(150) NOT NULL
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
  ADD PRIMARY KEY (`code`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
