-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 12:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akshay`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` bigint(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `project_id` int(11) NOT NULL,
  `logoImage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`name`, `email`, `number`, `company`, `project_id`, `logoImage`) VALUES
('client ABC', 'nimeshkadecha4560@gmail.com', 1234567890, 'c', 0, ''),
('fdgdfgn', 'nimeshkadecha4560@gmail.com', 1321321321, 'dfgndfgn', 1, 'IMG-641991e3387963.39303212.jpg'),
('xbfxc', 'nxfgnxfgn@gmail.com', 2165321312, 'xfgnxfgnxfgn', 2, 'IMG-6419928775ff66.67477232.png'),
('dfhgg', 'nimeshkadecha4560@gmail.com', 321321321321, 'sgns', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `image_des` text NOT NULL,
  `email` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `typ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_url`, `image_des`, `email`, `post_id`, `project_id`, `post_title`, `typ`) VALUES
(23, 'IMG-6411af151066c4.75731145.mp4', ' video', 'nimeshkadecha4560@gmail.com', 0, 0, ' post a', 1),
(25, 'IMG-64183faaad90c5.24047780.jpeg', ' post', 'nimeshkadecha4560@gmail.com', 1, 0, ' post nuber 2', 0),
(26, 'IMG-6418419f942e44.25390176.jpg', ' test update', 'nimeshkadecha4560@gmail.com', 0, 0, ' post a', 0),
(27, 'IMG-64199187d9d421.88243682.jpg', ' test', 'nimeshkadecha4560@gmail.com', 0, 0, ' post a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `postTitle` varchar(100) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `postTitle`, `project_id`) VALUES
(0, 'post a', 0),
(1, 'post nuber 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `projectTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `projectTitle`) VALUES
(0, 'project XYZ'),
(1, 'dfgndfgndfgn'),
(2, 'xgfnxfgnxfgn'),
(3, 'sfgn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
