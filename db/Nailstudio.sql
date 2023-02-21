-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 21 feb 2023 om 19:31
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Nailstudio`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Afspraak`
--

DROP TABLE IF EXISTS `Afspraak`;
CREATE TABLE IF NOT EXISTS `Afspraak` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `blue` varchar(20) NOT NULL,
  `pink` varchar(20) NOT NULL,
  `purple` varchar(20) NOT NULL,
  `red` varchar(20) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `datum` datetime(6) NOT NULL,
  `nagelbijt` varchar(30) NOT NULL,
  `luxemanicure` varchar(30) NOT NULL,
  `nagelreparatie` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
