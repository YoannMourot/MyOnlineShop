-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 17 mai 2019 à 15:38
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.2.1

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
-- Structure de la table `shops`
--

CREATE TABLE `shops` (
  `shopid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `headerpresent` tinyint(1) NOT NULL DEFAULT '1',
  `headercolor` varchar(255) NOT NULL DEFAULT '#283F6D',
  `logoimg` varchar(255) NOT NULL DEFAULT 'Mabel_logo.svg',
  `about_uspresent` tinyint(1) NOT NULL DEFAULT '1',
  `about_us_text` text,
  `about_us_img` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'offline',
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`shopid`, `userid`, `name`, `headerpresent`, `headercolor`, `logoimg`, `about_uspresent`, `about_us_text`, `about_us_img`, `status`, `creation_date`) VALUES
(1, 0, 'frefref', 1, '#283F6D', 'Mabel_logo.svg', 1, NULL, NULL, 'offline', '2019-05-14 18:54:06'),
(2, 0, 'fzefzefze', 1, '#283F6D', 'Mabel_logo.svg', 1, NULL, NULL, 'offline', '2019-05-14 18:58:13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `profilepic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `inscription_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `profilepic`, `password`, `mail`, `inscription_date`, `token`) VALUES
(21, 'Mourot', 'Yoann', '', '$2y$10$8M/sFddObY2cq9G3k1Rfc.SdceFcmWXUNTmvcmjWhIky/7HxgZCFq', 'yoann.mourot@outlook.fr', '2019-05-14 16:45:07', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shopid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `shops`
--
ALTER TABLE `shops`
  MODIFY `shopid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
