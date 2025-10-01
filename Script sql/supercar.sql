-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 01 oct. 2025 à 06:27
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
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `mdp`) VALUES
(1, 'Bouba', 'Bouba16'),
(2, 'azali@gmail.com', 'azali1234');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`guestid`, `nom`, `email`, `message`) VALUES
(1, 'Boubacar', 'boubacarmedelamine@gmail.com', 'hey'),
(2, 'Azal', 'lucas@gmail.com', 'Ginard'),
(3, 'Moses', 'mosescar@gmail.com', 'Go renta'),
(9, 'salim', 'salim@gmail.com', 'bonjour'),
(11, 'said', 'said@gmail.com', 'bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `demande_essaie`
--

DROP TABLE IF EXISTS `demande_essaie`;
CREATE TABLE IF NOT EXISTS `demande_essaie` (
  `guestid` int NOT NULL AUTO_INCREMENT,
  `voiture` varchar(16) DEFAULT NULL,
  `modele` varchar(100) DEFAULT NULL,
  `utilisateur` varchar(30) DEFAULT NULL,
  `date_demande` varchar(30) DEFAULT NULL,
  `temps` time DEFAULT NULL,
  PRIMARY KEY (`guestid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `demande_essaie`
--

INSERT INTO `demande_essaie` (`guestid`, `voiture`, `modele`, `utilisateur`, `date_demande`, `temps`) VALUES
(5, 'BMW', NULL, 'azal', '2025-03-20', NULL),
(23, 'LAMBORGHINI', 'Urus', 'said', '2024-06-04', '12:48:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`guestid`, `fullname`, `email`, `mdp`, `conf_mdp`) VALUES
(1, 'boubacar', 'boubacarmedelamine@gmail.com', 'BOUBA05', 'BOUBA05'),
(10, 'azali', 'azal@gmail.com', '1234', '1234'),
(13, 'said', 'said@gmail.com', '7777', '7777');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `marque`, `modele`, `prix`, `propriete`, `image`) VALUES
(1, 'BMW', ' Z4 cabriolet', '4000000.00', '340 chevaux,12-14 km/l,Essence', 'images/Z4 Cab.jpg'),
(2, 'BMW', ' I5', '3000000.00', '601 chevaux,266 miles (autonomie électrique),Électrique', 'images/I5.jpg'),
(3, 'BMW', ' X6 M', '6000000.00', '617 chevaux,8-10 km/l,Essence', 'images/X6 M.jpg'),
(4, 'BMW', ' M4 CS', '3000000.00', '550 chevaux,10-12 km/l,Essence', 'images/M4 CS.jpg'),
(5, 'LAMBORGHINI', 'TEMERARIO', '35000000.00', '920 chevaux,5-6 km/l,Hybride (essence + électrique)', 'images/lamborghini_temerario.jpg'),
(6, 'LAMBORGHINI', 'HURACAN', '25000000.00', '640 chevaux,6-7 km/l,Essence', 'images/lamborghini_huracan.jpeg'),
(7, 'LAMBORGHINI', 'REVUELTO', '40000000.00', '1015 chevaux,5-6 km/l,Hybride (essence + électrique)', 'images/revuelto.jpg'),
(8, 'LAMBORGHINI', 'URUS', '20000000.00', '650 chevaux,7-8 km/l,Essence', 'images/lamborghini_urus.jpeg'),
(9, 'PEUGEOT', '208GT', '1477319.00', '136 chevaux,18-22 km/l,Essence/Diesel/Électrique', 'images/peugeot_208gt.jpeg'),
(10, 'PEUGEOT', '508', '1510006.00', '225 chevaux,14-18 km/l,Essence/Diesel/Hybride', 'images/peugeot_508.jpeg'),
(11, 'PEUGEOT', '2008GT', '1004241.00', '155 chevaux,16-20 km/l,Essence/Diesel', 'images/peugeot_2008gt.jpeg'),
(12, 'PEUGEOT', '5008', '2888908.00', '180 chevaux,15-20 km/l,Essence/Diesel', 'images/peugeot_5008.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
