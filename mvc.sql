-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2018 at 04:23 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.3-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(1, 'test', 'tesst@test', 'tests set test'),
(2, 'set', 'set@set', 'set test massage!'),
(5, 'asd', 'asd', 'asd'),
(6, 'asd111', 'asd22', 'ad3333');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `pages` (
  `id` tinyint(11) UNSIGNED NOT NULL,
  `alias` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text,
  `is_published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logins`
--

INSERT INTO `pages` (`id`, `alias`, `title`, `content`, `is_published`) VALUES
(1, 'about', 'About Us', 'test content', 1),
(4, 'about1', 'About Us', 'test content', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'admin',
  `password` varchar(32) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `role`, `password`, `is_active`) VALUES
(1, 'admin', 'admin@test.com', 'admin', '96822339466c6fcc680f1d7f74e3a3b5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fathername` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sex` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `lastname`, `name`, `fathername`, `birthday`, `email`, `password`, `phone`, `address`, `sex`) VALUES
(10, 'Snow', 'Djon', 'Stark', '1995-05-11', 'djon@djon', '111', '123123111123123', 'asd12312', 'men'),
(11, 'Snow', 'Djon', 'Stark', '1995-05-11', 'djon@djon', '111', '123123111123123', 'asd12312', '1'),
(12, 'Snow', 'Djon', 'Stark', '1995-05-11', 'djon@djon', '111', '123123111123123', 'asd12312', '1'),
(14, 'Urumtsev', 'Alexey', 'Andreevich', '1992-05-14', 'alexuryumtsev@mail.ru', '111', '89231457707', 'Novosibirsk akademgorodok', 'men'),
(18, 'Ar', 'arii', 'arievich', '1995-04-15', 'ar@ar', '111', '12312313123', 'asd123', 'man'),
(19, 'Arz', 'arii', 'arievich', '1995-04-15', 'ar@ar', '111', '12312313123', 'asd123', 'man'),
(21, 'asd', 'asd', 'asd', '1992-12-05', 'djon@djon', '12', '123123', 'qwe', 'man'),
(22, 'asd', 'asd', 'asd', '1992-12-05', 'djon@djon', '12', '123123', 'qwe', 'man'),
(23, 'asd', 'asd', 'asd', '1992-12-05', 'djon@djon', '12', '123123', 'qwe', 'man'),
(24, 'asd', 'asd', 'asd', '1992-12-05', 'djon@djon', '12', '123123', 'qwe', 'man');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `pages`
  MODIFY `id` tinyint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
