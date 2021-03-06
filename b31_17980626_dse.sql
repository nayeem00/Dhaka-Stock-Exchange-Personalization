-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql109.byethost31.com
-- Generation Time: May 03, 2016 at 06:24 PM
-- Server version: 5.6.29-76.2
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b31_17980626_dse`
--

-- --------------------------------------------------------

--
-- Table structure for table `dse_all_companies`
--

CREATE TABLE IF NOT EXISTS `dse_all_companies` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TradingCode` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=318 ;

--
-- Dumping data for table `dse_all_companies`
--

INSERT INTO `dse_all_companies` (`Id`, `TradingCode`) VALUES
(1, '1JANATAMF'),
(2, '1STPRIMFMF'),
(3, '8THICB'),
(4, 'AAMRATECH'),
(5, 'ABB1STMF'),
(6, 'ABBANK'),
(7, 'ACI'),
(8, 'ACIFORMULA'),
(9, 'ACTIVEFINE'),
(10, 'AFCAGRO'),
(11, 'AFTABAUTO'),
(12, 'AGNISYSL'),
(13, 'AGRANINS'),
(14, 'AIBL1STIMF'),
(15, 'AL-HAJTEX'),
(16, 'ALARABANK'),
(17, 'ALLTEX'),
(18, 'AMANFEED'),
(19, 'AMBEEPHA'),
(20, 'AMCL'),
(21, 'ANLIMAYARN'),
(22, 'ANWARGALV'),
(23, 'APEXFOODS'),
(24, 'APEXFOOT'),
(25, 'APEXSPINN'),
(26, 'APEXTANRY'),
(27, 'APOLOISPAT'),
(28, 'ARAMIT'),
(29, 'ARAMITCEM'),
(30, 'ARGONDENIM'),
(31, 'ASIAINS'),
(32, 'ASIAPACINS'),
(33, 'ATCSLGF'),
(34, 'ATLASBANG'),
(35, 'AZIZPIPES'),
(36, 'BANGAS'),
(37, 'BANKASIA'),
(38, 'BARKAPOWER'),
(39, 'BATASHOE'),
(40, 'BATBC'),
(41, 'BAYLEASING'),
(42, 'BBS'),
(43, 'BDAUTOCA'),
(44, 'BDCOM'),
(45, 'BDFINANCE'),
(46, 'BDLAMPS'),
(47, 'BDTHAI'),
(48, 'BDWELDING'),
(49, 'BEACHHATCH'),
(50, 'BEACONPHAR'),
(51, 'BENGALWTL'),
(52, 'BERGERPBL'),
(53, 'BEXIMCO'),
(54, 'BGIC'),
(55, 'BIFC'),
(56, 'BNICL'),
(57, 'BRACBANK'),
(58, 'BSC'),
(59, 'BSCCL'),
(60, 'BSRMLTD'),
(61, 'BSRMSTEEL'),
(62, 'BXPHARMA'),
(63, 'BXSYNTH'),
(64, 'CENTRALINS'),
(65, 'CENTRALPHL'),
(66, 'CITYBANK'),
(67, 'CITYGENINS'),
(68, 'CMCKAMAL'),
(69, 'CNATEX'),
(70, 'CONFIDCEM'),
(71, 'CONTININS'),
(72, 'CVOPRL'),
(73, 'DACCADYE'),
(74, 'DAFODILCOM'),
(75, 'DBH'),
(76, 'DBH1STMF'),
(77, 'DELTALIFE'),
(78, 'DELTASPINN'),
(79, 'DESCO'),
(80, 'DESHBANDHU'),
(81, 'DHAKABANK'),
(82, 'DHAKAINS'),
(83, 'DOREENPWR'),
(84, 'DSHGARME'),
(85, 'DSSL'),
(86, 'DUTCHBANGL'),
(87, 'EASTERNINS'),
(88, 'EASTLAND'),
(89, 'EASTRNLUB'),
(90, 'EBL'),
(91, 'EBL1STMF'),
(92, 'EBLNRBMF'),
(93, 'ECABLES'),
(94, 'EHL'),
(95, 'EMERALDOIL'),
(96, 'ENVOYTEX'),
(97, 'EXIMBANK'),
(98, 'FAMILYTEX'),
(99, 'FARCHEM'),
(100, 'FAREASTFIN'),
(101, 'FAREASTLIF'),
(102, 'FASFIN'),
(103, 'FBFIF'),
(104, 'FEDERALINS'),
(105, 'FEKDIL'),
(106, 'FINEFOODS'),
(107, 'FIRSTFIN'),
(108, 'FIRSTSBANK'),
(109, 'FUWANGCER'),
(110, 'FUWANGFOOD'),
(111, 'GBBPOWER'),
(112, 'GEMINISEA'),
(113, 'GENNEXT'),
(114, 'GHAIL'),
(115, 'GHCL'),
(116, 'GLAXOSMITH'),
(117, 'GLOBALINS'),
(118, 'GOLDENSON'),
(119, 'GP'),
(120, 'GPHISPAT'),
(121, 'GQBALLPEN'),
(122, 'GRAMEENS2'),
(123, 'GREENDELMF'),
(124, 'GREENDELT'),
(125, 'GSPFINANCE'),
(126, 'HAKKANIPUL'),
(127, 'HEIDELBCEM'),
(128, 'HFL'),
(129, 'HRTEX'),
(130, 'HWAWELLTEX'),
(131, 'IBBLPBOND'),
(132, 'ICB'),
(133, 'ICB1STNRB'),
(134, 'ICB2NDNRB'),
(135, 'ICB3RDNRB'),
(136, 'ICBAMCL2ND'),
(137, 'ICBEPMF1S1'),
(138, 'ICBIBANK'),
(139, 'ICBSONALI1'),
(140, 'IDLC'),
(141, 'IFADAUTOS'),
(142, 'IFIC'),
(143, 'IFIC1STMF'),
(144, 'IFILISLMF1'),
(145, 'ILFSL'),
(146, 'IMAMBUTTON'),
(147, 'INTECH'),
(148, 'IPDC'),
(149, 'ISLAMIBANK'),
(150, 'ISLAMICFIN'),
(151, 'ISLAMIINS'),
(152, 'ITC'),
(153, 'JAMUNABANK'),
(154, 'JAMUNAOIL'),
(155, 'JANATAINS'),
(156, 'JMISMDL'),
(157, 'JUTESPINN'),
(158, 'KARNAPHULI'),
(159, 'KAY'),
(160, 'KBPPWBIL'),
(161, 'KDSALTD'),
(162, 'KEYACOSMET'),
(163, 'KOHINOOR'),
(164, 'KPCL'),
(165, 'KPPL'),
(166, 'LAFSURCEML'),
(167, 'LANKABAFIN'),
(168, 'LEGACYFOOT'),
(169, 'LIBRAINFU'),
(170, 'LINDEBD'),
(171, 'LRGLOBMF1'),
(172, 'MAKSONSPIN'),
(173, 'MALEKSPIN'),
(174, 'MARICO'),
(175, 'MATINSPINN'),
(176, 'MBL1STMF'),
(177, 'MEGCONMILK'),
(178, 'MEGHNACEM'),
(179, 'MEGHNALIFE'),
(180, 'MEGHNAPET'),
(181, 'MERCANBANK'),
(182, 'MERCINS'),
(183, 'METROSPIN'),
(184, 'MHSML'),
(185, 'MICEMENT'),
(186, 'MIDASFIN'),
(187, 'MIRACLEIND'),
(188, 'MITHUNKNIT'),
(189, 'MJLBD'),
(190, 'MODERNDYE'),
(191, 'MONNOCERA'),
(192, 'MONNOSTAF'),
(193, 'MPETROLEUM'),
(194, 'MTB'),
(195, 'NATLIFEINS'),
(196, 'NAVANACNG'),
(197, 'NBL'),
(198, 'NCCBANK'),
(199, 'NCCBLMF1'),
(200, 'NFML'),
(201, 'NHFIL'),
(202, 'NITOLINS'),
(203, 'NLI1STMF'),
(204, 'NORTHERN'),
(205, 'NORTHRNINS'),
(206, 'NPOLYMAR'),
(207, 'NTC'),
(208, 'NTLTUBES'),
(209, 'OAL'),
(210, 'OLYMPIC'),
(211, 'ONEBANKLTD'),
(212, 'ORIONINFU'),
(213, 'ORIONPHARM'),
(214, 'PADMALIFE'),
(215, 'PADMAOIL'),
(216, 'PARAMOUNT'),
(217, 'PENINSULA'),
(218, 'PEOPLESINS'),
(219, 'PF1STMF'),
(220, 'PHARMAID'),
(221, 'PHENIXINS'),
(222, 'PHOENIXFIN'),
(223, 'PHPMF1'),
(224, 'PIONEERINS'),
(225, 'PLFSL'),
(226, 'POPULAR1MF'),
(227, 'POPULARLIF'),
(228, 'POWERGRID'),
(229, 'PRAGATIINS'),
(230, 'PRAGATILIF'),
(231, 'PREMIERBAN'),
(232, 'PREMIERCEM'),
(233, 'PREMIERLEA'),
(234, 'PRIME1ICBA'),
(235, 'PRIMEBANK'),
(236, 'PRIMEFIN'),
(237, 'PRIMEINSUR'),
(238, 'PRIMELIFE'),
(239, 'PRIMETEX'),
(240, 'PROGRESLIF'),
(241, 'PROVATIINS'),
(242, 'PTL'),
(243, 'PUBALIBANK'),
(244, 'PURABIGEN'),
(245, 'QSMDRYCELL'),
(246, 'RAHIMAFOOD'),
(247, 'RAHIMTEXT'),
(248, 'RAKCERAMIC'),
(249, 'RANFOUNDRY'),
(250, 'RDFOOD'),
(251, 'RECKITTBEN'),
(252, 'REGENTTEX'),
(253, 'RELIANCE1'),
(254, 'RELIANCINS'),
(255, 'RENATA'),
(256, 'RENWICKJA'),
(257, 'REPUBLIC'),
(258, 'RNSPIN'),
(259, 'RSRMSTEEL'),
(260, 'RUPALIBANK'),
(261, 'RUPALIINS'),
(262, 'RUPALILIFE'),
(263, 'SAFKOSPINN'),
(264, 'SAIFPOWER'),
(265, 'SAIHAMCOT'),
(266, 'SAIHAMTEX'),
(267, 'SALAMCRST'),
(268, 'SALVOCHEM'),
(269, 'SAMATALETH'),
(270, 'SAMORITA'),
(271, 'SANDHANINS'),
(272, 'SAPORTL'),
(273, 'SAVAREFR'),
(274, 'SEBL1STMF'),
(275, 'SHAHJABANK'),
(276, 'SHASHADNIM'),
(277, 'SHURWID'),
(278, 'SIBL'),
(279, 'SIMTEX'),
(280, 'SINGERBD'),
(281, 'SINOBANGLA'),
(282, 'SONALIANSH'),
(283, 'SONARBAINS'),
(284, 'SONARGAON'),
(285, 'SOUTHEASTB'),
(286, 'SPCERAMICS'),
(287, 'SPCL'),
(288, 'SPPCL'),
(289, 'SQUARETEXT'),
(290, 'SQURPHARMA'),
(291, 'STANCERAM'),
(292, 'STANDARINS'),
(293, 'STANDBANKL'),
(294, 'STYLECRAFT'),
(295, 'SUMITPOWER'),
(296, 'SUNLIFEINS'),
(297, 'TAKAFULINS'),
(298, 'TALLUSPIN'),
(299, 'TITASGAS'),
(300, 'TOSRIFA'),
(301, 'TRUSTB1MF'),
(302, 'TRUSTBANK'),
(303, 'TUNGHAI'),
(304, 'UCB'),
(305, 'UNIONCAP'),
(306, 'UNIQUEHRL'),
(307, 'UNITEDAIR'),
(308, 'UNITEDFIN'),
(309, 'UPGDCL'),
(310, 'USMANIAGL'),
(311, 'UTTARABANK'),
(312, 'UTTARAFIN'),
(313, 'WATACHEM'),
(314, 'WMSHIPYARD'),
(315, 'ZAHEENSPIN'),
(316, 'ZAHINTEX'),
(317, 'ZEALBANGLA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Email`, `Password`, `Name`) VALUES
(1, 'hassanabidtokee@gmail.com', '12345', 'Abid Hassan Tokee'),
(2, 'abc@abc.com', '123', 'abc'),
(3, 'saadat.antor@gmail.com', 'rzs052163416', 'MD. NAZMUS SAADAT'),
(4, 'demo@demo.com', '12345', 'Demo'),
(5, 'adibmehedi@gmail.com', 'passjanina', 'Adib'),
(6, 'shoaibshahriar29@gmail.com', 'abcd123', 'Shahriar Shoaib'),
(7, 'emad@gmail.com', 'abc123', 'Emad Ahmed'),
(8, 'hardtrackerporag@gmail.com', '12345', 'Khalid Shifullah Porag'),
(9, 'asifseraje@gmail.com', '12345', 'Asif Serajee'),
(10, 'onlynayeem@outlook.com', '1234', 'Nayeem ');

-- --------------------------------------------------------

--
-- Table structure for table `user_companies`
--

CREATE TABLE IF NOT EXISTS `user_companies` (
  `Email` varchar(100) NOT NULL,
  `TradingCode` varchar(100) NOT NULL,
  `AvgBuyingPrice` double NOT NULL,
  `Unit` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_companies`
--

INSERT INTO `user_companies` (`Email`, `TradingCode`, `AvgBuyingPrice`, `Unit`) VALUES
('abc@abc.com', 'AL-HAJTEX', 90, 800),
('hassanabidtokee@gmail.com', 'AAMRATECH', 15, 12000),
('hassanabidtokee@gmail.com', 'AL-HAJTEX', 87, 6000),
('hassanabidtokee@gmail.com', 'ACI', 387, 9500),
('hassanabidtokee@gmail.com', 'AFTABAUTO', 50, 5000),
('hassanabidtokee@gmail.com', 'ABBANK', 12, 7000),
('saadat.antor@gmail.com', 'LINDEBD', 1199.8, 20),
('demo@demo.com', 'ACI', 387.2, 8000),
('demo@demo.com', 'ABBANK', 22, 7250),
('demo@demo.com', 'AFTABAUTO', 47, 6200),
('demo@demo.com', 'AGNISYSL', 21.7, 6050),
('demo@demo.com', 'APEXFOOT', 293.85, 3800),
('demo@demo.com', 'BATASHOE', 1127.8, 2350),
('saadat.antor@gmail.com', 'BERGERPBL', 2070.5, 4000),
('hassanabidtokee@gmail.com', '1JANATAMF', 5.2, 3000),
('hassanabidtokee@gmail.com', 'EBL', 19.2, 4000),
('hassanabidtokee@gmail.com', 'DUTCHBANGL', 87.75, 4000),
('emad@gmail.com', 'AAMRATECH', 20, 20),
('emad@gmail.com', 'BRACBANK', 45, 20),
('emad@gmail.com', 'ACI', 495, 30),
('asifseraje@gmail.com', 'BDWELDING', 100, 12),
('onlynayeem@outlook.com', 'AAMRATECH', 10, 500),
('onlynayeem@outlook.com', 'AZIZPIPES', 10, 100),
('demo@demo.com', 'ECABLES', 25.9, 5000),
('onlynayeem@outlook.com', 'ABBANK', 100, 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
