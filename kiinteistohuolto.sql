-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26.04.2023 klo 21:02
-- Palvelimen versio: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiinteistohuolto`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `kayttajat`
--

CREATE TABLE `kayttajat` (
  `kayttajaID` int(11) NOT NULL,
  `rooliID` int(11) NOT NULL,
  `nimi` varchar(30) NOT NULL,
  `osoite` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `numero` int(11) NOT NULL,
  `tunnus` varchar(30) NOT NULL,
  `salasana` varchar(200) NOT NULL,
  `tilaID` int(11) NOT NULL,
  `taloyhtioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `kayttajat`
--

INSERT INTO `kayttajat` (`kayttajaID`, `rooliID`, `nimi`, `osoite`, `email`, `numero`, `tunnus`, `salasana`, `tilaID`, `taloyhtioID`) VALUES
(2, 1, 'Testi1', 'testitestintie 1', 'testi@jotain.fi', 0, 'testi1', 'testi1', 1, 2);

-- --------------------------------------------------------

--
-- Rakenne taululle `roolit`
--

CREATE TABLE `roolit` (
  `rooliID` int(11) NOT NULL,
  `roolit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `roolit`
--

INSERT INTO `roolit` (`rooliID`, `roolit`) VALUES
(1, 'tyontekija'),
(2, 'asukas'),
(3, 'asiakas'),
(4, 'isannoitsija');

-- --------------------------------------------------------

--
-- Rakenne taululle `taloyhtio`
--

CREATE TABLE `taloyhtio` (
  `taloyhtioID` int(11) NOT NULL,
  `taloyhtionimi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `taloyhtio`
--

INSERT INTO `taloyhtio` (`taloyhtioID`, `taloyhtionimi`) VALUES
(2, 'Testi123');

-- --------------------------------------------------------

--
-- Rakenne taululle `tila`
--

CREATE TABLE `tila` (
  `tilaID` int(11) NOT NULL,
  `tila` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `tila`
--

INSERT INTO `tila` (`tilaID`, `tila`) VALUES
(1, 'vapaa'),
(2, 'varattu'),
(3, 'muu');

-- --------------------------------------------------------

--
-- Rakenne taululle `tyonvaihe`
--

CREATE TABLE `tyonvaihe` (
  `tyonvaiheID` int(11) NOT NULL,
  `tyonvaihe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `tyonvaihe`
--

INSERT INTO `tyonvaihe` (`tyonvaiheID`, `tyonvaihe`) VALUES
(1, 'uusi'),
(2, 'työn alla'),
(3, 'valmis');

-- --------------------------------------------------------

--
-- Rakenne taululle `tyotehtavat`
--

CREATE TABLE `tyotehtavat` (
  `tyotehtavaID` int(11) NOT NULL,
  `vikailmoitusID` int(11) NOT NULL,
  `vikakuvaus` varchar(100) NOT NULL,
  `osoite` varchar(50) NOT NULL,
  `taloyhtioID` int(11) NOT NULL,
  `tyonvaiheID` int(11) NOT NULL,
  `kayttajaID` int(11) NOT NULL,
  `kiireellisyys` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `tyotehtavat`
--

INSERT INTO `tyotehtavat` (`tyotehtavaID`, `vikailmoitusID`, `vikakuvaus`, `osoite`, `taloyhtioID`, `tyonvaiheID`, `kayttajaID`, `kiireellisyys`) VALUES
(2, 1, 'efsefd', 'dfsdf', 2, 2, 2, 'sdfsdf');

-- --------------------------------------------------------

--
-- Rakenne taululle `vikailmoitus`
--

CREATE TABLE `vikailmoitus` (
  `vikailmoitusID` int(11) NOT NULL,
  `vika` varchar(100) NOT NULL,
  `asiakasID` int(11) NOT NULL,
  `tyonkuvaus` varchar(100) NOT NULL,
  `kiireellisyys` varchar(30) NOT NULL,
  `kommentit` varchar(150) NOT NULL,
  `nimi` varchar(30) NOT NULL,
  `taloyhtioID` int(11) NOT NULL,
  `osoite` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `vikailmoitus`
--

INSERT INTO `vikailmoitus` (`vikailmoitusID`, `vika`, `asiakasID`, `tyonkuvaus`, `kiireellisyys`, `kommentit`, `nimi`, `taloyhtioID`, `osoite`) VALUES
(1, 'testitestitesti', 2, 'testitestitesti', 'Ei paniikkia', 'testitestitesti', 'Testi1', 2, 'testitestintie 1');

-- --------------------------------------------------------

--
-- Rakenne taululle `yhteydenottopyynnot`
--

CREATE TABLE `yhteydenottopyynnot` (
  `nimi` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `asia` varchar(100) NOT NULL,
  `pvm` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `yhteydenottopyynnot`
--

INSERT INTO `yhteydenottopyynnot` (`nimi`, `email`, `asia`, `pvm`) VALUES
('pirjo', 'pirjo@jotain.fi', 'dfsdgsgsfgfgdgfsg', '2023-04-26 19:01:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD PRIMARY KEY (`kayttajaID`),
  ADD KEY `rooliID` (`rooliID`,`tilaID`,`taloyhtioID`),
  ADD KEY `taloyhtioID` (`taloyhtioID`),
  ADD KEY `tilaID` (`tilaID`);

--
-- Indexes for table `roolit`
--
ALTER TABLE `roolit`
  ADD PRIMARY KEY (`rooliID`);

--
-- Indexes for table `taloyhtio`
--
ALTER TABLE `taloyhtio`
  ADD PRIMARY KEY (`taloyhtioID`);

--
-- Indexes for table `tila`
--
ALTER TABLE `tila`
  ADD PRIMARY KEY (`tilaID`);

--
-- Indexes for table `tyonvaihe`
--
ALTER TABLE `tyonvaihe`
  ADD PRIMARY KEY (`tyonvaiheID`);

--
-- Indexes for table `tyotehtavat`
--
ALTER TABLE `tyotehtavat`
  ADD PRIMARY KEY (`tyotehtavaID`),
  ADD KEY `vikailmoitusID` (`vikailmoitusID`,`taloyhtioID`,`tyonvaiheID`,`kayttajaID`),
  ADD KEY `tyonvaiheID` (`tyonvaiheID`),
  ADD KEY `taloyhtioID` (`taloyhtioID`),
  ADD KEY `kayttajaID` (`kayttajaID`);

--
-- Indexes for table `vikailmoitus`
--
ALTER TABLE `vikailmoitus`
  ADD PRIMARY KEY (`vikailmoitusID`),
  ADD KEY `asiakasID` (`asiakasID`,`taloyhtioID`),
  ADD KEY `taloyhtioID` (`taloyhtioID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kayttajat`
--
ALTER TABLE `kayttajat`
  MODIFY `kayttajaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roolit`
--
ALTER TABLE `roolit`
  MODIFY `rooliID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taloyhtio`
--
ALTER TABLE `taloyhtio`
  MODIFY `taloyhtioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tila`
--
ALTER TABLE `tila`
  MODIFY `tilaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tyonvaihe`
--
ALTER TABLE `tyonvaihe`
  MODIFY `tyonvaiheID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tyotehtavat`
--
ALTER TABLE `tyotehtavat`
  MODIFY `tyotehtavaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vikailmoitus`
--
ALTER TABLE `vikailmoitus`
  MODIFY `vikailmoitusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD CONSTRAINT `kayttajat_ibfk_1` FOREIGN KEY (`taloyhtioID`) REFERENCES `taloyhtio` (`taloyhtioID`),
  ADD CONSTRAINT `kayttajat_ibfk_2` FOREIGN KEY (`tilaID`) REFERENCES `tila` (`tilaID`),
  ADD CONSTRAINT `kayttajat_ibfk_3` FOREIGN KEY (`rooliID`) REFERENCES `roolit` (`rooliID`);

--
-- Rajoitteet taululle `tyotehtavat`
--
ALTER TABLE `tyotehtavat`
  ADD CONSTRAINT `tyotehtavat_ibfk_1` FOREIGN KEY (`tyonvaiheID`) REFERENCES `tyonvaihe` (`tyonvaiheID`),
  ADD CONSTRAINT `tyotehtavat_ibfk_2` FOREIGN KEY (`taloyhtioID`) REFERENCES `taloyhtio` (`taloyhtioID`),
  ADD CONSTRAINT `tyotehtavat_ibfk_3` FOREIGN KEY (`kayttajaID`) REFERENCES `kayttajat` (`kayttajaID`),
  ADD CONSTRAINT `tyotehtavat_ibfk_4` FOREIGN KEY (`vikailmoitusID`) REFERENCES `vikailmoitus` (`vikailmoitusID`);

--
-- Rajoitteet taululle `vikailmoitus`
--
ALTER TABLE `vikailmoitus`
  ADD CONSTRAINT `vikailmoitus_ibfk_1` FOREIGN KEY (`asiakasID`) REFERENCES `kayttajat` (`kayttajaID`),
  ADD CONSTRAINT `vikailmoitus_ibfk_2` FOREIGN KEY (`taloyhtioID`) REFERENCES `taloyhtio` (`taloyhtioID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
