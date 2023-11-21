-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 10:06 AM
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
-- Database: `tms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `id` int(11) NOT NULL,
  `scholid` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `remark` varchar(20) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `dateborrower` date DEFAULT NULL,
  `returndate` date DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `reason` varchar(599) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`id`, `scholid`, `firstname`, `lastname`, `remark`, `item_id`, `itemname`, `dateborrower`, `returndate`, `category`, `reason`) VALUES
(24, '19-2750-66', 'Christian Carl Bastistin', 'Vince Candole', 'Move to MTCL4', NULL, 'mmly7ss02851071fe858b', '2023-11-09', '2023-11-08', 'Laptop', NULL),
(25, '19-2322-23', 'Juan Dela Cruz', 'Christian Carl Bastistin', 'Move to MTCL3', NULL, 'mmly7ss02851071fe858c', '2023-11-09', '2023-11-16', 'MONITOR', NULL),
(26, '19-23-341', 'Jushua Kim Magbanua', 'Vince Candole', 'Move to MTCL5', NULL, 'mmly7ss02851071fe858c', '2023-11-09', '2023-11-09', 'MONITOR', NULL),
(27, '19-23-341', 'Vincent Alexiz', 'Candole', 'Move to MTCL4', NULL, 'mmly7ss02851071fe858b', '2023-11-11', '2023-11-11', 'Laptop', NULL),
(28, '19-23-341', 'Vincent Alexiz', 'Candole', 'Move to MTCL4', NULL, 'mmly7ss02851071fe858b', '2023-11-11', '2023-11-21', 'Laptop', 'sdsds'),
(29, '19-23-341', 'Vincent Alexiz', 'Candole', 'Move to MTCL4', NULL, 'mmly7ss02851071fe858b', '2023-11-11', '2023-11-11', 'Laptop', NULL),
(30, '19-2750-66', 'Jushua Kim Magbanua', 'Vincent Candole', 'Move to MTCL1', NULL, 'mlksdaohfopas123', '2023-11-16', '2023-11-16', 'MONITOR', NULL),
(31, '2323424', 'sdasd', 'Solutions', 'sdsd', NULL, 'mmly7ss02851071fe858b', '2023-11-21', '2023-11-21', 'Laptop', 'sdsds');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(13, 'ASUS'),
(14, 'LOGITECH'),
(15, 'ACER'),
(16, 'HUAWEI'),
(17, 'NVision');

-- --------------------------------------------------------

--
-- Table structure for table `categorylist`
--

CREATE TABLE `categorylist` (
  `id` int(11) NOT NULL,
  `categorylistname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorylist`
--

INSERT INTO `categorylist` (`id`, `categorylistname`) VALUES
(7, 'Laptop'),
(8, 'MOUSE'),
(9, 'MONITOR'),
(10, 'UPS');

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `uniqID` varchar(50) DEFAULT NULL,
  `timeIn` datetime DEFAULT NULL,
  `timeOut` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`id`, `firstname`, `lastname`, `uniqID`, `timeIn`, `timeOut`) VALUES
(1, 'Vince', 'Candole', '12345', '2023-06-21 17:36:05', '2023-06-21 17:36:20'),
(2, 'Christian', 'Bastistin', '23456', '2023-06-21 17:39:17', '2023-06-21 17:39:42'),
(8, 'Christian', 'Bastistin', '23456', '2023-06-21 18:03:28', '2023-06-21 18:03:40'),
(9, 'Christian', 'Bastistin', '23456', '2023-06-21 18:04:11', '2023-06-21 18:05:02'),
(10, 'Christian', 'Bastistin', '23456', '2023-06-21 18:06:40', '2023-06-21 18:06:44'),
(11, 'Christian', 'Bastistin', '23456', '2023-06-21 18:31:34', '2023-06-21 18:31:38'),
(12, 'Christian', 'Bastistin', '23456', '2023-06-21 18:44:42', '2023-06-21 18:45:04'),
(13, 'Christian', 'Bastistin', '23456', '2023-06-21 18:48:40', '2023-06-21 18:58:58'),
(14, 'Christian', 'Bastistin', '23456', '2023-06-21 18:58:57', '2023-06-21 18:58:58'),
(15, 'Christian', 'Bastistin', '23456', '2023-06-21 18:59:00', '2023-06-21 18:59:00'),
(16, 'Christian', 'Bastistin', '23456', '2023-06-21 19:10:03', '2023-06-21 19:10:04'),
(18, 'Nonoy', 'Carl', '34567', '2023-06-26 23:37:37', '2023-06-26 23:38:05'),
(19, 'Nonoy', 'Carl', '34567', '2023-07-02 17:23:53', '2023-07-02 17:24:05'),
(20, 'Christian', 'Bastistin', '23456', '2023-07-07 15:20:24', '2023-07-07 15:24:25'),
(21, 'Christian', 'Bastistin', '23456', '2023-07-07 15:20:45', '2023-07-07 15:24:25'),
(22, 'Vince ', ' Felizardo', '12-12-145-20', '2023-09-22 03:24:47', '2023-09-22 03:24:50'),
(23, 'Christian', 'Bastistin', '23456', '2023-11-09 10:33:38', '2023-11-11 22:51:35'),
(24, 'Christian', 'Bastistin', '23456', '2023-11-11 22:51:25', '2023-11-11 22:51:35'),
(25, 'Christian', 'Bastistin', '23456', '2023-11-11 22:51:48', '2023-11-11 22:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `teacher` varchar(255) DEFAULT NULL,
  `subj` varchar(255) DEFAULT NULL,
  `ftype` varchar(50) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `dateup` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `filepath`, `upload_date`, `teacher`, `subj`, `ftype`, `date_time`, `dateup`) VALUES
(16, 'AMIS.xlsx', 'uploads/AMIS.xlsx', '2023-11-21 02:20:22', 'Pajar', 'Intro', 'xlsx', '2023-11-21 10:20:00', '2023-11-21 10:20:22'),
(17, 'Github.xlsx', 'uploads/Github.xlsx', '2023-11-21 02:33:23', 'hello', 'sd', 'xlsx', '2023-11-21 10:33:00', '2023-11-21 10:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `monitor_sn` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `avatar` longblob DEFAULT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `monitor_sn`, `model`, `brand`, `category`, `quantity`, `description`, `avatar`, `date_added`) VALUES
(48, 'mmly7ss02851071fe858b', 'X505Z', 'ASUS', 'Laptop', 18, 'Ryzen 7 Vega 10 Graphics', NULL, '2023-11-15 22:47:19'),
(49, '2023HS02NPQ8', 'B100', 'LOGITECH', 'MOUSE', 1, 'ERGONOMIC MOUSE', NULL, '2023-11-14 22:47:30'),
(50, 'mmly7ss02851071fe858c', 'AOpen 24MV1Y', 'ACER', 'MONITOR', 1, '144hz refresh rate', NULL, '2023-11-20 22:47:34'),
(51, 'mqlu123890', 'B120', 'HUAWEI', 'UPS', 3, '240 volts', NULL, '2023-11-20 22:47:38'),
(52, 'mqlu123892', 'X505Z', 'LOGITECH', 'UPS', 1, 'dsdsd', NULL, '2023-11-16 22:47:42'),
(53, 'mmly7ss02851071fe8581', 'B100', 'LOGITECH', 'MONITOR', 10, 'dsd', NULL, '2023-11-11 22:46:58'),
(54, 'mlksdaohfopas123', 'G6982', 'NVision', 'MONITOR', 0, '75hz', NULL, '2023-11-16 07:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `modelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `modelname`) VALUES
(3, 'X505Z'),
(4, 'B100'),
(5, 'AOpen 24MV1Y'),
(6, 'B120'),
(7, 'G6982');

-- --------------------------------------------------------

--
-- Table structure for table `project_list`
--

CREATE TABLE `project_list` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `manager_id` int(30) NOT NULL,
  `user_ids` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_list`
--

INSERT INTO `project_list` (`id`, `name`, `description`, `status`, `start_date`, `end_date`, `manager_id`, `user_ids`, `date_created`) VALUES
(9, 'Install Windows 10 in MTCL 1', '						&lt;p&gt;												&lt;span style=&quot;font-family: Tahoma;&quot;&gt;﻿&lt;/span&gt;&lt;span style=&quot;font-family: Tahoma;&quot;&gt;Please install a windows 10 in all PCs in MTCL 1, make sure the windows 10 that already installed is working properly before the deadline.&lt;/span&gt;										&lt;/p&gt;					', 0, '2023-11-08', '2023-11-30', 8, '7', '2023-11-08 22:50:01'),
(10, 'Move monitor to MTCL3', 'Please make it on time', 0, '2023-11-09', '2023-11-11', 8, '7', '2023-11-09 09:34:12'),
(11, 'task1', 'dsds', 0, '2023-11-11', '2023-11-12', 8, '7', '2023-11-11 22:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `room` varchar(255) DEFAULT NULL,
  `teacher` varchar(255) DEFAULT NULL,
  `days` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `stubcd` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `subj` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `room`, `teacher`, `days`, `time`, `stubcd`, `lang`, `end_time`, `subj`) VALUES
(17, 'MTCL1', 'Marjee Rose Parreno', 'M', '07:00:00', '112', 'Cisco Packet Tracer', '08:00:00', 'IT3210'),
(18, 'MTCL1', 'Marjee Rose Parreno', 'W', '07:00:00', '112', 'Cisco Packet Tracer', '08:00:00', 'IT3210'),
(19, 'MTCL1', 'Marjee Rose Parreno', 'F', '07:00:00', '112', 'Cisco Packet Tracer', '08:00:00', 'IT3210'),
(20, 'MTCL2', 'Rodolfo Eregia', 'M', '08:00:00', '656', 'Cisc', '10:00:00', 'Networking'),
(21, 'MTCL4', 'Marjee Rose Parreno', 'T', '23:09:00', '112', 'python', '10:20:00', 'IT3210'),
(22, 'MTCL5', 'Marjee Rose Parreno', 'T', '01:45:00', '112', 'python', '00:43:00', 'sds');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Task Management System', 'info@sample.comm', '+6948 8542 623', 'iloilo city', '');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `id` int(30) NOT NULL,
  `project_id` int(30) NOT NULL,
  `task` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`id`, `project_id`, `task`, `description`, `status`, `date_created`) VALUES
(18, 9, 'Installing windows 10', '								please installed windows 10 in pcs 1 to 10						', 3, '2023-11-08 22:58:34'),
(19, 9, 'Remove the pcs that is not compatible', 'removing the pcs that is not compatible and label it.', 1, '2023-11-08 23:13:57'),
(20, 9, 'Clean all the pcs', '				make sure to clean all the pcs			', 2, '2023-11-08 23:20:09'),
(21, 9, 'Install Packet Tracer', '								as soon as possible						', 3, '2023-11-09 10:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `uniqID` varchar(100) DEFAULT NULL,
  `typeval` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `avatar`, `date_created`, `uniqID`, `typeval`) VALUES
(6, 'Vince', 'Candole', 'vincecandole@gmail.com', '0192023a7bbd73250516f069df18b500', 1, '1687091940_pp1.jpg', '2023-06-18 20:39:21', '12345', NULL),
(7, 'Christian', 'Bastistin', 'christianbastistin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, '1687092120_dp.jpg', '2023-06-18 20:42:44', '23456', NULL),
(8, 'Nonoy', 'Carl', 'nonoycarl@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '1687794360_210104133055-beginner-gaming-pc.jpg', '2023-06-18 20:51:09', '34567', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_productivity`
--

CREATE TABLE `user_productivity` (
  `id` int(30) NOT NULL,
  `project_id` int(30) NOT NULL,
  `task_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `subject` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` int(30) NOT NULL,
  `time_rendered` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_productivity`
--

INSERT INTO `user_productivity` (`id`, `project_id`, `task_id`, `comment`, `subject`, `date`, `start_time`, `end_time`, `user_id`, `time_rendered`, `date_created`) VALUES
(13, 9, 18, 'checking and installing the windows 10 in pcs 1 to 5', 'PC 1 TO 5', '2023-11-09', '08:00:00', '12:00:00', 7, 4, '2023-11-08 23:06:22'),
(14, 9, 0, '													', '', '0000-00-00', '00:00:00', '00:00:00', 7, 0, '2023-11-08 23:09:08'),
(15, 9, 18, 'pcs 1 and 2 is not compatible in windows 10 , pc 3 to 5 is already installed windows 10', 'PC 1 TO 5', '2023-11-09', '13:00:00', '13:30:00', 7, 0.5, '2023-11-08 23:10:49'),
(17, 9, 18, 'pc 6 to 10 is already installed windows 10 without problem', 'PC 6 to 10', '2023-11-09', '14:00:00', '17:00:00', 7, 3, '2023-11-08 23:19:11'),
(18, 9, 21, 'installing', 'PC 1 TO 15', '2023-11-09', '08:00:00', '10:00:00', 7, 2, '2023-11-09 10:20:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorylist`
--
ALTER TABLE `categorylist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_list`
--
ALTER TABLE `project_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_productivity`
--
ALTER TABLE `user_productivity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categorylist`
--
ALTER TABLE `categorylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_list`
--
ALTER TABLE `project_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_productivity`
--
ALTER TABLE `user_productivity`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `borrower_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
