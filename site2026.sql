-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2026 às 19:40
-- Versão do servidor: 10.11.16-MariaDB
-- Versão do PHP: 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site2026`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(160) NOT NULL,
  `mensagem` text NOT NULL,
  `criado_em` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `email`, `mensagem`, `criado_em`) VALUES
(1, 'luiz', 'tartarilucas2@gmail.com', 'sss', '2026-11-23 22:04:47'),
(2, 'alisson', 'tartarilucas2@gmail.com', 'hhhhhh', '2026-11-24 13:05:43'),
(3, 'alisson', 'tartarilucas2@gmail.com', 'hhhhhh', '2026-11-24 13:05:50'),
(4, 'alisson', 'tartarilucas2@gmail.com', 'hhhhhh', '2026-11-24 13:16:38'),
(5, 'luiz', 'tartarilucas2@gmail.com', 'll', '2026-11-24 13:46:27'),
(6, 'luiz', 'tartarilucas2@gmail.com', 'll', '2026-11-24 13:46:30'),
(7, 'luiz', 'tartarilucas2@gmail.com', 'll', '2026-11-24 13:49:25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(140) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `alt_texto` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`id`, `titulo`, `descricao`, `preco`, `imagem`, `alt_texto`) VALUES
(1, 'Upgrade de Componentes', 'Substituição de HDs antigos por SSDs velozes e expansão de memória para dar mais velocidade à máquina.', 25.00, 'img/Captura de tela 2026-09-01 213735.png', 'Upgrade de Componentes'),
(2, 'Formatação e Instalação de Software', 'Instalação de sistemas operacionais (como Windows), pacotes de escritório e programas essenciais.', 21.50, 'img/Captura de tela 2026-09-01 213717.png', 'Formatação'),
(3, 'Suporte Técnico e Help Desk', 'Atendimento presencial ou remoto via acesso à internet para solucionar dúvidas e falhas diárias.', 17.00, 'img/Captura de tela 2026-09-01 213656.png', 'Suporte Técnico'),
(4, 'Manutenção Preventiva', 'Limpeza interna e externa, remoção de poeira, troca de pasta térmica e verificação de cabos para evitar superaquecimento.', 25.00, 'img/Captura de tela 2026-09-01 213630.png', 'Manutenção Preventiva'),
(5, 'Manutenção Corretiva e Reparo de Hardware', 'Troca ou conserto de peças danificadas, como placas-mãe, fontes de alimentação, memórias RAM e discos rígidos.', 30.00, 'img/Captura de tela 2026-09-01 213601.png', 'Manutenção Corretiva');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
