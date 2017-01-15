-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 m. Sau 15 d. 21:46
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ioii`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `admin`
--

CREATE TABLE `admin` (
  `Admin_Id` int(11) NOT NULL,
  `Imie` varchar(50) NOT NULL,
  `Login` varchar(12) NOT NULL,
  `Haslo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `admin`
--

INSERT INTO `admin` (`Admin_Id`, `Imie`, `Login`, `Haslo`) VALUES
(1, 'Immmie', 'admin', '123');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `obrona`
--

CREATE TABLE `obrona` (
  `Id_obrony` int(11) NOT NULL,
  `Ocena` float NOT NULL,
  `Data` date NOT NULL,
  `Id_pracy` int(11) NOT NULL,
  `Id_przewodniczacego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `praca_dyplomowa`
--

CREATE TABLE `praca_dyplomowa` (
  `Id_Pracy` int(11) NOT NULL,
  `Temat` text NOT NULL,
  `Opis` text NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Plik_Pracy` varchar(200) DEFAULT NULL,
  `Id_RecenzjaP` int(11) DEFAULT NULL,
  `Id_RecenzjaR` int(11) DEFAULT NULL,
  `Id_Promotora` int(11) DEFAULT NULL,
  `Id_Recenzenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `praca_dyplomowa`
--

INSERT INTO `praca_dyplomowa` (`Id_Pracy`, `Temat`, `Opis`, `Status`, `Plik_Pracy`, `Id_RecenzjaP`, `Id_RecenzjaR`, `Id_Promotora`, `Id_Recenzenta`) VALUES
(6, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL),
(8, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zatwierdzona', NULL, NULL, NULL, 4, NULL),
(9, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Do_Recenzji', 'asdfaq', 5, 4, 2, 4),
(10, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL),
(11, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL),
(12, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zatwierdzona', NULL, NULL, NULL, 2, NULL),
(13, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL),
(14, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL),
(15, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL),
(16, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL),
(17, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL),
(18, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zatwierdzona', NULL, NULL, NULL, 2, NULL),
(19, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Do_recenzji', 'wwww.wwww.wwww', NULL, NULL, 5, NULL),
(20, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL),
(23, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 5, NULL),
(25, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Do_Recenzji', 'aasd', 3, 7, 4, 2),
(26, 'Breakfast agreeable incommode departure it an. By ignorant at on wondered relation. Enough at tastes really so cousin am o', 'Opis opis pois pois opis opis opis opsi opi soposdfpasdkjfop', 'Zarejestrowana', NULL, NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `recenzja`
--

CREATE TABLE `recenzja` (
  `Id_Recenzji` int(11) NOT NULL,
  `Ocena` int(11) NOT NULL,
  `Opis` varchar(300) NOT NULL,
  `Id_Pracy` int(11) NOT NULL,
  `Id_Wykladowcy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `recenzja`
--

INSERT INTO `recenzja` (`Id_Recenzji`, `Ocena`, `Opis`, `Id_Pracy`, `Id_Wykladowcy`) VALUES
(3, 5, 'qerqewqwerqwerqwe', 25, 4),
(4, 5, 'the best', 9, 4),
(5, 5, 'ok', 9, 2),
(7, 3, 'ok', 25, 2);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `student`
--

CREATE TABLE `student` (
  `Nr_Albumu` int(11) NOT NULL,
  `Imie` varchar(50) NOT NULL,
  `Nazwisko` varchar(50) NOT NULL,
  `Login` varchar(12) NOT NULL,
  `Haslo` varchar(20) NOT NULL,
  `Id_Pracy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `student`
--

INSERT INTO `student` (`Nr_Albumu`, `Imie`, `Nazwisko`, `Login`, `Haslo`, `Id_Pracy`) VALUES
(2, 'imie', 'nazw', 's123', 'haslo', 19),
(123, 'sodgn', 'JHSBD', 's3432', 'haslo', 25),
(12344, 'asds', 'asds', 's1111', 's1111', NULL);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `wykladowca`
--

CREATE TABLE `wykladowca` (
  `Id_Wykladowcy` int(11) NOT NULL,
  `Login` varchar(12) NOT NULL,
  `Haslo` varchar(20) NOT NULL,
  `Imie` varchar(50) NOT NULL,
  `Nazwisko` varchar(50) NOT NULL,
  `Tytul_Naukowy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `wykladowca`
--

INSERT INTO `wykladowca` (`Id_Wykladowcy`, `Login`, `Haslo`, `Imie`, `Nazwisko`, `Tytul_Naukowy`) VALUES
(2, 'wykl1', 'pass', 'wykl', 'aa', 'tytul'),
(4, 'wykl2', 'wykl2', 'Anna', 'Zalewska', 'Dr'),
(5, 'w1111', 'pass', 'eliza', 'elizowska', 'Dr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `obrona`
--
ALTER TABLE `obrona`
  ADD PRIMARY KEY (`Id_obrony`);

--
-- Indexes for table `praca_dyplomowa`
--
ALTER TABLE `praca_dyplomowa`
  ADD PRIMARY KEY (`Id_Pracy`);

--
-- Indexes for table `recenzja`
--
ALTER TABLE `recenzja`
  ADD PRIMARY KEY (`Id_Recenzji`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Nr_Albumu`);

--
-- Indexes for table `wykladowca`
--
ALTER TABLE `wykladowca`
  ADD PRIMARY KEY (`Id_Wykladowcy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `obrona`
--
ALTER TABLE `obrona`
  MODIFY `Id_obrony` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `praca_dyplomowa`
--
ALTER TABLE `praca_dyplomowa`
  MODIFY `Id_Pracy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `recenzja`
--
ALTER TABLE `recenzja`
  MODIFY `Id_Recenzji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wykladowca`
--
ALTER TABLE `wykladowca`
  MODIFY `Id_Wykladowcy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
