-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2018 at 12:16 AM
-- Server version: 8.0.13
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makerssquad`
--

-- --------------------------------------------------------

--
-- Table structure for table `History`
--

CREATE TABLE `History` (
  `User_ID` int(11) NOT NULL,
  `Tool_ID` int(11) NOT NULL,
  `Timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `History`
--

INSERT INTO `History` (`User_ID`, `Tool_ID`, `Timestamp`) VALUES
(1000123451, 1, NULL),
(1000123452, 1, NULL),
(1000123453, 3, NULL),
(1000123454, 1, '2018-10-24 12:30:00'),
(1000123455, 2, '2018-11-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Tool`
--

CREATE TABLE `Tool` (
  `Tool_ID` int(11) NOT NULL,
  `Toolname` varchar(20) NOT NULL,
  `lab` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tool`
--

INSERT INTO `Tool` (`Tool_ID`, `Toolname`, `lab`) VALUES
(1, '3D Printer', 304),
(2, 'Chainsaw', 305),
(3, 'Machine Demo', 306);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_ID` int(11) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_ID`, `Firstname`, `Lastname`) VALUES
(1000123451, 'Raveena', 'Jadhav'),
(1000123452, 'Atraya', 'Mukherjee'),
(1000123453, 'Farah', 'Abubaker'),
(1000123454, 'Jennifer', 'Najera'),
(1000123455, 'Jonathan', 'Darling'),
(1000123456, 'Anthony', 'Hawkins');

-- --------------------------------------------------------

--
-- Table structure for table `Verify`
--

CREATE TABLE `Verify` (
  `User_ID` int(11) NOT NULL,
  `Tool_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Verify`
--

INSERT INTO `Verify` (`User_ID`, `Tool_ID`) VALUES
(1000123451, 1),
(1000123454, 1),
(1000123452, 2),
(1000123455, 2),
(1000123452, 3),
(1000123456, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `History`
--
ALTER TABLE `History`
  ADD PRIMARY KEY (`User_ID`,`Tool_ID`),
  ADD KEY `FK_His_Tool` (`Tool_ID`);

--
-- Indexes for table `Tool`
--
ALTER TABLE `Tool`
  ADD PRIMARY KEY (`Tool_ID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `Verify`
--
ALTER TABLE `Verify`
  ADD PRIMARY KEY (`User_ID`,`Tool_ID`),
  ADD KEY `FK_Verify_Tool` (`Tool_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `History`
--
ALTER TABLE `History`
  ADD CONSTRAINT `FK_His_Tool` FOREIGN KEY (`Tool_ID`) REFERENCES `tool` (`tool_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_His_User` FOREIGN KEY (`User_ID`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `Verify`
--
ALTER TABLE `Verify`
  ADD CONSTRAINT `FK_Verify_Tool` FOREIGN KEY (`Tool_ID`) REFERENCES `tool` (`tool_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Verify_User` FOREIGN KEY (`User_ID`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
