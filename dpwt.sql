-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 07:18 AM
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
(1, 'The Job of Life', 'First Class', '2019-01-22 01:52:51', 'purge', 'yldbouk', NULL, NULL, NULL, ''),
(2, 'f', 'v', '2019-01-22 01:53:56', 'purge', 'yldbouk', NULL, NULL, NULL, ''),
(3, 'fo', 'vo', '2019-01-22 01:55:46', 'purge', 'yldbouk', NULL, NULL, NULL, ''),
(4, 'foi', 'voi', '2019-01-22 01:56:35', 'purge', 'yldbouk', NULL, NULL, NULL, ''),
(5, 'jii', 'jiji', '2019-01-22 01:57:17', 'purge', 'yldbouk', NULL, NULL, NULL, ''),
(6, 'okok', 'okok', '2019-01-22 02:01:41', 'purge', 'admin', NULL, NULL, NULL, ''),
(7, 'okokj', 'jokok', '2019-01-22 02:04:27', 'purge', 'yldbouk', NULL, NULL, NULL, ''),
(8, 'okokjo', 'jokoko', '2019-01-22 02:06:19', 'purge', 'yldbouk', NULL, 'yldbouk', NULL, ''),
(9, 'ftfyguhijk', 'm', '2019-01-22 03:18:00', 'purge', 'default', NULL, 'yldbouk', NULL, ''),
(10, 'ftfyguhijkok', 'mkojiuhjiok,', '2019-01-22 04:01:06', 'purge', 'yldbouk', NULL, NULL, NULL, ''),
(11, 'ftfyguhijkokk', 'mkojiuhjiok,kok', '2019-01-22 21:53:23', 'purge', 'yldbouk', NULL, NULL, NULL, ''),
(12, 'err', 'err', '2019-01-22 21:53:23', 'purge', 'err', 'err', 'err', '../../uploads/11 ', ''),
(13, 'ftfyguhijkokkji', 'jimkojiuhjiok,kok', '2019-01-22 21:58:32', 'purge', 'yldbouk', NULL, NULL, '../../uploads/13', ''),
(14, 'Mario Coin', 'Because Why Not', '2019-01-24 03:53:01', 'purge', 'default', NULL, NULL, '../../uploads/14', ''),
(15, 'k', 'ko', '2019-01-24 03:55:13', 'purge', 'yldbouk', NULL, NULL, '../../uploads/15', ''),
(16, 'kko', 'ko', '2019-01-24 03:55:35', 'purge', 'yldbouk', NULL, NULL, '../../uploads/16', ''),
(17, 'klnmo,jhbjikmjn ', 'lkkl', '2019-01-27 22:36:44', 'purge', 'yldbouk', NULL, NULL, '../../uploads/17', ''),
(18, 'jojioh', 'ibuhil', '2019-01-28 04:40:06', 'purge', 'yldbouk', NULL, NULL, '../../uploads/18', ''),
(19, 'jojioh', 'ibuhil', '2019-01-28 04:40:06', 'purge', 'yldbouk', NULL, NULL, '../../uploads/18', ''),
(20, 'jomipnojnojn i', 'jnjokk', '2019-01-28 22:52:40', 'purge', 'yldbouk', NULL, NULL, '../../uploads/20', ''),
(21, 'no boring', 'hii ', '2019-01-29 21:54:20', 'purge', 'yldbouk', NULL, NULL, '../../uploads/21', ''),
(22, 'no boring1', 'hii ', '2019-01-29 21:55:13', 'purge', 'yldbouk', 'reee', NULL, '../../uploads/22', ''),
(23, 'magik', 'arp is useless unless it evolves', '2019-01-31 00:56:23', 'purge', 'yldbouk', '', NULL, '../../uploads/23', ''),
(24, 'ji', 'ji', '2019-01-31 00:59:29', 'purge', 'yldbouk', '', NULL, '../../uploads/24', ''),
(25, 'hji', 'ji', '2019-01-31 01:01:15', 'purge', 'yldbouk', '', NULL, '../../uploads/25', ''),
(26, 'hjin', 'ji', '2019-01-31 01:02:25', 'purge', 'yldbouk', NULL, 'yldbouk', '../../uploads/26', ''),
(27, 'hjink', 'ji', '2019-01-31 01:04:10', 'purge', 'yldbouk', 'In the Trash', 'yldbouk', '../../uploads/27', ''),
(28, 'T.DONOTMODIFY', 'T.DONOTMODIFY', '2019-01-31 22:09:51', 'T.DONOTMODIFY', 'root', NULL, NULL, '../../uploads/28', ''),
(29, 'j', 'ji', '2019-01-31 22:14:02', 'purge', 'yldbouk', NULL, NULL, '../../uploads/29', ''),
(30, 'Test ', 'I\'m a dev I can do what I want!', '2019-02-02 03:20:52', 'purge', 'Help', NULL, 'Help', NULL, ''),
(31, 'jiygighgbuyb', 'ji', '2019-02-03 00:16:42', 'purge', 'yldboukjj', NULL, NULL, '../../uploads/31', ''),
(32, 'jiygighgbuybgy', 'ji', '2019-02-03 00:16:46', 'purge', 'yldboukjj', NULL, NULL, '../../uploads/32', ''),
(33, 'jiygighgbuybgyguyhj', 'ji', '2019-02-03 00:16:50', 'purge', 'yldboukjj', NULL, NULL, '../../uploads/33', ''),
(34, 'jiygighgbuybgyguyhjyghbujin', 'ji', '2019-02-03 00:16:54', 'purge', 'err', NULL, NULL, '../../uploads/34', ''),
(35, 'jiygighgbuybgyguyhjyghbujinygbyhn', 'ji', '2019-02-03 00:16:59', 'purge', 'yldboukjj', NULL, NULL, '../../uploads/35', ''),
(36, 'gvhuio-p', 'j', '2019-02-03 00:26:28', 'purge', 'yldboukl', NULL, NULL, '../../uploads/36', ''),
(37, 'jgvhuio-p', 'j', '2019-02-03 00:26:31', 'purge', 'yldboukl', NULL, NULL, '../../uploads/37', ''),
(38, 'jgvhuio-pj', 'j', '2019-02-03 00:26:34', 'purge', 'yldboukl', NULL, NULL, '../../uploads/38', ''),
(39, 'jgvhuio-pjj', 'j', '2019-02-03 00:26:37', 'purge', 'yldboukl', NULL, NULL, '../../uploads/39', ''),
(40, 'jgvhuio-pjjj', 'j', '2019-02-03 00:26:41', 'purge', 'yldboukl', NULL, NULL, '../../uploads/40', ''),
(41, 'jgvhuio-pjjjj', 'j', '2019-02-03 00:26:44', 'purge', 'yldboukl', NULL, NULL, '../../uploads/41', ''),
(42, 'kjljkbhjk', 'vnbhjbbkjbkbk', '2019-02-08 01:18:41', 'review', 'yldbouk', NULL, NULL, '../../uploads/42', ''),
(43, 'jkjljkbhjk', 'vnbhjbbkjbkbk', '2019-02-08 02:01:31', 'review', 'yldbouk', NULL, NULL, NULL, ''),
(44, 'jkjljkbhjkl', 'vnbhjbbkjbkbk', '2019-02-08 02:06:11', 'review', 'yldbouk', NULL, NULL, '../../uploads/44', ''),
(45, 'cueb', 'im an debeloper', '2019-02-09 04:17:50', 'denied', 'dontcare', NULL, 'Help', NULL, ''),
(46, 'lm,m, m,m,m ml;llmmm', 'mkl,,m l,m l nkm mnml,', '2019-02-09 05:58:34', 'review', 'yldbouk', NULL, NULL, '../../uploads/46', 'orion');

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
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`idUsers`, `uidUsers`, `nameUsers`, `emailUsers`, `pwdUsers`, `permsUsers`) VALUES
(1, 'yldbouk', 'Youssef Dbouk', 'youssefdbouk@icloud.com', '$2y$10$LulCiDkIZEEyPmyi3AVaNuiZuMTUurPSVCYdaqCmc/E2VywsRtWkG', 'developer'),
(2, 'admin', 'admin', 'a@a.a', '$2y$10$Kg1uSlCah8/kxzC.2LyNV.2Wo49NJ.1EcwtZLgvvSyOqAur6jdKai', 'admin'),
(3, 'Help', 'Dean Anderson', 'Notmyemail@nothing.org', '$2y$10$AB7qH8fXNvJ7lM41HUicd.uMoAJtwT3Vty/Jlos7Hbn2iW2xyZTCy', 'developer'),
(4, 'none', 'none', 'n@n.n', '$2y$10$qMBRfrJtb8yCbTk81Y1Z3u0aLJNmV2JNz0xS1SSD8vr41VleYpmWO', 'none'),
(5, 'awaitingAction', 'awaitingAction', 'aa@aa.aa', '$2y$10$Ndx4uD3yCexftd1hHTVqn.O2xG7gpNffqCE9Jm4TCrT1AS2KnjIBS', 'awaitingAction'),
(6, 'default', 'default', 'd@d.d', '$2y$10$QV4YjevvWyUT0xuzr5DHne84TITSfgfTk0lfJZ4FAB0LyVWGV2vFG', 'default'),
(7, 'yldbouk2', 'Youssef Dbouk', '23dbouky@lakelandk12.org', '$2y$10$NLPu3F0wu3Z7ziRDdG8jVu6pmrYc10NaxYWAuesWujGs240kxtpbq', 'default'),
(8, 'revoked', 'revoked', 'a@a.a', '$2y$10$e4jihhRtZkp/X9EWMuc/7epNBn1npn08kaDdaccgTOnraBYTxoIMu', 'revoked'),
(9, 'yldboukj', '', '', '', 'deleted'),
(10, 'yldboukjj', '', '', '', 'deleted'),
(11, 'yldboukl', '', '', '', 'deleted'),
(12, 'kyldbouk', '', '', '', 'deleted'),
(13, 'dontcare', '1234567890-', '291234@gmail.com', '$2y$10$W9aiZ2AwG4obPvBhuDN4yuZAcprfaBKcLQzRttQ.sjpy2nK8VIHpq', 'developer');

-- --------------------------------------------------------

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
