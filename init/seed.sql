-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 22 sep. 2021 à 12:02
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;


/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;


/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;


/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de données : `project`
--
-- --------------------------------------------------------
--
-- Structure de la table `users`
--
CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `username` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    UNIQUE (`username`),
    UNIQUE (`email`)) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `users`
--
INSERT INTO `users` (`id`, `username`, `email`, `password`)
    VALUES (1, 'bergeault', 'nicolas.bergeault@gmail.com', '205806d8f43f53643fd79c829bf76479104a138dc24faeb0a69b4c9dda8dc187');

INSERT INTO `users` (`id`, `username`, `email`, `password`)
    VALUES (2, 'test', 'test@test.fr', '205806d8f43f53643fd79c829bf76479104a138dc24faeb0a69b4c9dda8dc187');

--
-- Index pour les tables déchargées
--
--
-- Index pour la table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 2;

COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;


/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;


/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
