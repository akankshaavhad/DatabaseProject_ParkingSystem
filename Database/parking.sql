-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2016 at 03:00 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinghistory`
--

CREATE TABLE `bookinghistory` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `locationId` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL COMMENT 'Save in minutes',
  `bookingid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookinghistory`
--

INSERT INTO `bookinghistory` (`id`, `userId`, `locationId`, `duration`, `bookingid`) VALUES
(1, 1, 1, '120', 1),
(2, 2, 2, '1201', 2),
(3, 3, 1, '10', 3),
(4, 4, 1, '786870', 4),
(5, 4, 1, '8764287', 3),
(6, 5, 1, '492817894', 6),
(7, 1, 1, '876436', 7),
(8, 7, 1, '17870', 8),
(9, 6, 1, '760', 9),
(10, 9, 1, '120', 10),
(11, 1, 1, '876436', 7);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `dateofbooking` datetime DEFAULT CURRENT_TIMESTAMP,
  `startdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `enddate` datetime DEFAULT CURRENT_TIMESTAMP,
  `ipAddress` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `parkingSpacesId` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `dateofbooking`, `startdate`, `enddate`, `ipAddress`, `userId`, `parkingSpacesId`, `status`) VALUES
(2, '2016-04-17 18:26:59', '2016-04-17 18:26:59', '2016-04-17 18:26:59', 1921543, 2, 2, 'PENDING'),
(3, '2016-04-17 18:26:59', '2016-04-17 18:26:59', '2016-04-17 18:26:59', 19216843, 2, 2, 'BOOKED'),
(4, '2016-04-17 18:26:59', '2016-04-17 18:26:59', '2016-04-17 18:26:59', 2147483647, 2, 2, 'PENDING'),
(5, '2016-04-17 18:26:59', '2016-04-17 18:26:59', '2016-04-17 18:26:59', 1921543, 2, 2, 'BOOKED'),
(6, '2016-04-17 18:26:59', '2016-04-17 18:26:59', '2016-04-17 18:26:59', 1923, 2, 2, 'CANCELED'),
(7, '2016-04-17 18:26:59', '2016-04-17 18:26:59', '2016-04-17 18:26:59', 19243, 2, 2, 'PENDING'),
(8, '2016-04-17 18:26:59', '2016-04-17 18:26:59', '2016-04-17 18:26:59', 1924321, 2, 2, 'BOOKED'),
(9, '2016-04-17 18:26:59', '2016-04-17 18:26:59', '2016-04-17 18:26:59', 19213, 2, 2, 'PENDING'),
(10, '2016-04-17 18:27:01', '2016-04-17 18:27:01', '2016-04-17 18:27:01', 19243, 2, 2, 'CANCELED'),
(12, '2016-04-30 17:22:33', '0000-00-05 00:00:00', '0000-00-00 00:00:00', NULL, 1, 1, 'BOOKED'),
(13, '2016-04-30 17:24:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, 1, 'BOOKED'),
(14, '2016-04-30 17:24:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1, 1, 'BOOKED'),
(15, '2016-05-03 16:46:55', '1991-02-21 12:02:00', '1991-02-21 12:02:00', NULL, 11, 1, 'BOOKED'),
(16, '2016-05-03 16:48:12', '1991-02-21 12:02:00', '1991-02-21 12:02:00', NULL, 11, 1, 'BOOKED'),
(17, '2016-05-03 16:48:39', '1991-02-21 12:02:00', '1991-02-21 12:02:00', NULL, 11, 1, 'BOOKED');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `noOfLevels` int(11) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `noOfLevels`, `createdAt`) VALUES
(1, 'concord', 4, '2016-04-17 17:03:49'),
(2, 'downtown', 3, '2016-04-17 17:03:50'),
(3, 'uptown', 4, '2016-04-17 17:03:50'),
(4, 'belk_gym', 1, '2016-04-17 17:03:50'),
(5, 'grighall', 4, '2016-04-17 17:03:50'),
(6, 'dukehall', 2, '2016-04-17 17:03:50'),
(7, 'grighall', 4, '2016-04-17 17:03:50'),
(8, 'studenunion', 4, '2016-04-17 17:03:50'),
(9, 'kennedy', 4, '2016-04-17 17:03:50'),
(10, 'university terrace', 4, '2016-04-17 17:03:50'),
(11, 'ashford', 4, '2016-04-17 17:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `parkingspaces`
--

CREATE TABLE `parkingspaces` (
  `id` int(11) NOT NULL,
  `locationId` int(11) NOT NULL,
  `description` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkingspaces`
--

INSERT INTO `parkingspaces` (`id`, `locationId`, `description`, `status`) VALUES
(1, 1, 'concord', 'available'),
(2, 1, 'concord', 'available'),
(3, 1, 'concord', 'available'),
(4, 1, 'concord', 'available'),
(5, 1, 'concord', 'available'),
(6, 1, 'concord', 'occupied'),
(7, 10, 'university_terrace', 'available'),
(8, 10, 'university_terrace', 'available'),
(9, 10, 'university_terrace', 'available'),
(10, 10, 'university_terrace', 'available'),
(11, 10, 'university_terrace', 'available'),
(12, 10, 'university_terrace', 'available'),
(13, 2, 'downtown', 'available'),
(14, 2, 'downtown', 'occupied'),
(15, 2, 'downtown', 'occupied'),
(16, 2, 'downtown', 'available'),
(17, 2, 'downtown', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paymentType` varchar(45) NOT NULL,
  `cardDetails` varchar(20) NOT NULL,
  `expiryDate` date NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tariffs`
--

CREATE TABLE `tariffs` (
  `id` int(11) NOT NULL,
  `tariffType` varchar(20) NOT NULL,
  `pricePerHour` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  `autoRenewal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariffs`
--

INSERT INTO `tariffs` (`id`, `tariffType`, `pricePerHour`, `roleId`, `autoRenewal`) VALUES
(1, 'normal', 5, 1, 'no'),
(2, 'normal', 10, 2, 'no'),
(3, 'normal', 15, 3, 'no'),
(4, 'normal', 20, 4, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `id` int(11) NOT NULL,
  `roleName` varchar(20) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`id`, `roleName`, `userId`) VALUES
(1, 'administrator', 1),
(2, 'guest', 2),
(3, 'student', 3),
(4, 'faculty', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `role` int(11) NOT NULL,
  `emailId` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `phoneNumber` int(11) DEFAULT NULL,
  `zipCode` int(11) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `isActive` varchar(10) NOT NULL,
  `lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateJoined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fName`, `lName`, `role`, `emailId`, `address`, `state`, `city`, `phoneNumber`, `zipCode`, `country`, `isActive`, `lastLogin`, `dateJoined`) VALUES
(1, 'gauravpant99', '47bce5c74f589f4867db', 'Gaurav', 'Pant', 1, 'gpant@uncc.edu', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-16 05:51:45', '0000-00-00'),
(2, 'asas', '202cb962ac59075b964b', '', '', 0, 'asas11@gmail.com', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-16 06:12:14', '0000-00-00'),
(3, 'demo', 'fe01ce2a7fbac8fafaed', '', '', 0, 'demo@gmail.com', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-16 06:35:52', '0000-00-00'),
(4, 'demo1', 'fe01ce2a7fbac8fafaed7c982a04e229', '', '', 0, 'demo11@gmail.com', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-16 06:59:15', '0000-00-00'),
(5, 'nikki', '202cb962ac59075b964b07152d234b70', '', '', 0, 'nikki@gmail.com', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-16 07:46:28', '0000-00-00'),
(6, 'pawan', '202cb962ac59075b964b07152d234b70', '', '', 0, 'pawan@gmail.com', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-17 19:37:25', '0000-00-00'),
(7, 'jyoti', '202cb962ac59075b964b07152d234b70', '', '', 0, 'jthakral@gmail.com', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-17 19:52:24', '0000-00-00'),
(8, 'mike', '18126e7bd3f84b3f3e4df094def5b7de', '', '', 0, 'mike@uncc.edu', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-17 21:22:27', '0000-00-00'),
(9, 'joe', '8ff32489f92f33416694be8fdc2d4c22', '', '', 0, 'joe@uncc.edu', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-17 21:22:40', '0000-00-00'),
(10, 'evin', '121aff2d49f52ba9d347e28416b35ccd', '', '', 0, 'evin@uncc.edu', NULL, 'North Caro', 'Charlotte', NULL, NULL, 'US', '', '2016-04-17 21:22:53', '0000-00-00'),
(11, 'Paraball', 'a3af29e9d5f52c723c097525edd9e5f8', 'Pawan', 'Araballi', 0, 'paraball@uncc.edu', '9303', 'NC', 'Charlotte', 984129842, 28262, 'US', 'Yes', '2016-04-23 04:25:26', '0000-00-00'),
(12, 'Pawan Satish', 'c3dfbcfc7ab68e86a79afa987358d78e', '', '', 0, 'araballi.pawan@uncc.', '', 'NC', 'Charlotte', 2147483647, 28262, 'US', '', '2016-05-04 00:42:48', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `userId` int(11) NOT NULL,
  `vehicleMake` varchar(20) NOT NULL,
  `vehicleNumber` varchar(45) NOT NULL,
  `vehicleModel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`userId`, `vehicleMake`, `vehicleNumber`, `vehicleModel`) VALUES
(1, 'Ford', '0', 'RZ'),
(9, 'Ford', '0', 'RZ'),
(2, 'Mercedes', '0', 'A4'),
(3, 'Audi', '0', 'A8'),
(4, 'Honda', '0', 'S Class'),
(5, 'Nissan', '0', 'Z Class'),
(6, 'Renault', '0', 'CAAAAR'),
(7, 'Ford', '0', 'RZ'),
(8, 'Ford', '0', 'RZ'),
(10, 'Ford', '0', 'RZ'),
(11, 'Audi', 'AUDI A8', 'Audi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinghistory`
--
ALTER TABLE `bookinghistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkingspaces`
--
ALTER TABLE `parkingspaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinghistory`
--
ALTER TABLE `bookinghistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `parkingspaces`
--
ALTER TABLE `parkingspaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
