-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2017 at 04:23 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grouptube`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentdata`
--

CREATE TABLE `commentdata` (
  `comId` int(8) NOT NULL,
  `userId` int(8) NOT NULL,
  `parentId` int(8) NOT NULL,
  `vidId` int(8) NOT NULL,
  `comeentContent` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userId` int(8) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profilePicLink` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vidtable`
--

CREATE TABLE `vidtable` (
  `vidId` int(8) NOT NULL,
  `userId` int(8) NOT NULL,
  `vidTitle` varchar(140) NOT NULL,
  `vidRef` varchar(240) NOT NULL,
  `vidThumb` varchar(240) NOT NULL,
  `vidLikes` int(8) NOT NULL,
  `vidDLikes` int(8) NOT NULL,
  `vidViews` int(8) NOT NULL,
  `vidDesc` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vidtable`
--

INSERT INTO `vidtable` (`vidId`, `userId`, `vidTitle`, `vidRef`, `vidThumb`, `vidLikes`, `vidDLikes`, `vidViews`, `vidDesc`) VALUES
(1, 1, 'First Testing Video', 'blorp', 'blorpp', 1, 1, 1, 'A first testing video. lorem ipsum agry solen numero');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentdata`
--
ALTER TABLE `commentdata`
  ADD PRIMARY KEY (`comId`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `vidtable`
--
ALTER TABLE `vidtable`
  ADD PRIMARY KEY (`vidId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentdata`
--
ALTER TABLE `commentdata`
  MODIFY `comId` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userId` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vidtable`
--
ALTER TABLE `vidtable`
  MODIFY `vidId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
