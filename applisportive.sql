-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 02 mars 2020 à 22:34
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `applisportive`
--

-- --------------------------------------------------------

--
-- Structure de la table `assos_user_prog`
--

DROP TABLE IF EXISTS `assos_user_prog`;
CREATE TABLE IF NOT EXISTS `assos_user_prog` (
  `id_user` int(11) NOT NULL,
  `id_prog` int(11) NOT NULL,
  KEY `id_user` (`id_user`,`id_prog`),
  KEY `id_prog` (`id_prog`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `assos_user_prog`
--

INSERT INTO `assos_user_prog` (`id_user`, `id_prog`) VALUES
(1, 2),
(1, 2),
(1, 3),
(2, 3),
(3, 2),
(4, 1),
(5, 2),
(6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `id_prog` int(50) NOT NULL AUTO_INCREMENT,
  `typeprogramme` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prog`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `programme`
--

INSERT INTO `programme` (`id_prog`, `typeprogramme`) VALUES
(1, 'forme'),
(2, 'tonic'),
(3, 'esthetique');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `mdp`) VALUES
(1, 'romain', '123'),
(2, 'mathis', '159'),
(3, 'lolo', '321'),
(4, 'julia', '596'),
(5, 'laure', 'flemal'),
(6, 'amandine', 'danse');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assos_user_prog`
--
ALTER TABLE `assos_user_prog`
  ADD CONSTRAINT `assos_user_prog_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `assos_user_prog_ibfk_2` FOREIGN KEY (`id_prog`) REFERENCES `programme` (`id_prog`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
