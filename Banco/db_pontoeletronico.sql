-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18/06/2024 às 22:34
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_pontoeletronico`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_registros_ponto`
--

DROP TABLE IF EXISTS `tbl_registros_ponto`;
CREATE TABLE IF NOT EXISTS `tbl_registros_ponto` (
  `id_registro` int NOT NULL AUTO_INCREMENT,
  `localizacao` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `id_usuario` int NOT NULL,
  `justificativa` varchar(255) NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Despejando dados para a tabela `tbl_registros_ponto`
--

INSERT INTO `tbl_registros_ponto` (`id_registro`, `localizacao`, `hora`, `data`, `tipo`, `id_usuario`, `justificativa`) VALUES
(1, 'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRASIL', '22:40:48', '2024-06-17', 'ENTRADA', 1, ''),
(2, 'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRASIL', '22:48:17', '2024-06-17', 'SAIDA', 1, ''),
(3, 'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRAZIL', '22:22', '2222-02-22', 'SAIDA', 1, 'SDADSD'),
(4, 'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRAZIL', '12:00', '2024-06-05', 'ENTRADA', 1, 'TESTE'),
(5, 'R. PROF. CEVANES MONTEIRO, 163 - RIO MADEIRA, PORTO VELHO - RO, 76821-350, BRAZIL', '13:00', '2024-06-05', 'SAIDA', 1, 'TESTE');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `primeiro_nome` varchar(255) NOT NULL,
  `ultimo_nome` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `primeiro_nome`, `ultimo_nome`, `email`, `senha`) VALUES
(1, 'João', 'Silva', 'joao.silva@example.com', 'senha123'),
(2, 'Maria', 'Oliveira', 'maria.oliveira@example.com', 'senha456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
