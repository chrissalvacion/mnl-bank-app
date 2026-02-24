-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 07:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebankdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountno` varchar(16) NOT NULL,
  `balance` int(11) DEFAULT NULL,
  `ccv` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountno`, `balance`, `ccv`, `status`) VALUES
('100215012928', 27993, 124, 'Active'),
('528163125532', 15000, 712, 'Active'),
('913385029421', 30000, 111, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionid` varchar(100) NOT NULL,
  `accountorig` varchar(16) DEFAULT NULL,
  `accountrecip` varchar(16) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `curbalance` int(11) DEFAULT NULL,
  `transtype` varchar(50) DEFAULT NULL,
  `transdate` date DEFAULT NULL,
  `transtatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionid`, `accountorig`, `accountrecip`, `amount`, `curbalance`, `transtype`, `transdate`, `transtatus`) VALUES
('03082023122209', 'BANK', '100215012928', 27993, 27993, 'DEPOSIT', '2023-08-03', 'COMPLETE'),
('03082023123709', 'BANK', '913385029421', 30000, 30000, 'DEPOSIT', '2023-08-03', 'COMPLETE'),
('03082023124535', 'BANK', '528163125532', 15000, 15000, 'DEPOSIT', '2023-08-03', 'COMPLETE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `accountno` varchar(16) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `contactno` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datereg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `accountno`, `firstname`, `lastname`, `birthday`, `address`, `contactno`, `email`, `password`, `datereg`) VALUES
(1, '100215012928', 'Juan', 'Dela Cruz', '1997-03-30', '123 Barangay Mabini St., Quezon City, Metro Manila 1101, Philippines', '09166970023', 'juandelacruz@gmail.com', 'jd0197', '2023-02-28'),
(2, '528163125532', 'Antonio', 'Santos', '1997-12-15', '456 F. Ramos St., Barangay San Isidro, Makati City 1210, Metro Manila, Philippines', '09132455248', 'antoniosanto01@yahoo.com', 'as1997', '2023-03-07'),
(3, '913385029421', 'Emy', 'Lopez', '1995-04-22', '789 P. Burgos St., Barangay Malate, Manila 1004, Metro Manila, Philippines', '09622872635', 'emylopez@outlook.com', 'dec1274', '2023-03-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountno`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
