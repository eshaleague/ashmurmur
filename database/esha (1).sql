-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2018 at 09:45 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esha`
--

-- --------------------------------------------------------

--
-- Table structure for table `chattest`
--

CREATE TABLE `chattest` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chattest`
--

INSERT INTO `chattest` (`message_id`, `user_id`, `message`, `timestamp`) VALUES
(1, 1, 'hello you jew', 2147483647),
(2, 2, 'jew!!', 2147483647),
(4, 1, 'test message', 1514758439),
(22, 1, 'v', 1514768859),
(23, 1, 'k', 1514768863),
(24, 1, 'k', 1514768864),
(25, 1, 'hello', 1514768867),
(26, 1, 'w', 1514768959),
(27, 1, 'w', 1514769026),
(28, 1, 'awejfnawfjkn', 1514769034),
(29, 1, 'wdwd', 1514769046),
(30, 1, 'fef', 1514769085),
(31, 1, 'fef', 1514769088),
(32, 1, 'ADawda', 1514769092),
(33, 1, 'sefse', 1514769176),
(34, 1, 'sfsefef', 1514769177),
(35, 1, 'yoyoyoyo', 1514769179),
(36, 2, 'dwd', 1514769227),
(37, 2, 'Youre a little shit you know that', 1514769238),
(38, 1, 'fuck you then you piece of shit', 1514769250),
(39, 1, 'Im gay hahahaha', 1514769259),
(40, 1, 'deded', 1514841026),
(41, 1, 'you whathtoaei', 1514841034),
(42, 1, 'wdad', 1514842648);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `club_name` varchar(256) NOT NULL,
  `club_code` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `club_code`) VALUES
(1, 'w-vikings', '1yfzc5'),
(2, 'w-crusaders', 'do9srn'),
(3, 'none', 'teamMe');

-- --------------------------------------------------------

--
-- Table structure for table `csgoschedule`
--

CREATE TABLE `csgoschedule` (
  `id` int(11) NOT NULL,
  `team1` varchar(100) NOT NULL,
  `team2` varchar(100) NOT NULL,
  `winner` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csgoschedule`
--

INSERT INTO `csgoschedule` (`id`, `team1`, `team2`, `winner`, `date`) VALUES
(1, 'w-vikings a', 'w-vikings c', 'frfesf', '2001-00-00 00:00:00'),
(2, 'w-vikings c', 'w-vikings c', 'w-vikings c', '0000-00-00 00:00:00'),
(3, 'w-vikings c', 'w-vikings r', '', '2018-01-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `currentseason`
--

CREATE TABLE `currentseason` (
  `id` int(11) NOT NULL,
  `player_name` varchar(256) NOT NULL,
  `game` varchar(256) NOT NULL,
  `game_id` varchar(256) NOT NULL,
  `club_name` varchar(256) NOT NULL,
  `team_letter` varchar(256) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentseason`
--

INSERT INTO `currentseason` (`id`, `player_name`, `game`, `game_id`, `club_name`, `team_letter`, `timestamp`) VALUES
(1, 'temp0w', 'League of Legends', '76561197960435530', 'w-vikings', 'c', 1515096470),
(12, 'hola amimago', 'CSGO', '123456', 'w-vikings', 'a', 0),
(13, 'manguy', 'CSGO', '23456', 'w-crusaders', 'c', 0),
(14, 'bobooooyy', 'League of Legends', '35388056', 'w-vikings', 'b', 0),
(16, 'gobby', 'CSGO', '12313', 'w-vikings', 'r', 0),
(17, 'bubsicle', 'CSGO', '76561197960435530', 'w-vikings ', 'c', 1514920832),
(19, 'bobooooyy', 'League of Legends', '35388056', 'w-vikings', 'c', 0);

-- --------------------------------------------------------

--
-- Table structure for table `esha_videos`
--

CREATE TABLE `esha_videos` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `esha_videos`
--

INSERT INTO `esha_videos` (`id`, `url`) VALUES
(1, 'https://www.youtube.com/watch?v=bFqlqerf4Ak');

-- --------------------------------------------------------

--
-- Table structure for table `lobbystatus`
--

CREATE TABLE `lobbystatus` (
  `id` int(11) NOT NULL,
  `lobby_name` varchar(256) NOT NULL,
  `matchup` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lobbystatus`
--

INSERT INTO `lobbystatus` (`id`, `lobby_name`, `matchup`, `status`) VALUES
(17, 'lobbywvikcwvikblol', 'w-vikings c VS w-vikings b(2018-01-17 00:00:00)lol', 'no'),
(18, 'lobbywvikcwvikrcsgo', 'w-vikings c VS w-vikings r(2018-01-25 00:00:00)csgo', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `lolschedule`
--

CREATE TABLE `lolschedule` (
  `id` int(11) NOT NULL,
  `team1` varchar(100) NOT NULL,
  `team2` varchar(100) NOT NULL,
  `winner` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lolschedule`
--

INSERT INTO `lolschedule` (`id`, `team1`, `team2`, `winner`, `date`) VALUES
(1, 'w-vikings a', 'w-vikings c', 'w-vikings c', '2018-01-03 12:26:22'),
(2, 'w-vikings c', 'w-crusaders b', 'w-vikings a', '2018-01-03 16:00:00'),
(11, 'w-vikings c', 'w-vikings b', '', '2018-01-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seasoninfo`
--

CREATE TABLE `seasoninfo` (
  `id` int(11) NOT NULL,
  `season_name` varchar(256) NOT NULL,
  `is_current` varchar(256) NOT NULL,
  `start_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seasoninfo`
--

INSERT INTO `seasoninfo` (`id`, `season_name`, `is_current`, `start_date`) VALUES
(1, 'ESHA season 2', 'yes', '2018-01-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_username` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  `user_type` varchar(256) NOT NULL,
  `xp` int(11) NOT NULL,
  `user_picture` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_username`, `user_pwd`, `user_type`, `xp`, `user_picture`) VALUES
(1, 'Bryan', 'Ling', 'temp0w@yahoo.ca', 'temp0w', '$2y$10$0XYVU8tqme7bwZC5rtlsZO1kaQAWQZgDxtbmkT56.4vyUW1dMOfUO', '', 214923, 'https://scontent.cdninstagram.com/t51.2885-15/s320x320/e35/24126891_1712496235459457_1546061112707907584_n.jpg'),
(2, 'test', 'tester', 'mr.waffel38@gmail.com', 'temp0ws', '$2y$10$y8f0j7N6nRI3eHIOd81bouos9KIqluhFLCVSrsiJuU2ZEpd5gIIOC', '', 0, ''),
(3, 'Tournament', 'Organiser', 'thisisandeshaadminthisshouldnotwork@gmai.com', 'ESHAadmin1', '$2y$10$Hj38UaQp7MBP.pl0a0gsW.xB5iPPDVn8CVDFKRMuhlkAXUEZJeTwG', 'admin', 0, ''),
(4, 'Graham', 'Carkner', 'gcarkner@gmail.com', 'cracker', '$2y$10$gWufaALAdwv8/5Ft467dY.SPsOYUe4WW9M9nbtsAKyIYgX6w1BNiW', '', 451231, ''),
(5, 'First', 'Last', '9d76635c@10minutemail.co.uk', 'temp0w_sucks', '$2y$10$8kpIl/z2iLPcY8ZSplR95.0olCeQ7CxASEgjhkh4BPA697slachIi', '', 0, ''),
(6, 'person', 'bears', 'irejnvkjnaodfjnakcmaek@gmail.com', 'helloworld', '$2y$10$c900SBOI3QXWKXD5ysvM4OUHS84Gp1qAk4FkIatbdyd4q9hPHprlu', '', 0, ''),
(7, 'bryan', 'dip', 'somfianadadwdwdmdkm@gmail.com', 'bubsicle', '$2y$10$mlSXZu48kEy5NWTWEgIV4urXLjLodL4fs6il0xMb3m6IfWG/crCI2', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `xp_levels`
--

CREATE TABLE `xp_levels` (
  `id` int(11) NOT NULL,
  `level_min` int(11) NOT NULL,
  `level_max` int(11) NOT NULL,
  `xp_required` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xp_levels`
--

INSERT INTO `xp_levels` (`id`, `level_min`, `level_max`, `xp_required`) VALUES
(1, 0, 1000, 100),
(3, 1001, 4000, 200),
(5, 4001, 41500, 500),
(7, 41501, 2147483647, 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chattest`
--
ALTER TABLE `chattest`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csgoschedule`
--
ALTER TABLE `csgoschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currentseason`
--
ALTER TABLE `currentseason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esha_videos`
--
ALTER TABLE `esha_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lobbystatus`
--
ALTER TABLE `lobbystatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lolschedule`
--
ALTER TABLE `lolschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasoninfo`
--
ALTER TABLE `seasoninfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `xp_levels`
--
ALTER TABLE `xp_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chattest`
--
ALTER TABLE `chattest`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `csgoschedule`
--
ALTER TABLE `csgoschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currentseason`
--
ALTER TABLE `currentseason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `esha_videos`
--
ALTER TABLE `esha_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lobbystatus`
--
ALTER TABLE `lobbystatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lolschedule`
--
ALTER TABLE `lolschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seasoninfo`
--
ALTER TABLE `seasoninfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `xp_levels`
--
ALTER TABLE `xp_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
