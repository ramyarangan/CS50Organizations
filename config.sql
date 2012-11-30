-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2012 at 02:26 AM
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

CREATE TABLE `project`.`announcements` (
  `id` int(10) unsigned NOT NULL,
  `text` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `privacy` int(4) NOT NULL,
  KEY `id` (`id`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `project`.`announcements` (`id`, `text`, `time`, `title`, `privacy`) VALUES
(4, 'Yale has added the event Harvard-Yale. Go check it out!', '2012-11-30 07:20:55', 'Harvard-Yale', 1),
(4, 'We fail.', '2012-11-30 07:22:18', 'Fale', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `project`.`clubs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(63) NOT NULL,
  `email` varchar(255) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `information` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`abbreviation`,`email`),
  KEY `name_2` (`name`,`abbreviation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `project`.`clubs` (`id`, `name`, `abbreviation`, `email`, `privacy`, `information`) VALUES
(4, 'Yale', 'Y', 'harvard_rejects@yale.edu', 1, 'Oh how we wish we were Harvard.');

-- --------------------------------------------------------

--
-- Table structure for table `clubTypePairs`
--

CREATE TABLE `project`.`clubTypePairs` (
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
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clubTypes`
--

CREATE TABLE `project`.`clubTypes` (
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

CREATE TABLE `project`.`events` (
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

CREATE TABLE `project`.`privacy` (
  `level` int(4) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy`
--

INSERT INTO `project`.`privacy` (`level`, `description`) VALUES
(1, 'public'),
(2, 'all club'),
(3, 'comp'),
(4, 'non-comp'),
(5, 'admin'),
(6, 'personal');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `project`.`subscriptions` (
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
(1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `project`.`users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `project`.`users` (`id`, `name`, `password`, `email`, `admin`) VALUES
(1, 'jharvard', '$1$1VCbRSmT$EaGmoKp2hobug8rciIlX8/', 'jharvard@harvard.edu', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
