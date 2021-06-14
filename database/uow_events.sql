-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2018 at 02:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uow_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `username`, `password`, `email`) VALUES
(1, 'saeed_et', '09870987', 'saeed_et90@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `booked_events`
--

CREATE TABLE `booked_events` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booked_events`
--

INSERT INTO `booked_events` (`event_id`, `user_id`) VALUES
(2, 1),
(9, 1),
(13, 1),
(11, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `event_name` varchar(500) NOT NULL,
  `txt` mediumtext NOT NULL,
  `event_date` date NOT NULL,
  `address` varchar(2000) NOT NULL,
  `capacity` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `promo_code` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `event_name`, `txt`, `event_date`, `address`, `capacity`, `image`, `promo_code`, `price`) VALUES
(2, 'Event name 1', '<p>asdasdasdasdasdasdasdasdasdasdasdasda123123123123123123123asdasdasdasd</p>\r\n', '2018-05-30', 'asdasdasd', 123, '', '33', 0),
(9, 'Event name 4', '<p>adsssssssssssssssssssssssssssss</p>\r\n', '2018-05-22', 'asdasd', 222, '1_3hyWN8UhcrL7P0Opbu7IQg.jpeg', 'asd', 0),
(11, 'Event name 5', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '2018-05-24', 'asdasdwq', 123, '1_3hyWN8UhcrL7P0Opbu7IQg.jpeg', 'eqw', 23),
(13, 'party party', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '2018-06-27', '6 binda St', 234, '', 'asd', 21),
(14, 'event 5', 'asdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf\r\n', '2018-05-30', 'asdasdasdasfasf', 1234, 'adasdfa', '34', 23),
(15, 'event sample', 'asdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf\r\nasdkjfljkdsgflkeagfkjsdfsfsf', '2018-06-21', 'asdasdfasf', 24, 'afasfasf', '234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `email`) VALUES
(1, 'saeed_et', '09870987', 'saeed_et90@yahoo.com'),
(2, 'ximan', '09870987', 'ximan@yahoo.com'),
(3, 'ziheng', '1111', 'user3@yahoo.com'),
(4, 'long', '22', 'sisi@yahoo.com'),
(5, 'haoyu', '3333', 'haoyu@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booked_events`
--
ALTER TABLE `booked_events`
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booked_events`
--
ALTER TABLE `booked_events`
  ADD CONSTRAINT `booked_events_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booked_events_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
