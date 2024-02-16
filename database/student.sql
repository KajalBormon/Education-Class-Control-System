-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 09:07 PM
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
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`fname`, `lname`, `username`, `email`, `phone`, `password`, `type`) VALUES
('Arpa', 'Paul', 'arpa123', 'arpa@gmail.com', '01310655363', '17afa4fca97c507eeaf120c3748ef329', 'admin'),
('Arpa', 'Paul', 'arpa12', 'arpa@gmail.com', '01723654778', '1b8a493f43188530ae8ccab83a5ce3ce', 'student'),
('kajal', 'bormon', 'kajal12', 'kajal@gmail.com', '01700925399', '8251a8dbec146e2c4fb536bce37ac2f6', 'student'),
('supty', 'zaman', 'supty123', 'supty@gmail.com', '01812345678', '6ff4eb1b5c2447efc333d0aa7af9021c', 'student'),
('Saiful', 'Islam ', 'saifulsir', 'saifulmath@gmail.com', '01566666668', '6a341783d0cfe7aa2bc9734d7087b9fe', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `sid` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `batch` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`sid`, `name`, `course_name`, `batch`, `status`, `date`, `id`) VALUES
(20102007, 'Supty Zaman', 'Calculas', 14, 'Present', '2024-02-16', 9),
(20102033, 'Arpa Paul', 'Calculas', 14, 'Present', '2024-02-16', 10);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(20) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `batch` int(20) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `fname`, `lname`, `dept`, `mail`, `batch`, `phone`) VALUES
(20102033, 'Arpa', 'Paul', 'CSE', 'arpa@gmail.com', 14, '1310655363'),
(18102014, 'Kajal', 'Bormon', 'cse', 'kajal@gmail.com', 12, '1700925399'),
(20102007, 'Supty', 'Zaman', 'cse', 'supty@gmail.com', 14, '1812365478');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `batch` int(25) NOT NULL,
  `sem` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fname`, `lname`, `username`, `mail`, `batch`, `sem`, `course_name`, `course_code`) VALUES
(0, 'Saiful', 'Islam ', 'saifulsir', 'saifulmath@gmail.com', 14, 7, 'Calculas', 'cse-401');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
