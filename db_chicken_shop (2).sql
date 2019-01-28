-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 23 jan. 2019 à 18:39
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  5.6.34

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_chicken_shop`
--
CREATE DATABASE IF NOT EXISTS `db_chicken_shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_chicken_shop`;

-- --------------------------------------------------------

--
-- Structure de la table `all_settings`
--

DROP TABLE IF EXISTS `all_settings`;
CREATE TABLE `all_settings` (
  `all_id` int(3) NOT NULL,
  `all_name_settings` varchar(60) NOT NULL,
  `all_value_settings` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `all_settings`
--

TRUNCATE TABLE `all_settings`;
--
-- Déchargement des données de la table `all_settings`
--

INSERT INTO `all_settings` (`all_id`, `all_name_settings`, `all_value_settings`) VALUES
(1, 'footer', 'Copyright Â© Shop Online 2015'),
(2, 'site_name', 'shop online');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE `commune` (
  `id_commune` int(11) NOT NULL,
  `label_commune` varchar(255) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tronquer la table avant d'insérer `commune`
--

TRUNCATE TABLE `commune`;
--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`id_commune`, `label_commune`, `id_ville`, `created_at`) VALUES
(1, 'Abobo', 1, '2018-07-12 11:39:20'),
(2, 'Adjamé', 1, '2018-07-12 11:39:20'),
(3, 'Yopougon', 1, '2018-07-12 11:39:20'),
(4, 'Le Plateau', 1, '2018-07-12 11:39:20'),
(5, 'Attécoubé', 1, '2018-07-12 11:39:20'),
(6, 'Cocody', 1, '2018-07-12 11:39:20'),
(7, 'Attécoubé', 1, '2018-07-12 11:39:20'),
(8, 'Cocody', 1, '2018-07-12 11:39:20'),
(9, 'Koumassi', 1, '2018-07-12 11:39:20'),
(10, 'Marcory', 1, '2018-07-12 11:39:20'),
(11, 'Port-Bouët', 1, '2018-07-12 11:39:20'),
(12, 'Treichville', 1, '2018-07-12 11:40:07'),
(13, 'Anyama', 1, '2018-07-12 11:39:20'),
(14, 'Bingerville', 1, '2018-07-12 11:39:20'),
(15, 'Songon', 1, '2018-07-12 11:39:20'),
(16, 'Brofodoumé', 1, '2018-07-12 11:39:20'),
(17, 'Bouakooo', 2, '2018-07-17 16:44:36');

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(16) NOT NULL,
  `data` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` enum('paye_livre','paye_nonlivre') NOT NULL,
  `codepikup` int(11) NOT NULL,
  `id_magasin` int(11) DEFAULT NULL,
  `numero_pickup` varchar(225) NOT NULL,
  `is_pick` int(11) NOT NULL DEFAULT '0',
  `type_paid` int(11) NOT NULL DEFAULT '1',
  `method_pay` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `invoices`
--

TRUNCATE TABLE `invoices`;
--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `data`, `due_date`, `user_id`, `status`, `codepikup`, `id_magasin`, `numero_pickup`, `is_pick`, `type_paid`, `method_pay`, `created_at`) VALUES
(10, '2018-09-20 09:44:34', '2018-09-21 09:44:34', 55, 'paye_livre', 32268, 2, '22549119598', 1, 1, 'OM', '2018-09-20 09:46:43'),
(11, '2018-09-20 10:25:41', '2018-09-21 10:25:41', 56, 'paye_livre', 853, 2, '22507967697', 1, 1, 'OM', '2018-09-20 10:26:33');

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

DROP TABLE IF EXISTS `magasin`;
CREATE TABLE `magasin` (
  `id_magasin` int(11) NOT NULL,
  `label_magasin` varchar(225) NOT NULL,
  `adresse_magasin` varchar(225) NOT NULL,
  `contact_magasin` varchar(225) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tronquer la table avant d'insérer `magasin`
--

TRUNCATE TABLE `magasin`;
--
-- Déchargement des données de la table `magasin`
--

INSERT INTO `magasin` (`id_magasin`, `label_magasin`, `adresse_magasin`, `contact_magasin`, `id_ville`, `created_at`) VALUES
(2, 'Dépot Plateau', 'Plateau SUD', '20256984', 1, '2018-07-12 11:29:04'),
(3, 'Dépot Marcory', 'Marcory', '203785964', 1, '2018-07-12 11:29:15'),
(4, 'Petit Paris', 'Yopougon', '23568974', 2, '2018-07-17 16:38:28');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(16) NOT NULL,
  `invoice_id` int(16) NOT NULL,
  `product_id` int(16) NOT NULL,
  `product_type` varchar(60) NOT NULL,
  `product_title` varchar(60) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(9) NOT NULL,
  `total` varchar(255) NOT NULL,
  `token_print` varchar(225) NOT NULL,
  `options` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `orders`
--

TRUNCATE TABLE `orders`;
--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `product_id`, `product_type`, `product_title`, `qty`, `price`, `total`, `token_print`, `options`) VALUES
(12, 11, 5, 'PINTADE FERMIERE 2', 'PINTADE FERMIERE 2', 1, 2500, '2500', '', ''),
(10, 10, 2, 'POULET FERMIER ENTIER', 'POULET FERMIER ENTIER', 1, 2500, '2500', '', ''),
(11, 11, 2, 'POULET FERMIER ENTIER', 'POULET FERMIER ENTIER', 1, 2500, '2500', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `pro_id` int(16) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_slug` varchar(255) NOT NULL,
  `pro_description` text NOT NULL,
  `pro_price` int(9) NOT NULL,
  `pro_stock` int(3) NOT NULL,
  `pro_image` text NOT NULL,
  `id_cat` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `id_magasin` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `products`
--

TRUNCATE TABLE `products`;
--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_title`, `pro_slug`, `pro_description`, `pro_price`, `pro_stock`, `pro_image`, `id_cat`, `usr_id`, `id_magasin`, `created_at`) VALUES
(2, 'POULET FERMIER ENTIER', 'POULET FERMIER ENTIER', 'poulet-fermier-entier', '1 pièce de 1,8 kg à 2 kg\r\n  \r\nPoulet fermier entier\r\nPrêt à cuire.\r\nAuthentique et savoureux,\r\nnotre poulet fermier peut être\r\ngrillé au four ou cuisiné à la cocotte.\r\n \r\nOrigine France\r\nPoulet fermier entierélevéen plein air en Lorraine.\r\n \r\nConservation\r\nNotre poulet fermier se conserve 5 jours au réfrigérateur.\r\nNotre poulet fermier peut être congelé.', 2500, 34, 'a1addd3fc8b234bb1f6087eef286094d.jpg', 1, 36, 4, '2018-09-20 10:25:41'),
(3, 'POULET FERMIER ENTIER', 'POULET FERMIER ENTIER', 'poulet-fermier-entier', '1 pièce de 2,4 kg à 2,6 kg\r\n \r\nPoulet fermier entier.\r\nPrêt à cuire.\r\nAuthentique et savoureux,\r\nnotre poulet fermier peut être\r\ngrillé au four ou cuisiné à la cocotte.\r\n \r\n \r\nOrigine France\r\nPoulet fermier entier élevé en plein air en Lorraine.\r\n \r\nConservation\r\nNotre poulet fermier se conserve 5 jours au réfrigérateur.\r\nNotre poulet fermier peut être congelé.', 4800, 50, 'acdf11f9f79110be90ecc722466ae0dd.jpg', 1, 36, 4, '2018-07-17 14:29:11'),
(4, 'PINTADE FERMIERE', 'PINTADE FERMIERE', 'pintade-fermiere', '1 pièce de 1,9 kg à 2,1 kg\r\n  \r\nPintade fermière entière.\r\nPrête à cuire.\r\nLa pintade se cuisine\r\nen cocotte.\r\n \r\nOrigine France\r\nPintade fermière entière élevée en plein air en Lorraine.\r\n \r\nConservation\r\nNotre pintade fermière se conserve 5 jours au réfrigérateur.\r\nNotre pintade fermière peut être congelée.', 2500, 24, 'e9da8e8790d77d97191da1f6954a1baa.jpg', 2, 36, 4, '2018-07-17 17:45:30'),
(5, 'PINTADE FERMIERE 2', 'PINTADE FERMIERE 2', 'pintade-fermiere-2', '1 pièce de 2,2 kg à 2,4 kg\r\n  \r\nPintade fermière entière.\r\nPrête à cuire.\r\nLa pintade se cuisine en cocotte.\r\n \r\nOrigine France\r\nPintade fermière entière élevée en plein air en Lorraine.\r\n \r\nConservation\r\nNotre pintade fermière se conserve 5 jours au réfrigérateur.\r\nNotre pintade fermière peut être congelée.', 2500, 1, '4b368cb72be1a42c243500c35aca237c.jpg', 2, 36, 4, '2018-09-20 10:25:41'),
(6, 'Lot de 10 plateaux à oeufs plastique empilable', 'Lot de 10 plateaux à oeufs plastique empilable', 'lot-de-10-plateaux-a-oeufs-plastique-empilable', 'Plateaux à œufs en plastique pour 30 œufs.\r\nAdaptés à tout calibre d\'œufs jusque 95g, Très pratiques, ces plateaux sont empilables et lavables. \r\nDimensions 30x30cm.\r\nCouleur selon arrivage.\r\nFabrication Française', 4800, 13, 'bcbcaeb42040f74bf534f16786647f1d.jpg', 6, 36, 4, '2018-09-20 09:38:17'),
(7, 'Œufs x6 crystal SBV', 'Œufs x6 crystal SBV', 'oeufs-x6-crystal-sbv', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 800, 15, '919a8fac3b9ef86d0abb782013b1a971.jpg', 6, 36, 4, '2018-07-17 14:41:58');

-- --------------------------------------------------------

--
-- Structure de la table `produit_variante`
--

DROP TABLE IF EXISTS `produit_variante`;
CREATE TABLE `produit_variante` (
  `id_pro_var` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `id_variante` int(11) NOT NULL,
  `selection_variante_pro` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tronquer la table avant d'insérer `produit_variante`
--

TRUNCATE TABLE `produit_variante`;
-- --------------------------------------------------------

--
-- Structure de la table `prod_cat`
--

DROP TABLE IF EXISTS `prod_cat`;
CREATE TABLE `prod_cat` (
  `id_cat` int(11) NOT NULL,
  `label_cat` varchar(255) NOT NULL,
  `slug_cat` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tronquer la table avant d'insérer `prod_cat`
--

TRUNCATE TABLE `prod_cat`;
--
-- Déchargement des données de la table `prod_cat`
--

INSERT INTO `prod_cat` (`id_cat`, `label_cat`, `slug_cat`) VALUES
(1, 'POULETS FERMIERS', 'poulets-fermiers'),
(2, 'PINTADES FERMIERES', 'pintades-fermiers'),
(3, 'POULES AU POT FERMIÈRES', 'poules-au-pot-fermieres'),
(4, 'COLIS DE VOLAILLES', 'colis-de-volailles'),
(5, 'POULARDES FERMIÈRES', 'poulardes-fermieres'),
(6, 'PLAQUETTES OEUFS', 'plaquettes-oeufs');

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `rep_id` int(9) NOT NULL,
  `rep_name` varchar(60) NOT NULL,
  `rep_id_product` int(9) NOT NULL,
  `rep_title_product` varchar(60) NOT NULL,
  `rep_usr_name` varchar(60) NOT NULL,
  `rep_usr_group` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `reports`
--

TRUNCATE TABLE `reports`;
-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `label_role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tronquer la table avant d'insérer `role`
--

TRUNCATE TABLE `role`;
--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `label_role`) VALUES
(1, 'Administrateur'),
(2, 'Administrateur de Magasin'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Structure de la table `shop_session`
--

DROP TABLE IF EXISTS `shop_session`;
CREATE TABLE `shop_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `shop_session`
--

TRUNCATE TABLE `shop_session`;
--
-- Déchargement des données de la table `shop_session`
--

INSERT INTO `shop_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0c7dd0d4eefbb0ac1c456c95819cb92b945f613a', '127.0.0.1', 1524246276, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343234363236303b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a37353030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226563636263383765346235636532666532383330386664396632613762616633223b613a373a7b733a323a226964223b733a313a2233223b733a333a22717479223b643a313b733a353a227072696365223b643a37353030303b733a343a226e616d65223b733a323a225043223b733a353a227469746c65223b733a323a224850223b733a353a22726f776964223b733a33323a226563636263383765346235636532666532383330386664396632613762616633223b733a383a22737562746f74616c223b643a37353030303b7d7d),
('11b433b91da91fd2df474c65209d5bdf04f52391', '::1', 1430886198, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838353930363b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('18e5031ed538645b4ccb810918bb6bb4def54f0f', '::1', 1430885736, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838353630353b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('1fe5c59fbc7122ac77491e30e01972d709b82bca', '127.0.0.1', 1523459426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333435393235313b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a32353030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226334636134323338613062393233383230646363353039613666373538343962223b613a373a7b733a323a226964223b733a313a2231223b733a333a22717479223b643a313b733a353a227072696365223b643a32353030303b733a343a226e616d65223b733a323a225043223b733a353a227469746c65223b733a343a2244656c6c223b733a353a22726f776964223b733a33323a226334636134323338613062393233383230646363353039613666373538343962223b733a383a22737562746f74616c223b643a32353030303b7d7d),
('216782d346ecb725467fa1a08f49f3e057705ad8', '::1', 1430882453, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838323430303b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('303d5ff594029d513c5b48c68edde9af03ed959f', '::1', 1430889412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838393133383b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('43380f5c97a0c2193d4a496a0f32c124f5dcc8e8', '127.0.0.1', 1522958921, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532323935383637303b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a3135303030303b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a226563636263383765346235636532666532383330386664396632613762616633223b613a373a7b733a323a226964223b733a313a2233223b733a333a22717479223b643a323b733a353a227072696365223b643a37353030303b733a343a226e616d65223b733a323a225043223b733a353a227469746c65223b733a323a224850223b733a353a22726f776964223b733a33323a226563636263383765346235636532666532383330386664396632613762616633223b733a383a22737562746f74616c223b643a3135303030303b7d7d),
('473886d26486392bbc947defc69cdcf66424de77', '::1', 1430886630, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838363433363b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('4c555d13b97c89c00ec26add7e9fdb0826e52c3b', '127.0.0.1', 1524246256, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343234363235363b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a37353030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226563636263383765346235636532666532383330386664396632613762616633223b613a373a7b733a323a226964223b733a313a2233223b733a333a22717479223b643a313b733a353a227072696365223b643a37353030303b733a343a226e616d65223b733a323a225043223b733a353a227469746c65223b733a323a224850223b733a353a22726f776964223b733a33323a226563636263383765346235636532666532383330386664396632613762616633223b733a383a22737562746f74616c223b643a37353030303b7d7d),
('5cfd8efe49c2fd6baaed0f0a7545fd8c17358d30', '127.0.0.1', 1523327987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333332373938373b),
('666e153b8a4822c9749e3a0225882eb3a816be7c', '127.0.0.1', 1523458179, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333435383136303b),
('682024d97e5d2ce88e5fa09dc269a7afb4be0504', '127.0.0.1', 1524248444, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343234383434343b),
('6cfaeb2f282da55cfdb416be6dcd7211ed5a732e', '127.0.0.1', 1524329281, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343332393235323b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a37353030303b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a226334636134323338613062393233383230646363353039613666373538343962223b613a373a7b733a323a226964223b733a313a2231223b733a333a22717479223b643a313b733a353a227072696365223b643a32353030303b733a343a226e616d65223b733a323a225043223b733a353a227469746c65223b733a343a2244656c6c223b733a353a22726f776964223b733a33323a226334636134323338613062393233383230646363353039613666373538343962223b733a383a22737562746f74616c223b643a32353030303b7d733a33323a226338316537323864396434633266363336663036376638396363313438363263223b613a373a7b733a323a226964223b733a313a2232223b733a333a22717479223b643a313b733a353a227072696365223b643a35303030303b733a343a226e616d65223b733a363a224c6170746f70223b733a353a227469746c65223b733a373a22546f7368696261223b733a353a22726f776964223b733a33323a226338316537323864396434633266363336663036376638396363313438363263223b733a383a22737562746f74616c223b643a35303030303b7d7d),
('71f02516693b745db81e715f02facae5e4ca5f0f', '127.0.0.1', 1524246319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343234363238303b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a34353030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226138376666363739613266336537316439313831613637623735343231323263223b613a373a7b733a323a226964223b733a313a2234223b733a333a22717479223b643a313b733a353a227072696365223b643a34353030303b733a343a226e616d65223b733a363a224d6f62696c65223b733a353a227469746c65223b733a31363a224854432073656e736174696f6e20584c223b733a353a22726f776964223b733a33323a226138376666363739613266336537316439313831613637623735343231323263223b733a383a22737562746f74616c223b643a34353030303b7d7d),
('75026a28ee50856686459e50bbf04e02fbdbe1b7', '::1', 1430887393, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838373136333b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('8f1b75f2af02d572e0b06950a4286efa36064e28', '::1', 1430892337, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303839323333353b),
('8f5d8f2b27c17d06a261c2d12b9c6783791f23b0', '::1', 1430888044, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838373836323b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('9c673402b99788cf6baaa4d76d9af9f31c370f04', '127.0.0.1', 1523463725, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333436333732353b),
('a460a08a293ae491ad52e0381efaa0070ec01c76', '::1', 1430888288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838383137303b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('a8fa0ef88f7e84be5debabf912576b3b40bd9b3f', '127.0.0.1', 1523347937, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333334373933373b),
('ac03e0e37872a413802709d8289adcfe1d6574db', '::1', 1430887766, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838373437343b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('c64d3fd803821b27ddca58c1de092623cc89ee8a', '::1', 1430890441, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303839303334343b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b6d6573736167657c733a35383a225468616e6b20796f75202e2e2e2e2e2077652077696c6c20636865636b206f6e20796f7572207061796d656e7420636f6e6669726d6174696f6e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('d03788541a1ed30cb5f5fb7acc025264b50bf1fe', '::1', 1430888790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838383532303b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('d361e38fe288cc8a7cc56e7b3b1608512dee95fa', '127.0.0.1', 1523327666, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333332373534323b),
('d44a01beaea0ed8cbe2e2e922161141de40cdb58', '127.0.0.1', 1524246246, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343234363234363b),
('d7a7a2250ad798163a90ba09c3e0501aa17bbf2b', '::1', 1430883463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838333230313b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('e5a96ef2ea1800a7dc0a794c1fc53ebbd742aa3e', '::1', 1430893426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303839333432363b),
('e6528b002d7aacfeaa0d5e91ca1b9e3d714d5487', '::1', 1430891019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303839303733343b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
('f553b07274f7fe08f6a90b6920ea3b8a0c81132f', '127.0.0.1', 1523459578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532333435393536333b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a3130303030303b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a226334636134323338613062393233383230646363353039613666373538343962223b613a373a7b733a323a226964223b733a313a2231223b733a333a22717479223b643a313b733a353a227072696365223b643a32353030303b733a343a226e616d65223b733a323a225043223b733a353a227469746c65223b733a343a2244656c6c223b733a353a22726f776964223b733a33323a226334636134323338613062393233383230646363353039613666373538343962223b733a383a22737562746f74616c223b643a32353030303b7d733a33323a226563636263383765346235636532666532383330386664396632613762616633223b613a373a7b733a323a226964223b733a313a2233223b733a333a22717479223b643a313b733a353a227072696365223b643a37353030303b733a343a226e616d65223b733a323a225043223b733a353a227469746c65223b733a323a224850223b733a353a22726f776964223b733a33323a226563636263383765346235636532666532383330386664396632613762616633223b733a383a22737562746f74616c223b643a37353030303b7d7d);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `usr_id` int(10) NOT NULL,
  `usr_civilite` int(11) NOT NULL,
  `usr_pseudo` varchar(255) NOT NULL,
  `usr_name` varchar(25) NOT NULL,
  `usr_surname` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_password` varchar(60) NOT NULL,
  `usr_telephone` varchar(255) NOT NULL,
  `usr_group` tinyint(1) NOT NULL,
  `usr_date_naissance` date NOT NULL,
  `usr_nationalite` varchar(255) NOT NULL,
  `usr_adresse` varchar(255) NOT NULL,
  `usr_pays` varchar(255) NOT NULL,
  `usr_numero_passeport` varchar(255) NOT NULL,
  `usr_scan_passeport` varchar(255) NOT NULL,
  `usr_photo` varchar(255) NOT NULL DEFAULT 'defaut.png',
  `id_magasin` int(11) NOT NULL,
  `numero_pickup` varchar(255) NOT NULL,
  `stuts` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `users`
--

TRUNCATE TABLE `users`;
--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usr_id`, `usr_civilite`, `usr_pseudo`, `usr_name`, `usr_surname`, `usr_email`, `usr_password`, `usr_telephone`, `usr_group`, `usr_date_naissance`, `usr_nationalite`, `usr_adresse`, `usr_pays`, `usr_numero_passeport`, `usr_scan_passeport`, `usr_photo`, `id_magasin`, `numero_pickup`, `stuts`, `created_at`) VALUES
(14, 1, 'administrateur', 'HAS', 'Developer', 'admin@admin.com', '21232F297A57A5A743894A0E4A801FC3', 'administrateur', 1, '0000-00-00', '', '', '', '', '', '', 0, '', 0, '0000-00-00 00:00:00'),
(36, 0, '', 'admin2', 'prenom admin 2', 'admin2@gmail.com', '21232F297A57A5A743894A0E4A801FC3', '', 2, '0000-00-00', '', '', '', '', '', '066857990f4b9141fe3590bc888e897d.png', 4, '', 0, '0000-00-00 00:00:00'),
(49, 1, '', 'demodev', 'demodev', 'demodev@demodev.com', 'fe01ce2a7fbac8fafaed7c982a04e229', '22509986698', 3, '0000-00-00', '', 'Bouaké', '', '', '', 'defaut.png', 4, '22509986698', 0, '0000-00-00 00:00:00'),
(48, 1, '', 'konate', 'konate', 'konate@konate.com', '21232F297A57A5A743894A0E4A801FC3', '22507322252', 3, '0000-00-00', '', 'Plateau', '', '', '', 'defaut.png', 4, '22504052409', 0, '0000-00-00 00:00:00'),
(47, 1, '', 'client', 'client', 'client@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', '2254859335', 3, '0000-00-00', '', 'Bouaké', '', '', '', 'defaut.png', 4, '22507322252', 0, '0000-00-00 00:00:00'),
(50, 2, '', 'KOUADIO', 'Jacqueline', 'jacqueline@hypershop.ci', '581d6e53410e6412b51af30d37985bf6', '22549119598', 3, '0000-00-00', '', 'Abidjan', '', '', '', 'defaut.png', 3, '22549119598', 0, '2018-08-03 10:42:21'),
(51, 1, '', 'test', '55222', 'aaaa@fghjk.fr', '581d6e53410e6412b51af30d37985bf6', '22698555', 3, '0000-00-00', '', '225555', '', '', '', 'defaut.png', 3, '22549119598', 0, '2018-08-31 11:49:08'),
(52, 1, '', 'Alberto', 'Alberto', 'alberto@hypershop.ci', 'fe01ce2a7fbac8fafaed7c982a04e229', '22558296507', 3, '0000-00-00', '', 'Abdijan', '', '', '', 'defaut.png', 4, '22558296507', 0, '2018-08-31 12:29:50'),
(53, 1, '', 'ARMEL', 'ARMEL', 'kouya@hyperaccess.com', '8b5073fb50816c304ce9f9a7f46f80c5', '22549119598', 3, '0000-00-00', '', 'Abidjan', '', '', '', 'defaut.png', 4, '22549119598', 0, '2018-09-18 11:33:38'),
(54, 1, '', 'Zadi', 'antoine', 'antoine@antoine.com', '0e5091a25295e44fea9957638527301f', '22549119598', 3, '0000-00-00', '', 'abidjan', '', '', '', 'defaut.png', 3, '22549119598', 0, '2018-09-20 09:36:58'),
(55, 1, '', 'jacqyes', 'jacqyes', 'jacqyes@jacqyes.com', 'eca6e846e45e70909c7f69f945fd75a2', '22549119598', 3, '0000-00-00', '', 'Abidjn', '', '', '', 'defaut.png', 2, '22549119598', 0, '2018-09-20 09:43:21'),
(56, 1, '', 'demodev', 'demodev', 'demodev2@demodev.com', 'd9cc37e4455b87846d032958b2fcd102', '22507967697', 3, '0000-00-00', '', 'Cocody', '', '', '', 'defaut.png', 2, '22507967697', 0, '2018-09-20 10:23:12'),
(57, 1, '', 'ouirom', 'ouirom', 'crepin.kakou@hyperaccesss.com', '9274bba415a6494a93190cc60b456544', '09221223', 3, '0000-00-00', '', 'yopougon', '', '', '', 'defaut.png', 0, '09221223', 0, '2019-01-23 16:30:05');

-- --------------------------------------------------------

--
-- Structure de la table `variante`
--

DROP TABLE IF EXISTS `variante`;
CREATE TABLE `variante` (
  `id_variante` int(11) NOT NULL,
  `label_variante` varchar(255) NOT NULL,
  `content_variante` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tronquer la table avant d'insérer `variante`
--

TRUNCATE TABLE `variante`;
-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `label_ville` varchar(255) NOT NULL,
  `region_ville` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tronquer la table avant d'insérer `ville`
--

TRUNCATE TABLE `ville`;
--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `label_ville`, `region_ville`, `created_at`) VALUES
(1, 'Abidjan', 'Lagunes', '2018-07-12 11:18:30'),
(2, 'Bouaké', 'Gbêkê', '2018-07-12 11:18:30'),
(3, 'Daloa', 'Haut-Sassandra', '2018-07-12 11:18:30'),
(4, 'Yamoussoukro', 'Bélier', '2018-07-12 11:18:30'),
(5, 'San-Pédro', 'Bas-Sassandra', '2018-07-12 11:18:30'),
(6, 'Divo', 'Lôh-Djiboua', '2018-07-12 11:18:30'),
(7, 'Korhogo', 'Poro', '2018-07-12 11:18:30'),
(8, 'Anyama', 'Lagunes', '2018-07-12 11:18:30'),
(9, 'Abengourou', 'Moyen-Comoé', '2018-07-12 11:18:30'),
(10, 'Man', 'Tonkpi', '2018-07-12 11:18:30'),
(11, 'Gagnoa', 'Gôh', '2018-07-12 11:18:30'),
(12, 'Soubré', 'Nawa', '2018-07-12 11:18:30'),
(13, 'Agboville', 'Agnéby-Tiassa', '2018-07-12 11:18:30'),
(14, 'Dabou', 'Lagunes', '2018-07-12 11:18:30'),
(15, 'Grand-Bassam', 'Sud-Comoé', '2018-07-12 11:18:30'),
(16, 'Bouaflé', 'Marahoué', '2018-07-12 11:18:30'),
(17, 'Issia', 'Haut-Sassandra', '2018-07-12 11:18:30'),
(18, 'Sinfra', 'Marahoué', '2018-07-12 11:18:30'),
(19, 'Katiola', 'Hambol', '2018-07-12 11:18:30'),
(20, 'Bingerville', 'Lagunes', '2018-07-12 11:18:30'),
(21, 'Adzopé', 'Mé', '2018-07-12 11:18:30'),
(22, 'Séguéla', 'Béré', '2018-07-12 11:18:30'),
(23, 'Bondoukou', 'Gontougo', '2018-07-12 11:18:30'),
(24, 'Oumé', 'Gôh (ex-Fromager)', '2018-07-12 11:18:30'),
(25, 'Ferkessedougou', 'Tchologo', '2018-07-12 11:18:30'),
(26, 'Dimbokro', 'N\'zi', '2018-07-12 11:18:30'),
(27, 'Odienné', 'Denguélé', '2018-07-12 11:18:30'),
(28, 'Duékoué', 'Guémon', '2018-07-12 11:18:30'),
(29, 'Danané', 'Dix-Huit Montagnes', '2018-07-12 11:18:30'),
(30, 'Tingréla', 'Savanes', '2018-07-12 11:18:30'),
(31, 'Guiglo', 'Moyen-Cavally', '2018-07-12 11:18:30'),
(32, 'Boundiali', 'Savanes', '2018-07-12 11:18:30'),
(33, 'Agnibilékrou', 'Moyen-Comoé', '2018-07-12 11:18:30'),
(34, 'Daoukro', 'N\'zi-Comoé', '2018-07-12 11:18:30'),
(35, 'Vavoua', 'Haut-Sassandra', '2018-07-12 11:18:30'),
(36, 'Zuénoula', 'Marahoué', '2018-07-12 11:18:30'),
(37, 'Tiassalé', 'Lagunes', '2018-07-12 11:18:30'),
(38, 'Toumodi', 'Lacs', '2018-07-12 11:18:30'),
(39, 'Akoupé', 'Agnéby', '2018-07-12 11:18:30'),
(40, 'Lakota', 'Lôh-Djiboua', '2018-07-12 11:18:30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `all_settings`
--
ALTER TABLE `all_settings`
  ADD PRIMARY KEY (`all_id`);

--
-- Index pour la table `commune`
--
ALTER TABLE `commune`
  ADD PRIMARY KEY (`id_commune`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `magasin`
--
ALTER TABLE `magasin`
  ADD PRIMARY KEY (`id_magasin`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Index pour la table `produit_variante`
--
ALTER TABLE `produit_variante`
  ADD PRIMARY KEY (`id_pro_var`);

--
-- Index pour la table `prod_cat`
--
ALTER TABLE `prod_cat`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`rep_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `shop_session`
--
ALTER TABLE `shop_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- Index pour la table `variante`
--
ALTER TABLE `variante`
  ADD PRIMARY KEY (`id_variante`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `all_settings`
--
ALTER TABLE `all_settings`
  MODIFY `all_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commune`
--
ALTER TABLE `commune`
  MODIFY `id_commune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `magasin`
--
ALTER TABLE `magasin`
  MODIFY `id_magasin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produit_variante`
--
ALTER TABLE `produit_variante`
  MODIFY `id_pro_var` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prod_cat`
--
ALTER TABLE `prod_cat`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reports`
--
ALTER TABLE `reports`
  MODIFY `rep_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `variante`
--
ALTER TABLE `variante`
  MODIFY `id_variante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
