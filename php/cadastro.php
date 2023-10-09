<?php
function cadastrarAtendente($nome, $cpf, $email, $senha) {
    // Lembre-se de estabelecer uma conexão com o banco de dados aqui.

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
        return true; // Sucesso
    } else {
        return false; // Falha
    }

    // Fechar a declaração e a conexão.
    $stmt->close();
    $conn->close();
}
?>