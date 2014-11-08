-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2014 at 02:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_db`
--

CREATE TABLE IF NOT EXISTS `emp_db` (
  `full_name` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department` int(11) NOT NULL,
  `unq_num` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`unq_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emp_db`
--

INSERT INTO `emp_db` (`full_name`, `address`, `username`, `password`, `department`, `unq_num`) VALUES
('Mark Luigie Tolentino', 'Panghulo, Obando, Bulacan', 'luigie09', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `f1c53e`
--

CREATE TABLE IF NOT EXISTS `f1c53e` (
  `flight_inc` int(11) NOT NULL AUTO_INCREMENT,
  `flight_type` int(11) DEFAULT NULL,
  `reserved_seats` int(11) DEFAULT NULL,
  `passenger_num` varchar(50) DEFAULT NULL,
  `passenger_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`flight_inc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
  `flight_number` varchar(15) NOT NULL,
  `flight_fare_business` decimal(10,2) NOT NULL,
  `flight_fare_economy` decimal(10,2) NOT NULL,
  `one` int(11) NOT NULL,
  `zero` int(11) NOT NULL,
  `flight_destination` text NOT NULL,
  `seats_available` int(11) NOT NULL,
  `flight_date` date NOT NULL,
  `f_num` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`f_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_number`, `flight_fare_business`, `flight_fare_economy`, `one`, `zero`, `flight_destination`, `seats_available`, `flight_date`, `f_num`) VALUES
('f1c53e', '1950.00', '850.00', 40, 40, 'Manila to Dipolog', 80, '2014-10-25', 34);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
