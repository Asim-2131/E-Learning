-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 07:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `AdminId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `MobileNo` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `PassWord` varchar(100) NOT NULL,
  `apic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`AdminId`, `Name`, `MobileNo`, `Address`, `EmailId`, `PassWord`, `apic`) VALUES
(1, 'Vasoya Sagar Ashokbhai', '9925762357', 'A-114, Laxminarayan Society, Dharamnagar road, A.K. Road', 'sagarvasoya1919@gmail.com', '789', 'OutDatabase/IMG-20190824-WA0032 (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `ExerciseId` int(11) NOT NULL,
  `LessionId` int(11) NOT NULL,
  `Questions` text NOT NULL,
  `OptionA` varchar(255) NOT NULL,
  `OptionB` varchar(255) NOT NULL,
  `OptionC` varchar(255) NOT NULL,
  `OptionD` varchar(255) NOT NULL,
  `Answer` varchar(5) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`ExerciseId`, `LessionId`, `Questions`, `OptionA`, `OptionB`, `OptionC`, `OptionD`, `Answer`, `Date`) VALUES
(1, 2, 'name?', 'sagar', 'vasoya', 'pqr', 'stu', 'A', '2021-04-03'),
(3, 4, 'pop?', 'de', 'le', 'te', 'delete', 'D', '2021-04-03'),
(4, 5, 'opop?', 'in', 'de', 'up', 'ip', 'D', '2021-04-03'),
(5, 6, 'coc?', 'coco', 'cococo', 'cococococ', 'opopop', 'C', '2021-04-03'),
(6, 7, 'a+b?', 'b+a', 'a*b*', 'a+b*', 'a*b', 'B', '2021-04-03'),
(7, 3, 'hi?', 'as', 'dfadfsd', 'ghdfsd', 'jkghh', 'B', '2003-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `lessions`
--

CREATE TABLE `lessions` (
  `LessionId` int(11) NOT NULL,
  `Chapter` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Catagory` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessions`
--

INSERT INTO `lessions` (`LessionId`, `Chapter`, `Title`, `Catagory`, `Location`) VALUES
(2, 'titanic', 'T', 'Video', '../OutDatabase/9e73b1fc793c4cb58c39ec8cb7dbcc0d.mp4'),
(3, 'titanic', 'p', 'PDF', '../OutDatabase/Robotics Lab - Experiment 1.pdf'),
(4, 'LAMP', 'array', 'PDF', '../OutDatabase/Robotics Lab - Experiment 5.pdf'),
(5, 'LAMP', 'set', 'PDF', '../OutDatabase/Robotics Lab - Experiment 4.pdf'),
(6, 'FM', 'coc', 'PDF', '../OutDatabase/COC Sum no. 10.pdf'),
(7, 'THOC', 'sum', 'PDF', '../OutDatabase/Selected_Solutions_2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Chapter` varchar(500) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  `Submition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`Chapter`, `Title`, `StudentId`, `Attempts`, `Score`, `Submition`) VALUES
('titanic', 'T', 1, 1, 1, 1),
('titanic', 'p', 1, 1, 1, 1),
('LAMP', 'array', 1, 1, 0, 1),
('LAMP', 'set', 1, 1, 0, 1),
('FM', 'coc', 1, 1, 0, 1),
('THOC', 'sum', 1, 1, 1, 1),
('LAMP', 'set', 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `LessionId` int(11) NOT NULL,
  `ExerciseId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `StudentTicked` varchar(255) NOT NULL,
  `OriginalAnswer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`LessionId`, `ExerciseId`, `StudentId`, `StudentTicked`, `OriginalAnswer`) VALUES
(2, 1, 1, 'A', 'A'),
(3, 7, 1, 'B', 'B'),
(4, 3, 1, 'C', 'D'),
(5, 4, 1, 'A', 'D'),
(6, 5, 1, 'A', 'C'),
(7, 6, 1, 'B', 'B'),
(5, 4, 2, 'D', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `StudentId` int(11) NOT NULL,
  `RollNo` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `MobileNo` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `PassWord` varchar(100) NOT NULL,
  `spic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`StudentId`, `RollNo`, `Name`, `MobileNo`, `Address`, `EmailId`, `PassWord`, `spic`) VALUES
(1, '18bce256', 's', '9999999999', 'junagadh', 's@p.c', '000', 'OutDatabase/Untitled1.png'),
(2, '18bce530', 'dd', '9658965896', 'A-114, Laxminarayan Society, Dharamnagar road, A.K. Road', 'd@c.c', '456', 'OutDatabase/IMG_20191029_111228.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacherdata`
--

CREATE TABLE `teacherdata` (
  `TeacherId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `MobileNo` varchar(10) NOT NULL,
  `Address` text NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `PassWord` varchar(100) NOT NULL,
  `tpic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherdata`
--

INSERT INTO `teacherdata` (`TeacherId`, `Name`, `MobileNo`, `Address`, `EmailId`, `PassWord`, `tpic`) VALUES
(1, 'Vasoya Sagar Ashokbhai', '9925762357', 'A-114, Laxminarayan Society, Dharamnagar road, A.K. Road', 'sagarvasoya1919@gmail.com', '963', 'OutDatabase/Screenshot_2021-03-13-17-25-40-689_com.instagram.android.jpg'),
(2, 'Asim', '9825697484', 'rajkot', '18bce261@nirmauni.ac.in', '123', 'OutDatabase/IMG-20190824-WA0032 (2).jpg'),
(3, 'my', '9925762357', 'vjbknl', 'my@pqr.c', '852', 'OutDatabase/IMG_8054.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`ExerciseId`);

--
-- Indexes for table `lessions`
--
ALTER TABLE `lessions`
  ADD PRIMARY KEY (`LessionId`);

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `teacherdata`
--
ALTER TABLE `teacherdata`
  ADD PRIMARY KEY (`TeacherId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindata`
--
ALTER TABLE `admindata`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `ExerciseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lessions`
--
ALTER TABLE `lessions`
  MODIFY `LessionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentdata`
--
ALTER TABLE `studentdata`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacherdata`
--
ALTER TABLE `teacherdata`
  MODIFY `TeacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
