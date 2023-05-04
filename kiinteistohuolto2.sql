-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 05:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `asukkaat`
--

CREATE TABLE `asukkaat` (
  `asukas_id` int(11) NOT NULL,
  `etunimi` varchar(45) DEFAULT NULL,
  `sukunimi` varchar(45) DEFAULT NULL,
  `kayttaja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `asukkaat`
--

INSERT INTO `asukkaat` (`asukas_id`, `etunimi`, `sukunimi`, `kayttaja_id`) VALUES
(5, 'Mira', 'Hosio', 5),
(7, 'Jenny', 'Puranen', 5),
(8, 'Diego', 'Puranen', 8),
(9, 'Rollo', 'Puranen', 9),
(10, 'Antti', 'Salminen', 10);

-- --------------------------------------------------------

--
-- Table structure for table `isannoitsijat`
--

CREATE TABLE `isannoitsijat` (
  `isannoitsija_id` int(11) NOT NULL,
  `etunimi` varchar(45) DEFAULT NULL,
  `sukunimi` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `puhelin` varchar(45) DEFAULT NULL,
  `kayttaja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `isannoitsijat`
--

INSERT INTO `isannoitsijat` (`isannoitsija_id`, `etunimi`, `sukunimi`, `email`, `puhelin`, `kayttaja_id`) VALUES
(4, 'Jouni', 'Meikäläinen', 'jouni.meikalainen@isanta.fi', '0400 456 123', 11),
(5, 'Kari', 'Jaartinen', 'kari.jaartinen@isanta.fi', '050 467 832', 12),
(6, 'Tuula', 'Toimistotäti', 'tuula.toimisto@jotain.fi', '044 456789', 13),
(7, 'Hannu', 'Hosari', 'hannu.hosari@jotain.fi', '045 2381892', 14);

-- --------------------------------------------------------

--
-- Table structure for table `kayttajat`
--

CREATE TABLE `kayttajat` (
  `kayttaja_id` int(11) NOT NULL,
  `tunnus` varchar(50) NOT NULL,
  `salasana` varchar(50) NOT NULL,
  `kayttaja` varchar(20) NOT NULL,
  `rooli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kayttajat`
--

INSERT INTO `kayttajat` (`kayttaja_id`, `tunnus`, `salasana`, `kayttaja`, `rooli_id`) VALUES
(1, 'toimistohenkilo', 'toimistohenkilo', 'toimisto', 1),
(3, 'tyontekija', 'tyontekija', 'Työntekijä', 2),
(4, 'isannoitsija', 'isannoitsija', 'Isännöitsijä', 3),
(5, 'asukas', 'asukas', 'Asukas', 4),
(6, 'jpuranen', 'jpuranen', 'toimisto', 1),
(8, 'dpuranen', 'dpuranen', 'asukas', 4),
(9, 'rpuranen', 'rpuranen', 'asukas', 4),
(10, 'asalminen', 'asalminen', 'asukas', 4),
(11, 'jmeikalainen', 'jmeikalainen', 'isännöitsijä', 3),
(12, 'kjaartinen', 'kjaartinen', 'isännöitsijä', 3),
(13, 'ttoimisto', 'ttoimisto', 'isännöitsijä', 3),
(14, 'hhosari', 'hhosari', 'isännöitsijä', 3),
(15, 'slahti', 'slahti', 'toimisto', 1),
(16, 'vlaine', 'vlaine', 'toimisto', 1),
(17, 'mvirtanen', 'mvirtanen', 'huolto', 2),
(18, 'jnieminen', 'jnieminen', 'huolto', 2),
(19, 'mranta', 'mranta', 'huolto', 2),
(20, 'akivela', 'akivela', 'huolto', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roolit`
--

CREATE TABLE `roolit` (
  `rooli_id` int(11) NOT NULL,
  `rooli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roolit`
--

INSERT INTO `roolit` (`rooli_id`, `rooli`) VALUES
(1, 'toimistohenkilo'),
(2, 'huoltohenkilo'),
(3, 'isannoitsija'),
(4, 'asukas');

-- --------------------------------------------------------

--
-- Table structure for table `taloyhtiot`
--

CREATE TABLE `taloyhtiot` (
  `taloyhtio_id` int(11) NOT NULL,
  `osoite` varchar(50) DEFAULT NULL,
  `kaupunki` varchar(50) DEFAULT NULL,
  `postinumero` int(11) DEFAULT NULL,
  `nimi` varchar(50) NOT NULL,
  `isannoitsija_id` int(11) DEFAULT NULL,
  `kayttaja_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `taloyhtiot`
--

INSERT INTO `taloyhtiot` (`taloyhtio_id`, `osoite`, `kaupunki`, `postinumero`, `nimi`, `isannoitsija_id`, `kayttaja_id`) VALUES
(3, 'Nallekarhuntie 65', 'Helsinki', 1700, 'asunto-osakeyhtiö Karhunpesä', NULL, 1),
(4, 'Lumikontie 58', 'Helsinki', 170, 'Omakotitalo, Hannu', 7, 1),
(5, 'Toimistotie 79 ', 'Helsinki', 170, 'Tuulan Toimistotilat Oy', 6, 1),
(6, 'Yliskyläntie 7', 'Helsinki', 840, 'Yliskyläntie 7 osakeyhtiö', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tehtavan_tilanne`
--

CREATE TABLE `tehtavan_tilanne` (
  `tehtavan_tilanne_id` int(11) NOT NULL,
  `tehtavan_tilanne` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tehtavan_tilanne`
--

INSERT INTO `tehtavan_tilanne` (`tehtavan_tilanne_id`, `tehtavan_tilanne`) VALUES
(1, 'Käsittelemättä'),
(2, 'Avoin'),
(3, 'Työn alla'),
(4, 'Valmis');

-- --------------------------------------------------------

--
-- Table structure for table `tehtavan_tyyppi`
--

CREATE TABLE `tehtavan_tyyppi` (
  `tehtavan_tyyppi_id` int(11) NOT NULL,
  `nimi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tehtavan_tyyppi`
--

INSERT INTO `tehtavan_tyyppi` (`tehtavan_tyyppi_id`, `nimi`) VALUES
(1, 'Vikailmoitus'),
(2, 'Muu tehtävä');

-- --------------------------------------------------------

--
-- Table structure for table `tehtavat`
--

CREATE TABLE `tehtavat` (
  `tehtava_id` int(11) NOT NULL,
  `kayttaja_id` int(11) NOT NULL,
  `kuvaus` longtext DEFAULT NULL,
  `korjaustoimenpide` longtext DEFAULT NULL,
  `tila` varchar(45) DEFAULT NULL,
  `tila_id` int(11) DEFAULT NULL,
  `yleisavaimen_kaytto` varchar(15) NOT NULL DEFAULT '0',
  `numero` varchar(15) NOT NULL,
  `tehtavan_tyyppi_id` int(11) DEFAULT NULL,
  `tyontekija_id` int(11) DEFAULT NULL,
  `tehtavan_tilanne_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tehtavat`
--

INSERT INTO `tehtavat` (`tehtava_id`, `kayttaja_id`, `kuvaus`, `korjaustoimenpide`, `tila`, `tila_id`, `yleisavaimen_kaytto`, `numero`, `tehtavan_tyyppi_id`, `tyontekija_id`, `tehtavan_tilanne_id`) VALUES
(2, 1, 'testitestitesti toimiiko.', 'testitestitesti toimiiko.', NULL, 5, '1', '', 2, NULL, 1),
(3, 9, 'Toimiiko uudet muunnokset??', NULL, NULL, NULL, 'sovi', '+358456339709', NULL, NULL, 1),
(11, 9, 'testing 4366', NULL, NULL, NULL, 'sovi', '0456339709', NULL, NULL, 1),
(12, 9, 'testing 4366', NULL, NULL, NULL, 'sovi', '0456339709', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tilat`
--

CREATE TABLE `tilat` (
  `tila_id` int(11) NOT NULL,
  `nimi` varchar(45) DEFAULT NULL,
  `taloyhtio_id` int(11) NOT NULL,
  `asukas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tilat`
--

INSERT INTO `tilat` (`tila_id`, `nimi`, `taloyhtio_id`, `asukas_id`) VALUES
(5, 'Eteisaula', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tyontekijan_tilanne`
--

CREATE TABLE `tyontekijan_tilanne` (
  `tyontekijan_tilanne_id` int(11) NOT NULL,
  `tyontekijan_tilanne` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tyontekijan_tilanne`
--

INSERT INTO `tyontekijan_tilanne` (`tyontekijan_tilanne_id`, `tyontekijan_tilanne`) VALUES
(1, 'Vapaa'),
(2, 'Varattu');

-- --------------------------------------------------------

--
-- Table structure for table `tyontekijat`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tyontekijat`
--

INSERT INTO `tyontekijat` (`tyontekija_id`, `etunimi`, `sukunimi`, `puhelin`, `email`, `tyontekijatcol`, `kayttaja_id`, `tyontekijan_tilanne_id`) VALUES
(1, 'Mikko', 'Virtanen', '0400 454 969', 'mikko.virtanen@huolto.fi', NULL, 3, 1),
(2, 'Sari ', 'Lahti', '045 344 8999', 'sari.lahti@huolto.fi', NULL, 3, 1),
(3, 'Juho', 'Nieminen', '040 111 7689', 'juho.nieminen@huolto.fi', NULL, 3, 1),
(4, 'Markus', 'Ranta', '0400 245 919', 'markus.ranta@huolto.fi', NULL, 3, 1),
(5, 'Anna', 'Kivelä', '045 633 9791', 'anna.kivelä@huolto.fi', NULL, 3, 1),
(6, 'Ville', 'Laine', '0400 454 969', 'ville.laine@huolto.fi', NULL, 3, 1),
(7, 'Jenny', 'Puranen', '0456339709', 'puranenjenny@gmail.com', '', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `yhteydenottopyynnot`
--

CREATE TABLE `yhteydenottopyynnot` (
  `yhteydenottopyynto_id` int(11) NOT NULL,
  `yp_nimi` varchar(20) NOT NULL,
  `yp_email` varchar(30) NOT NULL,
  `yp_numero` int(20) NOT NULL,
  `yp_viesti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `yhteydenottopyynnot`
--

INSERT INTO `yhteydenottopyynnot` (`yhteydenottopyynto_id`, `yp_nimi`, `yp_email`, `yp_numero`, `yp_viesti`) VALUES
(1, 'Testiyhteidenotto', 'testi.yhteydenotto@jotain.fi', 401234567, 'Testataan miltä tämä yhteydenottopyyntöhässäkkä näyttää ja toimiiko. '),
(2, 'Sonera', 'sonera@sonera@sonera.fi', 400454969, 'Halutaan Töölön toimistolle kiinteistöhuoltoa. Pihat saatanan liukkaita talvisin.'),
(3, 'Karhula', 'karhula@jotain.fi', 400454969, 'Haluttais että tuutte siivoamaan meidän karhunpesän ennen talviunia.'),
(4, 'war', 'tereryey', 345346737, 'waifgiesuihfuhefsuh'),
(5, 'warwohroe', 'tereryeystrtrtr', 2147483647, 'waifgiesuihfuhefsuhwewewee'),
(6, 'warwohroe', 'tereryeystrtrtr', 2147483647, 'waifgiesuihfuhefsuhwewewee'),
(7, 'Maija', 'maija@jotain.fi', 2147483647, 'minulla on liikaa lunta pihalla'),
(8, 'Maija', 'maija@jotain.fi', 2147483647, 'minulla on liikaa lunta pihalla'),
(9, 'Maija', 'maija@jotain.fi', 2147483647, 'minulla on liikaa lunta pihalla'),
(10, 'Maija', 'maija@jotain.fi', 2147483647, 'minulla on liikaa lunta pihalla'),
(11, 'Maija', 'maija@jotain.fi', 2147483647, 'minulla on liikaa lunta pihalla'),
(12, 'Maija', 'maija@jotain.fi', 2147483647, 'minulla on liikaa lunta pihalla'),
(13, 'Maija', 'maija@jotain.fi', 2147483647, 'minulla on liikaa lunta pihalla'),
(14, 'Maija', 'maija@jotain.fi', 2147483647, 'minulla on liikaa lunta pihalla'),
(15, 'Matti', 'Meikalainen', 2147483647, 'Minulla on liian pitkä nurmikko!!'),
(16, 'Matti', 'Meikalainen', 2147483647, 'Minulla on liian pitkä nurmikko!!'),
(17, 'wtwtwt', 'wtwtwwttw', 2147483647, 'frthrhthrthtrh'),
(18, 'bieiybtrwe', 'reareet', 2147483647, 'saasrwarawrra');

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
  ADD PRIMARY KEY (`kayttaja_id`),
  ADD KEY `rooli_id` (`rooli_id`);

--
-- Indexes for table `roolit`
--
ALTER TABLE `roolit`
  ADD PRIMARY KEY (`rooli_id`);

--
-- Indexes for table `taloyhtiot`
--
ALTER TABLE `taloyhtiot`
  ADD PRIMARY KEY (`taloyhtio_id`),
  ADD KEY `isannoitsija_id` (`isannoitsija_id`),
  ADD KEY `kayttaja_id` (`kayttaja_id`);

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
  ADD KEY `tehtavan_tilanne_id` (`tehtavan_tilanne_id`),
  ADD KEY `kayttaja_id` (`kayttaja_id`);

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
  ADD KEY `tyontekijan_tilanne_id` (`tyontekijan_tilanne_id`),
  ADD KEY `kayttaja_id` (`kayttaja_id`);

--
-- Indexes for table `yhteydenottopyynnot`
--
ALTER TABLE `yhteydenottopyynnot`
  ADD PRIMARY KEY (`yhteydenottopyynto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asukkaat`
--
ALTER TABLE `asukkaat`
  MODIFY `asukas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `isannoitsijat`
--
ALTER TABLE `isannoitsijat`
  MODIFY `isannoitsija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kayttajat`
--
ALTER TABLE `kayttajat`
  MODIFY `kayttaja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roolit`
--
ALTER TABLE `roolit`
  MODIFY `rooli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taloyhtiot`
--
ALTER TABLE `taloyhtiot`
  MODIFY `taloyhtio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tehtavan_tilanne`
--
ALTER TABLE `tehtavan_tilanne`
  MODIFY `tehtavan_tilanne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tehtavan_tyyppi`
--
ALTER TABLE `tehtavan_tyyppi`
  MODIFY `tehtavan_tyyppi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tehtavat`
--
ALTER TABLE `tehtavat`
  MODIFY `tehtava_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tilat`
--
ALTER TABLE `tilat`
  MODIFY `tila_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tyontekijan_tilanne`
--
ALTER TABLE `tyontekijan_tilanne`
  MODIFY `tyontekijan_tilanne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  MODIFY `tyontekija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `yhteydenottopyynnot`
--
ALTER TABLE `yhteydenottopyynnot`
  MODIFY `yhteydenottopyynto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asukkaat`
--
ALTER TABLE `asukkaat`
  ADD CONSTRAINT `asukkaat_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`);

--
-- Constraints for table `isannoitsijat`
--
ALTER TABLE `isannoitsijat`
  ADD CONSTRAINT `kayttaja_id` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`);

--
-- Constraints for table `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD CONSTRAINT `kayttajat_ibfk_1` FOREIGN KEY (`rooli_id`) REFERENCES `roolit` (`Rooli_id`);

--
-- Constraints for table `taloyhtiot`
--
ALTER TABLE `taloyhtiot`
  ADD CONSTRAINT `taloyhtiot_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`),
  ADD CONSTRAINT `taloyhtiot_ibfk_2` FOREIGN KEY (`isannoitsija_id`) REFERENCES `isannoitsijat` (`isannoitsija_id`);

--
-- Constraints for table `tehtavat`
--
ALTER TABLE `tehtavat`
  ADD CONSTRAINT `tehtavan_tyyppi_id` FOREIGN KEY (`tehtavan_tyyppi_id`) REFERENCES `tehtavan_tyyppi` (`tehtavan_tyyppi_id`),
  ADD CONSTRAINT `tehtavat_ibfk_1` FOREIGN KEY (`tehtavan_tilanne_id`) REFERENCES `tehtavan_tilanne` (`tehtavan_tilanne_id`),
  ADD CONSTRAINT `tehtavat_ibfk_2` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`),
  ADD CONSTRAINT `tila_id` FOREIGN KEY (`tila_id`) REFERENCES `tilat` (`tila_id`),
  ADD CONSTRAINT `tyontekija_id` FOREIGN KEY (`tyontekija_id`) REFERENCES `tyontekijat` (`tyontekija_id`);

--
-- Constraints for table `tilat`
--
ALTER TABLE `tilat`
  ADD CONSTRAINT `asukas_id` FOREIGN KEY (`asukas_id`) REFERENCES `asukkaat` (`asukas_id`),
  ADD CONSTRAINT `taloyhtio_id` FOREIGN KEY (`taloyhtio_id`) REFERENCES `taloyhtiot` (`taloyhtio_id`);

--
-- Constraints for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD CONSTRAINT `tyontekijan_tilanne_id` FOREIGN KEY (`tyontekijan_tilanne_id`) REFERENCES `tyontekijan_tilanne` (`tyontekijan_tilanne_id`),
  ADD CONSTRAINT `tyontekijat_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
