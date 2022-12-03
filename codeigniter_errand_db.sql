-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 09:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter_errand_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_body` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `project_name`, `project_body`, `date_created`) VALUES
(1, 12, 'PHP', 'This task involves coding a script that echos names', '2021-03-10 20:43:58'),
(2, 13, 'Javascript', 'I need javascript to make applications behavior do nice things.', '2021-03-10 20:43:58'),
(5, 13, 'oo', 'ckdfjbvkfjb', '2021-03-10 22:08:13'),
(6, 12, 'Javascript', 'Javascript courses', '2021-04-11 08:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_body` text NOT NULL,
  `due_date` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `task_name`, `task_body`, `due_date`, `date_created`, `status`) VALUES
(2, 2, 'JavaScript Course ', 'Take JS Course Todat', '2021-03-31', '2021-03-12 20:22:50', 1),
(3, 1, 'Task1 updated', 'Task B ody 1', '2021-03-18', '2021-03-13 20:55:24', 1),
(4, 1, 'jjj2', 'kjhk', '2021-01-01', '2021-03-27 19:41:29', 0),
(5, 1, 'task22up', 'description task2', '2021-04-28', '2021-04-07 11:43:26', 0),
(6, 1, 'task2', 'desc', '0000-00-00', '2021-04-07 11:57:18', 1),
(9, 6, 'Onclick', 'onclick task', '0000-00-00', '2021-04-11 08:46:46', 0),
(10, 1, 'aa', 'aaa', '2021-04-30', '2021-04-11 09:54:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `register_date`) VALUES
(1, 'hana', '123', '', '', '', '2021-02-25 13:58:02'),
(2, 'ibrahim', '123', '', '', '', '2021-02-25 13:58:02'),
(3, 'Walid', '123', '', '', '', '2021-02-25 13:58:02'),
(5, 'jaja', 'jaja', '', '', '', '2021-02-25 13:58:02'),
(7, 'jaja', 'jaja', '', '', '', '2021-02-25 13:58:02'),
(8, 'jaja', 'jaja', '', '', '', '2021-02-25 13:58:02'),
(9, 'jaja', 'jaja', '', '', '', '2021-03-04 22:21:58'),
(10, 'okkk', '123', 'okkk', 'okkk', 'a@a.com', '2021-03-04 23:00:21'),
(11, 'kdsn', '$2y$12$MDkLwjLC.KNvi.aReX6cme.FfCyBTn5Sl.5wyyaGOMqiYfHyZPRRm', 'sddskk', 'jkbjk', 'c@c.com', '2021-03-04 23:07:26'),
(12, '123', '$2y$12$yIUKrvtfokHEPLQrm2ghD.lIlTlYYdKjCRYnw/v96H569xf/yiHVC', 'hana', 'hana', 'hana-12341@hotmail.com', '2021-03-04 23:13:38'),
(13, 'ibro', '$2y$12$EJ.YeWa/O5yI4QZT1SEGeuYdWC.rQccpq6vlQyn59P.ERVmd69WK6', 'ibro', 'ibro', 'ibro@hotmail.com', '2021-03-10 22:04:29'),
(14, 'hana', '$2y$12$tHc0bT/195lFiXMFp9pSxOExgrlZy4hRMnkv2Bq0IdDGJpGd6jtEG', 'hana', 'hana', 'hana@hana.com', '2021-03-27 19:12:00'),
(15, 'hanafa', '$2y$12$F3voROUeqQ97d56pX0SHlONembnqwV1RcCAqpPig.04t3D4DauIsy', 'hana', 'fakhouri', 'hana@hana.com', '2021-03-27 19:13:39'),
(16, 'hanafa', '$2y$12$wdkefxnf3z1UFtuF75yYpeYwRZBKE7fPWMXGSg/2vDq70SljO.kZO', 'hana', 'faa', 'hana@hana.com', '2022-12-03 20:54:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
