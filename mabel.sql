-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 mai 2019 à 17:27
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `shopid`, `name`) VALUES
(26, 25, 'test'),
(16, 25, 'tour gamer'),
(29, 27, 'Gefore'),
(30, 27, 'Titan');

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
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `shopid`, `category`, `name`, `description`, `price`, `picture1`, `picture2`, `picture3`, `quantity`, `moreinfo`) VALUES
(39, 25, 16, 'gtx 2080 TI 8go', NULL, NULL, 'xahmzAmzijMourot22itemimg39number1shopid25.jpg', NULL, NULL, 1, 'ezfzefzefzefzef fzezefze ffefz'),
(63, 27, 29, 'Gtx 2060', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(62, 25, 16, 'lampe de poche', NULL, 200, 'Ig85JEBACbMourot22itemimg62number1shopid25.jpeg', 'zCjDAkZm6jMourot22itemimg62number2shopid25.jpg', 'ecRa9n6LMkMourot22itemimg62number3shopid25.PNG', 1, NULL),
(65, 27, 29, 'Gtx 2080', 'La toute nouvelle carte graphique NVIDIA est une révolution tant dans le réalisme que dans les performances de vos jeux. Sa puissante architecture NVIDIA Turing™ , ses technologies à couper le souffle et sa mémoire GDDR6 de 11 Go nouvelle génération en font le système GPU ultime en matière de jeux. Préparez-vous à jouer avec RTX.', 839, 'lMSGiiOHoOMourot22itemimg65number1shopid27.jpg', 'O0oXmkMGOZMourot22itemimg65number2shopid27.jpg', 'N3HcIsllBUMourot22itemimg65number3shopid27.jpg', 1, 'New features in the NVIDIA RTX Series\r\n\r\nRTX series architectural upgrades are groundbreaking. When comparing the RTX series cards to one of GTX series, nearly all aspects have been improved. The main new technology used in GeForce RTX 2080 and other RTX series graphics cards is branded as NVIDIA Turing architecture. In comparison, the previous generation of NVIDIA graphics cards used Pascal architecture. Turing microarchitecture allows for many enhancements and new technologies, listed in more detail below.\r\n\r\nMore CUDA cores equals more power\r\nThe CUDA application programming interface provides programming methods to increase performance and speed of graphics processing. CUDA cores process graphics and the more there are, the more asynchronous operations can be performed. The new RTX Series cards are going to take advantage of Turing capabilities allowing for even 2x better performance in all existing titles when it comes to CUDA and rasterization.\r\n\r\nRaytracing produces beautiful shadows and reflections\r\nThe new RTX series cards have specific RT cores just for computing ray tracing technology. RT cores calculate reflections, shadows, and refractions much faster and more efficiently than before. This is due to more processing power allowed for the specific processes, as the predecessors used less efficient raster techniques like depth maps or cube maps. Turing Ray Tracing is approximately 8x more efficient when compared to Pascal architecture.\r\n\r\nTensor cores take advantage of NVIDIA supercomputers\r\nNVIDIA RTX series cards contain Tensor cores that accelerate generation of final images. This means the Tensor cores will be making calculations while an image renders, filling in blanks as the partial image is generated. The cores are able to do this as a result of deep learning on Nvidia supercomputers. The RTX series cards can contact supercomputers to make calculations, after which the results are delivered “over the air” to the user.\r\n\r\n'),
(66, 27, 30, 'Titan Z', NULL, NULL, NULL, NULL, NULL, 1, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`shopid`, `userid`, `name`, `headerpresent`, `headercolor`, `shoplogo`, `navbarpresent`, `aboutuspresent`, `aboutustext`, `aboutuspicture`, `status`, `creation_date`) VALUES
(25, 22, 'phonshop', 1, '#283F6D', 'nxGOQeqNkzMourot22shoplogo25.jpg', 1, 1, 'Bienvenue sur ma boutique ceci est la boutique de texte et ceci est le lorem : Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'MEWuDtCHWAMourot22aboutuspicture25.jpeg', 'offline', '2019-05-21 12:52:45'),
(27, 22, 'Nvidia store', 1, '#283F6D', 'd3MlKp8xXAMourot22shoplogo27.png', 1, 1, NULL, 'GUsfomLga7Mourot22aboutuspicture27.jpg', 'offline', '2019-05-24 18:58:23');

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
