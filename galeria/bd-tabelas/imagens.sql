-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jul-2022 às 14:03
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `galeria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `dia` datetime NOT NULL DEFAULT current_timestamp(),
  `album` varchar(50) NOT NULL,
  `qnt_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome`, `imagem`, `dia`, `album`, `qnt_like`) VALUES
(1, '', 'WP_20130306_005(1).jpg', '2022-06-25 08:00:54', '1', 1),
(2, '', 'WP_20171124_001.jpg', '2022-06-25 08:05:21', '1', 2),
(3, '', 'WP_20171124_003.jpg', '2022-06-25 08:07:55', '1', 1),
(4, '', 'VIDEO0002_0000000068-1.jpg', '2022-06-25 08:08:56', 'seleciona album', 0),
(7, '', 'WP_20130306_005(1).jpg', '2022-06-26 08:13:13', 'seleciona album', 0),
(8, '', 'WP_20171124_034.jpg', '2022-06-26 08:14:35', 'seleciona album', 1),
(9, 'Katende', 'VIDEO0002_0000000068-1.jpg', '2022-06-27 00:11:56', '1', 0),
(10, 'xxt', '9e2b049155db6bea0839b4ab0e78fa8b.jpg', '2022-06-27 01:34:43', 'xxxtentacion', 1),
(11, 'xxxtentancio', '106911888_172649064302514_9197013286299571071_n.jpg', '2022-06-29 15:40:59', 'xxxtentacion', 0),
(12, 'kid xxt', '138075080_193038772503625_3160535067547625688_n.jpg', '2022-06-29 15:44:20', 'xxxtentacion', 0),
(13, 'michael jackson', '83424d766f81a6308071a64d5e6bcb5e.jpg', '2022-06-29 18:48:09', 'Michael Jackson', 0),
(14, 'trilha jack', 'f20bda7174631c8581cf081ec74118ba.jpg', '2022-06-29 18:48:44', 'Michael Jackson', 1),
(15, 'r9', 'f334a30dd69eab39a0c360ab37879c9f.jpg', '2022-06-29 19:11:55', 'Ronaldo fenômeno', 1),
(16, 'r9 inter', 'FB_IMG_15845718181061380.jpg', '2022-06-29 19:12:19', 'Ronaldo fenômeno', 1),
(17, 'n84', 'FB_IMG_16338510102385565.jpg', '2022-07-01 22:41:58', 'naruto', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
