<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitInfos'])) {
    processarFormulario();
}

function processarFormulario() {
    global $conn;

    // Recuperar os dados do formulário
    $idInfoOcorrencia = $_POST['idInfoOcorrencia'];
    $nomePaciente = $_POST['nomePaciente'];
    $idadePaciente = $_POST['idadePaciente'];
    $sexoPaciente = $_POST['sexoSelect'];
    $rgCpfPaciente = $_POST['rgCpfPaciente'];
    $nomeAcompanhante = $_POST['nomeAcompanhante'];
    $idadeAcompanhante = $_POST['idadeAcompanhante'];
    
    // Recuperar os valores dos checkboxes
    $vitimaEra = isset($_POST['vitimaEra']) ? implode(", ", $_POST['vitimaEra']) : '';
    
    $formaConducao = $_POST['formaConducaoSelect'];

    // Inserir os dados no banco de dados
    try {
        $sql = "INSERT INTO info_paciente (id_info_ocorrencia, nome_paciente, idade_paciente, sexo_paciente, rg_cpf_paciente, nome_acompanhante, idade_acompanhante, vitima_era, forma_conducao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idInfoOcorrencia, $nomePaciente, $idadePaciente, $sexoPaciente, $rgCpfPaciente, $nomeAcompanhante, $idadeAcompanhante, $vitimaEra, $formaConducao]);

        echo "Informações do paciente inseridas com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir informações do paciente: " . $e->getMessage();
    }
}
?>