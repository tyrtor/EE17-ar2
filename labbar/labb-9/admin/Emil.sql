-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 20 jan 2020 kl 08:59
-- Serverversion: 5.7.28-0ubuntu0.18.04.4-log
-- PHP-version: 7.3.12-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `Emil`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `bilar`
--

CREATE TABLE `bilar` (
  `reg` varchar(10) NOT NULL,
  `marke` varchar(50) DEFAULT NULL,
  `modell` varchar(50) DEFAULT NULL,
  `arsmodell` int(11) DEFAULT NULL,
  `pris` int(11) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Dumpning av Data i tabell `bilar`
--


-- --------------------------------------------------------

--
-- Tabellstruktur `blogg`
--

CREATE TABLE `blogg` (
  `ID` int(4) NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Rubrik` varchar(50) NOT NULL,
  `Inlagg` text NOT NULL
) ENGINE=InnoDB;



-- --------------------------------------------------------

--
-- Tabellstruktur `test2`
--

CREATE TABLE `test2` (
  `förnamn` char(20) DEFAULT NULL,
  `efternamn` char(20) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Dumpning av Data i tabell `test2`
--



--
-- Index för dumpade tabeller
--

--
-- Index för tabell `bilar`
--
ALTER TABLE `bilar`
  ADD PRIMARY KEY (`reg`);

--
-- Index för tabell `blogg`
--
ALTER TABLE `blogg`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `blogg`
--
ALTER TABLE `blogg`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Dumpning av Data i tabell `blogg`
--

INSERT INTO `blogg` (`Datum`, `Rubrik`, `Inlagg`) VALUES
('2020-01-13 07:54:43', 'Vad heter du?', 'Vad är ditt tilltalesnamn'),
('2020-01-13 08:24:23', 'test', 'Detta är ett test'),
('2020-01-17 07:45:16', 'Fredag', 'Idag ska vi lägga in en fritextsökning.'),
('2020-01-17 07:46:34', 'fredag', 'Idag ska vi också implementera ett skydd på våran admin sida.');

INSERT INTO `test2` (`förnamn`, `efternamn`) VALUES
('Emil', 'Linder');


INSERT INTO `bilar` (`reg`, `marke`, `modell`, `arsmodell`, `pris`) VALUES
('ABC123', 'saab', '9-5', 2003, 130000),
('FER345', 'toyota', 'Carina II', 1998, 140000),
('GRD764', 'audi', 'A8', 1998, 80000),
('HJE124', 'volkswagen', 'Golf', 1988, 150000),
('IJH123', 'volkswagen', 'Polo', 2003, 60000),
('JTC483', 'bmw', '323', 2001, 90000),
('LKS642', 'ford', 'Mondeo', 2001, 35000),
('LSR304', 'volvo', '740', 1987, 40000),
('QWE134', 'volvo', 'S80', 2002, 75000),
('RGS742', 'volkswagen', '740', 2003, NULL),
('SGS112', 'mazda', '626', 2001, 30000);