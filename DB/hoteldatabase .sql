-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 06:05 AM
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
-- Database: `hoteldatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date_time` datetime DEFAULT current_timestamp(),
  `intended_check_in` date NOT NULL,
  `intended_check_out` date NOT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  `no_of_adults` int(11) DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_date_time`, `intended_check_in`, `intended_check_out`, `check_in`, `check_out`, `no_of_adults`, `guest_id`) VALUES
(72, '2023-08-15 17:04:49', '2023-08-16', '2023-08-17', '2023-08-15 19:24:05', '2023-08-15 19:23:05', 2, 5),
(73, '2023-08-15 17:09:54', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(75, '2023-08-15 17:10:39', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(76, '2023-08-15 17:15:12', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(77, '2023-08-15 17:17:34', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(78, '2023-08-15 17:18:02', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(79, '2023-08-15 17:22:22', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(80, '2023-08-15 17:24:36', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(81, '2023-08-15 17:25:36', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(82, '2023-08-15 17:26:27', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(84, '2023-08-15 17:33:02', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(85, '2023-08-15 17:35:36', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(86, '2023-08-15 17:39:48', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(87, '2023-08-15 17:40:53', '2023-08-16', '2023-08-17', NULL, NULL, 2, 5),
(88, '2023-08-15 19:50:25', '2023-08-23', '2023-08-25', NULL, NULL, 1, 5),
(89, '2023-08-15 19:51:22', '2023-08-23', '2023-08-25', NULL, NULL, 1, 5),
(90, '2023-08-15 20:54:00', '2023-08-16', '2023-08-18', NULL, NULL, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `booking_room_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`booking_room_id`, `booking_id`, `room_no`) VALUES
(82, 72, 101),
(83, 72, 108),
(84, 72, 101),
(85, 72, 108),
(86, 73, 101),
(87, 73, 108),
(88, 73, 101),
(89, 73, 108),
(123, 82, 108),
(124, 82, 101),
(125, 82, 108),
(130, 84, 101),
(131, 84, 108),
(132, 84, 101),
(133, 84, 108),
(134, 85, 101),
(135, 85, 108),
(136, 85, 101),
(137, 85, 108),
(138, 86, 101),
(139, 86, 108),
(140, 86, 101),
(141, 86, 108),
(142, 87, 101),
(143, 87, 108),
(144, 87, 101),
(145, 87, 108),
(146, 88, 101),
(147, 89, 101),
(148, 90, 102);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_fname` varchar(50) NOT NULL,
  `employee_lname` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `employee_type_id` varchar(20) NOT NULL,
  `hire_date` date NOT NULL DEFAULT current_timestamp(),
  `end_date` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_fname`, `employee_lname`, `gender`, `employee_type_id`, `hire_date`, `end_date`, `salary`, `address`, `phone_number`, `email`, `city`, `state`, `zip`, `country`, `password`, `cpassword`) VALUES
(1, 'Will', 'Smith', 'M', 'M01', '2023-08-02', NULL, 10000.00, 'abc', '98', 'willsmith@employee.thesharp.com', 'surrey', 'bc', '9292', 'canada', '000', '000'),
(2, 'Han', 'Solo', 'M', 'H01', '2023-08-04', NULL, 1000.00, 'Surrey', '123', 'hansolo@employee.thesharp.com', 'Surrey', 'BC', '9293', 'Canada', '000', '000'),
(3, 'Leia', 'Ortega', 'F', 'R01', '2023-08-04', NULL, 1000.00, 'Surrey', '99', 'leiaortega@employee.thesharp.com', 'Surrey', 'BC', '9293', 'Canada', '000', '000'),
(4, 'Amandeep', 'Nahal', 'M', 'R01', '2023-08-09', NULL, 0.00, 'Westerly Street, Abbotsford', '', 'aman@employee.thesharp.com', 'Abbotsford', 'BC', 'V2T6T7', 'Canada', '000', '000');

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `employee_type_id` varchar(20) NOT NULL,
  `employee_type_title` varchar(40) DEFAULT NULL,
  `employee_type_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`employee_type_id`, `employee_type_title`, `employee_type_desc`) VALUES
('H01', 'Housekeeping', 'Cleans stuff'),
('M01', 'Manager', 'The Boss!'),
('R01', 'Receptionist', 'Frontdesk');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(20) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `Subject` varchar(200) DEFAULT NULL,
  `comments` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `fullname`, `email`, `phone`, `Subject`, `comments`) VALUES
(1, 'a', 'b@a', NULL, 'a', 'adc'),
(2, 'ab', 'ab@a', NULL, 'uj', 'dywgwgd'),
(3, 'aman singh', 'nahaldeep41@gmail.com', NULL, 'hi', 'very good'),
(4, 'aman singh', 'nahaldeep41@gmail.com', NULL, 'hi', 'very good'),
(5, 'abc', 'abc@a', NULL, 'hi', 'abc'),
(6, 'abc', 'abc@a', NULL, 'hi', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `guest_fname` varchar(50) DEFAULT NULL,
  `guest_lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `guest_fname`, `guest_lname`, `email`, `phone`, `address`, `city`, `state`, `zip`, `country`, `password`, `cpassword`) VALUES
(1, 'Amandeep', 'Nahal', 'christine@fyhjfyj', 'etgtety', 'Westerly Street, Abbotsford', 'Abbotsford', 'BC', 'V2T6T7', 'Canada', '123', '123'),
(2, 'abc', 'def', 'abc@abc', '111', 'abc', 'abc', 'abc', 'abc', 'abc', '000', '000'),
(5, 'shilani', 'sharma', 'shilani@gmail.com', '123', 'surrey', 'surrey', 'bc', '456', 'Canada', '000', '000');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_no` int(11) NOT NULL,
  `room_type_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_no`, `room_type_id`) VALUES
(104, 'D'),
(105, 'D'),
(110, 'D'),
(102, 'K'),
(106, 'K'),
(111, 'K'),
(103, 'P'),
(107, 'P'),
(112, 'P'),
(101, 'Q'),
(108, 'Q'),
(113, 'Q');

-- --------------------------------------------------------

--
-- Table structure for table `room_availability`
--

CREATE TABLE `room_availability` (
  `room_type_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` varchar(20) NOT NULL,
  `occupancy` int(11) NOT NULL,
  `room_price` decimal(10,2) DEFAULT NULL,
  `room_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `occupancy`, `room_price`, `room_description`) VALUES
('D', 4, 229.00, 'room with 2 bed and 2 recliner sofas'),
('K', 2, 179.01, 'wsedrftgyhujiko'),
('P', 3, 309.00, 'fcvghbj'),
('Q', 1, 139.00, 'rctvy 1 person');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_guest_id_fkey` (`guest_id`);

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`booking_room_id`),
  ADD KEY `fk_booking_id` (`booking_id`),
  ADD KEY `fk_room_no` (`room_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee_employee_type_id_fkey` (`employee_type_id`),
  ADD KEY `idx_employee_email` (`email`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`employee_type_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_no`),
  ADD KEY `fk_room_type_id` (`room_type_id`);

--
-- Indexes for table `room_availability`
--
ALTER TABLE `room_availability`
  ADD PRIMARY KEY (`room_type_id`,`date`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `booking_room`
--
ALTER TABLE `booking_room`
  MODIFY `booking_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_guest_id_fkey` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);

--
-- Constraints for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD CONSTRAINT `fk_booking_id` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`),
  ADD CONSTRAINT `fk_room_no` FOREIGN KEY (`room_no`) REFERENCES `room` (`room_no`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_employee_type_id_fkey` FOREIGN KEY (`employee_type_id`) REFERENCES `employee_type` (`employee_type_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_type_id` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);

--
-- Constraints for table `room_availability`
--
ALTER TABLE `room_availability`
  ADD CONSTRAINT `room_availability_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
