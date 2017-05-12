-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 07:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audiocity`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'MC Luft'),
(2, 'Eminem'),
(3, 'Clean Bandit'),
(4, 'Shakira');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Pop'),
(2, 'Hip-Hop'),
(3, 'Rock'),
(4, 'Dance'),
(5, 'Klassisch'),
(6, 'Country'),
(7, 'Folk'),
(8, 'RnB'),
(9, 'Jazz'),
(10, 'Elektro'),
(11, 'Meta'),
(12, 'Heavy Metal'),
(13, 'House'),
(14, 'Rap');

-- --------------------------------------------------------

--
-- Table structure for table `genremusic`
--

CREATE TABLE `genremusic` (
  `Genre_id` int(11) NOT NULL,
  `Music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genremusic`
--

INSERT INTO `genremusic` (`Genre_id`, `Music_id`) VALUES
(1, 1),
(1, 4),
(2, 1),
(13, 2),
(14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `forename` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `name`, `forename`) VALUES
(1, 'test', 'test', 'test@test.com', 'Test', 'Test'),
(2, 'testusedr', '1da234', 'asfd@asf.co', 'asfasf', 'kasdf'),
(3, 'toshiki', 'test', 'hdhah@hdhd.com', 'Hennig', 'Toshiki');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `Artist_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `released` date DEFAULT NULL,
  `piclink` varchar(255) DEFAULT NULL,
  `filelink` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `Artist_id`, `name`, `album`, `length`, `released`, `piclink`, `filelink`) VALUES
(1, 1, 'Richtig gut', 'Krasses Album', 245, '2017-03-09', 'music/Krasses Album/cover.jpg', 'music/Krasses Album/Test.mp3'),
(2, 3, 'Rockabye ', NULL, 251, '2016-10-21', 'music/rockabye/cover.jpg', 'music/rockabye/rockabye.mp3'),
(3, 2, 'Rap God', 'The Marshall Mathers LP 2', 363, '2013-10-15', 'music/The Marshall Mathers LP 2/cover.jpg', 'music/The Marshall Mathers LP 2/rapgod.mp3'),
(4, 4, 'Chantaje', NULL, 196, '2016-10-28', 'music/Chantaje/cover.jpg', 'music/Chantaje/chantaje.mp3');

-- --------------------------------------------------------

--
-- Stand-in structure for view `musicfull`
-- (See below for the actual view)
--
CREATE TABLE `musicfull` (
`id` int(11)
,`name` varchar(255)
,`album` varchar(255)
,`length` int(11)
,`date` date
,`piclink` varchar(255)
,`filelink` varchar(255)
,`genre_id` int(11)
,`genre` varchar(45)
,`artistname` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `userbiblio`
--

CREATE TABLE `userbiblio` (
  `Music_id` int(11) NOT NULL,
  `Login_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `insertdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userbiblio`
--

INSERT INTO `userbiblio` (`Music_id`, `Login_id`, `id`, `insertdate`) VALUES
(1, 1, 7, '2017-05-07'),
(1, 3, 21, '2017-05-09'),
(1, 3, 22, '2017-05-09'),
(1, 3, 23, '2017-05-09'),
(1, 3, 24, '2017-05-09'),
(1, 3, 26, '2017-05-09'),
(4, 1, 17, '2017-05-07'),
(4, 3, 29, '2017-05-09');

-- --------------------------------------------------------

--
-- Stand-in structure for view `userlib`
-- (See below for the actual view)
--
CREATE TABLE `userlib` (
`id` int(11)
,`name` varchar(255)
,`album` varchar(255)
,`length` int(11)
,`date` date
,`piclink` varchar(255)
,`filelink` varchar(255)
,`genre` varchar(45)
,`artistname` varchar(255)
,`libid` int(11)
,`insertdate` date
,`userid` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `musicfull`
--
DROP TABLE IF EXISTS `musicfull`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `musicfull`  AS  (select `m`.`id` AS `id`,`m`.`name` AS `name`,`m`.`album` AS `album`,`m`.`length` AS `length`,`m`.`released` AS `date`,`m`.`piclink` AS `piclink`,`m`.`filelink` AS `filelink`,`g`.`id` AS `genre_id`,`g`.`name` AS `genre`,`a`.`name` AS `artistname` from (((`genremusic` `gm` join `music` `m` on((`m`.`id` = `gm`.`Music_id`))) join `genre` `g` on((`g`.`id` = `gm`.`Genre_id`))) join `artist` `a` on((`a`.`id` = `m`.`Artist_id`)))) ;

-- --------------------------------------------------------

--
-- Structure for view `userlib`
--
DROP TABLE IF EXISTS `userlib`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userlib`  AS  (select `m`.`id` AS `id`,`m`.`name` AS `name`,`m`.`album` AS `album`,`m`.`length` AS `length`,`m`.`released` AS `date`,`m`.`piclink` AS `piclink`,`m`.`filelink` AS `filelink`,`g`.`name` AS `genre`,`a`.`name` AS `artistname`,`u`.`id` AS `libid`,`u`.`insertdate` AS `insertdate`,`u`.`Login_id` AS `userid` from ((((`userbiblio` `u` join `genremusic` `gm` on((`gm`.`Music_id` = `u`.`Music_id`))) join `music` `m` on((`m`.`id` = `gm`.`Music_id`))) join `genre` `g` on((`g`.`id` = `gm`.`Genre_id`))) join `artist` `a` on((`a`.`id` = `m`.`Artist_id`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genremusic`
--
ALTER TABLE `genremusic`
  ADD PRIMARY KEY (`Genre_id`,`Music_id`),
  ADD KEY `fk_Genre_has_Music_Music1_idx` (`Music_id`),
  ADD KEY `fk_Genre_has_Music_Genre1_idx` (`Genre_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `username_idx` (`username`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `name_idx` (`name`),
  ADD KEY `fk_Music_Artist1_idx` (`Artist_id`);

--
-- Indexes for table `userbiblio`
--
ALTER TABLE `userbiblio`
  ADD PRIMARY KEY (`Music_id`,`Login_id`,`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Music_has_Login_Login1_idx` (`Login_id`),
  ADD KEY `fk_Music_has_Login_Music1_idx` (`Music_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userbiblio`
--
ALTER TABLE `userbiblio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `genremusic`
--
ALTER TABLE `genremusic`
  ADD CONSTRAINT `fk_Genre_has_Music_Genre1` FOREIGN KEY (`Genre_id`) REFERENCES `genre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Genre_has_Music_Music1` FOREIGN KEY (`Music_id`) REFERENCES `music` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `fk_Music_Artist1` FOREIGN KEY (`Artist_id`) REFERENCES `artist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userbiblio`
--
ALTER TABLE `userbiblio`
  ADD CONSTRAINT `fk_Music_has_Login_Login1` FOREIGN KEY (`Login_id`) REFERENCES `login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Music_has_Login_Music1` FOREIGN KEY (`Music_id`) REFERENCES `music` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
