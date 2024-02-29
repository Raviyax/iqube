-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 06:06 AM
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
(2, 'c112e3359ece1921', '2', 'this is a test question', 'ans a', 'ans b', 'ans c', 'ans d', NULL, 'option3', '2024-02-28 21:22:17');

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
(2, 4, 'Attendance jaye', 'jayathilakeravishan@gmail.com', 0, 'user.jpg', 0, NULL, 1, 'no token'),
(3, 6, 'saman', 'freshhackrip@gmail.com', 1, 'user.jpg', 1, 'physics', 1, 'no token');

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
(1, 'madasha', '$2y$10$M4dX1DvAbOlpeDti6iOq4eQ1hHnNirg2GJycyjkgSjEwXrifDX0QO', 'dewliyanage123@gmail.com', 'student', '2024-02-27 16:44:54', '2024-02-27 16:44:54'),
(2, 'danuj', '$2y$10$wLiLmDOavyXPZ21mVAPEQ.0xNfhOsiYaDOsQ.98huq4/lzWiwLoZC', 'danuj@gmail.com', 'subject_admin', '2024-02-28 04:23:43', '2024-02-28 04:23:43'),
(4, 'Attendance jaye', '$2y$10$AwIe5id0tSnix2xEzWX42uYHyve2UcOdR81U87TEeCqfZ5d9H1AFW', 'jayathilakeravishan@gmail.com', 'student', '2024-02-28 06:23:02', '2024-02-28 06:23:02'),
(5, '2021is043@stu.ucsc.cmb.ac.lk', '$2y$10$z4d1.jcq3DrUbUEf6qT5zeoJ1rBLF6dK1sjOROQE6GAcfldC2fk.6', '2021is043@stu.ucsc.cmb.ac.lk', 'tutor', '2024-02-28 15:13:29', '2024-02-28 15:33:31'),
(6, 'saman', '$2y$10$H2SAUaM5qyDm65c12a1Uaexz9R/bctmr28rI2rmDZMkYp4xODeazq', 'freshhackrip@gmail.com', 'student', '2024-02-28 16:10:18', '2024-02-28 16:10:18');

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
('c112e3359ece1921', '2', 'Vernier Caliper', 'This video contains about vernier caliper', '65df5665ade289.33283203.mp4', '65df5665ae3ed3.04446191.png', 2500, '5][6', 1);

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
  MODIFY `essay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcqs_for_model_paper`
--
ALTER TABLE `mcqs_for_model_paper`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcq_for_video`
--
ALTER TABLE `mcq_for_video`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
