-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Maj 2023, 19:08
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `schronisko`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane`
--

CREATE TABLE `dane` (
  `id` int(32) NOT NULL,
  `imie` varchar(32) NOT NULL,
  `nazwisko` varchar(32) NOT NULL,
  `telefon` varchar(32) NOT NULL,
  `email` varchar(12) NOT NULL,
  `dataurodzenia` date DEFAULT NULL,
  `miejscezamieszkania` varchar(32) NOT NULL,
  `dochod` varchar(32) NOT NULL,
  `idzwierzecia` int(11) NOT NULL,
  `opis` varchar(256) NOT NULL,
  `status` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dane`
--

INSERT INTO `dane` (`id`, `imie`, `nazwisko`, `telefon`, `email`, `dataurodzenia`, `miejscezamieszkania`, `dochod`, `idzwierzecia`, `opis`, `status`) VALUES
(25, '', '', '', '', NULL, '', '', 0, 'aweaweaweaweawea', 'odrzucony'),
(26, 'jarek', 'Szerszeń', '666666666', 'pulk7@wp.pl', '2023-05-30', 'adsa', '5000+', 18, 'adawdawdawdawdwa', 'odrzucony'),
(27, 'jarek', 'kotowicz', '666666666', 'aweawewa@wae', '2023-05-23', 'adsa', '1000-5000', 19, 'eaweaweaweaw', 'zatwierdzony');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klatki`
--

CREATE TABLE `klatki` (
  `id` int(11) NOT NULL,
  `rozmiar` varchar(32) NOT NULL,
  `typ` varchar(32) NOT NULL,
  `idzwierzecia` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `klatki`
--

INSERT INTO `klatki` (`id`, `rozmiar`, `typ`, `idzwierzecia`) VALUES
(14, '4', 'pies', 23),
(15, '4', 'pies', 24),
(16, '4', 'pies', 26),
(17, '4', 'pies', NULL),
(18, '2', 'kot', NULL),
(19, '2', 'kot', NULL),
(20, '2', 'kot', NULL),
(21, '2', 'kot', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `type`) VALUES
(3, 'test1', 'test1', 'test1@wp.pl', 'user');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zwierzeta`
--

CREATE TABLE `zwierzeta` (
  `id` int(11) NOT NULL,
  `imie` varchar(32) NOT NULL,
  `wiek` varchar(32) NOT NULL,
  `rasa` varchar(32) NOT NULL,
  `typ` varchar(32) NOT NULL,
  `klatka` int(1) DEFAULT NULL,
  `zdjecie` varchar(256) NOT NULL,
  `opis` varchar(256) NOT NULL,
  `szczepiony` int(2) DEFAULT NULL,
  `utrzymanie` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane`
--
ALTER TABLE `dane`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `klatki`
--
ALTER TABLE `klatki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zwierzeta`
--
ALTER TABLE `zwierzeta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane`
--
ALTER TABLE `dane`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `klatki`
--
ALTER TABLE `klatki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zwierzeta`
--
ALTER TABLE `zwierzeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
