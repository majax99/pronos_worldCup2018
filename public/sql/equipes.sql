-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 17 mai 2018 à 23:28
-- Version du serveur :  10.1.30-MariaDB
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
-- Base de données :  `prono_worldcup2018`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rang` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`id`, `nom`, `pays`, `rang`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Die Mannschaft', 'Allemagne', 1, 'F', NULL, NULL),
(2, 'Auriverdes', 'Bresil', 2, 'E', NULL, NULL),
(3, 'Las Quinas', 'Portugal', 4, 'B', NULL, NULL),
(4, 'La Albiceleste', 'Argentine', 5, 'D', NULL, NULL),
(5, 'Les diables rouges', 'Belgique', 3, 'G', NULL, NULL),
(6, 'la roja', 'Espagne', 8, 'B', NULL, NULL),
(7, 'Biale Orly', 'Pologne', 10, 'H', NULL, NULL),
(8, 'La Nati', 'Suisse', 6, 'E', NULL, NULL),
(9, 'Les tricolores', 'France', 7, 'C', NULL, NULL),
(10, 'Viva vodka', 'Russie', 66, 'A', NULL, NULL),
(11, 'La Selecion Inca', 'Perou', 11, 'C', NULL, NULL),
(12, 'Danish Dynamite', 'Danemark', 12, 'C', NULL, NULL),
(13, 'Plata o plomo', 'Colombie', 16, 'H', NULL, NULL),
(14, 'The Three Lions', 'Angleterre', 13, 'G', NULL, NULL),
(15, 'El Tri', 'Mexique', 15, 'F', NULL, NULL),
(16, 'Kockasti', 'Croatie', 18, 'D', NULL, NULL),
(17, 'Blagult', 'Suede', 23, 'F', NULL, NULL),
(18, 'La celeste', 'Uruguay', 17, 'A', NULL, NULL),
(19, 'Strakarnir okkar', 'Islande', 22, 'D', NULL, NULL),
(20, 'Les Lions de la Teranga', 'Senegal', 28, 'H', NULL, NULL),
(21, 'Los Ticos', 'Costa_Rica', 25, 'E', NULL, NULL),
(22, 'Les aigles de Carthage', 'Tunisie', 14, 'G', NULL, NULL),
(23, 'Les pharaons', 'Egypte', 46, 'A', NULL, NULL),
(24, 'Les lions de Perse', 'Iran', 36, 'B', NULL, NULL),
(25, 'Beli Orlovi', 'Serbie', 35, 'E', NULL, NULL),
(26, 'Socceroos', 'Australie', 40, 'C', NULL, NULL),
(27, 'Les lions de l\'atlas', 'Maroc', 42, 'B', NULL, NULL),
(28, 'Super eagles', 'Nigeria', 47, 'D', NULL, NULL),
(29, 'Les samourais bleus', 'Japon', 60, 'H', NULL, NULL),
(30, 'Los canaleros', 'Panama', 55, 'G', NULL, NULL),
(31, 'Les Guerriers Taegeuk', 'Coree_du_sud', 61, 'F', NULL, NULL),
(32, 'Les fils du désert', 'Arabie_Saoudite', 67, 'A', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
