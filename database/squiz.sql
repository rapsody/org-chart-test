-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2016 at 11:07 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `squiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `ParentID` int(4) NOT NULL,
  `baseID` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID`, `Firstname`, `Surname`, `Title`, `ParentID`, `baseID`) VALUES
(1, 'Alexander', 'Mills', 'CEO', 9, 1),
(2, 'Helen', 'French', 'CFO', 8, 0),
(3, 'Bradford', 'Palmer', 'Finance Manager', 4, 0),
(4, 'Jeffrey', 'Adkins', 'Account', 1, 0),
(5, 'Stephanie', 'Peters', 'Commercial Layer', 1, 0),
(6, 'Olive', 'Davidson', 'Production Manager', 1, 0),
(7, 'Chelse', 'Weber', 'Implementation Specialist', 1, 0),
(8, 'Marguerite', 'Snyder', 'Project Manager', 7, 0),
(9, 'Bradford', 'Palmer', 'Finance Manager', 8, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

