-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 07 Octobre 2013 à 21:57
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `mlg`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `nomcategories` varchar(50) NOT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`idcat`, `nomcategories`) VALUES
(1, 'Seniors'),
(2, '-18 ans');

-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE IF NOT EXISTS `clubs` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `nomdirigeant` varchar(50) NOT NULL,
  `prenomdirigeant` varchar(50) NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`idc`, `nom`, `ville`, `nomdirigeant`, `prenomdirigeant`) VALUES
(1, 'Developpeur', 'E204', 'Dondelinger', 'Eric'),
(2, 'Réseau', 'E203', 'Gauthier', 'Pierre-Yves');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `user` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`user`, `mdp`, `mail`, `nom`, `prenom`) VALUES
('toto', 'toto', 'toto@toto.toto', 'toto', 'toto');

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

CREATE TABLE IF NOT EXISTS `inscrire` (
  `datei` date NOT NULL,
  `idc` int(11) NOT NULL,
  `idj` int(11) NOT NULL,
  PRIMARY KEY (`datei`,`idc`,`idj`),
  KEY `idc` (`idc`),
  KEY `idj` (`idj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscrire`
--

INSERT INTO `inscrire` (`datei`, `idc`, `idj`) VALUES
('2013-10-07', 1, 1),
('2013-10-07', 1, 3),
('2013-10-07', 1, 5),
('2013-10-07', 1, 7),
('2013-10-07', 2, 2),
('2013-10-07', 2, 4),
('2013-10-07', 2, 6),
('2013-10-07', 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE IF NOT EXISTS `joueurs` (
  `idj` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `datenaiss` date NOT NULL,
  `nlicence` varchar(100) NOT NULL,
  `idc` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  PRIMARY KEY (`idj`),
  KEY `idc` (`idc`),
  KEY `idcat` (`idcat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `joueurs`
--

INSERT INTO `joueurs` (`idj`, `nom`, `prenom`, `datenaiss`, `nlicence`, `idc`, `idcat`) VALUES
(1, 'Giroud', 'Gabriel', '1993-05-23', 'ABC4', 1, 1),
(2, 'Touraine', 'Rémi', '1994-08-02', 'AFRG5', 2, 2),
(3, 'Brogniart', 'Sébastien', '1994-09-06', 'FGRT7', 1, 1),
(4, 'Petit-Colas', 'Gaëlle', '1993-02-08', 'TUIOP5', 2, 2),
(5, 'Lamy', 'Charline', '1993-07-26', 'PLUS7', 1, 1),
(6, 'Letondor', 'Kévin', '1994-04-15', 'KLUI9', 2, 2),
(7, 'Clément', 'Alexandre', '1994-12-24', 'YUIS3', 1, 1),
(8, 'Matt', 'Alexandre', '1991-01-01', 'AZERTY5', 2, 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `inscrire_ibfk_1` FOREIGN KEY (`idc`) REFERENCES `clubs` (`idc`),
  ADD CONSTRAINT `inscrire_ibfk_2` FOREIGN KEY (`idj`) REFERENCES `joueurs` (`idj`);

--
-- Contraintes pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD CONSTRAINT `joueurs_ibfk_1` FOREIGN KEY (`idc`) REFERENCES `clubs` (`idc`),
  ADD CONSTRAINT `joueurs_ibfk_2` FOREIGN KEY (`idcat`) REFERENCES `categories` (`idcat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
