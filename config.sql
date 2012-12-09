-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2012 at 12:44 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS  `project` ;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `project`.`announcements` (
  `id` int(10) unsigned NOT NULL,
  `userID` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `privacy` int(4) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  KEY `id` (`id`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `project`.`announcements` (`id`, `userID`, `text`, `time`, `title`, `privacy`, `seen`) VALUES
(44, 4, 'testtesttest.', '2012-12-07 08:42:18', 'Testingggggggg', 1, 0),
(44, 4, 'lol', '2012-12-08 20:41:02', 'Did you get an email?', 1, 0),
(44, 4, 'lalalaa', '2012-12-08 20:48:25', 'Testing Notifications', 1, 0),
(44, 4, 'lalaa', '2012-12-08 20:48:59', 'Testing Notifications 2', 1, 0),
(44, 4, 'hm', '2012-12-08 20:50:15', 'Testing Notifications 3', 1, 0),
(44, 0, 'Lucy Cheng has added the event Notify. Go check it out!', '2012-12-08 22:10:06', 'Notify', 1, 0),
(44, 4, 'rawr', '2012-12-09 03:01:27', 'meeting', 1, 0),
(44, 4, 'rawr', '2012-12-09 03:02:54', 'meeting again', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `calendarLinks`
--

CREATE TABLE IF NOT EXISTS `project`.`calendarLinks` (
  `id` varchar(6) NOT NULL,
  `link` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendarLinks`
--

INSERT INTO `project`.`calendarLinks` (`id`, `link`) VALUES
('44.1', 'https://www.google.com/calendar/feeds/69osovaqq9g5dj7thmihs8if84%40group.calendar.google.com/private/full'),
('44.2', 'https://www.google.com/calendar/feeds/g4pu3ud88oehoumsuq47nsjos8%40group.calendar.google.com/private/full'),
('44.3', 'https://www.google.com/calendar/feeds/kj72eeenuc0s0tlsdkpg4fgakc%40group.calendar.google.com/private/full'),
('44.4', 'https://www.google.com/calendar/feeds/glmsl1afq3sc5hkmrs18t5qvds%40group.calendar.google.com/private/full'),
('44.5', 'https://www.google.com/calendar/feeds/cc36pom160iqcbvbnrp26ci1q4%40group.calendar.google.com/private/full'),
('44.6', 'https://www.google.com/calendar/feeds/252ois8h3ckfmb8j50hv5r55v8%40group.calendar.google.com/private/full');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE IF NOT EXISTS `project`.`clubs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(63) NOT NULL,
  `email` varchar(255) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `information` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`abbreviation`,`email`),
  KEY `name_2` (`name`,`abbreviation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `project`.`clubs` (`id`, `name`, `abbreviation`, `email`, `privacy`, `information`) VALUES
(44, 'Harvard Student Assholes', 'HSA', 'lightinthesky12@gmail.com', 0, 'We are the assholes.');

-- --------------------------------------------------------

--
-- Table structure for table `clubTypePairs`
--

CREATE TABLE IF NOT EXISTS `project`.`clubTypePairs` (
  `clubID` int(10) unsigned NOT NULL,
  `clubTypeID` int(6) unsigned NOT NULL,
  PRIMARY KEY (`clubID`,`clubTypeID`),
  KEY `clubID` (`clubID`,`clubTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubTypePairs`
--

INSERT INTO `project`.`clubTypePairs` (`clubID`, `clubTypeID`) VALUES
(44, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clubTypes`
--

CREATE TABLE IF NOT EXISTS `project`.`clubTypes` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clubTypes`
--

INSERT INTO `project`.`clubTypes` (`id`, `description`) VALUES
(1, 'Other'),
(2, 'Social'),
(3, 'Cultural');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `project`.`events` (
  `id` int(10) unsigned NOT NULL,
  `privacy` int(4) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `information` longtext NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`privacy`,`name`),
  KEY `id` (`id`,`privacy`,`name`,`startTime`,`endTime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `project`.`events` (`id`, `privacy`, `name`, `startTime`, `endTime`, `information`, `location`) VALUES
(44, 1, 'Notify', '2012-12-08 05:00:00', '2012-12-08 05:00:00', 'sleepp', 'Stoughton 07');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `project`.`notifications` (
  `userID` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `text` tinytext NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `redirect` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `project`.`notifications` (`userID`, `time`, `text`, `seen`, `redirect`) VALUES
(4, '2012-12-07 03:42:18', 'Harvard Student Assholes has added the announcement: Testingggggggg!', 1, 'allClubs.php?club=Harvard Student Assholes'),
(4, '2012-12-08 15:41:03', 'Harvard Student Assholes has added the announcement: Did you get an email?!', 1, 'allClubs.php?club=Harvard Student Assholes'),
(4, '2012-12-08 15:48:25', 'Harvard Student Assholes has added the announcement: Testing Notifications!', 1, 'allClubs.php?club=Harvard Student Assholes'),
(4, '2012-12-08 15:49:00', 'Harvard Student Assholes has added the announcement: Testing Notifications 2!', 1, 'allClubs.php?club=Harvard Student Assholes'),
(4, '2012-12-08 15:50:15', 'Harvard Student Assholes has added the announcement: Testing Notifications 3!', 1, 'allClubs.php?club=Harvard Student Assholes'),
(4, '2012-12-08 17:10:06', 'Harvard Student Assholes has added the event Notify!', 1, 'allClubs.php?club=Harvard Student Assholes'),
(4, '2012-12-08 22:01:27', 'Harvard Student Assholes has added the announcement: meeting!', 1, 'allClubs.php?club=Harvard Student Assholes'),
(5, '2012-12-08 22:01:29', 'Harvard Student Assholes has added the announcement: meeting!', 0, 'allClubs.php?club=Harvard Student Assholes'),
(4, '2012-12-08 22:02:54', 'Harvard Student Assholes has added the announcement: meeting again!', 1, 'allClubs.php?club=Harvard Student Assholes'),
(5, '2012-12-08 22:02:55', 'Harvard Student Assholes has added the announcement: meeting again!', 0, 'allClubs.php?club=Harvard Student Assholes');

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE IF NOT EXISTS `project`.`privacy` (
  `level` int(4) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy`
--

INSERT INTO `project`.`privacy` (`level`, `description`) VALUES
(1, 'public'),
(2, 'pending'),
(3, 'comp'),
(4, 'non-comp'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `project`.`subscriptions` (
  `userID` int(10) unsigned NOT NULL,
  `clubID` int(10) unsigned NOT NULL,
  `level` int(4) unsigned NOT NULL,
  `subscription` int(11) NOT NULL,
  PRIMARY KEY (`userID`,`clubID`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `project`.`subscriptions` (`userID`, `clubID`, `level`, `subscription`) VALUES
(4, 44, 6, 2),
(5, 44, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `project`.`users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `project`.`users` (`id`, `name`, `password`, `email`, `admin`, `realname`, `number`) VALUES
(4, 'lcheng', '$1$ruzq69mT$qXjXyIt60mm8oea2CYkkQ.', 'lcheng@college.harvard.edu', 1, ' ', '4085823798'),
(5, 'jharvard', '$1$iSH0LR1J$buVjC90tR.xiNwIpMe1Nt0', 'lightinthesky12@gmail.com', 0, 'John Harvard', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
