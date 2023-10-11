<?php
session_start();

include ('conexao.php'); // Inclua o arquivo de conexão

$nome = "Nome do Atendente";
$cpf = "12345678901";
$email = "atendente@example.com";
$senha = "senha_segura";

function cadastrarAtendente($nome, $cpf, $email, $senha) {
    global $conn; // Use a conexão global definida no arquivo conexao.php

    // Hash da senha para armazenamento seguro no banco de dados.
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // SQL para inserir um novo atendente na tabela "atendente".
    $sql = "INSERT INTO atendente (nome, cpf, email, senha) VALUES (?, ?, ?, ?)";

    // Preparar a declaração SQL.
    $stmt = $conn->prepare($sql);

    // Bind dos parâmetros.
    $stmt->bind_param("ssss", $nome, $cpf, $email, $senhaHash);

    // Executar a declaração preparada.
    if ($stmt->execute()) {
        // Fechar a declaração e a conexão.
        $stmt->close();
        $conn->close();

        return true; // Sucesso
    } else {
        // Fechar a declaração e a conexão.
        $stmt->close();
        $conn->close();

        return false; // Falha
    }
}
?>
