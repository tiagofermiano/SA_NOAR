<?php
include('protect.php');
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitInfos'])) {
    processarInfoPaciente();
}

function processarInfoPaciente() {
    global $conn;

    // Recuperar os dados do formulário
    $nomePaciente = $_POST['nomePaciente'];
    $idadePaciente = $_POST['idadePaciente'];
    $sexoPaciente = $_POST['sexoSelect'];
    $rgCpfPaciente = $_POST['rgCpfPaciente'];
    $nomeAcompanhante = $_POST['nomeAcompanhante'];
    $idadeAcompanhante = $_POST['idadeAcompanhante'];
    $vitimaEra = isset($_POST['vitimaEra']) ? implode(", ", $_POST['vitimaEra']) : '';
    $formaConducao = $_POST['formaConducaoSelect'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO info_paciente (nome_paciente, idade_paciente, sexo_paciente, rg_cpf_paciente, nome_acompanhante, idade_acompanhante, vitima_era, forma_conducao) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$nomePaciente, $idadePaciente, $sexoPaciente, $rgCpfPaciente, $nomeAcompanhante, $idadeAcompanhante, $vitimaEra, $formaConducao])) {
        echo "Informações do paciente inseridas com sucesso!";
    } else {
        echo "Erro ao inserir informações do paciente: " . $conn->error; // Use $conn->error para obter mensagens de erro diretamente da conexão PDO.
    }
}
?>