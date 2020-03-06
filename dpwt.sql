-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2020 at 12:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
  `color` tinytext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `jobStatus` tinytext NOT NULL,
  `createdBy` tinytext NOT NULL,
  `location` tinytext DEFAULT NULL,
  `reviewedBy` tinytext DEFAULT NULL,
  `fileLocation` tinytext DEFAULT NULL,
  `whatPrinter` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_data`
--

INSERT INTO `job_data` (`id`, `jobName`, `reason`, `color`, `date`, `jobStatus`, `createdBy`, `location`, `reviewedBy`, `fileLocation`, `whatPrinter`) VALUES
(1, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-02-29 01:26:58', 'T.DONOTMODIFY', 'yldbouk', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(2, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-02-29 01:32:54', 'T.DONOTMODIFY', 'pro6dog', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(3, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-02-29 01:49:13', 'T.DONOTMODIFY', 'asdfghjkl', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(4, 'the world is a lie', 'trust no one', '', '2020-02-29 04:44:21', 'review', 'qwertyuiop', NULL, NULL, NULL, 'CeeMeCNC Orion Delta'),
(5, 'qwer', 'why is this not working please just do stuff', '', '2020-02-29 04:47:41', 'pause', 'qwertyuiop', NULL, 'pro6dog', '../../uploads/5', 'CeeMeCNC Orion Delta'),
(6, 'big hacker', 'energy', '', '2020-02-29 05:02:12', 'queue', 'Dean Anderson', NULL, 'pro6dog', '../../uploads/6', 'CeeMeCNC Orion Delta'),
(7, 'sdzkhwdckh', 'ok', '', '2020-03-02 00:22:24', 'review', 'qwertyuiop', NULL, NULL, NULL, 'CeeMeCNC Orion Delta'),
(8, 'alal', 'kl', '', '2020-03-02 00:24:06', 'review', 'qwertyuiop', NULL, NULL, '../../uploads/8', 'CeeMeCNC Orion Delta'),
(9, 'Okko', 'Kokokookko', '', '2020-03-04 16:28:28', 'review', 'Youssef Dbouk', NULL, NULL, NULL, 'CeeMeCNC Orion Delta'),
(10, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:04', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(11, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:05', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(12, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:06', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(13, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:07', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(14, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:07', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(15, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:08', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(16, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:09', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(17, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:09', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(18, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:41', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(19, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:42', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(20, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:43', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(21, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:12:43', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(22, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:17:11', 'purge', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(23, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 02:54:50', 'T.DONOTMODIFY', '108700281610228371664', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(24, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 16:11:40', 'T.DONOTMODIFY', '109517131994038725203', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(25, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 17:50:42', 'T.DONOTMODIFY', '109517131994038725203', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(26, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 17:51:25', 'T.DONOTMODIFY', '109517131994038725203', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(27, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 22:29:27', 'T.DONOTMODIFY', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(28, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 22:30:09', 'T.DONOTMODIFY', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY'),
(29, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '', '2020-03-05 22:39:27', 'T.DONOTMODIFY', '105028169979149272345', NULL, NULL, NULL, 'T.DONOTMODIFY');

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
  `typeUsers` set('password','gauth') NOT NULL,
  `permsUsers` tinytext NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`idUsers`, `uidUsers`, `nameUsers`, `emailUsers`, `pwdUsers`, `typeUsers`, `permsUsers`, `lastUpdated`) VALUES
(1, 'yldbouk', 'Youssef Dbouk', 'youssefdbouk@icloud.com', '$2y$10$6H.BxSqA826sTpjFQ5UI8O51b3E3ikLao4IfEHIOiG086LGX1GgCW', 'password', 'developer', '2020-03-04 21:30:52'),
(2, 'pro6dog', 'Dean Anderson', 'dmanderson616@yahoo.com', '$2y$10$TKQHBd/N1/rx5WClWNribO47eBt7BtA7KgjgPjhK9KnzGuiudkCm.', 'password', 'developer', '2020-03-04 21:30:55'),
(3, 'asdfghjkl', 'qwertyuiop', 's@s.s', '$2y$10$/2P4bEoV2.s6dhb0eMwsuerteFUH9W5ql3e8wqgjdrwf7M99pjMQO', 'password', 'default', '2020-03-04 21:30:57'),
(4, '', '', '', '', 'gauth', 'deleted', '2020-03-05 22:29:23'),
(5, '108700281610228371664', 'Dean Anderson', '24andersond@lakelandk12.org', 'Account is using OAuth. No Password is nessasary.', 'gauth', 'developer', '2020-03-05 02:56:24'),
(6, '105028169979149272345', 'Youssef D.', 'yldbouk@gmail.com', 'Account is using OAuth. No Password is nessasary.', 'gauth', 'default', '2020-03-05 22:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `printer_data`
--

CREATE TABLE `printer_data` (
  `id` int(11) NOT NULL,
  `friendlyname` tinytext NOT NULL,
  `grade` tinyint(4) NOT NULL,
  `filamentColor` tinytext NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `lastUpdated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printer_data`
--

INSERT INTO `printer_data` (`id`, `friendlyname`, `grade`, `filamentColor`, `locked`, `lastUpdated`) VALUES
(1, 'T.DONOTMODIFY', 1, 'T.DONOTMODIFY', 1, '0000-00-00 00:00:00'),
(2, 'CeeMeCNC Orion Delta', 8, 'red', 0, '2020-02-28 22:09:34');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `printer_data`
--
ALTER TABLE `printer_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
