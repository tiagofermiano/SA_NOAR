-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Ago-2023 às 14:40
-- Versão do servidor: 8.0.21
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `socorro_sa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bombeiro`
--

CREATE TABLE `bombeiro` (
  `id_bombeiro` int NOT NULL,
  `nome` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cpf` int NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id_ocorrencia` int NOT NULL,
  `data` date NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `nome_hospital` text NOT NULL,
  `USB` int NOT NULL,
  `numero_ocorrencia` int NOT NULL,
  `despachante` text NOT NULL,
  `hora_chegada` time(4) NOT NULL,
  `km_final` decimal(5,0) NOT NULL,
  `codigo_IR` tinyint(1) NOT NULL,
  `codigo_PS` tinyint(1) NOT NULL,
  `codigo_SIA/SUS` int NOT NULL,
  `tipo_ocorrencia` set('AFOGAMENTO','AGRESSÃO','ATROPELAMENTO','CHOQUE ELÉTRICO','DESABAMENTO','DOMÉSTICO','ESPORTIVO','CAUSADO POR ANIMAIS','COM MEIO DE TRANSP.','DESMORONAMENTO/DESLIZAMENTO','INTOXICAÇÃO','QUEDA BICICLETA','QUEDA MOTO','QUEDA NÍVEL <2M','TRABALHO','TRANSFERÊNCIA','EMERGÊNCIA MÉDICA','QUEDA DE ALTURA 2M','TENTATIVA DE SUICÍDIO','QUEDA PRÓPRIA ALTURA') NOT NULL,
  `cinematica` set('DISTÚRBIO DE COMPORTAMENTO','ENCONTRADO COM CAPACETE','ENCONTRADO DE CINTO','PARA-BRISA AVARIADO','CAMINHANDO NA CENA','PAINEL AVARIADO','VOLANTE TORCIDO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int NOT NULL,
  `nome` text NOT NULL,
  `idade` int NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `RG/CPF` int NOT NULL,
  `fone` int NOT NULL,
  `nome_acompanhante` text NOT NULL,
  `idade_acompanhante` int NOT NULL,
  `vitima_era` text NOT NULL,
  `forma_conducao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_paciente`
--

CREATE TABLE `situacao_paciente` (
  `id_situacao_paciente` int NOT NULL,
  `pressao_arterial` int NOT NULL,
  `pulso` int NOT NULL,
  `respiracao` int NOT NULL,
  `saturacao` int NOT NULL,
  `HGT` int NOT NULL,
  `temperatura` int NOT NULL,
  `perfusao` set('>2 SEG','<2 SEG') NOT NULL,
  `avaliacao` set('NORMAL','ANORMAL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bombeiro`
--
ALTER TABLE `bombeiro`
  ADD PRIMARY KEY (`id_bombeiro`);

--
-- Índices para tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id_ocorrencia`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Índices para tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  ADD PRIMARY KEY (`id_situacao_paciente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bombeiro`
--
ALTER TABLE `bombeiro`
  MODIFY `id_bombeiro` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id_ocorrencia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  MODIFY `id_situacao_paciente` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
