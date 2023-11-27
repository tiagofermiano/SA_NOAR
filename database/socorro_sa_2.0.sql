-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/11/2023 às 03:02
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

--
-- Despejando dados para a tabela `atendimento`
--

INSERT INTO `atendimento` (`id_atendimento`, `motorista`, `socorrista_1`, `socorrista_2`, `socorrista_3`, `demandante`, `equipe`, `procedimentos_efetuados1`, `procedimento_meios_auxiliares`, `procedimento_policia`, `procedimento_samu`, `procedimento_cit`, `descartaveis_atadura_tamanho`, `descartaveis_atadura_quant`, `descartaveis_cateter_oculos_quant`, `descartaveis_compressa_comum_quant`, `descartaveis_kits_tamanho`, `descartaveis_kits_quant`, `descartaveis_luvas_quant`, `descartaveis_mascara_quant`, `descartaveis_manta_aluminizada_quant`, `descartaveis_pas_dea_quant`, `descartaveis_sonda_aspiracao_quant`, `descartaveis_soro_fisiologico_quant`, `descartaveis_talas_pap_tamanho`, `descartaveis_talas_pap_quant`, `descartaveis_outros`, `deixados_hospital_base_estabilizador_quant`, `deixados_hospital_colar_tamanho`, `deixados_hospital_colar_quant`, `deixados_hospital_coxin_estabilizador_quant`, `deixados_hospital_ked_tamanho`, `deixados_hospital_ked_quant`, `deixados_hospital_maca_rigida_quant`, `deixados_hospital_ttf_tamanho`, `deixados_hospital_ttf_quant`, `deixados_hospital_tirante_aranha_quant`, `deixados_hospital_tirante_cabeca_quant`, `deixados_hospital_canula_quant`, `deixados_hospital_outro`, `observacoes`) VALUES
(1, 'Aaaa', 'Aaaa', 'Aaa', 'Aaa', 'Aaa', 'Aaa', 'on, on, on, on, on, on, on, on, on', 'on', 'on', 'on', 'aaaa', 'on', '2222', '222', '222', 'on', '22', '2', '2', '2', '2', '2', '2', 'on', '2', '222', '222', '', '222', '222', '', '222', '222', '', '222', '222', '22', '22', '222', '2222');

-- --------------------------------------------------------

--
-- Estrutura para tabela `info_ocorrencia`
--

CREATE TABLE `info_ocorrencia` (
  `id_info_ocorrencia` int(11) NOT NULL,
  `data_ocorrencia` date NOT NULL,
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

INSERT INTO `info_ocorrencia` (`id_info_ocorrencia`, `data_ocorrencia`, `local_ocorrencia`, `nome_hospital`, `numero_usb`, `numero_ocorrencia`, `despacho`, `hora_chegada`, `km_final`, `codigo_ir`, `codigo_ps`, `codigo_sia_sus`, `tipo_ocorrencia`, `cinematica_disturbio_comportamento`, `cinematica_encontrado_capacete`, `cinematica_encontrado_cinto`, `cinematica_parabrisa_avariado`, `cinematica_caminhando_cena`, `cinematica_painel_avariado`, `cinematica_volante_torcido`) VALUES
(1, '2023-11-26', 'rua tal', 'tal', '22', '12324', 'eu', '17:20:00.0000', '20', '33', '44', '34', 'acidente', '', '', '', '', '', '', ''),
(2, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(3, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(4, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(5, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(6, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(7, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(8, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(9, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(10, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(11, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(12, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(13, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(14, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(15, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(16, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(17, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(18, '2023-11-26', 'Pedro Ivo', 'Dona Helena', '123', '0002', 'rua pavao', '23:06:00.0000', '54', '123', '123', '123', 'on, on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(19, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(20, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(21, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(22, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(23, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(24, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(25, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(26, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(27, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(28, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(29, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(30, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(31, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(32, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(33, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(34, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(35, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(36, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(37, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(38, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(39, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(40, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(41, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(42, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(43, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(44, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(45, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(46, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(47, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(48, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(49, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(50, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(51, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(52, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(53, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(54, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(55, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(56, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(57, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(58, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(59, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(60, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(61, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(62, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(63, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(64, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(65, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(66, '2023-11-20', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(67, '0000-00-00', 'Adsasd', 'Asdasd', '123', '123123', '123213', '21:31:00.0000', 'aasd', '123', '123', '123', 'on, on', 'on', 'on', 'on', 'on', 'on', 'on', 'on');

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
(3, 'Celo', '200', 'Feminino', '12121216565', 'Deus', '17', 'on', 'Sentada'),
(4, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(5, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(6, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(7, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(8, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(9, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(10, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(11, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(12, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(13, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(14, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(15, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(16, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(17, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(18, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(19, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(20, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(21, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(22, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(23, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(24, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(25, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(26, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(27, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(28, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(29, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(30, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(31, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(32, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(33, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(34, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(35, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(36, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(37, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(38, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(39, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(40, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(41, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(42, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(43, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(44, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(45, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(46, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(47, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(48, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(49, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(50, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(51, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(52, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(53, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(54, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(55, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(56, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(57, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(58, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(59, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(60, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(61, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(62, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada'),
(63, 'Aaaaa', '123', 'Masculino', '13198160960', 'Aaaa', '232', 'on, on', 'Semi-sentada');

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
  `respiracao` varchar(9) NOT NULL,
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
  `gestacional_possibilidade_complicacao` varchar(100) NOT NULL,
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
-- Despejando dados para a tabela `situacao_paciente`
--

INSERT INTO `situacao_paciente` (`id_situacao_paciente`, `medida_pressao`, `pulso`, `respiracao`, `saturacao`, `hgt`, `temperatura`, `perfusao`, `normal_anormal`, `total_gcs`, `problema_psiquiatrico`, `problema_respiratorio`, `problema_diabete`, `problema_diabete_outros`, `problema_obstetrico`, `problema_transporte`, `problema_transporte_outros`, `problema_objetos_recolhidos`, `tabela_traumas_local`, `tabela_traumas_lado`, `tabela_traumas_face`, `tabela_traumas_tipo`, `queimadura`, `decisao_transporte`, `sinais_sintomas`, `hemorragia`, `edema`, `parada`, `cianose`, `pupilas`, `outros`, `anamnese_emergencial_oque_aconteceu`, `anamnese_aconteceu_outras_vezes`, `anamnese_quanto_tempo`, `anamnese_problema_saude`, `anamnese_quais_problemas`, `anamnese_uso_medicacao`, `anamnese_hora_ultima_medicacao`, `anamnese_qual_medicacao`, `anamnese_alergico`, `anamnese_qual_alergia`, `anamnese_alimento_6horas`, `anamnese_especifique`, `anamnese_que_horas`, `gestacional_periodo_gestacao`, `gestacional_pre_natal`, `gestacional_nome_medico`, `gestacional_possibilidade_complicacao`, `gestacional_primeiro_filho`, `gestacional_quantos`, `gestacional_hora_contracao`, `gestacional_duracao_contracao`, `gestacional_intervalo_contracao`, `gestacional_pressao_quadril`, `gestacional_ruptura_bolsa`, `gestacional_inspecao_visual`, `gestacional_parto_realizado`, `gestacional_sexo_bebe`, `gestacional_nome_bebe`) VALUES
(2, '', '123 B.C.P.M.', '', '12 %', '123 mg/dL', '31', 'on', 'on', '', 'on', '', 'on', '', 'on', 'on', 'asd', 'asd', '', '', '', '', 'on', 'on', 'on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on', 'on', 0, 'on', 'on', 'on', 'aa', 'aaaa', 'on', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '123 B.C.P.M.', '', '12 %', '123 mg/dL', '31', 'on', 'on', '', 'on', '', 'on', '', 'on', 'on', 'asd', 'asd', '', '', '', '', 'on', 'on', 'on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on', 'on', 0, 'on', 'on', 'on', 'aa', 'aaaa', 'on', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '', '123 B.C.P.M.', '', '12 %', '123 mg/dL', '31', 'on', 'on', '', 'on', '', 'on', '', 'on', 'on', 'asd', 'asd', '', '', '', '', 'on', 'on', 'on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on', 'on', 0, 'on', 'on', 'on', 'aa', 'aaaa', 'on', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '123 B.C.P.M.', '', '12 %', '123 mg/dL', '31', 'on', 'on', '', 'on', '', 'on', '', 'on', 'on', 'asd', 'asd', '', '', '', '', 'on', 'on', 'on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on', 'on', 0, 'on', 'on', 'on', 'aa', 'aaaa', 'on', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, '', '123 B.C.P.M.', '', '12 %', '123 mg/dL', '31', 'on', 'on', '', 'on', '', 'on', '', 'on', 'on', 'asd', 'asd', '', '', '', '', 'on', 'on', 'on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on', 'on', 0, 'on', 'on', 'on', 'aa', 'aaaa', 'on', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, '', '123 B.C.P.M.', '', '12 %', '123 mg/dL', '31', 'on', 'on', '', 'on', '', '', '', '', '', 'asd', 'asd', '', '', '', '', 'on', 'on', 'on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on, on', '', 0, '', '', '', 'aa', 'aaaa', 'on', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
  MODIFY `id_atendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `info_ocorrencia`
--
ALTER TABLE `info_ocorrencia`
  MODIFY `id_info_ocorrencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `info_paciente`
--
ALTER TABLE `info_paciente`
  MODIFY `id_info_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
  MODIFY `id_situacao_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
