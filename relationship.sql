-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2016 at 05:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `info230_sp16_jao57sp16`
--

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `aName` varchar(50) NOT NULL,
  `iID` int(11) NOT NULL,
  PRIMARY KEY (`aName`,`iID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`aName`, `iID`) VALUES
('Ailee', 13),
('Ailee', 14),
('Akdong Musician', 26),
('Akdong Musician', 35),
('AOA', 40),
('AOA', 42),
('AOA', 43),
('APink', 0),
('APink', 1),
('APink', 4),
('APink', 5),
('APink', 25),
('Big Bang', 16),
('Big Bang', 17),
('Big Bang', 18),
('BTS', 45),
('BTS', 46),
('BTS', 47),
('Female Artists', 1),
('Female Artists', 4),
('Female Artists', 5),
('Female Artists', 7),
('Female Artists', 8),
('Female Artists', 9),
('Female Artists', 10),
('Female Artists', 11),
('Female Artists', 12),
('Female Artists', 13),
('Female Artists', 14),
('Female Artists', 25),
('Female Artists', 27),
('Female Artists', 28),
('Female Artists', 30),
('Female Artists', 36),
('Female Artists', 37),
('Female Artists', 40),
('Female Artists', 43),
('Girls Day', 30),
('Girls Day', 36),
('Girls Day', 37),
('Infinite', 2),
('Infinite', 3),
('Infinite', 6),
('Infinite', 29),
('IU', 10),
('IU', 11),
('IU', 12),
('IU', 27),
('IU', 28),
('Kim Jong Kook', 51),
('Kim Jong Kook', 52),
('Kim Jong Kook', 53),
('Male Artists', 2),
('Male Artists', 3),
('Male Artists', 6),
('Male Artists', 16),
('Male Artists', 17),
('Male Artists', 18),
('Male Artists', 29),
('Male Artists', 31),
('Male Artists', 32),
('Male Artists', 33),
('Male Artists', 39),
('Male Artists', 46),
('Male Artists', 50),
('Male Artists', 51),
('Male Artists', 55),
('None', 28),
('SNSD', 7),
('SNSD', 8),
('SNSD', 9),
('Solo Artists', 10),
('Solo Artists', 11),
('Solo Artists', 12),
('Solo Artists', 13),
('Solo Artists', 14),
('Solo Artists', 28),
('Solo Artists', 53),
('Solo Artists', 54),
('VIXX', 31),
('VIXX', 32),
('VIXX', 33),
('VIXX', 39);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
