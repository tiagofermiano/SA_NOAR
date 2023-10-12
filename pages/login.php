<?php
session_start();
include ('conexao.php');

if(isset($_POST['submit-button'])) {
    $cpf = $_POST['userCPF']; /*name do email-input*/
    $senha = $_POST['password']; /*name do password-input*/
    
    $sql = "SELECT cpf, senha FROM atendente WHERE cpf = '$cpf' && senha = '$senha'"; /*informações de tabela e campos de acordo como seu BD*/
    $result = mysqli_query($conn, $sql);

function loginAtendente($cpf, $senha) {
    global $conn; // Use a conexão global definida no arquivo conexao.php

    // SQL para selecionar o atendente com base no CPF.
    $sql = "SELECT cpf, senha FROM atendente WHERE cpf = ?";

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
            // Defina variáveis de sessão, como o ID do usuário, se necessário.
            $_SESSION['user_id'] = $row['id_atendente'];

            // Feche a declaração e a conexão.
            $stmt->close();
            $conn->close();

            return true; // Sucesso
        } else {
            $stmt->close();
            $conn->close();
            return false; // Senha incorreta
        }
    } else {
        $stmt->close();
        $conn->close();
        return false; // Atendente não encontrado
    }
}
?>

<!-- SE DER ERRO USAR A FUNÇÃO DA DJ -->

<!-- if (mysqli_num_rows($result) > 0) { 
              header("Location: https://www.google.com"); /*local para onde deseja redirecionar o usuário*/
            } else {
                header("Location: login.php"); /*local para onde deseja redirecionar o usuário*/
                /*echo "<script>document.querySelector('#form-text').innerText = 'E-mail ou senha inválidos'</script>";*/
            }
        } -->