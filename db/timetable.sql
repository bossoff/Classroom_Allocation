-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 09:34 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `level`, `category`) VALUES
(1, 'ND I', '100', 'ND'),
(3, 'ND II', '200', 'ND'),
(5, 'HND I', '400', 'HND');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `capacity` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `name`, `capacity`) VALUES
(1, 'LR 2', '200'),
(2, 'LR 3', '200'),
(3, 'GEO LAB', '500'),
(4, 'LR 9', '250');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(50) NOT NULL,
  `course_tittle` varchar(200) NOT NULL,
  `level` varchar(20) NOT NULL,
  `unit` int(4) NOT NULL,
  `staffid` varchar(10) NOT NULL,
  `staffname` varchar(100) NOT NULL,
  `department` varchar(150) NOT NULL,
  `depid` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_code`, `course_tittle`, `level`, `unit`, `staffid`, `staffname`, `department`, `depid`) VALUES
(1, 'COM111', 'Introduction To Computer', '100', 4, '7', 'Mr Isaka', '', '1'),
(2, 'COM112', 'Digital Electronic', '100', 4, '4', 'Mr Muritalla', '', '1'),
(3, 'COM113', 'Algorithm and Flowchart', '100', 4, '6', 'Mr Olajide', '', '1'),
(4, 'COM114', 'Basic Programming', '100', 4, '8', 'Mrs Dada', '', '1'),
(5, 'COM211', 'Visual Basic Programming', '200', 4, '9', 'Mr Oyedepo', '', '1'),
(6, 'COM212', 'File Organizatio', '200', 4, '3', 'Mr Raji', '', '1'),
(7, 'COM213', 'Hardware Maintainance', '200', 4, '4', 'Mr Muritalla', '', '1'),
(8, 'Com214', 'Cobol Programming', '200', 3, '10', 'Mrs Olusi', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(60) NOT NULL,
  `hod` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `hod`) VALUES
(1, 'Computer Science', 'Agboola '),
(2, 'Office Technology Technology', 'Dr. Mayor ');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(200) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `courseid` varchar(10) NOT NULL,
  `coursecode` varchar(15) NOT NULL,
  `coursetitle` longtext NOT NULL,
  `courselevel` varchar(10) NOT NULL,
  `hallid` varbinary(10) NOT NULL,
  `hallname` longtext NOT NULL,
  `staffid` varchar(10) NOT NULL,
  `period` longtext NOT NULL,
  `edate` longtext NOT NULL,
  `staffname` varchar(50) NOT NULL,
  `classid` varchar(10) NOT NULL,
  `classname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `department`, `semester`, `courseid`, `coursecode`, `coursetitle`, `courselevel`, `hallid`, `hallname`, `staffid`, `period`, `edate`, `staffname`, `classid`, `classname`) VALUES
(1, '1', 'First Semester', '1', 'COM111', 'Introduction To Computer', '100', '1', 'LR 2', '7', '1', '1', 'Mr Isaka', '1', 'ND I'),
(2, '1', 'First Semester', '5', 'COM211', 'Visual Basic Programming', '200', '4', 'LR 9', '9', '1', '1', 'Mr Oyedepo', '3', 'ND II'),
(3, '1', 'First Semester', '2', 'COM112', 'Digital Electronic', '100', '1', 'LR 2', '4', '3', '1', 'Mr Muritalla', '1', 'ND I'),
(4, '1', 'First Semester', '4', 'COM114', 'Basic Programming', '100', '4', 'LR 9', '8', '2', '4', 'Mrs Dada', '1', 'ND I'),
(5, '1', 'First Semester', '7', 'COM213', 'Hardware Maintainance', '200', '2', 'LR 3', '4', '2', '3', 'Mr Muritalla', '3', 'ND II');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `reg_no` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `department` varchar(150) NOT NULL,
  `depid` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `reg_no`, `email`, `department`, `depid`) VALUES
(1, 'Mr Ayeni', 'STF-001', 'ayeni@gmail.com', 'Computer Science', '1'),
(2, 'Mr AbdulKareem', 'STF-002', 'abdulkareem@gmail.com', 'Computer Science', '1'),
(3, 'Mr Raji', 'STF-003', 'raji@gmail.com', 'Computer Science', '1'),
(4, 'Mr Muritalla', 'STF-004', 'muritala@gmail.com', 'Computer Science', '1'),
(5, 'Dr Olagunju', 'STF-005', 'olagunju@gmail.com', 'Computer Science', '1'),
(6, 'Mr Olajide', 'STF-006', 'olajide@gmail.com', 'Computer Science', '1'),
(7, 'Mr Isaka', 'STF-007', 'isiaka@gmail.com', 'Computer Science', '1'),
(8, 'Mrs Dada', 'STF-008', 'dada@gmail.com', 'Computer Science', '1'),
(9, 'Mr Oyedepo', 'STF-009', 'oyedepo@gmail.com', 'Computer Science', '1'),
(10, 'Mrs Olusi', 'STF-010', 'olusi@gmail.com', 'Computer Science', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `matric_no` varchar(35) NOT NULL,
  `dept` varchar(60) NOT NULL,
  `email` varchar(200) NOT NULL,
  `class` varchar(35) NOT NULL,
  `level` varchar(35) NOT NULL,
  `category` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `matric_no`, `dept`, `email`, `class`, `level`, `category`) VALUES
(2, 'Babalola Bashirat', 'HND/17/COM/FT/001', '1', 'babalolabashirat@gmail.com', 'HND I', '400', 'HND'),
(3, 'Adedoyin Shina', 'ND/16/COM/FT/300', '1', 'sbatch2011@gmail.com', 'ND I', '100', 'ND'),
(4, 'Bello Monday', 'HND/16/COM/FT/019', '1', 'thisemail@gmail.com', 'HND I', '400', 'HND'),
(5, 'Mayor', 'HND/16/COM/FT/020', '1', 'mayorwow@gmail.com', 'HND I', '400', 'HND');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin@admin.com', 'admin', 'admin'),
(2, 'babalolabashirat@gmail.com', 'HND/17/COM/FT/001', 'Student'),
(3, 'sbatch2011@gmail.com', 'ND/16/COM/FT/300', 'Student'),
(4, 'thisemail@gmail.com', 'HND/16/COM/FT/019', 'Student'),
(5, 'mayorwow@gmail.com', 'HND/16/COM/FT/020', 'Student'),
(6, 'ayeni@gmail.com', 'STF-001', 'staff'),
(7, 'abdulkareem@gmail.com', 'STF-002', 'staff'),
(8, 'raji@gmail.com', 'STF-003', 'staff'),
(9, 'muritala@gmail.com', 'STF-004', 'staff'),
(10, 'olagunju@gmail.com', 'STF-005', 'staff'),
(11, 'olajide@gmail.com', 'STF-006', 'staff'),
(12, 'isiaka@gmail.com', 'STF-007', 'staff'),
(13, 'dada@gmail.com', 'STF-008', 'staff'),
(14, 'oyedepo@gmail.com', 'STF-009', 'staff'),
(15, 'olusi@gmail.com', 'STF-010', 'staff');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
