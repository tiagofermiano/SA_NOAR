<?php
include('protect.php');
include('conexao.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitInfos'])) {
    processarFicha();
}



function processarFicha()
{
    global $conn;
    // ESTA PARTE VAI PARA info_paciente
    $nomePaciente = isset($_POST['nomePaciente']) ? $_POST['nomePaciente'] : '';
    $idadePaciente = $_POST['idadePaciente'];
    $sexoPaciente = $_POST['sexoSelect'];
    $rgCpfPaciente = $_POST['rgCpfPaciente'];
    $nomeAcompanhante = $_POST['nomeAcompanhante'];
    $idadeAcompanhante = $_POST['idadeAcompanhante'];
    $vitimaEra = isset($_POST['vitimaEra']) ? implode(", ", $_POST['vitimaEra']) : '';
    $formaConducao = $_POST['formaConducaoSelect'];

    // ESTA PARTE VAI PARA info_ocorrencia
    $dataocorrencia = $_POST['data_ocorrencia'];
    $localOcorrencia = $_POST['localocorrencia'];
    $nomeHospital = $_POST['nomehospital'];
    $numeroUSB = $_POST['usb'];
    $numeroOcorrencia = $_POST['numocorrencia'];
    $despacho = $_POST['despacho'];
    $horaChegada = $_POST['horachegada'];
    $kmFinal = $_POST['kmfinal'];
    $codigoIR = $_POST['codIr'];
    $codigoPS = $_POST['codPs'];
    $codigoSiaSus = $_POST['codSiaSus'];
    $tipoOcorrencia = isset($_POST['tipo_ocorrencia']) ? implode(", ", $_POST['tipo_ocorrencia']) : '';
    $cinematicaDisturbioComportamento = isset($_POST['disturbio']) ? implode(", ", $_POST['disturbio']) : '';
    $cinematicaEncontradoCapacete = isset($_POST['encontradoCapacete']) ? implode(", ", $_POST['encontradoCapacete']) : '';
    $cinematicaEncontradoCinto = isset($_POST['encontradoCinto']) ? implode(", ", $_POST['encontradoCinto']) : '';
    $cinematicaParabrisaAvariado = isset($_POST['parabrisaAvariado']) ? implode(", ", $_POST['parabrisaAvariado']) : '';
    $cinematicaCaminhandoCena = isset($_POST['caminhandoCena']) ? implode(", ", $_POST['caminhandoCena']) : '';
    $cinematicaPainelAvariado = isset($_POST['painelAvariado']) ? implode(", ", $_POST['painelAvariado']) : '';
    $cinematicaVolanteTorcido = isset($_POST['volanteTorcido']) ? implode(", ", $_POST['volanteTorcido']) : '';

    // ESTA PARTE VAI PARA situacao_paciente
    $medidaPressao = isset($_POST['medidaPressao']) ? $_POST['medidaPressao'] : '';
    $pulso = $_POST['pulso'];
    $respiracao = isset($_POST['respiracao']) ? $_POST['respiracao'] : '';
    $saturacao = $_POST['saturacao'];
    $hgt = $_POST['hgt'];
    $temperatura = $_POST['temperatura'];
    $perfusao = isset($_POST['perfusao']) ? implode(", ", $_POST['perfusao']) : '';
    $normalAnormal = isset($_POST['normalAnormal']) ? implode(", ", $_POST['normalAnormal']) : '';
    $totalGcs = $_POST['totalGcs'];
    $problemaPsiquiatrico = isset($_POST['problemaPsiquiatrico']) ? implode(", ", $_POST['problemaPsiquiatrico']) : '';
    $problemaRespiratorio = isset($_POST['problemaRespiratório']) ? implode(", ", $_POST['problemaRespiratório']) : '';
    $problemaDiabete = isset($_POST['problemaDiabete']) ? implode(", ", $_POST['problemaDiabete']) : '';
    $problemaDiabeteOutros = isset($_POST['problemaDiabeteOutros']) ? $_POST['problemaDiabeteOutros'] : '';
    $problemaObstetrico = isset($_POST['problemaObstetrico']) ? implode(", ", $_POST['problemaObstetrico']) : '';
    $problemaTransporte = isset($_POST['problemaTransporte']) ? implode(", ", $_POST['problemaTransporte']) : '';
    $problemaTransporteOutros = $_POST['problemaTransporteOutros'];
    $problemaObjetosRecolhidos = $_POST['problemaObjetosRecolhidos'];
    $tabelaTraumasLocal = $_POST['tabelaTraumasLocal'];
    $tabelaTraumasLado = $_POST['tabelaTraumasLado'];
    $tabelaTraumasFace = $_POST['tabelaTraumasFace'];
    $tabelaTraumasTipo = $_POST['tabelaTraumasTipo'];
    $queimadura = isset($_POST['queimadura']) ? implode(", ", (array)$_POST['queimadura']) : '';
    $decisaoTransporte = isset($_POST['decisaoTransporte']) ? implode(", ", $_POST['decisaoTransporte']) : '';
    $sinaisSintomas = isset($_POST['sinaisSintomas']) ? implode(", ", $_POST['sinaisSintomas']) : '';
    $hemorragia = isset($_POST['hemorragia']) ? implode(", ", (array)$_POST['hemorragia']) : '';
    $edema = isset($_POST['edema']) ? implode(", ", (array)$_POST['edema']) : '';
    $parada = isset($_POST['parada']) ? implode(", ", (array)$_POST['parada']) : '';
    $cianose = isset($_POST['cianose']) ? implode(", ", (array)$_POST['cianose']) : '';
    $pupilas = isset($_POST['pupilas']) ? implode(", ", (array)$_POST['pupilas']) : '';
    $outros = $_POST['outros'];
    $anamneseEmergencialOqueAconteceu = $_POST['anamneseEmergencialOqueAconteceu'];
    $anamneseAconteceuOutrasVezes = isset($_POST['anamneseAconteceuOutrasVezes']) ? implode(", ", $_POST['anamneseAconteceuOutrasVezes']) : '';
    $anamneseQuantoTempo = $_POST['anamneseQuantoTempo'];
    $anamneseProblemaSaude = isset($_POST['anamneseProblemaSaude']) ? implode(", ", $_POST['anamneseProblemaSaude']) : '';
    $anamneseQuaisProblemas = $_POST['anamneseQuaisProblemas'];
    $anamneseUsoMedicacao = isset($_POST['anamnseseUsoMedicacao']) ? implode(", ", $_POST['anamneseUsoMedicacao']) : '';
    $anamneseHoraUltimaMedicacao = $_POST['anamneseHoraUltimaMedicacao'];
    $anamneseQualMedicacao = $_POST['anamneseQualMedicacao'];
    $anamneseAlergico = isset($_POST['anamnseseAlergico']) ? implode(", ", $_POST['anamneseAlergico']) : '';
    $anamneseQualAlergia = $_POST['anamneseQualAlergia'];
    $anamneseAlimento6Horas = isset($_POST['anamneseAlimento6Horas']) ? implode(", ", $_POST['anamneseAlimento6Horas']) : '';
    $anamneseEspecifique = $_POST['anamneseEspecifique'];
    $anamneseQueHoras = $_POST['anamneseQueHoras'];
    $gestacionalPeriodoGestacao = $_POST['gestacionalPeriodoGestacao'];
    $gestacionalPreNatal = isset($_POST['gestacionalPreNatal']) ? implode(", ", $_POST['gestacionalPreNatal']) : '';
    $gestacionalNomeMedico = $_POST['gestacionalNomeMedico'];
    $gestacionalPossibilidadeComplicacao = isset($_POST['gestacionalPossibilidadeComplicacao']) ? implode(", ", $_POST['gestacionalPossibilidadeComplicacao']) : '';
    $gestacionalPrimeiroFilho = isset($_POST['gestacionalPrimeiroFilho']) ? implode(", ", $_POST['gestacionalPrimeiroFilho']) : '';
    $gestacionalQuantos = $_POST['gestacionalQuantos'];
    $gestacionalHoraContracao = $_POST['gestacionalHoraContracao'];
    $gestacionalDuracaoContracao = $_POST['gestacionalDuracaoContracao'];
    $gestacionalIntervaloContracao = $_POST['gestacionalIntervaloContracao'];
    $gestacionalPressaoQuadril = isset($_POST['gestacionalPressaoQuadril']) ? implode(", ", $_POST['gestacionalPressaoQuadril']) : '';
    $gestacionalRupturaBolsa = isset($_POST['gestacionalRupturaBolsa']) ? implode(", ", $_POST['gestacionalRupturaBolsa']) : '';
    $gestacionalInspecaoVisual = isset($_POST['gestacionalInspecaoVisual']) ? implode(", ", $_POST['gestacionalInspecaoVisual']) : '';
    $gestacionalPartoRealizado = isset($_POST['gestacionalPartoRealizado']) ? implode(", ", $_POST['gestacionalPartoRealizado']) : '';
    $gestacionalSexoBebe = isset($_POST['gestacionalSexoBebe']) ? implode(", ", $_POST['gestacionalSexoBebe']) : '';
    $gestacionalNomeBebe = $_POST['gestacionalNomeBebe'];

    // ESTA PARTE VAI PARA atendimento
    $motorista = $_POST['motorista'];
    $socorrista1 = $_POST['socorrista1'];
    $socorrista2 = $_POST['socorrista2'];
    $socorrista3 = $_POST['socorrista3'];
    $demandante = $_POST['demandante'];
    $equipe = $_POST['equipe'];
    $procedimentosEfetuados1 = isset($_POST['procedimentosefetuados1']) ? implode(", ", $_POST['procedimentosefetuados1']) : '';
    $procedimentoMeiosAuxiliares = isset($_POST['procedimentomeiosauxiliares']) ? implode(", ", $_POST['procedimentomeiosauxiliares']) : '';
    $procedimentoPolicia = isset($_POST['procedimentopolicia']) ? implode(", ", $_POST['procedimentopolicia']) : '';
    $procedimentoSamu = isset($_POST['procedimentosamu']) ? implode(", ", $_POST['procedimentosamu']) : '';
    $procedimentoCit =$_POST['procedimentocit'];
    $descartaveisAtaduraTamanho = isset($_POST['descartaveisataduratamanho']) ? implode(", ", (array)$_POST['descartaveisataduratamanho']) : '';
    $descartaveisAtaduraQuant = isset($_POST['descartaveisataduraquant']) ? $_POST['descartaveisataduraquant'] : '';
    $descartaveisCateterOculosQuant = $_POST['descartaveiscateteroculosquant'];
    $descartaveisCompressaComumQuant = $_POST['descartaveiscompressacomumquant'];
    $descartaveisKitsTamanho = isset($_POST['descartaveiskitstamanho']) ? implode(", ", $_POST['descartaveiskitstamanho']) : '';
    $descartaveisKitsQuant = $_POST['descartaveiskitsquant'];
    $descartaveisLuvasQuant = $_POST['descartaveisluvasquant'];
    $descartaveisMascaraQuant = $_POST['descartaveismascaraquant'];
    $descartaveisMantaAluminizadaQuant = $_POST['descartaveismantaaluminizadaquant'];
    $descartaveisPasDeaQuant = $_POST['descartaveispasdeaquant'];
    $descartaveisSondaAspiracaoQuant = $_POST['descartaveissondaaspiracaoquant'];
    $descartaveisSoroFisiologicoQuant = $_POST['descartaveissorofisiologicoquant'];
    $descartaveisTalasPapTamanho = isset($_POST['descartaveistalaspaptamanho']) ? implode(", ", $_POST['descartaveistalaspaptamanho']) : '';
    $descartaveisTalasPapQuant = $_POST['descartaveistalaspapquant'];
    $descartaveisOutros = $_POST['descartaveisoutros'];
    $deixadosHospitalBaseEstabilizadorQuant = $_POST['deixadoshospitalbaseestabilizadorquant'];
    $deixadosHospitalColarTamanho = isset($_POST['deixadosospitalcolartamanho']) ? implode(", ", $_POST['deixadosospitalcolartamanho']) : '';
    $deixadosHospitalColarQuant = $_POST['deixadoshospitalcolarquant'];
    $deixadosHospitalCoxinEstabilizadorQuant = $_POST['deixadoshospitalcoxinestabilizadorquant'];
    $deixadosHospitalKedTamanho = isset($_POST['deixadosospitalkedtamanho']) ? implode(", ", $_POST['deixadosospitalkedtamanho']) : '';
    $deixadosHospitalKedQuant = $_POST['deixadoshospitalkedQquant'];
    $deixadosHospitalMacaRigidaQuant = $_POST['deixadoshospitalmacarigidaquant'];
    $deixadosHospitalTtfTamanho = isset($_POST['deixadosospitalttftamanho']) ? implode(", ", $_POST['deixadosospitalttftamanho']) : '';
    $deixadosHospitalTtfQuant = $_POST['deixadoshospitalttfquant'];
    $deixadosHospitalTiranteAranhaQuant = $_POST['deixadoshospitaltirantearanhaquant'];
    $deixadosHospitalTiranteCabecaQuant = $_POST['deixadoshospitaltirantecabecaquant'];
    $deixadosHospitalCanulaQuant = $_POST['deixadoshospitalcanulaquant'];
    $deixadosHospitalOutro = $_POST['deixadoshospitaloutro'];
    $observacoes = $_POST['observacoes'];

   // Inserir dados na tabela 'info_paciente'
   $sqlInfoPaciente = "INSERT INTO info_paciente (nome_paciente, idade_paciente, sexo_paciente, rg_cpf_paciente, nome_acompanhante, idade_acompanhante, vitima_era, forma_conducao)
   VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmtInfoPaciente = $conn->prepare($sqlInfoPaciente);
$stmtInfoPaciente->bind_param("sissssss", $nomePaciente, $idadePaciente, $sexoPaciente, $rgCpfPaciente, $nomeAcompanhante, $idadeAcompanhante, $vitimaEra, $formaConducao);
$stmtInfoPaciente->execute();

// Inserir dados na tabela 'info_ocorrencia'
$sqlInfoOcorrencia = "INSERT INTO info_ocorrencia (data_ocorrencia, local_ocorrencia, nome_hospital, numero_usb, numero_ocorrencia, despacho, hora_chegada, km_final, codigo_ir, codigo_ps, codigo_sia_sus, tipo_ocorrencia, cinematica_disturbio_comportamento, cinematica_encontrado_capacete, cinematica_encontrado_cinto, cinematica_parabrisa_avariado, cinematica_caminhando_cena, cinematica_painel_avariado, cinematica_volante_torcido)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtInfoOcorrencia = $conn->prepare($sqlInfoOcorrencia);

if ($stmtInfoOcorrencia === false) {
    die('Erro na preparação da consulta (info_ocorrencia): ' . $conn->error);
}

$stmtInfoOcorrencia->bind_param("sssssssssssssssssss", $dataocorrencia, $localOcorrencia, $nomeHospital, $numeroUSB, $numeroOcorrencia, $despacho, $horaChegada, $kmFinal, $codigoIR, $codigoPS, $codigoSiaSus, $tipoOcorrencia, $cinematicaDisturbioComportamento, $cinematicaEncontradoCapacete, $cinematicaEncontradoCinto, $cinematicaParabrisaAvariado, $cinematicaCaminhandoCena, $cinematicaPainelAvariado, $cinematicaVolanteTorcido);
$resultInfoOcorrencia = $stmtInfoOcorrencia->execute();

if (!$resultInfoOcorrencia) {
    die('Erro ao executar a consulta (info_ocorrencia): ' . $stmtInfoOcorrencia->error);
}

// Inserir dados na tabela 'situacao_paciente'
$sqlSituacaoPaciente = "INSERT INTO situacao_paciente (medida_pressao, pulso, respiracao, saturacao, hgt, temperatura, perfusao, normal_anormal, total_gcs, problema_psiquiatrico, problema_respiratorio, problema_diabete, problema_diabete_outros, problema_obstetrico, problema_transporte, problema_transporte_outros, problema_objetos_recolhidos, tabela_traumas_local, tabela_traumas_lado, tabela_traumas_face, tabela_traumas_tipo, queimadura, decisao_transporte, sinais_sintomas, hemorragia, edema, parada, cianose, pupilas, outros, anamnese_emergencial_oque_aconteceu, anamnese_aconteceu_outras_vezes, anamnese_quanto_tempo, anamnese_problema_saude, anamnese_quais_problemas, anamnese_uso_medicacao, anamnese_hora_ultima_medicacao, anamnese_qual_medicacao, anamnese_alergico, anamnese_qual_alergia, anamnese_alimento_6horas, anamnese_especifique, anamnese_que_horas, gestacional_periodo_gestacao, gestacional_pre_natal, gestacional_nome_medico, gestacional_possibilidade_complicacao, gestacional_primeiro_filho, gestacional_quantos, gestacional_hora_contracao, gestacional_duracao_contracao, gestacional_intervalo_contracao, gestacional_pressao_quadril, gestacional_ruptura_bolsa, gestacional_inspecao_visual, gestacional_parto_realizado, gestacional_sexo_bebe, gestacional_nome_bebe)
       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtSituacaoPaciente = $conn->prepare($sqlSituacaoPaciente);

if ($stmtSituacaoPaciente === false) {
    die('Erro na preparação da consulta (situacao_paciente): ' . $conn->error);
}
$stmtSituacaoPaciente->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $medidaPressao, $pulso, $respiracao, $saturacao, $hgt, $temperatura, $perfusao, $normalAnormal, $totalGcs, $problemaPsiquiatrico, $problemaRespiratorio, $problemaDiabete, $problemaDiabeteOutros, $problemaObstetrico, $problemaTransporte, $problemaTransporteOutros, $problemaObjetosRecolhidos, $tabelaTraumasLocal, $tabelaTraumasLado, $tabelaTraumasFace, $tabelaTraumasTipo, $queimadura, $decisaoTransporte, $sinaisSintomas, $hemorragia, $edema, $parada, $cianose, $pupilas, $outros, $anamneseEmergencialOqueAconteceu, $anamneseAconteceuOutrasVezes, $anamneseQuantoTempo, $anamneseProblemaSaude, $anamneseQuaisProblemas, $anamneseUsoMedicacao, $anamneseHoraUltimaMedicacao, $anamneseQualMedicacao, $anamneseAlergico, $anamneseQualAlergia, $anamneseAlimento6Horas, $anamneseEspecifique, $anamneseQueHoras, $gestacionalPeriodoGestacao, $gestacionalPreNatal, $gestacionalNomeMedico, $gestacionalPossibilidadeComplicacao, $gestacionalPrimeiroFilho, $gestacionalQuantos, $gestacionalHoraContracao, $gestacionalDuracaoContracao, $gestacionalIntervaloContracao, $gestacionalPressaoQuadril, $gestacionalRupturaBolsa, $gestacionalInspecaoVisual, $gestacionalPartoRealizado, $gestacionalSexoBebe, $gestacionalNomeBebe);
$resultSituacaoPaciente = $stmtSituacaoPaciente->execute();

if (!$resultSituacaoPaciente) {
    die('Erro ao executar a consulta (situacao_paciente): ' . $stmtSituacaoPaciente->error);
}

// Inserir dados na tabela 'atendimento'
$sqlAtendimento = "INSERT INTO atendimento (motorista, socorrista_1, socorrista_2, socorrista_3, demandante, equipe, procedimentos_efetuados1, procedimento_meios_auxiliares, procedimento_policia, procedimento_samu, procedimento_cit, descartaveis_atadura_tamanho, descartaveis_atadura_quant, descartaveis_cateter_oculos_quant, descartaveis_compressa_comum_quant, descartaveis_kits_tamanho, descartaveis_kits_quant, descartaveis_luvas_quant, descartaveis_mascara_quant, descartaveis_manta_aluminizada_quant, descartaveis_pas_dea_quant, descartaveis_sonda_aspiracao_quant, descartaveis_soro_fisiologico_quant, descartaveis_talas_pap_tamanho, descartaveis_talas_pap_quant, descartaveis_outros, deixados_hospital_base_estabilizador_quant, deixados_hospital_colar_tamanho, deixados_hospital_colar_quant, deixados_hospital_coxin_estabilizador_quant, deixados_hospital_ked_tamanho, deixados_hospital_ked_quant, deixados_hospital_maca_rigida_quant, deixados_hospital_ttf_tamanho, deixados_hospital_ttf_quant, deixados_hospital_tirante_aranha_quant, deixados_hospital_tirante_cabeca_quant, deixados_hospital_canula_quant, deixados_hospital_outro, observacoes)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtAtendimento = $conn->prepare($sqlAtendimento);

if ($stmtAtendimento === false) {
    die('Erro na preparação da consulta (atendimento): ' . $conn->error);
}

$stmtAtendimento->bind_param("ssssssssssssssssssssssssssssssssssssssss", $motorista, $socorrista1, $socorrista2, $socorrista3, $demandante, $equipe, $procedimentosEfetuados1, $procedimentoMeiosAuxiliares, $procedimentoPolicia, $procedimentoSamu, $procedimentoCit, $descartaveisAtaduraTamanho, $descartaveisAtaduraQuant, $descartaveisCateterOculosQuant, $descartaveisCompressaComumQuant, $descartaveisKitsTamanho, $descartaveisKitsQuant, $descartaveisLuvasQuant, $descartaveisMascaraQuant, $descartaveisMantaAluminizadaQuant, $descartaveisPasDeaQuant, $descartaveisSondaAspiracaoQuant, $descartaveisSoroFisiologicoQuant, $descartaveisTalasPapTamanho, $descartaveisTalasPapQuant, $descartaveisOutros, $deixadosHospitalBaseEstabilizadorQuant, $deixadosHospitalColarTamanho, $deixadosHospitalColarQuant, $deixadosHospitalCoxinEstabilizadorQuant, $deixadosHospitalKedTamanho, $deixadosHospitalKedQuant, $deixadosHospitalMacaRigidaQuant, $deixadosHospitalTtfTamanho, $deixadosHospitalTtfQuant, $deixadosHospitalTiranteAranhaQuant, $deixadosHospitalTiranteCabecaQuant, $deixadosHospitalCanulaQuant, $deixadosHospitalOutro, $observacoes);
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
header("Location: telahome_admin.php");
exit();
}
?>