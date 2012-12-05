-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2012 at 05:42 PM
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
(4, 2, 'Yale has added the event Harvard-Yale. Go check it out!', '2012-11-30 07:20:55', 'Harvard-Yale', 1),
(4, 1, 'We fail.', '2012-11-30 07:22:18', 'Fale', 1),
(7, 1, 'haiii', '2012-12-05 21:18:03', 'HI MICHELLE!', 2);

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
('4.5', 'https://www.google.com/calendar/embed?src=2ah0qjho0ctekccbmtmpatunco%40group.calendar.google.com&ctz=America/New_York'),
('7.1', '1sj0pb3ffcpnit08d2qbbnbkqc%40group.calendar.google.com'),
('7.2', 'bs59l137lrreppqlmaicuk2k8o%40group.calendar.google.com'),
('7.3', 'ii5ascjhbhb754kqteh4ptefcc%40group.calendar.google.com'),
('7.4', 'djfc8dbhd2qpmhnvushi387b0k%40group.calendar.google.com'),
('7.5', 'n29fg4kgailo54v9simkchocn4%40group.calendar.google.com'),
('8.1', 'https://www.google.com/calendar/feeds/ket13ekoqhp1i9jttgslo6u7r4%40group.calendar.google.com/private/full'),
('8.2', 'https://www.google.com/calendar/feeds/ldiav83dmstebmsaqv6gugucj0%40group.calendar.google.com/private/full'),
('8.3', 'https://www.google.com/calendar/feeds/du9q282hfb4hrcgcpcclskvgkk%40group.calendar.google.com/private/full'),
('8.4', 'https://www.google.com/calendar/feeds/4s1h1fco5ukr3rspqo3m5s8nn8%40group.calendar.google.com/private/full'),
('8.5', 'https://www.google.com/calendar/feeds/e233mjio8gdcefjgjnenefv7ao%40group.calendar.google.com/private/full');

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
(4, 1),
(4, 2),
(6, 2),
(7, 2),
(8, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `project`.`clubs` (`id`, `name`, `abbreviation`, `email`, `privacy`, `information`) VALUES
(4, 'Yale', 'Y', 'harvard_rejects@yale.edu', 0, 'Oh how we wish we were Harvard.'),
(7, 'CS50', 'CS50', 'ramyarangan@college.harvard.edu', 1, 'This is CS50.'),
(8, 'Test', 'T', 'mdeng@college.harvard.edu', 1, 'hi');

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
  PRIMARY KEY (`privacy`,`name`),
  KEY `id` (`id`,`privacy`,`name`,`startTime`,`endTime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `project`.`events` (`id`, `privacy`, `name`, `startTime`, `endTime`, `information`) VALUES
(4, 1, 'Harvard-Yale', '2012-11-30 02:20:00', '2012-11-30 02:20:00', 'The event in which Harvard beats Yale.');

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
(2, 4, 1),
(2, 7, 2),
(3, 4, 2),
(1, 4, 5),
(1, 7, 5),
(1, 8, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `project`.`users` (`id`, `name`, `password`, `email`, `admin`, `realname`) VALUES
(1, 'jharvard', '$1$1VCbRSmT$EaGmoKp2hobug8rciIlX8/', 'jharvard@harvard.edu', 1, 'John Harvard'),
(2, 'lcheng', '$1$3CPb1TBD$APZIBqsNdnYfSzWmz00jU/', 'lcheng@college.harvard.edu', 0, 'Lucy Cheng'),
(3, 'rrangan', '$1$6vdFkN7r$m3wXsZQ2Xvo5svbGpMvqz1', 'ramyarangan@college.harvard.edu', 0, 'Ramya Rangan');

