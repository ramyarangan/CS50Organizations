-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2012 at 04:32 AM
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
  KEY `id` (`id`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `project`.`announcements` (`id`, `userID`, `text`, `time`, `title`, `privacy`) VALUES
(44, 4, 'testtesttest.', '2012-12-07 08:42:18', 'Testingggggggg', 1),
(45, 5, 'Yale has added the event Harvard-Yale. Go check it out!', '2012-12-07 09:13:05', 'Harvard-Yale', 1),
(45, 5, 'Yale has added the event Attempt 2. Go check it out!', '2012-12-07 09:15:49', 'Attempt 2', 1);

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
('44.6', 'https://www.google.com/calendar/feeds/252ois8h3ckfmb8j50hv5r55v8%40group.calendar.google.com/private/full'),
('45.1', 'https://www.google.com/calendar/feeds/1ah1q0m6304lst3890oveovnng%40group.calendar.google.com/private/full'),
('45.2', 'https://www.google.com/calendar/feeds/h76lf0pmobh79gt2maeqceh1r0%40group.calendar.google.com/private/full'),
('45.3', 'https://www.google.com/calendar/feeds/67c14pfqjrsd6g3oubspn2mvfk%40group.calendar.google.com/private/full'),
('45.4', 'https://www.google.com/calendar/feeds/tf84o3k2bksa71j65d6dnuhmks%40group.calendar.google.com/private/full'),
('45.5', 'https://www.google.com/calendar/feeds/pphennkbm6feip12k701acoc7c%40group.calendar.google.com/private/full'),
('45.6', 'https://www.google.com/calendar/feeds/a6lq5sq7g6u2b86jpm64itpc2c%40group.calendar.google.com/private/full');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `project`.`clubs` (`id`, `name`, `abbreviation`, `email`, `privacy`, `information`) VALUES
(44, 'Harvard Student Assholes', 'HSA', 'lightinthesky12@gmail.com', 0, 'We are the assholes.'),
(45, 'Yale', 'Y', 'ramya.rangan117@gmail.com', 0, 'Oh how we wish we were Harvard.');

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
(44, 2),
(45, 2);

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
(45, 1, 'Attempt 2', '2012-12-07 04:15:00', '2012-12-07 04:15:00', ';laksjdf', 'tryagain'),
(45, 1, 'Harvard-Yale', '2012-12-07 04:00:00', '2012-12-07 04:00:00', 'The event in which Harvard beats Yale.', 'Harvard');

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
(4, '2012-12-07 03:42:18', 'Harvard Student Assholes has added the announcement: Testingggggggg!', 0, 'allClubs.php?club=Harvard Student Assholes'),
(5, '2012-12-07 04:13:05', 'Yale has added the event Harvard-Yale!', 0, 'allClubs.php?club=Yale'),
(5, '2012-12-07 04:15:49', 'Yale has added the event Attempt 2!', 0, 'allClubs.php?club=Yale');

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
(3, 'all club'),
(4, 'comp'),
(5, 'non-comp'),
(6, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `project`.`subscriptions` (
  `userID` int(10) unsigned NOT NULL,
  `clubID` int(10) unsigned NOT NULL,
  `level` int(4) unsigned NOT NULL,
  PRIMARY KEY (`userID`,`clubID`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `project`.`subscriptions` (`userID`, `clubID`, `level`) VALUES
(4, 44, 6),
(5, 45, 6);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `project`.`users` (`id`, `name`, `password`, `email`, `admin`, `realname`) VALUES
(4, 'lcheng', '$1$10Kacm/c$cGWYhpzWrbRhWdjk3gs/f1', 'lcheng@college.harvard.edu', 1, 'Lucy Cheng'),
(5, 'jharvard', '$1$ypMZ5UF5$BFLjB39frfqJDKdBQCqbj0', 'ramya.rangan117@gmail.com', 1, 'John Harvard');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
