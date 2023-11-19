-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2023 às 16:23
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
-- Estrutura da tabela `anamnese_emergencial`
--

CREATE TABLE `anamnese_emergencial` (
  `id_anamnese_emergencial` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `oque_aconteceu` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aconteceu_outras_vezes` tinyint(1) NOT NULL,
  `quanto_tempo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `problema_saude` tinyint(1) NOT NULL,
  `quais_problemas` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uso_medicacao` tinyint(1) NOT NULL,
  `hora_ultima_medicacao` time(4) NOT NULL,
  `qual_medicacao` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alergico` tinyint(1) NOT NULL,
  `qual_alergia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alimento_6horas` tinyint(1) NOT NULL,
  `especifique` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `que_horas` time(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anamnese_gestacionall`
--

CREATE TABLE `anamnese_gestacionall` (
  `id_anamnese_gestacional` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `periodo_gestacao` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pre_natal` tinyint(1) NOT NULL,
  `nome_medico` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `possiblidade_complicacao` tinyint(1) NOT NULL,
  `primeiro_filho` tinyint(1) NOT NULL,
  `quantos` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hora_contracao` time(4) NOT NULL,
  `tempo_contracao` int NOT NULL,
  `pressao_quadril` tinyint(1) NOT NULL,
  `ruptura_bolsa` tinyint(1) NOT NULL,
  `inspecao_visual` tinyint(1) NOT NULL,
  `parto_realizado` tinyint(1) NOT NULL,
  `sexo_bebe` tinyint(1) NOT NULL,
  `nome_bebe` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

CREATE TABLE `atendente` (
  `id_atendente` int NOT NULL,
  `nome` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `atendente`
--

INSERT INTO `atendente` (`id_atendente`, `nome`, `cpf`, `email`, `senha`, `data_cadastro`, `tipo`) VALUES
(1, 'bag', '12345678945', 'bagos@gmail.com', 'bagos123', '2023-10-18 14:03:08', 'atendente'),
(2, 'tiago', '13198160960', 'tiago@gmail.com', '123', '2023-10-18 09:04:35', 'atendente'),
(3, 'teste', '45645645643', 'teste@gmail.com', '123', '2023-10-18 09:28:32', 'atendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id_atendimento` int NOT NULL,
  `id_info_ocorrencia` int NOT NULL,
  `motorista` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `socorrista_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `socorrista_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `socorrista_3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `demandante` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipe` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedimentos_efetuados1` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacoes` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao_cinematica`
--

CREATE TABLE `avaliacao_cinematica` (
  `id_avaliacao_cinematica` int NOT NULL,
  `info_ocorrencia` int NOT NULL,
  `disturbio_comportamento` tinyint NOT NULL,
  `encontrado_capacete` tinyint NOT NULL,
  `encontrado_cinto` tinyint NOT NULL,
  `parabrisa_avariado` tinyint NOT NULL,
  `caminhando_cena` tinyint NOT NULL,
  `painel_avariado` tinyint NOT NULL,
  `volante_torcido` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cianose`
--

CREATE TABLE `cianose` (
  `id_cianose` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `lábios` tinyint(1) NOT NULL,
  `extremidade` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diabetes`
--

CREATE TABLE `diabetes` (
  `id_diabetes` int NOT NULL,
  `fk_id_problemas_encontrados` int NOT NULL,
  `hiperglicemia` tinyint(1) DEFAULT NULL,
  `hipoglicemia` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `edema`
--

CREATE TABLE `edema` (
  `id_edema` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `generalizado` tinyint(1) NOT NULL,
  `localizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hemorragia`
--

CREATE TABLE `hemorragia` (
  `id_hemorragia` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `interna` tinyint(1) NOT NULL,
  `externa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `info_ocorrencia`
--

CREATE TABLE `info_ocorrencia` (
  `id_info_ocorrencia` int NOT NULL,
  `atendente` int NOT NULL,
  `data` date NOT NULL,
  `local_ocorrencia` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_hospital` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_usb` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_ocorrencia` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `despacho` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_chegada` time(4) NOT NULL,
  `km_final` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_ir` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_ps` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_sia_sus` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_ocorrencia` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `info_paciente`
--

CREATE TABLE `info_paciente` (
  `id_info_paciente` int NOT NULL,
  `id_info_ocorrencia` int NOT NULL,
  `nome_paciente` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade_paciente` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo_paciente` set('Masculino','Feminino') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg_cpf_paciente` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome_acompanhante` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade_acompanhante` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vitima_era` set('Ciclista','Gestante','Pas.Moto','Clínico','Pas.Bco.Trás','Condutor moto','Pas.Bco.Frente','Condutor carro','Trauma','Pedestre','') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `forma_conducao` set('Deitada','Semi-deitada','Sentada') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais_descartaveis`
--

CREATE TABLE `materiais_descartaveis` (
  `id_materiais_descartaveis` int NOT NULL,
  `atendimento` int NOT NULL,
  `atadura` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateter_oculos` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `compressa_comum` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kits` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `luvas` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mascara` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `manta_aluminizada` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas_dea` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sonda_aspiracao` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `soro_fisiologico` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `talas_pap` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `outro` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais_hospital`
--

CREATE TABLE `materiais_hospital` (
  `id_materiais_hospital` int NOT NULL,
  `atendimento` int NOT NULL,
  `base_estabilizador` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `colar` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coxin_estabilizador` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ked` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maca_rigida` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tirante_aranha` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tirante_cabeca` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `canula` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `outro` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `meios_auxiliares`
--

CREATE TABLE `meios_auxiliares` (
  `id_meios_auxiliares` int NOT NULL,
  `id_procedimentos_efetuados` int NOT NULL,
  `celesc` tinyint(1) DEFAULT NULL,
  `def_civil` tinyint(1) DEFAULT NULL,
  `igp_pc` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_consciencia`
--

CREATE TABLE `nivel_consciencia` (
  `id_nivel_consciencia` int NOT NULL,
  `abertura_ocular` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `resposta _verbal` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `resposta_motora` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `nivel_consciencia`
--

INSERT INTO `nivel_consciencia` (`id_nivel_consciencia`, `abertura_ocular`, `resposta _verbal`, `resposta_motora`) VALUES
(1, '2', '3', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `obstetrico`
--

CREATE TABLE `obstetrico` (
  `id_obstetrico` int NOT NULL,
  `fk_id_problemas_encontrados` int NOT NULL,
  `parto_emergencial` tinyint(1) DEFAULT NULL,
  `gestante` tinyint(1) DEFAULT NULL,
  `hemorragia_excessiva` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parada`
--

CREATE TABLE `parada` (
  `id_parada` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `cardiaca` tinyint(1) NOT NULL,
  `respiratoria` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `policia`
--

CREATE TABLE `policia` (
  `id_policia` int NOT NULL,
  `id_procedimentos_efetuados` int NOT NULL,
  `civil` tinyint(1) NOT NULL,
  `militar` tinyint(1) NOT NULL,
  `pre` tinyint(1) NOT NULL,
  `prf` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `problemas_encontrados`
--

CREATE TABLE `problemas_encontrados` (
  `id_problemas_encontrados` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `psiquiatrico` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimentos_efetuados`
--

CREATE TABLE `procedimentos_efetuados` (
  `id_procedimentos_efetuados` int NOT NULL,
  `atendimento` int NOT NULL,
  `cit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pupilas`
--

CREATE TABLE `pupilas` (
  `id_pupilas` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `anisocoria` tinyint(1) NOT NULL,
  `isocoria` tinyint(1) NOT NULL,
  `midriase` tinyint(1) NOT NULL,
  `miose` tinyint(1) NOT NULL,
  `reagente` tinyint(1) NOT NULL,
  `nao_reagente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `queimaduras_1grau`
--

CREATE TABLE `queimaduras_1grau` (
  `id_queimaduras_1grau` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `grau` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cabeca` tinyint DEFAULT NULL,
  `pescoco` tinyint DEFAULT NULL,
  `torso_pos` tinyint DEFAULT NULL,
  `torso_ant` tinyint DEFAULT NULL,
  `genital` tinyint DEFAULT NULL,
  `mi_direito` tinyint DEFAULT NULL,
  `mi_esquerdo` tinyint DEFAULT NULL,
  `ms_direito` tinyint DEFAULT NULL,
  `ms_esquerdo` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `queimaduras_2grau`
--

CREATE TABLE `queimaduras_2grau` (
  `id_queimaduras_2grau` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `grau` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cabeca` tinyint DEFAULT NULL,
  `pescoco` tinyint DEFAULT NULL,
  `torso_pos` tinyint DEFAULT NULL,
  `torso_ant` tinyint DEFAULT NULL,
  `genital` tinyint DEFAULT NULL,
  `mi_direito` tinyint DEFAULT NULL,
  `mi_esquerdo` tinyint DEFAULT NULL,
  `ms_direito` tinyint DEFAULT NULL,
  `ms_esquerdo` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `queimaduras_3grau`
--

CREATE TABLE `queimaduras_3grau` (
  `id_queimaduras_3grau` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `grau` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cabeca` tinyint DEFAULT NULL,
  `pescoco` tinyint DEFAULT NULL,
  `torso_pos` tinyint DEFAULT NULL,
  `torso_ant` tinyint DEFAULT NULL,
  `genital` tinyint DEFAULT NULL,
  `mi_direito` tinyint DEFAULT NULL,
  `mi_esquerdo` tinyint DEFAULT NULL,
  `ms_direito` tinyint DEFAULT NULL,
  `ms_esquerdo` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respiratorio`
--

CREATE TABLE `respiratorio` (
  `id_respiratorio` int NOT NULL,
  `id_problemas_encontrados` int NOT NULL,
  `inalacao_fumaca` tinyint(1) DEFAULT NULL,
  `DPOC` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `samu`
--

CREATE TABLE `samu` (
  `id_samu` int NOT NULL,
  `id_procedimentos_efetuados` int NOT NULL,
  `usa` tinyint(1) NOT NULL,
  `usb` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_paciente`
--

CREATE TABLE `situacao_paciente` (
  `id_situacao_paciente` int NOT NULL,
  `id_info_ocorrencia` int NOT NULL,
  `medida_pressao` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pulso` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `respiração` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `saturacao` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hgt` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperatura` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perfusao` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `normal_anormal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_gcs` int NOT NULL,
  `localizacao_traumas` mediumblob NOT NULL,
  `decisao_transporte` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinais_sintomas` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `outros` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_traumas`
--

CREATE TABLE `tabela_traumas` (
  `id_tabela_traumas` int NOT NULL,
  `id_situacao_paciente` int NOT NULL,
  `local` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `face` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tempo_contracao`
--

CREATE TABLE `tempo_contracao` (
  `id_tempo_contracao` int NOT NULL,
  `duracao` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `intervalo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transporte`
--

CREATE TABLE `transporte` (
  `id_transporte` int NOT NULL,
  `id_problemas_encontrados` int NOT NULL,
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
-- Índices para tabela `anamnese_emergencial`
--
ALTER TABLE `anamnese_emergencial`
  ADD PRIMARY KEY (`id_anamnese_emergencial`),
  ADD KEY `fk_id_situacao_paciente11` (`id_situacao_paciente`);

--
-- Índices para tabela `anamnese_gestacionall`
--
ALTER TABLE `anamnese_gestacionall`
  ADD PRIMARY KEY (`id_anamnese_gestacional`),
  ADD KEY `fk_tempo_contracao` (`tempo_contracao`),
  ADD KEY `fk_situacao_paciente12` (`id_situacao_paciente`);

--
-- Índices para tabela `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`id_atendente`);

--
-- Índices para tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id_atendimento`),
  ADD KEY `fk_id_info_ocorrencia4` (`id_info_ocorrencia`);

--
-- Índices para tabela `avaliacao_cinematica`
--
ALTER TABLE `avaliacao_cinematica`
  ADD PRIMARY KEY (`id_avaliacao_cinematica`),
  ADD KEY `fk_info_ocorrencia` (`info_ocorrencia`);

--
-- Índices para tabela `cianose`
--
ALTER TABLE `cianose`
  ADD PRIMARY KEY (`id_cianose`),
  ADD KEY `fk_id_situacao_paciente9` (`id_situacao_paciente`);

--
-- Índices para tabela `diabetes`
--
ALTER TABLE `diabetes`
  ADD PRIMARY KEY (`id_diabetes`),
  ADD KEY `fk_id_problemas_encontrados2` (`fk_id_problemas_encontrados`);

--
-- Índices para tabela `edema`
--
ALTER TABLE `edema`
  ADD PRIMARY KEY (`id_edema`),
  ADD KEY `fk_id_situacao_paciente7` (`id_situacao_paciente`);

--
-- Índices para tabela `hemorragia`
--
ALTER TABLE `hemorragia`
  ADD PRIMARY KEY (`id_hemorragia`),
  ADD KEY `fk_id_situacao_paciente6` (`id_situacao_paciente`);

--
-- Índices para tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  ADD PRIMARY KEY (`id_info_ocorrencia`),
  ADD KEY `fk_atedndente` (`atendente`);

--
-- Índices para tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  ADD PRIMARY KEY (`id_info_paciente`),
  ADD KEY `fk_id_info_ocorrencia` (`id_info_ocorrencia`);

--
-- Índices para tabela `materiais_descartaveis`
--
ALTER TABLE `materiais_descartaveis`
  ADD PRIMARY KEY (`id_materiais_descartaveis`),
  ADD KEY `fk_atendimento2` (`atendimento`);

--
-- Índices para tabela `materiais_hospital`
--
ALTER TABLE `materiais_hospital`
  ADD PRIMARY KEY (`id_materiais_hospital`),
  ADD KEY `fk_atendimento3` (`atendimento`);

--
-- Índices para tabela `meios_auxiliares`
--
ALTER TABLE `meios_auxiliares`
  ADD PRIMARY KEY (`id_meios_auxiliares`),
  ADD KEY `fk_id_procedimentos_efetuados` (`id_procedimentos_efetuados`);

--
-- Índices para tabela `nivel_consciencia`
--
ALTER TABLE `nivel_consciencia`
  ADD PRIMARY KEY (`id_nivel_consciencia`);

--
-- Índices para tabela `obstetrico`
--
ALTER TABLE `obstetrico`
  ADD PRIMARY KEY (`id_obstetrico`),
  ADD KEY `fk_id_problemas_encontrados3` (`fk_id_problemas_encontrados`);

--
-- Índices para tabela `parada`
--
ALTER TABLE `parada`
  ADD PRIMARY KEY (`id_parada`),
  ADD KEY `fk_id_situacao_paciente8` (`id_situacao_paciente`);

--
-- Índices para tabela `policia`
--
ALTER TABLE `policia`
  ADD PRIMARY KEY (`id_policia`),
  ADD KEY `fk_id_procedimentos_efetuados2` (`id_procedimentos_efetuados`);

--
-- Índices para tabela `problemas_encontrados`
--
ALTER TABLE `problemas_encontrados`
  ADD PRIMARY KEY (`id_problemas_encontrados`),
  ADD KEY `fk_situacao_paciente` (`id_situacao_paciente`);

--
-- Índices para tabela `procedimentos_efetuados`
--
ALTER TABLE `procedimentos_efetuados`
  ADD PRIMARY KEY (`id_procedimentos_efetuados`),
  ADD KEY `fk_atendimento` (`atendimento`);

--
-- Índices para tabela `pupilas`
--
ALTER TABLE `pupilas`
  ADD PRIMARY KEY (`id_pupilas`),
  ADD KEY `fk_id_situacao_paciente10` (`id_situacao_paciente`);

--
-- Índices para tabela `queimaduras_1grau`
--
ALTER TABLE `queimaduras_1grau`
  ADD PRIMARY KEY (`id_queimaduras_1grau`),
  ADD KEY `fk_id_situacao_paciente3` (`id_situacao_paciente`);

--
-- Índices para tabela `queimaduras_2grau`
--
ALTER TABLE `queimaduras_2grau`
  ADD PRIMARY KEY (`id_queimaduras_2grau`),
  ADD KEY `fk_id_situacao_paciente4` (`id_situacao_paciente`);

--
-- Índices para tabela `queimaduras_3grau`
--
ALTER TABLE `queimaduras_3grau`
  ADD PRIMARY KEY (`id_queimaduras_3grau`),
  ADD KEY `fk_id_situacao_paciente5` (`id_situacao_paciente`);

--
-- Índices para tabela `respiratorio`
--
ALTER TABLE `respiratorio`
  ADD PRIMARY KEY (`id_respiratorio`),
  ADD KEY `fk_id_problemas_encontrados` (`id_problemas_encontrados`);

--
-- Índices para tabela `samu`
--
ALTER TABLE `samu`
  ADD PRIMARY KEY (`id_samu`),
  ADD KEY `fk_procedimentos_efetuados3` (`id_procedimentos_efetuados`);

--
-- Índices para tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  ADD PRIMARY KEY (`id_situacao_paciente`),
  ADD KEY `fk_nivel_cosnciencia` (`total_gcs`),
  ADD KEY `fk_id_info_ocorrencia2` (`id_info_ocorrencia`);

--
-- Índices para tabela `tabela_traumas`
--
ALTER TABLE `tabela_traumas`
  ADD PRIMARY KEY (`id_tabela_traumas`),
  ADD KEY `fk_id_situacao_paciente2` (`id_situacao_paciente`);

--
-- Índices para tabela `tempo_contracao`
--
ALTER TABLE `tempo_contracao`
  ADD PRIMARY KEY (`id_tempo_contracao`);

--
-- Índices para tabela `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id_transporte`),
  ADD KEY `fk_id_problemas_encontrados4` (`id_problemas_encontrados`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anamnese_emergencial`
--
ALTER TABLE `anamnese_emergencial`
  MODIFY `id_anamnese_emergencial` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `anamnese_gestacionall`
--
ALTER TABLE `anamnese_gestacionall`
  MODIFY `id_anamnese_gestacional` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atendente`
--
ALTER TABLE `atendente`
  MODIFY `id_atendente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id_atendimento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `avaliacao_cinematica`
--
ALTER TABLE `avaliacao_cinematica`
  MODIFY `id_avaliacao_cinematica` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cianose`
--
ALTER TABLE `cianose`
  MODIFY `id_cianose` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `diabetes`
--
ALTER TABLE `diabetes`
  MODIFY `id_diabetes` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `edema`
--
ALTER TABLE `edema`
  MODIFY `id_edema` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `hemorragia`
--
ALTER TABLE `hemorragia`
  MODIFY `id_hemorragia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  MODIFY `id_info_ocorrencia` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  MODIFY `id_info_paciente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `materiais_descartaveis`
--
ALTER TABLE `materiais_descartaveis`
  MODIFY `id_materiais_descartaveis` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `materiais_hospital`
--
ALTER TABLE `materiais_hospital`
  MODIFY `id_materiais_hospital` int NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de tabela `parada`
--
ALTER TABLE `parada`
  MODIFY `id_parada` int NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de tabela `pupilas`
--
ALTER TABLE `pupilas`
  MODIFY `id_pupilas` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `queimaduras_1grau`
--
ALTER TABLE `queimaduras_1grau`
  MODIFY `id_queimaduras_1grau` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `queimaduras_2grau`
--
ALTER TABLE `queimaduras_2grau`
  MODIFY `id_queimaduras_2grau` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `queimaduras_3grau`
--
ALTER TABLE `queimaduras_3grau`
  MODIFY `id_queimaduras_3grau` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `respiratorio`
--
ALTER TABLE `respiratorio`
  MODIFY `id_respiratorio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `samu`
--
ALTER TABLE `samu`
  MODIFY `id_samu` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  MODIFY `id_situacao_paciente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tabela_traumas`
--
ALTER TABLE `tabela_traumas`
  MODIFY `id_tabela_traumas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tempo_contracao`
--
ALTER TABLE `tempo_contracao`
  MODIFY `id_tempo_contracao` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transporte`
--
ALTER TABLE `transporte`
  MODIFY `id_transporte` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anamnese_emergencial`
--
ALTER TABLE `anamnese_emergencial`
  ADD CONSTRAINT `fk_id_situacao_paciente11` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `anamnese_gestacionall`
--
ALTER TABLE `anamnese_gestacionall`
  ADD CONSTRAINT `fk_situacao_paciente12` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_tempo_contracao` FOREIGN KEY (`tempo_contracao`) REFERENCES `tempo_contracao` (`id_tempo_contracao`);

--
-- Limitadores para a tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `fk_id_info_ocorrencia4` FOREIGN KEY (`id_info_ocorrencia`) REFERENCES `info_ocorrencia` (`id_info_ocorrencia`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `avaliacao_cinematica`
--
ALTER TABLE `avaliacao_cinematica`
  ADD CONSTRAINT `fk_info_ocorrencia` FOREIGN KEY (`info_ocorrencia`) REFERENCES `info_ocorrencia` (`id_info_ocorrencia`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `cianose`
--
ALTER TABLE `cianose`
  ADD CONSTRAINT `fk_id_situacao_paciente9` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `diabetes`
--
ALTER TABLE `diabetes`
  ADD CONSTRAINT `fk_id_problemas_encontrados2` FOREIGN KEY (`fk_id_problemas_encontrados`) REFERENCES `problemas_encontrados` (`id_problemas_encontrados`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `edema`
--
ALTER TABLE `edema`
  ADD CONSTRAINT `fk_id_situacao_paciente7` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `hemorragia`
--
ALTER TABLE `hemorragia`
  ADD CONSTRAINT `fk_id_situacao_paciente6` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  ADD CONSTRAINT `fk_atedndente` FOREIGN KEY (`atendente`) REFERENCES `atendente` (`id_atendente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  ADD CONSTRAINT `fk_id_info_ocorrencia` FOREIGN KEY (`id_info_ocorrencia`) REFERENCES `info_ocorrencia` (`id_info_ocorrencia`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `materiais_descartaveis`
--
ALTER TABLE `materiais_descartaveis`
  ADD CONSTRAINT `fk_atendimento2` FOREIGN KEY (`atendimento`) REFERENCES `atendimento` (`id_atendimento`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `materiais_hospital`
--
ALTER TABLE `materiais_hospital`
  ADD CONSTRAINT `fk_atendimento3` FOREIGN KEY (`atendimento`) REFERENCES `atendimento` (`id_atendimento`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `meios_auxiliares`
--
ALTER TABLE `meios_auxiliares`
  ADD CONSTRAINT `fk_id_procedimentos_efetuados` FOREIGN KEY (`id_procedimentos_efetuados`) REFERENCES `procedimentos_efetuados` (`id_procedimentos_efetuados`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `obstetrico`
--
ALTER TABLE `obstetrico`
  ADD CONSTRAINT `fk_id_problemas_encontrados3` FOREIGN KEY (`fk_id_problemas_encontrados`) REFERENCES `problemas_encontrados` (`id_problemas_encontrados`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `parada`
--
ALTER TABLE `parada`
  ADD CONSTRAINT `fk_id_situacao_paciente8` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `policia`
--
ALTER TABLE `policia`
  ADD CONSTRAINT `fk_id_procedimentos_efetuados2` FOREIGN KEY (`id_procedimentos_efetuados`) REFERENCES `procedimentos_efetuados` (`id_procedimentos_efetuados`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `problemas_encontrados`
--
ALTER TABLE `problemas_encontrados`
  ADD CONSTRAINT `fk_situacao_paciente` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `procedimentos_efetuados`
--
ALTER TABLE `procedimentos_efetuados`
  ADD CONSTRAINT `fk_atendimento` FOREIGN KEY (`atendimento`) REFERENCES `atendimento` (`id_atendimento`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `pupilas`
--
ALTER TABLE `pupilas`
  ADD CONSTRAINT `fk_id_situacao_paciente10` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `queimaduras_1grau`
--
ALTER TABLE `queimaduras_1grau`
  ADD CONSTRAINT `fk_id_situacao_paciente3` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `queimaduras_2grau`
--
ALTER TABLE `queimaduras_2grau`
  ADD CONSTRAINT `fk_id_situacao_paciente4` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `queimaduras_3grau`
--
ALTER TABLE `queimaduras_3grau`
  ADD CONSTRAINT `fk_id_situacao_paciente5` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `respiratorio`
--
ALTER TABLE `respiratorio`
  ADD CONSTRAINT `fk_id_problemas_encontrados` FOREIGN KEY (`id_problemas_encontrados`) REFERENCES `problemas_encontrados` (`id_problemas_encontrados`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `samu`
--
ALTER TABLE `samu`
  ADD CONSTRAINT `fk_procedimentos_efetuados3` FOREIGN KEY (`id_procedimentos_efetuados`) REFERENCES `procedimentos_efetuados` (`id_procedimentos_efetuados`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  ADD CONSTRAINT `fk_id_info_ocorrencia2` FOREIGN KEY (`id_info_ocorrencia`) REFERENCES `info_ocorrencia` (`id_info_ocorrencia`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_nivel_cosnciencia` FOREIGN KEY (`total_gcs`) REFERENCES `nivel_consciencia` (`id_nivel_consciencia`);

--
-- Limitadores para a tabela `tabela_traumas`
--
ALTER TABLE `tabela_traumas`
  ADD CONSTRAINT `fk_id_situacao_paciente2` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `fk_id_problemas_encontrados4` FOREIGN KEY (`id_problemas_encontrados`) REFERENCES `problemas_encontrados` (`id_problemas_encontrados`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
