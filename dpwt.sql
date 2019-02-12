-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 04:18 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpwt`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_data`
--

CREATE TABLE `job_data` (
  `id` int(11) NOT NULL,
  `jobName` tinytext NOT NULL,
  `reason` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jobStatus` tinytext NOT NULL,
  `createdBy` tinytext NOT NULL,
  `location` tinytext,
  `reviewedBy` tinytext,
  `fileLocation` tinytext,
  `whatPrinter` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_data`
--

INSERT INTO `job_data` (`id`, `jobName`, `reason`, `date`, `jobStatus`, `createdBy`, `location`, `reviewedBy`, `fileLocation`, `whatPrinter`) VALUES
(1, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '2000-01-01 01:00:00', 'T.DONOTMODIFY', 'root', 'T.DONOTMODIFY', 'T.DONOTMODIFY', 'T.DONOTMODIFY', 'T.DONOTMODIFY');

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `nameUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `permsUsers` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `printer_data`
--

CREATE TABLE `printer_data` (
  `id` int(11) NOT NULL,
  `friendlyname` tinytext NOT NULL,
  `grade` tinyint(4) NOT NULL,
  `filamentColor` tinytext NOT NULL,
  `locked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printer_data`
--

INSERT INTO `printer_data` (`id`, `friendlyname`, `grade`, `filamentColor`, `locked`) VALUES
(1, 'T.DONOTMODIFY', 0, 'T.DONOTMODIFY', 1),
(2, 'CeeMeCNC Orion Delta', 8, 'purple', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_data`
--
ALTER TABLE `job_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `printer_data`
--
ALTER TABLE `printer_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_data`
--
ALTER TABLE `job_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `printer_data`
--
ALTER TABLE `printer_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
