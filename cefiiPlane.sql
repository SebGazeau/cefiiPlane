-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 14 fév. 2019 à 16:00
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cefiiplane`
--

-- --------------------------------------------------------

--
-- Structure de la table `black_box`
--

DROP TABLE IF EXISTS `black_box`;
CREATE TABLE IF NOT EXISTS `black_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` float NOT NULL,
  `on_off` tinyint(1) NOT NULL,
  `speed` float NOT NULL,
  `take_off` tinyint(1) NOT NULL,
  `altitude` float NOT NULL,
  `fuel_level` float NOT NULL,
  `crash` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_flight` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `black_box_user_FK` (`id_user`),
  KEY `black_box_flight0_FK` (`id_flight`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `flight`
--

DROP TABLE IF EXISTS `flight`;
CREATE TABLE IF NOT EXISTS `flight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flight_user_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `flight`
--

INSERT INTO `flight` (`id`, `id_user`) VALUES
(3, 1),
(5, 1),
(4, 2),
(6, 2),
(15, 7),
(16, 7),
(17, 7),
(18, 7),
(19, 7),
(20, 9);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flight_time` float NOT NULL,
  `distance` float NOT NULL,
  `score` float NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `score_user_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `flight_time`, `distance`, `score`, `id_user`) VALUES
(1, 321, 15679, 16000, 1),
(2, 12345, 24534, 36879, 1),
(3, 12, 23, 35, 1),
(4, 134, 3412520, 3412660, 5),
(5, 3746, 5157, 8903, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `access`) VALUES
(1, 'Toto', 'fzqrfzrg', 'gfrzgqrgre', 0),
(2, 'BIBI', 'regrgetg', 'zhrreyhjye', 0),
(5, 'Fourbe', 'gas.f@spirou.fr', 'Ry4321', 0),
(6, 'guido', 'gasut.f@spiroU.fr', 'Ry4321', 0),
(7, 'youir', 'ervg@bjir.fr', 'Rd1234', 0),
(8, 'youir', 'erGg@bjir.fr', 'Rd1234', 0),
(9, 'youir', 'erPg@bjir.fr', 'Rd1234', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `black_box`
--
ALTER TABLE `black_box`
  ADD CONSTRAINT `black_box_flight0_FK` FOREIGN KEY (`id_flight`) REFERENCES `flight` (`id`),
  ADD CONSTRAINT `black_box_user_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_user_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_user_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
