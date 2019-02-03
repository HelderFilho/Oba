-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2017 às 22:47
-- Versão do servidor: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pag`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acl_phinxlog`
--

DROP TABLE IF EXISTS `acl_phinxlog`;
CREATE TABLE IF NOT EXISTS `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL,
  `end_time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 170),
(2, 1, NULL, NULL, 'Pages', 2, 7),
(3, 2, NULL, NULL, 'display', 3, 4),
(4, 2, NULL, NULL, 'beforefilter', 5, 6),
(6, 1, NULL, NULL, 'Admin', 8, 57),
(7, 6, NULL, NULL, 'Dashboard', 9, 12),
(8, 7, NULL, NULL, 'admin_index', 10, 11),
(10, 6, NULL, NULL, 'Groups', 13, 26),
(16, 6, NULL, NULL, 'Languages', 27, 30),
(17, 16, NULL, NULL, 'admin_set', 28, 29),
(19, 6, NULL, NULL, 'Permissions', 31, 38),
(20, 19, NULL, NULL, 'admin_index', 32, 33),
(21, 19, NULL, NULL, 'admin_change', 34, 35),
(22, 19, NULL, NULL, 'admin_sync', 36, 37),
(24, 6, NULL, NULL, 'Users', 39, 56),
(41, 1, NULL, NULL, 'Clients', 58, 71),
(42, 41, NULL, NULL, 'index', 59, 60),
(43, 41, NULL, NULL, 'view', 61, 62),
(44, 41, NULL, NULL, 'add', 63, 64),
(45, 41, NULL, NULL, 'edit', 65, 66),
(46, 41, NULL, NULL, 'delete', 67, 68),
(47, 41, NULL, NULL, 'beforefilter', 69, 70),
(57, 1, NULL, NULL, 'Groups', 72, 85),
(58, 57, NULL, NULL, 'index', 73, 74),
(59, 57, NULL, NULL, 'view', 75, 76),
(60, 57, NULL, NULL, 'add', 77, 78),
(61, 57, NULL, NULL, 'edit', 79, 80),
(62, 57, NULL, NULL, 'delete', 81, 82),
(63, 57, NULL, NULL, 'beforefilter', 83, 84),
(65, 1, NULL, NULL, 'Logs', 86, 99),
(66, 65, NULL, NULL, 'index', 87, 88),
(67, 65, NULL, NULL, 'view', 89, 90),
(68, 65, NULL, NULL, 'add', 91, 92),
(69, 65, NULL, NULL, 'edit', 93, 94),
(70, 65, NULL, NULL, 'delete', 95, 96),
(71, 65, NULL, NULL, 'beforefilter', 97, 98),
(90, 1, NULL, NULL, 'Sellers', 100, 113),
(91, 90, NULL, NULL, 'index', 101, 102),
(92, 90, NULL, NULL, 'view', 103, 104),
(93, 90, NULL, NULL, 'add', 105, 106),
(94, 90, NULL, NULL, 'edit', 107, 108),
(95, 90, NULL, NULL, 'delete', 109, 110),
(96, 90, NULL, NULL, 'beforefilter', 111, 112),
(98, 1, NULL, NULL, 'Users', 114, 131),
(99, 98, NULL, NULL, 'index', 115, 116),
(100, 98, NULL, NULL, 'view', 117, 118),
(101, 98, NULL, NULL, 'add', 119, 120),
(102, 98, NULL, NULL, 'edit', 121, 122),
(103, 98, NULL, NULL, 'delete', 123, 124),
(104, 98, NULL, NULL, 'logout', 125, 126),
(105, 98, NULL, NULL, 'beforefilter', 127, 128),
(107, 10, NULL, NULL, 'index', 14, 15),
(108, 10, NULL, NULL, 'view', 16, 17),
(109, 10, NULL, NULL, 'add', 18, 19),
(110, 10, NULL, NULL, 'edit', 20, 21),
(111, 10, NULL, NULL, 'delete', 22, 23),
(112, 10, NULL, NULL, 'beforefilter', 24, 25),
(113, 24, NULL, NULL, 'index', 40, 41),
(114, 24, NULL, NULL, 'view', 42, 43),
(115, 24, NULL, NULL, 'add', 44, 45),
(116, 24, NULL, NULL, 'edit', 46, 47),
(117, 24, NULL, NULL, 'delete', 48, 49),
(118, 24, NULL, NULL, 'logout', 50, 51),
(119, 24, NULL, NULL, 'beforefilter', 52, 53),
(120, 1, NULL, NULL, 'DebugKit', 132, 141),
(121, 120, NULL, NULL, 'ToolbarAccess', 133, 140),
(122, 121, NULL, NULL, 'history_state', 134, 135),
(123, 121, NULL, NULL, 'sql_explain', 136, 137),
(124, 121, NULL, NULL, 'returnData', 138, 139),
(125, 1, NULL, NULL, 'Documents', 142, 155),
(126, 125, NULL, NULL, 'index', 143, 144),
(127, 125, NULL, NULL, 'view', 145, 146),
(128, 125, NULL, NULL, 'add', 147, 148),
(129, 125, NULL, NULL, 'edit', 149, 150),
(130, 125, NULL, NULL, 'delete', 151, 152),
(131, 125, NULL, NULL, 'beforefilter', 153, 154),
(132, 1, NULL, NULL, 'PaymentMethods', 156, 169),
(133, 132, NULL, NULL, 'index', 157, 158),
(134, 132, NULL, NULL, 'view', 159, 160),
(135, 132, NULL, NULL, 'add', 161, 162),
(136, 132, NULL, NULL, 'edit', 163, 164),
(137, 132, NULL, NULL, 'delete', 165, 166),
(138, 132, NULL, NULL, 'beforefilter', 167, 168),
(146, 98, NULL, NULL, 'permissaoErro', 129, 130),
(147, 24, NULL, NULL, 'permissaoErro', 54, 55);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `_read` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `_update` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `_delete` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 2, 3, '0', '0', '0', '0'),
(2, 2, 43, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` char(1) CHARACTER SET utf8 DEFAULT 'S',
  `created` datetime DEFAULT NULL,
  `removed` char(1) CHARACTER SET utf8 DEFAULT 'N',
  `modified` datetime DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sex` char(2) CHARACTER SET utf8 DEFAULT 'MA',
  `date_birth` date DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone_2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `neighborhood` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `uf` char(2) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `cpf` varchar(14) COLLATE utf8_bin NOT NULL,
  `rg` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabela Referente aos Clientes';

-- --------------------------------------------------------

--
-- Estrutura da tabela `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `client_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `removed` enum('N','S') NOT NULL DEFAULT 'N',
  `active` enum('N','S') NOT NULL DEFAULT 'S',
  `date_document` date NOT NULL,
  `descripition` text,
  PRIMARY KEY (`id`,`client_id`,`seller_id`),
  KEY `fk_documents_clients_idx` (`client_id`),
  KEY `fk_documents_sellers1_idx` (`seller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `documents_payment_methods`
--

DROP TABLE IF EXISTS `documents_payment_methods`;
CREATE TABLE IF NOT EXISTS `documents_payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `value` decimal(40,20) NOT NULL DEFAULT '0.00000000000000000000',
  `dicount` decimal(40,20) NOT NULL DEFAULT '0.00000000000000000000',
  PRIMARY KEY (`document_id`,`payment_method_id`,`id`),
  KEY `fk_documents_has_payment_methods_payment_methods1_idx` (`payment_method_id`),
  KEY `fk_documents_has_payment_methods_documents1_idx` (`document_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `alias` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` enum('S','N') CHARACTER SET utf8 NOT NULL DEFAULT 'S',
  `removed` enum('S','N') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `alias`, `created`, `modified`, `active`, `removed`) VALUES
(1, 'Admin', 'admin', '2015-02-09 19:05:33', '2015-02-09 19:05:33', 'S', 'N'),
(2, 'Public', 'public', '2015-02-09 19:06:30', '2015-02-09 19:06:30', 'S', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `model` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `action` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `old_data` text CHARACTER SET utf8,
  `new_data` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_FKUser` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) NOT NULL,
  `removed` enum('N','S') NOT NULL DEFAULT 'N',
  `active` enum('N','S') NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` char(1) CHARACTER SET utf8 DEFAULT 'S',
  `created` datetime DEFAULT NULL,
  `removed` char(1) CHARACTER SET utf8 DEFAULT 'N',
  `modified` datetime DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `sex` char(2) CHARACTER SET utf8 DEFAULT 'MA',
  `date_birth` date DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone_2` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `neighborhood` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(155) CHARACTER SET utf8 DEFAULT NULL,
  `uf` char(2) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` varchar(10) DEFAULT NULL,
  `value` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `active` enum('S','N') CHARACTER SET utf8 NOT NULL DEFAULT 'S',
  `removed` enum('S','N') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`, `status`, `name`, `email`, `image`, `active`, `removed`) VALUES
(1, 'smile', '95204b38239c3c14176b03a7a0e265c9d91b51d5', 1, '2015-02-09 19:07:29', '2015-02-10 23:21:36', 1, 'Smile', 'smile@fabtechinfo.com', NULL, 'S', 'N'),
(2, 'adm', '89c8df50a9cbec9cabf5074d6128c3c0cf497293', 1, '2015-02-10 22:18:25', '2015-02-12 19:08:27', 1, 'Smile', 'smile@fabtechinfo.com', NULL, 'S', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
