-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2019 at 09:11 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nethouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Joined date` date NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `Joined date`, `email`) VALUES
(1, 'John Doe', '2018-10-17', 'johndoe@gmil.com'),
(2, 'Trevor Noah', '2019-05-14', 'trevoro@yhoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `Package` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `customer` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Modified by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `Package`, `date`, `status`, `customer`, `Price`, `Modified by`) VALUES
(5, 'silver', '2019-08-16', 'Paid', 2, 67, 1),
(6, 'student', '2019-08-16', 'Paid', 1, 90, 2),
(7, 'Gold', '2019-08-15', 'paid', 2, 67, 1),
(8, 'silver', '2019-08-16', 'Paid', 1, 90, 2),
(9, 'Gold', '2019-08-16', 'Paid', 2, 67, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uemail` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upass`, `fullname`, `uemail`, `permission`) VALUES
(1, 'marshall', '$2y$10$6.weCAOZ3v0gj6sNJxP7O.nY9DL2iPDCDLOFR5AR6yahXuqgbX6zm', 'marshall fungai', 'marshall@nethouse.net', 'member'),
(2, 'Vural', '$2y$10$U4LeA/CKfaYwGfA/o/08POhfmIgF2H8L5MIa5ZIqFUDRMEAuYoiZS', 'Vural Net', 'vural@nethouse.net', 'admin'),
(8, 'Brian', '$2y$10$yPfLy5iF/ao0T5K2fdMY/.SZn.xufd1vkNuOwTCGeszFbIkPSRrb6', 'Brian M', 'brian@icloud.com', 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_ibfk_1` (`customer`),
  ADD KEY `payments_ibfk_2` (`Modified by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `uemail` (`uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`Modified by`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
