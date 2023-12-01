<?php
include('protect.php');
include('conexao.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitInfos'])) {
    processarFichaUser();
}

function processarFichaUser()
{
    $idAtendente = ($_SESSION['id_atendente']);
 
    global $conn;
    // ESTA PARTE VAI PARA info_paciente
    $nomePaciente = isset($_POST['nomePaciente']) ? $_POST['nomePaciente'] : '';
    $idadePaciente = isset($_POST['idadePaciente']) ? $_POST['idadePaciente'] : '';
    $sexoPaciente = isset($_POST['sexoPaciente']) ? $_POST['sexoPaciente'] : '';
    $rgCpfPaciente = isset($_POST['rgcpfPaciente']) ? $_POST['rgcpfPaciente'] : '';
    $nomeAcompanhante = isset($_POST['nomeAcompanhante']) ? $_POST['nomeAcompanhante'] : '';
    $idadeAcompanhante = isset($_POST['idadeAcompanhante']) ? $_POST['idadeAcompanhante'] : '';
    $vitimaEra = isset($_POST['vitimaEra']) ? implode(", ", (array)$_POST['vitimaEra']) : '';
    $formaConducao = isset($_POST['formaConducao']) ? $_POST['formaConducao'] : '';

    // ESTA PARTE VAI PARA info_ocorrencia
    $dataocorrencia = isset($_POST['data_ocorrencia']) ? $_POST['data_ocorrencia'] : '';
    $localOcorrencia = isset($_POST['localocorrencia']) ? $_POST['localocorrencia'] : '';
    $nomeHospital = isset($_POST['nomehospital']) ? $_POST['nomehospital'] : '';
    $numeroUSB = isset($_POST['usb']) ? $_POST['usb'] : '';
    $numeroOcorrencia = isset($_POST['numocorrencia']) ? $_POST['numocorrencia'] : '';
    $despacho = isset($_POST['despacho']) ? $_POST['despacho'] : '';
    $horaChegada = isset($_POST['horachegada']) ? $_POST['horachegada'] : '';
    $kmFinal = isset($_POST['kmfinal']) ? $_POST['kmfinal'] : '';
    $codigoIR = isset($_POST['codIr']) ? $_POST['codIr'] : '';
    $codigoPS = isset($_POST['codPs']) ? $_POST['codPs'] : '';
    $codigoSiaSus = isset($_POST['codSiaSus']) ? $_POST['codSiaSus'] : '';
    $tipoOcorrencia = isset($_POST['tipo_ocorrencia']) ? implode(", ", (array)$_POST['tipo_ocorrencia']) : '';
    $cinematicaDisturbioComportamento = isset($_POST['disturbio']) ? implode(", ", (array)$_POST['disturbio']) : '';
    $cinematicaEncontradoCapacete = isset($_POST['encontradoCapacete']) ? implode(", ", (array)$_POST['encontradoCapacete']) : '';
    $cinematicaEncontradoCinto = isset($_POST['encontradoCinto']) ? implode(", ", (array)$_POST['encontradoCinto']) : '';
    $cinematicaParabrisaAvariado = isset($_POST['parabrisaAvariado']) ? implode(", ", (array)$_POST['parabrisaAvariado']) : '';
    $cinematicaCaminhandoCena = isset($_POST['caminhandoCena']) ? implode(", ", (array)$_POST['caminhandoCena']) : '';
    $cinematicaPainelAvariado = isset($_POST['painelAvariado']) ? implode(", ", (array)$_POST['painelAvariado']) : '';
    $cinematicaVolanteTorcido = isset($_POST['volanteTorcido']) ? implode(", ", (array)$_POST['volanteTorcido']) : '';

    // ESTA PARTE VAI PARA situacao_paciente
    $medidaPressao = isset($_POST['medidaPressao']) ? $_POST['medidaPressao'] : '';
    $pulso = isset($_POST['pulso']) ? $_POST['pulso'] : '';
    $respiracao = isset($_POST['respiracao']) ? $_POST['respiracao'] : '';
    $saturacao = isset($_POST['saturacao']) ? $_POST['saturacao'] : '';
    $hgt = isset($_POST['hgt']) ? $_POST['hgt'] : '';
    $temperatura = isset($_POST['temperatura']) ? $_POST['temperatura'] : '';
    $perfusao = isset($_POST['perfusao']) ? implode(", ", (array)$_POST['perfusao']) : '';
    $normalAnormal = isset($_POST['normalAnormal']) ? implode(", ", (array)$_POST['normalAnormal']) : '';
    $totalGcs = isset($_POST['totalGcs']) ? $_POST['totalGcs'] : '';
    $problemaPsiquiatrico = isset($_POST['problemaPsiquiatrico']) ? implode(", ", (array)$_POST['problemaPsiquiatrico']) : '';
    $problemaRespiratorio = isset($_POST['problemaRespiratório']) ? implode(", ", (array)$_POST['problemaRespiratório']) : '';
    $problemaDiabete = isset($_POST['problemaDiabete']) ? implode(", ", (array)$_POST['problemaDiabete']) : '';
    $problemaDiabeteOutros = isset($_POST['problemaDiabeteOutros']) ? $_POST['problemaDiabeteOutros'] : '';
    $problemaObstetrico = isset($_POST['problemaObstetrico']) ? implode(", ", (array)$_POST['problemaObstetrico']) : '';
    $problemaTransporte = isset($_POST['problemaTransporte']) ? implode(", ", (array)$_POST['problemaTransporte']) : '';
    $problemaTransporteOutros = isset($_POST['problemaTransporteOutros']) ? $_POST['problemaTransporteOutros'] : '';
    $problemaObjetosRecolhidos = isset($_POST['problemaObjetosRecolhidos']) ? $_POST['problemaObjetosRecolhidos'] : '';
    $tabelaTraumasLocal = isset($_POST['tabelaTraumasLocal']) ? $_POST['tabelaTraumasLocal'] : '';
    $tabelaTraumasLado = isset($_POST['tabelaTraumasLado']) ? $_POST['tabelaTraumasLado'] : '';
    $tabelaTraumasFace = isset($_POST['tabelaTraumasFace']) ? $_POST['tabelaTraumasFace'] : '';
    $tabelaTraumasTipo = isset($_POST['tabelaTraumasTipo']) ? $_POST['tabelaTraumasTipo'] : '';
    $queimadura = isset($_POST['queimadura']) ? implode(", ", (array)$_POST['queimadura']) : '';
    $decisaoTransporte = isset($_POST['decisaoTransporte']) ? implode(", ", (array)$_POST['decisaoTransporte']) : '';
    $sinaisSintomas = isset($_POST['sinaisSintomas']) ? implode(", ", (array)$_POST['sinaisSintomas']) : '';
    $hemorragia = isset($_POST['hemorragia']) ? implode(", ", (array)$_POST['hemorragia']) : '';
    $edema = isset($_POST['edema']) ? implode(", ", (array)$_POST['edema']) : '';
    $parada = isset($_POST['parada']) ? implode(", ", (array)$_POST['parada']) : '';
    $cianose = isset($_POST['cianose']) ? implode(", ", (array)$_POST['cianose']) : '';
    $pupilas = isset($_POST['pupilas']) ? implode(", ", (array)$_POST['pupilas']) : '';
    $outros = isset($_POST['outros']) ? $_POST['outros'] : '';
    $anamneseEmergencialOqueAconteceu = isset($_POST['anamneseEmergencialOqueAconteceu']) ? $_POST['anamneseEmergencialOqueAconteceu'] : '';
    $anamneseAconteceuOutrasVezes = isset($_POST['anamneseAconteceuOutrasVezes']) ? implode(", ", (array)$_POST['anamneseAconteceuOutrasVezes']) : '';
    $anamneseQuantoTempo = isset($_POST['anamneseQuantoTempo']) ? $_POST['anamneseQuantoTempo'] : '';
    $anamneseProblemaSaude = isset($_POST['anamneseProblemaSaude']) ? implode(", ", (array)$_POST['anamneseProblemaSaude']) : '';
    $anamneseQuaisProblemas = isset($_POST['anamneseQuaisProblemas']) ? $_POST['anamneseQuaisProblemas'] : '';
    $anamneseUsoMedicacao = isset($_POST['anamneseUsoMedicacao']) ? implode(", ", (array)$_POST['anamneseUsoMedicacao']) : '';
    $anamneseHoraUltimaMedicacao = $_POST['anamneseHoraUltimaMedicacao'];
    $anamneseQualMedicacao = isset($_POST['anamneseQualMedicacao']) ? $_POST['anamneseQualMedicacao'] : '';
    $anamneseAlergico = isset($_POST['anamneseAlergico']) ? implode(", ", (array)$_POST['anamneseAlergico']) : '';
    $anamneseQualAlergia = isset($_POST['deixadoshospitalcanulaquant']) ? $_POST['deixadoshospitalcanulaquant'] : '';
    $anamneseAlimento6Horas = isset($_POST['anamneseQualAlergia']) ? implode(", ", (array)$_POST['anamneseQualAlergia']) : '';
    $anamneseEspecifique = isset($_POST['anamneseEspecifique']) ? $_POST['anamneseEspecifique'] : '';
    $anamneseQueHoras = isset($_POST['anamneseQueHoras']) ? $_POST['anamneseQueHoras'] : '';
    $gestacionalPeriodoGestacao = isset($_POST['gestacionalPeriodoGestacao']) ? $_POST['gestacionalPeriodoGestacao'] : '';
    $gestacionalPreNatal = isset($_POST['gestacionalPreNatal']) ? implode(", ", (array)$_POST['gestacionalPreNatal']) : '';
    $gestacionalNomeMedico = isset($_POST['gestacionalNomeMedico']) ? $_POST['gestacionalNomeMedico'] : '';
    $gestacionalPossibilidadeComplicacao = isset($_POST['gestacionalPossibilidadeComplicacao']) ? implode(", ", (array)$_POST['gestacionalPossibilidadeComplicacao']) : '';
    $gestacionalPrimeiroFilho = isset($_POST['gestacionalPrimeiroFilho']) ? implode(", ", $_POST['gestacionalPrimeiroFilho']) : '';
    $gestacionalQuantos = isset($_POST['gestacionalQuantos']) ? $_POST['gestacionalQuantos'] : '';
    $gestacionalHoraContracao = isset($_POST['gestacionalHoraContracao']) ? $_POST['gestacionalHoraContracao'] : '';
    $gestacionalDuracaoContracao = isset($_POST['gestacionalDuracaoContracao']) ? $_POST['gestacionalDuracaoContracao'] : '';
    $gestacionalIntervaloContracao = isset($_POST['gestacionalIntervaloContracao']) ? $_POST['gestacionalIntervaloContracao'] : '';
    $gestacionalPressaoQuadril = isset($_POST['gestacionalPressaoQuadril']) ? implode(", ", (array)$_POST['gestacionalPressaoQuadril']) : '';
    $gestacionalRupturaBolsa = isset($_POST['gestacionalRupturaBolsa']) ? implode(", ", (array)$_POST['gestacionalRupturaBolsa']) : '';
    $gestacionalInspecaoVisual = isset($_POST['gestacionalInspecaoVisual']) ? implode(", ", (array)$_POST['gestacionalInspecaoVisual']) : '';
    $gestacionalPartoRealizado = isset($_POST['gestacionalPartoRealizado']) ? implode(", ", (array)$_POST['gestacionalPartoRealizado']) : '';
    $gestacionalSexoBebe = isset($_POST['gestacionalSexoBebe']) ? implode(", ", (array)$_POST['gestacionalSexoBebe']) : '';
    $gestacionalNomeBebe = isset($_POST['gestacionalNomeBebe']) ? $_POST['gestacionalNomeBebe'] : '';

    // ESTA PARTE VAI PARA atendimento
    $motorista = isset($_POST['motorista']) ? $_POST['motorista'] : '';
    $socorrista1 = isset($_POST['socorrista1']) ? $_POST['socorrista1'] : '';
    $socorrista2 = isset($_POST['socorrista2']) ? $_POST['socorrista2'] : '';
    $socorrista3 = isset($_POST['socorrista3']) ? $_POST['socorrista3'] : '';
    $demandante = isset($_POST['demandante']) ? $_POST['demandante'] : '';
    $equipe = isset($_POST['equipe']) ? $_POST['equipe'] : '';
    $procedimentosEfetuados1 = isset($_POST['procedimentosefetuados1']) ? implode(", ", (array)$_POST['procedimentosefetuados1']) : '';
    $procedimentoMeiosAuxiliares = isset($_POST['procedimentomeiosauxiliares']) ? implode(", ", (array)$_POST['procedimentomeiosauxiliares']) : '';
    $procedimentoPolicia = isset($_POST['procedimentopolicia']) ? implode(", ", (array)$_POST['procedimentopolicia']) : '';
    $procedimentoSamu = isset($_POST['procedimentosamu']) ? implode(", ", (array)$_POST['procedimentosamu']) : '';
    $procedimentoCit = isset($_POST['procedimentocit']) ? $_POST['procedimentocit'] : '';
    $descartaveisAtaduraTamanho = isset($_POST['descartaveisataduratamanho']) ? implode(", ", (array)$_POST['descartaveisataduratamanho']) : '';
    $descartaveisAtaduraQuant = isset($_POST['descartaveisataduraquant']) ? $_POST['descartaveisataduraquant'] : '';
    $descartaveisCateterOculosQuant = isset($_POST['descartaveiscateteroculosquant']) ? $_POST['descartaveiscateteroculosquant'] : '';
    $descartaveisCompressaComumQuant = isset($_POST['descartaveiscompressacomumquant']) ? $_POST['descartaveiscompressacomumquant'] : '';
    $descartaveisKitsTamanho = isset($_POST['descartaveiskitstamanho']) ? implode(", ", (array)$_POST['descartaveiskitstamanho']) : '';
    $descartaveisKitsQuant = isset($_POST['descartaveiskitsquant']) ? $_POST['descartaveiskitsquant'] : '';
    $descartaveisLuvasQuant = isset($_POST['descartaveisluvasquant']) ? $_POST['descartaveisluvasquant'] : '';
    $descartaveisMascaraQuant = isset($_POST['descartaveismascaraquant']) ? $_POST['descartaveismascaraquant'] : '';
    $descartaveisMantaAluminizadaQuant = isset($_POST['descartaveismantaaluminizadaquant']) ? $_POST['descartaveismantaaluminizadaquant'] : '';
    $descartaveisPasDeaQuant = isset($_POST['descartaveispasdeaquant']) ? $_POST['descartaveispasdeaquant'] : '';
    $descartaveisSondaAspiracaoQuant = isset($_POST['descartaveissondaaspiracaoquant']) ? $_POST['descartaveissondaaspiracaoquant'] : '';
    $descartaveisSoroFisiologicoQuant = isset($_POST['descartaveissorofisiologicoquant']) ? $_POST['descartaveissorofisiologicoquant'] : '';
    $descartaveisTalasPapTamanho = isset($_POST['descartaveistalaspaptamanho']) ? implode(", ", (array)$_POST['descartaveistalaspaptamanho']) : '';
    $descartaveisTalasPapQuant = isset($_POST['descartaveistalaspapquant']) ? $_POST['descartaveistalaspapquant'] : '';
    $descartaveisOutros = isset($_POST['descartaveisoutros']) ? $_POST['descartaveisoutros'] : '';
    $deixadosHospitalBaseEstabilizadorQuant = isset($_POST['deixadoshospitalbaseestabilizadorquant']) ? $_POST['deixadoshospitalbaseestabilizadorquant'] : '';
    $deixadosHospitalColarTamanho = isset($_POST['deixadosospitalcolartamanho']) ? implode(", ", (array)$_POST['deixadosospitalcolartamanho']) : '';
    $deixadosHospitalColarQuant = isset($_POST['deixadoshospitalcolarquant']) ? $_POST['deixadoshospitalcolarquant'] : '';
    $deixadosHospitalCoxinEstabilizadorQuant = isset($_POST['deixadoshospitalcoxinestabilizadorquant']) ? $_POST['deixadoshospitalcoxinestabilizadorquant'] : '';
    $deixadosHospitalKedTamanho = isset($_POST['deixadosospitalkedtamanho']) ? implode(", ", (array)$_POST['deixadosospitalkedtamanho']) : '';
    $deixadosHospitalKedQuant = isset($_POST['deixadoshospitalkedQquant']) ? $_POST['deixadoshospitalkedQquant'] : '';
    $deixadosHospitalMacaRigidaQuant = isset($_POST['deixadoshospitalmacarigidaquant']) ? $_POST['deixadoshospitalmacarigidaquant'] : '';
    $deixadosHospitalTtfTamanho = isset($_POST['deixadosospitalttftamanho']) ? implode(", ", (array)$_POST['deixadosospitalttftamanho']) : '';
    $deixadosHospitalTtfQuant = isset($_POST['deixadoshospitalttfquant']) ? $_POST['deixadoshospitalttfquant'] : '';
    $deixadosHospitalTiranteAranhaQuant = isset($_POST['deixadoshospitaltirantearanhaquant']) ? $_POST['deixadoshospitaltirantearanhaquant'] : '';
    $deixadosHospitalTiranteCabecaQuant = isset($_POST['deixadoshospitaltirantecabecaquant']) ? $_POST['deixadoshospitaltirantecabecaquant'] : '';
    $deixadosHospitalCanulaQuant = isset($_POST['deixadoshospitalcanulaquant']) ? $_POST['deixadoshospitalcanulaquant'] : '';
    $deixadosHospitalOutro = isset($_POST['deixadoshospitaloutro']) ? $_POST['deixadoshospitaloutro'] : '';
    $observacoes = isset($_POST['observacoes']) ? $_POST['observacoes'] : '';


   // Inserir dados na tabela 'info_paciente'
   $sqlInfoPaciente = "INSERT INTO info_paciente (nome_paciente, idade_paciente, sexo_paciente, rg_cpf_paciente, nome_acompanhante, idade_acompanhante, vitima_era, forma_conducao, data_ocorrencia, hora_chegada, id_atendente)
   VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtInfoPaciente = $conn->prepare($sqlInfoPaciente);
$stmtInfoPaciente->bind_param("sissssssssi", $nomePaciente, $idadePaciente, $sexoPaciente, $rgCpfPaciente, $nomeAcompanhante, $idadeAcompanhante, $vitimaEra, $formaConducao, $dataocorrencia, $horaChegada, $idAtendente);
$stmtInfoPaciente->execute();

// Inserir dados na tabela 'info_ocorrencia'
$sqlInfoOcorrencia = "INSERT INTO info_ocorrencia (data_ocorrencia, local_ocorrencia, nome_hospital, numero_usb, numero_ocorrencia, despacho, hora_chegada, km_final, codigo_ir, codigo_ps, codigo_sia_sus, tipo_ocorrencia, cinematica_disturbio_comportamento, cinematica_encontrado_capacete, cinematica_encontrado_cinto, cinematica_parabrisa_avariado, cinematica_caminhando_cena, cinematica_painel_avariado, cinematica_volante_torcido, id_atendente)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtInfoOcorrencia = $conn->prepare($sqlInfoOcorrencia);

if ($stmtInfoOcorrencia === false) {
    die('Erro na preparação da consulta (info_ocorrencia): ' . $conn->error);
}

$stmtInfoOcorrencia->bind_param("sssssssssssssssssssi", $dataocorrencia, $localOcorrencia, $nomeHospital, $numeroUSB, $numeroOcorrencia, $despacho, $horaChegada, $kmFinal, $codigoIR, $codigoPS, $codigoSiaSus, $tipoOcorrencia, $cinematicaDisturbioComportamento, $cinematicaEncontradoCapacete, $cinematicaEncontradoCinto, $cinematicaParabrisaAvariado, $cinematicaCaminhandoCena, $cinematicaPainelAvariado, $cinematicaVolanteTorcido, $idAtendente);
$resultInfoOcorrencia = $stmtInfoOcorrencia->execute();

if (!$resultInfoOcorrencia) {
    die('Erro ao executar a consulta (info_ocorrencia): ' . $stmtInfoOcorrencia->error);
}

// Inserir dados na tabela 'situacao_paciente'
$sqlSituacaoPaciente = "INSERT INTO situacao_paciente (medida_pressao, pulso, respiracao, saturacao, hgt, temperatura, perfusao, normal_anormal, total_gcs, problema_psiquiatrico, problema_respiratorio, problema_diabete, problema_diabete_outros, problema_obstetrico, problema_transporte, problema_transporte_outros, problema_objetos_recolhidos, tabela_traumas_local, tabela_traumas_lado, tabela_traumas_face, tabela_traumas_tipo, queimadura, decisao_transporte, sinais_sintomas, hemorragia, edema, parada, cianose, pupilas, outros, anamnese_emergencial_oque_aconteceu, anamnese_aconteceu_outras_vezes, anamnese_quanto_tempo, anamnese_problema_saude, anamnese_quais_problemas, anamnese_uso_medicacao, anamnese_hora_ultima_medicacao, anamnese_qual_medicacao, anamnese_alergico, anamnese_qual_alergia, anamnese_alimento_6horas, anamnese_especifique, anamnese_que_horas, gestacional_periodo_gestacao, gestacional_pre_natal, gestacional_nome_medico, gestacional_possibilidade_complicacao, gestacional_primeiro_filho, gestacional_quantos, gestacional_hora_contracao, gestacional_duracao_contracao, gestacional_intervalo_contracao, gestacional_pressao_quadril, gestacional_ruptura_bolsa, gestacional_inspecao_visual, gestacional_parto_realizado, gestacional_sexo_bebe, gestacional_nome_bebe, data_ocorrencia, hora_chegada, id_atendente)
       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtSituacaoPaciente = $conn->prepare($sqlSituacaoPaciente);

if ($stmtSituacaoPaciente === false) {
    die('Erro na preparação da consulta (situacao_paciente): ' . $conn->error);
}
$stmtSituacaoPaciente->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssi", $medidaPressao, $pulso, $respiracao, $saturacao, $hgt, $temperatura, $perfusao, $normalAnormal, $totalGcs, $problemaPsiquiatrico, $problemaRespiratorio, $problemaDiabete, $problemaDiabeteOutros, $problemaObstetrico, $problemaTransporte, $problemaTransporteOutros, $problemaObjetosRecolhidos, $tabelaTraumasLocal, $tabelaTraumasLado, $tabelaTraumasFace, $tabelaTraumasTipo, $queimadura, $decisaoTransporte, $sinaisSintomas, $hemorragia, $edema, $parada, $cianose, $pupilas, $outros, $anamneseEmergencialOqueAconteceu, $anamneseAconteceuOutrasVezes, $anamneseQuantoTempo, $anamneseProblemaSaude, $anamneseQuaisProblemas, $anamneseUsoMedicacao, $anamneseHoraUltimaMedicacao, $anamneseQualMedicacao, $anamneseAlergico, $anamneseQualAlergia, $anamneseAlimento6Horas, $anamneseEspecifique, $anamneseQueHoras, $gestacionalPeriodoGestacao, $gestacionalPreNatal, $gestacionalNomeMedico, $gestacionalPossibilidadeComplicacao, $gestacionalPrimeiroFilho, $gestacionalQuantos, $gestacionalHoraContracao, $gestacionalDuracaoContracao, $gestacionalIntervaloContracao, $gestacionalPressaoQuadril, $gestacionalRupturaBolsa, $gestacionalInspecaoVisual, $gestacionalPartoRealizado, $gestacionalSexoBebe, $gestacionalNomeBebe, $dataocorrencia, $horaChegada, $idAtendente);
$resultSituacaoPaciente = $stmtSituacaoPaciente->execute();

if (!$resultSituacaoPaciente) {
    die('Erro ao executar a consulta (situacao_paciente): ' . $stmtSituacaoPaciente->error);
}

// Inserir dados na tabela 'atendimento'
$sqlAtendimento = "INSERT INTO atendimento (motorista, socorrista_1, socorrista_2, socorrista_3, demandante, equipe, procedimentos_efetuados1, procedimento_meios_auxiliares, procedimento_policia, procedimento_samu, procedimento_cit, descartaveis_atadura_tamanho, descartaveis_atadura_quant, descartaveis_cateter_oculos_quant, descartaveis_compressa_comum_quant, descartaveis_kits_tamanho, descartaveis_kits_quant, descartaveis_luvas_quant, descartaveis_mascara_quant, descartaveis_manta_aluminizada_quant, descartaveis_pas_dea_quant, descartaveis_sonda_aspiracao_quant, descartaveis_soro_fisiologico_quant, descartaveis_talas_pap_tamanho, descartaveis_talas_pap_quant, descartaveis_outros, deixados_hospital_base_estabilizador_quant, deixados_hospital_colar_tamanho, deixados_hospital_colar_quant, deixados_hospital_coxin_estabilizador_quant, deixados_hospital_ked_tamanho, deixados_hospital_ked_quant, deixados_hospital_maca_rigida_quant, deixados_hospital_ttf_tamanho, deixados_hospital_ttf_quant, deixados_hospital_tirante_aranha_quant, deixados_hospital_tirante_cabeca_quant, deixados_hospital_canula_quant, deixados_hospital_outro, observacoes, data_ocorrencia, hora_chegada, id_atendente)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtAtendimento = $conn->prepare($sqlAtendimento);

if ($stmtAtendimento === false) {
    die('Erro na preparação da consulta (atendimento): ' . $conn->error);
}

$stmtAtendimento->bind_param("ssssssssssssssssssssssssssssssssssssssssssi", $motorista, $socorrista1, $socorrista2, $socorrista3, $demandante, $equipe, $procedimentosEfetuados1, $procedimentoMeiosAuxiliares, $procedimentoPolicia, $procedimentoSamu, $procedimentoCit, $descartaveisAtaduraTamanho, $descartaveisAtaduraQuant, $descartaveisCateterOculosQuant, $descartaveisCompressaComumQuant, $descartaveisKitsTamanho, $descartaveisKitsQuant, $descartaveisLuvasQuant, $descartaveisMascaraQuant, $descartaveisMantaAluminizadaQuant, $descartaveisPasDeaQuant, $descartaveisSondaAspiracaoQuant, $descartaveisSoroFisiologicoQuant, $descartaveisTalasPapTamanho, $descartaveisTalasPapQuant, $descartaveisOutros, $deixadosHospitalBaseEstabilizadorQuant, $deixadosHospitalColarTamanho, $deixadosHospitalColarQuant, $deixadosHospitalCoxinEstabilizadorQuant, $deixadosHospitalKedTamanho, $deixadosHospitalKedQuant, $deixadosHospitalMacaRigidaQuant, $deixadosHospitalTtfTamanho, $deixadosHospitalTtfQuant, $deixadosHospitalTiranteAranhaQuant, $deixadosHospitalTiranteCabecaQuant, $deixadosHospitalCanulaQuant, $deixadosHospitalOutro, $observacoes, $dataocorrencia, $horaChegada, $idAtendente);
$resultAtendimento = $stmtAtendimento->execute();

if (!$resultAtendimento) {
    die('Erro ao executar a consulta (atendimento): ' . $stmtAtendimento->error);
}

// Finalizando a função processarInfoOcorrencia()
echo "Informações da ocorrência inseridas com sucesso!";
$stmtAtendimento->close();
$stmtSituacaoPaciente->close();
$stmtInfoOcorrencia->close();
$stmtInfoPaciente->close();
$conn->close(); // Fechar a conexão com o banco de dados após a conclusão

// Redirecionar para a página desejada após a conclusão do processo
header("Location: telahome.php?success=true");
exit();
}
?>