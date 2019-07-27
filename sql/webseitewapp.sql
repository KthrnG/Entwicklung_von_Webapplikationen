-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 21. Jul 2019 um 13:51
-- Server-Version: 5.7.25
-- PHP-Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webseitewapp`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertung`
--

CREATE TABLE `bewertung`
(
    `uname` varchar(20) COLLATE utf8_bin NOT NULL,
    `mname` varchar(30) COLLATE utf8_bin NOT NULL,
    `wert`  int(11) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `bewertung`
--

INSERT INTO `bewertung` (`uname`, `mname`, `wert`)
VALUES ('MaxM', 'Basilikum', 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datei`
--

CREATE TABLE `datei`
(
    `dname` varchar(30) COLLATE utf8_bin  NOT NULL,
    `mname` varchar(30) COLLATE utf8_bin  NOT NULL,
    `type`  varchar(30) COLLATE utf8_bin DEFAULT NULL,
    `adr`   varchar(400) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `datei`
--

INSERT INTO `datei` (`dname`, `mname`, `type`, `adr`)
VALUES ('ChiveImg', 'Schnittlauch', 'img', 'img/chive.jpg'),
       ('CilantroImg', 'Koriander', 'img', 'img/cilantro.jpg'),
       ('DillImg', 'Dill', 'img', 'img/dill.jpg'),
       ('ImgBasil', 'Basilikum', 'img', 'img/basil.jpg'),
       ('KresseImg', 'Kresse', 'img', 'img/kresse.jpg'),
       ('MintImg', 'Minze', 'img', 'img/mint.png'),
       ('ParsleyImg', 'Petersilie', 'img', 'img/parsley.jpg'),
       ('RosmaryImg', 'Rosmarin', 'img', 'img/rosmary.jpg'),
       ('SageImg', 'Salbei', 'img', 'img/sage.jpg'),
       ('ThymeImg', 'Thymian', 'img', 'img/thyme.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `medium`
--

CREATE TABLE `medium`
(
    `mname`  varchar(30) COLLATE utf8_bin NOT NULL,
    `descrm` varchar(100) COLLATE utf8_bin DEFAULT NULL,
    `link`   varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `medium`
--

INSERT INTO `medium` (`mname`, `descrm`, `link`)
VALUES ('Basilikum', 'Das ist Basilikum', 'basilikum.html'),
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

CREATE TABLE `months`
(
    `idm`   int(11) NOT NULL,
    `month` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `months`
--

INSERT INTO `months` (`idm`, `month`)
VALUES (0, ' '),
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
-- Tabellenstruktur für Tabelle `months2`
--

CREATE TABLE `months2`
(
    `idm`    int(11) NOT NULL,
    `month2` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `months2`
--

INSERT INTO `months2` (`idm`, `month2`)
VALUES (0, ' '),
       (1, '- Januar'),
       (2, '- Februar'),
       (3, '- März'),
       (4, '- April'),
       (5, '- Mai'),
       (6, '- Juni'),
       (7, '- Juli'),
       (8, '- August'),
       (9, '- September'),
       (10, '- Oktober'),
       (11, '- November'),
       (12, '- Dezember'),
       (13, 'ganzjährig');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `place`
--

CREATE TABLE `place`
(
    `idp`    int(11) NOT NULL,
    `descrp` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `place`
--

INSERT INTO `place` (`idp`, `descrp`)
VALUES (0, ''),
       (1, 'Sonne'),
       (2, 'Halbschatten'),
       (3, 'Schatten'),
       (4, 'egal');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `place2`
--

CREATE TABLE `place2`
(
    `idp`     int(11) NOT NULL,
    `descrp2` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `place2`
--

INSERT INTO `place2` (`idp`, `descrp2`)
VALUES (0, ' '),
       (1, '/ Sonne'),
       (2, '/ Halbschatten'),
       (3, '/ Schatten'),
       (4, '/ egal');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `placetimes`
--

CREATE TABLE `placetimes`
(
    `mname`  varchar(30) COLLATE utf8_bin NOT NULL,
    `place`  int(11) DEFAULT NULL,
    `place2` int(11) DEFAULT NULL,
    `month`  int(11) DEFAULT NULL,
    `month2` int(11) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `placetimes`
--

INSERT INTO `placetimes` (`mname`, `place`, `place2`, `month`, `month2`)
VALUES ('Basilikum', 1, 0, 3, 4),
       ('Dill', 1, 0, 4, 5),
       ('Koriander', 1, 2, 3, 6),
       ('Kresse', 4, 0, 13, 0),
       ('Minze', 2, 0, 3, 4),
       ('Petersilie', 1, 2, 10, 5),
       ('Rosmarin', 1, 0, 3, 4),
       ('Salbei', 1, 0, 2, 5),
       ('Schnittlauch', 1, 2, 2, 3),
       ('Thymian', 1, 0, 4, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users`
(
    `uname`      varchar(20) COLLATE utf8_bin NOT NULL,
    `email`      varchar(40) COLLATE utf8_bin NOT NULL,
    `passwort`   varchar(20) COLLATE utf8_bin NOT NULL,
    `userrights` int(11) DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`uname`, `email`, `passwort`, `userrights`)
VALUES ('ILoveWAPP', 'wapp@test.de', 'wappwapp', NULL),
       ('MaxM', 'max@muster.de', '123abc', 1),
       ('Tester', 'test@test.de', 'test', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wunschliste`
--

CREATE TABLE `wunschliste`
(
    `uname` varchar(20) COLLATE utf8_bin NOT NULL,
    `mname` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_bin;

--
-- Daten für Tabelle `wunschliste`
--

INSERT INTO `wunschliste` (`uname`, `mname`)
VALUES ('MaxM', 'Basilikum');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bewertung`
--
ALTER TABLE `bewertung`
    ADD PRIMARY KEY (`uname`, `mname`),
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
-- Indizes für die Tabelle `months2`
--
ALTER TABLE `months2`
    ADD PRIMARY KEY (`idm`);

--
-- Indizes für die Tabelle `place`
--
ALTER TABLE `place`
    ADD PRIMARY KEY (`idp`);

--
-- Indizes für die Tabelle `place2`
--
ALTER TABLE `place2`
    ADD PRIMARY KEY (`idp`);

--
-- Indizes für die Tabelle `placetimes`
--
ALTER TABLE `placetimes`
    ADD KEY `place` (`place`),
    ADD KEY `place2` (`place2`),
    ADD KEY `month` (`month`),
    ADD KEY `month2` (`month2`);

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
    ADD PRIMARY KEY (`uname`, `mname`),
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
-- Constraints der Tabelle `placetimes`
--
ALTER TABLE `placetimes`
    ADD CONSTRAINT `placetimes_ibfk_1` FOREIGN KEY (`place`) REFERENCES `place` (`idp`),
    ADD CONSTRAINT `placetimes_ibfk_2` FOREIGN KEY (`place2`) REFERENCES `place2` (`idp`),
    ADD CONSTRAINT `placetimes_ibfk_3` FOREIGN KEY (`month`) REFERENCES `months` (`idm`),
    ADD CONSTRAINT `placetimes_ibfk_4` FOREIGN KEY (`month2`) REFERENCES `months2` (`idm`);

--
-- Constraints der Tabelle `wunschliste`
--
ALTER TABLE `wunschliste`
    ADD CONSTRAINT `wunschliste_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`),
    ADD CONSTRAINT `wunschliste_ibfk_2` FOREIGN KEY (`mname`) REFERENCES `medium` (`mname`);

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
