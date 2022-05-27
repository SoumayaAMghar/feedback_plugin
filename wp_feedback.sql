-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 26 mai 2022 à 10:15
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wordpress`
--

-- --------------------------------------------------------

--
-- Structure de la table `wp_feedback`
--

CREATE TABLE `wp_feedback` (
  `id` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num` int(20) NOT NULL,
  `view` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `wp_feedback`
--

INSERT INTO `wp_feedback` (`id`, `comments`, `name`, `email`, `num`, `view`, `page_id`) VALUES
(250, 'sdfghjikolpmkjhgfwxjkl', 'Tana Silva', 'hezuvyh@mailinator.com', 2147483647, 'very satisfied', 248),
(251, 'Commodi sed veritati', 'Carissa Montgomery', 'focuvuwaf@mailinator.com', 0, 'very unsatisfied', 248);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `wp_feedback`
--
ALTER TABLE `wp_feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `wp_feedback`
--
ALTER TABLE `wp_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
