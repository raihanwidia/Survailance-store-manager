-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 11:57 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webengineer`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_product`
--

CREATE TABLE `list_product` (
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_enter` date NOT NULL,
  `pict_path` varchar(255) NOT NULL,
  `owner_key` int(255) NOT NULL,
  `primary_key_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_product`
--

INSERT INTO `list_product` (`name`, `price`, `type`, `date_enter`, `pict_path`, `owner_key`, `primary_key_product`) VALUES
('tukanfg', 20000, 'sdasddasd', '2021-01-01', 'NULL', 1, 16),
('sdsd', 13434, 'wwqewqe', '2022-01-01', 'NULL', 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `store_employee`
--

CREATE TABLE `store_employee` (
  `employee_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `owner_key` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `primary_key_employee` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_employee`
--

INSERT INTO `store_employee` (`employee_name`, `email`, `owner_key`, `password`, `primary_key_employee`) VALUES
('Raihan Widia Kirana', 'raihankirana@gmail.com', 1, 'sdsd', 8);

-- --------------------------------------------------------

--
-- Table structure for table `store_owner`
--

CREATE TABLE `store_owner` (
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `numebr` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_owner`
--

INSERT INTO `store_owner` (`username`, `email`, `password`, `numebr`) VALUES
('raihan', 'raihankirana@gmail.com', 'cc22d955fb10556550982a05e3ff6c', 1),
('raihan', 'raihankirana@gmail.com', 'cc22d955fb10556550982a05e3ff6c', 2),
('raihan', 'raihankirana@gmail.com', '5528770f4bce9c9b0ce9bbb8645aef', 3),
('raihanwidia', 'raihankirana@live.com', '81dc9bdb52d04dc20036dbd8313ed0', 4),
('jojo', 'raihankirana@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 5),
('smlzul', 'smlzulkarnain@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 6),
('raihanwidi', 'raihankirana@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_product`
--
ALTER TABLE `list_product`
  ADD PRIMARY KEY (`primary_key_product`),
  ADD KEY `owner_key` (`owner_key`);

--
-- Indexes for table `store_employee`
--
ALTER TABLE `store_employee`
  ADD PRIMARY KEY (`primary_key_employee`),
  ADD KEY `owner_key` (`owner_key`);

--
-- Indexes for table `store_owner`
--
ALTER TABLE `store_owner`
  ADD PRIMARY KEY (`numebr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_product`
--
ALTER TABLE `list_product`
  MODIFY `primary_key_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `store_employee`
--
ALTER TABLE `store_employee`
  MODIFY `primary_key_employee` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store_owner`
--
ALTER TABLE `store_owner`
  MODIFY `numebr` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list_product`
--
ALTER TABLE `list_product`
  ADD CONSTRAINT `list_product_ibfk_1` FOREIGN KEY (`owner_key`) REFERENCES `store_owner` (`numebr`);

--
-- Constraints for table `store_employee`
--
ALTER TABLE `store_employee`
  ADD CONSTRAINT `store_employee_ibfk_1` FOREIGN KEY (`owner_key`) REFERENCES `store_owner` (`numebr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
