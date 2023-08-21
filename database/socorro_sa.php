<?php
$host = "127.0.0.1";
$username = "root";
$password = "root";
$database = "socorro_sa";

try { 
    $link = new mysqli($host, $username, $password, $database);

    if ($link->connect_error) {
        throw new Exception("Erro na conexão: " . $link->connect_error);
    }

    echo "Conexão com o banco realizada com sucesso!" . PHP_EOL;

    // CADASTRO DO USUARIO

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["cadastrar"])) { // Adicionei o isset() para verificar se o formulário foi enviado
        $username = $_POST["nome"];
        $password = $_POST["senha"];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $cpf = $_POST["cpf"];

        $insertQuery = "INSERT INTO bombeiro (nome, senha, cpf) VALUES ('$username', '$hashedPassword', '$cpf')";
        if ($link->query($insertQuery) === TRUE) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário: " . $link->error;
        }
    }

    // LOGIN DO USUARIO

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) { // Adicionei o isset() para verificar se o formulário foi enviado
        $username = $_POST["nome"];
        $enteredPassword = $_POST["senha"];

        // Consulta para verificar o usuário
        $selectQuery = "SELECT * FROM bombeiro WHERE nome='$username'";
        $result = $link->query($selectQuery);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $storedHashedPassword = $row["senha"];

            if (password_verify($enteredPassword, $storedHashedPassword)) {
                echo "Login bem-sucedido!";
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    }

    // FECHANDO O BANCO

    $link->close();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>