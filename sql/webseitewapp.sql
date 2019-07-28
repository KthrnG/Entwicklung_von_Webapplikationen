-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 28. Jul 2019 um 10:33
-- Server-Version: 10.3.16-MariaDB
-- PHP-Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `webseitewapp`
--
CREATE DATABASE IF NOT EXISTS `webseitewapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `webseitewapp`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertung`
--

CREATE TABLE `bewertung` (
                             `user_id` int(11) NOT NULL,
                             `medium_id` int(11) NOT NULL,
                             `wert` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bewertung`
--

INSERT INTO `bewertung` (`user_id`, `medium_id`, `wert`) VALUES
(2, 1, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `datei`
--

CREATE TABLE `datei` (
                         `id` int(11) NOT NULL,
                         `medium_id` int(11) NOT NULL,
                         `type` varchar(30) NOT NULL,
                         `adr` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `datei`
--

INSERT INTO `datei` (`id`, `medium_id`, `type`, `adr`) VALUES
(1, 1, 'img', 'img/basil.jpg'),
(2, 2, 'img', 'img/dill.jpg'),
(3, 3, 'img', 'img/cilantro.jpg'),
(4, 4, 'img', 'img/kresse.jpg'),
(5, 5, 'img', 'img/mint.png'),
(6, 6, 'img', 'img/parsley.jpg'),
(7, 7, 'img', 'img/rosmary.jpg'),
(8, 8, 'img', 'img/sage.jpg'),
(9, 9, 'img', 'img/chive.jpg'),
(10, 10, 'img', 'img/thyme.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `medium`
--

CREATE TABLE `medium` (
                          `id` int(11) NOT NULL,
                          `name` varchar(255) NOT NULL,
                          `latein_name` varchar(255) DEFAULT NULL,
                          `standort` varchar(255) DEFAULT NULL,
                          `aussaat` varchar(255) DEFAULT NULL,
                          `erntezeit` varchar(255) DEFAULT NULL,
                          `beschreibung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `medium`
--

INSERT INTO `medium` (`id`, `name`, `latein_name`, `standort`, `aussaat`, `erntezeit`, `beschreibung`) VALUES
(1, 'Basilikum', 'Ocimum basilicum', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Eine olfaktorische Reise in den mediterranen Raum.\r\nDurch die Hinzugabe von Basilikum wird eine einfache Tomatensauce zu einer feinen delikaten Sauce. Bekannt nicht nur fuer den kulinarischen Gebrauch sondern auch fuer seine heilenden Kraefte, wirkt Basilikum u.a. gegen Halserkrankungen und Erkaeltungen. Ein Tipp: Basilikum darf weder zu viel noch zu wenig gegossen werden. Geben Sie der Erde etwas Ton oder Tongranulat hinzu um sie etwas zu lockern und um dafuer zu sorgen, dass der Basilikum keine Staunaesse bekommt.'),
(2, 'Dill', 'Anethum graveolens', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Dill'),
(3, 'Koriander', 'Coriandrum sativum', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Koriander'),
(4, 'Kresse', 'Lepidium sativum', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Kresse'),
(5, 'Minze', 'Mentha', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Minze'),
(6, 'Petersilie', 'Petroselinum crispum', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Petersilie'),
(7, 'Rosmarin', 'Rosmarinus officinalis', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Rosmarin'),
(8, 'Salbei', 'Salvia', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Salbei'),
(9, 'Schnittlauch', 'Allium schoenoprasmus', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Schnittlauch'),
(10, 'Thymian', 'Thymus', 'sonnig, naehrstoffreiche und durchlaessige Boeden, maessig giessen', 'Fruehling, ab Ende Maerz bis April', 'ab Mai', 'Thymian');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `vorname` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `passwort` varchar(255) NOT NULL,
                         `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `vorname`, `email`, `passwort`, `admin`) VALUES
(1, 'M', 'Max', 'max@muster.de', '123abc', 1),
(2, 'Tester', 'Test', 'test@test.de', 'test', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wunschliste`
--

CREATE TABLE `wunschliste` (
                               `user_id` int(11) NOT NULL,
                               `medium_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `wunschliste`
--

INSERT INTO `wunschliste` (`user_id`, `medium_id`) VALUES
(2, 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bewertung`
--
ALTER TABLE `bewertung`
    ADD PRIMARY KEY (`user_id`,`medium_id`) USING BTREE,
    ADD KEY `user_id` (`user_id`),
    ADD KEY `medium_id` (`medium_id`);

--
-- Indizes für die Tabelle `datei`
--
ALTER TABLE `datei`
    ADD PRIMARY KEY (`id`),
    ADD KEY `medium_id` (`medium_id`);

--
-- Indizes für die Tabelle `medium`
--
ALTER TABLE `medium`
    ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `wunschliste`
--
ALTER TABLE `wunschliste`
    ADD PRIMARY KEY (`user_id`,`medium_id`) USING BTREE,
    ADD KEY `user_id` (`user_id`),
    ADD KEY `medium_id` (`medium_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `datei`
--
ALTER TABLE `datei`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `medium`
--
ALTER TABLE `medium`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bewertung`
--
ALTER TABLE `bewertung`
    ADD CONSTRAINT `bewertung_ibfk_1` FOREIGN KEY (`medium_id`) REFERENCES `medium` (`id`),
    ADD CONSTRAINT `bewertung_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `datei`
--
ALTER TABLE `datei`
    ADD CONSTRAINT `datei_ibfk_1` FOREIGN KEY (`medium_id`) REFERENCES `medium` (`id`);

--
-- Constraints der Tabelle `wunschliste`
--
ALTER TABLE `wunschliste`
    ADD CONSTRAINT `wunschliste_ibfk_1` FOREIGN KEY (`medium_id`) REFERENCES `medium` (`id`),
    ADD CONSTRAINT `wunschliste_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
