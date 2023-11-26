-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/11/2023 às 16:21
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `atendente`
--

CREATE TABLE `atendente` (
  `id_atendente` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `atendente`
--

INSERT INTO `atendente` (`id_atendente`, `nome`, `cpf`, `email`, `senha`, `data_cadastro`, `tipo`) VALUES
(1, 'Celo', '12121212121', 'celo@email.com', 'celo123', '2023-10-18 14:03:08', 'Outro'),
(2, 'admin', '12345678900', 'admin@gmail.com', '123', '2023-10-18 09:04:35', 'Administrador'),
(3, 'Genro Querido', '82204456373', 'amo.sogro@sorgo.com', '123', '2023-10-18 09:28:32', 'Atendente'),
(4, 'teu pai', '64573485743', 'teupai@gmail.com', '123', '2023-11-19 19:25:35', 'Bombeiro'),
(5, 'tiago m', '13198160960', 'tiago@gmail.com', '123', '2023-11-19 19:46:14', 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id_atendimento` int(11) NOT NULL,
  `motorista` varchar(100) NOT NULL,
  `socorrista_1` varchar(100) NOT NULL,
  `socorrista_2` varchar(100) NOT NULL,
  `socorrista_3` varchar(100) NOT NULL,
  `demandante` varchar(100) NOT NULL,
  `equipe` varchar(100) NOT NULL,
  `procedimentos_efetuados1` varchar(400) NOT NULL,
  `procedimento_meios_auxiliares` varchar(100) NOT NULL,
  `procedimento_policia` varchar(100) NOT NULL,
  `procedimento_samu` varchar(100) NOT NULL,
  `procedimento_cit` varchar(100) NOT NULL,
  `descartaveis_atadura_tamanho` varchar(20) NOT NULL,
  `descartaveis_atadura_quant` varchar(20) NOT NULL,
  `descartaveis_cateter_oculos_quant` varchar(20) NOT NULL,
  `descartaveis_compressa_comum_quant` varchar(20) NOT NULL,
  `descartaveis_kits_tamanho` varchar(20) NOT NULL,
  `descartaveis_kits_quant` varchar(20) NOT NULL,
  `descartaveis_luvas_quant` varchar(20) NOT NULL,
  `descartaveis_mascara_quant` varchar(20) NOT NULL,
  `descartaveis_manta_aluminizada_quant` varchar(20) NOT NULL,
  `descartaveis_pas_dea_quant` varchar(20) NOT NULL,
  `descartaveis_sonda_aspiracao_quant` varchar(20) NOT NULL,
  `descartaveis_soro_fisiologico_quant` varchar(20) NOT NULL,
  `descartaveis_talas_pap_tamanho` varchar(20) NOT NULL,
  `descartaveis_talas_pap_quant` varchar(20) NOT NULL,
  `descartaveis_outros` varchar(100) NOT NULL,
  `deixados_hospital_base_estabilizador_quant` varchar(20) NOT NULL,
  `deixados_hospital_colar_tamanho` varchar(20) NOT NULL,
  `deixados_hospital_colar_quant` varchar(20) NOT NULL,
  `deixados_hospital_coxin_estabilizador_quant` varchar(20) NOT NULL,
  `deixados_hospital_ked_tamanho` varchar(20) NOT NULL,
  `deixados_hospital_ked_quant` varchar(20) NOT NULL,
  `deixados_hospital_maca_rigida_quant` varchar(20) NOT NULL,
  `deixados_hospital_ttf_tamanho` varchar(20) NOT NULL,
  `deixados_hospital_ttf_quant` varchar(20) NOT NULL,
  `deixados_hospital_tirante_aranha_quant` varchar(20) NOT NULL,
  `deixados_hospital_tirante_cabeca_quant` varchar(20) NOT NULL,
  `deixados_hospital_canula_quant` varchar(20) NOT NULL,
  `deixados_hospital_outro` varchar(100) NOT NULL,
  `observacoes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `info_ocorrencia`
--

CREATE TABLE `info_ocorrencia` (
  `id_info_ocorrencia` int(11) NOT NULL,
  `data` date NOT NULL,
  `local_ocorrencia` varchar(100) NOT NULL,
  `nome_hospital` varchar(100) NOT NULL,
  `numero_usb` varchar(4) NOT NULL,
  `numero_ocorrencia` varchar(8) NOT NULL,
  `despacho` text NOT NULL,
  `hora_chegada` time(4) NOT NULL,
  `km_final` varchar(4) NOT NULL,
  `codigo_ir` varchar(10) NOT NULL,
  `codigo_ps` varchar(10) NOT NULL,
  `codigo_sia_sus` varchar(10) NOT NULL,
  `tipo_ocorrencia` varchar(500) NOT NULL,
  `cinematica_disturbio_comportamento` varchar(100) NOT NULL,
  `cinematica_encontrado_capacete` varchar(100) NOT NULL,
  `cinematica_encontrado_cinto` varchar(100) NOT NULL,
  `cinematica_parabrisa_avariado` varchar(100) NOT NULL,
  `cinematica_caminhando_cena` varchar(100) NOT NULL,
  `cinematica_painel_avariado` varchar(100) NOT NULL,
  `cinematica_volante_torcido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `info_ocorrencia`
--

INSERT INTO `info_ocorrencia` (`id_info_ocorrencia`, `data`, `local_ocorrencia`, `nome_hospital`, `numero_usb`, `numero_ocorrencia`, `despacho`, `hora_chegada`, `km_final`, `codigo_ir`, `codigo_ps`, `codigo_sia_sus`, `tipo_ocorrencia`, `cinematica_disturbio_comportamento`, `cinematica_encontrado_capacete`, `cinematica_encontrado_cinto`, `cinematica_parabrisa_avariado`, `cinematica_caminhando_cena`, `cinematica_painel_avariado`, `cinematica_volante_torcido`) VALUES
(1, '2023-11-26', 'rua tal', 'tal', '22', '12324', 'eu', '17:20:00.0000', '20', '33', '44', '34', 'acidente', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `info_paciente`
--

CREATE TABLE `info_paciente` (
  `id_info_paciente` int(11) NOT NULL,
  `nome_paciente` varchar(100) NOT NULL,
  `idade_paciente` varchar(3) NOT NULL,
  `sexo_paciente` set('Masculino','Feminino') NOT NULL,
  `rg_cpf_paciente` varchar(14) NOT NULL,
  `nome_acompanhante` text NOT NULL,
  `idade_acompanhante` varchar(3) NOT NULL,
  `vitima_era` varchar(30) NOT NULL,
  `forma_conducao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `info_paciente`
--

INSERT INTO `info_paciente` (`id_info_paciente`, `nome_paciente`, `idade_paciente`, `sexo_paciente`, `rg_cpf_paciente`, `nome_acompanhante`, `idade_acompanhante`, `vitima_era`, `forma_conducao`) VALUES
(3, 'Celo', '200', 'Feminino', '12121216565', 'Deus', '17', 'on', 'Sentada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id` int(11) NOT NULL,
  `id_atendente` int(11) NOT NULL,
  `id_info_paciente` int(11) NOT NULL,
  `id_info_ocorrencia` int(11) NOT NULL,
  `id_situacao_paciente` int(11) NOT NULL,
  `id_atendimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id` int(11) NOT NULL,
  `ocorrencia` int(11) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `arquivo_pdf` blob NOT NULL,
  `data_upload` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacao_paciente`
--

CREATE TABLE `situacao_paciente` (
  `id_situacao_paciente` int(11) NOT NULL,
  `medida_pressao` varchar(12) NOT NULL,
  `pulso` varchar(12) NOT NULL,
  `respiração` varchar(9) NOT NULL,
  `saturacao` varchar(4) NOT NULL,
  `hgt` varchar(9) NOT NULL,
  `temperatura` varchar(4) NOT NULL,
  `perfusao` varchar(6) NOT NULL,
  `normal_anormal` text NOT NULL,
  `total_gcs` varchar(2) NOT NULL,
  `problema_psiquiatrico` varchar(100) NOT NULL,
  `problema_respiratorio` varchar(100) NOT NULL,
  `problema_diabete` varchar(100) NOT NULL,
  `problema_diabete_outros` varchar(100) NOT NULL,
  `problema_obstetrico` varchar(100) NOT NULL,
  `problema_transporte` varchar(100) NOT NULL,
  `problema_transporte_outros` varchar(100) NOT NULL,
  `problema_objetos_recolhidos` varchar(100) NOT NULL,
  `localizacao_traumas` mediumblob NOT NULL,
  `tabela_traumas_local` varchar(100) NOT NULL,
  `tabela_traumas_lado` varchar(100) NOT NULL,
  `tabela_traumas_face` varchar(100) NOT NULL,
  `tabela_traumas_tipo` varchar(100) NOT NULL,
  `queimadura` varchar(300) NOT NULL,
  `decisao_transporte` varchar(30) NOT NULL,
  `sinais_sintomas` varchar(400) NOT NULL,
  `hemorragia` varchar(100) NOT NULL,
  `edema` int(100) NOT NULL,
  `parada` varchar(100) NOT NULL,
  `cianose` varchar(100) NOT NULL,
  `pupilas` varchar(100) NOT NULL,
  `outros` varchar(300) NOT NULL,
  `anamnese_emergencial_oque_aconteceu` varchar(100) NOT NULL,
  `anamnese_aconteceu_outras_vezes` varchar(100) NOT NULL,
  `anamnese_quanto_tempo` varchar(100) NOT NULL,
  `anamnese_problema_saude` varchar(100) NOT NULL,
  `anamnese_quais_problemas` varchar(100) NOT NULL,
  `anamnese_uso_medicacao` varchar(100) NOT NULL,
  `anamnese_hora_ultima_medicacao` varchar(100) NOT NULL,
  `anamnese_qual_medicacao` varchar(100) NOT NULL,
  `anamnese_alergico` varchar(100) NOT NULL,
  `anamnese_qual_alergia` varchar(100) NOT NULL,
  `anamnese_alimento_6horas` varchar(100) NOT NULL,
  `anamnese_especifique` varchar(100) NOT NULL,
  `anamnese_que_horas` varchar(100) NOT NULL,
  `gestacional_periodo_gestacao` varchar(100) NOT NULL,
  `gestacional_pre_natal` varchar(100) NOT NULL,
  `gestacional_nome_medico` varchar(100) NOT NULL,
  `gestacional_possiblidade_complicacao` varchar(100) NOT NULL,
  `gestacional_primeiro_filho` varchar(100) NOT NULL,
  `gestacional_quantos` varchar(100) NOT NULL,
  `gestacional_hora_contracao` varchar(100) NOT NULL,
  `gestacional_duracao_contracao` varchar(100) NOT NULL,
  `gestacional_intervalo_contracao` varchar(100) NOT NULL,
  `gestacional_pressao_quadril` varchar(100) NOT NULL,
  `gestacional_ruptura_bolsa` varchar(100) NOT NULL,
  `gestacional_inspecao_visual` varchar(100) NOT NULL,
  `gestacional_parto_realizado` varchar(100) NOT NULL,
  `gestacional_sexo_bebe` varchar(100) NOT NULL,
  `gestacional_nome_bebe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`id_atendente`);

--
-- Índices de tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id_atendimento`);

--
-- Índices de tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  ADD PRIMARY KEY (`id_info_ocorrencia`);

--
-- Índices de tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  ADD PRIMARY KEY (`id_info_paciente`);

--
-- Índices de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_atendente` (`id_atendente`),
  ADD KEY `fk_id_info_paciente` (`id_info_paciente`),
  ADD KEY `fk_id_info_ocorrencia` (`id_info_ocorrencia`),
  ADD KEY `fk_id_situacao_paciente` (`id_situacao_paciente`),
  ADD KEY `fk_id_atendimento` (`id_atendimento`);

--
-- Índices de tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ocorrencia` (`ocorrencia`);

--
-- Índices de tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  ADD PRIMARY KEY (`id_situacao_paciente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendente`
--
ALTER TABLE `atendente`
  MODIFY `id_atendente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id_atendimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  MODIFY `id_info_ocorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  MODIFY `id_info_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `situacao_paciente`
--
ALTER TABLE `situacao_paciente`
  MODIFY `id_situacao_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `fk_id_atendente` FOREIGN KEY (`id_atendente`) REFERENCES `atendente` (`id_atendente`),
  ADD CONSTRAINT `fk_id_atendimento` FOREIGN KEY (`id_atendimento`) REFERENCES `atendimento` (`id_atendimento`),
  ADD CONSTRAINT `fk_id_info_ocorrencia` FOREIGN KEY (`id_info_ocorrencia`) REFERENCES `info_ocorrencia` (`id_info_ocorrencia`),
  ADD CONSTRAINT `fk_id_info_paciente` FOREIGN KEY (`id_info_paciente`) REFERENCES `info_paciente` (`id_info_paciente`),
  ADD CONSTRAINT `fk_id_situacao_paciente` FOREIGN KEY (`id_situacao_paciente`) REFERENCES `situacao_paciente` (`id_situacao_paciente`);

--
-- Restrições para tabelas `relatorios`
--
ALTER TABLE `relatorios`
  ADD CONSTRAINT `fk_ocorrencia` FOREIGN KEY (`ocorrencia`) REFERENCES `ocorrencia` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
