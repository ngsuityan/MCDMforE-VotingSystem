-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 02:32 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AD_ID` int(10) NOT NULL,
  `Admin_ID` varchar(30) NOT NULL,
  `Admin_Password` varchar(30) NOT NULL,
  `Admin_Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AD_ID`, `Admin_ID`, `Admin_Password`, `Admin_Status`) VALUES
(1, 'admin', 'admin', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `Candidate_ID` int(11) NOT NULL,
  `Candidate_Name` varchar(250) NOT NULL,
  `Candidate_Matric` varchar(50) NOT NULL,
  `Candidate_Faculty` varchar(250) NOT NULL,
  `Year` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Candidate_Slogan` varchar(250) NOT NULL,
  `Candidate_Photo` varchar(100) NOT NULL,
  `Academic` float NOT NULL,
  `Kesukarelawan` float NOT NULL,
  `Leadership` float NOT NULL,
  `CommunityService` float NOT NULL,
  `Kesukanan` float NOT NULL,
  `Kebudayaan` float NOT NULL,
  `PengucapanAwam` float NOT NULL,
  `DayaUsahaInovasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`Candidate_ID`, `Candidate_Name`, `Candidate_Matric`, `Candidate_Faculty`, `Year`, `Semester`, `Candidate_Slogan`, `Candidate_Photo`, `Academic`, `Kesukarelawan`, `Leadership`, `CommunityService`, `Kesukanan`, `Kebudayaan`, `PengucapanAwam`, `DayaUsahaInovasi`) VALUES
(1, 'ng suityan', 'CB18146', 'FK', 4, 1, 'love life', '1641463120_photoViewer.jpg', 35, 199, 120, 60, 120, 258, 188, 202),
(2, 'fang', 'CB18562', 'FK', 3, 1, 'my life', '1641463287_0a9687a9572b1257a6a5da1319b8fb59a242d601150fa-yyXPma_fw658.jpg', 25, 199, 128, 290, 25, 199, 202, 158),
(3, 'Leroy Coler', 'CB2222', 'FK', 2, 2, 'Student Needs is Important', '1642250306_emileigh_harrison_cropped.jpg', 20, 125, 250, 115, 128, 100, 99, 30),
(4, 'Ali ', 'CB15148', 'FK', 3, 1, 'A brighter future for UMP', '1642250453_norman-curtis-300x300.jpg', 25, 11, 15, 20, 250, 199, 30, 105),
(5, 'choong', 'CB12223', 'FK', 2, 1, 'Believe in a better UMP', '1642250524_istockphoto-597958694-612x612.jpg', 35, 105, 35, 155, 55, 159, 162, 288);

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `Criteria_ID` int(11) NOT NULL,
  `Criteria_Name` varchar(100) NOT NULL,
  `R5min` float NOT NULL,
  `R5max` float NOT NULL,
  `R4min` float NOT NULL,
  `R4max` float NOT NULL,
  `R3min` float NOT NULL,
  `R3max` float NOT NULL,
  `R2min` float NOT NULL,
  `R2max` float NOT NULL,
  `R1min` float NOT NULL,
  `R1max` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`Criteria_ID`, `Criteria_Name`, `R5min`, `R5max`, `R4min`, `R4max`, `R3min`, `R3max`, `R2min`, `R2max`, `R1min`, `R1max`) VALUES
(1, 'Academic', 0, 8, 9, 10, 11, 17, 24, 25, 32, 40),
(2, 'Kesukarelawan', 0, 60, 61, 120, 121, 180, 181, 240, 241, 300),
(3, 'Leadership', 0, 60, 61, 120, 121, 180, 181, 240, 241, 300),
(4, 'CommunityService', 0, 60, 61, 120, 121, 180, 181, 240, 241, 300),
(5, 'Kesukanan', 0, 60, 61, 120, 121, 180, 181, 240, 241, 300),
(6, 'Kebudayaan', 0, 60, 61, 120, 121, 180, 181, 240, 241, 300),
(7, 'PengucapanAwam', 0, 60, 61, 120, 121, 180, 181, 240, 241, 300),
(8, 'DayaUsahaInovasi', 0, 60, 61, 120, 121, 180, 181, 240, 241, 300);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `Rate_ID` int(11) NOT NULL,
  `Vot_ID` int(11) NOT NULL,
  `Academic` float NOT NULL,
  `Kesukarelawan` float NOT NULL,
  `Leadership` float NOT NULL,
  `CommunityService` float NOT NULL,
  `Kesukanan` float NOT NULL,
  `Kebudayaan` float NOT NULL,
  `PengucapanAwam` float NOT NULL,
  `DayaUsahaInovasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`Rate_ID`, `Vot_ID`, `Academic`, `Kesukarelawan`, `Leadership`, `CommunityService`, `Kesukanan`, `Kebudayaan`, `PengucapanAwam`, `DayaUsahaInovasi`) VALUES
(8, 1, 3, 3, 3, 4, 4, 5, 4, 4),
(9, 3, 2, 3, 1, 3, 4, 3, 3, 5),
(10, 2, 3, 2, 4, 4, 4, 2, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `Vot_ID` int(10) NOT NULL,
  `Voter_ID` varchar(20) NOT NULL,
  `Voter_Password` varchar(20) NOT NULL,
  `Voter_Status` varchar(30) NOT NULL COMMENT '1=Student, 2=Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`Vot_ID`, `Voter_ID`, `Voter_Password`, `Voter_Status`) VALUES
(1, 'CB18146', '12345', '1'),
(2, 'Staff', 'Staff', '2'),
(3, 'CB88888', '88888', '1');

-- --------------------------------------------------------

--
-- Table structure for table `winner`
--

CREATE TABLE `winner` (
  `winner_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `current_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winner`
--

INSERT INTO `winner` (`winner_id`, `candidate_id`, `current_points`) VALUES
(1, 1, 15),
(2, 2, 13),
(3, 3, 15),
(4, 4, 15),
(5, 5, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AD_ID`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`Candidate_ID`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`Criteria_ID`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`Rate_ID`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`Vot_ID`);

--
-- Indexes for table `winner`
--
ALTER TABLE `winner`
  ADD PRIMARY KEY (`winner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AD_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `Candidate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `Criteria_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `Rate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `Vot_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `winner`
--
ALTER TABLE `winner`
  MODIFY `winner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
