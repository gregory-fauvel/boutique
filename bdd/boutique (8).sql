-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 avr. 2020 à 08:06
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
-- Base de données :  `boutique`
--
CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `boutique`;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(60) NOT NULL,
  `commentaires` text NOT NULL,
  `dateavis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `id_utilisateur`, `id_produit`, `commentaires`, `dateavis`) VALUES
(8, 6, 52, 'SUPER BON J aime JYFGLIYFILUYFGIUFYGUKFKUF', '2020-04-10 09:41:42'),
(9, 4, 55, 'TRES BON', '2020-04-14 14:11:46');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prixproduit` int(11) NOT NULL,
  `quantiteproduit` int(11) NOT NULL,
  `prixglobal` int(11) NOT NULL,
  `dateajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_utilisateur`, `id_produit`, `prixproduit`, `quantiteproduit`, `prixglobal`, `dateajout`) VALUES
(148, 6, 50, 30, 2, 60, '2020-04-16 14:39:24'),
(150, 6, 56, 30, 1, 30, '2020-04-16 14:46:00'),
(151, 4, 54, 30, 1, 30, '2020-04-17 07:56:55');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `datepanier` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prixtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=273 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_utilisateur`, `id_produit`, `datepanier`, `prixtotal`) VALUES
(271, 6, 50, '2020-04-16 14:39:47', 60),
(272, 6, 56, '2020-04-16 14:46:03', 90);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomproduit` varchar(255) NOT NULL,
  `prixproduit` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `souscategories` varchar(255) NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nomproduit`, `prixproduit`, `description`, `image`, `categories`, `souscategories`, `datecreation`) VALUES
(52, 'noire', 116, 'photos', 'black_1.jpg', '2', 'noir', '2020-04-09 12:04:25'),
(51, 'the concentrer', 110, 'Un melange magique', 'sachet1.jpg', '1', 'sachet', '2020-04-09 12:04:00'),
(50, 'fete blanc', 25, 'Pret pour les fete ?', 'blanc.jpg', '2', 'blanc', '2020-04-09 12:03:36'),
(53, 'the cyan', 30, 'the ceylon noir', 'noirthe.jpg', '1', 'boite', '2020-04-14 13:04:45'),
(54, 'bleu', 30, 'thehiere bleu', 'bleu.jpg', '2', 'noir', '2020-04-14 13:04:50'),
(55, 'lipton', 30, 'test', 'boite1.jpg', '1', 'boite', '2020-04-09 12:03:36'),
(57, 'jasmin', 110, 'du jasmin au reveil', 'jasm.jpg', '1', 'sachet', '2020-04-09 12:04:00'),
(58, 'the rouge', 12, 'the rouge magique', '4.jpg', '1', 'sachet', '2020-04-17 07:58:20');

-- --------------------------------------------------------

--
-- Structure de la table `souscategories`
--

DROP TABLE IF EXISTS `souscategories`;
CREATE TABLE IF NOT EXISTS `souscategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produits` int(11) NOT NULL,
  `prixproduit` int(11) NOT NULL,
  `prixtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codepostal` text NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `password`, `adresse`, `codepostal`, `email`) VALUES
(4, 'admin', 'nom', 'prenom', '$2y$12$qu49iEvw0BODZyJgrnOdK.8bXztKkMCA09C8qHb6ZrFfSZ/RlzJdC', 'admin', '13010', 'fauvel411@gmail.com'),
(2, 'test', '', '', '$2y$12$gZFEsWq1gVYvpXnPJ0lnTejlaYP03oozPp/AobSaTE3f30A4mwnuC', '', '', ''),
(3, 'luc', '', '', '$2y$12$xw3YtvUtJtsnxSifl1M8y.4ko/4Z/bz.5/AmwidRNgrlzYBgHAN.y', '', '', 'az@tlr.com'),
(5, 'test2', 'nom', 'prenom', '$2y$12$GUEpKi9iH8WWqYcDCHK8cOX8tKTbB81ggr/SgDcblu1jD6UK7XZYS', 'admin', '13012', 'fauvel411@gmail.com'),
(6, 'titi', 'nom', 'prenom', '$2y$12$cIg683PwlRW.aL93TEc1kux/5gkwIql31an1SBRia51jRzDNSda26', 'admin', '13012', 'fauvel411@gmail.com'),
(7, 'toto', 'nom', 'prenom', '$2y$12$gll84HTL4q3JEcWv4xXAoOfVBla085g6P/2RQSt7hLjnYdhPG0hAC', 'fsdfsqfsqf', '131313', 'adqsro@hotmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
