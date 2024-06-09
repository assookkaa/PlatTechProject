-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2024 at 02:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toothfairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_level`
--

CREATE TABLE `acc_level` (
  `acc_id` int NOT NULL,
  `acc_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `acc_level`
--

INSERT INTO `acc_level` (`acc_id`, `acc_type`) VALUES
(1, 'Customer'),
(2, 'Staff'),
(3, 'Doctor'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `age` int NOT NULL,
  `purpose` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_approval` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `user_id`, `age`, `purpose`, `date`, `status`, `date_approval`) VALUES
(1, 2, 14, 'Broken Teeth', '2024-06-08', 'Pending', '2024-06-06 07:05:39'),
(2, 2, 14, 'Broken Teeth', '2024-06-08', 'Pending', '2024-06-06 07:06:37'),
(3, 2, 14, 'Broken Teeth', '2024-06-08', 'Pending', '2024-06-06 07:07:51'),
(4, 2, 14, 'Tooth Extraction', '2024-06-07', 'Pending', '2024-06-06 07:09:26'),
(5, 2, 14, 'Tooth Extraction', '2024-06-07', 'Pending', '2024-06-06 07:10:07'),
(6, 2, 14, 'Tooth Extraction', '2024-06-07', 'Pending', '2024-06-06 07:11:55'),
(7, 2, 14, 'afssdf', '2024-06-13', 'afssdf', '2024-06-08 02:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int NOT NULL,
  `appointment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `illness` text NOT NULL,
  `diagnosis` text NOT NULL,
  `remarks` text NOT NULL,
  `diag_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int NOT NULL,
  `login` timestamp NOT NULL,
  `logout` timestamp NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(225) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact_num` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `acc_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `mname`, `lname`, `contact_num`, `address`, `email`, `password`, `acc_id`) VALUES
(2, 'a', 'a', 'a', 123, 'a', 'a@a', '$2y$10$LtjHLP5s4uX5damxStBcR.eihiRiYm1FRralRGebJmUDMguZ5BSzW', 1),
(3, 'NIggas', 'In', 'Paris', 992233, 'Paris', 'kanye@west', '$2y$10$2nVuXnQ926Nih3TEHyd7Y.zCi2xVG2GOKEkeZEoMG9UHqxXKa6zaW', 1),
(4, 'Jay', 'Z', 'and Kanye', 12332, 'Paris', 'who@paris', '$2y$10$NAZ/d7PmohfstBtBbbsPpOHhDraN3Q4It2QE869IkR.Xulfrj.8Wi', 1),
(5, 'Sung', 'Jin', 'Woo', 123412, 'Arise', 'admin@admin', '123', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_level`
--
ALTER TABLE `acc_level`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `appointment_id` (`appointment_id`,`user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_level`
--
ALTER TABLE `acc_level`
  MODIFY `acc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `acc_level` (`acc_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
