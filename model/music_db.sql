-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 04:19 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `m_id` int(11) NOT NULL,
  `m_uploader` int(8) NOT NULL,
  `m_title` varchar(250) NOT NULL,
  `m_description` text NOT NULL,
  `m_singers` text NOT NULL,
  `m_cover` varchar(100) NOT NULL,
  `m_music_file` varchar(100) NOT NULL,
  `m_video_embed` varchar(255) NOT NULL,
  `m_genre` varchar(45) NOT NULL,
  `m_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_approved` int(1) NOT NULL DEFAULT '0',
  `m_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`m_id`, `m_uploader`, `m_title`, `m_description`, `m_singers`, `m_cover`, `m_music_file`, `m_video_embed`, `m_genre`, `m_uploaded`, `m_updated`, `m_approved`, `m_deleted`) VALUES
(1, 1, 'Foo1', 'Bar', 'Qux', 'Zoo.png', 'its-my-life.mp3', '', 'Hiphop', '2017-04-30 06:31:06', '2017-04-30 06:31:06', 1, 0),
(2, 1, 'Foo2', 'Bar', 'Qux', 'Tulips.jpg', 'its-my-life.mp3', '', 'Hiphop', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(3, 1, 'Foo3', 'Bar', 'Qux', 'Lighthouse.jpg', 'its-my-life.mp3', '', 'Hiphop', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(11, 1, 'Bad day', '', 'Daniel Powter', 'Chrysanthemum.jpg', 'its-my-life.mp3', '', 'Reggie/Zim Dancehall', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(12, 1, 'Bagsakan', '', 'Chito Miranda, Kiko Pangilinan, Gloc 9', 'Koala.jpg', 'its-my-life.mp3', '', 'Reggie/Zim Dancehall', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(13, 1, 'Ama Namin', '', 'Simbahang Katolika', 'Hydrangeas.jpg', 'its-my-life.mp3', '', 'Reggie/Zim Dancehall', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(14, 1, 'Wrong side of heaven', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Five Finger''s Death', 'Jellyfish.jpg', 'Maid with the Flaxen Hair.mp3', '', 'House Music', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(15, 1, 'Castle of Glass', '', 'Linkin'' Park', 'Desert.jpg', 'Maid with the Flaxen Hair.mp3', '', 'Urban Groove', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(16, 1, 'Foo4', 'Bar', 'Qux', 'Penguins.jpg', 'Maid with the Flaxen Hair.mp3', '', 'Hiphop', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(17, 1, 'asdsad', 'sadada', 'asd', 'bdf3bf1da3405725be763540d6601144.jpg', 'de969b251e0ca11bbe651b7b80c99049.mp3', '', 'Hiphop', '2017-04-28 04:33:03', '2017-04-28 04:33:03', 1, 0),
(18, 1, 'Purihin ang Panginoon', 'Lorem Ipsum', 'Me', 'fafa5efeaf3cbe3b23b2748d13e629a1.jpg', 'de969b251e0ca11bbe651b7b80c99049.mp3', '<iframe width="560" height="315" src="https://www.youtube.com/embed/PBqvGZUEmcc" frameborder="0" allowfullscreen></iframe>', 'Gospel', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(19, 1, 'Sleep Away', 'Hello', 'Red Hot Sauce', '67479b14b76ecc81c5f995d2688c1f47.png', 'b8b5bd53e23dd40b5c4a650e272f2e19.mp3', '<iframe width="560" height="315" src="https://www.youtube.com/embed/PBqvGZUEmcc" frameborder="0" allowfullscreen></iframe>', 'Urban Groove', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(20, 1, 'Sleep Away 2', 'Hello', 'Red Hot Sauce', '67479b14b76ecc81c5f995d2688c1f47.png', 'b8b5bd53e23dd40b5c4a650e272f2e19.mp3', '<iframe width="560" height="315" src="https://www.youtube.com/embed/PBqvGZUEmcc" frameborder="0" allowfullscreen></iframe>', 'Urban Groove', '2017-04-26 05:38:37', '2017-04-26 05:38:37', 1, 0),
(21, 4, 'Test', 'asdadsa', 'asdadas', '6e9ecb4a3c874e4958d441db20acf2c8.jpg', 'b8b5bd53e23dd40b5c4a650e272f2e19.mp3', '', 'Hiphop', '2017-04-25 22:46:07', '2017-04-25 22:46:07', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `s_id` int(8) NOT NULL,
  `s_music` int(8) NOT NULL,
  `s_action` varchar(45) NOT NULL,
  `s_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `s_id` int(8) NOT NULL,
  `s_music` varchar(10) NOT NULL,
  `s_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`s_id`, `s_music`, `s_created`) VALUES
(1, '1', '2017-04-06 03:34:25'),
(2, '14', '2017-04-06 03:34:57'),
(3, '1', '2017-04-06 03:36:03'),
(4, '1', '2017-04-06 03:36:04'),
(5, '3', '2017-04-06 03:40:43'),
(6, '3', '2017-04-06 03:40:52'),
(7, '14', '2017-04-06 03:57:56'),
(8, '15', '2017-04-06 03:58:04'),
(9, '15', '2017-04-06 03:59:05'),
(10, '1', '2017-04-06 03:59:09'),
(11, '1', '2017-04-06 05:18:42'),
(12, '13', '2017-04-07 02:47:15'),
(13, '12', '2017-04-07 02:47:16'),
(14, '11', '2017-04-07 02:47:17'),
(15, '14', '2017-04-07 02:52:06'),
(16, '1', '2017-04-07 02:52:09'),
(17, '12', '2017-04-07 02:52:12'),
(18, '11', '2017-04-07 02:52:14'),
(19, '14', '2017-04-07 02:57:21'),
(20, '14', '2017-04-07 03:02:02'),
(21, '14', '2017-04-07 03:03:27'),
(22, '14', '2017-04-07 03:03:45'),
(23, '14', '2017-04-07 03:04:07'),
(24, '14', '2017-04-07 03:04:38'),
(25, '14', '2017-04-07 03:04:40'),
(26, '16', '2017-04-07 03:04:45'),
(27, '16', '2017-04-07 03:04:48'),
(28, '16', '2017-04-07 03:04:49'),
(29, '16', '2017-04-07 03:04:50'),
(30, '16', '2017-04-07 03:04:51'),
(31, '16', '2017-04-07 03:04:51'),
(32, '16', '2017-04-07 03:06:27'),
(33, '16', '2017-04-07 03:06:34'),
(34, '16', '2017-04-07 03:06:56'),
(35, '16', '2017-04-07 03:06:57'),
(36, '16', '2017-04-07 03:06:58'),
(37, '16', '2017-04-07 03:06:58'),
(38, '16', '2017-04-07 03:06:59'),
(39, '14', '2017-04-07 03:21:30'),
(40, '3', '2017-04-11 05:59:32'),
(41, '2', '2017-04-11 06:04:22'),
(42, '2', '2017-04-11 06:06:08'),
(43, '2', '2017-04-11 06:07:42'),
(44, '1', '2017-04-11 06:09:18'),
(45, '1', '2017-04-11 06:10:38'),
(46, '1', '2017-04-11 06:10:48'),
(47, '1', '2017-04-11 06:10:55'),
(48, '1', '2017-04-11 06:11:02'),
(49, '1', '2017-04-11 06:11:06'),
(50, '1', '2017-04-11 06:11:10'),
(51, '18', '2017-04-11 08:04:50'),
(52, '19', '2017-04-11 08:06:24'),
(53, '1', '2017-04-11 08:15:42'),
(54, '1', '2017-04-11 08:16:30'),
(55, '1', '2017-04-11 08:16:37'),
(56, '1', '2017-04-11 08:18:29'),
(57, '1', '2017-04-11 08:18:32'),
(58, '1', '2017-04-11 08:18:36'),
(59, '1', '2017-04-11 08:18:39'),
(60, '1', '2017-04-11 08:18:47'),
(61, '1', '2017-04-11 08:18:50'),
(62, '1', '2017-04-11 08:19:23'),
(63, '1', '2017-04-11 08:19:31'),
(64, '1', '2017-04-11 08:19:50'),
(65, '1', '2017-04-11 08:21:50'),
(66, '1', '2017-04-11 08:22:15'),
(67, '12', '2017-04-11 08:22:26'),
(68, '14', '2017-04-11 08:26:20'),
(69, '2', '2017-04-11 08:28:44'),
(70, '13', '2017-04-11 08:28:47'),
(71, '12', '2017-04-11 08:28:48'),
(72, '11', '2017-04-11 08:28:48'),
(73, '17', '2017-04-11 08:29:15'),
(74, '20', '2017-04-11 08:29:48'),
(75, '16', '2017-04-11 08:30:38'),
(76, '16', '2017-04-11 08:31:04'),
(77, '1', '2017-04-26 07:25:41'),
(78, '1', '2017-04-26 07:31:54'),
(79, '2', '2017-04-26 07:32:03'),
(80, '16', '2017-04-28 06:09:57'),
(81, '16', '2017-04-28 06:17:14'),
(82, '16', '2017-04-28 06:17:51'),
(83, '16', '2017-04-28 06:18:04'),
(84, '1', '2017-04-28 06:32:34'),
(85, '17', '2017-04-28 06:32:35'),
(86, '17', '2017-04-28 06:32:51'),
(87, '17', '2017-04-28 06:33:05'),
(88, '16', '2017-04-28 04:57:26'),
(89, '16', '2017-04-28 04:57:52'),
(90, '16', '2017-04-28 05:01:08'),
(91, '16', '2017-04-28 05:01:21'),
(92, '16', '2017-04-28 05:02:01'),
(93, '16', '2017-04-28 05:02:31'),
(94, '16', '2017-04-28 05:02:34'),
(95, '16', '2017-04-28 05:03:58'),
(96, '16', '2017-04-28 05:03:59'),
(97, '16', '2017-04-28 05:05:46'),
(98, '16', '2017-04-28 05:05:51'),
(99, '16', '2017-04-28 05:06:02'),
(100, '14', '2017-04-28 05:07:00'),
(101, '2', '2017-04-28 05:07:36'),
(102, '14', '2017-04-28 05:08:59'),
(103, '14', '2017-04-28 05:09:01'),
(104, '14', '2017-04-28 05:09:02'),
(105, '16', '2017-04-28 05:09:02'),
(106, '2', '2017-04-28 05:09:50'),
(107, '1', '2017-04-29 04:28:50'),
(108, '1', '2017-04-30 04:15:45'),
(109, '14', '2017-04-30 04:15:55'),
(110, '1', '2017-04-30 04:15:58'),
(111, '1', '2017-04-30 04:16:17'),
(112, '1', '2017-04-30 04:17:07'),
(113, '1', '2017-04-30 04:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(8) NOT NULL,
  `u_name` varchar(120) NOT NULL,
  `u_username` varchar(20) NOT NULL,
  `u_password` varchar(45) NOT NULL,
  `u_email` varchar(90) NOT NULL,
  `u_activated` int(1) NOT NULL DEFAULT '1',
  `u_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `u_type` varchar(10) NOT NULL,
  `u_deleted` int(1) NOT NULL DEFAULT '0',
  `u_profile_img` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_username`, `u_password`, `u_email`, `u_activated`, `u_created`, `u_updated`, `u_type`, `u_deleted`, `u_profile_img`) VALUES
(1, 'jeremy0', 'ymerej94', '37d98d5a37efa84ab0305dc584c2aaa4b08bfbdb', 'jeremy.b.layson@gmail.com', 1, '2017-03-26 22:45:16', '2017-04-30 07:26:33', 'Fan', 0, 'default.png'),
(3, '1', '1', 'f25400f57252ff24521997cee64f5c77810e775c', '1', 1, '2017-03-27 20:50:38', '2017-04-27 01:50:57', 'Fan', 0, 'default.png'),
(4, 'jeremy', 'jeremy', '2cda695113873aecafda365573e497aa0c2e68f7', 'asada@gmail.com', 1, '2017-04-05 17:19:30', '2017-04-30 06:41:03', 'Admin', 0, 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `s_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `s_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
