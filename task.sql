-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2020 at 05:43 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `task` varchar(100) NOT NULL,
  `dateAdded` varchar(20) NOT NULL,
  `duedate` date DEFAULT NULL,
  `priority` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task`, `dateAdded`, `duedate`, `priority`, `status`) VALUES
(1, 'doing assignment', '2020/02/24', '2020-02-26', 'most important', 'completed'),
(2, 'shoppingg', '2020/02/24', '2020-02-27', 'important', 'pending'),
(3, 'cleaningg', '2020/02/24', '2020-02-28', 'most important', 'completed'),
(5, 'sleepingg', '2020/02/25', '2020-03-01', 'most important', 'pending'),
(6, 'do this', '2020/02/25', '2020-03-04', 'most important', 'cancelled'),
(7, 'do that', '2020/02/25', '2020-03-01', 'most important', 'pending'),
(8, 'do this', '2020/02/25', '2020-01-25', 'most important', 'completed'),
(19, 'n', '2020/02/26', '2020-02-27', 'least important', 'cancelled'),
(10, 'doing homework', '2020/02/26', '2020-02-15', 'most important', 'pending'),
(18, 'do this', '2020/02/26', '2020-03-26', 'most important', 'pending'),
(23, 'washing', '2020/02/27', '2020-02-27', 'important', 'pending');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
