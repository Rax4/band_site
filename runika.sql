-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 17 Maj 2017, 15:43
-- Wersja serwera: 5.7.18-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `runika`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Albums`
--

CREATE TABLE `Albums` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `author` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `thumbnail` text CHARACTER SET utf8 COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Albums`
--

INSERT INTO `Albums` (`id`, `name`, `author`, `date`, `thumbnail`) VALUES
(1, 'FOLK METAL NIGHT WROCŁAW', 'Niuna', '2017-05-07', NULL),
(2, 'Dadsa', 'DASDJASKDJASKDJA', '2017-05-07', 'img/gallery/671f52c557de2ac64b49d304c54d55e91494358061.png'),
(3, 'FOLK METAL NIGHT POZNAŃ', 'Morderca', '2017-05-01', 'img/gallery/12d2936a1540add531a2297c309c35541494363236.jpg'),
(4, 'Impreza u wiecha', 'Wiechu', '2017-05-05', NULL),
(5, 'Niewiadov fest', 'Rychu', '2017-05-22', NULL),
(6, 'Abu-dabi', 'Abdullah', '2016-07-04', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Concerts`
--

CREATE TABLE `Concerts` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Concerts`
--

INSERT INTO `Concerts` (`id`, `title`, `date`, `text`) VALUES
(1, 'FOLK METAL NIGHT - WROCŁAW', '2017-07-26', 'Bilety: 20/30zł. Otwarcie bram: 19.30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Downloads`
--

CREATE TABLE `Downloads` (
  `id` int(11) NOT NULL,
  `src` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Downloads`
--

INSERT INTO `Downloads` (`id`, `src`, `name`, `description`) VALUES
(1, 'downloads/bg.jpg', 'Obraz Tła', 'Obraz tła naszej strony');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Lyrics`
--

CREATE TABLE `Lyrics` (
  `id` int(11) NOT NULL,
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `words` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `music` varchar(30) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Lyrics`
--

INSERT INTO `Lyrics` (`id`, `title`, `text`, `words`, `music`) VALUES
(1, 'Ogień i Woda', 'W ostatnią sobotę mieliśmy zaszczyt wystąpić na wyjątkowym wydarzeniu: Ostatni Blackstok - XX lecie zespołu In Extremis. Było wspaniale i na pewno ten koncert zostanie w naszej pamięci na długo. Dziękujemy nie tylko zespołowi In Extremis, ale również wszystkim pozostałym zespołom za świetną atmosferę, oraz publiczności za gorące przyjęcie. ', 'Aminae', 'Rax');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Photos`
--

CREATE TABLE `Photos` (
  `id` int(11) NOT NULL,
  `src` varchar(100) NOT NULL,
  `albumId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Photos`
--

INSERT INTO `Photos` (`id`, `src`, `albumId`) VALUES
(3, 'img/gallery/671f52c557de2ac64b49d304c54d55e91494336756.png', 1),
(4, 'img/gallery/4dd5ceead4faeca1b67860f16bc1d3231494355379.jpeg', 1),
(5, 'img/gallery/1f6c250b2fadb91141ff9dc51745192b1494355379.jpg', 1),
(6, 'img/gallery/678eee23f5ce253d5e043b439df010a51494355379.jpg', 1),
(7, 'img/gallery/55cae3e6989990f7c4e31d309e0ab6ff1494355379.jpg', 1),
(15, 'img/gallery/671f52c557de2ac64b49d304c54d55e91494356153.png', 2),
(16, 'img/gallery/bf03fcfc9d10e57b3db197909107cf281494356153.png', 2),
(17, 'img/gallery/671f52c557de2ac64b49d304c54d55e91494357222.png', 2),
(18, 'img/gallery/d2aaca5718c2726792fddc0a3c41c3141494357334.jpeg', 2),
(19, 'img/gallery/671f52c557de2ac64b49d304c54d55e91494357948.png', 2),
(20, 'img/gallery/671f52c557de2ac64b49d304c54d55e91494357968.png', 2),
(21, 'img/gallery/671f52c557de2ac64b49d304c54d55e91494358012.png', 2),
(22, 'img/gallery/671f52c557de2ac64b49d304c54d55e91494358061.png', 2),
(23, 'img/gallery/12d2936a1540add531a2297c309c35541494363236.jpg', 3),
(24, 'img/gallery/a8e68d2d5df1b62a3b483f3a209a253b1494363236.jpg', 3),
(25, 'img/gallery/a06549d2396d9ec33b0f841a347fa5dd1494363236.jpg', 3),
(26, 'img/gallery/07388e44ccd56309aaf86a57d9ff44071494363236.jpg', 3),
(27, 'img/gallery/1d045f5a70566106e0c8dda98261df681494363236.jpg', 3),
(28, 'img/gallery/9528a380bda168114c1275177d3f42d11494363236.jpg', 3),
(29, 'img/gallery/f065570e2d4f1b87db73080bf624eba11494363236.jpg', 3),
(30, 'img/gallery/d6189ca9746bd68a96b1fae5a4f533271494363236.jpg', 3),
(31, 'img/gallery/738cab1f00c4a116ec66ed88bc9007ce1494363236.jpg', 3),
(32, 'img/gallery/a9a37efb7d3eb1a61c8bb5933547bbb21494363236.jpg', 3),
(33, 'img/gallery/3da892b6d603ea654b18c217ded8fc181494363236.jpg', 3),
(34, 'img/gallery/a3447201d20099ac83724b7e8c72c0451494363236.jpg', 3),
(35, 'img/gallery/ae8f2f72f1dec04fe0df75d0b9bf769d1494363236.jpg', 3),
(36, 'img/gallery/95524ec6b3bffb472938b3288a5b1e501494363236.jpg', 3),
(37, 'img/gallery/f197fe14307156c488e332d0497a58b51494363236.jpg', 3),
(38, 'img/gallery/2f5495232ff2126e6b2821c808ee6d5a1494363236.jpg', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Posts`
--

CREATE TABLE `Posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Posts`
--

INSERT INTO `Posts` (`id`, `title`, `date`, `text`) VALUES
(1, 'Test post title', '2017-05-08 00:00:00', '<a href=\"#\">Link test</a>'),
(2, 'PREMIERA! TEST TEST TEST!', '2017-05-08 10:02:56', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec laoreet diam. Etiam eget mollis nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec arcu aliquam, pellentesque erat vel, porttitor felis. Nunc pellentesque consequat nulla tristique mattis. In ut tempor nisi. Morbi consequat mi vitae scelerisque imperdiet. In dignissim tempus condimentum. Duis semper libero quis blandit molestie. Aenean a molestie mauris. In sodales mauris augue, vitae posuere augue scelerisque sed. ');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Albums`
--
ALTER TABLE `Albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Concerts`
--
ALTER TABLE `Concerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Downloads`
--
ALTER TABLE `Downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Lyrics`
--
ALTER TABLE `Lyrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Photos`
--
ALTER TABLE `Photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albumId` (`albumId`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Albums`
--
ALTER TABLE `Albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `Concerts`
--
ALTER TABLE `Concerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `Downloads`
--
ALTER TABLE `Downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `Lyrics`
--
ALTER TABLE `Lyrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `Photos`
--
ALTER TABLE `Photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT dla tabeli `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Photos`
--
ALTER TABLE `Photos`
  ADD CONSTRAINT `Photos_ibfk_1` FOREIGN KEY (`albumId`) REFERENCES `Albums` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
