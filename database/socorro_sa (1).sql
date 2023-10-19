-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Out-2023 às 15:29
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
-- Estrutura da tabela `atendendimento`
--

CREATE TABLE `atendendimento` (
  `id_atendimento` int NOT NULL,
  `motorista` varchar(100) NOT NULL,
  `socorrista_1` varchar(100) NOT NULL,
  `socorrista_2` varchar(100) NOT NULL,
  `socorrista_3` varchar(100) NOT NULL,
  `demandante` varchar(100) NOT NULL,
  `equipe` varchar(100) NOT NULL,
  `procedimentos_efetuados` set('ASPIRAÇÃO','AVALIAÇÃO INICIAL','AVALIAÇÃO DIRIGIDA','AVALIAÇÃO CONTIN.','CHAVE DE RAUTEK','CÂNULA DE GUEDEL','DESOBSTRUÇÃO DE V.A.','EMPREGO DO D.E.A','GESTÃO DE RISCOS','LIMPEZA DE FERIMEN.','MEMBRO INF.DIR.','MEMBRO INF. ESQ.','MEMBRO SUP.DIR.','MEMBRO SUP.ESQ.','QUADRIL','TOMADA DECISÃO','TRATADO CHOQUE','USO COLAR','OXIGENIOTERAPIA','REANIMADOR','CURATIVOS','COMPRESSIVO','ENCRAVAMENTO','OCULAR','QUEIMADURA','SIMPLES','3 PONTAS','IMOBILIZAÇÕES','CERVICAL','MACA SOB. RODAS','MACA RÍGIDA','PONTE','RETIRA CAPACETE','R.C.P.','ROLAMENTO 90°','ROLAMENTO 180°','USO KED','USO TTF','VENTIL. SUPO.') NOT NULL,
  `meios_auxiliares` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

CREATE TABLE `atendente` (
  `id_atendente` int NOT NULL,
  `nome` text NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `data_cadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `atendente`
--

INSERT INTO `atendente` (`id_atendente`, `nome`, `cpf`, `email`, `senha`, `data_cadastro`) VALUES
(1, 'bagos', '12345678945', 'bagos@gmail.com', 'bagos123', '2023-10-18 14:03:08'),
(2, 'tiago', '13198160960', 'tiago@gmail.com', '123', '2023-10-18 09:04:35'),
(3, 'teste', '45645645643', 'teste@gmail.com', '123', '2023-10-18 09:28:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_cinematica`
--

CREATE TABLE `avaliacao_cinematica` (
  `id_avaliacao_cinemaica` int NOT NULL,
  `disturbio_comportamento` tinyint NOT NULL,
  `encontrado_capacete` tinyint NOT NULL,
  `encontrado_cinto` tinyint NOT NULL,
  `parabrisa_avariado` tinyint NOT NULL,
  `caminhando_cena` tinyint NOT NULL,
  `painel_avariado` tinyint NOT NULL,
  `volante_torcido` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diabetes`
--

CREATE TABLE `diabetes` (
  `id_diabetes` int NOT NULL,
  `hiperglicemia` tinyint(1) DEFAULT NULL,
  `hipoglicemia` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `info_ocorrencia`
--

CREATE TABLE `info_ocorrencia` (
  `id_info_ocorrencia` int NOT NULL,
  `data` date NOT NULL,
  `local_ocorrencia` varchar(100) NOT NULL,
  `nome_hospital` varchar(100) NOT NULL,
  `numero_usb` varchar(2) NOT NULL,
  `numero_ocorrencia` varchar(8) NOT NULL,
  `despacho` text NOT NULL,
  `hora_chegada` time(4) NOT NULL,
  `km_final` varchar(4) NOT NULL,
  `codigo_ir` varchar(10) NOT NULL,
  `codigo_ps` varchar(10) NOT NULL,
  `codigo_sia_sus` varchar(10) NOT NULL,
  `tipo_ocorrencia` set('Afogamento','Atropelamento','Desabamento','Esportivo','Com meio de transp.','Intoxicação','Emergência Médica','Tentativa de suicídio','Agressão','Choque elétrico','Doméstico','Causado por animais','Desmor./Desliz.','Queda bicicleta','Queda nível menor que 2M','Transferência','Queda de altura 2M','Queda própria altura') NOT NULL,
  `avaliacao_cinematica` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `info_paciente`
--

CREATE TABLE `info_paciente` (
  `id_info_paciente` int NOT NULL,
  `nome_paciente` int NOT NULL,
  `idade_paciente` varchar(3) NOT NULL,
  `sexo_paciente` set('Masculino','Feminino') NOT NULL,
  `rg_cpf_paciente` varchar(11) NOT NULL,
  `nome_acompanhante` text NOT NULL,
  `idade_acompanhante` varchar(3) NOT NULL,
  `vitima_era` set('Ciclista','Gestante','Pas.Moto','Clínico','Pas.Bco.Trás','Condutor moto','Pas.Bco.Frente','Condutor carro','Trauma','Pedestre','') NOT NULL,
  `forma_conducao` set('Deitada','Semi-deitada','Sentada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `meios_auxiliares`
--

CREATE TABLE `meios_auxiliares` (
  `id_meios_auxiliares` int NOT NULL,
  `celesc` tinyint(1) DEFAULT NULL,
  `def_civil` tinyint(1) DEFAULT NULL,
  `igp_pc` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_consciencia`
--

CREATE TABLE `nivel_consciencia` (
  `id_nivel_consciencia` int NOT NULL,
  `abertura_ocular` int NOT NULL,
  `resposta _verbal` int NOT NULL,
  `resposta_motora` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `nivel_consciencia`
--

INSERT INTO `nivel_consciencia` (`id_nivel_consciencia`, `abertura_ocular`, `resposta _verbal`, `resposta_motora`) VALUES
(1, 2, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `obstetrico`
--

CREATE TABLE `obstetrico` (
  `id_obstetrico` int NOT NULL,
  `parto_emergencial` tinyint(1) DEFAULT NULL,
  `gestante` tinyint(1) DEFAULT NULL,
  `hemorragia_excessiva` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `policia`
--

CREATE TABLE `policia` (
  `id_policia` int NOT NULL,
  `civil` tinyint(1) NOT NULL,
  `militar` tinyint(1) NOT NULL,
  `pre` tinyint(1) NOT NULL,
  `prf` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `problemas_encontrados`
--

CREATE TABLE `problemas_encontrados` (
  `id_problemas_encontrados` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `psiquiatrico` tinyint(1) DEFAULT NULL,
  `respiratorio` int NOT NULL,
  `diabetes` int NOT NULL,
  `obstetrico` int NOT NULL,
  `transporte` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimentos_efetuados`
--

CREATE TABLE `procedimentos_efetuados` (
  `id_procedimentos_efetuados` int NOT NULL,
  `meios_auxiliares` int NOT NULL,
  `policia` int NOT NULL,
  `samu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respiratorio`
--

CREATE TABLE `respiratorio` (
  `id_respiratorio` int NOT NULL,
  `inalacao_fumaca` tinyint(1) DEFAULT NULL,
  `DPOC` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_paciente`
--

CREATE TABLE `situacao_paciente` (
  `id_situacao_paciente` int NOT NULL,
  `medida_pressao` varchar(12) NOT NULL,
  `pulso` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `respiração` varchar(9) NOT NULL,
  `saturacao` varchar(4) NOT NULL,
  `hgt` varchar(9) NOT NULL,
  `temperatura` varchar(4) NOT NULL,
  `perfusao` varchar(6) NOT NULL,
  `normal_anormal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total_gcs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `situacao_paciente`
--

INSERT INTO `situacao_paciente` (`id_situacao_paciente`, `medida_pressao`, `pulso`, `respiração`, `saturacao`, `hgt`, `temperatura`, `perfusao`, `normal_anormal`, `total_gcs`) VALUES
(1, '22x22mmHg', '021 B.C.P.M.', '45 M.R.M.', '55 %', '333 mg/dL', '99°C', '>2 SEG', 'NORMAL', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `atendendimento`
--
ALTER TABLE `atendendimento`
  ADD PRIMARY KEY (`id_atendimento`);

--
-- Índices para tabela `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`id_atendente`);

--
-- Índices para tabela `avaliacao_cinematica`
--
ALTER TABLE `avaliacao_cinematica`
  ADD PRIMARY KEY (`id_avaliacao_cinemaica`);

--
-- Índices para tabela `diabetes`
--
ALTER TABLE `diabetes`
  ADD PRIMARY KEY (`id_diabetes`);

--
-- Índices para tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  ADD PRIMARY KEY (`id_info_ocorrencia`),
  ADD KEY `fk_id_avaliacao_cinematica` (`avaliacao_cinematica`);

--
-- Índices para tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  ADD PRIMARY KEY (`id_info_paciente`);

--
-- Índices para tabela `meios_auxiliares`
--
ALTER TABLE `meios_auxiliares`
  ADD PRIMARY KEY (`id_meios_auxiliares`);

--
-- Índices para tabela `nivel_consciencia`
--
ALTER TABLE `nivel_consciencia`
  ADD PRIMARY KEY (`id_nivel_consciencia`);

--
-- Índices para tabela `obstetrico`
--
ALTER TABLE `obstetrico`
  ADD PRIMARY KEY (`id_obstetrico`);

--
-- Índices para tabela `policia`
--
ALTER TABLE `policia`
  ADD PRIMARY KEY (`id_policia`);

--
-- Índices para tabela `problemas_encontrados`
--
ALTER TABLE `problemas_encontrados`
  ADD PRIMARY KEY (`id_problemas_encontrados`),
  ADD KEY `fk_id_diabetes` (`diabetes`),
  ADD KEY `fk_id_respiratorio` (`respiratorio`),
  ADD KEY `fk_id_situacao_paciente` (`id_situacao_paciente`),
  ADD KEY `fk_id_obstetrico` (`obstetrico`);

--
-- Índices para tabela `procedimentos_efetuados`
--
ALTER TABLE `procedimentos_efetuados`
  ADD PRIMARY KEY (`id_procedimentos_efetuados`);

--
-- Índices para tabela `respiratorio`
--
ALTER TABLE `respiratorio`
  ADD PRIMARY KEY (`id_respiratorio`);

--
-- Índices para tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  ADD PRIMARY KEY (`id_situacao_paciente`),
  ADD KEY `fk_nivel_cosnciencia` (`total_gcs`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendendimento`
--
ALTER TABLE `atendendimento`
  MODIFY `id_atendimento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atendente`
--
ALTER TABLE `atendente`
  MODIFY `id_atendente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `avaliacao_cinematica`
--
ALTER TABLE `avaliacao_cinematica`
  MODIFY `id_avaliacao_cinemaica` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `diabetes`
--
ALTER TABLE `diabetes`
  MODIFY `id_diabetes` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  MODIFY `id_info_ocorrencia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  MODIFY `id_info_paciente` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `meios_auxiliares`
--
ALTER TABLE `meios_auxiliares`
  MODIFY `id_meios_auxiliares` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `nivel_consciencia`
--
ALTER TABLE `nivel_consciencia`
  MODIFY `id_nivel_consciencia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `obstetrico`
--
ALTER TABLE `obstetrico`
  MODIFY `id_obstetrico` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `policia`
--
ALTER TABLE `policia`
  MODIFY `id_policia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `problemas_encontrados`
--
ALTER TABLE `problemas_encontrados`
  MODIFY `id_problemas_encontrados` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `procedimentos_efetuados`
--
ALTER TABLE `procedimentos_efetuados`
  MODIFY `id_procedimentos_efetuados` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `respiratorio`
--
ALTER TABLE `respiratorio`
  MODIFY `id_respiratorio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  MODIFY `id_situacao_paciente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  ADD CONSTRAINT `fk_id_avaliacao_cinematica` FOREIGN KEY (`avaliacao_cinematica`) REFERENCES `avaliacao_cinematica` (`id_avaliacao_cinemaica`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `problemas_encontrados`
--
ALTER TABLE `problemas_encontrados`
  ADD CONSTRAINT `fk_id_diabetes` FOREIGN KEY (`diabetes`) REFERENCES `diabetes` (`id_diabetes`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_id_obstetrico` FOREIGN KEY (`obstetrico`) REFERENCES `obstetrico` (`id_obstetrico`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_id_respiratorio` FOREIGN KEY (`respiratorio`) REFERENCES `respiratorio` (`id_respiratorio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_id_situacao_paciente` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  ADD CONSTRAINT `fk_nivel_cosnciencia` FOREIGN KEY (`total_gcs`) REFERENCES `nivel_consciencia` (`id_nivel_consciencia`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
