-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 15. mar 2024 ob 15.31
-- Različica strežnika: 10.4.32-MariaDB
-- Različica PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `webclock`
--

-- --------------------------------------------------------

--
-- Struktura tabele `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `post_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `post_number`) VALUES
(1, 'Celje', '3000'),
(2, 'Žalec', '3310'),
(3, 'Velenje', '3320'),
(4, 'Griže', '3302'),
(5, 'Ljubljana', '1000'),
(7, 'Maribor', '2000');

-- --------------------------------------------------------

--
-- Struktura tabele `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `admin` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `pass`, `address`, `telephone`, `admin`, `city_id`, `status_id`) VALUES
(1, 'root', 'root', 'root@firma.com', '$2y$10$WjQEKbHJtXFg648Y916.Vuvt7cLZAQQ9TyujMF3FPsFcu4LWYUjha', 'root', '', 1, 1, 1),
(3, 'Tomaž', 'Drobne', 'tomaz@firma.com', '$2y$10$ctBzZsGTHTbKD9o5Y32phO5Uc70T.4BS4wAfTuK6rHpNSwdyB0k0O', 'Studence 36', '070800500', 1, 2, 1),
(4, 'Brigita', 'Drobne', 'brigita@firma.com', '$2y$10$6RNdpvOYFN46/xEPFAHLMO/lyTUzyjHXUQddjp0JhCnoZork1JJyK', 'Trg svobode 30', '040521521', 0, 2, 3),
(5, 'Janez', 'Kranjski', 'janez@firma.com', '$2y$10$bIF6DuV.E4gv3ghzgjaiOexKMfMi.7PjgdAh8ADLnLFH8kCd0q1TG', 'Dolina Miru 6', '041754321', 0, 4, 2),
(7, 'Marina', 'Bičan', 'marina@firma.com', '$2y$10$WWPQM.pCZCSh32sFfp8aL.Up6YgAKqbLCI1TbAqUZiy05Za.khR3W', 'Ulica Maršala Tita 22', '031545454', 0, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `events`
--

INSERT INTO `events` (`id`, `title`) VALUES
(1, 'Prihod na delo'),
(2, 'Odhod iz dela'),
(3, 'Odmor za malico'),
(4, 'Služben izhod'),
(5, 'Služben prihod');

-- --------------------------------------------------------

--
-- Struktura tabele `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `pictures`
--

INSERT INTO `pictures` (`id`, `url`, `employee_id`) VALUES
(1, 'slike/20240221171858000000nerd.jpg', 3),
(2, 'slike/20240221172319000000problem.jpg', 4),
(3, 'slike/20240221172932000000ok.jpg', 5),
(5, 'slike/20240222194529000000smile.jpg', 7);

-- --------------------------------------------------------

--
-- Struktura tabele `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `status`
--

INSERT INTO `status` (`id`, `title`) VALUES
(1, 'Zaposlitev za nedoločen čas'),
(2, 'Zaposlitev za določen čas'),
(3, 'Študent'),
(4, 'Zunanji izvajalec');

-- --------------------------------------------------------

--
-- Struktura tabele `work_time`
--

CREATE TABLE `work_time` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `employee_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `work_time`
--

INSERT INTO `work_time` (`id`, `time`, `employee_id`, `event_id`) VALUES
(2, '2024-02-21 22:17:46', 4, 1),
(3, '2024-02-21 22:18:13', 3, 1),
(4, '2024-02-21 22:29:53', 3, 2),
(5, '2024-02-22 16:58:24', 3, 1),
(6, '2024-02-22 17:01:12', 4, 1),
(7, '2024-02-22 17:12:12', 4, 3),
(8, '2024-02-27 21:06:43', 3, 1),
(9, '2024-02-27 21:13:51', 4, 3),
(10, '2024-02-27 21:24:13', 4, 3),
(11, '2024-03-11 15:59:21', 3, 1);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship11` (`city_id`),
  ADD KEY `IX_Relationship12` (`status_id`);

--
-- Indeksi tabele `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship5` (`employee_id`);

--
-- Indeksi tabele `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `work_time`
--
ALTER TABLE `work_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship13` (`employee_id`),
  ADD KEY `IX_Relationship14` (`event_id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT tabele `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT tabele `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT tabele `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT tabele `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT tabele `work_time`
--
ALTER TABLE `work_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `Relationship1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `Relationship2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Omejitve za tabelo `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `Relationship5` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Omejitve za tabelo `work_time`
--
ALTER TABLE `work_time`
  ADD CONSTRAINT `Relationship3` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `Relationship4` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
