-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 30 oct. 2019 à 21:34
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Astuces'),
(2, 'Plaintes'),
(3, 'Discussion');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text,
  `idPost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `imagePath` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `imagePath`, `author`, `title`, `content`, `idCategory`, `idUser`) VALUES
(12, 'SRC/IMG/Capture d’écran 2019-10-21 à 11.47.54.png', 'aure', 'Jouer Little Mac', 'Yo les gars je main little max et j\'vous prends tous bande de baltringues', 1, 18),
(14, 'SRC/IMG/Capture d’écran 2019-10-21 à 11.47.54.png', 'kokelet', 'WESH', 'JE MAIN RONDOOOWWWWWWDOWWWWWWWWWWWWWWWWW', 1, 21),
(15, 'SRC/IMG/Capture d’écran 2019-10-21 à 11.47.54.png', 'kokelet', 'RELOU', 'BORDEL JE PERDS H24 C LA FAUTE DE MES MATES AUSSI C BON POUR VOUS ????', 2, 21),
(16, 'SRC/IMG/1456275-widescreen-super-smash-bros-melee-wallpaper-3840x2160-for-4k.jpg', 'kokelet', 'je tente', 'joukral', 3, 21),
(17, 'SRC/IMG/Capture d’écran 2019-10-21 à 11.47.54.png', 'lock', 'try ?', 'catch ?', 3, 20),
(18, 'SRC/IMG/', 'lock', 'test', 'test', 2, 20),
(19, 'SRC/IMG/Capture d’écran 2019-10-21 à 10.38.48.png', 'aure', 'lol', 'lol', 1, 18);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(18, 'aure', '$2y$10$B6cqTsaWQXyfDy4ocL0IsuhAjfXECI9BvihPx0rJf9CHbgVrzIMgu'),
(19, 'jojo', '$2y$10$CNFZKQS9070y3LJBGGz2ouOKSQVaOCWHxTPOI8hmT9TdbHRo0yjHy'),
(20, 'lock', '$2y$10$rZ0JN0VS89yoIdCOYxhyjeGBw2T3OQwvtWpmeihtDmwYfpITya3lO'),
(21, 'kokelet', '$2y$10$mabrt0YiK608i/g.hbBFKOpcYJuNtfkoK9.fyccZ4Z.fZEoDmizcC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPost` (`idPost`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `posts` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);
