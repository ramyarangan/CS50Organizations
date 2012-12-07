-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2012 at 07:56 PM
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
(7, 1, 'haiii', '2012-12-05 21:18:03', 'HI MICHELLE!', 2),
(7, 0, 'CS50 has added the event Hackathon. Go check it out!', '2012-12-06 02:23:14', 'Hackathon', 1),
(7, 0, 'CS50 has added the event Hackathon2. Go check it out!', '2012-12-06 02:28:34', 'Hackathon2', 1),
(7, 0, 'CS50 has added the event Hackathon3. Go check it out!', '2012-12-06 02:31:41', 'Hackathon3', 1),
(7, 1, 'hai ', '2012-12-06 02:35:19', 'hi', 3),
(7, 1, 'hi', '2012-12-06 02:36:55', 'lol', 3),
(7, 1, 'hi', '2012-12-06 02:39:06', 'gg', 3),
(7, 1, 'hi', '2012-12-06 02:40:23', 'rawr', 1),
(7, 0, 'CS50 has added the event Hackathon!!. Go check it out!', '2012-12-06 03:33:18', 'Hackathon!!', 1),
(4, 1, 'derp', '2012-12-06 03:56:53', 'hai', 1);

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
('12.1', 'https://www.google.com/calendar/feeds/nornc8a7c2soc5n0q4e3rfttcg%40group.calendar.google.com/private/full'),
('13.1', 'https://www.google.com/calendar/feeds/2tvhc71vqvdk4u0d51q48ms23c%40group.calendar.google.com/private/full'),
('14.1', 'https://www.google.com/calendar/feeds/67k95g071q5sraqh40vp8baqdk%40group.calendar.google.com/private/full'),
('15.1', 'https://www.google.com/calendar/feeds/fo1d368m30ukdu7h3o8tmi208k%40group.calendar.google.com/private/full'),
('17.1', 'https://www.google.com/calendar/feeds/cr5uvn738ef4ge9upk86oejvs8%40group.calendar.google.com/private/full'),
('17.2', 'https://www.google.com/calendar/feeds/n5is0ujuh94flndnk7pmomk6nc%40group.calendar.google.com/private/full'),
('17.3', 'https://www.google.com/calendar/feeds/4neo784eo4rqe7meqe3eqen66k%40group.calendar.google.com/private/full'),
('17.4', 'https://www.google.com/calendar/feeds/kprfigejg5tqpq3qf518k2pueg%40group.calendar.google.com/private/full'),
('17.5', 'https://www.google.com/calendar/feeds/h8ql2hmsq0drchl3kih7gvatqk%40group.calendar.google.com/private/full'),
('17.6', 'https://www.google.com/calendar/feeds/h7u0lc6j6nsqsaab4g3crmcm08%40group.calendar.google.com/private/full'),
('19.1', 'https://www.google.com/calendar/feeds/iljj6pirhd5tte0c0mli86olbk%40group.calendar.google.com/private/full'),
('19.2', 'https://www.google.com/calendar/feeds/b3emhpmtfbk07ippa7mse91iis%40group.calendar.google.com/private/full'),
('19.3', 'https://www.google.com/calendar/feeds/k29i8g1knn1mh8dod48l6hg924%40group.calendar.google.com/private/full'),
('19.4', 'https://www.google.com/calendar/feeds/omsgfah2hasgqt7kk5b0dpp7qg%40group.calendar.google.com/private/full'),
('19.5', 'https://www.google.com/calendar/feeds/33irukt4mjpfi6803svguv07ac%40group.calendar.google.com/private/full'),
('19.6', 'https://www.google.com/calendar/feeds/cd13a14cudc27rr1di499aaslg%40group.calendar.google.com/private/full'),
('20.1', 'https://www.google.com/calendar/feeds/0tet32scagpcn0msuglmr8igq8%40group.calendar.google.com/private/full'),
('20.2', 'https://www.google.com/calendar/feeds/g8qdsaq91pu7160eiujd4dj628%40group.calendar.google.com/private/full'),
('20.3', 'https://www.google.com/calendar/feeds/g6do5sm5fcgv6dn6jn93e2s580%40group.calendar.google.com/private/full'),
('20.4', 'https://www.google.com/calendar/feeds/pc1pv8amufbekve4lguue6p3fg%40group.calendar.google.com/private/full'),
('20.5', 'https://www.google.com/calendar/feeds/g21a4be5kbutokq3mbapjsomps%40group.calendar.google.com/private/full'),
('20.6', 'https://www.google.com/calendar/feeds/9dmgbaumfi42i9u7sk6tdaaaj8%40group.calendar.google.com/private/full'),
('22.1', 'https://www.google.com/calendar/feeds/h5peqjj2hdr5mdj8ufsb5jm9bo%40group.calendar.google.com/private/full'),
('22.2', 'https://www.google.com/calendar/feeds/0p8p106iul45f73u5v8ldmarfs%40group.calendar.google.com/private/full'),
('22.3', 'https://www.google.com/calendar/feeds/alhsgj81q01ns87csgqu6v5f5o%40group.calendar.google.com/private/full'),
('22.4', 'https://www.google.com/calendar/feeds/7bldavj022ptlav2lol5afppp0%40group.calendar.google.com/private/full'),
('22.5', 'https://www.google.com/calendar/feeds/7ri9joge26972ncfspt869om58%40group.calendar.google.com/private/full'),
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
('8.5', 'https://www.google.com/calendar/feeds/e233mjio8gdcefjgjnenefv7ao%40group.calendar.google.com/private/full'),
('9.1', 'https://www.google.com/calendar/feeds/r1ls53qp51ueqvrjc4v4cpqbqc%40group.calendar.google.com/private/full'),
('9.2', 'https://www.google.com/calendar/feeds/m9q0s2ij72mbc8thhdkf5cd1a0%40group.calendar.google.com/private/full'),
('9.3', 'https://www.google.com/calendar/feeds/6okljfjislm2buscc47l6jdu0k%40group.calendar.google.com/private/full'),
('9.4', 'https://www.google.com/calendar/feeds/gpfuai6l9kpkehhmp8sr0m5ja4%40group.calendar.google.com/private/full'),
('9.5', 'https://www.google.com/calendar/feeds/g1qge2cfjjm0l4hh92qh7gkti8%40group.calendar.google.com/private/full'),
('9.6', 'https://www.google.com/calendar/feeds/g1gbucnfgngttpl2jlndoejlf8%40group.calendar.google.com/private/full');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `project`.`clubs` (`id`, `name`, `abbreviation`, `email`, `privacy`, `information`) VALUES
(4, 'Yale', 'Y', 'harvard_rejects@yale.edu', 0, 'Oh how we wish we were Harvard.'),
(7, 'CS50', 'CS50', 'ramyarangan@college.harvard.edu', 1, 'This is CS50.'),
(8, 'Test', 'T', 'mdeng@college.harvard.edu', 1, 'hi'),
(9, 'HackHarvard', 'HH', 'lightinthesky12@gmail.com', 0, 'hackerz.'),
(10, 'TESTING', 'IDK', 'lightinthesky12@gmail.com', 0, 'asdg'),
(11, 'UGH', 'OMG', 'lightinthesky12@gmail.com', 1, 'fml'),
(14, 'FML', 'FML', 'lightinthesky12@gmail.com', 0, 'FML'),
(15, 'alksdgj', 'AS', 'lightinthesky12@gmail.com', 1, 's'),
(16, 'UGH', 'UGH', 'lightinthesky12@gmail.com', 0, 'adsg'),
(17, 'BLA', 'BLAH', 'lightinthesky12@gmail.com', 0, 'adsg'),
(18, 'LALA', 'LALA', 'lightinthesky12@gmail.com', 0, 'asg'),
(19, 'lol', 'LOL', 'lightinthesky12@gmail.com', 1, 'sdg'),
(20, 'l', 'L', 'lightinthesky12@gmail.com', 1, 'sdg'),
(21, 's', 'S', 'lightinthesky12@gmail.com', 0, 's'),
(22, 'a', 'A', 'lightinthesky12@gmail.com', 0, 'hi');

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
(8, 2),
(9, 1),
(10, 3),
(11, 2),
(11, 3),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(17, 3),
(18, 3),
(19, 3),
(20, 2),
(21, 3),
(22, 3);

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
(7, 1, 'Hackathon', '2012-12-05 08:00:00', '2012-12-06 05:00:00', 'All nighter.', 'Microsoft NERD'),
(7, 1, 'Hackathon!!', '2012-12-05 08:00:00', '2012-12-06 05:00:00', 'in progress.', 'Microsoft NERD'),
(7, 1, 'Hackathon2', '2012-12-05 08:00:00', '2012-12-06 05:00:00', 'lol.', 'Microsoft NERD'),
(7, 1, 'Hackathon3', '2012-12-05 08:00:00', '2012-12-06 05:00:00', 'lol.', 'Microsoft NERD'),
(4, 1, 'Harvard-Yale', '2012-11-30 02:20:00', '2012-11-30 02:20:00', 'The event in which Harvard beats Yale.', '');

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
(3, '2012-12-05 22:33:18', 'CS50 has added the event Hackathon!!!', 1, 'allClubs.php?club=CS50'),
(2, '2012-12-05 22:33:18', 'CS50 has added the event Hackathon!!!', 1, 'allClubs.php?club=CS50'),
(1, '2012-12-05 22:33:18', 'CS50 has added the event Hackathon!!!', 1, 'allClubs.php?club=CS50'),
(2, '2012-12-05 22:56:53', 'Yale has added the announcement: hai!', 0, 'allClubs.php?club=Yale'),
(1, '2012-12-05 22:56:53', 'Yale has added the announcement: hai!', 0, 'allClubs.php?club=Yale');

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
(3, 7, 1),
(2, 7, 3),
(1, 4, 6),
(1, 7, 6),
(1, 8, 6),
(1, 9, 6),
(1, 10, 6),
(1, 11, 6),
(1, 12, 6),
(1, 13, 6),
(1, 14, 6),
(1, 15, 6),
(1, 17, 6),
(1, 18, 6),
(1, 19, 6),
(1, 20, 6),
(1, 21, 6),
(1, 22, 6);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
