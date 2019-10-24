-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 10:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `announcement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `announcement`) VALUES
(1, 'Hi volunteers');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `username` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`username`, `start_time`, `end_time`, `date1`, `total`) VALUES
('alexarwady', '14:00', '15:00', '04-12-2019', 1),
('alexarwady', '13:00', '16:00', '29-03-2019', 3),
('alexarwady', '10:00', '13:00', '02-02-2002', 3),
('alexarwady', '12:00', '14:00', '13-12-2009', 2),
('lucassinclair', '12:00', '18:00', '12-12-1212', 6),
('alexarwady', '13:00', '16:00', '13-12-2019', 3),
('am38', '13:23', '13:24', '23-04-2019', 0.0166667),
('aaa197', '13:27', '13:27', '23-04-2019', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `username` varchar(255) NOT NULL,
  `comment_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`username`, `comment_text`) VALUES
('alexarwady', 'Hi Alex'),
('yaraghannam', 'Hello Yara!');

-- --------------------------------------------------------

--
-- Table structure for table `companion`
--

CREATE TABLE `companion` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `events` varchar(255) NOT NULL,
  `fund` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companion`
--

INSERT INTO `companion` (`firstname`, `lastname`, `title`, `phone`, `institution`, `events`, `fund`) VALUES
('Rose', 'Bond', 'Chief Executive Officer', '06654456', 'All for One', 'Fundraising', '5000$');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `row1` int(11) NOT NULL,
  `column1` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`row1`, `column1`, `username`) VALUES
(0, 1, 'aaa197'),
(1, 1, 'aaa197'),
(2, 1, 'aaa197'),
(3, 1, 'aaa197'),
(4, 1, 'aaa197'),
(5, 1, 'aaa197'),
(6, 1, 'aaa197'),
(7, 1, 'aaa197'),
(8, 1, 'aaa197'),
(9, 1, 'aaa197');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `username` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`username`, `date1`, `title`, `description`) VALUES
('alexarwady', '2019-12-14', 'Filing', 'Filing documents'),
('am38', '2019-04-23', 'Data Entry', 'Excel Table');

-- --------------------------------------------------------

--
-- Table structure for table `totalhours`
--

CREATE TABLE `totalhours` (
  `username` varchar(255) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totalhours`
--

INSERT INTO `totalhours` (`username`, `total`) VALUES
('aaa197', 0),
('admin', 0),
('alexarwady', 12),
('am38', 0.0166667),
('lucassinclair', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(1, 'Alexander', 'Arwadi', 'alexarwady', 'aaa197@mail.aub.edu', '201a07c56a1fedc424a5f2854aec1ce3'),
(2, 'Lea', 'Foz', 'admin', 'lf24@mail.aub.edu', '2a51f86964f3f45e96b77e2d93ab4816'),
(3, 'Lucas', 'Sinclair', 'lucassinclair', 'lucassinclair@gmail.com', '201a07c56a1fedc424a5f2854aec1ce3'),
(5, 'Ali', 'Moukallid', 'am38', 'abc', '698d51a19d8a121ce581499d7b701668'),
(6, 'alex', 'arwadi', 'aaa197', 'aaa197', '698d51a19d8a121ce581499d7b701668');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `totalhours`
--
ALTER TABLE `totalhours`
  ADD PRIMARY KEY (`username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
