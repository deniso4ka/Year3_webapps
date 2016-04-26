-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2016 at 04:53 AM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `image`) VALUES
(1, 'Denis', 'deniss.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `projectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `projectId`) VALUES
(1, 'Gaming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `projectId` int(11) NOT NULL,
  `status` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `projectId`, `status`, `image`) VALUES
(1, 'Matt', 1, 'present', 'matt.jpg'),
(2, 'Deniss', 2, 'present', 'deniss.jpg'),
(3, 'Paul', 3, ' past', 'default.jpg'),
(4, 'Boris', 4, ' past', 'default.jpg'),
(5, 'James', 5, ' past', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `supervisor` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `supervisor`, `description`, `status`, `image`) VALUES
(1, '3D Racing Game', 1, 'C programming', 'active', 'matt.jpg'),
(2, ' PHP Web Site', 2, ' php programming', ' active', 'unity.jpg'),
(3, '3D Arcade Game', 3, ' Unity Developing', ' past', 'default.jpg'),
(4, ' Unity Gaming', 4, ' 3d unity strategic game', 'past', 'unity.jpg'),
(5, 'Web aplication', 5, ' Graphical user application', ' past', 'unity.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `authorId` int(11) NOT NULL,
  `url` text NOT NULL,
  `pdfPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `authorId`, `url`, `pdfPath`) VALUES
(1, 'Gaming Developement', 1, 'http://google.com', 'some.pdf'),
(2, ' Graphical Interface Developemnet', 2, 'http://google.com', 'some.pdf'),
(3, ' Graphics in 3D', 3, 'http://google.com', ' some.pdf'),
(4, ' Gaming Management Approaches', 4, 'http://google.com', 'some.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `projectId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `status` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `projectId`, `memberId`, `status`, `image`) VALUES
(1, 'Artur', 1, 1, 'present', 'default.jpg'),
(2, 'David', 2, 2, 'present', 'default.jpg'),
(3, 'Ivan', 3, 3, 'past', 'default.jpg'),
(4, 'Kevin', 4, 4, 'past', 'default.jpg'),
(5, 'Martin', 5, 5, 'past', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `rank` text NOT NULL,
  `password` text NOT NULL,
  `studentId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `rank`, `password`, `studentId`, `memberId`) VALUES
(1, 'admin', '$2y$10$ohsrU0Ads0bvt1QB5fnV..LFki/d5QVf3oRLMW03GsOBwmB702nBS', 0, 0),
(2, 'supervisor', '$2y$10$..k/ydL9j6aVY9wgmcunw.OaWOhZJCBN/vr9uov2b4vm4rWJXdaUG', 0, 1),
(3, 'supervisor', '$2y$10$5b4OPKztCoxNxVK5.8sA6erVM.pBRsEwUW5oxY/X6dwGrzV19aTR.', 0, 2),
(4, 'student', '$2y$10$aYGQsF9.PNB9U5YPt3HsiO379qzGOuhvvHdA5T8PORMx/O324BbP2', 1, 0),
(5, 'student', '$2y$10$R5sWCgo1zesrV4M32SgsXu7yOAQuSEOS2jkwWGHoHG3tDJe2bJQEO', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
