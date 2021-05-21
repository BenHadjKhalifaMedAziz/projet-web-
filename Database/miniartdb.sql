-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 avr. 2021 à 04:14
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `miniartdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `idAd` int(11) NOT NULL,
  `nomAd` varchar(30) NOT NULL,
  `nomutAd` varchar(30) NOT NULL,
  `passAd` varchar(50) NOT NULL,
  `emailAd` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`idAd`, `nomAd`, `nomutAd`, `passAd`, `emailAd`) VALUES
(1, 'Hamzix', 'hamza', '123', 'hamza@miniart.tn');

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

CREATE TABLE `reclamations` (
  `codeRec` int(11) NOT NULL,
  `nompRec` varchar(30) NOT NULL,
  `titreRec` varchar(30) NOT NULL,
  `descRec` varchar(100) NOT NULL,
  `dateRec` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclamations`
--

INSERT INTO `reclamations` (`codeRec`, `nompRec`, `titreRec`, `descRec`, `dateRec`) VALUES
(1, 'Hamza Ghariani', 'Reclamation Service', 'Jawek Behy Papie Lebes Aalikee?', '19/04/2021'),
(2, 'Fathi Fatou7a', 'Service Client', 'Aysh Wkhay', '19/04/2021'),
(11, 'Samir samour', 'Reclamation Service', 'Haja du luxe', '19/04/2021'),
(12, 'hbib', 'reclamation arduino', 'mrigle', '19/04/2021'),
(14, 'hamza fifa', 'Reclamation SiteWeb', 'lberah mahabesh yekhdem', '19/04/2021');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nomUt` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomPrenom` varchar(30) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `verifier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table utilisateurs de miniartdb';

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nomUt`, `pass`, `email`, `nomPrenom`, `pays`, `adresse`, `tel`, `sexe`, `verifier`) VALUES
(2, 'HamzaFiFa1', 'hahahah', 'bou7e7mid@gmail.com', 'hamza gr', 'Afghanistan', 'ds', '0101010', 'f', 0),
(3, 'hamza ghar', '0101', 'bou7e7mid@gmail.com', 'hamza', 'Afghanistan', 'halza', '29005664', 'f', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`idAd`);

--
-- Index pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`codeRec`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `idAd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `codeRec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
