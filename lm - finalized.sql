-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 12:16 AM
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
-- Database: `lm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` smallint(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `NRIC` int(10) NOT NULL,
  `users_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `NRIC`, `users_id`) VALUES
(15000, 'Martin', 2147483647, 74);

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE `attempt` (
  `attempt_id` mediumint(5) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `code` varchar(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `question_number` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attempt`
--

INSERT INTO `attempt` (`attempt_id`, `student_email`, `code`, `timestamp`, `question_number`, `answer`) VALUES
(50000, 'richard@student.com', '6bbb', '2024-04-12 20:16:21', 0, 'Array'),
(50001, 'richard@student.com', '6bbb', '2024-04-12 20:16:21', 0, 'Array'),
(50002, 'richard@student.com', '6bbb', '2024-04-12 20:18:46', 1, 'generate energy wihout oxygen'),
(50003, 'richard@student.com', '6bbb', '2024-04-12 20:18:46', 2, 'inhale and exhale');

-- --------------------------------------------------------

--
-- Table structure for table `mcq_choice`
--

CREATE TABLE `mcq_choice` (
  `choice_id` smallint(5) NOT NULL,
  `MCQ_id` smallint(5) DEFAULT NULL,
  `question_number` smallint(6) NOT NULL,
  `choice_text` text NOT NULL,
  `is_correct` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mcq_choice`
--

INSERT INTO `mcq_choice` (`choice_id`, `MCQ_id`, `question_number`, `choice_text`, `is_correct`) VALUES
(741, 192, 1, '2', 0),
(742, 192, 1, '3', 0),
(743, 192, 1, '4', 1),
(744, 192, 1, '5', 0),
(745, 193, 2, '6', 1),
(746, 193, 2, '5', 0),
(747, 193, 2, '4', 0),
(748, 193, 2, '7', 0),
(749, 194, 3, '5', 0),
(750, 194, 3, '56', 0),
(751, 194, 3, '10', 0),
(752, 194, 3, '11', 1),
(753, 195, 4, '8', 0),
(754, 195, 4, '17', 1),
(755, 195, 4, '9', 0),
(756, 195, 4, '89', 0),
(757, 196, 5, '0', 0),
(758, 196, 5, '3', 0),
(759, 196, 5, '2', 1),
(760, 196, 5, '4', 0),
(761, 197, 6, '4', 1),
(762, 197, 6, '5', 0),
(763, 197, 6, '6', 0),
(764, 197, 6, '3', 0),
(765, 198, 7, '10', 1),
(766, 198, 7, '20', 0),
(767, 198, 7, '0', 0),
(768, 198, 7, '12', 0),
(769, 199, 8, '14', 0),
(770, 199, 8, '35', 0),
(771, 199, 8, '12', 0),
(772, 199, 8, '15', 1),
(773, 200, 9, '5', 0),
(774, 200, 9, '56', 0),
(775, 200, 9, '6', 0),
(776, 200, 9, '30', 1),
(777, 201, 10, '5', 0),
(778, 201, 10, '4', 1),
(779, 201, 10, '6', 0),
(780, 201, 10, '8', 0),
(821, 212, 1, 'fish', 0),
(822, 212, 1, 'shark', 0),
(823, 212, 1, 'whale', 1),
(824, 212, 1, 'frog', 0),
(825, 213, 2, 'fish', 0),
(826, 213, 2, 'orang utan', 0),
(827, 213, 2, 'cat', 1),
(828, 213, 2, 'bird', 0),
(829, 214, 3, 'fish', 0),
(830, 214, 3, 'orang utan', 0),
(831, 214, 3, 'shark', 0),
(832, 214, 3, 'bird', 1),
(833, 215, 4, 'Eagle', 1),
(834, 215, 4, 'Pig', 0),
(835, 215, 4, 'Tiger', 0),
(836, 215, 4, 'Stingray', 0),
(837, 216, 5, 'Bird', 0),
(838, 216, 5, 'Pangolin', 1),
(839, 216, 5, 'Wolf', 0),
(840, 216, 5, 'Frog', 0),
(841, 217, 6, 'Shark', 0),
(842, 217, 6, 'Grasshopper', 0),
(843, 217, 6, 'Ant', 0),
(844, 217, 6, 'Bull', 1),
(845, 218, 7, 'Human', 0),
(846, 218, 7, 'Lion', 0),
(847, 218, 7, 'Bird', 1),
(848, 218, 7, 'Cat', 0),
(849, 219, 8, 'Sheep', 0),
(850, 219, 8, 'Lamb', 0),
(851, 219, 8, 'Salmon', 0),
(852, 219, 8, 'Scorpion', 1),
(853, 220, 9, 'Shark', 1),
(854, 220, 9, 'Tree', 0),
(855, 220, 9, 'Dog', 0),
(856, 220, 9, 'Rat', 0),
(857, 221, 10, 'Orca', 1),
(858, 221, 10, 'Lion', 0),
(859, 221, 10, 'Tiger', 0),
(860, 221, 10, 'Eagle', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_question`
--

CREATE TABLE `mcq_question` (
  `MCQ_id` smallint(5) NOT NULL,
  `title` text DEFAULT NULL,
  `question_number` smallint(6) NOT NULL,
  `question_text` text NOT NULL,
  `teacher_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mcq_question`
--

INSERT INTO `mcq_question` (`MCQ_id`, `title`, `question_number`, `question_text`, `teacher_email`) VALUES
(192, 'Simple Maths', 1, 'What is 2 + 2?', 'marcus@teacher.com'),
(193, 'Simple Maths', 2, 'What is 4 + 2?', 'marcus@teacher.com'),
(194, 'Simple Maths', 3, 'What is 5 + 6?', 'marcus@teacher.com'),
(195, 'Simple Maths', 4, 'What is 8 + 9', 'marcus@teacher.com'),
(196, 'Simple Maths', 5, 'What is 10 - 8?', 'marcus@teacher.com'),
(197, 'Simple Maths', 6, 'What is  11 - 7?', 'marcus@teacher.com'),
(198, 'Simple Maths', 7, 'What is 20 - 10?', 'marcus@teacher.com'),
(199, 'Simple Maths', 8, 'What is 3 x 5?', 'marcus@teacher.com'),
(200, 'Simple Maths', 9, 'What is 5 x 6?', 'marcus@teacher.com'),
(201, 'Simple Maths', 10, 'What is 8 / 2', 'marcus@teacher.com'),
(212, 'Basic Science', 1, 'What is a mammal', 'marcus@teacher.com'),
(213, 'Basic Science', 2, 'What is four legged', 'marcus@teacher.com'),
(214, 'Basic Science', 3, 'What has 2 legs', 'marcus@teacher.com'),
(215, 'Basic Science', 4, 'What has wings', 'marcus@teacher.com'),
(216, 'Basic Science', 5, 'What has scales', 'marcus@teacher.com'),
(217, 'Basic Science', 6, 'What has lungs?', 'marcus@teacher.com'),
(218, 'Basic Science', 7, 'What has a beak', 'marcus@teacher.com'),
(219, 'Basic Science', 8, 'What has poison', 'marcus@teacher.com'),
(220, 'Basic Science', 9, 'What is an apex predator?', 'marcus@teacher.com'),
(221, 'Basic Science', 10, 'What lives in Ocean?', 'marcus@teacher.com');

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE `revision` (
  `revision_id` smallint(5) NOT NULL,
  `code` varchar(5) NOT NULL,
  `MCQ_id` smallint(5) DEFAULT NULL,
  `subjective_id` smallint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revision_code`
--

CREATE TABLE `revision_code` (
  `code` varchar(5) NOT NULL,
  `MCQ_id` smallint(5) DEFAULT NULL,
  `subjective_id` smallint(5) DEFAULT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacher_email` varchar(100) NOT NULL,
  `num_questions` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `revision_code`
--

INSERT INTO `revision_code` (`code`, `MCQ_id`, `subjective_id`, `time_created`, `teacher_email`, `num_questions`) VALUES
('5cac', NULL, 30033, '2024-04-12 07:40:38', 'marcus@teacher.com', 2),
('882df', 201, NULL, '2024-04-12 07:01:04', 'marcus@teacher.com', NULL),
('6734f', 221, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6734f', 220, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6734f', 219, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6734f', 218, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6734f', 217, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6734f', 216, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6734f', 215, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6734f', 214, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6734f', 213, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6734f', 212, NULL, '2024-04-12 08:10:59', 'marcus@teacher.com', NULL),
('6bbb', NULL, 30037, '2024-04-12 15:31:53', 'marcus@teacher.com', NULL),
('6bbb', NULL, 30036, '2024-04-12 15:31:53', 'marcus@teacher.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` smallint(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `NRIC` int(10) NOT NULL,
  `users_id` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `NRIC`, `users_id`) VALUES
(25009, 'Richard', 2147483647, 73);

-- --------------------------------------------------------

--
-- Table structure for table `subjective`
--

CREATE TABLE `subjective` (
  `subjective_id` smallint(5) NOT NULL,
  `title` text DEFAULT NULL,
  `question_number` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `teacher_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjective`
--

INSERT INTO `subjective` (`subjective_id`, `title`, `question_number`, `question`, `answer`, `teacher_email`) VALUES
(30032, 'Basic Science', 1, 'Explain Omnivores.', NULL, 'marcus@teacher.com'),
(30033, 'Basic Science', 2, 'Explain Karnivores.', NULL, 'marcus@teacher.com'),
(30034, 'Write Essay', 1, 'Write an e-mail to your teacher for being absent tomorrow.', NULL, 'marcus@teacher.com'),
(30035, 'Write Essay', 2, 'One day, you met a tiger in the Jungle....', NULL, 'marcus@teacher.com'),
(30036, 'Biology', 1, 'Explain the process of fermentation.', NULL, 'marcus@teacher.com'),
(30037, 'Biology', 2, 'Explain the process of Breathing.', NULL, 'marcus@teacher.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` smallint(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `NRIC` int(10) NOT NULL,
  `users_id` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `NRIC`, `users_id`) VALUES
(20006, 'Marcus', 2147483647, 75);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(73, 'richard@student.com', 'richard', 'Student'),
(74, 'martin@teacher.com', 'martin', 'Admin'),
(75, 'marcus@teacher.com', 'marcus', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`attempt_id`),
  ADD KEY `student_id` (`student_email`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `mcq_choice`
--
ALTER TABLE `mcq_choice`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `mcq_choice_ibfk_1` (`MCQ_id`);

--
-- Indexes for table `mcq_question`
--
ALTER TABLE `mcq_question`
  ADD PRIMARY KEY (`MCQ_id`),
  ADD KEY `teacher_id` (`teacher_email`);

--
-- Indexes for table `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`revision_id`),
  ADD KEY `MCQ_ID` (`MCQ_id`),
  ADD KEY `Subjective_ID` (`subjective_id`),
  ADD KEY `Revision_Code` (`code`);

--
-- Indexes for table `revision_code`
--
ALTER TABLE `revision_code`
  ADD KEY `MCQ_id` (`MCQ_id`),
  ADD KEY `revision_code_ibfk_1` (`subjective_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_ibfk_1` (`users_id`);

--
-- Indexes for table `subjective`
--
ALTER TABLE `subjective`
  ADD PRIMARY KEY (`subjective_id`),
  ADD KEY `subjective_ibfk_1` (`teacher_email`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `teacher_ibfk_1` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15001;

--
-- AUTO_INCREMENT for table `attempt`
--
ALTER TABLE `attempt`
  MODIFY `attempt_id` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50004;

--
-- AUTO_INCREMENT for table `mcq_choice`
--
ALTER TABLE `mcq_choice`
  MODIFY `choice_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=861;

--
-- AUTO_INCREMENT for table `mcq_question`
--
ALTER TABLE `mcq_question`
  MODIFY `MCQ_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `revision`
--
ALTER TABLE `revision`
  MODIFY `revision_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9223372036854775807;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25010;

--
-- AUTO_INCREMENT for table `subjective`
--
ALTER TABLE `subjective`
  MODIFY `subjective_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30038;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20007;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `Admin_usersid` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mcq_choice`
--
ALTER TABLE `mcq_choice`
  ADD CONSTRAINT `mcq_choice_ibfk_1` FOREIGN KEY (`MCQ_id`) REFERENCES `mcq_question` (`MCQ_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `MCQ_ID` FOREIGN KEY (`MCQ_id`) REFERENCES `mcq_question` (`MCQ_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Revision_Code` FOREIGN KEY (`code`) REFERENCES `revision_code` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Subjective_ID` FOREIGN KEY (`subjective_id`) REFERENCES `subjective` (`subjective_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revision_code`
--
ALTER TABLE `revision_code`
  ADD CONSTRAINT `revision_code_ibfk_1` FOREIGN KEY (`subjective_id`) REFERENCES `subjective` (`subjective_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
