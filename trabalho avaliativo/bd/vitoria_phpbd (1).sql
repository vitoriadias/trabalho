-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 15-Out-2018 às 16:10
-- Versão do servidor: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitoria_phpbd`
--
CREATE DATABASE IF NOT EXISTS `vitoria_phpbd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vitoria_phpbd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `cod_adm` int(11) NOT NULL AUTO_INCREMENT,
  `nome_adm` varchar(50) DEFAULT NULL,
  `cpf_adm` bigint(20) DEFAULT NULL,
  `senha_adm` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`cod_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`cod_adm`, `nome_adm`, `cpf_adm`, `senha_adm`) VALUES
(1, 'Vitória', 123, '202cb962ac59075b964b07152d234b70'),
(2, 'Admin', 258, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `cpf` bigint(20) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`matricula`, `nome`, `senha`, `cpf`, `endereco`) VALUES
(1, 'Vitória', '202cb962ac59075b964b07152d234b70', 148, 'Rua José Barbosa'),
(2, 'Ana', '202cb962ac59075b964b07152d234b70', 147, 'Rua Osvaldo Cruz'),
(3, 'Treyci', '202cb962ac59075b964b07152d234b70', 321, 'Rua Deoclides Mendes'),
(4, 'Mariana', '202cb962ac59075b964b07152d234b70', 159, 'Rua Teotônio Fonseca'),
(5, 'Maria', '202cb962ac59075b964b07152d234b70', 158, 'Rua Teotônio Fonseca'),
(6, 'Janete', '202cb962ac59075b964b07152d234b70', 157, 'Rua Belizário Silveira'),
(7, 'Rita', '202cb962ac59075b964b07152d234b70', 156, 'Av. Gentil Dias'),
(8, 'Gabriel', '202cb962ac59075b964b07152d234b70', 163, 'Rua Duzentos e Setenta'),
(9, 'Isanna', '202cb962ac59075b964b07152d234b70', 357, 'Rua Ns. Sra. Rosa Mística'),
(10, 'Rafael', '202cb962ac59075b964b07152d234b70', 456, 'Rua José Barbosa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE IF NOT EXISTS `disciplinas` (
  `cod_disc` varchar(50) NOT NULL,
  `nome_disc` varchar(50) DEFAULT NULL,
  `carga_hor` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_disc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`cod_disc`, `nome_disc`, `carga_hor`) VALUES
('1', 'Português', 60),
('2', 'Literatura', 60),
('3', 'Geografia', 60),
('4', 'Matemática', 70),
('5', 'História', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula_aluno`
--

CREATE TABLE IF NOT EXISTS `matricula_aluno` (
  `cod_matricula` int(11) NOT NULL AUTO_INCREMENT,
  `cod_aluno` int(11) DEFAULT NULL,
  `cod_disciplina` varchar(40) DEFAULT NULL,
  `data_matricula` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `matricula_aluno`
--

INSERT INTO `matricula_aluno` (`cod_matricula`, `cod_aluno`, `cod_disciplina`, `data_matricula`) VALUES
(5, 2, '1', '2018-10-04 16:11:47'),
(6, 3, '2', '2018-10-04 16:23:10'),
(7, 4, '4', '2018-10-05 11:29:05'),
(9, 1, '1', '2018-10-05 12:08:17'),
(10, 4, '2', '2018-10-05 12:09:36'),
(11, 6, '4', '2018-10-05 12:12:17'),
(12, 6, '2', '2018-10-05 12:41:01'),
(13, 10, '1', '2018-10-08 10:57:41'),
(14, 4, '3', '2018-10-08 10:58:03'),
(15, 5, '3', '2018-10-08 10:58:14'),
(16, 6, '3', '2018-10-08 10:58:20'),
(17, 9, '4', '2018-10-08 10:58:42'),
(18, 7, '5', '2018-10-08 10:59:13'),
(19, 8, '5', '2018-10-08 10:59:27'),
(20, 9, '5', '2018-10-08 10:59:34'),
(21, 10, '3', '2018-10-08 11:00:59'),
(22, 10, '4', '2018-10-08 11:01:07'),
(23, 9, '1', '2018-10-08 11:01:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
