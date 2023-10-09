<?php
function loginAtendente($cpf, $senha) {
    // Lembre-se de estabelecer uma conexão com o banco de dados aqui.

    // SQL para selecionar o atendente com base no CPF.
    $sql = "SELECT id, senha FROM atendente WHERE cpf = ?";

    // Preparar a declaração SQL.
    $stmt = $conn->prepare($sql);

    // Bind do parâmetro.
    $stmt->bind_param("s", $cpf);

    // Executar a declaração preparada.
    $stmt->execute();

    // Obter o resultado da consulta.
    $result = $stmt->get_result();

    // Verificar se o atendente com o CPF existe.
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $senhaHash = $row['senha'];

        // Verificar se a senha fornecida corresponde à senha armazenada no banco de dados.
        if (password_verify($senha, $senhaHash)) {
            return true; // Sucesso
        } else {
            return false; // Senha incorreta
        }
    } else {
        return false; // Atendente não encontrado
    }

    // Fechar a declaração e a conexão.
    $stmt->close();
    $conn->close();
}
?>