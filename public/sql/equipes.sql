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
(1, 'Die Mannschaft', 'Allemagne', 1, NULL, NULL, NULL),
(2, 'Auriverdes', 'Bresil', 2, NULL, NULL, NULL),
(3, 'Las Quinas', 'Portugal', 3, NULL, NULL, NULL),
(4, 'La Albiceleste', 'Argentine', 4, NULL, NULL, NULL),
(5, 'Les diables rouges', 'Belgique', 5, NULL, NULL, NULL),
(6, 'la roja', 'Espagne', 6, NULL, NULL, NULL),
(7, 'Biale Orly', 'Pologne', 7, NULL, NULL, NULL),
(8, 'La Nati', 'Suisse', 8, NULL, NULL, NULL),
(9, 'Les tricolores', 'France', 9, NULL, NULL, NULL),
(10, 'Viva vodka', 'Russie', 10, NULL, NULL, NULL),
(11, 'La Selecion Inca', 'Perou', 11, NULL, NULL, NULL),
(12, 'Danish Dynamite', 'Danemark', 12, NULL, NULL, NULL),
(13, 'Plata o plomo', 'Colombie', 13, NULL, NULL, NULL),
(14, 'The Three Lions', 'Angleterre', 14, NULL, NULL, NULL),
(15, 'El Tri', 'Mexique', 15, NULL, NULL, NULL),
(16, 'Kockasti', 'Croatie', 16, NULL, NULL, NULL),
(17, 'Blagult', 'Suede', 17, NULL, NULL, NULL),
(18, 'La celeste', 'Uruguay', 18, NULL, NULL, NULL),
(19, 'Strakarnir okkar', 'Islande', 19, NULL, NULL, NULL),
(20, 'Les Lions de la Teranga', 'Senegal', 20, NULL, NULL, NULL),
(21, 'Los Ticos', 'Costa_Rica', 21, NULL, NULL, NULL),
(22, 'Les aigles de Carthage', 'Tunisie', 22, NULL, NULL, NULL),
(23, 'Les pharaons', 'Egypte', 23, NULL, NULL, NULL),
(24, 'Les lions de Perse', 'Iran', 24, NULL, NULL, NULL),
(25, 'Beli Orlovi', 'Serbie', 25, NULL, NULL, NULL),
(26, 'Socceroos', 'Australie', 26, NULL, NULL, NULL),
(27, 'Les lions de l\'atlas', 'Maroc', 27, NULL, NULL, NULL),
(28, 'Super eagles', 'Nigeria', 28, NULL, NULL, NULL),
(29, 'Les samourais bleus', 'Japon', 29, NULL, NULL, NULL),
(30, 'Los canaleros', 'Panama', 30, NULL, NULL, NULL),
(31, 'Les Guerriers Taegeuk', 'Coree_du_sud', 31, NULL, NULL, NULL),
(32, 'Les fils du désert', 'Arabie_Saoudite', 32, NULL, NULL, NULL);

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
