-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 05. Jun 2019 um 08:32
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
  `season` int(11) DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  `descrm` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `medium`
--

INSERT INTO `medium` (`mname`, `season`, `place`, `descrm`) VALUES
('Basilikum', 2, 2, 'Das ist Basilikum');

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
-- Tabellenstruktur für Tabelle `season`
--

CREATE TABLE `season` (
  `ids` int(11) NOT NULL,
  `descrS` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `season`
--

INSERT INTO `season` (`ids`, `descrS`) VALUES
(1, 'Frühling'),
(2, 'Sommer'),
(3, 'Herbst'),
(4, 'Winter'),
(5, 'Ganzjährig');

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
('MaxM', 'max@muster.de', '123abc', 1);

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
  ADD PRIMARY KEY (`mname`),
  ADD KEY `season` (`season`),
  ADD KEY `place` (`place`);

--
-- Indizes für die Tabelle `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`idp`);

--
-- Indizes für die Tabelle `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`ids`);

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
-- Constraints der Tabelle `medium`
--
ALTER TABLE `medium`
  ADD CONSTRAINT `medium_ibfk_1` FOREIGN KEY (`season`) REFERENCES `season` (`ids`),
  ADD CONSTRAINT `medium_ibfk_2` FOREIGN KEY (`place`) REFERENCES `place` (`idp`);

--
-- Constraints der Tabelle `wunschliste`
--
ALTER TABLE `wunschliste`
  ADD CONSTRAINT `wunschliste_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`),
  ADD CONSTRAINT `wunschliste_ibfk_2` FOREIGN KEY (`mname`) REFERENCES `medium` (`mname`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
