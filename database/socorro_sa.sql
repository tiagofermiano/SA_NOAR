-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/10/2023 às 06:00
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

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
-- Estrutura para tabela `anamnese_emergencial`
--

CREATE TABLE `anamnese_emergencial` (
  `id_anamnese_emergencial` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `oque_aconteceu` varchar(300) NOT NULL,
  `aconteceu_outras_vezes` tinyint(1) NOT NULL,
  `quanto_tempo` varchar(20) NOT NULL,
  `problema_saude` tinyint(1) NOT NULL,
  `quais_problemas` varchar(300) NOT NULL,
  `uso_medicacao` tinyint(1) NOT NULL,
  `hora_ultima_medicacao` time(4) NOT NULL,
  `qual_medicacao` varchar(300) NOT NULL,
  `alergico` tinyint(1) NOT NULL,
  `qual_alergia` varchar(200) NOT NULL,
  `alimento_6horas` tinyint(1) NOT NULL,
  `especifique` varchar(200) NOT NULL,
  `que_horas` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `anamnese_gestacionall`
--

CREATE TABLE `anamnese_gestacionall` (
  `id_anamnese_gestacional` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `periodo_gestacao` varchar(20) NOT NULL,
  `pre_natal` tinyint(1) NOT NULL,
  `nome_medico` varchar(200) NOT NULL,
  `possiblidade_complicacao` tinyint(1) NOT NULL,
  `primeiro_filho` tinyint(1) NOT NULL,
  `quantos` varchar(2) NOT NULL,
  `hora_contracao` time(4) NOT NULL,
  `tempo_contracao` int(11) NOT NULL,
  `pressao_quadril` tinyint(1) NOT NULL,
  `ruptura_bolsa` tinyint(1) NOT NULL,
  `inspecao_visual` tinyint(1) NOT NULL,
  `parto_realizado` tinyint(1) NOT NULL,
  `sexo_bebe` tinyint(1) NOT NULL,
  `nome_bebe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendente`
--

CREATE TABLE `atendente` (
  `id_atendente` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `atendente`
--

INSERT INTO `atendente` (`id_atendente`, `nome`, `cpf`, `email`, `senha`, `data_cadastro`, `tipo`) VALUES
(1, 'biagos_lindus', '12345678945', 'bagos@gmail.com', 'bagos123', '2023-10-18 14:03:08', 'atendente'),
(2, 'tiago', '13198160960', 'tiago@gmail.com', '123', '2023-10-18 09:04:35', ''),
(3, 'teste', '45645645643', 'teste@gmail.com', '123', '2023-10-18 09:28:32', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id_atendimento` int(11) NOT NULL,
  `id_info_ocorrencia` int(11) NOT NULL,
  `motorista` varchar(100) NOT NULL,
  `socorrista_1` varchar(100) NOT NULL,
  `socorrista_2` varchar(100) NOT NULL,
  `socorrista_3` varchar(100) NOT NULL,
  `demandante` varchar(100) NOT NULL,
  `equipe` varchar(100) NOT NULL,
  `procedimentos_efetuados1` varchar(400) NOT NULL,
  `observacoes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_cinematica`
--

CREATE TABLE `avaliacao_cinematica` (
  `id_avaliacao_cinematica` int(11) NOT NULL,
  `info_ocorrencia` int(11) NOT NULL,
  `disturbio_comportamento` tinyint(4) NOT NULL,
  `encontrado_capacete` tinyint(4) NOT NULL,
  `encontrado_cinto` tinyint(4) NOT NULL,
  `parabrisa_avariado` tinyint(4) NOT NULL,
  `caminhando_cena` tinyint(4) NOT NULL,
  `painel_avariado` tinyint(4) NOT NULL,
  `volante_torcido` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cianose`
--

CREATE TABLE `cianose` (
  `id_cianose` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `lábios` tinyint(1) NOT NULL,
  `extremidade` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `diabetes`
--

CREATE TABLE `diabetes` (
  `id_diabetes` int(11) NOT NULL,
  `fk_id_problemas_encontrados` int(11) NOT NULL,
  `hiperglicemia` tinyint(1) DEFAULT NULL,
  `hipoglicemia` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `edema`
--

CREATE TABLE `edema` (
  `id_edema` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `generalizado` tinyint(1) NOT NULL,
  `localizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `hemorragia`
--

CREATE TABLE `hemorragia` (
  `id_hemorragia` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `interna` tinyint(1) NOT NULL,
  `externa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `info_ocorrencia`
--

CREATE TABLE `info_ocorrencia` (
  `id_info_ocorrencia` int(11) NOT NULL,
  `atendente` int(11) NOT NULL,
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
  `tipo_ocorrencia` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `info_paciente`
--

CREATE TABLE `info_paciente` (
  `id_info_paciente` int(11) NOT NULL,
  `id_info_ocorrencia` int(11) NOT NULL,
  `nome_paciente` varchar(100) NOT NULL,
  `idade_paciente` varchar(3) NOT NULL,
  `sexo_paciente` set('Masculino','Feminino') NOT NULL,
  `rg_cpf_paciente` varchar(11) NOT NULL,
  `nome_acompanhante` text NOT NULL,
  `idade_acompanhante` varchar(3) NOT NULL,
  `vitima_era` set('Ciclista','Gestante','Pas.Moto','Clínico','Pas.Bco.Trás','Condutor moto','Pas.Bco.Frente','Condutor carro','Trauma','Pedestre','') NOT NULL,
  `forma_conducao` set('Deitada','Semi-deitada','Sentada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `materiais_descartaveis`
--

CREATE TABLE `materiais_descartaveis` (
  `id_materiais_descartaveis` int(11) NOT NULL,
  `atendimento` int(11) NOT NULL,
  `atadura` varchar(6) NOT NULL,
  `cateter_oculos` varchar(6) NOT NULL,
  `compressa_comum` varchar(6) NOT NULL,
  `kits` varchar(6) NOT NULL,
  `luvas` varchar(6) NOT NULL,
  `mascara` varchar(6) NOT NULL,
  `manta_aluminizada` varchar(6) NOT NULL,
  `pas_dea` varchar(6) NOT NULL,
  `sonda_aspiracao` varchar(6) NOT NULL,
  `soro_fisiologico` varchar(6) NOT NULL,
  `talas_pap` varchar(6) NOT NULL,
  `outro` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `materiais_hospital`
--

CREATE TABLE `materiais_hospital` (
  `id_materiais_hospital` int(11) NOT NULL,
  `atendimento` int(11) NOT NULL,
  `base_estabilizador` varchar(6) NOT NULL,
  `colar` varchar(10) NOT NULL,
  `coxin_estabilizador` varchar(6) NOT NULL,
  `ked` varchar(10) NOT NULL,
  `maca_rigida` varchar(6) NOT NULL,
  `ttf` varchar(20) NOT NULL,
  `tirante_aranha` varchar(6) NOT NULL,
  `tirante_cabeca` varchar(6) NOT NULL,
  `canula` varchar(6) NOT NULL,
  `outro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `meios_auxiliares`
--

CREATE TABLE `meios_auxiliares` (
  `id_meios_auxiliares` int(11) NOT NULL,
  `id_procedimentos_efetuados` int(11) NOT NULL,
  `celesc` tinyint(1) DEFAULT NULL,
  `def_civil` tinyint(1) DEFAULT NULL,
  `igp_pc` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nivel_consciencia`
--

CREATE TABLE `nivel_consciencia` (
  `id_nivel_consciencia` int(11) NOT NULL,
  `abertura_ocular` varchar(2) NOT NULL,
  `resposta _verbal` varchar(2) NOT NULL,
  `resposta_motora` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `nivel_consciencia`
--

INSERT INTO `nivel_consciencia` (`id_nivel_consciencia`, `abertura_ocular`, `resposta _verbal`, `resposta_motora`) VALUES
(1, '2', '3', '2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `obstetrico`
--

CREATE TABLE `obstetrico` (
  `id_obstetrico` int(11) NOT NULL,
  `fk_id_problemas_encontrados` int(11) NOT NULL,
  `parto_emergencial` tinyint(1) DEFAULT NULL,
  `gestante` tinyint(1) DEFAULT NULL,
  `hemorragia_excessiva` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `parada`
--

CREATE TABLE `parada` (
  `id_parada` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `cardiaca` tinyint(1) NOT NULL,
  `respiratoria` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `policia`
--

CREATE TABLE `policia` (
  `id_policia` int(11) NOT NULL,
  `id_procedimentos_efetuados` int(11) NOT NULL,
  `civil` tinyint(1) NOT NULL,
  `militar` tinyint(1) NOT NULL,
  `pre` tinyint(1) NOT NULL,
  `prf` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `problemas_encontrados`
--

CREATE TABLE `problemas_encontrados` (
  `id_problemas_encontrados` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `psiquiatrico` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `procedimentos_efetuados`
--

CREATE TABLE `procedimentos_efetuados` (
  `id_procedimentos_efetuados` int(11) NOT NULL,
  `atendimento` int(11) NOT NULL,
  `cit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pupilas`
--

CREATE TABLE `pupilas` (
  `id_pupilas` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `anisocoria` tinyint(1) NOT NULL,
  `isocoria` tinyint(1) NOT NULL,
  `midriase` tinyint(1) NOT NULL,
  `miose` tinyint(1) NOT NULL,
  `reagente` tinyint(1) NOT NULL,
  `nao_reagente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `queimaduras_1grau`
--

CREATE TABLE `queimaduras_1grau` (
  `id_queimaduras_1grau` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `grau` varchar(10) DEFAULT NULL,
  `cabeca` tinyint(4) DEFAULT NULL,
  `pescoco` tinyint(4) DEFAULT NULL,
  `torso_pos` tinyint(4) DEFAULT NULL,
  `torso_ant` tinyint(4) DEFAULT NULL,
  `genital` tinyint(4) DEFAULT NULL,
  `mi_direito` tinyint(4) DEFAULT NULL,
  `mi_esquerdo` tinyint(4) DEFAULT NULL,
  `ms_direito` tinyint(4) DEFAULT NULL,
  `ms_esquerdo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `queimaduras_2grau`
--

CREATE TABLE `queimaduras_2grau` (
  `id_queimaduras_2grau` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `grau` varchar(10) DEFAULT NULL,
  `cabeca` tinyint(4) DEFAULT NULL,
  `pescoco` tinyint(4) DEFAULT NULL,
  `torso_pos` tinyint(4) DEFAULT NULL,
  `torso_ant` tinyint(4) DEFAULT NULL,
  `genital` tinyint(4) DEFAULT NULL,
  `mi_direito` tinyint(4) DEFAULT NULL,
  `mi_esquerdo` tinyint(4) DEFAULT NULL,
  `ms_direito` tinyint(4) DEFAULT NULL,
  `ms_esquerdo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `queimaduras_3grau`
--

CREATE TABLE `queimaduras_3grau` (
  `id_queimaduras_3grau` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `grau` varchar(10) DEFAULT NULL,
  `cabeca` tinyint(4) DEFAULT NULL,
  `pescoco` tinyint(4) DEFAULT NULL,
  `torso_pos` tinyint(4) DEFAULT NULL,
  `torso_ant` tinyint(4) DEFAULT NULL,
  `genital` tinyint(4) DEFAULT NULL,
  `mi_direito` tinyint(4) DEFAULT NULL,
  `mi_esquerdo` tinyint(4) DEFAULT NULL,
  `ms_direito` tinyint(4) DEFAULT NULL,
  `ms_esquerdo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `respiratorio`
--

CREATE TABLE `respiratorio` (
  `id_respiratorio` int(11) NOT NULL,
  `id_problemas_encontrados` int(11) NOT NULL,
  `inalacao_fumaca` tinyint(1) DEFAULT NULL,
  `DPOC` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `samu`
--

CREATE TABLE `samu` (
  `id_samu` int(11) NOT NULL,
  `id_procedimentos_efetuados` int(11) NOT NULL,
  `usa` tinyint(1) NOT NULL,
  `usb` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacao_paciente`
--

CREATE TABLE `situacao_paciente` (
  `id_situacao_paciente` int(11) NOT NULL,
  `id_info_ocorrencia` int(11) NOT NULL,
  `medida_pressao` varchar(12) NOT NULL,
  `pulso` varchar(12) NOT NULL,
  `respiração` varchar(9) NOT NULL,
  `saturacao` varchar(4) NOT NULL,
  `hgt` varchar(9) NOT NULL,
  `temperatura` varchar(4) NOT NULL,
  `perfusao` varchar(6) NOT NULL,
  `normal_anormal` text NOT NULL,
  `total_gcs` int(11) NOT NULL,
  `localizacao_traumas` mediumblob NOT NULL,
  `decisao_transporte` varchar(30) NOT NULL,
  `sinais_sintomas` varchar(400) NOT NULL,
  `outros` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_traumas`
--

CREATE TABLE `tabela_traumas` (
  `id_tabela_traumas` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `local` varchar(255) DEFAULT NULL,
  `lado` varchar(255) DEFAULT NULL,
  `face` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tempo_contracao`
--

CREATE TABLE `tempo_contracao` (
  `id_tempo_contracao` int(11) NOT NULL,
  `duracao` varchar(20) NOT NULL,
  `intervalo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `transporte`
--

CREATE TABLE `transporte` (
  `id_transporte` int(11) NOT NULL,
  `id_problemas_encontrados` int(11) NOT NULL,
  `aereo` tinyint(1) NOT NULL,
  `clinico` tinyint(1) NOT NULL,
  `emergencial` tinyint(1) NOT NULL,
  `pos_trauma` tinyint(1) NOT NULL,
  `samu` tinyint(1) NOT NULL,
  `sem_remocao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anamnese_emergencial`
--
ALTER TABLE `anamnese_emergencial`
  ADD PRIMARY KEY (`id_anamnese_emergencial`),
  ADD KEY `fk_id_situacao_paciente11` (`id_situacao_paciente`);

--
-- Índices de tabela `anamnese_gestacionall`
--
ALTER TABLE `anamnese_gestacionall`
  ADD PRIMARY KEY (`id_anamnese_gestacional`),
  ADD KEY `fk_tempo_contracao` (`tempo_contracao`),
  ADD KEY `fk_situacao_paciente12` (`id_situacao_paciente`);

--
-- Índices de tabela `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`id_atendente`);

--
-- Índices de tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id_atendimento`),
  ADD KEY `fk_id_info_ocorrencia4` (`id_info_ocorrencia`);

--
-- Índices de tabela `avaliacao_cinematica`
--
ALTER TABLE `avaliacao_cinematica`
  ADD PRIMARY KEY (`id_avaliacao_cinematica`),
  ADD KEY `fk_info_ocorrencia` (`info_ocorrencia`);

--
-- Índices de tabela `cianose`
--
ALTER TABLE `cianose`
  ADD PRIMARY KEY (`id_cianose`),
  ADD KEY `fk_id_situacao_paciente9` (`id_situacao_paciente`);

--
-- Índices de tabela `diabetes`
--
ALTER TABLE `diabetes`
  ADD PRIMARY KEY (`id_diabetes`),
  ADD KEY `fk_id_problemas_encontrados2` (`fk_id_problemas_encontrados`);

--
-- Índices de tabela `edema`
--
ALTER TABLE `edema`
  ADD PRIMARY KEY (`id_edema`),
  ADD KEY `fk_id_situacao_paciente7` (`id_situacao_paciente`);

--
-- Índices de tabela `hemorragia`
--
ALTER TABLE `hemorragia`
  ADD PRIMARY KEY (`id_hemorragia`),
  ADD KEY `fk_id_situacao_paciente6` (`id_situacao_paciente`);

--
-- Índices de tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  ADD PRIMARY KEY (`id_info_ocorrencia`),
  ADD KEY `fk_atedndente` (`atendente`);

--
-- Índices de tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  ADD PRIMARY KEY (`id_info_paciente`),
  ADD KEY `fk_id_info_ocorrencia` (`id_info_ocorrencia`);

--
-- Índices de tabela `materiais_descartaveis`
--
ALTER TABLE `materiais_descartaveis`
  ADD PRIMARY KEY (`id_materiais_descartaveis`),
  ADD KEY `fk_atendimento2` (`atendimento`);

--
-- Índices de tabela `materiais_hospital`
--
ALTER TABLE `materiais_hospital`
  ADD PRIMARY KEY (`id_materiais_hospital`),
  ADD KEY `fk_atendimento3` (`atendimento`);

--
-- Índices de tabela `meios_auxiliares`
--
ALTER TABLE `meios_auxiliares`
  ADD PRIMARY KEY (`id_meios_auxiliares`),
  ADD KEY `fk_id_procedimentos_efetuados` (`id_procedimentos_efetuados`);

--
-- Índices de tabela `nivel_consciencia`
--
ALTER TABLE `nivel_consciencia`
  ADD PRIMARY KEY (`id_nivel_consciencia`);

--
-- Índices de tabela `obstetrico`
--
ALTER TABLE `obstetrico`
  ADD PRIMARY KEY (`id_obstetrico`),
  ADD KEY `fk_id_problemas_encontrados3` (`fk_id_problemas_encontrados`);

--
-- Índices de tabela `parada`
--
ALTER TABLE `parada`
  ADD PRIMARY KEY (`id_parada`),
  ADD KEY `fk_id_situacao_paciente8` (`id_situacao_paciente`);

--
-- Índices de tabela `policia`
--
ALTER TABLE `policia`
  ADD PRIMARY KEY (`id_policia`),
  ADD KEY `fk_id_procedimentos_efetuados2` (`id_procedimentos_efetuados`);

--
-- Índices de tabela `problemas_encontrados`
--
ALTER TABLE `problemas_encontrados`
  ADD PRIMARY KEY (`id_problemas_encontrados`),
  ADD KEY `fk_situacao_paciente` (`id_situacao_paciente`);

--
-- Índices de tabela `procedimentos_efetuados`
--
ALTER TABLE `procedimentos_efetuados`
  ADD PRIMARY KEY (`id_procedimentos_efetuados`),
  ADD KEY `fk_atendimento` (`atendimento`);

--
-- Índices de tabela `pupilas`
--
ALTER TABLE `pupilas`
  ADD PRIMARY KEY (`id_pupilas`),
  ADD KEY `fk_id_situacao_paciente10` (`id_situacao_paciente`);

--
-- Índices de tabela `queimaduras_1grau`
--
ALTER TABLE `queimaduras_1grau`
  ADD PRIMARY KEY (`id_queimaduras_1grau`),
  ADD KEY `fk_id_situacao_paciente3` (`id_situacao_paciente`);

--
-- Índices de tabela `queimaduras_2grau`
--
ALTER TABLE `queimaduras_2grau`
  ADD PRIMARY KEY (`id_queimaduras_2grau`),
  ADD KEY `fk_id_situacao_paciente4` (`id_situacao_paciente`);

--
-- Índices de tabela `queimaduras_3grau`
--
ALTER TABLE `queimaduras_3grau`
  ADD PRIMARY KEY (`id_queimaduras_3grau`),
  ADD KEY `fk_id_situacao_paciente5` (`id_situacao_paciente`);

--
-- Índices de tabela `respiratorio`
--
ALTER TABLE `respiratorio`
  ADD PRIMARY KEY (`id_respiratorio`),
  ADD KEY `fk_id_problemas_encontrados` (`id_problemas_encontrados`);

--
-- Índices de tabela `samu`
--
ALTER TABLE `samu`
  ADD PRIMARY KEY (`id_samu`),
  ADD KEY `fk_procedimentos_efetuados3` (`id_procedimentos_efetuados`);

--
-- Índices de tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  ADD PRIMARY KEY (`id_situacao_paciente`),
  ADD KEY `fk_nivel_cosnciencia` (`total_gcs`),
  ADD KEY `fk_id_info_ocorrencia2` (`id_info_ocorrencia`);

--
-- Índices de tabela `tabela_traumas`
--
ALTER TABLE `tabela_traumas`
  ADD PRIMARY KEY (`id_tabela_traumas`),
  ADD KEY `fk_id_situacao_paciente2` (`id_situacao_paciente`);

--
-- Índices de tabela `tempo_contracao`
--
ALTER TABLE `tempo_contracao`
  ADD PRIMARY KEY (`id_tempo_contracao`);

--
-- Índices de tabela `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id_transporte`),
  ADD KEY `fk_id_problemas_encontrados4` (`id_problemas_encontrados`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anamnese_emergencial`
--
ALTER TABLE `anamnese_emergencial`
  MODIFY `id_anamnese_emergencial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `anamnese_gestacionall`
--
ALTER TABLE `anamnese_gestacionall`
  MODIFY `id_anamnese_gestacional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atendente`
--
ALTER TABLE `atendente`
  MODIFY `id_atendente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id_atendimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliacao_cinematica`
--
ALTER TABLE `avaliacao_cinematica`
  MODIFY `id_avaliacao_cinematica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cianose`
--
ALTER TABLE `cianose`
  MODIFY `id_cianose` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `diabetes`
--
ALTER TABLE `diabetes`
  MODIFY `id_diabetes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `edema`
--
ALTER TABLE `edema`
  MODIFY `id_edema` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `hemorragia`
--
ALTER TABLE `hemorragia`
  MODIFY `id_hemorragia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  MODIFY `id_info_ocorrencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  MODIFY `id_info_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `materiais_descartaveis`
--
ALTER TABLE `materiais_descartaveis`
  MODIFY `id_materiais_descartaveis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `materiais_hospital`
--
ALTER TABLE `materiais_hospital`
  MODIFY `id_materiais_hospital` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `meios_auxiliares`
--
ALTER TABLE `meios_auxiliares`
  MODIFY `id_meios_auxiliares` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `nivel_consciencia`
--
ALTER TABLE `nivel_consciencia`
  MODIFY `id_nivel_consciencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `obstetrico`
--
ALTER TABLE `obstetrico`
  MODIFY `id_obstetrico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `parada`
--
ALTER TABLE `parada`
  MODIFY `id_parada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `policia`
--
ALTER TABLE `policia`
  MODIFY `id_policia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `problemas_encontrados`
--
ALTER TABLE `problemas_encontrados`
  MODIFY `id_problemas_encontrados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `procedimentos_efetuados`
--
ALTER TABLE `procedimentos_efetuados`
  MODIFY `id_procedimentos_efetuados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pupilas`
--
ALTER TABLE `pupilas`
  MODIFY `id_pupilas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `queimaduras_1grau`
--
ALTER TABLE `queimaduras_1grau`
  MODIFY `id_queimaduras_1grau` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `queimaduras_2grau`
--
ALTER TABLE `queimaduras_2grau`
  MODIFY `id_queimaduras_2grau` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `queimaduras_3grau`
--
ALTER TABLE `queimaduras_3grau`
  MODIFY `id_queimaduras_3grau` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `respiratorio`
--
ALTER TABLE `respiratorio`
  MODIFY `id_respiratorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `samu`
--
ALTER TABLE `samu`
  MODIFY `id_samu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  MODIFY `id_situacao_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tabela_traumas`
--
ALTER TABLE `tabela_traumas`
  MODIFY `id_tabela_traumas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tempo_contracao`
--
ALTER TABLE `tempo_contracao`
  MODIFY `id_tempo_contracao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transporte`
--
ALTER TABLE `transporte`
  MODIFY `id_transporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `anamnese_emergencial`
--
ALTER TABLE `anamnese_emergencial`
  ADD CONSTRAINT `fk_id_situacao_paciente11` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `anamnese_gestacionall`
--
ALTER TABLE `anamnese_gestacionall`
  ADD CONSTRAINT `fk_situacao_paciente12` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`),
  ADD CONSTRAINT `fk_tempo_contracao` FOREIGN KEY (`tempo_contracao`) REFERENCES `tempo_contracao` (`id_tempo_contracao`);

--
-- Restrições para tabelas `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `fk_id_info_ocorrencia4` FOREIGN KEY (`id_info_ocorrencia`) REFERENCES `info_ocorrencia` (`id_info_ocorrencia`);

--
-- Restrições para tabelas `avaliacao_cinematica`
--
ALTER TABLE `avaliacao_cinematica`
  ADD CONSTRAINT `fk_info_ocorrencia` FOREIGN KEY (`info_ocorrencia`) REFERENCES `info_ocorrencia` (`id_info_ocorrencia`);

--
-- Restrições para tabelas `cianose`
--
ALTER TABLE `cianose`
  ADD CONSTRAINT `fk_id_situacao_paciente9` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `diabetes`
--
ALTER TABLE `diabetes`
  ADD CONSTRAINT `fk_id_problemas_encontrados2` FOREIGN KEY (`fk_id_problemas_encontrados`) REFERENCES `problemas_encontrados` (`id_problemas_encontrados`);

--
-- Restrições para tabelas `edema`
--
ALTER TABLE `edema`
  ADD CONSTRAINT `fk_id_situacao_paciente7` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `hemorragia`
--
ALTER TABLE `hemorragia`
  ADD CONSTRAINT `fk_id_situacao_paciente6` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  ADD CONSTRAINT `fk_atedndente` FOREIGN KEY (`atendente`) REFERENCES `atendente` (`id_atendente`);

--
-- Restrições para tabelas `info_paciente`
--
ALTER TABLE `info_paciente`
  ADD CONSTRAINT `fk_id_info_ocorrencia` FOREIGN KEY (`id_info_ocorrencia`) REFERENCES `info_ocorrencia` (`id_info_ocorrencia`);

--
-- Restrições para tabelas `materiais_descartaveis`
--
ALTER TABLE `materiais_descartaveis`
  ADD CONSTRAINT `fk_atendimento2` FOREIGN KEY (`atendimento`) REFERENCES `atendimento` (`id_atendimento`);

--
-- Restrições para tabelas `materiais_hospital`
--
ALTER TABLE `materiais_hospital`
  ADD CONSTRAINT `fk_atendimento3` FOREIGN KEY (`atendimento`) REFERENCES `atendimento` (`id_atendimento`);

--
-- Restrições para tabelas `meios_auxiliares`
--
ALTER TABLE `meios_auxiliares`
  ADD CONSTRAINT `fk_id_procedimentos_efetuados` FOREIGN KEY (`id_procedimentos_efetuados`) REFERENCES `procedimentos_efetuados` (`id_procedimentos_efetuados`);

--
-- Restrições para tabelas `obstetrico`
--
ALTER TABLE `obstetrico`
  ADD CONSTRAINT `fk_id_problemas_encontrados3` FOREIGN KEY (`fk_id_problemas_encontrados`) REFERENCES `problemas_encontrados` (`id_problemas_encontrados`);

--
-- Restrições para tabelas `parada`
--
ALTER TABLE `parada`
  ADD CONSTRAINT `fk_id_situacao_paciente8` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `policia`
--
ALTER TABLE `policia`
  ADD CONSTRAINT `fk_id_procedimentos_efetuados2` FOREIGN KEY (`id_procedimentos_efetuados`) REFERENCES `procedimentos_efetuados` (`id_procedimentos_efetuados`);

--
-- Restrições para tabelas `problemas_encontrados`
--
ALTER TABLE `problemas_encontrados`
  ADD CONSTRAINT `fk_situacao_paciente` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `procedimentos_efetuados`
--
ALTER TABLE `procedimentos_efetuados`
  ADD CONSTRAINT `fk_atendimento` FOREIGN KEY (`atendimento`) REFERENCES `atendimento` (`id_atendimento`);

--
-- Restrições para tabelas `pupilas`
--
ALTER TABLE `pupilas`
  ADD CONSTRAINT `fk_id_situacao_paciente10` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `queimaduras_1grau`
--
ALTER TABLE `queimaduras_1grau`
  ADD CONSTRAINT `fk_id_situacao_paciente3` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `queimaduras_2grau`
--
ALTER TABLE `queimaduras_2grau`
  ADD CONSTRAINT `fk_id_situacao_paciente4` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `queimaduras_3grau`
--
ALTER TABLE `queimaduras_3grau`
  ADD CONSTRAINT `fk_id_situacao_paciente5` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `respiratorio`
--
ALTER TABLE `respiratorio`
  ADD CONSTRAINT `fk_id_problemas_encontrados` FOREIGN KEY (`id_problemas_encontrados`) REFERENCES `problemas_encontrados` (`id_problemas_encontrados`);

--
-- Restrições para tabelas `samu`
--
ALTER TABLE `samu`
  ADD CONSTRAINT `fk_procedimentos_efetuados3` FOREIGN KEY (`id_procedimentos_efetuados`) REFERENCES `procedimentos_efetuados` (`id_procedimentos_efetuados`);

--
-- Restrições para tabelas `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  ADD CONSTRAINT `fk_id_info_ocorrencia2` FOREIGN KEY (`id_info_ocorrencia`) REFERENCES `info_ocorrencia` (`id_info_ocorrencia`),
  ADD CONSTRAINT `fk_nivel_cosnciencia` FOREIGN KEY (`total_gcs`) REFERENCES `nivel_consciencia` (`id_nivel_consciencia`);

--
-- Restrições para tabelas `tabela_traumas`
--
ALTER TABLE `tabela_traumas`
  ADD CONSTRAINT `fk_id_situacao_paciente2` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `fk_id_problemas_encontrados4` FOREIGN KEY (`id_problemas_encontrados`) REFERENCES `problemas_encontrados` (`id_problemas_encontrados`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
