-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1:3306
-- Généré le :  Ven 11 Octobre 2019 à 22:14
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `resto_menu`
--

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `menu_description` tinytext COLLATE utf8_unicode_ci,
  `other_details` tinytext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `created`, `modified`, `menu_description`, `other_details`) VALUES
(1, 'Wacdonald', '2019-08-30', '2019-08-30', 'Menu officiel du Wacdonald.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_item_price` double(11,2) NOT NULL,
  `menu_item_description` tinytext COLLATE utf8_unicode_ci,
  `other_details` tinytext COLLATE utf8_unicode_ci,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `menu_item_name`, `menu_item_price`, `menu_item_description`, `other_details`, `created`, `modified`) VALUES
(1, 1, 'Big wac', 7.00, 'Deux boulettes de viandes avec 3 pain combiné avec de la lettus, fromage et sauce spécial Big wac.', NULL, '2019-08-30', '2019-08-30'),
(2, 1, 'wac poulet', 5.00, 'Sandwich au poulet frit avec lettus et sauce spécial fait par un homme.', NULL, '2019-08-30', '2019-08-30'),
(4, 1, 'Filet de poisson', 7.99, 'C\'est halal.', 'Peut contenir des traces de poisson.', '2019-09-11', '2019-09-11');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created`, `modified`) VALUES
(1, 1, '2019-09-18', '2019-09-18'),
(5, 1, '2019-10-09', '2019-10-09'),
(6, 1, '2019-10-09', '2019-10-09');

-- --------------------------------------------------------

--
-- Structure de la table `orders_quantities`
--

CREATE TABLE `orders_quantities` (
  `order_id` int(11) NOT NULL,
  `quantity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `orders_quantities`
--

INSERT INTO `orders_quantities` (`order_id`, `quantity_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `quantities`
--

CREATE TABLE `quantities` (
  `id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `quantities`
--

INSERT INTO `quantities` (`id`, `menu_item_id`, `quantity`, `created`, `modified`) VALUES
(1, 1, 2, '2019-10-03', '2019-10-03');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `modified`, `user_type_id`) VALUES
(1, 'admin', '$2y$10$W6i98KEa9Of/DUNQNZbxQ.t2axu.7qwwGP.1zrTFp1ObZobv91Tt6', 'admin@admin.com', '2019-09-11', '2019-09-18', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_types`
--

INSERT INTO `user_types` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Visitor');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Index pour la table `orders_quantities`
--
ALTER TABLE `orders_quantities`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_item_id` (`quantity_id`),
  ADD KEY `quantity_id` (`quantity_id`),
  ADD KEY `order_id_2` (`order_id`),
  ADD KEY `quantity_id_2` (`quantity_id`);

--
-- Index pour la table `quantities`
--
ALTER TABLE `quantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_id` (`menu_item_id`),
  ADD KEY `menu_item_id` (`menu_item_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type_id`);

--
-- Index pour la table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `quantities`
--
ALTER TABLE `quantities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders_quantities`
--
ALTER TABLE `orders_quantities`
  ADD CONSTRAINT `orders_quantities_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_quantities_ibfk_3` FOREIGN KEY (`quantity_id`) REFERENCES `quantities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `quantities`
--
ALTER TABLE `quantities`
  ADD CONSTRAINT `quantities_ibfk_1` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
