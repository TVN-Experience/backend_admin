-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 apr 2017 om 12:25
-- Serverversie: 10.1.13-MariaDB
-- PHP-versie: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fithappens`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `backend_users`
--

CREATE TABLE `backend_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `backend_users`
--

INSERT INTO `backend_users` (`id`, `username`, `password`) VALUES
(1, 'test', 'fi6bS9A.C7BDQ'),
(2, 'fithappens', 'fiZfMRdkEuoPs');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boot_notifications`
--

CREATE TABLE `boot_notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `boot_notifications`
--

INSERT INTO `boot_notifications` (`id`, `message`) VALUES
(1, ''),
(2, ''),
(3, 'appels'),
(4, 'peren en bananen\r\nappels'),
(5, 'peren en bananen\r\nappels'),
(6, 'bananen appels en andere dergelijke vruchten.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `difficulties`
--

CREATE TABLE `difficulties` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `difficulties`
--

INSERT INTO `difficulties` (`id`, `name`, `description`, `icon`) VALUES
(1, 'Beginner', 'IK ben nog niet zo goed', 'beginner.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `difficultyId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `exercises`
--

INSERT INTO `exercises` (`id`, `difficultyId`, `name`, `description`) VALUES
(1, 1, 'opdrukken', 'druk jezelf 10x op');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `exercises_has_difficulties`
--

CREATE TABLE `exercises_has_difficulties` (
  `exerciseId` int(11) NOT NULL,
  `difficultyId` int(11) NOT NULL,
  `times` int(11) NOT NULL DEFAULT '1',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `exercises_has_poi_types`
--

CREATE TABLE `exercises_has_poi_types` (
  `exerciseId` int(11) NOT NULL,
  `poiTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `exercises_has_poi_types`
--

INSERT INTO `exercises_has_poi_types` (`exerciseId`, `poiTypeId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `exercise_images`
--

CREATE TABLE `exercise_images` (
  `id` int(11) NOT NULL,
  `exerciseId` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `imageOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `exercise_images`
--

INSERT INTO `exercise_images` (`id`, `exerciseId`, `image`, `imageOrder`) VALUES
(1, 1, 'opdrukken-1.png', 1),
(2, 1, 'opdrukken-2.png', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pois`
--

CREATE TABLE `pois` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `routeId` int(11) NOT NULL,
  `poiTypeId` int(11) NOT NULL,
  `lat` decimal(25,15) NOT NULL,
  `lon` decimal(25,15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `pois`
--

INSERT INTO `pois` (`id`, `name`, `routeId`, `poiTypeId`, `lat`, `lon`) VALUES
(8, 'Bankje aan de RDM kade', 1, 2, '51.898442600000000', '4.419958600000000'),
(9, 'Rondopleinbos', 1, 5, '51.894250100000000', '4.421533000000000'),
(10, 'Bankje aan de RDM kade', 9, 2, '51.898442600000000', '4.419958600000000'),
(11, 'Rondopleinbos', 9, 5, '51.894250100000000', '4.421533000000000'),
(12, 'Bankje aan de RDM kade', 10, 2, '51.898442600000000', '4.419958600000000'),
(13, 'Rondopleinbos', 10, 5, '51.894250100000000', '4.421533000000000');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `poi_types`
--

CREATE TABLE `poi_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `poi_types`
--

INSERT INTO `poi_types` (`id`, `name`, `icon`, `color`) VALUES
(1, 'Balk', '', ''),
(2, 'Bank', '', ''),
(3, 'Blok', '', ''),
(4, 'Brug', '', ''),
(5, 'Bomenrij', '', ''),
(6, 'Fietsbeugel', '', ''),
(7, 'Grasveld', '', ''),
(8, 'Hek', '', ''),
(9, 'Hellingbaan', '', ''),
(10, 'Klimrek', '', ''),
(11, 'Lantaarnpalen', '', ''),
(12, 'Muur hoog', '', ''),
(13, 'Muur laag', '', ''),
(14, 'Paaltjes', '', ''),
(15, 'Schommel', '', ''),
(16, 'Stoep', '', ''),
(17, 'Stoeprand', '', ''),
(18, 'Tafel', '', ''),
(19, 'Railing', '', ''),
(20, 'Trap', '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `routes`
--

INSERT INTO `routes` (`id`, `name`, `description`, `color`) VALUES
(3, 'Voorbeeld route 3', 'ikbeneenroute hallo', '#2226dd'),
(9, 'RDM Campus', '', '#50dc27');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `route_images`
--

CREATE TABLE `route_images` (
  `id` int(11) NOT NULL,
  `routeId` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `route_waypoints`
--

CREATE TABLE `route_waypoints` (
  `id` int(11) NOT NULL,
  `routeId` int(11) NOT NULL,
  `lat` decimal(25,15) NOT NULL,
  `lon` decimal(25,15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `route_waypoints`
--

INSERT INTO `route_waypoints` (`id`, `routeId`, `lat`, `lon`) VALUES
(3, 3, '51.000000000000000', '4.000000000000000'),
(86, 8, '51.896913000000000', '4.421289000000000'),
(87, 8, '51.896690000000000', '4.420170000000000'),
(88, 8, '51.896800000000000', '4.420140000000000'),
(89, 8, '51.897600000000000', '4.419970000000000'),
(90, 8, '51.898727000000000', '4.419766000000000'),
(91, 8, '51.898661000000000', '4.418532000000000'),
(92, 8, '51.898813000000000', '4.418489000000000'),
(93, 8, '51.898734000000000', '4.417630000000000'),
(94, 8, '51.898330000000000', '4.417706000000000'),
(95, 8, '51.898224000000000', '4.416193000000000'),
(96, 8, '51.898529000000000', '4.416128000000000'),
(97, 8, '51.897430000000000', '4.416364000000000'),
(98, 8, '51.897575000000000', '4.418178000000000'),
(99, 8, '51.897516000000000', '4.418317000000000'),
(100, 8, '51.896503000000000', '4.418553000000000'),
(101, 8, '51.894722000000000', '4.418982000000000'),
(102, 8, '51.893007000000000', '4.420817000000000'),
(103, 8, '51.891948000000000', '4.421611000000000'),
(104, 8, '51.891007000000000', '4.422491000000000'),
(105, 8, '51.889458000000000', '4.423778000000000'),
(106, 8, '51.889908000000000', '4.424658000000000'),
(107, 8, '51.890703000000000', '4.423998000000000'),
(108, 8, '51.890875000000000', '4.423998000000000'),
(109, 8, '51.891084000000000', '4.424631000000000'),
(110, 8, '51.892193000000000', '4.423676000000000'),
(111, 8, '51.891921000000000', '4.422834000000000'),
(112, 8, '51.893219000000000', '4.421868000000000'),
(113, 8, '51.893292000000000', '4.421793000000000'),
(114, 8, '51.893553000000000', '4.422496000000000'),
(115, 8, '51.894119000000000', '4.422045000000000'),
(116, 8, '51.894046000000000', '4.421745000000000'),
(117, 8, '51.894351000000000', '4.421412000000000'),
(118, 8, '51.894454000000000', '4.421766000000000'),
(119, 8, '51.894834000000000', '4.422941000000000'),
(120, 8, '51.895854000000000', '4.421976000000000'),
(121, 8, '51.896304000000000', '4.422340000000000'),
(122, 8, '51.896529000000000', '4.423006000000000'),
(123, 8, '51.896807000000000', '4.422748000000000'),
(124, 8, '51.897019000000000', '4.423993000000000'),
(125, 8, '51.897350000000000', '4.423842000000000'),
(126, 8, '51.896913000000000', '4.421289000000000'),
(168, 9, '51.896913000000000', '4.421289000000000'),
(169, 9, '51.896690000000000', '4.420170000000000'),
(170, 9, '51.896800000000000', '4.420140000000000'),
(171, 9, '51.897600000000000', '4.419970000000000'),
(172, 9, '51.898727000000000', '4.419766000000000'),
(173, 9, '51.898661000000000', '4.418532000000000'),
(174, 9, '51.898813000000000', '4.418489000000000'),
(175, 9, '51.898734000000000', '4.417630000000000'),
(176, 9, '51.898330000000000', '4.417706000000000'),
(177, 9, '51.898224000000000', '4.416193000000000'),
(178, 9, '51.898529000000000', '4.416128000000000'),
(179, 9, '51.897430000000000', '4.416364000000000'),
(180, 9, '51.897575000000000', '4.418178000000000'),
(181, 9, '51.897516000000000', '4.418317000000000'),
(182, 9, '51.896503000000000', '4.418553000000000'),
(183, 9, '51.894722000000000', '4.418982000000000'),
(184, 9, '51.893007000000000', '4.420817000000000'),
(185, 9, '51.891948000000000', '4.421611000000000'),
(186, 9, '51.891007000000000', '4.422491000000000'),
(187, 9, '51.889458000000000', '4.423778000000000'),
(188, 9, '51.889908000000000', '4.424658000000000'),
(189, 9, '51.890703000000000', '4.423998000000000'),
(190, 9, '51.890875000000000', '4.423998000000000'),
(191, 9, '51.891084000000000', '4.424631000000000'),
(192, 9, '51.892193000000000', '4.423676000000000'),
(193, 9, '51.891921000000000', '4.422834000000000'),
(194, 9, '51.893219000000000', '4.421868000000000'),
(195, 9, '51.893292000000000', '4.421793000000000'),
(196, 9, '51.893553000000000', '4.422496000000000'),
(197, 9, '51.894119000000000', '4.422045000000000'),
(198, 9, '51.894046000000000', '4.421745000000000'),
(199, 9, '51.894351000000000', '4.421412000000000'),
(200, 9, '51.894454000000000', '4.421766000000000'),
(201, 9, '51.894834000000000', '4.422941000000000'),
(202, 9, '51.895854000000000', '4.421976000000000'),
(203, 9, '51.896304000000000', '4.422340000000000'),
(204, 9, '51.896529000000000', '4.423006000000000'),
(205, 9, '51.896807000000000', '4.422748000000000'),
(206, 9, '51.897019000000000', '4.423993000000000'),
(207, 9, '51.897350000000000', '4.423842000000000'),
(208, 9, '51.896913000000000', '4.421289000000000'),
(209, 10, '51.896913000000000', '4.421289000000000'),
(210, 10, '51.896690000000000', '4.420170000000000'),
(211, 10, '51.896800000000000', '4.420140000000000'),
(212, 10, '51.897600000000000', '4.419970000000000'),
(213, 10, '51.898727000000000', '4.419766000000000'),
(214, 10, '51.898661000000000', '4.418532000000000'),
(215, 10, '51.898813000000000', '4.418489000000000'),
(216, 10, '51.898734000000000', '4.417630000000000'),
(217, 10, '51.898330000000000', '4.417706000000000'),
(218, 10, '51.898224000000000', '4.416193000000000'),
(219, 10, '51.898529000000000', '4.416128000000000'),
(220, 10, '51.897430000000000', '4.416364000000000'),
(221, 10, '51.897575000000000', '4.418178000000000'),
(222, 10, '51.897516000000000', '4.418317000000000'),
(223, 10, '51.896503000000000', '4.418553000000000'),
(224, 10, '51.894722000000000', '4.418982000000000'),
(225, 10, '51.893007000000000', '4.420817000000000'),
(226, 10, '51.891948000000000', '4.421611000000000'),
(227, 10, '51.891007000000000', '4.422491000000000'),
(228, 10, '51.889458000000000', '4.423778000000000'),
(229, 10, '51.889908000000000', '4.424658000000000'),
(230, 10, '51.890703000000000', '4.423998000000000'),
(231, 10, '51.890875000000000', '4.423998000000000'),
(232, 10, '51.891084000000000', '4.424631000000000'),
(233, 10, '51.892193000000000', '4.423676000000000'),
(234, 10, '51.891921000000000', '4.422834000000000'),
(235, 10, '51.893219000000000', '4.421868000000000'),
(236, 10, '51.893292000000000', '4.421793000000000'),
(237, 10, '51.893553000000000', '4.422496000000000'),
(238, 10, '51.894119000000000', '4.422045000000000'),
(239, 10, '51.894046000000000', '4.421745000000000'),
(240, 10, '51.894351000000000', '4.421412000000000'),
(241, 10, '51.894454000000000', '4.421766000000000'),
(242, 10, '51.894834000000000', '4.422941000000000'),
(243, 10, '51.895854000000000', '4.421976000000000'),
(244, 10, '51.896304000000000', '4.422340000000000'),
(245, 10, '51.896529000000000', '4.423006000000000'),
(246, 10, '51.896807000000000', '4.422748000000000'),
(247, 10, '51.897019000000000', '4.423993000000000'),
(248, 10, '51.897350000000000', '4.423842000000000'),
(249, 10, '51.896913000000000', '4.421289000000000');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `updates`
--

INSERT INTO `updates` (`id`, `time`) VALUES
(1, '2017-02-28 11:13:32');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `backend_users`
--
ALTER TABLE `backend_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `boot_notifications`
--
ALTER TABLE `boot_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `difficulties`
--
ALTER TABLE `difficulties`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `exercise_images`
--
ALTER TABLE `exercise_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `pois`
--
ALTER TABLE `pois`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `poi_types`
--
ALTER TABLE `poi_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `route_images`
--
ALTER TABLE `route_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `route_waypoints`
--
ALTER TABLE `route_waypoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `backend_users`
--
ALTER TABLE `backend_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `boot_notifications`
--
ALTER TABLE `boot_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `difficulties`
--
ALTER TABLE `difficulties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `exercise_images`
--
ALTER TABLE `exercise_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `pois`
--
ALTER TABLE `pois`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT voor een tabel `poi_types`
--
ALTER TABLE `poi_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT voor een tabel `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `route_images`
--
ALTER TABLE `route_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `route_waypoints`
--
ALTER TABLE `route_waypoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT voor een tabel `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
