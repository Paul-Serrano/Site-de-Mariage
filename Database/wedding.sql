-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 fév. 2022 à 19:31
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wedding`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `heure` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `type0` varchar(25) DEFAULT NULL,
  `type1` varchar(25) DEFAULT NULL,
  `type2` varchar(25) DEFAULT NULL,
  `type3` varchar(25) DEFAULT NULL,
  `type4` varchar(25) DEFAULT NULL,
  `type5` varchar(25) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `sideGuest_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `src` varchar(250) NOT NULL,
  `tagPhase` varchar(50) NOT NULL,
  `tagUser0` varchar(50) DEFAULT NULL,
  `tagUser1` varchar(50) DEFAULT NULL,
  `tagUser2` varchar(50) DEFAULT NULL,
  `tagUser3` varchar(50) DEFAULT NULL,
  `tagUser4` varchar(50) DEFAULT NULL,
  `tagUser5` varchar(50) DEFAULT NULL,
  `tagUser6` varchar(50) DEFAULT NULL,
  `tagUser7` varchar(50) DEFAULT NULL,
  `tagUser8` varchar(50) DEFAULT NULL,
  `tagUser9` varchar(50) DEFAULT NULL,
  `tagUser10` varchar(50) DEFAULT NULL,
  `tagUser11` varchar(50) DEFAULT NULL,
  `tagUser12` varchar(50) DEFAULT NULL,
  `tagUser13` varchar(50) DEFAULT NULL,
  `tagUser14` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `sideGuest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sideguest`
--

CREATE TABLE `sideguest` (
  `sideGuest_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `style` varchar(25) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `adress` varchar(50) NOT NULL,
  `housing` varchar(50) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `housing` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `id` (`id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Index pour la table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `id` (`id`),
  ADD KEY `sideGuest_id` (`sideGuest_id`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `id` (`id`),
  ADD KEY `sideGuest_id` (`sideGuest_id`);

--
-- Index pour la table `sideguest`
--
ALTER TABLE `sideguest`
  ADD PRIMARY KEY (`sideGuest_id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sideguest`
--
ALTER TABLE `sideguest`
  MODIFY `sideGuest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`photo_id`);

--
-- Contraintes pour la table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `food_ibfk_2` FOREIGN KEY (`sideGuest_id`) REFERENCES `sideguest` (`sideGuest_id`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `photo_ibfk_2` FOREIGN KEY (`sideGuest_id`) REFERENCES `sideguest` (`sideGuest_id`);

--
-- Contraintes pour la table `sideguest`
--
ALTER TABLE `sideguest`
  ADD CONSTRAINT `sideguest_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
