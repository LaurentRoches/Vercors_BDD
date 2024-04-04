-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 avr. 2024 à 14:46
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vercors_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `choice`
--

DROP TABLE IF EXISTS `choice`;
CREATE TABLE IF NOT EXISTS `choice` (
  `id_night` int NOT NULL,
  `id_resa` int NOT NULL,
  `date_choice` datetime NOT NULL,
  PRIMARY KEY (`id_night`,`id_resa`),
  KEY `Choice_Vercors_Resa0_FK` (`id_resa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `come`
--

DROP TABLE IF EXISTS `come`;
CREATE TABLE IF NOT EXISTS `come` (
  `id_pass` int NOT NULL,
  `id_resa` int NOT NULL,
  PRIMARY KEY (`id_pass`,`id_resa`),
  KEY `Come_Vercors_Resa0_FK` (`id_resa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vercors_night`
--

DROP TABLE IF EXISTS `vercors_night`;
CREATE TABLE IF NOT EXISTS `vercors_night` (
  `id_night` int NOT NULL AUTO_INCREMENT,
  `name_night` varchar(255) NOT NULL,
  `price_night` float NOT NULL,
  PRIMARY KEY (`id_night`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vercors_night`
--

INSERT INTO `vercors_night` (`id_night`, `name_night`, `price_night`) VALUES
(1, 'La nuit du 01/07 en tente', 5),
(2, 'La nuit du 02/07 en tente', 5),
(3, 'La nuit du 03/07 en tente', 5),
(4, 'Les trois nuits en tente', 12),
(5, 'La nuit du 01/07 en van', 5),
(6, 'La nuit du 02/07 en van', 5),
(7, 'La nuit du 03/07 en van', 5),
(8, 'Les trois nuits en van', 12);

-- --------------------------------------------------------

--
-- Structure de la table `vercors_pass`
--

DROP TABLE IF EXISTS `vercors_pass`;
CREATE TABLE IF NOT EXISTS `vercors_pass` (
  `id_pass` int NOT NULL AUTO_INCREMENT,
  `name_pass` varchar(100) NOT NULL,
  `price_pass` float NOT NULL,
  `price_reduce_pass` float NOT NULL,
  `date_pass` date NOT NULL,
  PRIMARY KEY (`id_pass`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vercors_pass`
--

INSERT INTO `vercors_pass` (`id_pass`, `name_pass`, `price_pass`, `price_reduce_pass`, `date_pass`) VALUES
(1, 'Pass une journée', 40, 25, '2024-07-01'),
(2, 'Pass une journée', 40, 25, '2024-07-02'),
(3, 'Pass une journée', 40, 25, '2024-07-03'),
(4, 'Pass deux jours', 70, 50, '2024-07-01'),
(5, 'Pass deux jours', 70, 50, '2024-07-02'),
(6, 'Pass trois jours', 100, 65, '2024-07-01');

-- --------------------------------------------------------

--
-- Structure de la table `vercors_resa`
--

DROP TABLE IF EXISTS `vercors_resa`;
CREATE TABLE IF NOT EXISTS `vercors_resa` (
  `id_resa` int NOT NULL AUTO_INCREMENT,
  `reduc_resa` tinyint(1) NOT NULL,
  `kids_resa` tinyint(1) NOT NULL,
  `headset_resa` int NOT NULL,
  `sled_resa` int NOT NULL,
  `price_resa` float NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_resa`),
  KEY `Vercors_Resa_Vercors_User_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vercors_user`
--

DROP TABLE IF EXISTS `vercors_user`;
CREATE TABLE IF NOT EXISTS `vercors_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `password_user` varchar(250) NOT NULL,
  `lastName_user` varchar(250) NOT NULL,
  `firstName_user` varchar(250) NOT NULL,
  `tel_user` varchar(250) NOT NULL,
  `address_user` varchar(250) NOT NULL,
  `role_user` varchar(250) NOT NULL,
  `rgpd_user` datetime NOT NULL,
  `email_user` varchar(250) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `Vercors_User_AK` (`email_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vercors_user`
--

INSERT INTO `vercors_user` (`id_user`, `password_user`, `lastName_user`, `firstName_user`, `tel_user`, `address_user`, `role_user`, `rgpd_user`, `email_user`) VALUES
(8, 'cc9f410d0e06619906a5c991daff942ad38c4f40cc12b30808a11e88833c5a6434342a01faae949aa0b02b655d5fc7f3397b96dad59a1744f74d044d93e12f66', 'Admin', 'Admin', '0102030666', 'Admin simplon', 'Admin', '2024-04-04 00:00:00', 'admin@admin.fr');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `Choice_Vercors_Night_FK` FOREIGN KEY (`id_night`) REFERENCES `vercors_night` (`id_night`),
  ADD CONSTRAINT `Choice_Vercors_Resa0_FK` FOREIGN KEY (`id_resa`) REFERENCES `vercors_resa` (`id_resa`);

--
-- Contraintes pour la table `come`
--
ALTER TABLE `come`
  ADD CONSTRAINT `Come_Vercors_Pass_FK` FOREIGN KEY (`id_pass`) REFERENCES `vercors_pass` (`id_pass`),
  ADD CONSTRAINT `Come_Vercors_Resa0_FK` FOREIGN KEY (`id_resa`) REFERENCES `vercors_resa` (`id_resa`);

--
-- Contraintes pour la table `vercors_resa`
--
ALTER TABLE `vercors_resa`
  ADD CONSTRAINT `Vercors_Resa_Vercors_User_FK` FOREIGN KEY (`id_user`) REFERENCES `vercors_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
