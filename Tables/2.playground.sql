-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2018 at 01:29 PM
-- Server version: 8.0.13
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
-- Table structure for table `playground`
--

CREATE TABLE `playground` (
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `gametype` varchar(255) NOT NULL,
  `Street` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playground`
--

INSERT INTO `playground` (`pid`, `name`, `city`, `start`, `end`, `gametype`, `Street`) VALUES
(1, 'Shipra Stadium', 'Noida', '05:00:00', '20:00:00', 'Cricket', 'near Shipra Plaza'),
(2, 'Expo Ground', 'Noida', '05:00:00', '20:00:00', 'Golf', 'near Expocentre'),
(3, 'Jaypee Grounds', 'Noida', '06:00:00', '20:00:00', 'Football', 'infront of Jaypee Institute'),
(4, 'Jaypee Grounds', 'Noida', '11:00:00', '20:00:00', 'Golf', 'infront of Jaypee Institute'),
(5, 'Shipra Stadium', 'Noida', '11:00:00', '20:00:00', 'Golf', 'near Shipra Plaza'),
(6, 'Expo Ground', 'Noida', '11:00:00', '20:00:00', 'Football', 'near Expocentre'),
(7, 'Habitat Grounds', 'Noida', '11:00:00', '20:00:00', 'Golf', 'near Habitat centre'),
(8, 'Habitat Grounds', 'Noida', '11:00:00', '20:00:00', 'Football', 'near Habitat centre'),
(9, 'Habitat Grounds', 'Noida', '11:00:00', '20:00:00', 'Cricket', 'near Habitat centre'),
(10, 'IMS Stadium', 'Noida', '11:00:00', '20:00:00', 'Football', 'near JIIT'),
(11, 'Rajeev Stadium', 'Delhi', '11:00:00', '20:00:00', 'Cricket', 'near Rajeev Road'),
(12, 'Rajeev Stadium', 'Delhi', '11:00:00', '20:00:00', 'Golf', 'near Rajeev Road'),
(13, 'Nehru Grounds', 'Delhi', '11:00:00', '20:00:00', 'Football', 'near Taj Hotel'),
(14, 'Nehru Grounds', 'Delhi', '11:00:00', '20:00:00', 'Cricket', 'near Taj Hotel'),
(15, 'Nehru Grounds', 'Delhi', '11:00:00', '20:00:00', 'Golf', 'near Taj Hotel'),
(16, 'DNS Grounds', 'Delhi', '11:00:00', '20:00:00', 'Cricket', 'City Centre'),
(17, 'DNS Grounds', 'Delhi', '11:00:00', '20:00:00', 'Football', 'City Centre'),
(18, 'Saket Arena', 'Delhi', '11:00:00', '20:00:00', 'Golf', 'Saket'),
(19, 'Saket Arena', 'Delhi', '11:00:00', '20:00:00', 'Cricket', 'Saket'),
(20, 'Saket Arena', 'Delhi', '11:00:00', '20:00:00', 'Football', 'Saket'),
(21, 'Vasant Kunj', 'Delhi', '11:00:00', '20:00:00', 'Cricket', 'in Vasant Kunj'),
(22, 'Vasant Kunj', 'Delhi', '11:00:00', '20:00:00', 'Football', 'in Vasant Kunj'),
(23, 'HZ Stadium', 'Delhi', '11:00:00', '20:00:00', 'Cricket', 'in Hauz Khas play area'),
(24, 'HZ Stadium', 'Delhi', '11:00:00', '20:00:00', 'Golf', 'in Hauz Khas play area'),
(25, 'IGI Grounds', 'Delhi', '11:00:00', '20:00:00', 'Football', 'near IGI Airport'),
(26, 'IGI Grounds', 'Gurgaon', '11:00:00', '20:00:00', 'Golf', 'near IGI Airport'),
(27, 'Sarita Grounds', 'Gurgaon', '11:00:00', '20:00:00', 'Cricket', 'in Sarita colony'),
(28, 'Savita Grounds', 'Delhi', '11:00:00', '20:00:00', 'Football', 'in Sarita colony'),
(29, 'RLN Stadium', 'Gurgaon', '11:00:00', '20:00:00', 'Cricket', 'near Kashmiri Gate Metro'),
(30, 'CP Stadium', 'Gurgaon', '12:00:00', '20:00:00', 'Football', 'near DLF city centre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `playground`
--
ALTER TABLE `playground`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `playground`
--
ALTER TABLE `playground`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
