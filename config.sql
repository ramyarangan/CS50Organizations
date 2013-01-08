-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: mysql.hcs.harvard.edu
-- Generation Time: Jan 08, 2013 at 12:37 AM
-- Server version: 5.0.96
-- PHP Version: 5.2.4-2ubuntu5.25

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs50-groups`
--
CREATE DATABASE IF NOT EXISTS `cs50-groups` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cs50-groups`;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(10) unsigned NOT NULL,
  `userID` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `privacy` int(4) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  KEY `id` (`id`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `userID`, `text`, `time`, `title`, `privacy`, `seen`) VALUES
(55, 0, 'John  Harvard has added the event Sem 2 Icebreakers. Go check it out!', '2013-01-08 01:56:07', 'Sem 2 
Icebreakers', 3, 0),
(55, 6, 'Be sure to send your applications to us if you want to be a part of The Daily Herald in the coming semester!', 
'2013-01-08 02:29:08', 'Recruiting New Members!', 1, 0),
(55, 0, 'John  Harvard has added the event General Intro Meeting. Go check it out!', '2013-01-08 02:34:18', 'General 
Intro Meeting', 1, 0),
(56, 0, 'John  Harvard has added the event Winter trek 2. Go check it out!', '2013-01-08 02:41:29', 'Winter trek 2', 1, 
0),
(56, 6, 'Does anyone feel comfortable leading our next mountain trek in February? If so, shoot us an email!', 
'2013-01-08 02:42:35', 'Any new trek leads?', 3, 0),
(56, 6, 'Anyone else want to join us this month for our climbing trip? We have 4 more open slots. Shoot us an email if 
you''re interested and we''ll email you some details.', '2013-01-08 02:48:51', 'Any more hikers?', 1, 0),
(57, 0, 'John  Harvard has added the event Winter Formal. Go check it out!', '2013-01-08 02:51:50', 'Winter Formal', 1, 
0),
(57, 0, 'John  Harvard has added the event Pastry Study Break. Go check it out!', '2013-01-08 02:53:52', 'Pastry Study 
Break', 1, 0),
(58, 0, 'Ramya Rangan has added the event Peer Review Meeting. Go check it out!', '2013-01-08 03:13:17', 'Peer Review 
Meeting', 3, 0),
(58, 16, 'If you''ve conducted scientific research over the past year, send us a paper describing your latest findings! 
This is your chance to be published in the campus'' only peer-reviewed research journal.', '2013-01-08 03:15:12', 
'Accepting New Papers', 1, 0),
(59, 0, 'Ramya Rangan has added the event Winter Song. Go check it out!', '2013-01-08 04:45:55', 'Winter Song', 1, 0),
(59, 16, 'We will be holding auditions in the week of your return to campus. Auditions will be held at the Conservatory 
Theater backstage area at 5pm on Wednesday. Come prepared with scales and a song of your choice (any genre''s fine with 
us).', '2013-01-08 04:48:22', 'Second Semester Auditions', 1, 0),
(59, 0, 'Ramya Rangan has added the event Second Semester Auditions. Go check it out!', '2013-01-08 04:50:31', 'Second 
Semester Auditions', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `calendarLinks`
--

CREATE TABLE IF NOT EXISTS `calendarLinks` (
  `id` varchar(6) NOT NULL,
  `link` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendarLinks`
--

INSERT INTO `calendarLinks` (`id`, `link`) VALUES
('55.1', 'https://www.google.com/calendar/feeds/3ui8d85ocqr5g91gd1qja69fjo%40group.calendar.google.com/private/full'),
('55.2', 'https://www.google.com/calendar/feeds/ipl038rk278p4eski463di79ko%40group.calendar.google.com/private/full'),
('55.3', 'https://www.google.com/calendar/feeds/jpfa1g9d0hvc1bm6lrfhtau220%40group.calendar.google.com/private/full'),
('55.4', 'https://www.google.com/calendar/feeds/me7335pdvheq6msvtc1fg8koe8%40group.calendar.google.com/private/full'),
('55.5', 'https://www.google.com/calendar/feeds/nvq3e7skk5cgv3668p00vchbf4%40group.calendar.google.com/private/full'),
('56.1', 'https://www.google.com/calendar/feeds/0v3c71s78ikv51amped92oeaio%40group.calendar.google.com/private/full'),
('56.2', 'https://www.google.com/calendar/feeds/arf63homf50odpjjkj1tap4ogc%40group.calendar.google.com/private/full'),
('56.3', 'https://www.google.com/calendar/feeds/osie4o4n3935ps1mtq0uot24e0%40group.calendar.google.com/private/full'),
('56.4', 'https://www.google.com/calendar/feeds/re2juasvjofdvtj9fj4a7ec214%40group.calendar.google.com/private/full'),
('56.5', 'https://www.google.com/calendar/feeds/vmut3h4v1pveqvqjan2c9k5a30%40group.calendar.google.com/private/full'),
('57.1', 'https://www.google.com/calendar/feeds/6s68n3lin65ji6s9g07uega86o%40group.calendar.google.com/private/full'),
('57.2', 'https://www.google.com/calendar/feeds/v7gcqmsv0mpu1paf45r67qahjc%40group.calendar.google.com/private/full'),
('57.3', 'https://www.google.com/calendar/feeds/iqipn66n75r2bjngue27clsvt4%40group.calendar.google.com/private/full'),
('57.4', 'https://www.google.com/calendar/feeds/frsu9slijiea3phev30rm8493k%40group.calendar.google.com/private/full'),
('57.5', 'https://www.google.com/calendar/feeds/go2k667c2nam3oi0rpruh2o13s%40group.calendar.google.com/private/full'),
('58.1', 'https://www.google.com/calendar/feeds/tjh30scq8bjej4ost3lhs21nak%40group.calendar.google.com/private/full'),
('58.2', 'https://www.google.com/calendar/feeds/lfjmis3tcvptos8kdejlb60g3c%40group.calendar.google.com/private/full'),
('58.3', 'https://www.google.com/calendar/feeds/8euair96jc65ujss5e41pbiuqg%40group.calendar.google.com/private/full'),
('58.4', 'https://www.google.com/calendar/feeds/t5u58m9n2pultmlri6qome98cc%40group.calendar.google.com/private/full'),
('58.5', 'https://www.google.com/calendar/feeds/krufi9mmp64sllcdl3hcq90mkk%40group.calendar.google.com/private/full'),
('59.1', 'https://www.google.com/calendar/feeds/s0mq418i5mu7kia6kjqrrfprtg%40group.calendar.google.com/private/full'),
('59.2', 'https://www.google.com/calendar/feeds/efnechv20j3g99dj7envg4poak%40group.calendar.google.com/private/full'),
('59.3', 'https://www.google.com/calendar/feeds/hli4sbdak4b94grod8ljplpig4%40group.calendar.google.com/private/full'),
('59.4', 'https://www.google.com/calendar/feeds/6rr7f84iikkqjgn9807uflj40k%40group.calendar.google.com/private/full'),
('59.5', 'https://www.google.com/calendar/feeds/nvq3e7skk5cgv3668p00vchbf4@group.calendar.google.com/private/full'),
('60.1', 'https://www.google.com/calendar/feeds/b82cinv55s68ca1q36e7bppphs%40group.calendar.google.com/private/full'),
('60.2', 'https://www.google.com/calendar/feeds/p9jt5i3fd04fi7mol1146nl82o%40group.calendar.google.com/private/full'),
('60.3', 'https://www.google.com/calendar/feeds/glt7uap52ddsjlnikj4b271df8%40group.calendar.google.com/private/full'),
('60.4', 'https://www.google.com/calendar/feeds/58dlpm42507chpu9p5vlflvm0g%40group.calendar.google.com/private/full'),
('60.5', 'https://www.google.com/calendar/feeds/7sts4cq63k187skgcuo1hda22s%40group.calendar.google.com/private/full'),
('61.1', 'https://www.google.com/calendar/feeds/lpd5ls9ebqmafp64veov0lto40%40group.calendar.google.com/private/full'),
('61.2', 'https://www.google.com/calendar/feeds/vgc6o7mpduiaj21mmbc0a24fo4%40group.calendar.google.com/private/full'),
('61.3', 'https://www.google.com/calendar/feeds/lu97u9alrvcsialnn57nh1tk9g%40group.calendar.google.com/private/full'),
('61.4', 'https://www.google.com/calendar/feeds/qn4njpv7tbp3m89q3p5aid6vs0%40group.calendar.google.com/private/full'),
('61.5', 'https://www.google.com/calendar/feeds/htjlvrbke6j4l7daojqkdbnvpc%40group.calendar.google.com/private/full'),
('62.1', 'https://www.google.com/calendar/feeds/eea0eatmml1e6169rq618tsu3c%40group.calendar.google.com/private/full'),
('62.2', 'https://www.google.com/calendar/feeds/014ivmrdeiteu0f0b18g9qom7c%40group.calendar.google.com/private/full'),
('62.3', 'https://www.google.com/calendar/feeds/p2sbnmq7quvl5k1nqcda94eddk%40group.calendar.google.com/private/full'),
('62.4', 'https://www.google.com/calendar/feeds/fcdlbfkes1hqevfabncjj8deog%40group.calendar.google.com/private/full'),
('62.5', 'https://www.google.com/calendar/feeds/223fjt0645f2vg91vlflcv1ufg%40group.calendar.google.com/private/full');

-- --------------------------------------------------------

--
-- Table structure for table `clubTypePairs`
--

CREATE TABLE IF NOT EXISTS `clubTypePairs` (
  `clubID` int(10) unsigned NOT NULL,
  `clubTypeID` int(6) unsigned NOT NULL,
  PRIMARY KEY  (`clubID`,`clubTypeID`),
  KEY `clubID` (`clubID`,`clubTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubTypePairs`
--

INSERT INTO `clubTypePairs` (`clubID`, `clubTypeID`) VALUES
(55, 4),
(55, 12),
(56, 2),
(56, 11),
(57, 2),
(57, 3),
(58, 4),
(58, 10),
(58, 12),
(59, 2),
(59, 5),
(60, 11),
(61, 5),
(62, 2),
(62, 4),
(62, 13);

-- --------------------------------------------------------

--
-- Table structure for table `clubTypes`
--

CREATE TABLE IF NOT EXISTS `clubTypes` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `clubTypes`
--

INSERT INTO `clubTypes` (`id`, `description`) VALUES
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
-- Table structure for table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `abbreviation` varchar(63) NOT NULL,
  `email` varchar(255) NOT NULL,
  `privacy` tinyint(1) NOT NULL,
  `information` longtext NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`,`abbreviation`,`email`),
  KEY `name_2` (`name`,`abbreviation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `abbreviation`, `email`, `privacy`, `information`) VALUES
(55, 'The Daily Herald', 'THE DAILY HERALD', 'ramyarangan@college.harvard.edu', 0, 'The leading publication on campus, 
reporting every day on essential stories relevant to student and faculty alike. Join us if you''re interested in 
designing, writing for, or managing this daily newspaper!'),
(56, 'Mountaineering Society', 'MOUNTAINEERING SOCIETY', 'ramya.rangan117@gmail.com', 1, 'Join if you like climbing! 
We''ve got everyone from trained experts to novices, so feel free to join, whatever level you''re at. We go on at least 
one trip a month!'),
(57, 'Chinese Cultural Association', 'CCA', 'ramyarangan@college.harvard.edu', 1, 'We host regular cultural and social 
events through the year. All students interested in Chinese culture welcome!'),
(58, 'Harvard Undergraduate Research Journal', 'HURJ', 'ramyarangan@college.harvard.edu', 0, 'HURJ is the campus'' only 
student-run research publication. We publish student work after a rigorous peer review process. Join to help with this 
process, to design our journal, or to organize club events.'),
(59, 'Upbeat', 'UPBEAT', 'ramyarangan@college.harvard.edu', 0, 'The premier female acapella group on campus. We compete 
at the National Acapella Throwdown this summer, so join to make Harvard proud! Audition information will be posted on 
this site.'),
(60, 'Varsity Baseball', 'VARSITY BASEBALL', 'lcheng@college.harvard.edu', 0, 'Sign up if you''re a varsity baseball 
member to get updates on upcoming team practices and games.'),
(61, 'Harvard Undergraduate Orchestra', 'HARVARD UNDERGRADUATE ORCHESTRA', 'lcheng@college.harvard.edu', 0, 'Harvard''s 
elite undergraduate orchestra.'),
(62, 'Harvard Pre-Medical Society', 'HPMS', 'lcheng@college.harvard.edu', 1, 'An organization created to help pre-med 
students find peer mentors, volunteer at hospitals in groups, and socialize with fellow pre-meds. ');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
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

INSERT INTO `events` (`id`, `privacy`, `name`, `startTime`, `endTime`, `information`, `location`) VALUES
(55, 3, 'Sem 2 Icebreakers', '2013-01-21 03:00:00', '2013-01-22 04:00:00', 'If you''re new to the journalism squad, be 
sure to join us for some Noch''s, ice-breakers, and a friendly intro to the program!', 'Herald Headquarters'),
(55, 1, 'General Intro Meeting', '2013-01-18 11:00:00', '2013-01-18 12:30:00', 'Join us as we discuss what it means to 
be a part of our design, reporting, or business boards.', 'Journalism Room'),
(56, 1, 'Winter trek 2', '2013-01-25 05:00:00', '2013-01-27 08:00:00', 'We''ll be climbing as soon as we get back on 
campus. Contact us if you want more details on how to join.', 'Nearby Mountain'),
(57, 1, 'Winter Formal', '2013-01-25 07:00:00', '2013-01-25 11:00:00', 'Get ready for a night of delicious food, 
excellent music, and general high class. Dinner and snacks will be served! All are welcome!', 'Dance Hall'),
(57, 1, 'Pastry Study Break', '2013-01-23 08:00:00', '2013-01-23 09:00:00', 'We will be serving some of our favorite 
traditional Chinese pastries. Feel free to bring your work to study with your friends here!', 'Study Lounge'),
(58, 3, 'Peer Review Meeting', '2013-01-23 10:00:00', '2013-01-23 11:00:00', 'Meeting for all members interested in 
joining the peer review board this semester.', 'Research Hall'),
(59, 1, 'Winter Song', '2013-01-18 07:00:00', '2013-01-18 09:00:00', 'Upbeat will be performing this season''s concert, 
complete with songs from jazz to Broadway to pop. Get your tickets before they run out at the box office!', 
'Conservatory Theater'),
(59, 1, 'Second Semester Auditions', '2013-01-16 05:00:00', '2013-01-16 08:00:00', 'Come prepared with a song of your 
choice from any genre and some scales. Hope you can make it!', 'Conservatory Theater Backstage');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `userID` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `text` tinytext NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `redirect` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`userID`, `time`, `text`, `seen`, `redirect`) VALUES
(6, '2013-01-07 20:56:07', 'The Daily Herald has added the event: Sem 2 Icebreakers!', 1, 'allClubs.php?club=The Daily 
Herald'),
(6, '2013-01-07 21:29:08', 'The Daily Herald has added the announcement: Recruiting New Members!!', 1, 
'allClubs.php?club=The Daily Herald'),
(6, '2013-01-07 21:34:18', 'The Daily Herald has added the event: General Intro Meeting!', 1, 'allClubs.php?club=The 
Daily Herald'),
(6, '2013-01-07 21:41:29', 'Mountaineering Society has added the event: Winter trek 2!', 1, 
'allClubs.php?club=Mountaineering Society'),
(6, '2013-01-07 21:42:35', 'Mountaineering Society has added the announcement: Any new trek leads?!', 1, 
'allClubs.php?club=Mountaineering Society'),
(6, '2013-01-07 21:48:51', 'Mountaineering Society has added the announcement: Any more hikers?!', 1, 
'allClubs.php?club=Mountaineering Society'),
(6, '2013-01-07 21:51:50', 'Chinese Cultural Association has added the event: Winter Formal!', 1, 
'allClubs.php?club=Chinese Cultural Association'),
(6, '2013-01-07 21:53:52', 'Chinese Cultural Association has added the event: Pastry Study Break!', 1, 
'allClubs.php?club=Chinese Cultural Association'),
(16, '2013-01-07 22:13:17', 'Harvard Undergraduate Research Journal has added the event: Peer Review Meeting!', 1, 
'allClubs.php?club=Harvard Undergraduate Research Journal'),
(16, '2013-01-07 22:15:12', 'Harvard Undergraduate Research Journal has added the announcement: Accepting New Papers!', 
1, 'allClubs.php?club=Harvard Undergraduate Research Journal'),
(16, '2013-01-07 23:45:55', 'Upbeat has added the event: Winter Song!', 1, 'allClubs.php?club=Upbeat'),
(16, '2013-01-07 23:48:22', 'Upbeat has added the announcement: Second Semester Auditions!', 1, 
'allClubs.php?club=Upbeat'),
(16, '2013-01-07 23:50:31', 'Upbeat has added the event: Second Semester Auditions!', 1, 'allClubs.php?club=Upbeat');

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE IF NOT EXISTS `privacy` (
  `level` int(4) unsigned NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`level`, `description`) VALUES
(1, 'public'),
(2, 'pending'),
(3, 'comp'),
(4, 'non-comp'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `userID` int(10) unsigned NOT NULL,
  `clubID` int(10) unsigned NOT NULL,
  `level` int(4) unsigned NOT NULL,
  `subscription` int(11) NOT NULL,
  PRIMARY KEY  (`userID`,`clubID`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`userID`, `clubID`, `level`, `subscription`) VALUES
(6, 55, 5, 0),
(6, 56, 5, 0),
(6, 57, 5, 0),
(6, 62, 4, 0),
(16, 55, 2, 0),
(16, 56, 4, 0),
(16, 58, 5, 0),
(16, 59, 5, 0),
(17, 55, 2, 0),
(17, 56, 4, 0),
(17, 57, 4, 0),
(17, 58, 3, 0),
(17, 59, 4, 0),
(17, 60, 3, 0),
(17, 61, 4, 0),
(17, 62, 4, 0),
(18, 58, 3, 0),
(18, 60, 5, 0),
(18, 61, 5, 0),
(18, 62, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tagPairs`
--

CREATE TABLE IF NOT EXISTS `tagPairs` (
  `id` int(10) unsigned NOT NULL,
  `tag` int(10) unsigned NOT NULL,
  `isEvent` tinyint(1) NOT NULL,
  UNIQUE KEY `id_2` (`id`,`tag`),
  KEY `id` (`id`,`tag`,`isEvent`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `count` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `count` (`count`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `admin`, `realname`, `number`) VALUES
(6, 'jharvard', '$1$Qd.eEOAw$wRePivEmj8nw8QER4EH/R1', 'ramyarangan@college.harvard.edu', 1, 'John  Harvard', ''),
(16, 'ramyar', '$1$2A78uegw$PYa07mnTvq2MzZOGWZGLv.', 'ramya.rangan117@gmail.com', 1, 'Ramya Rangan', ''),
(17, 'mdeng', '$1$1ICL2mD9$s5AHDalpzG85PCSr7VOnQ.', 'mdeng@college.harvard.edu', 0, 'Michelle Deng', ''),
(18, 'lcheng', '$1$0KWBGQDb$W5g3Lhf0J3IOWCtQB5e7T/', 'lcheng@college.harvard.edu', 1, 'Lucy Cheng', '');

