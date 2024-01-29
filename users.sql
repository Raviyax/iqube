-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 01:39 PM
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
-- Database: `iqube`
--
-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `name`, `email`, `password`, `date`, `role`) VALUES
(1, 'ravishan', 'jayathilakeravishan@gmail.com', '$2y$10$c60Y/6A9vgY2yTcjwvx8teNzOMNLPdvvjTzm8CsOPiu1dZ0mNL.G.', '2023-10-29 09:59:47', 'tutor'),
(2, 'madasha', 'dewliyanage@gmail.com', '$2y$10$sLhJPrHzA06yEsHJbS.ZBOut9Txl2DkyzAbh81.el66SXQckwVHby', '2023-10-29 10:00:20', 'subject_admin'),
(3, 'rishmi', 'rishmi@gmail.com', '$2y$10$w392GgkkccDPu8T7PeFK7upQNKgVXGypUYKNDUsDCLZC.yhBKD1wO', '2023-10-29 11:53:11', 'Admin'),
(4, 'hanafe', 'hanafe@gmail.com', '$2y$10$my2qqdSTuPNXH4LWhz/Na.YYLt6bkz.iEHnpU4irGhd.HuCELZTr6', '2023-10-29 11:58:51', 'student');
--
-- Indexes for dumped tables
--
--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
