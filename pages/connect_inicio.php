<?php
include('conexao.php');
include('protect.php');

// Supondo que o ID do usuário esteja disponível, você pode adaptar isso conforme necessário
$id_usuario = $_SESSION['id_atendente'];

// Consulta para obter o tipo de cargo do usuário a partir da tabela 'atendente'
$sql = "SELECT tipo FROM atendente WHERE id_atendente = $id_usuario";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $tipo_cargo = $row['tipo'];

    // Verificar o tipo de cargo e redirecionar
    if ($tipo_cargo == 'Administrador') {
        header("Location: telahome_admin.php");
        exit();
    } elseif ($tipo_cargo == 'Atendente' || $tipo_cargo == 'Bombeiro' || $tipo_cargo == 'Outro') {
        header("Location: telahome.php");
        exit();
    } else {
        // Tratar outros tipos de cargos, se necessário
        echo "Tipo de cargo não reconhecido";
    }
} else {
    // Tratar erro na consulta, se necessário
    echo "Erro na consulta ao banco de dados";
}

// Fechar a conexão com o banco de dados, se necessário
mysqli_close($conn);
?>