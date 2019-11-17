-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 07:13 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentpayment`
--

CREATE TABLE `studentpayment` (
  `line_no` int(11) NOT NULL,
  `Acc_No` varchar(255) DEFAULT NULL,
  `id_no` int(11) DEFAULT NULL,
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentpayment`
--

INSERT INTO `studentpayment` (`line_no`, `Acc_No`, `id_no`, `register_time`, `amount`) VALUES
(1, 'acc-001', 0, '2019-01-10 16:16:44', 2000),
(2, 'acc-001', 0, '2018-12-08 18:00:00', NULL),
(3, 'acc-001', 0, '2018-12-08 18:00:00', NULL),
(4, 'acc-001', 0, '2018-11-06 18:00:00', NULL),
(5, 'acc-001', 0, '2018-12-08 18:00:00', 2000),
(6, 'acc-001', 0, '2018-12-08 18:00:00', 0),
(7, 'acc-001', 1, '2018-12-08 18:00:00', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id_no` int(11) NOT NULL,
  `class_roll_no` varchar(255) DEFAULT NULL,
  `class` int(11) NOT NULL,
  `section` varchar(10) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `parmanent_address` varchar(255) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id_no`, `class_roll_no`, `class`, `section`, `full_name`, `current_address`, `parmanent_address`, `mobile_no`, `gender`, `father_name`, `mother_name`, `register_date`) VALUES
(0, '10', 1, 'A', 'nazim uddn', 'hall-2, iiuc', 'feni', 18884448, 'male', 'Bhuyea mohammad maein uddin', 'Nazmun Nesa', '2018-12-26 06:01:29'),
(1, '1', 1, 'A', 'Mohammad Nazim Uddin', 'hall-2, iiuc', 'feni sadar, feni', 1885390090, 'male', 'Bhuyea mohammad maein uddin', 'Nazmun Nesa', '2018-12-16 14:16:09'),
(2, '2', 1, 'A', 'Nahida Akter', 'hall-2, iiuc', 'feni', 1885390090, 'female', 'Bhuyea mohammad maein uddin', 'Nazmun Nesa', '2018-12-16 16:27:04'),
(3, '1', 2, 'A', 'Emdad Ullah Talha', 'hall-2, iiuc', 'sonagagi feni', 1885390090, 'male', 'Mahmudul Hassan', 'Saee Millat Imami', '2018-12-16 17:20:50'),
(4, '1', 1, 'B', 'nazimuddn', 'hall-2, iiuc', 'feni', 18884448, 'male', 'Bhuyea mohammad maein uddin', 'Nazmun Nesa', '2018-12-17 06:33:43'),
(5, '4', 1, 'A', 'Emdad Ullah', 'hall-2, iiuc', 'feni', 1885390090, 'male', 'Mahmudul Hassan', 'Saee Millat Imami', '2018-12-25 08:09:47'),
(6, '3', 1, 'A', 'nazimuddn', 'hall-2, iiuc', 'feni', 18884448, 'male', 'Bhuyea mohammad maein uddin', 'Nazmun Nesa', '2018-12-25 17:08:48'),
(7, '11', 1, 'A', 'asif ullah asf', 'hall-2, iiuc', 'Feni', 1885390090, 'male', 'Bhuyea mohammad maein uddin', 'Nazmun Nesa', '2018-12-26 06:46:57'),
(8, '1', 3, 'A', 'asif ullah', 'hall-2, iiuc', 'Feni', 1885390090, 'male', 'Bhuyea mohammad maein uddin', 'Nazmun Nesa', '2018-12-26 06:48:30'),
(9, '2', 3, 'A', 'sana ullah', 'hall-2, iiuc', 'Feni', 1885390090, 'male', 'Mr. A', 'Mrs. B', '2018-12-26 07:23:36'),
(10, '2', 3, 'A', 'safi ullah', 'hall-2, iiuc', 'Feni', 1885390090, 'male', 'Mr. A', 'Mrs. B', '2018-12-26 12:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`id`, `roll`, `name`, `address`, `Mobile`) VALUES
(1, 1111, 'nazim', 'block a, ctg', 1885390090),
(3, 122, 'nazimuddn', 'block c,halishohor', 18884448),
(5, 1233, 'asf', 'ctg', 188888890),
(6, 52, 'asif nazim', 'block b, halishohor, ctg', 1885390090),
(7, 121, 'Riaz uddin', 'kumira,ctg', 1885396690);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chart_of_account`
--

CREATE TABLE `tbl_chart_of_account` (
  `Acc_No` varchar(255) NOT NULL,
  `Acc_name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Acc_type` varchar(255) NOT NULL,
  `Acc_sb_type` varchar(255) NOT NULL,
  `id_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chart_of_account`
--

INSERT INTO `tbl_chart_of_account` (`Acc_No`, `Acc_name`, `Description`, `Acc_type`, `Acc_sb_type`, `id_no`) VALUES
('acc-001', 'Student Salaray Account', 'Student Salary Account', 'Asset', 'Student', NULL),
('acc-002', 'admission fee', 'admission fee', 'Asset', 'Student', NULL),
('acc-11', 'asif', 'hello', 'asset', 'None', NULL),
('acc-12', 'nazim', 'student', 'asset', 'Student', NULL),
('Acc-13', 'Asif', 'student', 'asset', 'Student', NULL),
('acc-14', 'monoar hossain', 'student', 'asset', 'Student', NULL),
('acc1234', 'student', 'student', 'asset', 'Student', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_generel_account`
--

CREATE TABLE `tbl_generel_account` (
  `Acc_No` varchar(255) DEFAULT NULL,
  `G_Acc_No` varchar(255) NOT NULL,
  `G_Acc_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_generel_account`
--

INSERT INTO `tbl_generel_account` (`Acc_No`, `G_Acc_No`, `G_Acc_Name`) VALUES
('acc-11', 'Gacc-10', 'asif'),
('acc-12', 'gacc-12', 'nazim'),
('acc-14', 'gacc-14', 'monoar hossain'),
('acc1234', 'gacc123', 'student'),
('Acc-13', 'Gacc13', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`) VALUES
(4, 'asif', 'asifiiuc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'nazim uddin', 'nazim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'asif_nazim', 'asif_nazim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'asif12', 'asif12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentpayment`
--
ALTER TABLE `studentpayment`
  ADD PRIMARY KEY (`line_no`),
  ADD KEY `id_no` (`id_no`),
  ADD KEY `Acc_No` (`Acc_No`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id_no`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chart_of_account`
--
ALTER TABLE `tbl_chart_of_account`
  ADD PRIMARY KEY (`Acc_No`),
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `tbl_generel_account`
--
ALTER TABLE `tbl_generel_account`
  ADD PRIMARY KEY (`G_Acc_No`),
  ADD KEY `Acc_No` (`Acc_No`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentpayment`
--
ALTER TABLE `studentpayment`
  MODIFY `line_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentpayment`
--
ALTER TABLE `studentpayment`
  ADD CONSTRAINT `studentpayment_ibfk_1` FOREIGN KEY (`id_no`) REFERENCES `student_info` (`id_no`),
  ADD CONSTRAINT `studentpayment_ibfk_2` FOREIGN KEY (`Acc_No`) REFERENCES `tbl_chart_of_account` (`Acc_No`);

--
-- Constraints for table `tbl_chart_of_account`
--
ALTER TABLE `tbl_chart_of_account`
  ADD CONSTRAINT `tbl_chart_of_account_ibfk_1` FOREIGN KEY (`id_no`) REFERENCES `student_info` (`id_no`);

--
-- Constraints for table `tbl_generel_account`
--
ALTER TABLE `tbl_generel_account`
  ADD CONSTRAINT `tbl_generel_account_ibfk_1` FOREIGN KEY (`Acc_No`) REFERENCES `tbl_chart_of_account` (`Acc_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
