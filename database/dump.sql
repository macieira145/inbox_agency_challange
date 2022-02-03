-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2022 at 04:13 AM
-- Server version: 10.3.32-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challange`
--
CREATE DATABASE IF NOT EXISTS `challange` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `challange`;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `details` varchar(255) NOT NULL,
  `unitPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `description`, `details`, `unitPrice`) VALUES
(7, 'USB Type-A Disk', 'Packaging should be the same as what is found in a retail store, unless the item is handmade or was packaged by the manufacturer in non-retail packaging, such as an unprinted box or plastic bag. See the seller\'s listing for full details.', 15),
(8, 'Ingersoll Hawley Men\'s Automatic Watch', 'Item model number : I04604. Model number: I04604. Part Number: I04604. Silver stainless-steel case and black Leather strap. Grey dial. Manufacturer : Ingersoll. Model', 84.03),
(9, 'Radeon RX 550 4GB GPU VRAM (Low Profile)', '\r\nChipset/GPU Model:\r\nAMD Radeon RX 550', 149.92),
(10, 'Xiaomi Mi Band 6 Smart Bracelet', 'Xiaomi Mi Band 6 Smart Bracelet Fitness Tracker Heart Rate Monitor Sport 5ATM IT', 30.99),
(11, 'Invincible Iron Man #1 CGC 9.8 1ST', 'Invincible Iron Man #1 CGC 9.8 1ST PRINT RIRI WILLIAMS 1ST SOLO SERIES', 114.72),
(12, 'Invincible Iron Man #10 CGC 9.8 2016', 'Invincible Iron Man #10 CGC 9.8 2016 2nd App Riri Williams MCU Ironheart', 100);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `name`, `surname`, `email`, `password`) VALUES
(1, 'super_admin', 'Isaac', 'Macieira', 'xifafip209@host1s.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
