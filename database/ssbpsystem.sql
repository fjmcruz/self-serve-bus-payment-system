-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2021 at 01:34 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssbpsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `commuteraccounts`
--

CREATE TABLE `commuteraccounts` (
  `ID` int(50) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Balance` int(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Contact` varchar(50) DEFAULT NULL,
  `Ticket` varchar(500) DEFAULT NULL,
  `Bus_Number` varchar(50) DEFAULT NULL,
  `Route` varchar(50) DEFAULT NULL,
  `Dispatch_Time` varchar(50) DEFAULT NULL,
  `Dispatch_Date` varchar(50) NOT NULL,
  `Seats` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeeaccounts`
--

CREATE TABLE `employeeaccounts` (
  `ID` int(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loadtransactions`
--

CREATE TABLE `loadtransactions` (
  `ID` int(50) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `Month` varchar(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Source` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terminalschedule`
--

CREATE TABLE `terminalschedule` (
  `ID` int(50) NOT NULL,
  `Route` varchar(50) DEFAULT NULL,
  `Dispatch_Time` varchar(50) DEFAULT NULL,
  `Dispatch_Date` varchar(50) NOT NULL,
  `Fare` int(50) DEFAULT NULL,
  `Bus_Number` varchar(50) DEFAULT NULL,
  `Slots` int(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `A1` tinyint(1) DEFAULT NULL,
  `A2` tinyint(1) DEFAULT NULL,
  `A3` tinyint(1) DEFAULT NULL,
  `A4` tinyint(1) DEFAULT NULL,
  `B1` tinyint(1) DEFAULT NULL,
  `B2` tinyint(1) DEFAULT NULL,
  `B3` tinyint(1) DEFAULT NULL,
  `B4` tinyint(1) DEFAULT NULL,
  `C1` tinyint(1) DEFAULT NULL,
  `C2` tinyint(1) DEFAULT NULL,
  `C3` tinyint(1) DEFAULT NULL,
  `C4` tinyint(1) DEFAULT NULL,
  `D1` tinyint(1) DEFAULT NULL,
  `D2` tinyint(1) DEFAULT NULL,
  `D3` tinyint(1) DEFAULT NULL,
  `D4` tinyint(1) DEFAULT NULL,
  `E1` tinyint(1) DEFAULT NULL,
  `E2` tinyint(1) DEFAULT NULL,
  `E3` tinyint(1) DEFAULT NULL,
  `E4` tinyint(1) DEFAULT NULL,
  `F1` tinyint(1) DEFAULT NULL,
  `F2` tinyint(1) DEFAULT NULL,
  `F3` tinyint(1) DEFAULT NULL,
  `F4` tinyint(1) DEFAULT NULL,
  `G1` tinyint(1) DEFAULT NULL,
  `G2` tinyint(1) DEFAULT NULL,
  `G3` tinyint(1) DEFAULT NULL,
  `G4` tinyint(1) DEFAULT NULL,
  `H1` tinyint(1) DEFAULT NULL,
  `H2` tinyint(1) DEFAULT NULL,
  `H3` tinyint(1) DEFAULT NULL,
  `H4` tinyint(1) DEFAULT NULL,
  `I1` tinyint(1) DEFAULT NULL,
  `I2` tinyint(1) DEFAULT NULL,
  `I3` tinyint(1) DEFAULT NULL,
  `I4` tinyint(1) DEFAULT NULL,
  `J1` tinyint(1) DEFAULT NULL,
  `J2` tinyint(1) DEFAULT NULL,
  `J3` tinyint(1) DEFAULT NULL,
  `J4` tinyint(1) DEFAULT NULL,
  `K1` tinyint(1) DEFAULT NULL,
  `K2` tinyint(1) DEFAULT NULL,
  `K3` tinyint(1) DEFAULT NULL,
  `K4` tinyint(1) DEFAULT NULL,
  `L1` tinyint(1) DEFAULT NULL,
  `L2` tinyint(1) DEFAULT NULL,
  `L3` tinyint(1) DEFAULT NULL,
  `L4` tinyint(1) DEFAULT NULL,
  `M1` tinyint(1) DEFAULT NULL,
  `M2` tinyint(1) DEFAULT NULL,
  `M3` tinyint(1) DEFAULT NULL,
  `M4` tinyint(1) DEFAULT NULL,
  `M5` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickettransactions`
--

CREATE TABLE `tickettransactions` (
  `ID` int(50) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `Month` varchar(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Source` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Ticket` varchar(500) NOT NULL,
  `Bus_Number` varchar(50) NOT NULL,
  `Route` varchar(50) NOT NULL,
  `Dispatch_Time` varchar(50) NOT NULL,
  `Dispatch_Date` varchar(50) NOT NULL,
  `Seats` varchar(500) NOT NULL,
  `Fare` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commuteraccounts`
--
ALTER TABLE `commuteraccounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employeeaccounts`
--
ALTER TABLE `employeeaccounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loadtransactions`
--
ALTER TABLE `loadtransactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `terminalschedule`
--
ALTER TABLE `terminalschedule`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tickettransactions`
--
ALTER TABLE `tickettransactions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commuteraccounts`
--
ALTER TABLE `commuteraccounts`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeeaccounts`
--
ALTER TABLE `employeeaccounts`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loadtransactions`
--
ALTER TABLE `loadtransactions`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terminalschedule`
--
ALTER TABLE `terminalschedule`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickettransactions`
--
ALTER TABLE `tickettransactions`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
