<?php
include('conexao.php');

if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
} 

if(isset($_POST['userCPF']) && isset($_POST['passwords'])) {

    if(strlen($_POST['userCPF']) == 0) {
        echo "Preencha seu cpf";
    } else if(strlen($_POST['passwords']) == 0) {
        echo "Preencha sua senha";
    } else {

        $cpf = $conn->real_escape_string($_POST['userCPF']);
        $senha = $conn->real_escape_string($_POST['passwords']);
        
        $sql_code = "SELECT * FROM atendente WHERE cpf = '$cpf' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_atendente'] = $usuario['id_atendente'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['cpf'] = $usuario['cpf'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['tipo'] = $usuario['tipo'];
            $_SESSION['senha'] = $usuario['senha'];

            if ($_SESSION['tipo'] == 'Administrador') {
                // Allow access to all pages for administrators
                header("Location: telahome_admin.php");
            } elseif ($_SESSION['tipo'] == 'Atendente') {
                // Allow access to specific pages for atendente
                header("Location: telahome.php");
            } elseif ($_SESSION['tipo'] == 'Bombeiro') {
                // Allow access to specific pages for bombeiro
                header("Location: telahome.php.php");
            } elseif ($_SESSION['tipo'] == 'Outro') {
                // Allow access to specific pages for bombeiro
                header("Location: telahome.php.php");
            }else {
                // Redirect other users to a restricted page
                header("Location: restricted.php");
            }

        } else {
            echo "Falha ao logar! CPF ou SENHA incorretos";
        }
    }
}
?>