-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2017 at 07:15 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mca16_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `parent`) VALUES
(1, 'HOME', 0),
(2, 'SUBJECT', 0),
(3, 'CG', 2),
(4, 'DS', 2),
(5, 'TOC', 2),
(6, 'COA', 2),
(7, 'OOPD', 2),
(8, 'ASSIGNMENTS', 0),
(9, 'ABOUT', 0),
(10, 'CONTACT', 0),
(11, 'CS', 2),
(12, 'Others', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_data` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment_data`, `comment_date`) VALUES
(1, 1, 1, 'Hi Comment 1', '2017-04-12 14:36:44'),
(2, 1, 2, 'Hello Comment 2', '2017-04-12 14:37:01'),
(3, 2, 2, '1st comment on post 2', '2017-04-12 14:46:18'),
(4, 2, 1, '2nd comment on post 2', '2017-04-12 14:46:18'),
(5, 0, 0, 'Hello', '2017-04-12 17:12:48'),
(6, 0, 0, 'Hello testing', '2017-04-12 17:18:26'),
(7, 0, 0, 'Hello testint tetsasf', '2017-04-12 17:24:50'),
(8, 1, 0, 'Hello testint tetsasfasasdasd dsfffffffffffffffffffffffffffffffffffffffffffffffff', '2017-04-12 17:40:17'),
(9, 1, 0, 'hello asd hello it s me', '2017-04-12 17:49:41'),
(10, 1, 0, 'hello successfull commenting', '2017-04-12 17:50:26'),
(11, 1, 0, 'helol tstsasdf dksfjsadhf', '2017-04-12 17:53:47'),
(12, 1, 0, 'hekko', '2017-04-13 02:03:05'),
(13, 1, 0, 'hekkojhjhkhkj', '2017-04-13 02:06:02'),
(14, 2, 0, '3rd comment on post 2', '2017-04-13 02:11:12'),
(15, 2, 0, '4rd comment on post 2', '2017-04-13 02:13:30'),
(16, 2, 0, '5th comment on post2', '2017-04-13 02:21:20'),
(17, 4, 0, 'what assignment', '2017-04-13 02:22:22'),
(18, 5, 0, 'graphics', '2017-04-13 02:38:56'),
(19, 2, 0, 'comment 6', '2017-04-13 04:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_category` int(11) NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_category`, `post_title`, `post_content`, `post_date`) VALUES
(1, 1, 12, 'Hello MCA16', 'Welcome to MCA16', '2017-04-11 16:49:01'),
(2, 2, 12, 'Aim of this website:', 'Share information, assignments, class notes...', '2017-04-11 16:49:10'),
(3, 0, 7, '', 'oopd', '2017-04-11 16:15:03'),
(4, 0, 8, '', 'Assignments', '2017-04-11 16:46:08'),
(5, 0, 3, '', 'computer graphics', '2017-04-11 16:46:24'),
(6, 0, 4, '', 'Data Structures', '2017-04-11 16:46:36'),
(7, 0, 6, '', 'Computer Organization and Architecture', '2017-04-11 16:47:01'),
(8, 0, 5, '', 'Theory of Computation', '2017-04-11 16:47:17'),
(9, 0, 11, '', 'Communication Skills', '2017-04-11 16:47:33'),
(10, 0, 12, '', 'Others', '2017-04-11 16:47:51'),
(11, 0, 12, '', 'Hello Good Afternoon\r\n', '2017-04-12 09:07:40'),
(12, 0, 12, '', 'Hello good morning', '2017-04-13 03:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `status`) VALUES
(1, 'Damian', '', 'welcome', '', ''),
(2, 'Damn', '', 'welcome', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
