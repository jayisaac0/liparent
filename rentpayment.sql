-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 15, 2019 at 08:59 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentpayment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appartments`
--

CREATE TABLE `appartments` (
  `appartments_id` int(100) NOT NULL,
  `property_id` int(100) NOT NULL,
  `appartment` varchar(200) NOT NULL,
  `appartmenttype` varchar(200) NOT NULL,
  `appartmentlocation` varchar(200) NOT NULL,
  `appartmentprice` varchar(10) NOT NULL,
  `appartmentarea` varchar(100) NOT NULL,
  `appartmentbedrooms` varchar(10) NOT NULL,
  `appartmentbathrooms` varchar(10) NOT NULL,
  `message` longtext NOT NULL,
  `geocomplete` varchar(200) NOT NULL,
  `lng` varchar(200) NOT NULL,
  `lat` varchar(200) NOT NULL,
  `roomimage` text NOT NULL,
  `timeappartmentposted` timestamp NOT NULL DEFAULT current_timestamp(),
  `public_id` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appartments`
--

INSERT INTO `appartments` (`appartments_id`, `property_id`, `appartment`, `appartmenttype`, `appartmentlocation`, `appartmentprice`, `appartmentarea`, `appartmentbedrooms`, `appartmentbathrooms`, `message`, `geocomplete`, `lng`, `lat`, `roomimage`, `timeappartmentposted`, `public_id`) VALUES
(1, 2, 'Apartment', 'sdfsdf', 'sdfsdf', '233', '3', '3', '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.', 'Kenya Lane, Virginia Beach, VA, USA', '-75.9970654', '36.8384651', 'uploads/7c3fd713bf5b5be9a096080b16e2154c.jpg', '2019-11-14 15:17:32', 2),
(2, 2, 'Apartment', 'sdfsdf', 'sdfsdf', '3233', '3', '3', '3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.', 'Kenya Lane, Virginia Beach, VA, USA', '-75.9970654', '36.8384651', 'uploads/743bd9363d9091b944c8e54aa63ea58c.jpg', '2019-11-14 15:18:04', NULL),
(3, 3, 'Apartment', 'single room', 'upper hill', '5000', '1', '1', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.', 'Hospital Road, Nairobi, Kenya', '36.81272630000001', '-1.300114', 'uploads/36744f9327990156e66197ab47d2d536.png', '2019-11-14 15:19:51', NULL),
(4, 3, 'Apartment', 'single room', 'upper hill', '5000', '1', '1', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.', 'Hospital Road, Nairobi, Kenya', '36.81272630000001', '-1.300114', 'uploads/eee8f389a4a768fbea53ca45cd490627.png', '2019-11-14 19:56:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payments_id` int(200) NOT NULL,
  `public_id` int(200) NOT NULL,
  `appartmentprice` varchar(50) NOT NULL,
  `appartments_id` int(200) NOT NULL,
  `month` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `pesapal_transaction_tracking_id` text DEFAULT NULL,
  `timepaid` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payments_id`, `public_id`, `appartmentprice`, `appartments_id`, `month`, `status`, `pesapal_transaction_tracking_id`, `timepaid`) VALUES
(1, 2, '3233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 21:42:39'),
(2, 2, '3233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 22:31:54'),
(3, 2, '3233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 22:33:23'),
(4, 2, '3233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 22:33:52'),
(5, 2, '3233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 22:34:05'),
(6, 2, '3233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 22:35:48'),
(7, 2, '3233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 22:37:06'),
(8, 2, '3233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 23:27:38'),
(9, 2, '233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 23:29:23'),
(10, 2, '233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 23:30:34'),
(11, 2, '233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 23:33:03'),
(12, 2, '233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-14 23:34:53'),
(13, 2, '233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-15 01:12:27'),
(14, 2, '233', 1, 'January', 1, '3181b1b0-8983-484f-8f9c-f200a4348886', '2019-11-15 01:28:35'),
(15, 2, '233', 1, 'April', 1, 'March', '2019-11-15 04:00:49'),
(16, 2, '233', 1, 'April', 0, NULL, '2019-11-15 07:35:06'),
(17, 2, '233', 1, 'January', 1, 'March', '2019-11-15 07:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(50) NOT NULL,
  `propertyname` varchar(100) NOT NULL,
  `timepropertycreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `propertyname`, `timepropertycreated`) VALUES
(1, 'New property', '2019-11-14 09:46:21'),
(2, 'Second new property', '2019-11-14 10:01:40'),
(3, 'Third new property', '2019-11-14 10:01:52'),
(4, 'New property', '2019-11-14 14:22:07'),
(5, 'another property', '2019-11-15 07:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `public_id` int(50) NOT NULL,
  `agentphoto` text DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `idnumber` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` int(11) NOT NULL DEFAULT 0,
  `property_id` int(50) NOT NULL DEFAULT 0,
  `timecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`public_id`, `agentphoto`, `firstname`, `lastname`, `idnumber`, `email`, `phonenumber`, `password`, `isadmin`, `property_id`, `timecreated`) VALUES
(2, 'uploads/1643a47ac1c13ec83d4c6315e6098356.jpg', 'joshua', 'isaac', '3489723423', 'jayisaac0@gmail.com', '0770396785', '$2y$10$8.AYx4oZMd5KROR7Fn8mAuCnhsv0A7f/cUlvLnsFwtSCcZ5ivLUm2', 1, 2, '2019-11-14 08:54:23'),
(3, '', 'Maria', 'Jane', '123445', 'jayisaac00@gmail.com', '2396487323', '$2y$10$xxBjIKSR.eISNR6frG65/OYxG0Yf.gIv3rY.hhJPOmUUKaT6HQ26e', 2, 5, '2019-11-14 19:17:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appartments`
--
ALTER TABLE `appartments`
  ADD PRIMARY KEY (`appartments_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payments_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`public_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appartments`
--
ALTER TABLE `appartments`
  MODIFY `appartments_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payments_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `public_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
