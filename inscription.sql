-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 21 nov. 2021 à 22:07
-- Version du serveur :  8.0.27-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `mdp` char(32) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `titre` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mdp`, `mail`, `titre`) VALUES
(9, 'aaaaaaa', '594f803b380a41396ed63dca39503542', 'aaaaa', 'aaaaaa'),
(28, 'bbbbb', '875f26fdb1cecf20ceb4ca028263dec6', 'bbbb', 'bbbbbbb'),
(29, 'bbbbbsgd', '79a9a16c19dbc60bfc0ff7bd8775cf20', 'bbbbsgd', 'bbbbbbbsdg'),
(51, 'aym55', '43bf06a016c07575da122ec80eb8f55a', 'aymeric@peutetre.fr', 'test'),
(50, 'rebea', '47bce5c74f589f4867dbd57e9ca9f808', 'test@rui.fra', 'rebea'),
(49, 'rebe', 'cc0bd5832b4e1465a6987d953bb767af', 'test@rui.fr', 'rebe'),
(48, 'reb', '452ee557f6b2e1de7e059011b6d7ac02', 'test@oui.fr', 'reb'),
(47, 'benvoyons', '118434e9c919a5c3c3b98a6f75af37e0', 'benvoyons', 'benvoyons'),
(46, 'cvbn', '665bc340f8bf7f568bbdb291867120b5', 'cvbn', 'cvbn'),
(45, 'wxcv', '9d6db80a2fa5979e9546396d298d89fc', 'wxcv', 'wxcv'),
(43, 'tuescapable', 'fa8aa6387021cd8ed11188f5a80a3bfa', 'tuescapable', 'tuescapable'),
(44, 'tuescapable1', '4ed910b299d3dfe4b23bf2ffcfda159a', 'tuescapable1', 'tuescapable1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
