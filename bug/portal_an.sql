-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 01:44 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ann_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `send` varchar(200) NOT NULL COMMENT 'notification for',
  `date` varchar(10) NOT NULL,
  `end_date` varchar(10) NOT NULL,
  `remove` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ann_id`, `message`, `send`, `date`, `end_date`, `remove`) VALUES
(15, 'dm,dms', 'teachers,parent', '02-07-2022', '2022-03-10', 0),
(18, 'dm,dms', 'students,teachers', '02-07-2022', '0000-00-00', 0),
(19, 'salman', 'students,teachers,parent', '02-07-2022', '0000-00-00', 0),
(20, 'dm,dms', 'students', '02-07-2022', '0000-00-00', 0),
(21, 'salman', 'teachers', '02-07-2022', '0000-00-00', 0),
(22, 'dm,dms', 'parent', '02-07-2022', '0000-00-00', 0),
(23, 'salman', 'students,teachers', '02-07-2022', '0000-00-00', 0),
(24, 'rrfrf', 'students,parent', '02-07-2022', '0000-00-00', 0),
(25, 'dm,dms', 'teachers,parent', '02-07-2022', '0000-00-00', 0),
(26, 'salman', 'students', '02-07-2022', '0000-00-00', 0),
(27, 'dm,dms', 'teachers', '02-07-2022', '0000-00-00', 0),
(28, 'salmanklwlklhdkldklhdklh', 'students,teacher,parent', '03-01-2022', '0000-00-00', 0),
(29, 'salman', 'students,teacher', '', '2022-02-26', 0),
(30, 'dm,dmsklkknklnklknkkkl', 'students,teacher,parent', '03-01-2022', '2022-03-02', 0),
(31, 'dm,dms', 'teacher', '02-03-2022', '0000-00-00', 0),
(32, 'dm,dms', 'teacher', '02-03-2022', '02-03-2022', 0),
(33, 'salman', 'students,teacher,parent', '02-03-2022', '31-03-2022', 0),
(34, 'dm,dms', 'teacher,parent', '02-03-2022', '31-03-2022', 0),
(35, 'rrfrf', 'students,teacher', '02-03-2022', '30-03-2022', 0),
(36, 'ww', 'teacher', '02-03-2022', '05-04-2022', 0),
(37, 'dm,dms', 'students', '02-03-2022', '17-03-2022', 0),
(38, 'salman', 'students,teacher,parent', '02-03-2022', '08-04-2022', 1),
(39, 'dm,dms', 'students,teacher', '02-03-2022', '08-01-2022', 1),
(40, 'aaa', 'students,parent', '02-03-2022', '25-03-2022', 1),
(41, 'rrfrf', 'students', '02-03-2022', '27-02-2022', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ann_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ann_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
