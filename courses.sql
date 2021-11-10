-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 03:14 AM
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
-- Database: `courses`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `price`, `level`, `duration`, `teacher_id`, `img`) VALUES
(2, 'Open Programming Courses for everyone : Python', 'Open Programming Courses for everyone : Python Open Programming Courses for everyone : Python Open Programming Courses for everyone : Python Open Programming Courses for everyone : Python Open Programming Courses for everyone : Python', 35, 'Begninner', 20, 1, 'assets/images/c1.jpg'),
(3, 'Learning to Write as a clean and Professional Author', 'Learning to Write as a clean and Professional Author Learning to Write as a clean and Professional Author Learning to Write as a clean and Professional Author Learning to Write as a clean and Professional Author', 0, 'Expert', 13, 2, 'assets/images/c4.jpg'),
(5, 'Course For Backend With Laravel Frame Work', 'This is A Course For Laravel Framework with PHP And MVC Design Pattern', 50, 'Advanced', 30, 2, 'assets/images/7469-c3.jpg'),
(7, 'Java', 'This is Course For Java', 3, 'Advanced', 30, 3, 'assets/images/9756-2069-c5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`user_id`, `course_id`) VALUES
(1, 2),
(1, 3),
(1, 5),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `premission` tinyint(4) NOT NULL DEFAULT 0,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `premission`, `img`) VALUES
(1, 'Amr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'amrazzm@gmail.com', 1, 'assets/images/a3.jpg'),
(2, 'Khalid', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Khalid@gmail.com', 1, 'assets/images/a4.jpg'),
(3, 'Ahmed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ahmed@gmail.com', 1, 'assets/images/team1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `teacher_id_2` (`teacher_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD KEY `user_id` (`user_id`,`course_id`),
  ADD KEY `course` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
