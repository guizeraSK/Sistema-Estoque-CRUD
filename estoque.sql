-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Abr-2021 às 02:50
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

DROP TABLE IF EXISTS `dados`;
CREATE TABLE IF NOT EXISTS `dados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(30) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `preco` varchar(20) DEFAULT NULL,
  `datafabricacao` date DEFAULT NULL,
  `datacadastro` date DEFAULT NULL,
  `fornecedor` varchar(30) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `rua_num` varchar(20) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `cep` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `marca`, `modelo`, `cor`, `preco`, `datafabricacao`, `datacadastro`, `fornecedor`, `telefone`, `email`, `rua`, `rua_num`, `cidade`, `estado`, `cep`) VALUES
(27, 'hdfghfghgf', 'fsgsdgdf', '#ac1b1b', '12,90', '2021-03-28', '2021-04-02', 'gsdfgsdfg', '51 99721-9510', 'guisantiago1@gmail.com', 'fghgfh', '123', 'dfsgsdfg', 'MA', '95540-000'),
(25, 'asdasd', 'dfadfasdfa', 'asdasda', '12,90', '2021-03-28', '2021-04-06', 'joao', '51 99721-9510', 'guisantiago1@gmail.com', 'dfadfds', '12312', 'dfgadfasd', 'RO', '95540-000'),
(26, 'gshgsdfg', 'hjfsghsdfghs', 'gsdfgadf', '12,90', '2021-03-29', '2021-04-14', 'tiago', '51 99721-9510', 'guisantiago1@gmail.com', 'ghsfdgsdf', '2341', 'dfsghsdfgsd', 'MT', '95540-000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nome`, `login`, `senha`) VALUES
(1, 'Guilherme', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Kadu', 'kadu', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Pedro', 'pedro', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Guilherme', 'guisk', 'c80e32917af0703d4bb4f01eb1648e11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
