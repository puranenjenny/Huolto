-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01.05.2023 klo 18:00
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
-- Database: `kiinteistohuolto2`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `asukkaat`
--

CREATE TABLE `asukkaat` (
  `asukas_id` int(11) NOT NULL,
  `etunimi` varchar(45) DEFAULT NULL,
  `sukunimi` varchar(45) DEFAULT NULL,
  `kayttaja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vedos taulusta `asukkaat`
--

INSERT INTO `asukkaat` (`asukas_id`, `etunimi`, `sukunimi`, `kayttaja_id`) VALUES
(5, 'Mira', 'H', 2);

-- --------------------------------------------------------

--
-- Rakenne taululle `isannoitsijat`
--

CREATE TABLE `isannoitsijat` (
  `isannoitsija_id` int(11) NOT NULL,
  `etunimi` varchar(45) DEFAULT NULL,
  `sukunimi` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `puhelin` varchar(45) DEFAULT NULL,
  `kayttaja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vedos taulusta `isannoitsijat`
--

INSERT INTO `isannoitsijat` (`isannoitsija_id`, `etunimi`, `sukunimi`, `email`, `puhelin`, `kayttaja_id`) VALUES
(4, 'Jouni', 'M', '', '', 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `kayttajat`
--

CREATE TABLE `kayttajat` (
  `kayttaja_id` int(11) NOT NULL,
  `tunnus` varchar(50) NOT NULL,
  `salasana` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vedos taulusta `kayttajat`
--

INSERT INTO `kayttajat` (`kayttaja_id`, `tunnus`, `salasana`) VALUES
(1, 'test', 'test'),
(2, 'test1', 'test1');

-- --------------------------------------------------------

--
-- Rakenne taululle `taloyhtiot`
--

CREATE TABLE `taloyhtiot` (
  `taloyhtio_id` int(11) NOT NULL,
  `osoite` varchar(50) DEFAULT NULL,
  `kaupunki` varchar(50) DEFAULT NULL,
  `postinumero` int(11) DEFAULT NULL,
  `nimi` varchar(50) NOT NULL,
  `isannoitsija_id` int(11) DEFAULT NULL,
  `kayttaja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Rakenne taululle `tehtavan_tilanne`
--

CREATE TABLE `tehtavan_tilanne` (
  `tehtavan_tilanne_id` int(11) NOT NULL,
  `tehtavan_tilanne` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vedos taulusta `tehtavan_tilanne`
--

INSERT INTO `tehtavan_tilanne` (`tehtavan_tilanne_id`, `tehtavan_tilanne`) VALUES
(1, 'Avoin'),
(2, 'Työn alla'),
(3, 'Valmis');

-- --------------------------------------------------------

--
-- Rakenne taululle `tehtavan_tyyppi`
--

CREATE TABLE `tehtavan_tyyppi` (
  `tehtavan_tyyppi_id` int(11) NOT NULL,
  `nimi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vedos taulusta `tehtavan_tyyppi`
--

INSERT INTO `tehtavan_tyyppi` (`tehtavan_tyyppi_id`, `nimi`) VALUES
(1, 'Vikailmoitus'),
(2, 'Muu tehtävä');

-- --------------------------------------------------------

--
-- Rakenne taululle `tehtavat`
--

CREATE TABLE `tehtavat` (
  `tehtava_id` int(11) NOT NULL,
  `kuvaus` longtext DEFAULT NULL,
  `korjaustoimenpide` longtext DEFAULT NULL,
  `tila` varchar(45) DEFAULT NULL,
  `tyyppi` varchar(45) DEFAULT NULL,
  `tila_id` int(11) NOT NULL,
  `yleisavaimen_kaytto` tinyint(1) NOT NULL DEFAULT 0,
  `tehtavan_tyyppi_id` int(11) NOT NULL,
  `tyontekija_id` int(11) DEFAULT NULL,
  `tehtavan_tilanne_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Rakenne taululle `tilat`
--

CREATE TABLE `tilat` (
  `tila_id` int(11) NOT NULL,
  `nimi` varchar(45) DEFAULT NULL,
  `taloyhtio_id` int(11) NOT NULL,
  `asukas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Rakenne taululle `tyontekijan_tilanne`
--

CREATE TABLE `tyontekijan_tilanne` (
  `tyontekijan_tilanne_id` int(11) NOT NULL,
  `tyontekijan_tilanne` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vedos taulusta `tyontekijan_tilanne`
--

INSERT INTO `tyontekijan_tilanne` (`tyontekijan_tilanne_id`, `tyontekijan_tilanne`) VALUES
(1, 'Vapaa'),
(2, 'Varattu');

-- --------------------------------------------------------

--
-- Rakenne taululle `tyontekijat`
--

CREATE TABLE `tyontekijat` (
  `tyontekija_id` int(11) NOT NULL,
  `etunimi` varchar(45) DEFAULT NULL,
  `sukunimi` varchar(45) DEFAULT NULL,
  `puhelin` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tyontekijatcol` varchar(45) DEFAULT NULL,
  `kayttaja_id` int(11) NOT NULL,
  `tyontekijan_tilanne_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asukkaat`
--
ALTER TABLE `asukkaat`
  ADD PRIMARY KEY (`asukas_id`),
  ADD KEY `kayttaja_id` (`kayttaja_id`);

--
-- Indexes for table `isannoitsijat`
--
ALTER TABLE `isannoitsijat`
  ADD PRIMARY KEY (`isannoitsija_id`),
  ADD KEY `kayttaja_id` (`kayttaja_id`);

--
-- Indexes for table `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD PRIMARY KEY (`kayttaja_id`);

--
-- Indexes for table `taloyhtiot`
--
ALTER TABLE `taloyhtiot`
  ADD PRIMARY KEY (`taloyhtio_id`),
  ADD KEY `isannoitsija_id` (`isannoitsija_id`);

--
-- Indexes for table `tehtavan_tilanne`
--
ALTER TABLE `tehtavan_tilanne`
  ADD PRIMARY KEY (`tehtavan_tilanne_id`);

--
-- Indexes for table `tehtavan_tyyppi`
--
ALTER TABLE `tehtavan_tyyppi`
  ADD PRIMARY KEY (`tehtavan_tyyppi_id`);

--
-- Indexes for table `tehtavat`
--
ALTER TABLE `tehtavat`
  ADD PRIMARY KEY (`tehtava_id`),
  ADD KEY `tila_id` (`tila_id`),
  ADD KEY `tehtavan_tyyppi_id` (`tehtavan_tyyppi_id`),
  ADD KEY `tyontekija_id` (`tyontekija_id`),
  ADD KEY `tehtavan_tilanne_id` (`tehtavan_tilanne_id`);

--
-- Indexes for table `tilat`
--
ALTER TABLE `tilat`
  ADD PRIMARY KEY (`tila_id`),
  ADD KEY `taloyhtio_id` (`taloyhtio_id`),
  ADD KEY `asukas_id` (`asukas_id`);

--
-- Indexes for table `tyontekijan_tilanne`
--
ALTER TABLE `tyontekijan_tilanne`
  ADD PRIMARY KEY (`tyontekijan_tilanne_id`);

--
-- Indexes for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD PRIMARY KEY (`tyontekija_id`),
  ADD KEY `tyontekijan_tilanne_id` (`tyontekijan_tilanne_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asukkaat`
--
ALTER TABLE `asukkaat`
  MODIFY `asukas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `isannoitsijat`
--
ALTER TABLE `isannoitsijat`
  MODIFY `isannoitsija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kayttajat`
--
ALTER TABLE `kayttajat`
  MODIFY `kayttaja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taloyhtiot`
--
ALTER TABLE `taloyhtiot`
  MODIFY `taloyhtio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tehtavan_tilanne`
--
ALTER TABLE `tehtavan_tilanne`
  MODIFY `tehtavan_tilanne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tehtavan_tyyppi`
--
ALTER TABLE `tehtavan_tyyppi`
  MODIFY `tehtavan_tyyppi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tehtavat`
--
ALTER TABLE `tehtavat`
  MODIFY `tehtava_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tilat`
--
ALTER TABLE `tilat`
  MODIFY `tila_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tyontekijan_tilanne`
--
ALTER TABLE `tyontekijan_tilanne`
  MODIFY `tyontekijan_tilanne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  MODIFY `tyontekija_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `isannoitsijat`
--
ALTER TABLE `isannoitsijat`
  ADD CONSTRAINT `kayttaja_id` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`);

--
-- Rajoitteet taululle `tehtavat`
--
ALTER TABLE `tehtavat`
  ADD CONSTRAINT `tehtavan_tyyppi_id` FOREIGN KEY (`tehtavan_tyyppi_id`) REFERENCES `tehtavan_tyyppi` (`tehtavan_tyyppi_id`),
  ADD CONSTRAINT `tehtavat_ibfk_1` FOREIGN KEY (`tehtavan_tilanne_id`) REFERENCES `tehtavan_tilanne` (`tehtavan_tilanne_id`),
  ADD CONSTRAINT `tila_id` FOREIGN KEY (`tila_id`) REFERENCES `tilat` (`tila_id`),
  ADD CONSTRAINT `tyontekija_id` FOREIGN KEY (`tyontekija_id`) REFERENCES `tyontekijat` (`tyontekija_id`);

--
-- Rajoitteet taululle `tilat`
--
ALTER TABLE `tilat`
  ADD CONSTRAINT `asukas_id` FOREIGN KEY (`asukas_id`) REFERENCES `asukkaat` (`asukas_id`),
  ADD CONSTRAINT `taloyhtio_id` FOREIGN KEY (`taloyhtio_id`) REFERENCES `taloyhtiot` (`taloyhtio_id`);

--
-- Rajoitteet taululle `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD CONSTRAINT `tyontekijan_tilanne_id` FOREIGN KEY (`tyontekijan_tilanne_id`) REFERENCES `tyontekijan_tilanne` (`tyontekijan_tilanne_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
