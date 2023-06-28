-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 04:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `quiz_id` int(255) NOT NULL,
  `ans_status` varchar(255) NOT NULL,
  `points` int(255) NOT NULL,
  `exam_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `answer`, `quiz_id`, `ans_status`, `points`, `exam_id`) VALUES
(46, 'Oxygen', 18, 'incorrect', 0, 3),
(47, 'Nitrogen', 18, 'correct', 1, 3),
(48, 'Carbon', 18, 'incorrect', 0, 3),
(49, 'Suplur oxide', 18, 'incorrect', 0, 3),
(50, '32', 19, 'incorrect', 0, 3),
(51, '206', 19, 'correct', 1, 3),
(56, 'Physics', 21, 'correct', 2, 3),
(57, 'Biology', 21, 'correct', 2, 3),
(58, 'Chemistry', 21, 'correct', 2, 3),
(59, 'Jeology', 21, 'incorrect', 0, 3),
(60, 'Lithium', 22, 'incorrect', 0, 3),
(61, 'Iron', 22, 'incorrect', 0, 3),
(62, 'Silver', 22, 'correct', 1, 3),
(63, 'Solid', 23, 'correct', 1, 3),
(64, 'Liquid', 23, 'correct', 1, 3),
(65, 'Gas', 23, 'correct', 1, 3),
(67, 'Plasma', 23, 'incorrect', 0, 3),
(68, 'Molten', 23, 'incorrect', 0, 3),
(69, 'The Antarctic blue whale', 24, 'correct', 2, 3),
(70, 'Mega shark', 24, 'incorrect', 0, 3),
(71, 'Shark whale', 24, 'incorrect', 0, 3),
(72, 'Elephant', 24, 'incorrect', 0, 3),
(73, 'Earth', 25, 'incorrect', 0, 3),
(74, 'Jupiter', 25, 'correct', 1, 3),
(75, 'Saturn', 25, 'incorrect', 0, 3),
(76, 'Mars', 25, 'incorrect', 0, 3),
(77, 'Cheetah', 26, 'correct', 1, 3),
(78, 'Tiger', 26, 'incorrect', 0, 3),
(79, 'Lion', 26, 'incorrect', 0, 3),
(80, 'Wild cat', 26, 'incorrect', 0, 3),
(81, 'Kidney', 27, 'incorrect', 0, 3),
(82, 'Liver', 27, 'correct', 1, 3),
(83, 'Stomach', 27, 'incorrect', 0, 3),
(84, 'Rectum', 27, 'incorrect', 0, 3),
(85, 'Lungs', 27, 'incorrect', 0, 3),
(86, '8', 28, 'incorrect', 0, 3),
(87, '6', 28, 'incorrect', 0, 3),
(88, '2', 28, 'correct', 1, 3),
(89, '1', 28, 'incorrect', 0, 3),
(90, '  Monitor', 29, 'correct', 1, 7),
(91, 'Program', 29, 'incorrect', 0, 7),
(92, 'OS', 29, 'incorrect', 0, 7),
(93, 'Microsoft Office', 29, 'incorrect', 0, 7),
(94, 'Keyboard', 30, 'incorrect', 0, 7),
(95, ' Microsoft Word', 30, 'correct', 1, 7),
(96, 'Speakers', 30, 'incorrect', 0, 7),
(97, 'Mouse', 30, 'incorrect', 0, 7),
(98, 'Hard Drive', 31, 'incorrect', 0, 7),
(99, 'Central Processing Unit', 31, 'correct', 1, 7),
(100, 'Database', 31, 'incorrect', 0, 7),
(101, 'System software', 31, 'incorrect', 0, 7),
(104, 'Android', 32, 'correct', 1, 7),
(105, 'Microsoft Windows', 32, 'correct', 1, 7),
(106, 'Microsoft Word', 32, 'incorrect', 0, 7),
(107, 'Linux', 32, 'correct', 1, 7),
(108, 'Liveware', 33, 'correct', 1, 7),
(109, 'Software', 33, 'correct', 1, 7),
(111, 'Hardware', 33, 'incorrect', 0, 7),
(112, 'Drivers', 33, 'incorrect', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(255) NOT NULL,
  `exam_title` varchar(255) NOT NULL,
  `exam_desc` text NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `finish_time` varchar(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `enrolment_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_title`, `exam_desc`, `exam_date`, `start_time`, `finish_time`, `u_id`, `enrolment_key`) VALUES
(3, 'Science CAT 1', 'Ensure you answers all questions', '2023-06-23', '11:20', '13:00', 11, 'RLk1C3'),
(7, 'Basic tech test', '', '2023-06-26', '11:08', '12:30', 11, 'ZsN0tY');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `quiz_id` int(255) NOT NULL,
  `quiz_title` text NOT NULL,
  `exam_id` int(255) NOT NULL,
  `choices` varchar(255) NOT NULL,
  `quiz_points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`quiz_id`, `quiz_title`, `exam_id`, `choices`, `quiz_points`) VALUES
(18, 'Which is the main gas that makes up the Earth\'s atmosphere?', 3, 'single_choice', 1),
(19, 'How many bones are in the human body', 3, 'single_choice', 1),
(21, 'Which among the below is branche of science ? Select all correct choice.', 3, 'multiple_choice', 2),
(22, 'What metal is the best conductor of electricity?', 3, 'single_choice', 1),
(23, 'How many states of matter are there?Choose all', 3, 'multiple_choice', 1),
(24, 'What is the biggest animal in the world?', 3, 'single_choice', 2),
(25, 'What is the biggest planet in our solar system?', 3, 'single_choice', 1),
(26, 'What is the fastest land animal in the world?', 3, 'single_choice', 1),
(27, 'What is the heaviest organ in the human body?', 3, 'single_choice', 1),
(28, 'What is the only even prime number?', 3, 'single_choice', 1),
(29, ' Which of the following is hardware? ', 7, 'single_choice', 1),
(30, '   Which of the following is software?', 7, 'single_choice', 1),
(31, '  What do you call the “brain” of the computer?', 7, 'single_choice', 1),
(32, '    Which of the following is an example of an operating system?Choose all possible answers', 7, 'multiple_choice', 1),
(33, 'What is another word for applications?', 7, 'multiple_choice', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `exam_id` int(255) NOT NULL,
  `score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `u_id`, `exam_id`, `score`) VALUES
(3, 12, 3, 17),
(5, 13, 3, 18),
(6, 15, 3, 12),
(7, 15, 7, 4),
(8, 16, 3, 11),
(15, 12, 7, 6),
(16, 14, 3, 18),
(17, 14, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usr_mail` varchar(255) NOT NULL,
  `usr_role` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `u_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `username`, `usr_mail`, `usr_role`, `pwd`, `u_id`) VALUES
('Q-U60HSOya2X3REnTKcWrMqI5pNxVCG9g', 'Osborn Maja Mangaro', 'osbornmaja@gmail.com', 'examiner', '$2y$12$ZU9/1wIFvqmaRbfwpktg6Ors5IicJOxNpjacPrrTAfF73YCh3BIla', 11),
('Q-U6T1JYIPi39yzKHLEcN7edUBMoS5x4u', 'Mangaro', 'osbornmangaro@gmail.com', 'student', '$2y$12$DI8cbzD0/F9gCic3Gw.NzuKU6dxVNA7nUovBLCvtkHVrO6sDXQUIG', 12),
('Q-UsOLEiFJfRQxdBoIwDb4varmpl5Wye7', 'Rhoda', 'rhodaanzazi@yahoo.com', 'student', '$2y$12$p0iyEttUvIBSmN4KHPyWK.1jy.O74eyQ10zabrcQ/i2JjTkAhbzzS', 13),
('Q-UDe5ls3fVWIh8zocgkTpaEiYMqSFKLC', 'Maja ozzy', 'majaosborn@yahoo.com', 'student', '$2y$12$sQ/ec1Z9h1T32aetnFVkf.nCPXDjTyU4uMPtCPmN9ZBW7yPnZwaDi', 14),
('Q-U3iX2Oo5zFfWduDNPVH9GCmYqcKJh4x', 'Neville ', 'dqs221j2020@gmail.com', 'student', '$2y$12$G//Z1gtu/wJLD6Vf1aOazOR0nRwRwTXBF0kQFvenhpPlvQqCJ1Ucy', 15),
('Q-U1liMxrGqCz9POgyEW7XLTAofbpVvKF', 'Lilan', 'lilankombe9@gmail.com', 'student', '$2y$12$/KfkXUJdfdqn3BCt.GXSNu6eyOyVAV/o6/4EQjapQHGE6vfF/29ge', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users_answers`
--

CREATE TABLE `users_answers` (
  `user_ans_id` int(255) NOT NULL,
  `ans_id` int(255) NOT NULL,
  `u_id` int(250) NOT NULL,
  `exam_id` int(255) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_answers`
--

INSERT INTO `users_answers` (`user_ans_id`, `ans_id`, `u_id`, `exam_id`, `quiz_id`, `points`) VALUES
(28, 51, 12, 3, 19, 1),
(32, 62, 12, 3, 22, 1),
(36, 74, 12, 3, 25, 1),
(38, 77, 12, 3, 26, 1),
(39, 82, 12, 3, 27, 1),
(49, 47, 12, 3, 18, 1),
(51, 51, 13, 3, 19, 1),
(52, 56, 13, 3, 21, 2),
(53, 57, 13, 3, 21, 2),
(54, 58, 13, 3, 21, 2),
(55, 62, 13, 3, 22, 1),
(56, 63, 13, 3, 23, 1),
(57, 64, 13, 3, 23, 1),
(58, 65, 13, 3, 23, 1),
(59, 69, 13, 3, 24, 2),
(60, 74, 13, 3, 25, 1),
(61, 77, 13, 3, 26, 1),
(62, 82, 13, 3, 27, 1),
(63, 88, 13, 3, 28, 1),
(65, 47, 13, 3, 18, 1),
(66, 90, 13, 7, 29, 1),
(67, 95, 13, 7, 30, 1),
(68, 99, 13, 7, 31, 1),
(69, 104, 13, 7, 32, 1),
(70, 105, 13, 7, 32, 1),
(71, 107, 13, 7, 32, 1),
(72, 108, 13, 7, 33, 1),
(73, 109, 13, 7, 33, 1),
(74, 47, 14, 3, 18, 1),
(75, 56, 14, 3, 21, 2),
(76, 57, 14, 3, 21, 2),
(77, 58, 14, 3, 21, 2),
(78, 62, 14, 3, 22, 1),
(79, 63, 14, 3, 23, 1),
(80, 64, 14, 3, 23, 1),
(81, 65, 14, 3, 23, 1),
(82, 69, 14, 3, 24, 2),
(83, 74, 14, 3, 25, 1),
(84, 77, 14, 3, 26, 1),
(86, 88, 14, 3, 28, 1),
(89, 82, 14, 3, 27, 1),
(90, 56, 12, 3, 21, 2),
(91, 57, 12, 3, 21, 2),
(92, 58, 12, 3, 21, 2),
(93, 63, 12, 3, 23, 1),
(94, 64, 12, 3, 23, 1),
(95, 65, 12, 3, 23, 1),
(96, 69, 12, 3, 24, 2),
(99, 87, 12, 3, 28, 0),
(100, 90, 12, 7, 29, 1),
(101, 95, 12, 7, 30, 1),
(102, 99, 12, 7, 31, 1),
(103, 104, 12, 7, 32, 1),
(104, 105, 12, 7, 32, 1),
(106, 108, 12, 7, 33, 1),
(108, 47, 15, 3, 18, 1),
(109, 50, 15, 3, 19, 0),
(110, 56, 15, 3, 21, 2),
(111, 57, 15, 3, 21, 2),
(112, 58, 15, 3, 21, 2),
(113, 60, 15, 3, 22, 0),
(114, 63, 15, 3, 23, 1),
(115, 64, 15, 3, 23, 1),
(116, 65, 15, 3, 23, 1),
(117, 72, 15, 3, 24, 0),
(118, 74, 15, 3, 25, 1),
(120, 77, 15, 3, 26, 1),
(122, 89, 15, 3, 28, 0),
(123, 83, 15, 3, 27, 0),
(124, 95, 15, 7, 30, 1),
(126, 100, 15, 7, 31, 0),
(128, 106, 15, 7, 32, 0),
(129, 105, 15, 7, 32, 1),
(130, 104, 15, 7, 32, 1),
(131, 109, 15, 7, 33, 1),
(132, 46, 16, 3, 18, 0),
(135, 50, 16, 3, 19, 0),
(137, 57, 16, 3, 21, 2),
(138, 56, 16, 3, 21, 2),
(139, 58, 16, 3, 21, 2),
(141, 61, 16, 3, 22, 0),
(142, 63, 16, 3, 23, 1),
(143, 64, 16, 3, 23, 1),
(144, 65, 16, 3, 23, 1),
(145, 72, 16, 3, 24, 0),
(146, 74, 16, 3, 25, 1),
(147, 77, 16, 3, 26, 1),
(149, 84, 16, 3, 27, 0),
(150, 86, 16, 3, 28, 0),
(153, 51, 14, 3, 19, 1),
(154, 95, 14, 7, 30, 1),
(155, 99, 14, 7, 31, 1),
(156, 105, 14, 7, 32, 1),
(157, 106, 14, 7, 32, 0),
(158, 109, 14, 7, 33, 1),
(159, 108, 14, 7, 33, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_answers`
--
ALTER TABLE `users_answers`
  ADD PRIMARY KEY (`user_ans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `quiz_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_answers`
--
ALTER TABLE `users_answers`
  MODIFY `user_ans_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
