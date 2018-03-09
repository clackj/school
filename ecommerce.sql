-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 09 mars 2018 à 15:56
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `photo`, `designation`) VALUES
(1, '/images/sensei.jpg', 'Mouse'),
(2, '/images/v2frost.jpg', 'Headset'),
(3, '/images/6gv2.jpg', 'Keyboard');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `pricetotal` varchar(255) NOT NULL,
  `buyerid` int(11) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`orderid`),
  KEY `buyerid` (`buyerid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `produit` varchar(100) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `produit`, `quantity`, `price`, `description`) VALUES
(1, 'SteelSeries Sensei Fnatic', '50', '120', 'The Sensei is the grand-master in the SteelSeries dojo.'),
(2, 'SteelSeries V2 Frost', '50', '168', 'Based on the award-winning SteelSeries Siberia Full-size Headset'),
(3, 'SteelSeries 6Gv2 ', '50', '90', 'The SteelSeries 6Gv2, modeled after the award winning SteelSeries 7G keyboard');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`) VALUES
(1),
(1),
(1),
(2),
(2),
(1),
(1),
(1),
(1),
(3),
(3),
(1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) DEFAULT NULL,
  `pwd` varchar(35) DEFAULT NULL,
  `civile` varchar(50) NOT NULL,
  `nom` varchar(35) DEFAULT NULL,
  `prenom` varchar(35) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `telephone` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `civile`, `nom`, `prenom`, `address`, `city`, `zip`, `telephone`) VALUES
(11, 'admin', 'admin', 'M', 'cactus hmar', 'tayloswift', 'azfafazf', 'qfqdf', '75012', '0604750478'),
(10, 'afazfaz@free.fr', 'fqsfqsf', 'M', 'afazf', 'zdfsdg', 'azfafazf', 'qfqdf', '75012', '0604750478'),
(12, 'afazfaz@free.fr', 'azfqsfq', 'M', 'erghdf', 'afazf', 'azfafazf', 'qfqdf', '75012', '0604750478'),
(13, 'MUSTAPHA.KARRAM@GMAIL.COM', 'afazf', 'M', 'Karram', 'Mustapha', 'passage chella hey elqods, 28', 'Berrechid', '26100', '0604750840'),
(14, 'clackj@free.fr', '123456', 'M', 'Karram', 'Mustapha', 'passage chella hey elqods, 28', 'Berrechid', '26100', '0604750840');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
