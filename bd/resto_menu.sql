-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2019 at 03:44 AM
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
(1, 'Wacdonald', '2019-08-30', '2019-08-30', 'Menu officiel du Wacdonald.', NULL);

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
(1, 1, 'Big wac', 7.00, 'Deux boulettes de viandes avec 3 pain combiné avec de la lettus, fromage et sauce spécial Big wac.', '', '2019-08-30', '2019-10-16', 13),
(2, 1, 'wac poulet', 5.00, 'Sandwich au poulet frit avec lettus et sauce spécial fait par un homme.', '', '2019-08-30', '2019-10-16', 14),
(4, 1, 'Filet de poisson', 7.99, 'C\'est halal.', 'Peut contenir des traces de poisson.', '2019-09-11', '2019-09-11', 0),
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
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `modified`, `user_type_id`) VALUES
(1, 'admin', '$2y$10$W6i98KEa9Of/DUNQNZbxQ.t2axu.7qwwGP.1zrTFp1ObZobv91Tt6', 'admin@admin.com', '2019-09-11', '2019-09-18', 1),
(4, 'test', '$2y$10$5Qw6Uhg4t4Y7RK9/udglpuFOWlly3fnz3N9yfBeqpgWWxTC8atn.e', 'test@test.com', '2019-10-15', '2019-10-15', 1),
(5, 'test2', '$2y$10$C0BjzxT0LAIycvcqdgMpxuSZxeQLzCE6Viv9Ko.N4Wi0iu9Y4V.ZO', 'test@test2.com', '2019-10-15', '2019-10-15', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
