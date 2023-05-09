-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 01:15 AM
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
-- Database: `bug_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `bug`
--

CREATE TABLE `bug` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `project_id` int(11) NOT NULL,
  `details` varchar(200) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `level_id` int(11) NOT NULL,
  `necessity` int(11) NOT NULL,
  `developer_id` int(11) DEFAULT NULL,
  `start_time` date NOT NULL DEFAULT current_timestamp(),
  `end_time` date DEFAULT NULL,
  `solving_time` varchar(50) DEFAULT NULL,
  `solution` varchar(200) NOT NULL DEFAULT 'not solved yet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bug`
--

INSERT INTO `bug` (`id`, `name`, `project_id`, `details`, `status_id`, `level_id`, `necessity`, `developer_id`, `start_time`, `end_time`, `solving_time`, `solution`) VALUES
(1, 'bug1', 1, 'the server does not work since many customers registered', 2, 3, 0, 5, '2023-04-19', NULL, NULL, 'not solved yet'),
(2, 'bug2', 1, 'we have a problem in registration  form', 3, 1, 1, 7, '2023-05-02', '2023-05-09', '7', 'check the session code'),
(3, 'bug3', 2, 'x function is not working', 2, 2, 0, 6, '2023-05-06', NULL, NULL, 'not solved yet'),
(4, 'bug4', 3, 'I can not access main page', 2, 4, 0, 4, '2023-05-08', NULL, NULL, 'not solved yet'),
(5, 'bug5', 5, 'change theme button does not work', 1, 3, 0, 5, '2023-04-18', NULL, NULL, 'not solved yet'),
(6, 'bug6', 3, 'can not update my profile page', 1, 4, 1, NULL, '2023-05-07', NULL, NULL, 'not solved yet'),
(7, 'bug7', 6, 'can not load images', 1, 2, 1, 4, '2023-04-26', NULL, NULL, 'not solved yet');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `user_id` int(11) DEFAULT NULL,
  `text` varchar(50) NOT NULL,
  `sender_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`user_id`, `text`, `sender_email`) VALUES
(4, 'thank you', 'basmala@gmail.com'),
(5, 'thank you', 'basmala@gmail.com'),
(6, 'thank you', 'basmala@gmail.com'),
(7, 'thank you', 'basmala@gmail.com'),
(1, 'your service is awesome', 'rahma@gmail.com'),
(2, 'your service is awesome', 'rahma@gmail.com'),
(3, 'your service is awesome', 'rahma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`) VALUES
(1, 'very easy'),
(2, 'easy'),
(3, 'medium'),
(4, 'hard'),
(5, 'very hard');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `user_id` int(11) DEFAULT NULL,
  `text` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`user_id`, `text`, `date`) VALUES
(1, 'bug1 added!', '2023-05-09'),
(2, 'bug1 added!', '2023-05-09'),
(3, 'bug1 added!', '2023-05-09'),
(1, 'bug2 added!', '2023-05-09'),
(2, 'bug2 added!', '2023-05-09'),
(3, 'bug2 added!', '2023-05-09'),
(1, 'bug3 added!', '2023-05-09'),
(2, 'bug3 added!', '2023-05-09'),
(3, 'bug3 added!', '2023-05-09'),
(1, 'bug4 added!', '2023-05-09'),
(2, 'bug4 added!', '2023-05-09'),
(3, 'bug4 added!', '2023-05-09'),
(1, 'bug5 added!', '2023-05-09'),
(2, 'bug5 added!', '2023-05-09'),
(3, 'bug5 added!', '2023-05-09'),
(1, 'bug6 added!', '2023-05-09'),
(2, 'bug6 added!', '2023-05-09'),
(3, 'bug6 added!', '2023-05-09'),
(1, 'bug7 added!', '2023-05-09'),
(2, 'bug7 added!', '2023-05-09'),
(3, 'bug7 added!', '2023-05-09'),
(4, 'bug4 assigned to you!', '2023-05-09'),
(5, 'bug1 assigned to you!', '2023-05-09'),
(6, 'bug3 assigned to you!', '2023-05-09'),
(7, 'bug2 assigned to you!', '2023-05-09'),
(8, 'bug2 solved!', '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `team_name` varchar(20) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `customer_id`, `team_name`, `date`) VALUES
(1, 'project1', 8, 'team1', '2023-01-01'),
(2, 'project2', 8, 'team2', '2022-12-09'),
(3, 'project3', 9, 'team1', '2023-01-02'),
(4, 'project4', 10, 'team2', '2022-12-09'),
(5, 'project5', 9, 'team1', '2023-05-09'),
(6, 'project6', 10, 'team2', '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'developer'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'waiting for developer'),
(2, 'working on it'),
(3, 'solved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `address`, `phone_number`, `role_id`) VALUES
(1, 'aya203@gmail.com', 20210203, 'Aya Ashraf Ahmed', 'Helwan University', 1111111111, 1),
(2, 'aya204@gmail.com', 20210204, 'Aya Ashraf Mohamed', 'Helwan University', 222222222, 1),
(3, 'aya211@gmail.com', 20210211, 'Aya Mahmoud', 'Helwan University', 333333333, 1),
(4, 'tasneem@gmail.com', 2021, 'Tasneem', 'Helwan University', 123456, 2),
(5, 'aya207@gmail.com', 0, 'Aya Galal', 'Helwan University', 654321, 2),
(6, 'esraa@gmail.com', 0, 'Esraa Ashraf', 'Helwan University', 111111, 2),
(7, 'Basant@gmail.com', 2021, 'Basant Mahmoud', 'Helwan University', 55555, 2),
(8, 'basmala@gmail.com', 2021, 'Basmala', 'Helwan University', 123456, 3),
(9, 'habiba@gmail.com', 2021, 'Habiba', 'Helwan University ', 654321, 3),
(10, 'rahma@gmail.com', 2021, 'Rahma', 'Helwan University ', 123456, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bug_ibfk_1` (`project_id`),
  ADD KEY `bug_ibfk_2` (`level_id`),
  ADD KEY `bug_ibfk_3` (`status_id`),
  ADD KEY `developer_id` (`developer_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_1` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bug`
--
ALTER TABLE `bug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bug`
--
ALTER TABLE `bug`
  ADD CONSTRAINT `bug_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bug_ibfk_4` FOREIGN KEY (`developer_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
