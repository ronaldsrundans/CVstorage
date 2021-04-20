-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2021 at 12:56 PM
-- Server version: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lvpasts`
--

-- --------------------------------------------------------

--
-- Table structure for table `adress`
--

CREATE TABLE `adress` (
  `adressid` int(5) NOT NULL,
  `country` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `street` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `postalcode` varchar(100) COLLATE utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `adress`
--

INSERT INTO `adress` (`adressid`, `country`, `city`, `street`, `postalcode`) VALUES
(1, 'Latvija', 'Rīga', 'Mofo iela', '45');

-- --------------------------------------------------------

--
-- Table structure for table `persjoinedu`
--

CREATE TABLE `persjoinedu` (
  `persid` int(11) NOT NULL,
  `eduid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `persjoinedu`
--

INSERT INTO `persjoinedu` (`persid`, `eduid`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `persjoinwork`
--

CREATE TABLE `persjoinwork` (
  `persid` int(5) NOT NULL,
  `workid` int(5) NOT NULL,
  `position` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `workload` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `experience` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `totaltime` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `achievement` varchar(100) COLLATE utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `persjoinwork`
--

INSERT INTO `persjoinwork` (`persid`, `workid`, `position`, `workload`, `experience`, `totaltime`, `achievement`) VALUES
(1, 1, '', '', '', '', ''),
(2, 2, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `personid` int(5) NOT NULL,
  `name` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_latvian_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`personid`, `name`, `surname`, `phone`, `email`) VALUES
(1, 'Jānis', 'Bērziņš', '123456', 'janis@berzins.com'),
(2, 'Kārlis', 'Ozols', '654321', 'karlis@ozols.lv');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schoolid` int(5) NOT NULL,
  `title` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `faculty` varchar(100) COLLATE utf8_latvian_ci NOT NULL,
  `level` varchar(100) COLLATE utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schoolid`, `title`, `faculty`, `level`) VALUES
(1, 'Latvijas Universitāte', 'Fizikas un Matemātikas fakultāte', 'Bakalaurs'),
(2, 'Jāņa Raiņa ģimnāzija', 'Matemātikas novirziens', 'Vidusskola');

-- --------------------------------------------------------

--
-- Table structure for table `workplace`
--

CREATE TABLE `workplace` (
  `workplaceid` int(5) NOT NULL,
  `company` varchar(100) COLLATE utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

--
-- Dumping data for table `workplace`
--

INSERT INTO `workplace` (`workplaceid`, `company`) VALUES
(1, 'Latvijas Pasts'),
(2, 'PornHub');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`adressid`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`personid`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schoolid`);

--
-- Indexes for table `workplace`
--
ALTER TABLE `workplace`
  ADD PRIMARY KEY (`workplaceid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adress`
--
ALTER TABLE `adress`
  MODIFY `adressid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `personid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schoolid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `workplace`
--
ALTER TABLE `workplace`
  MODIFY `workplaceid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
