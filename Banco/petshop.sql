-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jul-2022 às 15:58
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `hora` text NOT NULL,
  `datae` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `hora`, `datae`) VALUES
(2, '17:31', '2022-08-24'),
(4, '17:50', '2022-07-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(5) NOT NULL,
  `nome` text NOT NULL,
  `cep` text NOT NULL,
  `id_pais` text NOT NULL,
  `id_estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id`, `nome`, `cep`, `id_pais`, `id_estado`) VALUES
(2, 'tokio', '12232123', '', ''),
(3, 'Porto Rico', '55555', '', ''),
(5, 'Rio de Janeiro', '54897765765744', '11', '1'),
(6, 'Portooooooo', '4775541', 'Selecione um País', 'Selecione um Estado'),
(7, 'Xurupita', '877897987', '1', '12'),
(12, 'Porto Alegre', '', '', ''),
(13, 'Florienopolis', '654546546', '', ''),
(14, 'San Francisco', '7236487236487234', '2', '13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `nacionalidade` text NOT NULL,
  `cpf` text NOT NULL,
  `email` text NOT NULL,
  `telefone` text NOT NULL,
  `endereco` text NOT NULL,
  `numero` text NOT NULL,
  `cidade` text NOT NULL,
  `complemento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `nacionalidade`, `cpf`, `email`, `telefone`, `endereco`, `numero`, `cidade`, `complemento`) VALUES
(1, 'Jurema', 'Brasileira', '86550548957', 'jota@jotinha.com', '51999999999', 'Guatemala verde', '420', 'Porto Alegre', 'Nadinha'),
(3, 'Fazer600', 'Japao', '6655448844', 'nada@novo.com', '51544541', 'Dane-se', '666', 'Selecione uma opção:', 'Nada'),
(4, 'Nada bom', 'China', '86550543058', 'yuriaugusto64@gmail.com', '519992547', 'Rua Cacimbas', '13', '1', 'Fumante'),
(5, 'Joao', 'Nafda', '1231234124234', 'Eu@Eu.com', '123123123', '124124', '124124', '3', '124214'),
(6, 'Teste', 'Brasileiro', '86550543054', 'augusto6444@gmail.com', '519888888', 'Rua Cacimbas', '13', '12', 'Neadsdads'),
(7, 'Joao Jose', 'Argentino ', '162371263871263', 'Eu@EU.com', '519999999999', 'Teste', '122', '12', '23123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `uf` varchar(10) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `nome`, `uf`, `id_pais`) VALUES
(1, 'Rio Grande do Sul', 'RS', 6),
(2, 'Santa Catarina', 'SC', 1),
(5, 'Ceará', 'CE', 1),
(6, 'Recife', 'RE', 1),
(9, 'Distrito Federal', 'DF', 1),
(12, 'Bahia', 'BA', 5),
(13, 'Bahia', 'BH', 1),
(14, 'Acre', 'AAAA', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `sigla` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`id`, `nome`, `sigla`) VALUES
(1, 'Brasil', 'BR'),
(2, 'Canadá', 'CA'),
(5, 'Japao', 'JP'),
(6, 'Mexico', 'MX'),
(11, 'Estados Unidos', 'EUA'),
(14, 'Guatemala', 'GTM'),
(15, 'Guatemala', 'GM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `tutor` text NOT NULL,
  `raca` text NOT NULL,
  `idade` text NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pets`
--

INSERT INTO `pets` (`id`, `nome`, `tutor`, `raca`, `idade`, `info`) VALUES
(2, 'Pitty', 'Joao', 'Cachorroooooo', '8 meses', ''),
(5, 'Nada de novo', 'Nada bom', 'Cao', '30 dias', 'nada novo'),
(6, 'Fiona', 'Joao Jose', 'Cachorro', '5 anos', 'ashdkjahsdkj');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Índices para tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
