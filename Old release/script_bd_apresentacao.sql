-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Nov-2019 às 09:15
-- Versão do servidor: 5.7.19-log
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sabc_cps`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `automovel`
--

DROP TABLE IF EXISTS `automovel`;
CREATE TABLE IF NOT EXISTS `automovel` (
  `idautomovel` int(11) NOT NULL AUTO_INCREMENT,
  `num_matricula` varchar(45) NOT NULL,
  `idproprietario` int(11) NOT NULL,
  PRIMARY KEY (`idautomovel`),
  KEY `fk_automovel_proprietario_idx` (`idproprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `automovel`
--

INSERT INTO `automovel` (`idautomovel`, `num_matricula`, `idproprietario`) VALUES
(1, 'LD-10-12-GH', 1),
(2, 'LD-11-12-GH', 2),
(3, 'LD-12-12-GH', 3),
(4, 'LD-13-12-GH', 1),
(5, 'LD-14-12-GH', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mes`
--

DROP TABLE IF EXISTS `mes`;
CREATE TABLE IF NOT EXISTS `mes` (
  `idmes` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idmes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mes`
--

INSERT INTO `mes` (`idmes`, `descricao`) VALUES
(1, 'Janeiro'),
(2, 'Fevereiro'),
(3, 'Março'),
(4, 'Abril'),
(5, 'Maio'),
(6, 'Junho'),
(7, 'Julho'),
(8, 'Agosto'),
(9, 'Setembro'),
(10, 'Outubro'),
(11, 'Novembro'),
(12, 'Dezembro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pag_seguro`
--

DROP TABLE IF EXISTS `pag_seguro`;
CREATE TABLE IF NOT EXISTS `pag_seguro` (
  `idpag_seguro` int(11) NOT NULL AUTO_INCREMENT,
  `data_pag` datetime NOT NULL,
  `idmes` int(11) NOT NULL,
  `idautomovel` int(11) NOT NULL,
  PRIMARY KEY (`idpag_seguro`),
  KEY `fk_pag_seguro_mes1_idx` (`idmes`),
  KEY `fk_pag_seguro_automovel1_idx` (`idautomovel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pag_seguro`
--

INSERT INTO `pag_seguro` (`idpag_seguro`, `data_pag`, `idmes`, `idautomovel`) VALUES
(1, '2019-11-12 00:00:00', 3, 1),
(2, '2019-11-12 03:29:37', 11, 2),
(3, '2019-11-04 00:00:00', 1, 3),
(4, '2019-10-10 00:00:00', 5, 4),
(5, '2019-10-16 00:00:00', 5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pag_taxa`
--

DROP TABLE IF EXISTS `pag_taxa`;
CREATE TABLE IF NOT EXISTS `pag_taxa` (
  `idpag_taxa` int(11) NOT NULL AUTO_INCREMENT,
  `data_pag` datetime NOT NULL,
  `idmes` int(11) NOT NULL,
  `idautomovel` int(11) NOT NULL,
  PRIMARY KEY (`idpag_taxa`),
  KEY `fk_pag_taxa_mes1_idx` (`idmes`),
  KEY `fk_pag_taxa_automovel1_idx` (`idautomovel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pag_taxa`
--

INSERT INTO `pag_taxa` (`idpag_taxa`, `data_pag`, `idmes`, `idautomovel`) VALUES
(1, '2019-10-16 00:00:00', 7, 1),
(2, '2019-10-15 00:00:00', 5, 2),
(3, '2019-10-16 00:00:00', 6, 3),
(4, '2019-11-12 03:30:40', 11, 4),
(5, '2019-10-16 00:00:00', 3, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

DROP TABLE IF EXISTS `permissao`;
CREATE TABLE IF NOT EXISTS `permissao` (
  `idpermissao` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idpermissao`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`idpermissao`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Usuário Normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

DROP TABLE IF EXISTS `proprietario`;
CREATE TABLE IF NOT EXISTS `proprietario` (
  `idproprietario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `num_bi` varchar(45) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  PRIMARY KEY (`idproprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`idproprietario`, `nome`, `num_bi`, `telefone`) VALUES
(1, 'Maurício Pedro', '005614229BO048', '923451234'),
(2, 'MIguel Pedro Gomes', '002314279BO045', '925451837'),
(3, 'Manuel de Oliveira', '003623229BO048', '925478836');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `nome_usu` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `idpermissao` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_user_permissao1_idx` (`idpermissao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`iduser`, `nome`, `nome_usu`, `senha`, `idpermissao`) VALUES
(1, 'Nganzadi Pedro', 'pedro', 'fb3c54951ec85881385b79391886511b', 1),
(2, 'NDSI', 'ndsi', '6d91d65fe5c6aa5794a023bc4eda7eef', 1),
(3, 'Carlos António', 'causer', '80a93185d5d64a9c8c8e1189bb5911b2', 2),
(4, 'Gentil Pinto', 'design', 'c4b2504bc996c29b49210fa126de7f60', 2);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `automovel`
--
ALTER TABLE `automovel`
  ADD CONSTRAINT `fk_automovel_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pag_seguro`
--
ALTER TABLE `pag_seguro`
  ADD CONSTRAINT `fk_pag_seguro_automovel1` FOREIGN KEY (`idautomovel`) REFERENCES `automovel` (`idautomovel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pag_seguro_mes1` FOREIGN KEY (`idmes`) REFERENCES `mes` (`idmes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pag_taxa`
--
ALTER TABLE `pag_taxa`
  ADD CONSTRAINT `fk_pag_taxa_automovel1` FOREIGN KEY (`idautomovel`) REFERENCES `automovel` (`idautomovel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pag_taxa_mes1` FOREIGN KEY (`idmes`) REFERENCES `mes` (`idmes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_permissao1` FOREIGN KEY (`idpermissao`) REFERENCES `permissao` (`idpermissao`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
