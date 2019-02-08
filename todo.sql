-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 08, 2019 at 03:16 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--
CREATE DATABASE IF NOT EXISTS `todo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `todo`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(128) DEFAULT NULL,
  `done` int(11) DEFAULT '0',
  `created_at` int(32) DEFAULT NULL,
  `updated_at` int(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `content`, `done`, `created_at`, `updated_at`) VALUES
(54, 1, 'Get groceries ', 0, 1549595642, 1549595642),
(55, 1, 'Pay bill', 0, 1549595646, 1549595646),
(56, 1, 'Coding test for SourceBreaker', 0, 1549595691, 1549595691),
(53, 1, 'Test item 1', 0, 1549595636, 1549595636);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `api_token` varchar(128) DEFAULT NULL,
  `created_at` int(32) DEFAULT NULL,
  `updated_at` int(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'sabo-vladimir@hotmail.com', '$2y$10$sbBFB2I6s.KcZXQYIxL7ZegQotKFrLNXjf6YdZ6ikKbWAQlqLFW.y', 'd3f8951a588c5deefaf71e76741e65d6', 1549595642, 1549595642);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
