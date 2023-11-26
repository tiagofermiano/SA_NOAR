<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitInfos'])) {
    processarFormulario();
}

function processarFormulario() {
    global $conn;

    // Obtenha os dados do formulário
    $data = $_POST['data'];
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
    $tipoOcorrencia = implode(", ", $_POST['tipo_ocorrencia']);
    $cinematicaDisturbioComportamento = implode(", ", $_POST['tipo_ocorrencia']);
    $cinematicaEncontradoCapacete = implode(", ", $_POST['tipo_ocorrencia']);
    $cinematicaEncontradoCinto = implode(", ", $_POST['tipo_ocorrencia']);
    $cinematicaParabrisaAvariado = implode(", ", $_POST['tipo_ocorrencia']);
    $cinematicaCaminhandoCena = implode(", ", $_POST['tipo_ocorrencia']);
    $cinematicaPainelAvariado = implode(", ", $_POST['tipo_ocorrencia']);
    $cinematicaVolanteTorcido = implode(", ", $_POST['tipo_ocorrencia']);

    // Query SQL de inserção na tabela info_ocorrencia
    $sql = "INSERT INTO info_ocorrencia (data, local_ocorrencia, nome_hospital, numero_usb, numero_ocorrencia, despacho, hora_chegada, km_final, codigo_ir, codigo_ps, codigo_sia_sus, tipo_ocorrencia, cinematica_disturbio_comportamento, cinematica_encontrado_capacete, cinematica_encontrado_cinto, cinematica_parabrisa_avariado, cinematica_caminhando_cena, cinematica_painel_avariado, cinematica_volante_torcido) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar e executar a declaração
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular parâmetros
        $stmt->bind_param("sssssssssssssssssss", $data, $localOcorrencia, $nomeHospital, $numeroUSB, $numeroOcorrencia, $despacho, $horaChegada, $kmFinal, $codigoIR, $codigoPS, $codigoSiaSus, $tipoOcorrencia, $cinematicaDisturbioComportamento, $cinematicaEncontradoCapacete, $cinematicaEncontradoCinto, $cinematicaParabrisaAvariado, $cinematicaCaminhandoCena, $cinematicaPainelAvariado, $cinematicaVolanteTorcido);

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
?>