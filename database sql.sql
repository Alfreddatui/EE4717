-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2018 at 02:51 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f33ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `facility_id` (`facility_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `datetime`, `user_id`, `facility_id`) VALUES
(3, '2018-11-15 14:00:00', 9, 2),
(4, '2018-11-16 00:22:00', 9, 1),
(5, '2018-11-23 00:00:00', 9, 3),
(6, '2018-11-16 06:22:39', 9, 1),
(7, '2018-11-15 13:00:00', 9, 2),
(8, '2018-11-15 15:00:00', 9, 2),
(9, '2018-11-15 16:00:00', 9, 2),
(10, '2018-11-15 17:00:00', 9, 2),
(11, '2018-11-15 17:00:00', 9, 2),
(12, '2018-11-15 17:00:00', 9, 2),
(13, '2018-11-15 18:00:00', 9, 2),
(14, '2018-11-16 13:00:00', 9, 1),
(15, '2018-11-15 12:00:00', 9, 2),
(16, '2018-11-15 11:00:00', 9, 2),
(17, '2018-11-21 13:00:00', 9, 1),
(18, '2018-11-15 13:00:00', 9, 1),
(19, '2018-11-15 14:00:00', 9, 1),
(20, '2018-11-14 13:00:00', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE IF NOT EXISTS `facility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Type` (`Type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `Type`, `price`) VALUES
(1, 'Basketball', 20),
(2, 'Tennis', 0),
(3, 'Badminton', 0);

-- --------------------------------------------------------

--
-- Table structure for table `letssport`
--

CREATE TABLE IF NOT EXISTS `letssport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(30) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `HP` int(10) NOT NULL,
  `Birthday` date NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Member` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `letssport`
--

INSERT INTO `letssport` (`id`, `FullName`, `UserName`, `Email`, `HP`, `Birthday`, `Password`, `Member`) VALUES
(9, 'Alfred Datui', 'alfreddatui', 'alfred1datui', 12341234, '2018-11-01', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(10, 'Alfred Datui', '12345', '12345', 12345123, '2018-11-08', '827ccb0eea8a706', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `letssport` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`facility_id`) REFERENCES `facility` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
