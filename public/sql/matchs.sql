-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 17 mai 2018 à 23:27
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
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipe1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipe2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resultat1` int(11) DEFAULT NULL,
  `resultat2` int(11) DEFAULT NULL,
  `score_id` int(11) DEFAULT NULL,
  `phase` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_match` datetime NOT NULL,
  `lieu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chaine_TV` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`id`, `equipe1`, `equipe2`, `type`, `resultat1`, `resultat2`, `score_id`, `phase`, `date_match`, `lieu`, `chaine_TV`, `created_at`, `updated_at`) VALUES
(1, 'Russie', 'Arabie_Saoudite', 'Groupe A', NULL, NULL, NULL, 'tour1', '2018-06-14 17:00:00', 'Moscou', 'TF1', NULL, NULL),
(2, 'Egypte', 'Uruguay', 'Groupe A', NULL, NULL, NULL, 'tour1', '2018-06-15 14:00:00', 'Iekaterinbourg', 'Bein', NULL, NULL),
(3, 'Maroc', 'Iran', 'Groupe B', NULL, NULL, NULL, 'tour1', '2018-06-15 17:00:00', 'Saint-Petersbourg', 'Bein', NULL, NULL),
(4, 'Portugal', 'Espagne', 'Groupe B', NULL, NULL, NULL, 'tour1', '2018-06-15 20:00:00', 'Sotchi', 'TF1', NULL, NULL),
(5, 'France', 'Australie', 'Groupe C', NULL, NULL, NULL, 'tour1', '2018-06-16 12:00:00', 'Kazan', 'TF1', NULL, NULL),
(6, 'Argentine', 'Islande', 'Groupe D', NULL, NULL, NULL, 'tour1', '2018-06-16 15:00:00', 'Moscou', 'Bein', NULL, NULL),
(7, 'Perou', 'Danemark', 'Groupe C', NULL, NULL, NULL, 'tour1', '2018-06-16 18:00:00', 'Saransk', 'Bein', NULL, NULL),
(8, 'Croatie', 'Nigeria', 'Groupe D', NULL, NULL, NULL, 'tour1', '2018-06-16 21:00:00', 'Kaliningrad', 'TF1', NULL, NULL),
(9, 'Costa_Rica', 'Serbie', 'Groupe E', NULL, NULL, NULL, 'tour1', '2018-06-17 14:00:00', 'Samara', 'Bein', NULL, NULL),
(10, 'Allemagne', 'Mexique', 'Groupe F', NULL, NULL, NULL, 'tour1', '2018-06-17 17:00:00', 'Moscou', 'TF1', NULL, NULL),
(11, 'Bresil', 'Suisse', 'Groupe E', NULL, NULL, NULL, 'tour1', '2018-06-17 20:00:00', 'Rostov', 'TF1', NULL, NULL),
(12, 'Suede', 'Coree_du_sud', 'Groupe F', NULL, NULL, NULL, 'tour1', '2018-06-18 14:00:00', 'Nijni Novgorod', 'Bein', NULL, NULL),
(13, 'Belgique', 'Panama', 'Groupe G', NULL, NULL, NULL, 'tour1', '2018-06-18 17:00:00', 'Sotchi', 'Bein', NULL, NULL),
(14, 'Tunisie', 'Angleterre', 'Groupe G', NULL, NULL, NULL, 'tour1', '2018-06-18 20:00:00', 'Volgograd', 'TF1', NULL, NULL),
(15, 'Pologne', 'Senegal', 'Groupe H', NULL, NULL, NULL, 'tour1', '2018-06-19 14:00:00', 'Moscou', 'Bein', NULL, NULL),
(16, 'Colombie', 'Japon', 'Groupe H', NULL, NULL, NULL, 'tour1', '2018-06-19 17:00:00', 'Saransk', 'Bein', NULL, NULL),
(17, 'Russie', 'Egypte', 'Groupe A', NULL, NULL, NULL, 'tour2', '2018-06-19 20:00:00', 'Saint-Pétersbourg', 'Bein', NULL, NULL),
(18, 'Portugal', 'Maroc', 'Groupe B', NULL, NULL, NULL, 'tour2', '2018-06-20 14:00:00', 'Moscou', 'Bein', NULL, NULL),
(19, 'Uruguay', 'Arabie_Saoudite', 'Groupe A', NULL, NULL, NULL, 'tour2', '2018-06-20 17:00:00', 'Rostov', 'Bein', NULL, NULL),
(20, 'Iran', 'Espagne', 'Groupe B', NULL, NULL, NULL, 'tour2', '2018-06-20 20:00:00', 'Kazan', 'Bein', NULL, NULL),
(21, 'Danemark', 'Australie', 'Groupe C', NULL, NULL, NULL, 'tour2', '2018-06-21 14:00:00', 'Samara', 'Bein', NULL, NULL),
(22, 'France', 'Perou', 'Groupe C', NULL, NULL, NULL, 'tour2', '2018-06-21 17:00:00', 'Iekaterinbourg', 'TF1', NULL, NULL),
(23, 'Argentine', 'Croatie', 'Groupe D', NULL, NULL, NULL, 'tour2', '2018-06-21 20:00:00', 'Nijni Novgorod', 'TF1', NULL, NULL),
(24, 'Bresil', 'Costa_Rica', 'Groupe E', NULL, NULL, NULL, 'tour2', '2018-06-22 14:00:00', 'Saint-Pétersbourg', 'Bein', NULL, NULL),
(25, 'Nigeria', 'Islande', 'Groupe D', NULL, NULL, NULL, 'tour2', '2018-06-22 17:00:00', 'Volgograd', 'Bein', NULL, NULL),
(26, 'Serbie', 'Suisse', 'Groupe E', NULL, NULL, NULL, 'tour2', '2018-06-22 20:00:00', 'Kaliningrad', 'Bein', NULL, NULL),
(27, 'Belgique', 'Tunisie', 'Groupe G', NULL, NULL, NULL, 'tour2', '2018-06-23 14:00:00', 'Moscou', 'Bein', NULL, NULL),
(28, 'Allemagne', 'Suede', 'Groupe F', NULL, NULL, NULL, 'tour2', '2018-06-23 17:00:00', 'Sotchi', 'TF1', NULL, NULL),
(29, 'Coree_du_sud', 'Mexique', 'Groupe F', NULL, NULL, NULL, 'tour2', '2018-06-23 20:00:00', 'Rostov', 'Bein', NULL, NULL),
(30, 'Angleterre', 'Panama', 'Groupe G', NULL, NULL, NULL, 'tour2', '2018-06-24 14:00:00', 'Nijni Novgorod', 'Bein', NULL, NULL),
(31, 'Japon', 'Senegal', 'Groupe H', NULL, NULL, NULL, 'tour2', '2018-06-24 17:00:00', 'Iekaterinbourg', 'Bein', NULL, NULL),
(32, 'Pologne', 'Colombie', 'Groupe H', NULL, NULL, NULL, 'tour2', '2018-06-24 20:00:00', 'Kazan', 'TF1', NULL, NULL),
(33, 'Uruguay', 'Russie', 'Groupe A', NULL, NULL, NULL, 'tour3', '2018-06-25 16:00:00', 'Samara', 'Bein', NULL, NULL),
(34, 'Arabie_Saoudite', 'Egypte', 'Groupe A', NULL, NULL, NULL, 'tour3', '2018-06-25 16:00:00', 'Volgograd', 'Bein', NULL, NULL),
(35, 'Iran', 'Portugal', 'Groupe B', NULL, NULL, NULL, 'tour3', '2018-06-25 20:00:00', 'Saransk', 'Bein', NULL, NULL),
(36, 'Espagne', 'Maroc', 'Groupe B', NULL, NULL, NULL, 'tour3', '2018-06-25 20:00:00', 'Kaliningrad', 'Bein', NULL, NULL),
(37, 'Danemark', 'France', 'Groupe C', NULL, NULL, NULL, 'tour3', '2018-06-26 16:00:00', 'Moscou', 'TF1', NULL, NULL),
(38, 'Australie', 'Perou', 'Groupe C', NULL, NULL, NULL, 'tour3', '2018-06-26 16:00:00', 'Sotchi', 'Bein', NULL, NULL),
(39, 'Nigeria', 'Argentine', 'Groupe D', NULL, NULL, NULL, 'tour3', '2018-06-26 20:00:00', 'Saint-Pétersbourg', 'Bein', NULL, NULL),
(40, 'Islande', 'Croatie', 'Groupe D', NULL, NULL, NULL, 'tour3', '2018-06-26 20:00:00', 'Rostov', 'Bein', NULL, NULL),
(41, 'Coree_du_sud', 'Allemagne', 'Groupe F', NULL, NULL, NULL, 'tour3', '2018-06-27 16:00:00', 'Kazan', 'Bein', NULL, NULL),
(42, 'Mexique', 'Suede', 'Groupe F', NULL, NULL, NULL, 'tour3', '2018-06-27 16:00:00', 'Iekaterinbourg', 'Bein', NULL, NULL),
(43, 'Serbie', 'Bresil', 'Groupe E', NULL, NULL, NULL, 'tour3', '2018-06-27 20:00:00', 'Moscou', 'Bein', NULL, NULL),
(44, 'Suisse', 'Costa_Rica', 'Groupe E', NULL, NULL, NULL, 'tour3', '2018-06-27 20:00:00', 'Nijni Novgorod', 'Bein', NULL, NULL),
(45, 'Japon', 'Pologne', 'Groupe H', NULL, NULL, NULL, 'tour3', '2018-06-28 16:00:00', 'Volgograd', 'Bein', NULL, NULL),
(46, 'Senegal', 'Colombie', 'Groupe H', NULL, NULL, NULL, 'tour3', '2018-06-28 16:00:00', 'Samara', 'Bein', NULL, NULL),
(47, 'Angleterre', 'Belgique', 'Groupe G', NULL, NULL, NULL, 'tour3', '2018-06-28 20:00:00', 'Kaliningrad', 'Bein', NULL, NULL),
(48, 'Panama', 'Tunisie', 'Groupe G', NULL, NULL, NULL, 'tour3', '2018-06-28 20:00:00', 'Saransk', 'Bein', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
