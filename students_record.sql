-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 01:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_personal_profile`
--

CREATE TABLE `students_personal_profile` (
  `id` int(10) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `cp_no` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `age` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `added_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students_school_profile`
--

CREATE TABLE `students_school_profile` (
  `student_id` int(10) NOT NULL,
  `grade_level` varchar(250) NOT NULL,
  `section` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `bgColor` varchar(50) NOT NULL,
  `fColor` varchar(50) NOT NULL,
  `target_date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `finish_date` varchar(250) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `user_id`, `content`, `bgColor`, `fColor`, `target_date`, `status`, `finish_date`, `added_at`) VALUES
(18, 'Task 1', '1', 'Task1 Description', '#080c72', '#fdfcfc', '2022-11-09', 'Active', 'Nov 21, 2022 07:55:45pm', '2022-11-09 15:06:42'),
(21, 'Task 4', '1', 'Task 3 Description Edited', '#f2ea02', '#db0606', '2022-11-16', 'Active', 'Nov 21, 2022 07:52:29pm', '2022-11-20 20:53:04'),
(22, 'Task 6', '1', 'Task 3 Description', '#f2ea02', '#db0606', '2022-11-16', 'Active', 'Nov 21, 2022 07:53:10pm', '2022-11-20 20:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `privilege` varchar(250) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `password`, `privilege`, `added_at`) VALUES
(1, 'admin@email.com', '$2y$10$zQT3x0EK8y2g/9hpr4CdCOSxAODFkaoM.41YnS1xBxLuHXbaBc1LS', 'admin', '2022-09-27 08:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_action`
--

CREATE TABLE `user_action` (
  `id` int(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `device` varchar(250) NOT NULL,
  `ip_address` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `action` varchar(250) NOT NULL,
  `action_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_action`
--

INSERT INTO `user_action` (`id`, `username`, `device`, `ip_address`, `location`, `action`, `action_date`) VALUES
(1, '', '::1', 'Desktop', '', '', '2022-09-28 09:22:26'),
(2, '', '::1', 'Desktop', '', '', '2022-09-28 09:42:46'),
(3, '', 'Desktop', '::1', 'Manila National Capital Region Asia Philippines 1219', '', '2022-09-28 23:15:21'),
(4, '', 'Desktop', '::1', 'private', '', '2022-09-28 23:22:08'),
(5, '', 'Desktop', '::1', 'private', '', '2022-09-28 23:40:29'),
(6, '', 'Desktop', '::1', 'private', '', '2022-09-28 23:42:49'),
(7, '', 'Desktop', '::1', 'private', '', '2022-09-28 23:43:23'),
(8, '', 'Desktop', '::1', 'private', '', '2022-09-28 23:44:21'),
(9, '', 'Desktop', '::1', 'private', '', '2022-09-28 23:45:03'),
(10, '', 'Desktop', '::1', 'private', '', '2022-09-29 00:19:05'),
(11, '', 'Desktop', '::1', 'private', '', '2022-09-29 00:20:53'),
(12, '', 'Desktop', '::1', 'private', '', '2022-09-29 00:35:46'),
(13, '', 'Desktop', '::1', 'private', '', '2022-09-29 00:36:10'),
(14, '', 'Desktop', '::1', 'private', '', '2022-09-29 00:37:19'),
(15, '', 'Desktop', '::1', 'private', '', '2022-09-29 00:38:24'),
(16, '', 'Mobile', '192.168.100.4', 'private', '', '2022-09-29 08:50:05'),
(17, '', 'Desktop', '::1', 'private', '', '2022-11-07 11:53:14'),
(18, '', 'Desktop', '::1', 'private', '', '2022-11-07 15:04:08'),
(19, '', 'Desktop', '::1', 'private', '', '2022-11-08 13:01:29'),
(20, '', 'Desktop', '::1', 'private', '', '2022-11-09 10:48:27'),
(21, '', 'Desktop', '::1', 'private', '', '2022-11-09 13:51:53'),
(22, '', 'Desktop', '::1', 'private', '', '2022-11-09 14:02:21'),
(23, '', 'Desktop', '::1', 'private', '', '2022-11-09 14:10:06'),
(24, '', 'Desktop', '::1', 'private', '', '2022-11-09 14:13:42'),
(25, '', 'Desktop', '::1', 'private', '', '2022-11-09 14:15:18'),
(26, '', 'Desktop', '::1', 'private', '', '2022-11-09 14:23:19'),
(27, '', 'Desktop', '::1', 'private', '', '2022-11-20 15:37:50'),
(28, '', 'Desktop', '::1', 'private', '', '2022-11-20 15:57:55'),
(29, '', 'Desktop', '::1', 'private', '', '2022-11-20 16:36:37'),
(30, '', 'Mobile', '::1', 'private', '', '2022-11-20 16:46:34'),
(31, '', 'Desktop', '::1', 'private', '', '2022-11-21 18:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `emp_no` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `emp_status` varchar(250) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `firstname`, `middlename`, `lastname`, `emp_no`, `email`, `department`, `emp_status`, `added_at`) VALUES
(1, 'Jimmy', 'Baruc', 'Consulta', 'company01', 'admin@email.com', 'Accounts', 'Regular', '2022-09-29 09:12:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_personal_profile`
--
ALTER TABLE `students_personal_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_action`
--
ALTER TABLE `user_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_personal_profile`
--
ALTER TABLE `students_personal_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_action`
--
ALTER TABLE `user_action`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
