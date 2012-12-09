-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2012 at 11:24 AM
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
(49, 0, 'Ramya Rangan has added the event The (Re)Game.. Go check it out!', '2012-12-09 11:44:15', 'The (Re)Game.', 3, 0),
(49, 0, 'Ramya Rangan has added the event The (Re)Game.. Go check it out!', '2012-12-09 11:46:07', 'The (Re)Game.', 1, 0),
(50, 0, 'Ramya Rangan has added the event Brunch Ã  Paris. Go check it out!', '2012-12-09 11:50:46', 'Brunch Ã  Paris', 1, 0),
(46, 6, 'The title says it all.', '2012-12-09 12:30:40', 'Meeting next week moved to Wednesday.', 3, 0),
(46, 6, 'Organizing a golf tournament for next month... we''ll let you know about details soon!', '2012-12-09 12:31:47', 'Mini-golf', 1, 0),
(46, 0, 'John  Harvard has added the event Admin meeting. Go check it out!', '2012-12-09 12:32:48', 'Admin meeting', 5, 0),
(46, 0, 'John  Harvard has added the event Club meeting. Go check it out!', '2012-12-09 12:35:16', 'Club meeting', 4, 0),
(46, 0, 'John  Harvard has added the event Election Meeting. Go check it out!', '2012-12-09 12:42:12', 'Election Meeting', 4, 0),
(46, 0, 'John  Harvard has added the event Admin meeting. Go check it out!', '2012-12-09 12:46:01', 'Admin meeting', 5, 0),
(48, 6, 'The Game approaches! Get ready!!!', '2012-12-09 12:46:49', 'Game approaching...', 1, 0),
(48, 0, 'John  Harvard has added the event Winter break <3. Go check it out!', '2012-12-09 12:48:31', 'Winter break <3', 1, 0),
(50, 7, 'Are any of you free for a food tasting trip into Harvard Square next week? We''d love to hear from you :D.', '2012-12-09 12:51:51', 'Outing next week?', 1, 0),
(50, 7, 'We''re announcing a new foreign exchange program that will be starting next summer! Join the club for more information and the chance to come along!', '2012-12-09 12:53:43', 'Foreign Exchange Program', 1, 0),
(50, 0, 'Ramya Rangan has added the event More Food!!. Go check it out!', '2012-12-09 12:54:59', 'More Food!!', 1, 0),
(51, 0, 'Ramya Rangan has added the event Snowmunching. Go check it out!', '2012-12-09 12:57:25', 'Snowmunching', 1, 0),
(51, 7, 'How much ice cream do you think you can eat? We''ll be hosting an eating contest soon, but we''re working out the details. We''ll let you know.', '2012-12-09 14:29:56', 'Ice Cream Contest!', 1, 0),
(51, 7, 'Hey everyone, we''ve acquired a new freezer to help us store more frozen treats. Yay!', '2012-12-09 14:33:27', 'Acquired New Freezer', 1, 0);

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
('46.1', 'https://www.google.com/calendar/feeds/h5gub3qghpn1mivttpji5309io%40group.calendar.google.com/private/full'),
('46.2', 'https://www.google.com/calendar/feeds/evlnlfvebhoujoe5s451bhljv4%40group.calendar.google.com/private/full'),
('46.3', 'https://www.google.com/calendar/feeds/45hpfmh9l1ihssfr1povadt46s%40group.calendar.google.com/private/full'),
('46.4', 'https://www.google.com/calendar/feeds/m44h4a0qfve1ta9h5sacfdhml0%40group.calendar.google.com/private/full'),
('46.5', 'https://www.google.com/calendar/feeds/192cb86hht0nvgmh1m01i9osgo%40group.calendar.google.com/private/full'),
('47.1', 'https://www.google.com/calendar/feeds/4319e0vk3opahla8rqu4hn910o%40group.calendar.google.com/private/full'),
('47.2', 'https://www.google.com/calendar/feeds/fuuchr8voj9bit829j6n45femk%40group.calendar.google.com/private/full'),
('48.1', 'https://www.google.com/calendar/feeds/b97avcg7strv7q43j4191clls8%40group.calendar.google.com/private/full'),
('48.2', 'https://www.google.com/calendar/feeds/dq4ua2tjtog4lpfofra4hif5b0%40group.calendar.google.com/private/full'),
('48.3', 'https://www.google.com/calendar/feeds/44v3clsh28kttnb6jm00tru8os%40group.calendar.google.com/private/full'),
('48.4', 'https://www.google.com/calendar/feeds/5hccevu5f4vom8pgq08a8cv7as%40group.calendar.google.com/private/full'),
('48.5', 'https://www.google.com/calendar/feeds/d3c1d5g8c64qdlsc6ihdo1r05c%40group.calendar.google.com/private/full'),
('49.1', 'https://www.google.com/calendar/feeds/isck26rq5br7t2400nulskasc4%40group.calendar.google.com/private/full'),
('49.2', 'https://www.google.com/calendar/feeds/b4o36qdheu12sql2jkjp8ckar4%40group.calendar.google.com/private/full'),
('49.3', 'https://www.google.com/calendar/feeds/vfegprb68ojaviekcapo4ri9t0%40group.calendar.google.com/private/full'),
('49.4', 'https://www.google.com/calendar/feeds/s5uqjqioq4gbpulo6bv4e5m414%40group.calendar.google.com/private/full'),
('49.5', 'https://www.google.com/calendar/feeds/ks18je3tptkg3aictpba6349do%40group.calendar.google.com/private/full'),
('50.1', 'https://www.google.com/calendar/feeds/tpk9rj5oanh891s42b78rvnkck%40group.calendar.google.com/private/full'),
('50.2', 'https://www.google.com/calendar/feeds/845ttn2db8k0avc1cqjfod3ne0%40group.calendar.google.com/private/full'),
('50.3', 'https://www.google.com/calendar/feeds/n07kj7u1nhk4na0llheneqdv8g%40group.calendar.google.com/private/full'),
('50.4', 'https://www.google.com/calendar/feeds/q3g9f10os4epmq7gqu70ov0t1o%40group.calendar.google.com/private/full'),
('50.5', 'https://www.google.com/calendar/feeds/8tiv3c9lka7jj8e03sh7p96fb8%40group.calendar.google.com/private/full'),
('51.1', 'https://www.google.com/calendar/feeds/7q6nshoq9gt5nf727qe65ae43c%40group.calendar.google.com/private/full'),
('51.2', 'https://www.google.com/calendar/feeds/jvhm9a2qa6uqhrore8tsgmk4ms%40group.calendar.google.com/private/full'),
('51.3', 'https://www.google.com/calendar/feeds/953ib5s06chlvcde68gq555a40%40group.calendar.google.com/private/full'),
('51.4', 'https://www.google.com/calendar/feeds/lfmqefg39nod42du28c8uujvdg%40group.calendar.google.com/private/full'),
('51.5', 'https://www.google.com/calendar/feeds/b4b4rqtb5p9eq1kst6p0o42cfc%40group.calendar.google.com/private/full'),
('52.1', 'https://www.google.com/calendar/feeds/us3n71eu12ovn6rk0a6kgtu2pc%40group.calendar.google.com/private/full'),
('52.2', 'https://www.google.com/calendar/feeds/adst7mkmkv08tl5n61j70vvqo0%40group.calendar.google.com/private/full'),
('53.1', 'https://www.google.com/calendar/feeds/kh1kmj6b6l0fvo7pvd8mpn6vvg%40group.calendar.google.com/private/full');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `project`.`clubs` (`id`, `name`, `abbreviation`, `email`, `privacy`, `information`) VALUES
(46, 'Chinese Student Association', 'CSA', 'ramyarangan@college.harvard.edu', 0, 'Creating a safe environment for Asian Americans across campus.'),
(48, 'Yale', 'Y', 'ramya.rangan117@gmail.com', 0, 'Oh how we wish we were Harvard.'),
(49, 'Kick Those Who Are Down Association', 'KTWADA', 'mdeng@college.harvard.edu', 1, 'We welcome all those who want to join us in kicking our friends who are down, because what''s better than a little tough love?'),
(50, 'French Appreciation International Liaisons', 'FAIL', 'lcheng@college.harvard.edu', 0, 'Connecting you to all things dramatic and French.'),
(51, 'Brain Freeze Friends', 'BFF', 'lightinthesky12@gmail.com', 1, 'We experiment with new methods to achieve maximum brain freeze potential. We''re so cool! Ha ha. Ha.');

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
(45, 2),
(46, 2),
(46, 3),
(47, 2),
(48, 2),
(49, 2),
(49, 3),
(49, 11),
(49, 13),
(50, 2),
(50, 3),
(50, 5),
(51, 2),
(51, 10),
(52, 4),
(52, 12),
(53, 4),
(53, 5),
(53, 12),
(54, 4),
(54, 5),
(54, 12);

-- --------------------------------------------------------

--
-- Table structure for table `clubTypes`
--

CREATE TABLE IF NOT EXISTS `project`.`clubTypes` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `clubTypes`
--

INSERT INTO `project`.`clubTypes` (`id`, `description`) VALUES
(2, 'Social'),
(3, 'Cultural'),
(4, 'Pre-Professional'),
(5, 'Arts'),
(10, 'Research'),
(11, 'Athletics'),
(12, 'Publications'),
(13, 'Community Service');

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
  KEY `id` (`id`,`privacy`,`name`,`startTime`,`endTime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `project`.`events` (`id`, `privacy`, `name`, `startTime`, `endTime`, `information`, `location`) VALUES
(50, 1, 'Brunch Ã  Paris', '2012-12-13 11:00:00', '2012-12-13 12:00:00', 'Join us for a magnificent meal :).', 'Annenberg'),
(49, 1, 'The (Re)Game.', '2012-12-12 12:00:00', '2012-12-12 04:00:00', 'We had so much fun kicking them in November. Let''s do it again!', 'Harvard Stadium'),
(49, 3, 'The (Re)Game.', '2012-12-12 12:15:00', '2012-12-09 04:15:00', 'We had so much fun back in November. Let''s do it again!', 'Harvard Stadium'),
(46, 4, 'Election Meeting', '2012-12-11 09:30:00', '2012-12-11 10:00:00', 'We''ll be meeting next week to discuss upcoming elections.', 'Harvard Yard'),
(46, 5, 'Admin meeting', '2012-12-13 02:00:00', '2012-12-13 03:00:00', 'Meeting to discuss upcoming board elections.', 'Harvard Yard'),
(48, 1, 'Winter break <3', '2012-12-21 12:00:00', '2013-01-28 12:00:00', 'Finally it''s break!', 'Home'),
(50, 1, 'More Food!!', '2012-12-14 11:00:00', '2012-12-14 12:00:00', 'We love our food, and what better time to get some than reading period. Join us!', 'Harvard Square'),
(51, 1, 'Snowmunching', '2012-12-17 08:00:00', '2012-12-17 08:00:00', 'Come snowmunch with us this December. We''re waiting for the snow to fall too...', 'Harvard Yard');

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
(7, '2012-12-09 06:44:15', 'Kick Those Who Are Down Association has added the event: The (Re)Game.!', 1, 'allClubs.php?club=Kick Those Who Are Down Association'),
(7, '2012-12-09 06:46:07', 'Kick Those Who Are Down Association has added the event: The (Re)Game.!', 1, 'allClubs.php?club=Kick Those Who Are Down Association'),
(7, '2012-12-09 06:50:46', 'French Appreciation International Liaisons has added the event: Brunch Ã  Paris!', 1, 'allClubs.php?club=French Appreciation International Liaisons'),
(6, '2012-12-09 07:30:40', 'Chinese Student Association has added the announcement: Meeting next week moved to Wednesday.!', 1, 'allClubs.php?club=Chinese Student Association'),
(7, '2012-12-09 07:30:40', 'Chinese Student Association has added the announcement: Meeting next week moved to Wednesday.!', 1, 'allClubs.php?club=Chinese Student Association'),
(8, '2012-12-09 07:30:40', 'Chinese Student Association has added the announcement: Meeting next week moved to Wednesday.!', 0, 'allClubs.php?club=Chinese Student Association'),
(9, '2012-12-09 07:30:40', 'Chinese Student Association has added the announcement: Meeting next week moved to Wednesday.!', 0, 'allClubs.php?club=Chinese Student Association'),
(10, '2012-12-09 07:30:40', 'Chinese Student Association has added the announcement: Meeting next week moved to Wednesday.!', 0, 'allClubs.php?club=Chinese Student Association'),
(11, '2012-12-09 07:30:40', 'Chinese Student Association has added the announcement: Meeting next week moved to Wednesday.!', 0, 'allClubs.php?club=Chinese Student Association'),
(12, '2012-12-09 07:30:40', 'Chinese Student Association has added the announcement: Meeting next week moved to Wednesday.!', 0, 'allClubs.php?club=Chinese Student Association'),
(13, '2012-12-09 07:30:40', 'Chinese Student Association has added the announcement: Meeting next week moved to Wednesday.!', 0, 'allClubs.php?club=Chinese Student Association'),
(6, '2012-12-09 07:31:47', 'Chinese Student Association has added the announcement: Mini-golf!', 1, 'allClubs.php?club=Chinese Student Association'),
(7, '2012-12-09 07:31:47', 'Chinese Student Association has added the announcement: Mini-golf!', 1, 'allClubs.php?club=Chinese Student Association'),
(8, '2012-12-09 07:31:48', 'Chinese Student Association has added the announcement: Mini-golf!', 0, 'allClubs.php?club=Chinese Student Association'),
(9, '2012-12-09 07:31:48', 'Chinese Student Association has added the announcement: Mini-golf!', 0, 'allClubs.php?club=Chinese Student Association'),
(10, '2012-12-09 07:31:48', 'Chinese Student Association has added the announcement: Mini-golf!', 0, 'allClubs.php?club=Chinese Student Association'),
(11, '2012-12-09 07:31:48', 'Chinese Student Association has added the announcement: Mini-golf!', 0, 'allClubs.php?club=Chinese Student Association'),
(12, '2012-12-09 07:31:48', 'Chinese Student Association has added the announcement: Mini-golf!', 0, 'allClubs.php?club=Chinese Student Association'),
(13, '2012-12-09 07:31:48', 'Chinese Student Association has added the announcement: Mini-golf!', 0, 'allClubs.php?club=Chinese Student Association'),
(6, '2012-12-09 07:32:48', 'Chinese Student Association has added the event: Admin meeting!', 1, 'allClubs.php?club=Chinese Student Association'),
(7, '2012-12-09 07:32:48', 'Chinese Student Association has added the event: Admin meeting!', 1, 'allClubs.php?club=Chinese Student Association'),
(6, '2012-12-09 07:35:16', 'Chinese Student Association has added the event: Club meeting!', 1, 'allClubs.php?club=Chinese Student Association'),
(7, '2012-12-09 07:35:16', 'Chinese Student Association has added the event: Club meeting!', 1, 'allClubs.php?club=Chinese Student Association'),
(6, '2012-12-09 07:42:12', 'Chinese Student Association has added the event: Election Meeting!', 1, 'allClubs.php?club=Chinese Student Association'),
(7, '2012-12-09 07:42:12', 'Chinese Student Association has added the event: Election Meeting!', 1, 'allClubs.php?club=Chinese Student Association'),
(8, '2012-12-09 07:42:12', 'Chinese Student Association has added the event: Election Meeting!', 0, 'allClubs.php?club=Chinese Student Association'),
(9, '2012-12-09 07:42:12', 'Chinese Student Association has added the event: Election Meeting!', 0, 'allClubs.php?club=Chinese Student Association'),
(13, '2012-12-09 07:42:12', 'Chinese Student Association has added the event: Election Meeting!', 0, 'allClubs.php?club=Chinese Student Association'),
(6, '2012-12-09 07:46:01', 'Chinese Student Association has added the event: Admin meeting!', 1, 'allClubs.php?club=Chinese Student Association'),
(7, '2012-12-09 07:46:01', 'Chinese Student Association has added the event: Admin meeting!', 1, 'allClubs.php?club=Chinese Student Association'),
(6, '2012-12-09 07:46:49', 'Yale has added the announcement: Game approaching...!', 1, 'allClubs.php?club=Yale'),
(7, '2012-12-09 07:46:49', 'Yale has added the announcement: Game approaching...!', 1, 'allClubs.php?club=Yale'),
(8, '2012-12-09 07:46:49', 'Yale has added the announcement: Game approaching...!', 0, 'allClubs.php?club=Yale'),
(9, '2012-12-09 07:46:49', 'Yale has added the announcement: Game approaching...!', 0, 'allClubs.php?club=Yale'),
(6, '2012-12-09 07:48:31', 'Yale has added the event: Winter break <3!', 1, 'allClubs.php?club=Yale'),
(7, '2012-12-09 07:48:31', 'Yale has added the event: Winter break <3!', 1, 'allClubs.php?club=Yale'),
(8, '2012-12-09 07:48:31', 'Yale has added the event: Winter break <3!', 0, 'allClubs.php?club=Yale'),
(9, '2012-12-09 07:48:31', 'Yale has added the event: Winter break <3!', 0, 'allClubs.php?club=Yale'),
(7, '2012-12-09 07:51:51', 'French Appreciation International Liaisons has added the announcement: Outing next week?!', 1, 'allClubs.php?club=French Appreciation International Liaisons'),
(7, '2012-12-09 07:53:43', 'French Appreciation International Liaisons has added the announcement: Foreign Exchange Program!', 1, 'allClubs.php?club=French Appreciation International Liaisons'),
(7, '2012-12-09 07:54:59', 'French Appreciation International Liaisons has added the event: More Food!!!', 1, 'allClubs.php?club=French Appreciation International Liaisons'),
(6, '2012-12-09 07:57:25', 'Brain Freeze Friends has added the event: Snowmunching!', 1, 'allClubs.php?club=Brain Freeze Friends'),
(7, '2012-12-09 07:57:25', 'Brain Freeze Friends has added the event: Snowmunching!', 1, 'allClubs.php?club=Brain Freeze Friends'),
(6, '2012-12-09 09:33:27', 'Brain Freeze Friends has added the announcement: Acquired New Freezer!', 1, 'allClubs.php?club=Brain Freeze Friends'),
(7, '2012-12-09 09:33:27', 'Brain Freeze Friends has added the announcement: Acquired New Freezer!', 1, 'allClubs.php?club=Brain Freeze Friends');

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
(6, 46, 5, 0),
(6, 48, 5, 0),
(6, 50, 2, 0),
(6, 51, 4, 0),
(7, 46, 5, 0),
(7, 48, 5, 0),
(7, 49, 5, 0),
(7, 50, 5, 0),
(7, 51, 5, 0),
(8, 46, 4, 0),
(8, 48, 4, 0),
(9, 46, 4, 0),
(9, 48, 4, 0),
(10, 46, 3, 0),
(11, 46, 3, 0),
(12, 46, 3, 0),
(13, 46, 4, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `project`.`users` (`id`, `name`, `password`, `email`, `admin`, `realname`, `number`) VALUES
(6, 'jharvard', '$1$Qd.eEOAw$wRePivEmj8nw8QER4EH/R1', 'ramyarangan@college.harvard.edu', 1, 'John  Harvard', ''),
(7, 'ramyarangan', '$1$HZEDCGwc$AwBFDVNO.4.ZTqcWSatW5.', 'sweeti.smarties@gmail.com', 1, 'Ramya Rangan', ''),
(8, 'lcheng', '$1$.GCGqpOJ$nOLmxiTUBcoJWCBJaUyXU/', 'lcheng@college.harvard.edu', 0, 'Lucy Cheng', ''),
(9, 'mdeng', '$1$Eq/sIHx3$Da3snOBdKfELCTkRmpW3G0', 'mdeng@college.harvard.edu', 1, 'Michelle Deng', ''),
(10, 'fakeOne', '$1$sSBo3876$y631fgBPKgDMjfI5InEn6/', 'fbrummy117@gmail.com', 0, 'Fake One', ''),
(11, 'newUser', '$1$NfIcaqmo$zU3tbAJzm6sRiBev/4K341', 'flutefreak777@gmail.com', 0, 'New User', ''),
(12, 'nextPerson', '$1$JdxIVphC$mK2qaCwrAuzKWncC0EHSK/', 'jaisri66@yahoo.com', 0, 'Next Person', ''),
(13, 'anotherMember', '$1$vwbszF0I$AKjfHwPU7ZWkrKJY983lJ.', 'runningOutOfIdeas@gmail.com', 0, 'Another Member', ''),
(14, 'dummy', '$1$RwypWOni$HXRQ9urS9gLlwiyz2Jy2N/', 'failingEmailAddress@gmail.com', 0, 'Dummy Person', ''),
(15, 'nextUser', '$1$GSLnObIO$y6/IYP12yQm1OVKAmKN6R/', 'thisEmailDoesntWork@gmail.com', 0, 'Next User', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
