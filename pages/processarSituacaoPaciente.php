<?php
include('protect.php');
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitInfos'])) {
    processarSituacaoPaciente();
}


function processarSituacaoPaciente()
{
    global $conn;

    // Recuperar os dados do formulário
    $medidaPressao = $_POST['medidaPressao'];
    $pulso = $_POST['pulso'];
    $respiracao = $_POST['respiracao'];
    $saturacao = $_POST['saturacao'];
    $hgt = $_POST['hgt'];
    $temperatura = $_POST['temperatura'];
    $perfusao = isset($_POST['perfusao']) ? implode(", ", $_POST['perfusao']) : '';
    $normalAnormal = isset($_POST['normalAnormal']) ? implode(", ", $_POST['normaAnormal']) : '';
    $totalGcs = $_POST['totalGcs'];
    $problemaPsiquiatrico = isset($_POST['problemaPsiquiatrico']) ? implode(", ", $_POST['problemaPsiquiatrico']) : '';
    $problemaRespiratorio = isset($_POST['problemaRespiratório']) ? implode(", ", $_POST['problemaRespiratório']) : '';
    $problemaDiabete = isset($_POST['problemaDiabete']) ? implode(", ", $_POST['problemaDiabete']) : '';
    $problemaDiabeteOutros = $_POST['problemaDiabeteOutros'];
    $problemaObstetrico = isset($_POST['problemaObstetrico']) ? implode(", ", $_POST['problemaObstetrico']) : '';
    $problemaTransporte = isset($_POST['problemaTransporte']) ? implode(", ", $_POST['problemaTransporte']) : '';
    $problemaTransporteOutros = $_POST['problemaTransporteOutros'];
    $problemaObjetosRecolhidos = $_POST['problemaObjetosRecolhidos'];
    $tabelaTraumasLocal = $_POST['tabelaTraumasLocal'];
    $tabelaTraumasLado = $_POST['tabelaTraumasLado'];
    $tabelaTraumasFace = $_POST['tabelaTraumasFace'];
    $tabelaTraumasTipo = $_POST['tabelaTraumasTipo'];
    $queimadura = isset($_POST['queimadura']) ? implode(", ", $_POST['queimadura']) : '';
    $decisaoTransporte = isset($_POST['decisaoTransporte']) ? implode(", ", $_POST['decisaoTransporte']) : '';
    $sinaisSintomas = isset($_POST['sinaisSintomas']) ? implode(", ", $_POST['sinaiSintomas']) : '';
    $hemorragia = isset($_POST['hemorragia']) ? implode(", ", $_POST['hemorragia']) : '';
    $edema = isset($_POST['edema']) ? implode(", ", $_POST['edema']) : '';
    $parada = isset($_POST['parada']) ? implode(", ", $_POST['parada']) : '';
    $cianose = isset($_POST['cianose']) ? implode(", ", $_POST['cianose']) : '';
    $pupilas = isset($_POST['pupilas']) ? implode(", ", $_POST['pupilas']) : '';
    $outros = $_POST['outros'];
    $anamneseEmergencialOqueAconteceu = $_POST['anamneseEmergencialOqueAconteceu'];
    $anamneseAconteceuOutrasVezes = isset($_POST['anamnseseAconteceuOutrasVezes']) ? implode(", ", $_POST['anamneseAconteceuOutrasVezes']) : '';
    $anamneseQuantoTempo = $_POST['anamneseQuantoTempo'];
    $anamneseProblemaSaude = isset($_POST['anamneseProblemaSaude']) ? implode(", ", $_POST['anamneseProblemaSaude']) : '';
    $anamneseQuaisProblemas = $_POST['anamneseQuaisProblemas'];
    $anamneseUsoMedicacao = isset($_POST['anamnseseUsoMedicacao']) ? implode(", ", $_POST['anamneseUsoMedicacao']) : '';
    $anamneseHoraUltimaMedicacao = $_POST['anamneseHoraUltimaMedicacao'];
    $anamneseQualMedicacao = $_POST['anamneseQualMedicacao'];
    $anamneseAlergico = isset($_POST['anamnseseAlergico']) ? implode(", ", $_POST['anamneseAlergico']) : '';
    $anamneseQualAlergia = $_POST['anamneseQualAlergia'];
    $anamneseAlimento6Horas = isset($_POST['anamnseseAlimento6Horas']) ? implode(", ", $_POST['anamneseAlimento6Horas']) : '';
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

    try {
        $sql = "INSERT INTO situacao_paciente (
        medida_pressao, 
        pulso, 
        respiracao, 
        saturacao, 
        hgt, 
        temperatura, 
        perfusao, 
        normal_anormal, 
        total_gcs, 
        problema_psiquiatrico, 
        problema_respiratorio, 
        problema_diabete, 
        problema_diabete_outros, 
        problema_obstetrico, 
        problema_transporte, 
        problema_transporte_outros, 
        problema_objetos_recolhidos, 
        tabela_traumas_local, 
        tabela_traumas_lado, 
        tabela_traumas_face, 
        tabela_traumas_tipo, 
        queimadura, 
        decisao_transporte, 
        sinais_sintomas, 
        hemorragia, 
        edema, 
        parada, 
        cianose, 
        pupilas, 
        outros, 
        anamnese_emergencial_oque_aconteceu, 
        anamnese_aconteceu_outras_vezes, 
        anamnese_quanto_tempo, 
        anamnese_problema_saude, 
        anamnese_quais_problemas, 
        anamnese_uso_medicacao, 
        anamnese_hora_ultima_medicacao, 
        anamnese_qual_medicacao, 
        anamnese_alergico, 
        anamnese_qual_alergia, 
        anamnese_alimento_6horas, 
        anamnese_especifique, 
        anamnese_que_horas, 
        gestacional_periodo_gestacao, 
        gestacional_pre_natal, 
        gestacional_nome_medico, 
        gestacional_possiblidade_complicacao, 
        gestacional_primeiro_filho, 
        gestacional_quantos, 
        gestacional_hora_contracao, 
        gestacional_duracao_contracao, 
        gestacional_intervalo_contracao, 
        gestacional_pressao_quadril, 
        gestacional_ruptura_bolsa, 
        gestacional_inspecao_visual, 
        gestacional_parto_realizado, 
        gestacional_sexo_bebe, 
        gestacional_nome_bebe
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        // Preparar e executar a declaração
        if ($stmt) {
            // Vincular parâmetros
            $stmt->bind_param(
                "sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
                $medidaPressao,
                $pulso,
                $respiracao,
                $saturacao,
                $hgt,
                $temperatura,
                $perfusao,
                $normalAnormal,
                $totalGcs,
                $problemaPsiquiatrico,
                $problemaRespiratorio,
                $problemaDiabete,
                $problemaDiabeteOutros,
                $problemaObstetrico,
                $problemaTransporte,
                $problemaTransporteOutros,
                $problemaObjetosRecolhidos,
                $tabelaTraumasLocal,
                $tabelaTraumasLado,
                $tabelaTraumasFace,
                $tabelaTraumasTipo,
                $queimadura,
                $decisaoTransporte,
                $sinaisSintomas,
                $hemorragia,
                $edema,
                $parada,
                $cianose,
                $pupilas,
                $outros,
                $anamneseEmergencialOqueAconteceu,
                $anamneseAconteceuOutrasVezes,
                $anamneseQuantoTempo,
                $anamneseProblemaSaude,
                $anamneseQuaisProblemas,
                $anamneseUsoMedicacao,
                $anamneseHoraUltimaMedicacao,
                $anamneseQualMedicacao,
                $anamneseAlergico,
                $anamneseQualAlergia,
                $anamneseAlimento6Horas,
                $anamneseEspecifique,
                $anamneseQueHoras,
                $gestacionalPeriodoGestacao,
                $gestacionalPreNatal,
                $gestacionalNomeMedico,
                $gestacionalPossibilidadeComplicacao,
                $gestacionalPrimeiroFilho,
                $gestacionalQuantos,
                $gestacionalHoraContracao,
                $gestacionalDuracaoContracao,
                $gestacionalIntervaloContracao,
                $gestacionalPressaoQuadril,
                $gestacionalRupturaBolsa,
                $gestacionalInspecaoVisual,
                $gestacionalPartoRealizado,
                $gestacionalSexoBebe,
                $gestacionalNomeBebe
            );

            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Registro inserido com sucesso!";
            } else {
                echo "Erro ao inserir o registro: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro na preparação da declaração: " . $conn->error;
        }

        $conn->close();
    } catch (Exception $e) {
        echo "Erro inesperado: " . $e->getMessage();
    }
}

?>