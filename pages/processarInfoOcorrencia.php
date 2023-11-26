<?php
include('protect.php');
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitInfos'])) {
    processarInfoOcorrencia();
}

function processarInfoOcorrencia()
{
    global $conn;

    // Obtenha os dados do formulário
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

    // Query SQL de inserção na tabela info_ocorrencia
    $sql = "INSERT INTO info_ocorrencia (data_ocorrencia, local_ocorrencia, nome_hospital, numero_usb, numero_ocorrencia, despacho, hora_chegada, km_final, codigo_ir, codigo_ps, codigo_sia_sus, tipo_ocorrencia, cinematica_disturbio_comportamento, cinematica_encontrado_capacete, cinematica_encontrado_cinto, cinematica_parabrisa_avariado, cinematica_caminhando_cena, cinematica_painel_avariado, cinematica_volante_torcido) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar e executar a declaração
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular parâmetros
        $stmt->bind_param("sssssssssssssssssss", $dataocorrencia, $localOcorrencia, $nomeHospital, $numeroUSB, $numeroOcorrencia, $despacho, $horaChegada, $kmFinal, $codigoIR, $codigoPS, $codigoSiaSus, $tipoOcorrencia, $cinematicaDisturbioComportamento, $cinematicaEncontradoCapacete, $cinematicaEncontradoCinto, $cinematicaParabrisaAvariado, $cinematicaCaminhandoCena, $cinematicaPainelAvariado, $cinematicaVolanteTorcido);

        // Executar a declaração
        $stmt->execute();

        // Verificar se a inserção foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            echo "Registro inserido com sucesso!";
        } else {
            echo "Erro ao inserir o registro: " . $stmt->error;
        }

        // Fechar declaração
        $stmt->close();
    } else {
        echo "Erro na preparação da declaração: " . $conn->error;
    }

    // Fechar conexão
    $conn->close();
}
