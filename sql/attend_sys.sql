-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 05:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attend_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Attended` int(11) NOT NULL,
  `Total_lec` int(11) NOT NULL,
  `Stud_ID` int(11) NOT NULL,
  `Branch_ID` varchar(5) NOT NULL,
  `Subject_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Attended`, `Total_lec`, `Stud_ID`, `Branch_ID`, `Subject_ID`) VALUES
(2, 2, 1, 'CS', 'CSC701'),
(0, 0, 1, 'CS', 'CSC702'),
(0, 0, 2, 'CS', 'CSC702'),
(2, 2, 2, 'CS', 'CSC701'),
(0, 0, 1, 'CS', 'CSC703'),
(0, 0, 2, 'CS', 'CSC703'),
(0, 0, 3, 'CS', 'CSC703'),
(0, 0, 4, 'CS', 'CSC703'),
(1, 2, 4, 'CS', 'CSC701'),
(0, 0, 4, 'CS', 'CSC702'),
(1, 2, 3, 'CS', 'CSC701'),
(0, 0, 3, 'CS', 'CSC702');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `ID` varchar(5) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ID`, `Name`) VALUES
('CS', 'Computer Enginnering'),
('IT', 'Information Technology'),
('ME', 'Mechanical Enginnering');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Name` varchar(20) NOT NULL,
  `Total_lec` int(11) NOT NULL,
  `Subject_ID` varchar(10) NOT NULL,
  `Branch_ID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Name`, `Total_lec`, `Subject_ID`, `Branch_ID`) VALUES
('DSP_teacher', 2, 'CSC701', 'CS'),
('MCC_teacher', 0, 'CSC702', 'CS'),
('AR_teacher', 0, 'CSC703', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Roll_no` int(11) NOT NULL,
  `Branch_ID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Name`, `Roll_no`, `Branch_ID`) VALUES
(1, 'padmesh', 7, 'CS'),
(2, 'Max', 23, 'CS'),
(3, 'John', 4, 'CS'),
(4, 'Alex', 2, 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `Name`) VALUES
('CSC701', 'Digital Signal & Image Processing'),
('CSC702', 'Mobile communication & computing'),
('CSC703', 'Artificial Intelligence & Soft Computing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `fk_attendance_students` (`Stud_ID`),
  ADD KEY `fk_attendance_branch` (`Branch_ID`),
  ADD KEY `fk_attendance_subjects` (`Subject_ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD KEY `fk_staff_subjects` (`Subject_ID`),
  ADD KEY `fk_staff_branch` (`Branch_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_students_branch` (`Branch_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_branch` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_attendance_students` FOREIGN KEY (`Stud_ID`) REFERENCES `students` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_attendance_subjects` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_staff_branch` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_staff_subjects` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_branch` FOREIGN KEY (`Branch_ID`) REFERENCES `branch` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
