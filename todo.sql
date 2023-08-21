-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 21 août 2023 à 14:54
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todo`
--
CREATE IF NOT EXISTS todo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- --------------------------------------------------------
USE todo;
--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'In progress',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id_task`, `title`, `description`, `dates`, `status`, `id_user`) VALUES
(1, 'js', '-les fonctions flêchées en js\r\n-finir le javascript procédurale et attaquer coté web puis coté server avec NodeJs', '2023-09-21', 'In progress', 2),
(2, 'templates', 'apprendre à utiliser des templates, bootstrap \r\nutiliser des CMS tels que WordPress. ', '2023-08-21', 'In progress', 2),
(3, 'gthjh', 'khcbj', '2023-09-03', 'In progress', 1),
(4, 't-mo', 'mo-t-desc', '2023-09-03', 'In progress', 3),
(10, 'Design', 'Apprendre à réaliser des maquettes afin de pouvoir proposé des interfaces agréables et ayant une responsivité à l\'échelle du mobile', '2023-08-21', 'In progress', 2),
(11, 'SQL', 'Renforcer mes connaissances en bases de données SQL et NoSQL. Maitriser UML ainsi que  la réalisation des diagrammes: de classe, de cas d\'utilisation, d\'activité, de séquence.', '2023-08-21', 'In progress', 2),
(13, 'Frameworks', 'Maitriser au moins un framework front et un framework back . On choisira Angular JS pour le front et Laravel PHP pour le back. On s\'appuiera sur une API RES pour les lier\r\n\r\n', '2023-08-21', 'In progress', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'mario', '$2y$10$58oDsike3e0Hc74MhLCwMe78n2oM2sm1nTbhc/XEmxVqfqhkivxnG', 'user'),
(2, 'Luciorino', '$2y$10$.kxevD4QpNYlhdkpCRMN9eXSJeRAfM34w5U6QbDRc1niDZM2uSGJS', 'user'),
(3, 'momo', '$2y$10$cUfzJAuqHzQlh/H5LsysuOaG9rERMJJOCGfX8tjHP37Zidh1jAdk6', 'user'),
(4, 'Morino', '$2y$10$xKEA8RE56KnISEOSu90oteAQUWi9oGBAuommqzUpRHNivLk5DqtUS', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
