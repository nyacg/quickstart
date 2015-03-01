-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 01 Mars 2015 à 04:46
-- Version du serveur :  5.5.40-36.1
-- Version de PHP :  5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `database_quickstart`
--

-- --------------------------------------------------------

--
-- Structure de la table `favorite_shops`
--

CREATE TABLE IF NOT EXISTS `favorite_shops` (
  `favorite_shop_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime_edited` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL,
  `product_configuration_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `is_received` tinyint(4) NOT NULL,
  `datetime_ordered` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`order_id`, `product_configuration_id`, `user_id`, `shop_id`, `comment`, `is_received`, `datetime_ordered`) VALUES
(1, 1, 1, 1, '', 0, '2015-03-01 14:21:08'),
(2, 1, 1, 1, '', 0, '2015-03-01 15:00:40'),
(3, 1, 1, 1, '', 0, '2015-03-01 14:00:47'),
(4, 1, 1, 1, '', 1, '2015-03-01 13:46:00'),
(5, 2, 1, 1, '', 0, '2015-03-01 13:50:00'),
(6, 5, 1, 1, 'Hello Robert, please add me some sugar', 0, '2015-03-01 13:55:00'),
(7, 8, 1, 1, 'A new comment', 0, '2015-03-01 15:00:00'),
(8, 8, 1, 1, 'Another order', 0, '2015-03-01 16:30:00'),
(9, 8, 1, 1, 'I want more milk!', 0, '2015-03-01 13:54:00'),
(10, 9, 1, 1, 'Strong coffee please', 0, '2015-03-01 08:00:00'),
(11, 9, 1, 1, 'Light coffee please', 0, '2015-03-01 14:15:00');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `shop_id` int(11) NOT NULL,
  `picture` text COLLATE utf8_bin NOT NULL,
  `datetime_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`product_id`, `name`, `shop_id`, `picture`, `datetime_added`) VALUES
(1, 'Hot Chocolate', 1, 'latte.jpeg', '2015-02-28 18:56:00'),
(2, 'Coffee', 1, '', '2015-02-28 18:31:00'),
(3, 'Hot Chocolate', 2, 'latte.jpeg', '2015-02-28 18:56:00'),
(4, 'Coffee', 2, '', '2015-02-28 18:31:00');

-- --------------------------------------------------------

--
-- Structure de la table `products_configurations`
--

CREATE TABLE IF NOT EXISTS `products_configurations` (
  `product_configuration_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `price` double(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `datetime_added` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `products_configurations`
--

INSERT INTO `products_configurations` (`product_configuration_id`, `name`, `price`, `product_id`, `datetime_added`) VALUES
(1, 'Small', 1.99, 1, '2015-02-28 18:31:00'),
(2, 'Medium', 2.99, 1, '2015-02-28 18:31:00'),
(3, 'Large', 3.45, 1, '2015-02-28 18:31:00'),
(4, 'Small', 1.99, 2, '2015-02-28 18:31:00'),
(5, 'Medium', 2.99, 2, '2015-02-28 18:31:00'),
(6, 'Large', 3.45, 2, '2015-02-28 18:31:00'),
(7, 'Small', 1.99, 3, '2015-02-28 18:31:00'),
(8, 'Medium', 2.99, 3, '2015-02-28 18:31:00'),
(9, 'Large', 3.45, 3, '2015-02-28 18:31:00'),
(10, 'Small', 1.99, 4, '2015-02-28 18:31:00'),
(11, 'Medium', 2.99, 4, '2015-02-28 18:31:00'),
(12, 'Large', 3.45, 4, '2015-02-28 18:31:00');

-- --------------------------------------------------------

--
-- Structure de la table `selections`
--

CREATE TABLE IF NOT EXISTS `selections` (
  `selection_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_configuration_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `datetime_edited` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `selections`
--

INSERT INTO `selections` (`selection_id`, `shop_id`, `user_id`, `product_configuration_id`, `comment`, `datetime_edited`) VALUES
(1, 1, 1, 1, 'hello', '2015-03-01 09:09:12');

-- --------------------------------------------------------

--
-- Structure de la table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `shop_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `latitude` varchar(25) COLLATE utf8_bin NOT NULL,
  `longitude` varchar(25) COLLATE utf8_bin NOT NULL,
  `address` text COLLATE utf8_bin NOT NULL,
  `postcode` varchar(10) COLLATE utf8_bin NOT NULL,
  `city` varchar(100) COLLATE utf8_bin NOT NULL,
  `datetime_registered` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `shops`
--

INSERT INTO `shops` (`shop_id`, `name`, `latitude`, `longitude`, `address`, `postcode`, `city`, `datetime_registered`) VALUES
(1, 'Starbucks - Strand', '51.511279', '-0.119781', 'Unit 2, Burleigh House, 355-359 Strand, Royal Opera House', 'WC2R 0HS', 'London', '2015-02-28 18:57:00'),
(2, 'Costa', '51.513663', '-0.117807', '9-11 Kingsway', 'WC2B 6UN', 'London', '2015-02-28 19:44:00'),
(3, 'Dunkin\\''Donuts', '51.491154', '0.067368', '26/28 Powis Street', 'SE18 6LF', 'London', '2015-02-28 19:44:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `datetime_registered` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `datetime_registered`) VALUES
(1, 'Ron', 'Danenberg', 'ron.danenberg@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2015-02-28 18:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `favorite_shops`
--
ALTER TABLE `favorite_shops`
  ADD PRIMARY KEY (`favorite_shop_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `products_configurations`
--
ALTER TABLE `products_configurations`
  ADD PRIMARY KEY (`product_configuration_id`);

--
-- Index pour la table `selections`
--
ALTER TABLE `selections`
  ADD PRIMARY KEY (`selection_id`);

--
-- Index pour la table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `favorite_shops`
--
ALTER TABLE `favorite_shops`
  MODIFY `favorite_shop_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `products_configurations`
--
ALTER TABLE `products_configurations`
  MODIFY `product_configuration_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `selections`
--
ALTER TABLE `selections`
  MODIFY `selection_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
