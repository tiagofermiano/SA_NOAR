<?php
include ('conexao.php');

$editUsuarioId = null;
if (isset($_GET['edit'])) {
    $editUsuarioId = $_GET['edit'];
}

// Processo de atualização dos dados do usuário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoNomeCompleto = mysqli_real_escape_string($conn, trim($_POST["novo_nome_completo"]));
    $novoEmail = mysqli_real_escape_string($conn, trim($_POST["novo_email"]));
    $novoCpf = mysqli_real_escape_string($conn, trim($_POST["novo_cpf"]));
    $novaSenha = mysqli_real_escape_string($conn, trim($_POST["nova_senha"]));
    $novoTipo = mysqli_real_escape_string($conn, trim($_POST["novo_tipo"]));

    // Atualize os dados do usuário no banco de dados se o ID for fornecido
    if ($editUsuarioId !== null) {
        $atualizarQuery = "UPDATE atendente SET nome = '$novoNomeCompleto', email = '$novoEmail', cpf = '$novoCpf', senha = '$novaSenha', tipo = '$novoTipo' WHERE id_atendente = $editUsuarioId";

        if ($conn->query($atualizarQuery) === TRUE) {
            // Redirecione para a página "usuarios.php" após a atualização
            header("Location: usuarios.php");
            exit;
        } else {
            echo "Erro ao atualizar o usuário: " . $conn->error;
        }        
    }
}

// Consulta para buscar todos os usuários
$usuariosQuery = "SELECT id_atendente, nome, cpf, email, senha, tipo FROM atendente";
$usuariosResult = $conn->query($usuariosQuery);

?>