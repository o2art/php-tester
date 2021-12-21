-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 21 Gru 2021, 12:35
-- Wersja serwera: 10.4.10-MariaDB
-- Wersja PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `tester`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `answerA` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `answerB` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `answerC` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `answerD` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `correct` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `corrects` int(11) NOT NULL,
  `wrongs` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`id`, `question`, `answerA`, `answerB`, `answerC`, `answerD`, `correct`, `corrects`, `wrongs`, `score`) VALUES
(6, 'czy wilczak lubi psy?', 'ta', 'tak', 'nie', 'no', 'A', 89, 5, 95),
(7, 'co co co ', 'a nic', 'jajco', 'xddd', 'polska', 'D', 2, 84, 2),
(8, 'nie?', 'no co', 'kicha', 'a nic xD', 'haha', 'B', 0, 3, 0),
(9, 'nic się nie dzieje?', 'a co', 'a nic', 'hehe', 'xd', 'A', 72, 2, 97),
(10, 'ile baz?', '1', '2', '3', '100000', 'B', 0, 18, 0),
(11, 'ile phpów?', 'abba', 'ac/dc', 'nana', 'dzban', 'C', 1, 17, 6),
(12, 'karol jest?', 'wielki', 'ogromny', 'ogromniasty', 'pudełkowaty', 'D', 1, 17, 6),
(13, 'ilość pytań w bazie?', '1', '2', '3', '11', 'D', 0, 16, 0),
(14, 'ocena z apek?', '5', '5+', '4', '6', 'A', 16, 1, 94),
(15, 'słone?', 'paluszki', 'ryby', 'frytki', 'morze', 'C', 0, 17, 0),
(17, 'haha?', 'nie', 'tak', 'proszę', 'dziękuję', 'B', 0, 5, 0),
(18, 'co?', 'nie', 'nie', 'nie', 'tak', 'C', 0, 2, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `correct`, `wrong`, `score`) VALUES
(13, 'admin', 'admin', 61, 91, 40),
(14, 'szwascik', 'emFxMUBXU1g=', 122, 118, 51),
(18, 'piwusinski', 'emFxMUBXU1g=', 7, 23, 23);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
