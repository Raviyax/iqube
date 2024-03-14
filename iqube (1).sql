-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 07:17 PM
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
-- Table structure for table `essays_for_model_paper`
--

CREATE TABLE `essays_for_model_paper` (
  `essay_id` int(11) NOT NULL,
  `model_paper_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(10) NOT NULL,
  `essay_questions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `essays_for_model_paper`
--

INSERT INTO `essays_for_model_paper` (`essay_id`, `model_paper_content_id`, `tutor_id`, `essay_questions`) VALUES
(1, 'cb68d0c43687829a', '2', '65e2aaacd85ad9.31522326.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `mcqs_for_model_paper`
--

CREATE TABLE `mcqs_for_model_paper` (
  `mcq_id` int(11) NOT NULL,
  `model_paper_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(10) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option1` varchar(500) NOT NULL,
  `option2` varchar(500) NOT NULL,
  `option3` varchar(500) NOT NULL,
  `option4` varchar(500) NOT NULL,
  `option5` varchar(500) NOT NULL,
  `correct` enum('option1','option2','option3','option4','option5') NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mcqs_for_model_paper`
--

INSERT INTO `mcqs_for_model_paper` (`mcq_id`, `model_paper_content_id`, `tutor_id`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `correct`, `date`) VALUES
(1, 'cb68d0c43687829a', '2', 'what is the lc of vernier calliper', '1mm', '5mm', '3mm', '6mm', '6 mm', 'option3', '2024-03-02 09:57:24'),
(2, 'cb68d0c43687829a', '2', 'this is a test question', 'ans a', 'ans b', 'ans c', 'ans d', '545', 'option3', '2024-03-02 09:57:24');

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
  `correct` enum('option1','option2','option3','option4','option5') NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mcq_for_video`
--

INSERT INTO `mcq_for_video` (`mcq_id`, `video_content_id`, `tutor_id`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `correct`, `date`) VALUES
(1, 'c112e3359ece1921', '2', 'what is the lc of vernier calliper', '1mm', '5mm', '3mm', '6mm', NULL, 'option3', '2024-02-28 21:22:17'),
(2, 'c112e3359ece1921', '2', 'this is a test question', 'ans a', 'ans b', 'ans c', 'ans d', NULL, 'option3', '2024-02-28 21:22:17'),
(3, '4a9f27646239b5df', '2', 'what is the lc of vernier calliper', '1mm', '5mm', '3mm', '6mm', NULL, 'option2', '2024-03-02 09:36:33'),
(4, '4a9f27646239b5df', '2', 'this is a test question', 'ans a', 'ans b', 'ans c', 'ans d', NULL, 'option4', '2024-03-02 09:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(20) NOT NULL,
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `received` datetime DEFAULT current_timestamp(),
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `message`, `received`, `status`) VALUES
(1, 3, 0, 'haloo', '0000-00-00 00:00:00', 1),
(2, 6, 5, 'hello yaluwew', '2024-03-14 23:17:06', 1),
(3, 6, 5, 'hooo', '2024-03-14 23:17:50', 1),
(4, 6, 5, 'ada', '2024-03-14 23:17:58', 1),
(5, 4, 5, 'hii yaluwe', '2024-03-14 23:19:34', 1),
(6, 6, 4, 'haloo', '2024-03-14 23:20:02', 0),
(7, 4, 6, 'hii bn', '2024-03-14 23:24:20', 0),
(8, 6, 4, 'moko wenne ithin', '2024-03-14 23:24:41', 1),
(9, 4, 6, 'sape innw bn', '2024-03-14 23:24:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `model_paper_content`
--

CREATE TABLE `model_paper_content` (
  `model_paper_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(50) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `covering_chapters` varchar(500) NOT NULL,
  `time_duration` timestamp(5) NOT NULL DEFAULT current_timestamp(5) ON UPDATE current_timestamp(5),
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `model_paper_content`
--

INSERT INTO `model_paper_content` (`model_paper_content_id`, `tutor_id`, `thumbnail`, `price`, `name`, `description`, `covering_chapters`, `time_duration`, `active`) VALUES
('cb68d0c43687829a', '2', '65e2aa90f2de48.81165142.jpg', 300, 'model paper 1', 'this is a test description', '32][33', '2024-03-02 04:27:24.90638', 1);

-- --------------------------------------------------------

--
-- Table structure for table `premium_students`
--

CREATE TABLE `premium_students` (
  `pro_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `cno` varchar(10) NOT NULL,
  `payment_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `premium_students`
--

INSERT INTO `premium_students` (`pro_id`, `student_id`, `fname`, `lname`, `address`, `city`, `cno`, `payment_id`) VALUES
(1, 1, 'Madasha', 'Liyanage', '302/8, Gamini Mawatha, Batuwatta', 'Ragama', '0711426031', NULL),
(2, 3, 'Saman', 'Perera', '305/2', 'colombo', '1234567890', NULL);

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
  `image` varchar(500) NOT NULL DEFAULT 'user.jpg',
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `subjects` varchar(255) DEFAULT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(100) NOT NULL DEFAULT 'no token'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `user_id`, `username`, `email`, `premium`, `image`, `completed`, `subjects`, `verify`, `token`) VALUES
(1, 1, 'madasha', 'dewliyanage123@gmail.com', 1, 'user.jpg', 1, 'chemistry', 1, 'no token'),
(2, 4, 'Attendance jaye', 'jayathilakeravishan@gmail.com', 0, 'user.jpg', 1, '5,6,7', 1, 'no token'),
(3, 6, 'saman', 'freshhackrip@gmail.com', 1, 'user.jpg', 0, '1,2,6', 1, 'no token');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
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
(1, 2, 'danuj@gmail.com', 'physics', 'Danujaya', 'Liyanage', 'danuj', '0712345678', 'user.jpg');

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
  `approved_date` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutor_id`, `user_id`, `email`, `subject`, `fname`, `lname`, `username`, `cno`, `image`, `cv`, `qualification`, `approved_date`, `active`) VALUES
(2, 5, '2021is043@stu.ucsc.cmb.ac.lk', 'physics', 'Ravishan', 'Jayathilake', '2021is043@stu.ucsc.cmb.ac.lk', '+94769286535', 'user.jpg', '65df4d4ade8cd8.22373139.pdf', 'masters', '2024-02-28 20:43:29', 1);

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
  `requested_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `unreceivedmessages`
-- (See below for the actual view)
--
CREATE TABLE `unreceivedmessages` (
);

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `gender` enum('male','female','none','') NOT NULL DEFAULT 'none',
  `image` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `current_session` varchar(100) NOT NULL DEFAULT '0',
  `is_typing` enum('yes','no','','') NOT NULL DEFAULT 'no',
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`, `online`, `gender`, `image`, `current_session`, `is_typing`, `last_activity`) VALUES
(1, 'madasha', '$2y$10$M4dX1DvAbOlpeDti6iOq4eQ1hHnNirg2GJycyjkgSjEwXrifDX0QO', 'dewliyanage123@gmail.com', 'student', '2024-02-27 16:44:54', '2024-02-27 16:44:54', 0, 'none', 'user.jpg', '0', 'no', '2024-03-14 12:09:39'),
(2, 'danuj', '$2y$10$wLiLmDOavyXPZ21mVAPEQ.0xNfhOsiYaDOsQ.98huq4/lzWiwLoZC', 'danuj@gmail.com', 'subject_admin', '2024-02-28 04:23:43', '2024-02-28 04:23:43', 0, 'none', 'user.jpg', '0', 'no', '2024-03-14 12:09:39'),
(4, 'Attendance jaye', '$2y$10$gHulqGIfIUHHe9jBcPvWmuZ.adg.khv/S6rpia6incBnrvsOiJG6q', 'jayathilakeravishan@gmail.com', 'student', '2024-02-28 06:23:02', '2024-03-14 17:54:08', 1, 'none', 'user.jpg', '6', 'no', '2024-03-14 12:09:39'),
(5, '2021is043@stu.ucsc.cmb.ac.lk', '$2y$10$z4d1.jcq3DrUbUEf6qT5zeoJ1rBLF6dK1sjOROQE6GAcfldC2fk.6', '2021is043@stu.ucsc.cmb.ac.lk', 'tutor', '2024-02-28 15:13:29', '2024-02-28 15:33:31', 0, 'none', 'user.jpg', '0', 'no', '2024-03-14 12:09:39'),
(6, 'saman', '$2y$10$H2SAUaM5qyDm65c12a1Uaexz9R/bctmr28rI2rmDZMkYp4xODeazq', 'freshhackrip@gmail.com', 'student', '2024-02-28 16:10:18', '2024-03-14 18:08:22', 1, 'none', 'user.jpg', '4', 'no', '2024-03-14 12:09:39');

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
  `price` int(11) NOT NULL,
  `covering_chapters` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_content`
--

INSERT INTO `video_content` (`video_content_id`, `tutor_id`, `name`, `description`, `video`, `thumbnail`, `price`, `covering_chapters`, `active`) VALUES
('4a9f27646239b5df', '2', 'Vernier Caliper', 'This video is about vernier caliper', '65e2a5ba4db384.78380424.mp4', '65e2a5ba4dfb05.24091956.png', 300, '3][4][6', 1),
('c112e3359ece1921', '2', 'Vernier Caliper', 'This video contains about vernier caliper', '65df5665ade289.33283203.mp4', '65df5665ae3ed3.04446191.png', 2500, '5][6', 1);

-- --------------------------------------------------------

--
-- Structure for view `unreceivedmessages`
--
DROP TABLE IF EXISTS `unreceivedmessages`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`%` SQL SECURITY DEFINER VIEW `unreceivedmessages`  AS SELECT `messages`.`id` AS `id`, `messages`.`sender` AS `sender`, `messages`.`receiver` AS `receiver`, `messages`.`message` AS `message`, `messages`.`files` AS `files`, `messages`.`msgID` AS `msgID`, `messages`.`date` AS `date`, `messages`.`seen` AS `seen`, `messages`.`received` AS `received`, `messages`.`deleted_sender` AS `deleted_sender`, `messages`.`deleted_receiver` AS `deleted_receiver` FROM `messages` WHERE `messages`.`received` is null ;

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
-- Indexes for table `essays_for_model_paper`
--
ALTER TABLE `essays_for_model_paper`
  ADD PRIMARY KEY (`essay_id`);

--
-- Indexes for table `mcqs_for_model_paper`
--
ALTER TABLE `mcqs_for_model_paper`
  ADD PRIMARY KEY (`mcq_id`);

--
-- Indexes for table `mcq_for_video`
--
ALTER TABLE `mcq_for_video`
  ADD PRIMARY KEY (`mcq_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_paper_content`
--
ALTER TABLE `model_paper_content`
  ADD PRIMARY KEY (`model_paper_content_id`);

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
-- AUTO_INCREMENT for table `essays_for_model_paper`
--
ALTER TABLE `essays_for_model_paper`
  MODIFY `essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mcqs_for_model_paper`
--
ALTER TABLE `mcqs_for_model_paper`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mcq_for_video`
--
ALTER TABLE `mcq_for_video`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `premium_students`
--
ALTER TABLE `premium_students`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject_admins`
--
ALTER TABLE `subject_admins`
  MODIFY `subject_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutor_requests`
--
ALTER TABLE `tutor_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
