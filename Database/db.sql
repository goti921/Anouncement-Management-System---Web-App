-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2014 at 09:55 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ams`
--
CREATE DATABASE IF NOT EXISTS `ams` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ams`;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `ann_id` int(10) NOT NULL AUTO_INCREMENT,
  `posted_by` varchar(100) NOT NULL,
  `announcement` text NOT NULL,
  `chapter` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `date` datetime NOT NULL,
  PRIMARY KEY (`ann_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ann_id`, `posted_by`, `announcement`, `chapter`, `status`, `date`) VALUES
(22, 'anuj', 'If your DBMS doesn''t have an escape function and the DBMS uses \\ to escape special chars, you might be able to use this function only when this escape method is adequate for your database. Please note that use of addslashes() for database parameter escaping can be cause of security issues on most databases.', 'CSI', 'approved', '2014-03-16 19:16:35'),
(23, 'anuj', 'If your DBMS doesnt have an escape function and the DBMS uses  to escape special chars, you might be able to use this function only when this escape method is adequate for your database. Please note that use of addslashes() for database parameter escaping can be cause of security issues on most databases.', 'CSI', 'approved', '2014-03-16 19:56:08'),
(30, 'anuj', 'If your DBMS doesn''t have an escape function and the DBMS uses \\ to escape special chars, you might be able to use this function only when this escape method is adequate for your database. Please note that use of addslashes() for database parameter escaping can be cause of security issues on most databases.', 'CSI', 'not approved', '2014-03-16 20:44:12'),
(31, 'ch9078', 'A complete online preparation program for CAT'' 14 aspirants conceived, designed and delivered by Gautam Puri (GP), India one and only aptitude guru along with his core team.', 'nil', 'pending', '2014-03-31 00:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE IF NOT EXISTS `reminder` (
  `srno` int(10) NOT NULL AUTO_INCREMENT,
  `reminder_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`srno`, `reminder_id`, `username`) VALUES
(1, 22, ''),
(2, 22, 'st11bce0231'),
(3, 30, '');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE IF NOT EXISTS `saved` (
  `srno` int(10) NOT NULL AUTO_INCREMENT,
  `saved_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`srno`, `saved_id`, `username`) VALUES
(1, 22, 'anuj'),
(2, 23, 'anuj'),
(3, 30, 'anuj'),
(4, 30, 'st11bce0231');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `srno` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `chapter` varchar(100) NOT NULL DEFAULT 'nil',
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`srno`, `username`, `password`, `chapter`) VALUES
(1, 'st11bce0231', 'anuj', 'CSI'),
(2, 'fc420', 'anuj', 'CSI'),
(3, 'ch9078', 'tiger007', 'nil');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
