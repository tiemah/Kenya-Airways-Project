-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 08:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flightdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_uname` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_uname`, `admin_email`, `admin_pwd`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW'),
(2, 'Margaret', 'margaret@gmail.com', '$2y$10$XIsl0wTFvP5vYDiPFlM0mODcRpKl/oSz0IIhBouRBLoFFwfoAIsWS'),
(3, 'admin@gmail.com', 'admin@gmail.com', '$2y$10$zk/ueikLytL9mmfG96G6g.7FnSyjpMOWbavy5JXbVhrAtM91uBq12');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `registration_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `registration_date`) VALUES
(1, 'Margaret', 'Irungu', '0799123282', 'margaret@gmail.com', 'Find my progress', '2023-12-09 00:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `departure` datetime NOT NULL,
  `arrival` datetime NOT NULL,
  `flightname` varchar(50) NOT NULL,
  `Aseats` int(11) NOT NULL,
  `Aprice` int(11) NOT NULL,
  `Bseats` int(11) NOT NULL,
  `Bprice` int(11) NOT NULL,
  `Cseats` int(11) NOT NULL,
  `Cprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_id`, `admin_id`, `source`, `destination`, `departure`, `arrival`, `flightname`, `Aseats`, `Aprice`, `Bseats`, `Bprice`, `Cseats`, `Cprice`) VALUES
(1, 4, 'Kisumu', 'Mombasa', '2024-03-19 13:58:00', '2024-03-19 18:05:00', 'Kenya Airways', 23, 25000, 36, 24000, 72, 20000),
(2, 3, 'Kisumu', 'Nairobi', '2024-03-19 13:17:00', '2024-03-19 19:23:00', 'Kenya Airways', 24, 25000, 36, 24000, 72, 23000),
(0, 3, 'Kisumu', 'Nairobi', '2024-03-21 10:00:00', '2024-03-22 01:00:00', 'Kenya Airways', 20, 10000, 30, 8000, 40, 7000);

-- --------------------------------------------------------

--
-- Table structure for table `passenger_profile`
--

CREATE TABLE `passenger_profile` (
  `passenger_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flight_id` int(10) NOT NULL,
  `mobile` int(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `Id_number` int(8) DEFAULT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `m_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `class` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `passenger_profile`
--

INSERT INTO `passenger_profile` (`passenger_id`, `user_id`, `flight_id`, `mobile`, `dob`, `Id_number`, `f_name`, `m_name`, `l_name`, `class`) VALUES
(48, 11, 1, 799123282, '2000-01-19', 12345678, 'Margaret', 'Wanjiku', 'Irungu', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `flight_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `payment_method` varchar(10) DEFAULT NULL,
  `phone_no` int(10) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`flight_id`, `passenger_id`, `payment_method`, `phone_no`, `payment_date`, `amount`) VALUES
(22, 36, 'KCB', 706954260, '2023-07-27', 12000),
(22, 37, 'equity', 795030657, '2023-07-26', 20000),
(23, 43, 'equity', 795030657, '2023-07-27', 24000),
(10, 43, 'mpesa', 343434343, '2023-07-11', 500),
(23, 47, 'Mpesa', 2147483647, '2023-07-27', 10000),
(1, 1, 'Mpesa', 799123282, '2024-03-21', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwd_reset_id` int(11) NOT NULL,
  `pwd_reset_email` varchar(50) NOT NULL,
  `pwd_reset_selector` varchar(80) NOT NULL,
  `pwd_reset_token` varchar(120) NOT NULL,
  `pwd_reset_expires` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwd_reset_id`, `pwd_reset_email`, `pwd_reset_selector`, `pwd_reset_token`, `pwd_reset_expires`) VALUES
(3, 'doreen@gmail.com', '05bbfb8e7f0196c9', '$2y$10$EzkutlFHR/nScdU9DOHN5u0MWAJoFnp5iSQ0zlCsOe0ows9PA76Ju', '1688740376');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seat_no` varchar(10) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `class` varchar(3) NOT NULL,
  `ticket_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `passenger_id`, `flight_id`, `user_id`, `seat_no`, `cost`, `class`, `ticket_code`) VALUES
(28, 35, 22, 8, '26', 15000, 'A', 1114808282),
(29, 36, 22, 8, '33', 12000, 'B', 764048741),
(30, 37, 22, 8, '22', 10000, 'C', 1057515165),
(31, 38, 22, 8, '29', 10000, 'C', 1057515165),
(32, 43, 23, 9, '16', 12000, 'B', 1268843498),
(33, 44, 23, 9, '3', 12000, 'B', 1268843498),
(34, 47, 23, 10, '47', 10000, 'C', 1296578120),
(35, 1, 1, 11, '41', 25000, 'A', 255119808);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(11, 'irungumargaret93@gma', 'irungumargaret93@gmail.com', '$2y$10$7KaGyCTvB.qML.1bI6OQI.mEsYLWqjXhxbByd5tqI.nVp7mxK9/J2'),
(12, 'doreen', 'doreen@gmail.com', '$2y$10$jzz1bpWuvs3QHPZTS6g5WuMMKmwzXTM.6Z536V6GGhPqT0X7WoYn2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  ADD PRIMARY KEY (`passenger_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flight_id` (`flight_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwd_reset_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `passenger_id` (`passenger_id`),
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwd_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
