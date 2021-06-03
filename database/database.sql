-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 11-Maio-2018 às 15:30
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhc`
--
CREATE DATABASE IF NOT EXISTS `mhc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mhc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  `date_lastlogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `username`, `status`, `date_lastlogin`) VALUES
(4, 'admin', 0, '2018-05-11 08:10:25'),
(7, 'AnÃ³nimo', 0, '2018-05-11 03:22:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(32) DEFAULT NULL,
  `content` varchar(253) DEFAULT NULL,
  `data_insert` datetime DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `author` (`author`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quotes`
--

DROP TABLE IF EXISTS `quotes`;
CREATE TABLE IF NOT EXISTS `quotes` (
  `id_quotes` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(512) DEFAULT NULL,
  `author_quote` varchar(256) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `image_name` varchar(512) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `data_insert` datetime DEFAULT NULL,
  PRIMARY KEY (`id_quotes`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(32) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `typeuser` varchar(10) DEFAULT NULL,
  `avatar` varchar(256) DEFAULT NULL,
  `status` varchar(64) NOT NULL DEFAULT 'active',
  `data_registo` datetime DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `typeuser`, `avatar`, `status`, `data_registo`) VALUES
('admin', 'admin@mhc.pt', '$2y$10$mkrcAXvLPeXmIWJILEJLQ.rYz4q7n6aUZeglUkE366A0QdMxzT3fK', 'admin', 'adminavatar.jpg', 'active', '2018-05-09 04:10:24'),
('AnÃ³nimo', 'anonimo@mhc.pt', '$2y$10$VRh4U1oOGctmkYm.bRQnbebsldweJAqS7x/cVNvwgGVkQw7/.CrtK', 'user', 'defaultuser.png', 'active', '2018-05-11 03:22:37');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`username`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
