<?php
include('conexao.php');
include('protect.php');

$nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
$cpf = mysqli_real_escape_string($conn, trim($_POST['userCPF']));
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$tipo = mysqli_real_escape_string($conn, trim($_POST['tipo']));
$senha = mysqli_real_escape_string($conn, trim($_POST['passwords']));

// Verifique se o CPF já existe na tabela "usuario"
$sql = "SELECT COUNT(*) as total FROM atendente WHERE cpf = '$cpf'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro.php');
    exit;
}

// Inserir dados na tabela "atendente"
$sql = "INSERT INTO atendente (nome, cpf, email, tipo, senha, data_cadastro) VALUES ('$nome', '$cpf', '$email', '$tipo', '$senha', NOW())";

if ($conn->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
    $conn->close();
    header('Location: usuarios.php');
    exit;
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}
?>
