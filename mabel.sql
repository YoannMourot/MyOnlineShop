-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 mai 2019 à 14:45
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mabel`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `shopid`, `name`) VALUES
(26, 25, 'test'),
(16, 25, 'tour gamer');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `picture1` varchar(255) DEFAULT NULL,
  `picture2` varchar(255) DEFAULT NULL,
  `picture3` varchar(255) DEFAULT NULL,
  `quantity` smallint(6) NOT NULL DEFAULT '1',
  `moreinfo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `shopid`, `category`, `name`, `description`, `price`, `picture1`, `picture2`, `picture3`, `quantity`, `moreinfo`) VALUES
(39, 25, 16, 'gtx 2080 TI 8go', NULL, NULL, 'xahmzAmzijMourot22itemimg39number1shopid25.jpg', NULL, NULL, 1, NULL),
(60, 25, 16, 'fzefez', NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `shops`
--

DROP TABLE IF EXISTS `shops`;
CREATE TABLE IF NOT EXISTS `shops` (
  `shopid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `headerpresent` tinyint(1) NOT NULL DEFAULT '1',
  `headercolor` varchar(255) NOT NULL DEFAULT '#283F6D',
  `shoplogo` varchar(255) NOT NULL DEFAULT 'shoplogo.png',
  `navbarpresent` tinyint(1) DEFAULT '1',
  `aboutuspresent` tinyint(1) NOT NULL DEFAULT '1',
  `aboutustext` text,
  `aboutuspicture` varchar(255) DEFAULT 'aboutuspicture.png',
  `status` varchar(255) NOT NULL DEFAULT 'offline',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`shopid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`shopid`, `userid`, `name`, `headerpresent`, `headercolor`, `shoplogo`, `navbarpresent`, `aboutuspresent`, `aboutustext`, `aboutuspicture`, `status`, `creation_date`) VALUES
(25, 22, 'phonshop', 1, '#283F6D', 'UxYV7txZXoMourot22shoplogo25.jpg', 1, 1, 'Bienvenue sur ma boutique', '7nIiF0AWvBMourot22aboutuspicture25.png', 'offline', '2019-05-21 12:52:45');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `profilepic` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `inscription_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `profilepic`, `password`, `mail`, `inscription_date`, `token`) VALUES
(22, 'Mourot', 'Yoann', 'MourotiMZM8rmIEs.jpg', '$2y$10$nfG.W3gk/WF4tt7JN5TGfuT4WZsw.k3inLy8.MZzbpbGcHRwxrwXG', 'yoann.mourot@outlook.fr', '2019-05-17 17:47:05', ''),
(23, 'gggggg', 'ggggg', NULL, '$2y$10$FBsqxv8mXv8V9hplR1Km9eZvLbgNVOw2xVt1U8ViDlw1HCasjEMHW', 'test@free.fr', '2019-05-18 18:09:22', NULL),
(24, 'ddddddddd', 'dddddd', NULL, '$2y$10$cNAUm04U6IXkTttPXA92r.fEe68QSsXgzTVS9IYfFaqHIAhVZjHuO', 'yoann.mourot1@gmai.com', '2019-05-18 18:20:26', NULL),
(25, 'ddddddddd', 'dddddd', NULL, '$2y$10$.qG9WzOe9iTdyhalZGSP8.nQmREu2svIEeqLLBkMdeUQ1ckHOypjS', 'yoann.mourot3@gmail.com', '2019-05-18 19:28:57', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
