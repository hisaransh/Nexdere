-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2018 at 11:42 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexdre`
--

-- --------------------------------------------------------

--
-- Table structure for table `onlineMode`
--

CREATE TABLE `onlineMode` (
  `gid` int(255) NOT NULL,
  `gameName` varchar(255) NOT NULL,
  `competitionName` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlineMode`
--

INSERT INTO `onlineMode` (`gid`, `gameName`, `competitionName`, `time`, `date`) VALUES
(1, 'PUBG', 'Battle Grounds', '05:00:00', '2018-11-28'),
(2, 'PUBG', 'Master of Battles', '18:00:00', '2018-12-14'),
(3, 'PUBG', 'Chicken Dinner', '20:00:00', '2018-11-21'),
(4, 'PUBG', 'Battle of Legends', '18:00:00', '2018-12-24'),
(5, 'CSGO', 'ESL Pro', '09:00:00', '2018-11-23'),
(6, 'CSGO', 'ESL Advanced', '21:00:00', '2018-11-30'),
(7, 'CSGO', 'ESL One', '20:00:00', '2018-11-26'),
(8, 'CSGO', 'MLG Pro', '18:00:00', '2018-12-18'),
(9, 'CALL OF DUTY', 'World League', '20:00:00', '2018-11-27'),
(10, 'CALL OF DUTY', 'XP', '21:00:00', '2018-11-29'),
(11, 'FIFA', 'ZX Battle', '19:00:00', '2018-12-13'),
(12, 'FIFA', 'ZX Advanced', '21:00:00', '2018-12-01'),
(13, 'FIFA', 'SA Neo', '14:00:00', '2018-11-30'),
(14, 'CALL OF DUTY', 'WAR', '15:00:00', '2018-11-29'),
(15, 'CALL OF DUTY', 'World Power', '21:00:00', '2018-12-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `onlineMode`
--
ALTER TABLE `onlineMode`
  ADD PRIMARY KEY (`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `onlineMode`
--
ALTER TABLE `onlineMode`
  MODIFY `gid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
