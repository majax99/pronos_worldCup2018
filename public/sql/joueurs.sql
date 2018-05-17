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
-- Structure de la table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `equipe_id` int(11) NOT NULL,
  `capitaine` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`id`, `nom`, `prenom`, `numero`, `equipe_id`, `capitaine`, `created_at`, `updated_at`) VALUES
(1, 'Neuer', 'Manuel', 1, 1, 1, NULL, NULL),
(2, 'Boateng', 'Jerome', 2, 1, 0, NULL, NULL),
(3, 'Kroos', 'Toni', 3, 1, 0, NULL, NULL),
(4, 'Ozil', 'Mesut', 4, 1, 0, NULL, NULL),
(5, 'Muller', 'Thomas', 5, 1, 0, NULL, NULL),
(6, 'Alves', 'Diego', 1, 2, 0, NULL, NULL),
(7, 'Alves', 'Daniel', 2, 2, 1, NULL, NULL),
(8, 'Coutinho', 'Philippe', 3, 2, 0, NULL, NULL),
(9, 'Jesus', 'Gabriel', 4, 2, 0, NULL, NULL),
(10, 'Jr', 'Neymar', 5, 2, 0, NULL, NULL),
(11, 'Patricio', 'Rui', 1, 3, 0, NULL, NULL),
(12, 'Guerreiro', 'Raphael', 2, 3, 0, NULL, NULL),
(13, 'Quaresma', 'Ricardo', 3, 3, 0, NULL, NULL),
(14, 'Sanches', 'Renato', 4, 3, 0, NULL, NULL),
(15, 'Ronaldo', 'Cristiano', 5, 3, 1, NULL, NULL),
(16, 'Guzman', 'Nahuel', 1, 4, 0, NULL, NULL),
(17, 'Otamendi', 'Nicolas', 2, 4, 0, NULL, NULL),
(18, 'Pastore', 'Javier', 3, 4, 0, NULL, NULL),
(19, 'Aguero', 'Sergio', 4, 4, 0, NULL, NULL),
(20, 'Messi', 'Lionel', 5, 4, 1, NULL, NULL),
(21, 'Courtois', 'Thibaut', 1, 5, 0, NULL, NULL),
(22, 'Meunier', 'Thomas', 2, 5, 0, NULL, NULL),
(23, 'DeBruyne', 'Kevin', 3, 5, 0, NULL, NULL),
(24, 'Hazard', 'Eden', 4, 5, 1, NULL, NULL),
(25, 'Lukaku', 'Romelo', 5, 5, 0, NULL, NULL),
(26, 'Degea', 'David', 1, 6, 0, NULL, NULL),
(27, 'Ramos', 'Sergio', 2, 6, 1, NULL, NULL),
(28, 'Iniesta', 'Andres', 3, 6, 0, NULL, NULL),
(29, 'Jr', 'Isco', 4, 6, 0, NULL, NULL),
(30, 'Costa', 'Diego', 5, 6, 0, NULL, NULL),
(31, 'Szczesny', 'Wojciech', 1, 7, 0, NULL, NULL),
(32, 'Glik', 'Kamil', 2, 7, 0, NULL, NULL),
(33, 'Grosicki', 'Kamil', 3, 7, 0, NULL, NULL),
(34, 'Lewandowski', 'Robert', 4, 7, 1, NULL, NULL),
(35, 'Milik', 'Arkadiusz', 5, 7, 0, NULL, NULL),
(36, 'Burki', 'Roman', 1, 8, 0, NULL, NULL),
(37, 'Lichtsteiner', 'Stephan', 2, 8, 0, NULL, NULL),
(38, 'Shaqiri', 'Xherdan', 3, 8, 0, NULL, NULL),
(39, 'Xhaka', 'Granit', 4, 8, 1, NULL, NULL),
(40, 'Seferovic', 'Haris', 5, 8, 0, NULL, NULL),
(41, 'Lloris', 'Hugo', 1, 9, 1, NULL, NULL),
(42, 'Varane', 'Raphael', 2, 9, 0, NULL, NULL),
(43, 'Pogba', 'Paul', 3, 9, 0, NULL, NULL),
(44, 'Griezmann', 'Antoine', 4, 9, 0, NULL, NULL),
(45, 'Mbappe', 'Kylian', 5, 9, 0, NULL, NULL),
(46, 'Poutine', 'Vladimir', 1, 10, 1, NULL, NULL),
(47, 'Lunev', 'Andrey', 2, 10, 0, NULL, NULL),
(48, 'Kutepov', 'Ilya', 3, 10, 0, NULL, NULL),
(49, 'Vasin', 'Viktor', 4, 10, 0, NULL, NULL),
(50, 'Golovin', 'Alexandr', 5, 10, 0, NULL, NULL),
(51, 'Rodriguez', 'Alberto', 1, 11, 0, NULL, NULL),
(52, 'Tapia', 'Renato', 2, 11, 0, NULL, NULL),
(53, 'Farfan', 'Jefferson', 3, 11, 0, NULL, NULL),
(54, 'Reyna', 'Yordy', 4, 11, 0, NULL, NULL),
(55, 'Yotun', 'Yoshimar', 5, 11, 1, NULL, NULL),
(56, 'Lossl', 'Jonas', 1, 12, 0, NULL, NULL),
(57, 'Kjaer', 'Simon', 2, 12, 0, NULL, NULL),
(58, 'Wass', 'Daniel', 3, 12, 0, NULL, NULL),
(59, 'Bech', 'Uffe', 4, 12, 0, NULL, NULL),
(60, 'Dolberg', 'Kasper', 5, 12, 1, NULL, NULL),
(61, 'Ospina', 'David', 1, 13, 0, NULL, NULL),
(62, 'Vargas', 'Camillo', 2, 13, 0, NULL, NULL),
(63, 'Rodriguez', 'James', 3, 13, 0, NULL, NULL),
(64, 'Bacca', 'Carlos', 4, 13, 0, NULL, NULL),
(65, 'Falcao', 'Radamel', 5, 13, 1, NULL, NULL),
(66, 'Hart', 'Joe', 1, 14, 0, NULL, NULL),
(67, 'Cahill', 'Gary', 2, 14, 0, NULL, NULL),
(68, 'Alli', 'Dele', 3, 14, 0, NULL, NULL),
(69, 'Kane', 'Harry', 4, 14, 1, NULL, NULL),
(70, 'Vardy', 'Jamie', 5, 14, 0, NULL, NULL),
(71, 'Ochoa', 'Guillermo', 1, 15, 0, NULL, NULL),
(72, 'Corona', 'Jesus', 2, 15, 0, NULL, NULL),
(73, 'Aquino', 'Javier', 3, 15, 0, NULL, NULL),
(74, 'Hernandez', 'Javier', 4, 15, 1, NULL, NULL),
(75, 'Vela', 'Carlos', 5, 15, 0, NULL, NULL),
(76, 'Subasic', 'Danijel', 1, 16, 0, NULL, NULL),
(77, 'Lovren', 'Dejan', 2, 16, 0, NULL, NULL),
(78, 'Modric', 'Luka', 3, 16, 1, NULL, NULL),
(79, 'Rakitic', 'Ivan', 4, 16, 0, NULL, NULL),
(80, 'Santini', 'Ivan', 5, 16, 0, NULL, NULL),
(81, 'Linde', 'Andreas', 1, 17, 0, NULL, NULL),
(82, 'Granqvist', 'Andreas', 2, 17, 0, NULL, NULL),
(83, 'Durmaz', 'Jimmy', 3, 17, 0, NULL, NULL),
(84, 'Guidetti', 'John', 4, 17, 0, NULL, NULL),
(85, 'Toivonen', 'Ola', 5, 17, 1, NULL, NULL),
(86, 'Silva', 'Martin', 1, 18, 0, NULL, NULL),
(87, 'Pereira', 'Maxi', 2, 18, 0, NULL, NULL),
(88, 'Cavani', 'Edinson', 3, 18, 1, NULL, NULL),
(89, 'Rolan', 'Diego', 4, 18, 0, NULL, NULL),
(90, 'Suarez', 'Luis', 5, 18, 0, NULL, NULL),
(91, 'Jonsson', 'Ingvar', 1, 19, 0, NULL, NULL),
(92, 'Sigurdsson', 'Ragnar', 2, 19, 0, NULL, NULL),
(93, 'Gislason', 'Rurik', 3, 19, 0, NULL, NULL),
(94, 'Finnbogason', 'Alfred', 4, 19, 0, NULL, NULL),
(95, 'Gudjohnsen', 'Eidur', 5, 19, 1, NULL, NULL),
(96, 'Diallo', 'Abdoulaye', 1, 20, 0, NULL, NULL),
(97, 'Gassama', 'Lamine', 2, 20, 0, NULL, NULL),
(98, 'Mane', 'Sadio', 3, 20, 1, NULL, NULL),
(99, 'Balde', 'Keita', 4, 20, 0, NULL, NULL),
(100, 'Sow', 'Moussa', 5, 20, 0, NULL, NULL),
(101, 'Navas', 'Keylor', 1, 21, 1, NULL, NULL),
(102, 'Duarte', 'Oscar', 2, 21, 0, NULL, NULL),
(103, 'Bolanos', 'Cristian', 3, 21, 0, NULL, NULL),
(104, 'Borges', 'Celso', 4, 21, 0, NULL, NULL),
(105, 'Urena', 'Marco', 5, 21, 0, NULL, NULL),
(106, 'Abdennour', 'Aymen', 1, 22, 0, NULL, NULL),
(107, 'Haddadi', 'Oussama', 2, 22, 0, NULL, NULL),
(108, 'Azouni', 'Larry', 3, 22, 0, NULL, NULL),
(109, 'Khazri', 'Wahbi', 4, 22, 1, NULL, NULL),
(110, 'Touzghar', 'Yoann', 5, 22, 0, NULL, NULL),
(111, 'Gaber', 'Omar', 1, 23, 0, NULL, NULL),
(112, 'Hafez', 'Karim', 2, 23, 0, NULL, NULL),
(113, 'Salah', 'Mohamed', 3, 23, 1, NULL, NULL),
(114, 'Sobhi', 'Ramadan', 4, 23, 0, NULL, NULL),
(115, 'Hassan', 'Ahmed', 5, 23, 0, NULL, NULL),
(116, 'Ahmadi', 'Rahman', 1, 24, 1, NULL, NULL),
(117, 'Hosseini', 'Jalal', 2, 24, 0, NULL, NULL),
(118, 'Haghighi', 'Reza', 3, 24, 0, NULL, NULL),
(119, 'Azmoun', 'Sardar', 4, 24, 0, NULL, NULL),
(120, 'Dejagah', 'Ashkan', 5, 24, 0, NULL, NULL),
(121, 'Rajkovic', 'Predrag', 1, 25, 0, NULL, NULL),
(122, 'Kolarov', 'Alexandr', 2, 25, 1, NULL, NULL),
(123, 'Grujic', 'Marko', 3, 25, 0, NULL, NULL),
(124, 'Matic', 'Nemanja', 4, 25, 0, NULL, NULL),
(125, 'Tadic', 'Dusan', 5, 25, 0, NULL, NULL),
(126, 'Ryan', 'Mathew', 1, 26, 0, NULL, NULL),
(127, 'Milligan', 'Mark', 2, 26, 0, NULL, NULL),
(128, 'Cahill', 'Tim', 3, 26, 1, NULL, NULL),
(129, 'Mooy', 'Aaron', 4, 26, 0, NULL, NULL),
(130, 'Rogic', 'Tomas', 5, 26, 0, NULL, NULL),
(131, 'Enyeama', 'Vincent', 1, 28, 1, NULL, NULL),
(132, 'Echiejile', 'Elderson', 2, 28, 0, NULL, NULL),
(133, 'Igiebor', 'Nosa', 3, 28, 0, NULL, NULL),
(134, 'Iwobi', 'Alex', 4, 28, 0, NULL, NULL),
(135, 'Moses', 'Victor', 5, 28, 0, NULL, NULL),
(136, 'Jr', 'Bono', 1, 27, 0, NULL, NULL),
(137, 'Belhanda', 'Younes', 2, 27, 0, NULL, NULL),
(138, 'Carcela', 'Mehdi', 3, 27, 0, NULL, NULL),
(139, 'Chafik', 'Fouad', 4, 27, 0, NULL, NULL),
(140, 'Dirar', 'Nabil', 5, 27, 1, NULL, NULL),
(141, 'Gonda', 'Shuichi', 1, 29, 1, NULL, NULL),
(142, 'Inoha', 'Masahiko', 2, 29, 0, NULL, NULL),
(143, 'Sakai', 'Hiroki', 3, 29, 0, NULL, NULL),
(144, 'Honda', 'Keisuke', 4, 29, 0, NULL, NULL),
(145, 'Kagawa', 'Shinji', 5, 29, 0, NULL, NULL),
(146, 'Calderon', 'Jose', 1, 30, 1, NULL, NULL),
(147, 'Penedo', 'Jaime', 2, 30, 0, NULL, NULL),
(148, 'Rodriguez', 'Alex', 3, 30, 0, NULL, NULL),
(149, 'Baloy', 'Felipe', 4, 30, 0, NULL, NULL),
(150, 'Escobar', 'Fidel', 5, 30, 0, NULL, NULL),
(151, 'Lee', 'Yong', 1, 31, 0, NULL, NULL),
(152, 'Ki', 'Sungyong', 2, 31, 0, NULL, NULL),
(153, 'Ji', 'Dongwon', 3, 31, 0, NULL, NULL),
(154, 'Park', 'Chuyoung', 4, 31, 0, NULL, NULL),
(155, 'Son', 'Heungmin', 5, 31, 1, NULL, NULL),
(156, 'Zaid', 'Mabrouk', 1, 32, 0, NULL, NULL),
(157, 'AlQadi', 'Naif', 2, 32, 0, NULL, NULL),
(158, 'Dokhi', 'Ahmed', 3, 32, 0, NULL, NULL),
(159, 'Fallatah', 'Hassan', 4, 32, 0, NULL, NULL),
(160, 'Tukar', 'Redha', 5, 32, 1, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
