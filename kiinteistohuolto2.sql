-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09.05.2023 klo 17:18
-- Palvelimen versio: 10.4.27-MariaDB
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
-- Rakenne taululle `asukkaat`
--

CREATE TABLE `asukkaat` (
  `asukas_id` int(11) NOT NULL,
  `etunimi` varchar(45) DEFAULT NULL,
  `sukunimi` varchar(45) DEFAULT NULL,
  `kayttaja_id` int(11) NOT NULL,
  `taloyhtio_id` int(11) DEFAULT NULL,
  `rappu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vedos taulusta `asukkaat`
--

INSERT INTO `asukkaat` (`asukas_id`, `etunimi`, `sukunimi`, `kayttaja_id`, `taloyhtio_id`, `rappu`) VALUES
(5, 'Mira', 'Hosio', 5, 4, 'C 4'),
(7, 'Jenny', 'Puranen', 5, 3, 'D 30'),
(8, 'Diego', 'Puranen', 8, 5, 'A 12'),
(9, 'Rollo', 'Puranen', 9, 5, 'A 12'),
(10, 'Antti', 'Salminen', 10, 4, 'B 3'),
(11, 'Antti', 'Kortelainen', 21, 6, NULL),
(13, 'Maija', 'Mehilainen', 26, 20, NULL),
(14, 'Kerttu', 'Mehilainen', 27, 7, NULL),
(19, 'Tuuli', 'Tähtinen', 1, 20, 'B 30'),
(20, 'Jenna', 'Makkara', 31, 13, 'C 1'),
(24, 'Tuuli', 'Tähtinen', 36, 5, 'A 40');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vedos taulusta `isannoitsijat`
--

INSERT INTO `isannoitsijat` (`isannoitsija_id`, `etunimi`, `sukunimi`, `email`, `puhelin`, `kayttaja_id`) VALUES
(4, 'Jouni', 'Meikäläinen', 'jouni.meikalainen@isanta.fi', '0400 456 123', 11),
(5, 'Kari', 'Jaartinen', 'kari.jaartinen@isanta.fi', '050 467 832', 12),
(6, 'Tuula', 'Toimistotäti', 'tuula.toimisto@jotain.fi', '044 456789', 13),
(7, 'Hannu', 'Hosari', 'hannu.hosari@jotain.fi', '045 2381892', 14),
(8, 'Antti', 'Kortelainen', 'antti@jotain.fi', '0401234566', 22),
(9, 'Ei isännöitsijää', NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Rakenne taululle `kayttajat`
--

CREATE TABLE `kayttajat` (
  `kayttaja_id` int(11) NOT NULL,
  `tunnus` varchar(50) NOT NULL,
  `salasana` varchar(50) NOT NULL,
  `kayttaja` varchar(20) NOT NULL,
  `rooli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vedos taulusta `kayttajat`
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
(20, 'akivela', 'akivela', 'huolto', 2),
(21, 'aka', 'aka', 'asukas', 4),
(22, 'aki', 'aki', 'isännöitsijä', 3),
(23, 'akt', 'akt', 'työntekijä', 1),
(24, 'akh', 'akh', 'huolto', 2),
(26, 'mmehilainen', 'mmehilainen', 'Asiakas', 4),
(27, 'mmehilainen', 'mmehilainen', 'Asiakas', 4),
(30, 'mmehilainen', 'mmehilainen', 'Asiakas', 4),
(31, 'jenna', 'jenna', 'Asiakas', 4),
(32, 'kerttu', 'kerttu', 'Asiakas', 4),
(33, 'kerttu', 'kerttu', 'Asiakas', 4),
(36, 'ttahtinen', 'ttahtinen', 'Asukas', 4);

-- --------------------------------------------------------

--
-- Rakenne taululle `roolit`
--

CREATE TABLE `roolit` (
  `rooli_id` int(11) NOT NULL,
  `rooli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Vedos taulusta `roolit`
--

INSERT INTO `roolit` (`rooli_id`, `rooli`) VALUES
(1, 'toimistohenkilo'),
(2, 'huoltohenkilo'),
(3, 'isannoitsija'),
(4, 'asukas');

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
  `kayttaja_id` int(11) DEFAULT NULL,
  `tila_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vedos taulusta `taloyhtiot`
--

INSERT INTO `taloyhtiot` (`taloyhtio_id`, `osoite`, `kaupunki`, `postinumero`, `nimi`, `isannoitsija_id`, `kayttaja_id`, `tila_id`) VALUES
(3, 'Nallekarhuntie 65', 'Helsinki', 1700, 'Asunto-osakeyhtiö Karhunpesä', 8, 1, ''),
(4, 'Lumikontie 58', 'Helsinki', 170, 'Omakotitalo, Hannu', 7, 1, ''),
(5, 'Toimistotie 79 ', 'Helsinki', 170, 'Tuulan Toimistotilat Oy', 6, 1, ''),
(6, 'Yliskyläntie 7', 'Helsinki', 840, 'Yliskyläntie 7 osakeyhtiö', 8, 1, ''),
(7, 'Pesäkuja', 'Helsinki', 1000, 'Pesäkuja Osuuskunta', NULL, 26, ''),
(13, 'Kujapolku', 'Helsinki', 840, 'Omakotitalo Kujapolku', NULL, 31, ''),
(19, 'Kuurilanpolku 9', 'Kuusamo', 9000, 'Kuurilan Osuuskunta', 5, NULL, ''),
(20, 'Kuurilanpolku 5', 'Kuusamo', 9000, 'Kuurilan veljen Osuuskunta', 4, NULL, ''),
(21, 'Ei taloyhtiötä', NULL, NULL, 'Ei taloyhtiötä', NULL, 23, '');

-- --------------------------------------------------------

--
-- Rakenne taululle `tehtavan_tilanne`
--

CREATE TABLE `tehtavan_tilanne` (
  `tehtavan_tilanne_id` int(11) NOT NULL,
  `tehtavan_tilanne` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vedos taulusta `tehtavan_tilanne`
--

INSERT INTO `tehtavan_tilanne` (`tehtavan_tilanne_id`, `tehtavan_tilanne`) VALUES
(1, 'Käsittelemättä'),
(2, 'Avoin'),
(3, 'Työn alla'),
(4, 'Valmis');

-- --------------------------------------------------------

--
-- Rakenne taululle `tehtavan_tyyppi`
--

CREATE TABLE `tehtavan_tyyppi` (
  `tehtavan_tyyppi_id` int(11) NOT NULL,
  `nimi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `kayttaja_id` int(11) NOT NULL,
  `kuvaus` varchar(200) DEFAULT NULL,
  `korjaustoimenpide` longtext DEFAULT NULL,
  `tila` varchar(45) DEFAULT NULL,
  `taloyhtio_id` int(11) DEFAULT NULL,
  `tila_id` int(11) DEFAULT 14,
  `yleisavaimen_kaytto` varchar(15) NOT NULL DEFAULT 'Ei tietoa',
  `numero` varchar(15) NOT NULL DEFAULT '000-000000',
  `tehtavan_tyyppi_id` int(11) DEFAULT NULL,
  `tyontekija_id` int(11) DEFAULT 11,
  `tehtavan_tilanne_id` int(11) NOT NULL DEFAULT 1,
  `jatetty` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vedos taulusta `tehtavat`
--

INSERT INTO `tehtavat` (`tehtava_id`, `kayttaja_id`, `kuvaus`, `korjaustoimenpide`, `tila`, `taloyhtio_id`, `tila_id`, `yleisavaimen_kaytto`, `numero`, `tehtavan_tyyppi_id`, `tyontekija_id`, `tehtavan_tilanne_id`, `jatetty`) VALUES
(3, 9, 'Toimiiko uudet muunnokset??', NULL, NULL, 4, 14, 'sovi', '+358456339709', NULL, 11, 1, '2023-05-08 14:34:10'),
(11, 9, 'testing 4366', NULL, NULL, 20, 8, 'sovi', '0456339709', NULL, 11, 1, '2023-05-08 14:34:10'),
(13, 9, 'sefujesf', NULL, NULL, 20, 14, 'ei', '387347843', NULL, 11, 1, '2023-05-08 14:34:10'),
(14, 9, 'maijalla oli karitsa', NULL, NULL, 19, 14, 'kyllä', '35353543', NULL, 11, 1, '2023-05-08 14:34:10'),
(19, 22, 'lamppu palanut', NULL, NULL, 6, 13, 'ei', '3243432443', NULL, 11, 3, '2023-05-08 14:34:10'),
(20, 22, 'Ikkunan tiivisteet vuotaa', NULL, NULL, 3, 9, 'sovi', '3333', NULL, 6, 1, '2023-05-08 14:34:10'),
(21, 9, 'pistorasia ei toimi', NULL, NULL, 6, 11, 'kyllä', '+34585438', NULL, 7, 2, '2023-05-08 14:34:10'),
(25, 22, 'moikkeli', NULL, NULL, 3, 9, 'ei', '4656464', NULL, 11, 1, '2023-05-08 14:49:12'),
(26, 10, 'Pattereita ei saa säädettyä lämpimämmälle.', NULL, NULL, 4, 14, 'ei', '+358456339709', NULL, 4, 2, '2023-05-09 12:26:59'),
(27, 21, 'Asunnossa on liian kuuma', NULL, NULL, 6, 14, 'sovi', '0400454969', NULL, 11, 1, '2023-05-09 12:28:03'),
(28, 22, 'Hiekkaa on rapun edessä vielä vaikka kuinka paljon vaikka lakaisuauto kävi jo!', NULL, NULL, 3, 6, 'ei', '000-0000000', NULL, 11, 1, '2023-05-09 12:30:23'),
(30, 22, 'Punttisali haisee, voitteko desinfioida kunnolla', NULL, NULL, 6, 13, 'kyllä', '0401234566', NULL, 11, 1, '2023-05-09 12:41:43'),
(31, 22, 'Nurmikko pitäisi ajaa', NULL, NULL, 3, 10, 'kyllä', '0401234566', NULL, 11, 1, '2023-05-09 12:53:29');

-- --------------------------------------------------------

--
-- Rakenne taululle `tilat`
--

CREATE TABLE `tilat` (
  `tila_id` int(11) NOT NULL,
  `nimi` varchar(45) DEFAULT NULL,
  `taloyhtio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vedos taulusta `tilat`
--

INSERT INTO `tilat` (`tila_id`, `nimi`, `taloyhtio_id`) VALUES
(5, 'Eteisaula', 5),
(6, 'Rappu A', 3),
(7, 'Rappu B', 3),
(8, 'Rappu C', 3),
(9, 'Pesutupa', 3),
(10, 'Kellari', 3),
(11, 'Pyöräkellari', 6),
(12, 'Hissi', 6),
(13, 'Punttisali', 6),
(14, 'Ei valittu', 21);

-- --------------------------------------------------------

--
-- Rakenne taululle `tyontekijan_tilanne`
--

CREATE TABLE `tyontekijan_tilanne` (
  `tyontekijan_tilanne_id` int(11) NOT NULL,
  `tyontekijan_tilanne` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vedos taulusta `tyontekijat`
--

INSERT INTO `tyontekijat` (`tyontekija_id`, `etunimi`, `sukunimi`, `puhelin`, `email`, `tyontekijatcol`, `kayttaja_id`, `tyontekijan_tilanne_id`) VALUES
(1, 'Mikko', 'Virtanen', '0400 454 969', 'mikko.virtanen@huolto.fi', NULL, 17, 1),
(2, 'Sari ', 'Lahti', '045 344 8999', 'sari.lahti@huolto.fi', NULL, 15, 1),
(3, 'Juho', 'Nieminen', '040 111 7689', 'juho.nieminen@huolto.fi', NULL, 18, 1),
(4, 'Markus', 'Ranta', '0400 245 919', 'markus.ranta@huolto.fi', NULL, 19, 1),
(5, 'Anna', 'Kivelä', '045 633 9791', 'anna.kivelä@huolto.fi', NULL, 20, 1),
(6, 'Ville', 'Laine', '0400 454 969', 'ville.laine@huolto.fi', NULL, 16, 1),
(7, 'Jenny', 'Puranen', '0456339709', 'puranenjenny@gmail.com', '', 6, 2),
(9, 'Antti', 'Kortelainen', '0401234566', 'antti@jotain.fi', NULL, 24, 1),
(10, 'Antti', 'Kortelainen', '0401234566', 'antti@jotain.fi', NULL, 23, 1),
(11, 'ei valittu', 'ei valittu', 'ei valittu', 'ei valittu', 'ei valittu', 23, 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `yhteydenottopyynnot`
--

CREATE TABLE `yhteydenottopyynnot` (
  `yhteydenottopyynto_id` int(11) NOT NULL,
  `yp_nimi` varchar(20) NOT NULL,
  `yp_email` varchar(30) NOT NULL,
  `yp_numero` int(20) NOT NULL,
  `yp_viesti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Vedos taulusta `yhteydenottopyynnot`
--

INSERT INTO `yhteydenottopyynnot` (`yhteydenottopyynto_id`, `yp_nimi`, `yp_email`, `yp_numero`, `yp_viesti`) VALUES
(1, 'Testiyhteidenotto', 'testi.yhteydenotto@jotain.fi', 401234567, 'Testataan miltä tämä yhteydenottopyyntöhässäkkä näyttää ja toimiiko. '),
(2, 'Sonera', 'sonera@sonera@sonera.fi', 400454969, 'Halutaan Töölön toimistolle kiinteistöhuoltoa. Pihat saatanan liukkaita talvisin.'),
(3, 'Karhula', 'karhula@jotain.fi', 400454969, 'Haluttais että tuutte siivoamaan meidän karhunpesän ennen talviunia.'),
(4, 'war', 'tereryey', 345346737, 'waifgiesuihfuhefsuh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asukkaat`
--
ALTER TABLE `asukkaat`
  ADD PRIMARY KEY (`asukas_id`),
  ADD KEY `kayttaja_id` (`kayttaja_id`),
  ADD KEY `taloyhtio_id` (`taloyhtio_id`);

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
  ADD KEY `kayttaja_id` (`kayttaja_id`),
  ADD KEY `tila_id` (`tila_id`);

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
  ADD KEY `kayttaja_id` (`kayttaja_id`),
  ADD KEY `taloyhtio_id` (`taloyhtio_id`);

--
-- Indexes for table `tilat`
--
ALTER TABLE `tilat`
  ADD PRIMARY KEY (`tila_id`),
  ADD KEY `taloyhtio_id` (`taloyhtio_id`);

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
  MODIFY `asukas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `isannoitsijat`
--
ALTER TABLE `isannoitsijat`
  MODIFY `isannoitsija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kayttajat`
--
ALTER TABLE `kayttajat`
  MODIFY `kayttaja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `roolit`
--
ALTER TABLE `roolit`
  MODIFY `rooli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taloyhtiot`
--
ALTER TABLE `taloyhtiot`
  MODIFY `taloyhtio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `tehtava_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tilat`
--
ALTER TABLE `tilat`
  MODIFY `tila_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tyontekijan_tilanne`
--
ALTER TABLE `tyontekijan_tilanne`
  MODIFY `tyontekijan_tilanne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  MODIFY `tyontekija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `yhteydenottopyynnot`
--
ALTER TABLE `yhteydenottopyynnot`
  MODIFY `yhteydenottopyynto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `asukkaat`
--
ALTER TABLE `asukkaat`
  ADD CONSTRAINT `asukkaat_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`),
  ADD CONSTRAINT `asukkaat_ibfk_2` FOREIGN KEY (`taloyhtio_id`) REFERENCES `taloyhtiot` (`taloyhtio_id`);

--
-- Rajoitteet taululle `isannoitsijat`
--
ALTER TABLE `isannoitsijat`
  ADD CONSTRAINT `kayttaja_id` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`);

--
-- Rajoitteet taululle `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD CONSTRAINT `kayttajat_ibfk_1` FOREIGN KEY (`rooli_id`) REFERENCES `roolit` (`rooli_id`);

--
-- Rajoitteet taululle `taloyhtiot`
--
ALTER TABLE `taloyhtiot`
  ADD CONSTRAINT `taloyhtiot_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`),
  ADD CONSTRAINT `taloyhtiot_ibfk_2` FOREIGN KEY (`isannoitsija_id`) REFERENCES `isannoitsijat` (`isannoitsija_id`);

--
-- Rajoitteet taululle `tehtavat`
--
ALTER TABLE `tehtavat`
  ADD CONSTRAINT `tehtavan_tyyppi_id` FOREIGN KEY (`tehtavan_tyyppi_id`) REFERENCES `tehtavan_tyyppi` (`tehtavan_tyyppi_id`),
  ADD CONSTRAINT `tehtavat_ibfk_1` FOREIGN KEY (`tehtavan_tilanne_id`) REFERENCES `tehtavan_tilanne` (`tehtavan_tilanne_id`),
  ADD CONSTRAINT `tehtavat_ibfk_2` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`),
  ADD CONSTRAINT `tehtavat_ibfk_3` FOREIGN KEY (`taloyhtio_id`) REFERENCES `taloyhtiot` (`taloyhtio_id`),
  ADD CONSTRAINT `tila_id` FOREIGN KEY (`tila_id`) REFERENCES `tilat` (`tila_id`),
  ADD CONSTRAINT `tyontekija_id` FOREIGN KEY (`tyontekija_id`) REFERENCES `tyontekijat` (`tyontekija_id`);

--
-- Rajoitteet taululle `tilat`
--
ALTER TABLE `tilat`
  ADD CONSTRAINT `taloyhtio_id` FOREIGN KEY (`taloyhtio_id`) REFERENCES `taloyhtiot` (`taloyhtio_id`);

--
-- Rajoitteet taululle `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD CONSTRAINT `tyontekijan_tilanne_id` FOREIGN KEY (`tyontekijan_tilanne_id`) REFERENCES `tyontekijan_tilanne` (`tyontekijan_tilanne_id`),
  ADD CONSTRAINT `tyontekijat_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
