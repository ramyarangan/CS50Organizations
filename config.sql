-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2012 at 10:37 PM
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
  `text` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `privacy` int(4) NOT NULL,
  KEY `id` (`id`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE IF NOT EXISTS `project`.`clubs` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(63) NOT NULL,
  `email` varchar(255) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `information` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`abbreviation`,`email`),
  KEY `name_2` (`name`,`abbreviation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(0, 'public'),
(1, 'all club'),
(2, 'comp'),
(3, 'non-comp'),
(4, 'admin'),
(5, 'personal');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `project`.`users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
