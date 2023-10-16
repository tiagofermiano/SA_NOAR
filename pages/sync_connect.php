<?php
session_start();

// Conectar ao banco de dados MySQL
$mysqli = include 'conexao.php';

// Verificar a conexão
if ($mysqli->connect_error) {
    die("Erro de conexão com o banco de dados: " . $mysqli->connect_error);
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        // Receber dados do formulário de login
        $cpf = $_POST['userCPF'];
        $senha = $_POST['password'];

        // Consultar o banco de dados para verificar o login
        $query = "SELECT * FROM atendente WHERE cpf='$cpf' AND senha='$senha'";
        $result = $mysqli->query($query);

        if ($result->num_rows == 1) {
            // Login bem-sucedido, criar uma sessão
            $_SESSION['cpf'] = $cpf;

            // Redirecionar para a página protegida (ficha.html)
            header("Location: home.html");
        } else {
            // Login falhou, redirecionar para a página de login novamente
            header("Location: login.html");
            // alert
        }
    } elseif (isset($_POST['cadastro'])) {
        // Receber dados do formulário de cadastro
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['userCPF'];
        $senha = $_POST['password'];

        // Inserir os dados na tabela de usuários
        $query = "INSERT INTO atendente (nome, email, cpf, senha) VALUES ('$nome', '$email', '$cpf', '$senha')";
        
        if ($mysqli->query($query) === TRUE) {
            // Cadastro bem-sucedido, criar uma sessão
            $_SESSION['cpf'] = $cpf;

            // Redirecionar para a página protegida (ficha.html)
            header("Location: home.html");
        } else {
            // Erro no cadastro, redirecionar para a página de cadastro novamente
            header("Location: cadastro.html");
        }
    }
}

// Fechar a conexão com o banco de dados
$mysqli->close();
?>