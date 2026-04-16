-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2026 at 03:34 PM
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
-- Database: `railway`
--

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `seat_number` int(11) DEFAULT NULL,
  `booking_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `priority` int(11) DEFAULT 0,
  `train_id` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `name`, `age`, `status`, `seat_number`, `booking_time`, `priority`, `train_id`, `appointment_date`, `appointment_time`) VALUES
(36, 'Anuj', 19, 'Confirmed', 1, '2026-03-31 12:50:18', 0, 1, '2026-04-22', '00:00:00'),
(37, 'rohan', 19, 'Confirmed', 2, '2026-03-31 12:51:47', 0, 1, '2026-03-26', '00:00:00'),
(38, 'rounak', 46, 'Confirmed', 3, '2026-03-31 12:52:05', 0, 1, '2026-03-28', '00:00:00'),
(41, 'Gargi', 19, 'Pending', NULL, '2026-03-31 12:53:42', 0, 1, '2026-04-15', '00:00:00'),
(43, 'Anuj Dwivedi', 19, 'Pending', NULL, '2026-04-07 04:19:03', 0, 1, '2026-04-15', '00:00:00'),
(44, 'Anjali', 67, 'Confirmed', 5, '2026-04-07 04:19:03', 1, 1, '2026-04-15', '00:00:00'),
(45, 'Anuj Dwivedi', 19, 'Pending', NULL, '2026-04-07 05:23:50', 0, 1, '2026-04-15', '00:00:00'),
(46, 'raj', 68, 'Confirmed', 4, '2026-04-07 05:23:50', 1, 1, '2026-04-15', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_number` int(11) NOT NULL,
  `passenger_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_number`, `passenger_id`) VALUES
(1, 36),
(2, 37),
(3, 38),
(4, 46),
(5, 44);

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` int(11) NOT NULL,
  `train_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `train_name`) VALUES
(1, 'Rajdhani Express'),
(2, 'Shatabdi Express'),
(3, 'Duronto Express');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_number`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
