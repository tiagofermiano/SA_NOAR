<?php
include('protect.php');
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitInfos'])) {
    processarAtendimento();
}

function processarAtendimento()
{
    global $conn;

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
    $descartaveisAtaduraTamanho = isset($_POST['descartaveisataduratamanho']) ? implode(", ", $_POST['descartaveisataduraaamanho']) : '';
    $descartaveisAtaduraQuant = $_POST['descartaveisataduraquant'];
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

    try {
        $sql = "INSERT INTO atendimento (
            motorista,
            socorrista_1,
            socorrista_2,
            socorrista_3,
            demandante,
            equipe,
            procedimentos_efetuados1,
            procedimento_meios_auxiliares,
            procedimento_policia,
            procedimento_samu,
            procedimento_cit,
            descartaveis_atadura_tamanho,
            descartaveis_atadura_quant,
            descartaveis_cateter_oculos_quant,
            descartaveis_compressa_comum_quant,
            descartaveis_kits_tamanho,
            descartaveis_kits_quant,
            descartaveis_luvas_quant,
            descartaveis_mascara_quant,
            descartaveis_manta_aluminizada_quant,
            descartaveis_pas_dea_quant,
            descartaveis_sonda_aspiracao_quant,
            descartaveis_soro_fisiologico_quant,
            descartaveis_talas_pap_tamanho,
            descartaveis_talas_pap_quant,
            descartaveis_outros,
            deixados_hospital_base_estabilizador_quant,
            deixados_hospital_colar_tamanho,
            deixados_hospital_colar_quant,
            deixados_hospital_coxin_estabilizador_quant,
            deixados_hospital_ked_tamanho,
            deixados_hospital_ked_quant,
            deixados_hospital_maca_rigida_quant,
            deixados_hospital_ttf_tamanho,
            deixados_hospital_ttf_quant,
            deixados_hospital_tirante_aranha_quant,
            deixados_hospital_tirante_cabeca_quant,
            deixados_hospital_canula_quant,
            deixados_hospital_outro,
            observacoes
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param(
                "ssssssssssssssssssssssssssssssssssssssss",
                $motorista,
                $socorrista1,
                $socorrista2,
                $socorrista3,
                $demandante,
                $equipe,
                $procedimentosEfetuados1,
                $procedimentoMeiosAuxiliares,
                $procedimentoPolicia,
                $procedimentoSamu,
                $procedimentoCit,
                $descartaveisAtaduraTamanho,
                $descartaveisAtaduraQuant,
                $descartaveisCateterOculosQuant,
                $descartaveisCompressaComumQuant,
                $descartaveisKitsTamanho,
                $descartaveisKitsQuant,
                $descartaveisLuvasQuant,
                $descartaveisMascaraQuant,
                $descartaveisMantaAluminizadaQuant,
                $descartaveisPasDeaQuant,
                $descartaveisSondaAspiracaoQuant,
                $descartaveisSoroFisiologicoQuant,
                $descartaveisTalasPapTamanho,
                $descartaveisTalasPapQuant,
                $descartaveisOutros,
                $deixadosHospitalBaseEstabilizadorQuant,
                $deixadosHospitalColarTamanho,
                $deixadosHospitalColarQuant,
                $deixadosHospitalCoxinEstabilizadorQuant,
                $deixadosHospitalKedTamanho,
                $deixadosHospitalKedQuant,
                $deixadosHospitalMacaRigidaQuant,
                $deixadosHospitalTtfTamanho,
                $deixadosHospitalTtfQuant,
                $deixadosHospitalTiranteAranhaQuant,
                $deixadosHospitalTiranteCabecaQuant,
                $deixadosHospitalCanulaQuant,
                $deixadosHospitalOutro,
                $observacoes
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