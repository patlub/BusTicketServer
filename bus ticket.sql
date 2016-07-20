-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2016 at 04:20 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bus ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `route` varchar(100) NOT NULL,
  `level` enum('single','double') NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment` enum('Mobile Money','PayPal','Credit Card') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `number`, `name`, `route`, `level`, `date`, `user_id`, `payment`) VALUES
(19, 146, 'patrick', 'Ntinda to Kampala', 'single', '2016-06-14', 0, 'Mobile Money'),
(20, 665, 'patrick', 'Kampala to Banda', 'double', '2016-06-14', 0, 'Mobile Money'),
(23, 263, 'enox', 'Kampala to Banda', 'double', '2016-06-15', 0, 'Mobile Money');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `city`, `phone`, `email`, `password`) VALUES
(1, 'patrick', 'kampala', '0700513591', 'pat', 'patrick'),
(5, 'enox', 'kampala', '0700878787', 'bug@gmail.com', 'kkkk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
