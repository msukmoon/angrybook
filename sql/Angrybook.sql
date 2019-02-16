-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2018 at 12:13 AM
-- Server version: 5.7.22
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse305`
--
CREATE DATABASE IF NOT EXISTS `cse305` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cse305`;


GRANT ALL PRIVILEGES ON cse305.* to cse305@localhost IDENTIFIED BY '305final';

-- --------------------------------------------------------

--
-- Table structure for table `cityState`
--

CREATE TABLE `cityState` (
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cityState`
--

INSERT INTO `cityState` (`city`, `state`) VALUES
('Denver', 'Colorado'),
('Goyang', ' Gyeonggi'),
('Incheon', 'Incheon'),
('Pyeongchang', 'Gangwon'),
('Quebec city', 'Quebec'),
('Seongnam', 'Gyeonggi'),
('Seoul', 'Seoul'),
('Vancouver', 'BC');

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `uid` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `content` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`uid`, `pid`, `cid`, `content`) VALUES
('msmoon', 1, 1, 'Me too!'),
('oscar1017', 2, 2, 'So am I!!!!!!!!'),
('jiwon', 1, 3, '?!?!'),
('jiwon', 2, 4, '?!?!?!?!?!?!?!?!?!'),
('test4', 5, 5, 'Who cares?'),
('test4', 4, 6, 'None of my business.'),
('test3', 3, 7, 'It is due today....'),
('test3', 4, 8, 'sooo hot!'),
('test4', 2, 9, 'Bad jiwon!'),
('test4', 3, 10, 'Just give up, jiwon!'),
('test4', 7, 11, 'What is your problem cheolsu?'),
('test4', 5, 12, 'LOL!'),
('oscar1017', 3, 13, 'lolololololol'),
('test5', 8, 14, 'I hate you.'),
('test5', 7, 15, 'Dayum!'),
('test5', 3, 16, 'I am so angry because of you!!!'),
('jiwon', 10, 17, 'so do i ^^~'),
('jiwon', 9, 18, 'Hello Java! '),
('jiwon', 11, 19, 'You are not gonna pass AMS 310, 301 and so on...!!!!!'),
('test5', 11, 20, 'I know. I am so stupid...'),
('test3', 6, 21, 'Yas'),
('test7', 10, 22, 'Who are you?'),
('msmoon', 11, 23, 'Congrats!'),
('msmoon', 13, 24, 'Just kidding!'),
('oscar1017', 3, 25, 'you gonna fail rest of class');

-- --------------------------------------------------------

--
-- Table structure for table `countryCountryCode`
--

CREATE TABLE `countryCountryCode` (
  `country` varchar(20) NOT NULL,
  `countryCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countryCountryCode`
--

INSERT INTO `countryCountryCode` (`country`, `countryCode`) VALUES
('Canada', '1'),
('Korea', '82'),
('USA', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dislike`
--

CREATE TABLE `dislike` (
  `uid` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dislike`
--

INSERT INTO `dislike` (`uid`, `pid`) VALUES
('jiwon', 1),
('jiwon', 3),
('msmoon', 13),
('oscar1017', 1),
('oscar1017', 2),
('oscar1017', 4),
('test3', 3),
('test3', 6),
('test4', 2),
('test4', 3),
('test4', 4),
('test4', 7),
('test4', 8),
('test5', 1),
('test5', 2),
('test5', 6),
('test5', 7),
('test5', 8),
('test5', 9),
('test5', 11),
('test6', 8),
('test7', 10);

-- --------------------------------------------------------

--
-- Table structure for table `disnumRank`
--

CREATE TABLE `disnumRank` (
  `disnum` int(11) NOT NULL,
  `rank` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disnumRank`
--

INSERT INTO `disnumRank` (`disnum`, `rank`) VALUES
(0, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `FriendWith`
--

CREATE TABLE `FriendWith` (
  `uid1` varchar(20) NOT NULL,
  `uid2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FriendWith`
--

INSERT INTO `FriendWith` (`uid1`, `uid2`) VALUES
('jiwon', 'msmoon'),
('jiwon', 'oscar1017'),
('jiwon', 'test1'),
('jiwon', 'test2'),
('jiwon', 'test3'),
('jiwon', 'test4'),
('jiwon', 'test5'),
('jiwon', 'test7'),
('msmoon', 'jiwon'),
('msmoon', 'oscar1017'),
('msmoon', 'test1'),
('msmoon', 'test3'),
('msmoon', 'test4'),
('msmoon', 'test5'),
('msmoon', 'test7'),
('oscar1017', 'jiwon'),
('oscar1017', 'msmoon'),
('oscar1017', 'test5'),
('oscar1017', 'test7'),
('test1', 'jiwon'),
('test1', 'msmoon'),
('test1', 'test2'),
('test1', 'test4'),
('test2', 'jiwon'),
('test2', 'test1'),
('test2', 'test4'),
('test2', 'test5'),
('test2', 'test6'),
('test2', 'test7'),
('test3', 'jiwon'),
('test3', 'msmoon'),
('test3', 'test5'),
('test3', 'test7'),
('test4', 'jiwon'),
('test4', 'msmoon'),
('test4', 'test1'),
('test4', 'test2'),
('test4', 'test5'),
('test4', 'test6'),
('test4', 'test7'),
('test5', 'jiwon'),
('test5', 'msmoon'),
('test5', 'oscar1017'),
('test5', 'test2'),
('test5', 'test3'),
('test5', 'test4'),
('test5', 'test6'),
('test5', 'test7'),
('test6', 'test2'),
('test6', 'test4'),
('test6', 'test5'),
('test7', 'jiwon'),
('test7', 'msmoon'),
('test7', 'oscar1017'),
('test7', 'test2'),
('test7', 'test3'),
('test7', 'test4'),
('test7', 'test5');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `uid` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `targetID` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `nid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`uid`, `type`, `targetID`, `pid`, `nid`) VALUES
('oscar1017', 1, 'msmoon', 1, 1),
('msmoon', 1, 'oscar1017', 2, 2),
('msmoon', 2, 'oscar1017', 2, 3),
('oscar1017', 2, 'jiwon', 1, 4),
('oscar1017', 1, 'jiwon', 1, 5),
('msmoon', 1, 'jiwon', 2, 6),
('msmoon', 1, 'test4', 4, 9),
('msmoon', 2, 'test4', 4, 10),
('jiwon', 2, 'test4', 3, 12),
('jiwon', 1, 'test3', 3, 13),
('msmoon', 1, 'test3', 4, 14),
('msmoon', 1, 'test4', 2, 15),
('jiwon', 2, 'test3', 3, 16),
('jiwon', 1, 'test4', 3, 17),
('msmoon', 2, 'test4', 2, 18),
('test2', 1, 'test4', 7, 19),
('msmoon', 2, 'oscar1017', 4, 20),
('test2', 2, 'test4', 7, 21),
('jiwon', 1, 'oscar1017', 3, 23),
('test4', 1, 'test5', 8, 24),
('test4', 2, 'test5', 8, 25),
('test2', 2, 'test5', 7, 26),
('test2', 1, 'test5', 7, 27),
('test3', 2, 'test5', 6, 28),
('oscar1017', 2, 'test5', 1, 29),
('jiwon', 1, 'test5', 3, 30),
('test4', 2, 'test6', 8, 31),
('msmoon', 2, 'test5', 2, 32),
('test7', 1, 'jiwon', 10, 33),
('test5', 1, 'jiwon', 9, 34),
('test5', 1, 'jiwon', 11, 35);

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE `Posts` (
  `pid` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `disnum` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`pid`, `content`, `disnum`) VALUES
(1, 'I am angry at Jiwon', 3),
(2, 'I am so mad about Jiwon!', 3),
(3, 'I am so angry because of the assignments!!!', 3),
(4, 'Why is the air conditioning not working today?', 2),
(5, 'I am Gildong Hong!', 0),
(6, 'Today is too hot!!!!!!!', 2),
(7, 'I may or may not be angry', 2),
(8, 'I hate everyone.', 3),
(9, 'Hello world!', 1),
(10, 'I hate Computer Science!!! I should quit.....', 1),
(11, 'I hate math so much!', 1),
(12, 'I cant say HELLO bcz I AM ANGRY!!!!!', 0),
(13, 'I am not enjoying this database class.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stateCountryArea`
--

CREATE TABLE `stateCountryArea` (
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `areaCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stateCountryArea`
--

INSERT INTO `stateCountryArea` (`state`, `country`, `areaCode`) VALUES
(' Gyeonggi', 'Korea', '031'),
('BC', 'Canada', '778'),
('Colorado', 'USA', '303'),
('Gangwon', 'Korea', '033'),
('Gyeonggi', 'Korea', '031'),
('Incheon', 'Korea', '032'),
('Quebec', 'Canada', '514'),
('Seoul', 'Korea', '02');

-- --------------------------------------------------------

--
-- Table structure for table `Upload`
--

CREATE TABLE `Upload` (
  `pid` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Upload`
--

INSERT INTO `Upload` (`pid`, `uid`) VALUES
(1, 'oscar1017'),
(2, 'msmoon'),
(3, 'jiwon'),
(4, 'msmoon'),
(5, 'test1'),
(6, 'test3'),
(7, 'test2'),
(8, 'test4'),
(9, 'test5'),
(10, 'test7'),
(11, 'test5'),
(12, 'test6'),
(13, 'msmoon');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `city` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `password`, `firstName`, `lastName`, `city`) VALUES
('jiwon', 'a5af3c3f6914c2d7aeb0fb702b940a06', 'Ji Won', 'Choi', 'Seoul'),
('msmoon', '81dc9bdb52d04dc20036dbd8313ed055', 'Myungsuk', 'Moon', 'Incheon'),
('oscar1017', '05b05ffa76c08b3f795c7eb49d705daa', 'Haneul', 'Lee', 'Goyang'),
('test1', '5a105e8b9d40e1329780d62ea2265d8a', 'Gildong', 'Hong', 'Pyeongchang'),
('test2', 'ad0234829205b9033196ba818f7a872b', 'CheolSu', 'Ahn', 'Seoul'),
('test3', '8ad8757baa8564dc136c1e07507f4a98', 'Ellen', 'Won', 'Denver'),
('test4', '86985e105f79b95d6bc918fb45ec7727', 'John', 'Doe', 'Vancouver'),
('test5', 'e3d704f3542b44a621ebed70dc0efe13', 'Jinwoo', 'Choi', 'Seongnam'),
('test6', '4cfad7076129962ee70c36839a1e3e15', 'Jungang', 'Park', 'Goyang'),
('test7', 'b04083e53e242626595e2b8ea327e525', 'Cs', 'Commons', 'Quebec city');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cityState`
--
ALTER TABLE `cityState`
  ADD PRIMARY KEY (`city`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `countryCountryCode`
--
ALTER TABLE `countryCountryCode`
  ADD PRIMARY KEY (`country`);

--
-- Indexes for table `dislike`
--
ALTER TABLE `dislike`
  ADD PRIMARY KEY (`uid`,`pid`),
  ADD UNIQUE KEY `uid` (`uid`,`pid`);

--
-- Indexes for table `FriendWith`
--
ALTER TABLE `FriendWith`
  ADD PRIMARY KEY (`uid1`,`uid2`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `stateCountryArea`
--
ALTER TABLE `stateCountryArea`
  ADD PRIMARY KEY (`state`);

--
-- Indexes for table `Upload`
--
ALTER TABLE `Upload`
  ADD PRIMARY KEY (`pid`) USING BTREE;

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
