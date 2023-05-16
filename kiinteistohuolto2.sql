-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 11:01 AM
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
  `kayttaja_id` int(11) NOT NULL,
  `taloyhtio_id` int(11) DEFAULT NULL,
  `rappu` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `asukkaat`
--

INSERT INTO `asukkaat` (`asukas_id`, `etunimi`, `sukunimi`, `kayttaja_id`, `taloyhtio_id`, `rappu`) VALUES
(30, 'Marco', 'Kolehmainen', 50, 6, 'B 8'),
(31, 'Pirjo', 'Mattila', 53, 6, 'B 1'),
(32, 'Kari ', 'Tapola', 54, 3, 'A 2'),
(33, 'Pinja', 'Siurua', 55, 3, 'A 3'),
(34, 'Kati', 'Kolari', 56, 3, 'A 5'),
(35, 'Tarmo', 'Markkanen', 57, 6, 'B 4'),
(36, 'Martti', 'Tuppurainen', 58, 6, 'B 2'),
(37, 'Paul', 'Kurkela', 59, 22, 'B 4'),
(38, 'Katja', 'Koskela', 60, 22, 'A 7'),
(39, 'Osmo', 'Luokkala', 61, 22, 'A 4'),
(40, 'Marja-Liisa', 'Sipola', 62, 22, 'B 1'),
(41, 'Alisa', 'Suomalainen', 43, 3, 'A 8'),
(49, 'Kalevi', 'Karhu', 87, 13, '');

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
(10, 'Iiro ', 'Sällinen', 'isallinen@jotain.fi', '0408513555', 44),
(12, 'Ei isännöitsijää', NULL, NULL, NULL, 52),
(13, 'Yrjö', 'Kuha', 'ykuha@isannointi.fi', '0506827181', 63),
(14, 'Tuukka', 'Mäkelä', 'tmakela@isännöinti.fi', '030495810', 64),
(15, 'Katariina', 'Suvakas', 'ksuvakas@isannoitsija.fi', '0405182379', 65);

-- --------------------------------------------------------

--
-- Table structure for table `kayttajat`
--

CREATE TABLE `kayttajat` (
  `kayttaja_id` int(11) NOT NULL,
  `tunnus` varchar(50) NOT NULL,
  `salasana` varchar(255) NOT NULL,
  `kayttaja` varchar(20) NOT NULL,
  `rooli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kayttajat`
--

INSERT INTO `kayttajat` (`kayttaja_id`, `tunnus`, `salasana`, `kayttaja`, `rooli_id`) VALUES
(43, 'asu', '$2y$10$kll1JnECkzOVNpq1CLy5eOmplJCRMO4sHAMW9Kwr3DzmQOJQ6Amo2', 'Asukas', 4),
(44, 'isa', '$2y$10$5NdiCWeM8gKQGY49JdjW..kLncWaEk/y8Cvy0ifL2hgoBv3qfWy42', 'Isännöitsijä', 3),
(50, 'mkole', '$2y$10$6UriUlRGalm7HadxGfnw3OGu2f9M9tw6Bw7evy0s5SdEmPGUwiypy', 'Asukas', 4),
(52, 'eiisannoitsijaa', '$2y$10$zdPNP/v5WQSwhHTIBRrY8OxvKeb4J2J9Wcia9K/x95sXvFqIYz1J.', 'Isännöitsijä', 3),
(53, 'pmattila', '$2y$10$Eg915QJsj36MIx4xb.Ncf.V3ZzQUEuQsrKCL27vieqt.P7uZ64z5S', 'Asukas', 4),
(54, 'ktapola', '$2y$10$ZeGQ0DcmWm9dg4meJIwK2eyEMmHqQOTHglTaYL5UMDyu5CqDvd6Ny', 'Asukas', 4),
(55, 'psiurua', '$2y$10$9f2rYI8NfjZktzf31dADxO8PBEfVT3Q.wGsycs6IFaCmotIAvS6EK', 'Asukas', 4),
(56, 'kkolari', '$2y$10$gxVQmybxnxnn9rAanTtpBeGrelBJsMnSnD8JNWKHn.ibROJLcTaWW', 'Asukas', 4),
(57, 'tmarkkanen', '$2y$10$vAunxecBAhcHVVvE.cbfRu7u8h9aDSdCq.MRi.1MO5trpiWspuRjG', 'Asukas', 4),
(58, 'mtuppurainen', '$2y$10$Du6BfOxOn1HbcsVPWI2u7OQb88yoPB0saUr0IeBawasHd7a/bTRsK', 'Asukas', 4),
(59, 'pkurkela', '$2y$10$1hNzqmKkKg.YI3tX520JVOFTH6jHHSv3qdDxyFIm639pgOhWRVD8C', 'Asukas', 4),
(60, 'kkoskela', '$2y$10$G4V19NZTVkLoiBJVn9wzOOW56xTmfH9cswuiDOFA0A2Jw1buGwsvG', 'Asukas', 4),
(61, 'oluokkala', '$2y$10$/GHlYBAd0DNQOGNdo.dnJeb7ScuP/rsdCRJ6mAwA0J1AuFaSGC51.', 'Asukas', 4),
(62, 'msipola', '$2y$10$p6czsw23iVjL74W9I0lG6urnlU/sYFbqxqoygMV2cUSTWuOyGMSDy', 'Asukas', 4),
(63, 'ykuha', '$2y$10$kXrqqXiqvHx3yiKqrJyMJu5vZPu8ju7tA0lkmZRvsgoMy8FIpoyfy', 'Isännöitsijä', 3),
(64, 'tmakela', '$2y$10$8hoL00uBcNbXGztZ7h18Ouv0JjN5G9HeamSE6bOK4lbmcJlzDtzq.', 'Isännöitsijä', 3),
(65, 'ksuvakas', '$2y$10$hqi.BhkZ9g1SLct0T0bnUOfh44A4cRCfII29d2zyt8hiOtHrMn2l2', 'Isännöitsijä', 3),
(68, 'jnieminen', '$2y$10$9Xr7Zt9humbILkSSQU7Zv.tzamZGfjFVc7uEyBbEwfxM.lj47mlo6', 'Työntekijä', 2),
(69, 'mranta', '$2y$10$1HrORWU48KIRshJ/DP0i7epG1x4yCRL85gtRnlD7CrKwVhYmzFomG', 'Työntekijä', 2),
(70, 'akivela', '$2y$10$n0OLyGebcY6J2AqjxYrU.ehB1FrNkl1hgGBc6oWGT5PSKNZ7hBD0O', 'Työntekijä', 2),
(72, 'vlaine', '$2y$10$v8uvcRlyk2ux7L.1muxfc.TS0IhQBCeL2G0cG4LUg.2Divg4SgpLa', 'Työntekijä', 1),
(82, 'slahti', '$2y$10$KAlmok1RGTMzUgXtO44ECO2t/2gK8xcSwkxjn45nw4qpA0n1FUtKu', 'Työntekijä', 1),
(83, 'huo', '$2y$10$AakeZou0F1u7I2qcZQnKM.Ss26ShZWNf5zI.6iJQnZqcvg51TFTLq', 'Työntekijä', 2),
(84, 'toi', '$2y$10$eEtNnyc9ze.9jTryUIZIHeYagxmI0ntMvauPxTw/MbjAJjIu/e9JO', 'Työntekijä', 1),
(86, 'mvirtanen', '$2y$10$wEv.Htk26PAyC9ZKd.i2Ee05mVEXUMXqtDrqY9sznVE9Ql/DnBqNy', 'Työntekijä', 2),
(87, 'kkarhu', '$2y$10$nTuwrKvbEDeDf0On14tFBOroOa5wvS/WnGL5Is7BwRmn6/e6X1TWe', 'Asukas', 4);

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
  `postinumero` varchar(11) DEFAULT NULL,
  `nimi` varchar(50) NOT NULL,
  `isannoitsija_id` int(11) DEFAULT NULL,
  `kayttaja_id` int(11) DEFAULT NULL,
  `tila_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `taloyhtiot`
--

INSERT INTO `taloyhtiot` (`taloyhtio_id`, `osoite`, `kaupunki`, `postinumero`, `nimi`, `isannoitsija_id`, `kayttaja_id`, `tila_id`) VALUES
(3, 'Nallekarhuntie 65', 'Helsinki', '00170', 'Asunto-osakeyhtiö Karhunpesä', 10, NULL, ''),
(4, 'Lumikontie 58', 'Helsinki', '00170', 'Omakotitalo, Hannu', 12, NULL, ''),
(5, 'Toimistotie 79 ', 'Helsinki', '00170', 'Tuulan Toimistotilat Oy', 10, NULL, ''),
(6, 'Yliskyläntie 7', 'Helsinki', '00840', 'Yliskyläntie 7 osakeyhtiö', 13, NULL, ''),
(13, 'Kujapolku', 'Helsinki', '00830', 'Omakotitalo Kujapolku', 12, NULL, ''),
(19, 'Kuurilanpolku 9', 'Helsinki', '00250', 'Kuurilan Osuuskunta', 15, NULL, ''),
(20, 'Kuurilanpolku 5', 'Helsinki', '00250', 'Kuurilan veljen Osuuskunta', 15, NULL, ''),
(21, 'Ei taloyhtiötä', NULL, NULL, 'Ei taloyhtiötä', 12, NULL, ''),
(22, 'Marjapuuntie 8', 'Helsinki', '00370', 'Taloyhtiö Marjapuu', 14, NULL, '');

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
  `kayttaja_id` int(11) DEFAULT NULL,
  `kuvaus` varchar(200) DEFAULT NULL,
  `korjaustoimenpide` longtext DEFAULT NULL,
  `tila` varchar(45) DEFAULT NULL,
  `taloyhtio_id` int(11) DEFAULT NULL,
  `tila_id` int(11) DEFAULT 14,
  `yleisavaimen_kaytto` varchar(15) NOT NULL DEFAULT 'Ei tietoa',
  `numero` varchar(15) NOT NULL DEFAULT '000-000000',
  `tehtavan_tyyppi_id` int(11) DEFAULT NULL,
  `tyontekija_id` int(11) DEFAULT NULL,
  `tehtavan_tilanne_id` int(11) NOT NULL DEFAULT 1,
  `jatetty` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tehtavat`
--

INSERT INTO `tehtavat` (`tehtava_id`, `kayttaja_id`, `kuvaus`, `korjaustoimenpide`, `tila`, `taloyhtio_id`, `tila_id`, `yleisavaimen_kaytto`, `numero`, `tehtavan_tyyppi_id`, `tyontekija_id`, `tehtavan_tilanne_id`, `jatetty`) VALUES
(20, NULL, 'Ikkunan tiivisteet vuotaa', 'Tiivisteet vaihdettu uusiin.', NULL, 3, 9, 'sovi', '040-1179851', NULL, NULL, 4, '2023-05-08 14:34:10'),
(21, 50, 'pistorasia ei toimi', 'Vaihdettu pistorasia. Työ hankittu alihankintana Sähkötyö Keinäseltä (a 100£). ', NULL, 6, 11, 'kyllä', '+34585438', NULL, NULL, 4, '2023-05-08 14:34:10'),
(26, 55, 'Pattereita ei saa säädettyä lämpimämmälle.', NULL, NULL, 4, 14, 'ei', '+358456339709', NULL, 19, 2, '2023-05-09 12:26:59'),
(27, 50, 'Asunnossa on liian kuuma', NULL, NULL, 6, 14, 'sovi', '0400454969', NULL, NULL, 2, '2023-05-09 12:28:03'),
(28, NULL, 'Hiekkaa on rapun edessä vielä vaikka kuinka paljon vaikka lakaisuauto kävi jo!', '', NULL, 3, 6, 'ei', '000-0000000', NULL, NULL, 3, '2023-05-09 12:30:23'),
(30, 59, 'Punttisali haisee, voitteko desinfioida kunnolla', '', NULL, 6, 13, 'kyllä', '0401234566', NULL, NULL, 2, '2023-05-09 12:41:43'),
(31, NULL, 'Nurmikko pitäisi ajaa', NULL, NULL, 3, 10, 'kyllä', '0401234566', NULL, NULL, 1, '2023-05-09 12:53:29'),
(32, NULL, 'Naapuri Kuuntelee Käärijän Cha cha Chata ihan liian kovalla.', NULL, NULL, 6, 14, 'ei', '0405566887', NULL, NULL, 1, '2023-05-09 19:25:40'),
(39, 56, 'Hissi on pysähtynyt toistuvasti kerrosten välissä ja tarvitsee huoltoa.', '', NULL, 6, 12, 'ei', '3736573657', NULL, 27, 1, '2023-05-10 14:45:59'),
(40, 50, 'Vesihana vuotaa keittiössä, vaatii korjausta.', 'Vaihdettu tiiviste Oras X hinta 5,90€', NULL, 3, 8, 'kyllä', '0401234566', NULL, NULL, 4, '2023-05-10 14:46:26'),
(41, 72, 'Joku on sotkenut etupihan vihreällä serpentiinispraylla eikä ole siivonnut jälkiään.', NULL, NULL, 20, 21, 'kyllä', '09 4545 669', NULL, 21, 1, '2023-05-15 12:29:05'),
(42, NULL, 'Joku on paskattanut koiraansa koko talven ajan takapihalle ja nyt lumien sulaessa näky ja haju on kamala!', NULL, NULL, 19, 24, 'kyllä', '09 4545 669', NULL, NULL, 1, '2023-05-15 12:29:59'),
(43, 59, 'Viemäri tukossa asunnossa B 4, vesi ei valu kunnolla lavuaarista.', NULL, NULL, 22, 14, 'kyllä', '+358 9886543', NULL, NULL, 1, '2023-05-16 07:53:52'),
(44, 43, 'Asunnon A8 ulko-ovi on rikki eikä lukitu kunnolla.', NULL, NULL, 3, 14, 'sovi', '+358 45 851 366', NULL, NULL, 1, '2023-05-16 08:26:26'),
(45, 44, 'Piha-alueen leikkipaikan keinu on rikki ja vaarallinen lapsille.', NULL, NULL, 5, 27, 'kyllä', '0408513555', NULL, NULL, 1, '2023-05-16 08:55:03'),
(46, 63, 'Taloyhtiön grillipaikka on huonossa kunnossa ja tarvitsee kunnostusta.', NULL, NULL, 6, 30, 'kyllä', '0506827181', NULL, NULL, 1, '2023-05-16 08:56:47'),
(47, 64, 'Yhteisen pyykkituvan kuivausrumpu ei toimi kunnolla ja vaatii huoltoa.', '', NULL, 22, 55, 'kyllä', '030495810', NULL, 27, 1, '2023-05-16 08:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `tilat`
--

CREATE TABLE `tilat` (
  `tila_id` int(11) NOT NULL,
  `nimi` varchar(45) DEFAULT NULL,
  `taloyhtio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tilat`
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
(14, 'Ei valittu', 21),
(17, 'Etupiha', 13),
(18, 'Takapiha', 13),
(19, 'Etupiha', 22),
(20, 'Takapiha', 22),
(21, 'Etupiha', 20),
(22, 'Takapiha', 20),
(23, 'Etupiha', 19),
(24, 'Takapiha', 19),
(27, 'Etupiha', 5),
(28, 'Takapiha', 5),
(29, 'Etupiha', 6),
(30, 'Takapiha', 6),
(34, 'Toimistohuone 1', 5),
(35, 'Toimistohuone 2', 5),
(36, 'Rappu A', 6),
(37, 'Rappu B', 6),
(40, 'Varastohuone', 6),
(41, 'Eteisaula', 6),
(44, 'Rappu A', 19),
(45, 'Rappu B', 19),
(46, 'Varastohuone', 19),
(47, 'Pyykkitupa', 19),
(48, 'Varastohuone', 20),
(49, 'Pyykkitupa', 20),
(50, 'Rappu A ', 20),
(51, 'Rappu B', 20),
(52, 'Rappu A', 22),
(53, 'Rappu B', 22),
(54, 'Varastohuone', 22),
(55, 'Pyykkitupa', 22),
(56, 'Etupiha', 4),
(57, 'Takapiha', 4);

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
(19, 'Juho', 'Nieminen', '0501238723', 'jnieminen@huolto.fi', NULL, 68, 1),
(20, 'Markus', 'Ranta', '0103957839', 'mranta@huolto.fi', NULL, 69, 1),
(21, 'Anna ', 'Kivelä', '0401239851', 'akivelä@huolto.fi', NULL, 70, 1),
(23, 'Ville', 'Laine', '0400 454969', 'vlaine@toimisto.fi', NULL, 72, 1),
(26, 'Sari', 'Lahti', '045 344 8999', 'slahti@jotain.fi', NULL, 82, 1),
(27, 'Henri', 'Uovinen', '040 951 3669', 'huovinen@jotain.fi', NULL, 83, 1),
(28, 'Tuuli', 'Oinas', '0400 454 969', 'toinas@jotain.fi', NULL, 84, 1),
(30, 'Mikko', 'Virtanen', '0400 555 667', 'mvirtanen@jotain.fi', NULL, 86, 1);

-- --------------------------------------------------------

--
-- Table structure for table `yhteydenottopyynnot`
--

CREATE TABLE `yhteydenottopyynnot` (
  `yhteydenottopyynto_id` int(11) NOT NULL,
  `yp_nimi` varchar(20) NOT NULL,
  `yp_email` varchar(30) NOT NULL,
  `yp_numero` varchar(20) NOT NULL,
  `yp_viesti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `yhteydenottopyynnot`
--

INSERT INTO `yhteydenottopyynnot` (`yhteydenottopyynto_id`, `yp_nimi`, `yp_email`, `yp_numero`, `yp_viesti`) VALUES
(2, 'Sonera', 'sonera@sonera@sonera.fi', '0400454969', 'Halutaan Töölön toimistolle kiinteistöhuoltoa. Pihat saatanan liukkaita talvisin.'),
(3, 'Karhula', 'karhula@jotain.fi', '0400454969', 'Haluttais että tuutte siivoamaan meidän karhunpesän ennen talviunia.'),
(22, 'Pentti Halme', 'pena@jotain.fi', '0401155997', 'Kesämökkini Ivalossa kaipaa kiinteistönhuolto. ');

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
  MODIFY `asukas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `isannoitsijat`
--
ALTER TABLE `isannoitsijat`
  MODIFY `isannoitsija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kayttajat`
--
ALTER TABLE `kayttajat`
  MODIFY `kayttaja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `roolit`
--
ALTER TABLE `roolit`
  MODIFY `rooli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taloyhtiot`
--
ALTER TABLE `taloyhtiot`
  MODIFY `taloyhtio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `tehtava_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tilat`
--
ALTER TABLE `tilat`
  MODIFY `tila_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tyontekijan_tilanne`
--
ALTER TABLE `tyontekijan_tilanne`
  MODIFY `tyontekijan_tilanne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  MODIFY `tyontekija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `yhteydenottopyynnot`
--
ALTER TABLE `yhteydenottopyynnot`
  MODIFY `yhteydenottopyynto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asukkaat`
--
ALTER TABLE `asukkaat`
  ADD CONSTRAINT `asukkaat_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asukkaat_ibfk_2` FOREIGN KEY (`taloyhtio_id`) REFERENCES `taloyhtiot` (`taloyhtio_id`) ON DELETE CASCADE;

--
-- Constraints for table `isannoitsijat`
--
ALTER TABLE `isannoitsijat`
  ADD CONSTRAINT `kayttaja_id` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`) ON DELETE CASCADE;

--
-- Constraints for table `kayttajat`
--
ALTER TABLE `kayttajat`
  ADD CONSTRAINT `kayttajat_ibfk_1` FOREIGN KEY (`rooli_id`) REFERENCES `roolit` (`rooli_id`);

--
-- Constraints for table `taloyhtiot`
--
ALTER TABLE `taloyhtiot`
  ADD CONSTRAINT `taloyhtiot_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`),
  ADD CONSTRAINT `taloyhtiot_ibfk_2` FOREIGN KEY (`isannoitsija_id`) REFERENCES `isannoitsijat` (`isannoitsija_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tehtavat`
--
ALTER TABLE `tehtavat`
  ADD CONSTRAINT `tehtavan_tyyppi_id` FOREIGN KEY (`tehtavan_tyyppi_id`) REFERENCES `tehtavan_tyyppi` (`tehtavan_tyyppi_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tehtavat_ibfk_1` FOREIGN KEY (`tehtavan_tilanne_id`) REFERENCES `tehtavan_tilanne` (`tehtavan_tilanne_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tehtavat_ibfk_3` FOREIGN KEY (`taloyhtio_id`) REFERENCES `taloyhtiot` (`taloyhtio_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tehtavat_ibfk_4` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tila_id` FOREIGN KEY (`tila_id`) REFERENCES `tilat` (`tila_id`),
  ADD CONSTRAINT `tyontekija_id` FOREIGN KEY (`tyontekija_id`) REFERENCES `tyontekijat` (`tyontekija_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tilat`
--
ALTER TABLE `tilat`
  ADD CONSTRAINT `taloyhtio_id` FOREIGN KEY (`taloyhtio_id`) REFERENCES `taloyhtiot` (`taloyhtio_id`) ON DELETE CASCADE;

--
-- Constraints for table `tyontekijat`
--
ALTER TABLE `tyontekijat`
  ADD CONSTRAINT `tyontekijan_tilanne_id` FOREIGN KEY (`tyontekijan_tilanne_id`) REFERENCES `tyontekijan_tilanne` (`tyontekijan_tilanne_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tyontekijat_ibfk_1` FOREIGN KEY (`kayttaja_id`) REFERENCES `kayttajat` (`kayttaja_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
