-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2017 at 10:05 AM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.8-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolsa_valores`
--

-- --------------------------------------------------------

--
-- Table structure for table `instituicoes`
--

CREATE TABLE `instituicoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `CNPJ` varchar(18) NOT NULL,
  `CEP` varchar(9) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `tipo` enum('Universidade','Aceleradora','Extensão','SEBRAE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instituicoes`
--

INSERT INTO `instituicoes` (`id`, `nome`, `CNPJ`, `CEP`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `tipo`) VALUES
(2, 'runei', '123', '9587', 'end', 123, 'compl', 'beirroo', 'cida', 'AL', 'Aceleradora');

-- --------------------------------------------------------

--
-- Table structure for table `moderadores`
--

CREATE TABLE `moderadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `data_nasc` date NOT NULL,
  `id_instituicao` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `data_ini` date NOT NULL,
  `data_fim` date NOT NULL,
  `descricao` blob NOT NULL,
  `protocolo` int(11) NOT NULL,
  `funcao` enum('Professor','Facilitador','Outra Função','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderadores`
--

INSERT INTO `moderadores` (`id`, `nome`, `data_nasc`, `id_instituicao`, `email`, `data_ini`, `data_fim`, `descricao`, `protocolo`, `funcao`) VALUES
(8, 'no', '2017-12-31', 2, 'djk@g.com', '2017-12-28', '2017-12-31', 0x647364, 5, 'Professor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instituicoes`
--
ALTER TABLE `instituicoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderadores`
--
ALTER TABLE `moderadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `protocolo` (`protocolo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instituicoes`
--
ALTER TABLE `instituicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `moderadores`
--
ALTER TABLE `moderadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
