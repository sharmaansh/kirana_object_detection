-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2019 at 09:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiranadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `billdb`
--

CREATE TABLE `billdb` (
  `itemid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cartdb`
--

CREATE TABLE `cartdb` (
  `itemid` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pricedb`
--

CREATE TABLE `pricedb` (
  `itemid` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricedb`
--

INSERT INTO `pricedb` (`itemid`, `itemname`, `price`) VALUES
(0, 'Beer_shampoo', 100),
(1, 'nivea_body_lotion', 75),
(2, 'cinthol_soap', 35),
(3, 'sprite_cold_drink', 90),
(4, 'colgate', 55),
(1003, 'sprite_small', 45),
(1004, 'colgate_small', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pricedb`
--
ALTER TABLE `pricedb`
  ADD PRIMARY KEY (`itemid`,`itemname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
