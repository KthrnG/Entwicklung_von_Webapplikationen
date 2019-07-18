-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 18. Jul 2019 um 11:20
-- Server-Version: 5.7.25
-- PHP-Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webseitewapp`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertung`
--

CREATE TABLE `bewertung` (
  `uname` varchar(20) COLLATE utf8_bin NOT NULL,
  `mname` varchar(30) COLLATE utf8_bin NOT NULL,
  `wert` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `bewertung`
--

INSERT INTO `bewertung` (`uname`, `mname`, `wert`) VALUES
('MaxM', 'Basilikum', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datei`
--

CREATE TABLE `datei` (
  `dname` varchar(30) COLLATE utf8_bin NOT NULL,
  `mname` varchar(30) COLLATE utf8_bin NOT NULL,
  `type` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `adr` varchar(400) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `datei`
--

INSERT INTO `datei` (`dname`, `mname`, `type`, `adr`) VALUES
('ImgBasil', 'Basilikum', 'img', 'https://www.lebensbaum.com/files/styles/greige_image_476x476/public/images/greiges/basilikum1.jpg?itok=SLCzXT8r');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `medium`
--

CREATE TABLE `medium` (
  `mname` varchar(30) COLLATE utf8_bin NOT NULL,
  `descrm` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `link` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `medium`
--

INSERT INTO `medium` (`mname`, `descrm`, `link`) VALUES
('Basilikum', 'Das ist Basilikum', 'basilikum.html'),
('Dill', 'Das ist Dill', 'dill.html'),
('Koriander', 'Das ist Koriander', 'koriander.html'),
('Kresse', 'Das ist Kresse', 'kresse.html'),
('Minze', 'Das ist Minze', 'minze.html'),
('Petersilie', 'Das ist Petersilie', 'petersilie.html'),
('Rosmarin', 'Das ist Rosmarin', 'rosmarin.html'),
('Salbei', 'Das ist Salbei', 'salbei.html'),
('Schnittlauch', 'Das ist Schnittlauch', 'schnittlauch.html'),
('Thymian', 'Das ist Thymian', 'thymian.html');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `months`
--

CREATE TABLE `months` (
  `idm` int(11) NOT NULL,
  `month` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `months`
--

INSERT INTO `months` (`idm`, `month`) VALUES
(1, 'Januar'),
(2, 'Februar'),
(3, 'März'),
(4, 'April'),
(5, 'Mai'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'August'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Dezember'),
(13, 'ganzjährig');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `place`
--

CREATE TABLE `place` (
  `idp` int(11) NOT NULL,
  `descrp` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `place`
--

INSERT INTO `place` (`idp`, `descrp`) VALUES
(1, 'Sonne'),
(2, 'Halbschatten'),
(3, 'Schatten'),
(4, 'egal');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `placetime`
--

CREATE TABLE `placetime` (
  `mname` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `placetime`
--

INSERT INTO `placetime` (`mname`, `place`, `month`) VALUES
('Basilikum', 1, 3),
('Basilikum', 1, 4),
('Dill', 1, 4),
('Dill', NULL, 5),
('Koriander', 1, 3),
('Koriander', 2, 4),
('Koriander', NULL, 5),
('Koriander', NULL, 6),
('Kresse', 4, 13),
('Minze', 2, 3),
('Minze', NULL, 4),
('Petersilie', 1, 10),
('Petersilie', 2, 11),
('Petersilie', NULL, 12),
('Petersilie', NULL, 1),
('Petersilie', NULL, 2),
('Petersilie', NULL, 3),
('Petersilie', NULL, 4),
('Petersilie', NULL, 5),
('Rosmarin', 1, 3),
('Rosmarin', NULL, 4),
('Salbei', 1, 2),
('Salbei', NULL, 3),
('Salbei', NULL, 4),
('Salbei', NULL, 5),
('Schnittlauch', 1, 2),
('Schnittlauch', 2, 3),
('Thymian', 1, 4),
('Thymian', NULL, 5),
('Thymian', NULL, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `uname` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `passwort` varchar(20) COLLATE utf8_bin NOT NULL,
  `userrights` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uname`, `email`, `passwort`, `userrights`) VALUES
('ILoveWAPP', 'wapp@test.de', 'wappwapp', NULL),
('MaxM', 'max@muster.de', '123abc', 1),
('Tester', 'test@test.de', 'test', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wunschliste`
--

CREATE TABLE `wunschliste` (
  `uname` varchar(20) COLLATE utf8_bin NOT NULL,
  `mname` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `wunschliste`
--

INSERT INTO `wunschliste` (`uname`, `mname`) VALUES
('MaxM', 'Basilikum');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD PRIMARY KEY (`uname`,`mname`),
  ADD KEY `mname` (`mname`);

--
-- Indizes für die Tabelle `datei`
--
ALTER TABLE `datei`
  ADD PRIMARY KEY (`dname`),
  ADD UNIQUE KEY `adr` (`adr`),
  ADD KEY `mname` (`mname`);

--
-- Indizes für die Tabelle `medium`
--
ALTER TABLE `medium`
  ADD PRIMARY KEY (`mname`);

--
-- Indizes für die Tabelle `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`idm`);

--
-- Indizes für die Tabelle `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`idp`);

--
-- Indizes für die Tabelle `placetime`
--
ALTER TABLE `placetime`
  ADD KEY `mname` (`mname`),
  ADD KEY `place` (`place`),
  ADD KEY `month` (`month`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `wunschliste`
--
ALTER TABLE `wunschliste`
  ADD PRIMARY KEY (`uname`,`mname`),
  ADD KEY `mname` (`mname`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bewertung`
--
ALTER TABLE `bewertung`
  ADD CONSTRAINT `bewertung_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`),
  ADD CONSTRAINT `bewertung_ibfk_2` FOREIGN KEY (`mname`) REFERENCES `medium` (`mname`);

--
-- Constraints der Tabelle `datei`
--
ALTER TABLE `datei`
  ADD CONSTRAINT `datei_ibfk_1` FOREIGN KEY (`mname`) REFERENCES `medium` (`mname`);

--
-- Constraints der Tabelle `placetime`
--
ALTER TABLE `placetime`
  ADD CONSTRAINT `placetime_ibfk_1` FOREIGN KEY (`mname`) REFERENCES `medium` (`mname`),
  ADD CONSTRAINT `placetime_ibfk_2` FOREIGN KEY (`place`) REFERENCES `place` (`idp`),
  ADD CONSTRAINT `placetime_ibfk_3` FOREIGN KEY (`month`) REFERENCES `months` (`idm`);

--
-- Constraints der Tabelle `wunschliste`
--
ALTER TABLE `wunschliste`
  ADD CONSTRAINT `wunschliste_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`),
  ADD CONSTRAINT `wunschliste_ibfk_2` FOREIGN KEY (`mname`) REFERENCES `medium` (`mname`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
