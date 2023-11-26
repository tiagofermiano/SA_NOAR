<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar qual formulário foi enviado
    if (isset($_POST['submitInfos'])) {
        processarFicha();
    }
}

function processarFicha() {
    global $conn;    

    // Verificar se os campos obrigatórios estão definidos
    $nomePaciente = isset($_POST['nomePaciente']) ? $_POST['nomePaciente'] : null;
    $idadePaciente = isset($_POST['idadePaciente']) ? $_POST['idadePaciente'] : null;
    $sexoPaciente = isset($_POST['sexoSelect']) ? $_POST['sexoSelect'] : null;
    $rgCpfPaciente = isset($_POST['rgCpfPaciente']) ? $_POST['rgCpfPaciente'] : null;

    // Verificar se os campos obrigatórios não são nulos
    if ($nomePaciente !== null && $idadePaciente !== null && $sexoPaciente !== null && $rgCpfPaciente !== null) {

        $idInfoOcorrencia = isset($_POST['idInfoOcorrencia']) ? $_POST['idInfoOcorrencia'] : null;
        // Recuperar os outros dados do formulário
        $nomeAcompanhante = isset($_POST['nomeAcompanhante']) ? $_POST['nomeAcompanhante'] : null;
        $idadeAcompanhante = isset($_POST['idadeAcompanhante']) ? $_POST['idadeAcompanhante'] : null;
        $formaConducao = isset($_POST['formaConducaoSelect']) ? $_POST['formaConducaoSelect'] : null;

        // Recuperar os valores dos checkboxes
        $vitimaEra = isset($_POST['vitimaEra']) ? $_POST['vitimaEra'] : array();

        // Transformar a array de valores checkbox em uma string (se necessário)
        $vitimaEraString = implode(", ", $vitimaEra);

        try {
            $sql = "INSERT INTO info_paciente (id_info_ocorrencia, nome_paciente, idade_paciente, sexo_paciente, rg_cpf_paciente, nome_acompanhante, idade_acompanhante, vitima_era, forma_conducao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$idInfoOcorrencia, $nomePaciente, $idadePaciente, $sexoPaciente, $rgCpfPaciente, $nomeAcompanhante, $idadeAcompanhante, $vitimaEraString, $formaConducao]);

            echo "Informações do paciente inseridas com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao inserir informações do paciente: " . $e->getMessage();
        }
    } else {
        echo "Campos obrigatórios não preenchidos.";
    }
}
?>