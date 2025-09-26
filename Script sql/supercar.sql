-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 07 avr. 2025 à 05:43
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `supercar`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `guestid` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(16) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `message` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`guestid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`guestid`, `nom`, `email`, `message`) VALUES
(1, 'Boubacar', 'boubacarmedelamine@gmail.com', 'hey'),
(2, 'Azal', 'lucas@gmail.com', 'Ginard'),
(3, 'Moses', 'mosescar@gmail.com', 'Go renta');

-- --------------------------------------------------------

--
-- Structure de la table `demande_essaie`
--

DROP TABLE IF EXISTS `demande_essaie`;
CREATE TABLE IF NOT EXISTS `demande_essaie` (
  `guestid` int NOT NULL AUTO_INCREMENT,
  `voiture` varchar(16) DEFAULT NULL,
  `utilisateur` varchar(30) DEFAULT NULL,
  `date_demande` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`guestid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `demande_essaie`
--

INSERT INTO `demande_essaie` (`guestid`, `voiture`, `utilisateur`, `date_demande`) VALUES
(1, 'LAMBORGHINI', '', '2025-03-16'),
(2, 'BMW', NULL, '2023-03-03'),
(3, 'BMW', '', '2023-03-03'),
(4, 'BMW', 'Boubacar', '2323-05-05'),
(5, 'BMW', 'azal', '2025-03-20'),
(6, 'LAMBORGHINI', 'Peniela', '2025-03-20'),
(7, 'PEUGEOT', 'Nasser', '2023-11-06'),
(8, 'LAMBORGHINI', 'Sirius', '2024-03-12'),
(9, 'BMW', 'Nathan', '2025-02-16');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(10000) DEFAULT NULL,
  `amorce` varchar(255) DEFAULT NULL,
  `caracteristique` mediumtext,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `titre`, `amorce`, `caracteristique`, `image`) VALUES
(1, 'Conseil d’achat personnalisé:', '\"Venez trouver le véhicule parfait grâce à nos conseils adaptés à vos besoins et à votre budget.\"', 'Aide à choisir le véhicule adapté à vos besoins (citadine, SUV, berline, électrique, etc.). Comparaison des modèles selon les critères de performance, de prix, de consommation, et plus encore.\nSuggestions personnalisées selon votre budget et vos préférences.\n', 'images/conseil d_achat.jpg'),
(2, 'Essais et tests de voitures :', '\"Lisez nos rapports détaillés et regardez nos vidéos pour évaluer les derniers modèles sur le marché.\"', 'Rapports détaillés sur les derniers modèles sortis.\r\nVidéos et articles d\'essais sur route pour évaluer la performance, la conduite, et le confort des véhicules.\r\nAvis d\'experts sur les nouvelles technologies embarquées.', 'images/essaie de voiture.jpg'),
(3, 'Guide d’entretien et de réparation :', '\"Suivez nos tutoriels pour entretenir et réparer votre voiture facilement.\"', 'Tutoriels pour l’entretien de base : vidange, changement de pneus, freins, etc.\r\nConseils pour prolonger la durée de vie de votre véhicule.\r\nInformations sur les services de maintenance essentiels.', 'images/Révision.jpg'),
(4, 'Comparateur d’assurances et de financements :', '\"Comparez les meilleures offres d’assurance et de financement pour votre véhicule.\"', 'Outils pour comparer les offres d\'assurance automobile selon le type de véhicule et votre profil de conducteur.\r\nOptions de financement adaptées pour l’achat d’une nouvelle voiture.\r\nAide pour trouver les meilleures offres de leasing ou de location longue durée.', 'images/assurance et financement.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `guestid` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(16) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mdp` varchar(30) DEFAULT NULL,
  `conf_mdp` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`guestid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`guestid`, `fullname`, `email`, `mdp`, `conf_mdp`) VALUES
(1, 'boubacar', 'boubacarmedelamine@gmail.com', 'BOUBA05', 'BOUBA05'),
(2, 'boubacar', 'boubacarmedelamine@gmail.com', 'BME16', 'BME16'),
(3, '', 'boubacarmedelamine@gmail.com', '', ''),
(4, 'Peniela', 'peniela@gmail.com', '111', '111'),
(5, 'ASAM', 'asam@gmail.com', '333', '333'),
(6, 'Anthony Sirius', 'siriuslife@gmail.com', 'Kayakobeme01', 'Kayakobeme01'),
(7, 'Pierre Anthoine', 'pierre@gmail.com', 'pierre1234', 'pierre1234'),
(8, 'Nicolas Batum', 'batum@gmail.com', 'batum76', 'batum76');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id_voiture` int NOT NULL AUTO_INCREMENT,
  `marque` varchar(100) NOT NULL,
  `modele` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `propriete` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_voiture`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `marque`, `modele`, `prix`, `propriete`, `image`) VALUES
(1, 'BMW', ' Z4 cabriolet', '4000000.00', '340 chevaux,12-14 km/l,Essence', 'images/Z4 Cab.jpg'),
(2, 'BMW', ' I5', '3000000.00', '601 chevaux,266 miles (autonomie électrique),Électrique', 'images/I5.jpg'),
(3, 'BMW', ' X6 M', '6000000.00', '617 chevaux,8-10 km/l,Essence', 'images/X6 M.jpg'),
(4, 'BMW', ' M4 CS', '3000000.00', '550 chevaux,10-12 km/l,Essence', 'images/M4 CS.jpg'),
(5, 'LAMBORGHINI', 'TEMERARIO', '35000000.00', '920 chevaux,5-6 km/l,Hybride (essence + électrique)', 'images/Lamborghini_Temerario_2024_1000_0001.jpg'),
(6, 'LAMBORGHINI', 'HURACAN', '25000000.00', '640 chevaux,6-7 km/l,Essence', 'images/Lambo huracan.jpg'),
(7, 'LAMBORGHINI', 'REVUELTO', '40000000.00', '1015 chevaux,5-6 km/l,Hybride (essence + électrique)', 'images/revuelto.jpg'),
(8, 'LAMBORGHINI', 'URUS', '20000000.00', '650 chevaux,7-8 km/l,Essence', 'images/Urus (1).jpeg'),
(9, 'PEUGEOT', '208GT', '1477319.00', '136 chevaux,18-22 km/l,Essence/Diesel/Électrique', 'images/Peugeot E 208 GT.jpeg'),
(10, 'PEUGEOT', '508', '1510006.00', '225 chevaux,14-18 km/l,Essence/Diesel/Hybride', 'images/Peugeot 508.jpeg'),
(11, 'PEUGEOT', '2008GT', '1004241.00', '155 chevaux,16-20 km/l,Essence/Diesel', 'images/peugeot 2008GT.jpeg'),
(12, 'PEUGEOT', '5008', '2888908.00', '180 chevaux,15-20 km/l,Essence/Diesel', 'images/peugeot 5008.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
