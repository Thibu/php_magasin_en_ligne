-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2021 at 07:21 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

DROP TABLE IF EXISTS `basket`;
CREATE TABLE IF NOT EXISTS `basket` (
  `basketId` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`basketId`),
  KEY `FK_CONCERNE_USER` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int NOT NULL AUTO_INCREMENT,
  `typeProduct` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `typeProduct`) VALUES
(1, 'Pc portable'),
(2, 'Ordinateur de bureau'),
(3, 'Pc gaming'),
(4, 'Pc portable gaming'),
(8, 'MacBook');

-- --------------------------------------------------------

--
-- Table structure for table `fichetechnique`
--

DROP TABLE IF EXISTS `fichetechnique`;
CREATE TABLE IF NOT EXISTS `fichetechnique` (
  `ficheId` int NOT NULL AUTO_INCREMENT,
  `productId` int DEFAULT NULL,
  `prix` decimal(10,0) DEFAULT NULL,
  `tailleMemoire` int DEFAULT NULL,
  `processeur` varchar(100) DEFAULT NULL,
  `processeurFab` varchar(100) DEFAULT NULL,
  `resolutionEcran` varchar(100) DEFAULT NULL,
  `tailleEcran` varchar(50) DEFAULT NULL,
  `carteGraphique` varchar(100) DEFAULT NULL,
  `typeHdd` varchar(20) DEFAULT NULL,
  `tailleHdd` int DEFAULT NULL,
  `poids` float(10,0) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ficheId`),
  KEY `FK_CONCERNE_PRODUIT` (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fichetechnique`
--

INSERT INTO `fichetechnique` (`ficheId`, `productId`, `prix`, `tailleMemoire`, `processeur`, `processeurFab`, `resolutionEcran`, `tailleEcran`, `carteGraphique`, `typeHdd`, `tailleHdd`, `poids`, `OS`) VALUES
(22, 22, '5999', 32, 'Ryzen Threadripper PRO', 'AMD', '', '', 'Radeon Pro W5500', 'SSD', 4000, 0, 'Windows 10 Pro'),
(21, 21, '549', 8, 'Ryzen 5 Pro 4650G', 'AMD', '', '', 'AMD Radeon Graphics', 'SSD', 480, 0, 'Sans OS'),
(8, 8, '9999', 16, 'Ryzen 6 3600', 'AMD', '1920 * 1080', '24 pouces', 'RX 6700', 'SSD', 1000, 3, 'Windows'),
(9, 9, '6543', 65, 'I9-9900k', 'Intel', '1920 * 1080', '24 pouces', 'RTX 3090', 'SSD', 1000, 3, 'Linux'),
(10, 10, '1399', 6, 'Ryzen 5 3600', 'AMD', '', '', 'GeForce RTX 2060', 'SSD', 480, 0, 'Windows'),
(11, 11, '219', 4, 'Intel Celeron J3455', 'INTEL', '', '', 'Intel HD Graphics 500', 'SSD', 480, 3, 'windows'),
(12, 12, '459', 8, 'i3-10100', 'INTEL', '', '', 'Intel UHD Graphics 630', 'SSD', 480, 5, 'Sans OS'),
(13, 13, '495', 8, 'i3-10110U', 'INTEL', '', '', 'Intel UHD Graphics', 'SSD', 256, 2, 'Free DOS'),
(14, 14, '349', 4, 'AMD 3000 Dual-Core APU', 'AMD', '1366 x 768 pixels', '14 pouces', 'AMD Radeon', 'SSD', 64, 1, 'Windows 10 Famille'),
(15, 15, '5000', 8, 'i9-10980HK', 'INTEL', '3840 * 2160 pixels', '15,6 pouces', 'GeForce RTX 3070', 'SSD', 1000, 2, 'Windows 10 Pro'),
(16, 16, '481', 8, 'Pentium Silver N5030', 'INTEL', '1920 * 1080 pixels', '15,6', 'Intel UHD Graphics 605', 'SSD', 240, 2, 'Sans OS'),
(17, 17, '829', 8, 'Ryzen 7 3700U', 'AMD', '1920 * 1080 pixels', '15,6 pouces', 'Radeon RX Vega 10 Gr', 'SSD', 1000, 128, '1,85'),
(19, 19, '1279', 8, 'Intel Core i5 (1.1 GHz)', 'INTEL', '2560 * 1600 pixels', '13 pouces', 'Intel Iris Plus Graphics', 'SSD', 1000, 1, 'MacOS'),
(20, 20, '679', 8, 'Ryzen 5 4500U', 'AMD', '1920 * 1080 pixels', '14 pouces', 'Radeon RX Vega 6 Graphics', 'SSD', 256, 1, 'Windows 10 Famille');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `productId` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(300) NOT NULL,
  `imgUrl` varchar(255) DEFAULT NULL,
  `description` text,
  `categoryID` int DEFAULT NULL,
  `onTop` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`productId`),
  KEY `FK_APPARTIENT_A` (`categoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `imgUrl`, `description`, `categoryID`, `onTop`) VALUES
(22, 'LDLC RipIT Pro WRX', '../../src/img/produit/1624560253LD0005806660_1.jpg', 'La station de travail LDLC RipIT Pro WRX est un véritable bijoux ultra performant. A la pointe de la technologie, elle saura séduire les professionnels les plus exigeants en proposant à la fois performances et fonctionnalités dernière génération. Le PC LDLC RipIT Pro WRX ne fait aucune concession.', 3, 0),
(21, 'LDLC PC Pablo', '../../src/img/produit/1624555175LD0005482089_2.jpg', 'Le PC LDLC Pablo est un ordinateur conçu pour toute la famille qui saura se montrer fluide et réactif pour une utilisation bureautique et multimédia. Le processeur Hexa-Core Ryzen 5 Pro 4650G est épaulé dans sa tâche par 8 Go de RAM DDR4 et un SSD PCIe NVMe de 480 Go.', 2, 1),
(8, 'MSI TOMAHAWK GAMING+', '../../src/img/produit/16244734431500x1500.41006438_01.jpg', 'Pc Gamer de qualitéy qui vous propulsera des les cieuxxx', 3, 0),
(9, 'ASUS OMG WOW', '../../src/img/produit/1624478593None_65955d00-49e5-440a-add6-3a34228ea8da.jpg', 'Pc trop fort qui va super vite viouuu', 3, 1),
(10, 'LDLC PC DegaS', '../../src/img/produit/1624479688LD0005832601_1.jpg', 'Le PC LDLC DegaS est un puissant PC conçu pour jouer sans se ruiner. En intégrant le meilleur d\'AMD (CPU AMD Ryzen 5 3600), de NVIDIA (GPU NVIDIA GeForce RTX 2060) et de MSI (carte mère et boîtier), il vous permettra de performer dans vos jeux PC préférés. Le tout, avec style !', 3, 1),
(11, 'LDLC PC NUC-CEL-4-S4', '../../src/img/produit/1624479833LD0005663351_2.jpg', 'Entrez dans la nouvelle génération de PC ultra-compacts grâce au PC10 LDLC NUC-CEL-4-S4, un PC incroyablement petit aux performances surprenantes. Conçu autour de l\'Intel NUC NUC6CAYH, ce petit PC tenant au creux de la main embarque un processeur Quad-Core Intel Celeron J3455.', 2, 1),
(12, 'LDLC PC In extensor-SSD', '../../src/img/produit/1624480099LD0005739122_1.jpg', 'Avec le PC LDLC In Extensor, lisez vos films UHD, retouchez vos photos ou travaillez sur plusieurs applications tout en consommant moins d\'énergie ! Profitez des avancées technologiques du processeur Intel Core i3 de 10ème génération à moindre coût.', 3, 1),
(13, 'ASUS Mini PC PN62S-B', '../../src/img/produit/1624480207LD0005571833_2_0005572629_0005715916_0005778112.jpg', 'Gagnez de la place sur votre espace de travail avec le ASUS Mini PC PN62S ! Malgré son design ultra-compact, le PN62S peut accueillir à la fois un SSD au format M.2 et un disque dur de 2.5 pouces.', 2, 1),
(14, 'Lenovo IdeaPad 1 14ADA05', '../../src/img/produit/1624481140LD0005767066_1_0005767197.jpg', 'Compact et efficace, le PC portable Lenovo IdeaPad 1 14ADA05 est un excellent compagnon mobile. Avec son format compact et son écran de 14\" à cadre mince, ce notebook est taillé pour la mobilité.', 1, 1),
(15, 'ASUS ZenBook Pro Duo UX582LR-H2102R', '../../src/img/produit/1624543638LD0005836190_1_0005848546.jpg', 'Explorez votre créativité et optimisez votre productivité avec toutes les qualités de l\'ordinateur portable ASUS ZenBook Pro Duo UX582LR-H2002R ! Ce modèle offre une expérience visuelle supérieure avec son écran OLED tactile 15.6\" Ultra HD et le ScreenPad Plus.', 4, 0),
(16, 'LDLC Aurore NL5B-8-S2', '../../src/img/produit/1624549612LD0005634271_2_0005812258.jpg', 'Concentrez-vous sur l\'essentiel avec le PC portable LDLC Aurore NL5B ! Ce notebook, simple et polyvalent, est conçu pour répondre efficacement aux besoins du quotidien, sans négliger le confort. Grâce à son écran mat de 15.6 pouces avec résolution Full HD, il offre un très bon confort visuel.', 1, 1),
(17, 'Lenovo IdeaPad 3 15ADA05', '../../src/img/produit/1624550432LD0005743294_1_0005765932.jpg', 'Compact et performant, le PC portable Lenovo IdeaPad 3 15ADA05 est un excellent compagnon mobile. Avec son écran à cadre mince, il offre un bon confort d\'utilisation. Le PC portable Lenovo IdeaPad 3 15ADA05 (81W100D7FR) offre d\'excellentes performances et un fonctionnement rapide.', 1, 0),
(19, 'Apple MacBook Air (2020)', '../../src/img/produit/1624551397LD0005649046_2.jpg', 'Le nouveau MacBook Air (2020) c\'est : Un écran Retina avec affichage True Tone, un processeur Intel Core i5 de 10e génération, 8 Go de RAM, un SSD au format M.2 PCIe, un trackpad Force Touch, deux ports Thunderbolt 3 et le capteur d\'empreinte digitale Touch ID.', 8, 0),
(20, 'ASUS Vivobook S14 S413IA-EB629T', '../../src/img/produit/1624552190LD0005704854_1_0005709124_0005753284_0005807969_0005824254.jpg', 'Mince, élégant et sophistiqué, le PC portable ASUS Vivobook S14 S413IA vous offre la puissance et la mobilité dont vous avez besoin. Son écran de 14\" à cadre mince et son clavier rchiclet offrent un excellent confort d\'utilisation.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

DROP TABLE IF EXISTS `productlist`;
CREATE TABLE IF NOT EXISTS `productlist` (
  `productId` int DEFAULT NULL,
  `basketId` int DEFAULT NULL,
  KEY `FK_REFERENCE_PRODUIT` (`productId`),
  KEY `FK_APPARTIEN_PANIER` (`basketId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleId` int NOT NULL AUTO_INCREMENT,
  `roleName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleName`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `ban` varchar(50) DEFAULT NULL,
  `roleId` int DEFAULT '2',
  PRIMARY KEY (`userId`),
  KEY `FK_ROLE_DEFINI` (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `login`, `email`, `password`, `ban`, `roleId`) VALUES
(1, 'GuyVil1', 'guy.vilain1@gmail.com', '17zehWIp0M8MQ', '1725653610', 1),
(4, 'thib', 'thibaut.ramiro@hotmail.com', '$2y$10$E8mz4tChhumYEDuMJTTO.umv3k9SC6JElamT/zLZUYw0YfNTTTI82', NULL, 1),
(3, 'celia', 'celia-puddu@hotmail.com', '$2y$10$poBn1IBJTK2YeFV4qDG0K.voVMPhya1YoH/oZI0jbwR85YJyap6Ya', NULL, 2),
(5, 'Maxime', 'maxime.ramiro@hotmail.com', '$2y$10$GXpk5NIwaHcFy1nIMgMRHezxuUCJ.7DQUrqvl7Ko5RbrKpL.QLM9O', NULL, 2),
(6, 'admin', 'admin@admin.com', '$2y$10$3cejGwJ2QpWCvM9dfZnWEepv90ihY7aVqDgqkP38C/jR5sbGrbEUi', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
