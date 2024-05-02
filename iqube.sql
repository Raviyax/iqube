-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 10:40 AM
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
(1, NULL, 'admin@gmail.com', '$2y$10$eaE/fB.ZjtvZdY6IeXJm0.ZOC5Wa0/b3LOwWonY1fPbCi1aTrsHFG', 'SysAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `chapter_level_1` varchar(255) NOT NULL,
  `chapter_level_2` varchar(255) NOT NULL,
  `Weight` int(11) NOT NULL DEFAULT 0,
  `model_paper_duration` int(11) NOT NULL DEFAULT 0,
  `last_edited_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_edited_subject_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `do_progress_tracking_paper`
--

CREATE TABLE `do_progress_tracking_paper` (
  `id` int(11) NOT NULL,
  `subunit_id` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `started` tinyint(1) NOT NULL DEFAULT 0,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `last_attempted_time` datetime(5) NOT NULL DEFAULT current_timestamp(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `iqube_support`
--

CREATE TABLE `iqube_support` (
  `iqube_support_id` varchar(100) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `subject_admin_user_id` varchar(100) DEFAULT NULL,
  `support_request` varchar(512) DEFAULT NULL,
  `date` datetime(5) NOT NULL DEFAULT current_timestamp(5),
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `mcqs_for_progress_tracking`
--

CREATE TABLE `mcqs_for_progress_tracking` (
  `mcq_id` int(11) NOT NULL,
  `subunit_id` varchar(50) NOT NULL,
  `question` varchar(1024) NOT NULL,
  `option1` varchar(512) NOT NULL,
  `option2` varchar(512) NOT NULL,
  `option3` varchar(512) NOT NULL,
  `option4` varchar(512) NOT NULL,
  `option5` varchar(512) NOT NULL,
  `correct` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `subject` varchar(100) NOT NULL DEFAULT 'none',
  `description` varchar(1024) NOT NULL,
  `covering_chapters` varchar(500) NOT NULL,
  `time_duration` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
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
  `purchased_date` datetime(5) NOT NULL DEFAULT current_timestamp(5),
  `purchased_video` varchar(1024) DEFAULT NULL,
  `purchased_model_paper` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_model_papers`
--

CREATE TABLE `purchased_model_papers` (
  `id` int(11) NOT NULL,
  `model_paper_content_id` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `started` tinyint(1) NOT NULL DEFAULT 0,
  `completed` int(11) NOT NULL DEFAULT 0,
  `purchased_date` datetime NOT NULL DEFAULT current_timestamp(),
  `score` int(11) DEFAULT NULL,
  `rated` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_videos`
--

CREATE TABLE `purchased_videos` (
  `id` int(11) NOT NULL,
  `video_content_id` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `score` int(11) DEFAULT NULL,
  `purchased_date` datetime NOT NULL DEFAULT current_timestamp(),
  `rated` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `content_id` varchar(100) NOT NULL,
  `rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `token` varchar(100) NOT NULL DEFAULT 'no token',
  `fullname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_answers_for_model_paper_mcq`
--

CREATE TABLE `student_answers_for_model_paper_mcq` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `mcq_id` varchar(100) NOT NULL,
  `model_paper_content_id` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `last_attempt_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_answers_for_video_mcq`
--

CREATE TABLE `student_answers_for_video_mcq` (
  `id` int(11) NOT NULL,
  `mcq_id` varchar(100) NOT NULL,
  `video_content_id` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `last_attempt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `image` varchar(500) NOT NULL DEFAULT 'user.jpg',
  `joined_at` datetime(5) NOT NULL DEFAULT current_timestamp(5),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` int(11) NOT NULL,
  `iqube_support_id` varchar(10) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `reciever_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `received` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `about_me` varchar(1024) DEFAULT NULL,
  `cv` varchar(100) NOT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `approved_date` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `flagged` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `gender` enum('male','female','none','') NOT NULL DEFAULT 'none',
  `image` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `current_session` varchar(100) NOT NULL DEFAULT '0',
  `is_typing` enum('yes','no','','') NOT NULL DEFAULT 'no',
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_content`
--

CREATE TABLE `video_content` (
  `video_content_id` varchar(100) NOT NULL,
  `tutor_id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL DEFAULT 'none',
  `description` varchar(1024) NOT NULL,
  `video` varchar(100) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `covering_chapters` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `duration` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `do_progress_tracking_paper`
--
ALTER TABLE `do_progress_tracking_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `essays_for_model_paper`
--
ALTER TABLE `essays_for_model_paper`
  ADD PRIMARY KEY (`essay_id`);

--
-- Indexes for table `iqube_support`
--
ALTER TABLE `iqube_support`
  ADD PRIMARY KEY (`iqube_support_id`);

--
-- Indexes for table `mcqs_for_model_paper`
--
ALTER TABLE `mcqs_for_model_paper`
  ADD PRIMARY KEY (`mcq_id`);

--
-- Indexes for table `mcqs_for_progress_tracking`
--
ALTER TABLE `mcqs_for_progress_tracking`
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
-- Indexes for table `purchased_model_papers`
--
ALTER TABLE `purchased_model_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased_videos`
--
ALTER TABLE `purchased_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `student_answers_for_model_paper_mcq`
--
ALTER TABLE `student_answers_for_model_paper_mcq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_answers_for_video_mcq`
--
ALTER TABLE `student_answers_for_video_mcq`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `do_progress_tracking_paper`
--
ALTER TABLE `do_progress_tracking_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `mcqs_for_progress_tracking`
--
ALTER TABLE `mcqs_for_progress_tracking`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcq_for_video`
--
ALTER TABLE `mcq_for_video`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premium_students`
--
ALTER TABLE `premium_students`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchased_model_papers`
--
ALTER TABLE `purchased_model_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchased_videos`
--
ALTER TABLE `purchased_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_answers_for_model_paper_mcq`
--
ALTER TABLE `student_answers_for_model_paper_mcq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_answers_for_video_mcq`
--
ALTER TABLE `student_answers_for_video_mcq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_admins`
--
ALTER TABLE `subject_admins`
  MODIFY `subject_admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutor_requests`
--
ALTER TABLE `tutor_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

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
