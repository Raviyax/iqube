-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 10:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iqube`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `user_id`, `email`, `password`, `username`) VALUES
(1, NULL, 'admin@gmail.com', '$2y$10$kU1GwmV/eWJJSz1ryUoMLuqI0mu2L1a5DSM./WVb/NyQBtBdF.g9m', 'SysAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `chapter_level_1` varchar(255) NOT NULL,
  `chapter_level_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `subject`, `chapter_level_1`, `chapter_level_2`) VALUES
(1, 'physics', 'Measurement', 'Introduction to physics '),
(2, 'physics', 'Measurement', 'Physical quantities and units'),
(3, 'physics', 'Measurement', 'Introduction to physics '),
(4, 'physics', 'Measurement', 'Physical quantities and units'),
(5, 'physics', 'Measurement', 'Dimensions\r\n'),
(6, 'physics', 'Measurement', 'Measuring instruments'),
(7, 'physics', 'Measurement', 'Scalars and vectors'),
(8, 'physics', 'Mechanics', 'Kinematics\r\n'),
(9, 'physics', 'Mechanics', 'Resultant of forces'),
(10, 'physics', 'Mechanics', 'Force and motion'),
(11, 'physics', 'Mechanics', 'Momentum'),
(12, 'physics', 'Mechanics', 'Newton\'s second law of motion'),
(13, 'physics', 'Mechanics', 'Equilibrium'),
(14, 'physics', 'Mechanics', 'States of equilibrium '),
(15, 'physics', 'Mechanics', 'Work, energy and power'),
(16, 'physics', 'Mechanics', 'Rotational motion'),
(17, 'physics', 'Mechanics', 'Circular motion with uniform angular \r\nvelocity in a horizontal plane'),
(18, 'physics', 'Mechanics', 'Fluid-dynamics'),
(19, 'physics', 'Oscillations and Waves', 'Oscillations'),
(20, 'physics', 'Oscillations and Waves', 'Mechanical waves'),
(21, 'physics', 'Oscillations and Waves', 'Properties of waves'),
(22, 'physics', 'Oscillations and Waves', 'Stationary waves in strings '),
(23, 'physics', 'Oscillations and Waves', 'Waves in gases'),
(24, 'physics', 'Oscillations and Waves', 'Doppler effect'),
(25, 'physics', 'Oscillations and Waves', 'Nature of sound'),
(26, 'physics', 'Oscillations and Waves', 'Electromagnetic waves'),
(27, 'physics', 'Oscillations and Waves', 'Geometrical optics'),
(28, 'physics', 'Oscillations and Waves', 'Refraction through a prism'),
(29, 'physics', 'Oscillations and Waves', 'Refraction through thin lenses'),
(30, 'physics', 'Oscillations and Waves', 'Human eye\r\n'),
(31, 'physics', 'Oscillations and Waves', 'Optical instruments'),
(32, 'physics', 'Thermal Physics', 'Temperature\r\n'),
(33, 'physics', 'Thermal Physics', 'Thermal expansion'),
(34, 'chemistry', 'Atomic Structure', 'Models of atomic structure.'),
(35, 'chemistry', 'Atomic Structure', 'different types of electromagnetic radiation');

-- --------------------------------------------------------

--
-- Table structure for table `mcq_for_video`
--

CREATE TABLE `mcq_for_video` (
  `mcq_id` int(11) NOT NULL,
  `video_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(100) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `option5` varchar(500) DEFAULT NULL,
  `correct` enum('option1','option2','option3','option4','option5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mcq_for_video`
--

INSERT INTO `mcq_for_video` (`mcq_id`, `video_content_id`, `tutor_id`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `correct`) VALUES
(1, '382b3cf673e679e5', '', 'gas ballage nama mokkda', 'ravishan', 'balla', 'madasha', 'dew', NULL, 'option3'),
(2, '382b3cf673e679e5', '', '5+5?', '24', '10', 'efwf', 'ijkk', NULL, 'option2'),
(3, '7c86dbe61a7e7344', '23', 'legs for dog', 'ekai', 'dekai', 'thunai', 'hatharai', NULL, 'option4'),
(4, '7c86dbe61a7e7344', '23', 'rathnawaliya koheda', 'gampaha', 'kaluthara', 'refgwe', 'wgf', NULL, 'option1'),
(5, '7c86dbe61a7e7344', '23', '2*2 keeyada', '56', 'scdf', '4', '99999', NULL, 'option3');

-- --------------------------------------------------------

--
-- Table structure for table `premium_students`
--

CREATE TABLE `premium_students` (
  `pro_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `cno` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `premium_students`
--

INSERT INTO `premium_students` (`pro_id`, `student_id`, `fname`, `lname`, `cno`, `email`) VALUES
(2, 7, 'nisal', 'wishwajith', '0770410810', 'nisal@gmail.com'),
(3, 8, 'sarala', 'janson', '1234567890', 'sarala@gmail.com'),
(4, 10, 'madasha', 'liyabage', '0123456789', 'dewmini@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(500) NOT NULL DEFAULT 'user.jpg',
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `subjects` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `user_id`, `username`, `email`, `premium`, `paid`, `image`, `completed`, `subjects`) VALUES
(7, 33, 'the nisal', 'nisal@gmail.com', 1, 1, 'user.jpg', 0, NULL),
(8, 34, 'sarala', 'sarala@gmail.com', 1, 1, 'user.jpg', 0, NULL),
(9, 35, 'gagan', 'gagan@gmail.com', 0, 0, 'user.jpg', 1, 'chemistry'),
(10, 36, 'dewmini', 'dewmini@gmail.com', 1, 1, 'user.jpg', 0, NULL),
(11, 37, 'wasfan', 'wasfan@gmail.com', 0, 0, 'user.jpg', 1, 'biology');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(50) NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(1, 'physics'),
(2, 'chemistry'),
(5, 'combined-mathematics'),
(6, 'biology'),
(7, 'financial-accounting');

-- --------------------------------------------------------

--
-- Table structure for table `subject_admins`
--

CREATE TABLE `subject_admins` (
  `subject_admin_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `cno` varchar(20) DEFAULT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_admins`
--

INSERT INTO `subject_admins` (`subject_admin_id`, `user_id`, `email`, `subject`, `fname`, `lname`, `username`, `cno`, `image`) VALUES
(8, 24, 'rishmi@gmail.com', 'physics', 'Rishmi', 'Dissanayake', 'rishu', '+94703855683', 'user.jpg'),
(9, 25, 'kasun@gmail.com', 'physics', 'Kasun', 'Gunawardhana', 'kasun', '1234567890', '6579bb4224afe0.55526855.jpg'),
(10, 26, 'chand@gmail.com', 'physics', 'chandana', 'hettiarachchi', 'chanx', '1234567890', 'user.jpg'),
(11, 27, 'rasuka@gmail.com', 'financial-accounting', 'Rasika', 'rajapakse', 'rasiya', '0775764268', 'user.jpg'),
(12, 28, 'janathissa@gmail.com', 'biology', 'thissat', 'jananayake', 'thissajt', '0774797993', 'user.jpg'),
(13, 38, 'thanuja@gmail.com', 'chemistry', 'Thanuja', 'Senanayake', 'thanuja', '074797993', 'user.jpg'),
(14, 39, 'dewliyanage@gmail.com', 'physics', 'මදාෂා', 'ලියනගේ', 'දෙව්', '0711426031', '65b793f0b593d8.45992789.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cno` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'user.jpg',
  `cv` varchar(100) NOT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `approved_date` date NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutor_id`, `user_id`, `email`, `subject`, `fname`, `lname`, `username`, `cno`, `image`, `cv`, `qualification`, `approved_date`, `active`) VALUES
(4, 29, 'shantha@gmail.com', 'physics', 'Shantha', 'Walpolage', 'shantha', '0785339652', 'user.jpg', '', NULL, '2024-02-11', 0),
(6, 31, 'dalpe@gmail.com', 'financial-accounting', 'Ravien', 'Dalpataduuu', 'dunusinghe', '0711426031', '6579bc464bf556.47641869.png', '', NULL, '2024-02-11', 0),
(7, 40, 'lalanthajayathilake@gmail.com', 'physics', 'lalantha', 'jayathilake', 'lalantha', '0775764168', 'user.jpg', '', NULL, '2024-02-11', 0),
(9, NULL, 'gfgyi@gmail.com', 'combined-mathematics', 'test', 'test', 'fgzxfx', '23456', 'user.jpg', '65bc9ff75e1ba7.42585181.pdf', 'degree', '2024-02-11', 0),
(10, NULL, 'salinda@gmail.com', 'chemistry', 'Adilu', 'Salinda', 'adzero', '123456789', 'user.jpg', '65c625258ff9e8.48359726.pdf', 'diploma', '2024-02-11', 0),
(11, NULL, 'gagan2@gmail.com', 'physics', 'Gagan', 'Saswika', 'gaga', '1234567890', 'user.jpg', '65c7cac2f1fd35.96774503.pdf', 'highschool', '2024-02-11', 0),
(12, 44, 'charitha@gmail.com', 'physics', 'charitha', 'dissanayake', 'cgis', '0771234567', 'user.jpg', '65', 'degree', '2024-02-18', 0),
(13, 45, 'ishan@gmail.com', 'physics', 'Ishan', 'Anurudda', 'ishan', '0774797993', 'user.jpg', '65', 'degree', '2024-02-18', 0),
(23, 55, 'freshhackrip@gmail.com', 'physics', 'Ashen', 'Chamuditha', 'alaya', '0774797993', 'user.jpg', '65d2341f2e7dc1.86804252.pdf', 'diploma', '2024-02-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_requests`
--

CREATE TABLE `tutor_requests` (
  `request_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `cno` varchar(15) NOT NULL,
  `declined` tinyint(1) NOT NULL DEFAULT 0,
  `cv` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `message` varchar(512) DEFAULT NULL,
  `requested_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('student','admin','tutor','subject_admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`) VALUES
(24, 'rishu', '$2y$10$xHKMvSWsCeD.PWpnoOkIbOMISVMMSGF.SVEfGv9F6BoB3pce3x00O', 'rishmi@gmail.com', 'subject_admin', '2023-12-12 16:43:27', '2023-12-12 16:43:27'),
(25, 'kasun', '$2y$10$demZYRKDuQv5GlGdOC/iv.JYu6u577XyVs7ysGYbMGBZMYt8GYpcy', 'kasun@gmail.com', 'subject_admin', '2023-12-12 16:58:03', '2023-12-12 16:58:03'),
(26, 'chanx', '$2y$10$n5I9JCzw.86wW9.QDKAcBel5/QG9fHKcQQF4uiXK.U4Eu72CYxTNu', 'chandana@gmail.com', 'subject_admin', '2023-12-12 17:19:32', '2023-12-12 17:19:32'),
(27, 'rasiya', '$2y$10$qoGF2VUruJib.JGZSO9B3OQAKfcP1Xw.oeazCm7JZjwUIZO.pOA5y', 'rasuka@gmail.com', 'subject_admin', '2023-12-12 17:22:16', '2023-12-12 17:22:16'),
(28, 'thissaj', '$2y$10$LQvgXANrV/t5la7MQ6BjE./wYoVSlgDpKhdKmi6xU3ku8DQ52wcS.', 'janathissa@gmail.com', 'subject_admin', '2023-12-13 02:58:13', '2023-12-13 02:58:13'),
(29, 'shantha', '$2y$10$XmPRyxzyws.RJEZtVj2MBO1GtTyksdrEte/3YvS/lljuoHdyx.MOu', 'shantha@gmail.com', 'tutor', '2023-12-13 09:42:12', '2023-12-13 09:42:12'),
(30, 'shika', '$2y$10$4a3v/UzuBskaU70C0/hw2.e5TMtwKdbrHSWTqftzgbuEO0hOki0qS', '', 'tutor', '2023-12-13 12:40:46', '2023-12-13 13:23:00'),
(31, 'dunusinghe', '$2y$10$HOllJ0ZMfACjjM/4OaGsL.rBstbYFjnj8VwKXZB80IIhIct2x27s.', 'dalpe@gmail.com', 'tutor', '2023-12-13 13:25:39', '2023-12-13 14:14:48'),
(33, 'the nisal', '$2y$10$WscAGI58JopJrcJf1DTfD.QLD43wK9mmlBVhxc51IpZ.2YiiFDnL.', 'nisal@gmail.com', 'student', '2023-12-13 14:55:19', '2023-12-13 14:55:19'),
(34, 'sarala', '$2y$10$lFYXhnPT7t.W9BKklAEObemx6BCOUlnzaFWX7x9mag7ry1wJQHI5K', 'sarala@gmail.com', 'student', '2023-12-15 04:45:53', '2023-12-15 04:45:53'),
(35, 'gagan', '$2y$10$9436X7Ae2y66Dta.Y.EheeruIfZ7UyIXHox9WBvz6V6POR8quI8nu', 'gagan@gmail.com', 'student', '2023-12-15 05:58:05', '2023-12-15 05:58:05'),
(36, 'dewmini', '$2y$10$JW7xupYqzt3I1A49w7KGoOwvRGWNKL.8wDP8MXWSoZoCSQ1knPAiy', 'dewmini@gmail.com', 'student', '2024-01-08 05:08:11', '2024-01-08 05:08:11'),
(37, 'wasfan', '$2y$10$Y/rX0K61jPFFjO1D0sdHm.4VTclllKDuuQZWRCdFMUdpT/ov19Fei', 'wasfan@gmail.com', 'student', '2024-01-20 10:41:16', '2024-01-20 10:41:16'),
(38, 'thanuja', '$2y$10$lpwXMA2wDqGpyZp6/nxRP.qfx8l5V9JKBsH6XSZ.kXD6cZMXI86Km', 'thanuja@gmail.com', 'subject_admin', '2024-01-26 14:25:46', '2024-01-26 14:25:46'),
(39, 'දෙව්', '$2y$10$2c714DZJtr/OYS12oVD0MO.aGf8TDVFAsrQ8Mik9C87x0HjD0/sZi', 'dewliyanage@gmail.com', 'subject_admin', '2024-01-29 08:40:25', '2024-01-29 12:09:27'),
(40, 'lalantha', '$2y$10$O.cDiiZaaFIzJjzvnb2iAumi0AY58WXRgUKqDFE5czIeGdC0Psgai', 'lalanthajayathilake@gmail.com', 'tutor', '2024-01-29 13:44:08', '2024-01-29 13:44:08'),
(44, 'cgis', '$2y$10$/DOI4nG4zfWZ9EKemO5ge.uI3YzeF20UQ5xMpJIxJENrpZ4PebaIq', 'charitha@gmail.com', 'tutor', '2024-02-18 04:50:41', '2024-02-18 04:50:41'),
(45, 'ishan', '$2y$10$0BsF/eJ9nUlb9WZ5Ycu9X.TWodsIIScoQOLwFaZifuUirvU00DLze', 'ishan@gmail.com', 'tutor', '2024-02-18 05:37:40', '2024-02-18 05:37:40'),
(55, 'alaya', '$2y$10$JnChhyUNnfGBpJJfhlXXbOMhL4tnzM27RbTbzfwFgHUoiCanGCeEm', 'freshhackrip@gmail.com', 'tutor', '2024-02-18 16:48:42', '2024-02-18 17:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `video_content`
--

CREATE TABLE `video_content` (
  `video_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(512) NOT NULL,
  `video` varchar(100) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `price` int(5) NOT NULL,
  `covering_chapters` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_content`
--

INSERT INTO `video_content` (`video_content_id`, `tutor_id`, `name`, `description`, `video`, `thumbnail`, `price`, `covering_chapters`, `active`) VALUES
('2', '23', 'test', 'testingggggg', 'video', 'thumbnail', 500, '3,5,16,19,32', 0),
('3', '23', 'test', 'testingggggg', '65d376e4080fe7.00155510.mp4', '65d376e4087a33.06927107.png', 500, '3,5,16,19,32', 0),
('382b3cf673e679e5', '23', 'me babage video eka', 'helloooooo', '65d46511c579b0.52190459.mp4', '65d46511c5aed0.87023724.png', 5000, '5][13][32][33', 1),
('4', '23', 'à¶´à·’à·ƒà·’à¶šà·Šà·ƒà·Š à·ƒà¶»à¶½à·€', 'halooooo', '65d4390de368e9.04892944.mp4', '65d4390de3bad3.05946732.png', 600, '5][12][13][19][20][21][22][23][24][25][26][27][28][29][30][31', 0),
('5', '23', 'physics saralawa', 'testing description', '65d439a49d74a5.00023724.mp4', '65d439a49db2f1.73768024.png', 600, '3][6][19][20][21][22][23][24][25][26][27][28][29][30][31][33', 0),
('6', '23', 'physics saralawa', 'testing description', '65d43a245a0c79.94424214.mp4', '65d43a245a74d3.57664847.png', 600, '3][6][19][20][21][22][23][24][25][26][27][28][29][30][31][33', 0),
('7c86dbe61a7e7344', '23', 'hashing methods', 'here we explain hashing methods', '65d466fc1918f6.08001978.mp4', '65d466fc194ea8.43404859.png', 600, '5][21][26][32', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq_for_video`
--
ALTER TABLE `mcq_for_video`
  ADD PRIMARY KEY (`mcq_id`);

--
-- Indexes for table `premium_students`
--
ALTER TABLE `premium_students`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subject_admins`
--
ALTER TABLE `subject_admins`
  ADD PRIMARY KEY (`subject_admin_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutor_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tutor_requests`
--
ALTER TABLE `tutor_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video_content`
--
ALTER TABLE `video_content`
  ADD PRIMARY KEY (`video_content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mcq_for_video`
--
ALTER TABLE `mcq_for_video`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `premium_students`
--
ALTER TABLE `premium_students`
  MODIFY `pro_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject_admins`
--
ALTER TABLE `subject_admins`
  MODIFY `subject_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tutor_requests`
--
ALTER TABLE `tutor_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `subject_admins`
--
ALTER TABLE `subject_admins`
  ADD CONSTRAINT `subject_admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
