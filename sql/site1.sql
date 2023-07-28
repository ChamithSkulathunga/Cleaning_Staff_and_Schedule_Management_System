-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 02:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site1`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `email`, `password`) VALUES
(1, 'admin1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `login_technician`
--

CREATE TABLE `login_technician` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_technician`
--

INSERT INTO `login_technician` (`id`, `email`, `password`) VALUES
(1, 'technician1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `working_place` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `employee_id`, `working_place`, `date`, `time_from`, `time_to`) VALUES
(1, 1, 'FOTS Laboratory', '2023-04-17', '09:59:00', '21:01:00'),
(2, 1, 'FOTS Lecture hall', '2023-04-12', '22:05:00', '23:02:00'),
(3, 9, 'FOBS Lecture hall', '2023-04-29', '09:57:00', '16:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `company_id_no` varchar(10) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `salary_complete_last_month` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `working_place` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `is_deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `type`, `full_name`, `address`, `email`, `mobile_number`, `company_id_no`, `company_name`, `salary_complete_last_month`, `item`, `working_place`, `description`, `password`, `date`, `time_from`, `time_to`, `is_deleted`) VALUES
(1, '1', 'Employee', 'Samantha rathnayake', 'No 22/5, Kandy rd, Dambulla.', 'samantha@gmail.com', 716783451, 'C1', 'ClearSL', '2023-01', 'Water Bucket  1', 'FOTS Lecture hall', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-22', '00:00:00', '00:00:00', 0),
(2, '2', 'Employee', 'Kasun bandara', 'Welimada rd, Badulla.', 'kasun@gmail.com', 775462319, 'C2', 'ClearUK', '2023-02', 'Cleaning Lequid', 'FOBS Lecture hall', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-22', '00:00:00', '00:00:00', 0),
(3, '3', 'Employee', 'Maya nisansala', 'No 50/7, Anuradhapura.', 'Maya@gmail', 773098230, 'C3', 'CLS Cleaning', '2023-02', 'Bucket', 'FOAS Wash Room', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-22', '00:00:00', '00:00:00', 0),
(4, '4', 'Employee', 'Shen ranasinhe', 'No 22/3, Vavuniya.', 'Shen@gmail.com', 778693122, 'C4', 'ARN Cleaning', '2023-02', 'Water Bucket', 'IT Center Second Floor', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-22', '00:00:00', '00:00:00', 0),
(5, '5', 'Employee', 'Krishan silva', 'No 55/A, Kilinochchiya.', 'Krishan@gmail', 774567891, 'C3', 'CLS Cleaning', '2023-02', 'Cleaning Lequid', 'Electronic Laboratory Wash Room', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-22', '00:00:00', '00:00:00', 0),
(6, '6', 'Employee', 'Wimal jayakodi', 'Jaffna rd, Madawachchiya.', 'Wimal@gmail', 774585523, 'C1', 'ClearSL', '2023-02', 'Mop', 'Welfare Center Wash Room', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-23', '00:00:00', '00:00:00', 0),
(7, '7', 'Employee', 'Jagath malalasekra', 'No Samadhi mawatha, Anuradhapuraya.', 'Jagath@gmail', 715632748, 'C4', 'ARN Cleaning', '2023-01', 'Bucket 5', 'Library Wash Room', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-23', '00:00:00', '00:00:00', 0),
(8, '8', 'Employee', 'Tharsha shiwalingam', 'No 82, Pampeimadu, Vavuniya.', 'Tharsha@gmail', 714523390, 'C3', 'CLS Cleaning', '2023-02', 'Broom 5', 'BS Canteen Inside', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-23', '00:00:00', '00:00:00', 0),
(9, '9', 'Employee', 'Seelan siwakumar', 'Chekkalikudam, Vavuniya.', 'Seelan@gmail', 785266201, 'C2', 'ClearUK', '2023-02', 'Water Bucket  5', 'Applied Canteen Inside', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-23', '00:00:00', '00:00:00', 0),
(10, '10', 'Employee', 'Samantha silva', 'No : 27/4, Main road, Siripu', 'samantha@gmail', 774567891, 'C1', 'ClearSL', '2023-01', '1 Water Bucket', 'FOTS Staff Room', 'No', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-04-23', '00:00:00', '00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_technician`
--
ALTER TABLE `login_technician`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `for` (`employee_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_technician`
--
ALTER TABLE `login_technician`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `for` FOREIGN KEY (`employee_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
