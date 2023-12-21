-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 04 août 2023 à 18:22
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voituredb`
--

-- --------------------------------------------------------
drop database if exists voituredb;
create database voituredb;
use voituredb;
--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `telephone`, `date_naissance`) VALUES
(6, 'test2', 'test2', 'test2@gmail.com', '$2y$10$zBprFk9NuhdeHysfCs8khesNNQH4oEcgYOGmq6ao30Qitj/aoBSCe', '878979797', '2023-07-26'),
(7, 'test2', 'test2', 'test2@gmail.com', '$2y$10$2xG45JI1UMzgvhN.OsWi1e6ujNmaQ5Vjgpem8vi3Ag9IjFVTNur2S', '908908080', '2023-07-06'),
(8, 'sanaa', 'sanaa', 'sanaa@gmail.com', '$2y$10$9eSv5ckEYuXIvU.TjqigeuU1Kkf9QalFBDeTUWAoI63idLIrf9FYm', '514234567890-', '2019-12-28'),
(9, 'bernard', 'bernard', 'bernard@gmail.com', '$2y$10$FSrcpEMvAZ1BqiSPZnX5muwVzmAs6gixBlYPGsNckefjFEHtEStHq', '5143456789', '2000-10-01');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `email`, `mot_de_passe`, `telephone`, `date_naissance`) VALUES
(12, 'sanaa', 'sanaa', 'sanaa@gmail.com', '1234', '5144567890', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

CREATE TABLE `voitures` (
  `idVoiture` int(30) NOT NULL,
  `marque` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `Annee` int(11) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`idVoiture`, `marque`, `model`, `Annee`, `prix`, `quantite`, `description`, `image`) VALUES
(11, ' Tesla Model Y  ', 'Model Y  - LONG RANGE', 2023, '79900', 17, 'Caméra 360, système de surveillance des angles morts, sièges chauffants, régulateur de vitesse adaptatif, climatisation 2 zones, traction intégrale, toit à vision panoramique.\r\nAvec plus de 2000 véhicules en inventaire, Automobile en Direct, c\'est un vaste inventaire de véhicules d\'occasion, avec toutes les marques et tous les modèles offerts au meilleur rapport qualité/prix sur le marché.\r\n\r\n', 'teslaY.jpeg'),
(13, 'TOYOTA Prius', 'Prius Prime SE', 2023, '385450', 33, '', '5.png'),
(15, 'TOYOTA Hybrid', ' Camry Hybrid LE', 2023, '34567', 20, '', 'toyotaH.JPEG'),
(22, 'Hyundai  Kona', 'Ev - Trims', 2023, '49699', 40, '', 'hyundai.jpeg'),
(444, 'Renault Arkana', 'SUV hybrid', 2022, '43890', 10, '', 'renault.jpeg'),
(555, 'Ford Motor ', 'NYSE: F', 2023, '40000', 12, 'The first all-electric Ford is a sports car; or performance SUV, called the Mach 1. Notably, Ford plans rollout the Mach 1 next year. The Verge describes the Mach 1 as “a Mustang-style crossover” and “the flagship of Ford’s electric fleet.”', 'ford.jpeg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`idVoiture`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `idVoiture` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8981937;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
