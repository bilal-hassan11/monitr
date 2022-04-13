-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 07:19 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `s_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `cnic` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `sec_phone` int(15) NOT NULL COMMENT 'Secondary number',
  `father_name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `p_address` varchar(255) NOT NULL COMMENT 'Permeant Address',
  `user_image` varchar(255) NOT NULL DEFAULT '0',
  `online_status` varchar(7) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`s_no`, `name`, `email`, `cnic`, `phone`, `sec_phone`, `father_name`, `username`, `password`, `address`, `p_address`, `user_image`, `online_status`) VALUES
(1, 'daeyan', 'lk', '09', 909, 909, '', 'daeyan', 'op', 'jkbjkbbjkbjk', 'nklnklnklnklnklnkl', '../profile_img/admin/admin-daeyan-1-cat2.jfif', '');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ann_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `send` varchar(200) NOT NULL COMMENT 'notification for',
  `date` varchar(255) NOT NULL,
  `end_date` varchar(200) NOT NULL,
  `remove` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ann_id`, `message`, `send`, `date`, `end_date`, `remove`) VALUES
(15, 'dm,dms', 'teachers,parent', '02-07-2022', '01-01-1970', 0),
(18, 'dm,dms', 'students,teachers', '02-07-2022', '02-10-2022', 0),
(19, 'salman', 'students,teachers,parent', '02-07-2022', '02-10-2022', 0),
(20, 'dm,dms', 'students', '02-07-2022', '03-11-2022', 0),
(21, 'salman', 'teachers', '02-07-2022', '03-03-2022', 0),
(22, 'dm,dms', 'parent', '02-07-2022', '02-10-2022', 0),
(23, 'salman', 'students,teachers', '02-07-2022', '02-10-2022', 0),
(24, 'rrfrf', 'students,parent', '02-07-2022', '02-10-2022', 0),
(25, 'dm,dms', 'teachers,parent', '02-07-2022', '02-08-2022', 0),
(26, 'salman', 'students', '02-07-2022', '02-03-2022', 0),
(27, 'dm,dms', 'teachers', '02-07-2022', '02-03-2022', 0),
(28, '', 'Array', '03-24-2022', '01-01-1970', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assingments`
--

CREATE TABLE `assingments` (
  `ass_id` int(255) NOT NULL,
  `title` text NOT NULL,
  `file` text NOT NULL COMMENT 'file location',
  `class` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `section` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `t_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assingments`
--

INSERT INTO `assingments` (`ass_id`, `title`, `file`, `class`, `subject`, `section`, `date`, `time`, `t_name`) VALUES
(2, 'Test', '../assingments/teacher Assingment-t-96-9-i', '9', 'p', 'p', '2021-11-28', '2021-11-27 20:56:45.274739', 't-96'),
(3, 'jkjkj`', '../assingments/teacher Assingment-t-96-9-p', '9', 'jj', 'p', '2021-12-09', '2021-12-09 06:38:47.591879', 't-96'),
(4, 'kldkldjk`', '../assingments/teacher Assingment-t-96-9-p', '10', 'Maksh', 'p', '2021-12-27', '2021-12-26 19:38:38.449114', 't-908'),
(5, 'klnkl', '../assingments/teacher Assingment-test_teacher-9-p', '9', 'kbjkb', 'p', '2022-02-08', '2022-02-08 18:56:13.549630', 'test_teacher');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Id` int(10) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dateTaken` varchar(20) NOT NULL,
  `t_id` varchar(100) NOT NULL,
  `subject` varchar(20) NOT NULL COMMENT 'subject of teacher'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Id`, `roll_no`, `class`, `section`, `status`, `dateTaken`, `t_id`, `subject`) VALUES
(21, 'st-6', '9', 'p', '1', '2021-10-17', 't-96', 'computer'),
(20, 'st-5', '9', 'p', '1', '2021-10-17', 't-96', 'computer'),
(19, 'st-4', '9', 'p', '1', '2021-10-17', 't-96', 'computer'),
(18, 'st-3', '9', 'p', '1', '2021-10-17', 't-96', 'computer'),
(17, 'st-2', '9', 'p', '1', '2021-10-17', 't-96', 'computer'),
(16, 'st-106', '9', 'p', '1', '2021-10-17', 't-96', 'computer'),
(15, 'st-1', '9', 'p', '1', '2021-10-17', 't-96', 'computer'),
(22, 'st-1', '9', 'p', '1', '2021-10-17', 't-100', 'english'),
(23, 'st-106', '9', 'p', '1', '2021-10-17', 't-100', 'english'),
(24, 'st-2', '9', 'p', '1', '2021-10-17', 't-100', 'english'),
(25, 'st-3', '9', 'p', '1', '2021-10-17', 't-100', 'english'),
(26, 'st-4', '9', 'p', '1', '2021-10-17', 't-100', 'english'),
(27, 'st-5', '9', 'p', '1', '2021-10-17', 't-100', 'english'),
(28, 'st-6', '9', 'p', '1', '2021-10-17', 't-100', 'english'),
(29, 'st-1', '9', 'p', '1', '2021-10-21', 't-100', 'english'),
(30, 'st-106', '9', 'p', '1', '2021-10-21', 't-100', 'english'),
(31, 'st-2', '9', 'p', '1', '2021-10-21', 't-100', 'english'),
(32, 'st-3', '9', 'p', '1', '2021-10-21', 't-100', 'english'),
(33, 'st-4', '9', 'p', '1', '2021-10-21', 't-100', 'english'),
(34, 'st-5', '9', 'p', '1', '2021-10-21', 't-100', 'english'),
(35, 'st-6', '9', 'p', '1', '2021-10-21', 't-100', 'english'),
(36, 'st-1', '9', 'p', '1', '2021-10-25', 't-100', 'english'),
(37, 'st-106', '9', 'p', '1', '2021-10-25', 't-100', 'english'),
(38, 'st-2', '9', 'p', '1', '2021-10-25', 't-100', 'english'),
(39, 'st-3', '9', 'p', '1', '2021-10-25', 't-100', 'english'),
(40, 'st-4', '9', 'p', '1', '2021-10-25', 't-100', 'english'),
(41, 'st-5', '9', 'p', '1', '2021-10-25', 't-100', 'english'),
(42, 'st-6', '9', 'p', '1', '2021-10-25', 't-100', 'english'),
(43, 'st-1', '9', 'p', '1', '2021-10-26', 't-100', 'english'),
(44, 'st-106', '9', 'p', '1', '2021-10-26', 't-100', 'english'),
(45, 'st-2', '9', 'p', '1', '2021-10-26', 't-100', 'english'),
(46, 'st-3', '9', 'p', '1', '2021-10-26', 't-100', 'english'),
(47, 'st-4', '9', 'p', '1', '2021-10-26', 't-100', 'english'),
(48, 'st-5', '9', 'p', '1', '2021-10-26', 't-100', 'english'),
(49, 'st-6', '9', 'p', '1', '2021-10-26', 't-100', 'english'),
(50, 'st-1', '9', 'p', '1', '2021-10-30', 't-100', 'english'),
(51, 'st-106', '9', 'p', '1', '2021-10-30', 't-100', 'english'),
(52, 'st-2', '9', 'p', '1', '2021-10-30', 't-100', 'english'),
(53, 'st-3', '9', 'p', '1', '2021-10-30', 't-100', 'english'),
(54, 'st-4', '9', 'p', '1', '2021-10-30', 't-100', 'english'),
(55, 'st-5', '9', 'p', '1', '2021-10-30', 't-100', 'english'),
(56, 'st-6', '9', 'p', '1', '2021-10-30', 't-100', 'english'),
(76, 'st-5', '9', 'p', '1', '2021-11-03', 't-100', 'english'),
(75, 'st-4', '9', 'p', '1', '2021-11-03', 't-100', 'english'),
(74, 'st-3', '9', 'p', '1', '2021-11-03', 't-100', 'english'),
(66, 'st-2', '9', 'p', '1', '2021-11-2', 't-100', 'english'),
(73, 'st-2', '9', 'p', '1', '2021-11-03', 't-100', 'english'),
(72, 'st-106', '9', 'p', '1', '2021-11-03', 't-100', 'english'),
(71, 'st-1', '9', 'p', '1', '2021-11-03', 't-100', 'english'),
(77, 'st-6', '9', 'p', '1', '2021-11-03', 't-100', 'english'),
(78, 'st-1', '9', 'p', '1', '2021-11-03', 't-96', 'computer'),
(79, 'st-106', '9', 'p', '1', '2021-11-03', 't-96', 'computer'),
(80, 'st-2', '9', 'p', '1', '2021-11-03', 't-96', 'computer'),
(81, 'st-3', '9', 'p', '1', '2021-11-03', 't-96', 'computer'),
(82, 'st-4', '9', 'p', '1', '2021-11-03', 't-96', 'computer'),
(83, 'st-5', '9', 'p', '1', '2021-11-03', 't-96', 'computer'),
(84, 'st-6', '9', 'p', '1', '2021-11-03', 't-96', 'computer'),
(85, 'st-1', '9', 'p', '1', '2021-11-27', 't-96', 'computer'),
(86, 'st-106', '9', 'p', '1', '2021-11-27', 't-96', 'computer'),
(87, 'st-2', '9', 'p', '1', '2021-11-27', 't-96', 'computer'),
(88, 'st-3', '9', 'p', '1', '2021-11-27', 't-96', 'computer'),
(89, 'st-4', '9', 'p', '1', '2021-11-27', 't-96', 'computer'),
(90, 'st-5', '9', 'p', '1', '2021-11-27', 't-96', 'computer'),
(91, 'st-6', '9', 'p', '1', '2021-11-27', 't-96', 'computer'),
(92, 'st-1', '9', 'p', '1', '2021-12-09', 't-96', 'computer'),
(93, 'st-106', '9', 'p', '1', '2021-12-09', 't-96', 'computer'),
(94, 'st-2', '9', 'p', '1', '2021-12-09', 't-96', 'computer'),
(95, 'st-3', '9', 'p', '1', '2021-12-09', 't-96', 'computer'),
(96, 'st-4', '9', 'p', '1', '2021-12-09', 't-96', 'computer'),
(97, 'st-5', '9', 'p', '1', '2021-12-09', 't-96', 'computer'),
(98, 'st-6', '9', 'p', '1', '2021-12-09', 't-96', 'computer'),
(99, 'st-1', '9', 'p', '1', '2021-12-26', 't-96', 'computer'),
(100, 'st-106', '9', 'p', '1', '2021-12-26', 't-96', 'computer'),
(101, 'st-2', '9', 'p', '1', '2021-12-26', 't-96', 'computer'),
(102, 'st-3', '9', 'p', '1', '2021-12-26', 't-96', 'computer'),
(103, 'st-4', '9', 'p', '1', '2021-12-26', 't-96', 'computer'),
(104, 'st-5', '9', 'p', '1', '2021-12-26', 't-96', 'computer'),
(105, 'st-6', '9', 'p', '1', '2021-12-26', 't-96', 'computer'),
(106, 'st-1', '9', 'p', '1', '2022-01-25', 't-96', 'computer'),
(107, 'st-106', '9', 'p', '1', '2022-01-25', 't-96', 'computer'),
(108, 'st-2', '9', 'p', '1', '2022-01-25', 't-96', 'computer'),
(109, 'st-3', '9', 'p', '1', '2022-01-25', 't-96', 'computer'),
(110, 'st-4', '9', 'p', '1', '2022-01-25', 't-96', 'computer'),
(111, 'st-5', '9', 'p', '1', '2022-01-25', 't-96', 'computer'),
(112, 'st-6', '9', 'p', '0', '2022-01-25', 't-96', 'computer'),
(113, 'st-1', '9', 'p', '1', '2022-02-03', 't-96', 'computer'),
(114, 'st-106', '9', 'p', '1', '2022-02-03', 't-96', 'computer'),
(115, 'st-2', '9', 'p', '1', '2022-02-03', 't-96', 'computer'),
(116, 'st-3', '9', 'p', '1', '2022-02-03', 't-96', 'computer'),
(117, 'st-4', '9', 'p', '1', '2022-02-03', 't-96', 'computer'),
(118, 'st-5', '9', 'p', '0', '2022-02-03', 't-96', 'computer'),
(119, 'st-1', '9', 'p', '1', '2022-02-21', 't-96', 'computer'),
(120, 'st-106', '9', 'p', '1', '2022-02-21', 't-96', 'computer'),
(121, 'st-2', '9', 'p', '1', '2022-02-21', 't-96', 'computer'),
(122, 'st-3', '9', 'p', '1', '2022-02-21', 't-96', 'computer'),
(123, 'st-4', '9', 'p', '1', '2022-02-21', 't-96', 'computer'),
(124, 'st-5', '9', 'p', '0', '2022-02-21', 't-96', 'computer'),
(125, 'st-1', '9', 'p', '1', '2022-02-23', 't-96', 'computer'),
(126, 'st-106', '9', 'p', '1', '2022-02-23', 't-96', 'computer'),
(127, 'st-2', '9', 'p', '1', '2022-02-23', 't-96', 'computer'),
(128, 'st-3', '9', 'p', '1', '2022-02-23', 't-96', 'computer'),
(129, 'st-4', '9', 'p', '1', '2022-02-23', 't-96', 'computer'),
(130, 'st-5', '9', 'p', '0', '2022-02-23', 't-96', 'computer'),
(131, 'st-1', '9', 'p', '0', '2022-03-30', 't-96', 'computer'),
(132, 'st-106', '9', 'p', '1', '2022-03-30', 't-96', 'computer'),
(133, 'st-2', '9', 'p', '1', '2022-03-30', 't-96', 'computer'),
(134, 'st-3', '9', 'p', '0', '2022-03-30', 't-96', 'computer'),
(135, 'st-4', '9', 'p', '0', '2022-03-30', 't-96', 'computer'),
(136, 'st-5', '9', 'p', '0', '2022-03-30', 't-96', 'computer'),
(137, 'st-1', '9', 'p', '0', '2022-03-26', 't-96', 'computer'),
(138, 'st-106', '9', 'p', '0', '2022-03-26', 't-96', 'computer'),
(139, 'st-2', '9', 'p', '0', '2022-03-26', 't-96', 'computer'),
(140, 'st-3', '9', 'p', '0', '2022-03-26', 't-96', 'computer'),
(141, 'st-4', '9', 'p', '0', '2022-03-26', 't-96', 'computer'),
(142, 'st-5', '9', 'p', '0', '2022-03-26', 't-96', 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `att_entry`
--

CREATE TABLE `att_entry` (
  `att_id` int(10) NOT NULL,
  `t_id` varchar(200) NOT NULL,
  `class` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `dateTaken` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `att_entry`
--

INSERT INTO `att_entry` (`att_id`, `t_id`, `class`, `section`, `dateTaken`, `subject`, `status`) VALUES
(3, 't-96', '9', 'p', '2021-10-17', 'computer', 1),
(4, 't-100', '9', 'p', '2021-10-17', 'english', 1),
(5, 't-100', '9', 'p', '2021-10-21', 'english', 1),
(6, 't-100', '9', 'p', '2021-10-25', 'english', 1),
(7, 't-100', '9', 'p', '2021-10-26', 'english', 1),
(11, 't-100', '9', 'p', '2021-11-03', 'english', 1),
(12, 't-96', '9', 'p', '2021-11-03', 'computer', 1),
(13, 't-96', '9', 'p', '2021-11-27', 'computer', 1),
(14, 't-96', '9', 'p', '2021-12-09', 'computer', 1),
(15, 't-96', '9', 'p', '2021-12-26', 'computer', 1),
(16, 't-96', '9', 'p', '2022-01-25', 'computer', 1),
(17, 't-96', '9', 'p', '2022-02-03', 'computer', 1),
(18, 't-96', '9', 'p', '2022-02-21', 'computer', 1),
(19, 't-96', '9', 'p', '2022-02-23', 'computer', 1),
(20, 't-96', '9', 'p', '2022-03-30', 'computer', 1),
(21, 't-96', '9', 'p', '2022-03-26', 'computer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dairy`
--

CREATE TABLE `dairy` (
  `dairy_id` int(11) NOT NULL,
  `dairy` text NOT NULL,
  `class` varchar(12) NOT NULL,
  `section` varchar(12) NOT NULL,
  `sub` text NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT 'none',
  `t_id` text NOT NULL,
  `t_name` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dairy`
--

INSERT INTO `dairy` (`dairy_id`, `dairy`, `class`, `section`, `sub`, `file`, `t_id`, `t_name`, `date`) VALUES
(7, 'kljklj', '9', 'p', 'jkjk', '../dairy/teacher dairy-t-96-9-p', 't-96', 'test_teacher', ''),
(8, 'knkk', '9', 'p', 'jkbbjk', 'none', 't-96', 'test_teacher', ''),
(9, ';kljkl', '9', 'p', 'jkkhkjhk', 'none', 't-96', 'test_teacher', ''),
(10, 'kljkl', '9', 'p', 'jkjk', 'none', 't-96', 'test_teacher', '02-07-2022');

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE `marksheet` (
  `result_id` int(255) NOT NULL,
  `roll_no` varchar(255) NOT NULL COMMENT 'Student Roll no',
  `subject` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `t_id` varchar(255) NOT NULL,
  `test_id` varchar(255) NOT NULL,
  `total_marks_obtained` varchar(20) NOT NULL COMMENT 'Marks',
  `test_name` varchar(100) NOT NULL,
  `remarks` varchar(20) DEFAULT NULL COMMENT 'cheating or something'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marksheet`
--

INSERT INTO `marksheet` (`result_id`, `roll_no`, `subject`, `class`, `section`, `t_id`, `test_id`, `total_marks_obtained`, `test_name`, `remarks`) VALUES
(157, 'st-1', 'english', '9', 'p', 't-100', '6', '43', 'test', 'Excellent'),
(158, 'st-106', 'english', '9', 'p', 't-100', '6', '12', 'test', 'Fair'),
(159, 'st-2', 'english', '9', 'p', 't-100', '6', '9', 'test', 'Excellent'),
(160, 'st-3', 'english', '9', 'p', 't-100', '6', '43', 'test', 'Excellent'),
(161, 'st-4', 'english', '9', 'p', 't-100', '6', '43', 'test', 'Good'),
(162, 'st-5', 'english', '9', 'p', 't-100', '6', '0', 'test', 'Fail'),
(163, 'st-6', 'english', '9', 'p', 't-100', '6', '90', 'test', 'Excellent'),
(164, 'st-1', 'english', '9', 'p', 't-100', '7', 'pending', 's', 'pending'),
(165, 'st-106', 'english', '9', 'p', 't-100', '7', 'pending', 's', 'pending'),
(166, 'st-2', 'english', '9', 'p', 't-100', '7', 'pending', 's', 'pending'),
(167, 'st-3', 'english', '9', 'p', 't-100', '7', 'pending', 's', 'pending'),
(168, 'st-4', 'english', '9', 'p', 't-100', '7', 'pending', 's', 'pending'),
(169, 'st-5', 'english', '9', 'p', 't-100', '7', 'pending', 's', 'pending'),
(170, 'st-6', 'english', '9', 'p', 't-100', '7', 'pending', 's', 'pending'),
(171, 'st-1', 'english', '9', 'p', 't-100', '8', 'pending', 'testssd', 'pending'),
(172, 'st-106', 'english', '9', 'p', 't-100', '8', 'pending', 'testssd', 'pending'),
(173, 'st-2', 'english', '9', 'p', 't-100', '8', 'pending', 'testssd', 'pending'),
(174, 'st-3', 'english', '9', 'p', 't-100', '8', 'pending', 'testssd', 'pending'),
(175, 'st-4', 'english', '9', 'p', 't-100', '8', 'pending', 'testssd', 'pending'),
(176, 'st-5', 'english', '9', 'p', 't-100', '8', 'pending', 'testssd', 'pending'),
(177, 'st-6', 'english', '9', 'p', 't-100', '8', 'pending', 'testssd', 'pending'),
(178, 'st-1', 'english', '9', 'p', 't-100', '9', '9', 'testssd111', 'Fair'),
(179, 'st-106', 'english', '9', 'p', 't-100', '9', 'pending', 'testssd111', 'pending'),
(180, 'st-2', 'english', '9', 'p', 't-100', '9', 'pending', 'testssd111', 'pending'),
(181, 'st-3', 'english', '9', 'p', 't-100', '9', 'pending', 'testssd111', 'pending'),
(182, 'st-4', 'english', '9', 'p', 't-100', '9', 'pending', 'testssd111', 'pending'),
(183, 'st-5', 'english', '9', 'p', 't-100', '9', 'pending', 'testssd111', 'pending'),
(184, 'st-6', 'english', '9', 'p', 't-100', '9', 'pending', 'testssd111', 'pending'),
(192, 'st-1', 'Computer', '9', 'p', 't-100', '10', 'pending', 'yt', 'pending'),
(193, 'st-106', 'Computer', '9', 'p', 't-100', '10', 'pending', 'yt', 'pending'),
(194, 'st-2', 'Computer', '9', 'p', 't-100', '10', 'pending', 'yt', 'pending'),
(195, 'st-3', 'Computer', '9', 'p', 't-100', '10', 'pending', 'yt', 'pending'),
(196, 'st-4', 'Computer', '9', 'p', 't-100', '10', 'pending', 'yt', 'pending'),
(197, 'st-5', 'Computer', '9', 'p', 't-100', '10', 'pending', 'yt', 'pending'),
(198, 'st-6', 'Computer', '9', 'p', 't-100', '10', '23', 'yt', 'Fair'),
(199, 'st-1', 'computer', '9', 'p', 't-96', '11', '43', 'test_c', '--Good--'),
(200, 'st-106', 'computer', '9', 'p', 't-96', '11', '12', 'test_c', 'Good'),
(201, 'st-2', 'computer', '9', 'p', 't-96', '11', '43', 'test_c', 'Fair'),
(202, 'st-3', 'computer', '9', 'p', 't-96', '11', '9', 'test_c', 'Excellent'),
(203, 'st-4', 'computer', '9', 'p', 't-96', '11', '9', 'test_c', 'Good'),
(204, 'st-5', 'computer', '9', 'p', 't-96', '11', '12', 'test_c', 'Excellent'),
(205, 'st-6', 'computer', '9', 'p', 't-96', '11', '9', 'test_c', 'Good'),
(206, 'st-1', 'computer', '9', 'p', 't-96', '11', 'pending', 'test_c', 'pending'),
(207, 'st-106', 'computer', '9', 'p', 't-96', '11', 'pending', 'test_c', 'pending'),
(208, 'st-2', 'computer', '9', 'p', 't-96', '11', 'pending', 'test_c', 'pending'),
(209, 'st-3', 'computer', '9', 'p', 't-96', '11', 'pending', 'test_c', 'pending'),
(210, 'st-4', 'computer', '9', 'p', 't-96', '11', 'pending', 'test_c', 'pending'),
(211, 'st-5', 'computer', '9', 'p', 't-96', '11', 'pending', 'test_c', 'pending'),
(212, 'st-1', '', '9', 'p', 't-96', '12', '43', 'physics', 'Excellent'),
(213, 'st-106', '', '9', 'p', 't-96', '12', '12', 'physics', 'Fair'),
(214, 'st-2', '', '9', 'p', 't-96', '12', 'pending', 'physics', 'pending'),
(215, 'st-3', '', '9', 'p', 't-96', '12', 'pending', 'physics', 'pending'),
(216, 'st-4', '', '9', 'p', 't-96', '12', 'pending', 'physics', 'pending'),
(217, 'st-5', '', '9', 'p', 't-96', '12', 'pending', 'physics', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(255) NOT NULL,
  `parent_name` varchar(30) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `roll_no` varchar(255) NOT NULL COMMENT 'connect with student',
  `relationship` text NOT NULL COMMENT 'relationship Child',
  `class` varchar(10) NOT NULL,
  `section` varchar(20) NOT NULL,
  `phone_1` int(20) NOT NULL,
  `phone_2` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `p_Address` varchar(40) NOT NULL,
  `acc_approval` int(2) NOT NULL DEFAULT '0',
  `addedby` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `online_status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parent_id`, `parent_name`, `cnic`, `occupation`, `st_name`, `roll_no`, `relationship`, `class`, `section`, `phone_1`, `phone_2`, `username`, `password`, `email`, `Address`, `p_Address`, `acc_approval`, `addedby`, `user_image`, `online_status`) VALUES
(1, 'bhjai ', '99999999999999999999', 'klnklnklnkln', 'st-106', 'st-106', 'sjcnsjn', '9', 'p', 20, 2147483647, 'p-1', '123', 'ejdbjMBJKBJKBJKBJK@KKK', 'kklnklnkln^r5679///,lm9----90909u', 'kklnklnkln^r5679///,lm9----90909u', 1, '', '../profile_img/parent/parent--1-11.jfif', b'0'),
(5, 'k,nk', '7578578578', '', 'asd90', '901', 'kgjk', '', '', 0, 0, 'qq', '90', '', '', '', 1, '', '', b'0'),
(6, 'p_90', '7578578578', '', 'Test_st_90', '9090', 'kgjk', '', '', 0, 0, '90_pu', '90uu', '', '', '', 1, '', '', b'0'),
(9, 'jkjk', '121212', '', 'asd90', '2k20/MTH/106', 'aas', '', '', 0, 0, 'qq', '12333', '', '', '', 1, '', '', b'0'),
(10, 'auro-1', '998', '', 'io', 'oi', 'io', '', '', 0, 0, 'io', 'io', '', '', '', 1, '', '', b'0'),
(11, 'auro-1', '998', '', 'io', 'oi', 'io', '', '', 0, 0, 'io', 'io', '', '', '', 1, '', '', b'0'),
(12, 'Auto-parent-2', '8-0------97897897898', '', 'Auro-2', 'Auto-2', 'Father_check', '', '', 0, 0, 'a_p_2', 'opop', '', '', '', 1, 'daeyan', '../profile_img/parent/parent--12-ws cube tech.PNG', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `roll_no` varchar(255) NOT NULL COMMENT 'Roll Number of student',
  `name` varchar(50) NOT NULL DEFAULT 'Not Entered Yet',
  `class` varchar(10) NOT NULL,
  `section` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL DEFAULT 'Not Entered Yet',
  `st_cnic` varchar(30) NOT NULL,
  `st_phone` int(15) NOT NULL,
  `father_phone` int(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `p_address` varchar(255) NOT NULL COMMENT 'Permeant Address',
  `father_name` varchar(50) NOT NULL,
  `father_cnic` varchar(30) NOT NULL,
  `father_occupation` varchar(30) NOT NULL,
  `acc_approval` int(2) NOT NULL DEFAULT '0',
  `user_image` varchar(255) NOT NULL DEFAULT '0',
  `online_status` bit(1) NOT NULL DEFAULT b'0',
  `profile_lock` int(2) NOT NULL,
  `addedby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`roll_no`, `name`, `class`, `section`, `email`, `st_cnic`, `st_phone`, `father_phone`, `username`, `password`, `address`, `p_address`, `father_name`, `father_cnic`, `father_occupation`, `acc_approval`, `user_image`, `online_status`, `profile_lock`, `addedby`) VALUES
('', '', '', '', 'Not Entered Yet', '', 0, 0, '', '', '', '', '', '', '', 0, '0', b'0', 0, ''),
('10-q', 'daeyan', '10', 'i', 'io', '90', 90, 90, 'q', 'q', 'jkhkjhhj', 'jkhjkhjk', '', '', '', 1, '0', b'0', 0, ''),
('20-q', 'sid', '10', 'i', 'lkl', '', 75785578, 2147483647, 'h', 'h', 'klbj.l', 'klbj.l', '', 'jkk', 'm m,jkjkl', 1, '../profile_img/student/student-sid-20-q-self.PNG', b'0', 0, ''),
('33', 'vdf', 'fvfv', '$sec_st', '', '', 0, 0, '$uname_st', '$pass_st', '', '', '', '', '', 0, '0', b'0', 0, ''),
('9-q', 'op', '10', 'i', 'kl@g.m', '42401-697897879', 8239823, 738347, 'hi', 'kl', 'E-142, Latifabad Hyderabaf', 'E-142, Latifabad Hyderabaf', 'JSIO', '67', 'kl', 1, '../profile_img/student/student-op-9-q-ans.PNG', b'0', 0, ''),
('90', '90test', '7', 'i', '', '', 0, 0, 'op', 'op', '', '', '', '', '', 0, '0', b'0', 0, ''),
('9090', 'Test_st_90', '5', 'a', '', '', 0, 0, '90_st', '9012', '', '', '', '', '', 0, '0', b'0', 0, ''),
('Auto-2', 'Auro-2', 'Inter', 'u', 'Not Entered Yet', '', 0, 0, 'auto-2-u', 'qwe', '', '', '', '', '', 1, '../profile_img/student/student-Auro-2-Auto-2-Upwork.PNG', b'0', 0, 'daeyan'),
('auto_1', 'Auro-1', '3', 'a', 'Not Entered Yet', '', 0, 0, 'auto-1', 'auto-1', '', '', '', '', '', 0, '0', b'0', 0, ''),
('manual_1', 'test_manual', '7', 'i', 'Not Entered Yet', '', 0, 0, 'poi', '90', '', '', '', '', '', 0, '0', b'0', 0, ''),
('r-1', 'r-1', '10', 's', '', '', 0, 0, 'r-1', 'r-1', '', '', '', '', '', 1, '0', b'0', 0, ''),
('r-2', 'r-2', '2', 'p', '', '', 0, 0, 'r-2', 'r-2', '', '', '', '', '', 1, '0', b'0', 0, ''),
('r-3', 'r-3', '6', 'q', '', '', 0, 0, 'r-3', 'r-3', '', '', '', '', '', 0, '0', b'0', 0, ''),
('st-1', 'st-1', '9', 'p', ';llkkj', '', 0, 0, 'st-1', 'qwe', '', '', '', '', '', 1, '../profile_img/student/student-st-1-st-1-io.jpg', b'0', 0, ''),
('st-101', 'st-101', '10', 'p', '', '', 0, 0, 'st-101', 'st-101', '', '', '', '', '', 1, '0', b'0', 0, ''),
('st-102', 'st-102', '10', 'p', '', '', 0, 0, 'st-102', 'st-102', '', '', '', '', '', 1, '0', b'0', 0, ''),
('st-103', 'st-103', '10', 'p', '', '', 0, 0, 'st-103', 'st-103', '', '', '', '', '', 1, '0', b'0', 0, ''),
('st-104', 'st-104', '10', 'p', '', '', 0, 0, 'st-104', 'st-104', '', '', '', '', '', 1, '0', b'0', 0, ''),
('st-105', 'st-105', '10', 'p', '', '', 0, 0, 'st-105', 'st-105', '', '', '', '', '', 1, '0', b'0', 0, ''),
('st-106', 'st-106', '9', 'p', 'dgdgbdgdgdg@', '2323', 497049, 277823, 'st-106', '123', 'nknkn', 'h jkbjkbjk', 'ngxdnyj', 'jdytjdt', 'xryjn', 1, '../profile_img/student/student-st-106-st-106-111`111.jpg', b'0', 0, ''),
('st-2', 'st-2', '9', 'p', '', '', 0, 0, 'st-2', 'st-2', '', '', '', '', '', 0, '0', b'0', 0, ''),
('st-3', 'st-3', '9', 'p', '', '', 0, 0, 'st-3', 'st-3', '', '', '', '', '', 1, '0', b'0', 0, ''),
('st-4', 'st-4', '9', 'p', '22323', '32323', 46466, 664, 'st-4', 'st-4', 'fbfbfbf', 'fbfbfbf', '2323', '3223', '33', 1, '../profile_img/student/student-st-4-st-4-1630063967799.jfif', b'0', 0, ''),
('st-5', 'st-5', '9', 'p', '', '', 0, 0, 'st-5', 'st-5', '', '', '', '', '', 0, '0', b'0', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `class` varchar(29) NOT NULL,
  `section` varchar(20) NOT NULL,
  `added_by` varchar(20) NOT NULL COMMENT 'Added By Which Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `name`, `class`, `section`, `added_by`) VALUES
(5, 'computer', '9', 'p', 'daeyan'),
(6, 'math', '9', 'p', 'daeyan'),
(7, 'english', '9', 'p', '121212');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees`
--

CREATE TABLE `tbl_fees` (
  `ID` int(11) NOT NULL,
  `FEE_DATE` datetime NOT NULL,
  `FEE_AMOUNT` varchar(100) NOT NULL,
  `FEE_MONTH` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  `CREATEDBY` datetime NOT NULL,
  `CREATEDAT` datetime NOT NULL,
  `FEE_TYPE` varchar(100) NOT NULL,
  `HEADID` int(11) NOT NULL,
  `IS_ACTIVE` bit(1) NOT NULL,
  `IS_DELETE` bit(1) NOT NULL,
  `roll_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feestype_amountpaid`
--

CREATE TABLE `tbl_feestype_amountpaid` (
  `ID` int(11) NOT NULL,
  `Fee_Amount_Paid` int(11) NOT NULL,
  `Fee_Type` varchar(100) NOT NULL,
  `Frequency` varchar(50) NOT NULL,
  `Status` bit(1) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Is_Active` bit(1) NOT NULL,
  `Is_Delete` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feestype_amountpaid`
--

INSERT INTO `tbl_feestype_amountpaid` (`ID`, `Fee_Amount_Paid`, `Fee_Type`, `Frequency`, `Status`, `Amount`, `Is_Active`, `Is_Delete`) VALUES
(34, 42, 'Exam', '1', b'1', 100, b'0', b'0'),
(35, 42, 'Sport Fees', '1', b'1', 0, b'0', b'0'),
(36, 42, 'Activity', '1', b'1', 0, b'0', b'0'),
(37, 42, 'Online Fee', '1', b'1', 0, b'0', b'0'),
(38, 42, 'Monthly', '1', b'1', 0, b'0', b'0'),
(39, 42, 'samad', '1', b'1', 0, b'0', b'0'),
(40, 42, 'samad', '1', b'1', 0, b'0', b'0'),
(41, 42, 'check', '1', b'1', 0, b'0', b'0'),
(42, 42, 'Dress', '1', b'1', 0, b'0', b'0'),
(43, 42, 'lap', '1', b'1', 0, b'0', b'0'),
(44, 42, 'test', '1', b'1', 0, b'0', b'0'),
(45, 42, 'test', '1', b'1', 0, b'0', b'0'),
(46, 42, 'abc123', '1', b'1', 0, b'0', b'0'),
(47, 42, 'Computer_Lab', '1', b'1', 0, b'0', b'0'),
(48, 42, 'hjj', '1', b'1', 0, b'0', b'0'),
(49, 42, 'Session', '1', b'1', 0, b'0', b'0'),
(50, 42, 'Checkf', '0', b'1', 0, b'0', b'0'),
(51, 42, 'Monthly', '0', b'1', 0, b'0', b'0'),
(52, 42, 'Seesion', '0', b'1', 0, b'0', b'0'),
(53, 42, '', '0', b'1', 0, b'0', b'0'),
(54, 42, 'check4', '0', b'1', 0, b'0', b'0'),
(55, 42, '', '0', b'1', 0, b'0', b'0'),
(56, 42, 'check7', '0', b'1', 0, b'0', b'0'),
(57, 42, 'check8', '', b'1', 0, b'0', b'0'),
(58, 42, 'abc3', '', b'1', 0, b'0', b'0'),
(59, 42, 'final', 'Session', b'1', 0, b'0', b'0'),
(60, 42, 'MonthyyyFees', 'Monthly', b'1', 0, b'0', b'0'),
(61, 42, 'acha', 'Monthly', b'1', 0, b'0', b'0'),
(62, 42, 'stp', 'Session', b'1', 0, b'0', b'0'),
(63, 42, 'Sindh', 'Monthly', b'1', 0, b'0', b'0'),
(64, 43, 'Exam', '1', b'1', 100, b'1', b'0'),
(65, 43, 'Sport Fees', '1', b'1', 0, b'1', b'0'),
(66, 43, 'Activity', '1', b'1', 0, b'1', b'0'),
(67, 43, 'Online Fee', '1', b'1', 0, b'1', b'0'),
(68, 43, 'Monthly', '1', b'1', 0, b'1', b'0'),
(69, 43, 'samad', '1', b'1', 0, b'1', b'0'),
(70, 43, 'samad', '1', b'1', 0, b'1', b'0'),
(71, 43, 'check', '1', b'1', 0, b'1', b'0'),
(72, 43, 'Dress', '1', b'1', 0, b'1', b'0'),
(73, 43, 'lap', '1', b'1', 0, b'1', b'0'),
(74, 43, 'test', '1', b'1', 0, b'1', b'0'),
(75, 43, 'test', '1', b'1', 0, b'1', b'0'),
(76, 43, 'abc123', '1', b'1', 0, b'1', b'0'),
(77, 43, 'Computer_Lab', '1', b'1', 0, b'1', b'0'),
(78, 43, 'hjj', '1', b'1', 0, b'1', b'0'),
(79, 43, 'Session', '1', b'1', 0, b'1', b'0'),
(80, 43, 'Checkf', '0', b'1', 0, b'1', b'0'),
(81, 43, 'Monthly', '0', b'1', 0, b'1', b'0'),
(82, 43, 'Seesion', '0', b'1', 0, b'1', b'0'),
(83, 43, '', '0', b'1', 0, b'1', b'0'),
(84, 43, 'check4', '0', b'1', 0, b'1', b'0'),
(85, 43, '', '0', b'1', 0, b'1', b'0'),
(86, 43, 'check7', '0', b'1', 0, b'1', b'0'),
(87, 43, 'check8', '', b'1', 0, b'1', b'0'),
(88, 43, 'abc3', '', b'1', 0, b'1', b'0'),
(89, 43, 'final', 'Session', b'1', 0, b'1', b'0'),
(90, 43, 'MonthyyyFees', 'Monthly', b'1', 0, b'1', b'0'),
(91, 43, 'acha', 'Monthly', b'1', 0, b'1', b'0'),
(92, 43, 'stp', 'Session', b'1', 0, b'1', b'0'),
(93, 43, 'Sindh', 'Monthly', b'1', 0, b'1', b'0'),
(94, 44, 'Exam', '1', b'1', 2, b'1', b'0'),
(95, 44, 'Sport Fees', '1', b'1', 3, b'1', b'0'),
(96, 44, 'Activity', '1', b'1', 0, b'1', b'0'),
(97, 44, 'Online Fee', '1', b'1', 0, b'1', b'0'),
(98, 44, 'Monthly', '1', b'1', 0, b'1', b'0'),
(99, 44, 'samad', '1', b'1', 0, b'1', b'0'),
(100, 44, 'samad', '1', b'1', 0, b'1', b'0'),
(101, 44, 'check', '1', b'1', 0, b'1', b'0'),
(102, 44, 'Dress', '1', b'1', 0, b'1', b'0'),
(103, 44, 'lap', '1', b'1', 0, b'1', b'0'),
(104, 44, 'test', '1', b'1', 0, b'1', b'0'),
(105, 44, 'test', '1', b'1', 0, b'1', b'0'),
(106, 44, 'abc123', '1', b'1', 0, b'1', b'0'),
(107, 44, 'Computer_Lab', '1', b'1', 0, b'1', b'0'),
(108, 44, 'hjj', '1', b'1', 0, b'1', b'0'),
(109, 44, 'Session', '1', b'1', 0, b'1', b'0'),
(110, 44, 'Checkf', '0', b'1', 0, b'1', b'0'),
(111, 44, 'Monthly', '0', b'1', 0, b'1', b'0'),
(112, 44, 'Seesion', '0', b'1', 0, b'1', b'0'),
(113, 44, '', '0', b'1', 0, b'1', b'0'),
(114, 44, 'check4', '0', b'1', 0, b'1', b'0'),
(115, 44, '', '0', b'1', 0, b'1', b'0'),
(116, 44, 'check7', '0', b'1', 0, b'1', b'0'),
(117, 44, 'check8', '', b'1', 0, b'1', b'0'),
(118, 44, 'abc3', '', b'1', 0, b'1', b'0'),
(119, 44, 'final', 'Session', b'1', 0, b'1', b'0'),
(120, 44, 'MonthyyyFees', 'Monthly', b'1', 0, b'1', b'0'),
(121, 44, 'acha', 'Monthly', b'1', 0, b'1', b'0'),
(122, 44, 'stp', 'Session', b'1', 0, b'1', b'0'),
(123, 44, 'Sindh', 'Monthly', b'1', 0, b'1', b'0'),
(124, 45, 'Exam', '1', b'1', 8, b'1', b'0'),
(125, 45, 'Sport Fees', '1', b'1', 767, b'1', b'0'),
(126, 45, 'Activity', '1', b'1', 0, b'1', b'0'),
(127, 45, 'Online Fee', '1', b'1', 0, b'1', b'0'),
(128, 45, 'Monthly', '1', b'1', 0, b'1', b'0'),
(129, 45, 'samad', '1', b'1', 0, b'1', b'0'),
(130, 45, 'samad', '1', b'1', 0, b'1', b'0'),
(131, 45, 'check', '1', b'1', 0, b'1', b'0'),
(132, 45, 'Dress', '1', b'1', 0, b'1', b'0'),
(133, 45, 'lap', '1', b'1', 0, b'1', b'0'),
(134, 45, 'test', '1', b'1', 0, b'1', b'0'),
(135, 45, 'test', '1', b'1', 0, b'1', b'0'),
(136, 45, 'abc123', '1', b'1', 0, b'1', b'0'),
(137, 45, 'Computer_Lab', '1', b'1', 0, b'1', b'0'),
(138, 45, 'hjj', '1', b'1', 0, b'1', b'0'),
(139, 45, 'Session', '1', b'1', 0, b'1', b'0'),
(140, 45, 'Checkf', '0', b'1', 0, b'1', b'0'),
(141, 45, 'Monthly', '0', b'1', 0, b'1', b'0'),
(142, 45, 'Seesion', '0', b'1', 0, b'1', b'0'),
(143, 45, '', '0', b'1', 0, b'1', b'0'),
(144, 45, 'check4', '0', b'1', 0, b'1', b'0'),
(145, 45, '', '0', b'1', 0, b'1', b'0'),
(146, 45, 'check7', '0', b'1', 0, b'1', b'0'),
(147, 45, 'check8', '', b'1', 0, b'1', b'0'),
(148, 45, 'abc3', '', b'1', 0, b'1', b'0'),
(149, 45, 'final', 'Session', b'1', 0, b'1', b'0'),
(150, 45, 'MonthyyyFees', 'Monthly', b'1', 0, b'1', b'0'),
(151, 45, 'acha', 'Monthly', b'1', 0, b'1', b'0'),
(152, 45, 'stp', 'Session', b'1', 0, b'1', b'0'),
(153, 45, 'Sindh', 'Monthly', b'1', 0, b'1', b'0'),
(154, 46, 'Exam', '1', b'1', 0, b'1', b'0'),
(155, 46, 'Sport Fees', '1', b'1', 0, b'1', b'0'),
(156, 46, 'Activity', '1', b'1', 0, b'1', b'0'),
(157, 46, 'Online Fee', '1', b'1', 0, b'1', b'0'),
(158, 46, 'Monthly', '1', b'1', 0, b'1', b'0'),
(159, 46, 'samad', '1', b'1', 0, b'1', b'0'),
(160, 46, 'samad', '1', b'1', 0, b'1', b'0'),
(161, 46, 'check', '1', b'1', 0, b'1', b'0'),
(162, 46, 'Dress', '1', b'1', 0, b'1', b'0'),
(163, 46, 'lap', '1', b'1', 0, b'1', b'0'),
(164, 46, 'test', '1', b'1', 0, b'1', b'0'),
(165, 46, 'test', '1', b'1', 0, b'1', b'0'),
(166, 46, 'abc123', '1', b'1', 0, b'1', b'0'),
(167, 46, 'Computer_Lab', '1', b'1', 0, b'1', b'0'),
(168, 46, 'hjj', '1', b'1', 0, b'1', b'0'),
(169, 46, 'Session', '1', b'1', 0, b'1', b'0'),
(170, 46, 'Checkf', '0', b'1', 0, b'1', b'0'),
(171, 46, 'Monthly', '0', b'1', 0, b'1', b'0'),
(172, 46, 'Seesion', '0', b'1', 0, b'1', b'0'),
(173, 46, '', '0', b'1', 0, b'1', b'0'),
(174, 46, 'check4', '0', b'1', 0, b'1', b'0'),
(175, 46, '', '0', b'1', 0, b'1', b'0'),
(176, 46, 'check7', '0', b'1', 0, b'1', b'0'),
(177, 46, 'check8', '', b'1', 0, b'1', b'0'),
(178, 46, 'abc3', '', b'1', 0, b'1', b'0'),
(179, 46, 'final', 'Session', b'1', 0, b'1', b'0'),
(180, 46, 'MonthyyyFees', 'Monthly', b'1', 0, b'1', b'0'),
(181, 46, 'acha', 'Monthly', b'1', 0, b'1', b'0'),
(182, 46, 'stp', 'Session', b'1', 0, b'1', b'0'),
(183, 46, 'Sindh', 'Monthly', b'1', 0, b'1', b'0'),
(184, 47, 'Exam', '1', b'0', 665, b'1', b'0'),
(185, 47, 'Sport Fees', '1', b'0', 76, b'1', b'0'),
(186, 47, 'Activity', '1', b'0', 0, b'1', b'0'),
(187, 47, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(188, 47, 'Monthly', '1', b'0', 0, b'1', b'0'),
(189, 47, 'samad', '1', b'0', 0, b'1', b'0'),
(190, 47, 'samad', '1', b'0', 0, b'1', b'0'),
(191, 47, 'check', '1', b'0', 0, b'1', b'0'),
(192, 47, 'Dress', '1', b'0', 0, b'1', b'0'),
(193, 47, 'lap', '1', b'0', 0, b'1', b'0'),
(194, 47, 'test', '1', b'0', 0, b'1', b'0'),
(195, 47, 'test', '1', b'0', 0, b'1', b'0'),
(196, 47, 'abc123', '1', b'0', 0, b'1', b'0'),
(197, 47, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(198, 47, 'hjj', '1', b'0', 0, b'1', b'0'),
(199, 47, 'Session', '1', b'0', 0, b'1', b'0'),
(200, 47, 'Checkf', '0', b'0', 0, b'1', b'0'),
(201, 47, 'Monthly', '0', b'0', 0, b'1', b'0'),
(202, 47, 'Seesion', '0', b'0', 0, b'1', b'0'),
(203, 47, '', '0', b'0', 0, b'1', b'0'),
(204, 47, 'check4', '0', b'0', 0, b'1', b'0'),
(205, 47, '', '0', b'0', 0, b'1', b'0'),
(206, 47, 'check7', '0', b'0', 0, b'1', b'0'),
(207, 47, 'check8', '', b'0', 0, b'1', b'0'),
(208, 47, 'abc3', '', b'0', 0, b'1', b'0'),
(209, 47, 'final', 'Session', b'0', 0, b'1', b'0'),
(210, 47, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(211, 47, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(212, 47, 'stp', 'Session', b'0', 0, b'1', b'0'),
(213, 47, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(214, 48, 'Exam', '1', b'0', 786, b'1', b'0'),
(215, 48, 'Sport Fees', '1', b'0', 768, b'1', b'0'),
(216, 48, 'Activity', '1', b'0', 0, b'1', b'0'),
(217, 48, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(218, 48, 'Monthly', '1', b'0', 0, b'1', b'0'),
(219, 48, 'samad', '1', b'0', 0, b'1', b'0'),
(220, 48, 'samad', '1', b'0', 0, b'1', b'0'),
(221, 48, 'check', '1', b'0', 0, b'1', b'0'),
(222, 48, 'Dress', '1', b'0', 0, b'1', b'0'),
(223, 48, 'lap', '1', b'0', 0, b'1', b'0'),
(224, 48, 'test', '1', b'0', 0, b'1', b'0'),
(225, 48, 'test', '1', b'0', 0, b'1', b'0'),
(226, 48, 'abc123', '1', b'0', 0, b'1', b'0'),
(227, 48, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(228, 48, 'hjj', '1', b'0', 0, b'1', b'0'),
(229, 48, 'Session', '1', b'0', 0, b'1', b'0'),
(230, 48, 'Checkf', '0', b'0', 0, b'1', b'0'),
(231, 48, 'Monthly', '0', b'0', 0, b'1', b'0'),
(232, 48, 'Seesion', '0', b'0', 0, b'1', b'0'),
(233, 48, '', '0', b'0', 0, b'1', b'0'),
(234, 48, 'check4', '0', b'0', 0, b'1', b'0'),
(235, 48, '', '0', b'0', 0, b'1', b'0'),
(236, 48, 'check7', '0', b'0', 0, b'1', b'0'),
(237, 48, 'check8', '', b'0', 0, b'1', b'0'),
(238, 48, 'abc3', '', b'0', 0, b'1', b'0'),
(239, 48, 'final', 'Session', b'0', 0, b'1', b'0'),
(240, 48, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(241, 48, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(242, 48, 'stp', 'Session', b'0', 0, b'1', b'0'),
(243, 48, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(244, 49, 'Exam', '1', b'1', 76567, b'1', b'0'),
(245, 49, 'Sport Fees', '1', b'1', 7889, b'1', b'0'),
(246, 49, 'Activity', '1', b'0', 0, b'1', b'0'),
(247, 49, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(248, 49, 'Monthly', '1', b'0', 0, b'1', b'0'),
(249, 49, 'samad', '1', b'0', 0, b'1', b'0'),
(250, 49, 'samad', '1', b'0', 0, b'1', b'0'),
(251, 49, 'check', '1', b'0', 0, b'1', b'0'),
(252, 49, 'Dress', '1', b'0', 0, b'1', b'0'),
(253, 49, 'lap', '1', b'0', 0, b'1', b'0'),
(254, 49, 'test', '1', b'0', 0, b'1', b'0'),
(255, 49, 'test', '1', b'0', 0, b'1', b'0'),
(256, 49, 'abc123', '1', b'0', 0, b'1', b'0'),
(257, 49, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(258, 49, 'hjj', '1', b'0', 0, b'1', b'0'),
(259, 49, 'Session', '1', b'0', 0, b'1', b'0'),
(260, 49, 'Checkf', '0', b'0', 0, b'1', b'0'),
(261, 49, 'Monthly', '0', b'0', 0, b'1', b'0'),
(262, 49, 'Seesion', '0', b'0', 0, b'1', b'0'),
(263, 49, '', '0', b'0', 0, b'1', b'0'),
(264, 49, 'check4', '0', b'0', 0, b'1', b'0'),
(265, 49, '', '0', b'0', 0, b'1', b'0'),
(266, 49, 'check7', '0', b'0', 0, b'1', b'0'),
(267, 49, 'check8', '', b'0', 0, b'1', b'0'),
(268, 49, 'abc3', '', b'0', 0, b'1', b'0'),
(269, 49, 'final', 'Session', b'0', 0, b'1', b'0'),
(270, 49, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(271, 49, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(272, 49, 'stp', 'Session', b'0', 0, b'1', b'0'),
(273, 49, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(274, 50, 'Exam', '1', b'1', 90, b'1', b'0'),
(275, 50, 'Sport Fees', '1', b'1', 132, b'1', b'0'),
(276, 50, 'Activity', '1', b'0', 0, b'1', b'0'),
(277, 50, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(278, 50, 'Monthly', '1', b'0', 0, b'1', b'0'),
(279, 50, 'samad', '1', b'0', 0, b'1', b'0'),
(280, 50, 'samad', '1', b'0', 0, b'1', b'0'),
(281, 50, 'check', '1', b'0', 0, b'1', b'0'),
(282, 50, 'Dress', '1', b'0', 0, b'1', b'0'),
(283, 50, 'lap', '1', b'0', 0, b'1', b'0'),
(284, 50, 'test', '1', b'0', 0, b'1', b'0'),
(285, 50, 'test', '1', b'0', 0, b'1', b'0'),
(286, 50, 'abc123', '1', b'0', 0, b'1', b'0'),
(287, 50, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(288, 50, 'hjj', '1', b'0', 0, b'1', b'0'),
(289, 50, 'Session', '1', b'0', 0, b'1', b'0'),
(290, 50, 'Checkf', '0', b'0', 0, b'1', b'0'),
(291, 50, 'Monthly', '0', b'0', 0, b'1', b'0'),
(292, 50, 'Seesion', '0', b'0', 0, b'1', b'0'),
(293, 50, '', '0', b'0', 0, b'1', b'0'),
(294, 50, 'check4', '0', b'0', 0, b'1', b'0'),
(295, 50, '', '0', b'0', 0, b'1', b'0'),
(296, 50, 'check7', '0', b'0', 0, b'1', b'0'),
(297, 50, 'check8', '', b'0', 0, b'1', b'0'),
(298, 50, 'abc3', '', b'0', 0, b'1', b'0'),
(299, 50, 'final', 'Session', b'0', 0, b'1', b'0'),
(300, 50, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(301, 50, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(302, 50, 'stp', 'Session', b'0', 0, b'1', b'0'),
(303, 50, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(304, 51, 'Exam', '1', b'1', 6678, b'1', b'0'),
(305, 51, 'Sport Fees', '1', b'0', 0, b'1', b'0'),
(306, 51, 'Activity', '1', b'0', 0, b'1', b'0'),
(307, 51, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(308, 51, 'Monthly', '1', b'0', 0, b'1', b'0'),
(309, 51, 'samad', '1', b'0', 0, b'1', b'0'),
(310, 52, 'Exam', '1', b'1', 6678, b'1', b'0'),
(311, 51, 'samad', '1', b'0', 0, b'1', b'0'),
(312, 52, 'Sport Fees', '1', b'0', 0, b'1', b'0'),
(313, 51, 'check', '1', b'0', 0, b'1', b'0'),
(314, 52, 'Activity', '1', b'0', 0, b'1', b'0'),
(315, 51, 'Dress', '1', b'0', 0, b'1', b'0'),
(316, 53, 'Exam', '1', b'1', 6678, b'1', b'0'),
(317, 52, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(318, 51, 'lap', '1', b'0', 0, b'1', b'0'),
(319, 53, 'Sport Fees', '1', b'0', 0, b'1', b'0'),
(320, 52, 'Monthly', '1', b'0', 0, b'1', b'0'),
(321, 54, 'Exam', '1', b'1', 6678, b'1', b'0'),
(322, 51, 'test', '1', b'0', 0, b'1', b'0'),
(323, 53, 'Activity', '1', b'0', 0, b'1', b'0'),
(324, 52, 'samad', '1', b'0', 0, b'1', b'0'),
(325, 53, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(326, 54, 'Sport Fees', '1', b'0', 0, b'1', b'0'),
(327, 51, 'test', '1', b'0', 0, b'1', b'0'),
(328, 53, 'Monthly', '1', b'0', 0, b'1', b'0'),
(329, 54, 'Activity', '1', b'0', 0, b'1', b'0'),
(330, 52, 'samad', '1', b'0', 0, b'1', b'0'),
(331, 51, 'abc123', '1', b'0', 0, b'1', b'0'),
(332, 54, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(333, 51, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(334, 53, 'samad', '1', b'0', 0, b'1', b'0'),
(335, 54, 'Monthly', '1', b'0', 0, b'1', b'0'),
(336, 52, 'check', '1', b'0', 0, b'1', b'0'),
(337, 51, 'hjj', '1', b'0', 0, b'1', b'0'),
(338, 53, 'samad', '1', b'0', 0, b'1', b'0'),
(339, 52, 'Dress', '1', b'0', 0, b'1', b'0'),
(340, 54, 'samad', '1', b'0', 0, b'1', b'0'),
(341, 51, 'Session', '1', b'1', 8789, b'1', b'0'),
(342, 53, 'check', '1', b'0', 0, b'1', b'0'),
(343, 52, 'lap', '1', b'0', 0, b'1', b'0'),
(344, 51, 'Checkf', '0', b'0', 0, b'1', b'0'),
(345, 54, 'samad', '1', b'0', 0, b'1', b'0'),
(346, 53, 'Dress', '1', b'0', 0, b'1', b'0'),
(347, 52, 'test', '1', b'0', 0, b'1', b'0'),
(348, 54, 'check', '1', b'0', 0, b'1', b'0'),
(349, 51, 'Monthly', '0', b'0', 0, b'1', b'0'),
(350, 52, 'test', '1', b'0', 0, b'1', b'0'),
(351, 53, 'lap', '1', b'0', 0, b'1', b'0'),
(352, 54, 'Dress', '1', b'0', 0, b'1', b'0'),
(353, 51, 'Seesion', '0', b'0', 0, b'1', b'0'),
(354, 53, 'test', '1', b'0', 0, b'1', b'0'),
(355, 54, 'lap', '1', b'0', 0, b'1', b'0'),
(356, 52, 'abc123', '1', b'0', 0, b'1', b'0'),
(357, 51, '', '0', b'0', 0, b'1', b'0'),
(358, 52, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(359, 53, 'test', '1', b'0', 0, b'1', b'0'),
(360, 54, 'test', '1', b'0', 0, b'1', b'0'),
(361, 51, 'check4', '0', b'0', 0, b'1', b'0'),
(362, 52, 'hjj', '1', b'0', 0, b'1', b'0'),
(363, 54, 'test', '1', b'0', 0, b'1', b'0'),
(364, 53, 'abc123', '1', b'0', 0, b'1', b'0'),
(365, 52, 'Session', '1', b'1', 8789, b'1', b'0'),
(366, 51, '', '0', b'0', 0, b'1', b'0'),
(367, 53, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(368, 54, 'abc123', '1', b'0', 0, b'1', b'0'),
(369, 52, 'Checkf', '0', b'0', 0, b'1', b'0'),
(370, 51, 'check7', '0', b'0', 0, b'1', b'0'),
(371, 53, 'hjj', '1', b'0', 0, b'1', b'0'),
(372, 54, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(373, 52, 'Monthly', '0', b'0', 0, b'1', b'0'),
(374, 51, 'check8', '', b'0', 0, b'1', b'0'),
(375, 53, 'Session', '1', b'1', 8789, b'1', b'0'),
(376, 54, 'hjj', '1', b'0', 0, b'1', b'0'),
(377, 51, 'abc3', '', b'0', 0, b'1', b'0'),
(378, 52, 'Seesion', '0', b'0', 0, b'1', b'0'),
(379, 54, 'Session', '1', b'1', 8789, b'1', b'0'),
(380, 53, 'Checkf', '0', b'0', 0, b'1', b'0'),
(381, 51, 'final', 'Session', b'0', 0, b'1', b'0'),
(382, 54, 'Checkf', '0', b'0', 0, b'1', b'0'),
(383, 52, '', '0', b'0', 0, b'1', b'0'),
(384, 53, 'Monthly', '0', b'0', 0, b'1', b'0'),
(385, 54, 'Monthly', '0', b'0', 0, b'1', b'0'),
(386, 51, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(387, 52, 'check4', '0', b'0', 0, b'1', b'0'),
(388, 53, 'Seesion', '0', b'0', 0, b'1', b'0'),
(389, 52, '', '0', b'0', 0, b'1', b'0'),
(390, 54, 'Seesion', '0', b'0', 0, b'1', b'0'),
(391, 51, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(392, 53, '', '0', b'0', 0, b'1', b'0'),
(393, 54, '', '0', b'0', 0, b'1', b'0'),
(394, 52, 'check7', '0', b'0', 0, b'1', b'0'),
(395, 51, 'stp', 'Session', b'0', 0, b'1', b'0'),
(396, 53, 'check4', '0', b'0', 0, b'1', b'0'),
(397, 54, 'check4', '0', b'0', 0, b'1', b'0'),
(398, 52, 'check8', '', b'0', 0, b'1', b'0'),
(399, 51, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(400, 53, '', '0', b'0', 0, b'1', b'0'),
(401, 54, '', '0', b'0', 0, b'1', b'0'),
(402, 52, 'abc3', '', b'0', 0, b'1', b'0'),
(403, 53, 'check7', '0', b'0', 0, b'1', b'0'),
(404, 54, 'check7', '0', b'0', 0, b'1', b'0'),
(405, 52, 'final', 'Session', b'0', 0, b'1', b'0'),
(406, 53, 'check8', '', b'0', 0, b'1', b'0'),
(407, 54, 'check8', '', b'0', 0, b'1', b'0'),
(408, 52, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(409, 53, 'abc3', '', b'0', 0, b'1', b'0'),
(410, 54, 'abc3', '', b'0', 0, b'1', b'0'),
(411, 52, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(412, 53, 'final', 'Session', b'0', 0, b'1', b'0'),
(413, 54, 'final', 'Session', b'0', 0, b'1', b'0'),
(414, 52, 'stp', 'Session', b'0', 0, b'1', b'0'),
(415, 53, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(416, 54, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(417, 52, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(418, 53, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(419, 54, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(420, 53, 'stp', 'Session', b'0', 0, b'1', b'0'),
(421, 54, 'stp', 'Session', b'0', 0, b'1', b'0'),
(422, 53, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(423, 54, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(424, 55, 'Exam', '1', b'1', 76, b'1', b'0'),
(425, 55, 'Sport Fees', '1', b'1', 876, b'1', b'0'),
(426, 55, 'Activity', '1', b'0', 0, b'1', b'0'),
(427, 55, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(428, 55, 'Monthly', '1', b'0', 0, b'1', b'0'),
(429, 55, 'samad', '1', b'0', 0, b'1', b'0'),
(430, 55, 'samad', '1', b'0', 0, b'1', b'0'),
(431, 55, 'check', '1', b'0', 0, b'1', b'0'),
(432, 55, 'Dress', '1', b'0', 0, b'1', b'0'),
(433, 55, 'lap', '1', b'0', 0, b'1', b'0'),
(434, 55, 'test', '1', b'0', 0, b'1', b'0'),
(435, 55, 'test', '1', b'0', 0, b'1', b'0'),
(436, 55, 'abc123', '1', b'0', 0, b'1', b'0'),
(437, 55, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(438, 55, 'hjj', '1', b'0', 0, b'1', b'0'),
(439, 55, 'Session', '1', b'0', 0, b'1', b'0'),
(440, 55, 'Checkf', '0', b'0', 0, b'1', b'0'),
(441, 55, 'Monthly', '0', b'0', 0, b'1', b'0'),
(442, 55, 'Seesion', '0', b'0', 0, b'1', b'0'),
(443, 55, '', '0', b'0', 0, b'1', b'0'),
(444, 55, 'check4', '0', b'0', 0, b'1', b'0'),
(445, 55, '', '0', b'0', 0, b'1', b'0'),
(446, 55, 'check7', '0', b'0', 0, b'1', b'0'),
(447, 55, 'check8', '', b'0', 0, b'1', b'0'),
(448, 55, 'abc3', '', b'0', 0, b'1', b'0'),
(449, 55, 'final', 'Session', b'0', 0, b'1', b'0'),
(450, 55, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(451, 55, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(452, 55, 'stp', 'Session', b'0', 0, b'1', b'0'),
(453, 55, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(454, 55, 'abdul  samad fees', 'Monthly', b'1', 980, b'1', b'0'),
(455, 56, 'Exam', '1', b'1', 8778, b'1', b'0'),
(456, 56, 'Sport Fees', '1', b'1', 979, b'1', b'0'),
(457, 56, 'Activity', '1', b'0', 0, b'1', b'0'),
(458, 56, 'Online Fee', '1', b'0', 0, b'1', b'0'),
(459, 56, 'Monthly', '1', b'0', 0, b'1', b'0'),
(460, 56, 'samad', '1', b'0', 0, b'1', b'0'),
(461, 56, 'samad', '1', b'0', 0, b'1', b'0'),
(462, 56, 'check', '1', b'0', 0, b'1', b'0'),
(463, 56, 'Dress', '1', b'0', 0, b'1', b'0'),
(464, 56, 'lap', '1', b'0', 0, b'1', b'0'),
(465, 56, 'test', '1', b'0', 0, b'1', b'0'),
(466, 56, 'test', '1', b'0', 0, b'1', b'0'),
(467, 56, 'abc123', '1', b'0', 0, b'1', b'0'),
(468, 56, 'Computer_Lab', '1', b'0', 0, b'1', b'0'),
(469, 56, 'hjj', '1', b'0', 0, b'1', b'0'),
(470, 56, 'Session', '1', b'0', 0, b'1', b'0'),
(471, 56, 'Checkf', '0', b'0', 0, b'1', b'0'),
(472, 56, 'Monthly', '0', b'0', 0, b'1', b'0'),
(473, 56, 'Seesion', '0', b'0', 0, b'1', b'0'),
(474, 56, '', '0', b'0', 0, b'1', b'0'),
(475, 56, 'check4', '0', b'0', 0, b'1', b'0'),
(476, 56, '', '0', b'0', 0, b'1', b'0'),
(477, 56, 'check7', '0', b'0', 0, b'1', b'0'),
(478, 56, 'check8', '', b'0', 0, b'1', b'0'),
(479, 56, 'abc3', '', b'0', 0, b'1', b'0'),
(480, 56, 'final', 'Session', b'0', 0, b'1', b'0'),
(481, 56, 'MonthyyyFees', 'Monthly', b'0', 0, b'1', b'0'),
(482, 56, 'acha', 'Monthly', b'0', 0, b'1', b'0'),
(483, 56, 'stp', 'Session', b'0', 0, b'1', b'0'),
(484, 56, 'Sindh', 'Monthly', b'0', 0, b'1', b'0'),
(485, 56, 'abdul  samad fees', 'Monthly', b'0', 0, b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees_amount_paid`
--

CREATE TABLE `tbl_fees_amount_paid` (
  `ID` int(11) NOT NULL,
  `class_no` varchar(10) NOT NULL,
  `roll_no` varchar(255) NOT NULL,
  `Total_Amount` int(11) NOT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedAt` datetime(6) DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fees_amount_paid`
--

INSERT INTO `tbl_fees_amount_paid` (`ID`, `class_no`, `roll_no`, `Total_Amount`, `CreatedBy`, `CreatedAt`) VALUES
(1, '', '', 0, NULL, '2022-03-15 10:55:46.000000'),
(2, '', '', 0, '', '2022-03-16 00:28:47.000000'),
(3, '', '', 0, '', '2022-03-16 00:30:10.000000'),
(4, '', '9', 0, '', '2022-03-16 00:39:54.000000'),
(5, '', '9', 0, '', '2022-03-16 00:45:12.000000'),
(6, '', '9', 0, '', '2022-03-16 12:44:21.000000'),
(7, '', '7', 300, NULL, NULL),
(8, '', '9', 100, NULL, NULL),
(9, '9', '9', 100, NULL, NULL),
(10, '9', '9', 50, NULL, NULL),
(11, '6', '6', 0, NULL, NULL),
(12, '6', '6', 1778, NULL, NULL),
(13, '$class_no', '$roll_no', 0, '$admin', '2022-03-25 11:01:05.000000'),
(14, '6', '6', 8900, NULL, NULL),
(15, '6', '6', 8900, NULL, NULL),
(16, '7', '7', 900098, NULL, NULL),
(17, '7', '7', 900098, NULL, NULL),
(18, '6', 'r-3', 20, NULL, NULL),
(19, '6', 'r-3', 20, NULL, NULL),
(20, '9', 'st-3', 60, NULL, NULL),
(21, '$class_no', '$roll_no', 0, NULL, '2022-03-25 11:40:28.000000'),
(22, '10', '10-q', 100, NULL, '2022-03-25 16:52:06.380806'),
(23, '7', 'manual_1', 7, 'daeyan', '2022-03-25 17:11:16.684909'),
(24, '9', 'st-3', 33, 'daeyan', '2022-03-25 22:36:40.340880'),
(25, '7', 'manual_1', 30, 'daeyan', '2022-03-28 10:21:57.402823'),
(26, '6', 'r-3', 70, 'daeyan', '2022-03-28 10:23:03.357678'),
(27, 'fvfv', '33', 12, 'daeyan', '2022-03-28 10:23:49.160005'),
(28, '9', 'st-2', 300, 'daeyan', '2022-03-28 12:21:01.403749'),
(29, '10', '10-q', 500, 'daeyan', '2022-03-28 12:24:42.283669'),
(30, '2', 'r-2', 300, 'daeyan', '2022-03-28 12:29:53.633484'),
(31, '7', '90', 300, 'daeyan', '2022-03-28 12:33:16.415588'),
(32, '$class_no', '$roll_no', 0, '$admin', '2022-03-28 15:46:25.543858'),
(33, '7', 'manual_1', 5, 'daeyan', '2022-03-28 16:08:13.848424'),
(34, '2', 'r-2', 300, 'daeyan', '2022-03-30 13:00:54.166297'),
(35, '9', 'st-106', 9000, 'daeyan', '2022-03-26 14:20:35.764651'),
(36, '9', 'st-2', 200, 'daeyan', '2022-03-26 15:55:33.176869'),
(37, '', '', 0, '', '2022-03-26 17:41:50.017011'),
(38, '9', 'st-1', 300, 'daeyan', '2022-03-26 18:00:56.219615'),
(39, '7', 'manual_1', 100, 'daeyan', '2022-03-26 18:02:34.002597'),
(40, '7', 'manual_1', 100, 'daeyan', '2022-03-26 18:07:03.404739'),
(41, '7', 'manual_1', 100, 'daeyan', '2022-03-26 18:12:12.453961'),
(42, '7', 'manual_1', 100, 'daeyan', '2022-03-26 18:15:24.800220'),
(43, '7', 'manual_1', 100, 'daeyan', '2022-04-01 10:48:50.136206'),
(44, '7', '90', 5, 'daeyan', '2022-04-01 11:04:53.289521'),
(45, '7', 'manual_1', 775, 'daeyan', '2022-04-01 11:13:52.649533'),
(46, '9', 'st-3', 0, 'daeyan', '2022-04-01 11:15:06.744364'),
(47, '6', 'r-3', 741, 'daeyan', '2022-04-01 11:17:01.239735'),
(48, 'fvfv', '33', 1554, 'daeyan', '2022-04-01 11:18:50.279478'),
(49, '7', 'manual_1', 84456, 'daeyan', '2022-04-01 11:21:34.474801'),
(50, '9', 'st-106', 222, 'daeyan', '2022-04-01 11:25:07.455530'),
(51, '9', 'st-1', 15467, 'daeyan', '2022-04-01 11:27:40.819813'),
(52, '9', 'st-1', 15467, 'daeyan', '2022-04-01 11:27:41.116636'),
(53, '9', 'st-1', 15467, 'daeyan', '2022-04-01 11:27:41.315163'),
(54, '9', 'st-1', 15467, 'daeyan', '2022-04-01 11:27:41.469103'),
(55, '7', 'manual_1', 952, 'daeyan', '2022-04-01 11:31:08.093270'),
(56, '9', 'st-106', 9757, 'daeyan', '2022-04-01 11:45:23.134901');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fee_type`
--

CREATE TABLE `tbl_fee_type` (
  `ID` int(11) NOT NULL,
  `Fee_Type` varchar(100) NOT NULL,
  `Frequency` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `CreatedOn` date NOT NULL,
  `Is_Active` bit(1) NOT NULL,
  `Is_Delete` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fee_type`
--

INSERT INTO `tbl_fee_type` (`ID`, `Fee_Type`, `Frequency`, `Status`, `CreatedOn`, `Is_Active`, `Is_Delete`) VALUES
(1, 'Monthly', '1', '0', '2022-03-07', b'0', b'1'),
(2, 'Year', '1', '0', '2022-03-14', b'0', b'1'),
(3, 'Exam', '1', '1', '0000-00-00', b'1', b'0'),
(4, 'Book Fees', '1', '0', '0000-00-00', b'0', b'1'),
(5, 'Sport Fees', '1', '1', '0000-00-00', b'1', b'0'),
(6, 'Activity', '1', '1', '2022-03-10', b'1', b'0'),
(7, 'Online Fee', '1', '1', '0000-00-00', b'1', b'0'),
(8, 'Book Fees', '1', '0', '0000-00-00', b'0', b'1'),
(9, 'Monthly', '1', '1', '0000-00-00', b'1', b'0'),
(10, 'samad', '1', '1', '0000-00-00', b'1', b'0'),
(11, 'samad', '1', '1', '2022-03-04', b'1', b'0'),
(12, 'check', '1', '1', '0000-00-00', b'1', b'0'),
(13, 'bank', '1', '0', '0000-00-00', b'0', b'1'),
(14, 'abc', '1', '0', '0000-00-00', b'0', b'1'),
(15, 'abdul', '1', '0', '0000-00-00', b'0', b'1'),
(16, 'Dress', '1', '1', '0000-00-00', b'0', b'0'),
(17, 'lap', '1', '1', '0000-00-00', b'0', b'0'),
(18, 'Mobile', '1', '0', '2022-03-06', b'0', b'1'),
(19, 'test', '1', '1', '0000-00-00', b'0', b'0'),
(20, 'test', '1', '1', '0000-00-00', b'0', b'0'),
(21, 'abc123', '1', '1', '0000-00-00', b'0', b'0'),
(22, 'Computer_Lab', '1', '1', '2022-03-08', b'1', b'0'),
(23, 'hjj', '1', '1', '2022-03-30', b'1', b'0'),
(24, 'Session', '1', '1', '0000-00-00', b'1', b'0'),
(25, 'klklkllkl', '0', '0', '0000-00-00', b'0', b'1'),
(26, 'Checkf', '0', '1', '0000-00-00', b'1', b'0'),
(27, 'Monthly', '0', '1', '0000-00-00', b'1', b'0'),
(28, 'Seesion', '0', '1', '0000-00-00', b'1', b'0'),
(29, '', '0', '1', '0000-00-00', b'1', b'0'),
(30, 'check4', '0', '1', '2022-03-20', b'1', b'0'),
(31, '', '0', '1', '2022-03-20', b'0', b'1'),
(32, 'check7', '0', '1', '2022-03-20', b'1', b'0'),
(33, 'check8', '', '1', '2022-03-20', b'1', b'0'),
(34, 'abc3', '', '1', '0000-00-00', b'1', b'0'),
(35, 'final', 'Session', '1', '0000-00-00', b'1', b'0'),
(36, 'MonthyyyFees', 'Monthly', '1', '2022-03-20', b'1', b'0'),
(37, 'acha', 'Monthly', '1', '2022-03-20', b'1', b'0'),
(38, 'stp', 'Session', '1', '0000-00-00', b'1', b'0'),
(39, 'Sindh', 'Monthly', '1', '2022-03-20', b'1', b'0'),
(40, 'abdul  samad fees', 'Monthly', '1', '2022-03-20', b'1', b'0'),
(41, 'try', 'Monthly', 'ISACTIVE', '2022-03-20', b'0', b'1'),
(42, 'samoo', 'Monthly', 'Active', '2022-03-20', b'1', b'0'),
(43, 'Abdullll', 'Session', '[object Object]', '0000-00-00', b'1', b'0'),
(44, 'Cash', 'Session', '[object Object]', '0000-00-00', b'1', b'0'),
(45, 'checkfeee', 'Session', 'Un-Active', '0000-00-00', b'1', b'0'),
(46, 'Muslim', 'Monthly', 'Active', '2022-03-20', b'1', b'0'),
(47, 'Hindu', 'Session', '0', '0000-00-00', b'0', b'1'),
(48, 'Test_190', 'Monthly', 'Active', '2022-03-25', b'1', b'0'),
(49, 'uiop', 'Session', 'Un-Active', '0000-00-00', b'1', b'0'),
(50, '90', 'Session', 'Active', '0000-00-00', b'1', b'0'),
(51, '8999', 'Session', 'Active', '0000-00-00', b'1', b'0'),
(52, 'yhgh', 'Session', 'Active', '0000-00-00', b'1', b'0'),
(53, 'iiiiii', 'Session', 'Active', '0000-00-00', b'1', b'0'),
(54, 'repaet', 'Monthly', 'Active', '2022-03-21', b'1', b'0'),
(55, 'Wifi Fee', 'Monthly', 'Un-Active', '2022-03-21', b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `t_id` varchar(100) NOT NULL COMMENT 'Roll Number/Gr.Number of Teacher',
  `name` varchar(30) NOT NULL,
  `class` varchar(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `t_cnic` int(30) NOT NULL,
  `t_phone` int(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `p_address` varchar(255) NOT NULL COMMENT 'Parament Address',
  `acc_approval` int(1) NOT NULL DEFAULT '0',
  `class_teacher` varchar(20) NOT NULL DEFAULT 'none',
  `user_image` varchar(255) NOT NULL DEFAULT '0',
  `online_status` bit(1) NOT NULL,
  `profile_lock` int(2) NOT NULL,
  `addedby` text NOT NULL COMMENT 'admin name',
  `Is_Active` bit(1) NOT NULL,
  `Is_Delete` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`t_id`, `name`, `class`, `subject`, `section`, `username`, `email`, `password`, `t_cnic`, `t_phone`, `address`, `p_address`, `acc_approval`, `class_teacher`, `user_image`, `online_status`, `profile_lock`, `addedby`, `Is_Active`, `Is_Delete`) VALUES
('90_t', 'kuchbhi', '9', 'history', 'h', '90_t', '', '901234', 0, 0, '', '', 0, 'none', '0', b'0', 0, 'daeyan', b'1', b'0'),
('jknjk', 'jkhnjhn', 'jnjkln', 'klnkn', 'jknln', '00', '', '9090', 0, 0, '', '', 1, 'none', '0', b'0', 0, 'daeyan', b'1', b'0'),
('t-100', 'test2', '9', 'english', 'p', 't-100', 't-100', '123', 1212, 4545, 'fgfg', 'bgbgb', 1, 'none', '0', b'0', 0, '', b'1', b'0'),
('t-96', 'test_teacher', '9', 'computer', 'p', 't-96', 'q', '123', 13, 13, '131', '1331', 1, 'none', '0', b'1', 0, '', b'1', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `test_data`
--

CREATE TABLE `test_data` (
  `test_id` int(255) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `t_id` varchar(100) NOT NULL,
  `section` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `time` varchar(4) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unactive' COMMENT 'Active Exam Or Not',
  `created` datetime(6) DEFAULT CURRENT_TIMESTAMP(6),
  `admin_approval` int(2) NOT NULL DEFAULT '0' COMMENT 'admin approve of exams or not(testing phase)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_data`
--

INSERT INTO `test_data` (`test_id`, `test_name`, `subject`, `t_id`, `section`, `class`, `time`, `status`, `created`, `admin_approval`) VALUES
(6, 'test', 'computer', 't-100', 'p', '9', '', 'Done', '2021-10-17 21:48:08.000000', 0),
(7, 's', 'computer', 't-100', 'p', '9', '', 'Done', '2021-10-25 21:09:54.000000', 0),
(8, 'testssd', 'sdsd', 't-100', 'p', '9', '', 'Done', '2021-10-25 22:01:16.000000', 0),
(9, 'testssd111', '111', 't-100', 'p', '9', '', 'Done', '2021-10-26 17:42:06.000000', 0),
(10, 'yt', 'Computer', 't-100', 'p', '9', '', 'active', '2021-10-30 03:08:56.000000', 0),
(11, 'test_c', 'computer', 't-96', 'p', '9', '', 'Done', '2021-11-28 01:46:25.000000', 0),
(12, 'physics', '', 't-96', '', '', '', 'active', '2022-02-21 17:53:05.000000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `assingments`
--
ALTER TABLE `assingments`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `att_entry`
--
ALTER TABLE `att_entry`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `dairy`
--
ALTER TABLE `dairy`
  ADD PRIMARY KEY (`dairy_id`);

--
-- Indexes for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_feestype_amountpaid`
--
ALTER TABLE `tbl_feestype_amountpaid`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fee_Amount_Paid` (`Fee_Amount_Paid`);

--
-- Indexes for table `tbl_fees_amount_paid`
--
ALTER TABLE `tbl_fees_amount_paid`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_fee_type`
--
ALTER TABLE `tbl_fee_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `test_data`
--
ALTER TABLE `test_data`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ann_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `assingments`
--
ALTER TABLE `assingments`
  MODIFY `ass_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `att_entry`
--
ALTER TABLE `att_entry`
  MODIFY `att_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dairy`
--
ALTER TABLE `dairy`
  MODIFY `dairy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `result_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_fees`
--
ALTER TABLE `tbl_fees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_feestype_amountpaid`
--
ALTER TABLE `tbl_feestype_amountpaid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `tbl_fees_amount_paid`
--
ALTER TABLE `tbl_fees_amount_paid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_fee_type`
--
ALTER TABLE `tbl_fee_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_feestype_amountpaid`
--
ALTER TABLE `tbl_feestype_amountpaid`
  ADD CONSTRAINT `tbl_feestype_amountpaid_ibfk_1` FOREIGN KEY (`Fee_Amount_Paid`) REFERENCES `tbl_fees_amount_paid` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
