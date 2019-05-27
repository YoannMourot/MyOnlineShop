-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 mai 2019 à 20:13
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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `shopid`, `name`) VALUES
(40, 29, 'Geforce'),
(42, 29, 'Titan');

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
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `shopid`, `category`, `name`, `description`, `price`, `picture1`, `picture2`, `picture3`, `quantity`, `moreinfo`) VALUES
(81, 29, 40, 'RTX 2080', 'La carte graphique GeForce RTXTM 2080 sappuie sur la toute nouvelle architecture NVIDIA Turing™ et offre des jeux dun réalisme époustouflant ainsi quune vitesse une efficacité énergétique et une immersion sans égales. Elle réinvente tout simplement les graphismes. Préparez-vous à jouer avec RTX.', 840, 'wQkT7xJZBHMourot22itemimg81number1shopid29.jpg', 'O03GwzkvFpMourot22itemimg81number2shopid29.jpg', 'VV51EUD7sXMourot22itemimg81number3shopid29.jpg', 1, NULL),
(82, 29, 40, 'RTX 2060', 'La carte graphique GeForce RTXTM 2060 sappuie sur la toute nouvelle architecture NVIDIA Turing™ et offre des jeux dun réalisme époustouflant ainsi quune vitesse une efficacité énergétique et une immersion sans égales. Elle réinvente tout simplement les graphismes. Préparez-vous à jouer avec RTX.', 480, 'MwIORMjqDTMourot22itemimg82number1shopid29.jpg', '6xGbUSJcL2Mourot22itemimg82number2shopid29.jpg', NULL, 1, NULL),
(83, 29, 42, 'Titan X', 'La carte graphique GeForce RTXTM 2060 sappuie sur la toute nouvelle architecture NVIDIA Turing™ et offre des jeux dun réalisme époustouflant ainsi quune vitesse une efficacité énergétique et une immersion sans égales. Elle réinvente tout simplement les graphismes. Préparez-vous à jouer avec RTX.', 1200, 'y1pTqlU4UQMourot22itemimg83number1shopid29.jpg', 'bfTDDckz2VMourot22itemimg83number2shopid29.jpg', NULL, 1, 'Cette année encore, Nvidia nous fait le coup de la Titan X après nous avoir fortement secoué avec une GTX 1080 impressionnante. Mais, la carte très haut de gamme, qui vient d’être dévoilée, dépasse l’entendement…\r\n\r\nReprenant le design extérieur des 1070 et 1080, dans une belle couleur noire, la « plus grosse carte graphique jamais conçue », comme l’appelle Nvidia, embarque un total de… 12 milliards de transistors. Vertigineux ! Elle s’offre également 12 Go de mémoire GDDR5X, la même que celle embarquée dans la GTX 1080, mais avec une bande passante de 480 Go/s. Et, comme si tout cela ne suffisait pas, elle a été conçue spécialement pour pouvoir être overclockée, ce qui explique peut-être que la fréquence du processeur soit inférieure à celle de la GTX 1080.');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`shopid`, `userid`, `name`, `headerpresent`, `headercolor`, `shoplogo`, `navbarpresent`, `aboutuspresent`, `aboutustext`, `aboutuspicture`, `status`, `creation_date`) VALUES
(29, 22, 'Nvidia shop', 1, '#34b825', '0Ywv19EzfJMourot22shoplogo29.jpg', 1, 1, 'Nvidias invention of the GPU.\r\nIn 1999 sparked the growth of the PC gaming market, redefined modern computer graphics, and revolutionized parallel computing. More recently, GPU deep learning ignited modern AI — the next era of computing — with the GPU acting as the brain of computers, robots, and self-driving cars that can perceive and understand the world.', 'ATYr8OYMFGMourot22aboutuspicture29.jpg', 'online', '2019-05-27 21:33:57');

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
(22, 'Mourot', 'Yoann', 'MourotVrDPoUV5NV.jpg', '$2y$10$nfG.W3gk/WF4tt7JN5TGfuT4WZsw.k3inLy8.MZzbpbGcHRwxrwXG', 'yoann.mourot@outlook.fr', '2019-05-17 17:47:05', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
