-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Août 2016 à 12:33
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blablalunch`
--
CREATE DATABASE IF NOT EXISTS `blablalunch` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blablalunch`;

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `owner` varchar(100) NOT NULL,
  `time` time NOT NULL,
  `seats` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `cars`:
--   `restaurant_id`
--       `restaurants` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `participants`:
--

-- --------------------------------------------------------

--
-- Structure de la table `participations`
--

CREATE TABLE `participations` (
  `participant_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `participations`:
--   `car_id`
--       `cars` -> `id`
--   `participant_id`
--       `participants` -> `id`
--

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

CREATE TABLE `restaurants` (
  `name` varchar(100) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS POUR LA TABLE `restaurants`:
--

--
-- Contenu de la table `restaurants`
--

INSERT INTO `restaurants` (`name`, `address`, `id`) VALUES
('Cube', NULL, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participations`
--
ALTER TABLE `participations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `participant_id` (`participant_id`),
  ADD UNIQUE KEY `car_id` (`car_id`);

--
-- Index pour la table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `car_with_restaurant` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participations`
--
ALTER TABLE `participations`
  ADD CONSTRAINT `participation_with_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `participation_with_participant` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
