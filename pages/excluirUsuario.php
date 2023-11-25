<?php
include('protect.php');
include('connect_usuarios.php');

if (isset($_GET['edit']) && isset($_GET['action']) && $_GET['action'] === 'excluir') {
    $editUsuarioId = $_GET['edit'];

    // Exclui o usuário com base no ID fornecido
    $excluirQuery = "DELETE FROM atendente WHERE id_atendente = $editUsuarioId";

    if ($conn->query($excluirQuery) === TRUE) {
        // Redireciona de volta para a página de usuários após a exclusão
        header("Location: usuarios.php");
        exit;
    } else {
        echo "Erro ao excluir o usuário: " . $conn->error;
    }
}
?>