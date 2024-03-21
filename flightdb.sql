-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307:3307
-- Generation Time: Jul 27, 2023 at 06:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(2, 'Benjamin', 'kibunjabens@gmail.com', '$2y$10$XIsl0wTFvP5vYDiPFlM0mODcRpKl/oSz0IIhBouRBLoFFwfoAIsWS');

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
(1, 'colin', 'kebaso', '0795030657', 'colinnyamiaka@gmail.com', 'Find my progress', '2023-07-09 00:02:26');

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
(24, 8, 22, 757303561, '2023-06-26', 34567534, 'John', 'Juma', 'Ochieng', 'B'),
(31, 8, 22, 757303561, '2023-06-26', 34567534, 'Juma', 'Juma', 'Ochieng', 'A'),
(33, 8, 22, 757303561, '2023-06-26', 34567534, 'Juma', 'Juma', 'Ochieng', 'A'),
(34, 8, 22, 757303561, '2023-06-26', 34567534, 'Juma', 'Juma', 'Ochieng', 'A'),
(35, 8, 22, 757303561, '2023-06-26', 34567534, 'Juma', 'Juma', 'Ochieng', 'A'),
(36, 8, 22, 706954260, '2023-07-02', 35303589, 'Benjamin', 'Kibunja', 'Mburu', 'B'),
(37, 8, 23, 790487504, '2023-07-26', 37731787, 'Kashingi', 'Morris', 'Juma', 'B'),
(38, 8, 23, 746350811, '2023-07-25', 37731868, 'Juma ', 'Kashingi', 'Katana', 'B'),
(39, 8, 22, 795030657, '2023-06-25', 39133533, 'David', 'Kiarie', 'Mburu', 'C'),
(40, 8, 22, 743690494, '2023-07-02', 35308834, 'Luke', 'Olende', 'Ochieng', 'C'),
(41, 9, 23, 795030657, '2023-07-11', 39133533, 'Colin', 'Nyamiaka', 'kebaso', 'C'),
(42, 9, 23, 706954260, '2023-07-12', 35308834, 'Benjamin', 'Kibunja', 'Mburu', 'C'),
(43, 9, 23, 795030657, '2023-07-11', 35308834, 'Colin', 'Nyamiaka', 'Kashingi', 'B'),
(44, 9, 23, 795030657, '2023-07-04', 39133533, 'Luke', 'Nyamiaka', 'Mburu', 'B'),
(45, 10, 21, 765704528, '2023-07-19', 37731787, 'Kashingi', 'Morris', 'Kashingi', 'C'),
(46, 10, 23, 795030657, '2023-07-25', 37731787, 'Kashingi', 'Morris', 'Kashingi', 'C'),
(47, 10, 23, 795030657, '2023-01-01', 33333333, 'Juma', 'Nyamiaka', 'kebaso', 'C');

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
(23, 47, 'Mpesa', 2147483647, '2023-07-27', 10000);

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
(3, 'colinnyamiaka@gmail.com', '05bbfb8e7f0196c9', '$2y$10$EzkutlFHR/nScdU9DOHN5u0MWAJoFnp5iSQ0zlCsOe0ows9PA76Ju', '1688740376');

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
(34, 47, 23, 10, '47', 10000, 'C', 1296578120);

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
(1, 'christine', 'christine@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW'),
(2, 'henry', 'henry@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW'),
(3, 'andre', 'andre@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW'),
(4, 'james', 'james@mail.com', '$2y$10$KRXGkY.dxYjD8FLZclW/Tu04wl76lD7IA4Z3nAsxtpdZxHNbYo4ZW'),
(8, 'Colin', 'colinnyamiaka@gmail.com', '$2y$10$e3bt5BAYUiha3xAuFUkHLOQ878dKA8mgY.hlYE0noYLTKoeoAPDbm'),
(9, 'Kebaso', 'kebasocolin@gmail.com', '$2y$10$diEx.18z7S6NKE/.qG2yUeAMAkNvlpfOXzF/OsyLnyFU5gNMPfBoK'),
(10, 'Kashing74', 'moriskashing74@gmail.com', '$2y$10$G1KTRAE0m/YYf/noYS6utOwJycCP9pqPUiNTZrY0VOQQUClCcc2X.');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwd_reset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `passenger_profile`
--
ALTER TABLE `passenger_profile`
  ADD CONSTRAINT `passenger_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `passenger_profile_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passenger_profile` (`passenger_id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passenger_profile` (`passenger_id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`flight_id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*CREATE TABLE `Flights` (
  `flight_id` INT NOT NULL AUTO_INCREMENT,
  `admin_id` INT NOT NULL,
  `source` VARCHAR(50) NOT NULL,
  `destination` VARCHAR(50) NOT NULL,
  `departure` DATETIME NOT NULL,
  `arrival` DATETIME NOT NULL,
  `flightname` VARCHAR(50) NOT NULL,
  `Aseats` INT NOT NULL,
  `Aprice` INT NOT NULL,
  `Bseats` INT NOT NULL,
  `Bprice` INT NOT NULL,
  `Cseats` INT NOT NULL,
  `Cprice` INT NOT NULL,
  PRIMARY KEY (`flight_id`)
);
*/
