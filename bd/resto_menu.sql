-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2019 at 02:12 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto_menu`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(0, 'default.png', 'uploads/files/', '2019-10-15 00:00:00', '2019-10-15 00:00:00', 1),
(13, 'bmac.jpg', 'uploads/files/', '2019-10-16 01:58:41', '2019-10-16 01:58:41', 1),
(14, 'mpoul.png', 'img/', '2019-10-16 02:16:11', '2019-10-16 02:16:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `i18n`
--

INSERT INTO `i18n` (`id`, `locale`, `model`, `foreign_key`, `field`, `content`) VALUES
(2, 'fr_CA', 'MenuItems', 1, 'menu_item_description', 'Deux boulettes de viandes avec 3 pain combiné avec de la lettus, fromage et sauce spécial Big wac.'),
(4, 'fr_CA', 'MenuItems', 2, 'menu_item_description', 'Sandwich au poulet frit avec lettuce et sauce spécial fait par un humain.'),
(5, 'fr_CA', 'MenuItems', 4, 'menu_item_description', 'C\'est halal.'),
(6, 'fr_CA', 'MenuItems', 4, 'other_details', 'Peux contenir du poisson'),
(13, 'ru_RU', 'MenuItems', 1, 'menu_item_description', 'Две фрикадельки с 3-мя хлебом в сочетании с сыром Леттус, сыром и специальным соусом Big wac.'),
(14, 'ru_RU', 'MenuItems', 2, 'menu_item_description', 'Жареный куриный сэндвич с салатом и специальным соусом, приготовленным человеком.'),
(15, 'ru_RU', 'MenuItems', 4, 'menu_item_description', 'Это халяль.'),
(17, 'ru_RU', 'MenuItems', 4, 'other_details', 'Может держать рыбу'),
(18, 'ru_RU', 'Menus', 1, 'menu_description', 'Официальное меню Вакдональда.'),
(19, 'fr_CA', 'Menus', 1, 'menu_description', 'Menu officiel du Wacdonald.');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `menu_description` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `other_details` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `created`, `modified`, `menu_description`, `other_details`) VALUES
(1, 'Wacdonald', '2019-08-30', '2019-08-30', 'Wacdonald\'s official menu.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_item_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_item_price` double(11,2) NOT NULL,
  `menu_item_description` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `other_details` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `files_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `menu_item_name`, `menu_item_price`, `menu_item_description`, `other_details`, `created`, `modified`, `files_id`) VALUES
(1, 1, 'Big wac', 7.00, 'Two patties with 3 bread combined with lettuce, cheese and special sauce Big wac.', '', '2019-08-30', '2019-10-16', 13),
(2, 1, 'wac poulet', 5.00, 'Fried chicken sandwich with lettuce and special sauce made by a human.', '', '2019-08-30', '2019-10-16', 14),
(4, 1, 'Filet de poisson', 7.99, 'It\'s halal.', 'May contain fish.', '2019-09-11', '2019-09-11', 0),
(5, 1, 'Wac nugget', 22.00, '', '', '2019-10-16', '2019-10-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `created`, `modified`) VALUES
(1, 1, '2019-09-18', '2019-09-18'),
(5, 1, '2019-10-09', '2019-10-09'),
(6, 1, '2019-10-09', '2019-10-09'),
(7, 5, '2019-10-15', '2019-10-15'),
(8, 5, '2019-10-15', '2019-10-15'),
(9, 5, '2019-10-15', '2019-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `orders_quantities`
--

CREATE TABLE `orders_quantities` (
  `order_id` int(11) NOT NULL,
  `quantity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders_quantities`
--

INSERT INTO `orders_quantities` (`order_id`, `quantity_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quantities`
--

CREATE TABLE `quantities` (
  `id` int(11) NOT NULL,
  `menu_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quantities`
--

INSERT INTO `quantities` (`id`, `menu_item_id`, `quantity`, `created`, `modified`) VALUES
(1, 1, 2, '2019-10-03', '2019-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `modified`, `user_type_id`, `uuid`, `status`) VALUES
(1, 'admin', '$2y$10$W6i98KEa9Of/DUNQNZbxQ.t2axu.7qwwGP.1zrTFp1ObZobv91Tt6', 'admin@admin.com', '2019-09-11', '2019-09-18', 1, 'cd527758-6dea-49a2-bf11-64006d5aec1a', 1),
(4, 'test', '$2y$10$5Qw6Uhg4t4Y7RK9/udglpuFOWlly3fnz3N9yfBeqpgWWxTC8atn.e', 'test@test.com', '2019-10-15', '2019-10-15', 1, '016c51a8-f42b-45aa-a231-77a0a2da4474', 1),
(5, 'test2', '$2y$10$C0BjzxT0LAIycvcqdgMpxuSZxeQLzCE6Viv9Ko.N4Wi0iu9Y4V.ZO', 'test@test2.com', '2019-10-15', '2019-10-15', 2, 'a8e6fbb4-7d86-40c2-93c9-79df2978ee8d', 1),
(6, 'test3', '$2y$10$sG/GpIeq3z8pU.0cUWIa.e.bQ.7PLoklZo3Z.qBqSJdMoqgIgrZ0G', 'test3@test.com', '2019-10-16', '2019-10-16', 2, '696dda64-70e6-4657-a57e-1817a01cb142', 1),
(7, 'fasf', '$2y$10$1P5ZFWvlhZwCNZkNGCYXLOGVRLfr7Q1nWFhSztcCQNOJg12ujR4UO', 'test@test4.com', '2019-10-16', '2019-10-17', 2, '145d4cad-85e8-4a07-8bf2-9210068904b4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Visitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`(100),`foreign_key`,`field`(100)),
  ADD KEY `I18N_FIELD` (`model`(100),`foreign_key`,`field`(100));

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `files_id` (`files_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `orders_quantities`
--
ALTER TABLE `orders_quantities`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_item_id` (`quantity_id`),
  ADD KEY `quantity_id` (`quantity_id`),
  ADD KEY `order_id_2` (`order_id`),
  ADD KEY `quantity_id_2` (`quantity_id`);

--
-- Indexes for table `quantities`
--
ALTER TABLE `quantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_id` (`menu_item_id`),
  ADD KEY `menu_item_id` (`menu_item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `user_type` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quantities`
--
ALTER TABLE `quantities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_items_ibfk_2` FOREIGN KEY (`files_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_quantities`
--
ALTER TABLE `orders_quantities`
  ADD CONSTRAINT `orders_quantities_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_quantities_ibfk_3` FOREIGN KEY (`quantity_id`) REFERENCES `quantities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quantities`
--
ALTER TABLE `quantities`
  ADD CONSTRAINT `quantities_ibfk_1` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
